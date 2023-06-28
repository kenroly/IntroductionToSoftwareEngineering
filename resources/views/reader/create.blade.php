@extends('layouts.app')
@section('content')
    <div id="admin-content">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h2 class="admin-heading">Thêm độc giả</h2>
                </div>
                <div class="offset-md-5 col-md-4">
                    <a class="add-new" href="{{ route('readers') }}">Danh sách độc giả</a>
                </div>
            </div>
            <div class="row">
                <div class="offset-md-3 col-md-6">
                    <form class="yourform" action="{{ route('reader.store') }}" method="post" autocomplete="off">
                        @csrf
                        <div class="form-group">
                            <label>Tên độc giả</label>
                            <input type="text" class="form-control" placeholder="Tên độc giả" name="name"
                                value="{{ old('name') }}" required>
                            @error('name')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Địa chỉ</label>
                            <input type="text" class="form-control" placeholder="Địa chỉ" name="address"
                                value="{{ old('address') }}" required>
                            @error('address')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Giới tính</label>
                            <select name="gender" class="form-control">
                                <option value="Nam" selected>Nam</option>
                                <option value="Nữ">Nữ</option>
                            </select>
                            @error('gender')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Tuổi</label>
                            <input type="number" class="form-control" placeholder="Tuổi" name="age"
                                value="{{ old('age') }}" required>
                            @error('age')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Số điện thoại</label>
                            <input type="phone" class="form-control" placeholder="Số điện thoại" name="phone"
                                value="{{ old('phone') }}" required>
                            @error('phone')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" placeholder="Email" name="email"
                                value="{{ old('email') }}" required>
                            @error('email')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Loại độc giả</label>
                            <select class="form-control @error('type_id') isinvalid @enderror " name="type_id" required>
                                <option value="">Chọn loại độc giả</option>
                                @foreach ($types as $type)
                                    <option value='{{ $type->id }}'>{{ $type->name }}</option>";
                                @endforeach
                            </select>
                            @error('type_id')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div style="display: none;">
                            <input type="text" name="register_date" value="{{ date('Y-m-d') }}" disable>
                            <input type="text" name="expired_date" value="{{ date('Y-m-d', strtotime('+6 month')) }}" disable>
                            <input type="text" name="user_id" value="{{ Auth::user()->id }}" disable>
                        </div>
                        <input type="submit" name="save" class="btn btn-danger" value="Lưu">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
