function getFocusableElements(root) {
  return Array.from(root.querySelectorAll('a[href], button:not([disabled]), input:not([disabled]), select:not([disabled]), textarea:not([disabled]), [tabindex]:not([tabindex="-1"])')).filter((element) => element.offsetParent !== null);
}

export function initMobileMenu() {
  const drawer = document.querySelector('#mobile-drawer');
  const toggle = document.querySelector('[data-mobile-menu-toggle]');
  if (!drawer || !toggle) {
    return;
  }

  const panel = drawer.querySelector('.mobile-drawer__panel');
  const closeTriggers = drawer.querySelectorAll('[data-mobile-menu-close]');
  let lastActive = null;

  const openMenu = () => {
    lastActive = document.activeElement;
    drawer.hidden = false;
    document.body.classList.add('menu-open');
    toggle.setAttribute('aria-expanded', 'true');
    window.requestAnimationFrame(() => {
      const focusables = getFocusableElements(panel);
      (focusables[0] || panel).focus?.();
    });
  };

  const closeMenu = () => {
    drawer.hidden = true;
    document.body.classList.remove('menu-open');
    toggle.setAttribute('aria-expanded', 'false');
    if (lastActive && typeof lastActive.focus === 'function') {
      lastActive.focus();
    }
  };

  toggle.addEventListener('click', openMenu);
  closeTriggers.forEach((trigger) => trigger.addEventListener('click', closeMenu));

  document.addEventListener('keydown', (event) => {
    if (drawer.hidden) {
      return;
    }

    if (event.key === 'Escape') {
      closeMenu();
      return;
    }

    if (event.key !== 'Tab') {
      return;
    }

    const focusables = getFocusableElements(panel);
    if (!focusables.length) {
      event.preventDefault();
      return;
    }

    const first = focusables[0];
    const last = focusables[focusables.length - 1];
    if (event.shiftKey && document.activeElement === first) {
      event.preventDefault();
      last.focus();
    } else if (!event.shiftKey && document.activeElement === last) {
      event.preventDefault();
      first.focus();
    }
  });

  drawer.addEventListener('click', (event) => {
    if (event.target === drawer || event.target.classList.contains('mobile-drawer__overlay')) {
      closeMenu();
    }
  });
}

