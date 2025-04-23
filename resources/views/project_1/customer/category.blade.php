


@extends('project_1.customer.layouts.layout')


@section('css')

<style>

    
/* Sidebar category links */
.sidebar .category-filter .nav-link {
    font-size: 1rem;
    font-weight: 500;
    color: #333;
    text-transform: uppercase;
    padding: 8px 15px;
    border-radius: 5px;
    transition: all 0.3s;
}

/* Hover effect */
.sidebar .category-filter .nav-link:hover {
    background-color: #d1e2f3;
    color: white;
    text-decoration: none;
}

/* Active link color (when clicked) */
.sidebar .category-filter .nav-link.active {
    background-color: transparent;
    color: #e67e22; /* Màu cam */
    font-weight: bold;
}

/* Responsive adjustments for smaller screens */
@media (max-width: 768px) {
    .sidebar {
        padding: 10px;
    }

    .sidebar h6 {
        font-size: 1rem;
    }

    .sidebar .category-filter .nav-link {
        font-size: 0.9rem;
        padding: 6px 12px;
    }
}


    </style>
    
    
@endsection
@section('content')
        
<div class="container mt-3">
    <div class="text-center mb-3">
      <small>Trang chủ / <strong>Sách</strong></small>
    </div>
    <div class="row">
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
        <div class="row" id="book-list">
          <!-- Book items -->
            @foreach ($products as $product)
                <div class="card" style="width: 18rem; margin: 5px">
                    <img class="card-img-top"style="width:100% ; height:200px"  src="{{asset('storage/'.$product->image_path)}}" alt="Card image cap">
                    <div class="card-body">
                    <h5 class="card-title">{{$product->name}}</h5>
                    <p class="card-text">{{$product->description}}</p>
                    <p class="card-text">{{number_Format($product->price)}}đ</p>
                    <a href="#" 
                       class="btn btn-primary  add_to_cart" 
                       data-url = "{{route('addToCart',['id'=>$product->id])}}"
                       >
                        Add To Cart
                    </a>
                    </div>
                </div>
            @endforeach

          <!-- More cards here... -->
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
  

 



