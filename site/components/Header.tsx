'use client'

import { useEffect, useState } from 'react'
import Link from 'next/link'
import Image from 'next/image'
import { usePathname } from 'next/navigation'

type NavChild = { key: string; label: string; href: string; desc: string }
type NavItem  = { key: string; label: string; href: string; children?: NavChild[] }

const NAV: NavItem[] = [
  {
    key: 'ong',
    label: "L'ONG",
    href: '/a-propos',
    children: [
      { key: 'a-propos',    label: 'À propos',    href: '/a-propos',    desc: 'Mission, vision, valeurs' },
      { key: 'gouvernance', label: 'Gouvernance', href: '/gouvernance', desc: 'Bureau Exécutif & organes' },
    ],
  },
  { key: 'nos-actions', label: 'Nos actions', href: '/nos-actions' },
  { key: 'actualites',  label: 'Actualités',  href: '/actualites' },
  { key: 'evenements',  label: 'Événements',  href: '/evenements' },
  { key: 'contact',     label: 'Contact',     href: '/contact' },
]

function activeKey(pathname: string): string {
  if (pathname === '/' || pathname === '') return 'accueil'
  for (const it of NAV) {
    if (it.children) {
      for (const c of it.children) if (pathname.startsWith(c.href)) return c.key
    }
    if (pathname.startsWith(it.href)) return it.key
  }
  return ''
}

