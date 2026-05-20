import Header from '@/components/Header'
import Footer from '@/components/Footer'

export default function SiteLayout({ children }: { children: React.ReactNode }) {
  return (
    <>
      <a
        href="#main-content"
        className="sr-only focus:not-sr-only focus:absolute focus:top-3 focus:left-3 focus:z-[100] focus:bg-forest focus:text-cream focus:px-4 focus:py-2 focus:rounded-full focus:text-sm focus:font-semibold"
      >
        Aller au contenu principal
      </a>
      <Header />
      <main id="main-content" tabIndex={-1}>
        {children}
      </main>
      <Footer />
    </>
  )
}
