import type { Metadata } from 'next'
import { Eyebrow } from '@/components/ui/Eyebrow'
import { PillButton } from '@/components/ui/PillButton'
import { PageHero } from '@/components/ui/PageHero'

export const metadata: Metadata = {
  title: 'Politique de confidentialité',
  description: "Comment Elite Atacora collecte, utilise et protège vos données personnelles.",
}

const SECTIONS = [
  { n: '01', title: 'Responsable du traitement',     body: "L'ONG Elite Atacora, dont le siège est situé Quartier Dassagaté, Natitingou, département de l'Atacora, République du Bénin, est responsable du traitement des données personnelles collectées via son site web." },
  { n: '02', title: 'Données collectées',            body: "Nous collectons uniquement les données strictement nécessaires aux finalités décrites : nom, prénom, email, numéro de téléphone, contenu du message ou de la lettre de motivation. Aucune donnée sensible (santé, opinions politiques, religieuses, etc.) n'est demandée." },
  { n: '03', title: 'Finalités du traitement',        body: "Vos données sont collectées pour les finalités suivantes : traiter les candidatures à l'adhésion, répondre aux demandes de contact, envoyer la newsletter (sur consentement explicite). En aucun cas vos données ne sont utilisées à des fins commerciales." },
  { n: '04', title: 'Durée de conservation',          body: "Les données sont conservées 2 ans à compter de votre dernière interaction avec l'ONG, puis automatiquement supprimées. Les inscriptions à la newsletter sont conservées jusqu'à votre désinscription." },
  { n: '05', title: 'Vos droits',                      body: "Conformément à la réglementation applicable, vous disposez d'un droit d'accès, de rectification, de suppression et d'opposition concernant vos données. Pour exercer ces droits, écrivez-nous à contact@eliteatacora.org." },
  { n: '06', title: 'Transmission à des tiers',        body: "Vos données ne sont jamais vendues, louées ou cédées à des tiers. Elles peuvent être communiquées à nos partenaires institutionnels uniquement avec votre consentement explicite, ou aux autorités publiques sur réquisition légale." },
  { n: '07', title: 'Cookies et traceurs',             body: "Le site utilise un nombre limité de cookies techniques nécessaires à son fonctionnement (session, préférences linguistiques). Aucun cookie publicitaire ou de tracking tiers n'est déposé sans votre consentement." },
  { n: '08', title: 'Sécurité',                        body: "Les données sont stockées sur des serveurs sécurisés. L'accès est restreint aux personnes autorisées du Bureau Exécutif. Les mots de passe sont chiffrés. Une sauvegarde hebdomadaire est effectuée." },
]

export default function ConfidentialitePage() {
  return (
    <>
      <PageHero
        eyebrow="Cadre légal · données personnelles"
        title="Politique de"
        italic="confidentialité."
        subtitle="Vos données vous appartiennent. Voici comment Elite Atacora les collecte, les utilise et les protège — en toute transparence."
        breadcrumb={[{ label: 'Confidentialité' }]}
      />

      <section className="py-12">
        <div className="max-w-[820px] mx-auto px-6">
          <div className="bg-paper rounded-3xl p-8 ring-1 ring-ink/5">
            <div className="flex items-center gap-4">
              <span className="w-12 h-12 rounded-full bg-honey grid place-items-center text-ink">
                <svg width="20" height="22" viewBox="0 0 12 14" fill="none" aria-hidden="true">
                  <path d="M6 1 L11 4 V8 Q11 11 6 13 Q1 11 1 8 V4 Z M4 7 L6 9 L9 5" stroke="currentColor" strokeWidth="1.4" strokeLinejoin="round" />
                </svg>
              </span>
              <div>
                <div className="text-[11px] uppercase tracking-widest text-terracotta font-semibold">Dernière mise à jour</div>
                <div className="mt-1 font-serif text-[18px] text-ink">18 mai 2026</div>
              </div>
            </div>
            <p className="mt-6 text-coffee text-[15.5px] leading-[1.7]">
              L&apos;ONG Elite Atacora s&apos;engage à protéger la vie privée de ses
              visiteurs, candidats à l&apos;adhésion et abonnés à sa newsletter.
              La présente politique détaille comment vos données personnelles
              sont collectées, utilisées et protégées.
            </p>
          </div>
        </div>
      </section>

      <section className="py-12">
        <div className="max-w-[820px] mx-auto px-6 space-y-10">
          {SECTIONS.map((s) => (
            <article key={s.n} className="grid grid-cols-12 gap-6 pb-10 border-b border-ink/8 last:border-b-0">
              <div className="col-span-12 sm:col-span-2">
                <div className="font-serif text-5xl text-honey leading-none">{s.n}</div>
              </div>
              <div className="col-span-12 sm:col-span-10">
                <h2 className="font-serif text-[26px] text-ink leading-tight">{s.title}</h2>
                <p className="mt-4 text-coffee text-[15.5px] leading-[1.75]">{s.body}</p>
              </div>
            </article>
          ))}
        </div>
      </section>

      <section className="py-16 sm:py-24">
        <div className="max-w-page mx-auto px-6">
          <div className="bg-paper rounded-[40px] p-10 sm:p-14 grid grid-cols-12 gap-10 items-center">
            <div className="col-span-12 lg:col-span-8">
              <Eyebrow color="terracotta">Une question sur vos données ?</Eyebrow>
              <h3 className="mt-5 font-serif fluid-h2 leading-[1.05] text-ink tracking-tight">
                Le Bureau Exécutif est à votre <em className="italic text-terracotta">écoute.</em>
              </h3>
            </div>
            <div className="col-span-12 lg:col-span-4 flex flex-wrap gap-3 lg:justify-end">
              <PillButton href="/contact" variant="primary">Nous écrire</PillButton>
            </div>
          </div>
        </div>
      </section>
    </>
  )
}
