'use client'

import { useState } from 'react'

export type FaqItem = { q: string; a: string }

export function FaqAccordion({ items }: { items: FaqItem[] }) {
  const [open, setOpen] = useState<number>(0)
  return (
    <div className="space-y-3">
      {items.map((f, i) => (
        <div key={f.q} className="bg-paper rounded-2xl overflow-hidden">
          <button
            onClick={() => setOpen(open === i ? -1 : i)}
            className="w-full flex items-center justify-between gap-4 p-6 text-left"
            aria-expanded={open === i}
          >
            <span className="font-serif text-[18px] text-ink">{f.q}</span>
            <span className={`w-9 h-9 rounded-full bg-cream grid place-items-center shrink-0 transition-transform ${open === i ? 'rotate-45' : ''}`}>
              <svg width="14" height="14" viewBox="0 0 14 14" fill="none" aria-hidden="true">
                <path d="M7 1 V13 M1 7 H13" stroke="currentColor" strokeWidth="1.5" strokeLinecap="round" />
              </svg>
            </span>
          </button>
          {open === i && (
            <div className="px-6 pb-6 text-coffee text-[15px] leading-[1.7]">{f.a}</div>
          )}
        </div>
      ))}
    </div>
  )
}
