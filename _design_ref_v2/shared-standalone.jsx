/* global React */
/* Shared chrome: Header, Footer, primitives, NAV.
   Exports everything to window so each page can pick what it needs. */

const { useState: useStateS, useEffect: useEffectS, useRef: useRefS } = React;

/* ----------------------------------------------------------------
   NAV — links point to real .html files
---------------------------------------------------------------- */

const NAV = [
  {
    key: "ong",
    label: "L'ONG",
    href: "a-propos.html",
    children: [
      { key: "a-propos",    label: "À propos",    href: "a-propos.html",    desc: "Mission, vision, valeurs" },
      { key: "gouvernance", label: "Gouvernance", href: "gouvernance.html", desc: "Bureau Exécutif & organes" },
    ]
  },
  { key: "nos-actions", label: "Nos actions", href: "nos-actions.html" },
  { key: "actualites",  label: "Actualités",  href: "actualites.html"   },
  { key: "evenements",  label: "Événements",  href: "evenements.html"   },
  { key: "contact",     label: "Contact",     href: "contact.html"      },
];

/* ----------------------------------------------------------------
   PRIMITIVES
---------------------------------------------------------------- */

function Eyebrow({ children, color = "forest" }) {
  const colorClass = {
    forest: "text-forest",
    terracotta: "text-terracotta",
    honey: "text-coffee",
    cream: "text-honey",
  }[color];
  return (
    <div className={`inline-flex items-center gap-3 text-[12px] font-semibold uppercase tracking-[0.18em] ${colorClass}`}>
      <span className="w-6 h-px bg-current" />
      <span>{children}</span>
    </div>
  );
}

function PillButton({ children, variant = "primary", as = "button", href, onClick, className = "", arrow = true }) {
  const Tag = as;
  const base = "group inline-flex items-center gap-3 font-semibold text-[14px] px-7 py-4 rounded-full transition-all duration-300";
  const variants = {
    primary:   "bg-forest text-cream hover:bg-mossdk shadow-[0_10px_30px_-12px_rgba(30,86,49,0.6)]",
    secondary: "bg-ink text-cream hover:bg-coffee",
    outline:   "border border-ink/15 text-ink hover:bg-ink hover:text-cream hover:border-ink",
    honey:     "bg-honey text-ink hover:bg-honey/80",
    ghost:     "text-ink hover:text-forest",
    onDark:    "bg-cream text-ink hover:bg-honey",
  };
  return (
    <Tag href={href} onClick={onClick} className={`${base} ${variants[variant]} ${className}`}>
      <span>{children}</span>
      {arrow && (
        <svg width="14" height="12" viewBox="0 0 16 12" fill="none" className="transition-transform group-hover:translate-x-1">
          <path d="M1 6 H14 M10 1.5 L14.5 6 L10 10.5" stroke="currentColor" strokeWidth="1.6" strokeLinecap="round" strokeLinejoin="round"/>
        </svg>
      )}
    </Tag>
  );
}

function Counter({ to, suffix = "" }) {
  const [n, setN] = useStateS(0);
  const ref = useRefS(null);
  const started = useRefS(false);
  useEffectS(() => {
    const io = new IntersectionObserver((entries) => {
      entries.forEach((e) => {
        if (e.isIntersecting && !started.current) {
          started.current = true;
          const start = performance.now();
          const dur = 1600;
          const tick = (t) => {
            const p = Math.min(1, (t - start) / dur);
            const eased = 1 - Math.pow(1 - p, 3);
            setN(Math.round(eased * to));
            if (p < 1) requestAnimationFrame(tick);
          };
          requestAnimationFrame(tick);
        }
      });
    }, { threshold: 0.4 });
    if (ref.current) io.observe(ref.current);
    return () => io.disconnect();
  }, [to]);
  return (
    <span ref={ref} className="tabular">
      {n.toLocaleString("fr-FR")}{suffix}
    </span>
  );
}

