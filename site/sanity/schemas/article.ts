import { defineField, defineType } from 'sanity'

export default defineType({
  name: 'article',
  title: 'Article / Actualité',
  type: 'document',
  groups: [
    { name: 'main',    title: 'Contenu principal', default: true },
    { name: 'meta',    title: 'Métadonnées' },
    { name: 'options', title: 'Options' },
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
      name: 'imageALaUne',
      title: 'Image à la une',
      type: 'image',
      group: 'main',
      options: { hotspot: true },
      fields: [
        { name: 'alt', type: 'string', title: 'Description (alt) — accessibilité' },
      ],
    }),
    defineField({
      name: 'categorie',
      title: 'Catégorie',
      type: 'string',
      group: 'meta',
      options: {
        list: [
          { title: 'Programme',  value: 'Programme' },
          { title: 'Partenariat', value: 'Partenariat' },
          { title: 'Terrain',    value: 'Terrain' },
          { title: 'Témoignage', value: 'Témoignage' },
          { title: 'Rapport',    value: 'Rapport' },
          { title: 'Presse',     value: 'Presse' },
        ],
        layout: 'radio',
      },
      initialValue: 'Programme',
      validation: (R) => R.required(),
    }),
    defineField({
      name: 'extrait',
      title: 'Extrait (résumé court)',
      type: 'text',
      group: 'main',
      rows: 3,
      description: 'Apparaît sur la liste des articles et l\'accueil. 150 caractères max.',
      validation: (Rule) => Rule.max(180),
    }),
    defineField({
      name: 'contenu',
      title: 'Contenu de l\'article',
      type: 'array',
      group: 'main',
      of: [
        {
          type: 'block',
          styles: [
            { title: 'Paragraphe', value: 'normal' },
            { title: 'Titre H2',   value: 'h2' },
            { title: 'Titre H3',   value: 'h3' },
            { title: 'Citation',   value: 'blockquote' },
          ],
          lists: [
            { title: 'Puces', value: 'bullet' },
            { title: 'Numérotée', value: 'number' },
          ],
          marks: {
            decorators: [
              { title: 'Gras',     value: 'strong' },
              { title: 'Italique', value: 'em' },
              { title: 'Souligné', value: 'underline' },
            ],
            annotations: [
              {
                name: 'link',
                type: 'object',
                title: 'Lien',
                fields: [
                  { name: 'href', type: 'url', title: 'URL' },
                  { name: 'blank', type: 'boolean', title: 'Nouvel onglet ?' },
                ],
              },
            ],
          },
        },
        {
          type: 'image',
          options: { hotspot: true },
          fields: [
            { name: 'alt', type: 'string', title: 'Description (alt)' },
            { name: 'caption', type: 'string', title: 'Légende sous l\'image' },
          ],
        },
      ],
    }),
    defineField({
      name: 'auteur',
      title: 'Auteur',
      type: 'string',
      group: 'meta',
      description: 'Nom et prénom — ex : "ZOUNTCHEGBE Yanick"',
    }),
    defineField({
      name: 'auteurRole',
      title: 'Rôle de l\'auteur',
      type: 'string',
      group: 'meta',
      description: 'Ex : "Chargée de la Communication"',
    }),
    defineField({
      name: 'tempsLecture',
      title: 'Temps de lecture (minutes)',
      type: 'number',
      group: 'meta',
      initialValue: 3,
      validation: (R) => R.min(1).max(60),
    }),
    defineField({
      name: 'tags',
      title: 'Tags',
      type: 'array',
      group: 'meta',
      of: [{ type: 'string' }],
      options: { layout: 'tags' },
    }),
    defineField({
      name: 'datePublication',
      title: 'Date de publication',
      type: 'date',
      group: 'meta',
      options: { dateFormat: 'DD/MM/YYYY' },
      validation: (R) => R.required(),
    }),
    defineField({
      name: 'aLaUne',
      title: 'Mettre en avant sur l\'accueil',
      type: 'boolean',
      group: 'options',
      initialValue: false,
    }),
  ],
  preview: {
    select: {
      title: 'titre',
      media: 'imageALaUne',
      subtitle: 'categorie',
    },
  },
  orderings: [
    {
      title: 'Date de publication (récent → ancien)',
      name: 'dateDesc',
      by: [{ field: 'datePublication', direction: 'desc' }],
    },
  ],
})
