import type { Metadata } from 'next'
import { Eyebrow } from '@/components/ui/Eyebrow'
import { PillButton } from '@/components/ui/PillButton'
import { PageHero } from '@/components/ui/PageHero'
import { AdhesionForm } from '@/components/ui/AdhesionForm'
import { FaqAccordion } from '@/components/ui/FaqAccordion'

export const metadata: Metadata = {
  title: 'Adhérer',
  description: 'Quatre catégories de membres, un processus clair, une réponse garantie sous 7 jours.',
}

const TYPES = [
  { code: 'Adhérent·e',     badge: 'Le plus courant',        badgeColor: 'bg-forest text-cream',     body: "Membre actif au quotidien : participe aux programmes, à l'AG et aux activités de l'ONG.", droits: '5 000 FCFA', cotisation: '2 000 FCFA / mois', article: 'Article 17' },
  { code: 'Actif',          badge: 'Engagement renforcé',    badgeColor: 'bg-terracotta text-cream', body: 'Membre impliqué dans la gouvernance, éligible aux postes du Bureau Exécutif.',          droits: '5 000 FCFA', cotisation: '2 000 FCFA / mois', article: 'Article 18' },
  { code: 'Sympathisant·e', badge: 'Soutien souple',         badgeColor: 'bg-honey text-ink',        body: "Soutient l'ONG sans engagement permanent. Reçoit les communications et invitations.",  droits: '5 000 FCFA', cotisation: 'Libre',             article: 'Article 19' },
  { code: "D'honneur",      badge: 'Personnalité distinguée', badgeColor: 'bg-ink text-honey',       body: "Titre attribué par l'AG pour services rendus à la cause. Sans cotisation.",            droits: 'Exempté',     cotisation: 'Exempté',           article: 'Article 20' },
]

const PROCESS = [
  { n: '01', title: 'Remplir le formulaire en ligne',      body: 'Renseignez vos coordonnées et votre lettre de motivation.' },
  { n: '02', title: "Recevoir l'avis du Bureau Exécutif",  body: 'Réponse sous 7 jours ouvrés par email.' },
  { n: '03', title: 'Régler les droits en agence',         body: "5 000 FCFA + dépôt de 2 photos d'identité." },
  { n: '04', title: 'Recevoir sa carte de membre',         body: 'Délivrée lors de la prochaine session du Bureau.' },
]

const FAQ = [
  { q: 'Quelle est la différence entre membre adhérent et membre actif ?', a: "Le membre adhérent participe aux activités. Le membre actif est, en plus, impliqué dans la gouvernance et peut être candidat aux postes électifs du Bureau Exécutif (article 17 vs article 18 des statuts)." },
  { q: 'Le paiement peut-il se faire en ligne ?',                          a: "Non, le paiement se fait exclusivement en agence (Mobile Money ou cash) lors du retrait de la carte. L'ONG ne traite aucun paiement en ligne." },
  { q: 'Que se passe-t-il si je ne paie pas la cotisation annuelle ?',     a: "Conformément au règlement intérieur, l'échéance de la cotisation annuelle est fixée au 5 décembre. Au-delà de 3 mois d'impayé, le statut de membre est suspendu." },
  { q: 'Puis-je devenir bénévole sans être membre ?',                       a: "Oui, l'ONG accueille des bénévoles sur mission ponctuelle (caravanes, formations, événements). Contactez-nous via le formulaire de contact." },
]