function ArrowIcon({ size = 13, className = "" }) {
  return (
    <svg width={size} height={size * 0.78} viewBox="0 0 16 12" fill="none" className={className}>
      <path d="M1 6 H14 M10 1.5 L14.5 6 L10 10.5" stroke="currentColor" strokeWidth="1.6" strokeLinecap="round" strokeLinejoin="round"/>
    </svg>
  );
}

/* ----------------------------------------------------------------
   HEADER
---------------------------------------------------------------- */

function Header({ active }) {
  const [mobile, setMobile] = useStateS(false);
  const [scrolled, setScrolled] = useStateS(false);
  const [openSub, setOpenSub] = useStateS(null);

  useEffectS(() => {
    const onScroll = () => setScrolled(window.scrollY > 20);
    window.addEventListener("scroll", onScroll);
    return () => window.removeEventListener("scroll", onScroll);
  }, []);

  const isActive = (it) => {
    if (it.key === active) return true;
    if (it.children) return it.children.some(c => c.key === active);
    return false;
  };

  return (
    <header className={`sticky top-0 z-50 transition-all duration-300 ${scrolled ? "bg-cream/90 backdrop-blur-md shadow-[0_4px_30px_-20px_rgba(30,24,19,0.25)]" : "bg-transparent"}`}>
      <div className="max-w-[1320px] mx-auto px-6 py-5 flex items-center gap-10">
        <a href="index.html" className="flex items-center gap-3 shrink-0 group">
          <div className="w-11 h-11 rounded-full bg-white grid place-items-center overflow-hidden ring-1 ring-ink/10 group-hover:ring-honey transition">
            <img src={window.__resources.photo1} alt="Logo Elite Atacora" className="w-10 h-10 object-contain" />
          </div>
          <div className="font-serif text-[20px] text-ink leading-none">Elite Atacora</div>
        </a>

        <nav className="hidden lg:flex items-center gap-1 mx-auto">
          {NAV.map((it) => {
            const act = isActive(it);
            return (
              <div
                key={it.key}
                className="relative"
                onMouseEnter={() => it.children && setOpenSub(it.key)}
                onMouseLeave={() => it.children && setOpenSub(null)}
              >
                <a
                  href={it.href}
                  className={`relative px-3.5 py-2 text-[14px] font-medium transition-colors flex items-center gap-1.5
                    ${act ? "text-forest" : "text-ink/85 hover:text-forest"}`}
                >
                  {it.label}
                  {it.children && (
                    <svg width="9" height="6" viewBox="0 0 9 6" fill="none" className={`opacity-60 transition-transform ${openSub === it.key ? "rotate-180" : ""}`}>
                      <path d="M1 1 L4.5 5 L8 1" stroke="currentColor" strokeWidth="1.5" strokeLinecap="round" strokeLinejoin="round"/>
                    </svg>
                  )}
                  {act && <span className="absolute left-1/2 -translate-x-1/2 -bottom-0.5 w-1.5 h-1.5 bg-honey rounded-full" />}
                </a>

                {it.children && openSub === it.key && (
                  <div className="absolute left-1/2 -translate-x-1/2 top-full pt-2 w-[280px]">
                    <div className="bg-cream rounded-2xl ring-1 ring-ink/10 shadow-[0_20px_50px_-15px_rgba(30,24,19,0.25)] overflow-hidden">
                      {it.children.map((c) => (
                        <a key={c.key} href={c.href}
                           className={`block px-5 py-4 hover:bg-paper transition-colors border-b border-ink/5 last:border-b-0 ${c.key === active ? "bg-paper" : ""}`}>
                          <div className="font-medium text-[14px] text-ink">{c.label}</div>
                          <div className="text-[12px] text-muted mt-0.5">{c.desc}</div>
                        </a>
                      ))}
                    </div>
                  </div>
                )}
              </div>
            );
          })}
        </nav>

        <div className="flex items-center gap-2 ml-auto lg:ml-0">
          <div className="hidden md:flex items-center gap-0.5 mr-2 text-[12px] text-muted">
            <button className="px-2 py-1 rounded-full bg-ink/5 text-ink font-semibold">FR</button>
            <button className="px-2 py-1 hover:text-ink transition-colors">EN</button>
            <button className="px-2 py-1 hover:text-ink transition-colors">PT</button>
          </div>

          <a href="adherer.html" className="hidden sm:inline-flex items-center gap-2 bg-forest text-cream pl-5 pr-2 py-1.5 rounded-full text-[13px] font-semibold hover:bg-mossdk transition-colors">
            Adhérer
            <span className="w-7 h-7 rounded-full bg-honey text-ink grid place-items-center">
              <svg width="11" height="9" viewBox="0 0 16 12" fill="none"><path d="M1 6 H14 M10 1.5 L14.5 6 L10 10.5" stroke="currentColor" strokeWidth="1.8" strokeLinecap="round" strokeLinejoin="round"/></svg>
            </span>
          </a>

          <button
            onClick={() => setMobile(!mobile)}
            className="lg:hidden w-10 h-10 rounded-full bg-ink/5 hover:bg-ink/10 grid place-items-center transition-colors"
            aria-label="Menu">
            {mobile ? (
              <svg width="14" height="14" viewBox="0 0 16 16" fill="none"><path d="M3 3 L13 13 M13 3 L3 13" stroke="currentColor" strokeWidth="1.8" strokeLinecap="round"/></svg>
            ) : (
              <svg width="16" height="12" viewBox="0 0 18 14" fill="none"><path d="M0 1 H18 M0 7 H18 M0 13 H12" stroke="currentColor" strokeWidth="1.8" strokeLinecap="round"/></svg>
            )}
          </button>
        </div>
      </div>

      {mobile && (
        <div className="lg:hidden bg-cream border-t border-ink/10 shadow-[0_10px_30px_-15px_rgba(30,24,19,0.25)]">
          <div className="max-w-[1320px] mx-auto px-6 py-4 flex flex-col">
            {NAV.map((it) => (
              <div key={it.key}>
                <a
                  href={it.href}
                  onClick={() => setMobile(false)}
                  className={`flex items-center justify-between py-3 text-[15px] font-medium border-b border-ink/5
                    ${isActive(it) ? "text-forest" : "text-ink"}`}
                >
                  {it.label}
                  {it.children && <span className="text-muted text-xs">→</span>}
                </a>
                {it.children && (
                  <div className="pl-4 pb-2">
                    {it.children.map((c) => (
                      <a key={c.key} href={c.href} onClick={() => setMobile(false)}
                         className="block py-2 text-[14px] text-muted hover:text-forest">
                        — {c.label}
                      </a>
                    ))}
                  </div>
                )}
              </div>
            ))}
            <div className="flex items-center justify-between mt-4 pt-4 border-t border-ink/10">
              <div className="flex items-center gap-2 text-[12px]">
                <span className="px-2 py-1 rounded-full bg-ink/5 text-ink font-semibold">FR</span>
                <span className="text-muted">EN</span>
                <span className="text-muted">PT</span>
              </div>
              <a href="adherer.html" onClick={() => setMobile(false)} className="bg-forest text-cream px-5 py-2.5 rounded-full text-[13px] font-semibold">
                Adhérer →
              </a>
            </div>
          </div>
        </div>
      )}
    </header>
  );
}

