/* global React, ReactDOM, PageShell, PageHero, PillButton, Eyebrow, ArrowIcon */
const { useState } = React;

const ALL_EVENTS = [
  { id: 1, day: "28", month: "Juin",  year: 2026, monthKey: 6, title: "Assemblée Générale Ordinaire 2026",   place: "Natitingou — Salle communale, Quartier Dassagaté", time: "09h00 → 13h00", type: "Statutaire",     image: "assets/photo-5.jpeg", featured: true },
  { id: 2, day: "14", month: "Juil.", year: 2026, monthKey: 7, title: "Atelier régional ODD 4 & ODD 5",     place: "Tanguiéta — Centre socio-culturel",                time: "08h30 → 17h00", type: "Atelier",         image: "assets/photo-7.jpeg" },
  { id: 3, day: "22", month: "Août",  year: 2026, monthKey: 8, title: "Caravane sensibilisation VBG",        place: "Boukombé · Cobly · Matéri",                        time: "Toute la journée", type: "Sensibilisation", image: "assets/photo-3.jpeg" },
  { id: 4, day: "08", month: "Sept.", year: 2026, monthKey: 9, title: "Lancement cohorte AFR-2 Boukombé",    place: "Boukombé — Mairie",                                time: "10h00 → 12h00", type: "Programme",       image: "assets/photo-4.jpeg" },
  { id: 5, day: "12", month: "Oct.",  year: 2026, monthKey: 10, title: "Forum partenariats institutionnels", place: "Cotonou — Hôtel du Lac",                           time: "09h00 → 16h00", type: "Forum",           image: "assets/photo-6.jpeg" },
  { id: 6, day: "20", month: "Nov.",  year: 2026, monthKey: 11, title: "Remise des kits scolaires 2026",     place: "Cobly — CEG-1",                                    time: "09h00 → 11h00", type: "Distribution",    image: "assets/photo-8.jpeg" },
];

const PAST = [
  { id: 7, day: "18", month: "Mars", year: 2026, title: "Assemblée Générale Extraordinaire", place: "Abomey-Calavi", type: "Statutaire" },
  { id: 8, day: "05", month: "Févr.", year: 2026, title: "Convention DDAEP Atacora",         place: "Natitingou",    type: "Partenariat" },
  { id: 9, day: "20", month: "Janv.", year: 2026, title: "Atelier de planification 2026",    place: "Natitingou",    type: "Atelier" },
];

function EventCard({ e }) {
  return (
    <article className="group bg-cream rounded-3xl overflow-hidden ring-1 ring-ink/5 card-hover">
      <div className="grid grid-cols-12">
        <div className="col-span-4 sm:col-span-3 bg-forest text-cream p-5 flex flex-col items-center justify-center text-center">
          <div className="text-[10px] uppercase tracking-widest text-honey font-semibold">{e.month}</div>
          <div className="font-serif text-5xl leading-none mt-2 tabular">{e.day}</div>
          <div className="text-[10px] uppercase tracking-widest text-cream/60 mt-2">{e.year}</div>
        </div>
        <div className="col-span-8 sm:col-span-9 p-6">
          <div className="flex items-center gap-2 mb-3">
            <span className="bg-honey text-ink text-[10px] uppercase tracking-widest font-semibold px-2.5 py-1 rounded-full">{e.type}</span>
            <span className="text-[12px] text-muted">{e.time}</span>
          </div>
          <h3 className="font-serif text-[22px] text-ink leading-tight">{e.title}</h3>
          <div className="mt-3 text-[13px] text-coffee/85">{e.place}</div>
          <div className="mt-5 pt-4 border-t border-ink/8 flex items-center justify-between">
            <a href="evenement-detail.html" className="text-[13px] font-semibold text-forest">Voir le détail</a>
            <span className="w-9 h-9 rounded-full bg-forest text-cream grid place-items-center group-hover:bg-mossdk transition-colors"><ArrowIcon /></span>
          </div>
        </div>
      </div>
    </article>
  );
}

function FeaturedEvent({ e }) {
  return (
    <article className="bg-forest text-cream rounded-[36px] overflow-hidden ring-1 ring-ink/5 mb-10 grid grid-cols-12">
      <div className="col-span-12 lg:col-span-6 relative aspect-[16/10] lg:aspect-auto">
        <img src={e.image} alt={e.title} className="w-full h-full object-cover absolute inset-0" />
        <div className="absolute inset-0 bg-gradient-to-tr from-forest/70 to-transparent" />
        <div className="absolute top-6 left-6 bg-honey text-ink text-[10px] uppercase tracking-widest font-bold px-3 py-1.5 rounded-full">À la une</div>
      </div>
      <div className="col-span-12 lg:col-span-6 p-10 sm:p-14 flex flex-col">
        <div className="flex items-center gap-4">
          <div className="w-20 h-20 rounded-2xl bg-honey text-ink grid place-items-center font-serif">
            <div className="text-center">
              <div className="text-3xl tabular leading-none">{e.day}</div>
              <div className="text-[10px] uppercase tracking-widest font-sans font-semibold mt-1.5">{e.month}</div>
            </div>
          </div>
          <div>
            <div className="text-[11px] uppercase tracking-widest text-honey">{e.type}</div>
            <div className="text-[13px] mt-1">{e.time}</div>
          </div>
        </div>
        <h2 className="mt-8 font-serif text-[36px] sm:text-[44px] leading-[1.05] tracking-tight">{e.title}</h2>
        <p className="mt-4 text-cream/80 text-[15px] leading-relaxed">{e.place}</p>
        <div className="mt-auto pt-8 flex flex-wrap gap-3">
          <PillButton as="a" href="evenement-detail.html" variant="honey">Réserver ma place</PillButton>
          <PillButton as="a" href="evenement-detail.html" variant="ghost" className="!text-cream hover:!text-honey">Voir le détail</PillButton>
        </div>
      </div>
    </article>
  );
}

