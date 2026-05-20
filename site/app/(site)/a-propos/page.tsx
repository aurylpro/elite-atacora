import type { Metadata } from 'next'
import { Eyebrow } from '@/components/ui/Eyebrow'
import { PillButton } from '@/components/ui/PillButton'
import { PageHero } from '@/components/ui/PageHero'
import { getSiteSettings } from '@/lib/queries'
import { urlFor } from '@/lib/sanity'

export const metadata: Metadata = {
  title: 'À propos',
  description: "L'ONG Elite Atacora : mission, vision, valeurs, histoire et six objectifs opérationnels.",
}
export const dynamic = 'force-dynamic'

const OBJECTIFS = [
  { n: '01', title: 'Promouvoir le statut de la femme rurale',     body: "Renforcer le statut socio-économique des femmes rurales du département de l'Atacora à travers la formation, l'alphabétisation et l'accès aux moyens de production." },
  { n: '02', title: 'Scolariser orphelins et enfants vulnérables', body: 'Garantir un accès à l\'éducation de qualité aux enfants vulnérables, prendre en charge frais de scolarité, fournitures et soutien psycho-social.' },
  { n: '03', title: 'Inclusion financière des femmes',             body: 'Faciliter l\'accès des filles et femmes rurales aux services financiers — épargne, micro-crédit, formation entrepreneuriale, AGR.' },
  { n: '04', title: 'Lutter contre les VBG',                       body: 'Prévenir et combattre les violences basées sur le genre par la sensibilisation communautaire, l\'accompagnement des victimes et le plaidoyer.' },
  { n: '05', title: 'Résilience climatique',                       body: 'Renforcer la capacité des communautés rurales à anticiper et s\'adapter aux effets du changement climatique : agriculture durable, gestion de l\'eau, reboisement.' },
  { n: '06', title: 'Œuvres sociales communautaires',              body: 'Mener des actions de solidarité auprès des populations vulnérables : aides ponctuelles, distributions, accompagnement des familles en difficulté.' },
]

const VALUES = [
  { emoji: '✦', title: 'Excellence',        body: 'Exigence et résultats mesurés sur le terrain.' },
  { emoji: '◈', title: 'Professionnalisme', body: 'Méthode rigoureuse dans chaque programme.' },
  { emoji: '✺', title: 'Transparence',      body: 'Gouvernance ouverte, comptes publics.' },
  { emoji: '❀', title: 'Esprit d\'équipe',  body: 'Décisions collégiales, terrain partagé.' },
  { emoji: '❖', title: 'Intégrité',         body: 'Honnêteté envers chaque partenaire.' },
]

const TIMELINE = [
  { year: '2018', title: 'Fondation à Godomey Togoudo',      body: "Création de l'ONG par un groupe de femmes engagées, le 8 janvier 2018." },
  { year: '2020', title: 'Premiers programmes terrain',       body: "Lancement des activités d'alphabétisation et d'appui aux orphelins dans l'Atacora." },
  { year: '2023', title: 'Reconnaissance institutionnelle',   body: 'Conventions signées avec plusieurs collectivités locales et services déconcentrés.' },
  { year: '2026', title: 'Révision des statuts',              body: 'Statuts révisés et adoptés en AGE le 18 mars 2026, conformément à la loi 2025-19.' },
]

