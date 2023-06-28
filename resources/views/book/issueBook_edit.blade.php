@extends('layouts.app')
@section('content')

    <div id="admin-content">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h2 class="admin-heading">Trả sách</h2>
                </div>
            </div>
            <div class="row">
                <div class="offset-md-3 col-md-6">
                    <div class="yourform">
                        <table cellpadding="10px" width="90%" style="margin: 0 0 20px;">
                            <tr>
                                <td>Tên độc giả: </td>
                                <td><b>{{ $book->reader->name }}</b></td>
                            </tr>
                            <tr>
                                <td>Tên sách : </td>
                                <td><b>{{ $book->book->name }}</b></td>
                            </tr>
                            <tr>
                                <td>Số điện thoại : </td>
                                <td><b>{{ $book->reader->phone }}</b></td>
                            </tr>
                            <tr>
                                <td>Email : </td>
                                <td><b>{{ $book->reader->email }}</b></td>
                            </tr>
                            <tr>
                                <td>Ngày mượn : </td>
                                <td><b>{{ $book->issue_date->format('d M, Y') }}</b></td>
                            </tr>
                            <tr>
                                <td>Ngày trả : </td>
                                <td><b>{{ $book->return_date->format('d M, Y') }}</b></td>
                            </tr>
                            @if ($book->issue_status == 'Y')
                                <tr>
                                    <td>Tình trạng</td>
                                    <td><b>Đã trả</b></td>
                                </tr>
                                <tr>
                                    <td>Ngày trả</td>
                                    <td><b>{{ $book->return_day->format('d M, Y') }}</b></td>
                                </tr>
                            @elseif ($book->issue_status == 'N')
                                <tr>
                                    <td>Tiền phạt</td>
                                    <td>
                                        {{ $fine * 1000 }} đồng
                                    </td>
                                </tr>
                            @endif
                        </table>
                        @if ($book->issue_status == 'N')
                        <div style="display: flex; flex-direction: row; justify-content: space-around;">
                            <form action="{{ route('book_issue.update', $book->id) }}" method="post" autocomplete="off">
                                @csrf
                                <input type='submit' class='btn btn-danger' name='save' value='Trả sách'>
                            </form>
                            <form action="{{ route('book_issue.lost') }}" method="post" autocomplete="off">
                                @csrf
                                <input type="hidden" name="id" value="{{ $book->id }}">
                                <input type='submit' class='btn btn-danger' name='save' value='Mất sách'>
                            </form>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
