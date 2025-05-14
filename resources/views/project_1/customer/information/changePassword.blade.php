
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>ChangePassword</title>
</head>
<body>
    <a href="{{ route('home') }}" class="btn btn-secondary">← Trở về trang chủ</a>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <form action="{{route('updatePassword')}}" method="POST" style="width:60%">
        <!-- Laravel CSRF Token nếu dùng Blade -->
        @csrf
        
        <div class="form-group " >
          <label for="current_password">Mật khẩu hiện tại</label>
          <input type="password" class="form-control" id="current_password" name="current_password" required value="{{old('current_password')}}">
        </div>
      
        <div class="form-group">
          <label for="new_password">Mật khẩu mới</label>
          <input type="password" class="form-control" id="new_password" name="new_password" value="{{old('new_password')}}" required>
        </div>
      
        <div class="form-group">
          <label for="new_password_confirmation">Xác nhận mật khẩu mới</label>
          <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation" required>
        </div>
      
        <button type="submit" class="btn btn-primary">Đổi mật khẩu</button>
    </form>
      
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</html>
