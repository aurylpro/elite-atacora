/* global React, ReactDOM, PageShell, PageHero, PillButton, Eyebrow, ArrowIcon */

const EVT = {
  type: "Statutaire",
  title: "Assemblée Générale Ordinaire 2026",
  date: "Samedi 28 juin 2026",
  time: "09h00 → 13h00",
  place: "Salle communale, Quartier Dassagaté — Natitingou, Atacora",
  image: "assets/photo-5.jpeg",
  day: "28", month: "Juin", year: "2026",
};

const AGENDA = [
  { time: "08h30", item: "Accueil des membres et émargement" },
  { time: "09h00", item: "Ouverture officielle par la Présidente" },
  { time: "09h15", item: "Rapport moral 2025-2026" },
  { time: "10h00", item: "Rapport financier 2025 — Vérificateur des Comptes" },
  { time: "11h00", item: "Pause-café et photo de famille" },
  { time: "11h30", item: "Présentation du plan d'action 2026-2027" },
  { time: "12h15", item: "Vote des résolutions" },
  { time: "12h45", item: "Clôture et cocktail" },
];

function Hero() {
  return (
    <section className="relative pt-16 pb-12 overflow-hidden">
      <div aria-hidden="true" className="absolute -top-32 -right-32 w-[420px] h-[420px] rounded-full bg-honey/20 blur-3xl pointer-events-none" />
      <div className="max-w-[1320px] mx-auto px-6 relative">
        <nav className="flex items-center gap-2 text-[12px] text-muted mb-10">
          <a href="index.html" className="hover:text-forest">Accueil</a>
          <span className="text-muted/50">/</span>
          <a href="evenements.html" className="hover:text-forest">Événements</a>
          <span className="text-muted/50">/</span>
          <span className="text-ink">{EVT.title}</span>
        </nav>

        <div className="grid grid-cols-12 gap-10 items-center">
          <div className="col-span-12 lg:col-span-7">
            <div className="flex items-center gap-3 mb-6">
              <span className="bg-forest text-cream text-[10px] uppercase tracking-widest font-semibold px-3 py-1.5 rounded-full">{EVT.type}</span>
              <span className="text-[12px] text-muted uppercase tracking-widest">À la une</span>
            </div>
            <h1 className="font-serif text-[48px] sm:text-[64px] lg:text-[76px] leading-[1.02] text-ink tracking-tight">{EVT.title}</h1>
            <div className="mt-8 grid grid-cols-2 sm:grid-cols-3 gap-6 max-w-2xl">
              <div>
                <div className="text-[10px] uppercase tracking-widest text-muted">Date</div>
                <div className="mt-2 font-serif text-[18px] text-ink leading-tight">{EVT.date}</div>
              </div>
              <div>
                <div className="text-[10px] uppercase tracking-widest text-muted">Horaire</div>
                <div className="mt-2 font-serif text-[18px] text-ink leading-tight">{EVT.time}</div>
              </div>
              <div>
                <div className="text-[10px] uppercase tracking-widest text-muted">Lieu</div>
                <div className="mt-2 font-serif text-[18px] text-ink leading-tight">Natitingou</div>
              </div>
            </div>
            <div className="mt-10 flex flex-wrap gap-3">
              <PillButton as="a" href="#inscription" variant="primary">Je m'inscris</PillButton>
              <PillButton as="a" href="#" variant="outline" arrow={false}>Ajouter au calendrier</PillButton>
            </div>
          </div>
          <div className="col-span-12 lg:col-span-5">
            <div className="relative">
              <div className="aspect-[4/5] rounded-[40px] overflow-hidden ring-1 ring-ink/8 shadow-[0_30px_60px_-30px_rgba(30,24,19,0.3)]">
                <img src={EVT.image} alt="" className="w-full h-full object-cover" />
              </div>
              <div className="absolute -top-5 -left-5 bg-honey text-ink rounded-2xl px-5 py-4 ring-1 ring-ink/10 shadow-[0_15px_30px_-15px_rgba(30,24,19,0.3)] rotate-[-3deg]">
                <div className="text-center">
                  <div className="text-[10px] uppercase tracking-widest font-semibold">{EVT.month} {EVT.year}</div>
                  <div className="font-serif text-5xl leading-none mt-1 tabular">{EVT.day}</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  );
}

