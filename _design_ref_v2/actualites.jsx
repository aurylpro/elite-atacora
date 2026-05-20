/* global React, ReactDOM, PageShell, PageHero, PillButton, Eyebrow, ArrowIcon */
const { useState, useMemo } = React;

const ALL_NEWS = [
  { id: 1, tag: "Programme",   tone: "forest",     title: "Alphabétisation fonctionnelle des femmes rurales de Tanguiéta", date: "12 mai 2026",    excerpt: "Premier déploiement du dispositif AFR-1 dans quatre villages, en partenariat avec la mairie.", image: "assets/photo-5.jpeg", minutes: 4 },
  { id: 2, tag: "Partenariat", tone: "terracotta", title: "Convention signée avec la Direction Départementale de l'Atacora", date: "28 avril 2026", excerpt: "Cadre formel pour nos interventions en milieu scolaire sur l'égalité et la prévention.", image: "assets/photo-7.jpeg", minutes: 3 },
  { id: 3, tag: "Terrain",     tone: "honey",      title: "120 productrices de Boukombé reçoivent leurs kits maraîchers", date: "9 avril 2026",      excerpt: "Arrosoirs, semences et fertilisant biologique pour la campagne pré-pluviale 2026.", image: "assets/photo-2.jpeg", minutes: 2 },
  { id: 4, tag: "Témoignage",  tone: "terracotta", title: "« Avant Elite Atacora, je ne savais pas écrire mon nom »",     date: "22 mars 2026",      excerpt: "Portrait de Hadjara, 34 ans, première promotion AFR-1 à Cobly.", image: "assets/photo-3.jpeg", minutes: 5 },
  { id: 5, tag: "Rapport",     tone: "forest",     title: "Rapport d'activité 2025 disponible en téléchargement",        date: "15 mars 2026",      excerpt: "62 pages, données consolidées, audit interne du Conseil de Surveillance.", image: "assets/photo-6.jpeg", minutes: 6 },
  { id: 6, tag: "Programme",   tone: "forest",     title: "Lancement de la campagne de reboisement Atacora 2026",         date: "1er mars 2026",     excerpt: "Objectif : 8 000 plants sur 6 communes avec les comités villageois.", image: "assets/photo-8.jpeg", minutes: 3 },
  { id: 7, tag: "Presse",      tone: "honey",      title: "Elite Atacora dans La Nation : « L'ONG qui forme les femmes »", date: "18 février 2026",   excerpt: "Reportage de deux pages publié dans le quotidien national.", image: "assets/photo-9.jpeg", minutes: 2 },
  { id: 8, tag: "Terrain",     tone: "honey",      title: "Cobly : 40 jeunes filles bénéficient de kits scolaires",      date: "5 février 2026",    excerpt: "Distribution effectuée au CEG-1 de Cobly en présence des autorités locales.", image: "assets/photo-4.jpeg", minutes: 2 },
  { id: 9, tag: "Partenariat", tone: "terracotta", title: "Accord-cadre avec l'Université de Parakou",                   date: "20 janvier 2026",   excerpt: "Stages, recherche-action, formation continue : nouvelles synergies académiques.", image: "assets/photo-5.jpeg", minutes: 3 },
];

const CATS = ["Tous", "Programme", "Partenariat", "Terrain", "Témoignage", "Rapport", "Presse"];

function NewsCard({ item, large = false }) {
  const toneMap = {
    forest: { bg: "bg-forest", text: "text-cream" },
    terracotta: { bg: "bg-terracotta", text: "text-cream" },
    honey: { bg: "bg-honey", text: "text-ink" },
  };
  const tone = toneMap[item.tone];
  return (
    <article className={`group card-hover bg-cream rounded-3xl overflow-hidden ring-1 ring-ink/5 flex flex-col ${large ? "lg:flex-row" : ""}`}>
      <div className={`relative overflow-hidden ${large ? "lg:w-1/2 aspect-[4/3]" : "aspect-[5/4]"}`}>
        <img src={item.image} alt={item.title} className="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" />
        <div className={`absolute top-4 left-4 ${tone.bg} ${tone.text} text-[10px] uppercase tracking-widest font-semibold px-3 py-1.5 rounded-full`}>{item.tag}</div>
        <div className="absolute bottom-4 right-4 bg-cream/95 backdrop-blur text-ink text-[11px] px-3 py-1.5 rounded-full">{item.minutes} min</div>
      </div>
      <div className={`p-7 flex-1 flex flex-col ${large ? "lg:p-10 justify-center" : ""}`}>
        <div className="text-[12px] uppercase tracking-widest text-muted">{item.date}</div>
        <h3 className={`mt-3 font-serif leading-[1.2] text-ink ${large ? "text-[32px]" : "text-[22px]"}`}>{item.title}</h3>
        <p className="mt-3 text-[14px] text-coffee/90 leading-relaxed line-clamp-3">{item.excerpt}</p>
        <div className="mt-6 pt-5 border-t border-ink/8 flex items-center justify-between">
          <a href="actualite-detail.html" className="text-[13px] font-semibold text-forest group-hover:text-mossdk">Lire l'article</a>
          <span className="w-9 h-9 rounded-full bg-forest text-cream grid place-items-center group-hover:bg-mossdk transition-colors">
            <ArrowIcon />
          </span>
        </div>
      </div>
    </article>
  );
}

