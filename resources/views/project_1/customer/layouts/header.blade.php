<header>
    <div class="p-3 bg-warning">
        <span class="fs-6">Can we help you?</span>
        <span class="fs-6 ">(+84)-363-922-397</span>
    </div>
    <div class="container">
        <div class="d-flex flex-wrap align-items-start justify-content-between py-3 my-3">
            <!-- Logo -->
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-4 col-4 d-flex align-items-center">
                <div class="logo">
                    <a href>
                        <img class="logo img-fluid"
                            src="https://demo3leotheme.b-cdn.net/prestashop/leo_bookery_demo/img/bookery-logo-1611909896.jpg"
                            alt="Leo Bookery logo">
                    </a>
                </div>
            </div>

            <!-- Search (order để nó xuống dưới khi màn nhỏ) -->
            <div class="col-12 col-xl-6 col-lg-5 col-md-6 col-sm-12 order-3 order-md-2 mt-md-0 mt-3">
                <div class="search">
                    <form action method="get">
                        <div class="d-flex form-control-sm bg-secondary-subtle rounded px-2">
                            <button type="submit" class="border-0 bg-transparent">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                            <input type="text" placeholder="search" class="form-control border-0 bg-transparent">
                        </div>
                    </form>
                </div>
            </div>

            <!-- Icons -->
            <div
                class="col-xl-3 col-lg-3 col-md-3 col-sm-4 col-4 d-flex justify-content-around align-items-center order-2">
                <div class="user_icon font-icon">
                    <div class="noti__item js-item-menu">
                        <i class="fa-solid fa-user"  data-bs-toggle="dropdown" aria-expanded="true"></i>
                        <ul class="dropdown-menu">
                            <li>
                                <form action="{{route('logout')}}" method="POST">
                                    @csrf
                                    <button type="submit">Đăng xuất</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="cart_icon font-icon">
                    <a href="{{route('showCart')}}">
                        <i class="fa-solid fa-cart-shopping fs-5"></i>
                    </a>
                </div>
                <div class="setting_icon font-icon">
                    <i class="fa-solid fa-gear fs-5"></i>
                </div>
            </div>

            <div class="col-xl-6 col-lg-6 order-2 order-lg-3 mx-md-auto mx-0 mt-md-2 mt-0">
                <nav class="navbar navbar-expand-md bg-body-tertiary">
                    <div class="container-fluid">

                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse  justify-content-center" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link fw-bolder" aria-current="page" href="{{route('home')}}">Trang Chủ</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link fw-bolder" href="{{route('custom.category.index')}}">Sách</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link fw-bolder" href="#">Giới thiệu</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link fw-bolder" href="#">Tin tức</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link fw-bolder" href="#">Liên hệ</a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>

    </div>

</header>