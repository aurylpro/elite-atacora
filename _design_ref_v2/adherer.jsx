/* global React, ReactDOM, PageShell, PageHero, PillButton, Eyebrow, ArrowIcon */
const { useState } = React;

const TYPES = [
  {
    code: "Adhérent·e",
    badge: "Le plus courant",
    badgeColor: "bg-forest text-cream",
    body: "Membre actif au quotidien : participe aux programmes, à l'AG et aux activités de l'ONG.",
    droits: "5 000 FCFA",
    cotisation: "2 000 FCFA / mois",
    accent: "ring-forest",
    article: "Article 17",
  },
  {
    code: "Actif",
    badge: "Engagement renforcé",
    badgeColor: "bg-terracotta text-cream",
    body: "Membre impliqué dans la gouvernance, éligible aux postes du Bureau Exécutif.",
    droits: "5 000 FCFA",
    cotisation: "2 000 FCFA / mois",
    accent: "ring-terracotta",
    article: "Article 18",
  },
  {
    code: "Sympathisant·e",
    badge: "Soutien souple",
    badgeColor: "bg-honey text-ink",
    body: "Soutient l'ONG sans engagement permanent. Reçoit les communications et invitations.",
    droits: "5 000 FCFA",
    cotisation: "Libre",
    accent: "ring-honey",
    article: "Article 19",
  },
  {
    code: "D'honneur",
    badge: "Personnalité distinguée",
    badgeColor: "bg-ink text-honey",
    body: "Titre attribué par l'AG pour services rendus à la cause. Sans cotisation.",
    droits: "Exempté",
    cotisation: "Exempté",
    accent: "ring-ink",
    article: "Article 20",
  },
];

const PROCESS = [
  { n: "01", title: "Remplir le formulaire en ligne", body: "Renseignez vos coordonnées et votre lettre de motivation." },
  { n: "02", title: "Recevoir l'avis du Bureau Exécutif", body: "Réponse sous 7 jours ouvrés par email." },
  { n: "03", title: "Régler les droits en agence", body: "5 000 FCFA + dépôt de 2 photos d'identité." },
  { n: "04", title: "Recevoir sa carte de membre", body: "Délivrée lors de la prochaine session du Bureau." },
];

const FAQ = [
  {
    q: "Quelle est la différence entre membre adhérent et membre actif ?",
    a: "Le membre adhérent participe aux activités. Le membre actif est, en plus, impliqué dans la gouvernance et peut être candidat aux postes électifs du Bureau Exécutif (article 17 vs article 18 des statuts).",
  },
  {
    q: "Le paiement peut-il se faire en ligne ?",
    a: "Non, le paiement se fait exclusivement en agence (Mobile Money ou cash) lors du retrait de la carte. L'ONG ne traite aucun paiement en ligne.",
  },
  {
    q: "Que se passe-t-il si je ne paie pas la cotisation annuelle ?",
    a: "Conformément au règlement intérieur, l'échéance de la cotisation annuelle est fixée au 5 décembre. Au-delà de 3 mois d'impayé, le statut de membre est suspendu.",
  },
  {
    q: "Puis-je devenir bénévole sans être membre ?",
    a: "Oui, l'ONG accueille des bénévoles sur mission ponctuelle (caravanes, formations, événements). Contactez-nous via le formulaire de contact.",
  },
];

