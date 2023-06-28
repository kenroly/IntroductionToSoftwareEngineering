@extends('layouts.app')
@section('content')
    <div id="admin-content">
        <div class="container">
            <div class="row">
                <div class="offset-md-3 col-md-6">
                    <h2 class="admin-heading text-center">Báo cáo sách mượn theo ngày</h2>
                </div>
            </div>
            <div class="row">
                <div class="offset-md-4 col-md-4">
                    <form class="yourform mb-5" action="{{ route('reports.date_wise_generate') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <input type="date" name="date" class="form-control" value="{{ date('Y-m-d') }}">
                            @error('date')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <input type="submit" class="btn btn-danger" name="search_date" value="Tìm kiếm">
                    </form>
                </div>
            </div>
            @if ($books)
                <div class="row">
                    <div class="col-md-12">
                        <table class="content-table">
                            <thead>
                                <th>STT</th>
                                <th>Tên độc giả</th>
                                <th>Tên sách</th>
                                <th>Số điện thoại</th>
                                <th>Email</th>
                                <th>Ngày mượn sách</th>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @forelse ($books as $book)
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $book->reader->name }}</td>
                                        <td>{{ $book->book->name }}</td>
                                        <td>{{ $book->reader->phone }}</td>
                                        <td>{{ $book->reader->email }}</td>
                                        <td>{{ $book->issue_date->format('d M, Y') }}</td>
                                    </tr>
                                    @php
                                        $i++;
                                    @endphp
                                @empty
                                    <tr>
                                        <td colspan="10">Không có ghi nhận mượn sách!</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
        @endif
    </div>
    </div>
@endsection
