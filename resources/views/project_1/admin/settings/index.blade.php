@extends('project_1.admin.layouts.layout')  
 
@section('content')

<div class="main-content">
    <div class="m-3 bg-white py-3">
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


     <div class="mx-3 p-2">
         <a href="{{route('settings.create')}}">
            <button class="btn btn-danger ">Thêm Setting</button>
         </a>
     </div>
     <div class="table-responsive" style="overflow-x: auto;">
        <table class="table table-striped table-hover ">
            <thead>
               <tr>
                   <th>#</th>
                   <th >Tên </th>
                   <th >Value</th>       
                   <th>Hành động</th>
               </tr>
            </thead>
            <tbody>
               @foreach ($settings as $setting)
                   <tr>
                       <th scope="row">{{$setting->id}}</th>
                       <td>{{$setting->name}}</td>
                       <td>
                           {{$setting->value}}
                       </td>
                       
                       <td>
                            <div class="d-flex">
                                <a class="btn btn-info mx-1" href="{{ route('setting.edit', ['id' => $setting->id]) }}">Sửa</a>


                                <form action="{{ route('setting.destroy', $setting->id) }}" method="POST" class="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger mx-1">Xóa</button>
                                </form>
                            </div>
                            
                        </td>
                   </tr>
               @endforeach
            </tbody>
        </table>
     </div>
         
        <div class="my-5 border-top p-3">
            {{$settings->links()}}
        </div>
        
    </div>
 </div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.querySelectorAll('.delete-form').forEach(form => {
    form.addEventListener('submit', function(e) {
        e.preventDefault(); // chặn submit form tạm thời
        Swal.fire({
            title: 'Bạn có chắc chắn muốn xóa?',
            
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Xóa',
            cancelButtonText: 'Hủy'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit(); // submit form nếu đồng ý
            }
        });
    });
});
</script>


@endsection
