@extends("layouts.app")
@section('content')
    <div id="admin-content">
        <div class="container">
            <div class="row">
                <div class="offset-md-3 col-md-6">
                    <h2 class="admin-heading text-center">Báo cáo cho mượn sách theo tháng</h2>
                </div>
            </div>
            <div class="row">
                <div class="offset-md-4 col-md-4">
                    <form class="yourform mb-5" action="{{ route('reports.month_wise_generate') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <input type="month" name="month" class="form-control" value="{{ date('Y-m') }}">
                        </div>
                        <input type="submit" class="btn btn-danger" name="search_month" value="Tìm kiếm">
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
                                <th>Ngày cho mượn</th>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @forelse ($books as $book)
                                    <tr>
                                        <td>{{ $i}}</td>
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
                                        <td colspan="10">No Record Found!</td>
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
