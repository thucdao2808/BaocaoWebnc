


@extends('project_1.customer.layouts.layout')
@section('css')
     <style>
    body {
      font-family: 'Arial', sans-serif;
    }
    .topbar {
      background-color: #ff5e14;
      color: white;
      padding: 5px 20px;
      font-size: 14px;
    }
    .contact-form input, .contact-form textarea {
      margin-bottom: 15px;
    }
    .orange-btn {
      background-color: #ff5e14;
      border: none;
      color: white;
    }
    .orange-btn:hover {
      background-color: #e04d0d;
    }
    .footer {
      background-color: #000;
      color: white;
      padding: 30px 0;
    }
    .footer a {
      color: #fff;
      text-decoration: none;
    }
    .footer a:hover {
      text-decoration: underline;
    }
  </style>
@endsection
@section('content')
    <section>
    <div class="bg-light-pink p-3 d-flex justify-content-center">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item"><a href="#" class="text-decoration-none text-gray">Home</a></li>
              <li class="breadcrumb-item"><a href="#" class="text-decoration-none text-gray">Liên hệ</a></li>
            </ol>
        </nav>
    </div>
</section> 

  <!-- Contact Section -->
  <div class="container mb-5">
    <div class="row">
      <div class="col-md-6">
        <h4>Liên hệ</h4>
        <p>Địa chỉ: {{getConfigValueFromSettingTable('address')}}</p>
        <p>Hotline: {{getConfigValueFromSettingTable('phone')}}</p>
        <p>Email: {{getConfigValueFromSettingTable('email')}}</p>
      </div>
      <div class="col-md-6 contact-form">
        <h4>Hãy để lại lời nhắn cho chúng tôi</h4>
        <form>
          <input type="text" class="form-control" placeholder="Họ và tên">
          <input type="email" class="form-control" placeholder="Email">
          <input type="text" class="form-control" placeholder="Số điện thoại">
          <textarea class="form-control" rows="4" placeholder="Nội dung"></textarea>
          <button class="btn orange-btn">Gửi lời nhắn của bạn</button>
        </form>
      </div>
    </div>
  </div>

  <!-- Map -->
  <div class="container mb-5">
    <h5><span class="badge badge-warning">Đường đến cửa hàng</span></h5>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d119176.90566740691!2d105.53470218916368!3d21.021547628976315!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3134570078c90733%3A0x8629c4334e3e5441!2zQ8O0bmcgQW4gWMOjIExhbSBTxqFu!5e0!3m2!1svi!2s!4v1747475378127!5m2!1svi!2s" 
            width="100%" height="400" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
  </div>
@endsection

  

 



