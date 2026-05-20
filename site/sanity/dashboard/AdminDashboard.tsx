'use client'

/**
 * Dashboard d'accueil custom du Studio (Sanity Tool).
 * Affiche les KPIs, des actions rapides et l'activité récente,
 * dans un style proche du site (cream / forest / honey / DM Serif).
 */
import { useEffect, useState } from 'react'
import { useClient } from 'sanity'
import { useRouter } from 'sanity/router'
import {
  AddDocumentIcon, CalendarIcon, DocumentTextIcon, UsersIcon,
  ControlsIcon, EditIcon, RocketIcon, HomeIcon, BookIcon,
  ImagesIcon,
} from '@sanity/icons'

type Counts = {
  articles: number
  evenementsAVenir: number
  evenementsPasses: number
  membres: number
  lastSettingsUpdate: string | null
}

type RecentDoc = {
  _id: string
  _type: string
  _updatedAt: string
  titre?: string
  nom?: string
}

export function AdminDashboard() {
  const client = useClient({ apiVersion: '2024-01-01' })
  const router = useRouter()
  const [counts, setCounts] = useState<Counts | null>(null)
  const [recent, setRecent] = useState<RecentDoc[]>([])
  const [loading, setLoading] = useState(true)

  useEffect(() => {
    let mounted = true
    const load = async () => {
      try {
        const nowIso = new Date().toISOString()
        const [c, r] = await Promise.all([
          client.fetch<Counts>(`{
            "articles":         count(*[_type == "article" && !(_id in path("drafts.**"))]),
            "evenementsAVenir": count(*[_type == "evenement" && dateDebut >= $now && !(_id in path("drafts.**"))]),
            "evenementsPasses": count(*[_type == "evenement" && dateDebut <  $now && !(_id in path("drafts.**"))]),
            "membres":          count(*[_type == "membre" && !(_id in path("drafts.**"))]),
            "lastSettingsUpdate": *[_type == "siteSettings"][0]._updatedAt
          }`, { now: nowIso }),
          client.fetch<RecentDoc[]>(`*[_type in ["article","evenement","membre"] && !(_id in path("drafts.**"))]
            | order(_updatedAt desc)[0...6]{_id, _type, _updatedAt, titre, nom}`),
        ])
        if (!mounted) return
        setCounts(c)
        setRecent(r)
      } finally {
        if (mounted) setLoading(false)
      }
    }
    load()
    return () => { mounted = false }
  }, [client])

  const go = (intent: 'create' | 'edit', type: string, id?: string) => {
    if (intent === 'create') {
      router.navigateIntent('create', { type, template: type })
    } else if (id) {
      router.navigateIntent('edit', { id, type })
    }
  }

  return (
    <div style={S.root}>
      <style>{CSS}</style>

      {/* HERO */}
      <header style={S.hero}>
        <div style={S.eyebrow}>
          <span style={S.eyebrowBar} />
          Espace d&apos;administration
        </div>
        <h1 style={S.h1}>
          Bonjour <em style={S.italic}>Elite Atacora.</em>
        </h1>
        <p style={S.subtitle}>
          Publiez articles, événements, et mettez à jour les contenus du site —
          tout est sauvegardé automatiquement et synchronisé en direct.
        </p>
      </header>

      {/* KPIs */}
      <section style={S.kpiGrid}>
        <Kpi color="forest"     icon={<DocumentTextIcon />} label="Articles publiés"          value={counts?.articles} loading={loading} />
        <Kpi color="terracotta" icon={<CalendarIcon />}     label="Événements à venir"        value={counts?.evenementsAVenir} loading={loading} />
        <Kpi color="honey"      icon={<UsersIcon />}        label="Membres du Bureau"          value={counts?.membres} loading={loading} />
        <Kpi color="ink"        icon={<CalendarIcon />}     label="Événements passés"          value={counts?.evenementsPasses} loading={loading} />
      </section>

      {/* QUICK ACTIONS */}
      <section style={S.section}>
        <h2 style={S.h2}>Actions <em style={S.italicSm}>rapides.</em></h2>
        <div style={S.actionsGrid}>
          <ActionCard
            icon={<AddDocumentIcon />}
            title="Publier un article"
            desc="Programme, témoignage, presse, rapport — partagez ce qui se passe sur le terrain."
            color="forest"
            onClick={() => go('create', 'article')}
          />
          <ActionCard
            icon={<CalendarIcon />}
            title="Ajouter un événement"
            desc="Assemblée, atelier, caravane — annoncez vos prochains rendez-vous."
            color="terracotta"
            onClick={() => go('create', 'evenement')}
          />
          <ActionCard
            icon={<UsersIcon />}
            title="Ajouter un membre"
            desc="Mettez à jour le Bureau Exécutif ou le Conseil de Surveillance."
            color="honey"
            onClick={() => go('create', 'membre')}
          />
          <ActionCard
            icon={<HomeIcon />}
            title="Modifier l'Accueil"
            desc="Image hero, citation, chiffres clés, bandeau défilant."
            color="ink"
            onClick={() => go('edit', 'siteSettings', 'siteSettings')}
          />
          <ActionCard
            icon={<ImagesIcon />}
            title="Médiathèque"
            desc="Toutes vos photos uploadées : recherchez, taguez, réutilisez."
            color="forest"
            onClick={() => router.navigateUrl({ path: '/media' })}
          />
          <ActionCard
            icon={<ControlsIcon />}
            title="Coordonnées & social"
            desc="Adresse, téléphone, email, réseaux sociaux affichés dans le footer."
            color="terracotta"
            onClick={() => go('edit', 'siteSettings', 'siteSettings')}
          />
        </div>
      </section>

      {/* RECENT ACTIVITY */}
      <section style={S.section}>
        <h2 style={S.h2}>Activité <em style={S.italicSm}>récente.</em></h2>
        {loading ? (
          <div style={S.empty}>Chargement…</div>
        ) : recent.length === 0 ? (
          <div style={S.empty}>Aucune publication encore. Cliquez sur une action ci-dessus pour démarrer.</div>
        ) : (
          <ul style={S.recentList}>
            {recent.map((d) => (
              <li key={d._id}>
                <button style={S.recentItem} onClick={() => go('edit', d._type, d._id)}>
                  <span style={S.recentIcon}>
                    {d._type === 'article' ? <DocumentTextIcon /> :
                     d._type === 'evenement' ? <CalendarIcon /> :
                     d._type === 'membre' ? <UsersIcon /> : <EditIcon />}
                  </span>
                  <span style={S.recentText}>
                    <span style={S.recentType}>{labelType(d._type)}</span>
                    <span style={S.recentTitle}>{d.titre || d.nom || '(sans titre)'}</span>
                  </span>
                  <span style={S.recentDate}>{fmtRelative(d._updatedAt)}</span>
                </button>
              </li>
            ))}
          </ul>
        )}
      </section>

      {/* HELP */}
      <section style={S.section}>
        <div style={S.helpCard}>
          <div style={S.helpIcon}><BookIcon /></div>
          <div style={{ flex: 1 }}>
            <h3 style={S.h3}>Besoin d&apos;aide ?</h3>
            <p style={S.p}>
              Consultez le guide d&apos;utilisation pas à pas pour publier votre
              premier article ou changer l&apos;image de l&apos;accueil.
            </p>
          </div>
          <a href="/ADMIN_GUIDE.md" target="_blank" rel="noreferrer" style={S.helpBtn}>
            Ouvrir le guide
            <RocketIcon />
          </a>
        </div>
      </section>

      <footer style={S.footerNote}>
        <span>Tout est sauvegardé automatiquement. Vous pouvez fermer cet onglet à tout moment.</span>
        <a href="/" target="_blank" rel="noreferrer" style={S.viewSite}>Voir le site public →</a>
      </footer>
    </div>
  )
}

