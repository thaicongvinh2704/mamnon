export function initTopBar() {
  const topBar = document.querySelector('.top-bar');
  if (!topBar) {
    return;
  }

  topBar.dataset.ready = 'true';
}

