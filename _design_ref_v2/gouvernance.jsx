/* global React, ReactDOM, PageShell, PageHero, PillButton, Eyebrow */

const BUREAU = [
  { role: "Présidente",                    name: "SANGA PEMA Tébouwa Gislaine épse KOUTI", initials: "SG" },
  { role: "Vice-Présidente",               name: "SIMBA Kado Alphonse",                     initials: "SA" },
  { role: "Secrétaire Générale",           name: "TOHOYESSOU AGOLI-AGBO Majoie Géroxie",   initials: "TM" },
  { role: "Secrétaire Générale Adjointe",  name: "LAFIA YAROU Djibril Adamou",              initials: "LD" },
  { role: "Trésorière Générale",           name: "OUIN-OURO Massopa Brigitte",              initials: "OB" },
  { role: "Trésorière Générale Adjointe",  name: "SINAISSIRE Chèrifatou",                   initials: "SC" },
  { role: "Chargée de la Communication",   name: "ZOUNTCHEGBE Yanick",                      initials: "ZY" },
  { role: "Chargée des Partenariats",      name: "SOGAN Monique",                           initials: "SM" },
  { role: "Chargée des ODD",               name: "TOUNGAKOUAGOU Sabine épse SAMA",          initials: "TS" },
];

const SURVEILLANCE = [
  { role: "Présidente du Conseil de Surveillance", name: "ATIOGBE SODOKIN Gélase", initials: "AG" },
  { role: "Secrétaire du Conseil de Surveillance", name: "BEKOUSSANRI Sylvère",     initials: "BS" },
];

const ORGANES = [
  {
    code: "AG",
    name: "Assemblée Générale",
    desc: "Organe suprême de l'ONG. Réunit tous les membres une fois par an pour valider les orientations stratégiques, les rapports moraux et financiers.",
    article: "Article 22-23",
    color: "bg-forest",
    accent: "text-honey",
  },
  {
    code: "BE",
    name: "Bureau Exécutif",
    desc: "Organe de gestion quotidienne. 9 membres élus par l'AG, conduit les programmes, représente l'ONG et exécute les décisions de l'Assemblée.",
    article: "Article 25",
    color: "bg-terracotta",
    accent: "text-cream",
  },
  {
    code: "VC",
    name: "Vérificateur des Comptes",
    desc: "Personnalité indépendante chargée de l'audit annuel des comptes et de la conformité financière. Présente son rapport à l'AG.",
    article: "Article 26",
    color: "bg-honey",
    accent: "text-ink",
  },
  {
    code: "CC",
    name: "Conseil de Surveillance",
    desc: "Contrôle l'action du Bureau Exécutif et veille au respect des statuts et du règlement intérieur. 2 membres élus.",
    article: "Article 27-28",
    color: "bg-ink",
    accent: "text-honey",
  },
];

function Organes() {
  return (
    <section className="py-24 bg-paper">
      <div className="max-w-[1320px] mx-auto px-6">
        <div className="max-w-2xl mb-12">
          <Eyebrow color="forest">Article 21 des statuts</Eyebrow>
          <h2 className="mt-5 font-serif text-[42px] sm:text-[52px] leading-[1.05] text-ink tracking-tight">
            Quatre <em className="italic text-terracotta">organes</em>, un même cap.
          </h2>
          <p className="mt-6 text-coffee text-[16px] leading-[1.7]">
            La gouvernance d'Elite Atacora repose sur une séparation claire
            entre orientation stratégique, exécution opérationnelle et contrôle.
          </p>
        </div>
        <div className="grid grid-cols-1 md:grid-cols-2 gap-6">
          {ORGANES.map((o) => (
            <article key={o.code} className={`${o.color} ${o.accent} rounded-[32px] p-10 relative overflow-hidden card-hover`}>
              <div className="absolute -bottom-16 -right-16 w-52 h-52 rounded-full border border-current opacity-15" />
              <div className="text-[11px] uppercase tracking-widest opacity-70">{o.article}</div>
              <div className="font-serif text-7xl leading-none mt-3 opacity-80">{o.code}</div>
              <h3 className="mt-6 font-serif text-[26px] leading-tight">{o.name}</h3>
              <p className="mt-3 text-[14.5px] opacity-90 leading-relaxed max-w-md">{o.desc}</p>
            </article>
          ))}
        </div>
      </div>
    </section>
  );
}

