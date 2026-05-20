'use client'

import { useState } from 'react'
import Link from 'next/link'
import Image from 'next/image'
import { ArrowIcon } from './ArrowIcon'
import { PillButton } from './PillButton'

export type EvItem = {
  _id: string
  slug: string
  day: string
  month: string
  year: string
  monthKey: number
  title: string
  place: string
  time: string
  type: string
  image: string
  featured: boolean
}

function EventCard({ e }: { e: EvItem }) {
  return (
    <article className="group bg-cream rounded-3xl overflow-hidden ring-1 ring-ink/5 card-hover">
      <div className="grid grid-cols-12">
        <div className="col-span-4 sm:col-span-3 bg-forest text-cream p-5 flex flex-col items-center justify-center text-center">
          <div className="text-[10px] uppercase tracking-widest text-honey font-semibold">{e.month}</div>
          <div className="font-serif text-5xl leading-none mt-2 tabular">{e.day}</div>
          <div className="text-[10px] uppercase tracking-widest text-cream/60 mt-2">{e.year}</div>
        </div>
        <div className="col-span-8 sm:col-span-9 p-6">
          <div className="flex items-center gap-2 mb-3 flex-wrap">
            <span className="bg-honey text-ink text-[10px] uppercase tracking-widest font-semibold px-2.5 py-1 rounded-full">{e.type}</span>
            <span className="text-[12px] text-muted">{e.time}</span>
          </div>
          <h3 className="font-serif text-[22px] text-ink leading-tight">{e.title}</h3>
          <div className="mt-3 text-[13px] text-coffee/85">{e.place}</div>
          <div className="mt-5 pt-4 border-t border-ink/8 flex items-center justify-between">
            <Link href={`/evenements/${e.slug}`} className="text-[13px] font-semibold text-forest">Voir le détail</Link>
            <span className="w-9 h-9 rounded-full bg-forest text-cream grid place-items-center group-hover:bg-mossdk transition-colors"><ArrowIcon /></span>
          </div>
        </div>
      </div>
    </article>
  )
}

function FeaturedEvent({ e }: { e: EvItem }) {
  return (
    <article className="bg-forest text-cream rounded-[36px] overflow-hidden ring-1 ring-ink/5 mb-10 grid grid-cols-12">
      <div className="col-span-12 lg:col-span-6 relative aspect-[16/10] lg:aspect-auto min-h-[260px]">
        <Image src={e.image} alt={e.title} fill className="object-cover absolute inset-0" sizes="(max-width:1024px) 100vw, 50vw" />
        <div className="absolute inset-0 bg-gradient-to-tr from-forest/70 to-transparent" />
        <div className="absolute top-6 left-6 bg-honey text-ink text-[10px] uppercase tracking-widest font-bold px-3 py-1.5 rounded-full">À la une</div>
      </div>
      <div className="col-span-12 lg:col-span-6 p-10 sm:p-14 flex flex-col">
        <div className="flex items-center gap-4">
          <div className="w-20 h-20 rounded-2xl bg-honey text-ink grid place-items-center font-serif">
            <div className="text-center">
              <div className="text-3xl tabular leading-none">{e.day}</div>
              <div className="text-[10px] uppercase tracking-widest font-sans font-semibold mt-1.5">{e.month}</div>
            </div>
          </div>
          <div>
            <div className="text-[11px] uppercase tracking-widest text-honey">{e.type}</div>
            <div className="text-[13px] mt-1">{e.time}</div>
          </div>
        </div>
        <h2 className="mt-8 font-serif text-[36px] sm:text-[44px] leading-[1.05] tracking-tight">{e.title}</h2>
        <p className="mt-4 text-cream/80 text-[15px] leading-relaxed">{e.place}</p>
        <div className="mt-auto pt-8 flex flex-wrap gap-3">
          <PillButton href={`/evenements/${e.slug}`} variant="honey">Réserver ma place</PillButton>
          <PillButton href={`/evenements/${e.slug}`} variant="ghost" className="!text-cream hover:!text-honey">Voir le détail</PillButton>
        </div>
      </div>
    </article>
  )
}

