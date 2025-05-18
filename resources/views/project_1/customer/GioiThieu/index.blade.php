@extends('project_1.customer.layouts.layout')

@section('content')
    <section>
        <div class="bg-light-pink p-3 d-flex justify-content-center">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                  <li class="breadcrumb-item"><a href="#" class="text-decoration-none text-gray">Trang chủ</a></li>
                  <li class="breadcrumb-item"><a href="#" class="text-decoration-none text-gray">Giới thiệu</a></li>
                </ol>
            </nav>
      </div>
    </section> 

    <div class="container my-3">
      <h3 class="mb-4">Về chúng tôi</h3>
      <div class="row align-items-center">
        <div class="col-md-6 mb-4 mb-md-0">
          <img src="{{ asset('images/kinh-nghiem-ban-sach-online-1.webp') }}" alt="Giới thiệu Bookery"
              class="img-fluid rounded shadow-sm">
        </div>
        <div class="col-md-6">
            <p>
                Chào mừng bạn đến với <strong>bookstore HT</strong> – thế giới của tri thức, cảm hứng và tình yêu sách!
            </p>
            <p>
                Bookery là nơi bạn có thể khám phá một thế giới sách đa dạng đến từ mọi thể loại: kinh tế, kỹ năng, tiểu thuyết,
                truyện ngắn, học thuật, thiếu nhi... Từ sách mới nhất đến những cuốn kinh điển, bạn luôn có thể tìm thấy điều bạn cần.
            </p>
            <p>
              Với sứ mệnh truyền cảm hứng về tri thức và sáng tạo, chúng tôi tin rằng đọc sách không chỉ là một thói quen,
              mà còn là một lối sống – là cách để mỗi người tự hoàn thiện và khám phá chính mình.
            </p>
        </div>
    </div>

    <div class="mt-5">
      <h4 class="mb-3">Tầm nhìn &amp; Sứ mệnh</h4>

      <h5 class="mt-4">Tầm nhìn</h5>
      <p>
        Trở thành nền tảng bán sách trực tuyến hàng đầu Việt Nam, góp phần xây dựng một cộng đồng đọc sách mạnh mẽ, văn minh và sáng tạo.
      </p>

      <h5 class="mt-4">Sứ mệnh</h5>
      <ul class="list-unstyled ps-3">
        <li class="mb-2">• Cung cấp những đầu sách phù hợp cho mọi cá nhân, đặc biệt là giới trẻ.</li>
        <li class="mb-2">• Đồng hành cùng người đọc trong việc lựa chọn và trải nghiệm sách chất lượng.</li>
        <li class="mb-2">• Xây dựng cộng đồng yêu sách rộng khắp.</li>
      </ul>
    </div>
  </div>

@endsection

  

 


