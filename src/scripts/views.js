const elements = document.querySelectorAll('[data-views]') || []
elements.forEach(async (el) => {
  const searchParams = new URLSearchParams()
  searchParams.set('action', 'views')
  searchParams.set('id', el.dataset.views)
  if (el.dataset.viewsIncrease) {
    searchParams.set('increase', 1)
  }
  const response = await fetch(`${theme_ajax.url}?${searchParams.toString()}`, {
    method: 'POST',
    body: searchParams
  })
  const data = await response.json()
  let count = 0
  if (response.ok && data.success) {
    count = data.count
  }
  el.innerHTML = count
})
