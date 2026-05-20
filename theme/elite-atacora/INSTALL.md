# Elite Atacora — Guide d'installation

## Prérequis

| Composant | Version minimale |
|-----------|-----------------|
| PHP | 8.1+ |
| WordPress | 6.3+ |
| MySQL / MariaDB | 5.7+ / 10.4+ |
| Navigateur (admin) | Chromium 110+, Firefox 110+ |

---

## 1. Installation du thème

### Via l'administration WordPress

1. Créez une archive ZIP du dossier `theme/elite-atacora/`.
2. Dans WP Admin → **Apparence → Thèmes → Ajouter → Téléverser un thème**.
3. Sélectionnez le fichier ZIP et cliquez **Installer maintenant**.
4. Cliquez **Activer**.

### Via FTP / SSH

```bash
cp -r theme/elite-atacora/ /chemin/vers/wp-content/themes/elite-atacora/
```

Activez ensuite le thème dans WP Admin → **Apparence → Thèmes**.

---

## 2. Extensions recommandées

| Extension | Rôle | Requis ? |
|-----------|------|----------|
| **Contact Form 7** | Formulaires de contact et d'adhésion | Recommandé |
| **Yoast SEO** | Métadonnées SEO, sitemap XML | Optionnel |
| **WPML** ou **Polylang** | Multilinguisme (FR/EN/PT) | Optionnel |
| **Advanced Custom Fields (ACF)** | Gestion avancée des métadonnées événements | Optionnel |
| **WP Super Cache** ou **LiteSpeed Cache** | Performance | Recommandé en production |

Installez et activez Contact Form 7 avant de créer les pages.

---

## 3. Création des pages

Créez les pages suivantes dans WP Admin → **Pages → Ajouter** avec les slugs et templates indiqués :

