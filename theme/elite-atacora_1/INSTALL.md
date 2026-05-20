# Guide d'installation — Thème Elite Atacora

## Prérequis
- WordPress 6.x
- PHP 8.0+
- Plugins requis : Contact Form 7, WP Mail SMTP, The Events Calendar, Yoast SEO, GTranslate, WP Super Cache, Wordfence, UpdraftPlus

## Installation du thème

1. Copier le dossier `elite-atacora/` dans `wp-content/themes/`
2. Activer le thème dans **Apparence > Thèmes**

## Configuration des pages

Créer les pages suivantes et assigner le bon **Template** (menu déroulant dans l'éditeur, colonne de droite) :

| Titre de la page        | Slug                        | Template                    |
|-------------------------|-----------------------------|-----------------------------|
| Accueil                 | (page d'accueil)            | (aucun — front-page.php)    |
| À propos                | a-propos                    | À propos                    |
| Gouvernance             | gouvernance                 | Gouvernance                 |
| Nos actions             | nos-actions                 | Nos Actions                 |
| Actualités              | actualites                  | (aucun — archive.php)       |
| Adhérer                 | adherer                     | Adhérer                     |
| Contact                 | contact                     | Contact                     |
| Politique de confidentialité | politique-de-confidentialite | Politique de confidentialité |

**Réglages > Lecture :** Définir "Votre page d'accueil affiche" = "Une page statique" → Page d'accueil = Accueil, Page des articles = Actualités.

## Menus WordPress

**Apparence > Menus :**

### Menu principal (emplacement : `primary`)
Accueil · À propos · Gouvernance · Nos actions · Actualités · Événements · Adhérer · Contact

### Menu footer (emplacement : `footer`)
Accueil · À propos · Actualités · Événements · Adhérer · Contact

## Formulaires Contact Form 7

Créer deux formulaires CF7 :

### Formulaire Adhésion (slug : `adhesion`)
```
[text* nom placeholder "Nom"] [text* prenom placeholder "Prénom"]
[email* email placeholder "Email"]
[tel* telephone placeholder "Téléphone"]
[select* type_adhesion "Membre adhérent" "Membre sympathisant" "Membre d'honneur"]
[textarea* motivation placeholder "Lettre de motivation (min. 50 caractères)"]
[acceptance accept_policy] J'accepte la politique de confidentialité [/acceptance]
[submit "Envoyer ma candidature"]
```

### Formulaire Contact (slug : `contact`)
```
[text* nom placeholder "Nom complet"]
[email* email placeholder "Email"]
[text* sujet placeholder "Sujet"]
[textarea* message placeholder "Message"]
[acceptance accept_policy] J'accepte la politique de confidentialité [/acceptance]
[submit "Envoyer le message"]
```

**Email de notification CF7 :** Configurer l'adresse de réception dans chaque formulaire → Onglet "Mail" → "To:".

## WP Mail SMTP

Configurer avec les identifiants SMTP de l'hébergeur ou via Gmail SMTP pour assurer la délivrabilité des notifications de formulaire.

## Rôles utilisateurs

- **Présidente** → Rôle : Administrateur
- **Chargée Communication** → Rôle : Éditeur (peut publier articles/événements, ne peut pas toucher au thème)

## Upload des assets

Uploader dans **Médias** :
- Logo officiel (JPEG fourni)
- 9 photos de terrain (JPEG)
- 3 vidéos MP4

Pour le logo : **Apparence > Personnaliser > Identité du site > Logo**.

## Shortcodes disponibles

- `[elite_tarifs]` → Tableau des droits d'adhésion et cotisations
- Les étapes d'adhésion sont codées directement dans `page-adherer.php`

## Couleurs CSS (rappel)
```
Vert    : #2E7D32
Jaune   : #F9A825
Rouge   : #B71C1C
Noir    : #0D0D0D
Fond alt: #F4F4F2
```
