const themeUrl = window.lsTheme?.themeUrl || new URL('../../../', import.meta.url).href;

function placeholderImage(width, height, label) {
  const svg = `<svg xmlns="http://www.w3.org/2000/svg" width="${width}" height="${height}" viewBox="0 0 ${width} ${height}"><defs><linearGradient id="g" x1="0" x2="1" y1="0" y2="1"><stop offset="0%" stop-color="#f4eedf"/><stop offset="100%" stop-color="#dce8d8"/></linearGradient></defs><rect width="100%" height="100%" rx="32" fill="url(#g)"/><text x="50%" y="50%" dominant-baseline="middle" text-anchor="middle" fill="#2f4a38" font-family="Arial, sans-serif" font-size="${Math.max(22, Math.round(Math.min(width, height) * 0.055))}" font-weight="700">${label}</text></svg>`;
  return `data:image/svg+xml;charset=UTF-8,${encodeURIComponent(svg)}`;
}

const specs = {
  'homepage-hero-preschool-school-tour.webp': { alt: 'Little Seed preschool children on a school tour', width: 1920, height: 900, isHero: true },
  'homepage-about-montessori-classroom.webp': { alt: 'Montessori-inspired classroom at Little Seed', width: 1200, height: 800 },
  'homepage-active-learning-highscope.webp': { alt: 'Children engaged in active learning with hands-on materials', width: 1200, height: 800 },
  'homepage-english-circle-time.webp': { alt: 'Teacher leading natural English circle time', width: 1200, height: 800 },
  'homepage-care-nutrition-mealtime.webp': { alt: 'Healthy mealtime and nutrition care', width: 1200, height: 800 },
  'homepage-teacher-child-guidance.webp': { alt: 'Teacher guiding a child with patience', width: 1200, height: 800 },
  'homepage-program-tabs-children.webp': { alt: 'Children exploring different learning stations', width: 1200, height: 800 },
  'homepage-campus-playground.webp': { alt: 'Playground at Little Seed campus', width: 1600, height: 900 },
  'homepage-consultation-form-visual.webp': { alt: 'Parent meeting with admissions consultant', width: 1200, height: 800 },
  'homepage-parent-testimonial-conversation.webp': { alt: 'Parent sharing feedback in conversation', width: 1200, height: 800 },
  'program-toddler-standard-classroom.webp': { alt: 'Toddler classroom with practical life materials', width: 1200, height: 800 },
  'program-bilingual-explore-class.webp': { alt: 'Bilingual exploration class', width: 1200, height: 800 },
  'program-discover-project-learning.webp': { alt: 'Project-based discovery learning', width: 1200, height: 800 },
  'program-adventure-international-english.webp': { alt: 'International English adventure class', width: 1200, height: 800 },
  'curriculum-montessori-materials-closeup.webp': { alt: 'Close-up of Montessori materials', width: 1200, height: 800 },
  'curriculum-art-music-room.webp': { alt: 'Art and music room', width: 1200, height: 800 },
  'curriculum-water-play-safety.webp': { alt: 'Water play learning with safety supervision', width: 1200, height: 800 },
  'nutrition-school-kitchen-healthy-meal.webp': { alt: 'Healthy meal prepared in school kitchen', width: 1200, height: 800 },
  'campus-library-reading-corner.webp': { alt: 'Reading corner in campus library', width: 1200, height: 800 },
  'campus-sensory-play-area.webp': { alt: 'Sensory play area for children', width: 1200, height: 800 },
  'trust-teachers-team-group.webp': { alt: 'Little Seed teaching team', width: 1200, height: 800 },
  'trust-teacher-training-workshop.webp': { alt: 'Teacher training workshop', width: 1200, height: 800 },
  'admissions-school-tour-family.webp': { alt: 'Family attending school tour', width: 1200, height: 800 },
  'branches-campus-card-visual.webp': { alt: 'Campus card visual with greenery', width: 1200, height: 800 },
  'tuition-consultation-parent-meeting.webp': { alt: 'Tuition consultation with a parent', width: 1200, height: 800 },
  'faq-parent-support-meeting.webp': { alt: 'Parent support meeting and Q&A', width: 1200, height: 800 },
  'blog-montessori-independence-thumbnail.webp': { alt: 'Blog on Montessori independence', width: 1200, height: 675 },
  'blog-child-language-development-thumbnail.webp': { alt: 'Blog on child language development', width: 1200, height: 675 },
  'student-portrait-confident-child.webp': { alt: 'Confident preschool child portrait', width: 1200, height: 800 },
  'contact-support-hotline-visual.webp': { alt: 'Admissions hotline support visual', width: 1200, height: 800 },
};

export const images = Object.fromEntries(
  Object.entries(specs).map(([filename, meta]) => {
    const src = `${themeUrl}assets/images/${filename}`;
    return [
      filename,
      {
        src,
        alt: meta.alt,
        width: meta.width,
        height: meta.height,
        loading: meta.isHero ? 'eager' : 'lazy',
        decoding: 'async',
        isHero: Boolean(meta.isHero),
        fallback: placeholderImage(meta.width, meta.height, 'Little Seed'),
      },
    ];
  }),
);

export function asset(filename) {
  return `${themeUrl}assets/images/${filename}`;
}

export function getImage(filename, overrides = {}) {
  const base = images[filename];
  if (!base) {
    return {
      src: placeholderImage(1200, 800, 'Little Seed'),
      alt: 'Little Seed image placeholder',
      width: 1200,
      height: 800,
      loading: 'lazy',
      decoding: 'async',
      isHero: false,
      fallback: placeholderImage(1200, 800, 'Little Seed'),
      ...overrides,
    };
  }

  return {
    ...base,
    ...overrides,
  };
}

export function getImageSrc(filename) {
  return getImage(filename).src;
}

export function getPlaceholderImage(width = 1200, height = 800, label = 'Little Seed') {
  return placeholderImage(width, height, label);
}

