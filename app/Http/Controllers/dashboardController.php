<?php

namespace App\Http\Controllers;

use App\Http\Requests\changePasswordRequest;
use App\Models\user;
use App\Models\auther;
use App\Models\book;
use App\Models\book_issue;
use App\Models\category;
use App\Models\publisher;
use App\Models\reader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class dashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'users' => user::count(),
            'authors' => auther::count(),
            'publishers' => publisher::count(),
            'categories' => category::count(),
            'books' => book::count(),
            'readers' => reader::count(),
            'issued_books' => book_issue::count(),
            'not_returned_books' => book_issue::where('issue_status', 'N')->count(),
        ]);
    }

    public function change_password_view()
    {
        return view('reset_password');
    }

    public function change_password(changePasswordRequest $request)
    {
        if (Auth::check(["username" => auth()->user()->username, "password" => $request->c_password])) {
            auth()->user()->password = bcrypt($request->password);
            return redirect()->back()->with(['message' => "Password Changed Successfully!."]);
        } else {
            return "";
        }
    }
}
