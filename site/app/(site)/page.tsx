import Image from 'next/image'
import Link from 'next/link'
import { Eyebrow } from '@/components/ui/Eyebrow'
import { PillButton } from '@/components/ui/PillButton'
import { ArrowIcon } from '@/components/ui/ArrowIcon'
import { Counter } from '@/components/ui/Counter'
import { getLatestArticles, getUpcomingEvenements, getSiteSettings } from '@/lib/queries'
import { urlFor } from '@/lib/sanity'

export const dynamic = 'force-dynamic'

type Stat = { value: number; suffix?: string; label: string; note?: string }

const STATS_FALLBACK: Stat[] = [
  { value: 2018, suffix: '',  label: 'Année de fondation',     note: 'Godomey Togoudo' },
  { value: 24,   suffix: '+', label: 'Projets menés',          note: 'depuis la création' },
  { value: 6,    suffix: '',  label: 'Communes couvertes',     note: 'département Atacora' },
  { value: 3200, suffix: '+', label: 'Bénéficiaires directs',  note: 'femmes & enfants' },
]

const MARQUEE_FALLBACK: string[] = [
  'Assemblée Générale 2026 · Natitingou · 28 juin',
  'Atelier ODD 4 & 5 · Tanguiéta · 14 juillet',
  'Recrutement bénévoles · programme AFR-1',
  "Rapport d'activité 2025 disponible",
  'Adhésions ouvertes · 5 000 FCFA',
  'Caravane VBG · 22 août · Boukombé',
]

const VALUES = [
  { emoji: '✦', title: 'Excellence',        body: 'Exigence et résultats mesurés sur le terrain.' },
  { emoji: '◈', title: 'Professionnalisme', body: 'Méthode rigoureuse dans chaque programme.' },
  { emoji: '✺', title: 'Transparence',      body: 'Gouvernance ouverte, comptes publics.' },
  { emoji: '❀', title: 'Esprit d\'équipe',  body: 'Décisions collégiales, terrain partagé.' },
  { emoji: '❖', title: 'Intégrité',         body: 'Honnêteté envers chaque partenaire.' },
]

const FALLBACK_NEWS = [
  { _id: 'fb1', tag: 'Programme',   tone: 'forest',     title: 'Alphabétisation fonctionnelle des femmes rurales de Tanguiéta',     date: '12 mai 2026',    excerpt: 'Premier déploiement du dispositif AFR-1 dans quatre villages, en partenariat avec la mairie.', image: '/images/photo-5.jpeg', minutes: 4, slug: 'alphabetisation-tanguieta' },
  { _id: 'fb2', tag: 'Partenariat', tone: 'terracotta', title: "Convention signée avec la Direction Départementale de l'Atacora",   date: '28 avril 2026',  excerpt: "Cadre formel pour nos interventions en milieu scolaire sur l'égalité et la prévention.",       image: '/images/photo-7.jpeg', minutes: 3, slug: 'convention-ddaep' },
  { _id: 'fb3', tag: 'Terrain',     tone: 'honey',      title: '120 productrices de Boukombé reçoivent leurs kits maraîchers',       date: '9 avril 2026',   excerpt: 'Arrosoirs, semences et fertilisant biologique pour la campagne pré-pluviale 2026.',           image: '/images/photo-2.jpeg', minutes: 2, slug: 'kits-maraichers-boukombe' },
]

const FALLBACK_EVENTS = [
  { _id: 'ef1', day: '28', month: 'Juin',  year: '2026', title: 'Assemblée Générale Ordinaire',       place: 'Natitingou — Salle communale, Quartier Dassagaté', time: '09h00 → 13h00',     type: 'Statutaire',     image: '/images/photo-5.jpeg', featured: true,  slug: 'ag-ordinaire-2026' },
  { _id: 'ef2', day: '14', month: 'Juil.', year: '2026', title: 'Atelier régional ODD 4 & ODD 5',     place: 'Tanguiéta — Centre socio-culturel',                time: '08h30 → 17h00',     type: 'Atelier',        image: '/images/photo-7.jpeg', featured: false, slug: 'atelier-odd-tanguieta' },
  { _id: 'ef3', day: '22', month: 'Août',  year: '2026', title: 'Caravane sensibilisation VBG',       place: 'Boukombé · Cobly · Matéri',                        time: 'Toute la journée',  type: 'Sensibilisation', image: '/images/photo-3.jpeg', featured: false, slug: 'caravane-vbg-aout' },
]