function MembershipTypes() {
  return (
    <section className="py-24 bg-cream">
      <div className="max-w-[1320px] mx-auto px-6">
        <div className="max-w-2xl mb-12">
          <Eyebrow color="forest">Articles 17 à 20 des statuts</Eyebrow>
          <h2 className="mt-5 font-serif text-[42px] sm:text-[52px] leading-[1.05] text-ink tracking-tight">
            Quatre <em className="italic text-terracotta">catégories</em> de membres.
          </h2>
          <p className="mt-6 text-coffee text-[16px] leading-[1.7]">
            Chaque catégorie correspond à un niveau d'engagement et à des droits associés.
            Vous choisissez celle qui vous correspond.
          </p>
        </div>
        <div className="grid grid-cols-1 md:grid-cols-2 gap-6">
          {TYPES.map((t) => (
            <article key={t.code} className={`bg-paper rounded-[32px] p-8 ring-2 ${t.accent}/40 card-hover relative overflow-hidden`}>
              <div className="flex items-center justify-between mb-6">
                <span className={`${t.badgeColor} text-[10px] uppercase tracking-widest font-semibold px-3 py-1.5 rounded-full`}>{t.badge}</span>
                <span className="text-[11px] text-muted uppercase tracking-widest">{t.article}</span>
              </div>
              <h3 className="font-serif text-[32px] text-ink leading-tight">Membre {t.code}</h3>
              <p className="mt-4 text-[14.5px] text-coffee/90 leading-relaxed">{t.body}</p>
              <div className="mt-7 pt-6 border-t border-ink/10 grid grid-cols-2 gap-4">
                <div>
                  <div className="text-[10px] uppercase tracking-widest text-muted">Droits d'adhésion</div>
                  <div className="mt-1 font-serif text-[20px] text-ink">{t.droits}</div>
                </div>
                <div>
                  <div className="text-[10px] uppercase tracking-widest text-muted">Cotisation</div>
                  <div className="mt-1 font-serif text-[20px] text-ink">{t.cotisation}</div>
                </div>
              </div>
            </article>
          ))}
        </div>
      </div>
    </section>
  );
}

function PricingBox() {
  return (
    <section className="py-24 bg-paper">
      <div className="max-w-[1320px] mx-auto px-6">
        <div className="bg-honey text-ink rounded-[40px] p-10 sm:p-14 grid grid-cols-12 gap-10 items-center">
          <div className="col-span-12 lg:col-span-5">
            <Eyebrow color="terracotta">Règlement intérieur</Eyebrow>
            <h2 className="mt-5 font-serif text-[40px] sm:text-[48px] leading-[1.05] tracking-tight">
              Tarifs <em className="italic text-terracotta">officiels.</em>
            </h2>
          </div>
          <div className="col-span-12 lg:col-span-7 grid grid-cols-1 sm:grid-cols-3 gap-4">
            <div className="bg-cream rounded-3xl p-6">
              <div className="text-[10px] uppercase tracking-widest text-muted">Droit d'adhésion</div>
              <div className="font-serif text-3xl text-ink mt-2">5 000</div>
              <div className="text-[12px] text-muted mt-1">FCFA · unique</div>
            </div>
            <div className="bg-cream rounded-3xl p-6">
              <div className="text-[10px] uppercase tracking-widest text-muted">Cotisation</div>
              <div className="font-serif text-3xl text-ink mt-2">2 000</div>
              <div className="text-[12px] text-muted mt-1">FCFA / mois</div>
            </div>
            <div className="bg-cream rounded-3xl p-6">
              <div className="text-[10px] uppercase tracking-widest text-muted">Annuelle</div>
              <div className="font-serif text-3xl text-ink mt-2">24 000</div>
              <div className="text-[12px] text-muted mt-1">FCFA / an</div>
            </div>
          </div>
        </div>
      </div>
    </section>
  );
}

function Process() {
  return (
    <section className="py-24 bg-cream">
      <div className="max-w-[1320px] mx-auto px-6">
        <div className="max-w-2xl mb-12">
          <Eyebrow color="forest">Comment adhérer</Eyebrow>
          <h2 className="mt-5 font-serif text-[42px] sm:text-[52px] leading-[1.05] text-ink tracking-tight">
            Quatre étapes, <em className="italic text-terracotta">simples et claires.</em>
          </h2>
        </div>
        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
          {PROCESS.map((p, i) => (
            <article key={p.n} className="bg-paper rounded-3xl p-7 ring-1 ring-ink/5 relative">
              <div className="font-serif text-7xl text-honey leading-none opacity-80">{p.n}</div>
              <h3 className="mt-4 font-serif text-[20px] text-ink leading-tight">{p.title}</h3>
              <p className="mt-2 text-[13.5px] text-coffee/90 leading-relaxed">{p.body}</p>
              {i < PROCESS.length - 1 && (
                <div className="hidden lg:block absolute -right-3 top-1/2 -translate-y-1/2 text-honey">→</div>
              )}
            </article>
          ))}
        </div>
      </div>
    </section>
  );
}

