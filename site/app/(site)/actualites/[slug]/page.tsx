import type { Metadata } from 'next'
import Link from 'next/link'
import Image from 'next/image'
import { notFound } from 'next/navigation'
import { PortableText } from '@portabletext/react'
import { Eyebrow } from '@/components/ui/Eyebrow'
import { PillButton } from '@/components/ui/PillButton'
import { ArrowIcon } from '@/components/ui/ArrowIcon'
import { getArticleBySlug, getArticles } from '@/lib/queries'
import { urlFor } from '@/lib/sanity'

export const dynamic = 'force-dynamic'

// Fallback articles (matching slugs from /actualites fallback list)
const FALLBACK_BY_SLUG: Record<string, any> = {
  'alphabetisation-tanguieta': {
    titre: 'Alphabétisation fonctionnelle des femmes rurales de Tanguiéta',
    categorie: 'Programme',
    extrait: "Premier déploiement du dispositif AFR-1 dans quatre villages de la commune de Tanguiéta, en partenariat avec la mairie et la Direction Départementale des Affaires Sociales.",
    datePublication: '2026-05-12',
    image: '/images/photo-5.jpeg',
    body: [
      "Mardi 12 mai, l'ONG Elite Atacora a officiellement lancé son programme d'Alphabétisation Fonctionnelle Rurale (AFR-1) dans la commune de Tanguiéta. Ce dispositif, financé sur ressources propres et avec l'appui de la mairie, cible 240 femmes réparties dans quatre villages : Tchanhoun-Cossi, Tanongou, Cotiakou et Taïacou.",
      "Le programme combine alphabétisation classique en langue nationale et modules pratiques : gestion d'un petit commerce, lecture d'ordonnance, tenue d'un cahier de comptes. Chaque cohorte de 30 apprenantes est encadrée par deux formatrices recrutées localement, formées en amont par l'équipe AFR-1.",
      "Le premier cycle se déroulera de mai 2026 à janvier 2027, avec une évaluation finale conduite conjointement avec la mairie.",
    ],
    quote: { text: "Nous ne formons pas seulement à lire et écrire. Nous formons à décider, à comprendre un contrat, à dire non quand il le faut.", author: 'SANGA PEMA Tébouwa, Présidente' },
  },
}

export async function generateStaticParams() {
  try {
    const articles = await getArticles(100)
    return articles.map((a: any) => ({ slug: a.slug.current }))
  } catch {
    return Object.keys(FALLBACK_BY_SLUG).map((slug) => ({ slug }))
  }
}

export async function generateMetadata({ params }: { params: { slug: string } }): Promise<Metadata> {
  try {
    const a = await getArticleBySlug(params.slug)
    if (a) return { title: a.titre, description: a.extrait || '' }
  } catch {}
  const fb = FALLBACK_BY_SLUG[params.slug]
  if (fb) return { title: fb.titre, description: fb.extrait }
  return { title: 'Article' }
}

function fmtFr(d: string) {
  if (!d) return ''
  return new Date(d).toLocaleDateString('fr-FR', { day: 'numeric', month: 'long', year: 'numeric' })
}

const ptComponents = {
  block: {
    normal: ({ children }: any) => <p>{children}</p>,
    h2: ({ children }: any) => <h2 className="font-serif text-[32px] text-ink leading-tight mt-12 mb-4">{children}</h2>,
    h3: ({ children }: any) => <h3 className="font-serif text-[24px] text-ink mt-8 mb-3">{children}</h3>,
    blockquote: ({ children }: any) => (
      <blockquote className="not-italic relative my-12 bg-paper rounded-3xl p-8 sm:p-10">
        <div className="text-honey font-serif text-5xl leading-none">&ldquo;</div>
        <p className="mt-2 font-serif text-[24px] text-ink leading-[1.3]">{children}</p>
      </blockquote>
    ),
  },
  types: {
    image: ({ value }: any) => value?.asset ? (
      <div className="my-8 rounded-2xl overflow-hidden">
        <Image src={urlFor(value).width(1200).url()} alt={value.alt || ''} width={1200} height={800} className="w-full h-auto" />
      </div>
    ) : null,
  },
}

