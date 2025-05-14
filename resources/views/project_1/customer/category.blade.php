


@extends('project_1.customer.layouts.layout')

@section('content')
<section>
    <div class="bg-light-pink p-3 d-flex justify-content-center">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item"><a href="#" class="text-decoration-none text-gray">Home</a></li>
              <li class="breadcrumb-item"><a href="#" class="text-decoration-none text-gray">Sách</a></li>
            </ol>
        </nav>
    </div>
</section> 
<div class="container mt-3">
    <div class="row mt-3">
        <div class="col-md-3 sidebar">
            <h6><strong>Thể loại</strong></h6>
            <ul class="list-unstyled category-filter">
                @foreach ($categories as $category)
                    <li class="nav-item">
                        <a class="nav-link fw-bolder 
                            {{ request()->is('category/product/'.$category->id) ? 'active' : '' }}" 
                            href="{{ route('category.product', ['id' => $category->id]) }}">
                            {{$category->name}}
                        </a>
                    </li>
                @endforeach
            </ul>
            <hr>
        </div>
        <div class="col-md-9">
            <div class="d-flex justify-content-between mb-2">
                <div>Có {{ is_null($products) ? 0 : count($products) }} sách</div>
                <div>
                    Sắp xếp theo:
                    <select class="form-control d-inline w-auto">
                    <option>Mới nhất</option>
                    <option>Bán chạy</option>
                    <option>Giá tăng dần</option>
                    </select>
                </div>
            </div>
            <div class="row">
                @foreach ($products as $product)
                <div class="col-xl-3 col-lg-4 col-md-6 col-6 mb-3">
                    <div class="product-meta rounded-3">
                        <a class="product-meta text-decoration-none text-dark " href="{{route('product', $product)}}">
                            <div class="product-img">
                                <img src="{{asset(Storage::url($product->image_path))}}" alt="" class="img-fluid rounded-3"> 
                            </div>
                            <div class="product-content p-2 ">
                                <div class="category">
                                    <span class="text-gray fw-medium" >{{$product->category->name}}</span>
                                </div>
                                <h3 class="fs-6 text-truncate" >{{$product->name}}</h3>
                                <div class="rank d-flex">
                                    <i class="fa-regular fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                </div>
                                <div class="product-price">
                                    <span class="text-danger fw-medium">{{number_format($product->price)}}đ</span>
                                </div>
                                <a href="#" 
                                    class="btn btn-primary  add_to_cart" 
                                    data-url = "{{route('addToCart',['id'=>$product->id])}}"
                                    >
                                    Add To Cart
                                </a>
                            </div>
                        </a>
                    </div>
                    
                </div>
                @endforeach
            </div>
               
             
            {{$products->links()}}
        </div>
      
    </div>
  </div>

@endsection
@section('js')
<script>
  function addToCart(event){
    event.preventDefault();
     let urlCart  = $(this).data('url');
     $.ajax({
            type: "GET",
            url: urlCart,
            dataType: 'json',
            success: function(data){
                if(data.code === 200 ){
                    alert('Thêm sản phẩm thành công');
                } 
            },
            error: function(data){

            },
     });
  }

  $(function(){
    $('.add_to_cart').on('click',addToCart);
  });
</script>
@endsection
  

 



