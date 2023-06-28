@extends("layouts.app")
@section('content')
    <div id="admin-content">
        <div class="container">
            <div class="row">
                <div class="offset-md-4 col-md-4">
                    <h2 class="admin-heading text-center">Các báo cáo</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body text-center">
                            <a href="{{ route('reports.date_wise') }}" class="card-link">
                                <h5 class="card-title mb-0">Báo cáo theo ngày</h5>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body text-center">
                            <a href="{{ route('reports.month_wise') }}" class="card-link">
                                <h5 class="card-title mb-0">Báo cáo theo tháng</h5>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body text-center">
                            <a href="{{ route('reports.not_returned') }}" class="card-link">
                                <h5 class="card-title mb-0">Sách chưa được trả</h5>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if (Auth::user()->department == "Ban giám đốc" || Auth::user()->department == "Thủ quỹ")
            <br><br>
            <div class="container">
                <div class="row">
                    <div class="offset-md-4 col-md-4">
                        <h2 class="admin-heading text-center">Tiền phạt</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body text-center">
                                <a href="{{ route('reports.fine_search') }}" class="card-link">
                                    <h5 class="card-title mb-0">Tra cứu tiền phạt</h5>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body text-center">
                                <a href="{{ route('reports.late_returned', 'all') }}" class="card-link">
                                    <h5 class="card-title mb-0">Phạt trả sách muộn</h5>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body text-center">
                                <a href="{{ route('reports.fine_lost', 'all') }}" class="card-link">
                                    <h5 class="card-title mb-0">Phạt mất sách</h5>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
