<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Edit Profile</title>

  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"/>
  <!-- Font Awesome for icons -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>

  <link rel="stylesheet" href="{{asset('css/project_1/profile.css')}}">
</head>
<body>

<div class="container profile-container">
  <div class="row">
    <!-- Left Column: Profile Info -->
    <div class="col-md-4 text-center border-right">
      <img class="profile-img mt-3" src="{{Storage::disk('public')->exists(Auth::user()->avatar) ? asset(Storage::url(Auth::user()->avatar)) : Auth::user()->avatar }}" alt="Avatar">
      <div class="profile-name">{{Auth::user()->username}}</div>
      <div class="profile-email">{{Auth::user()->email}}</div>
      <div class="text-muted mt-1">United States</div>
    </div>

    <!-- Right Column: Form -->
    <div class="col-md-8">
      <div class="d-flex justify-content-between align-items-center mb-4">
        <a href="{{route('home')}}" class="d-flex align-items-center back">
          <i class="fa fa-long-arrow-alt-left mr-2"></i>
          <h6 class="mb-0">Back to Home</h6>
        </a>
        <h5 class="mb-0">Edit Profile</h5>
      </div>

      <form method="POST" action="{{route('updateInformation')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label class="form-label">Chọn ảnh</label>
          <input type="file" class="form-control-file" name="avatar" />
        </div>
        <div class="form-group">
            <label class="form-label">Họ tên </label>
            <input type="text" class="form-control" placeholder="Nhập username" value="{{ Auth::user()->username }}" name="username"/>
          </div>

        <div class="form-group">
          <label class="form-label">Email</label>
          <input type="email" class="form-control" value="{{Auth::user()->email}}" placeholder="Nhập email mới" name="email" />
        </div>

        <div class="form-group">
          <label class="form-label">Địa chỉ</label>
          <input type="text" class="form-control" placeholder="Nhập địa chỉ" value="{{Auth::user()->address}}" name="address" />
        </div>

        <div class="text-right mt-4">
          <button type="submit" class="btn profile-button text-white px-4">Lưu thay đổi</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Bootstrap JS and Popper -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
