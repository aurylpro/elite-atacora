'use client'

import { useEffect, useRef, useState } from 'react'

export function Counter({ to, suffix = '' }: { to: number; suffix?: string }) {
  const [n, setN] = useState(0)
  const ref = useRef<HTMLSpanElement>(null)
  const started = useRef(false)

  useEffect(() => {
    const io = new IntersectionObserver((entries) => {
      entries.forEach((e) => {
        if (e.isIntersecting && !started.current) {
          started.current = true
          const start = performance.now()
          const dur = 1600
          const tick = (t: number) => {
            const p = Math.min(1, (t - start) / dur)
            const eased = 1 - Math.pow(1 - p, 3)
            setN(Math.round(eased * to))
            if (p < 1) requestAnimationFrame(tick)
          }
          requestAnimationFrame(tick)
        }
      })
    }, { threshold: 0.4 })
    if (ref.current) io.observe(ref.current)
    return () => io.disconnect()
  }, [to])

  return (
    <span ref={ref} className="tabular">
      {n.toLocaleString('fr-FR')}{suffix}
    </span>
  )
}
