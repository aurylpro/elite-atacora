import Link from 'next/link'
import Image from 'next/image'
import { getSiteSettings } from '@/lib/queries'

const SOCIAL_ICONS: Record<string, string> = {
  facebook:  'M9.5 8.5 H7 V11.5 H9.5 V19 H12.5 V11.5 H14.8 L15.2 8.5 H12.5 V7 C12.5 6.3 12.7 6 13.4 6 H15.2 V3 H13 C10.6 3 9.5 4 9.5 6.4 V8.5 Z',
  instagram: 'M7 3 H15 C17.2 3 19 4.8 19 7 V15 C19 17.2 17.2 19 15 19 H7 C4.8 19 3 17.2 3 15 V7 C3 4.8 4.8 3 7 3 Z M11 8 A3 3 0 1 1 11 14 A3 3 0 1 1 11 8 Z M15.5 6.5 H15.51',
  linkedin:  'M5 8 H7.5 V18 H5 V8 Z M6.25 5 A1.5 1.5 0 1 1 6.25 7 A1.5 1.5 0 1 1 6.25 5 Z M10 8 H12.4 V9.4 C12.9 8.5 14 7.7 15.5 7.7 C18 7.7 18.5 9.4 18.5 11.5 V18 H16 V12.3 C16 10.9 15.7 9.9 14.5 9.9 C13.1 9.9 12.5 10.9 12.5 12.3 V18 H10 V8 Z',
  whatsapp:  'M5 18 L6 14.5 A7.5 7.5 0 1 1 8.5 17 L5 18 Z M9 11 Q10 13 11.5 13.5 Q12.5 13.8 13 13 L14 13.5 Q14 14.5 12.5 14.5 Q10.5 14 9 12 Q7.5 10 8 8.5 Q8.5 7.5 9.5 8 L10 9 Q9.5 9.5 9 11 Z',
}

const DEFAULTS = {
  adresse: 'Quartier Dassagaté\nNatitingou, Atacora · Bénin',
  telephone: '(+229) 01 94 05 50 90',
  email: 'contact@eliteatacora.org',
}

