export function initFloatingActions() {
  const actions = document.querySelector('.floating-actions');
  if (!actions) {
    return;
  }

  actions.dataset.ready = 'true';
}

