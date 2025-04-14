<h1>trang chu</h1>
<form action="{{route('logout')}}" method="post">
    @csrf
    <button type="submit" class="btn btn-danger">Logout</button>
</form>