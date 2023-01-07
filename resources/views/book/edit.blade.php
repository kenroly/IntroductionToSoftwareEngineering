@extends('layouts.app')
@section('content')
    <div id="admin-content">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <h2 class="admin-heading">Cập nhật thông tin sách</h2>
                </div>
            </div>
            <div class="row">
                <div class="offset-md-3 col-md-6">
                    <form class="yourform" action="{{ route('book.update', $book->id) }}" method="post"
                        autocomplete="off">
                        @csrf
                        <div class="form-group">
                            <label>Tên sách</label>
                            <input type="text" class="form-control @error('name') isinvalid @enderror"
                                placeholder="Tên sách" name="name" value="{{ $book->name }}"  required>
                            @error('name')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Danh mục</label>
                            <select class="form-control @error('category_id') isinvalid @enderror " name="category_id"
                                >
                                <option value="">Chọn danh mục</option>
                                @foreach ($categories as $category)
                                    @if ($category->id == $book->category_id)
                                        <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                                    @else
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endif
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
                            <select class="form-control @error('auther_id') isinvalid @enderror " name="auther_id">
                                <option value="">Chọn tác giả</option>
                                @foreach ($authors as $auther)
                                    @if ($auther->id == $book->auther_id)
                                        <option value="{{ $auther->id }}" selected>{{ $auther->name }}</option>
                                    @else
                                        <option value="{{ $auther->id }}">{{ $auther->name }}</option>
                                    @endif
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
                            <select class="form-control @error('publisher_id') isinvalid @enderror "
                                name="publisher_id" >
                                <option value="">Chọn nhà xuất bản</option>
                                @foreach ($publishers as $publisher)
                                    @if ($publisher->id == $book->publisher_id)
                                        <option value="{{ $publisher->id }}" selected>{{ $publisher->name }}</option>
                                    @else
                                        <option value="{{ $publisher->id }}">{{ $publisher->name }}</option>
                                    @endif
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
                            <input type="year" name="published_year" class="form-control" value="{{ $book->published_year }}" required>
                            @error('published_year')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Giá</label>
                            <input type="number" class="form-control @error('price') isinvalid @enderror"
                                placeholder="Giá" name="price" value="{{ $book->price }}" required>
                            @error('price')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div style="display: None;">
                            <input type="text" name="user_id" value="{{ $book->user_id }}" required>
                        </div>

                        <div style="display: None;">
                            <input type="text" name="entry_date" value="{{ $book->entry_date }}" required>
                        </div>
                        <input type="submit" name="save" class="btn btn-danger" value="Cập nhật" required>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
