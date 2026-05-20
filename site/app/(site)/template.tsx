// Next.js re-monte un template à chaque navigation — parfait pour rejouer
// l'animation de fade-in (sans rester actif au scroll comme un layout).
export default function Template({ children }: { children: React.ReactNode }) {
  return <div className="page-fade-in">{children}</div>
}
