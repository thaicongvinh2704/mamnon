import { showToast } from './Toast.js';

function setError(form, fieldName, message) {
  const target = form.querySelector(`[data-field-error="${fieldName}"]`);
  if (target) {
    target.textContent = message || '';
  }
}

function clearErrors(form) {
  form.querySelectorAll('[data-field-error]').forEach((node) => {
    node.textContent = '';
  });
}

function validate(form) {
  const name = form.querySelector('[name="name"]');
  const phone = form.querySelector('[name="phone"]');
  const campus = form.querySelector('[name="campus"]');
  const email = form.querySelector('[name="email"]');

  clearErrors(form);
  let valid = true;

  if (!name?.value.trim()) {
    setError(form, 'name', 'Vui lòng nhập họ tên.');
    valid = false;
  }

  if (!phone?.value.trim()) {
    setError(form, 'phone', 'Vui lòng nhập số điện thoại.');
    valid = false;
  }

  if (!campus?.value.trim()) {
    setError(form, 'campus', 'Vui lòng chọn cơ sở quan tâm.');
    valid = false;
  }

  if (email?.value.trim() && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email.value.trim())) {
    setError(form, 'email', 'Email chưa đúng định dạng.');
    valid = false;
  }

  return valid;
}

async function submitForm(form) {
  if (!window.lsTheme?.ajaxUrl) {
    throw new Error('Thiếu cấu hình AJAX.');
  }

  const formData = new FormData(form);
  const response = await fetch(window.lsTheme.ajaxUrl, {
    method: 'POST',
    credentials: 'same-origin',
    headers: {
      'X-Requested-With': 'XMLHttpRequest',
    },
    body: formData,
  });

  const data = await response.json();
  if (!response.ok || !data?.success) {
    throw new Error(data?.data?.message || 'Không thể gửi form vào lúc này.');
  }

  return data.data;
}

export function initLeadForms() {
  const forms = Array.from(document.querySelectorAll('[data-lead-form]'));
  if (!forms.length) {
    return;
  }

  forms.forEach((form) => {
    form.addEventListener('submit', async (event) => {
      event.preventDefault();
      if (!validate(form)) {
        showToast('Vui lòng kiểm tra lại các trường bắt buộc.', 'error');
        return;
      }

      const submitButton = form.querySelector('[type="submit"]');
      const originalText = submitButton?.innerHTML;
      submitButton?.setAttribute('disabled', 'disabled');
      if (submitButton) {
        submitButton.innerHTML = '<span>Đang gửi...</span>';
      }

      try {
        const result = await submitForm(form);
        form.reset();
        clearErrors(form);
        showToast(result.message || 'Gửi thông tin thành công.');
        if (typeof window.lsCloseBrochureModal === 'function' && form.dataset.formType === 'brochure') {
          window.lsCloseBrochureModal();
        }
      } catch (error) {
        showToast(error.message || 'Có lỗi xảy ra.', 'error');
      } finally {
        submitButton?.removeAttribute('disabled');
        if (submitButton && originalText) {
          submitButton.innerHTML = originalText;
        }
      }
    });
  });
}