function Description() {
  return (
    <section className="py-16">
      <div className="max-w-[1320px] mx-auto px-6 grid grid-cols-12 gap-10">
        <div className="col-span-12 lg:col-span-7">
          <Eyebrow color="forest">À propos de l'événement</Eyebrow>
          <h2 className="mt-5 font-serif text-[32px] sm:text-[40px] leading-[1.1] text-ink tracking-tight">
            Le rendez-vous statutaire <em className="italic text-terracotta">annuel.</em>
          </h2>
          <div className="mt-8 space-y-5 text-coffee text-[16px] leading-[1.75]">
            <p>
              L'Assemblée Générale Ordinaire 2026 réunira l'ensemble des membres
              adhérents et actifs d'Elite Atacora pour examiner les rapports
              moral et financier de l'exercice écoulé, et valider les
              orientations stratégiques de l'année à venir.
            </p>
            <p>
              Conformément à l'article 22 des statuts, cette assemblée est
              ouverte aux membres à jour de leur cotisation, ainsi qu'aux
              partenaires institutionnels invités.
            </p>
            <p>
              Un cocktail de clôture est prévu à 12h45 pour permettre les
              échanges informels entre les membres et les partenaires présents.
            </p>
          </div>
          <div className="mt-10 grid grid-cols-2 gap-4">
            <img src="assets/photo-3.jpeg" alt="" className="rounded-2xl aspect-[4/3] object-cover" />
            <img src="assets/photo-7.jpeg" alt="" className="rounded-2xl aspect-[4/3] object-cover" />
          </div>
        </div>

        <div className="col-span-12 lg:col-span-5">
          <div className="bg-paper rounded-3xl p-8 ring-1 ring-ink/5 sticky top-28">
            <Eyebrow color="terracotta">Programme de la journée</Eyebrow>
            <ol className="mt-6 space-y-3">
              {AGENDA.map((a, i) => (
                <li key={i} className="flex items-start gap-4 pb-3 border-b border-ink/8 last:border-b-0">
                  <div className="font-mono text-[12px] text-terracotta font-semibold w-12 shrink-0 pt-0.5">{a.time}</div>
                  <div className="text-[14px] text-ink leading-snug">{a.item}</div>
                </li>
              ))}
            </ol>
          </div>
        </div>
      </div>
    </section>
  );
}

function LocationMap() {
  return (
    <section className="py-16">
      <div className="max-w-[1320px] mx-auto px-6">
        <div className="grid grid-cols-12 gap-10">
          <div className="col-span-12 lg:col-span-4">
            <Eyebrow color="forest">Lieu</Eyebrow>
            <h3 className="mt-5 font-serif text-[28px] text-ink leading-tight">Salle communale, Quartier Dassagaté</h3>
            <div className="mt-5 space-y-3 text-coffee text-[15px]">
              <div className="flex items-start gap-3">
                <span className="w-5 shrink-0 pt-0.5 text-terracotta">
                  <svg width="14" height="16" viewBox="0 0 12 14" fill="none"><path d="M6 13 Q1 8 1 5 A5 5 0 1 1 11 5 Q11 8 6 13 Z M6 5 A1 1 0 1 1 6 7 A1 1 0 1 1 6 5 Z" stroke="currentColor" strokeWidth="1.4"/></svg>
                </span>
                <span>Quartier Dassagaté<br/>Natitingou, Atacora · Bénin</span>
              </div>
            </div>
            <div className="mt-6">
              <PillButton as="a" href="#" variant="outline">Itinéraire</PillButton>
            </div>
          </div>
          <div className="col-span-12 lg:col-span-8">
            <div className="aspect-[16/9] rounded-3xl bg-paper ring-1 ring-ink/5 relative overflow-hidden">
              {/* Map placeholder */}
              <div className="absolute inset-0 grid place-items-center text-muted">
                <div className="text-center">
                  <svg width="48" height="58" viewBox="0 0 12 14" fill="none" className="mx-auto text-terracotta"><path d="M6 13 Q1 8 1 5 A5 5 0 1 1 11 5 Q11 8 6 13 Z M6 5 A1 1 0 1 1 6 7 A1 1 0 1 1 6 5 Z" stroke="currentColor" strokeWidth="1.4"/></svg>
                  <div className="mt-4 text-[14px]">Carte Google Maps — Natitingou</div>
                  <div className="mt-1 text-[11px] uppercase tracking-widest">Intégration à venir</div>
                </div>
              </div>
              <div className="absolute inset-0 bg-[radial-gradient(#1E1813_0.6px,transparent_0.6px)] [background-size:14px_14px] opacity-10" />
            </div>
          </div>
        </div>
      </div>
    </section>
  );
}

function Inscription() {
  return (
    <section id="inscription" className="py-24 bg-paper">
      <div className="max-w-[1320px] mx-auto px-6">
        <div className="bg-forest text-cream rounded-[40px] p-10 sm:p-16 grid grid-cols-12 gap-10 items-center">
          <div className="col-span-12 lg:col-span-7">
            <Eyebrow color="cream">Inscription</Eyebrow>
            <h3 className="mt-5 font-serif text-[36px] sm:text-[44px] leading-[1.05] tracking-tight">
              Réservez votre place pour <em className="italic text-honey">l'AG 2026.</em>
            </h3>
            <p className="mt-5 text-cream/80 max-w-md text-[15px] leading-relaxed">
              L'inscription est obligatoire pour des raisons logistiques. Une
              confirmation vous sera envoyée par email sous 48 heures.
            </p>
          </div>
          <div className="col-span-12 lg:col-span-5">
            <PillButton as="a" href="contact.html" variant="honey" className="w-full justify-center">S'inscrire à l'événement</PillButton>
          </div>
        </div>
      </div>
    </section>
  );
}

function App() {
  return (
    <PageShell active="evenements" label="Événement">
      <Hero />
      <Description />
      <LocationMap />
      <Inscription />
    </PageShell>
  );
}

ReactDOM.createRoot(document.getElementById("root")).render(<App />);
