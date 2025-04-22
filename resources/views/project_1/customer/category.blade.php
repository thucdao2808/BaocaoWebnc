


@extends('project_1.customer.layouts.layout')


@section('css')

<style>
    .book-card {
        border-radius: 15px;
        overflow: hidden;
        background-color: #ffffff;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease-in-out;
        padding: 15px;
        text-align: center;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }
    
    .book-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    }
    
    .book-card img {
        width: 100%;
        height: 220px;
        object-fit: cover;
        border-radius: 10px;
        margin-bottom: 10px;
    }
    
    .book-card .genre {
        font-weight: 700;
        font-size: 1.1rem;
        color: #333;
        margin-bottom: 5px;
    }
    
    .book-card .title {
        font-size: 0.95rem;
        color: #777;
        margin-bottom: 10px;
        min-height: 40px;
    }
    
    .book-card .price {
        font-size: 1rem;
        color: #e74c3c;
        font-weight: bold;
    }
    
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
                <div class="col-md-4 mb-4">
                    <div class="book-card">
                        <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}" class="img-fluid">
                        <div class="genre">{{ $product->name }}</div>
                        <div class="title">{{ $product->description }}</div>
                        <div class="price">{{ number_format($product->price) }}đ</div>
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
  

 



