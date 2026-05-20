/**
 * Sanity Studio — embarqué dans Next.js
 * Accessible à /studio (admin uniquement)
 *
 * La Chargée de Communication se connecte ici pour publier
 * des articles, événements et gérer les membres du bureau.
 */
import { NextStudio } from 'next-sanity/studio'
import config from '../../../sanity.config'

export const dynamic = 'force-dynamic'

export { metadata, viewport } from 'next-sanity/studio'

export default function StudioPage() {
  return <NextStudio config={config} />
}