export default async function ArticlePage({ params }: { params: { slug: string } }) {
  let article: any = null
  try {
    article = await getArticleBySlug(params.slug)
  } catch {}
  const fb = FALLBACK_BY_SLUG[params.slug]
  if (!article && !fb) notFound()

  const data = article ?? null
  const titre = data?.titre ?? fb.titre
  const date = fmtFr(data?.datePublication ?? fb.datePublication)
  const extrait = data?.extrait ?? fb.extrait
  const heroImg = data?.imageALaUne ? urlFor(data.imageALaUne).width(1400).height(800).url() : fb.image

  return (
    <>
      {/* Breadcrumb + title */}
      <section className="pt-12 pb-6">
        <div className="max-w-page mx-auto px-6">
          <nav aria-label="Fil d'Ariane" className="flex items-center gap-2 text-[12px] text-muted mb-10 flex-wrap">
            <Link href="/" className="hover:text-forest">Accueil</Link>
            <span className="text-muted/50">/</span>
            <Link href="/actualites" className="hover:text-forest">Actualités</Link>
            <span className="text-muted/50">/</span>
            <span className="text-ink truncate max-w-[300px]">{titre.slice(0, 60)}{titre.length > 60 ? '…' : ''}</span>
          </nav>
        </div>
      </section>

      <article className="py-4">
        <div className="max-w-[820px] mx-auto px-6">
          <div className="flex flex-wrap items-center gap-4 mb-8">
            <span className="bg-forest text-cream text-[10px] uppercase tracking-widest font-semibold px-3 py-1.5 rounded-full">
              {data?.categorie ?? fb.categorie}
            </span>
            <span className="text-[13px] text-muted">{date}</span>
          </div>

          <h1 className="font-serif fluid-h2 leading-[1.05] text-ink tracking-tight">{titre}</h1>

          {extrait && (
            <p className="mt-6 text-[19px] leading-[1.6] text-coffee">{extrait}</p>
          )}
        </div>

        {/* Hero image */}
        <div className="max-w-[1180px] mx-auto px-6 mt-12">
          <div className="aspect-[16/9] rounded-[36px] overflow-hidden ring-1 ring-ink/5 relative">
            <Image src={heroImg} alt="" fill className="object-cover" priority sizes="(max-width:1200px) 100vw, 1180px" />
          </div>
        </div>

        {/* Body */}
        <div className="max-w-[760px] mx-auto px-6 mt-16 text-[17px] leading-[1.85] text-coffee space-y-6">
          {data?.contenu ? (
            <PortableText value={data.contenu} components={ptComponents as any} />
          ) : (
            <>
              {fb.body.map((p: string, i: number) => <p key={i}>{p}</p>)}
              {fb.quote && (
                <blockquote className="not-italic relative my-12 bg-paper rounded-3xl p-8 sm:p-10">
                  <div className="text-honey font-serif text-5xl leading-none">&ldquo;</div>
                  <p className="mt-2 font-serif text-[24px] text-ink leading-[1.3]">{fb.quote.text}</p>
                  <footer className="mt-4 text-[13px] text-terracotta font-semibold uppercase tracking-widest">— {fb.quote.author}</footer>
                </blockquote>
              )}
            </>
          )}
        </div>

        {/* CTA bottom */}
        <div className="max-w-[760px] mx-auto px-6 mt-16 flex flex-wrap items-center justify-between gap-6 pt-8 border-t border-ink/10">
          <Link href="/actualites" className="inline-flex items-center gap-2 text-[14px] font-semibold text-forest hover:text-mossdk">
            <ArrowIcon className="rotate-180" /> Toutes les actualités
          </Link>
          <PillButton href="/adherer" variant="primary">Soutenir l&apos;ONG</PillButton>
        </div>
      </article>

      {/* Related (statique) */}
      <section className="py-16 sm:py-24 mt-16 bg-paper">
        <div className="max-w-page mx-auto px-6">
          <div className="flex items-end justify-between gap-8 flex-wrap mb-12">
            <div>
              <Eyebrow color="forest">Sur le même sujet</Eyebrow>
              <h2 className="mt-5 font-serif fluid-h2 leading-[1.05] text-ink tracking-tight">
                À lire <em className="italic text-terracotta">aussi.</em>
              </h2>
            </div>
            <Link href="/actualites" className="text-[14px] font-semibold text-forest hover:text-mossdk inline-flex items-center gap-2">
              Toutes les actualités <ArrowIcon />
            </Link>
          </div>
        </div>
      </section>
    </>
  )
}
