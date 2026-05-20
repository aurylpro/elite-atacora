/* Elite Atacora — main.js v2.0 */

document.addEventListener('DOMContentLoaded', () => {

  /* --------------------------------------------------------
     1. HEADER — transparent → cream blur on scroll
  -------------------------------------------------------- */
  const header = document.querySelector('.site-header');
  if (header) {
    const onScroll = () => header.classList.toggle('site-header--scrolled', window.scrollY > 20);
    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();
  }

  /* --------------------------------------------------------
     2. BURGER MENU
  -------------------------------------------------------- */
  const burger    = document.querySelector('.burger');
  const mobileNav = document.querySelector('.mobile-nav');
  if (burger && mobileNav) {
    burger.addEventListener('click', () => {
      const open = mobileNav.classList.toggle('is-open');
      burger.setAttribute('aria-expanded', open);
      document.body.style.overflow = open ? 'hidden' : '';
    });
    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape' && mobileNav.classList.contains('is-open')) {
        mobileNav.classList.remove('is-open');
        burger.setAttribute('aria-expanded', 'false');
        document.body.style.overflow = '';
      }
    });
    window.addEventListener('resize', () => {
      if (window.innerWidth > 1024 && mobileNav.classList.contains('is-open')) {
        mobileNav.classList.remove('is-open');
        burger.setAttribute('aria-expanded', 'false');
        document.body.style.overflow = '';
      }
    });
  }

  /* --------------------------------------------------------
     3. ANIMATED COUNTERS
  -------------------------------------------------------- */
  const counters = document.querySelectorAll('[data-counter]');
  if (counters.length) {
    const io = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        if (!entry.isIntersecting) return;
        const el = entry.target;
        const target = parseFloat(el.dataset.counter);
        const suffix = el.dataset.suffix || '';
        const dur = 1600;
        const start = performance.now();
        io.unobserve(el);
        const tick = (now) => {
          const p = Math.min(1, (now - start) / dur);
          const eased = 1 - Math.pow(1 - p, 3);
          el.textContent = Math.round(eased * target).toLocaleString('fr-FR') + suffix;
          if (p < 1) requestAnimationFrame(tick);
        };
        requestAnimationFrame(tick);
      });
    }, { threshold: 0.4 });
    counters.forEach((c) => io.observe(c));
  }

  /* --------------------------------------------------------
     4. GALLERY LIGHTBOX
  -------------------------------------------------------- */
  const lightbox     = document.querySelector('.lightbox');
  const lbImg        = lightbox && lightbox.querySelector('.lightbox__img');
  const lbCaption    = lightbox && lightbox.querySelector('.lightbox__caption');
  const lbClose      = lightbox && lightbox.querySelector('.lightbox__close');
  const galleryItems = document.querySelectorAll('.gallery-item');

  if (lightbox && galleryItems.length) {
    galleryItems.forEach((item) => {
      item.addEventListener('click', () => {
        const img = item.querySelector('img');
        const cap = item.querySelector('.gallery-item__caption');
        if (lbImg) { lbImg.src = img.src; lbImg.alt = img.alt; }
        if (lbCaption) lbCaption.textContent = cap ? cap.textContent : '';
        lightbox.classList.add('is-open');
        document.body.style.overflow = 'hidden';
      });
    });
    const closeLb = () => { lightbox.classList.remove('is-open'); document.body.style.overflow = ''; };
    if (lbClose) lbClose.addEventListener('click', closeLb);
    lightbox.addEventListener('click', (e) => { if (e.target === lightbox) closeLb(); });
    document.addEventListener('keydown', (e) => { if (e.key === 'Escape') closeLb(); });
  }

  /* --------------------------------------------------------
     5. FAQ ACCORDION
  -------------------------------------------------------- */
  const faqItems = document.querySelectorAll('.faq-item');
  faqItems.forEach((item) => {
    const btn = item.querySelector('.faq-btn');
    if (btn) btn.addEventListener('click', () => {
      const wasOpen = item.classList.contains('is-open');
      faqItems.forEach((f) => f.classList.remove('is-open'));
      if (!wasOpen) item.classList.add('is-open');
    });
  });

  /* --------------------------------------------------------
     6. MEMBERSHIP TYPE SELECTOR
  -------------------------------------------------------- */
  const typeBtns  = document.querySelectorAll('.form-type-btn');
  const typeInput = document.querySelector('input[name="type_adhesion"]');
  typeBtns.forEach((btn) => {
    btn.addEventListener('click', () => {
      typeBtns.forEach((b) => b.classList.remove('is-active'));
      btn.classList.add('is-active');
      if (typeInput) typeInput.value = btn.dataset.type || btn.textContent.trim();
    });
  });

  /* --------------------------------------------------------
     7. SMOOTH SCROLL
  -------------------------------------------------------- */
  document.querySelectorAll('a[href^="#"]').forEach((link) => {
    link.addEventListener('click', (e) => {
      const target = document.querySelector(link.getAttribute('href'));
      if (target) { e.preventDefault(); target.scrollIntoView({ behavior: 'smooth', block: 'start' }); }
    });
  });

  /* --------------------------------------------------------
     8. FORM — prevent double submit
  -------------------------------------------------------- */
  document.querySelectorAll('form').forEach((form) => {
    form.addEventListener('submit', () => {
      const btn = form.querySelector('[type="submit"]');
      if (btn) { btn.disabled = true; setTimeout(() => { btn.disabled = false; }, 5000); }
    });
  });

});