export default function AdhererPage() {
  return (
    <>
      <PageHero
        eyebrow="Adhérer · rejoindre l'ONG"
        title="Rejoignez"
        italic="la communauté Elite Atacora."
        subtitle="Quatre catégories de membres, un processus clair, une réponse garantie sous 7 jours par le Bureau Exécutif."
        breadcrumb={[{ label: 'Adhérer' }]}
      >
        <PillButton href="#formulaire" variant="primary">Postuler maintenant</PillButton>
      </PageHero>

      {/* Membership Types */}
      <section className="py-16 sm:py-24 bg-cream">
        <div className="max-w-page mx-auto px-6">
          <div className="max-w-2xl mb-12">
            <Eyebrow color="forest">Articles 17 à 20 des statuts</Eyebrow>
            <h2 className="mt-5 font-serif fluid-h2 leading-[1.05] text-ink tracking-tight">
              Quatre <em className="italic text-terracotta">catégories</em> de membres.
            </h2>
            <p className="mt-6 text-coffee text-[16px] leading-[1.7]">
              Chaque catégorie correspond à un niveau d&apos;engagement et à des droits associés.
              Vous choisissez celle qui vous correspond.
            </p>
          </div>
          <div className="grid grid-cols-1 md:grid-cols-2 gap-6">
            {TYPES.map((t) => (
              <article key={t.code} className="bg-paper rounded-[32px] p-8 ring-2 ring-forest/20 card-hover relative overflow-hidden">
                <div className="flex items-center justify-between mb-6 flex-wrap gap-3">
                  <span className={`${t.badgeColor} text-[10px] uppercase tracking-widest font-semibold px-3 py-1.5 rounded-full`}>{t.badge}</span>
                  <span className="text-[11px] text-muted uppercase tracking-widest">{t.article}</span>
                </div>
                <h3 className="font-serif text-[32px] text-ink leading-tight">Membre {t.code}</h3>
                <p className="mt-4 text-[14.5px] text-coffee/90 leading-relaxed">{t.body}</p>
                <div className="mt-7 pt-6 border-t border-ink/10 grid grid-cols-2 gap-4">
                  <div>
                    <div className="text-[10px] uppercase tracking-widest text-muted">Droits d&apos;adhésion</div>
                    <div className="mt-1 font-serif text-[20px] text-ink">{t.droits}</div>
                  </div>
                  <div>
                    <div className="text-[10px] uppercase tracking-widest text-muted">Cotisation</div>
                    <div className="mt-1 font-serif text-[20px] text-ink">{t.cotisation}</div>
                  </div>
                </div>
              </article>
            ))}
          </div>
        </div>
      </section>

      {/* Tarifs */}
      <section className="py-16 sm:py-24 bg-paper">
        <div className="max-w-page mx-auto px-6">
          <div className="bg-honey text-ink rounded-[40px] p-10 sm:p-14 grid grid-cols-12 gap-10 items-center">
            <div className="col-span-12 lg:col-span-5">
              <Eyebrow color="terracotta">Règlement intérieur</Eyebrow>
              <h2 className="mt-5 font-serif fluid-h2 leading-[1.05] tracking-tight">
                Tarifs <em className="italic text-terracotta">officiels.</em>
              </h2>
            </div>
            <div className="col-span-12 lg:col-span-7 grid grid-cols-1 sm:grid-cols-3 gap-4">
              <div className="bg-cream rounded-3xl p-6">
                <div className="text-[10px] uppercase tracking-widest text-muted">Droit d&apos;adhésion</div>
                <div className="font-serif text-3xl text-ink mt-2">5 000</div>
                <div className="text-[12px] text-muted mt-1">FCFA · unique</div>
              </div>
              <div className="bg-cream rounded-3xl p-6">
                <div className="text-[10px] uppercase tracking-widest text-muted">Cotisation</div>
                <div className="font-serif text-3xl text-ink mt-2">2 000</div>
                <div className="text-[12px] text-muted mt-1">FCFA / mois</div>
              </div>
              <div className="bg-cream rounded-3xl p-6">
                <div className="text-[10px] uppercase tracking-widest text-muted">Annuelle</div>
                <div className="font-serif text-3xl text-ink mt-2">24 000</div>
                <div className="text-[12px] text-muted mt-1">FCFA / an</div>
              </div>
            </div>
          </div>
        </div>
      </section>

      {/* Process */}
      <section className="py-16 sm:py-24 bg-cream">
        <div className="max-w-page mx-auto px-6">
          <div className="max-w-2xl mb-12">
            <Eyebrow color="forest">Comment adhérer</Eyebrow>
            <h2 className="mt-5 font-serif fluid-h2 leading-[1.05] text-ink tracking-tight">
              Quatre étapes, <em className="italic text-terracotta">simples et claires.</em>
            </h2>
          </div>
          <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            {PROCESS.map((p, i) => (
              <article key={p.n} className="bg-paper rounded-3xl p-7 ring-1 ring-ink/5 relative">
                <div className="font-serif text-7xl text-honey leading-none opacity-80">{p.n}</div>
                <h3 className="mt-4 font-serif text-[20px] text-ink leading-tight">{p.title}</h3>
                <p className="mt-2 text-[13.5px] text-coffee/90 leading-relaxed">{p.body}</p>
                {i < PROCESS.length - 1 && (
                  <div className="hidden lg:block absolute -right-3 top-1/2 -translate-y-1/2 text-honey">→</div>
                )}
              </article>
            ))}
          </div>
        </div>
      </section>

      {/* Form */}
      <AdhesionForm />

      {/* FAQ */}
      <section className="py-16 sm:py-24">
        <div className="max-w-[900px] mx-auto px-6">
          <div className="max-w-2xl mb-12 text-center mx-auto">
            <Eyebrow color="terracotta">Questions fréquentes</Eyebrow>
            <h2 className="mt-5 font-serif fluid-h2 leading-[1.05] text-ink tracking-tight">
              Tout savoir avant <em className="italic text-terracotta">d&apos;adhérer.</em>
            </h2>
          </div>
          <FaqAccordion items={FAQ} />
        </div>
      </section>
    </>
  )
}
