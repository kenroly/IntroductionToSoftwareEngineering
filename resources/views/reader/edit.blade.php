@extends('layouts.app')
@section('content')
    <div id="admin-content">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <h2 class="admin-heading">Cập nhật thông tin độc giả</h2>
                </div>
            </div>
            <div class="row">
                <div class="offset-md-3 col-md-6">
                    <form class="yourform" action="{{ route('reader.update', $reader->id) }}" method="post"
                        autocomplete="off">
                        @csrf
                        <div class="form-group">
                            <label>Tên độc giả</label>
                            <input type="text" class="form-control" placeholder="Tên độc giả" name="name"
                                value="{{ $reader->name }}" required>
                            @error('name')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Địa chỉ</label>
                            <input type="text" class="form-control" placeholder="Địa chỉ" name="address"
                                value="{{ $reader->address }}" required>
                            @error('address')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Giới tính</label>
                            <select name="gender" class="form-control">
                                @if ($reader->gender == 'Nam')
                                    <option value="Nam" selected>Nam</option>
                                    <option value="Nữ">Nữ</option>
                                @else
                                    <option value="Nam">Nam</option>
                                    <option value="Nữ" selected>Nữ</option>
                                @endif
                            </select>
                            @error('gender')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Age</label>
                            <input type="number" class="form-control" placeholder="Nữ" name="age"
                                value="{{ $reader->age }}" required>
                            @error('age')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Số điện thoại</label>
                            <input type="phone" class="form-control" placeholder="Số điện thoại" name="phone"
                                value="{{ $reader->phone }}" required>
                            @error('phone')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" placeholder="Email" name="email"
                                value="{{ $reader->email }}" required>
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
                                    @if ($type->id == $reader->type_id)
                                        <option value="{{ $type->id }}" selected>{{ $type->name }}</option>
                                    @else
                                    <option value="{{ $type->id }}">{{ $type->name }}</option>";
                                    @endif
                                @endforeach
                            </select>
                            @error('type_id')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div style="display: none;">
                            <input type="text" name="register_date" value="{{ $reader->register_date }}" disable>
                            <input type="text" name="expired_date" value="{{ $reader->expired_date }}" disable>
                            <input type="text" name="user_id" value="{{ $reader->user_id }}" disable>
                        </div>
                        <input type="submit" name="save" class="btn btn-danger" value="Cập nhật">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
