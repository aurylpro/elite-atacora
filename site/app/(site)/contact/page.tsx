import type { Metadata } from 'next'
import { Eyebrow } from '@/components/ui/Eyebrow'
import { PageHero } from '@/components/ui/PageHero'
import { ContactForm } from '@/components/ui/ContactForm'

export const metadata: Metadata = {
  title: 'Contact',
  description: 'Une question, un partenariat, un don, un projet de bénévolat ? Toutes les voies pour nous joindre.',
}

const CARDS = [
  { label: 'Adresse',     value: 'Quartier Dassagaté\nNatitingou, Atacora · Bénin',                     bg: 'bg-forest',     text: 'text-cream', accent: 'text-honey',     d: 'M6 13 Q1 8 1 5 A5 5 0 1 1 11 5 Q11 8 6 13 Z M6 5 A1 1 0 1 1 6 7 A1 1 0 1 1 6 5 Z' },
  { label: 'Téléphone',   value: '(+229) 01 94 05 50 90', action: 'tel:+2290194055090',                bg: 'bg-terracotta', text: 'text-cream', accent: 'text-honey',     d: 'M2 2.5 Q2 2 2.5 2 H4 L5 5 L3.8 6.2 Q5 8.5 6.8 9.2 L8 8 L11 9 V10.5 Q11 11 10.5 11 Q6 11 4 9 Q2 7 2 2.5 Z' },
  { label: 'Email',       value: 'contact@eliteatacora.org', action: 'mailto:contact@eliteatacora.org', bg: 'bg-honey',      text: 'text-ink',   accent: 'text-terracotta', d: 'M1 2 H13 V10 H1 Z M1 2 L7 6.5 L13 2' },
  { label: 'Horaires',    value: 'Lun → Ven · 08h-17h\nSam · 09h-13h',                                 bg: 'bg-ink',        text: 'text-cream', accent: 'text-honey',     d: 'M6 1 V6 L9 8 M11 6 A5 5 0 1 1 1 6 A5 5 0 1 1 11 6 Z' },
]

export default function ContactPage() {
  return (
    <>
      <PageHero
        eyebrow="Contact · Bureau Exécutif"
        title="Échangeons,"
        italic="construisons ensemble."
        subtitle="Une question, un partenariat, un don, un projet de bénévolat ? Toutes les voies pour nous joindre sont ouvertes."
        breadcrumb={[{ label: 'Contact' }]}
      />

      {/* Cards infos */}
      <section className="py-16 sm:py-20">
        <div className="max-w-page mx-auto px-6">
          <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5">
            {CARDS.map((c) => (
              <article key={c.label} className={`${c.bg} ${c.text} rounded-3xl p-7 card-hover relative overflow-hidden`}>
                <div className="absolute -bottom-12 -right-12 w-32 h-32 rounded-full border border-current opacity-15" />
                <div className={`w-11 h-11 rounded-full ${c.accent} bg-current/10 grid place-items-center`}>
                  <svg width="18" height="18" viewBox="0 0 12 13" className={c.accent} aria-hidden="true">
                    <path d={c.d} stroke="currentColor" strokeWidth="1.5" fill="none" strokeLinejoin="round" />
                  </svg>
                </div>
                <div className={`mt-5 text-[11px] uppercase tracking-widest ${c.accent} font-semibold`}>{c.label}</div>
                <div className="mt-2 font-serif text-[18px] leading-tight whitespace-pre-line">
                  {c.action ? <a href={c.action} className="hover:opacity-80">{c.value}</a> : c.value}
                </div>
              </article>
            ))}
          </div>
        </div>
      </section>

      {/* Map + Form */}
      <section className="py-16">
        <div className="max-w-page mx-auto px-6">
          <div className="bg-cream rounded-[40px] ring-1 ring-ink/5 overflow-hidden grid grid-cols-12">
            <div className="col-span-12 lg:col-span-5 relative min-h-[400px]">
              <iframe
                title="Carte Natitingou"
                src="https://www.openstreetmap.org/export/embed.html?bbox=1.34%2C10.30%2C1.41%2C10.36&amp;layer=mapnik&amp;marker=10.3157%2C1.3811"
                loading="lazy"
                className="absolute inset-0 w-full h-full border-0"
              />
            </div>
            <div className="col-span-12 lg:col-span-7 p-10 sm:p-12">
              <ContactForm />
            </div>
          </div>
        </div>
      </section>

      {/* Social */}
      <section className="py-16 sm:py-24 bg-paper">
        <div className="max-w-page mx-auto px-6">
          <div className="bg-ink text-cream rounded-[40px] p-10 sm:p-14 grid grid-cols-12 gap-10 items-center">
            <div className="col-span-12 lg:col-span-7">
              <Eyebrow color="cream">Suivez-nous</Eyebrow>
              <h3 className="mt-5 font-serif fluid-h2 leading-[1.05] tracking-tight">
                Restons connectés au <em className="italic text-honey">quotidien.</em>
              </h3>
              <p className="mt-5 text-cream/75 max-w-md">
                Photos terrain, témoignages, annonces : retrouvez l&apos;ONG sur vos réseaux préférés.
              </p>
            </div>
            <div className="col-span-12 lg:col-span-5 flex flex-wrap gap-3">
              {['Facebook', 'Instagram', 'LinkedIn', 'WhatsApp'].map((s) => (
                <a key={s} href="#" className="footer-social bg-cream/10 hover:bg-honey hover:text-ink text-cream px-5 py-3 rounded-full text-[14px] font-semibold transition-colors">
                  {s} →
                </a>
              ))}
            </div>
          </div>
        </div>
      </section>
    </>
  )
}
