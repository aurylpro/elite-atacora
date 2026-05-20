/**
 * Script de pré-remplissage du dataset Sanity « Elite Atacora ».
 * Téléverse les photos, crée les réglages du site, les membres,
 * les articles et les événements de démonstration.
 *
 * Lancement :  node scripts/seed.mjs
 */
import { readFileSync } from 'node:fs'
import { homedir } from 'node:os'
import { join } from 'node:path'

const PROJECT = 'q3dxm5im'
const DATASET = 'production'
const API = `https://${PROJECT}.api.sanity.io/v2024-01-01`

const TOKEN = JSON.parse(
  readFileSync(join(homedir(), '.config/sanity/config.json'), 'utf8'),
).authToken

const PUBLIC = new URL('../public/images/', import.meta.url)

function key() {
  return Math.random().toString(36).slice(2, 12)
}

// ── Upload d'une image, renvoie l'asset _id ────────────────────────────────
const assetCache = {}
async function uploadImage(filename) {
  if (assetCache[filename]) return assetCache[filename]
  const buf = readFileSync(new URL(filename, PUBLIC))
  const res = await fetch(`${API}/assets/images/${DATASET}?filename=${filename}`, {
    method: 'POST',
    headers: { Authorization: `Bearer ${TOKEN}`, 'Content-Type': 'image/jpeg' },
    body: buf,
  })
  const json = await res.json()
  if (!json.document?._id) throw new Error('Upload échoué ' + filename + ' : ' + JSON.stringify(json))
  assetCache[filename] = json.document._id
  console.log(`  ✓ image ${filename} → ${json.document._id}`)
  return json.document._id
}

function imageRef(assetId) {
  return { _type: 'image', asset: { _type: 'reference', _ref: assetId } }
}

// Bloc PortableText "paragraphe"
function para(text) {
  return {
    _type: 'block', _key: key(), style: 'normal', markDefs: [],
    children: [{ _type: 'span', _key: key(), text, marks: [] }],
  }
}
function heading(text) {
  return {
    _type: 'block', _key: key(), style: 'h2', markDefs: [],
    children: [{ _type: 'span', _key: key(), text, marks: [] }],
  }
}

async function mutate(mutations) {
  const res = await fetch(`${API}/data/mutate/${DATASET}?returnIds=true`, {
    method: 'POST',
    headers: { Authorization: `Bearer ${TOKEN}`, 'Content-Type': 'application/json' },
    body: JSON.stringify({ mutations }),
  })
  const json = await res.json()
  if (json.error) throw new Error(JSON.stringify(json.error))
  return json
}

// ── DONNÉES ────────────────────────────────────────────────────────────────

const MEMBRES = [
  { poste: 'Présidente',                   nom: 'SANGA PEMA Tébouwa Gislaine épse KOUTI', organe: 'be', ordre: 1 },
  { poste: 'Vice-Président',               nom: 'SIMBA Kado Alphonse',                     organe: 'be', ordre: 2 },
  { poste: 'Secrétaire Générale',          nom: 'TOHOYESSOU AGOLI-AGBO Majoie Géroxie',    organe: 'be', ordre: 3 },
  { poste: 'Secrétaire Général Adjoint',   nom: 'LAFIA YAROU Djibril Adamou',              organe: 'be', ordre: 4 },
  { poste: 'Trésorière Générale',          nom: 'OUIN-OURO Massopa Brigitte',              organe: 'be', ordre: 5 },
  { poste: 'Trésorière Générale Adjointe', nom: 'SINAISSIRE Chèrifatou',                   organe: 'be', ordre: 6 },
  { poste: 'Chargée de la Communication',  nom: 'ZOUNTCHEGBE Yanick',                      organe: 'be', ordre: 7 },
  { poste: 'Chargée des Partenariats',     nom: 'SOGAN Monique',                           organe: 'be', ordre: 8 },
  { poste: 'Chargée des ODD',              nom: 'TOUNGAKOUAGOU Sabine épse SAMA',          organe: 'be', ordre: 9 },
  { poste: 'Présidente du Conseil de Surveillance', nom: 'ATIOGBE SODOKIN Gélase',         organe: 'cs', ordre: 10 },
  { poste: 'Secrétaire du Conseil de Surveillance', nom: 'BEKOUSSANRI Sylvère',            organe: 'cs', ordre: 11 },
]

