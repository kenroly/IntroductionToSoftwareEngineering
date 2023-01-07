@extends("layouts.app")
@section('content')
    <div id="admin-content">
        <div class="container">
            <div class="row">
                <div class="offset-md-3 col-md-6">
                    <h2 class="admin-heading text-center">Các sách chưa được trả</h2>
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
                                <th>Ngày mượn</th>
                                <th>Ngày phải trả</th>
                                <th>Số ngày quá hạn</th>
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
                                        <td>{{ $book->return_date->format('d M, Y') }}</td>
                                        <td>@php $date1 = date_create(date('Y-m-d'));
                                            $date2 = date_create($book->return_date->format('d-m-Y'));
                                            if($date1 > $date2){
                                              $diff = date_diff($date1,$date2);
                                              echo $days = $diff->format('%a ngày');
                                            }else{
                                              echo 'Chưa đến hạn trả';
                                            } @endphp</td>
                                    </tr>
                                    @php
                                        $i++;
                                    @endphp
                                @empty
                                    <tr>
                                        <td colspan="10">Không có ghi nhận sách chưa được trả!</td>
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
