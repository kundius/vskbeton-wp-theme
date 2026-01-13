import EmblaCarousel from "embla-carousel";
import { addPrevNextBtnsClickHandlers } from "./EmblaCarouselArrowButtons";

export function applyPartnersEmbla(wrap) {
  const viewportNode = wrap.querySelector("[data-partners-embla-viewport]");
  const prevNode = wrap.querySelector("[data-partners-embla-prev]");
  const nextNode = wrap.querySelector("[data-partners-embla-next]");

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

export function initPartnersEmbla() {
  const items = document.querySelectorAll("[data-partners-embla]") || [];

  Array.from(items).forEach(applyPartnersEmbla);
}
