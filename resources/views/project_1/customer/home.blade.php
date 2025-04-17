

@extends('project_1.customer.layouts.layout')

@section('content')
<main>
    <!-- banner -->
    <div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-touch="false">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="{{asset('images/1.png')}}" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item active">
            <img src="https://cdn.shopify.com/s/files/1/0905/2012/files/slider01_712e9c3f-9fd2-4389-93f7-941abfddc722.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item active">
            <img src="{{asset('images/1.png')}}" class="d-block w-100" alt="...">
          </div>
         
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- content -->
    <div class="container mt-5">
        <div class="row d-flex align-items-center justify-content-between mb-5">
            <div class="col-12 col-md-3">
                <span class="fs-4 fw-bolder">Bán chạy</span>
            </div>
            <div class="col-6 d-none d-md-block">
                <div class="border-1 border-black border-bottom"></div>
            </div>
            <div class="col-3 text-end d-none d-md-flex">
                <a href="" class="btn btn-danger rounded-pill">
                    Xem thêm sách
                </a>
            </div>

        </div>
  
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <!-- sản phẩm -->
              <div class="swiper-slide py-4" >
                <!-- Nội dung sản phẩm -->
                <div class="product-meta rounded-3">
                    <a class="product text-decoration-none text-dark" href="">
                        <div class="product-img">
                            <img src="{{asset('images/81o8BYrG4BL.jpg')}}" alt="" class="img-fluid rounded-3"> 
                        </div>
                        <div class="product-content p-2 ">
                            <div class="category">
                                <span class="text-gray fw-medium ">Comedy</span>
                            </div>
                            <h3 class="fs-6">The Song of Achilles</h3>
                            <div class="rank ">
                             
                            </div>

                            <div class="product-price">
                                <span class="text-danger fw-medium">$29.00</span>
                            </div>
                        </div>
                    </a>
                </div>
              </div>
            
              <!-- ... -->
            </div>
        </div>

        <div class="row d-flex align-items-center justify-content-between my-5">
            <div class="col-12 col-md-3">
                <span class="fs-4 fw-bolder">Deals of the week</span>
            </div>
            <div class="col-6 d-none d-md-block">
                <div class="border-1 border-black  border-bottom "></div>
            </div>
            <div class="col-3 text-end d-none d-md-flex">
                <a href="" class="btn btn-danger rounded-pill">
                    Xem thêm sách
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-8 mb-4 mb-md-3">
                <div class="new-product rounded-5">
                </div>
            </div>

            <div class="col-12 col-md-4 d-inline-block">
                <div class="product-item mb-3 py-2 border-1 border-bottom border-dark-subtle">
                    <a href="" class="d-flex text-decoration-none text-dark">
                        <div class="col-3 col-md-6 col-lg-4 me-3">
                            <div class="product-img ">
                                <img src="{{asset('images/hummingbird-printed-t-shirt.jpg')}}" alt="" class="img-fluid rounded-3">
                            </div>
                        </div>
                        <div class="col-10 col-md-8">
                            <div class="category">Fantasy</div>
                            <h4></h4>
                            <div class="rank"></div>
                            <div class="product-price">$28</div>
                        </div>
                    </a>
                </div>
              
            </div>
            
        </div>
        
        <div class="row d-flex align-items-center justify-content-between my-5">
            <div class="col-12 col-md-3">
                <span class="fs-4 fw-bolder">Highest RatedBooks</span>
            </div>
            <div class="col-6 d-none d-md-block">
                <div class="border-1 border-black border-bottom"></div>
            </div>
            <div class="col-3 text-end d-none d-md-flex">
                <a href="" class="btn btn-danger rounded-pill">
                    Xem thêm sách
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-6 mb-3">
                <div class="rounded-4 bg-danger-subtle p-4">
                    <div class="row">
                        <div class="col-6">
                            <div class="product-img">
                                <img src="{{asset('images/81o8BYrG4BL.jpg')}}" alt="" class="img-fluid rounded-3">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="category">Literature</div>
                            <h3>They Both Die at</h3>
                            <div class="description">Regular fit, round neckline, long sleeves. 100% cotton, brushed inner side for extra comfort.
                            </div>
                            <div class="rank"></div>
                            <div class="product-price">$35.90</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="rounded-4 bg-info-subtle p-4">
                    <div class="row">
                        <div class="col-6">
                            <div class="product-img">
                                <img src="{{asset('images/hummingbird-printed-t-shirt.jpg')}}" alt="" class="img-fluid rounded-3">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="category">Fantasy</div>
                            <h3>The Classic Harry</h3>
                            <div class="descriprtion">Regular fit, round neckline, short sleeves. Made of extra long staple pima cotton.</div>
                            <div class="rank"></div>
                            <div class="product-price">$23.90</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</main>
@endsection
  

 


