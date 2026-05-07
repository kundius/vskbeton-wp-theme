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
import { initFeedbackForm } from "./feedback-form";

initHeaderToggle();
initStickyHeader();
initPhotogallery();
initGeographyGl();
initPartnersEmbla();
initCallbackButton();
initFeedbackForm();

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

document.addEventListener(
  "wpcf7mailsent",
  function (event) {
    const elYmId = document.querySelector("[data-ym-id]");
    if (elYmId && elYmId.dataset.ymId) {
      const pathname =
        window.location.pathname
          .replace(/[^a-z0-9]+/gi, "_")
          .replace(/^_|_$/g, "")
          .toUpperCase() || "ROOT";

      ym(elYmId.dataset.ymId, "reachGoal", pathname);
      console.log("goal", elYmId.dataset.ymId, pathname);
    }

    console.log("mail sent", event);
  },
  false,
);
