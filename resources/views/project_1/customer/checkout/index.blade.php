@extends('project_1.customer.layouts.layout')

@section('content')
    <main>
        <div class="container">
            @if ($errors->any())
                <div class="alert alert-danger mx-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show mx-4" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @elseif (session('error'))
                <div class="alert alert-danger alert-dismissible fade show mx-4" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form action="{{route('checkout.handle', $product)}}" method="post">
                @csrf
                <input type="hidden" name="quantity" value="{{$quantity}}">
                <input type="hidden" name="total_price" value="{{$total_price}}">
                <div class="row">
                    <div class="col-7">
                        <div class="information p-3 border  shadow">
                            <p class="fs-4 fw-medium text-center">Thông tin khách hàng</p>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="name" id="fullname" placeholder="Họ và tên">
                                <label for="fullname">Họ và tên</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" name="email" id="floatingInput" placeholder="email">
                                <label for="floatingInput">Email</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="phone" id="phone" placeholder="Số điện thoại">
                                <label for="phone">Số điện thoại</label>
                            </div>

                            <div class="form-floating mb-3">
                                <textarea class="form-control" placeholder="Địa chỉ" name="address" id="floatingTextarea2" style="height: 100px"></textarea>
                                <label for="floatingTextarea2">Địa chỉ</label>
                            </div>

                        </div>
                    </div>
                    <div class="col-5">
                        <div class="product_infor border border-dark-subtle p-3" >
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            Sản phẩm
                                        </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="row">
                                                <div class="col-3">
                                                    <div class="image">
                                                        <img src="{{asset(Storage::url($product->image_path))}}" alt="" class="img-fluid">
                                                    </div>
                                                </div>
                                                <div class="col-9">
                                                    <div>
                                                        <div class="name">
                                                            <span>{{$product->name}}</span>
                                                        </div>
                                                        <div class="sl">
                                                            <span >Số lượng: {{$quantity}}</span>
                                                        </div>
                                                        <div class="price">
                                                            <span>Giá :</span>
                                                            <span class="text-danger">{{$product->price}}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="border-bottom border-2 mb-4 py-4">
                                <div class="d-flex justify-content-between ">
                                    <span>Tạm tính</span>
                                    <span class="text-danger">{{$total_price}}đ</span>
                                </div>
                                <div class="d-flex justify-content-between "> 
                                    <span>Phí ship</span>
                                    <span class="text-danger">0 đ</span>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between my-3">
                                <span class="fs-5">Tổng cộng</span>
                                <span class="fs-5 text-danger">{{$total_price}}đ</span>
                            </div>

                            <div>
                                <button type="submit" class="btn btn-warning">Thanh toán vnpay</button>
                            </div>


                        </div>

                    </div>
                </div>
            </form>
            
        </div>
    </main>
@endsection