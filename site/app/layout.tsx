import type { Metadata } from 'next'
import './globals.css'

export const metadata: Metadata = {
  title: {
    template: '%s — ONG Elite Atacora',
    default: 'ONG Elite Atacora — Développement communautaire au Bénin',
  },
  description:
    'ONG béninoise engagée pour l\'autonomisation des femmes, l\'éducation des enfants et la résilience des communautés du département de l\'Atacora. ODD 4 & 5.',
  metadataBase: new URL('https://elite-atacora.org'),
  openGraph: {
    type: 'website',
    locale: 'fr_FR',
    siteName: 'ONG Elite Atacora',
  },
  robots: {
    index: true,
    follow: true,
  },
}

export default function RootLayout({ children }: { children: React.ReactNode }) {
  return (
    <html lang="fr">
      <head>
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossOrigin="anonymous" />
      </head>
      <body>{children}</body>
    </html>
  )
}