function CalendarView({ events }: { events: EvItem[] }) {
  const months = Array.from(new Set(events.map(e => `${e.monthKey}|${e.month} ${e.year}`)))
    .map(s => {
      const [k, name] = s.split('|')
      return { key: parseInt(k, 10), name }
    })
    .sort((a, b) => a.key - b.key)

  return (
    <div className="space-y-10">
      {months.map((m) => {
        const evs = events.filter((e) => e.monthKey === m.key)
        if (evs.length === 0) return null
        return (
          <div key={m.key} className="bg-cream rounded-3xl p-7 ring-1 ring-ink/5">
            <div className="flex items-center gap-4 mb-6">
              <div className="font-serif text-[26px] text-ink">{m.name}</div>
              <div className="h-px flex-1 bg-ink/10" />
              <div className="text-[12px] text-muted">{evs.length} événement{evs.length > 1 ? 's' : ''}</div>
            </div>
            <div className="space-y-3">
              {evs.map((e) => (
                <Link key={e._id} href={`/evenements/${e.slug}`} className="flex items-center gap-5 p-4 rounded-2xl hover:bg-paper transition-colors group">
                  <div className="w-14 h-14 rounded-xl bg-paper text-ink grid place-items-center font-serif shrink-0">
                    <div className="text-center">
                      <div className="text-xl tabular leading-none">{e.day}</div>
                      <div className="text-[9px] uppercase tracking-widest font-sans font-semibold mt-1">{e.month}</div>
                    </div>
                  </div>
                  <div className="flex-1 min-w-0">
                    <div className="flex items-center gap-2 flex-wrap">
                      <span className="text-[10px] uppercase tracking-widest text-terracotta font-semibold">{e.type}</span>
                      <span className="text-muted/50">·</span>
                      <span className="text-[12px] text-muted">{e.time}</span>
                    </div>
                    <div className="font-serif text-[18px] text-ink mt-1">{e.title}</div>
                    <div className="text-[12.5px] text-coffee/80 mt-1">{e.place}</div>
                  </div>
                  <span className="w-9 h-9 rounded-full bg-forest text-cream grid place-items-center opacity-0 group-hover:opacity-100 transition-opacity shrink-0">
                    <ArrowIcon />
                  </span>
                </Link>
              ))}
            </div>
          </div>
        )
      })}
    </div>
  )
}

export function EventsListView({ events }: { events: EvItem[] }) {
  const [view, setView] = useState<'list' | 'calendar'>('list')
  const featured = events.find(e => e.featured) ?? events[0]
  const rest = events.filter(e => e._id !== featured?._id)

  return (
    <section className="py-16">
      <div className="max-w-page mx-auto px-6">
        <div className="flex flex-wrap items-center justify-between gap-6 mb-10">
          <div className="flex items-center gap-2 bg-paper rounded-full p-1.5">
            <button
              onClick={() => setView('list')}
              className={`px-5 py-2 rounded-full text-[13px] font-semibold transition-colors ${view === 'list' ? 'bg-forest text-cream' : 'text-ink'}`}
            >
              Liste
            </button>
            <button
              onClick={() => setView('calendar')}
              className={`px-5 py-2 rounded-full text-[13px] font-semibold transition-colors ${view === 'calendar' ? 'bg-forest text-cream' : 'text-ink'}`}
            >
              Calendrier
            </button>
          </div>
          <div className="text-[13px] text-muted">{events.length} événement{events.length > 1 ? 's' : ''} à venir</div>
        </div>

        {view === 'list' ? (
          <>
            {featured && <FeaturedEvent e={featured} />}
            <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
              {rest.map((e) => <EventCard key={e._id} e={e} />)}
            </div>
          </>
        ) : (
          <CalendarView events={events} />
        )}
      </div>
    </section>
  )
}
