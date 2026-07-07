let toastStack = null;

export function initToastStack() {
  toastStack = document.querySelector('[data-toast-stack]');
  return toastStack;
}

export function showToast(message, type = 'success', timeout = 4200) {
  const stack = toastStack || initToastStack();
  if (!stack) {
    return null;
  }

  const toast = document.createElement('div');
  toast.className = `toast${type === 'error' ? ' is-error' : ''}`;
  toast.textContent = message;
  stack.appendChild(toast);

  window.setTimeout(() => {
    toast.style.opacity = '0';
    toast.style.transform = 'translateY(-8px)';
    window.setTimeout(() => toast.remove(), 220);
  }, timeout);

  return toast;
}

