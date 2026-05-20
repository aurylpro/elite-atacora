'use client'

import { useMemo, useState } from 'react'
import Link from 'next/link'
import Image from 'next/image'
import { ArrowIcon } from './ArrowIcon'

export type NewsItem = {
  _id: string
  slug: string
  tag: string
  tone: 'forest' | 'terracotta' | 'honey'
  title: string
  date: string
  excerpt: string
  image: string
  minutes: number
}

const CATS = ['Tous', 'Programme', 'Partenariat', 'Terrain', 'Témoignage', 'Rapport', 'Presse'] as const

function toneClasses(tone: NewsItem['tone']) {
  if (tone === 'honey') return { bg: 'bg-honey', text: 'text-ink' }
  if (tone === 'terracotta') return { bg: 'bg-terracotta', text: 'text-cream' }
  return { bg: 'bg-forest', text: 'text-cream' }
}

function NewsCard({ item, large = false }: { item: NewsItem; large?: boolean }) {
  const tone = toneClasses(item.tone)
  return (
    <article className={`group card-hover bg-cream rounded-3xl overflow-hidden ring-1 ring-ink/5 flex flex-col ${large ? 'lg:flex-row' : ''}`}>
      <div className={`relative overflow-hidden ${large ? 'lg:w-1/2 aspect-[4/3]' : 'aspect-[5/4]'}`}>
        <Image src={item.image} alt={item.title} fill className="object-cover transition-transform duration-700 group-hover:scale-105" sizes="(max-width:1024px) 100vw, 50vw" />
        <div className={`absolute top-4 left-4 ${tone.bg} ${tone.text} text-[10px] uppercase tracking-widest font-semibold px-3 py-1.5 rounded-full`}>{item.tag}</div>
        <div className="absolute bottom-4 right-4 bg-cream/95 backdrop-blur text-ink text-[11px] px-3 py-1.5 rounded-full">{item.minutes} min</div>
      </div>
      <div className={`p-7 flex-1 flex flex-col ${large ? 'lg:p-10 justify-center' : ''}`}>
        <div className="text-[12px] uppercase tracking-widest text-muted">{item.date}</div>
        <h3 className={`mt-3 font-serif leading-[1.2] text-ink ${large ? 'text-[32px]' : 'text-[22px]'}`}>{item.title}</h3>
        <p className="mt-3 text-[14px] text-coffee/90 leading-relaxed line-clamp-3">{item.excerpt}</p>
        <div className="mt-6 pt-5 border-t border-ink/8 flex items-center justify-between">
          <Link href={`/actualites/${item.slug}`} className="text-[13px] font-semibold text-forest group-hover:text-mossdk">Lire l&apos;article</Link>
          <span className="w-9 h-9 rounded-full bg-forest text-cream grid place-items-center group-hover:bg-mossdk transition-colors">
            <ArrowIcon />
          </span>
        </div>
      </div>
    </article>
  )
}

export function NewsFilterGrid({ items }: { items: NewsItem[] }) {
  const [cat, setCat] = useState<string>('Tous')
  const [query, setQuery] = useState('')

  const filtered = useMemo(() => {
    return items.filter((n) => {
      if (cat !== 'Tous' && n.tag !== cat) return false
      if (query) {
        const q = query.toLowerCase()
        if (!n.title.toLowerCase().includes(q) && !n.excerpt.toLowerCase().includes(q)) return false
      }
      return true
    })
  }, [cat, query, items])

  const featured = filtered[0]
  const rest = filtered.slice(1)

  return (
    <section className="py-16 sm:py-20">
      <div className="max-w-page mx-auto px-6">
        <div className="flex flex-wrap items-center justify-between gap-6 mb-10">
          <div className="flex flex-wrap items-center gap-2">
            {CATS.map((c) => (
              <button
                key={c}
                onClick={() => setCat(c)}
                className={`px-4 py-2 rounded-full text-[13px] font-medium transition-colors
                  ${cat === c ? 'bg-forest text-cream' : 'bg-paper text-ink hover:bg-honey/40'}`}
              >
                {c}
              </button>
            ))}
          </div>
          <div className="relative">
            <svg width="15" height="15" viewBox="0 0 15 15" fill="none" className="absolute left-4 top-1/2 -translate-y-1/2 text-muted" aria-hidden="true">
              <circle cx="6" cy="6" r="5" stroke="currentColor" strokeWidth="1.5" />
              <path d="M10 10 L14 14" stroke="currentColor" strokeWidth="1.5" strokeLinecap="round" />
            </svg>
            <input
              value={query}
              onChange={(e) => setQuery(e.target.value)}
              placeholder="Rechercher un article…"
              aria-label="Rechercher"
              className="pl-11 pr-5 py-3 rounded-full bg-paper ring-1 ring-ink/8 text-[14px] focus:outline-none focus:ring-forest focus:bg-cream transition-all w-full sm:w-72"
            />
          </div>
        </div>

        {filtered.length === 0 ? (
          <div className="py-32 text-center text-muted">Aucun article ne correspond à votre recherche.</div>
        ) : (
          <>
            {featured && (
              <div className="mb-10">
                <NewsCard item={featured} large />
              </div>
            )}
            <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-7">
              {rest.map((n) => <NewsCard key={n._id} item={n} />)}
            </div>
          </>
        )}
      </div>
    </section>
  )
}
