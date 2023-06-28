@extends('layouts.app')
@section('content')
    <div id="admin-content">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h2 class="admin-heading">Danh sách nhân viên</h2>
                </div>
                <div class="offset-md-5 col-md-3">
                    <a class="add-new" href="{{ route('user.create') }}">Thêm nhân viên</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="message"></div>
                    <table class="content-table">
                        <thead>
                            <th>STT</th>
                            <th>Tên nhân viên</th>
                            <th>Số điện thoại</th>
                            <th>Bộ phận</th>
                            <th>Chức vụ</th>
                            <th>Xem</th>
                            <th>Chỉnh sửa</th>
                            <th>Xoá</th>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @forelse ($users as $user)
                                <tr>
                                    <td class="id">{{ $i }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>{{ $user->department }}</td>
                                    <td style="text-align: center;">{{ $user->position }}</td>
                                    <td class="view">
                                        <a href="{{ route('user.show', $user->id) }}"
                                            class="btn btn-primary view-btn">Xem</a>
                                    </td>
                                    <td class="edit" style="text-align: center;">
                                        <a href="{{ route('user.edit', $user) }}" class="btn btn-success">Sửa</a>
                                    </td>
                                    <td class="delete">
                                        <form action="{{ route('user.destroy', $user->id) }}" method="post"
                                            class="form-hidden">
                                            <button class="btn btn-danger delete-user">Xoá</button>
                                            @csrf
                                        </form>
                                    </td>
                                </tr>
                                @php
                                    $i++;
                                @endphp
                            @empty
                                <tr>
                                    <td colspan="8">Không có nhân viên.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $users->links('vendor/pagination/bootstrap-4') }}
                    <div id="modal">
                        <div id="modal-form">
                            <table cellpadding="10px" width="100%">

                            </table>
                            <div id="close-btn">X</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
