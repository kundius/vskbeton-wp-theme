import MicroModal from "micromodal";

export function applyCallbackButton(el) {
  el.addEventListener("click", (e) => {
    e.preventDefault();

    MicroModal.show("modal-callback", {
      awaitOpenAnimation: true,
      awaitCloseAnimation: true,
      closeTrigger: "data-modal-close",
    });
  });
}

export function initCallbackButton() {
  const items = document.querySelectorAll("[data-callback-button]") || [];

  Array.from(items).forEach(applyCallbackButton);
}
