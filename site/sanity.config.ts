'use client'

import { defineConfig } from 'sanity'
import { structureTool } from 'sanity/structure'
import { visionTool } from '@sanity/vision'
import { media } from 'sanity-plugin-media'
import {
  DocumentTextIcon, CalendarIcon, UsersIcon, ControlsIcon,
  HomeIcon, ImagesIcon, CogIcon,
} from '@sanity/icons'
import { schemaTypes } from './sanity/schemas'
import { adminDashboard } from './sanity/dashboard'
import { StudioLogo } from './sanity/dashboard/StudioLogo'

const projectId = process.env.NEXT_PUBLIC_SANITY_PROJECT_ID!
const dataset   = process.env.NEXT_PUBLIC_SANITY_DATASET!

export default defineConfig({
  basePath: '/studio',
  projectId,
  dataset,
  title: 'Espace admin — Elite Atacora',

  plugins: [
    // Dashboard custom en première position (devient la home du studio)
    adminDashboard(),

    // Bibliothèque de médias
    media(),

    // Structure custom (sidebar de gauche)
    structureTool({
      title: 'Contenus',
      structure: (S) =>
        S.list()
          .title('Espace admin')
          .items([
            // Singleton — Réglages du site
            S.listItem()
              .title('Réglages du site')
              .icon(CogIcon)
              .child(
                S.editor()
                  .id('siteSettings')
                  .schemaType('siteSettings')
                  .documentId('siteSettings'),
              ),

            S.divider(),

            // Sections de contenu
            S.listItem()
              .title('Articles & actualités')
              .icon(DocumentTextIcon)
              .child(
                S.documentTypeList('article')
                  .title('Articles')
                  .defaultOrdering([{ field: 'datePublication', direction: 'desc' }]),
              ),

            S.listItem()
              .title('Événements')
              .icon(CalendarIcon)
              .child(
                S.documentTypeList('evenement')
                  .title('Événements')
                  .defaultOrdering([{ field: 'dateDebut', direction: 'asc' }]),
              ),

            S.listItem()
              .title('Membres du Bureau')
              .icon(UsersIcon)
              .child(
                S.documentTypeList('membre')
                  .title('Membres')
                  .defaultOrdering([{ field: 'ordre', direction: 'asc' }]),
              ),
          ]),
    }),

    // Vision (uniquement pour les développeurs)
    visionTool({ title: 'Requêtes (dev)' }),
  ],

  schema: {
    types: schemaTypes,
    // Empêche la création de doublons du singleton via la sidebar
    templates: (templates) =>
      templates.filter(({ schemaType }) => schemaType !== 'siteSettings'),
  },

  document: {
    // Cache "Dupliquer", "Delete" sur le siteSettings singleton
    actions: (prev, { schemaType }) => {
      if (schemaType === 'siteSettings') {
        return prev.filter(({ action }) => !['duplicate', 'delete', 'unpublish'].includes(action || ''))
      }
      return prev
    },
    // Cache "New" sur siteSettings dans le menu "New"
    newDocumentOptions: (prev, { creationContext }) => {
      if (creationContext.type === 'global') {
        return prev.filter(({ templateId }) => templateId !== 'siteSettings')
      }
      return prev
    },
  },

  // Logo brandé dans la barre supérieure
  studio: {
    components: {
      logo: StudioLogo,
    },
  },
})
