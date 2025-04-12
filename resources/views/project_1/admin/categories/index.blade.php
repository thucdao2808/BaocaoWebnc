@extends('project_1.admin.layouts.layout')

@section('content')
    <div class="main-content">
        <div class="m-3 bg-white py-3">

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show mx-4 " role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="mx-3 p-2">
                <a href="{{route('categories.create')}}">
                   <button class="btn btn-danger ">Thêm danh mục</button>
                </a>
            </div>
            <div class="px-4">
                <table class="table table-striped table-hover ">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">#</th>
                            <th scope="col">Tên danh mục</th>
                            <th scope="col" class="text-end pe-4">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $key => $category)
                            <tr>
                                <td scope="row" class="text-center">{{$key}}</th>
                                <td scope="row">{{$category->name}}</td>
                                <td class="d-flex justify-content-end">
    
                                    <form action="{{route('categories.destroy', $category->id)}}" method="post" onclick="return  confirm('Bạn chắc muốn xóa chứ?')">
                                        @csrf
                                        @method('delete')
                                        <input type="submit"  class="btn btn-danger " value="Xóa" >
                                    </form>
                                    
                                    <a class="btn btn-info mx-1" href="{{route('categories.edit', $category->id)}}">Sửa</a>
                                </td>
                        
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                
                <div class="my-5 border-top p-3">
                    {{$categories->links()}}
                </div>
            </div>
            

        </div>
    </div>
@endsection