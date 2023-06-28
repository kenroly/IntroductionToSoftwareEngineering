<?php

namespace App\Http\Controllers;

use App\Models\book;
use App\Models\book_issue;
use App\Models\reader;
use Illuminate\Http\Request;
use App\Models\user;

class ReportsController extends Controller
{
    public function index()
    {
        return view('report.index');
    }

    public function date_wise()
    {
        return view('report.dateWise', ['books' => '']);
    }

    public function generate_date_wise_report(Request $request)
    {
        $request->validate(['date' => "required|date"]);
        return view('report.dateWise', [
            'books' => book_issue::where('issue_date', $request->date)->latest()->get()
        ]);
    }

    public function month_wise()
    {
        return view('report.monthWise', ['books' => '']);
    }

    public function generate_month_wise_report(Request $request)
    {
        $request->validate(['month' => "required|date"]);
        return view('report.monthWise', [
            'books' => book_issue::where('issue_date', 'LIKE', '%' . $request->month . '%')->latest()->get(),
        ]);
    }

    public function not_returned()
    {
        return view('report.notReturned',[
            'books' => book_issue::where('issue_status', 'N')->get()
        ]);
    }

    public function late_returned($filter)
    {
        if ($filter == 'all') {
            return view('report.FineForLateReturn',[
                'books' => book_issue::where('fine', '<>', 0)->where('issue_status', '<>', 'L')->get()
            ]);
        } else if ($filter == 'paid') {
            return view('report.FineForLateReturn',[
                'books' => book_issue::where('fine', '<>', 0)->where('issue_status', '<>', 'L')->where('fine_status', 'Y')->get()
            ]);
        } else if ($filter == 'unpaid') {
            return view('report.FineForLateReturn',[
                'books' => book_issue::where('fine', '<>', 0)->where('issue_status', '<>', 'L')->where('fine_status', 'N')->get()
            ]);
        }
    }

    public function fine_search()
    {
        return view('report.FineSearch', ['readers' => '', 'bookIssues' => '']);
    }

    public function generate_reader_for_search(Request $request)
    {
        return view('report.FineSearch',[
            'readers' => reader::where('alias', 'like', '%'.build_alias($request['keyword']).'%')
            ->orWhere('username', 'like', '%'.$request['keyword'].'%')
            ->get(),
            'bookIssues' => '',
            'keyword' => $request['keyword']
        ]);
    }

    public function generate_book_issue_for_search(Request $request)
    {
        return view('report.FineSearch',[
            'readers' => reader::where('alias', 'like', '%'.build_alias($request['keyword']).'%')
            ->orWhere('username', 'like', '%'.$request['keyword'].'%')
            ->get(),
            'bookIssues' => book_issue::where('reader_id', $request['id'])->where('find', '<>', 0)->get(),
            'keyword' => $request['keyword']
        ]);
    }

    public function fine_lost($filter)
    {
        if ($filter == 'all') {
            return view('report.FineForLostBook',[
                'books' => book_issue::where('issue_status', 'L')->get()
            ]);
        } else if ($filter == 'paid') {
            return view('report.FineForLostBook',[
                'books' => book_issue::where('issue_status', 'L')->where('fine_status', 'Y')->get()
            ]);
        } else if ($filter == 'unpaid') {
            return view('report.FineForLostBook',[
                'books' => book_issue::where('issue_status', 'L')->where('fine_status', 'N')->get()
            ]);
        }
    }
}
