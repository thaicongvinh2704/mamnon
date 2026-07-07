export function initHeader() {
  const header = document.querySelector('[data-site-header]');
  if (!header) {
    return;
  }

  const onScroll = () => {
    header.classList.toggle('is-scrolled', window.scrollY > 8);
  };

  onScroll();
  window.addEventListener('scroll', onScroll, { passive: true });
}