// ── Sub-components ──────────────────────────────────────────────────────────

function Kpi({ icon, label, value, color, loading }: { icon: React.ReactNode; label: string; value?: number; color: 'forest' | 'terracotta' | 'honey' | 'ink'; loading: boolean }) {
  return (
    <div className={`kpi kpi-${color}`}>
      <div className="kpi-icon">{icon}</div>
      <div className="kpi-value">{loading ? '…' : (value ?? 0).toLocaleString('fr-FR')}</div>
      <div className="kpi-label">{label}</div>
    </div>
  )
}

function ActionCard({ icon, title, desc, color, onClick }: { icon: React.ReactNode; title: string; desc: string; color: string; onClick: () => void }) {
  return (
    <button className={`action action-${color}`} onClick={onClick}>
      <div className="action-icon">{icon}</div>
      <div className="action-title">{title}</div>
      <div className="action-desc">{desc}</div>
      <div className="action-arrow">→</div>
    </button>
  )
}

function labelType(t: string) {
  return t === 'article' ? 'Article' :
         t === 'evenement' ? 'Événement' :
         t === 'membre' ? 'Membre' :
         t === 'siteSettings' ? 'Réglages' : t
}

function fmtRelative(iso: string) {
  const now = Date.now()
  const then = new Date(iso).getTime()
  const diffMin = Math.round((now - then) / 60000)
  if (diffMin < 1) return "à l'instant"
  if (diffMin < 60) return `il y a ${diffMin} min`
  const h = Math.round(diffMin / 60)
  if (h < 24) return `il y a ${h} h`
  const d = Math.round(h / 24)
  if (d < 7) return `il y a ${d} j`
  return new Date(iso).toLocaleDateString('fr-FR', { day: 'numeric', month: 'short', year: 'numeric' })
}

