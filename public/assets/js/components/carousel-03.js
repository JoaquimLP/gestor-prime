// import Swiper JS
import Swiper, { Navigation, Pagination, Autoplay } from "swiper";
// import Swiper styles
import "../../../node_modules/swiper/css";
import "../../../node_modules/swiper/css/navigation";
import "../../../node_modules/swiper/css/pagination";

const swiper = new Swiper(".carouselThree", {
  modules: [Navigation, Pagination, Autoplay],
  loop: true,
  autoplay: {
    delay: 2500,
    disableOnInteraction: false,
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});
