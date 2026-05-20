/* ══════════════════════════════════════════════════════════════
   ELITE ATACORA — main.js
   Vanilla JS, no build step, no jQuery.
   All features wrapped in DOMContentLoaded.
══════════════════════════════════════════════════════════════ */

document.addEventListener('DOMContentLoaded', () => {

  /* ────────────────────────────────────────────────────────────
     1. STICKY HEADER — add class when scrolled
  ─────────────────────────────────────────────────────────────  */
  const header = document.querySelector('.ea-header');
  if (header) {
    const onScroll = () => {
      header.classList.toggle('is-scrolled', window.scrollY > 20);
    };
    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();
  }

  /* ────────────────────────────────────────────────────────────
     2. MOBILE BURGER MENU
  ─────────────────────────────────────────────────────────────  */
  const burger    = document.querySelector('.ea-burger');
  const mobileNav = document.querySelector('.ea-mobile-nav');

  if (burger && mobileNav) {
    burger.addEventListener('click', () => {
      const isOpen = mobileNav.classList.toggle('is-open');
      burger.setAttribute('aria-expanded', isOpen);
      burger.setAttribute('aria-label', isOpen ? 'Fermer le menu' : 'Ouvrir le menu');
    });

    // Close on Escape
    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape' && mobileNav.classList.contains('is-open')) {
        mobileNav.classList.remove('is-open');
        burger.setAttribute('aria-expanded', 'false');
        burger.focus();
      }
    });

    // Close when a nav link is clicked
    mobileNav.querySelectorAll('a').forEach(link => {
      link.addEventListener('click', () => {
        mobileNav.classList.remove('is-open');
        burger.setAttribute('aria-expanded', 'false');
      });
    });
  }

  /* ────────────────────────────────────────────────────────────
     3. ANIMATED COUNTERS (IntersectionObserver)
  ─────────────────────────────────────────────────────────────  */
  const counters = document.querySelectorAll('.ea-counter');

  if (counters.length) {
    const ease = t => 1 - Math.pow(1 - t, 3);
    const DUR  = 1600;

    const counterObserver = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (!entry.isIntersecting) return;
        const el     = entry.target;
        const to     = parseInt(el.dataset.to, 10);
        const suffix = el.dataset.suffix || '';
        const start  = performance.now();

        const tick = (now) => {
          const p = Math.min(1, (now - start) / DUR);
          const n = Math.round(ease(p) * to);
          el.textContent = n.toLocaleString('fr-FR') + suffix;
          if (p < 1) requestAnimationFrame(tick);
        };

        requestAnimationFrame(tick);
        counterObserver.unobserve(el);
      });
    }, { threshold: 0.4 });

    counters.forEach(c => counterObserver.observe(c));
  }

  /* ────────────────────────────────────────────────────────────
     4. SCROLL REVEAL
  ─────────────────────────────────────────────────────────────  */
  const reveals = document.querySelectorAll('.ea-reveal');
  if (reveals.length) {
    const revealObserver = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('is-visible');
          revealObserver.unobserve(entry.target);
        }
      });
    }, { threshold: 0.1 });

    reveals.forEach(el => revealObserver.observe(el));
  }

  /* ────────────────────────────────────────────────────────────
     5. SCROLL TO TOP BUTTON
  ─────────────────────────────────────────────────────────────  */
  const scrollTopBtn = document.querySelector('.ea-scroll-top');
  if (scrollTopBtn) {
    window.addEventListener('scroll', () => {
      scrollTopBtn.classList.toggle('is-visible', window.scrollY > 400);
    }, { passive: true });

    scrollTopBtn.addEventListener('click', () => {
      window.scrollTo({ top: 0, behavior: 'smooth' });
    });
  }

  /* ────────────────────────────────────────────────────────────
     6. GALLERY LIGHTBOX
  ─────────────────────────────────────────────────────────────  */
  const lightbox    = document.querySelector('.ea-lightbox');
  const lbImg       = lightbox?.querySelector('.ea-lightbox__img');
  const lbCaption   = lightbox?.querySelector('.ea-lightbox__caption');
  const lbClose     = lightbox?.querySelector('.ea-lightbox__close');
  const galleryBtns = document.querySelectorAll('.ea-gallery__item[data-src]');

  if (lightbox && lbImg && galleryBtns.length) {
    const openLightbox = (src, caption) => {
      lbImg.src = src;
      if (lbCaption) lbCaption.textContent = caption || '';
      lightbox.classList.add('is-open');
      lightbox.removeAttribute('hidden');
      document.body.style.overflow = 'hidden';
      lbClose?.focus();
    };

    const closeLightbox = () => {
      lightbox.classList.remove('is-open');
      lightbox.setAttribute('hidden', '');
      document.body.style.overflow = '';
    };

    galleryBtns.forEach(btn => {
      btn.addEventListener('click', () => {
        openLightbox(btn.dataset.src, btn.dataset.caption);
      });
    });

    lbClose?.addEventListener('click', closeLightbox);

    lightbox.addEventListener('click', (e) => {
      if (e.target === lightbox) closeLightbox();
    });

    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape' && lightbox.classList.contains('is-open')) closeLightbox();
    });
  }

  /* ────────────────────────────────────────────────────────────
     7. FAQ ACCORDION
  ─────────────────────────────────────────────────────────────  */
  const faqItems = document.querySelectorAll('.ea-faq-item');

  faqItems.forEach((item, idx) => {
    const btn    = item.querySelector('.ea-faq-item__btn');
    const answer = item.querySelector('.ea-faq-item__answer');

    if (!btn || !answer) return;

    btn.setAttribute('aria-expanded', idx === 0 ? 'true' : 'false');
    btn.setAttribute('aria-controls', `faq-answer-${idx}`);
    answer.id = `faq-answer-${idx}`;
    if (idx === 0) item.classList.add('is-open');

    btn.addEventListener('click', () => {
      const isOpen = item.classList.toggle('is-open');
      btn.setAttribute('aria-expanded', isOpen);

      // Close siblings
      faqItems.forEach((other, otherIdx) => {
        if (otherIdx !== idx) {
          other.classList.remove('is-open');
          other.querySelector('.ea-faq-item__btn')?.setAttribute('aria-expanded', 'false');
        }
      });
    });
  });

  /* ────────────────────────────────────────────────────────────
     8. EVENTS LIST / CALENDAR VIEW TOGGLE
  ─────────────────────────────────────────────────────────────  */
  const viewBtns   = document.querySelectorAll('.ea-view-toggle__btn');
  const listView   = document.querySelector('.ea-events-list-view');
  const calView    = document.querySelector('.ea-events-calendar-view');

  if (viewBtns.length && listView && calView) {
    viewBtns.forEach(btn => {
      btn.addEventListener('click', () => {
        const target = btn.dataset.view;
        viewBtns.forEach(b => b.classList.toggle('is-active', b === btn));
        listView.hidden = target !== 'list';
        calView.hidden  = target !== 'calendar';
      });
    });
  }

  /* ────────────────────────────────────────────────────────────
     9. NEWS FILTER PILLS (archive page — client-side filter)
  ─────────────────────────────────────────────────────────────  */
  const filterPills   = document.querySelectorAll('.ea-filter-pill[data-filter]');
  const newsCards     = document.querySelectorAll('.ea-news-card[data-category]');
  const searchInput   = document.querySelector('.ea-search-input');
  const noResultsMsg  = document.querySelector('.ea-no-results');

  if (filterPills.length && newsCards.length) {
    let activeFilter = 'all';
    let searchQuery  = '';

    const applyFilters = () => {
      let visible = 0;
      newsCards.forEach(card => {
        const cat    = (card.dataset.category || '').toLowerCase();
        const text   = card.textContent.toLowerCase();
        const catOk  = activeFilter === 'all' || cat === activeFilter;
        const searchOk = !searchQuery || text.includes(searchQuery);
        const show   = catOk && searchOk;
        card.hidden  = !show;
        if (show) visible++;
      });
      if (noResultsMsg) noResultsMsg.hidden = visible > 0;
    };

    filterPills.forEach(pill => {
      pill.addEventListener('click', () => {
        filterPills.forEach(p => p.classList.remove('is-active'));
        pill.classList.add('is-active');
        activeFilter = (pill.dataset.filter || 'all').toLowerCase();
        applyFilters();
      });
    });

    if (searchInput) {
      searchInput.addEventListener('input', () => {
        searchQuery = searchInput.value.trim().toLowerCase();
        applyFilters();
      });
    }
  }

  /* ────────────────────────────────────────────────────────────
     10. MEMBERSHIP TYPE SELECTOR (adhérer form)
  ─────────────────────────────────────────────────────────────  */
  const typeButtons = document.querySelectorAll('.ea-type-btn');
  const typeInput   = document.querySelector('input[name="ea_member_type"]');

  if (typeButtons.length) {
    typeButtons.forEach(btn => {
      btn.addEventListener('click', () => {
        typeButtons.forEach(b => b.classList.remove('is-active'));
        btn.classList.add('is-active');
        if (typeInput) typeInput.value = btn.dataset.type;
      });
    });
  }

  /* ────────────────────────────────────────────────────────────
     11. CONTACT / ADHÉRER FORM — success state (non-CF7 fallback)
  ─────────────────────────────────────────────────────────────  */
  document.querySelectorAll('.ea-native-form').forEach(form => {
    const successEl = form.closest('.ea-form-wrap')?.querySelector('.ea-form-success');
    if (!successEl) return;

    form.addEventListener('submit', (e) => {
      e.preventDefault();
      form.hidden = true;
      successEl.classList.add('is-visible');
      successEl.focus();

      const resetBtn = successEl.querySelector('.ea-reset-form');
      resetBtn?.addEventListener('click', () => {
        form.reset();
        form.hidden = false;
        successEl.classList.remove('is-visible');
      });
    });
  });

  /* ────────────────────────────────────────────────────────────
     12. SMOOTH SCROLL for anchor links
  ─────────────────────────────────────────────────────────────  */
  document.querySelectorAll('a[href^="#"]').forEach(link => {
    link.addEventListener('click', (e) => {
      const id = link.getAttribute('href').slice(1);
      if (!id) return;
      const target = document.getElementById(id);
      if (!target) return;
      e.preventDefault();
      const headerHeight = header ? header.offsetHeight : 0;
      const top = target.getBoundingClientRect().top + window.scrollY - headerHeight - 24;
      window.scrollTo({ top, behavior: 'smooth' });
    });
  });

  /* ────────────────────────────────────────────────────────────
     13. TICKER — duplicate items for seamless loop
        (items already duplicated in PHP template)
  ─────────────────────────────────────────────────────────────  */
  // The CSS animation handles the marquee. Pause on hover.
  const tickerInner = document.querySelector('.ea-ticker__inner');
  if (tickerInner) {
    const track = tickerInner.closest('.ea-ticker__track');
    track?.addEventListener('mouseenter', () => { tickerInner.style.animationPlayState = 'paused'; });
    track?.addEventListener('mouseleave', () => { tickerInner.style.animationPlayState = 'running'; });
  }

  /* ────────────────────────────────────────────────────────────
     14. HEADER NAV — keyboard trap for dropdowns
  ─────────────────────────────────────────────────────────────  */
  document.querySelectorAll('.ea-nav__item--has-children').forEach(item => {
    const link     = item.querySelector('.ea-nav__link');
    const dropdown = item.querySelector('.ea-dropdown');
    if (!link || !dropdown) return;

    link.addEventListener('keydown', (e) => {
      if (e.key === 'Enter' || e.key === ' ') {
        e.preventDefault();
        const isOpen = dropdown.style.opacity === '1';
        dropdown.style.opacity = isOpen ? '' : '1';
        dropdown.style.pointerEvents = isOpen ? '' : 'auto';
        link.setAttribute('aria-expanded', !isOpen);
        if (!isOpen) dropdown.querySelector('a')?.focus();
      }
    });

    item.addEventListener('keydown', (e) => {
      if (e.key === 'Escape') {
        dropdown.style.opacity = '';
        dropdown.style.pointerEvents = '';
        link.setAttribute('aria-expanded', 'false');
        link.focus();
      }
    });

    // Close when focus leaves the item
    item.addEventListener('focusout', (e) => {
      if (!item.contains(e.relatedTarget)) {
        dropdown.style.opacity = '';
        dropdown.style.pointerEvents = '';
        link.setAttribute('aria-expanded', 'false');
      }
    });
  });

  /* ────────────────────────────────────────────────────────────
     15. FLOATING DECO ELEMENTS (subtle parallax)
  ─────────────────────────────────────────────────────────────  */
  const floatyEls = document.querySelectorAll('.floaty');
  // CSS handles animation; JS only needed if we want scroll parallax.
  // Keeping it CSS-only for performance.

}); // end DOMContentLoaded
