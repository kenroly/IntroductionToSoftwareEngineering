@extends('layouts.app')
@section('content')
    <div id="admin-content">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h2 class="admin-heading">Danh sách loại độc giả</h2>
                </div>
                <div class="offset-md-5 col-md-3">
                    <a class="add-new" href="{{ route('type.create') }}">Thêm loại độc giả</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="message"></div>
                    <table class="content-table">
                        <thead>
                            <th>STT</th>
                            <th>Tên loại độc giả</th>
                            <th>Sửa</th>
                            <th>Xoá</th>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;                                
                            @endphp
                            @forelse ($types as $type)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $type->name }}</td>
                                    <td class="edit">
                                        <a href="{{ route('type.edit', $type) }}" class="btn btn-success">Sửa</a>
                                    </td>
                                    <td class="delete">
                                        <form action="{{ route('type.destroy', $type->id) }}" method="post"
                                            class="form-hidden">
                                            <button class="btn btn-danger delete-type">Xoá</button>
                                            @csrf
                                        </form>
                                    </td>
                                </tr>
                                @php
                                    $i++;
                                @endphp
                            @empty
                                <tr>
                                    <td colspan="4">Không có loại độc giả.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $types->links('vendor/pagination/bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
@endsection
