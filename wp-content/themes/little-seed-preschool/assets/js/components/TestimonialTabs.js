export function initTestimonialTabs() {
  const root = document.querySelector('[data-testimonial-tabs]');
  if (!root) {
    return;
  }

  const tabs = Array.from(root.querySelectorAll('[data-testimonial-tab]'));
  const panels = Array.from(root.querySelectorAll('[data-testimonial-panel]'));

  const activate = (slug) => {
    tabs.forEach((tab) => {
      const active = tab.dataset.testimonialTab === slug;
      tab.classList.toggle('is-active', active);
      tab.setAttribute('aria-selected', active ? 'true' : 'false');
    });
    panels.forEach((panel) => {
      panel.classList.toggle('is-active', panel.dataset.testimonialPanel === slug);
    });
  };

  tabs.forEach((tab) => {
    tab.addEventListener('click', () => activate(tab.dataset.testimonialTab));
  });
}

