/* global React, ReactDOM, PageShell, PageHero, PillButton, Eyebrow, ArrowIcon */

const ARTICLE = {
  tag: "Programme",
  title: "Alphabétisation fonctionnelle des femmes rurales de Tanguiéta",
  date: "12 mai 2026",
  author: "ZOUNTCHEGBE Yanick",
  authorRole: "Chargée de la Communication",
  minutes: 4,
  hero: "assets/photo-5.jpeg",
};

const RELATED = [
  { tag: "Témoignage", title: "« Avant Elite Atacora, je ne savais pas écrire mon nom »", date: "22 mars 2026", image: "assets/photo-3.jpeg" },
  { tag: "Terrain",    title: "120 productrices de Boukombé reçoivent leurs kits maraîchers", date: "9 avril 2026", image: "assets/photo-2.jpeg" },
];

function Article() {
  return (
    <article className="py-12">
      <div className="max-w-[820px] mx-auto px-6">
        {/* Meta */}
        <div className="flex flex-wrap items-center gap-4 mb-8">
          <span className="bg-forest text-cream text-[10px] uppercase tracking-widest font-semibold px-3 py-1.5 rounded-full">{ARTICLE.tag}</span>
          <span className="text-[13px] text-muted">{ARTICLE.date}</span>
          <span className="text-muted/50">·</span>
          <span className="text-[13px] text-muted">{ARTICLE.minutes} min de lecture</span>
        </div>

        <h1 className="font-serif text-[44px] sm:text-[56px] leading-[1.05] text-ink tracking-tight">
          {ARTICLE.title}
        </h1>

        <p className="mt-6 text-[19px] leading-[1.6] text-coffee">
          Premier déploiement du dispositif <strong>AFR-1</strong> dans quatre
          villages de la commune de Tanguiéta, en partenariat avec la mairie et
          la Direction Départementale des Affaires Sociales.
        </p>

        {/* Author */}
        <div className="mt-10 pb-10 border-b border-ink/10 flex items-center gap-4">
          <div className="w-12 h-12 rounded-full bg-paper grid place-items-center text-terracotta font-serif text-lg">ZY</div>
          <div>
            <div className="font-serif text-[16px] text-ink">{ARTICLE.author}</div>
            <div className="text-[12px] text-muted">{ARTICLE.authorRole}</div>
          </div>
          <div className="ml-auto flex items-center gap-2">
            {["Partager", "F", "X", "in"].map((s, i) => (
              <button key={i} className={`h-9 rounded-full ${i === 0 ? "px-4 bg-paper text-ink" : "w-9 bg-paper text-ink"} text-[12px] font-semibold grid place-items-center hover:bg-honey/40 transition-colors`}>
                {s}
              </button>
            ))}
          </div>
        </div>
      </div>

      {/* Hero image */}
      <div className="max-w-[1180px] mx-auto px-6 mt-12">
        <div className="aspect-[16/9] rounded-[36px] overflow-hidden ring-1 ring-ink/5">
          <img src={ARTICLE.hero} alt="" className="w-full h-full object-cover" />
        </div>
        <div className="mt-3 text-[12px] text-muted text-center italic">
          Ouverture officielle du programme AFR-1 — village de Tchanhoun-Cossi, mai 2026
        </div>
      </div>

      {/* Body */}
      <div className="max-w-[760px] mx-auto px-6 mt-16 text-[17px] leading-[1.85] text-coffee space-y-6">
        <p>
          Mardi 12 mai, l'ONG Elite Atacora a officiellement lancé son
          programme d'<strong>Alphabétisation Fonctionnelle Rurale (AFR-1)</strong>
          dans la commune de Tanguiéta. Ce dispositif, financé sur ressources
          propres et avec l'appui de la mairie, cible <strong>240 femmes</strong>
          réparties dans quatre villages : Tchanhoun-Cossi, Tanongou, Cotiakou
          et Taïacou.
        </p>

        <h2 className="font-serif text-[32px] text-ink leading-tight !mt-12">Une méthode pensée pour le terrain</h2>

        <p>
          Le programme combine alphabétisation classique en langue nationale et
          modules pratiques : gestion d'un petit commerce, lecture d'ordonnance,
          tenue d'un cahier de comptes. Chaque cohorte de 30 apprenantes est
          encadrée par deux formatrices recrutées localement, formées en
          amont par l'équipe AFR-1.
        </p>

        <blockquote className="not-italic relative my-12 bg-paper rounded-3xl p-8 sm:p-10">
          <div className="text-honey font-serif text-5xl leading-none">"</div>
          <p className="mt-2 font-serif text-[24px] text-ink leading-[1.3]">
            Nous ne formons pas seulement à lire et écrire. Nous formons à
            décider, à comprendre un contrat, à dire non quand il le faut.
          </p>
          <footer className="mt-4 text-[13px] text-terracotta font-semibold uppercase tracking-widest">
            — SANGA PEMA Tébouwa, Présidente
          </footer>
        </blockquote>

        <h2 className="font-serif text-[32px] text-ink leading-tight">Un calendrier sur 9 mois</h2>

        <p>
          Le premier cycle se déroulera de mai 2026 à janvier 2027, avec une
          évaluation finale conduite conjointement avec la mairie. Une seconde
          cohorte sera ouverte en septembre, portant à 480 le nombre total
          d'apprenantes sur l'année 2026.
        </p>

        <ul className="space-y-3 pl-6 list-disc marker:text-honey">
          <li>240 apprenantes inscrites sur la première cohorte</li>
          <li>8 formatrices recrutées localement, dont 6 femmes</li>
          <li>3 séances hebdomadaires de 2 heures, en fin d'après-midi</li>
          <li>Une cérémonie de remise des attestations prévue en février 2027</li>
        </ul>

        <p>
          Les partenaires institutionnels de l'ONG, ainsi que les médias locaux,
          étaient présents lors de la cérémonie de lancement. L'expérience sera
          documentée mois après mois et fera l'objet d'un rapport public.
        </p>

        <div className="my-12 grid grid-cols-2 gap-4">
          <img src="assets/photo-7.jpeg" alt="" className="rounded-2xl aspect-[4/3] object-cover" />
          <img src="assets/photo-3.jpeg" alt="" className="rounded-2xl aspect-[4/3] object-cover" />
        </div>

        <p>
          Pour devenir bénévole formateur ou soutenir financièrement le
          programme, contactez le Bureau Exécutif via le formulaire en ligne.
        </p>
      </div>

      {/* Tags / CTA */}
      <div className="max-w-[760px] mx-auto px-6 mt-16 flex flex-wrap items-center justify-between gap-6 pt-8 border-t border-ink/10">
        <div className="flex flex-wrap items-center gap-2">
          {["Alphabétisation", "Tanguiéta", "ODD 4", "AFR-1", "Femmes rurales"].map((t) => (
            <span key={t} className="px-3 py-1 bg-paper rounded-full text-[12px] text-coffee">#{t}</span>
          ))}
        </div>
        <PillButton as="a" href="adherer.html" variant="primary">Soutenir le programme</PillButton>
      </div>
    </article>
  );
}