| Titre de la page | Slug | Template de page |
|-----------------|------|-----------------|
| Accueil | `/` (page d'accueil dans Réglages → Lecture) | — (front-page.php automatique) |
| À propos | `a-propos` | **À propos** |
| Gouvernance | `gouvernance` | **Gouvernance** |
| Nos actions | `nos-actions` | **Nos Actions** |
| Événements | `evenements` | **Événements** |
| Actualités | `actualites` | — (archive.php automatique, voir §4) |
| Contact | `contact` | **Contact** |
| Adhérer | `adherer` | **Adhérer** |
| Politique de confidentialité | `politique-de-confidentialite` | **Politique de confidentialité** |

> **Réglages → Lecture** : définissez « La page d'accueil affiche » → **Une page statique**, choisissez la page **Accueil**.

---

## 4. Archive Actualités

WordPress route automatiquement l'archive des articles vers `/actualites/` grâce à la page portant le slug `actualites`. Aucune configuration supplémentaire n'est requise si la page est créée avec ce slug exact.

Videz le cache des permaliens après : **Réglages → Permaliens → Enregistrer**.

---

## 5. Types de contenus personnalisés

Le thème enregistre automatiquement :

### CPT : `ea_event` (Événements)

Champs méta à renseigner pour chaque événement (via l'éditeur de blocs ou ACF) :

| Clé meta | Description | Format |
|----------|-------------|--------|
| `ea_event_date` | Date de l'événement | `YYYY-MM-DD` |
| `ea_event_time` | Heure | `HH:MM` (ex. `14:00`) |
| `ea_event_place` | Lieu | Texte libre |
| `ea_event_type` | Type (texte libre, secondaire à la taxonomie) | Texte |
| `ea_event_featured` | Mettre en avant sur la page événements | `1` ou vide |

### Taxonomies

| Taxonomie | Slug | Appliquée à |
|-----------|------|-------------|
| Catégories actualités | `ea_news_cat` | Articles |
| Types d'événements | `ea_event_type` | `ea_event` |

Créez les termes dans **Articles → Catégories actualités** et **Événements → Types d'événements**.

---

## 6. Menus de navigation

Allez dans **Apparence → Menus** et créez deux menus :

### Menu principal (`primary`)

Assignez-le à l'emplacement **Menu principal**. Structure recommandée :

```
Accueil
À propos
  └─ Gouvernance
Nos actions
Événements
Actualités
Contact
```

### Menus de pied de page

- **Pied de page — L'ONG** → emplacement `footer-1`
- **Pied de page — Ressources** → emplacement `footer-2`

---

## 7. Formulaires Contact Form 7

Créez les formulaires suivants (CF7 → Ajouter) et notez leurs IDs :

### Formulaire de contact (`ea_contact_form_id`)

```
[text* ea_name placeholder "Prénom Nom"]
[email* ea_email placeholder "votre@email.com"]
[tel ea_phone placeholder "+229 XX XX XX XX"]
[select ea_subject "Choisissez un objet" "Programme" "Partenariat" "Don"]
[textarea* ea_message placeholder "Votre message…"]
[submit "Envoyer"]
```

### Formulaire d'adhésion (`ea_adhesion_form_id`)

Incluez tous les champs du formulaire natif de la page Adhérer.

Renseignez les IDs dans **Apparence → Personnaliser → Réglages du thème** :

| Option | Description |
|--------|-------------|
| `ea_contact_form_id` | ID du formulaire CF7 contact |
| `ea_adhesion_form_id` | ID du formulaire CF7 adhésion |

> Si CF7 n'est pas installé, les formulaires natifs HTML sont utilisés en fallback. Les soumissions natives utilisent `admin-post.php` ; ajoutez vos propres handlers `add_action('admin_post_ea_contact_submit', ...)` dans `functions.php` ou un plugin enfant.

---

## 8. Image héro de l'accueil

L'image héro de la page d'accueil est gérée via le Customizer :

**Apparence → Personnaliser → Identité du site → Image héro**

Taille recommandée : **1400 × 900 px**, format WebP ou JPEG.

Le logo est géré via **Apparence → Personnaliser → Identité du site → Logo**.

---

## 9. Galerie photos (page Nos actions)

La galerie de la page Nos actions lit les IDs d'images depuis le champ méta `ea_gallery_ids` de la page portant le template **Nos Actions**.

**Avec ACF** (recommandé) :

1. Créez un champ **Galerie** (type Gallery) avec la clé `ea_gallery_ids`.
2. Assignez le groupe de champs à la règle : *Template de page = Nos Actions*.
3. Ajoutez vos photos dans l'éditeur de la page Nos actions.

**Sans ACF** : les 9 dernières images de la médiathèque sont utilisées comme fallback.

---

## 10. Permaliens

Allez dans **Réglages → Permaliens** et sélectionnez **Nom de l'article** (`/%postname%/`).

Cliquez **Enregistrer les modifications** pour vider le cache des règles de réécriture.

---

## 11. Traductions

Le thème est entièrement traduit via le domaine `elite-atacora`. Un fichier POT de base est fourni dans `languages/elite-atacora.pot`.

**Pour ajouter une langue** :

1. Utilisez **Poedit** ou **Loco Translate** pour créer les fichiers `.po` et `.mo`.
2. Placez-les dans `wp-content/languages/themes/` ou dans `languages/` du thème.
3. Pour le multilinguisme complet (FR/EN/PT), installez **WPML** ou **Polylang**.

---

## 12. Personnalisation avancée

### Couleurs et typographie

Toutes les variables CSS sont dans `assets/css/main.css` (section `:root`). Modifiez les valeurs directement ou surchargez-les dans un thème enfant.

### Thème enfant

Pour des personnalisations pérennes, créez un thème enfant :

```
/wp-content/themes/elite-atacora-child/
  style.css        ← en-tête avec Template: elite-atacora
  functions.php    ← wp_enqueue_style() du thème parent
```

### Carte Google Maps (page Contact)

Remplacez le placeholder carte dans `page-templates/page-contact.php` par une intégration Google Maps Embed API :

```html
<iframe
  src="https://www.google.com/maps/embed/v1/place?key=VOTRE_CLE_API&q=Natitingou,Benin"
  width="100%" height="100%" frameborder="0" allowfullscreen
  loading="lazy" referrerpolicy="no-referrer-when-downgrade">
</iframe>
```

### Vidéos (page Nos actions)

Renseignez les URLs d'embed YouTube dans le tableau `$videos` de `page-templates/page-nos-actions.php` :

```php
'embed' => 'https://www.youtube.com/embed/VOTRE_VIDEO_ID',
```

---

## 13. Performance et sécurité

- **HTTPS** : configurez un certificat SSL (Let's Encrypt ou hébergeur).
- **Cache** : activez WP Super Cache ou LiteSpeed Cache.
- **Optimisation images** : utilisez Smush ou Imagify pour convertir en WebP.
- **Sauvegardes** : configurez UpdraftPlus ou une solution d'hébergeur.
- **Sécurité** : changez le préfixe de table WP (`$table_prefix`) lors de l'installation, désactivez l'éditeur de fichiers dans `wp-config.php` :
  ```php
  define( 'DISALLOW_FILE_EDIT', true );
  ```

---

## 14. Checklist de mise en ligne

- [ ] Thème activé
- [ ] Permaliens configurés (Nom de l'article)
- [ ] Pages créées avec les bons slugs et templates
- [ ] Menus assignés aux emplacements
- [ ] Image héro et logo uploadés
- [ ] Contact Form 7 installé et formulaires créés
- [ ] IDs CF7 enregistrés dans le Customizer
- [ ] Types et termes de taxonomie créés
- [ ] Au moins un événement `ea_event` créé pour tester la page Événements
- [ ] Au moins 3 articles publiés avec une catégorie `ea_news_cat`
- [ ] HTTPS configuré
- [ ] Cache activé
- [ ] Page de confidentialité assignée dans **Réglages → Confidentialité**

---

## Support

Pour toute question technique :

- **E-mail** : contact@elite-atacora.org
- **Site** : https://elite-atacora.org

---

*Elite Atacora WP Theme — Version 1.0.0 — Janvier 2024*
