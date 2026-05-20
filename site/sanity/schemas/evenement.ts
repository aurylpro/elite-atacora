import { defineField, defineType } from 'sanity'

export default defineType({
  name: 'evenement',
  title: 'Événement',
  type: 'document',
  groups: [
    { name: 'main',     title: 'Contenu principal', default: true },
    { name: 'logistic', title: 'Date & lieu' },
    { name: 'program',  title: 'Programme' },
    { name: 'options',  title: 'Options' },
  ],
  fields: [
    defineField({
      name: 'titre',
      title: 'Titre',
      type: 'string',
      group: 'main',
      validation: (Rule) => Rule.required().max(120),
    }),
    defineField({
      name: 'slug',
      title: 'URL (slug)',
      type: 'slug',
      group: 'main',
      options: { source: 'titre', maxLength: 96 },
      validation: (Rule) => Rule.required(),
    }),
    defineField({
      name: 'image',
      title: 'Image principale',
      type: 'image',
      group: 'main',
      options: { hotspot: true },
      fields: [
        { name: 'alt', type: 'string', title: 'Description (alt)' },
      ],
    }),
    defineField({
      name: 'type',
      title: 'Type d\'événement',
      type: 'string',
      group: 'main',
      options: {
        list: [
          { title: 'Statutaire',      value: 'Statutaire' },
          { title: 'Atelier',         value: 'Atelier' },
          { title: 'Sensibilisation', value: 'Sensibilisation' },
          { title: 'Programme',       value: 'Programme' },
          { title: 'Forum',           value: 'Forum' },
          { title: 'Distribution',    value: 'Distribution' },
          { title: 'Partenariat',     value: 'Partenariat' },
        ],
        layout: 'dropdown',
      },
      initialValue: 'Programme',
      validation: (R) => R.required(),
    }),
    defineField({
      name: 'description',
      title: 'Description courte',
      type: 'text',
      group: 'main',
      rows: 3,
      validation: (Rule) => Rule.max(300),
    }),
    defineField({
      name: 'contenu',
      title: 'Description complète',
      type: 'array',
      group: 'main',
      of: [
        {
          type: 'block',
          styles: [
            { title: 'Paragraphe', value: 'normal' },
            { title: 'Titre H2',   value: 'h2' },
            { title: 'Titre H3',   value: 'h3' },
          ],
          lists: [
            { title: 'Puces', value: 'bullet' },
            { title: 'Numérotée', value: 'number' },
          ],
        },
        { type: 'image', options: { hotspot: true } },
      ],
    }),

    // ── Logistique ─────────────────────────────────────────────────────────
    defineField({
      name: 'dateDebut',
      title: 'Date et heure de début',
      type: 'datetime',
      group: 'logistic',
      options: { dateFormat: 'DD/MM/YYYY', timeFormat: 'HH:mm' },
      validation: (Rule) => Rule.required(),
    }),
    defineField({
      name: 'dateFin',
      title: 'Date et heure de fin (optionnel)',
      type: 'datetime',
      group: 'logistic',
      options: { dateFormat: 'DD/MM/YYYY', timeFormat: 'HH:mm' },
    }),
    defineField({
      name: 'lieu',
      title: 'Lieu (adresse complète)',
      type: 'string',
      group: 'logistic',
      validation: (Rule) => Rule.required(),
    }),
    defineField({
      name: 'ville',
      title: 'Ville (résumé court)',
      type: 'string',
      group: 'logistic',
      description: 'Affiché dans la fiche : "Natitingou", "Boukombé", etc.',
    }),

    // ── Programme ──────────────────────────────────────────────────────────
    defineField({
      name: 'agenda',
      title: 'Programme horaire de la journée',
      type: 'array',
      group: 'program',
      of: [{
        type: 'object',
        fields: [
          defineField({ name: 'time', title: 'Heure', type: 'string', description: 'Ex : "09h15"', validation: (R) => R.required() }),
          defineField({ name: 'item', title: 'Activité', type: 'string', validation: (R) => R.required() }),
        ],
        preview: { select: { title: 'item', subtitle: 'time' } },
      }],
    }),

    // ── Options ────────────────────────────────────────────────────────────
    defineField({
      name: 'featured',
      title: 'À la une (mettre en avant)',
      type: 'boolean',
      group: 'options',
      initialValue: false,
      description: 'Si activé, sera la grande carte du haut sur la page Événements et l\'accueil.',
    }),
    defineField({
      name: 'organisateur',
      title: 'Organisateur',
      type: 'string',
      group: 'options',
      initialValue: 'ONG Elite Atacora',
    }),
  ],
  preview: {
    select: {
      title: 'titre',
      media: 'image',
      subtitle: 'lieu',
    },
  },
  orderings: [
    {
      title: 'Date (prochain → passé)',
      name: 'dateAsc',
      by: [{ field: 'dateDebut', direction: 'asc' }],
    },
    {
      title: 'Date (passé → prochain)',
      name: 'dateDesc',
      by: [{ field: 'dateDebut', direction: 'desc' }],
    },
  ],
})