export default function Header() {
  const pathname = usePathname() || '/'
  const active = activeKey(pathname)
  const [mobile, setMobile] = useState(false)
  const [scrolled, setScrolled] = useState(false)
  const [openSub, setOpenSub] = useState<string | null>(null)

  useEffect(() => {
    const onScroll = () => setScrolled(window.scrollY > 20)
    onScroll()
    window.addEventListener('scroll', onScroll, { passive: true })
    return () => window.removeEventListener('scroll', onScroll)
  }, [])

  useEffect(() => { setMobile(false) }, [pathname])

  useEffect(() => {
    document.body.style.overflow = mobile ? 'hidden' : ''
    return () => { document.body.style.overflow = '' }
  }, [mobile])

  const isActive = (it: NavItem) => {
    if (it.key === active) return true
    if (it.children) return it.children.some(c => c.key === active)
    return false
  }

  return (
    <header className={`sticky top-0 z-50 transition-all duration-300 ${scrolled ? 'bg-cream/90 backdrop-blur-md shadow-[0_4px_30px_-20px_rgba(30,24,19,0.25)]' : 'bg-transparent'}`}>
      <div className="max-w-page mx-auto px-4 sm:px-6 py-4 sm:py-5 flex items-center gap-4 sm:gap-10">
        <Link href="/" className="flex items-center gap-2.5 sm:gap-3 shrink-0 group" aria-label="Accueil Elite Atacora">
          <div className="w-11 h-11 rounded-full bg-white grid place-items-center overflow-hidden ring-1 ring-ink/10 group-hover:ring-honey transition shrink-0">
            <Image src="/images/logo.jpeg" alt="" width={44} height={44} className="w-10 h-10 object-contain" priority />
          </div>
          <div className="font-serif text-[18px] sm:text-[20px] text-ink leading-none whitespace-nowrap">Elite Atacora</div>
        </Link>

        <nav aria-label="Navigation principale" className="hidden lg:flex items-center gap-1 mx-auto">
          {NAV.map((it) => {
            const act = isActive(it)
            return (
              <div
                key={it.key}
                className="relative"
                onMouseEnter={() => it.children && setOpenSub(it.key)}
                onMouseLeave={() => it.children && setOpenSub(null)}
              >
                <Link
                  href={it.href}
                  className={`relative px-3.5 py-2 text-[14px] font-medium transition-colors flex items-center gap-1.5
                    ${act ? 'text-forest' : 'text-ink/85 hover:text-forest'}`}
                >
                  {it.label}
                  {it.children && (
                    <svg width="9" height="6" viewBox="0 0 9 6" fill="none" className={`opacity-60 transition-transform ${openSub === it.key ? 'rotate-180' : ''}`} aria-hidden="true">
                      <path d="M1 1 L4.5 5 L8 1" stroke="currentColor" strokeWidth="1.5" strokeLinecap="round" strokeLinejoin="round" />
                    </svg>
                  )}
                  {act && <span className="absolute left-1/2 -translate-x-1/2 -bottom-0.5 w-1.5 h-1.5 bg-honey rounded-full" />}
                </Link>

                {it.children && openSub === it.key && (
                  <div className="absolute left-1/2 -translate-x-1/2 top-full pt-2 w-[280px]">
                    <div className="bg-cream rounded-2xl ring-1 ring-ink/10 shadow-[0_20px_50px_-15px_rgba(30,24,19,0.25)] overflow-hidden">
                      {it.children.map((c) => (
                        <Link
                          key={c.key}
                          href={c.href}
                          className={`block px-5 py-4 hover:bg-paper transition-colors border-b border-ink/5 last:border-b-0 ${c.key === active ? 'bg-paper' : ''}`}
                        >
                          <div className="font-medium text-[14px] text-ink">{c.label}</div>
                          <div className="text-[12px] text-muted mt-0.5">{c.desc}</div>
                        </Link>
                      ))}
                    </div>
                  </div>
                )}
              </div>
            )
          })}
        </nav>

        <div className="flex items-center gap-2 ml-auto lg:ml-0">
          <Link
            href="/adherer"
            className="hidden sm:inline-flex items-center gap-2 bg-forest text-cream pl-5 pr-2 py-1.5 rounded-full text-[13px] font-semibold hover:bg-mossdk transition-colors"
          >
            Adhérer
            <span className="w-7 h-7 rounded-full bg-honey text-ink grid place-items-center">
              <svg width="11" height="9" viewBox="0 0 16 12" fill="none" aria-hidden="true">
                <path d="M1 6 H14 M10 1.5 L14.5 6 L10 10.5" stroke="currentColor" strokeWidth="1.8" strokeLinecap="round" strokeLinejoin="round" />
              </svg>
            </span>
          </Link>

          <button
            onClick={() => setMobile(!mobile)}
            className="lg:hidden w-11 h-11 rounded-full bg-ink/5 hover:bg-ink/10 grid place-items-center transition-colors shrink-0"
            aria-label={mobile ? 'Fermer le menu' : 'Ouvrir le menu'}
            aria-expanded={mobile}
          >
            {mobile ? (
              <svg width="14" height="14" viewBox="0 0 16 16" fill="none" aria-hidden="true">
                <path d="M3 3 L13 13 M13 3 L3 13" stroke="currentColor" strokeWidth="1.8" strokeLinecap="round" />
              </svg>
            ) : (
              <svg width="16" height="12" viewBox="0 0 18 14" fill="none" aria-hidden="true">
                <path d="M0 1 H18 M0 7 H18 M0 13 H12" stroke="currentColor" strokeWidth="1.8" strokeLinecap="round" />
              </svg>
            )}
          </button>
        </div>
      </div>

      {mobile && (
        <div className="lg:hidden bg-cream border-t border-ink/10 shadow-[0_10px_30px_-15px_rgba(30,24,19,0.25)] max-h-[calc(100vh-72px)] overflow-y-auto animate-mobile-menu-in">
          <div className="max-w-page mx-auto px-4 sm:px-6 py-4 flex flex-col">
            {NAV.map((it) => (
              <div key={it.key}>
                <Link
                  href={it.href}
                  className={`flex items-center justify-between py-3 text-[15px] font-medium border-b border-ink/5
                    ${isActive(it) ? 'text-forest' : 'text-ink'}`}
                >
                  {it.label}
                  {it.children && <span className="text-muted text-xs">→</span>}
                </Link>
                {it.children && (
                  <div className="pl-4 pb-2">
                    {it.children.map((c) => (
                      <Link key={c.key} href={c.href} className="block py-2 text-[14px] text-muted hover:text-forest">
                        — {c.label}
                      </Link>
                    ))}
                  </div>
                )}
              </div>
            ))}
            <div className="flex items-center justify-end mt-4 pt-4 border-t border-ink/10">
              <Link href="/adherer" className="bg-forest text-cream px-5 py-2.5 rounded-full text-[13px] font-semibold">
                Adhérer →
              </Link>
            </div>
          </div>
        </div>
      )}
    </header>
  )
}
