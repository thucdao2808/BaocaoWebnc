


@extends('project_1.customer.layouts.layout')
@section('css')
     <style>
   <style>
    .top-bar {
      background: #ff4500;
      color: white;
      font-size: 14px;
      padding: 5px 0;
      text-align: center;
    }
    .footer {
      background: #222;
      color: #ccc;
      padding: 40px 0;
    }
    .footer a {
      color: #ccc;
      text-decoration: none;
    }
    .footer a:hover {
      color: white;
    }
    .breadcrumb {
      background-color: transparent;
    }
  </style>
@endsection
@section('content')
    <section>
    <div class="bg-light-pink p-3 d-flex justify-content-center">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item"><a href="#" class="text-decoration-none text-gray">Home</a></li>
              <li class="breadcrumb-item"><a href="#" class="text-decoration-none text-gray">Giới thiệu</a></li>
            </ol>
        </nav>
    </div>
</section> 

  <div class="container mb-5">
    <h4 class="mb-4">Về chúng tôi</h4>
    <div class="row">
      <div class="col-md-6">
        <img src="https://i.imgur.com/Q6M8ZOr.jpg" alt="Giới thiệu Bookery" class="img-fluid rounded">
      </div>
      <div class="col-md-6">
        <p>
          Chào mừng bạn đến với bookstore HT, thế giới của tri thức, cảm hứng và tình yêu sách!<br><br>
          Bookery là nơi bạn có thể khám phá một thế giới sách đa dạng đến từ mọi thể loại: kinh tế, kỹ năng, tiểu thuyết, truyện ngắn, học thuật, thiếu nhi... Từ sách mới nhất đến những cuốn kinh điển, bạn luôn có thể tìm thấy điều bạn cần.<br><br>
          Với sứ mệnh truyền cảm hứng về tri thức và sáng tạo, chúng tôi tin rằng đọc sách không chỉ là một thói quen, mà còn là một lối sống, là cách để mỗi người tự hoàn thiện và khám phá chính mình.  
        </p>
      </div>
    </div>

    <h5 class="mt-5">Tầm nhìn & Sứ mệnh</h5>
    <h6>Tầm nhìn</h6>
    <p>Trở thành nền tảng bán sách trực tuyến hàng đầu Việt Nam, góp phần xây dựng một cộng đồng đọc sách mạnh mẽ, văn minh và sáng tạo.</p>

    <h6>Sứ mệnh</h6>
    <ul>
      <li>Cung cấp những đầu sách trong mọi cá nhân, đặc biệt là giới trẻ.</li>
      <li>Đồng hành cùng người đọc trong việc lựa chọn và trải nghiệm sách chất lượng.</li>
      <li>Xây dựng cộng đồng yêu sách rộng khắp.</li>
    </ul>
  </div>
@endsection

  

 



