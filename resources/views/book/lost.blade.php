@extends('layouts.app')
@section('content')

    <div id="admin-content">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2 class="admin-heading">Danh sách các quyển sách bị mất</h2>
                </div>
                @if (Auth::user()->department == 'Thủ kho' || Auth::user()->department == 'Ban giám đốc')
                    <div class="offset-md-4 col-md-2">
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
                            <th>Ngày ghi nhận mất</th>
                            <th>Xem</th>
                        </thead>
                        <tbody>

                            @php
                                $i = 1;
                            @endphp

                            @forelse ($books as $book)
                                <tr>
                                    <td class="id">{{ $i }}</td>
                                    <td>{{ $book->name }}</td>
                                    <td>{{ $book->category->name }}</td>
                                    <td>{{ $book->auther->name }}</td>
                                    <td>{{ $book->publisher->name }}</td>
                                    <td>{{ $book->lost_date }}</td>
                                    <td class="view">
                                        <a href="{{ route('book.show', $book->id) }}"
                                            class="btn btn-primary view-btn">Xem</a>
                                    </td>
                                </tr>
                                @php
                                    $i++;
                                @endphp
                            @empty
                                <tr>
                                    <td colspan="8">Không có quyển sách nào bị mất.</td>
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