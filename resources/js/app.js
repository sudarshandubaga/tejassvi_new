import "./bootstrap";
import "lightslider/dist/js/lightslider";
import Lightbox from "bs5-lightbox";

for (const el of document.querySelectorAll(".lightbox")) {
    el.addEventListener("click", Lightbox.initialize);
}

$(function () {
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
        thumbItem: 5,
        slideMargin: 0,
        enableDrag: false,
        currentPagerPosition: "left",
        responsive: [
            {
                breakpoint: 500,
                settings: {
                    thumbItem: 3,
                },
            },
        ],
    });
});
