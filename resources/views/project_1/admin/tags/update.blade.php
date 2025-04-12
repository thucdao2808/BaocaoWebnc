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
            @endif

            <form action="{{route('tags.update', $tag->id)}}" method="POST" class="p-3">
                @csrf
                @method('PUT')
                <label for="name" class=" m-2">Tên thẻ</label>
                <input type="text" class="form-control m-2" name="name" value="{{$tag->name}}">
                <input type="submit" class="btn btn-success m-2" value="Sửa">
            </form>
            
        </div>
        
    </div>    
@endsection