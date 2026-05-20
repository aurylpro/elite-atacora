import type { Metadata } from 'next'
import { Eyebrow } from '@/components/ui/Eyebrow'
import { PageHero } from '@/components/ui/PageHero'
import { NewsFilterGrid, type NewsItem } from '@/components/ui/NewsFilterGrid'
import { getArticles } from '@/lib/queries'
import { urlFor } from '@/lib/sanity'

export const metadata: Metadata = {
  title: 'Actualités',
  description: "Programmes, conventions, témoignages, terrain, presse — toutes les publications de l'ONG.",
}
export const dynamic = 'force-dynamic'

const FALLBACK: NewsItem[] = [
  { _id: '1', slug: 'alphabetisation-tanguieta',   tag: 'Programme',   tone: 'forest',     title: 'Alphabétisation fonctionnelle des femmes rurales de Tanguiéta',     date: '12 mai 2026',     excerpt: 'Premier déploiement du dispositif AFR-1 dans quatre villages, en partenariat avec la mairie.', image: '/images/photo-5.jpeg', minutes: 4 },
  { _id: '2', slug: 'convention-ddaep',            tag: 'Partenariat', tone: 'terracotta', title: "Convention signée avec la Direction Départementale de l'Atacora",   date: '28 avril 2026',   excerpt: "Cadre formel pour nos interventions en milieu scolaire sur l'égalité et la prévention.",       image: '/images/photo-7.jpeg', minutes: 3 },
  { _id: '3', slug: 'kits-maraichers-boukombe',    tag: 'Terrain',     tone: 'honey',      title: '120 productrices de Boukombé reçoivent leurs kits maraîchers',       date: '9 avril 2026',    excerpt: 'Arrosoirs, semences et fertilisant biologique pour la campagne pré-pluviale 2026.',           image: '/images/photo-2.jpeg', minutes: 2 },
  { _id: '4', slug: 'temoignage-hadjara',          tag: 'Témoignage',  tone: 'terracotta', title: '« Avant Elite Atacora, je ne savais pas écrire mon nom »',           date: '22 mars 2026',    excerpt: 'Portrait de Hadjara, 34 ans, première promotion AFR-1 à Cobly.',                                 image: '/images/photo-3.jpeg', minutes: 5 },
  { _id: '5', slug: 'rapport-2025',                tag: 'Rapport',     tone: 'forest',     title: "Rapport d'activité 2025 disponible en téléchargement",               date: '15 mars 2026',    excerpt: '62 pages, données consolidées, audit interne du Conseil de Surveillance.',                       image: '/images/photo-6.jpeg', minutes: 6 },
  { _id: '6', slug: 'reboisement-2026',            tag: 'Programme',   tone: 'forest',     title: 'Lancement de la campagne de reboisement Atacora 2026',                date: '1er mars 2026',   excerpt: 'Objectif : 8 000 plants sur 6 communes avec les comités villageois.',                            image: '/images/photo-8.jpeg', minutes: 3 },
  { _id: '7', slug: 'presse-la-nation',            tag: 'Presse',      tone: 'honey',      title: "Elite Atacora dans La Nation : « L'ONG qui forme les femmes »",     date: '18 février 2026', excerpt: 'Reportage de deux pages publié dans le quotidien national.',                                    image: '/images/photo-9.jpeg', minutes: 2 },
  { _id: '8', slug: 'kits-scolaires-cobly',        tag: 'Terrain',     tone: 'honey',      title: 'Cobly : 40 jeunes filles bénéficient de kits scolaires',             date: '5 février 2026',  excerpt: 'Distribution effectuée au CEG-1 de Cobly en présence des autorités locales.',                     image: '/images/photo-4.jpeg', minutes: 2 },
  { _id: '9', slug: 'accord-cadre-parakou',        tag: 'Partenariat', tone: 'terracotta', title: "Accord-cadre avec l'Université de Parakou",                          date: '20 janvier 2026', excerpt: 'Stages, recherche-action, formation continue : nouvelles synergies académiques.',                image: '/images/photo-5.jpeg', minutes: 3 },
]

const TAG_BY_CATEGORIE: Record<string, NewsItem['tag']> = {
  actualites: 'Programme',
  temoignages: 'Témoignage',
  rapports: 'Rapport',
  presse: 'Presse',
}
const TONE_BY_CATEGORIE: Record<string, NewsItem['tone']> = {
  actualites: 'forest',
  temoignages: 'terracotta',
  rapports: 'forest',
  presse: 'honey',
}

function fmtFr(d: string) {
  if (!d) return ''
  return new Date(d).toLocaleDateString('fr-FR', { day: 'numeric', month: 'long', year: 'numeric' })
}

export default async function ActualitesPage() {
  let items: NewsItem[] = []
  try {
    const arts = await getArticles(50)
    if (arts && arts.length > 0) {
      items = arts.map((a: any) => ({
        _id: a._id,
        slug: a.slug?.current ?? '',
        tag: TAG_BY_CATEGORIE[a.categorie] ?? 'Programme',
        tone: TONE_BY_CATEGORIE[a.categorie] ?? 'forest',
        title: a.titre,
        date: fmtFr(a.datePublication),
        excerpt: a.extrait || '',
        image: a.imageALaUne ? urlFor(a.imageALaUne).width(800).height(600).url() : '/images/photo-1.jpeg',
        minutes: 3,
      }))
    }
  } catch {}
  if (items.length === 0) items = FALLBACK

  return (
    <>
      <PageHero
        eyebrow="Actualités · le journal de l'ONG"
        title="Toutes nos"
        italic="histoires, projets et rapports."
        subtitle="Programmes, conventions, témoignages, terrain, presse — retrouvez ici l'ensemble de nos publications mises à jour chaque semaine."
        breadcrumb={[{ label: 'Actualités' }]}
      />

      <NewsFilterGrid items={items} />

      {/* CTA */}
      <section className="py-16 sm:py-24 bg-paper">
        <div className="max-w-page mx-auto px-6">
          <div className="bg-honey text-ink rounded-[40px] p-10 sm:p-16 grid grid-cols-12 gap-10 items-center">
            <div className="col-span-12 lg:col-span-8">
              <Eyebrow color="terracotta">Ne ratez aucune actualité</Eyebrow>
              <h3 className="mt-5 font-serif fluid-h2 leading-[1.05] tracking-tight">
                Recevez nos articles par <em className="italic text-terracotta">email.</em>
              </h3>
            </div>
            <div className="col-span-12 lg:col-span-4">
              <form action="mailto:contact@eliteatacora.org" method="post" encType="text/plain" className="flex flex-col sm:flex-row gap-3">
                <input type="email" name="email" placeholder="votre@email.com" aria-label="Email" required
                  className="flex-1 bg-cream rounded-full px-5 py-3.5 text-ink placeholder:text-muted ring-1 ring-ink/10 focus:outline-none focus:ring-forest" />
                <button type="submit" className="px-6 py-3.5 rounded-full bg-ink text-cream font-semibold whitespace-nowrap">S&apos;abonner →</button>
              </form>
            </div>
          </div>
        </div>
      </section>
    </>
  )
}
