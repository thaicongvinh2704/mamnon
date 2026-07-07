export function initFAQAccordion() {
  const accordions = Array.from(document.querySelectorAll('[data-faq-accordion]'));
  if (!accordions.length) {
    return;
  }

  accordions.forEach((accordion) => {
    const items = Array.from(accordion.querySelectorAll('details'));
    items.forEach((item) => {
      item.addEventListener('toggle', () => {
        if (!item.open) {
          return;
        }
        items.forEach((other) => {
          if (other !== item) {
            other.open = false;
          }
        });
      });
    });
  });
}

