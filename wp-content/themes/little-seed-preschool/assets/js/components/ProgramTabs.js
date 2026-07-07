export function initProgramTabs() {
  const root = document.querySelector('[data-program-tabs]');
  if (!root) {
    return;
  }

  const tabs = Array.from(root.querySelectorAll('[data-program-tab]'));
  const panels = Array.from(root.querySelectorAll('[data-program-panel]'));

  const activate = (slug) => {
    tabs.forEach((tab) => {
      const active = tab.dataset.programTab === slug;
      tab.classList.toggle('is-active', active);
      tab.setAttribute('aria-selected', active ? 'true' : 'false');
    });

    panels.forEach((panel) => {
      panel.classList.toggle('is-active', panel.dataset.programPanel === slug);
    });
  };

  tabs.forEach((tab) => {
    tab.addEventListener('click', () => activate(tab.dataset.programTab));
  });
}