function ListAndCalendar() {
  const [view, setView] = useState("list");
  const featured = ALL_EVENTS.find(e => e.featured);
  const rest = ALL_EVENTS.filter(e => !e.featured);

  return (
    <section className="py-16">
      <div className="max-w-[1320px] mx-auto px-6">
        <div className="flex flex-wrap items-center justify-between gap-6 mb-10">
          <div className="flex items-center gap-2 bg-paper rounded-full p-1.5">
            <button onClick={() => setView("list")}
              className={`px-5 py-2 rounded-full text-[13px] font-semibold transition-colors
                ${view === "list" ? "bg-forest text-cream" : "text-ink"}`}>
              Liste
            </button>
            <button onClick={() => setView("calendar")}
              className={`px-5 py-2 rounded-full text-[13px] font-semibold transition-colors
                ${view === "calendar" ? "bg-forest text-cream" : "text-ink"}`}>
              Calendrier
            </button>
          </div>
          <div className="text-[13px] text-muted">{ALL_EVENTS.length} événements à venir</div>
        </div>

        {view === "list" ? (
          <>
            {featured && <FeaturedEvent e={featured} />}
            <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
              {rest.map((e) => <EventCard key={e.id} e={e} />)}
            </div>
          </>
        ) : (
          <CalendarView events={ALL_EVENTS} />
        )}
      </div>
    </section>
  );
}

function CalendarView({ events }) {
  const months = [
    { key: 6, name: "Juin 2026" },
    { key: 7, name: "Juillet 2026" },
    { key: 8, name: "Août 2026" },
    { key: 9, name: "Septembre 2026" },
    { key: 10, name: "Octobre 2026" },
    { key: 11, name: "Novembre 2026" },
  ];
  return (
    <div className="space-y-10">
      {months.map((m) => {
        const evs = events.filter((e) => e.monthKey === m.key);
        if (evs.length === 0) return null;
        return (
          <div key={m.key} className="bg-cream rounded-3xl p-7 ring-1 ring-ink/5">
            <div className="flex items-center gap-4 mb-6">
              <div className="font-serif text-[26px] text-ink">{m.name}</div>
              <div className="h-px flex-1 bg-ink/10" />
              <div className="text-[12px] text-muted">{evs.length} événement{evs.length > 1 ? "s" : ""}</div>
            </div>
            <div className="space-y-3">
              {evs.map((e) => (
                <a key={e.id} href="evenement-detail.html" className="flex items-center gap-5 p-4 rounded-2xl hover:bg-paper transition-colors group">
                  <div className="w-14 h-14 rounded-xl bg-paper text-ink grid place-items-center font-serif shrink-0">
                    <div className="text-center">
                      <div className="text-xl tabular leading-none">{e.day}</div>
                      <div className="text-[9px] uppercase tracking-widest font-sans font-semibold mt-1">{e.month}</div>
                    </div>
                  </div>
                  <div className="flex-1">
                    <div className="flex items-center gap-2">
                      <span className="text-[10px] uppercase tracking-widest text-terracotta font-semibold">{e.type}</span>
                      <span className="text-muted/50">·</span>
                      <span className="text-[12px] text-muted">{e.time}</span>
                    </div>
                    <div className="font-serif text-[18px] text-ink mt-1">{e.title}</div>
                    <div className="text-[12.5px] text-coffee/80 mt-1">{e.place}</div>
                  </div>
                  <span className="w-9 h-9 rounded-full bg-forest text-cream grid place-items-center opacity-0 group-hover:opacity-100 transition-opacity">
                    <ArrowIcon />
                  </span>
                </a>
              ))}
            </div>
          </div>
        );
      })}
    </div>
  );
}

function PastEvents() {
  return (
    <section className="py-24 bg-paper">
      <div className="max-w-[1320px] mx-auto px-6">
        <div className="max-w-2xl mb-12">
          <Eyebrow color="terracotta">Archives</Eyebrow>
          <h2 className="mt-5 font-serif text-[36px] sm:text-[44px] leading-[1.05] text-ink tracking-tight">
            Événements <em className="italic text-terracotta">passés.</em>
          </h2>
        </div>
        <div className="bg-cream rounded-3xl ring-1 ring-ink/5 overflow-hidden">
          {PAST.map((e, i, a) => (
            <a key={e.id} href="evenement-detail.html"
               className={`grid grid-cols-12 items-center p-5 hover:bg-paper transition-colors ${i < a.length - 1 ? "border-b border-ink/8" : ""}`}>
              <div className="col-span-3 sm:col-span-2 font-serif text-[20px] text-muted tabular">
                {e.day} {e.month}
              </div>
              <div className="col-span-2 sm:col-span-2 text-[10px] uppercase tracking-widest text-terracotta font-semibold">{e.type}</div>
              <div className="col-span-7 sm:col-span-6 font-serif text-[16px] text-ink">{e.title}</div>
              <div className="hidden sm:block col-span-2 text-[13px] text-coffee/80">{e.place}</div>
            </a>
          ))}
        </div>
      </div>
    </section>
  );
}

function App() {
  return (
    <PageShell active="evenements" label="Événements">
      <PageHero
        eyebrow="Agenda · prochains rendez-vous"
        title="L'agenda"
        italic="d'Elite Atacora."
        subtitle="Assemblées, ateliers, caravanes, distributions. Retrouvez tous nos événements à venir et passés sur le département."
        breadcrumb={[{ label: "Événements" }]}
      />
      <ListAndCalendar />
      <PastEvents />
    </PageShell>
  );
}

ReactDOM.createRoot(document.getElementById("root")).render(<App />);