function fmtFrDate(d: string) {
  if (!d) return ''
  return new Date(d).toLocaleDateString('fr-FR', { day: 'numeric', month: 'long', year: 'numeric' })
}

function dayOf(d: string) {
  return d ? new Date(d).getDate().toString().padStart(2, '0') : ''
}
function monthOf(d: string) {
  return d ? new Date(d).toLocaleDateString('fr-FR', { month: 'short' }) : ''
}
function yearOf(d: string) {
  return d ? new Date(d).getFullYear().toString() : ''
}
function timeOf(d: string) {
  return d ? new Date(d).toLocaleTimeString('fr-FR', { hour: '2-digit', minute: '2-digit' }) : ''
}

const TONE_BY_CATEGORIE: Record<string, 'forest' | 'terracotta' | 'honey'> = {
  actualites: 'forest',
  temoignages: 'terracotta',
  rapports: 'forest',
  presse: 'honey',
}

function toneClasses(tone: 'forest' | 'terracotta' | 'honey') {
  return tone === 'honey'
    ? { bg: 'bg-honey', text: 'text-ink' }
    : tone === 'terracotta'
      ? { bg: 'bg-terracotta', text: 'text-cream' }
      : { bg: 'bg-forest', text: 'text-cream' }
}

// ─────────────────────────────────────────────────────────────────────────────
// HERO
// ─────────────────────────────────────────────────────────────────────────────
function Hero({ image, imageCaption, quote, marquee }: { image: string; imageCaption: string; quote: string; marquee: string[] }) {
  return (
    <section className="relative pt-6 sm:pt-8 pb-16 sm:pb-28 overflow-hidden">
      <div aria-hidden="true" className="absolute -top-32 -right-32 w-[300px] sm:w-[440px] h-[300px] sm:h-[440px] rounded-full bg-honey/20 blur-3xl pointer-events-none" />
      <div aria-hidden="true" className="absolute top-1/3 -left-32 w-[280px] sm:w-[360px] h-[280px] sm:h-[360px] rounded-full bg-terracotta/15 blur-3xl pointer-events-none" />

      <div className="max-w-page mx-auto px-6 grid grid-cols-12 gap-6 sm:gap-10 relative">
        <div className="col-span-12 lg:col-span-7 pt-4 lg:pt-12">
          <Eyebrow color="forest">ONG · République du Bénin · Atacora</Eyebrow>

          <h1 className="mt-6 fluid-h1 font-serif text-ink">
            <span className="block">Pour les <em className="italic text-terracotta font-serif">femmes</em>,</span>
            <span className="block">pour les <em className="italic text-terracotta font-serif">enfants</em>,</span>
            <span className="block">pour l&apos;Atacora.</span>
          </h1>

          <p className="mt-8 text-[17px] sm:text-[19px] leading-[1.7] text-coffee max-w-[600px]">
            Depuis 2018, nous marchons aux côtés des femmes, des enfants et des
            communautés rurales de l&apos;Atacora. <span className="underline-honey">Éducation,
            autonomisation, résilience climatique</span> — alignés sur les ODD 4 et ODD 5
            des Nations Unies.
          </p>

          <div className="mt-10 flex flex-wrap items-center gap-4">
            <PillButton href="/a-propos" variant="primary">Découvrir l&apos;ONG</PillButton>
            <PillButton href="/adherer" variant="outline">Nous rejoindre</PillButton>
            <Link href="/nos-actions" className="ml-2 text-[14px] text-coffee hover:text-forest underline underline-offset-4 decoration-honey decoration-2">
              Voir nos actions terrain →
            </Link>
          </div>

          <div className="mt-10 sm:mt-14 inline-flex flex-wrap items-stretch bg-white/70 backdrop-blur rounded-3xl p-2 ring-1 ring-ink/8 shadow-[0_20px_50px_-30px_rgba(30,24,19,0.2)] max-w-full overflow-hidden">
            {[
              ['Fondée le', '8 janvier 2018'],
              ['Statut',    'ONG apolitique'],
              ['Cadre légal', 'Loi 2025-19 · RB'],
            ].map(([k, v], i, a) => (
              <div key={k} className={`px-4 sm:px-5 py-2 ${i < a.length - 1 ? 'border-r border-ink/8' : ''}`}>
                <div className="text-[10px] uppercase tracking-widest text-muted">{k}</div>
                <div className="text-[13px] sm:text-[14px] font-semibold text-ink mt-1 whitespace-nowrap">{v}</div>
              </div>
            ))}
          </div>
        </div>

        <div className="col-span-12 lg:col-span-5 relative mt-8 lg:mt-0">
          <div className="relative pt-4 lg:pt-12 mx-auto max-w-[420px] lg:max-w-none">
            <div className="relative">
              <div className="aspect-[3/4] arch-top rounded-b-3xl overflow-hidden ring-frame relative">
                <Image src={image} alt="Membres de l'ONG en réunion" fill className="object-cover" sizes="(max-width:1024px) 100vw, 40vw" priority />
                <div className="absolute inset-0 bg-gradient-to-t from-ink/40 via-transparent to-transparent" />
                <div className="absolute bottom-5 left-5 right-5 text-cream">
                  <div className="text-[10px] uppercase tracking-widest opacity-80">{imageCaption}</div>
                  <div className="text-[14px] sm:text-[15px] font-serif mt-1">{quote}</div>
                </div>
              </div>

              <svg aria-hidden="true" className="hidden md:block absolute -bottom-8 -left-12 w-44 h-44 text-honey/60 animate-floaty pointer-events-none" viewBox="0 0 200 200" fill="none">
                <circle cx="100" cy="100" r="90" stroke="currentColor" strokeWidth="2" strokeDasharray="4 8" />
              </svg>
            </div>

            {/* Décor flottant : visible à partir de sm, repositionné en lg */}
            <div className="hidden sm:block absolute -top-3 right-2 lg:-right-6 bg-cream rounded-2xl px-5 py-4 ring-1 ring-ink/8 shadow-[0_15px_30px_-15px_rgba(30,24,19,0.3)] rotate-2">
              <div className="text-[10px] uppercase tracking-widest text-terracotta font-semibold">Impact 2025</div>
              <div className="font-serif text-2xl sm:text-3xl text-ink mt-1 leading-none">+ 3 200</div>
              <div className="text-[11px] text-muted mt-1">bénéficiaires directs</div>
            </div>

            <div className="hidden md:block absolute -bottom-12 right-2 lg:-right-8 w-28 lg:w-32 h-28 lg:h-32 rounded-full overflow-hidden ring-4 ring-cream shadow-[0_20px_30px_-15px_rgba(30,24,19,0.4)]">
              <Image src="/images/photo-2.jpeg" alt="Kit maraîcher" width={128} height={128} className="w-full h-full object-cover" />
            </div>

            <div className="hidden sm:block absolute left-2 lg:-left-8 top-1/3 bg-forest text-cream rounded-2xl px-4 py-3 -rotate-3 shadow-[0_15px_30px_-15px_rgba(30,86,49,0.6)]">
              <div className="text-[10px] uppercase tracking-widest text-honey">ODD</div>
              <div className="font-serif text-lg leading-none mt-1">4 · 5</div>
            </div>
          </div>
        </div>
      </div>

      {/* Marquee */}
      <div className="mt-24 sm:mt-32 border-y border-ink/10 bg-paper/40 overflow-hidden">
        <div className="max-w-page mx-auto flex items-center">
          <div className="shrink-0 bg-forest text-cream px-5 py-3 text-[11px] uppercase tracking-widest font-semibold flex items-center gap-2">
            <span className="w-2 h-2 bg-honey rounded-full animate-pulse" />
            En cours
          </div>
          <div className="flex-1 overflow-hidden no-scrollbar">
            <div className="animate-marquee flex gap-12 whitespace-nowrap py-3 text-[13px] text-coffee" style={{ width: 'max-content' }}>
              {[0, 1].map((k) => (
                <div key={k} className="flex gap-12">
                  {marquee.map((t, i) => (
                    <span key={`${k}-${i}`} className="flex items-center gap-12">
                      <span>{t}</span>
                      <span className="text-honey text-lg">✦</span>
                    </span>
                  ))}
                </div>
              ))}
            </div>
          </div>
        </div>
      </div>
    </section>
  )
}

