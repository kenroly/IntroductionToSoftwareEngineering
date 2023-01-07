@extends('layouts.app')
@section('content')
    <div id="admin-content">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h2 class="admin-heading">Thông tin độc giả</h2>
                </div>
            </div>
            <div class="row">
                <div class="offset-md-3 col-md-6">
                    <div class="yourform">
                        <div class="form-group">
                            <label>Tên độc giả</label>
                            <input type="text" class="form-control" value="{{ $reader['name'] }}" disabled>
                        </div>
    
                        <div class="form-group">
                            <label>Giới tính</label>
                            <input type="text" class="form-control" value="{{ $reader['gender'] }}" disabled>
                        </div>

                        <div class="form-group">
                            <label>Tuổi</label>
                            <input type="text" class="form-control" value="{{ $reader['age'] }}" disabled>
                        </div>
                        
                        <div class="form-group">
                            <label>Số điện thoại</label>
                            <input type="text" class="form-control" value="{{ $reader['phone'] }}" disabled>
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" value="{{ $reader['email'] }}" disabled>
                        </div>

                        <div class="form-group">
                            <label>Địa chỉ</label>
                            <input type="text" class="form-control" value="{{ $reader['address'] }}" disabled>
                        </div>

                        <div class="form-group">
                            <label>Loại độc giả</label>
                            <input type="text" class="form-control" value="{{ $reader['type'] }}" disabled>
                        </div>
                        
                        <div class="form-group">
                            <label>Người tiếp nhận</label>
                            <input type="text" class="form-control" value="{{ $reader['user'] }}" disabled>
                        </div>

                        <div class="form-group">
                            <label>Ngày đăng ký</label>
                            <input type="text" class="form-control" value="{{ $reader['register_date'] }}" disabled>
                        </div>

                        <div class="form-group">
                            <label>Ngày hết hạn</label>
                            <input type="text" class="form-control" value="{{ $reader['expired_date'] }}" disabled>
                        </div>
    
                        <a class="btn btn-light" href="{{ route('readers') }}">Quay lại</a>
    
                        <a class="btn btn-danger" href="{{ route('reader.edit', $reader['id']) }}" style="color: white">Chỉnh sửa</a>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
