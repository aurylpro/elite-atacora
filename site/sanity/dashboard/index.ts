import { definePlugin } from 'sanity'
import { HomeIcon } from '@sanity/icons'
import { AdminDashboard } from './AdminDashboard'

/**
 * Plugin Sanity qui ajoute un Tool "Tableau de bord" comme première entrée
 * de la barre supérieure du Studio.
 */
export const adminDashboard = definePlugin({
  name: 'admin-dashboard',
  tools: [
    {
      name: 'dashboard',
      title: 'Tableau de bord',
      icon: HomeIcon,
      component: AdminDashboard,
    },
  ],
})