function Form() {
  const [submitted, setSubmitted] = useState(false);
  const [type, setType] = useState("Adhérent·e");

  if (submitted) {
    return (
      <section id="formulaire" className="py-24 bg-paper">
        <div className="max-w-[840px] mx-auto px-6">
          <div className="bg-cream rounded-[40px] p-12 sm:p-16 ring-1 ring-ink/5 text-center">
            <div className="w-20 h-20 mx-auto rounded-full bg-forest text-cream grid place-items-center">
              <svg width="34" height="26" viewBox="0 0 24 18" fill="none"><path d="M2 9 L9 16 L22 2" stroke="currentColor" strokeWidth="2.5" strokeLinecap="round" strokeLinejoin="round"/></svg>
            </div>
            <h2 className="mt-8 font-serif text-[36px] sm:text-[44px] leading-[1.05] text-ink tracking-tight">
              Votre demande a bien été <em className="italic text-terracotta">transmise.</em>
            </h2>
            <p className="mt-5 text-coffee text-[16px] leading-[1.7] max-w-lg mx-auto">
              Le Bureau Exécutif d'Elite Atacora reviendra vers vous dans les
              meilleurs délais, généralement sous 7 jours ouvrés.
            </p>
            <div className="mt-8">
              <PillButton as="button" onClick={() => setSubmitted(false)} variant="outline">Soumettre une autre demande</PillButton>
            </div>
          </div>
        </div>
      </section>
    );
  }

  return (
    <section id="formulaire" className="py-24 bg-paper">
      <div className="max-w-[1100px] mx-auto px-6">
        <div className="bg-cream rounded-[40px] ring-1 ring-ink/5 overflow-hidden grid grid-cols-12">
          <div className="col-span-12 lg:col-span-5 bg-forest text-cream p-10 sm:p-12 relative overflow-hidden">
            <svg aria-hidden="true" className="absolute -bottom-32 -left-20 w-96 h-96 text-honey/15" viewBox="0 0 200 200" fill="none">
              <circle cx="100" cy="100" r="90" stroke="currentColor" strokeWidth="2" strokeDasharray="4 8"/>
            </svg>
            <Eyebrow color="cream">Formulaire d'adhésion</Eyebrow>
            <h2 className="mt-5 font-serif text-[36px] leading-[1.05] tracking-tight">
              Quelques minutes <em className="italic text-honey">suffisent.</em>
            </h2>
            <ul className="mt-10 space-y-4 text-[14px] text-cream/85">
              {[
                "Tous les champs marqués * sont obligatoires",
                "Vos données ne sont jamais cédées à des tiers",
                "Une réponse vous est garantie sous 7 jours",
              ].map((t, i) => (
                <li key={i} className="flex items-start gap-3">
                  <span className="w-5 h-5 rounded-full bg-honey grid place-items-center text-ink shrink-0 mt-0.5">
                    <svg width="10" height="8" viewBox="0 0 24 18" fill="none"><path d="M2 9 L9 16 L22 2" stroke="currentColor" strokeWidth="3" strokeLinecap="round" strokeLinejoin="round"/></svg>
                  </span>
                  <span>{t}</span>
                </li>
              ))}
            </ul>
          </div>

          <form
            onSubmit={(e) => { e.preventDefault(); setSubmitted(true); }}
            className="col-span-12 lg:col-span-7 p-10 sm:p-12 space-y-5">
            <div className="grid grid-cols-2 gap-4">
              <Field label="Prénom *" type="text" />
              <Field label="Nom *" type="text" />
            </div>
            <Field label="Email *" type="email" />
            <Field label="Téléphone *" type="tel" placeholder="(+229) …" />

            <div>
              <label className="text-[11px] uppercase tracking-widest text-muted font-semibold">Type de membre souhaité *</label>
              <div className="mt-2 grid grid-cols-2 sm:grid-cols-4 gap-2">
                {TYPES.map((t) => (
                  <button key={t.code} type="button" onClick={() => setType(t.code)}
                    className={`px-3 py-2.5 rounded-full text-[12px] font-medium border transition-colors
                      ${type === t.code ? "bg-forest text-cream border-forest" : "bg-paper border-paper text-ink hover:border-forest/30"}`}>
                    {t.code}
                  </button>
                ))}
              </div>
            </div>

            <div>
              <label className="text-[11px] uppercase tracking-widest text-muted font-semibold">Lettre de motivation *</label>
              <textarea required minLength={50}
                className="mt-2 w-full bg-paper rounded-2xl px-5 py-4 text-[14px] ring-1 ring-transparent focus:ring-forest focus:bg-cream focus:outline-none transition-colors min-h-[140px] resize-vertical"
                placeholder="Pourquoi souhaitez-vous rejoindre Elite Atacora ? (minimum 50 caractères)" />
            </div>

            <label className="flex items-start gap-3 text-[13px] text-coffee/90">
              <input type="checkbox" required className="w-5 h-5 mt-0.5 rounded accent-forest" />
              <span>J'accepte la <a href="confidentialite.html" className="text-forest underline">politique de confidentialité</a> et la conservation de mes données par l'ONG Elite Atacora.</span>
            </label>

            <div className="pt-2">
              <button type="submit" className="group inline-flex items-center gap-3 bg-forest text-cream pl-7 pr-2 py-2 rounded-full text-[14px] font-semibold hover:bg-mossdk transition-colors">
                Envoyer ma candidature
                <span className="w-9 h-9 rounded-full bg-honey text-ink grid place-items-center transition-transform group-hover:translate-x-1">
                  <ArrowIcon />
                </span>
              </button>
            </div>
          </form>
        </div>
      </div>
    </section>
  );
}