function MemberCard({ m, accent = "honey" }) {
  return (
    <article className="bg-cream rounded-3xl ring-1 ring-ink/5 overflow-hidden card-hover">
      <div className="aspect-[4/5] bg-paper grid place-items-center relative">
        <div className="absolute inset-0 bg-gradient-to-b from-honey/10 to-terracotta/10" />
        <div className="relative w-28 h-28 rounded-full bg-cream grid place-items-center ring-4 ring-cream shadow-[0_15px_30px_-15px_rgba(30,24,19,0.25)]">
          <span className="font-serif text-3xl text-terracotta">{m.initials}</span>
        </div>
        <div className="absolute bottom-3 left-3 text-[10px] uppercase tracking-widest text-muted bg-cream/80 backdrop-blur px-2 py-1 rounded-full">Portrait à venir</div>
      </div>
      <div className="p-5">
        <div className="text-[11px] uppercase tracking-widest text-terracotta font-semibold">{m.role}</div>
        <div className="mt-2 font-serif text-[17px] text-ink leading-tight">{m.name}</div>
      </div>
    </article>
  );
}

function BureauExecutif() {
  return (
    <section className="py-24 bg-cream">
      <div className="max-w-[1320px] mx-auto px-6">
        <div className="max-w-2xl mb-12">
          <Eyebrow color="terracotta">Bureau Exécutif · Article 25</Eyebrow>
          <h2 className="mt-5 font-serif text-[42px] sm:text-[52px] leading-[1.05] text-ink tracking-tight">
            Neuf <em className="italic text-terracotta">femmes et hommes</em> au service de l'Atacora.
          </h2>
          <p className="mt-6 text-coffee text-[16px] leading-[1.7]">
            Élu·e·s par l'Assemblée Générale pour un mandat statutaire,
            le Bureau Exécutif pilote les programmes et représente l'ONG.
          </p>
        </div>
        <div className="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-6">
          {BUREAU.map((m, i) => <MemberCard key={i} m={m} />)}
        </div>
      </div>
    </section>
  );
}

function ConseilSurveillance() {
  return (
    <section className="py-24 bg-paper">
      <div className="max-w-[1320px] mx-auto px-6">
        <div className="max-w-2xl mb-12">
          <Eyebrow color="forest">Conseil de Surveillance · Article 27-28</Eyebrow>
          <h2 className="mt-5 font-serif text-[40px] sm:text-[48px] leading-[1.05] text-ink tracking-tight">
            Le regard <em className="italic text-terracotta">indépendant.</em>
          </h2>
          <p className="mt-6 text-coffee text-[16px] leading-[1.7]">
            Deux personnalités élues veillent au respect des statuts et au bon
            fonctionnement de l'ONG.
          </p>
        </div>
        <div className="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-3xl">
          {SURVEILLANCE.map((m, i) => <MemberCard key={i} m={m} />)}
        </div>
      </div>
    </section>
  );
}

function CTAEnd() {
  return (
    <section className="py-24">
      <div className="max-w-[1320px] mx-auto px-6">
        <div className="bg-forest text-cream rounded-[40px] p-10 sm:p-16 grid grid-cols-12 gap-10 items-center relative overflow-hidden">
          <svg aria-hidden="true" className="absolute -top-32 -right-32 w-96 h-96 text-honey/15" viewBox="0 0 200 200" fill="none">
            <circle cx="100" cy="100" r="90" stroke="currentColor" strokeWidth="2" strokeDasharray="4 8"/>
          </svg>
          <div className="col-span-12 lg:col-span-8 relative">
            <Eyebrow color="cream">Une question ?</Eyebrow>
            <h3 className="mt-5 font-serif text-[36px] sm:text-[44px] leading-[1.05] tracking-tight">
              Contactez directement le <em className="italic text-honey">Bureau Exécutif.</em>
            </h3>
          </div>
          <div className="col-span-12 lg:col-span-4 flex flex-wrap gap-3 lg:justify-end relative">
            <PillButton as="a" href="contact.html" variant="onDark">Nous écrire</PillButton>
          </div>
        </div>
      </div>
    </section>
  );
}

function App() {
  return (
    <PageShell active="gouvernance" label="Gouvernance">
      <PageHero
        eyebrow="L'ONG · gouvernance"
        title="Une gouvernance"
        italic="claire, transparente, redevable."
        subtitle="Elite Atacora est administrée par quatre organes complémentaires et onze responsables élu·e·s par l'Assemblée Générale."
        breadcrumb={[{ label: "Gouvernance" }]}
        image="assets/photo-5.jpeg"
      />
      <Organes />
      <BureauExecutif />
      <ConseilSurveillance />
      <CTAEnd />
    </PageShell>
  );
}

ReactDOM.createRoot(document.getElementById("root")).render(<App />);