// ─────────────────────────────────────────────────────────────────────────────
// KEY FIGURES
// ─────────────────────────────────────────────────────────────────────────────
function KeyFigures({ stats }: { stats: Stat[] }) {
  const STATS = stats
  return (
    <section className="py-16 sm:py-32 relative">
      <div className="max-w-page mx-auto px-6">
        <div className="grid grid-cols-12 gap-10 mb-16">
          <div className="col-span-12 lg:col-span-7">
            <Eyebrow color="terracotta">L&apos;ONG en chiffres</Eyebrow>
            <h2 className="mt-5 font-serif fluid-h2 leading-[1.02] text-ink tracking-tight">
              Sept années d&apos;<em className="italic text-terracotta">engagement</em> auprès de l&apos;Atacora.
            </h2>
          </div>
          <div className="col-span-12 lg:col-span-5 lg:pt-12">
            <p className="text-coffee text-[16px] leading-[1.7]">
              Des chiffres consolidés à partir des rapports validés par notre
              Bureau Exécutif et notre Commission de Contrôle. Mise à jour mensuelle.
            </p>
          </div>
        </div>

        <div className="grid grid-cols-2 lg:grid-cols-4 gap-6">
          {STATS.map((s, i) => {
            const accents = ['bg-forest text-cream', 'bg-sand text-ink', 'bg-terracotta text-cream', 'bg-honey text-ink']
            const labelTone = ['text-honey', 'text-terracotta', 'text-honey', 'text-forest']
            return (
              <div key={s.label} className={`${accents[i]} rounded-3xl p-7 sm:p-8 relative overflow-hidden card-hover`}>
                <div className={`text-[11px] uppercase tracking-widest font-semibold ${labelTone[i]}`}>
                  N°{String(i + 1).padStart(2, '0')}
                </div>
                <div className="font-serif text-5xl sm:text-6xl leading-none mt-4">
                  <Counter to={s.value} suffix={s.suffix} />
                </div>
                <div className="text-[14px] font-semibold mt-6">{s.label}</div>
                <div className="text-[12px] opacity-70 mt-1">{s.note}</div>
                <div className="absolute -bottom-12 -right-12 w-36 h-36 rounded-full border border-current opacity-20" />
              </div>
            )
          })}
        </div>
      </div>
    </section>
  )
}

