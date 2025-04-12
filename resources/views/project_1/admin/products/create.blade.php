@extends('project_1.admin.layouts.layout')
 
 
@section('content')

<div class="main-content">


    <div class="m-3 bg-white py-3">
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

        <form action="{{route('products.store')}}" method="post" class="bg-white p-3 mx-2" enctype="multipart/form-data">
            @csrf
            <label for="" class="form-label">Danh mục sản phẩm</label>
            <select class="form-select mb-3" name="category_id" id="" >
                <option selected>Chọn danh mục</option>
                @foreach ($categories as $category )

                <option value="{{$category->id}}">{{$category->name}}</option>
                    
                @endforeach
            </select>


            <label for="tags" class="form-label">Tên thẻ</label>
            <select class="form-select mb-3"  multiple  name="tags[]" id="tags" >
                <option selected>Chọn tên thẻ</option>
                @foreach ($tags as $tag )

                <option  value="{{$tag->id}}">{{$tag->name}}</option>
                    
                @endforeach
            </select>

            <label for="name" class="form-label">Tên sản phẩm</label>
            <input type="text" name="name" class="form-control mb-3"  value="{{old('name')}}">
        
        
            <label for="" class="form-label">Hình ảnh</label>
            <input type="file" name="image_path" class="form-control mb-3" >
        
        
            <label for="" class="form-label">Mô tả sản phẩm</label>
        
            <textarea class="form-control mb-3" name="description" placeholder="Viết mô tả sản phẩm tại đây" id="floatingTextarea2" style="height: 100px"></textarea>
                


            <label for="" class="form-label">Số lượng</label>
            <input type="number" name="quantity" class="form-control mb-3" value="{{old('quantity')}}">
        
        
            <label for="" class="form-label">Giá Tiền</label>
            <input type="number" name="price" class="form-control mb-3" value="{{old('price')}}">
        
            <label for="" class="form-label">Ảnh khác</label>
            <input type="file" name="galleries[]" class="form-control mb-3" >
            <input type="file" name="galleries[]" class="form-control mb-3" >


            <input type="submit" value="Thêm sản phẩm" class="btn btn-success   ">
            <a href="{{route('products.index')}}" class="btn btn-danger">Xem danh sách</a>
        </form>
    </div>
   
</div>

@endsection
