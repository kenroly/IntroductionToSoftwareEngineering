@extends('layouts.app')
@section('content')
    <div id="admin-content">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h2 class="admin-heading">Cho mượn sách</h2>
                </div>
                <div class="offset-md-5 col-md-4">
                    <a class="add-new" href="{{ route('book_issued') }}">Danh sách sách đã được mượn</a>
                </div>
            </div>
            <div class="row">
                <div class="offset-md-3 col-md-6">
                    <form class="yourform" action="{{ route('book_issue.create') }}" method="post"
                        autocomplete="off">
                        @csrf
                        <div class="form-group">
                            <label>Tên độc giả mượn sách</label>
                            <select class="form-control" name="reader_id" required>
                                <option value="">Chọn tên độc giả</option>
                                @foreach ($readers as $reader)
                                    <option value='{{ $reader->id }}'>{{ $reader->name }}</option>
                                @endforeach
                            </select>
                            @error('reader_id')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Tên sách</label>
                            <select class="form-control" name="book_id" required>
                                <option value="">Chọn tên sách</option>
                                @foreach ($books as $book)
                                    <option value='{{ $book->id }}'>{{ $book->name }}</option>
                                @endforeach
                            </select>
                            @error('book_id')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <input type="submit" name="save" class="btn btn-danger" value="Lưu">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