// ─────────────────────────────────────────────────────────────────────────────
// MISSION + VALEURS
// ─────────────────────────────────────────────────────────────────────────────
function MissionValues() {
  return (
    <section className="py-16 sm:py-32 bg-paper relative overflow-hidden">
      <svg aria-hidden="true" className="absolute -top-20 right-0 w-72 h-72 text-honey/40" viewBox="0 0 200 200" fill="none">
        <circle cx="100" cy="100" r="90" stroke="currentColor" strokeWidth="2" strokeDasharray="4 8" />
        <circle cx="100" cy="100" r="60" stroke="currentColor" strokeWidth="2" />
      </svg>

      <div className="max-w-page mx-auto px-6 grid grid-cols-12 gap-12 relative">
        <div className="col-span-12 lg:col-span-6">
          <Eyebrow color="forest">Notre mission</Eyebrow>
          <h2 className="mt-5 font-serif fluid-h2 leading-[1.05] text-ink tracking-tight">
            Marcher aux côtés des <em className="italic">femmes</em>,<br />
            former les <em className="italic text-terracotta">enfants</em>,<br />
            faire grandir les <em className="italic">communautés</em>.
          </h2>

          <div className="mt-8 grid grid-cols-12 gap-6 items-start">
            <div className="col-span-2">
              <div className="w-1 h-full bg-honey rounded-full min-h-[80px]" />
            </div>
            <p className="col-span-10 text-coffee text-[17px] leading-[1.75]">
              Contribuer au développement des communautés rurales de l&apos;Atacora
              et à la réduction de la pauvreté. Nos programmes se concentrent
              sur l&apos;éducation des enfants vulnérables et l&apos;autonomisation des
              femmes, en accord avec les ODD 4 et ODD 5.
            </p>
          </div>

          <div className="mt-10 flex flex-wrap gap-3">
            <PillButton href="/a-propos" variant="secondary">Lire nos statuts</PillButton>
            <PillButton href="/gouvernance" variant="ghost">Notre gouvernance</PillButton>
          </div>
        </div>

        <div className="col-span-12 lg:col-span-6 lg:pl-8">
          <Eyebrow color="terracotta">Nos cinq valeurs · Article 6</Eyebrow>
          <ul className="mt-6 space-y-4">
            {VALUES.map((v, i) => (
              <li key={v.title} className="group bg-cream rounded-2xl p-5 ring-1 ring-ink/5 flex items-start gap-5 card-hover cursor-default">
                <div className="w-12 h-12 rounded-full grid place-items-center shrink-0 bg-honey/20 text-terracotta text-xl font-serif">
                  {v.emoji}
                </div>
                <div className="flex-1">
                  <div className="flex items-baseline gap-3 flex-wrap">
                    <div className="font-serif text-xl text-ink">{v.title}</div>
                    <div className="text-[10px] uppercase tracking-widest text-muted">— {String(i + 1).padStart(2, '0')} / 05</div>
                  </div>
                  <p className="text-[14px] text-coffee/90 mt-1 leading-relaxed">{v.body}</p>
                </div>
              </li>
            ))}
          </ul>
        </div>
      </div>
    </section>
  )
}

