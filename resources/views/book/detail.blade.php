@extends('layouts.app')
@section('content')
    <div id="admin-content">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h2 class="admin-heading">Thông tin sách</h2>
                </div>
            </div>
            <div class="row">
                <div class="offset-md-3 col-md-6">
                    <div class="yourform">
                        <div class="form-group">
                            <label>Tên sách</label>
                            <input type="text" class="form-control" value="{{ $book['name'] }}" disabled>
                        </div>
    
                        <div class="form-group">
                            <label>Danh mục</label>
                            <input type="text" class="form-control" value="{{ $book['category'] }}" disabled>
                        </div>

                        <div class="form-group">
                            <label>Tác giả</label>
                            <input type="text" class="form-control" value="{{ $book['author'] }}" disabled>
                        </div>
                        
                        <div class="form-group">
                            <label>Nhà xuất bản</label>
                            <input type="text" class="form-control" value="{{ $book['publisher'] }}" disabled>
                        </div>

                        <div class="form-group">
                            <label>Năm xuất bản</label>
                            <input type="text" class="form-control" value="{{ $book['published_year'] }}" disabled>
                        </div>

                        <div class="form-group">
                            <label>Người nhập</label>
                            <input type="text" class="form-control" value="{{ $book['user'] }}" disabled>
                        </div>

                        <div class="form-group">
                            <label>Ngày nhập</label>
                            <input type="text" class="form-control" value="{{ $book['entry_date'] }}" disabled>
                        </div>
                        
                        <div class="form-group">
                            <label>Giá</label>
                            <input type="text" class="form-control" value="{{ $book['price'] }}" disabled>
                        </div>

                        <div class="form-group">
                            <label>Trạng thái</label> <br>
                            @if ($book['status'] == 'Y')
                                <span class='badge badge-success'>Có thể mượn</span>
                            @elseif ($book['status'] == 'N')
                                <span class='badge badge-warning'>Đã được mượn</span>
                            @elseif ($book['status'] == 'L')
                                <span class='badge badge-danger'>Đã mất</span>
                            @elseif ($book['status'] == 'S')
                                <span class='badge badge-info'>Đã thanh lý</span>
                            @endif
                        </div>
    
                        <a class="btn btn-light" href="{{ route('books') }}">Quay lại</a>
    
                        <a class="btn btn-danger" href="{{ route('book.edit', $book['id']) }}" style="color: white">Chỉnh sửa</a>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
