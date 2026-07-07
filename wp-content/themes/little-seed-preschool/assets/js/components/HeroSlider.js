export function initHeroSlider() {
  const slider = document.querySelector('[data-hero-slider]');
  if (!slider) {
    return;
  }

  const track = slider.querySelector('[data-hero-track]');
  const slides = Array.from(slider.querySelectorAll('[data-hero-slide]'));
  const dotsWrap = slider.querySelector('[data-hero-dots]');
  const prevButton = slider.querySelector('[data-hero-prev]');
  const nextButton = slider.querySelector('[data-hero-next]');
  const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  if (!track || !slides.length || !dotsWrap) {
    return;
  }

  let index = 0;
  let timer = null;
  const dots = slides.map((_, dotIndex) => {
    const button = document.createElement('button');
    button.type = 'button';
    button.className = 'hero-slider__dot';
    button.setAttribute('aria-label', `Slide ${dotIndex + 1}`);
    button.addEventListener('click', () => show(dotIndex));
    dotsWrap.appendChild(button);
    return button;
  });

  const update = () => {
    track.style.transform = `translateX(-${index * 100}%)`;
    slides.forEach((slide, slideIndex) => {
      slide.classList.toggle('is-active', slideIndex === index);
    });
    dots.forEach((dot, dotIndex) => {
      dot.classList.toggle('is-active', dotIndex === index);
      dot.setAttribute('aria-current', dotIndex === index ? 'true' : 'false');
    });
  };

  const show = (nextIndex) => {
    index = (nextIndex + slides.length) % slides.length;
    update();
    restart();
  };

  const next = () => show(index + 1);
  const prev = () => show(index - 1);

  const stop = () => {
    if (timer) {
      window.clearInterval(timer);
      timer = null;
    }
  };

  const restart = () => {
    stop();
    if (!reducedMotion) {
      timer = window.setInterval(next, 6500);
    }
  };

  prevButton?.addEventListener('click', prev);
  nextButton?.addEventListener('click', next);
  slider.addEventListener('mouseenter', stop);
  slider.addEventListener('mouseleave', restart);
  slider.addEventListener('focusin', stop);
  slider.addEventListener('focusout', restart);

  update();
  restart();
}

