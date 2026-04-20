/* ════════════════════════════════════════════
   HMIT – Global JavaScript
════════════════════════════════════════════ */

document.addEventListener('DOMContentLoaded', () => {

  /* ── Smooth Scroll ──────────────────────── */
  document.querySelectorAll('a[href^="#"]').forEach(a => {
    a.addEventListener('click', function (e) {
      const target = document.querySelector(this.getAttribute('href'));
      if (target) {
        e.preventDefault();
        target.scrollIntoView({ behavior: 'smooth', block: 'start' });
      }
    });
  });

  /* ── Active Nav on Scroll ───────────────── */
  const sections = document.querySelectorAll('section[id]');
  const navLinks = document.querySelectorAll('.hmit-nav-links .nav-link:not(.nav-cta-btn)');

  window.addEventListener('scroll', () => {
    let current = '';
    sections.forEach(s => {
      if (window.scrollY >= s.offsetTop - 110) current = s.id;
    });
    navLinks.forEach(l => {
      l.classList.remove('active');
      if (l.getAttribute('href') === '#' + current) l.classList.add('active');
    });

    // Back to top
    const btn = document.getElementById('backToTop');
    if (btn) {
      window.scrollY > 400 ? btn.classList.add('visible') : btn.classList.remove('visible');
    }
  });

  /* ── Intersection Observer (scroll animations) ── */
  const animEls = document.querySelectorAll('.anim-fade, .anim-up, .anim-left, .anim-right');
  const obs = new IntersectionObserver((entries) => {
    entries.forEach(e => {
      if (e.isIntersecting) {
        e.target.classList.add('animated');
        obs.unobserve(e.target);
      }
    });
  }, { threshold: 0.10 });
  animEls.forEach(el => obs.observe(el));

  /* ── Navbar collapse on mobile link click ── */
  document.querySelectorAll('#mainNav .nav-link').forEach(link => {
    link.addEventListener('click', () => {
      const collapse = document.getElementById('mainNav');
      if (collapse && collapse.classList.contains('show')) {
        bootstrap.Collapse.getInstance(collapse)?.hide();
      }
    });
  });

  /* ── Counter animation ──────────────────── */
  const counters = document.querySelectorAll('[data-count]');
  if (counters.length) {
    const countObs = new IntersectionObserver((entries) => {
      entries.forEach(e => {
        if (e.isIntersecting) {
          const target = +e.target.getAttribute('data-count');
          let count = 0;
          const step = Math.ceil(target / 60);
          const timer = setInterval(() => {
            count = Math.min(count + step, target);
            e.target.textContent = count + (e.target.dataset.suffix || '');
            if (count >= target) clearInterval(timer);
          }, 20);
          countObs.unobserve(e.target);
        }
      });
    }, { threshold: 0.5 });
    counters.forEach(c => countObs.observe(c));
  }

  /* ── Tab / Filter for programs page ─────── */
  const filterBtns = document.querySelectorAll('[data-filter]');
  filterBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      const filter = btn.getAttribute('data-filter');
      filterBtns.forEach(b => b.classList.remove('active'));
      btn.classList.add('active');

      document.querySelectorAll('[data-status]').forEach(card => {
        const show = filter === 'semua' || card.dataset.status === filter;
        card.style.transition = 'all .3s ease';
        card.style.opacity = show ? '1' : '0';
        card.style.transform = show ? 'scale(1)' : 'scale(.95)';
        card.style.pointerEvents = show ? '' : 'none';
        card.parentElement.style.display = show ? '' : 'none';
      });
    });
  });

  /* ── Contact form live validation ───────── */
  const form = document.getElementById('contactForm');
  if (form) {
    form.addEventListener('submit', function () {
      const btn = form.querySelector('[type="submit"]');
      if (btn) {
        btn.disabled = true;
        btn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Mengirim…';
      }
    });
  }

});
