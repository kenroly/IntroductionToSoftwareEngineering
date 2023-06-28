@extends('layouts.app')
@section('content')
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h2 class="admin-heading">Thêm loại độc giả</h2>
            </div>
            <div class="offset-md-5 col-md-4">
              <a class="add-new" href="{{ route('types') }}">Danh sách loại độc giả</a>
            </div>
        </div>
        <div class="row">
            <div class="offset-md-3 col-md-6">
                <form class="yourform" action="{{ route('type.store') }}" method="post" autocomplete="off">
                    @csrf
                    <div class="form-group">
                        <label>Tên loại độc giả</label>
                        <input type="text" class="form-control @error('name') isinvalid @enderror" placeholder="Tên loại độc giả" name="name" value="{{ old('name') }}" required>
                        @error('name')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <input type="submit" name="save" class="btn btn-danger" value="Lưu" required>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
