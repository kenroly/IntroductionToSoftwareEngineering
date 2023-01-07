<?php

namespace App\Http\Controllers;

use App\Models\book;
use App\Http\Requests\StorebookRequest;
use App\Http\Requests\UpdatebookRequest;
use App\Models\auther;
use App\Models\category;
use App\Models\publisher;
use App\Models\user;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mockery\Generator\Method;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $data = book::where('status', '<>', 'L')->Paginate(10);
        return view('book.index', [
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
        return view('book.create',[
            'authors' => auther::latest()->get(),
            'publishers' => publisher::latest()->get(),
            'categories' => category::latest()->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorebookRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StorebookRequest $request)
    {
        $request['entry_date'] = Carbon::now();
        $request['user_id'] = Auth::user()->id;
        book::create($request->validated() + [
            'status' => 'Y'
        ]);
        return redirect()->route('books');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\book  $book
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(book $book)
    {
        return view('book.edit',[
            'authors' => auther::latest()->get(),
            'publishers' => publisher::latest()->get(),
            'categories' => category::latest()->get(),
            'book' => $book
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\book  $book
     * @return string
     */
    public function show($id)
    {
        $categories = category::all();
        $authors = auther::all();
        $publishers = publisher::all();
        $users = user::all();

        $book = book::all();
        foreach ($book as $item) {
            if ($item->id == $id) {
                $data = [
                    'id' => $item->id,
                    'name' => $item->name,
                    'category' => $this->getCategoryName($item->category_id, $categories),
                    'author' => $this->getAuthorName($item->auther_id, $authors),
                    'publisher' => $this->getPublisherName($item->publisher_id, $publishers),
                    'published_year' => $item->published_year,
                    'entry_date' => $item->entry_date,
                    'user' => $this->getUserName($item->user_id, $users),
                    'price' => $item->price,
                    'status' => $item->status,
                ];

                return view('book.detail', ['book' => $data]);
            }
        }
        return '';
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatebookRequest  $request
     * @param  \App\Models\book  $book
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdatebookRequest $request, $id)
    {
        $book = book::find($id);
        $book->name = $request->name;
        $book->auther_id = $request->author_id;
        $book->category_id = $request->category_id;
        $book->publisher_id = $request->publisher_id;
        $book->save();
        return redirect()->route('books');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\book  $book
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        book::find($id)->delete();
        return redirect()->route('books');
    }

    public function lost()
    {
        return view('book.lost', [
            'books' => book::where('status', 'L')->Paginate(5)
        ]);
    }

    public function stock(Request $request)
    {
        if ($request->method() == 'GET') {
            return view('book.stock', [
                'books' => book::where('status', 'Y')->get(),
                'books_in_stock' => book::where('status', 'S')->Paginate(5),
            ]);
        } else {
            $book = book::find($request->book_id);
            $book->status = 'S';
            $book->stock_reason = $request->reason;
            $book->stock_user_id = Auth::user()->id;
            $book->stock_date = date('Y-m-d');
            $book->save();
            return redirect()->route('books');
        }
    }

    public function getCategoryName($id, $categories)
    {
        foreach ($categories as $category) {
            if ($category->id == $id) {
                return $category->name;
            }
        }
    }

    public function getAuthorName($id, $authors)
    {
        foreach ($authors as $author) {
            if ($author->id == $id) {
                return $author->name;
            }
        }
    }

    public function getPublisherName($id, $publishers)
    {
        foreach ($publishers as $publisher) {
            if ($publisher->id == $id) {
                return $publisher->name;
            }
        }
    }

    public function getUserName($id, $users)
    {
        foreach ($users as $user) {
            if ($user->id == $id) {
                return $user->name;
            }
        }
    }
}
