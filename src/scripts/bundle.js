import Swiper, { Autoplay, EffectFade, Pagination, Navigation, Thumbs } from "swiper"
// import HystModal from "hystmodal"
import "fslightbox"

// const modal = new HystModal({
//   linkAttributeName: "data-hystmodal",
// });

new Swiper(".intro-slideshow.swiper", {
  modules: [Autoplay, Pagination, EffectFade],
  speed: 500,
  spaceBetween: 24,
  loop: true,
  effect: "fade",
  autoplay: {
    disableOnInteraction: false,
    delay: 6000,
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true
  },
  slidesPerView: 1,
});

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
    }
  }
});

// document.addEventListener('wpcf7submit', function(event) {
//   event.target.classList.remove('sent');
//   event.target.classList.remove('failed');
//   event.target.classList.add('init');

//   modal.open('#success');
// }, false);

const headerToggle = document.querySelector('.header__toggle')
const mainNav = document.querySelector('.main-nav')
const mainNavClose = document.querySelector('.main-nav__close')

if (headerToggle && mainNav && mainNavClose) {
  headerToggle.addEventListener('click', () => {
    mainNav.classList.add('main-nav_opened')
  })
  mainNavClose.addEventListener('click', () => {
    mainNav.classList.remove('main-nav_opened')
  })
}

