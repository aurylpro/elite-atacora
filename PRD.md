# PRD & Cahier des Charges Technique
## Site Web Vitrine — ONG ELITE ATACORA
**Version :** 1.0  
**Date :** 18 mai 2026  
**Auteur :** Joseph Auryl AKAKPO  
**Statut :** Définitif

---

## Table des matières
1. [Résumé exécutif et objectifs du projet](#1-résumé-exécutif-et-objectifs-du-projet)
2. [User Stories et Parcours Utilisateurs détaillés](#2-user-stories-et-parcours-utilisateurs-détaillés)
3. [Spécifications fonctionnelles](#3-spécifications-fonctionnelles)
4. [Exigences techniques](#4-exigences-techniques)
5. [Exigences non fonctionnelles](#5-exigences-non-fonctionnelles)

---

## 1. Résumé exécutif et objectifs du projet

### 1.1 Contexte

L'ONG ELITE ATACORA est une organisation non gouvernementale béninoise fondée le 8 janvier 2018, dont le siège est à Natitingou (Quartier Dassagaté, Département de l'Atacora). Elle est régie par la loi n°2025-19 du 22 juillet 2025 relative aux associations et fondations en République du Bénin. Ses statuts ont été révisés et adoptés en Assemblée Générale Extraordinaire le 18 mars 2026 à Abomey Calavi.

L'ONG est apolitique et à but non lucratif. Elle œuvre pour l'atteinte des Objectifs de Développement Durable n°4 (éducation de qualité) et n°5 (égalité des genres) à travers :
- La promotion du statut socio-économique de la femme rurale
- La scolarisation des orphelins et enfants vulnérables
- L'inclusion financière et l'autonomisation des filles et femmes rurales
- La lutte contre les violences faites aux femmes
- Le renforcement de la résilience des communautés face au changement climatique

À ce jour, l'ONG n'a aucune présence numérique. Cette absence constitue un frein majeur à la crédibilité institutionnelle, à la mobilisation de partenaires (notamment internationaux), et à la visibilité de ses actions terrain.

### 1.2 Problème à résoudre

| Problème | Impact |
|---|---|
| Aucune présence en ligne | Introuvable sur Google, crédibilité limitée auprès des bailleurs |
| Pas de canal d'adhésion numérique | Perte de membres potentiels faute de point d'entrée simple |
| Pas de vitrine pour les activités | Les partenaires institutionnels et donateurs ne peuvent pas évaluer l'impact de l'ONG |
| Pas de canal d'information | Les membres et bénéficiaires sont dépendants du bouche-à-oreille et de WhatsApp |

### 1.3 Objectifs du projet

**Objectif primaire :** Créer un site web vitrine professionnel, crédible et autonome pour l'ONG ELITE ATACORA, livrable en 3 jours, sans contrat de maintenance.

**Objectifs secondaires :**
1. **Crédibilité institutionnelle** — Le site doit permettre à un bailleur de fonds ou partenaire international de trouver instantanément toutes les informations légales et opérationnelles de l'ONG.
2. **Autonomie totale de la cliente** — La Présidente ou la Chargée de la Communication doit pouvoir publier des actualités et des événements sans aucune compétence technique, sans intervention du développeur.
3. **Visibilité en ligne** — Le site doit être indexable par les moteurs de recherche et accessible à une audience internationale (widget de traduction automatique).
4. **Collecte de candidatures à l'adhésion** — Offrir un formulaire d'adhésion en ligne qui notifie automatiquement l'ONG par email.

### 1.4 Périmètre du projet

**Dans le périmètre (IN SCOPE) :**
- Site web vitrine multipage en WordPress
- CMS avec interface d'administration simple
- 9 pages fonctionnelles (détaillées en section 3)
- Formulaire d'adhésion avec notification email
- Blog actualités (publication autonome)
- Calendrier d'événements (gestion autonome)
- Widget de traduction automatique (Google Translate)
- Optimisation SEO de base
- Design responsive (mobile, tablette, desktop)
- Déploiement initial sur domaine du développeur
- Intégration du logo et des assets visuels fournis

**Hors périmètre (OUT OF SCOPE) :**
- Paiement en ligne des cotisations ou droits d'adhésion (processus offline)
- Espace membre connecté (extranet membres)
- Système de gestion des membres (base de données interne)
- Application mobile
- Maintenance post-livraison
- Refonte graphique du logo
- Rédaction des contenus (fournis par la cliente)

### 1.5 Contraintes

| Contrainte | Détail |
|---|---|
| Délai | 3 jours calendaires à partir du démarrage |
| Budget développement | Non défini / pris en charge par le développeur |
| Hébergement | Déploiement initial sur domaine du développeur ; transfert ultérieur sur domaine propre de l'ONG |
| Maintenance | Zéro contrat de maintenance — la cliente doit être 100 % autonome |
| Contenu | Assets visuels fournis (logo, photos, vidéos) ; textes à compléter par la cliente |
| Connectivité | Audience en Afrique de l'Ouest — le site doit fonctionner sur des connexions mobiles lentes |

### 1.6 Parties prenantes

| Rôle | Personne | Responsabilité |
|---|---|---|
| Cliente / Décideuse | SANGA PEMA Tébouwa Gislaine (Présidente BE) | Validation des contenus et des livrables |
| Utilisatrice éditoriale | ZOUNTCHEGBE Yanick (Chargée Communication) | Publication des actualités et événements |
| Développeur | Joseph Auryl AKAKPO | Conception, développement, livraison |

---

## 2. User Stories et Parcours Utilisateurs détaillés

Trois profils utilisateurs ont été identifiés pour ce site.

### Persona 1 — Le Bailleur / Partenaire Institutionnel

**Profil :** Chargé de programme dans une organisation internationale (UE, PNUD, ONG sœur). Basé hors du Bénin. Cherche à qualifier une ONG locale pour un partenariat ou une subvention.

**Comportement :** Recherche le nom de l'ONG sur Google, atterrit sur la page d'accueil, veut rapidement vérifier : légitimité juridique, domaine d'action, impact démontré, gouvernance transparente, contact.

**Frustrations actuelles :** Aucun résultat Google = doute sur l'existence réelle de l'ONG. Passe par WhatsApp ou email direct = peu professionnel à son niveau.

#### User Stories — Bailleur

| ID | En tant que… | Je veux… | Afin de… | Priorité |
|---|---|---|---|---|
| US-B01 | Bailleur institutionnel | Trouver Elite Atacora sur Google en cherchant son nom | Confirmer qu'elle existe et est sérieuse | Must Have |
| US-B02 | Bailleur institutionnel | Lire la mission, la vision et les valeurs de l'ONG | Évaluer l'alignement avec mes critères de financement | Must Have |
| US-B03 | Bailleur institutionnel | Voir la liste des membres du Bureau Exécutif avec leurs fonctions | Identifier les interlocuteurs légitimes | Must Have |
| US-B04 | Bailleur institutionnel | Consulter les activités passées et projets réalisés | Mesurer l'impact terrain | Must Have |
| US-B05 | Bailleur institutionnel | Trouver une adresse, un numéro de téléphone et un email de contact | Entamer une correspondance officielle | Must Have |
| US-B06 | Bailleur institutionnel | Lire le site dans ma langue (anglais) | Comprendre sans barrière linguistique | Should Have |

#### Parcours Bailleur (Happy Path)

```
Google "Elite Atacora ONG Bénin"
    → Page d'accueil (hero avec mission, CTA "En savoir plus")
        → Rubrique "À propos" (mission, vision, valeurs, historique)
            → Rubrique "Gouvernance" (Bureau Exécutif, organes)
                → Rubrique "Nos activités" (réalisations + photos)
                    → Page "Contact" (formulaire + infos directes)
                        → Email de prise de contact envoyé
```

---

### Persona 2 — La Chargée de Communication (Utilisatrice Admin)

**Profil :** ZOUNTCHEGBE Yanick, membre du Bureau Exécutif. Pas de profil développeur. Habituée à Facebook, WhatsApp. Dispose d'un smartphone Android et d'un ordinateur portable.

**Comportement :** Elle doit pouvoir publier une actualité ou annoncer un événement depuis son téléphone ou PC, sans formation longue, sans contacter le développeur.

**Frustrations anticipées :** Interface trop complexe, trop d'étapes pour publier, risque de "casser" le site si elle fait une fausse manipulation.

#### User Stories — Chargée Communication

| ID | En tant que… | Je veux… | Afin de… | Priorité |
|---|---|---|---|---|
| US-C01 | Chargée Communication | Me connecter à l'admin WordPress depuis mon téléphone | Gérer le site partout | Must Have |
| US-C02 | Chargée Communication | Créer un article d'actualité avec titre, texte et photo en moins de 5 étapes | Publier une news facilement | Must Have |
| US-C03 | Chargée Communication | Créer un événement avec date, lieu, description et image | Annoncer une activité à venir | Must Have |
| US-C04 | Chargée Communication | Modifier ou supprimer un article ou événement existant | Corriger une erreur ou mettre à jour | Must Have |
| US-C05 | Chargée Communication | Voir la liste des demandes d'adhésion reçues par email | Transmettre à la Présidente | Should Have |
| US-C06 | Chargée Communication | Ne pas pouvoir altérer accidentellement le design du site | Travailler sereinement | Must Have |

#### Parcours Publication d'une Actualité (Happy Path)

```
Connexion wp-admin (identifiant/mot de passe)
    → Tableau de bord WordPress
        → Articles > Ajouter
            → Titre de l'article
            → Corps du texte (éditeur visuel Gutenberg)
            → Image à la une (upload depuis téléphone)
            → Catégorie : "Actualités"
                → Publier
                    → L'article apparaît sur /actualites et en vedette sur l'accueil
```

---

### Persona 3 — Le Candidat à l'Adhésion

**Profil :** Habitant du département Atacora, jeune femme ou homme, sympatisant ou futur membre actif. Connecté principalement via smartphone.

**Comportement :** Entend parler de l'ONG, cherche à rejoindre, veut comprendre les conditions et soumettre une candidature.

**Frustrations actuelles :** Ne sait pas où s'adresser. N'a personne en contact direct. Le processus offline (se présenter, écrire une lettre) est une barrière.

#### User Stories — Candidat Adhésion

| ID | En tant que… | Je veux… | Afin de… | Priorité |
|---|---|---|---|---|
| US-A01 | Candidat à l'adhésion | Comprendre les conditions d'adhésion (types de membres, montants) | Savoir si je suis éligible et ce que ça coûte | Must Have |
| US-A02 | Candidat à l'adhésion | Remplir un formulaire de candidature en ligne | Soumettre ma demande sans me déplacer | Must Have |
| US-A03 | Candidat à l'adhésion | Recevoir une confirmation que ma demande a été envoyée | Avoir la preuve de ma démarche | Should Have |
| US-A04 | Candidat à l'adhésion | Lire la mission de l'ONG avant de m'engager | M'assurer que ça correspond à mes valeurs | Must Have |

#### Parcours Adhésion (Happy Path)

```
Lien partagé sur WhatsApp → eliteatacora.org
    → Page d'accueil (section Mission + CTA "Nous rejoindre")
        → Page /adherer
            → Bloc explicatif : types de membres, droits d'adhésion (5 000 FCFA), cotisations (2 000 FCFA/mois)
            → Formulaire : Nom, Prénom, Email, Téléphone, Type d'adhésion souhaité, Lettre de motivation
                → Soumission → Email de notification envoyé à l'ONG
                    → Message de confirmation affiché à l'écran ("Votre demande a bien été transmise. Nous reviendrons vers vous prochainement.")
```

---

## 3. Spécifications fonctionnelles

### 3.1 Architecture des pages

Le site se compose de **9 pages**, organisées comme suit :

```
/ (Accueil)
├── /a-propos
│   ├── Historique
│   ├── Mission & Vision
│   └── Valeurs
├── /gouvernance
│   ├── Organes de l'ONG
│   └── Bureau Exécutif
├── /nos-actions
│   └── (Galerie projets/activités)
├── /actualites
│   └── /actualites/[slug-article]
├── /evenements
│   └── /evenements/[slug-evenement]
├── /adherer
├── /contact
└── /politique-de-confidentialite
```

---

### 3.2 Page 1 — Accueil (`/`)

**Description :** Première impression du site. Doit convaincre en moins de 5 secondes tout type de visiteur.

**Sections :**

| Section | Contenu | Critère d'acceptation |
|---|---|---|
| Hero Banner | Image de fond (photo terrain ou logo), nom de l'ONG, tagline inspirante, deux CTA : "Découvrir l'ONG" et "Nous rejoindre" | Visible au-dessus du pli sur tous les devices |
| Chiffres clés | Année de création (2018), nombre de projets réalisés, zones d'intervention, nombre de bénéficiaires (données à fournir par la cliente) | Section visuellement impactante, facile à mettre à jour |
| Mission en résumé | Texte court (3-4 lignes) sur l'objet de l'ONG + CTA "En savoir plus" vers /a-propos | Cohérent avec les statuts officiels |
| Nos dernières actualités | 3 articles de blog les plus récents (vignette, titre, date, lien) | Mis à jour automatiquement à chaque nouvelle publication |
| Événements à venir | 2 prochains événements (titre, date, lieu) | Mis à jour automatiquement via The Events Calendar |
| Nos valeurs | 5 valeurs affichées avec icône : Excellence · Professionnalisme · Transparence · Esprit d'équipe · Honnêteté/Intégrité | Affichage en grille ou carrousel |
| Appel à l'adhésion | Bloc CTA "Rejoignez-nous" avec lien vers /adherer | Visible en bas de page |
| Footer | Logo, navigation, coordonnées (Natitingou, Atacora, (+229) 0194055090), liens légaux | Présent sur toutes les pages |

**Critères d'acceptation globaux :**
- [x] La page se charge en moins de 3 secondes sur une connexion 3G
- [x] Le Hero est lisible sur mobile sans scroll horizontal
- [x] Les sections d'actualités et d'événements se mettent à jour sans intervention du développeur

---

### 3.3 Page 2 — À Propos (`/a-propos`)

**Description :** Présentation institutionnelle complète de l'ONG.

**Sections :**

| Section | Contenu | Critère d'acceptation |
|---|---|---|
| Historique | Fondée le 8 janvier 2018 à Godomey Togoudo. Statuts révisés le 18 mars 2026 à Abomey Calavi conformément à la loi n°2025-19 | Dates et contexte corrects |
| Mission | Contribuer au développement des communautés et à la réduction de la pauvreté, centrée sur les ODD 4 et 5 | Fidèle aux statuts officiels |
| Vision | Texte à fournir par la cliente (non présent explicitement dans les statuts) | Validation requise |
| Objectifs spécifiques | Liste des 6 objectifs issus de l'Article 5 des statuts : femmes rurales, orphelins, inclusion financière, lutte VBG, résilience climatique, œuvres sociales | Correspondance exacte avec les statuts |
| Valeurs | 5 valeurs (Article 6) avec description de chacune | Culture de l'excellence · Professionnalisme · Transparence · Esprit d'équipe · Honnêteté-Intégrité |
| Signification du logo | Explication : femme en marche vers le succès sur des escaliers collés à la carte du Bénin | Cohérent avec Article 9 des statuts |

**Critères d'acceptation :**
- [x] Toutes les informations sont fidèles aux statuts officiels de l'ONG
- [x] La page est éditable par la Chargée de Communication depuis le back-office WordPress (page statique éditable)

---

### 3.4 Page 3 — Gouvernance (`/gouvernance`)

**Description :** Transparence sur la structure de direction de l'ONG.

**Sections :**

| Section | Contenu | Critère d'acceptation |
|---|---|---|
| Les organes | Présentation des 4 organes : AG, BE, VC, CC avec leur rôle respectif | Fidèle à l'Article 21 des statuts |
| Bureau Exécutif | Grille de 9 membres + 2 membres de surveillance avec : nom complet, poste, photo (si fournie) | Noms exacts issus de l'Article 25-2 |
| Assemblée Générale | Description du rôle et fonctionnement (Article 22-23) | Synthèse lisible, non juridique |
| Commission de Contrôle | Description du rôle (Article 27-28) | Synthèse lisible |

**Membres du Bureau Exécutif à afficher :**

| Poste | Nom |
|---|---|
| Présidente | SANGA PEMA Tébouwa Gislaine épse KOUTI |
| Vice-Présidente | SIMBA Kado Alphonse |
| Secrétaire Générale | TOHOYESSOU AGOLI-AGBO Majoie Géroxie |
| Secrétaire Générale Adjointe | LAFIA YAROU Djibril Adamou |
| Trésorière Générale | OUIN-OURO Massopa Brigitte |
| Trésorière Générale Adjointe | SINAISSIRE Chèrifatou |
| Chargée de la Communication | ZOUNTCHEGBE Yanick |
| Chargée des Partenariats | SOGAN Monique |
| Chargée des ODD | TOUNGAKOUAGOU Sabine épse SAMA |
| Présidente du Conseil de Surveillance | ATIOGBE SODOKIN Gélase |
| Secrétaire du Conseil de Surveillance | BEKOUSSANRI Sylvère |

**Critères d'acceptation :**
- [x] Tous les membres sont listés avec leur poste exact
- [x] La mise en page permet d'ajouter ou modifier un membre sans toucher au code (via ACF ou page statique éditable)
- [x] Les photos de membres sont optionnelles (placeholder affiché si pas de photo fournie)

---

### 3.5 Page 4 — Nos Actions (`/nos-actions`)

**Description :** Galerie illustrative des activités et projets menés sur le terrain.

**Sections :**

| Section | Contenu | Critère d'acceptation |
|---|---|---|
| Introduction | Texte court de présentation des domaines d'action | Cohérent avec l'Article 4 et 5 des statuts |
| Domaines d'action | 6 blocs thématiques (femmes rurales, orphelins, inclusion financière, lutte VBG, climat, œuvres sociales) avec icône + description | Chaque bloc est un condensé lisible et non juridique |
| Galerie photos/vidéos | Intégration des 9 photos et 3 vidéos MP4 fournies (séminaires, matériel terrain) | Galerie responsive avec lightbox |

**Critères d'acceptation :**
- [x] Les vidéos MP4 sont intégrées nativement (pas d'upload YouTube obligatoire)
- [x] La galerie est éditable depuis le back-office (ajout de nouvelles photos sans code)

---

### 3.6 Page 5 — Actualités (`/actualites` et `/actualites/[slug]`)

**Description :** Blog institutionnel. Section la plus utilisée par la Chargée de Communication.

**Fonctionnalités :**

| Fonctionnalité | Détail | Critère d'acceptation |
|---|---|---|
| Liste des articles | Vignettes avec image, titre, date, extrait (150 caractères), lien "Lire la suite" | Pagination 9 articles par page |
| Article individuel | Titre, auteur, date, corps du texte, image principale, images intégrées, boutons de partage social | Formatage propre sur mobile |
| Catégories | Catégorisation libre par l'éditeur | Filtre par catégorie sur la page liste |
| Recherche | Barre de recherche dans les articles | Résultats en temps réel ou page de résultats |
| Article à la une | La Chargée peut marquer un article comme "à la une" (s'affiche sur l'accueil) | Sélection depuis le back-office |

**Critères d'acceptation :**
- [x] Un article peut être créé, modifié et publié en moins de 5 minutes depuis un smartphone
- [x] Le back-office Gutenberg est utilisé sans formation préalable (interface WYSIWYG)
- [x] Les 3 derniers articles apparaissent automatiquement sur la page d'accueil

---

### 3.7 Page 6 — Événements (`/evenements` et `/evenements/[slug]`)

**Description :** Calendrier des activités passées et à venir.

**Fonctionnalités :**

| Fonctionnalité | Détail | Critère d'acceptation |
|---|---|---|
| Liste des événements | Titre, date, lieu, image, description courte | Tri par date (du plus prochain au plus récent) |
| Événement individuel | Titre, description complète, date de début et fin, lieu, image | Affichage clair sur mobile |
| Vue calendrier | Option d'affichage en vue calendrier mensuel | Basculement grille/calendrier |
| Événements passés | Section archive visible | Accessibilité des événements passés |
| Événements sur l'accueil | Les 2 prochains événements remontent automatiquement sur la page d'accueil | Automatique via plugin |

**Plugin utilisé :** The Events Calendar (version gratuite)

**Critères d'acceptation :**
- [x] Création d'un événement en moins de 5 étapes depuis le back-office
- [x] La date de l'événement s'affiche en format lisible français (ex. "Samedi 28 juin 2026")
- [x] Les événements passés ne disparaissent pas, ils passent en archive

---

### 3.8 Page 7 — Adhésion (`/adherer`)

**Description :** Page centrale pour la collecte de candidatures. Priorité critique.

**Sections :**

| Section | Contenu | Critère d'acceptation |
|---|---|---|
| Processus d'adhésion | Étapes illustrées : 1) Remplir le formulaire → 2) Attendre la réponse de la Présidente → 3) Payer les droits (5 000 FCFA) en agence → 4) Déposer 2 photos d'identité → 5) Recevoir sa carte de membre | Étapes numérotées, claires, sans jargon juridique |
| Types de membres | Explication des 4 types (adhérent, actif, sympathisant, d'honneur) avec avantages de chacun | Basé sur les Articles 17 à 20 des statuts |
| Tarifs | Droits d'adhésion : 5 000 FCFA / Cotisation mensuelle : 2 000 FCFA (24 000 FCFA/an, 4 tranches) / Échéance : 05 décembre de chaque année | Chiffres exacts issus du Règlement Intérieur |
| Formulaire de candidature | Champs : Nom*, Prénom*, Email*, Téléphone*, Type de membre souhaité (liste déroulante)*, Message de motivation* | Tous les champs marqués * sont obligatoires |
| Confirmation | Message de succès après envoi | "Votre demande a bien été transmise. Le Bureau Exécutif d'Elite Atacora reviendra vers vous dans les meilleurs délais." |

**Comportement du formulaire :**
- À la soumission, un email de notification est envoyé à l'adresse officielle de l'ONG (à définir)
- L'email contient toutes les informations saisies par le candidat
- Un message de confirmation s'affiche à l'écran (pas de redirection)
- En cas d'erreur de champ, un message d'erreur inline s'affiche (sans rechargement de page)

**Critères d'acceptation :**
- [x] Le formulaire fonctionne sans JavaScript désactivé (fallback HTML natif)
- [x] L'email de notification arrive en moins de 2 minutes
- [x] Le formulaire est protégé contre le spam (honeypot + reCAPTCHA v3 ou Akismet)
- [x] Aucun paiement en ligne n'est demandé (processus explicitement offline)

---

### 3.9 Page 8 — Contact (`/contact`)

**Sections :**

| Section | Contenu | Critère d'acceptation |
|---|---|---|
| Informations directes | Adresse : Natitingou, Quartier Dassagaté, Département Atacora, Bénin / Téléphone : (+229) 0194055090 / Email : [à définir] | Informations exactes issues des statuts |
| Carte | Google Maps embedé centré sur Natitingou | Chargé de manière asynchrone (pas de blocage du reste de la page) |
| Formulaire de contact | Nom, Email, Sujet, Message | Envoi vers l'email de l'ONG |

**Critères d'acceptation :**
- [x] Le formulaire et les informations directes sont tous deux visibles, le visiteur a le choix
- [x] La carte Google Maps ne bloque pas le chargement de la page (lazy loading)

---

### 3.10 Page 9 — Politique de Confidentialité (`/politique-de-confidentialite`)

**Description :** Page légale obligatoire pour tout site collectant des données personnelles (formulaires d'adhésion et de contact).

**Contenu minimum :**
- Responsable du traitement : ONG ELITE ATACORA
- Données collectées : Nom, prénom, email, téléphone, message
- Finalité : Traitement des candidatures à l'adhésion et des demandes de contact
- Durée de conservation : 2 ans
- Droits des personnes : accès, rectification, suppression (contact : email ONG)
- Pas de revente ou transmission à des tiers

**Critères d'acceptation :**
- [x] Lien vers cette page présent dans le footer sur toutes les pages
- [x] Lien vers cette page présent au-dessus du bouton de soumission de chaque formulaire

---

### 3.11 Composants globaux

#### Header / Navigation
- Logo (fichier JPEG fourni) cliquable → retour accueil
- Menu principal : Accueil · À propos · Gouvernance · Nos actions · Actualités · Événements · Adhérer · Contact
- Menu collapsible (hamburger) sur mobile
- Widget Google Translate visible dans le header (position fixe)
- Le header est sticky (reste visible au scroll)

#### Footer
- Logo + tagline
- Navigation secondaire : Accueil · À propos · Actualités · Contact · Politique de confidentialité
- Coordonnées : Natitingou, Atacora, Bénin — (+229) 0194055090
- Liens réseaux sociaux (si la cliente fournit les URL)
- Mention légale : "ONG Elite Atacora — Loi n°2025-19 du 22 juillet 2025, République du Bénin"
- Copyright © 2026 ONG Elite Atacora

#### Widget Google Translate
- Plugin : "Translate WordPress – Google Language Translator" (Translate Press ou GTranslate)
- Langue par défaut : Français
- Langues disponibles : Anglais, Portugais (pertinent pour l'Afrique de l'Ouest lusophone)
- Affichage : sélecteur de drapeau/langue discret dans le header

---

## 4. Exigences techniques

### 4.1 Stack technologique recommandée

| Composant | Choix | Justification |
|---|---|---|
| CMS | **WordPress 6.x** (dernière version stable) | Standard mondial des ONG, écosystème francophone massif, client autonome après formation de 30 min |
| Thème | **Astra** (version gratuite) | Ultra-léger (<50KB), 100% compatible Elementor, maintenu activement, performant sur connexions lentes |
| Page Builder | **Elementor Free** | Interface drag-and-drop, ne nécessite aucune compétence code, préservé du cœur WordPress |
| Formulaires | **Contact Form 7** | Plugin le plus utilisé (10M+ installations), gratuit, email natif WordPress, extensible |
| Emails transactionnels | **WP Mail SMTP** (version gratuite) | Évite que les emails finissent en spam, configuration SMTP sur un vrai serveur mail |
| Événements | **The Events Calendar** (version gratuite) | Gestion calendrier native WordPress, interface admin simple, vues liste/calendrier |
| SEO | **Yoast SEO** (version gratuite) | Standard SEO WordPress, génère sitemap.xml automatique, guide la rédaction |
| Cache & Performance | **WP Super Cache** ou **LiteSpeed Cache** (selon hébergeur) | Réduction du temps de chargement, critique pour l'Afrique de l'Ouest |
| Sécurité | **Wordfence Security** (version gratuite) | Pare-feu, scan malware, protection brute-force |
| Sauvegardes | **UpdraftPlus** (version gratuite) | Sauvegardes automatiques hebdomadaires, restauration en 1 clic |
| Traduction | **GTranslate** (version gratuite) | Widget Google Translate intégré, détection de langue automatique |
| Images | **Smush** ou **ShortPixel** | Compression automatique des images uploadées |
| Anti-spam | **Akismet** (gratuit pour ONG) | Protection des formulaires contre le spam |
| Rôles utilisateurs | **WordPress natif** (rôle Éditeur) | La Chargée Communication aura le rôle "Éditeur" : peut publier articles et événements, ne peut PAS modifier le design |

### 4.2 Architecture WordPress

```
WordPress Installation
├── /wp-content/themes/
│   └── astra/ (thème actif)
│       └── child-theme/ (thème enfant pour customisations CSS)
├── /wp-content/plugins/
│   ├── elementor/
│   ├── contact-form-7/
│   ├── wp-mail-smtp/
│   ├── the-events-calendar/
│   ├── yoast-seo/
│   ├── wp-super-cache/
│   ├── wordfence/
│   ├── updraftplus/
│   ├── gtranslate/
│   └── akismet/
├── /wp-content/uploads/
│   ├── logo/ (logo officiel)
│   ├── photos/ (photos terrain)
│   └── videos/ (3 vidéos MP4)
└── wp-config.php (configuration sécurisée)
```

### 4.3 Configuration des rôles utilisateurs

| Rôle WordPress | Utilisateur | Permissions |
|---|---|---|
| Administrateur | Développeur (temporaire) | Accès total |
| Administrateur | Présidente (SANGA PEMA) | Accès total au back-office |
| Éditeur | Chargée Communication (ZOUNTCHEGBE Yanick) | Créer/modifier/publier Articles, Événements, Pages — NE PEUT PAS modifier thème ni plugins |

**Règle critique :** La Chargée de Communication ne doit jamais avoir accès à l'apparence (thème/Elementor) ni aux plugins. Le rôle "Éditeur" natif WordPress est suffisant pour cet usage.

### 4.4 Modèle de données (Types de contenu WordPress)

#### Post Type 1 : Articles (natif WordPress)
```
Article
├── titre (string, required)
├── contenu (rich text, required)
├── image_a_la_une (media, optional)
├── categorie (taxonomy : Actualités | Témoignages | Rapports | Presse)
├── date_publication (date, auto)
├── auteur (user reference, auto)
└── statut (draft | published)
```

#### Post Type 2 : Événements (via The Events Calendar)
```
Événement
├── titre (string, required)
├── description (rich text, optional)
├── date_debut (datetime, required)
├── date_fin (datetime, optional)
├── lieu (string + adresse optionnelle, required)
├── image (media, optional)
├── organisateur (string, optional)
└── statut (draft | published)
```

#### Post Type 3 : Pages statiques (natif WordPress)
```
Pages : Accueil | À propos | Gouvernance | Nos Actions | Adhérer | Contact | Politique de confidentialité
```

### 4.5 Configuration des formulaires

#### Formulaire d'Adhésion (Contact Form 7)
```
Champs :
- nom (text, required, maxlength=100)
- prenom (text, required, maxlength=100)
- email (email, required)
- telephone (tel, required, pattern=[+0-9 ]{8,20})
- type_adhesion (select, required)
  Options : Membre adhérent | Membre sympathisant | Membre d'honneur
- motivation (textarea, required, minlength=50, maxlength=2000)
- [honeypot anti-spam] (hidden field)
- [acceptance] (checkbox) "J'accepte la politique de confidentialité" (required)

Email de notification :
- Destinataire : [email ONG à définir]
- Objet : "Nouvelle demande d'adhésion — [nom] [prenom]"
- Corps : Tous les champs + date et heure de soumission
```

#### Formulaire de Contact (Contact Form 7)
```
Champs :
- nom (text, required)
- email (email, required)
- sujet (text, required)
- message (textarea, required, minlength=20)
- [acceptance] "J'accepte la politique de confidentialité" (required)

Email de notification :
- Destinataire : [email ONG à définir]
- Objet : "[sujet] — Contact via eliteatacora.org"
```

### 4.6 Configuration SEO (Yoast)

| Paramètre | Valeur |
|---|---|
| Titre site | ONG Elite Atacora — Développement communautaire au Bénin |
| Description site | ONG béninoise engagée pour l'autonomisation des femmes, l'éducation et la résilience des communautés du département de l'Atacora |
| Sitemap XML | Activé (soumis à Google Search Console) |
| Schema Organization | Activé (type : NGO) |
| Open Graph | Activé (partage optimisé sur réseaux sociaux) |
| Mots-clés cibles | "ONG Atacora Bénin", "Elite Atacora", "ONG femmes rurales Bénin", "ONG développement communautaire Bénin" |

### 4.7 Déploiement et transfert de domaine

#### Phase 1 — Déploiement initial (sous-domaine développeur)
```
URL temporaire : eliteatacora.[domaine-développeur].com (ou similaire)
Hébergement : serveur actuel du développeur
WordPress : installation fraîche avec le domaine temporaire
```

#### Phase 2 — Migration vers domaine propre (future)
```
Étapes :
1. Achat du domaine (recommandation : eliteatacora.org ou eliteatacora.bj)
2. Achat hébergement (recommandation : OVH ou Hostinger — ~5€/mois)
3. Export WordPress complet (All-in-One WP Migration ou UpdraftPlus)
4. Changement des URL dans wp-config.php et wp_options
5. Mise à jour des DNS
6. Installation SSL (Let's Encrypt — gratuit)
7. Test complet
8. Redirection 301 depuis l'ancien domaine

Durée estimée migration : 2-4 heures
Compétence requise : Développeur (une seule intervention)
```

**Recommandation domaine :** `eliteatacora.org` (disponibilité à vérifier) ou `ong-eliteatacora.org`  
**Recommandation hébergeur futur :** Hostinger Business (~7€/mois, CDN inclus, serveurs proches de l'Afrique de l'Ouest)

---

## 5. Exigences non fonctionnelles

### 5.1 Performance

| Métrique | Cible | Méthode de vérification |
|---|---|---|
| Temps de chargement (3G) | < 3 secondes | Google PageSpeed Insights |
| Score PageSpeed Mobile | > 70/100 | Google PageSpeed Insights |
| Score PageSpeed Desktop | > 85/100 | Google PageSpeed Insights |
| Poids total de la page d'accueil | < 2 MB | Chrome DevTools > Network |
| Temps jusqu'à premier contenu (FCP) | < 2 secondes | Core Web Vitals |

**Optimisations à implémenter :**
- Compression et redimensionnement des images (WebP si supporté, sinon JPEG optimisé)
- Mise en cache navigateur et serveur (WP Super Cache)
- Chargement différé des images (lazy loading natif HTML)
- Chargement asynchrone de Google Maps (ne bloque pas le rendu)
- Minification CSS/JS (via Elementor natif)
- Utilisation du CDN de GTranslate pour le widget de traduction
- Vidéos MP4 : encodage H.264 recommandé, poids < 20 MB chacune

### 5.2 Responsivité et compatibilité

| Breakpoint | Comportement attendu |
|---|---|
| Mobile (< 768px) | Navigation hamburger, colonnes empilées, formulaires pleine largeur, vidéos responsive |
| Tablette (768px–1024px) | Navigation visible, grilles 2 colonnes |
| Desktop (> 1024px) | Design pleine largeur, grilles 3-4 colonnes |

**Navigateurs supportés :**
- Chrome Android (audience principale)
- Firefox Android
- Safari iOS
- Chrome Desktop (dernières 2 versions)
- Firefox Desktop (dernières 2 versions)

**Résolution minimale supportée :** 320px (iPhone SE ancienne génération)

### 5.3 Sécurité

| Mesure | Implémentation |
|---|---|
| HTTPS obligatoire | Certificate SSL Let's Encrypt (gratuit) — redirection HTTP → HTTPS |
| Protection brute-force | Wordfence : limitation des tentatives de connexion à 5/heure |
| Mise à jour automatique | Mises à jour automatiques WordPress core + plugins de sécurité activées |
| Sauvegarde automatique | UpdraftPlus : sauvegarde hebdomadaire complète (base de données + fichiers) |
| Protection des formulaires | Akismet + honeypot sur Contact Form 7 |
| Accès admin sécurisé | URL d'admin personnalisée (ex. /gestion au lieu de /wp-admin) via plugin WPS Hide Login |
| Permissions fichiers | wp-config.php en 400, /wp-content/uploads/ sans exécution PHP |
| Désactivation XML-RPC | Désactivé (vecteur d'attaque DDoS et brute-force) |
| Headers de sécurité | X-Frame-Options, X-Content-Type-Options, Referrer-Policy configurés |

### 5.4 Accessibilité

| Critère | Niveau cible |
|---|---|
| Contraste texte/fond | Ratio minimum 4.5:1 (WCAG AA) |
| Attributs ALT | Toutes les images doivent avoir un attribut alt descriptif |
| Navigation clavier | Tous les éléments interactifs accessibles au clavier |
| Balises sémantiques | H1 unique par page, hiérarchie H2/H3 respectée |
| Formulaires | Labels associés à chaque champ, messages d'erreur explicites |

### 5.5 Internationalisation

| Paramètre | Valeur |
|---|---|
| Langue par défaut | Français (fr_FR) |
| Encodage | UTF-8 (supporte les caractères spéciaux français et locaux) |
| Traduction automatique | Widget GTranslate — FR → EN, PT activés au minimum |
| Format dates | Français (ex. "18 mai 2026") via réglages WordPress |
| Fuseau horaire | Africa/Porto-Novo (Bénin, UTC+1) |

### 5.6 Maintenance post-livraison (autonomie cliente)

**Ce que la cliente peut faire seule, sans le développeur :**
- Publier, modifier, supprimer des articles d'actualité
- Créer, modifier, supprimer des événements
- Uploader des photos dans la galerie
- Mettre à jour les coordonnées de contact
- Modifier les textes des pages statiques (via bloc Elementor ou Gutenberg)
- Voir les soumissions de formulaires reçues par email
- Mettre à jour WordPress et les plugins (bouton "Mettre à jour" dans le tableau de bord)

**Ce qui nécessite l'intervention du développeur :**
- Migration vers le domaine propre de l'ONG (une seule fois, ~2-4h)
- Modification de la structure du design ou des templates
- Ajout de nouvelles fonctionnalités
- Résolution d'un problème technique grave

### 5.7 Plan de livraison — 3 jours

| Jour | Tâches | Livrable |
|---|---|---|
| **Jour 1** | Installation WordPress + thème Astra + plugins / Configuration des rôles / Création de la structure des pages / Intégration du logo et de l'identité visuelle / Charte graphique (couleurs logo : vert #2e7d32, jaune #f9a825, rouge #b71c1c) | Environnement WordPress fonctionnel avec navigation |
| **Jour 2** | Développement des pages : Accueil, À propos, Gouvernance, Nos actions / Intégration des photos et vidéos / Configuration SEO Yoast / Configuration des formulaires Contact Form 7 + WP Mail SMTP | 4 pages principales livrées |
| **Jour 3** | Développement : Actualités, Événements, Adhérer, Contact, Politique de confidentialité / Tests cross-browser et mobile / Optimisations performance / Google Translate widget / Sécurisation (Wordfence, SSL, sauvegardes) / Documentation client (guide de publication en PDF) | Site complet déployé + guide d'utilisation |

### 5.8 Livrable final — Guide d'utilisation client

À la livraison, un document PDF "Guide de publication — Elite Atacora" sera remis à la Présidente et à la Chargée de Communication. Il comprendra :

1. Comment se connecter à l'administration WordPress
2. Comment publier un article d'actualité (captures d'écran étape par étape)
3. Comment créer un événement
4. Comment uploader une photo ou vidéo
5. Comment mettre à jour WordPress et les plugins
6. Quoi ne jamais toucher (thème, plugins critiques)
7. Contacts en cas de problème bloquant (email développeur)

---

## Annexes

### A. Informations officielles de l'ONG

| Champ | Valeur |
|---|---|
| Dénomination | ONG ELITE ATACORA |
| Siège | Natitingou, Quartier Dassagaté, Arrondissement 1, Département Atacora, Bénin |
| Téléphone | (+229) 0194055090 |
| Date de création | 8 janvier 2018 |
| Statuts révisés | 18 mars 2026 (Assemblée Générale Extraordinaire, Abomey Calavi) |
| Cadre juridique | Loi n°2025-19 du 22 juillet 2025, République du Bénin |
| Nature | Apolitique, à but non lucratif |
| ODD ciblés | ODD 4 (Éducation de qualité) et ODD 5 (Égalité des genres) |

### B. Droits d'adhésion et cotisations

| Type | Montant |
|---|---|
| Droit d'adhésion (unique) | 5 000 FCFA |
| Cotisation mensuelle | 2 000 FCFA |
| Cotisation annuelle | 24 000 FCFA (4 tranches, échéance 05 décembre) |

### C. Charte graphique (extraite du logo officiel)

| Élément | Valeur |
|---|---|
| Couleur principale | Vert — #2E7D32 (vert Bénin) |
| Couleur secondaire | Jaune/Or — #F9A825 (lettres "SUCCESS" et accents) |
| Couleur accent | Rouge — #C62828 (drapeau béninois) |
| Typographie recommandée | Montserrat (titres) + Open Sans (corps) — Google Fonts, gratuites |
| Logo | Femme en marche sur escaliers "SUCCESS" superposés à la carte du Bénin |

### D. Assets visuels fournis

| Fichier | Type | Usage prévu |
|---|---|---|
| Logo Elite Atacora | JPEG | Header, Footer, Meta OG |
| 7 photos de séminaires/ateliers | JPEG | Galerie "Nos actions", articles |
| 1 photo matériel terrain | JPEG | Illustration actions terrain |
| 3 vidéos MP4 | Vidéo | Galerie "Nos actions" |

### E. Points ouverts à valider avec la cliente

| # | Question | Impact |
|---|---|---|
| 1 | Adresse email officielle de l'ONG | Indispensable pour les formulaires |
| 2 | Texte de la vision (non mentionné dans les statuts) | Page À propos |
| 3 | Photos des membres du Bureau Exécutif | Page Gouvernance |
| 4 | Chiffres clés à afficher (nb de projets, bénéficiaires, zones) | Section accueil |
| 5 | Présence sur réseaux sociaux (Facebook, Instagram, LinkedIn) | Footer |
| 6 | Nom de domaine souhaité (à acheter ultérieurement) | Migration phase 2 |

---

*Document rédigé sur la base des statuts officiels (version 18 mars 2026), du règlement intérieur, du brief verbal de la cliente, et des assets visuels fournis.*

*PRD v1.0 — ONG ELITE ATACORA — Mai 2026*
