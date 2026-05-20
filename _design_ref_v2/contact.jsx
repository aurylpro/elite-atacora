/* global React, ReactDOM, PageShell, PageHero, PillButton, Eyebrow, ArrowIcon */
const { useState } = React;

function ContactInfos() {
  const cards = [
    {
      icon: "📍",
      svg: <path d="M6 13 Q1 8 1 5 A5 5 0 1 1 11 5 Q11 8 6 13 Z M6 5 A1 1 0 1 1 6 7 A1 1 0 1 1 6 5 Z" stroke="currentColor" strokeWidth="1.5" fill="none"/>,
      label: "Adresse",
      value: "Quartier Dassagaté\nNatitingou, Atacora · Bénin",
      bg: "bg-forest", text: "text-cream", accent: "text-honey",
    },
    {
      svg: <path d="M2 2.5 Q2 2 2.5 2 H4 L5 5 L3.8 6.2 Q5 8.5 6.8 9.2 L8 8 L11 9 V10.5 Q11 11 10.5 11 Q6 11 4 9 Q2 7 2 2.5 Z" stroke="currentColor" strokeWidth="1.5" strokeLinejoin="round" fill="none"/>,
      label: "Téléphone",
      value: "(+229) 01 94 05 50 90",
      action: "tel:+2290194055090",
      bg: "bg-terracotta", text: "text-cream", accent: "text-honey",
    },
    {
      svg: <path d="M1 2 H13 V10 H1 Z M1 2 L7 6.5 L13 2" stroke="currentColor" strokeWidth="1.5" strokeLinejoin="round" fill="none"/>,
      label: "Email",
      value: "contact@eliteatacora.org",
      action: "mailto:contact@eliteatacora.org",
      bg: "bg-honey", text: "text-ink", accent: "text-terracotta",
    },
    {
      svg: <path d="M6 1 V6 L9 8 M11 6 A5 5 0 1 1 1 6 A5 5 0 1 1 11 6 Z" stroke="currentColor" strokeWidth="1.5" fill="none"/>,
      label: "Horaires",
      value: "Lun → Ven · 08h-17h\nSam · 09h-13h",
      bg: "bg-ink", text: "text-cream", accent: "text-honey",
    },
  ];
  return (
    <section className="py-16 sm:py-20">
      <div className="max-w-[1320px] mx-auto px-6">
        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5">
          {cards.map((c, i) => (
            <article key={i} className={`${c.bg} ${c.text} rounded-3xl p-7 card-hover relative overflow-hidden`}>
              <div className="absolute -bottom-12 -right-12 w-32 h-32 rounded-full border border-current opacity-15" />
              <div className={`w-11 h-11 rounded-full ${c.accent} bg-current/10 grid place-items-center`}>
                <svg width="18" height="18" viewBox="0 0 12 13" className={c.accent}>
                  {c.svg}
                </svg>
              </div>
              <div className={`mt-5 text-[11px] uppercase tracking-widest ${c.accent} font-semibold`}>{c.label}</div>
              <div className="mt-2 font-serif text-[18px] leading-tight whitespace-pre-line">
                {c.action ? <a href={c.action} className="hover:opacity-80">{c.value}</a> : c.value}
              </div>
            </article>
          ))}
        </div>
      </div>
    </section>
  );
}

