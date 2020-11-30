$(document).ready(function() {
    $(".wq-depoimentos-carousel").owlCarousel({
        items:1,
        loop:true,
        nav: false,
        autoplay:true,
        autoplayTimeout:7000,
        autoplayHoverPause:true,
		smartSpeed:2000,
        navText: [ '<span class="flaticon-prev"></span>', '<span class="flaticon-next"></span>' ],
    });
});