/* ----------------------------------------------------------------
   PAGE HERO — used by every internal page for consistent intro
---------------------------------------------------------------- */

function PageHero({ eyebrow, title, italic, subtitle, breadcrumb = [], children, image }) {
  return (
    <section className="relative pt-12 pb-20 sm:pt-16 sm:pb-28 overflow-hidden">
      <div aria-hidden="true" className="absolute -top-32 -right-32 w-[420px] h-[420px] rounded-full bg-honey/15 blur-3xl pointer-events-none" />
      <div aria-hidden="true" className="absolute top-1/3 -left-40 w-[360px] h-[360px] rounded-full bg-terracotta/12 blur-3xl pointer-events-none" />

      <div className="max-w-[1320px] mx-auto px-6 relative">
        {/* Breadcrumb */}
        {breadcrumb.length > 0 && (
          <nav className="flex items-center gap-2 text-[12px] text-muted mb-10">
            <a href="index.html" className="hover:text-forest">Accueil</a>
            {breadcrumb.map((b, i) => (
              <React.Fragment key={i}>
                <span className="text-muted/50">/</span>
                {b.href ? <a href={b.href} className="hover:text-forest">{b.label}</a> : <span className="text-ink">{b.label}</span>}
              </React.Fragment>
            ))}
          </nav>
        )}

        <div className={`grid grid-cols-12 gap-10 ${image ? "items-center" : ""}`}>
          <div className={`col-span-12 ${image ? "lg:col-span-7" : "lg:col-span-9"}`}>
            {eyebrow && <Eyebrow color="forest">{eyebrow}</Eyebrow>}
            {title && (
              <h1 className="mt-6 font-serif leading-[1.0] tracking-tight text-[52px] sm:text-[76px] lg:text-[92px] text-ink">
                {title}
                {italic && <em className="italic text-terracotta font-serif"> {italic}</em>}
              </h1>
            )}
            {subtitle && (
              <p className="mt-8 text-[17px] sm:text-[19px] leading-[1.7] text-coffee max-w-[640px]">
                {subtitle}
              </p>
            )}
            {children && <div className="mt-10">{children}</div>}
          </div>
          {image && (
            <div className="col-span-12 lg:col-span-5">
              <div className="aspect-[4/5] rounded-[40px] overflow-hidden ring-1 ring-ink/8 shadow-[0_30px_60px_-30px_rgba(30,24,19,0.3)]">
                <img src={image} alt="" className="w-full h-full object-cover" />
              </div>
            </div>
          )}
        </div>
      </div>
    </section>
  );
}

