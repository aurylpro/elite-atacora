import type { Metadata } from 'next'
import { Eyebrow } from '@/components/ui/Eyebrow'
import { PillButton } from '@/components/ui/PillButton'
import { PageHero } from '@/components/ui/PageHero'
import { Gallery } from '@/components/ui/Gallery'
import { getSiteSettings } from '@/lib/queries'
import { urlFor } from '@/lib/sanity'

export const metadata: Metadata = {
  title: 'Nos actions',
  description: "Six domaines d'engagement et six communes d'intervention dans l'Atacora.",
}
export const dynamic = 'force-dynamic'

const DOMAINES = [
  { n: '01', title: 'Autonomisation des femmes rurales',           body: 'Alphabétisation fonctionnelle, formation aux AGR, accès au crédit, accompagnement entrepreneurial.', tone: 'bg-forest text-cream',     accent: 'text-honey' },
  { n: '02', title: 'Scolarisation des enfants vulnérables',       body: 'Prise en charge des frais, fournitures, cours de remédiation, suivi psycho-social.',                tone: 'bg-terracotta text-cream', accent: 'text-cream/80' },
  { n: '03', title: 'Inclusion financière des filles & femmes',    body: 'Tontines structurées, micro-crédit solidaire, éducation financière, ouverture de comptes.',         tone: 'bg-honey text-ink',        accent: 'text-terracotta' },
  { n: '04', title: 'Lutte contre les VBG',                        body: 'Sensibilisation communautaire, accompagnement juridique et psychologique des survivantes.',         tone: 'bg-ink text-cream',        accent: 'text-honey' },
  { n: '05', title: 'Résilience climatique',                       body: 'Maraîchage durable, gestion de l\'eau, reboisement participatif, agroécologie.',                    tone: 'bg-sand text-ink',         accent: 'text-forest' },
  { n: '06', title: 'Œuvres sociales',                             body: 'Distributions ciblées, aides ponctuelles aux familles, urgences alimentaires et sanitaires.',      tone: 'bg-paper text-ink',        accent: 'text-terracotta' },
]

const PHOTOS = [
  { src: '/images/photo-2.jpeg', caption: 'Distribution de kits maraîchers · Boukombé' },
  { src: '/images/photo-3.jpeg', caption: 'Caravane sensibilisation · Cobly' },
  { src: '/images/photo-4.jpeg', caption: 'Atelier alphabétisation · Tanguiéta' },
  { src: '/images/photo-5.jpeg', caption: 'Réunion du Bureau Exécutif' },
  { src: '/images/photo-6.jpeg', caption: 'Formation AGR · Natitingou' },
  { src: '/images/photo-7.jpeg', caption: 'Convention DDAEP Atacora' },
  { src: '/images/photo-8.jpeg', caption: 'Séminaire ODD · Cotonou' },
  { src: '/images/photo-9.jpeg', caption: 'Cérémonie communautaire' },
]

const ZONES = ['Natitingou', 'Tanguiéta', 'Boukombé', 'Cobly', 'Matéri', 'Toucountouna']

const VIDEOS = [
  { title: 'Séminaire ODD 5 — Cotonou',                       src: '/images/video-1.mp4', poster: '/images/photo-4.jpeg' },
  { title: 'Distribution kits maraîchers — Boukombé',         src: '/images/video-2.mp4', poster: '/images/photo-5.jpeg' },
  { title: 'Atelier alphabétisation — Tanguiéta',             src: '/images/video-3.mp4', poster: '/images/photo-6.jpeg' },
]

