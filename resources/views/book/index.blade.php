@extends('layouts.app')
@section('content')

    <div id="admin-content">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <h2 class="admin-heading">Danh sách các quyển sách</h2>
                </div>
                @if (Auth::user()->department == 'Thủ kho' || Auth::user()->department == 'Ban giám đốc')
                    <div class="offset-md-1 col-md-2">
                        <a class="add-new" href="{{ route('book.stock') }}">Thanh lý sách</a>
                    </div>
                    <div class="col-md-2">
                        <a class="add-new" href="{{ route('book.lost') }}">Sách đã mất</a>
                    </div>
                    <div class="col-md-2">
                        <a class="add-new" href="{{ route('book.create') }}">Thêm sách</a>
                    </div>
                @endif
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="message"></div>
                    <table class="content-table">
                        <thead>
                            <th>STT</th>
                            <th>Tên sách</th>
                            <th>Danh mục</th>
                            <th>Tác giả</th>
                            <th>Nhà xuất bản</th>
                            <th>Trạng thái</th>
                            <th>Xem</th>
                            @if (Auth::user()->department == 'Thủ kho' || Auth::user()->department == 'Ban giám đốc')
                                <th>Sửa</th>
                                <th>Xoá</th>
                            @endif
                        </thead>
                        <tbody>

                            @php
                                $i = 1;
                            @endphp

                            @forelse ($books as $book)
                                @if ($book->status != 'L')
                                    <tr>
                                        <td class="id">{{ $i }}</td>
                                        <td>{{ $book->name }}</td>
                                        <td>{{ $book->category->name }}</td>
                                        <td>{{ $book->auther->name }}</td>
                                        <td>{{ $book->publisher->name }}</td>
                                        <td>
                                            @if ($book->status == 'Y')
                                                <span class='badge badge-success'>Có thể mượn</span>
                                            @else
                                                <span class='badge badge-danger'>Đã được mượn</span>
                                            @endif
                                        </td>
                                        <td class="view">
                                            <a href="{{ route('book.show', $book->id) }}"
                                                class="btn btn-primary view-btn">Xem</a>
                                        </td>
                                        @if (Auth::user()->department == 'Thủ kho' || Auth::user()->department == 'Ban giám đốc')
                                            <td class="edit">
                                                <a href="{{ route('book.edit', $book) }}" class="btn btn-success">Sửa</a>
                                            </td>
                                            <td class="delete" style="padding-top:2.5%;">
                                                <form action="{{ route('book.destroy', $book) }}" method="post"
                                                    class="form-hidden">
                                                    <button class="btn btn-danger delete-book">Xoá</button>
                                                    @csrf
                                                </form>
                                            </td>
                                        @endif
                                    </tr>
                                    @php
                                        $i++;
                                    @endphp
                                @endif
                            @empty
                                <tr>
                                    <td colspan="8">Không có quyển sách nào.</td>
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