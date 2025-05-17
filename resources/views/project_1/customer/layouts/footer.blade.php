<footer class="footer bg-dark text-light mt-5 py-5">
    <div class="container">
        <div class="row">
            <div class="col-6 col-md-4 col-lg-3">
                <div class="title m-2">
                    <img src="{{asset('images/footer-logo.png')}}" alt="" srcset="">
                </div>
                <div class="content text-gray">
                    <span class="fw-medium">{{getConfigValueFromSettingTable('address')}}</span>
                </div>
            </div>

            <div class="col-6 col-md-4 col-lg-3">
                <div class="title m-2">
                    <h4>Need help</h4>
                </div>
                <div class="content text-gray">
                    <div class="phone d-flex">
                        <div class="icon" style="margin-right: 10px">
                          <i class="fa fa-phone mr-2 text-danger"></i>
                        </div>
                        <span class="fw-medium">{{getConfigValueFromSettingTable('phone')}}</span>
                    </div>
                    <p class="mb-1 text-gray">Monday – Friday: 8:00–20:00</p>
                    <p class="mb-1 text-gray">Saturday: 11:00–15:00</p>
                    <div class="email d-flex">
                        <div class="icon" style="margin-right: 10px">
                          <i class="fa fa-envelope mr-2 text-danger"></i>
                        </div>
                        <span class="fw-medium">{{getConfigValueFromSettingTable('email')}}</span>
                    </div>
                    
                
                </div>
            </div>

            <div class="col-12 col-md-4 col-lg-2">
                <div class="title mb-2 d-flex justify-content-between align-items-center">
                  <h4 class="mb-0 w-100 d-md-block d-flex justify-content-between align-items-center" 
                      data-bs-toggle="collapse" 
                      data-bs-target="#myAccountList" 
                      role="button" 
                      aria-expanded="false" 
                      aria-controls="myAccountList">
                    My Account
                    <i class="fa-solid fa-caret-down d-md-none text-gray"></i> <!-- Icon chỉ hiện khi màn nhỏ -->
                  </h4>
                </div>
              
                <div class="collapse d-md-block" id="myAccountList">
                  <div class="content text-gray">
                    <ul class="list-unstyled fw-medium">
                      <li class="nav-link">My Account</li>
                      <li class="nav-link">Contact</li>
                      <li class="nav-link">Shopping cart</li>
                      <li class="nav-link">Shop</li>
                    </ul>
                  </div>
                </div>
            </div>
              

            <div class="col-12 col-md-12 col-lg-2">
                <div class="title mb-2 d-flex justify-content-between align-items-center">
                  <!-- Gắn collapse vào đây -->
                  <h4 class="mb-0 w-100 d-lg-block d-flex justify-content-between align-items-center" 
                      data-bs-toggle="collapse" 
                      data-bs-target="#infoList" 
                      role="button" 
                      aria-expanded="false" 
                      aria-controls="infoList">Contact
                    <i class="fa-solid fa-caret-down d-lg-none text-gray"></i> <!-- chỉ hiện icon khi nhỏ -->
                  </h4>
                </div>
              
                <div class="collapse d-lg-block" id="infoList">
                  <div class="content text-gray">
                    <ul class="list-unstyled fw-medium">
                      <li class="nav-link">Help Center</li>
                      <li class="nav-link">Returns Product</li>
                      <li class="nav-link">Recalls</li>
                      <li class="nav-link">Accessibility</li>
                      <li class="nav-link">Contact Us</li>
                      <li class="nav-link">Store Pickup</li>
                    </ul>
                  </div>
                </div>
            </div>
              
            <div class="col-12 col-md-12 col-lg-2">
                <div class="title mb-2 d-flex justify-content-between align-items-center">
                  <h4 class="mb-0 w-100 d-lg-block d-flex justify-content-between align-items-center"
                      data-bs-toggle="collapse"
                      data-bs-target="#categoryList"
                      role="button"
                      aria-expanded="false"
                      aria-controls="categoryList">
                    Categories
                    <i class="fa-solid fa-caret-down d-lg-none text-gray"></i>
                  </h4>
                </div>
              
                <div class="collapse d-lg-block" id="categoryList">
                  <div class="content text-gray">
                    <ul class="list-unstyled fw-medium">
                      @foreach ($categories as $category)
                        <li class="nav-link">
                          <a href="{{route('category.product',['id'=>$category->id])}}" class="nav-link  px-0 py-1">{{$category->name}}</a>
                          

                        </li>
                      @endforeach
                      
                      
                    </ul>
                  </div>
                </div>
            </div>
              
        </div>
        <div class="text-center pt-4 mt-4 border-top border-secondary">
            <p class="mb-0 text-gray">&copy; 2021 Bookery. All Rights Reserved.</p>
        </div>
    </div>

</footer>
