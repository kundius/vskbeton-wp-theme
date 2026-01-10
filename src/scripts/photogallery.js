import EmblaCarousel from "embla-carousel";
import { addPrevNextBtnsClickHandlers } from "./EmblaCarouselArrowButtons";

export function applyPhotogallery(wrap) {
  const viewportNode = wrap.querySelector("[data-photogallery-viewport]");
  const prevNode = wrap.querySelector("[data-photogallery-prev]");
  const nextNode = wrap.querySelector("[data-photogallery-next]");

  const emblaApi = EmblaCarousel(viewportNode, {
    loop: false,
    slidesToScroll: "auto",
  });

  const removeMainPrevNextBtnsClickHandlers = addPrevNextBtnsClickHandlers(
    emblaApi,
    prevNode,
    nextNode
  );

  emblaApi.on("destroy", removeMainPrevNextBtnsClickHandlers);
}

export function initPhotogallery() {
  const items = document.querySelectorAll("[data-photogallery]") || [];

  Array.from(items).forEach(applyPhotogallery);
}
