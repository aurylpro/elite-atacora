import { createClient } from '@sanity/client'
import imageUrlBuilder from '@sanity/image-url'
import type { SanityImageSource } from '@sanity/image-url/lib/types/types'

export const client = createClient({
  projectId: process.env.NEXT_PUBLIC_SANITY_PROJECT_ID || 'placeholder',
  dataset:   process.env.NEXT_PUBLIC_SANITY_DATASET   || 'production',
  apiVersion: '2024-01-01',
  // useCdn: false → données toujours fraîches (pas de cache CDN).
  // Combiné à `dynamic = 'force-dynamic'` sur les pages, les modifications
  // faites dans le Studio apparaissent immédiatement sur le site.
  useCdn: false,
  token: process.env.SANITY_API_READ_TOKEN,
  perspective: 'published',
})

const builder = imageUrlBuilder(client)

export function urlFor(source: SanityImageSource) {
  return builder.image(source)
}
