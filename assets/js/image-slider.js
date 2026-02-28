jQuery(document).ready(function($) {
    $('.mea-image-slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        dots: true,
        autoplay: true,
        autoplaySpeed: 3000,
        prevArrow: '<button class="slick-prev">Prev</button>',
        nextArrow: '<button class="slick-next">Next</button>',
    });
});