// ── Styles ──────────────────────────────────────────────────────────────────

const S: Record<string, React.CSSProperties> = {
  root:    { background: '#FAF5EA', minHeight: '100%', padding: '40px 28px', fontFamily: '"Plus Jakarta Sans", system-ui, sans-serif', color: '#1E1813' },
  hero:    { maxWidth: 920, margin: '0 auto 48px' },
  eyebrow: { display: 'inline-flex', alignItems: 'center', gap: 10, fontSize: 12, fontWeight: 600, textTransform: 'uppercase', letterSpacing: '0.18em', color: '#1E5631', marginBottom: 18 },
  eyebrowBar: { width: 24, height: 1, background: 'currentColor' as any, display: 'inline-block' },
  h1:      { fontFamily: '"DM Serif Display", Georgia, serif', fontSize: 'clamp(2.2rem, 5vw, 3.6rem)', lineHeight: 1.02, letterSpacing: '-0.02em', margin: 0 },
  italic:  { fontStyle: 'italic', color: '#C2542A', fontFamily: '"DM Serif Display", Georgia, serif' },
  italicSm:{ fontStyle: 'italic', color: '#C2542A', fontFamily: '"DM Serif Display", Georgia, serif' },
  subtitle:{ marginTop: 18, color: '#3A2E22', fontSize: 16, lineHeight: 1.7, maxWidth: 620 },
  section: { maxWidth: 1180, margin: '0 auto 48px' },
  h2:      { fontFamily: '"DM Serif Display", Georgia, serif', fontSize: 'clamp(1.6rem, 3vw, 2.4rem)', lineHeight: 1.05, margin: '0 0 24px' },
  h3:      { fontFamily: '"DM Serif Display", Georgia, serif', fontSize: 20, margin: 0 },
  p:       { color: '#3A2E22', fontSize: 14, lineHeight: 1.6, margin: '6px 0 0' },
  kpiGrid: { display: 'grid', gridTemplateColumns: 'repeat(auto-fit, minmax(220px, 1fr))', gap: 16, maxWidth: 1180, margin: '0 auto 64px' },
  actionsGrid: { display: 'grid', gridTemplateColumns: 'repeat(auto-fit, minmax(280px, 1fr))', gap: 16 },
  empty:   { background: '#F6EDD8', borderRadius: 16, padding: 32, color: '#7B6E58', textAlign: 'center', fontSize: 14 },
  recentList: { listStyle: 'none', margin: 0, padding: 0, display: 'flex', flexDirection: 'column', gap: 8 },
  recentItem: { width: '100%', background: '#fff', border: '1px solid rgba(30,24,19,0.08)', borderRadius: 14, padding: '14px 18px', display: 'flex', alignItems: 'center', gap: 14, textAlign: 'left', cursor: 'pointer', font: 'inherit', color: 'inherit', transition: 'background 150ms ease, transform 150ms ease' },
  recentIcon: { width: 36, height: 36, borderRadius: 10, background: '#F6EDD8', display: 'grid', placeItems: 'center', color: '#1E5631', flexShrink: 0 },
  recentText: { display: 'flex', flexDirection: 'column', gap: 2, flex: 1, minWidth: 0 },
  recentType: { fontSize: 11, textTransform: 'uppercase', letterSpacing: '0.12em', color: '#7B6E58', fontWeight: 600 },
  recentTitle: { fontFamily: '"DM Serif Display", Georgia, serif', fontSize: 16, color: '#1E1813', whiteSpace: 'nowrap', overflow: 'hidden', textOverflow: 'ellipsis' },
  recentDate: { fontSize: 12, color: '#7B6E58', flexShrink: 0 },
  helpCard: { background: '#1E1813', color: '#FAF5EA', borderRadius: 24, padding: '24px 28px', display: 'flex', alignItems: 'center', gap: 18, flexWrap: 'wrap' },
  helpIcon: { width: 44, height: 44, borderRadius: '50%', background: 'rgba(233,180,76,0.2)', color: '#E9B44C', display: 'grid', placeItems: 'center', flexShrink: 0 },
  helpBtn:  { background: '#E9B44C', color: '#1E1813', fontWeight: 600, fontSize: 14, padding: '10px 18px', borderRadius: 999, textDecoration: 'none', display: 'inline-flex', alignItems: 'center', gap: 8 },
  footerNote: { maxWidth: 1180, margin: '40px auto 12px', display: 'flex', justifyContent: 'space-between', alignItems: 'center', flexWrap: 'wrap', gap: 12, color: '#7B6E58', fontSize: 12 },
  viewSite: { color: '#1E5631', textDecoration: 'none', fontWeight: 600 },
}

