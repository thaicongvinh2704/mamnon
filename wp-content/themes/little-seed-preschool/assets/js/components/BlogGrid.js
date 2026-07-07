export function initBlogGrid() {
  const search = document.querySelector('.archive-search input[type="search"]');
  if (search && new URLSearchParams(window.location.search).has('s')) {
    search.focus({ preventScroll: true });
  }
}

