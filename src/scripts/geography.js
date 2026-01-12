import EmblaCarousel from "embla-carousel";
import { addPrevNextBtnsClickHandlers } from "./EmblaCarouselArrowButtons";
import ClassNames from "embla-carousel-class-names";

export function applyGeography(wrap) {
  const viewportNode = wrap.querySelector("[data-geography-viewport]");
  const prevNode = wrap.querySelector("[data-geography-prev]");
  const nextNode = wrap.querySelector("[data-geography-next]");

  const emblaApi = EmblaCarousel(
    viewportNode,
    {
      loop: true,
      slidesToScroll: 1,
      containScroll: false,
    },
    [ClassNames()]
  );

  const removeMainPrevNextBtnsClickHandlers = addPrevNextBtnsClickHandlers(
    emblaApi,
    prevNode,
    nextNode
  );

  emblaApi.on("destroy", removeMainPrevNextBtnsClickHandlers);
}

export function initGeography() {
  const items = document.querySelectorAll("[data-geography]") || [];

  Array.from(items).forEach(applyGeography);
}
