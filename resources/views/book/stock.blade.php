@extends('layouts.app')
@section('content')
    <div id="admin-content">
        <div class="container">
            <div class="row">
                <div class="offset-md-3 col-md-6">
                    <h2 class="admin-heading text-center">Thanh lý sách</h2>
                </div>
            </div>
            <div class="row">
                <div class="offset-md-4 col-md-4">
                    <form class="yourform mb-5" action="{{ route('book.stock') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Sách</label>
                            <select class="form-control @error('book_id') isinvalid @enderror " name="book_id" required>
                                <option value="">Chọn sách</option>
                                @foreach ($books as $book)
                                    <option value="{{ $book->id }}">{{ $book->name }}</option>
                                @endforeach
                            </select>
                            <div class="form-group">
                                <label>Lý do thanh lý</label>
                                <select name="reason" class="form-control">
                                    <option value="Mất" selected>Mất</option>
                                    <option value="Hư hỏng">Hư hỏng</option>
                                    <option value="Người dùng làm mất">Người dùng làm mất</option>
                                </select>
                                @error('reason')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            @error('book_id')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <input type="submit" class="btn btn-danger" name="save" value="Lưu">
                    </form>
                </div>
            </div>
            @if ($books_in_stock)
            
                <div class="row">
                    <div class="offset-md-3 col-md-6">
                        <h2 class="admin-heading text-center">Danh sách sách đã thanh lý</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <table class="content-table">
                            <thead>
                                <th>STT</th>
                                <th>Tên sách</th>
                                <th>Danh mục</th>
                                <th>Tác giả</th>
                                <th>Nhà xuất bản</th>
                                <th>Trạng thái</th>
                                <th>Xem</th>
                            </thead>
                            <tbody>
    
                                @php
                                    $i = 1;
                                @endphp
    
                                @forelse ($books_in_stock as $book)
                                    @if ($book->status != 'L')
                                        <tr>
                                            <td class="id">{{ $i }}</td>
                                            <td>{{ $book->name }}</td>
                                            <td>{{ $book->category->name }}</td>
                                            <td>{{ $book->auther->name }}</td>
                                            <td>{{ $book->publisher->name }}</td>
                                            <td>
                                                <span class='badge badge-success'>Đã thanh lý</span>
                                            </td>
                                            <td class="view">
                                                <a href="{{ route('book.show', $book->id) }}"
                                                    class="btn btn-primary view-btn">Xem</a>
                                            </td>
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
                    </div>
                </div>
        @endif
    </div>
    </div>
@endsection
