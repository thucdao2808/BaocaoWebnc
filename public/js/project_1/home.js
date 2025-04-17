const swiper = new Swiper('.mySwiper', {
    slidesPerView: 'auto',      // Cho phép hiển thị nhiều slide cùng lúc
    spaceBetween: 16,           // Khoảng cách giữa các slide
    freeMode: true,             // Cho phép trượt tự do
    grabCursor: true,           // Thêm con trỏ "bàn tay"
  });

function adjustSlideWidth() {
    var windowWidth = $(window).width();

    if(windowWidth < 768) {
        $(".swiper-slide").css("width", "48%");
    }
    else if (windowWidth < 992) {
        $(".swiper-slide").css("width", "31.5%");
    }else if (windowWidth < 1200) {
        $(".swiper-slide").css("width", "23.5%");
    } else {
        // Desktop
        $(".swiper-slide").css("width", "15.4%");
    }

   
}
function adnewproduct() {
    var windowWidth = $(window).width();
    
    if(windowWidth < 768) {
        $('.new-product').css("height", "700px");
    }else {
        $('.new-product').css("height", "100%");
    }
}

// Gọi khi trang load
adjustSlideWidth();
adnewproduct();

// Gọi khi resize
$(window).resize(function() {
    adjustSlideWidth();
    adnewproduct();

});
