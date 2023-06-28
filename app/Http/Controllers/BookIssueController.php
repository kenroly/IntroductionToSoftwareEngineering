<?php

namespace App\Http\Controllers;

use App\Models\book_issue;
use App\Http\Requests\Storebook_issueRequest;
use App\Http\Requests\Updatebook_issueRequest;
use App\Models\auther;
use App\Models\book;
use App\Models\settings;
use App\Models\reader;
use \Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

use Carbon\Carbon;
use DateTime;

class BookIssueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $data = book_issue::where('issue_status', '<>', 'L')->Paginate(10);
        return view('book.issueBooks', [
            'books' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('book.issueBook_add', [
            'readers' => reader::where('expire_date', '>', now())->get(),
            'books' => book::where('status', 'Y')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Storebook_issueRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Storebook_issueRequest $request)
    {
        $rent_books = book_issue::where('reader_id', $request->reader_id)->where('issue_status', 'N');
        $count = 0;
        foreach ($rent_books->get() as $rent_book) {

            if (date_create($rent_book->return_date) < date_create(date('Y-m-d'))) {
                return redirect()->route('book_issued')->with('error', 'Độc giả này đã quá hạn trả quyển '.$rent_book->book->name.'.');
            }

            $first_date = date_create(date('Y-m-d'));
            $last_date = date_create($rent_book->return_date);
            $diff = date_diff($first_date, $last_date);
            if ($diff->format('%a') > 4) {
                $count++;
            }
        }
        if ($count > 5) {
            return redirect()->route('book_issued')->with('error', 'Không thể cho một độc giả mượn nhiều hơn 5 quyển trong 4 ngày.');
        }
        $issue_date = date('Y-m-d');
        $return_date = date('Y-m-d', strtotime("+" . (settings::latest()->first()->return_days) . " days"));
        $data = book_issue::create($request->validated() + [
            'reader_id' => $request->reader_id,
            'book_id' => $request->book_id,
            'issue_date' => $issue_date,
            'return_date' => $return_date,
            'issue_status' => 'N',
        ]);
        $data->save();
        $book = book::find($request->book_id);
        $book->status = 'N';
        $book->save();
        return redirect()->route('book_issued');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // calculate the total fine  (total days * fine per day)
        $fine = 0;
        $book = book_issue::where('id',$id)->get()->first();
        $first_date = date_create(date('Y-m-d'));
        $last_date = date_create($book->return_date);
        if ($last_date < $first_date) {
            $diff = date_diff($first_date, $last_date);
            $fine = (settings::latest()->first()->fine * $diff->format('%a'));
        }
        return view('book.issueBook_edit', [
            'book' => $book,
            'fine' => $fine,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatebook_issueRequest  $request
     * @param  \App\Models\book_issue  $book_issue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $book = book_issue::find($id);
        $book->issue_status = 'Y';
        $book->return_day = now();

        if ($book->return_date < now()) {
            $first_date = date_create(date('Y-m-d'));
            $last_date = date_create($book->return_date);
            $diff = date_diff($first_date, $last_date);
            $fine = (settings::latest()->first()->fine * $diff->format('%a'));
            $book->fine = $fine;
            $book->fine_status = 'N';
        } else {
            $book->fine = 0;
        }

        $book->save();
        $bookk = book::find($book->book_id);
        $bookk->status= 'Y';
        $bookk->save();
        return redirect()->route('book_issued');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\book_issue  $book_issue
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        book::find(book_issue::find($id)->book_id)->update(['status' => 'Y']);
        book_issue::find($id)->delete();
        return redirect()->route('book_issued');
    }

    public function paid(Request $request)
    {
        if (!empty($request['id'])) {
            $book_issue = book_issue::where('id', $request['id'])->first();
            if (!empty($book_issue)) {
                if ($book_issue['issue_status'] == 'L') {
                    $book_issue->fine_status = 'Y';
                    $book_issue->save();
                    return view('report.FineForLostBook',[
                        'books' => book_issue::where('issue_status', 'L')->get()
                    ]);
                }
            }
        }

        if (empty($request->reader_id)){
            $book = book_issue::find($request['id'])->first();
            $book->fine_status = 'Y';
            $book->save();
            return view('report.FineForLateReturn',[
                'books' => book_issue::where('fine', '<>', 0)->get()
            ]);
        } else {
            $books = book_issue::find($request['reader_id']);
            if (empty($books)) {
                return view('report.FineSearch',[
                    'bookIssues' => book_issue::where('reader_id', $request['reader_id'])->where('fine', '<>', 0)->join('books', 'book_issues.book_id', '=', 'books.id')->where('status', '<>', 'L')->get(),
                    'readers' => reader::where('alias', 'like', '%'.build_alias($request['keyword']).'%')
                    ->orWhere('username', 'like', '%'.$request['keyword'].'%')
                    ->get(),
                    'keyword' => $request['keyword'],
                ]);
            }
            foreach ($books->get() as $book) {
                $book->fine_status = 'Y';
                $book->save();
            }
            return view('report.FineSearch',[
                'bookIssues' => book_issue::where('reader_id', $request['reader_id'])->where('fine', '<>', 0)->join('books', 'book_issues.book_id', '=', 'books.id')->where('status', '<>', 'L')->get(),
                'readers' => reader::where('alias', 'like', '%'.build_alias($request['keyword']).'%')
                ->orWhere('username', 'like', '%'.$request['keyword'].'%')
                ->get(),
                'keyword' => $request['keyword'],
            ]);
        }
    }

    public function lost(Request $request)
    {
//        $book_issue = book_issue::find($request['id']);
        $book_issue = book_issue::where('id', $request['id'])->first();
        $book = book::where('id', $book_issue->book_id)->first();
        $book_issue->return_day = '';
        $book_issue->issue_status = 'L';
        $book_issue->fine = settings::latest()->first()->fine_for_lost * $book->price;
        $book_issue->fine_status = 'N';
        $book_issue->save();
//        $book = book::find(book_issue::find($request['id'])->book_id)->first();
        $book->status = 'L';
        $book->lost_date = date('Y-m-d');
        $book->save();
        return view('book.lost',[
            'books' => book::where('status', 'L')->Paginate(10),
        ]);
    }
}
