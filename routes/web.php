<?php

use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AutherController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BookIssueController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\ReaderController;
use App\Http\Controllers\TypeController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->middleware('guest');
Route::post('/', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/Change-password', [LoginController::class, 'changePassword'])->name('change_password');


Route::middleware('auth')->group(function () {
    Route::get('change-password',[dashboardController::class,'change_password_view'])->name('change_password_view');
    Route::post('change-password',[dashboardController::class,'change_password'])->name('change_password');
    Route::get('/dashboard', [dashboardController::class, 'index'])->name('dashboard');

    // user CRUD
    Route::get('/users', [UserController::class, 'index'])->name('users');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::get('/user/edit/{user}', [UserController::class, 'edit'])->name('user.edit');
    Route::post('/user/update/{id}', [UserController::class, 'update'])->name('user.update');
    Route::post('/user/delete/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    Route::post('/user/create', [UserController::class, 'store'])->name('user.store');
    Route::get('/user/show/{id}', [UserController::class, 'show'])->name('user.show');

    // readers CRUD
    Route::get('/readers', [ReaderController::class, 'index'])->name('readers');
    Route::get('/reader/create', [ReaderController::class, 'create'])->name('reader.create');
    Route::get('/reader/edit/{reader}', [ReaderController::class, 'edit'])->name('reader.edit');
    Route::post('/reader/update/{id}', [ReaderController::class, 'update'])->name('reader.update');
    Route::post('/reader/delete/{id}', [ReaderController::class, 'destroy'])->name('reader.destroy');
    Route::post('/reader/create', [ReaderController::class, 'store'])->name('reader.store');
    Route::get('/reader/show/{id}', [ReaderController::class, 'show'])->name('reader.show');

    // types CRUD
    Route::get('/types', [TypeController::class, 'index'])->name('types');
    Route::get('/type/create', [TypeController::class, 'create'])->name('type.create');
    Route::get('/type/edit/{type}', [TypeController::class, 'edit'])->name('type.edit');
    Route::post('/type/update/{id}', [TypeController::class, 'update'])->name('type.update');
    Route::post('/type/delete/{id}', [TypeController::class, 'destroy'])->name('type.destroy');
    Route::post('/type/create', [TypeController::class, 'store'])->name('type.store');

    // author CRUD
    Route::get('/authors', [AutherController::class, 'index'])->name('authors');
    Route::get('/authors/create', [AutherController::class, 'create'])->name('authors.create');
    Route::get('/authors/edit/{auther}', [AutherController::class, 'edit'])->name('authors.edit');
    Route::post('/authors/update/{id}', [AutherController::class, 'update'])->name('authors.update');
    Route::post('/authors/delete/{id}', [AutherController::class, 'destroy'])->name('authors.destroy');
    Route::post('/authors/create', [AutherController::class, 'store'])->name('authors.store');

    // publisher crud
    Route::get('/publishers', [PublisherController::class, 'index'])->name('publishers');
    Route::get('/publisher/create', [PublisherController::class, 'create'])->name('publisher.create');
    Route::get('/publisher/edit/{publisher}', [PublisherController::class, 'edit'])->name('publisher.edit');
    Route::post('/publisher/update/{id}', [PublisherController::class, 'update'])->name('publisher.update');
    Route::post('/publisher/delete/{id}', [PublisherController::class, 'destroy'])->name('publisher.destroy');
    Route::post('/publisher/create', [PublisherController::class, 'store'])->name('publisher.store');

    // Category CRUD
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
    Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::get('/category/edit/{category}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::post('/category/delete/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
    Route::post('/category/create', [CategoryController::class, 'store'])->name('category.store');

    // Fine CRUD
    Route::get('/fines', [FineController::class, 'index'])->name('fines');
    Route::get('/fine/create', [FineController::class, 'create'])->name('fine.create');
    Route::get('/fine/edit/{fine}', [FineController::class, 'edit'])->name('fine.edit');
    Route::post('/fine/update/{id}', [FineController::class, 'update'])->name('fine.update');
    Route::post('/fine/delete/{id}', [FineController::class, 'destroy'])->name('fine.destroy');
    Route::post('/fine/create', [FineController::class, 'store'])->name('fine.store');

    // books CRUD
    Route::get('/books', [BookController::class, 'index'])->name('books');
    Route::get('/book/create', [BookController::class, 'create'])->name('book.create');
    Route::get('/book/edit/{book}', [BookController::class, 'edit'])->name('book.edit');
    Route::get('/book/show/{book}', [BookController::class, 'show'])->name('book.show');
    Route::post('/book/update/{id}', [BookController::class, 'update'])->name('book.update');
    Route::post('/book/delete/{id}', [BookController::class, 'destroy'])->name('book.destroy');
    Route::post('/book/create', [BookController::class, 'store'])->name('book.store');
    Route::get('/book/lost', [BookController::class, 'lost'])->name('book.lost');
    Route::get('/book/stock', [BookController::class, 'stock'])->name('book.stock');
    Route::post('/book/stock', [BookController::class, 'stock'])->name('book.stock');

    Route::get('/book_issue', [BookIssueController::class, 'index'])->name('book_issued');
    Route::get('/book-issue/create', [BookIssueController::class, 'create'])->name('book_issue.create');
    Route::get('/book-issue/edit/{id}', [BookIssueController::class, 'edit'])->name('book_issue.edit');
    Route::post('/book-issue/update/{id}', [BookIssueController::class, 'update'])->name('book_issue.update');
    Route::post('/book-issue/delete/{id}', [BookIssueController::class, 'destroy'])->name('book_issue.destroy');
    Route::post('/book-issue/create', [BookIssueController::class, 'store'])->name('book_issue.store');
    Route::post('/book-issue/paid', [BookIssueController::class, 'paid'])->name('book_issue.paid');
    Route::post('/book-issue/lost', [BookIssueController::class, 'lost'])->name('book_issue.lost');

    Route::get('/reports', [ReportsController::class, 'index'])->name('reports');
    Route::get('/reports/Date-Wise', [ReportsController::class, 'date_wise'])->name('reports.date_wise');
    Route::post('/reports/Date-Wise', [ReportsController::class, 'generate_date_wise_report'])->name('reports.date_wise_generate');
    Route::get('/reports/monthly-Wise', [ReportsController::class, 'month_wise'])->name('reports.month_wise');
    Route::post('/reports/monthly-Wise', [ReportsController::class, 'generate_month_wise_report'])->name('reports.month_wise_generate');
    Route::get('/reports/not-returned', [ReportsController::class, 'not_returned'])->name('reports.not_returned');
    Route::get('/reports/late-returned/{filter}', [ReportsController::class, 'late_returned'])->name('reports.late_returned');
    Route::get('/reports/fine-search', [ReportsController::class, 'fine_search'])->name('reports.fine_search');
    Route::get('/reports/generate-reader-for-search', [ReportsController::class, 'generate_reader_for_search'])->name('reports.generate_reader_for_search');
    Route::get('/reports/generate-book-issue-for-search/', [ReportsController::class, 'generate_book_issue_for_search'])->name('reports.generate_book_issue_for_search');
    Route::get('/reports/fine-lost/{filter}', [ReportsController::class, 'fine_lost'])->name('reports.fine_lost');

    Route::get('/settings', [SettingsController::class, 'index'])->name('settings');
    Route::post('/settings', [SettingsController::class, 'update'])->name('settings');
});
