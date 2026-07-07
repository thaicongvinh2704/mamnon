function closeAll(items) {
  items.forEach((item) => {
    item.classList.remove('is-open');
    const button = item.querySelector('.site-nav__toggle');
    if (button) {
      button.setAttribute('aria-expanded', 'false');
    }
  });
}

function positionMenu(item) {
  const menu = item.querySelector('.mega-menu');
  if (!menu) {
    return;
  }

  menu.style.setProperty('--mega-nudge', '0px');

  const margin = 16;
  const rect = menu.getBoundingClientRect();
  let nudge = 0;

  if (rect.left < margin) {
    nudge = margin - rect.left;
  } else if (rect.right > window.innerWidth - margin) {
    nudge = window.innerWidth - margin - rect.right;
  }

  menu.style.setProperty('--mega-nudge', `${nudge}px`);
}

export function initMegaMenu() {
  const items = Array.from(document.querySelectorAll('.site-nav__item.has-children'));
  if (!items.length) {
    return;
  }

  const closeOnOutsideClick = (event) => {
    if (!event.target.closest('.site-nav')) {
      closeAll(items);
    }
  };

  document.addEventListener('click', closeOnOutsideClick);
  document.addEventListener('keydown', (event) => {
    if (event.key === 'Escape') {
      closeAll(items);
    }
  });

  items.forEach((item) => {
    const button = item.querySelector('.site-nav__toggle');
    if (!button) {
      return;
    }

    item.addEventListener('mouseenter', () => positionMenu(item));
    item.addEventListener('focusin', () => positionMenu(item));

    button.addEventListener('click', () => {
      const isOpen = item.classList.contains('is-open');
      closeAll(items);
      if (!isOpen) {
        positionMenu(item);
        item.classList.add('is-open');
        button.setAttribute('aria-expanded', 'true');
      }
    });
  });

  window.addEventListener('resize', () => {
    items.forEach((item) => {
      if (item.matches(':hover') || item.classList.contains('is-open')) {
        positionMenu(item);
      }
    });
  });
}
