


@extends('project_1.customer.layouts.layout')

@section('content')
    <section>
    <div class="bg-light-pink p-3 d-flex justify-content-center">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item"><a href="#" class="text-decoration-none text-gray">Trang chủ</a></li>
              <li class="breadcrumb-item"><a href="#" class="text-decoration-none text-gray">Liên hệ</a></li>
            </ol>
        </nav>
    </div>
</section> 

  <!-- Contact Section -->
  <div class="container my-5">
  <div class="row">
    <!-- Thông tin liên hệ -->
    <div class="col-md-6 mb-4">
      <h4 class="mb-3 text-danger">Liên hệ</h4>
      <ul class="list-unstyled">
        <li><i class="fa-solid fa-location-dot  text-danger" style="width: 15px"></i><strong class="ms-2">Địa chỉ:</strong> {{ getConfigValueFromSettingTable('address') }}</li>
        <li><i class="fa-solid fa-phone-volume  text-danger"></i><strong class="ms-2">Hotline:</strong> {{ getConfigValueFromSettingTable('phone') }}</li>
        <li><i class="fa-regular fa-envelope  text-danger"></i><strong class="ms-2">Email:</strong> {{ getConfigValueFromSettingTable('email') }}</li>
      </ul>
    </div>

    <!-- Form liên hệ -->
    <div class="col-md-6">
      <h4 class="mb-3">Hãy để lại lời nhắn cho chúng tôi</h4>
      <form>
        <div class="mb-3">
          <input type="text" class="form-control" placeholder="Họ và tên">
        </div>
        <div class="mb-3">
          <input type="email" class="form-control" placeholder="Email">
        </div>
        <div class="mb-3">
          <input type="text" class="form-control" placeholder="Số điện thoại">
        </div>
        <div class="mb-3">
          <textarea class="form-control" rows="4" placeholder="Nội dung"></textarea>
        </div>
        <button type="submit" class="btn btn-warning">Gửi lời nhắn</button>
      </form>
    </div>
  </div>
</div>

<!-- Google Map -->
<div class="container mb-5">
  <h5>
    <span class="badge bg-warning text-dark">Đường đến cửa hàng</span>
  </h5>
  <div class="ratio ratio-16x9 mt-3">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.6589962161825!2d105.78192540879027!3d21.046326187098014!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab325c9d85ff%3A0x92f275da77aa7354!2zMjM0IEhvw6BuZyBRdeG7kWMgVmnhu4d0LCBD4buVIE5odeG6vywgQuG6r2MgVOG7qyBMacOqbSwgSMOgIE7hu5lpLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1747568011020!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  </div>
</div>

@endsection

  

 



