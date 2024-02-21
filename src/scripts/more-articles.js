async function init() {
  const list = document.querySelector("#more-articles-list");
  const button = document.querySelector("#more-articles-button");

  if (!(button && list)) return;

  const params = {
    action: "morearticles",
    query: posts_vars,
    page: current_page,
  };
  let text = button.innerHTML;

  button.innerHTML = "Загрузка...";

  const response = await fetch(theme_ajax.url, {
    method: "POST",
    body: JSON.stringify(params),
  });
  const data = await response.json();

  if (response.ok) {
    button.innerHTML = text;
    div.insertAdjacentHTML("beforeend", data);
    list.current_page++;
    if (current_page == max_pages) {
      button.setAttribute("hidden", true);
    }
  } else {
    button.setAttribute("hidden", true);
  }
}

init();
