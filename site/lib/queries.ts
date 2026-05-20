import { client } from './sanity'

/**
 * `no-store` : désactive le cache de données Next.js pour les requêtes Sanity.
 * Combiné à `export const dynamic = 'force-dynamic'` sur les pages, toute
 * modification faite dans le Studio apparaît immédiatement sur le site.
 */
const NO_CACHE = { cache: 'no-store' as const }

// ── Réglages site (singleton) ─────────────────────────────────────────────────

export async function getSiteSettings() {
  return client.fetch(
    `*[_type == "siteSettings"][0] {
      homeHero { image, imageCaption, quote },
      homeStats[] { value, suffix, label, note },
      homeMarquee,
      aboutHero,
      govHero,
      actionsHero,
      contact { adresse, telephone, email, horaires },
      social  { facebook, instagram, linkedin, whatsapp }
    }`,
    {},
    NO_CACHE,
  )
}

// ── Articles ──────────────────────────────────────────────────────────────────

export async function getArticles(limit = 100) {
  return client.fetch(
    `*[_type == "article"] | order(datePublication desc) [0...$limit] {
      _id, titre, slug, imageALaUne, categorie, extrait, datePublication,
      aLaUne, tempsLecture
    }`,
    { limit },
    NO_CACHE,
  )
}

export async function getArticleBySlug(slug: string) {
  return client.fetch(
    `*[_type == "article" && slug.current == $slug][0] {
      _id, titre, slug, imageALaUne, categorie, extrait, contenu,
      datePublication, auteur, auteurRole, tempsLecture, tags
    }`,
    { slug },
    NO_CACHE,
  )
}

export async function getLatestArticles(limit = 3) {
  return client.fetch(
    `*[_type == "article"] | order(datePublication desc) [0...$limit] {
      _id, titre, slug, imageALaUne, categorie, extrait, datePublication,
      tempsLecture
    }`,
    { limit },
    NO_CACHE,
  )
}

// ── Événements ────────────────────────────────────────────────────────────────

export async function getEvenements() {
  return client.fetch(
    `*[_type == "evenement"] | order(dateDebut asc) {
      _id, titre, slug, image, dateDebut, dateFin, lieu, ville,
      description, type, featured
    }`,
    {},
    NO_CACHE,
  )
}

export async function getUpcomingEvenements(limit = 3) {
  const now = new Date().toISOString()
  return client.fetch(
    `*[_type == "evenement" && dateDebut >= $now] | order(dateDebut asc) [0...$limit] {
      _id, titre, slug, image, dateDebut, dateFin, lieu, ville,
      description, type, featured
    }`,
    { now, limit },
    NO_CACHE,
  )
}

export async function getEvenementBySlug(slug: string) {
  return client.fetch(
    `*[_type == "evenement" && slug.current == $slug][0] {
      _id, titre, slug, image, dateDebut, dateFin, lieu, ville,
      description, contenu, type, agenda, featured, organisateur
    }`,
    { slug },
    NO_CACHE,
  )
}

// ── Membres ───────────────────────────────────────────────────────────────────

export async function getMembres() {
  return client.fetch(
    `*[_type == "membre"] | order(ordre asc) {
      _id, nom, poste, photo, organe, ordre
    }`,
    {},
    NO_CACHE,
  )
}