const CSS = `
.kpi { padding: 24px; border-radius: 24px; position: relative; overflow: hidden; }
.kpi-forest     { background: #1E5631; color: #FAF5EA; }
.kpi-terracotta { background: #C2542A; color: #FAF5EA; }
.kpi-honey      { background: #E9B44C; color: #1E1813; }
.kpi-ink        { background: #1E1813; color: #FAF5EA; }
.kpi-icon       { width: 36px; height: 36px; opacity: .85; margin-bottom: 12px; }
.kpi-value      { font-family: "DM Serif Display", Georgia, serif; font-size: 44px; line-height: 1; font-variant-numeric: tabular-nums; }
.kpi-label      { margin-top: 8px; font-size: 13px; opacity: .9; }

.action {
  text-align: left; cursor: pointer; padding: 22px; border-radius: 24px;
  border: 1px solid rgba(30,24,19,0.08); background: #FFF;
  display: flex; flex-direction: column; gap: 8px; position: relative;
  transition: transform 200ms ease, box-shadow 200ms ease;
  font: inherit; color: inherit;
}
.action:hover { transform: translateY(-3px); box-shadow: 0 20px 40px -20px rgba(30,24,19,0.2); }
.action-icon { width: 40px; height: 40px; border-radius: 12px; display: grid; place-items: center; }
.action-forest .action-icon     { background: rgba(30,86,49,.12);  color: #1E5631; }
.action-terracotta .action-icon { background: rgba(194,84,42,.12); color: #C2542A; }
.action-honey .action-icon      { background: rgba(233,180,76,.22); color: #C2542A; }
.action-ink .action-icon        { background: rgba(30,24,19,.08);  color: #1E1813; }
.action-title { font-family: "DM Serif Display", Georgia, serif; font-size: 20px; color: #1E1813; }
.action-desc  { color: #3A2E22; font-size: 13.5px; line-height: 1.55; }
.action-arrow { position: absolute; top: 22px; right: 22px; color: #7B6E58; font-size: 18px; transition: transform 200ms ease; }
.action:hover .action-arrow { transform: translateX(4px); color: #1E5631; }

.recentItem:hover { background: #F6EDD8 !important; transform: translateX(2px); }

@media (max-width: 600px) {
  .kpi { padding: 18px; border-radius: 18px; }
  .kpi-value { font-size: 34px; }
  .action { padding: 18px; border-radius: 18px; }
}
`
