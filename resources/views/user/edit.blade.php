@extends('layouts.app')
@section('content')
    <div id="admin-content">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <h2 class="admin-heading">Chỉnh sửa thông tin nhân viên</h2>
                </div>
            </div>
            <div class="row">
                <div class="offset-md-3 col-md-6">
                    <form class="yourform" action="{{ route('user.update', $user->id) }}" method="post"
                        autocomplete="off">
                        @csrf
                        <div class="form-group">
                            <label>Tên nhân viên</label>
                            <input type="text" class="form-control" placeholder="Tên nhân viên" name="name"
                                value="{{ $user->name }}" required>
                            @error('name')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" placeholder="Username" name="username"
                                value="{{ $user->username }}" required>
                            @error('username')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Địa chỉ</label>
                            <input type="text" class="form-control" placeholder="Địa chỉ" name="address"
                                value="{{ $user->address }}" required>
                            @error('address')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Ngày sinh</label>
                            <input type="date" name="dob" class="form-control" value="{{ $user->dob }}">
                            @error('dob')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Số điện thoại</label>
                            <input type="phone" class="form-control" placeholder="Số điện thoại" name="phone"
                                value="{{ $user->phone }}" required>
                            @error('phone')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Bằng cấp</label>
                            <select name="degree" class="form-control">
                                @if ($user->degree == 'Tú tài')
                                    <option value="Tú tài" selected>Tú tài</option>
                                    <option value="Trung cấp">Trung cấp</option>
                                    <option value="Cao đẳng">Cao đẳng</option>
                                    <option value="Đại học">Đại học</option>
                                    <option value="Thạc sĩ">Thạc sĩ</option>
                                    <option value="Tiến sĩ">Tiến sĩ</option>
                                @elseif ($user->degree == 'Trung cấp')
                                    <option value="Tú tài">Tú tài</option>
                                    <option value="Trung cấp" selected>Trung cấp</option>
                                    <option value="Cao đẳng">Cao đẳng</option>
                                    <option value="Đại học">Đại học</option>
                                    <option value="Thạc sĩ">Thạc sĩ</option>
                                    <option value="Tiến sĩ">Tiến sĩ</option>
                                @elseif ($user->degree == 'Cao đẳng')
                                    <option value="Tú tài">Tú tài</option>
                                    <option value="Trung cấp">Trung cấp</option>
                                    <option value="Cao đẳng" selected>Cao đẳng</option>
                                    <option value="Đại học">Đại học</option>
                                    <option value="Thạc sĩ">Thạc sĩ</option>
                                    <option value="Tiến sĩ">Tiến sĩ</option>
                                @elseif ($user->degree == 'Đại học')
                                    <option value="Tú tài">Tú tài</option>
                                    <option value="Trung cấp">Trung cấp</option>
                                    <option value="Cao đẳng">Cao đẳng</option>
                                    <option value="Đại học" selected>Đại học</option>
                                    <option value="Thạc sĩ">Thạc sĩ</option>
                                    <option value="Tiến sĩ">Tiến sĩ</option>
                                @elseif ($user->degree == 'Thạc sĩ')
                                    <option value="Tú tài">Tú tài</option>
                                    <option value="Trung cấp">Trung cấp</option>
                                    <option value="Cao đẳng">Cao đẳng</option>
                                    <option value="Đại học">Đại học</option>
                                    <option value="Thạc sĩ" selected>Thạc sĩ</option>
                                    <option value="Tiến sĩ">Tiến sĩ</option>
                                @elseif ($user->degree == 'Tiến sĩ')
                                    <option value="Tú tài">Tú tài</option>
                                    <option value="Trung cấp">Trung cấp</option>
                                    <option value="Cao đẳng">Cao đẳng</option>
                                    <option value="Đại học">Đại học</option>
                                    <option value="Thạc sĩ">Thạc sĩ</option>
                                    <option value="Tiến sĩ" selected>Tiến sĩ</option>
                                @endif
                            </select>
                            @error('degree')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Bộ phận</label>
                            <select name="department" class="form-control">
                                @if ($user->department == 'Thủ thư')
                                    <option value="Thủ thư" selected>Thủ thư</option>
                                    <option value="Thủ kho">Thủ kho</option>
                                    <option value="Thủ quỹ">Thủ quỹ</option>
                                    <option value="Ban giám đốc">Ban giám đốc</option>
                                @elseif ($user->department == 'Thủ kho')
                                    <option value="Thủ thư">Thủ thư</option>
                                    <option value="Thủ kho" selected>Thủ kho</option>
                                    <option value="Thủ quỹ">Thủ quỹ</option>
                                    <option value="Ban giám đốc">Ban giám đốc</option>
                                @elseif ($user->department == 'Thủ quỹ')
                                    <option value="Thủ thư">Thủ thư</option>
                                    <option value="Thủ kho">Thủ kho</option>
                                    <option value="Thủ quỹ" selected>Thủ quỹ</option>
                                    <option value="Ban giám đốc">Ban giám đốc</option>
                                @elseif ($user->department == 'Ban giám đốc')
                                    <option value="Thủ thư">Thủ thư</option>
                                    <option value="Thủ kho">Thủ kho</option>
                                    <option value="Thủ quỹ">Thủ quỹ</option>
                                    <option value="Ban giám đốc" selected>Ban giám đốc</option>
                                @endif
                            </select>
                            @error('department')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Chức vụ</label>
                            <select name="position" class="form-control">
                                @if ($user->position == 'Giám đốc')
                                    <option value="Giám đốc" selected>Giám đốc</option>
                                    <option value="Phó giám đốc">Phó giám đốc</option>
                                    <option value="Trưởng phòng">Trưởng phòng</option >
                                    <option value="Phó phòng">Phó phòng</option>
                                    <option value="Nhân viên">Nhân viên</option>
                                @elseif ($user->position == 'Phó giám đốc')
                                    <option value="Giám đốc">Giám đốc</option>
                                    <option value="Phó giám đốc" selected>Phó giám đốc</option>
                                    <option value="Trưởng phòng">Trưởng phòng</option >
                                    <option value="Phó phòng">Phó phòng</option>
                                    <option value="Nhân viên">Nhân viên</option>
                                @elseif ($user->position == 'Trưởng phòng')
                                    <option value="Giám đốc">Giám đốc</option>
                                    <option value="Phó giám đốc">Phó giám đốc</option>
                                    <option value="Trưởng phòng" selected>Trưởng phòng</option >
                                    <option value="Phó phòng">Phó phòng</option>
                                    <option value="Nhân viên">Nhân viên</option>
                                @elseif ($user->position == 'Phó phòng')
                                    <option value="Giám đốc">Giám đốc</option>
                                    <option value="Phó giám đốc">Phó giám đốc</option>
                                    <option value="Trưởng phòng">Trưởng phòng</option >
                                    <option value="Phó phòng" selected>Phó phòng</option>
                                    <option value="Nhân viên">Nhân viên</option>
                                @elseif ($user->position == 'Nhân viên')
                                    <option value="Giám đốc">Giám đốc</option>
                                    <option value="Phó giám đốc">Phó giám đốc</option>
                                    <option value="Trưởng phòng">Trưởng phòng</option >
                                    <option value="Phó phòng">Phó phòng</option>
                                    <option value="Nhân viên" selected>Nhân viên</option>
                                @endif
                            </select>
                            @error('position')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <input type="submit" name="save" class="btn btn-danger" value="Cập nhật">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
