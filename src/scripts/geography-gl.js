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
  const mainPrevNode = wrapNode.querySelector("[data-geography-gl-main-prev]");
  const mainNextNode = wrapNode.querySelector("[data-geography-gl-main-next]");

  const mainEmblaApi = EmblaCarousel(mainViewportNode, {
    loop: true,
    slidesToScroll: 1,
  });
  const beforeEmblaApi = EmblaCarousel(beforeViewportNode, {
    loop: true,
    slidesToScroll: 1,
  });
  const afterEmblaApi = EmblaCarousel(afterViewportNode, {
    loop: true,
    slidesToScroll: 1,
  });

  const removeMainPrevNextBtnsClickHandlers = addPrevNextBtnsClickHandlers(
    mainEmblaApi,
    mainPrevNode,
    mainNextNode
  );

  emblaApi.on("destroy", removeMainPrevNextBtnsClickHandlers);

  const syncCarousels = () => {
    const index = mainEmblaApi.selectedScrollSnap();
    const slideCount = mainEmblaApi.slideNodes().length;

    // Первая карусель — отстаёт на 1
    let prevIndex = index - 1;
    if (prevIndex < 0) {
      prevIndex = slideCount - 1;
    }

    // Третья карусель — опережает на 1
    let nextIndex = index + 1;
    if (nextIndex >= slideCount) {
      nextIndex = 0;
    }

    // Обновляем позиции без анимации (или с ней — по желанию)
    beforeEmblaApi.scrollTo(prevIndex, false);
    afterEmblaApi.scrollTo(nextIndex, false);
  };

  // Подписываемся на изменение слайда во второй карусели
  mainEmblaApi.on("select", syncCarousels);

  // Инициализируем начальное состояние
  syncCarousels();
}
