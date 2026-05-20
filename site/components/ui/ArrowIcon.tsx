export function ArrowIcon({ size = 13, className = '' }: { size?: number; className?: string }) {
  return (
    <svg width={size} height={size * 0.78} viewBox="0 0 16 12" fill="none" className={className} aria-hidden="true">
      <path d="M1 6 H14 M10 1.5 L14.5 6 L10 10.5" stroke="currentColor" strokeWidth="1.6" strokeLinecap="round" strokeLinejoin="round" />
    </svg>
  )
}
