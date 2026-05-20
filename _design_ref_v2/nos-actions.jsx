/* global React, ReactDOM, PageShell, PageHero, PillButton, Eyebrow */
const { useState } = React;

const DOMAINES = [
  {
    n: "01",
    title: "Autonomisation des femmes rurales",
    body: "Alphabétisation fonctionnelle, formation aux AGR, accès au crédit, accompagnement entrepreneurial.",
    tone: "bg-forest text-cream",
    accent: "text-honey",
  },
  {
    n: "02",
    title: "Scolarisation des enfants vulnérables",
    body: "Prise en charge des frais, fournitures, cours de remédiation, suivi psycho-social.",
    tone: "bg-terracotta text-cream",
    accent: "text-cream/80",
  },
  {
    n: "03",
    title: "Inclusion financière des filles & femmes",
    body: "Tontines structurées, micro-crédit solidaire, éducation financière, ouverture de comptes.",
    tone: "bg-honey text-ink",
    accent: "text-terracotta",
  },
  {
    n: "04",
    title: "Lutte contre les VBG",
    body: "Sensibilisation communautaire, accompagnement juridique et psychologique des survivantes.",
    tone: "bg-ink text-cream",
    accent: "text-honey",
  },
  {
    n: "05",
    title: "Résilience climatique",
    body: "Maraîchage durable, gestion de l'eau, reboisement participatif, agroécologie.",
    tone: "bg-sand text-ink",
    accent: "text-forest",
  },
  {
    n: "06",
    title: "Œuvres sociales",
    body: "Distributions ciblées, aides ponctuelles aux familles, urgences alimentaires et sanitaires.",
    tone: "bg-paper text-ink",
    accent: "text-terracotta",
  },
];

const PHOTOS = [
  { src: "assets/photo-2.jpeg", caption: "Distribution de kits maraîchers · Boukombé" },
  { src: "assets/photo-3.jpeg", caption: "Caravane sensibilisation · Cobly" },
  { src: "assets/photo-4.jpeg", caption: "Atelier alphabétisation · Tanguiéta" },
  { src: "assets/photo-5.jpeg", caption: "Réunion du Bureau Exécutif" },
  { src: "assets/photo-6.jpeg", caption: "Formation AGR · Natitingou" },
  { src: "assets/photo-7.jpeg", caption: "Convention DDAEP Atacora" },
  { src: "assets/photo-8.jpeg", caption: "Séminaire ODD · Cotonou" },
  { src: "assets/photo-9.jpeg", caption: "Cérémonie communautaire" },
];

const ZONES = [
  "Natitingou", "Tanguiéta", "Boukombé", "Cobly", "Matéri", "Toucountouna",
];

function Domaines() {
  return (
    <section className="py-24 bg-cream">
      <div className="max-w-[1320px] mx-auto px-6">
        <div className="max-w-2xl mb-12">
          <Eyebrow color="forest">Six terrains d'engagement</Eyebrow>
          <h2 className="mt-5 font-serif text-[42px] sm:text-[52px] leading-[1.05] text-ink tracking-tight">
            Là où nous <em className="italic text-terracotta">marchons.</em>
          </h2>
        </div>
        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
          {DOMAINES.map((d) => (
            <article key={d.n} className={`${d.tone} rounded-[32px] p-8 relative overflow-hidden card-hover min-h-[260px] flex flex-col`}>
              <div className="absolute -bottom-12 -right-12 w-40 h-40 rounded-full border border-current opacity-15" />
              <div className={`text-[11px] uppercase tracking-widest font-semibold ${d.accent}`}>Domaine {d.n}</div>
              <h3 className="mt-4 font-serif text-[26px] leading-tight">{d.title}</h3>
              <p className="mt-auto pt-6 text-[14px] opacity-90 leading-relaxed">{d.body}</p>
            </article>
          ))}
        </div>
      </div>
    </section>
  );
}

function Zones() {
  return (
    <section className="py-24 bg-paper">
      <div className="max-w-[1320px] mx-auto px-6 grid grid-cols-12 gap-10 items-center">
        <div className="col-span-12 lg:col-span-5">
          <Eyebrow color="forest">Zones d'intervention</Eyebrow>
          <h2 className="mt-5 font-serif text-[40px] sm:text-[48px] leading-[1.05] text-ink tracking-tight">
            Six communes, <em className="italic text-terracotta">un département.</em>
          </h2>
          <p className="mt-6 text-coffee text-[16px] leading-[1.7] max-w-md">
            Nos programmes se déploient sur l'ensemble du département de
            l'Atacora, avec un ancrage historique à Natitingou.
          </p>
        </div>
        <div className="col-span-12 lg:col-span-7">
          <div className="grid grid-cols-2 sm:grid-cols-3 gap-3">
            {ZONES.map((z) => (
              <div key={z} className="bg-cream rounded-2xl p-5 ring-1 ring-ink/8 flex items-center gap-3 card-hover">
                <span className="w-9 h-9 rounded-full bg-honey/30 text-terracotta grid place-items-center">
                  <svg width="14" height="16" viewBox="0 0 12 14" fill="none"><path d="M6 13 Q1 8 1 5 A5 5 0 1 1 11 5 Q11 8 6 13 Z M6 5 A1 1 0 1 1 6 7 A1 1 0 1 1 6 5 Z" stroke="currentColor" strokeWidth="1.5"/></svg>
                </span>
                <span className="font-serif text-[17px] text-ink">{z}</span>
              </div>
            ))}
          </div>
        </div>
      </div>
    </section>
  );
}

