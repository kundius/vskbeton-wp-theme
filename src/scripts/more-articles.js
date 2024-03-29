const list = document.querySelector("#more-articles-list");
const button = document.querySelector("#more-articles-button");

if (button && list) {
  button.addEventListener("click", async () => {
    const searchParams = new URLSearchParams();
    searchParams.set("action", "more_articles");
    searchParams.set("query", posts_vars);
    searchParams.set("page", current_page);

    let text = button.innerHTML;

    button.innerHTML = "Загрузка...";

    const response = await fetch(theme_ajax.url, {
      method: "POST",
      body: searchParams,
    });
    const data = await response.text();

    if (response.ok) {
      button.innerHTML = text;
      list.insertAdjacentHTML("beforeend", data);
      current_page++;
      if (current_page == max_pages) {
        button.setAttribute("hidden", true);
      }
    } else {
      button.setAttribute("hidden", true);
    }
  });
}
