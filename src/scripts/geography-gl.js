import EmblaCarousel from "embla-carousel";
import { addPrevNextBtnsClickHandlers } from "./EmblaCarouselArrowButtons";

export function initGeographyGl() {
  const wrapNode = document.querySelector("[data-geography-gl]");

  if (!wrapNode) return;

  const mainViewportNode = wrapNode.querySelector(
    "[data-geography-gl-main-viewport]"
  );
  const beforeViewportNode = wrapNode.querySelector(
    "[data-geography-gl-before-viewport]"
  );
  const afterViewportNode = wrapNode.querySelector(
    "[data-geography-gl-after-viewport]"
  );

  const mainEmblaApi = EmblaCarousel(mainViewportNode, {
    loop: true,
    slidesToScroll: "auto",
  });
  const beforeEmblaApi = EmblaCarousel(beforeViewportNode, {
    loop: true,
    slidesToScroll: "auto",
  });
  const afterEmblaApi = EmblaCarousel(afterViewportNode, {
    loop: true,
    slidesToScroll: "auto",
  });
}