function Gallery() {
  const [open, setOpen] = useState(null);
  return (
    <section className="py-24 bg-cream">
      <div className="max-w-[1320px] mx-auto px-6">
        <div className="flex items-end justify-between gap-8 flex-wrap mb-12">
          <div className="max-w-2xl">
            <Eyebrow color="terracotta">Galerie · le terrain en images</Eyebrow>
            <h2 className="mt-5 font-serif text-[42px] sm:text-[52px] leading-[1.05] text-ink tracking-tight">
              Les <em className="italic text-terracotta">visages</em> derrière les actions.
            </h2>
          </div>
        </div>
        <div className="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
          {PHOTOS.map((p, i) => (
            <button key={i} onClick={() => setOpen(i)}
              className={`group relative rounded-2xl overflow-hidden ring-1 ring-ink/5 card-hover text-left
                ${i % 5 === 0 ? "md:col-span-2 md:row-span-2 aspect-square" : "aspect-square"}`}>
              <img src={p.src} alt={p.caption} className="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" />
              <div className="absolute inset-0 bg-gradient-to-t from-ink/70 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity" />
              <div className="absolute bottom-3 left-3 right-3 text-cream text-[12px] opacity-0 group-hover:opacity-100 transition-opacity">
                {p.caption}
              </div>
            </button>
          ))}
        </div>
      </div>

      {/* Lightbox */}
      {open !== null && (
        <div onClick={() => setOpen(null)} className="fixed inset-0 z-[200] bg-ink/85 backdrop-blur grid place-items-center p-4">
          <div className="max-w-4xl w-full" onClick={(e) => e.stopPropagation()}>
            <img src={PHOTOS[open].src} alt={PHOTOS[open].caption} className="w-full max-h-[80vh] object-contain rounded-2xl" />
            <div className="mt-4 flex items-center justify-between text-cream">
              <div className="font-serif text-[18px]">{PHOTOS[open].caption}</div>
              <button onClick={() => setOpen(null)} className="w-10 h-10 rounded-full bg-cream/10 hover:bg-cream/20 grid place-items-center" aria-label="Fermer">
                <svg width="14" height="14" viewBox="0 0 16 16" fill="none"><path d="M3 3 L13 13 M13 3 L3 13" stroke="currentColor" strokeWidth="1.8" strokeLinecap="round"/></svg>
              </button>
            </div>
          </div>
        </div>
      )}
    </section>
  );
}

function Videos() {
  const videos = [
    { title: "Séminaire ODD 5 — Cotonou", duration: "2:14" },
    { title: "Distribution kits maraîchers — Boukombé", duration: "1:48" },
    { title: "Atelier alphabétisation — Tanguiéta", duration: "3:02" },
  ];
  return (
    <section className="py-24 bg-paper">
      <div className="max-w-[1320px] mx-auto px-6">
        <div className="max-w-2xl mb-12">
          <Eyebrow color="forest">Vidéos terrain</Eyebrow>
          <h2 className="mt-5 font-serif text-[42px] sm:text-[52px] leading-[1.05] text-ink tracking-tight">
            <em className="italic text-terracotta">Voir</em> nos actions.
          </h2>
        </div>
        <div className="grid grid-cols-1 md:grid-cols-3 gap-6">
          {videos.map((v, i) => (
            <article key={i} className="bg-cream rounded-3xl overflow-hidden ring-1 ring-ink/5 card-hover">
              <div className="aspect-video bg-ink relative grid place-items-center">
                <img src={`assets/photo-${i + 4}.jpeg`} alt="" className="absolute inset-0 w-full h-full object-cover opacity-80" />
                <div className="absolute inset-0 bg-ink/40" />
                <button className="relative w-16 h-16 rounded-full bg-honey text-ink grid place-items-center hover:scale-110 transition-transform" aria-label="Lecture">
                  <svg width="20" height="22" viewBox="0 0 16 18" fill="currentColor"><path d="M2 1 L14 9 L2 17 Z"/></svg>
                </button>
                <span className="absolute bottom-3 right-3 bg-ink/80 text-cream px-2 py-1 rounded-full text-[11px]">{v.duration}</span>
              </div>
              <div className="p-5">
                <div className="font-serif text-[18px] text-ink leading-tight">{v.title}</div>
                <div className="mt-2 text-[12px] uppercase tracking-widest text-muted">Vidéo · MP4</div>
              </div>
            </article>
          ))}
        </div>
      </div>
    </section>
  );
}

function CTAEnd() {
  return (
    <section className="py-24">
      <div className="max-w-[1320px] mx-auto px-6">
        <div className="bg-terracotta text-cream rounded-[40px] p-10 sm:p-16 grid grid-cols-12 gap-10 items-center">
          <div className="col-span-12 lg:col-span-8">
            <Eyebrow color="cream">Vous voulez agir ?</Eyebrow>
            <h3 className="mt-5 font-serif text-[36px] sm:text-[44px] leading-[1.05] tracking-tight">
              Rejoignez-nous sur le <em className="italic text-honey">terrain.</em>
            </h3>
          </div>
          <div className="col-span-12 lg:col-span-4 flex flex-wrap gap-3 lg:justify-end">
            <PillButton as="a" href="adherer.html" variant="onDark">Devenir bénévole</PillButton>
          </div>
        </div>
      </div>
    </section>
  );
}

function App() {
  return (
    <PageShell active="nos-actions" label="Nos actions">
      <PageHero
        eyebrow="Nos actions · sur le terrain"
        title="Six domaines,"
        italic="un seul cap : l'Atacora."
        subtitle="Programmes, projets, opérations terrain. Voici comment nous transformons nos engagements en actions concrètes au cœur du département."
        breadcrumb={[{ label: "Nos actions" }]}
        image="assets/photo-2.jpeg"
      />
      <Domaines />
      <Zones />
      <Gallery />
      <Videos />
      <CTAEnd />
    </PageShell>
  );
}

ReactDOM.createRoot(document.getElementById("root")).render(<App />);
