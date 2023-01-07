@extends('layouts.app')
@section('content')
    <div id="admin-content">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h2 class="admin-heading">Thêm sách</h2>
                </div>
                <div class="offset-md-5 col-md-4">
                    <a class="add-new" href="{{ route('books') }}">Danh sách các quyển sách</a>
                </div>                    
            </div>
            <div class="row">
                <div class="offset-md-3 col-md-6">
                    <form class="yourform" action="{{ route('book.store') }}" method="post" autocomplete="off">
                        @csrf
                        <div class="form-group">
                            <label>Tên sách</label>
                            <input type="text" class="form-control @error('name') isinvalid @enderror"
                                placeholder="Tên sách" name="name" value="{{ old('name') }}" required>
                            @error('name')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Danh mục</label>
                            <select class="form-control @error('category_id') isinvalid @enderror " name="category_id" required>
                                <option value="">Chọn danh mục</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Tác giả</label>
                            <select class="form-control @error('auther_id') isinvalid @enderror " name="auther_id" required>
                                <option value="">Chọn tác giả</option>
                                @foreach ($authors as $author)
                                    <option value='{{ $author->id }}'>{{ $author->name }}</option>";
                                @endforeach
                            </select>
                            @error('auther_id')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Nhà xuất bản</label>
                            <select class="form-control @error('publisher_id') isinvalid @enderror " name="publisher_id" required>
                                <option value="">Chọn nhà xuất bản</option>
                                @foreach ($publishers as $publisher)
                                    <option value='{{ $publisher->id }}'>{{ $publisher->name }}</option>";
                                @endforeach
                            </select>
                            @error('publisher_id')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Năm xuất bản</label>
                            <input type="year" name="published_year" class="form-control" value="{{ date('Y') }}">
                            @error('published_year')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Giá</label>
                            <input type="number" class="form-control @error('price') isinvalid @enderror"
                                placeholder="Giá" name="price" value="{{ old('price') }}" required>
                            @error('price')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div style="display: None;">
                            <input type="text" name="user_id" value="{{ Auth::user()->id }}">
                        </div>

                        <div style="display: None;">
                            <input type="text" name="entry_date" value="{{ date('Y-m-d') }}">
                        </div>
                        <input type="submit" name="save" class="btn btn-danger" value="Lưu" required>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