const ARTICLES = [
  { slug: 'alphabetisation-tanguieta', cat: 'Programme',   img: 'photo-5.jpeg', date: '2026-05-12', min: 4,
    titre: 'Alphabétisation fonctionnelle des femmes rurales de Tanguiéta',
    extrait: "Premier déploiement du dispositif AFR-1 dans quatre villages, en partenariat avec la mairie.",
    body: [
      "Mardi 12 mai, l'ONG Elite Atacora a officiellement lancé son programme d'Alphabétisation Fonctionnelle Rurale (AFR-1) dans la commune de Tanguiéta. Ce dispositif cible 240 femmes réparties dans quatre villages : Tchanhoun-Cossi, Tanongou, Cotiakou et Taïacou.",
      "Le programme combine alphabétisation en langue nationale et modules pratiques : gestion d'un petit commerce, lecture d'ordonnance, tenue d'un cahier de comptes.",
    ] },
  { slug: 'convention-ddaep', cat: 'Partenariat', img: 'photo-7.jpeg', date: '2026-04-28', min: 3,
    titre: "Convention signée avec la Direction Départementale de l'Atacora",
    extrait: "Cadre formel pour nos interventions en milieu scolaire sur l'égalité et la prévention.",
    body: ["Un accord-cadre vient d'être signé avec la Direction Départementale, formalisant nos interventions en milieu scolaire sur les thématiques de l'égalité fille-garçon et de la prévention des violences."] },
  { slug: 'kits-maraichers-boukombe', cat: 'Terrain', img: 'photo-2.jpeg', date: '2026-04-09', min: 2,
    titre: '120 productrices de Boukombé reçoivent leurs kits maraîchers',
    extrait: "Arrosoirs, semences et fertilisant biologique pour la campagne pré-pluviale 2026.",
    body: ["120 productrices de la commune de Boukombé ont reçu leurs kits maraîchers : arrosoirs, semences sélectionnées et fertilisant biologique, en vue de la campagne pré-pluviale 2026."] },
  { slug: 'temoignage-hadjara', cat: 'Témoignage', img: 'photo-3.jpeg', date: '2026-03-22', min: 5,
    titre: '« Avant Elite Atacora, je ne savais pas écrire mon nom »',
    extrait: "Portrait de Hadjara, 34 ans, première promotion AFR-1 à Cobly.",
    body: ["Hadjara, 34 ans, fait partie de la première promotion du programme AFR-1 à Cobly. En quelques mois, elle a appris à lire, écrire et tenir les comptes de son commerce."] },
  { slug: 'rapport-2025', cat: 'Rapport', img: 'photo-6.jpeg', date: '2026-03-15', min: 6,
    titre: "Rapport d'activité 2025 disponible en téléchargement",
    extrait: "62 pages, données consolidées, audit interne du Conseil de Surveillance.",
    body: ["Le rapport d'activité 2025 est désormais disponible : 62 pages de données consolidées, validées par le Conseil de Surveillance."] },
  { slug: 'reboisement-2026', cat: 'Programme', img: 'photo-8.jpeg', date: '2026-03-01', min: 3,
    titre: 'Lancement de la campagne de reboisement Atacora 2026',
    extrait: "Objectif : 8 000 plants sur 6 communes avec les comités villageois.",
    body: ["La campagne de reboisement 2026 vise la mise en terre de 8 000 plants sur les six communes d'intervention, en collaboration avec les comités villageois."] },
]

const EVENTS = [
  { slug: 'ag-ordinaire-2026', type: 'Statutaire', img: 'photo-5.jpeg', featured: true,
    titre: 'Assemblée Générale Ordinaire 2026',
    debut: '2026-06-28T09:00:00.000Z', fin: '2026-06-28T13:00:00.000Z',
    lieu: 'Salle communale, Quartier Dassagaté — Natitingou, Atacora', ville: 'Natitingou',
    description: "Le rendez-vous statutaire annuel réunissant tous les membres adhérents et actifs.",
    agenda: [
      { time: '08h30', item: 'Accueil des membres et émargement' },
      { time: '09h00', item: 'Ouverture officielle par la Présidente' },
      { time: '09h15', item: 'Rapport moral 2025-2026' },
      { time: '10h00', item: 'Rapport financier 2025' },
      { time: '11h30', item: "Présentation du plan d'action 2026-2027" },
      { time: '12h15', item: 'Vote des résolutions' },
      { time: '12h45', item: 'Clôture et cocktail' },
    ] },
  { slug: 'atelier-odd-tanguieta', type: 'Atelier', img: 'photo-7.jpeg', featured: false,
    titre: 'Atelier régional ODD 4 & ODD 5',
    debut: '2026-07-14T08:30:00.000Z', fin: '2026-07-14T17:00:00.000Z',
    lieu: 'Centre socio-culturel — Tanguiéta', ville: 'Tanguiéta',
    description: "Atelier de travail sur les Objectifs de Développement Durable n°4 et n°5." },
  { slug: 'caravane-vbg-aout', type: 'Sensibilisation', img: 'photo-3.jpeg', featured: false,
    titre: 'Caravane de sensibilisation VBG',
    debut: '2026-08-22T08:00:00.000Z',
    lieu: 'Boukombé · Cobly · Matéri', ville: 'Boukombé',
    description: "Caravane de sensibilisation contre les violences basées sur le genre." },
  { slug: 'afr2-boukombe', type: 'Programme', img: 'photo-4.jpeg', featured: false,
    titre: 'Lancement cohorte AFR-2 Boukombé',
    debut: '2026-09-08T10:00:00.000Z', fin: '2026-09-08T12:00:00.000Z',
    lieu: 'Mairie de Boukombé', ville: 'Boukombé',
    description: "Lancement de la deuxième cohorte du programme d'alphabétisation." },
]

