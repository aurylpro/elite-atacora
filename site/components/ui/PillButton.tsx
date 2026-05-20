import Link from 'next/link'
import type { ReactNode } from 'react'

type Variant = 'primary' | 'secondary' | 'outline' | 'honey' | 'ghost' | 'onDark'

const variants: Record<Variant, string> = {
  primary:   'bg-forest text-cream hover:bg-mossdk shadow-[0_10px_30px_-12px_rgba(30,86,49,0.6)]',
  secondary: 'bg-ink text-cream hover:bg-coffee',
  outline:   'border border-ink/15 text-ink hover:bg-ink hover:text-cream hover:border-ink',
  honey:     'bg-honey text-ink hover:bg-honey/80',
  ghost:     'text-ink hover:text-forest',
  onDark:    'bg-cream text-ink hover:bg-honey',
}

const base = 'group inline-flex items-center gap-3 font-semibold text-[14px] px-7 py-4 rounded-full transition-all duration-300'

function ArrowSvg() {
  return (
    <svg width="14" height="12" viewBox="0 0 16 12" fill="none" className="transition-transform group-hover:translate-x-1" aria-hidden="true">
      <path d="M1 6 H14 M10 1.5 L14.5 6 L10 10.5" stroke="currentColor" strokeWidth="1.6" strokeLinecap="round" strokeLinejoin="round" />
    </svg>
  )
}

type Props = {
  children: ReactNode
  variant?: Variant
  href?: string
  className?: string
  arrow?: boolean
  type?: 'button' | 'submit' | 'reset'
  ariaLabel?: string
}

export function PillButton({ children, variant = 'primary', href, className = '', arrow = true, type, ariaLabel }: Props) {
  const cls = `${base} ${variants[variant]} ${className}`
  if (href) {
    const external = href.startsWith('http') || href.startsWith('mailto:') || href.startsWith('tel:') || href.startsWith('#')
    if (external) {
      return (
        <a href={href} className={cls} aria-label={ariaLabel}>
          <span>{children}</span>
          {arrow && <ArrowSvg />}
        </a>
      )
    }
    return (
      <Link href={href} className={cls} aria-label={ariaLabel}>
        <span>{children}</span>
        {arrow && <ArrowSvg />}
      </Link>
    )
  }
  return (
    <button type={type ?? 'button'} className={cls} aria-label={ariaLabel}>
      <span>{children}</span>
      {arrow && <ArrowSvg />}
    </button>
  )
}
