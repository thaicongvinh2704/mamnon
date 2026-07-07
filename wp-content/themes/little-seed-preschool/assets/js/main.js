import { initHeader } from './components/Header.js';
import { initTopBar } from './components/TopBar.js';
import { initMegaMenu } from './components/MegaMenu.js?v=mega-align-1';
import { initMobileMenu } from './components/MobileMenu.js';
import { initHeroSlider } from './components/HeroSlider.js';
import { initSectionReveal } from './components/SectionTitle.js';
import { initWhyChooseGrid } from './components/WhyChooseGrid.js';
import { initProgramTabs } from './components/ProgramTabs.js';
import { initCampusGrid } from './components/CampusGrid.js';
import { initLeadForms } from './components/ConsultationForm.js';
import { initFAQAccordion } from './components/FAQAccordion.js';
import { initTestimonialTabs } from './components/TestimonialTabs.js';
import { initBlogGrid } from './components/BlogGrid.js';
import { initBrochureModal } from './components/CTASection.js';
import { initFooter } from './components/Footer.js';
import { initFloatingActions } from './components/FloatingActions.js';
import { initToastStack } from './components/Toast.js';
import { getRouteName, pageHandlers } from './router.js';

function initSharedUI() {
  document.documentElement.classList.add('js-ready');
  initToastStack();
  initHeader();
  initTopBar();
  initMegaMenu();
  initMobileMenu();
  initHeroSlider();
  initSectionReveal();
  initWhyChooseGrid();
  initProgramTabs();
  initCampusGrid();
  initLeadForms();
  initFAQAccordion();
  initTestimonialTabs();
  initBlogGrid();
  initBrochureModal();
  initFooter();
  initFloatingActions();
}

function initRouteSpecificUI() {
  const route = getRouteName();
  const handler = pageHandlers[route] || pageHandlers.archive;
  if (typeof handler === 'function') {
    handler();
  }
}

if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', () => {
    initSharedUI();
    initRouteSpecificUI();
  });
} else {
  initSharedUI();
  initRouteSpecificUI();
}
