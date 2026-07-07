import { initAboutPage } from './pages/about.js';
import { initAdmissionsPage } from './pages/admissions.js';
import { initBlogDetailPage } from './pages/blogDetail.js';
import { initBlogPage } from './pages/blog.js';
import { initCampusDetailPage } from './pages/campusDetail.js';
import { initCampusesPage } from './pages/campuses.js';
import { initContactPage } from './pages/contact.js';
import { initFaqPage } from './pages/faq.js';
import { initHomePage } from './pages/home.js';
import { initProgramDetailPage } from './pages/programDetail.js';
import { initProgramsPage } from './pages/programs.js';
import { initTuitionPage } from './pages/tuition.js';

export function getRouteName() {
  return document.body.dataset.route || 'home';
}

export const pageHandlers = {
  home: initHomePage,
  'gioi-thieu': initAboutPage,
  'phuong-phap-montessori': initAboutPage,
  programs: initProgramsPage,
  'program-detail': initProgramDetailPage,
  campuses: initCampusesPage,
  'campus-detail': initCampusDetailPage,
  'hoc-phi': initTuitionPage,
  'tuyen-sinh': initAdmissionsPage,
  faq: initFaqPage,
  blog: initBlogPage,
  'blog-detail': initBlogDetailPage,
  'lien-he': initContactPage,
  404: () => document.body.classList.add('page-404-ready'),
  archive: () => document.body.classList.add('page-archive-ready'),
};
