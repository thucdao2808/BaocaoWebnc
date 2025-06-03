<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        @media (min-width: 1025px) {
        .h-custom {
        height: 100vh !important;
        }
        }

        .card-registration .select-input.form-control[readonly]:not([disabled]) {
        font-size: 1rem;
        line-height: 2.15;
        padding-left: .75em;
        padding-right: .75em;
        }

        .card-registration .select-arrow {
        top: 13px;
        }
    </style>
</head>

<body>
    <div class="cart">
        @php
            $carts = session()->get('cart');
        @endphp

        <section class="h-100 h-custom" style="background-color: #d2c9ff;">
          <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
              <div class="col-12">
                <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                  <div class="card-body p-0">
                    <div class="row g-0">
                      <div class="col-lg-8">
                        <div class="p-5">
                          <div class="d-flex justify-content-between align-items-center mb-5">
                            <h1 class="fw-bold mb-0">Shopping Cart</h1>
                            <h6 class="mb-0 text-muted">{{count($carts)}} items</h6>
                          </div>
                          <hr class="my-4">
                          @php
                            $total = 0;
                          @endphp
                          @if(!empty($carts))
                          @foreach ($carts as $cartItem )
                              @php
                                $total += $cartItem['price']*$cartItem['quantity'];
                              @endphp
                              <div class="row mb-4 d-flex justify-content-between align-items-center">
                                  <div class="col-md-2 col-lg-2 col-xl-2">
                                  <img
                                      src="{{asset('/storage/'.$cartItem['image_path'])}}"
                                      class="img-fluid rounded-3" alt="Cotton T-shirt">
                                  </div>
                                  <div class="col-md-3 col-lg-3 col-xl-3">
                                  <h6 class="text-uppercase mb-0">{{$cartItem['name']}}</h6>

                                  </div>
                                  <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                  
              
                                  <input  min="1" name="quantity" value="{{$cartItem['quantity']}}" type="number"
                                      class="form-control form-control-sm number_change" style="width:80px;" 
                                      data-price="{{$cartItem['price']}}"
                                      data-id="{{$cartItem['id']}}"/>
              
                                  
                                  </div>
                                  <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                  <h6 class="mb-0">{{number_Format($cartItem['price'])}} đ</h6>
                                  </div>
                                  <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                  <a href="" class="btn btn-danger cart_delete" 
                                      data-url ="{{route('cart.delete')}}"
                                      data-id="{{$cartItem['id']}}">Xóa</a>
                                  </div>
                                  <hr class="my-4"> 
                              </div>
                          @endforeach
                          @else
                            <p>Giỏ hàng của bạn hiện đang trống.</p>
                          @endif
                          <div class="pt-5">
                            <h6 class="mb-0">
                              <a href="{{ route('custom.category.index') }}" class="text-body" style="text-decoration: none;">
                                <i class="fa-solid fa-arrow-left me-2"></i>Back to shop
                              </a>
                            </h6>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-4 bg-body-tertiary">
                        <div class="p-5">
                          <h3 class="fw-bold mb-5 mt-2 pt-1">Tổng tiền </h3>
                          <hr class="my-4">
        
                          <div class="d-flex justify-content-between mb-4">
                            <h5 class="text-uppercase">items </h5>
                            <h5 class="total-price-sidebar">{{number_Format($total)}}đ</h5>
                          </div>
        
                          <h5 class="text-uppercase mb-3">Shipping</h5>
        
                          <div class="mb-4 pb-2">
                            <select data-mdb-select-init>
                              <option value="1">Standard-Delivery- €5.00</option>
                              <option value="2">Two</option>
                              <option value="3">Three</option>
                              <option value="4">Four</option>
                            </select>
                          </div>
        
                          <h5 class="text-uppercase mb-3">Give code</h5>
        
        
                          <hr class="my-4">
        
                          <div class="d-flex justify-content-between mb-5">
                            <h5 class="text-uppercase">Total price</h5>
                            <div class="">
                              <h5 class="total-price-sidebar text-danger fw-medium fs-6">{{number_Format($total)}}đ</h5>

                            </div>
                          </div>
                          
                          <form action="{{route('checkout')}}" method="get">
                            @foreach ($cartDb as $item)
                              <input type="hidden" name="cart_id[]" value="{{$item->id}}">
                            @endforeach
                            <button  type="submit" class="btn btn-dark btn-block btn-lg">Thanh toán</button>

                          </form>
        
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
         </section>
    </div>
    
</body>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" ></script>
<script>
    $(
      
      function(){
        function numberChange() {
            let total = 0;

            $('.number_change').each(function () {
                let quantity = parseInt($(this).val());
                let price = parseFloat($(this).data('price'));

                total += quantity * price;
            });

            const formattedTotal = new Intl.NumberFormat('vi-VN').format(total) + ' đ';
            $('h5.total-price, h5.total-price-sidebar').text(formattedTotal);
        }
      $(document).on('change', '.number_change',numberChange);

      $(document).on('change', '.number_change', function () {
        const input = $(this);
        const quantity = input.val();
        const id = input.data('id');

        // Gửi AJAX cập nhật session
        $.ajax({
            url: "{{ route('cart.update') }}",
            method: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                id: id,
                quantity: quantity
            },
            success: function () {
              numberChange(); // cập nhật hiển thị
            },
            error: function () {
                alert('Lỗi khi cập nhật giỏ hàng.');
            }
        });
    });

    function cartDelete(event){
          event.preventDefault();
          let urlDelete = $(this).data('url');
          const id = $(this).data('id');
          const productRow = $(this).closest('.row')
          $.ajax({
              type:"GET",
              url: urlDelete,
              data:{
                id: id
              },
              success:function(data){
                productRow.remove(); // Xóa sản phẩm khỏi DOM
                numberChange(); 

              },
              error: function(data){

              }
          });
    }

    $(document).on('click','.cart_delete',cartDelete);
    
      }


    );
</script>
</html>