function Related() {
  return (
    <section className="py-24 bg-paper">
      <div className="max-w-[1320px] mx-auto px-6">
        <div className="flex items-end justify-between gap-8 flex-wrap mb-12">
          <div>
            <Eyebrow color="forest">Sur le même sujet</Eyebrow>
            <h2 className="mt-5 font-serif text-[36px] sm:text-[44px] leading-[1.05] text-ink tracking-tight">
              À lire <em className="italic text-terracotta">aussi.</em>
            </h2>
          </div>
          <a href="actualites.html" className="text-[14px] font-semibold text-forest hover:text-mossdk inline-flex items-center gap-2">
            Toutes les actualités <ArrowIcon />
          </a>
        </div>
        <div className="grid grid-cols-1 md:grid-cols-2 gap-7">
          {RELATED.map((r, i) => (
            <a key={i} href="#" className="group bg-cream rounded-3xl overflow-hidden ring-1 ring-ink/5 card-hover flex">
              <div className="w-1/3 aspect-square overflow-hidden">
                <img src={r.image} alt="" className="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" />
              </div>
              <div className="flex-1 p-6 flex flex-col justify-center">
                <div className="text-[10px] uppercase tracking-widest text-terracotta font-semibold">{r.tag}</div>
                <h3 className="mt-2 font-serif text-[18px] text-ink leading-tight">{r.title}</h3>
                <div className="mt-3 text-[12px] text-muted">{r.date}</div>
              </div>
            </a>
          ))}
        </div>
      </div>
    </section>
  );
}

function App() {
  return (
    <PageShell active="actualites" label="Article">
      <PageHero
        breadcrumb={[
          { label: "Actualités", href: "actualites.html" },
          { label: ARTICLE.title.slice(0, 48) + "…" },
        ]}
        eyebrow={null}
        title={null}
      >
        <div className="mt-[-40px]"></div>
      </PageHero>
      <Article />
      <Related />
    </PageShell>
  );
}

ReactDOM.createRoot(document.getElementById("root")).render(<App />);
