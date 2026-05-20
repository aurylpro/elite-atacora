import Link from 'next/link'
import Image from 'next/image'
import { Fragment, type ReactNode } from 'react'
import { Eyebrow } from './Eyebrow'

type Crumb = { label: string; href?: string }

type Props = {
  eyebrow?: string | null
  title?: string | null
  italic?: string
  subtitle?: string
  breadcrumb?: Crumb[]
  children?: ReactNode
  image?: string
}

export function PageHero({ eyebrow, title, italic, subtitle, breadcrumb = [], children, image }: Props) {
  return (
    <section className="relative pt-8 pb-16 sm:pt-16 sm:pb-28 overflow-hidden">
      <div aria-hidden="true" className="absolute -top-32 -right-32 w-[300px] sm:w-[420px] h-[300px] sm:h-[420px] rounded-full bg-honey/15 blur-3xl pointer-events-none" />
      <div aria-hidden="true" className="absolute top-1/3 -left-40 w-[280px] sm:w-[360px] h-[280px] sm:h-[360px] rounded-full bg-terracotta/[0.12] blur-3xl pointer-events-none" />

      <div className="max-w-page mx-auto px-6 relative">
        {breadcrumb.length > 0 && (
          <nav aria-label="Fil d'Ariane" className="flex items-center gap-2 text-[12px] text-muted mb-6 sm:mb-10 flex-wrap">
            <Link href="/" className="hover:text-forest">Accueil</Link>
            {breadcrumb.map((b, i) => (
              <Fragment key={i}>
                <span className="text-muted/50">/</span>
                {b.href ? <Link href={b.href} className="hover:text-forest">{b.label}</Link> : <span className="text-ink">{b.label}</span>}
              </Fragment>
            ))}
          </nav>
        )}

        <div className={`grid grid-cols-12 gap-6 sm:gap-10 ${image ? 'items-center' : ''}`}>
          <div className={`col-span-12 ${image ? 'lg:col-span-7' : 'lg:col-span-9'}`}>
            {eyebrow && <Eyebrow color="forest">{eyebrow}</Eyebrow>}
            {title && (
              <h1 className="mt-5 sm:mt-6 fluid-h1 font-serif text-ink">
                {title}
                {italic && <em className="italic text-terracotta font-serif"> {italic}</em>}
              </h1>
            )}
            {subtitle && (
              <p className="mt-6 sm:mt-8 text-[16px] sm:text-[19px] leading-[1.7] text-coffee max-w-[640px]">
                {subtitle}
              </p>
            )}
            {children && <div className="mt-8 sm:mt-10">{children}</div>}
          </div>
          {image && (
            <div className="col-span-12 lg:col-span-5">
              <div className="aspect-[4/5] rounded-[28px] sm:rounded-[40px] overflow-hidden ring-1 ring-ink/8 shadow-[0_30px_60px_-30px_rgba(30,24,19,0.3)] relative max-w-[420px] mx-auto lg:max-w-none">
                <Image src={image} alt="" fill className="object-cover" sizes="(max-width:1024px) 100vw, 40vw" />
              </div>
            </div>
          )}
        </div>
      </div>
    </section>
  )
}