function Field({ label, type = "text", placeholder = "" }) {
  return (
    <div>
      <label className="text-[11px] uppercase tracking-widest text-muted font-semibold">{label}</label>
      <input type={type} required placeholder={placeholder}
        className="mt-2 w-full bg-paper rounded-full px-5 py-3.5 text-[14px] ring-1 ring-transparent focus:ring-forest focus:bg-cream focus:outline-none transition-colors" />
    </div>
  );
}

function Faq() {
  const [open, setOpen] = useState(0);
  return (
    <section className="py-24">
      <div className="max-w-[900px] mx-auto px-6">
        <div className="max-w-2xl mb-12 text-center mx-auto">
          <Eyebrow color="terracotta">Questions fréquentes</Eyebrow>
          <h2 className="mt-5 font-serif text-[40px] sm:text-[48px] leading-[1.05] text-ink tracking-tight">
            Tout savoir avant <em className="italic text-terracotta">d'adhérer.</em>
          </h2>
        </div>
        <div className="space-y-3">
          {FAQ.map((f, i) => (
            <div key={i} className="bg-paper rounded-2xl overflow-hidden">
              <button onClick={() => setOpen(open === i ? -1 : i)}
                className="w-full flex items-center justify-between gap-4 p-6 text-left">
                <span className="font-serif text-[18px] text-ink">{f.q}</span>
                <span className={`w-9 h-9 rounded-full bg-cream grid place-items-center shrink-0 transition-transform ${open === i ? "rotate-45" : ""}`}>
                  <svg width="14" height="14" viewBox="0 0 14 14" fill="none"><path d="M7 1 V13 M1 7 H13" stroke="currentColor" strokeWidth="1.5" strokeLinecap="round"/></svg>
                </span>
              </button>
              {open === i && (
                <div className="px-6 pb-6 text-coffee text-[15px] leading-[1.7]">{f.a}</div>
              )}
            </div>
          ))}
        </div>
      </div>
    </section>
  );
}

function App() {
  return (
    <PageShell active="adherer" label="Adhérer">
      <PageHero
        eyebrow="Adhérer · rejoindre l'ONG"
        title="Rejoignez"
        italic="la communauté Elite Atacora."
        subtitle="Quatre catégories de membres, un processus clair, une réponse garantie sous 7 jours par le Bureau Exécutif."
        breadcrumb={[{ label: "Adhérer" }]}
      >
        <PillButton as="a" href="#formulaire" variant="primary">Postuler maintenant</PillButton>
      </PageHero>
      <MembershipTypes />
      <PricingBox />
      <Process />
      <Form />
      <Faq />
    </PageShell>
  );
}

ReactDOM.createRoot(document.getElementById("root")).render(<App />);