function FilterAndGrid() {
  const [cat, setCat] = useState("Tous");
  const [query, setQuery] = useState("");
  const filtered = useMemo(() => {
    return ALL_NEWS.filter((n) => {
      if (cat !== "Tous" && n.tag !== cat) return false;
      if (query && !n.title.toLowerCase().includes(query.toLowerCase()) && !n.excerpt.toLowerCase().includes(query.toLowerCase())) return false;
      return true;
    });
  }, [cat, query]);

  const featured = filtered[0];
  const rest = filtered.slice(1);

  return (
    <section className="py-16 sm:py-20">
      <div className="max-w-[1320px] mx-auto px-6">
        {/* Filters */}
        <div className="flex flex-wrap items-center justify-between gap-6 mb-10">
          <div className="flex flex-wrap items-center gap-2">
            {CATS.map((c) => (
              <button key={c} onClick={() => setCat(c)}
                className={`px-4 py-2 rounded-full text-[13px] font-medium transition-colors
                  ${cat === c ? "bg-forest text-cream" : "bg-paper text-ink hover:bg-honey/40"}`}>
                {c}
              </button>
            ))}
          </div>
          <div className="relative">
            <svg width="15" height="15" viewBox="0 0 15 15" fill="none" className="absolute left-4 top-1/2 -translate-y-1/2 text-muted"><circle cx="6" cy="6" r="5" stroke="currentColor" strokeWidth="1.5"/><path d="M10 10 L14 14" stroke="currentColor" strokeWidth="1.5" strokeLinecap="round"/></svg>
            <input value={query} onChange={(e) => setQuery(e.target.value)}
              placeholder="Rechercher un article…"
              className="pl-11 pr-5 py-3 rounded-full bg-paper ring-1 ring-ink/8 text-[14px] focus:outline-none focus:ring-forest focus:bg-cream transition-all w-72" />
          </div>
        </div>

        {filtered.length === 0 ? (
          <div className="py-32 text-center text-muted">Aucun article ne correspond à votre recherche.</div>
        ) : (
          <>
            {featured && (
              <div className="mb-10">
                <NewsCard item={featured} large />
              </div>
            )}
            <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-7">
              {rest.map((n) => <NewsCard key={n.id} item={n} />)}
            </div>
          </>
        )}

        {/* Pagination */}
        <div className="mt-16 flex items-center justify-center gap-2">
          <button className="w-10 h-10 rounded-full bg-paper text-muted grid place-items-center hover:bg-honey/30">
            <ArrowIcon size={11} className="rotate-180" />
          </button>
          {[1, 2, 3].map((p) => (
            <button key={p} className={`w-10 h-10 rounded-full grid place-items-center text-[14px] font-semibold
              ${p === 1 ? "bg-forest text-cream" : "bg-paper text-ink hover:bg-honey/30"}`}>
              {p}
            </button>
          ))}
          <button className="w-10 h-10 rounded-full bg-paper text-muted grid place-items-center hover:bg-honey/30">
            <ArrowIcon size={11} />
          </button>
        </div>
      </div>
    </section>
  );
}

function CTAEnd() {
  return (
    <section className="py-24 bg-paper">
      <div className="max-w-[1320px] mx-auto px-6">
        <div className="bg-honey text-ink rounded-[40px] p-10 sm:p-16 grid grid-cols-12 gap-10 items-center">
          <div className="col-span-12 lg:col-span-8">
            <Eyebrow color="terracotta">Ne ratez aucune actualité</Eyebrow>
            <h3 className="mt-5 font-serif text-[36px] sm:text-[44px] leading-[1.05] tracking-tight">
              Recevez nos articles par <em className="italic text-terracotta">email.</em>
            </h3>
          </div>
          <div className="col-span-12 lg:col-span-4">
            <form className="flex flex-col sm:flex-row gap-3">
              <input type="email" placeholder="votre@email.com"
                className="flex-1 bg-cream rounded-full px-5 py-3.5 text-ink placeholder:text-muted ring-1 ring-ink/10 focus:outline-none focus:ring-forest" />
              <button type="button" className="px-6 py-3.5 rounded-full bg-ink text-cream font-semibold whitespace-nowrap">S'abonner →</button>
            </form>
          </div>
        </div>
      </div>
    </section>
  );
}

function App() {
  return (
    <PageShell active="actualites" label="Actualités">
      <PageHero
        eyebrow="Actualités · le journal de l'ONG"
        title="Toutes nos"
        italic="histoires, projets et rapports."
        subtitle="Programmes, conventions, témoignages, terrain, presse — retrouvez ici l'ensemble de nos publications mises à jour chaque semaine."
        breadcrumb={[{ label: "Actualités" }]}
      />
      <FilterAndGrid />
      <CTAEnd />
    </PageShell>
  );
}

ReactDOM.createRoot(document.getElementById("root")).render(<App />);
