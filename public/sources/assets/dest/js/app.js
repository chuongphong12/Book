$('.owl-carousel').owlCarousel({
    margin:10,
    nav:true,
    loop: false,
    lazyLoad:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:4
        }
    }
});

$('.owl-carousel1').owlCarousel({
    margin:10,
    nav:true,
    loop: false,
    lazyLoad:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:4
        }
    }
});

$(".owl-carousel2").owlCarousel({
    autoplay:true,
    dots:false,
    lazyLoad:true,
    loop: true,
    animateOut: 'fadeOut',
    animateIn: 'flipInX',
    items:1,
    margin:10,
    smartSpeed:10
});