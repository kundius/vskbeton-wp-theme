export function initHeaderToggle() {
  const toggle = document.querySelector("[data-header-toggle]");

  if (!toggle) return;

  toggle.addEventListener("click", (e) => {
    e.preventDefault();

    if (toggle.dataset.headerToggle === "active") {
      toggle.setAttribute("data-header-toggle", "");
    } else {
      toggle.setAttribute("data-header-toggle", "active");
    }
  });
}
