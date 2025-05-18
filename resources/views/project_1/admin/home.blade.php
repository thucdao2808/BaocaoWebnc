@extends('project_1.admin.layouts.layout')
@section('css')
 <link rel="stylesheet" href="{{asset('css/project_1/chart.css')}}">
@endsection
@section('content')
    

    <div class="container mt-4">
        <h4 class="mr-2 font-weight-bold mb-4">
            <i class="fas fa-chart-bar"></i> Thống kê Bán Hàng 

        </h4>

        <form action="{{ route('statistics.filter') }}" method="GET" class="form-inline mb-4">
            <div class="form-row align-items-center">
                <div class="col-auto">
                <label for="from" class="">Từ ngày:</label>

                <input type="date" name="from" id="from" class="form-control mb-2"style="width:30% " required value="{{ request('from') }}">
                </div>
                <div class="col-auto">
                <label for="to" class="mr-2 font-weight-bold">Đến ngày:</label>
                <input type="date" name="to" id="to" class="form-control mb-2" style="width:30% " required value="{{ request('to') }}">
                </div>
                <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-2"><i class="fas fa-search"></i> Tìm kiếm</button>
                </div>
            </div>
        </form>


        <!-- Doanh thu theo ngày -->
        <div class="card mb-4">
            <div class="card-header bg-info text-white">📅 Doanh thu 7 ngày gần nhất</div>
            <div class="card-body">
                <table class="table table-bordered table-sm">
                    <thead class="thead-light">
                        <tr>
                            <th>Ngày</th>
                            <th>Số đơn hàng</th>
                            <th>Tổng sản phẩm bán</th>
                            <th>Doanh thu (VNĐ)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dailyStats as $row)
                            <tr>
                                <td>{{ \Carbon\Carbon::parse($row['date'])->format('Y-m-d') }}</td>
                                <td>{{ $row['total_orders'] }}</td>
                                <td>{{ $row['total_products'] ?? 0 }}</td>
                                <td>{{ number_format($row['total_revenue'] ?? 0, 0, ',', '.') }}</td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <h4 style="margin-bottom: 10px">Biểu đồ Doanh thu theo ngày</h4>
        <canvas id="revenueChart" height="100"></canvas>


        <!-- Sản phẩm bán chạy -->
        <h4 class="mt-5">🥇 Sheet 2: Top 5 sản phẩm bán chạy tuần này</h4>
        <table class="table table-bordered mt-2">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên sản phẩm</th>
                    <th>Mã SP</th>
                    <th>Số lượng bán</th>
                    <th>Doanh thu (VNĐ)</th>
                </tr>
            </thead>
            <tbody>
                @foreach($topProducts as $index => $product)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $product->product_name }}</td>
                        <td>{{ $product->product_id }}</td>
                        <td>{{ $product->total_quantity }}</td>
                        <td>{{ number_format($product->total_revenue, 0, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <form action="{{ route('statistics.export') }}" method="GET" class="mb-3">
            <input type="hidden" name="from" value="{{ request('from') }}">
            <input type="hidden" name="to" value="{{ request('to') }}">
            <button type="submit" class="btn btn-success" style=" margin-top:10px"><i class="fas fa-file-excel text-success"></i> Xuất Excel</button>
        </form>
    </div>



@endsection
@section('js')
<!-- Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Custom chart logic -->
<script>
    const labels = {!! json_encode(collect($dailyStats)->pluck('date')) !!};
    const data = {!! json_encode(collect($dailyStats)->pluck('total_revenue')) !!};
</script>

<script src="{{ asset('js/project_1/chart.js') }}"></script>

    
@endsection