# Technical Design Document (TDD)
## Site Web Vitrine — ONG ELITE ATACORA
### Intégration WordPress · Astra Child · Elementor Free · Design Brutaliste
**Version :** 1.0 | **Date :** 18 mai 2026 | **Auteur :** Joseph Auryl AKAKPO

---

## Table des matières

1. [Charte de design brutaliste](#1-charte-de-design-brutaliste)
2. [Structure du Thème Enfant Astra](#2-structure-du-thème-enfant-astra)
3. [Code source complet — style.css](#3-code-source-complet--stylecss)
4. [Code source complet — functions.php](#4-code-source-complet--functionsphp)
5. [CSS modulaires additionnels](#5-css-modulaires-additionnels)
6. [Configuration Elementor — Réglages globaux](#6-configuration-elementor--réglages-globaux)
7. [Variables CSS globales (Design Tokens)](#7-variables-css-globales-design-tokens)
8. [Spécifications typographiques](#8-spécifications-typographiques)
9. [Grille et espacements](#9-grille-et-espacements)
10. [Composants UI — spécifications par élément](#10-composants-ui--spécifications-par-élément)
11. [Checklist d'intégration](#11-checklist-dintégration)

---

## 1. Charte de design brutaliste

### 1.1 Philosophie

Le design brutaliste appliqué à ce site repose sur trois principes :
- **Honnêteté structurelle** : les bordures remplacent les ombres. La hiérarchie est exprimée par la taille et le poids typographique, jamais par des effets décoratifs.
- **Économie de couleur** : la base est monochrome (blanc/noir/gris). Les couleurs de la charte (vert, jaune, rouge) sont des **signaux**, pas de la décoration. Elles n'apparaissent que pour des éléments à action ou à valeur sémantique.
- **Clarté fonctionnelle** : chaque élément graphique a une raison d'exister. Aucun radius excessif, aucun gradient, aucune ombre portée.

### 1.2 Palette complète

| Rôle | Nom | Hex | Usage |
|---|---|---|---|
| Fond principal | Blanc pur | `#FFFFFF` | Background global |
| Fond secondaire | Gris très clair | `#F4F4F2` | Sections alternées, cards |
| Texte principal | Noir profond | `#0D0D0D` | Corps de texte, titres |
| Texte secondaire | Gris moyen | `#5C5C5C` | Sous-titres, métadonnées, captions |
| Bordure standard | Gris foncé | `#1A1A1A` | Tous les contours de composants |
| Bordure légère | Gris clair | `#D4D4D4` | Séparateurs, dividers |
| **Accent Vert** | Vert ONG | `#2E7D32` | CTA primaires, liens actifs, tags |
| **Accent Jaune** | Or ONG | `#F9A825` | Highlights, badges, soulignements |
| **Accent Rouge** | Rouge ONG | `#B71C1C` | Alertes, erreurs, éléments urgents |
| Vert clair (hover) | Vert atténué | `#1B5E20` | État hover des éléments verts |

### 1.3 Règles d'application des couleurs

- Le vert `#2E7D32` est **réservé aux actions principales** : bouton CTA primaire, lien actif, icône d'action.
- Le jaune `#F9A825` est **réservé aux accents positifs** : tag "Nouveau", soulignement d'un mot-clé, badge "À la une".
- Le rouge `#B71C1C` est **réservé aux états d'erreur** : message d'erreur formulaire, alerte critique.
- **Aucune de ces trois couleurs ne doit apparaître en fond de section entière.** Elles sont des touches, jamais des fonds.

---

## 2. Structure du Thème Enfant Astra

### 2.1 Arborescence complète

```
wp-content/themes/
└── astra-child/
    ├── style.css              ← Déclaration du thème enfant + CSS global brutaliste
    ├── functions.php          ← Enqueue parent + child styles + Google Fonts + hooks
    ├── screenshot.png         ← Aperçu thème (1200×900px)
    │
    └── assets/
        ├── css/
        │   ├── elementor-overrides.css    ← Suppression ombres/radius Elementor
        │   ├── components.css             ← Boutons, cards, badges, formulaires
        │   ├── header-footer.css          ← Header sticky + footer brutaliste
        │   └── responsive.css             ← Breakpoints mobile/tablette
        │
        ├── js/
        │   └── custom.js                  ← Hamburger menu, smooth scroll
        │
        └── images/
            └── logo-elite-atacora.jpeg    ← Copie du logo pour usage CSS si besoin
```

### 2.2 Règle de précédence CSS

```
Ordre de chargement (du moins prioritaire au plus prioritaire) :
1. astra/style.css          (thème parent — base)
2. elementor/frontend.css   (styles Elementor générés)
3. astra-child/style.css    (overrides globaux brutalistes)
4. assets/css/elementor-overrides.css
5. assets/css/components.css
6. assets/css/header-footer.css
7. assets/css/responsive.css
8. Styles inline Elementor  (générés par le builder — à désactiver au maximum)
```

---

## 3. Code source complet — `style.css`

Ce fichier remplit deux rôles : **(1)** déclarer le thème enfant à WordPress, **(2)** injecter les variables CSS globales, les resets brutalistes et les overrides Astra.

```css
/*
Theme Name:   Astra Child — Elite Atacora
Theme URI:    https://eliteatacora.org
Description:  Thème enfant brutaliste pour l'ONG Elite Atacora.
              Base : Astra. Design : minimaliste, bordures strictes 1px,
              palette monochrome avec accents ONG (Vert/Jaune/Rouge).
Author:       Joseph Auryl AKAKPO
Template:     astra
Version:      1.0.0
Text Domain:  astra-child
*/

/* ============================================================
   1. DESIGN TOKENS (CSS Custom Properties)
   ============================================================ */

:root {
  /* Couleurs base */
  --color-bg:           #FFFFFF;
  --color-bg-alt:       #F4F4F2;
  --color-text:         #0D0D0D;
  --color-text-muted:   #5C5C5C;
  --color-border:       #1A1A1A;
  --color-border-light: #D4D4D4;

  /* Accents ONG */
  --color-green:        #2E7D32;
  --color-green-dark:   #1B5E20;
  --color-yellow:       #F9A825;
  --color-red:          #B71C1C;

  /* Typographie */
  --font-heading:       'Montserrat', sans-serif;
  --font-body:          'Open Sans', sans-serif;

  --text-xs:   0.75rem;   /* 12px */
  --text-sm:   0.875rem;  /* 14px */
  --text-base: 1rem;      /* 16px */
  --text-md:   1.125rem;  /* 18px */
  --text-lg:   1.25rem;   /* 20px */
  --text-xl:   1.5rem;    /* 24px */
  --text-2xl:  2rem;      /* 32px */
  --text-3xl:  2.5rem;    /* 40px */
  --text-4xl:  3rem;      /* 48px */

  --weight-regular: 400;
  --weight-medium:  500;
  --weight-bold:    700;
  --weight-black:   900;

  --leading-tight:  1.2;
  --leading-normal: 1.6;
  --leading-loose:  1.8;

  /* Espacements */
  --space-xs:  0.25rem;  /* 4px  */
  --space-sm:  0.5rem;   /* 8px  */
  --space-md:  1rem;     /* 16px */
  --space-lg:  1.5rem;   /* 24px */
  --space-xl:  2rem;     /* 32px */
  --space-2xl: 3rem;     /* 48px */
  --space-3xl: 4rem;     /* 64px */
  --space-4xl: 6rem;     /* 96px */

  /* Bordures */
  --border-width: 1px;
  --border-style: solid;
  --border:       var(--border-width) var(--border-style) var(--color-border);
  --border-light: var(--border-width) var(--border-style) var(--color-border-light);

  /* Grille */
  --container-max: 1200px;
  --container-padding: 1.5rem;

  /* Transitions */
  --transition-fast: 120ms ease;
  --transition-base: 200ms ease;

  /* Zéro radius — brutaliste pur */
  --radius: 0px;
}


/* ============================================================
   2. RESET BRUTALISTE — Suppression des défauts WordPress/Astra
   ============================================================ */

*,
*::before,
*::after {
  box-sizing: border-box;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}

/* Supprimer TOUS les box-shadow Astra par défaut */
*:not(.elite-shadow) {
  box-shadow: none !important;
  -webkit-box-shadow: none !important;
}

/* Supprimer tous les border-radius Astra */
*:not(.elite-radius) {
  border-radius: var(--radius) !important;
  -webkit-border-radius: var(--radius) !important;
}

/* Supprimer les outline browser — remplacé par bordure custom */
*:focus {
  outline: 2px solid var(--color-green) !important;
  outline-offset: 2px !important;
}

html {
  font-size: 16px;
  scroll-behavior: smooth;
}

body {
  font-family: var(--font-body);
  font-size: var(--text-base);
  font-weight: var(--weight-regular);
  color: var(--color-text);
  background-color: var(--color-bg);
  line-height: var(--leading-normal);
  margin: 0;
  padding: 0;
}


/* ============================================================
   3. TYPOGRAPHIE GLOBALE
   ============================================================ */

h1, h2, h3, h4, h5, h6,
.elementor-heading-title {
  font-family: var(--font-heading) !important;
  font-weight: var(--weight-black) !important;
  line-height: var(--leading-tight) !important;
  color: var(--color-text) !important;
  text-transform: uppercase !important;
  letter-spacing: -0.02em;
  margin-bottom: var(--space-md);
}

h1, .h1 { font-size: var(--text-4xl); }
h2, .h2 { font-size: var(--text-3xl); }
h3, .h3 { font-size: var(--text-2xl); }
h4, .h4 { font-size: var(--text-xl); }
h5, .h5 { font-size: var(--text-lg); }
h6, .h6 { font-size: var(--text-md); }

p {
  font-family: var(--font-body);
  font-size: var(--text-base);
  line-height: var(--leading-loose);
  color: var(--color-text);
  margin-bottom: var(--space-md);
}

a {
  color: var(--color-green);
  text-decoration: underline;
  text-underline-offset: 3px;
  transition: color var(--transition-fast);
}

a:hover {
  color: var(--color-green-dark);
}

strong, b {
  font-weight: var(--weight-bold);
}

small, .text-muted {
  font-size: var(--text-sm);
  color: var(--color-text-muted);
}

/* Accent de soulignement jaune sur les titres de section */
.section-title-accent {
  position: relative;
  display: inline-block;
}

.section-title-accent::after {
  content: '';
  display: block;
  width: 48px;
  height: 4px;
  background-color: var(--color-yellow);
  margin-top: var(--space-sm);
}


/* ============================================================
   4. LAYOUT & CONTAINERS
   ============================================================ */

.site-container,
.ast-container,
.elementor-container,
.elementor-section-boxed > .elementor-container {
  max-width: var(--container-max) !important;
  padding-left: var(--container-padding) !important;
  padding-right: var(--container-padding) !important;
  width: 100% !important;
}

/* Sections Elementor — bordure stricte 1px, padding standard */
.elementor-section {
  border-bottom: var(--border-light) !important;
}

.elementor-section:last-of-type {
  border-bottom: none !important;
}

/* Colonnes Elementor — séparateur vertical */
.elementor-column + .elementor-column {
  border-left: var(--border-light) !important;
}

/* Widget Elementor — reset des marges internes */
.elementor-widget-wrap {
  padding: 0 !important;
}

/* Inner sections */
.elementor-inner-section {
  border: var(--border) !important;
  padding: var(--space-xl) !important;
}


/* ============================================================
   5. HEADER ASTRA — Style brutaliste sticky
   ============================================================ */

#masthead,
.site-header,
.ast-site-header-wrap {
  background-color: var(--color-bg) !important;
  border-bottom: var(--border) !important;
  box-shadow: none !important;
  position: sticky !important;
  top: 0;
  z-index: 1000;
}

/* Logo dans le header */
.site-header .site-logo img,
.site-header .custom-logo {
  height: 60px !important;
  width: auto !important;
}

/* Navigation principale */
.main-header-bar .main-navigation a,
#site-navigation a {
  font-family: var(--font-heading) !important;
  font-size: var(--text-sm) !important;
  font-weight: var(--weight-bold) !important;
  text-transform: uppercase !important;
  letter-spacing: 0.05em;
  color: var(--color-text) !important;
  text-decoration: none !important;
  padding: var(--space-sm) var(--space-md) !important;
  transition: background-color var(--transition-fast), color var(--transition-fast);
}

.main-header-bar .main-navigation a:hover,
#site-navigation a:hover {
  background-color: var(--color-text) !important;
  color: var(--color-bg) !important;
}

.main-header-bar .main-navigation .current-menu-item > a,
#site-navigation .current-menu-item > a {
  background-color: var(--color-green) !important;
  color: var(--color-bg) !important;
}

/* Sous-menus */
.main-navigation ul ul {
  border: var(--border) !important;
  background-color: var(--color-bg) !important;
}

.main-navigation ul ul a {
  border-bottom: var(--border-light) !important;
}

/* Menu hamburger mobile */
.ast-mobile-menu-trigger,
button.menu-toggle {
  border: var(--border) !important;
  padding: var(--space-sm) var(--space-md) !important;
  background: transparent !important;
  font-family: var(--font-heading) !important;
  font-weight: var(--weight-bold) !important;
  text-transform: uppercase !important;
  cursor: pointer;
  transition: background-color var(--transition-fast), color var(--transition-fast);
}

.ast-mobile-menu-trigger:hover,
button.menu-toggle:hover {
  background-color: var(--color-text) !important;
  color: var(--color-bg) !important;
}


/* ============================================================
   6. FOOTER BRUTALISTE
   ============================================================ */

.site-footer,
#colophon {
  background-color: var(--color-text) !important;
  color: var(--color-bg) !important;
  border-top: 3px solid var(--color-green) !important;
  padding: var(--space-3xl) 0 var(--space-xl) !important;
}

.site-footer a {
  color: var(--color-bg) !important;
  text-decoration: none;
  font-weight: var(--weight-medium);
  border-bottom: 1px solid rgba(255, 255, 255, 0.3);
  transition: border-color var(--transition-fast), color var(--transition-fast);
}

.site-footer a:hover {
  color: var(--color-yellow) !important;
  border-bottom-color: var(--color-yellow);
}

.site-footer h3,
.site-footer h4,
.site-footer .widget-title {
  color: var(--color-bg) !important;
  font-size: var(--text-sm) !important;
  letter-spacing: 0.1em;
  text-transform: uppercase !important;
  border-bottom: var(--border-width) solid var(--color-yellow) !important;
  padding-bottom: var(--space-sm) !important;
  margin-bottom: var(--space-lg) !important;
}

.footer-bar,
.ast-small-footer {
  background-color: #000000 !important;
  color: var(--color-text-muted) !important;
  font-size: var(--text-xs) !important;
  padding: var(--space-md) 0 !important;
  border-top: var(--border-light) !important;
}


/* ============================================================
   7. BOUTONS — Système à 3 niveaux
   ============================================================ */

/* Bouton primaire (vert) */
.elementor-button,
.btn,
.wp-block-button__link,
input[type="submit"],
button[type="submit"] {
  font-family: var(--font-heading) !important;
  font-size: var(--text-sm) !important;
  font-weight: var(--weight-bold) !important;
  text-transform: uppercase !important;
  letter-spacing: 0.08em;
  padding: var(--space-md) var(--space-xl) !important;
  border: 2px solid var(--color-green) !important;
  background-color: var(--color-green) !important;
  color: var(--color-bg) !important;
  text-decoration: none !important;
  display: inline-block;
  cursor: pointer;
  transition:
    background-color var(--transition-base),
    color var(--transition-base),
    border-color var(--transition-base);
  border-radius: var(--radius) !important;
  box-shadow: none !important;
}

.elementor-button:hover,
.btn:hover,
input[type="submit"]:hover,
button[type="submit"]:hover {
  background-color: transparent !important;
  color: var(--color-green) !important;
  border-color: var(--color-green) !important;
}

/* Bouton secondaire (outline noir) */
.btn-secondary,
.elementor-button.elementor-button-secondary,
.btn-outline {
  background-color: transparent !important;
  border: 2px solid var(--color-text) !important;
  color: var(--color-text) !important;
}

.btn-secondary:hover,
.elementor-button.elementor-button-secondary:hover {
  background-color: var(--color-text) !important;
  color: var(--color-bg) !important;
}

/* Bouton ghost (texte + underline) */
.btn-ghost {
  background-color: transparent !important;
  border: none !important;
  color: var(--color-text) !important;
  text-decoration: underline !important;
  text-underline-offset: 4px;
  padding-left: 0 !important;
  padding-right: 0 !important;
}

.btn-ghost:hover {
  color: var(--color-green) !important;
}


/* ============================================================
   8. CARDS & CONTENEURS BRUTALISTES
   ============================================================ */

/* Card standard : bordure 1px, fond blanc, pas de shadow */
.elite-card {
  border: var(--border) !important;
  background-color: var(--color-bg);
  padding: var(--space-xl);
  transition: transform var(--transition-base), background-color var(--transition-base);
}

.elite-card:hover {
  transform: translate(-2px, -2px);
  background-color: var(--color-bg-alt);
}

/* Card variante sombre */
.elite-card--dark {
  background-color: var(--color-text);
  color: var(--color-bg);
  border-color: var(--color-text);
}

.elite-card--dark h2,
.elite-card--dark h3,
.elite-card--dark p {
  color: var(--color-bg) !important;
}

/* Card avec accent vert (barre gauche) */
.elite-card--accent-green {
  border-left: 4px solid var(--color-green) !important;
}

/* Card avec accent jaune */
.elite-card--accent-yellow {
  border-left: 4px solid var(--color-yellow) !important;
}

/* Widget post Elementor */
.elementor-post__card {
  border: var(--border) !important;
  box-shadow: none !important;
}

.elementor-post__card:hover {
  transform: translate(-3px, -3px) !important;
  box-shadow: 3px 3px 0 var(--color-green) !important;
}

/* Image featured dans les cards */
.elementor-post__thumbnail__link {
  display: block;
  overflow: hidden;
  border-bottom: var(--border) !important;
}

.elementor-post__thumbnail__link img {
  width: 100%;
  height: 220px;
  object-fit: cover;
  display: block;
  transition: transform 300ms ease;
}

.elementor-post__card:hover .elementor-post__thumbnail__link img {
  transform: scale(1.02);
}


/* ============================================================
   9. FORMULAIRES BRUTALISTES
   ============================================================ */

input[type="text"],
input[type="email"],
input[type="tel"],
input[type="url"],
input[type="search"],
textarea,
select,
.wpcf7-form-control:not(.wpcf7-submit):not(.wpcf7-checkbox):not(.wpcf7-acceptance) {
  font-family: var(--font-body) !important;
  font-size: var(--text-base) !important;
  color: var(--color-text) !important;
  background-color: var(--color-bg) !important;
  border: var(--border) !important;
  border-radius: var(--radius) !important;
  padding: var(--space-md) !important;
  width: 100%;
  transition: border-color var(--transition-fast), background-color var(--transition-fast);
  box-shadow: none !important;
  appearance: none;
  -webkit-appearance: none;
}

input[type="text"]:focus,
input[type="email"]:focus,
input[type="tel"]:focus,
textarea:focus,
select:focus {
  border-color: var(--color-green) !important;
  background-color: #F0F7F0 !important;
  outline: none !important;
}

input[type="text"]::placeholder,
input[type="email"]::placeholder,
input[type="tel"]::placeholder,
textarea::placeholder {
  color: var(--color-text-muted);
  font-style: italic;
}

textarea {
  min-height: 160px;
  resize: vertical;
}

/* Labels */
label,
.wpcf7 label {
  font-family: var(--font-heading) !important;
  font-size: var(--text-sm) !important;
  font-weight: var(--weight-bold) !important;
  text-transform: uppercase !important;
  letter-spacing: 0.05em;
  color: var(--color-text) !important;
  display: block;
  margin-bottom: var(--space-xs);
}

/* Champ en erreur */
input.wpcf7-not-valid,
textarea.wpcf7-not-valid {
  border-color: var(--color-red) !important;
  background-color: #FFF5F5 !important;
}

.wpcf7-not-valid-tip {
  font-size: var(--text-sm) !important;
  color: var(--color-red) !important;
  margin-top: var(--space-xs);
}

/* Message de succès CF7 */
.wpcf7-mail-sent-ok {
  border: 2px solid var(--color-green) !important;
  background-color: #F0F7F0 !important;
  color: var(--color-green) !important;
  font-family: var(--font-heading) !important;
  font-weight: var(--weight-bold) !important;
  text-transform: uppercase !important;
  padding: var(--space-md) var(--space-xl) !important;
  font-size: var(--text-sm) !important;
}

/* Checkbox d'acceptation */
.wpcf7-acceptance label {
  font-family: var(--font-body) !important;
  font-size: var(--text-sm) !important;
  font-weight: var(--weight-regular) !important;
  text-transform: none !important;
  display: flex;
  align-items: flex-start;
  gap: var(--space-sm);
}

.wpcf7-acceptance input[type="checkbox"] {
  width: 18px;
  height: 18px;
  border: var(--border) !important;
  flex-shrink: 0;
  accent-color: var(--color-green);
}

/* Select custom arrow */
select {
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='8' viewBox='0 0 12 8'%3E%3Cpath d='M1 1l5 5 5-5' stroke='%230D0D0D' stroke-width='2' fill='none'/%3E%3C/svg%3E");
  background-repeat: no-repeat;
  background-position: right var(--space-md) center;
  padding-right: var(--space-2xl) !important;
  cursor: pointer;
}


/* ============================================================
   10. HERO SECTION SPÉCIFIQUE
   ============================================================ */

.elite-hero {
  background-color: var(--color-bg-alt);
  border-bottom: 3px solid var(--color-green);
  padding: var(--space-4xl) 0;
  position: relative;
}

.elite-hero__title {
  font-size: clamp(var(--text-2xl), 5vw, var(--text-4xl));
  font-family: var(--font-heading);
  font-weight: var(--weight-black);
  text-transform: uppercase;
  line-height: 1.1;
  letter-spacing: -0.03em;
  color: var(--color-text);
  margin-bottom: var(--space-xl);
}

.elite-hero__title span {
  color: var(--color-green);
}

.elite-hero__subtitle {
  font-size: var(--text-lg);
  color: var(--color-text-muted);
  line-height: var(--leading-loose);
  max-width: 600px;
  margin-bottom: var(--space-2xl);
}

.elite-hero__ctas {
  display: flex;
  gap: var(--space-md);
  flex-wrap: wrap;
}


/* ============================================================
   11. SECTION CHIFFRES CLÉS
   ============================================================ */

.elite-stats {
  border-top: var(--border);
  border-bottom: var(--border);
  background-color: var(--color-bg);
}

.elite-stat-item {
  text-align: center;
  padding: var(--space-2xl) var(--space-lg);
  border-right: var(--border-light);
}

.elite-stat-item:last-child {
  border-right: none;
}

.elite-stat-number {
  font-family: var(--font-heading);
  font-size: var(--text-4xl);
  font-weight: var(--weight-black);
  color: var(--color-green);
  display: block;
  line-height: 1;
  margin-bottom: var(--space-sm);
}

.elite-stat-label {
  font-family: var(--font-body);
  font-size: var(--text-sm);
  color: var(--color-text-muted);
  text-transform: uppercase;
  letter-spacing: 0.08em;
}


/* ============================================================
   12. BADGES & TAGS
   ============================================================ */

.elite-badge {
  font-family: var(--font-heading);
  font-size: var(--text-xs);
  font-weight: var(--weight-bold);
  text-transform: uppercase;
  letter-spacing: 0.1em;
  padding: 3px var(--space-sm);
  border: var(--border-width) solid var(--color-text);
  background-color: transparent;
  color: var(--color-text);
  display: inline-block;
}

.elite-badge--green {
  border-color: var(--color-green);
  color: var(--color-green);
}

.elite-badge--yellow {
  border-color: var(--color-yellow);
  background-color: var(--color-yellow);
  color: var(--color-text);
}

.elite-badge--filled {
  background-color: var(--color-text);
  color: var(--color-bg);
}

/* Tag catégorie sur les articles */
.elementor-post__badge {
  font-family: var(--font-heading) !important;
  font-size: var(--text-xs) !important;
  font-weight: var(--weight-bold) !important;
  text-transform: uppercase !important;
  letter-spacing: 0.1em;
  background-color: var(--color-yellow) !important;
  color: var(--color-text) !important;
  padding: 2px var(--space-sm) !important;
  border-radius: 0 !important;
}


/* ============================================================
   13. BLOG — LISTE & ARTICLES INDIVIDUELS
   ============================================================ */

/* Liste */
.elementor-posts-grid .elementor-post {
  border: var(--border) !important;
}

.elementor-post__title a {
  font-family: var(--font-heading) !important;
  font-weight: var(--weight-bold) !important;
  text-decoration: none !important;
  color: var(--color-text) !important;
  font-size: var(--text-lg) !important;
  transition: color var(--transition-fast);
}

.elementor-post__title a:hover {
  color: var(--color-green) !important;
}

.elementor-post__meta-data {
  font-size: var(--text-xs) !important;
  color: var(--color-text-muted) !important;
  text-transform: uppercase !important;
  letter-spacing: 0.08em;
  border-top: var(--border-light);
  padding-top: var(--space-sm);
}

/* Article individuel */
.single-post article {
  max-width: 720px;
  margin: 0 auto;
}

.single-post .entry-title {
  font-size: var(--text-3xl) !important;
  border-bottom: 3px solid var(--color-green);
  padding-bottom: var(--space-md);
  margin-bottom: var(--space-xl);
}

.single-post .entry-meta {
  font-size: var(--text-sm);
  color: var(--color-text-muted);
  text-transform: uppercase;
  letter-spacing: 0.08em;
  margin-bottom: var(--space-xl);
}

.single-post .entry-content {
  font-size: var(--text-md);
  line-height: var(--leading-loose);
}

.single-post .entry-content h2 {
  border-bottom: var(--border-light);
  padding-bottom: var(--space-sm);
  margin-top: var(--space-2xl);
}

.single-post .entry-content blockquote {
  border-left: 4px solid var(--color-green);
  padding-left: var(--space-xl);
  margin: var(--space-2xl) 0;
  font-style: italic;
  color: var(--color-text-muted);
}


/* ============================================================
   14. ÉVÉNEMENTS — The Events Calendar overrides
   ============================================================ */

.tribe-events-calendar td,
.tribe-events-calendar th {
  border: var(--border-light) !important;
}

.tribe-event-url,
.tribe-event-url:hover {
  text-decoration: none;
}

.tribe-events-list-event-title a {
  font-family: var(--font-heading) !important;
  font-weight: var(--weight-bold) !important;
  text-transform: uppercase !important;
  color: var(--color-text) !important;
  text-decoration: none;
}

.tribe-events-list-event-title a:hover {
  color: var(--color-green) !important;
}

.tribe-events-single-section {
  border-top: var(--border) !important;
  padding-top: var(--space-xl) !important;
}

.tribe-events-c-nav {
  border-top: var(--border) !important;
  border-bottom: var(--border) !important;
}

/* Pastille de date événement */
.tribe-event-schedule-details,
.tribe-events-schedule {
  font-family: var(--font-heading) !important;
  font-size: var(--text-sm) !important;
  font-weight: var(--weight-bold) !important;
  text-transform: uppercase !important;
  color: var(--color-green) !important;
}


/* ============================================================
   15. PAGE ADHÉSION — Étapes visuelles
   ============================================================ */

.elite-steps {
  counter-reset: step-counter;
  list-style: none;
  padding: 0;
  margin: 0;
}

.elite-steps__item {
  counter-increment: step-counter;
  display: flex;
  gap: var(--space-xl);
  padding: var(--space-xl) 0;
  border-bottom: var(--border-light);
  align-items: flex-start;
}

.elite-steps__item:last-child {
  border-bottom: none;
}

.elite-steps__number {
  font-family: var(--font-heading);
  font-size: var(--text-4xl);
  font-weight: var(--weight-black);
  color: var(--color-border-light);
  line-height: 1;
  min-width: 60px;
}

.elite-steps__content h3 {
  font-size: var(--text-lg) !important;
  text-transform: uppercase !important;
  margin-bottom: var(--space-sm) !important;
}

/* Tableau des tarifs */
.elite-pricing {
  border: var(--border);
  width: 100%;
  border-collapse: collapse;
}

.elite-pricing th {
  font-family: var(--font-heading) !important;
  font-size: var(--text-sm) !important;
  text-transform: uppercase !important;
  letter-spacing: 0.08em;
  background-color: var(--color-text) !important;
  color: var(--color-bg) !important;
  padding: var(--space-md) !important;
  border: var(--border) !important;
}

.elite-pricing td {
  padding: var(--space-md) !important;
  border: var(--border-light) !important;
  font-size: var(--text-base) !important;
}

.elite-pricing tr:nth-child(even) td {
  background-color: var(--color-bg-alt);
}

.elite-pricing .price-highlight {
  font-family: var(--font-heading);
  font-weight: var(--weight-black);
  font-size: var(--text-xl);
  color: var(--color-green);
}


/* ============================================================
   16. GALERIE MEDIA (Nos Actions)
   ============================================================ */

.elite-gallery {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
  gap: var(--border-width);
  background-color: var(--color-border);
}

.elite-gallery__item {
  overflow: hidden;
  background-color: var(--color-bg);
  position: relative;
  aspect-ratio: 4/3;
}

.elite-gallery__item img,
.elite-gallery__item video {
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: block;
  transition: transform 300ms ease;
}

.elite-gallery__item:hover img,
.elite-gallery__item:hover video {
  transform: scale(1.03);
}

/* Overlay au hover */
.elite-gallery__overlay {
  position: absolute;
  inset: 0;
  background-color: rgba(13, 13, 13, 0.7);
  display: flex;
  align-items: center;
  justify-content: center;
  opacity: 0;
  transition: opacity var(--transition-base);
}

.elite-gallery__item:hover .elite-gallery__overlay {
  opacity: 1;
}

.elite-gallery__overlay-icon {
  color: var(--color-bg);
  font-size: 2rem;
}


/* ============================================================
   17. GOUVERNANCE — Grille Bureau Exécutif
   ============================================================ */

.elite-team-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
  gap: 0;
  border-top: var(--border);
  border-left: var(--border);
}

.elite-member-card {
  border-right: var(--border);
  border-bottom: var(--border);
  padding: var(--space-xl) var(--space-lg);
  text-align: center;
  transition: background-color var(--transition-base);
}

.elite-member-card:hover {
  background-color: var(--color-bg-alt);
}

.elite-member-photo {
  width: 96px;
  height: 96px;
  border: 2px solid var(--color-border);
  object-fit: cover;
  display: block;
  margin: 0 auto var(--space-md);
  background-color: var(--color-bg-alt);
}

/* Placeholder si pas de photo */
.elite-member-photo--placeholder {
  display: flex;
  align-items: center;
  justify-content: center;
  font-family: var(--font-heading);
  font-size: var(--text-2xl);
  font-weight: var(--weight-black);
  color: var(--color-border-light);
  background-color: var(--color-bg-alt);
}

.elite-member-name {
  font-family: var(--font-heading) !important;
  font-size: var(--text-sm) !important;
  font-weight: var(--weight-bold) !important;
  text-transform: uppercase !important;
  color: var(--color-text) !important;
  margin-bottom: var(--space-xs) !important;
}

.elite-member-role {
  font-size: var(--text-xs) !important;
  color: var(--color-green) !important;
  text-transform: uppercase !important;
  letter-spacing: 0.08em;
}


/* ============================================================
   18. WIDGETS SIDEBAR & FOOTER
   ============================================================ */

.widget {
  margin-bottom: var(--space-2xl);
}

.widget-title {
  font-family: var(--font-heading) !important;
  font-size: var(--text-sm) !important;
  font-weight: var(--weight-bold) !important;
  text-transform: uppercase !important;
  letter-spacing: 0.1em;
  border-bottom: 2px solid var(--color-green) !important;
  padding-bottom: var(--space-sm) !important;
  margin-bottom: var(--space-lg) !important;
}

.widget ul {
  list-style: none;
  padding: 0;
  margin: 0;
}

.widget ul li {
  border-bottom: var(--border-light);
  padding: var(--space-sm) 0;
}

.widget ul li:last-child {
  border-bottom: none;
}

.widget ul li a {
  text-decoration: none;
  color: var(--color-text);
  font-size: var(--text-sm);
  transition: color var(--transition-fast);
}

.widget ul li a:hover {
  color: var(--color-green);
}
```

---

## 4. Code source complet — `functions.php`

```php
<?php
/**
 * Astra Child Theme — ONG Elite Atacora
 * functions.php
 */

defined('ABSPATH') || exit;

/* ============================================================
   1. Enqueue Styles : Parent Astra + Child CSS + Assets CSS
   ============================================================ */
add_action('wp_enqueue_scripts', 'elite_enqueue_styles', 20);
function elite_enqueue_styles() {

    // Thème parent Astra
    wp_enqueue_style(
        'astra-parent-style',
        get_template_directory_uri() . '/style.css',
        [],
        wp_get_theme('astra')->get('Version')
    );

    // Thème enfant (style.css principal — tokens + reset brutaliste)
    wp_enqueue_style(
        'astra-child-style',
        get_stylesheet_directory_uri() . '/style.css',
        ['astra-parent-style'],
        '1.0.0'
    );

    // Overrides Elementor
    wp_enqueue_style(
        'elite-elementor-overrides',
        get_stylesheet_directory_uri() . '/assets/css/elementor-overrides.css',
        ['astra-child-style'],
        '1.0.0'
    );

    // Composants UI
    wp_enqueue_style(
        'elite-components',
        get_stylesheet_directory_uri() . '/assets/css/components.css',
        ['astra-child-style'],
        '1.0.0'
    );

    // Header & Footer
    wp_enqueue_style(
        'elite-header-footer',
        get_stylesheet_directory_uri() . '/assets/css/header-footer.css',
        ['astra-child-style'],
        '1.0.0'
    );

    // Responsive
    wp_enqueue_style(
        'elite-responsive',
        get_stylesheet_directory_uri() . '/assets/css/responsive.css',
        ['astra-child-style'],
        '1.0.0'
    );
}

/* ============================================================
   2. Google Fonts — Montserrat + Open Sans (preconnect + display=swap)
   ============================================================ */
add_action('wp_enqueue_scripts', 'elite_enqueue_google_fonts', 1);
function elite_enqueue_google_fonts() {

    // Preconnect pour perf
    wp_enqueue_style(
        'elite-google-fonts-preconnect',
        'https://fonts.googleapis.com',
        [],
        null
    );

    // Fonts : Montserrat (100–900) + Open Sans (400, 500, 700)
    wp_enqueue_style(
        'elite-google-fonts',
        'https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;0,700;0,900;1,400&family=Open+Sans:wght@400;500;700&display=swap',
        [],
        null
    );
}

/* ============================================================
   3. Enqueue Scripts
   ============================================================ */
add_action('wp_enqueue_scripts', 'elite_enqueue_scripts', 20);
function elite_enqueue_scripts() {
    wp_enqueue_script(
        'elite-custom-js',
        get_stylesheet_directory_uri() . '/assets/js/custom.js',
        ['jquery'],
        '1.0.0',
        true // Chargé en footer
    );
}

/* ============================================================
   4. Désactiver Emojis WordPress (légèreté)
   ============================================================ */
add_action('init', 'elite_disable_emojis');
function elite_disable_emojis() {
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('admin_print_styles', 'print_emoji_styles');
}

/* ============================================================
   5. Supprimer le style inline généré par Astra
      (on gère tout via notre CSS)
   ============================================================ */
add_filter('astra_dynamic_css', '__return_empty_string', 99);

/* ============================================================
   6. Désactiver XML-RPC (sécurité)
   ============================================================ */
add_filter('xmlrpc_enabled', '__return_false');

/* ============================================================
   7. Supprimer les meta generator (sécurité — cache version WP)
   ============================================================ */
remove_action('wp_head', 'wp_generator');

/* ============================================================
   8. Breadcrumb — support Yoast
   ============================================================ */
add_theme_support('yoast-seo-breadcrumbs');

/* ============================================================
   9. Support images mises en avant
   ============================================================ */
add_theme_support('post-thumbnails');
set_post_thumbnail_size(1200, 630, true); // Open Graph size

// Tailles personnalisées
add_image_size('elite-card',   600, 400, true);  // Cards articles
add_image_size('elite-hero',  1440, 600, true);  // Hero sections
add_image_size('elite-thumb',  300, 300, true);  // Membres bureau

/* ============================================================
   10. Filtrer le titre SEO — ajouter "ONG" si absent
   ============================================================ */
add_filter('wp_title', 'elite_filter_wp_title', 10, 2);
function elite_filter_wp_title($title, $sep) {
    if (is_home() || is_front_page()) {
        return 'ONG Elite Atacora — Développement communautaire au Bénin';
    }
    return $title . $sep . ' ONG Elite Atacora';
}

/* ============================================================
   11. Shortcode : Tableau des tarifs d'adhésion
   ============================================================ */
add_shortcode('elite_pricing_table', 'elite_pricing_table_shortcode');
function elite_pricing_table_shortcode() {
    ob_start();
    ?>
    <table class="elite-pricing">
        <thead>
            <tr>
                <th>Type</th>
                <th>Montant</th>
                <th>Échéance</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Droit d'adhésion (unique)</td>
                <td class="price-highlight">5 000 FCFA</td>
                <td>À l'adhésion</td>
            </tr>
            <tr>
                <td>Cotisation mensuelle</td>
                <td class="price-highlight">2 000 FCFA</td>
                <td>Par mois</td>
            </tr>
            <tr>
                <td>Cotisation annuelle</td>
                <td class="price-highlight">24 000 FCFA</td>
                <td>4 tranches — avant le 05 décembre</td>
            </tr>
        </tbody>
    </table>
    <?php
    return ob_get_clean();
}

/* ============================================================
   12. Shortcode : Étapes d'adhésion
   ============================================================ */
add_shortcode('elite_adhesion_steps', 'elite_adhesion_steps_shortcode');
function elite_adhesion_steps_shortcode() {
    $steps = [
        [
            'title' => 'Remplir le formulaire',
            'desc'  => 'Soumettez votre candidature en ligne avec votre lettre de motivation.'
        ],
        [
            'title' => 'Attendre la réponse',
            'desc'  => 'La Présidente du Bureau Exécutif examine votre dossier dans les meilleurs délais.'
        ],
        [
            'title' => 'Payer les droits d\'adhésion',
            'desc'  => 'Versez 5 000 FCFA auprès de la Trésorière ou via les canaux indiqués.'
        ],
        [
            'title' => 'Déposer vos photos',
            'desc'  => 'Déposez 2 photos d\'identité récentes auprès du Bureau Exécutif.'
        ],
        [
            'title' => 'Recevoir votre carte de membre',
            'desc'  => 'Votre carte officielle est délivrée et signée par la Présidente.'
        ],
    ];

    ob_start();
    echo '<ol class="elite-steps">';
    foreach ($steps as $i => $step) {
        echo '<li class="elite-steps__item">';
        echo '<span class="elite-steps__number">0' . ($i + 1) . '</span>';
        echo '<div class="elite-steps__content">';
        echo '<h3>' . esc_html($step['title']) . '</h3>';
        echo '<p>' . esc_html($step['desc']) . '</p>';
        echo '</div>';
        echo '</li>';
    }
    echo '</ol>';
    return ob_get_clean();
}
```

---

## 5. CSS modulaires additionnels

### 5.1 `assets/css/elementor-overrides.css`

Ce fichier cible spécifiquement les classes générées par Elementor pour supprimer tout ce qui entre en conflit avec le design brutaliste.

```css
/* ============================================================
   ELEMENTOR OVERRIDES — Elite Atacora
   Suppression systématique : shadows, radius, paddings excessifs
   ============================================================ */

/* Suppression globale des box-shadow Elementor */
.elementor-widget-wrap,
.elementor-column,
.elementor-section,
.elementor-element,
.elementor-widget-container,
.elementor-button-wrapper,
.elementor-image-box-wrapper,
.elementor-counter,
.elementor-testimonial-wrapper,
.elementor-icon-box-wrapper {
  box-shadow: none !important;
  -webkit-box-shadow: none !important;
}

/* Suppression des border-radius Elementor */
.elementor-widget-image img,
.elementor-image-box-img img,
.elementor-testimonial--skin-bubble .elementor-testimonial__content,
.elementor-button,
.elementor-icon-box-wrapper,
.elementor-counter,
.elementor-progress-bar,
.elementor-tabs-content-wrapper,
.e-n-tabs-content {
  border-radius: 0 !important;
}

/* Suppression de l'ombre sur les sections héros */
.elementor-section.elementor-section-boxed,
.elementor-section.elementor-section-full_width {
  box-shadow: none !important;
}

/* Désactiver le box-shadow sur hover des images Elementor */
.elementor-image:hover img {
  box-shadow: none !important;
  transform: none !important;
}

/* Overrides widget Divider */
.elementor-divider-separator {
  border-top: var(--border) !important;
}

/* Widget Icon Box — pas de cercle */
.elementor-icon-box-icon .elementor-icon {
  border-radius: 0 !important;
  background-color: transparent !important;
  box-shadow: none !important;
}

/* Widget Progress Bar — brutaliste */
.elementor-progress-bar {
  background-color: var(--color-green) !important;
  border-radius: 0 !important;
}
.elementor-progress-wrapper {
  border: var(--border) !important;
  border-radius: 0 !important;
  background-color: var(--color-bg-alt) !important;
}

/* Widget Counter */
.elementor-counter-number-wrapper {
  font-family: var(--font-heading) !important;
  font-weight: var(--weight-black) !important;
  color: var(--color-green) !important;
}

/* Widget Testimonial */
.elementor-testimonial__content {
  border: var(--border) !important;
  background-color: var(--color-bg-alt) !important;
}

/* Désactiver les animations Elementor par défaut (performance) */
.animated {
  animation-duration: 0.3s !important;
}

/* Forcer l'affichage correct du widget Google Translate dans Elementor */
.elementor-widget-html .goog-te-gadget {
  font-family: var(--font-heading) !important;
  font-size: var(--text-xs) !important;
}

/* Popup Elementor si utilisé */
.elementor-popup-modal .dialog-widget-content {
  border-radius: 0 !important;
  box-shadow: none !important;
  border: 2px solid var(--color-text) !important;
}

/* Pagination Elementor */
.elementor-pagination .page-numbers {
  border: var(--border) !important;
  border-radius: 0 !important;
  font-family: var(--font-heading) !important;
  font-weight: var(--weight-bold) !important;
  color: var(--color-text) !important;
  text-decoration: none;
  padding: var(--space-sm) var(--space-md);
  transition: background-color var(--transition-fast), color var(--transition-fast);
}

.elementor-pagination .page-numbers:hover,
.elementor-pagination .page-numbers.current {
  background-color: var(--color-text) !important;
  color: var(--color-bg) !important;
}
```

### 5.2 `assets/css/responsive.css`

```css
/* ============================================================
   RESPONSIVE — Elite Atacora
   Mobile-first : styles de base pour mobile, ajustements desktop
   ============================================================ */

/* ——— MOBILE (< 768px) ——— */
@media (max-width: 767px) {

  :root {
    --text-4xl: 2rem;       /* 32px sur mobile */
    --text-3xl: 1.75rem;    /* 28px */
    --text-2xl: 1.5rem;     /* 24px */
    --container-padding: 1rem;
    --space-4xl: 3rem;
    --space-3xl: 2.5rem;
  }

  /* Header — hauteur réduite */
  .site-header {
    padding: var(--space-sm) 0 !important;
  }

  /* Hero — padding réduit */
  .elite-hero {
    padding: var(--space-2xl) 0 !important;
  }

  .elite-hero__ctas {
    flex-direction: column;
  }

  .elite-hero__ctas .btn {
    width: 100%;
    text-align: center;
  }

  /* Stats — colonne unique */
  .elite-stats .elementor-row,
  .elite-stat-item {
    border-right: none !important;
    border-bottom: var(--border-light) !important;
    padding: var(--space-xl) !important;
  }

  /* Colonnes Elementor — empilées */
  .elementor-column {
    border-left: none !important;
    border-top: var(--border-light) !important;
  }

  /* Galerie — 1 colonne */
  .elite-gallery {
    grid-template-columns: 1fr;
  }

  /* Grille membres — 2 colonnes max */
  .elite-team-grid {
    grid-template-columns: repeat(2, 1fr);
  }

  /* Formulaire — champs pleine largeur */
  .wpcf7-form input,
  .wpcf7-form textarea,
  .wpcf7-form select {
    width: 100% !important;
  }

  /* Formulaire — bouton pleine largeur */
  .wpcf7-form input[type="submit"] {
    width: 100% !important;
  }

  /* Navigation mobile — menu déroulant Astra */
  .main-navigation {
    border-top: var(--border) !important;
  }

  .main-navigation ul li a {
    border-bottom: var(--border-light) !important;
  }

  /* Footer — colonnes empilées */
  .site-footer .elementor-column {
    margin-bottom: var(--space-xl);
  }
}

/* ——— TABLETTE (768px – 1024px) ——— */
@media (min-width: 768px) and (max-width: 1024px) {

  :root {
    --container-padding: 1.25rem;
  }

  /* Galerie — 2 colonnes */
  .elite-gallery {
    grid-template-columns: repeat(2, 1fr);
  }

  /* Grille membres — 3 colonnes */
  .elite-team-grid {
    grid-template-columns: repeat(3, 1fr);
  }

  /* Stats — 2x2 */
  .elite-stat-item:nth-child(even) {
    border-right: none !important;
  }
}

/* ——— DESKTOP (> 1024px) ——— */
@media (min-width: 1025px) {

  /* Galerie — 3 colonnes */
  .elite-gallery {
    grid-template-columns: repeat(3, 1fr);
  }

  /* Grille membres — 4 colonnes max */
  .elite-team-grid {
    grid-template-columns: repeat(4, 1fr);
  }
}

/* ——— LARGE DESKTOP (> 1440px) ——— */
@media (min-width: 1441px) {
  .elementor-section-boxed > .elementor-container {
    max-width: var(--container-max) !important;
  }
}

/* ——— PRINT ——— */
@media print {
  .site-header,
  .site-footer,
  .elementor-button,
  .wpcf7-form {
    display: none !important;
  }

  body {
    font-size: 12pt;
    color: #000;
  }

  a {
    text-decoration: underline;
    color: #000;
  }
}
```

---

## 6. Configuration Elementor — Réglages globaux

Cette section liste chaque paramètre à configurer dans l'interface d'administration d'Elementor. **Tous ces réglages sont accessibles via** `Elementor > Réglages` et `Elementor > Kit du site`.

### 6.1 Désactiver les couleurs et typographies par défaut d'Elementor

**Chemin :** `Elementor > Réglages > Style`

| Paramètre | Valeur à appliquer | Pourquoi |
|---|---|---|
| Désactiver les couleurs par défaut | **Activé (OUI)** | Empêche Elementor d'injecter ses propres couleurs sur les éléments et d'écraser notre CSS |
| Désactiver les polices par défaut | **Activé (OUI)** | Empêche Elementor d'importer ses propres fonts (on gère via functions.php) |

### 6.2 Kit du site — Global Colors

**Chemin :** `Elementor > Kit du site > Couleurs globales`

Supprimer toutes les couleurs préexistantes et créer uniquement les suivantes :

| Nom de la variable | Hex | Usage |
|---|---|---|
| `--e-global-color-primary` | `#2E7D32` | CTA principaux, éléments actifs |
| `--e-global-color-secondary` | `#0D0D0D` | Texte, boutons secondaires |
| `--e-global-color-text` | `#0D0D0D` | Corps de texte |
| `--e-global-color-accent` | `#F9A825` | Accents, badges |
| `--e-global-color-bg-alt` | `#F4F4F2` | Fonds de sections alternées |
| `--e-global-color-border` | `#1A1A1A` | Toutes les bordures |

### 6.3 Kit du site — Global Typography

**Chemin :** `Elementor > Kit du site > Typographie globale`

Supprimer les typographies préexistantes et créer :

| Nom | Police | Poids | Taille | Texte |
|---|---|---|---|---|
| Primary Heading | Montserrat | 900 (Black) | `clamp(2rem, 4vw, 3rem)` | Uppercase |
| Secondary Heading | Montserrat | 700 (Bold) | `clamp(1.5rem, 3vw, 2rem)` | Uppercase |
| Body Text | Open Sans | 400 (Regular) | `1rem` | Normal |
| Button Text | Montserrat | 700 (Bold) | `0.875rem` | Uppercase, letter-spacing: 0.08em |
| Accent Text | Montserrat | 500 (Medium) | `0.875rem` | Uppercase, letter-spacing: 0.1em |

### 6.4 Kit du site — Réglages des boutons

**Chemin :** `Elementor > Kit du site > Boutons`

| Paramètre | Valeur |
|---|---|
| Couleur de fond | `#2E7D32` |
| Couleur de texte | `#FFFFFF` |
| Couleur de fond hover | `transparent` |
| Couleur de texte hover | `#2E7D32` |
| Bordure | `2px solid #2E7D32` |
| Border radius | `0px` |
| Padding | `16px 32px` |
| Typographie | Button Text (défini ci-dessus) |
| Box shadow | **Aucune** |

### 6.5 Réglages de page — Paramètres à vérifier pour chaque template

**Chemin :** `Elementor > Éditer la page > Réglages de la page (roue crantée)`

| Paramètre | Valeur |
|---|---|
| Disposition du contenu | Pleine largeur (Full Width) |
| Activer le mode Flexbox Container | **Oui** (si disponible dans la version) |
| Marges de la page | `0` (les sections gèrent leur propre padding) |
| Couleur de fond de page | `#FFFFFF` |

### 6.6 Performance Elementor

**Chemin :** `Elementor > Réglages > Performances`

| Paramètre | Valeur |
|---|---|
| CSS amélioré | **Activé** |
| Charger les scripts uniquement quand nécessaire | **Activé** |
| CSS inline pour les widgets critiques | **Activé** |
| Optimiser le chargement des polices | **Activé** |
| Désactiver Google Fonts d'Elementor | **Activé** (on les charge via functions.php) |

### 6.7 Widgets Elementor à activer / désactiver

**Chemin :** `Elementor > Réglages > Éléments`

**Activer uniquement (désactiver le reste pour la performance) :**

| Widget | Usage |
|---|---|
| Heading | Titres de sections |
| Text Editor | Corps de texte riche |
| Image | Images standalone |
| Button | CTA |
| Video | Vidéos MP4 terrain |
| Icon | Icônes dans les cartes valeurs |
| Icon Box | Blocs valeurs / domaines d'action |
| Image Box | Blocs membres avec photo |
| Divider | Séparateurs de section |
| Spacer | Espacements verticaux |
| Columns | Grilles |
| Inner Section | Sections imbriquées |
| HTML | Widget Google Translate + shortcodes custom |
| Posts | Grille d'articles récents (accueil) |
| WP Forms / CF7 | Formulaires d'adhésion et contact |
| Counter | Chiffres clés |
| Image Gallery | Galerie Nos Actions |

**Désactiver (non utilisés, allègent le JS) :**
Carousel · Slides · Price Table · Progress Bar (sauf si utilisé) · Testimonial · Reviews · Login · Search Form

---

## 7. Variables CSS globales (Design Tokens)

Récapitulatif de tous les tokens utilisables dans Elementor (via CSS personnalisé d'un widget) et dans le thème enfant :

```css
/* Couleurs */
var(--color-bg)           /* #FFFFFF */
var(--color-bg-alt)       /* #F4F4F2 */
var(--color-text)         /* #0D0D0D */
var(--color-text-muted)   /* #5C5C5C */
var(--color-border)       /* #1A1A1A */
var(--color-border-light) /* #D4D4D4 */
var(--color-green)        /* #2E7D32 */
var(--color-green-dark)   /* #1B5E20 */
var(--color-yellow)       /* #F9A825 */
var(--color-red)          /* #B71C1C */

/* Typographie */
var(--font-heading)       /* 'Montserrat', sans-serif */
var(--font-body)          /* 'Open Sans', sans-serif */
var(--text-xs)  → 0.75rem
var(--text-sm)  → 0.875rem
var(--text-base)→ 1rem
var(--text-md)  → 1.125rem
var(--text-lg)  → 1.25rem
var(--text-xl)  → 1.5rem
var(--text-2xl) → 2rem
var(--text-3xl) → 2.5rem
var(--text-4xl) → 3rem

/* Espacements */
var(--space-xs)  → 0.25rem (4px)
var(--space-sm)  → 0.5rem  (8px)
var(--space-md)  → 1rem    (16px)
var(--space-lg)  → 1.5rem  (24px)
var(--space-xl)  → 2rem    (32px)
var(--space-2xl) → 3rem    (48px)
var(--space-3xl) → 4rem    (64px)
var(--space-4xl) → 6rem    (96px)

/* Bordures */
var(--border)       → 1px solid #1A1A1A
var(--border-light) → 1px solid #D4D4D4
var(--border-width) → 1px
```

---

## 8. Spécifications typographiques

### 8.1 Hiérarchie complète

| Niveau | Balise HTML | Police | Poids | Taille desktop | Taille mobile | Transform |
|---|---|---|---|---|---|---|
| Display | `.elite-display` | Montserrat | 900 | `clamp(3rem, 5vw, 4rem)` | `2.5rem` | UPPERCASE |
| H1 | `h1` | Montserrat | 900 | `3rem` | `2rem` | UPPERCASE |
| H2 | `h2` | Montserrat | 900 | `2.5rem` | `1.75rem` | UPPERCASE |
| H3 | `h3` | Montserrat | 700 | `2rem` | `1.5rem` | UPPERCASE |
| H4 | `h4` | Montserrat | 700 | `1.5rem` | `1.25rem` | UPPERCASE |
| H5 | `h5` | Montserrat | 500 | `1.25rem` | `1.125rem` | UPPERCASE |
| Body Large | `.text-lg` | Open Sans | 400 | `1.125rem` | `1rem` | Normal |
| Body | `p` | Open Sans | 400 | `1rem` | `1rem` | Normal |
| Body Small | `.text-sm` | Open Sans | 400 | `0.875rem` | `0.875rem` | Normal |
| Label | `label` | Montserrat | 700 | `0.875rem` | `0.875rem` | UPPERCASE |
| Caption | `small` | Open Sans | 400 | `0.75rem` | `0.75rem` | Normal |
| Button | `.elementor-button` | Montserrat | 700 | `0.875rem` | `0.875rem` | UPPERCASE |
| Badge | `.elite-badge` | Montserrat | 700 | `0.75rem` | `0.75rem` | UPPERCASE |

### 8.2 Interlignage et espacement des lettres

| Niveau | Line-height | Letter-spacing |
|---|---|---|
| Tous les titres (H1-H6) | `1.2` | `-0.02em` |
| Body text | `1.8` | `0` |
| Labels / badges | `1.2` | `+0.05em à +0.1em` |
| Boutons | `1` | `+0.08em` |

---

## 9. Grille et espacements

### 9.1 Grille de mise en page Elementor

| Usage | Configuration |
|---|---|
| Container max-width | `1200px` |
| Padding container | `24px` (mobile : `16px`) |
| Gap entre colonnes | `0` (les bordures servent de séparateurs) |
| Gap entre sections | `0` (chaque section a son propre padding vertical) |

### 9.2 Padding vertical standard des sections

| Type de section | Padding top | Padding bottom |
|---|---|---|
| Section hero | `96px` | `96px` |
| Section standard | `64px` | `64px` |
| Section compacte | `48px` | `48px` |
| Section tight | `32px` | `32px` |

### 9.3 Valeurs d'espacement à utiliser dans Elementor

Toujours utiliser des multiples de 8px pour la cohérence :
`8 · 16 · 24 · 32 · 48 · 64 · 96px`

---

## 10. Composants UI — spécifications par élément

### 10.1 Bouton CTA primaire

```
État : Normal
  Background  : #2E7D32
  Texte       : #FFFFFF
  Bordure     : 2px solid #2E7D32
  Padding     : 16px 32px
  Border-radius: 0px

État : Hover
  Background  : transparent
  Texte       : #2E7D32
  Bordure     : 2px solid #2E7D32
  Transition  : 200ms ease

État : Focus
  Outline     : 2px solid #2E7D32
  Outline-offset : 2px
```

### 10.2 Card article de blog

```
Conteneur :
  Border        : 1px solid #1A1A1A
  Background    : #FFFFFF
  Padding       : 0 (l'image est flush top)

Image header :
  Height        : 220px
  Object-fit    : cover
  Border-bottom : 1px solid #1A1A1A

Corps :
  Padding       : 24px

Badge catégorie :
  Background    : #F9A825
  Couleur texte : #0D0D0D
  Font          : Montserrat 700
  Transform     : UPPERCASE
  Position      : absolute top-left sur l'image

Titre :
  Font          : Montserrat 700
  Size          : 1.25rem
  Transform     : UPPERCASE
  Color         : #0D0D0D

Meta (date, auteur) :
  Font          : Open Sans 400
  Size          : 0.75rem
  Color         : #5C5C5C
  Border-top    : 1px solid #D4D4D4
  Padding-top   : 8px
  Transform     : UPPERCASE

Hover card :
  Transform     : translate(-3px, -3px)
  Box-shadow    : 3px 3px 0 #2E7D32
```

### 10.3 Section Valeurs (5 blocs)

```
Layout : grille 5 colonnes desktop / 2-3 tablette / 1 mobile
Séparateur : bordure verticale 1px entre chaque colonne

Bloc valeur :
  Padding       : 32px 24px
  Text-align    : center

Icône :
  Taille        : 32px
  Couleur       : #2E7D32
  Margin-bottom : 16px

Titre valeur :
  Font          : Montserrat 700
  Size          : 0.875rem
  Transform     : UPPERCASE
  Letter-spacing: 0.1em
  Color         : #0D0D0D

Description :
  Font          : Open Sans 400
  Size          : 0.875rem
  Color         : #5C5C5C
```

### 10.4 Section Chiffres Clés

```
Layout : 4 colonnes séparées par bordures verticales 1px
Border-top + Border-bottom : 1px solid #1A1A1A
Background : #FFFFFF

Chiffre :
  Font    : Montserrat 900
  Size    : 3rem
  Color   : #2E7D32

Label :
  Font    : Open Sans 400
  Size    : 0.75rem
  Color   : #5C5C5C
  Transform: UPPERCASE
  Letter-spacing: 0.08em
```

### 10.5 Widget Google Translate

```
Positionnement : header, extrême droite
Font           : Montserrat 700, 0.75rem, UPPERCASE
Background     : transparent
Bordure        : 1px solid #1A1A1A
Padding        : 4px 8px
Color          : #0D0D0D

CSS override spécifique :
.goog-te-gadget-simple {
  border: 1px solid #1A1A1A !important;
  border-radius: 0 !important;
  background-color: transparent !important;
  font-family: 'Montserrat', sans-serif !important;
  font-size: 0.75rem !important;
  font-weight: 700 !important;
  text-transform: uppercase !important;
  padding: 4px 8px !important;
}
.goog-te-gadget-simple a {
  color: #0D0D0D !important;
  text-decoration: none !important;
}
```

---

## 11. Checklist d'intégration

À valider dans l'ordre avant livraison.

### Phase 0 — Environnement

- [ ] WordPress 6.x installé (dernière version stable)
- [ ] Thème Astra installé et activé
- [ ] Thème enfant `astra-child` créé et activé
- [ ] Elementor Free installé et activé
- [ ] Contact Form 7 installé
- [ ] WP Mail SMTP installé et configuré (adresse email ONG à définir)
- [ ] The Events Calendar installé
- [ ] Yoast SEO installé
- [ ] GTranslate installé
- [ ] WP Super Cache installé et activé
- [ ] Wordfence installé et activé
- [ ] UpdraftPlus installé et configuré (backup hebdo)
- [ ] Akismet configuré
- [ ] WPS Hide Login configuré (URL admin personnalisée)
- [ ] SSL actif (HTTPS) et redirection HTTP → HTTPS configurée
- [ ] XML-RPC désactivé

### Phase 1 — Design system

- [ ] Google Fonts chargées via functions.php (Montserrat + Open Sans)
- [ ] Variables CSS `:root` chargées (style.css)
- [ ] Reset brutaliste appliqué (suppression shadows/radius globaux)
- [ ] Elementor : couleurs par défaut désactivées
- [ ] Elementor : polices par défaut désactivées
- [ ] Elementor Kit du site : 6 couleurs globales configurées
- [ ] Elementor Kit du site : 5 typographies globales configurées
- [ ] Elementor Kit du site : boutons configurés (vert, radius 0, no shadow)
- [ ] elementor-overrides.css chargé et actif

### Phase 2 — Structure & Pages

- [ ] Structure de navigation créée (menus WordPress configurés)
- [ ] Page Accueil construite dans Elementor
- [ ] Page À propos construite
- [ ] Page Gouvernance construite (grille Bureau Exécutif complète)
- [ ] Page Nos Actions construite (galerie photos + vidéos)
- [ ] Page Actualités configurée (archive articles + pagination)
- [ ] Page Événements configurée (The Events Calendar)
- [ ] Page Adhérer construite (steps + tableau tarifs + formulaire CF7)
- [ ] Page Contact construite (formulaire + Google Maps lazy load)
- [ ] Page Politique de confidentialité créée
- [ ] Lien politique de confidentialité dans footer ET au-dessus des formulaires

### Phase 3 — Fonctionnalités

- [ ] Formulaire d'adhésion CF7 : tous les champs requis, honeypot actif
- [ ] Formulaire contact CF7 : tous les champs, honeypot actif
- [ ] Email de notification testé et reçu correctement (pas en spam)
- [ ] Message de confirmation CF7 affiché après soumission
- [ ] Widget Google Translate opérationnel dans le header (FR/EN/PT)
- [ ] The Events Calendar : 1 événement test créé
- [ ] 1 article test créé et affiché sur accueil et archive
- [ ] Rôle "Éditeur" créé pour la Chargée de Communication
- [ ] Test connexion rôle Éditeur : publication article ✓, accès thème ✗

### Phase 4 — Performance & SEO

- [ ] Yoast SEO : titre et description site configurés
- [ ] Yoast SEO : sitemap.xml généré et accessible
- [ ] Sitemap soumis à Google Search Console
- [ ] WP Super Cache : mode simple activé
- [ ] Images originales compressées avant upload (WebP ou JPEG optimisé)
- [ ] Google Maps en lazy loading
- [ ] Vidéos MP4 encodées H.264, < 20 MB chacune
- [ ] PageSpeed Mobile > 70/100 (test sur PageSpeed Insights)
- [ ] PageSpeed Desktop > 85/100

### Phase 5 — Sécurité & Responsive

- [ ] Wordfence : scan initial passé sans erreur critique
- [ ] Headers de sécurité configurés (X-Frame-Options, X-Content-Type-Options)
- [ ] wp-config.php permissions en 400
- [ ] Test responsive mobile (320px, 375px, 414px)
- [ ] Test responsive tablette (768px, 1024px)
- [ ] Test desktop (1280px, 1440px)
- [ ] Test cross-browser : Chrome Android, Safari iOS, Chrome Desktop, Firefox Desktop
- [ ] Navigation hamburger fonctionnelle sur mobile
- [ ] Formulaires utilisables sur mobile (clavier numérique sur champ tel)

### Phase 6 — Livraison

- [ ] Guide client PDF rédigé et remis (connexion, publication, événements)
- [ ] Identifiants admin transmis de manière sécurisée à la Présidente
- [ ] Identifiants Éditeur transmis à la Chargée de Communication
- [ ] UpdraftPlus : premier backup complet effectué
- [ ] URL admin personnalisée communiquée à la cliente
- [ ] Documentation migration domaine propre remise (phase 2)

---

*TDD v1.0 — ONG ELITE ATACORA — Mai 2026*
*Complémentaire au PRD v1.0 du même projet*
```