function MapAndForm() {
  const [submitted, setSubmitted] = useState(false);
  return (
    <section className="py-16">
      <div className="max-w-[1320px] mx-auto px-6">
        <div className="bg-cream rounded-[40px] ring-1 ring-ink/5 overflow-hidden grid grid-cols-12">
          {/* Map */}
          <div className="col-span-12 lg:col-span-5 relative min-h-[400px] bg-paper">
            <div className="absolute inset-0 grid place-items-center text-muted">
              <div className="text-center px-6">
                <div className="w-20 h-20 mx-auto rounded-full bg-cream grid place-items-center text-terracotta shadow-[0_15px_30px_-15px_rgba(30,24,19,0.25)]">
                  <svg width="32" height="38" viewBox="0 0 12 14" fill="none"><path d="M6 13 Q1 8 1 5 A5 5 0 1 1 11 5 Q11 8 6 13 Z M6 5 A1 1 0 1 1 6 7 A1 1 0 1 1 6 5 Z" stroke="currentColor" strokeWidth="1.4"/></svg>
                </div>
                <div className="mt-5 font-serif text-[22px] text-ink">Natitingou</div>
                <div className="mt-1 text-[13px]">Quartier Dassagaté, Atacora</div>
                <div className="mt-5 text-[10px] uppercase tracking-widest text-muted">Carte Google Maps · à intégrer</div>
              </div>
            </div>
            <div className="absolute inset-0 bg-[radial-gradient(#1E1813_0.6px,transparent_0.6px)] [background-size:14px_14px] opacity-10 pointer-events-none" />
          </div>

          {/* Form */}
          <div className="col-span-12 lg:col-span-7 p-10 sm:p-12">
            {submitted ? (
              <div className="py-16 text-center">
                <div className="w-16 h-16 mx-auto rounded-full bg-forest text-cream grid place-items-center">
                  <svg width="28" height="22" viewBox="0 0 24 18" fill="none"><path d="M2 9 L9 16 L22 2" stroke="currentColor" strokeWidth="2.5" strokeLinecap="round" strokeLinejoin="round"/></svg>
                </div>
                <h3 className="mt-6 font-serif text-[28px] text-ink leading-tight">Message envoyé.</h3>
                <p className="mt-3 text-coffee max-w-md mx-auto">Nous reviendrons vers vous dans les meilleurs délais.</p>
                <button onClick={() => setSubmitted(false)} className="mt-6 text-[14px] font-semibold text-forest underline underline-offset-4">Envoyer un autre message</button>
              </div>
            ) : (
              <form onSubmit={(e) => { e.preventDefault(); setSubmitted(true); }} className="space-y-5">
                <Eyebrow color="forest">Formulaire de contact</Eyebrow>
                <h2 className="font-serif text-[32px] sm:text-[40px] leading-[1.05] text-ink tracking-tight">
                  Écrivez-nous <em className="italic text-terracotta">directement.</em>
                </h2>

                <div className="grid grid-cols-2 gap-4 pt-4">
                  <Field label="Nom *" />
                  <Field label="Email *" type="email" />
                </div>
                <Field label="Sujet *" />
                <div>
                  <label className="text-[11px] uppercase tracking-widest text-muted font-semibold">Message *</label>
                  <textarea required minLength={20}
                    className="mt-2 w-full bg-paper rounded-2xl px-5 py-4 text-[14px] ring-1 ring-transparent focus:ring-forest focus:bg-cream focus:outline-none transition-colors min-h-[140px] resize-vertical"
                    placeholder="Décrivez votre demande…" />
                </div>
                <label className="flex items-start gap-3 text-[13px] text-coffee/90">
                  <input type="checkbox" required className="w-5 h-5 mt-0.5 rounded accent-forest" />
                  <span>J'accepte la <a href="confidentialite.html" className="text-forest underline">politique de confidentialité</a>.</span>
                </label>
                <div className="pt-2">
                  <button type="submit" className="group inline-flex items-center gap-3 bg-forest text-cream pl-7 pr-2 py-2 rounded-full text-[14px] font-semibold hover:bg-mossdk transition-colors">
                    Envoyer le message
                    <span className="w-9 h-9 rounded-full bg-honey text-ink grid place-items-center transition-transform group-hover:translate-x-1">
                      <ArrowIcon />
                    </span>
                  </button>
                </div>
              </form>
            )}
          </div>
        </div>
      </div>
    </section>
  );
}

function Field({ label, type = "text" }) {
  return (
    <div>
      <label className="text-[11px] uppercase tracking-widest text-muted font-semibold">{label}</label>
      <input type={type} required
        className="mt-2 w-full bg-paper rounded-full px-5 py-3.5 text-[14px] ring-1 ring-transparent focus:ring-forest focus:bg-cream focus:outline-none transition-colors" />
    </div>
  );
}

function Social() {
  return (
    <section className="py-24 bg-paper">
      <div className="max-w-[1320px] mx-auto px-6">
        <div className="bg-ink text-cream rounded-[40px] p-10 sm:p-14 grid grid-cols-12 gap-10 items-center">
          <div className="col-span-12 lg:col-span-7">
            <Eyebrow color="cream">Suivez-nous</Eyebrow>
            <h3 className="mt-5 font-serif text-[36px] sm:text-[44px] leading-[1.05] tracking-tight">
              Restons connectés au <em className="italic text-honey">quotidien.</em>
            </h3>
            <p className="mt-5 text-cream/75 max-w-md">
              Photos terrain, témoignages, annonces : retrouvez l'ONG sur vos réseaux préférés.
            </p>
          </div>
          <div className="col-span-12 lg:col-span-5 flex flex-wrap gap-3">
            {["Facebook", "Instagram", "LinkedIn", "WhatsApp"].map((s) => (
              <a key={s} href="#" className="bg-cream/10 hover:bg-honey hover:text-ink text-cream px-5 py-3 rounded-full text-[14px] font-semibold transition-colors">
                {s} →
              </a>
            ))}
          </div>
        </div>
      </div>
    </section>
  );
}

function App() {
  return (
    <PageShell active="contact" label="Contact">
      <PageHero
        eyebrow="Contact · Bureau Exécutif"
        title="Échangeons,"
        italic="construisons ensemble."
        subtitle="Une question, un partenariat, un don, un projet de bénévolat ? Toutes les voies pour nous joindre sont ouvertes."
        breadcrumb={[{ label: "Contact" }]}
      />
      <ContactInfos />
      <MapAndForm />
      <Social />
    </PageShell>
  );
}

ReactDOM.createRoot(document.getElementById("root")).render(<App />);
