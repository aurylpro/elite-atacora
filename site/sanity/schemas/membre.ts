import { defineField, defineType } from 'sanity'

export default defineType({
  name: 'membre',
  title: 'Membre du Bureau',
  type: 'document',
  fields: [
    defineField({
      name: 'nom',
      title: 'Nom complet',
      type: 'string',
      validation: (Rule) => Rule.required(),
    }),
    defineField({
      name: 'poste',
      title: 'Poste',
      type: 'string',
      validation: (Rule) => Rule.required(),
    }),
    defineField({
      name: 'photo',
      title: 'Photo',
      type: 'image',
      options: { hotspot: true },
      description: 'Optionnel — une initiale sera affichée si pas de photo',
    }),
    defineField({
      name: 'ordre',
      title: 'Ordre d\'affichage',
      type: 'number',
      initialValue: 99,
    }),
    defineField({
      name: 'organe',
      title: 'Organe',
      type: 'string',
      options: {
        list: [
          { title: 'Bureau Exécutif', value: 'be' },
          { title: 'Conseil de Surveillance', value: 'cs' },
        ],
      },
      initialValue: 'be',
    }),
  ],
  preview: {
    select: {
      title: 'nom',
      subtitle: 'poste',
      media: 'photo',
    },
  },
  orderings: [
    {
      title: 'Ordre d\'affichage',
      name: 'ordreAsc',
      by: [{ field: 'ordre', direction: 'asc' }],
    },
  ],
})