// ── SEED ───────────────────────────────────────────────────────────────────

async function run() {
  console.log('→ Téléversement des images…')
  const imgs = {}
  for (const f of ['photo-2.jpeg','photo-3.jpeg','photo-4.jpeg','photo-5.jpeg','photo-6.jpeg','photo-7.jpeg','photo-8.jpeg']) {
    imgs[f] = await uploadImage(f)
  }

  console.log('→ Réglages du site (siteSettings)…')
  await mutate([{
    createOrReplace: {
      _id: 'siteSettings',
      _type: 'siteSettings',
      homeHero: {
        image: imageRef(imgs['photo-5.jpeg']),
        imageCaption: 'Assemblée Générale 2025',
        quote: '« Notre force, c’est notre communauté. »',
      },
      homeStats: [
        { _key: key(), value: 2018, suffix: '',  label: 'Année de fondation',    note: 'Godomey Togoudo' },
        { _key: key(), value: 24,   suffix: '+', label: 'Projets menés',         note: 'depuis la création' },
        { _key: key(), value: 6,    suffix: '',  label: 'Communes couvertes',    note: 'département Atacora' },
        { _key: key(), value: 3200, suffix: '+', label: 'Bénéficiaires directs', note: 'femmes & enfants' },
      ],
      homeMarquee: [
        'Assemblée Générale 2026 · Natitingou · 28 juin',
        'Atelier ODD 4 & 5 · Tanguiéta · 14 juillet',
        'Recrutement bénévoles · programme AFR-1',
        "Rapport d'activité 2025 disponible",
        'Adhésions ouvertes · 5 000 FCFA',
        'Caravane VBG · 22 août · Boukombé',
      ],
      aboutHero:   imageRef(imgs['photo-7.jpeg']),
      govHero:     imageRef(imgs['photo-5.jpeg']),
      actionsHero: imageRef(imgs['photo-2.jpeg']),
      contact: {
        adresse: 'Quartier Dassagaté\nNatitingou, Atacora · Bénin',
        telephone: '(+229) 01 94 05 50 90',
        email: 'contact@eliteatacora.org',
        horaires: 'Lun → Ven · 08h-17h\nSam · 09h-13h',
      },
      social: {},
    },
  }])
  console.log('  ✓ siteSettings')

  console.log('→ Membres du Bureau…')
  await mutate(MEMBRES.map((m) => ({
    createOrReplace: {
      _id: `membre-${m.ordre}`,
      _type: 'membre',
      nom: m.nom, poste: m.poste, organe: m.organe, ordre: m.ordre,
    },
  })))
  console.log(`  ✓ ${MEMBRES.length} membres`)

  console.log('→ Articles…')
  await mutate(ARTICLES.map((a) => ({
    createOrReplace: {
      _id: `article-${a.slug}`,
      _type: 'article',
      titre: a.titre,
      slug: { _type: 'slug', current: a.slug },
      imageALaUne: imageRef(imgs[a.img]),
      categorie: a.cat,
      extrait: a.extrait,
      contenu: a.body.flatMap((p, i) => i === 1 ? [heading('Sur le terrain'), para(p)] : [para(p)]),
      auteur: 'ZOUNTCHEGBE Yanick',
      auteurRole: 'Chargée de la Communication',
      tempsLecture: a.min,
      datePublication: a.date,
      aLaUne: false,
    },
  })))
  console.log(`  ✓ ${ARTICLES.length} articles`)

  console.log('→ Événements…')
  await mutate(EVENTS.map((e) => ({
    createOrReplace: {
      _id: `evenement-${e.slug}`,
      _type: 'evenement',
      titre: e.titre,
      slug: { _type: 'slug', current: e.slug },
      image: imageRef(imgs[e.img]),
      type: e.type,
      description: e.description,
      dateDebut: e.debut,
      ...(e.fin ? { dateFin: e.fin } : {}),
      lieu: e.lieu,
      ville: e.ville,
      featured: e.featured,
      organisateur: 'ONG Elite Atacora',
      ...(e.agenda ? { agenda: e.agenda.map((a) => ({ _key: key(), ...a })) } : {}),
    },
  })))
  console.log(`  ✓ ${EVENTS.length} événements`)

  console.log('\n✅ Pré-remplissage terminé.')
}

run().catch((err) => {
  console.error('\n❌ Erreur :', err.message)
  process.exit(1)
})
