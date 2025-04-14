<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">

    <title>Đăng ký</title>
</head>
<body>

    <section class="vh-100">
        <div class="container py-5 h-100">
          <div class="row d-flex align-items-center justify-content-center h-100">
            <div class="col-md-8 mb-4 mb-md-0 col-lg-7 col-xl-6">
              <img src="{{asset('storage/image/Mobile login-bro.png')}}"
                class="img-fluid" alt="Phone image">
            </div>
            <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif


                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @elseif (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

              <form action="{{route('register')}}" method="POST">
                <!-- Email input -->
                @csrf
                <div data-mdb-input-init class="form-outline mb-4">
                  <input type="text" name="username" id="name" class="form-control form-control-lg" />
                  <label class="form-label" for="name">Tên đăng nhâp</label>
                </div>

                <div data-mdb-input-init class="form-outline mb-4">
                  <input type="email" name="email" id="form1Example13" class="form-control form-control-lg" />
                  <label class="form-label" for="form1Example13">Email</label>
                </div>
      
                <!-- Password input -->
                <div data-mdb-input-init class="form-outline mb-4">
                  <input type="password" name="password" id="form1Example23" class="form-control form-control-lg" />
                  <label class="form-label" for="form1Example23">Mật khẩu</label>
                </div>

                <div data-mdb-input-init class="form-outline mb-4">
                  <input type="password" name="password_confirmation" id="confirm" class="form-control form-control-lg" />
                  <label class="form-label" for="confirm">Nhập lại mật khẩu </label>
                </div>
                
                
                <div class="pt-1 mb-4 d-flex flex-column ">
                    <button data-mdb-button-init data-mdb-ripple-init class="btn btn-dark btn-lg" type="submit">Đăng ký</button>
                </div>

                <!-- Submit button -->
              </form>
            </div>
          </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>
</html>