// ─────────────────────────────────────────────────────────────────────────────
// NEWS (live or fallback)
// ─────────────────────────────────────────────────────────────────────────────

type NewsItem = {
  _id: string
  tag: string
  tone: 'forest' | 'terracotta' | 'honey'
  title: string
  date: string
  excerpt: string
  image: string
  minutes: number
  slug: string
}

function NewsCard({ item }: { item: NewsItem }) {
  const tone = toneClasses(item.tone)
  return (
    <article className="group card-hover bg-cream rounded-3xl overflow-hidden ring-1 ring-ink/5 flex flex-col">
      <div className="relative aspect-[5/4] overflow-hidden">
        <Image src={item.image} alt={item.title} fill className="object-cover transition-transform duration-700 group-hover:scale-105" sizes="(max-width:768px) 100vw, 33vw" />
        <div className={`absolute top-4 left-4 ${tone.bg} ${tone.text} text-[10px] uppercase tracking-widest font-semibold px-3 py-1.5 rounded-full`}>
          {item.tag}
        </div>
        <div className="absolute bottom-4 right-4 bg-cream/95 backdrop-blur text-ink text-[11px] px-3 py-1.5 rounded-full">
          {item.minutes} min de lecture
        </div>
      </div>
      <div className="p-7 flex-1 flex flex-col">
        <div className="text-[12px] uppercase tracking-widest text-muted">{item.date}</div>
        <h3 className="mt-3 font-serif text-[22px] leading-[1.2] text-ink">{item.title}</h3>
        <p className="mt-3 text-[14px] text-coffee/90 leading-relaxed line-clamp-3">{item.excerpt}</p>
        <div className="mt-6 pt-5 border-t border-ink/8 flex items-center justify-between">
          <Link href={`/actualites/${item.slug}`} className="text-[13px] font-semibold text-forest group-hover:text-mossdk">Lire l&apos;article</Link>
          <span className="w-9 h-9 rounded-full bg-forest text-cream grid place-items-center group-hover:bg-mossdk transition-colors">
            <ArrowIcon />
          </span>
        </div>
      </div>
    </article>
  )
}

