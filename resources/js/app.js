// import jQuery from "jquery";
import "./bootstrap";
import "lightslider/dist/js/lightslider";

// import Swiper JS
import Swiper from "swiper";
import { Navigation, Pagination } from "swiper/modules";

// import Swiper styles
import "swiper/css";
import "swiper/css/navigation";
import "swiper/css/pagination";

var swiper = new Swiper(".mySwiper", {
    loop: true,
    spaceBetween: 10,
    slidesPerView: 4,
    freeMode: true,
    watchSlidesProgress: true,
    modules: [Navigation, Pagination],
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});
var swiper2 = new Swiper(".mySwiper2", {
    loop: true,
    spaceBetween: 10,
    thumbs: {
        swiper: swiper,
    },
});

$(".light-slider").lightSlider({
    item: 6,
    slideMove: 3,
    loop: true,
    enableDrag: false,
});
