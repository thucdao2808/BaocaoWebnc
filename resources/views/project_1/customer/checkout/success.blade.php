@extends('project_1.customer.layouts.layout')

@section('content')
<div class="text-center">
    <h1 class="text-green-600 text-3xl font-bold">🎉 Thanh toán thành công!</h1>
    <p>Đơn hàng #{{ $order->id }} của bạn đã được xử lý.</p>
    <a href="{{ route('home') }}" class="btn btn-primary mt-4">Quay về trang chủ</a>
</div>
@endsection
