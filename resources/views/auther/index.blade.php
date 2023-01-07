@extends('layouts.app')
@section('content')
    <div id="admin-content">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h2 class="admin-heading">Danh sách tác giả</h2>
                </div>
                <div class="offset-md-6 col-md-2">
                    <a class="add-new" href="{{ route('authors.create') }}">Thêm tác giả</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="message"></div>
                    <table class="content-table">
                        <thead>
                            <th>STT</th>
                            <th>Tên tác giả</th>
                            <th>Sửa</th>
                            <th>Xoá</th>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;                                
                            @endphp
                            @forelse ($authors as $auther)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $auther->name }}</td>
                                    <td class="edit">
                                        <a href="{{ route('authors.edit', $auther) }}" class="btn btn-success">Sửa</a>
                                    </td>
                                    <td class="delete">
                                        <form action="{{ route('authors.destroy', $auther->id) }}" method="post"
                                            class="form-hidden">
                                            <button class="btn btn-danger delete-author">Xoá</button>
                                            @csrf
                                        </form>
                                    </td>
                                </tr>
                                @php
                                    $i++;
                                @endphp
                            @empty
                                <tr>
                                    <td colspan="4">Không có tác giả.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $authors->links('vendor/pagination/bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
@endsection
