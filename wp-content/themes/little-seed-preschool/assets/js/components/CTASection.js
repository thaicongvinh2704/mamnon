let modalRoot = null;
let lastActiveElement = null;

function getFocusableElements(root) {
  return Array.from(root.querySelectorAll('a[href], button:not([disabled]), input:not([disabled]), select:not([disabled]), textarea:not([disabled]), [tabindex]:not([tabindex="-1"])')).filter((element) => element.offsetParent !== null);
}

export function closeBrochureModal() {
  if (!modalRoot) {
    modalRoot = document.querySelector('[data-brochure-modal]');
  }
  if (!modalRoot) {
    return;
  }

  modalRoot.hidden = true;
  document.body.classList.remove('modal-open');
  if (lastActiveElement && typeof lastActiveElement.focus === 'function') {
    lastActiveElement.focus();
  }
}

function openBrochureModal() {
  if (!modalRoot) {
    modalRoot = document.querySelector('[data-brochure-modal]');
  }
  if (!modalRoot) {
    return;
  }

  lastActiveElement = document.activeElement;
  modalRoot.hidden = false;
  document.body.classList.add('modal-open');
  const firstFocusable = getFocusableElements(modalRoot)[0];
  firstFocusable?.focus?.();
}

export function initBrochureModal() {
  modalRoot = document.querySelector('[data-brochure-modal]');
  if (!modalRoot) {
    return;
  }

  window.lsCloseBrochureModal = closeBrochureModal;
  window.lsOpenBrochureModal = openBrochureModal;

  document.querySelectorAll('[data-open-brochure-modal]').forEach((trigger) => {
    trigger.addEventListener('click', openBrochureModal);
  });

  modalRoot.addEventListener('click', (event) => {
    if (event.target.matches('[data-modal-close]') || event.target.closest('[data-modal-close]')) {
      closeBrochureModal();
    }
  });

  document.addEventListener('keydown', (event) => {
    if (!modalRoot || modalRoot.hidden) {
      return;
    }
    if (event.key === 'Escape') {
      closeBrochureModal();
      return;
    }

    if (event.key !== 'Tab') {
      return;
    }

    const focusables = getFocusableElements(modalRoot);
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
}
