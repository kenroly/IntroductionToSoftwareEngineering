@extends('layouts.app')
@section('content')
    <div id="admin-content">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h2 class="admin-heading">Danh sách độc giả</h2>
                </div>
                @if (Auth::user()->department == 'Thủ thư' || Auth::user()->department == 'Ban giám đốc')
                    <div class="offset-md-4 col-md-2">
                        <a class="add-new" href="{{ route('reader.create') }}">Thêm độc giả</a>
                    </div>
                    <div class="col-md-2">
                        <a class="add-new" href="{{ route('types') }}">Loại độc giả</a>
                    </div>
                @endif
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="message"></div>
                    <table class="content-table">
                        <thead>
                            <th>STT</th>
                            <th>Tên độc giả</th>
                            <th>Giới tính</th>
                            <th>Loại độc giả</th>
                            <th>Số điện thoại</th>
                            <th>Email</th>
                            <th>Xem</th>
                            @if (Auth::user()->department == 'Thủ thư' || Auth::user()->department == 'Ban giám đốc')
                                <th>Sửa</th>
                                <th>Xoá</th>
                            @endif
                        </thead>
                        <tbody>
                            @php
                            $i = 1
                            @endphp
                            @forelse ($readers as $reader)
                                <tr>
                                    <td class="id">{{ $i }}</td>
                                    <td>{{ $reader->name }}</td>
                                    <td class="text-capitalize">{{ $reader->gender }}</td>
                                    <td>{{ $reader->type }}</td>
                                    <td>{{ $reader->phone }}</td>
                                    <td>{{ $reader->email }}</td>
                                    <td class="view">
                                        <a href="{{ route('reader.show', $reader->id) }}" class="btn btn-primary view-btn">Xem</a>
                                    </td>
                                    @if (Auth::user()->department == 'Thủ thư' || Auth::user()->department == 'Ban giám đốc')
                                        <td class="edit">
                                            <a href="{{ route('reader.edit', $reader->id) }}"  class="btn btn-success">Sửa</a>
                                        </td>
                                        <td class="delete">
                                            <form action="{{ route('reader.destroy', $reader->id) }}" method="post"
                                                class="form-hidden">
                                                <button class="btn btn-danger delete-reader">Xoá</button>
                                                @csrf
                                            </form>
                                        </td>
                                    @endif
                                </tr>
                                @php
                                $i++;
                                @endphp
                            @empty
                                <tr>
                                    <td colspan="8">Không có độc giả.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $readers->links('vendor/pagination/bootstrap-4') }}
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
