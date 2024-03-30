// import jQuery from "jquery";
import "./bootstrap";
import "lightslider/dist/js/lightslider";
import "bs5-lightbox";

// import Swiper JS
// import Swiper from "swiper";
// import { Navigation, Pagination } from "swiper/modules";

// import Swiper styles
// import "swiper/css";
// import "swiper/css/navigation";
// import "swiper/css/pagination";

// var swiper = new Swiper(".mySwiper", {
//     loop: true,
//     spaceBetween: 10,
//     slidesPerView: 4,
//     freeMode: true,
//     watchSlidesProgress: true,
//     modules: [Navigation, Pagination],
//     navigation: {
//         nextEl: ".swiper-button-next",
//         prevEl: ".swiper-button-prev",
//     },
//     breakpoints: {
//         500: {
//             slidesPerView: 2,
//         },
//     },
// });
// var swiper2 = new Swiper(".mySwiper2", {
//     loop: true,
//     spaceBetween: 10,
//     thumbs: {
//         swiper: swiper,
//     },
//     breakpoints: {
//         500: {
//             slidesPerView: 2,
//         },
//     },
// });

$(".light-slider").lightSlider({
    item: 6,
    slideMove: 3,
    loop: true,
    enableDrag: false,
    responsive: [
        {
            breakpoint: 500,
            settings: {
                item: 2,
            },
        },
    ],
});

$("#productImageSlider").lightSlider({
    gallery: true,
    item: 1,
    loop: true,
    slideMargin: 0,
    thumbItem: 5,
    responsive: [
        {
            breakpoint: 500,
            settings: {
                thumbItem: 3,
            },
        },
    ],
});

// var swiper = new Swiper(".mySwiper", {
//     slidesPerView: 3,
//     spaceBetween: 30,
//     freeMode: true,
//     pagination: {
//         el: ".swiper-pagination",
//         clickable: true,
//     },
//     breakpoints: {
//         500: {
//             slidesPerView: 2,
//         },
//     },
// });

// $(function () {
//     $(document).on("click", ".nav-toggle", function () {
//         $(".main-header nav").toggleClass("show-nav");
//     });

//     $(document).on("click", ".filter-btn", function () {
//         $(".filter-options").addClass("show-filter");
//     });
// });
