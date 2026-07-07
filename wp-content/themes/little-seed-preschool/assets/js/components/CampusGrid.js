export function initCampusGrid() {
  document.querySelectorAll('.campus-card').forEach((card) => {
    card.addEventListener('focusin', () => card.classList.add('is-active'));
    card.addEventListener('focusout', () => card.classList.remove('is-active'));
  });
}