export default async function NosActionsPage() {
  let heroImage = '/images/photo-2.jpeg'
  try {
    const s = await getSiteSettings()
    if (s?.actionsHero) heroImage = urlFor(s.actionsHero).width(900).height(1125).url()
  } catch {}

  return (
    <>
      <PageHero
        eyebrow="Nos actions · sur le terrain"
        title="Six domaines,"
        italic="un seul cap : l'Atacora."
        subtitle="Programmes, projets, opérations terrain. Voici comment nous transformons nos engagements en actions concrètes au cœur du département."
        breadcrumb={[{ label: 'Nos actions' }]}
        image={heroImage}
      />

      {/* Domaines */}
      <section className="py-16 sm:py-24 bg-cream">
        <div className="max-w-page mx-auto px-6">
          <div className="max-w-2xl mb-12">
            <Eyebrow color="forest">Six terrains d&apos;engagement</Eyebrow>
            <h2 className="mt-5 font-serif fluid-h2 leading-[1.05] text-ink tracking-tight">
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

      {/* Zones */}
      <section className="py-16 sm:py-24 bg-paper">
        <div className="max-w-page mx-auto px-6 grid grid-cols-12 gap-10 items-center">
          <div className="col-span-12 lg:col-span-5">
            <Eyebrow color="forest">Zones d&apos;intervention</Eyebrow>
            <h2 className="mt-5 font-serif fluid-h2 leading-[1.05] text-ink tracking-tight">
              Six communes, <em className="italic text-terracotta">un département.</em>
            </h2>
            <p className="mt-6 text-coffee text-[16px] leading-[1.7] max-w-md">
              Nos programmes se déploient sur l&apos;ensemble du département de
              l&apos;Atacora, avec un ancrage historique à Natitingou.
            </p>
          </div>
          <div className="col-span-12 lg:col-span-7">
            <div className="grid grid-cols-2 sm:grid-cols-3 gap-3">
              {ZONES.map((z) => (
                <div key={z} className="bg-cream rounded-2xl p-5 ring-1 ring-ink/8 flex items-center gap-3 card-hover">
                  <span className="w-9 h-9 rounded-full bg-honey/30 text-terracotta grid place-items-center">
                    <svg width="14" height="16" viewBox="0 0 12 14" fill="none" aria-hidden="true">
                      <path d="M6 13 Q1 8 1 5 A5 5 0 1 1 11 5 Q11 8 6 13 Z M6 5 A1 1 0 1 1 6 7 A1 1 0 1 1 6 5 Z" stroke="currentColor" strokeWidth="1.5" />
                    </svg>
                  </span>
                  <span className="font-serif text-[17px] text-ink">{z}</span>
                </div>
              ))}
            </div>
          </div>
        </div>
      </section>

      {/* Galerie */}
      <section className="py-16 sm:py-24 bg-cream">
        <div className="max-w-page mx-auto px-6">
          <div className="flex items-end justify-between gap-8 flex-wrap mb-12">
            <div className="max-w-2xl">
              <Eyebrow color="terracotta">Galerie · le terrain en images</Eyebrow>
              <h2 className="mt-5 font-serif fluid-h2 leading-[1.05] text-ink tracking-tight">
                Les <em className="italic text-terracotta">visages</em> derrière les actions.
              </h2>
            </div>
          </div>
          <Gallery photos={PHOTOS} />
        </div>
      </section>

      {/* Vidéos */}
      <section className="py-16 sm:py-24 bg-paper">
        <div className="max-w-page mx-auto px-6">
          <div className="max-w-2xl mb-12">
            <Eyebrow color="forest">Vidéos terrain</Eyebrow>
            <h2 className="mt-5 font-serif fluid-h2 leading-[1.05] text-ink tracking-tight">
              <em className="italic text-terracotta">Voir</em> nos actions.
            </h2>
          </div>
          <div className="grid grid-cols-1 md:grid-cols-3 gap-6">
            {VIDEOS.map((v) => (
              <article key={v.src} className="bg-cream rounded-3xl overflow-hidden ring-1 ring-ink/5 card-hover">
                <div className="aspect-video bg-ink relative">
                  <video
                    src={v.src}
                    poster={v.poster}
                    controls
                    preload="metadata"
                    className="absolute inset-0 w-full h-full object-cover"
                  />
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

      {/* CTA */}
      <section className="py-16 sm:py-24">
        <div className="max-w-page mx-auto px-6">
          <div className="bg-terracotta text-cream rounded-[40px] p-10 sm:p-16 grid grid-cols-12 gap-10 items-center">
            <div className="col-span-12 lg:col-span-8">
              <Eyebrow color="cream">Vous voulez agir ?</Eyebrow>
              <h3 className="mt-5 font-serif fluid-h2 leading-[1.05] tracking-tight">
                Rejoignez-nous sur le <em className="italic text-honey">terrain.</em>
              </h3>
            </div>
            <div className="col-span-12 lg:col-span-4 flex flex-wrap gap-3 lg:justify-end">
              <PillButton href="/adherer" variant="onDark">Devenir bénévole</PillButton>
            </div>
          </div>
        </div>
      </section>
    </>
  )
}
