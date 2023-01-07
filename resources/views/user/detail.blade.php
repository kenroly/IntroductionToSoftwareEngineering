@extends('layouts.app')
@section('content')
    <div id="admin-content">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h2 class="admin-heading">Thông tin nhân viên</h2>
                </div>
            </div>
            <div class="row">
                <div class="offset-md-3 col-md-6">
                    <div class="yourform">
                        <div class="form-group">
                            <label>Tên nhân viên</label>
                            <input type="text" class="form-control" value="{{ $user['name'] }}" disabled>
                        </div>
    
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" value="{{ $user['username'] }}" disabled>
                        </div>

                        <div class="form-group">
                            <label>Địa chỉ</label>
                            <input type="text" class="form-control" value="{{ $user['address'] }}" disabled>
                        </div>
                        
                        <div class="form-group">
                            <label>Ngày sinh</label>
                            <input type="text" class="form-control" value="{{ $user['dob'] }}" disabled>
                        </div>

                        <div class="form-group">
                            <label>Số điện thoại</label>
                            <input type="text" class="form-control" value="{{ $user['phone'] }}" disabled>
                        </div>

                        <div class="form-group">
                            <label>Bằng cấp</label>
                            <input type="text" class="form-control" value="{{ $user['degree'] }}" disabled>
                        </div>

                        <div class="form-group">
                            <label>Bộ phận</label>
                            <input type="text" class="form-control" value="{{ $user['department'] }}" disabled>
                        </div>
                        
                        <div class="form-group">
                            <label>Chức vụ</label>
                            <input type="text" class="form-control" value="{{ $user['position'] }}" disabled>
                        </div>
    
                        <a class="btn btn-light" href="{{ route('users') }}">Quay lại</a>

                        @if (Auth::user()->department == 'Thủ kho' || Auth::user()->department == 'Ban giám đốc')
                            <a class="btn btn-danger" href="{{ route('user.edit', $user['id']) }}" style="color: white">Chỉnh sửa</a>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
