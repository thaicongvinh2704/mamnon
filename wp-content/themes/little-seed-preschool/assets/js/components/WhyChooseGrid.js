export function initWhyChooseGrid() {
  document.querySelectorAll('.info-card').forEach((card) => {
    card.addEventListener('mouseenter', () => card.classList.add('is-hover'));
    card.addEventListener('mouseleave', () => card.classList.remove('is-hover'));
  });
}