/* ----------------------------------------------------------------
   FOOTER
---------------------------------------------------------------- */

function Footer() {
  return (
    <footer className="bg-ink text-cream/90 relative overflow-hidden">
      <svg aria-hidden="true" className="absolute top-0 right-0 w-[420px] h-[180px] text-honey/15 pointer-events-none" viewBox="0 0 420 180" fill="none" preserveAspectRatio="none">
        <path d="M-20 40 Q 80 0 180 40 T 380 40 T 580 40" stroke="currentColor" strokeWidth="1.5" strokeDasharray="2 6" fill="none"/>
        <path d="M-20 80 Q 80 40 180 80 T 380 80 T 580 80" stroke="currentColor" strokeWidth="1" strokeDasharray="2 8" fill="none"/>
      </svg>
      <div aria-hidden="true" className="absolute -bottom-32 left-1/4 w-[600px] h-[400px] rounded-full bg-honey/[0.04] blur-[100px] pointer-events-none" />

      <div className="max-w-[1320px] mx-auto px-6 relative">
        <div className="grid grid-cols-12 gap-10 pt-20 pb-14 border-b border-cream/10">
          <div className="col-span-12 lg:col-span-7">
            <div className="text-[11px] uppercase tracking-[0.2em] text-honey font-semibold mb-5">Restons en contact</div>
            <h3 className="font-serif text-[38px] sm:text-[50px] leading-[1.05] text-cream tracking-tight">
              Soutenez l'Atacora,<br/>
              <em className="italic text-honey">une marche à la fois.</em>
            </h3>
          </div>
          <div className="col-span-12 lg:col-span-5 lg:pt-4">
            <p className="text-cream/70 leading-relaxed mb-6 max-w-md">
              Recevez nos actualités, rapports et invitations directement dans votre boîte mail.
            </p>
            <form className="flex flex-col sm:flex-row gap-3 max-w-md">
              <input type="email" placeholder="Votre adresse email"
                className="flex-1 bg-cream/10 border border-cream/20 rounded-full px-5 py-3.5 text-cream placeholder:text-cream/40 focus:outline-none focus:bg-cream/15 focus:border-honey/50 transition-colors" />
              <button type="button" className="px-6 py-3.5 rounded-full bg-honey text-ink font-semibold hover:bg-honey/85 transition-colors whitespace-nowrap">
                S'abonner →
              </button>
            </form>
          </div>
        </div>

        <div className="grid grid-cols-12 gap-10 py-14">
          <div className="col-span-12 md:col-span-5">
            <div className="flex items-center gap-4">
              <div className="w-14 h-14 rounded-full bg-cream grid place-items-center overflow-hidden">
                <img src={window.__resources.photo1} alt="" className="w-12 h-12 object-contain" />
              </div>
              <div>
                <div className="font-serif text-2xl text-cream leading-none">Elite Atacora</div>
                <div className="text-[11px] text-cream/55 mt-1.5 tracking-wider">ONG · Bénin · depuis 2018</div>
              </div>
            </div>
            <p className="mt-7 text-cream/70 leading-relaxed max-w-md text-[14px]">
              Organisation non gouvernementale béninoise, apolitique et à but
              non lucratif. Engagée pour l'autonomisation des femmes, l'éducation
              des enfants vulnérables et la résilience climatique de l'Atacora.
            </p>
            <div className="mt-6 flex gap-2">
              {[
                ["Facebook",  "M9.5 8.5 H7 V11.5 H9.5 V19 H12.5 V11.5 H14.8 L15.2 8.5 H12.5 V7 C12.5 6.3 12.7 6 13.4 6 H15.2 V3 H13 C10.6 3 9.5 4 9.5 6.4 V8.5 Z"],
                ["Instagram", "M7 3 H15 C17.2 3 19 4.8 19 7 V15 C19 17.2 17.2 19 15 19 H7 C4.8 19 3 17.2 3 15 V7 C3 4.8 4.8 3 7 3 Z M11 8 A3 3 0 1 1 11 14 A3 3 0 1 1 11 8 Z M15.5 6.5 H15.51"],
                ["LinkedIn",  "M5 8 H7.5 V18 H5 V8 Z M6.25 5 A1.5 1.5 0 1 1 6.25 7 A1.5 1.5 0 1 1 6.25 5 Z M10 8 H12.4 V9.4 C12.9 8.5 14 7.7 15.5 7.7 C18 7.7 18.5 9.4 18.5 11.5 V18 H16 V12.3 C16 10.9 15.7 9.9 14.5 9.9 C13.1 9.9 12.5 10.9 12.5 12.3 V18 H10 V8 Z"],
                ["WhatsApp",  "M5 18 L6 14.5 A7.5 7.5 0 1 1 8.5 17 L5 18 Z M9 11 Q10 13 11.5 13.5 Q12.5 13.8 13 13 L14 13.5 Q14 14.5 12.5 14.5 Q10.5 14 9 12 Q7.5 10 8 8.5 Q8.5 7.5 9.5 8 L10 9 Q9.5 9.5 9 11 Z"],
              ].map(([name, d]) => (
                <a key={name} href="#" aria-label={name}
                   className="w-10 h-10 rounded-full bg-cream/8 hover:bg-honey hover:text-ink grid place-items-center text-cream/80 transition-colors">
                  <svg width="20" height="20" viewBox="0 0 22 22" fill="none">
                    <path d={d} stroke="currentColor" strokeWidth="1.4" strokeLinecap="round" strokeLinejoin="round"/>
                  </svg>
                </a>
              ))}
            </div>
          </div>

          <div className="col-span-6 md:col-span-2">
            <div className="text-[11px] uppercase tracking-widest text-honey font-semibold mb-5">L'ONG</div>
            <ul className="space-y-3 text-[14px]">
              <li><a href="a-propos.html"    className="text-cream/80 hover:text-honey transition-colors">À propos</a></li>
              <li><a href="gouvernance.html" className="text-cream/80 hover:text-honey transition-colors">Gouvernance</a></li>
              <li><a href="nos-actions.html" className="text-cream/80 hover:text-honey transition-colors">Nos actions</a></li>
              <li><a href="adherer.html"     className="text-cream/80 hover:text-honey transition-colors">Adhérer</a></li>
            </ul>
          </div>

          <div className="col-span-6 md:col-span-2">
            <div className="text-[11px] uppercase tracking-widest text-honey font-semibold mb-5">Ressources</div>
            <ul className="space-y-3 text-[14px]">
              <li><a href="actualites.html" className="text-cream/80 hover:text-honey transition-colors">Actualités</a></li>
              <li><a href="evenements.html" className="text-cream/80 hover:text-honey transition-colors">Événements</a></li>
              <li><a href="contact.html"    className="text-cream/80 hover:text-honey transition-colors">Contact</a></li>
              <li><a href="confidentialite.html" className="text-cream/80 hover:text-honey transition-colors">Confidentialité</a></li>
            </ul>
          </div>

          <div className="col-span-12 md:col-span-3">
            <div className="text-[11px] uppercase tracking-widest text-honey font-semibold mb-5">Contact</div>
            <ul className="space-y-4 text-[14px]">
              <li className="flex items-start gap-3">
                <span className="w-5 shrink-0 pt-0.5 text-honey">
                  <svg width="14" height="16" viewBox="0 0 12 14" fill="none"><path d="M6 13 Q1 8 1 5 A5 5 0 1 1 11 5 Q11 8 6 13 Z M6 5 A1 1 0 1 1 6 7 A1 1 0 1 1 6 5 Z" stroke="currentColor" strokeWidth="1.3"/></svg>
                </span>
                <span className="text-cream/85">Quartier Dassagaté<br/>Natitingou, Atacora · Bénin</span>
              </li>
              <li className="flex items-start gap-3">
                <span className="w-5 shrink-0 pt-0.5 text-honey">
                  <svg width="15" height="15" viewBox="0 0 13 13" fill="none"><path d="M2 2.5 Q2 2 2.5 2 H4 L5 5 L3.8 6.2 Q5 8.5 6.8 9.2 L8 8 L11 9 V10.5 Q11 11 10.5 11 Q6 11 4 9 Q2 7 2 2.5 Z" stroke="currentColor" strokeWidth="1.3" strokeLinejoin="round"/></svg>
                </span>
                <a href="tel:+2290194055090" className="text-cream/85 hover:text-honey transition-colors">(+229) 01 94 05 50 90</a>
              </li>
              <li className="flex items-start gap-3">
                <span className="w-5 shrink-0 pt-0.5 text-honey">
                  <svg width="15" height="12" viewBox="0 0 14 11" fill="none"><path d="M1 2 H13 V10 H1 Z M1 2 L7 6.5 L13 2" stroke="currentColor" strokeWidth="1.3" strokeLinejoin="round"/></svg>
                </span>
                <a href="mailto:contact@eliteatacora.org" className="text-cream/85 hover:text-honey transition-colors break-all">contact@eliteatacora.org</a>
              </li>
            </ul>
          </div>
        </div>

        <div className="py-6 border-t border-cream/10 flex flex-wrap items-center justify-between gap-4 text-[12px] text-cream/55">
          <div>© 2026 ONG Elite Atacora · tous droits réservés</div>
          <div>Conformément à la loi n°2025-19 du 22 juillet 2025 · République du Bénin</div>
        </div>
      </div>
    </footer>
  );
}

/* ----------------------------------------------------------------
   PAGE SHELL — quick wrapper used by inner pages
---------------------------------------------------------------- */

function PageShell({ active, label, children }) {
  return (
    <div data-screen-label={label || active}>
      <Header active={active} />
      <main>{children}</main>
      <Footer />
    </div>
  );
}

/* ----------------------------------------------------------------
   EXPOSE
---------------------------------------------------------------- */

Object.assign(window, {
  NAV,
  Eyebrow, PillButton, Counter, ArrowIcon,
  Header, Footer, PageHero, PageShell,
});
