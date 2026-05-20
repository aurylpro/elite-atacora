import type { Metadata } from 'next'
import Link from 'next/link'
import Image from 'next/image'
import { notFound } from 'next/navigation'
import { Eyebrow } from '@/components/ui/Eyebrow'
import { PillButton } from '@/components/ui/PillButton'
import { getEvenementBySlug, getEvenements } from '@/lib/queries'
import { urlFor } from '@/lib/sanity'

export const dynamic = 'force-dynamic'

type EvData = {
  titre: string
  type: string
  date: string         // ISO
  time: string
  place: string
  placeShort: string
  image: string
  description: string
  agenda?: { time: string; item: string }[]
}

const FALLBACK_BY_SLUG: Record<string, EvData> = {
  'ag-ordinaire-2026': {
    titre: 'Assemblée Générale Ordinaire 2026',
    type: 'Statutaire',
    date: '2026-06-28T09:00:00',
    time: '09h00 → 13h00',
    place: 'Salle communale, Quartier Dassagaté — Natitingou, Atacora',
    placeShort: 'Natitingou',
    image: '/images/photo-5.jpeg',
    description: "L'Assemblée Générale Ordinaire 2026 réunira l'ensemble des membres adhérents et actifs d'Elite Atacora pour examiner les rapports moral et financier de l'exercice écoulé, et valider les orientations stratégiques de l'année à venir.",
    agenda: [
      { time: '08h30', item: 'Accueil des membres et émargement' },
      { time: '09h00', item: 'Ouverture officielle par la Présidente' },
      { time: '09h15', item: 'Rapport moral 2025-2026' },
      { time: '10h00', item: 'Rapport financier 2025 — Vérificateur des Comptes' },
      { time: '11h00', item: 'Pause-café et photo de famille' },
      { time: '11h30', item: "Présentation du plan d'action 2026-2027" },
      { time: '12h15', item: 'Vote des résolutions' },
      { time: '12h45', item: 'Clôture et cocktail' },
    ],
  },
}

const MONTH_FR = ['Janvier','Février','Mars','Avril','Mai','Juin','Juillet','Août','Septembre','Octobre','Novembre','Décembre']

export async function generateStaticParams() {
  try {
    const evs = await getEvenements()
    if (evs && evs.length > 0) return evs.map((e: any) => ({ slug: e.slug.current }))
  } catch {}
  return Object.keys(FALLBACK_BY_SLUG).map((slug) => ({ slug }))
}

export async function generateMetadata({ params }: { params: { slug: string } }): Promise<Metadata> {
  try {
    const e = await getEvenementBySlug(params.slug)
    if (e) return { title: e.titre, description: e.description || '' }
  } catch {}
  const fb = FALLBACK_BY_SLUG[params.slug]
  return fb ? { title: fb.titre, description: fb.description } : { title: 'Événement' }
}

