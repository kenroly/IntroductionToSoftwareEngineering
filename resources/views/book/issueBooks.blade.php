@extends('layouts.app')
@section('content')
    <div id="admin-content">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2 class="admin-heading">Danh sách sách đã được mượn</h2>
                </div>
                <div class="offset-md-3 col-md-3">
                    <a class="add-new" href="{{ route('book_issue.create') }}">Cho mượn sách</a>
                </div>
            </div>
            @if (Session::has('error'))
                <div class="alert alert-danger">{{ Session::get('error') }}</div>
            @endif
            <div class="row">
                <div class="col-md-12">
                    <table class="content-table">
                        <thead>
                            <th>STT</th>
                            <th>Tên độc giả</th>
                            <th>Tên sách</th>
                            <th>Số điện thoại</th>
                            <th>Email</th>
                            <th>Ngày mượn</th>
                            <th>Ngày trả</th>
                            <th>Trạng thái</th>
                            <th>Sửa</th>
                            <th>Xoá</th>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @forelse ($books as $book)
                                @if ($book->issue_status != 'L')
                                    <tr style='@if (date('Y-m-d') > $book->return_date->format('d-m-Y') && $book->issue_status == 'N') ) background:rgba(255,0,0,0.2) @endif'>
                                        <td>{{ $i }}</td>
                                        <td>{{ $book->reader->name }}</td>
                                        <td>{{ $book->book->name }}</td>
                                        <td>{{ $book->reader->phone }}</td>
                                        <td>{{ $book->reader->email }}</td>
                                        <td>{{ $book->issue_date->format('d M, Y') }}</td>
                                        <td>{{ $book->return_date->format('d M, Y') }}</td>
                                        <td>
                                            @if ($book->issue_status == 'Y')
                                                <span class='badge badge-success'>Đã trả</span>
                                            @else
                                                <span class='badge badge-danger'>Đang mượn</span>
                                            @endif
                                        </td>
                                        <td class="edit">
                                            <a href="{{ route('book_issue.edit', $book->id) }}" class="btn btn-success">Sửa</a>
                                        </td>
                                        <td class="delete">
                                            <form action="{{ route('book_issue.destroy', $book) }}" method="post"
                                                class="form-hidden">
                                                <button class="btn btn-danger">Xoá</button>
                                                @csrf
                                            </form>
                                        </td>
                                    </tr>
                                    @php
                                        $i++;
                                    @endphp
                                @endif
                            @empty
                                <tr>
                                    <td colspan="10">Không có sách đang được mượn</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $books->links('vendor/pagination/bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
@endsection
