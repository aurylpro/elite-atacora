import type { Metadata } from 'next'
import { Eyebrow } from '@/components/ui/Eyebrow'
import { PageHero } from '@/components/ui/PageHero'
import { EventsListView, type EvItem } from '@/components/ui/EventsListView'
import { getEvenements } from '@/lib/queries'
import { urlFor } from '@/lib/sanity'

export const metadata: Metadata = {
  title: 'Événements',
  description: "Assemblées, ateliers, caravanes, distributions — tous les rendez-vous d'Elite Atacora.",
}
export const dynamic = 'force-dynamic'

const FALLBACK: EvItem[] = [
  { _id: '1', slug: 'ag-ordinaire-2026',         day: '28', month: 'Juin',  year: '2026', monthKey: 6,  title: 'Assemblée Générale Ordinaire 2026',   place: 'Natitingou — Salle communale, Quartier Dassagaté', time: '09h00 → 13h00',     type: 'Statutaire',     image: '/images/photo-5.jpeg', featured: true },
  { _id: '2', slug: 'atelier-odd-tanguieta',     day: '14', month: 'Juil.', year: '2026', monthKey: 7,  title: 'Atelier régional ODD 4 & ODD 5',     place: 'Tanguiéta — Centre socio-culturel',                time: '08h30 → 17h00',     type: 'Atelier',        image: '/images/photo-7.jpeg', featured: false },
  { _id: '3', slug: 'caravane-vbg-aout',          day: '22', month: 'Août',  year: '2026', monthKey: 8,  title: 'Caravane sensibilisation VBG',        place: 'Boukombé · Cobly · Matéri',                        time: 'Toute la journée',  type: 'Sensibilisation', image: '/images/photo-3.jpeg', featured: false },
  { _id: '4', slug: 'afr2-boukombe',              day: '08', month: 'Sept.', year: '2026', monthKey: 9,  title: 'Lancement cohorte AFR-2 Boukombé',    place: 'Boukombé — Mairie',                                time: '10h00 → 12h00',     type: 'Programme',      image: '/images/photo-4.jpeg', featured: false },
  { _id: '5', slug: 'forum-partenariats',         day: '12', month: 'Oct.',  year: '2026', monthKey: 10, title: 'Forum partenariats institutionnels', place: 'Cotonou — Hôtel du Lac',                           time: '09h00 → 16h00',     type: 'Forum',          image: '/images/photo-6.jpeg', featured: false },
  { _id: '6', slug: 'kits-scolaires-2026',        day: '20', month: 'Nov.',  year: '2026', monthKey: 11, title: 'Remise des kits scolaires 2026',     place: 'Cobly — CEG-1',                                    time: '09h00 → 11h00',     type: 'Distribution',   image: '/images/photo-8.jpeg', featured: false },
]

const PAST = [
  { id: 'p1', day: '18', month: 'Mars',  year: 2026, title: 'Assemblée Générale Extraordinaire', place: 'Abomey-Calavi', type: 'Statutaire' },
  { id: 'p2', day: '05', month: 'Févr.', year: 2026, title: 'Convention DDAEP Atacora',          place: 'Natitingou',    type: 'Partenariat' },
  { id: 'p3', day: '20', month: 'Janv.', year: 2026, title: 'Atelier de planification 2026',     place: 'Natitingou',    type: 'Atelier' },
]

const MONTH_LABEL = ['Janv.', 'Févr.', 'Mars', 'Avr.', 'Mai', 'Juin', 'Juil.', 'Août', 'Sept.', 'Oct.', 'Nov.', 'Déc.']

export default async function EvenementsPage() {
  let events: EvItem[] = []
  try {
    const live: any[] = await getEvenements()
    if (live && live.length > 0) {
      const now = new Date()
      events = live
        .filter(e => new Date(e.dateDebut) >= now)
        .map((e, i) => {
          const d = new Date(e.dateDebut)
          return {
            _id: e._id,
            slug: e.slug?.current ?? '',
            day: d.getDate().toString().padStart(2, '0'),
            month: MONTH_LABEL[d.getMonth()],
            year: d.getFullYear().toString(),
            monthKey: d.getMonth() + 1,
            title: e.titre,
            place: e.lieu || '',
            time: d.toLocaleTimeString('fr-FR', { hour: '2-digit', minute: '2-digit' }),
            type: 'Événement',
            image: e.image ? urlFor(e.image).width(900).height(600).url() : '/images/photo-5.jpeg',
            featured: i === 0,
          }
        })
    }
  } catch {}
  if (events.length === 0) events = FALLBACK

  return (
    <>
      <PageHero
        eyebrow="Agenda · prochains rendez-vous"
        title="L'agenda"
        italic="d'Elite Atacora."
        subtitle="Assemblées, ateliers, caravanes, distributions. Retrouvez tous nos événements à venir et passés sur le département."
        breadcrumb={[{ label: 'Événements' }]}
      />

      <EventsListView events={events} />

      {/* Passés */}
      <section className="py-16 sm:py-24 bg-paper">
        <div className="max-w-page mx-auto px-6">
          <div className="max-w-2xl mb-12">
            <Eyebrow color="terracotta">Archives</Eyebrow>
            <h2 className="mt-5 font-serif fluid-h2 leading-[1.05] text-ink tracking-tight">
              Événements <em className="italic text-terracotta">passés.</em>
            </h2>
          </div>
          <div className="bg-cream rounded-3xl ring-1 ring-ink/5 overflow-hidden">
            {PAST.map((e, i, a) => (
              <div key={e.id} className={`grid grid-cols-12 items-center p-5 ${i < a.length - 1 ? 'border-b border-ink/8' : ''}`}>
                <div className="col-span-3 sm:col-span-2 font-serif text-[20px] text-muted tabular">
                  {e.day} {e.month}
                </div>
                <div className="col-span-2 sm:col-span-2 text-[10px] uppercase tracking-widest text-terracotta font-semibold">{e.type}</div>
                <div className="col-span-7 sm:col-span-6 font-serif text-[16px] text-ink">{e.title}</div>
                <div className="hidden sm:block col-span-2 text-[13px] text-coffee/80">{e.place}</div>
              </div>
            ))}
          </div>
        </div>
      </section>
    </>
  )
}