function News({ items }: { items: NewsItem[] }) {
  return (
    <section id="actualites" className="py-16 sm:py-32">
      <div className="max-w-page mx-auto px-6">
        <div className="flex items-end justify-between gap-8 flex-wrap mb-14">
          <div className="max-w-2xl">
            <Eyebrow color="forest">Nos actualités</Eyebrow>
            <h2 className="mt-5 font-serif fluid-h2 leading-[1.05] text-ink tracking-tight">
              Les histoires <em className="italic text-terracotta">qui nous animent.</em>
            </h2>
          </div>
          <Link href="/actualites" className="group inline-flex items-center gap-3 text-[14px] font-semibold text-ink hover:text-forest transition-colors">
            <span className="border-b border-ink/30 group-hover:border-forest pb-0.5">Toutes les actualités</span>
            <span className="w-10 h-10 rounded-full bg-ink text-cream grid place-items-center group-hover:bg-forest transition-colors">
              <ArrowIcon />
            </span>
          </Link>
        </div>

        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-7">
          {items.map((n) => <NewsCard key={n._id} item={n} />)}
        </div>
      </div>
    </section>
  )
}

// ─────────────────────────────────────────────────────────────────────────────
// EVENTS
// ─────────────────────────────────────────────────────────────────────────────

type EvItem = {
  _id: string
  day: string
  month: string
  year: string
  title: string
  place: string
  time: string
  type: string
  image: string
  featured: boolean
  slug: string
}

function Events({ items }: { items: EvItem[] }) {
  const featured = items.find(e => e.featured) ?? items[0]
  const rest     = items.filter(e => e._id !== featured?._id).slice(0, 2)

  return (
    <section id="evenements" className="py-16 sm:py-32 bg-forest text-cream relative overflow-hidden">
      <svg aria-hidden="true" className="absolute top-10 right-10 w-64 h-64 text-honey/30" viewBox="0 0 200 200" fill="none">
        <circle cx="100" cy="100" r="90" stroke="currentColor" strokeWidth="2" />
        <circle cx="100" cy="100" r="60" stroke="currentColor" strokeWidth="2" strokeDasharray="3 6" />
        <circle cx="100" cy="100" r="30" stroke="currentColor" strokeWidth="2" />
      </svg>

      <div className="max-w-page mx-auto px-6 relative">
        <div className="flex items-end justify-between gap-8 flex-wrap mb-14">
          <div className="max-w-2xl">
            <Eyebrow color="cream">Agenda · prochains rendez-vous</Eyebrow>
            <h2 className="mt-5 font-serif fluid-h2 leading-[1.05] tracking-tight">
              Venez nous <em className="italic text-honey">rencontrer.</em>
            </h2>
          </div>
          <Link href="/evenements" className="group inline-flex items-center gap-3 text-[14px] font-semibold text-cream">
            <span className="border-b border-cream/40 group-hover:border-honey pb-0.5">Calendrier complet</span>
            <span className="w-10 h-10 rounded-full bg-honey text-ink grid place-items-center group-hover:scale-110 transition-transform">
              <ArrowIcon />
            </span>
          </Link>
        </div>

        <div className="grid grid-cols-12 gap-7">
          {featured && (
            <article className="col-span-12 lg:col-span-7 bg-mossdk rounded-3xl overflow-hidden ring-1 ring-cream/10 relative">
              <div className="grid grid-cols-12 h-full">
                <div className="col-span-12 md:col-span-6 relative min-h-[260px]">
                  <Image src={featured.image} alt={featured.title} fill className="object-cover absolute inset-0" sizes="(max-width:768px) 100vw, 35vw" />
                  <div className="absolute inset-0 bg-gradient-to-tr from-mossdk/70 via-mossdk/20 to-transparent" />
                  <div className="absolute top-5 left-5 bg-honey text-ink text-[10px] uppercase tracking-widest font-bold px-3 py-1.5 rounded-full">
                    À la une
                  </div>
                </div>
                <div className="col-span-12 md:col-span-6 p-8 flex flex-col">
                  <div className="flex items-center gap-3">
                    <div className="w-16 h-16 bg-honey text-ink rounded-2xl grid place-items-center font-serif leading-none">
                      <div className="text-center">
                        <div className="text-2xl tabular">{featured.day}</div>
                        <div className="text-[10px] uppercase tracking-widest font-sans font-semibold mt-0.5">{featured.month}</div>
                      </div>
                    </div>
                    <div>
                      <div className="text-[11px] uppercase tracking-widest text-honey/90">{featured.type}</div>
                      <div className="text-[13px] mt-1">{featured.time}</div>
                    </div>
                  </div>
                  <h3 className="mt-6 font-serif text-[28px] leading-[1.15]">{featured.title}</h3>
                  <p className="mt-3 text-[14px] text-cream/80">{featured.place}</p>
                  <div className="mt-auto pt-6">
                    <PillButton variant="honey" href={`/evenements/${featured.slug}`}>Réserver ma place</PillButton>
                  </div>
                </div>
              </div>
            </article>
          )}

          <div className="col-span-12 lg:col-span-5 flex flex-col gap-7">
            {rest.map((e) => (
              <article key={e._id} className="bg-cream/[0.06] backdrop-blur rounded-3xl p-6 ring-1 ring-cream/10 flex items-start gap-5 card-hover">
                <div className="w-20 h-20 rounded-2xl bg-cream text-ink grid place-items-center font-serif shrink-0">
                  <div className="text-center">
                    <div className="text-3xl tabular leading-none">{e.day}</div>
                    <div className="text-[10px] uppercase tracking-widest font-sans font-semibold mt-1.5">{e.month}</div>
                  </div>
                </div>
                <div className="flex-1">
                  <div className="flex items-center gap-2 flex-wrap">
                    <span className="text-[10px] uppercase tracking-widest text-honey font-semibold">{e.type}</span>
                    <span className="text-cream/40">·</span>
                    <span className="text-[11px] text-cream/70">{e.time}</span>
                  </div>
                  <Link href={`/evenements/${e.slug}`} className="block mt-2 font-serif text-[20px] leading-[1.2] hover:text-honey transition-colors">{e.title}</Link>
                  <p className="mt-2 text-[13px] text-cream/70">{e.place}</p>
                </div>
              </article>
            ))}
          </div>
        </div>
      </div>
    </section>
  )
}

