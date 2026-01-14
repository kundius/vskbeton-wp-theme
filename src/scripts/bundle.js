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
import { initHeaderToggle } from "./header-toggle";
import { initPhotogallery } from "./photogallery";
import { initGeographyGl } from "./geography-gl";
import { initPartnersEmbla } from "./partners-embla";
import { Mask, MaskInput } from "maska";
import { initCallbackButton } from "./callback-button";

initHeaderToggle();
initStickyHeader();
initPhotogallery();
initGeographyGl();
initPartnersEmbla();
initCallbackButton();

new MaskInput("[data-maska]");

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
