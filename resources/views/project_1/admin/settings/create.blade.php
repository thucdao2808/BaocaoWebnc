@extends('project_1.admin.layouts.layout')
 
 
@section('content')

<div class="main-content">

    <div class="m-3 bg-white py-3">
        {{-- @if ($errors->any())
            <div class="alert alert-danger mx-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif --}}

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

        <form action="{{route('settings.store')}}" method="post" class="bg-white p-3 mx-2" enctype="multipart/form-data">
            @csrf

            <label for="image" class="form-label">Tên </label>
            <input type="text" name="name" class="form-control mb-3" >
        
            <label for="content" class="form-label">Value</label>
            <textarea class="form-control mb-3" name="value" placeholder="Viết nội dung ở đây" id="floatingTextarea2" rows="5">{{old('content')}}</textarea>
                
            
        
            <input type="submit" value="Thêm Setting" class="btn btn-success">
            <a href="{{route('settings.index')}}" class="btn btn-danger">Xem danh sách</a>

        </form>
    </div>
   
</div>

@endsection
