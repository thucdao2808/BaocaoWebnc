<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Verify Code</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
</head>
<body>
<div class="container mt-5" style="max-width: 500px;">
    <h2 class="mb-4">Xác nhận mã và đặt lại mật khẩu</h2>

    <form method="POST" action="{{ route('verifyCode') }}">
        @csrf

        @if(session('error_code'))
            <div class="alert alert-danger">{{ session('error_code') }}</div>
        @endif

        <div class="form-group">
            <label for="email">Email đã đăng ký</label>
            <input type="email" 
                   class="form-control @error('email') is-invalid @enderror" 
                   id="email" 
                   name="email" 
                   placeholder="Email đã đăng ký" 
                   value="{{ old('email', session('email')) }}">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="code">Mã xác thực</label>
            <input type="text" 
                   class="form-control @error('code') is-invalid @enderror" 
                   id="code" 
                   name="code" 
                   placeholder="Mã xác thực" 
                   value="{{ old('code') }}">
            @error('code')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">Mật khẩu mới</label>
            <input type="password" 
                   class="form-control @error('password') is-invalid @enderror" 
                   id="password" 
                   name="password" 
                   placeholder="Mật khẩu mới">
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="password_confirmation">Nhập lại mật khẩu</label>
            <input type="password" 
                   class="form-control" 
                   id="password_confirmation" 
                   name="password_confirmation" 
                   placeholder="Nhập lại mật khẩu">
        </div>

        <button type="submit" class="btn btn-primary btn-block">Xác nhận</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
