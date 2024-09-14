// import Swiper JS
import Swiper, { Navigation } from "swiper";
// import Swiper styles
import "../../../node_modules/swiper/css";
import "../../../node_modules/swiper/css/navigation";

const swiper = new Swiper(".carouselOne", {
  modules: [Navigation],
  loop: true,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});
