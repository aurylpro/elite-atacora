'use client'

import { useEffect, useState } from 'react'
import Image from 'next/image'

type Photo = { src: string; caption: string }

export function Gallery({ photos }: { photos: Photo[] }) {
  const [open, setOpen] = useState<number | null>(null)

  useEffect(() => {
    const onKey = (e: KeyboardEvent) => {
      if (e.key === 'Escape') setOpen(null)
    }
    if (open !== null) {
      window.addEventListener('keydown', onKey)
      document.body.style.overflow = 'hidden'
    }
    return () => {
      window.removeEventListener('keydown', onKey)
      document.body.style.overflow = ''
    }
  }, [open])

  return (
    <>
      <div className="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        {photos.map((p, i) => (
          <button
            key={p.src}
            onClick={() => setOpen(i)}
            className={`group relative rounded-2xl overflow-hidden ring-1 ring-ink/5 card-hover text-left
              ${i % 5 === 0 ? 'md:col-span-2 md:row-span-2 aspect-square' : 'aspect-square'}`}
            aria-label={`Ouvrir : ${p.caption}`}
          >
            <Image src={p.src} alt={p.caption} fill className="object-cover transition-transform duration-700 group-hover:scale-105" sizes="(max-width:768px) 50vw, 25vw" />
            <div className="absolute inset-0 bg-gradient-to-t from-ink/70 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity" />
            <div className="absolute bottom-3 left-3 right-3 text-cream text-[12px] opacity-0 group-hover:opacity-100 transition-opacity">
              {p.caption}
            </div>
          </button>
        ))}
      </div>

      {open !== null && (
        <div
          onClick={() => setOpen(null)}
          className="fixed inset-0 z-[200] bg-ink/85 backdrop-blur grid place-items-center p-4"
          role="dialog"
          aria-modal="true"
          aria-label={photos[open].caption}
        >
          <div className="max-w-4xl w-full" onClick={(e) => e.stopPropagation()}>
            <div className="relative w-full max-h-[80vh]" style={{ aspectRatio: '4/3' }}>
              <Image src={photos[open].src} alt={photos[open].caption} fill className="object-contain rounded-2xl" sizes="100vw" />
            </div>
            <div className="mt-4 flex items-center justify-between text-cream">
              <div className="font-serif text-[18px]">{photos[open].caption}</div>
              <button onClick={() => setOpen(null)} className="w-10 h-10 rounded-full bg-cream/10 hover:bg-cream/20 grid place-items-center" aria-label="Fermer">
                <svg width="14" height="14" viewBox="0 0 16 16" fill="none" aria-hidden="true">
                  <path d="M3 3 L13 13 M13 3 L3 13" stroke="currentColor" strokeWidth="1.8" strokeLinecap="round" />
                </svg>
              </button>
            </div>
          </div>
        </div>
      )}
    </>
  )
}
