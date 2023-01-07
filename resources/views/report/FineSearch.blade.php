@extends('layouts.app')
@section('content')
    <div id="admin-content">
        <div class="container">
            <div class="row">
                <div class="offset-md-3 col-md-6">
                    <h2 class="admin-heading text-center">Tra cứu tiền phạt</h2>
                </div>
            </div>
            <div class="row">
                <div class="offset-md-4 col-md-4">
                    <form class="yourform mb-5" action="{{ route('reports.generate_reader_for_search') }}" method="get">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="keyword" class="form-control" placeholder="Nhập tên độc giả" value="{{ old('keyword') }}">
                            @error('keyword')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <input type="submit" class="btn btn-danger" name="search_reader" value="Tìm kiếm">
                    </form>
                </div>
            </div>
            @if ($readers)
                <div class="row">
                    <div class="col-md-12">
                        <table class="content-table">
                            <thead>
                                <th>STT</th>
                                <th>Tên độc giả</th>
                                <th>Số điện thoại</th>
                                <th>Email</th>
                                <th>Lựa chọn</th>
                                <th>Thanh toán</th>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @forelse ($readers as $reader)
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $reader->name }}</td>
                                        <td>{{ $reader->phone }}</td>
                                        <td>{{ $reader->email }}</td>
                                        <td style="text-align: center;">
                                            <form action="{{ route('reports.generate_book_issue_for_search') }}" method="GET">
                                                @csrf
                                                <input style="display: None;" name="keyword" value="{{ $keyword }}">
                                                <input style="display: None;" name="id" value="{{ $reader->id }}">
                                                <button type="submit" class="btn btn-primary">Xem chi tiết</button>
                                            </form>
                                        </td>
                                        <td style="text-align: center;">
                                            <form action="{{ route('book_issue.paid') }}" method="POST">
                                                @csrf
                                                <input style="display: None;" name="keyword" value="{{ $keyword }}">
                                                <input style="display: None;" name="reader_id" value="{{ $reader->id }}">
                                                <button type="submit" class="btn btn-primary">Thanh toán</button>
                                            </form>
                                    </tr>
                                    @php
                                        $i++;
                                    @endphp
                                @empty
                                    <tr>
                                        <td colspan="10">Không tìm thấy độc giả!</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
        @endif

        @if ($bookIssues)
            <div class="row">
                <div class="col-md-12">
                    <table class="content-table">
                        <thead>
                            <th>STT</th>
                            <th>Tên sách</th>
                            <th>Ngày mượn</th>
                            <th>Ngày trả</th>
                            <th>Số tiền phạt</th>
                            <th>Trạng thái</th>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @forelse ($bookIssues as $bookIssue)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $bookIssue->book->name }}</td>
                                    <td>{{ $bookIssue->issue_date }}</td>
                                    <td>
                                        @if (!empty($bookIssue->return_date))
                                            {{ $bookIssue->return_date }}
                                        @else
                                            Mất sách
                                        @endif
                                    </td>
                                    <td style="text-align: center;">{{ $bookIssue->fine * 1000 }}</td>
                                    <td>
                                        @if ($bookIssue->fine_status == "Y")
                                            <span class="badge badge-success">Đã trả</span>
                                        @else
                                            <span class="badge badge-danger">Chưa trả</span>
                                        @endif
                                    </td>
                                </tr>
                                @php
                                    $i++;
                                @endphp
                            @empty
                                <tr>
                                    <td colspan="10">Không tìm phiếu phạt!</td>
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
