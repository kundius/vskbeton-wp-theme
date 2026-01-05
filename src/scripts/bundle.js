import "./views";
import "./more-articles";
import "./more-certificates";

import Swiper, {
  Autoplay,
  EffectFade,
  Pagination,
  Navigation,
  Grid,
  Thumbs,
} from "swiper";
import "fslightbox";
import { initStickyHeader } from "./sticky-header";

initStickyHeader();

new Swiper(".geography-slideshow .swiper", {
  modules: [Autoplay, Navigation],
  speed: 500,
  spaceBetween: 24,
  loop: true,
  autoplay: {
    disableOnInteraction: false,
    delay: 6000,
  },
  navigation: {
    nextEl: ".geography-slideshow .swiper-button-next",
    prevEl: ".geography-slideshow .swiper-button-prev",
  },
  slidesPerView: 1,
});

new Swiper(".partners-slideshow .swiper", {
  modules: [Navigation],
  spaceBetween: 10,
  slidesPerView: 2,
  freeMode: true,
  navigation: {
    nextEl: ".partners-slideshow .swiper-button-next",
    prevEl: ".partners-slideshow .swiper-button-prev",
  },
  breakpoints: {
    767: {
      spaceBetween: 20,
      slidesPerView: 5,
    },
  },
});

new Swiper(".team .swiper", {
  modules: [Navigation],
  spaceBetween: 0,
  slidesPerView: 1,
  freeMode: true,
  loop: false,
  navigation: {
    nextEl: ".team .slider-nav__next",
    prevEl: ".team .slider-nav__prev",
  },
  breakpoints: {
    767: {
      spaceBetween: 0,
      slidesPerView: 3,
    },
    1200: {
      spaceBetween: 0,
      slidesPerView: 3,
    },
  },
});

new Swiper(".block-partners .swiper", {
  modules: [Navigation, Grid],
  spaceBetween: 0,
  slidesPerView: 2,
  loopAddBlankSlides: true,
  grid: {
    rows: 3,
  },
  freeMode: true,
  loop: false,
  // loopAddBlankSlides: false,
  navigation: {
    nextEl: ".block-partners .slider-nav__next",
    prevEl: ".block-partners .slider-nav__prev",
  },
  breakpoints: {
    767: {
      grid: {
        rows: 3,
      },
      slidesPerView: 3,
    },
  },
});

const headerToggle = document.querySelector(".header__toggle");
const mainNav = document.querySelector(".main-nav");
const mainNavClose = document.querySelector(".main-nav__close");

if (headerToggle && mainNav && mainNavClose) {
  headerToggle.addEventListener("click", () => {
    mainNav.classList.add("main-nav_opened");
  });
  mainNavClose.addEventListener("click", () => {
    mainNav.classList.remove("main-nav_opened");
  });
}
