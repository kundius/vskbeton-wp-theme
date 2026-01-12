import EmblaCarousel from "embla-carousel";
import { addPrevNextBtnsClickHandlers } from "./EmblaCarouselArrowButtons";

const options = {
  loop: true,
  slidesToScroll: 1,
  dragFree: false, // или true — не влияет напрямую на ease
  ease: (t) => t, // линейная анимация
};

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
  const descViewportNode = wrapNode.querySelector(
    "[data-geography-gl-desc-viewport]"
  );
  const mainPrevNode = wrapNode.querySelector("[data-geography-gl-main-prev]");
  const mainNextNode = wrapNode.querySelector("[data-geography-gl-main-next]");

  const mainEmblaApi = EmblaCarousel(mainViewportNode, options);
  const beforeEmblaApi = EmblaCarousel(beforeViewportNode, options);
  const afterEmblaApi = EmblaCarousel(afterViewportNode, options);
  const descEmblaApi = EmblaCarousel(descViewportNode, options);

  const removeMainPrevNextBtnsClickHandlers = addPrevNextBtnsClickHandlers(
    mainEmblaApi,
    mainPrevNode,
    mainNextNode
  );

  mainEmblaApi.on("destroy", removeMainPrevNextBtnsClickHandlers);

  // Нормализация индекса (для loop)
  function normalizeIndex(index) {
    const slideCount = mainEmblaApi.slideNodes().length;
    return ((index % slideCount) + slideCount) % slideCount;
  }

  // Обновление всех каруселей на основе центрального индекса
  function updateAllFromCenter(centerIndex) {
    const prev = normalizeIndex(centerIndex - 1);
    const next = normalizeIndex(centerIndex + 1);

    beforeEmblaApi.scrollTo(prev, false);
    mainEmblaApi.scrollTo(centerIndex, false);
    afterEmblaApi.scrollTo(next, false);
    descEmblaApi.scrollTo(centerIndex, false);
  }

  // Обработчик для каждой карусели
  function createHandler(offsetFromCenter) {
    return () => {
      // Получаем реальный индекс, который сейчас отображает эта карусель
      const actualIndex = this.selectedScrollSnap();
      // Восстанавливаем, какой центральный индекс должен быть
      const inferredCenter = normalizeIndex(actualIndex - offsetFromCenter);
      // Обновляем всё семейство
      updateAllFromCenter(inferredCenter);
    };
  }

  // Подписка:
  // beforeEmblaApi отстаёт на 1 → её offsetFromCenter = -1
  // mainEmblaApi — центр → offset = 0
  // afterEmblaApi опережает на 1 → offset = +1
  beforeEmblaApi.on("select", createHandler.call(beforeEmblaApi, -1));
  mainEmblaApi.on("select", createHandler.call(mainEmblaApi, 0));
  afterEmblaApi.on("select", createHandler.call(afterEmblaApi, +1));

  // Инициализация: покажем начальное состояние (например, центр = 0)
  updateAllFromCenter(0);
  // const syncCarousels = () => {
  //   const index = mainEmblaApi.selectedScrollSnap();
  //   const slideCount = mainEmblaApi.slideNodes().length;

  //   // Первая карусель — отстаёт на 1
  //   let prevIndex = index - 1;
  //   if (prevIndex < 0) {
  //     prevIndex = slideCount - 1;
  //   }

  //   // Третья карусель — опережает на 1
  //   let nextIndex = index + 1;
  //   if (nextIndex >= slideCount) {
  //     nextIndex = 0;
  //   }

  //   // Обновляем позиции без анимации (или с ней — по желанию)
  //   beforeEmblaApi.scrollTo(prevIndex, false);
  //   afterEmblaApi.scrollTo(nextIndex, false);
  // };

  // // Подписываемся на изменение слайда во второй карусели
  // mainEmblaApi.on("select", syncCarousels);

  // // Инициализируем начальное состояние
  // syncCarousels();
}