export default async function EvenementPage({ params }: { params: { slug: string } }) {
  let live: any = null
  try { live = await getEvenementBySlug(params.slug) } catch {}
  const fb = FALLBACK_BY_SLUG[params.slug]
  if (!live && !fb) notFound()

  const d = new Date(live?.dateDebut ?? fb.date)
  const titre  = live?.titre ?? fb.titre
  const place  = live?.lieu  ?? fb.place
  const desc   = live?.description ?? fb.description
  const image  = live?.image ? urlFor(live.image).width(1000).height(1250).url() : fb.image
  const type   = fb?.type ?? 'Événement'
  const time   = fb?.time ?? d.toLocaleTimeString('fr-FR', { hour: '2-digit', minute: '2-digit' })

  const day = d.getDate().toString().padStart(2, '0')
  const monthShort = d.toLocaleDateString('fr-FR', { month: 'short' })
  const year = d.getFullYear().toString()
  const dateLong = `${d.toLocaleDateString('fr-FR', { weekday: 'long' })} ${d.getDate()} ${MONTH_FR[d.getMonth()].toLowerCase()} ${d.getFullYear()}`

  const agenda = fb?.agenda

  return (
    <>
      {/* Hero */}
      <section className="relative pt-16 pb-12 overflow-hidden">
        <div aria-hidden="true" className="absolute -top-32 -right-32 w-[420px] h-[420px] rounded-full bg-honey/20 blur-3xl pointer-events-none" />
        <div className="max-w-page mx-auto px-6 relative">
          <nav aria-label="Fil d'Ariane" className="flex items-center gap-2 text-[12px] text-muted mb-10 flex-wrap">
            <Link href="/" className="hover:text-forest">Accueil</Link>
            <span className="text-muted/50">/</span>
            <Link href="/evenements" className="hover:text-forest">Événements</Link>
            <span className="text-muted/50">/</span>
            <span className="text-ink truncate max-w-[300px]">{titre}</span>
          </nav>

          <div className="grid grid-cols-12 gap-10 items-center">
            <div className="col-span-12 lg:col-span-7">
              <div className="flex items-center gap-3 mb-6 flex-wrap">
                <span className="bg-forest text-cream text-[10px] uppercase tracking-widest font-semibold px-3 py-1.5 rounded-full">{type}</span>
                <span className="text-[12px] text-muted uppercase tracking-widest">À la une</span>
              </div>
              <h1 className="font-serif fluid-h1 text-ink">{titre}</h1>
              <div className="mt-8 grid grid-cols-2 sm:grid-cols-3 gap-6 max-w-2xl">
                <div>
                  <div className="text-[10px] uppercase tracking-widest text-muted">Date</div>
                  <div className="mt-2 font-serif text-[18px] text-ink leading-tight">{dateLong}</div>
                </div>
                <div>
                  <div className="text-[10px] uppercase tracking-widest text-muted">Horaire</div>
                  <div className="mt-2 font-serif text-[18px] text-ink leading-tight">{time}</div>
                </div>
                <div>
                  <div className="text-[10px] uppercase tracking-widest text-muted">Lieu</div>
                  <div className="mt-2 font-serif text-[18px] text-ink leading-tight">{fb?.placeShort ?? place.split('—')[0].trim().split(',')[0]}</div>
                </div>
              </div>
              <div className="mt-10 flex flex-wrap gap-3">
                <PillButton href="/contact" variant="primary">Je m&apos;inscris</PillButton>
                <PillButton href="#" variant="outline" arrow={false}>Ajouter au calendrier</PillButton>
              </div>
            </div>
            <div className="col-span-12 lg:col-span-5">
              <div className="relative">
                <div className="aspect-[4/5] rounded-[40px] overflow-hidden ring-1 ring-ink/8 shadow-[0_30px_60px_-30px_rgba(30,24,19,0.3)] relative">
                  <Image src={image} alt="" fill className="object-cover" sizes="(max-width:1024px) 100vw, 40vw" priority />
                </div>
                <div className="absolute -top-5 -left-5 bg-honey text-ink rounded-2xl px-5 py-4 ring-1 ring-ink/10 shadow-[0_15px_30px_-15px_rgba(30,24,19,0.3)] -rotate-3">
                  <div className="text-center">
                    <div className="text-[10px] uppercase tracking-widest font-semibold">{monthShort} {year}</div>
                    <div className="font-serif text-5xl leading-none mt-1 tabular">{day}</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      {/* Description + Agenda */}
      <section className="py-16">
        <div className="max-w-page mx-auto px-6 grid grid-cols-12 gap-10">
          <div className="col-span-12 lg:col-span-7">
            <Eyebrow color="forest">À propos de l&apos;événement</Eyebrow>
            <h2 className="mt-5 font-serif fluid-h3 leading-[1.1] text-ink tracking-tight">
              Le rendez-vous statutaire <em className="italic text-terracotta">annuel.</em>
            </h2>
            <div className="mt-8 space-y-5 text-coffee text-[16px] leading-[1.75]">
              <p>{desc}</p>
              <p>Conformément aux statuts, cette assemblée est ouverte aux membres à jour de leur cotisation, ainsi qu&apos;aux partenaires institutionnels invités.</p>
            </div>
            <div className="mt-10 grid grid-cols-2 gap-4">
              <Image src="/images/photo-3.jpeg" alt="" width={600} height={450} className="rounded-2xl aspect-[4/3] object-cover w-full h-auto" />
              <Image src="/images/photo-7.jpeg" alt="" width={600} height={450} className="rounded-2xl aspect-[4/3] object-cover w-full h-auto" />
            </div>
          </div>

          {agenda && (
            <div className="col-span-12 lg:col-span-5">
              <div className="bg-paper rounded-3xl p-8 ring-1 ring-ink/5 lg:sticky lg:top-28">
                <Eyebrow color="terracotta">Programme de la journée</Eyebrow>
                <ol className="mt-6 space-y-3">
                  {agenda.map((a) => (
                    <li key={a.time} className="flex items-start gap-4 pb-3 border-b border-ink/8 last:border-b-0">
                      <div className="font-mono text-[12px] text-terracotta font-semibold w-12 shrink-0 pt-0.5">{a.time}</div>
                      <div className="text-[14px] text-ink leading-snug">{a.item}</div>
                    </li>
                  ))}
                </ol>
              </div>
            </div>
          )}
        </div>
      </section>

      {/* Inscription CTA */}
      <section id="inscription" className="py-16 sm:py-24 bg-paper">
        <div className="max-w-page mx-auto px-6">
          <div className="bg-forest text-cream rounded-[40px] p-10 sm:p-16 grid grid-cols-12 gap-10 items-center">
            <div className="col-span-12 lg:col-span-7">
              <Eyebrow color="cream">Inscription</Eyebrow>
              <h3 className="mt-5 font-serif fluid-h2 leading-[1.05] tracking-tight">
                Réservez votre place pour <em className="italic text-honey">cet événement.</em>
              </h3>
              <p className="mt-5 text-cream/80 max-w-md text-[15px] leading-relaxed">
                L&apos;inscription est obligatoire pour des raisons logistiques. Une
                confirmation vous sera envoyée par email sous 48 heures.
              </p>
            </div>
            <div className="col-span-12 lg:col-span-5">
              <PillButton href="/contact" variant="honey" className="w-full justify-center">S&apos;inscrire à l&apos;événement</PillButton>
            </div>
          </div>
        </div>
      </section>
    </>
  )
}