export default async function AProposPage() {
  let heroImage = '/images/photo-7.jpeg'
  try {
    const s = await getSiteSettings()
    if (s?.aboutHero) heroImage = urlFor(s.aboutHero).width(900).height(1125).url()
  } catch {}

  return (
    <>
      <PageHero
        eyebrow="L'ONG · à propos"
        title="Connaître"
        italic="celles et ceux qui font Elite Atacora."
        subtitle="Notre histoire, notre mission, nos valeurs et nos six objectifs opérationnels — tels qu'inscrits dans nos statuts révisés en 2026."
        breadcrumb={[{ label: 'À propos' }]}
        image={heroImage}
      />

      {/* Historique */}
      <section className="py-16 sm:py-24 bg-paper relative overflow-hidden">
        <div className="max-w-page mx-auto px-6 grid grid-cols-12 gap-10">
          <div className="col-span-12 lg:col-span-5">
            <Eyebrow color="forest">Notre histoire</Eyebrow>
            <h2 className="mt-5 font-serif fluid-h2 leading-[1.05] text-ink tracking-tight">
              Sept ans à <em className="italic text-terracotta">marcher</em> avec l&apos;Atacora.
            </h2>
            <p className="mt-6 text-coffee text-[16px] leading-[1.7] max-w-md">
              De Godomey Togoudo à Natitingou, retour sur les étapes qui ont
              façonné l&apos;engagement et la structuration de notre ONG.
            </p>
          </div>
          <div className="col-span-12 lg:col-span-7 relative">
            <div className="absolute left-[11px] top-2 bottom-2 w-px bg-ink/15" />
            <ol className="space-y-10">
              {TIMELINE.map((t) => (
                <li key={t.year} className="relative pl-12">
                  <span className="absolute left-0 top-1 w-6 h-6 rounded-full bg-honey ring-4 ring-paper grid place-items-center">
                    <span className="w-2 h-2 rounded-full bg-ink" />
                  </span>
                  <div className="font-serif text-honey text-[22px] leading-none">{t.year}</div>
                  <div className="mt-2 font-serif text-[24px] text-ink leading-tight">{t.title}</div>
                  <p className="mt-2 text-coffee/90 text-[15px] leading-relaxed max-w-xl">{t.body}</p>
                </li>
              ))}
            </ol>
          </div>
        </div>
      </section>

      {/* Mission + Vision */}
      <section className="py-16 sm:py-24">
        <div className="max-w-page mx-auto px-6 grid grid-cols-12 gap-7">
          <div className="col-span-12 lg:col-span-6 bg-forest text-cream rounded-[36px] p-10 sm:p-14 relative overflow-hidden">
            <Eyebrow color="cream">Notre mission</Eyebrow>
            <h3 className="mt-5 font-serif fluid-h2 leading-[1.05] tracking-tight">
              Contribuer au <em className="italic text-honey">développement</em> des communautés rurales.
            </h3>
            <p className="mt-6 text-cream/85 text-[16px] leading-[1.75] max-w-md">
              Réduire la pauvreté à travers l&apos;éducation des enfants vulnérables
              et l&apos;autonomisation des femmes, en alignement avec les Objectifs
              de Développement Durable n°4 et n°5 des Nations Unies.
            </p>
            <div className="mt-8 text-[11px] uppercase tracking-widest text-honey/80">Article 4 &amp; 5 des statuts</div>
          </div>

          <div className="col-span-12 lg:col-span-6 bg-honey text-ink rounded-[36px] p-10 sm:p-14 relative overflow-hidden">
            <Eyebrow color="terracotta">Notre vision</Eyebrow>
            <h3 className="mt-5 font-serif fluid-h2 leading-[1.05] tracking-tight">
              Une Atacora où chaque <em className="italic text-terracotta">femme</em> et chaque <em className="italic text-terracotta">enfant</em> peuvent grandir, apprendre et choisir.
            </h3>
            <p className="mt-6 text-coffee text-[16px] leading-[1.75] max-w-md">
              Bâtir des communautés résilientes, équitables et autonomes, où
              personne n&apos;est laissé pour compte et où chaque vie compte.
            </p>
          </div>
        </div>
      </section>

      {/* Objectifs */}
      <section className="py-16 sm:py-24 bg-cream relative">
        <div className="max-w-page mx-auto px-6">
          <div className="flex items-end justify-between gap-8 flex-wrap mb-12">
            <div className="max-w-2xl">
              <Eyebrow color="forest">Article 5 des statuts</Eyebrow>
              <h2 className="mt-5 font-serif fluid-h2 leading-[1.05] text-ink tracking-tight">
                Six objectifs <em className="italic text-terracotta">opérationnels.</em>
              </h2>
            </div>
          </div>
          <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            {OBJECTIFS.map((o) => (
              <article key={o.n} className="bg-paper rounded-3xl p-7 card-hover ring-1 ring-ink/5">
                <div className="flex items-baseline gap-3">
                  <div className="font-serif text-5xl text-honey leading-none">{o.n}</div>
                  <div className="text-[10px] uppercase tracking-widest text-muted">/ 06</div>
                </div>
                <h3 className="mt-5 font-serif text-[22px] text-ink leading-[1.2]">{o.title}</h3>
                <p className="mt-3 text-[14px] text-coffee/90 leading-relaxed">{o.body}</p>
              </article>
            ))}
          </div>
        </div>
      </section>

      {/* Valeurs */}
      <section className="py-16 sm:py-24 bg-paper relative overflow-hidden">
        <svg aria-hidden="true" className="absolute top-10 right-0 w-60 h-60 text-honey/30 pointer-events-none" viewBox="0 0 200 200" fill="none">
          <circle cx="100" cy="100" r="90" stroke="currentColor" strokeWidth="2" strokeDasharray="4 8" />
        </svg>
        <div className="max-w-page mx-auto px-6 relative">
          <div className="max-w-2xl mb-12">
            <Eyebrow color="terracotta">Nos cinq valeurs · Article 6</Eyebrow>
            <h2 className="mt-5 font-serif fluid-h2 leading-[1.05] text-ink tracking-tight">
              La <em className="italic text-terracotta">boussole</em> de chacune de nos actions.
            </h2>
          </div>
          <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-5">
            {VALUES.map((v, i) => (
              <article key={v.title} className="bg-cream rounded-3xl p-6 ring-1 ring-ink/5 card-hover">
                <div className="w-12 h-12 rounded-full grid place-items-center bg-honey/20 text-terracotta text-xl font-serif">{v.emoji}</div>
                <div className="mt-5 text-[10px] uppercase tracking-widest text-muted">{String(i + 1).padStart(2, '0')} / 05</div>
                <h3 className="mt-1 font-serif text-[22px] text-ink leading-tight">{v.title}</h3>
                <p className="mt-3 text-[13.5px] text-coffee/90 leading-relaxed">{v.body}</p>
              </article>
            ))}
          </div>
        </div>
      </section>

      {/* CTA */}
      <section className="py-16 sm:py-24">
        <div className="max-w-page mx-auto px-6">
          <div className="bg-ink text-cream rounded-[40px] p-10 sm:p-16 grid grid-cols-12 gap-10 items-center relative overflow-hidden">
            <div className="col-span-12 lg:col-span-8">
              <Eyebrow color="cream">Vous voulez aller plus loin ?</Eyebrow>
              <h3 className="mt-5 font-serif fluid-h2 leading-[1.05] tracking-tight">
                Rejoignez notre <em className="italic text-honey">communauté</em> ou découvrez notre gouvernance.
              </h3>
            </div>
            <div className="col-span-12 lg:col-span-4 flex flex-wrap gap-3 lg:justify-end">
              <PillButton href="/adherer" variant="onDark">Adhérer</PillButton>
              <PillButton href="/gouvernance" variant="primary">Voir l&apos;équipe</PillButton>
            </div>
          </div>
        </div>
      </section>
    </>
  )
}
