@extends('project_1.customer.layouts.layout')

@section('content')
    <section>
        <div class="bg-light-pink p-3 d-flex justify-content-center">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#" class="text-decoration-none text-gray">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="#" class="text-decoration-none text-gray">Tin tức</a></li>
                </ol>
            </nav>
        </div>
    </section>
    <div class="container py-5">
        <div class="row">
            <div class="col-md-3">
                <div class="list-group rounded-0 shadow-sm">
                    <h6 class="list-group-item active bg-primary border-0">Danh mục tin tức</h6>
                    <a href="#" class="list-group-item list-group-item-action">Sách bán chạy</a>
                    <a href="#" class="list-group-item list-group-item-action">Sách văn học</a>
                    <a href="#" class="list-group-item list-group-item-action">Sách kinh tế</a>
                    <a href="#" class="list-group-item list-group-item-action">Sách kỹ năng</a>
                    <a href="#" class="list-group-item list-group-item-action">Sách thiếu nhi</a>
                    <a href="#" class="list-group-item list-group-item-action">Sách khoa học</a>
                </div>
            </div>
            <div class="col-md-9">
                <h2 class="mb-4">Tin tức</h2>
                @foreach($news as $item)
                    <div class="row py-3 mb-3 shadow align-items-center">
                        <div class="col-2">
                            <img src="{{asset(Storage::url($item->image_path))}}" class="card-img-top" alt="Tin tức 1">
                        </div>
                        <div class="col-10">
                            <div class="card-body">
                                <h5 class="card-title">{{$item->title}}</h5>
                                <p class="card-text"><small class="text-muted"><i class="fa-regular fa-clock text-danger"></i> {{$item->created_at->format('d/m/y')}}</small></p>
                                <p class="text-gray two-line-truncate">{{$item->content}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
              
            </div>
        </div>
    </div>

@endsection

  

 



