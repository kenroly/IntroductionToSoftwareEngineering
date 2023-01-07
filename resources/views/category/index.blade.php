@extends('layouts.app')
@section('content')
    <div id="admin-content">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h2 class="admin-heading">Danh sách danh mục</h2>
                </div>
                <div class="offset-md-6 col-md-2">
                    <a class="add-new" href="{{ route('category.create') }}">Tạo danh mục</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="message"></div>
                    <table class="content-table">
                        <thead>
                            <th>STT</th>
                            <th>Tên danh mục</th>
                            <th>Sửa</th>
                            <th>Xoá</th>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @forelse ($categories as $category)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td class="edit">
                                        <a href="{{ route('category.edit', $category) }}" class="btn btn-success">Sửa</a>
                                    </td>
                                    <td class="delete">
                                        <form action="{{ route('category.destroy', $category) }}" method="post"
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
                                    <td colspan="4">Không có danh mục nào.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $categories->links('vendor/pagination/bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
@endsection
