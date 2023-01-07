@extends('layouts.app')
@section('content')
    <div id="admin-content">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h2 class="admin-heading">Đặt lại mật khẩu</h2>
                </div>
            </div>
            <div class="row">
                <div class="offset-md-3 col-md-6">
                    <form class="yourform" action="{{ route('change_password') }}" method="post" autocomplete="off">
                        @csrf
                        <div class="form-group">
                            <label>Mật khẩu hiện tại</label>
                            <input type="password" class="form-control" name="c_password" value=""
                                required>
                            @error('c_password')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Mật khẩu mới</label>
                            <input type="password" class="form-control" name="password" value="" required>
                            @error('new_password')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Xác nhận lại mật khẩu</label>
                            <input type="password" class="form-control" name="password_confirmation" value="" required>
                            @error('new_password')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <input type="submit" class="btn btn-danger" value="Update" required>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
