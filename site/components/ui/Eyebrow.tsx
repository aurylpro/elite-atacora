import type { ReactNode } from 'react'

type Color = 'forest' | 'terracotta' | 'honey' | 'cream'

const colorClass: Record<Color, string> = {
  forest: 'text-forest',
  terracotta: 'text-terracotta',
  honey: 'text-coffee',
  cream: 'text-honey',
}

export function Eyebrow({ children, color = 'forest' }: { children: ReactNode; color?: Color }) {
  return (
    <div className={`inline-flex items-center gap-3 text-[12px] font-semibold uppercase tracking-[0.18em] ${colorClass[color]}`}>
      <span className="w-6 h-px bg-current" />
      <span>{children}</span>
    </div>
  )
}