export default async function Footer() {
  let s: any = null
  try { s = await getSiteSettings() } catch {}
  const adresse   = s?.contact?.adresse   || DEFAULTS.adresse
  const telephone = s?.contact?.telephone || DEFAULTS.telephone
  const email     = s?.contact?.email     || DEFAULTS.email
  const social    = s?.social || {}
  const socialLinks = (['facebook', 'instagram', 'linkedin', 'whatsapp'] as const)
    .filter((k) => social[k])
    .map((k) => ({ name: k[0].toUpperCase() + k.slice(1), href: social[k] as string, d: SOCIAL_ICONS[k] }))
  // Si aucun réseau configuré, on garde les 4 icônes en placeholder (href #)
  const SOCIAL = socialLinks.length > 0
    ? socialLinks
    : (['facebook', 'instagram', 'linkedin', 'whatsapp'] as const).map((k) => ({ name: k[0].toUpperCase() + k.slice(1), href: '#', d: SOCIAL_ICONS[k] }))
  const telHref = 'tel:' + telephone.replace(/[^0-9+]/g, '')

  return (
    <footer className="bg-ink text-cream/90 relative overflow-hidden">
      <svg aria-hidden="true" className="absolute top-0 right-0 w-[420px] h-[180px] text-honey/15 pointer-events-none" viewBox="0 0 420 180" fill="none" preserveAspectRatio="none">
        <path d="M-20 40 Q 80 0 180 40 T 380 40 T 580 40" stroke="currentColor" strokeWidth="1.5" strokeDasharray="2 6" fill="none" />
        <path d="M-20 80 Q 80 40 180 80 T 380 80 T 580 80" stroke="currentColor" strokeWidth="1" strokeDasharray="2 8" fill="none" />
      </svg>
      <div aria-hidden="true" className="absolute -bottom-32 left-1/4 w-[600px] h-[400px] rounded-full bg-honey/[0.04] blur-[100px] pointer-events-none" />

      <div className="max-w-page mx-auto px-6 relative">
        <div className="grid grid-cols-12 gap-10 pt-20 pb-14 border-b border-cream/10">
          <div className="col-span-12 lg:col-span-7">
            <div className="text-[11px] uppercase tracking-[0.2em] text-honey font-semibold mb-5">Restons en contact</div>
            <h3 className="font-serif text-[38px] sm:text-[50px] leading-[1.05] text-cream tracking-tight">
              Soutenez l&apos;Atacora,<br />
              <em className="italic text-honey">une marche à la fois.</em>
            </h3>
          </div>
          <div className="col-span-12 lg:col-span-5 lg:pt-4">
            <p className="text-cream/70 leading-relaxed mb-6 max-w-md">
              Recevez nos actualités, rapports et invitations directement dans votre boîte mail.
            </p>
            <form action="mailto:contact@eliteatacora.org" method="post" encType="text/plain" className="flex flex-col sm:flex-row gap-3 max-w-md">
              <input
                type="email"
                name="email"
                placeholder="Votre adresse email"
                aria-label="Votre adresse email"
                required
                className="flex-1 bg-cream/10 border border-cream/20 rounded-full px-5 py-3.5 text-cream placeholder:text-cream/40 focus:outline-none focus:bg-cream/15 focus:border-honey/50 transition-colors"
              />
              <button type="submit" className="px-6 py-3.5 rounded-full bg-honey text-ink font-semibold hover:bg-honey/85 transition-colors whitespace-nowrap">
                S&apos;abonner →
              </button>
            </form>
          </div>
        </div>

        <div className="grid grid-cols-12 gap-10 py-14">
          <div className="col-span-12 md:col-span-5">
            <div className="flex items-center gap-4">
              <div className="w-14 h-14 rounded-full bg-cream grid place-items-center overflow-hidden">
                <Image src="/images/logo.jpeg" alt="" width={56} height={56} className="w-12 h-12 object-contain" />
              </div>
              <div>
                <div className="font-serif text-2xl text-cream leading-none">Elite Atacora</div>
                <div className="text-[11px] text-cream/55 mt-1.5 tracking-wider">ONG · Bénin · depuis 2018</div>
              </div>
            </div>
            <p className="mt-7 text-cream/70 leading-relaxed max-w-md text-[14px]">
              Organisation non gouvernementale béninoise, apolitique et à but
              non lucratif. Engagée pour l&apos;autonomisation des femmes, l&apos;éducation
              des enfants vulnérables et la résilience climatique de l&apos;Atacora.
            </p>
            <div className="mt-6 flex gap-2">
              {SOCIAL.map((s) => (
                <a
                  key={s.name}
                  href={s.href}
                  aria-label={s.name}
                  {...(s.href.startsWith('http') ? { target: '_blank', rel: 'noreferrer' } : {})}
                  className="footer-social w-10 h-10 rounded-full bg-cream/[0.08] grid place-items-center text-cream/80 transition-colors"
                >
                  <svg width="20" height="20" viewBox="0 0 22 22" fill="none" aria-hidden="true">
                    <path d={s.d} stroke="currentColor" strokeWidth="1.4" strokeLinecap="round" strokeLinejoin="round" />
                  </svg>
                </a>
              ))}
            </div>
          </div>

          <div className="col-span-6 md:col-span-2">
            <div className="text-[11px] uppercase tracking-widest text-honey font-semibold mb-5">L&apos;ONG</div>
            <ul className="space-y-3 text-[14px]">
              <li><Link href="/a-propos"    className="footer-link text-cream/80">À propos</Link></li>
              <li><Link href="/gouvernance" className="footer-link text-cream/80">Gouvernance</Link></li>
              <li><Link href="/nos-actions" className="footer-link text-cream/80">Nos actions</Link></li>
              <li><Link href="/adherer"     className="footer-link text-cream/80">Adhérer</Link></li>
            </ul>
          </div>

          <div className="col-span-6 md:col-span-2">
            <div className="text-[11px] uppercase tracking-widest text-honey font-semibold mb-5">Ressources</div>
            <ul className="space-y-3 text-[14px]">
              <li><Link href="/actualites" className="footer-link text-cream/80">Actualités</Link></li>
              <li><Link href="/evenements" className="footer-link text-cream/80">Événements</Link></li>
              <li><Link href="/contact"    className="footer-link text-cream/80">Contact</Link></li>
              <li><Link href="/politique-de-confidentialite" className="footer-link text-cream/80">Confidentialité</Link></li>
            </ul>
          </div>

          <div className="col-span-12 md:col-span-3">
            <div className="text-[11px] uppercase tracking-widest text-honey font-semibold mb-5">Contact</div>
            <ul className="space-y-4 text-[14px]">
              <li className="flex items-start gap-3">
                <span className="w-5 shrink-0 pt-0.5 text-honey">
                  <svg width="14" height="16" viewBox="0 0 12 14" fill="none" aria-hidden="true">
                    <path d="M6 13 Q1 8 1 5 A5 5 0 1 1 11 5 Q11 8 6 13 Z M6 5 A1 1 0 1 1 6 7 A1 1 0 1 1 6 5 Z" stroke="currentColor" strokeWidth="1.3" />
                  </svg>
                </span>
                <span className="text-cream/85 whitespace-pre-line">{adresse}</span>
              </li>
              <li className="flex items-start gap-3">
                <span className="w-5 shrink-0 pt-0.5 text-honey">
                  <svg width="15" height="15" viewBox="0 0 13 13" fill="none" aria-hidden="true">
                    <path d="M2 2.5 Q2 2 2.5 2 H4 L5 5 L3.8 6.2 Q5 8.5 6.8 9.2 L8 8 L11 9 V10.5 Q11 11 10.5 11 Q6 11 4 9 Q2 7 2 2.5 Z" stroke="currentColor" strokeWidth="1.3" strokeLinejoin="round" />
                  </svg>
                </span>
                <a href={telHref} className="footer-link text-cream/85">{telephone}</a>
              </li>
              <li className="flex items-start gap-3">
                <span className="w-5 shrink-0 pt-0.5 text-honey">
                  <svg width="15" height="12" viewBox="0 0 14 11" fill="none" aria-hidden="true">
                    <path d="M1 2 H13 V10 H1 Z M1 2 L7 6.5 L13 2" stroke="currentColor" strokeWidth="1.3" strokeLinejoin="round" />
                  </svg>
                </span>
                <a href={`mailto:${email}`} className="footer-link text-cream/85 break-all">{email}</a>
              </li>
            </ul>
          </div>
        </div>

        <div className="py-6 border-t border-cream/10 flex flex-wrap items-center justify-between gap-4 text-[12px] text-cream/55">
          <div>© 2026 ONG Elite Atacora · tous droits réservés</div>
          <div>Conformément à la loi n°2025-19 du 22 juillet 2025 · République du Bénin</div>
        </div>
      </div>
    </footer>
  )
}
