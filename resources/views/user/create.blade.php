@extends('layouts.app')
@section('content')
    <div id="admin-content">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h2 class="admin-heading">Thêm nhân viên</h2>
                </div>
                <div class="offset-md-5 col-md-4">
                    <a class="add-new" href="{{ route('users') }}">Danh sách nhân viên</a>
                </div>
            </div>
            <div class="row">
                <div class="offset-md-3 col-md-6">
                    <form class="yourform" action="{{ route('user.store') }}" method="post" autocomplete="off">
                        @csrf
                        <div class="form-group">
                            <label>Tên nhân viên</label>
                            <input type="text" class="form-control" placeholder="Tên nhân viên" name="name"
                                value="{{ old('name') }}" required>
                            @error('name')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" placeholder="Username" name="username"
                                value="{{ old('username') }}" required>
                            @error('username')
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
                            <label>Ngày sinh</label>
                            <input type="date" name="dob" class="form-control" value="{{ date('Y-m-d') }}">
                            @error('dob')
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
                            <label>Bằng cấp</label>
                            <select name="degree" class="form-control">
                                <option value="Tú tài" selected>Tú tài</option>
                                <option value="Trung cấp">Trung cấp</option>
                                <option value="Cao đẳng">Cao đẳng</option>
                                <option value="Đại học">Đại học</option>
                                <option value="Thạc sĩ">Thạc sĩ</option>
                                <option value="Tiến sĩ">Tiến sĩ</option>
                            </select>
                            @error('degree')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Bộ phận</label>
                            <select id="departmentSelect" name="department" class="form-control">
                                <option value="Thủ thư" selected>Thủ thư</option>
                                <option value="Thủ kho">Thủ kho</option>
                                <option value="Thủ quỹ">Thủ quỹ</option>
                                <option value="Ban giám đốc">Ban giám đốc</option>
                            </select>
                            @error('department')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Chức vụ</label>
                            <select id="positionSelect" name="position" class="form-control">
                                {{-- <option value="" selected>Lựa chọn chức vụ</option> --}}
                               <option value="Giám đốc">Giám đốc</option>
                               <option value="Phó giám đốc">Phó giám đốc</option>
                               <option value="Trưởng phòng">Trưởng phòng</option >
                               <option value="Phó phòng">Phó phòng</option>
                               <option value="Nhân viên" selected>Nhân viên</option>
                            </select>
                            @error('position')
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

<script>
    let $document = $(document);
    $document.ready(function() {
        $('#departmentSelect').change(function (){
            let department = $(this).val();
            alert(department);

            if (department === 'Ban giám đốc') {
                $('#positionSelect').html('<option value="Giám đốc" selected>Giám đốc</option><option value="Phó giám đốc">Phó giám đốc</option> <option value="Trưởng phòng">Trưởng phòng</option > <option value="Phó phòng">Phó phòng</option> <option value="Nhân viên">Nhân viên</option>');
            } else {
                $('#positionSelect').html('<option value="Trưởng phòng">Trưởng phòng</option > <option value="Phó phòng">Phó phòng</option> <option value="Nhân viên">Nhân viên</option>');
            }
        });
    });

</script>