// ─────────────────────────────────────────────────────────────────────────────
// JOIN CTA
// ─────────────────────────────────────────────────────────────────────────────
function JoinCTA() {
  return (
    <section id="adherer" className="py-16 sm:py-32">
      <div className="max-w-page mx-auto px-6">
        <div className="relative bg-honey rounded-[40px] overflow-hidden">
          <svg aria-hidden="true" className="absolute -bottom-20 -right-20 w-96 h-96 text-terracotta/30" viewBox="0 0 200 200" fill="none">
            <circle cx="100" cy="100" r="90" stroke="currentColor" strokeWidth="2" />
            <circle cx="100" cy="100" r="60" stroke="currentColor" strokeWidth="2" />
            <circle cx="100" cy="100" r="30" stroke="currentColor" strokeWidth="2" />
          </svg>

          <div className="grid grid-cols-12 gap-0 relative">
            <div className="col-span-12 lg:col-span-7 p-10 sm:p-16">
              <Eyebrow color="terracotta">Rejoindre l&apos;ONG</Eyebrow>
              <h2 className="mt-5 font-serif fluid-h2 leading-[1.02] text-ink tracking-tight">
                Et si vous deveniez membre de la <em className="italic text-terracotta">communauté</em> ?
              </h2>
              <p className="mt-6 text-coffee text-[17px] leading-[1.7] max-w-xl">
                Quatre catégories d&apos;adhésion · droits 5 000 FCFA · cotisation
                2 000 FCFA / mois. Soumettez votre candidature en ligne, le
                Bureau Exécutif vous répond sous 7 jours.
              </p>
              <div className="mt-8 flex flex-wrap gap-3">
                <PillButton href="/adherer" variant="primary">Postuler maintenant</PillButton>
                <PillButton href="/contact" variant="outline">Nous écrire</PillButton>
              </div>
            </div>

            <div className="col-span-12 lg:col-span-5 p-10 sm:p-16 lg:pl-0">
              <div className="bg-cream rounded-3xl p-7 ring-1 ring-ink/8">
                <div className="text-[11px] uppercase tracking-widest text-terracotta font-semibold">Processus en 4 étapes</div>
                <ol className="mt-5 space-y-4">
                  {[
                    'Remplir le formulaire en ligne',
                    "Recevoir l'avis du Bureau Exécutif",
                    'Régler les droits en agence',
                    'Recevoir sa carte de membre',
                  ].map((t, i) => (
                    <li key={t} className="flex items-start gap-4">
                      <span className="w-8 h-8 rounded-full bg-forest text-cream grid place-items-center font-serif text-base shrink-0">
                        {i + 1}
                      </span>
                      <span className="pt-1 text-[15px] text-ink font-medium">{t}</span>
                    </li>
                  ))}
                </ol>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  )
}

