export function initFooter() {
  const footer = document.querySelector('.site-footer');
  if (!footer) {
    return;
  }

  footer.dataset.ready = 'true';
}

