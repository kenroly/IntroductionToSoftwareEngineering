@extends("layouts.app")
@section('content')
    <div id="admin-content">
        <div class="container">
            <div class="row">
                <div class="offset-md-3 col-md-6">
                    <h2 class="admin-heading text-center">Các hoá đơn phạt sách trả trễ</h2>
                </div>
            </div>
            <div class="dropdown">
                <button style="width:15%;" class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Bộ lọc
                <span class="caret"></span></button>
                <ul class="dropdown-menu">
                  <li><a href="{{ route('reports.fine_lost', 'all') }}">Tất cả</a></li>
                  <li><a href="{{ route('reports.fine_lost', 'paid') }}">Đã thanh toán</a></li>
                  <li><a href="{{ route('reports.fine_lost', 'unpaid') }}">Chưa thanh toán</a></li>
                </ul>
              </div>
            @if ($books)
                <div class="row">
                    <div class="col-md-12">
                        <table class="content-table">
                            <thead>
                                <th>STT</th>
                                <th>Tên độc giả</th>
                                <th>Tên sách</th>
                                <th>Ngày mượn</th>
                                <th>Số ngày mượn</th>
                                <th>Số tiền phạt</th>
                                <th>Tình trạng</th>
                                <th>Thanh toán</th>
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
                                        <td>{{ $book->issue_date->format('d M, Y') }}</td>
                                        <td style="text-align:center;">
                                            @php
                                            $date1 = date_create($book->return_day->format('d-m-Y'));
                                            $date2 = date_create($book->return_date->format('d-m-Y'));
                                            if($date1 > $date2){
                                              $diff = date_diff($date1,$date2);
                                              echo $days = $diff->format('%a ngày');
                                            }
                                            @endphp
                                        </td>
                                        <td>
                                            @php
                                                $date1 = date_create($book->return_day->format('d-m-Y'));
                                                $date2 = date_create($book->return_date->format('d-m-Y'));
                                                if($date1 > $date2){
                                                  $diff = date_diff($date1,$date2);
                                                  $days = $diff->format('%a');
                                                  $fine = $days * 1000;
                                                  echo $fine . " Đồng";
                                                }
                                            @endphp
                                        </td>
                                        <td>
                                            @if ($book->fine_status == "N")
                                                <span class="badge badge-warning">Chưa trả</span>
                                            @else
                                                <span class="badge badge-success">Đã trả</span>
                                            @endif
                                        </td>
                                        <td>
                                            <form action="{{ route('book_issue.paid') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $book->id }}">
                                                @if ($book->fine_status == "N")
                                                <input type="submit" class="btn btn-danger" value="Thanh toán">
                                                @else
                                                <span class="badge badge-success">Đã thanh toán</span>
                                                @endif
                                            </form>

                                        </td>
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