// ─────────────────────────────────────────────────────────────────────────────
// PAGE
// ─────────────────────────────────────────────────────────────────────────────
export default async function HomePage() {
  // Try to fetch from Sanity; fallback to hardcoded design data if unavailable.
  let news: NewsItem[] = []
  let events: EvItem[] = []
  let settings: any = null

  try { settings = await getSiteSettings() } catch {}

  try {
    const articles = await getLatestArticles(3)
    if (articles && articles.length > 0) {
      news = articles.map((a: any) => ({
        _id: a._id,
        tag: a.categorie || 'Actualité',
        tone: TONE_BY_CATEGORIE[a.categorie] ?? 'forest',
        title: a.titre,
        date: fmtFrDate(a.datePublication),
        excerpt: a.extrait || '',
        image: a.imageALaUne ? urlFor(a.imageALaUne).width(800).height(640).url() : '/images/photo-1.jpeg',
        minutes: a.tempsLecture || 3,
        slug: a.slug?.current ?? '',
      }))
    }
  } catch {}
  try {
    const evts = await getUpcomingEvenements(3)
    if (evts && evts.length > 0) {
      events = evts.map((e: any, i: number) => ({
        _id: e._id,
        day: dayOf(e.dateDebut),
        month: monthOf(e.dateDebut),
        year: yearOf(e.dateDebut),
        title: e.titre,
        place: e.lieu || '',
        time: timeOf(e.dateDebut),
        type: e.type || 'Événement',
        image: e.image ? urlFor(e.image).width(800).height(800).url() : '/images/photo-5.jpeg',
        featured: e.featured ?? i === 0,
        slug: e.slug?.current ?? '',
      }))
    }
  } catch {}
  if (news.length === 0)   news   = FALLBACK_NEWS as NewsItem[]
  if (events.length === 0) events = FALLBACK_EVENTS as EvItem[]

  // ── Réglages éditables (siteSettings) avec fallback ──────────────────────
  const heroImage = settings?.homeHero?.image
    ? urlFor(settings.homeHero.image).width(900).height(1200).url()
    : '/images/photo-5.jpeg'
  const heroCaption = settings?.homeHero?.imageCaption || 'Assemblée Générale 2025'
  const heroQuote   = settings?.homeHero?.quote || '« Notre force, c’est notre communauté. »'
  const stats: Stat[] = (settings?.homeStats && settings.homeStats.length > 0)
    ? settings.homeStats
    : STATS_FALLBACK
  const marquee: string[] = (settings?.homeMarquee && settings.homeMarquee.length > 0)
    ? settings.homeMarquee
    : MARQUEE_FALLBACK

  return (
    <>
      <Hero image={heroImage} imageCaption={heroCaption} quote={heroQuote} marquee={marquee} />
      <KeyFigures stats={stats} />
      <MissionValues />
      <News items={news} />
      <Events items={events} />
      <JoinCTA />
    </>
  )
}
