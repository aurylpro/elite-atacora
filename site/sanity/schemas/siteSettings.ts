import { defineField, defineType } from 'sanity'

/**
 * Singleton — un seul document de réglages globaux pour tout le site.
 * Pilote les images du hero, les stats, le marquee, les citations,
 * et les coordonnées affichées dans le footer/contact.
 */
export default defineType({
  name: 'siteSettings',
  title: 'Réglages du site',
  type: 'document',
  groups: [
    { name: 'home',    title: 'Accueil',     default: true },
    { name: 'about',   title: 'À propos' },
    { name: 'gov',     title: 'Gouvernance' },
    { name: 'actions', title: 'Nos actions' },
    { name: 'global',  title: 'Coordonnées & social' },
  ],
  fields: [
    // ── ACCUEIL ──────────────────────────────────────────────────────────────
    defineField({
      name: 'homeHero',
      title: 'Hero — Image et citation',
      type: 'object',
      group: 'home',
      fields: [
        defineField({
          name: 'image',
          title: 'Image principale du hero',
          type: 'image',
          options: { hotspot: true },
          description: 'Format vertical recommandé (3/4). Idéal : 900×1200 px.',
        }),
        defineField({
          name: 'imageCaption',
          title: 'Légende dans la photo (haut)',
          type: 'string',
          description: 'Petit texte au-dessus de la citation. Ex : "Assemblée Générale 2025".',
        }),
        defineField({
          name: 'quote',
          title: 'Citation',
          type: 'string',
          description: 'Ex : « Notre force, c\'est notre communauté. »',
        }),
      ],
    }),
    defineField({
      name: 'homeStats',
      title: 'Compteurs animés (4 max)',
      type: 'array',
      group: 'home',
      validation: (R) => R.max(4),
      of: [{
        type: 'object',
        fields: [
          defineField({ name: 'value',  title: 'Chiffre',     type: 'number',  validation: (R) => R.required() }),
          defineField({ name: 'suffix', title: 'Suffixe',     type: 'string',  description: 'Ex : "+", "%"' }),
          defineField({ name: 'label',  title: 'Étiquette',   type: 'string',  validation: (R) => R.required() }),
          defineField({ name: 'note',   title: 'Note (sous l\'étiquette)', type: 'string' }),
        ],
        preview: {
          select: { title: 'label', subtitle: 'value' },
          prepare: ({ title, subtitle }) => ({ title, subtitle: subtitle ? `${subtitle}` : undefined }),
        },
      }],
    }),
    defineField({
      name: 'homeMarquee',
      title: 'Bandeau défilant (marquee)',
      type: 'array',
      group: 'home',
      of: [{ type: 'string' }],
      description: 'Messages courts. Tournent en boucle sous le hero.',
    }),

    // ── À PROPOS ─────────────────────────────────────────────────────────────
    defineField({
      name: 'aboutHero',
      title: 'Image hero — page À propos',
      type: 'image',
      group: 'about',
      options: { hotspot: true },
    }),

    // ── GOUVERNANCE ──────────────────────────────────────────────────────────
    defineField({
      name: 'govHero',
      title: 'Image hero — page Gouvernance',
      type: 'image',
      group: 'gov',
      options: { hotspot: true },
    }),

    // ── NOS ACTIONS ──────────────────────────────────────────────────────────
    defineField({
      name: 'actionsHero',
      title: 'Image hero — page Nos actions',
      type: 'image',
      group: 'actions',
      options: { hotspot: true },
    }),

    // ── COORDONNÉES ──────────────────────────────────────────────────────────
    defineField({
      name: 'contact',
      title: 'Coordonnées affichées dans le footer & la page contact',
      type: 'object',
      group: 'global',
      fields: [
        defineField({ name: 'adresse',    title: 'Adresse postale', type: 'text', rows: 2, initialValue: 'Quartier Dassagaté\nNatitingou, Atacora · Bénin' }),
        defineField({ name: 'telephone',  title: 'Téléphone', type: 'string', initialValue: '(+229) 01 94 05 50 90' }),
        defineField({ name: 'email',      title: 'Email',     type: 'string', initialValue: 'contact@eliteatacora.org' }),
        defineField({ name: 'horaires',   title: 'Horaires d\'ouverture', type: 'text', rows: 2, initialValue: 'Lun → Ven · 08h-17h\nSam · 09h-13h' }),
      ],
    }),
    defineField({
      name: 'social',
      title: 'Réseaux sociaux',
      type: 'object',
      group: 'global',
      fields: [
        defineField({ name: 'facebook',  title: 'Facebook',  type: 'url' }),
        defineField({ name: 'instagram', title: 'Instagram', type: 'url' }),
        defineField({ name: 'linkedin',  title: 'LinkedIn',  type: 'url' }),
        defineField({ name: 'whatsapp',  title: 'WhatsApp (lien wa.me)', type: 'url' }),
      ],
    }),
  ],
  preview: {
    prepare: () => ({ title: 'Réglages du site' }),
  },
})
