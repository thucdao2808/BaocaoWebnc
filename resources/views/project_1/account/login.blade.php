<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <title>Đăng nhập</title>
</head>
<body>
    <section class="vh-100">
        <div class="container py-5 h-100">
          <div class="row d-flex align-items-center justify-content-center h-100">
            <div class="col-md-8 mb-4 mb-md-0 col-lg-7 col-xl-6">
              <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg"
                class="img-fluid" alt="Phone image">
            </div>
            <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show mx-4" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @elseif (session('error'))
                    <div class="alert alert-error alert-dismissible fade show mx-4" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form action="{{route('login')}}" method="POST">
                <!-- Email input -->
                    @csrf
                    <div data-mdb-input-init class="form-outline mb-4">
                    <input type="text" name="username" id="form1Example13" class="form-control form-control-lg" value ="{{old('username')}}"/>
                    <label class="form-label"  for="form1Example13">Tên đăng nhập</label>
                    </div>
        
                    <!-- Password input -->
                    <div data-mdb-input-init class="form-outline mb-4">
                    <input type="password" name="password" id="form1Example23" class="form-control form-control-lg" />
                    <label class="form-label" for="form1Example23">Mật Khẩu</label>
                    </div>
                    
                    <div class="d-flex justify-content-between align-items-center mb-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="form1Example3" checked />
                        <label class="form-check-label" for="form1Example3">Lưu mật khẩu</label>
                    </div>
                    </div>
                    <div class="pt-1 mb-4 d-flex flex-column ">
                        <button data-mdb-button-init data-mdb-ripple-init class="btn btn-dark btn-lg" type="submit">Đăng nhập</button>
                    </div>

                    <a href="{{route('showForgotForm')}}">Quên mật khẩu?</a>
                    <div class="d-flex mt-3">
                        <span>Bạn chưa có tài khoản?</span>
                        <a class="mx-2" href="{{route('register')}}">Đăng ký</a>
                    </div>

                </form>
                <a href="{{route('google')}}" class="text-decoration-none">
                    <div class="google_login d-flex border border-dark-subtle p-2 rounded-3 mt-3 align-items-center justify-content-center">
                        <div class="gg_img col-1">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c1/Google_%22G%22_logo.svg/1200px-Google_%22G%22_logo.svg.png" alt="" class="img-fluid">
                        </div>
                        <div class="mx-3">
                            <span class="text-dark">Đăng nhập bằng Google</span>
                        </div>
                    </div>
                </a>
            </div>
          </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>

</body>
</html>