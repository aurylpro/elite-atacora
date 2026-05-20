'use client'

/** Logo affiché dans la barre supérieure du Studio. */
export function StudioLogo() {
  return (
    <span style={{ display: 'inline-flex', alignItems: 'center', gap: 8 }}>
      <span
        style={{
          width: 28, height: 28, borderRadius: '50%',
          background: '#1E5631', color: '#FAF5EA',
          display: 'grid', placeItems: 'center',
          fontFamily: '"DM Serif Display", Georgia, serif',
          fontSize: 14, fontStyle: 'italic',
        }}
      >
        EA
      </span>
      <span
        style={{
          fontFamily: '"DM Serif Display", Georgia, serif',
          fontSize: 17, color: 'inherit',
        }}
      >
        Elite Atacora
      </span>
    </span>
  )
}
