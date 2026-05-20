'use client'

import { useState } from 'react'
import Link from 'next/link'
import { Eyebrow } from './Eyebrow'
import { ArrowIcon } from './ArrowIcon'

const TYPES = ['Adhérent·e', 'Actif', 'Sympathisant·e', "D'honneur"] as const

type FormState = {
  prenom: string
  nom: string
  email: string
  telephone: string
  type_adhesion: (typeof TYPES)[number]
  motivation: string
  politique: boolean
  _honey: string
}

const initial: FormState = {
  prenom: '',
  nom: '',
  email: '',
  telephone: '',
  type_adhesion: 'Adhérent·e',
  motivation: '',
  politique: false,
  _honey: '',
}

export function AdhesionForm() {
  const [form, setForm] = useState<FormState>(initial)
  const [submitted, setSubmitted] = useState(false)
  const [loading, setLoading] = useState(false)
  const [error, setError] = useState<string | null>(null)

  const onSubmit = async (e: React.FormEvent) => {
    e.preventDefault()
    if (loading) return
    setLoading(true)
    setError(null)
    try {
      const res = await fetch('/api/adhesion', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(form),
      })
      const data = await res.json().catch(() => ({}))
      if (!res.ok) throw new Error(data?.error || 'Erreur serveur')
      setSubmitted(true)
      setForm(initial)
    } catch (err: any) {
      setError(err?.message || "Une erreur est survenue. Réessayez plus tard.")
    } finally {
      setLoading(false)
    }
  }

  if (submitted) {
    return (
      <section id="formulaire" className="py-24 bg-paper">
        <div className="max-w-[840px] mx-auto px-6">
          <div className="bg-cream rounded-[40px] p-12 sm:p-16 ring-1 ring-ink/5 text-center">
            <div className="w-20 h-20 mx-auto rounded-full bg-forest text-cream grid place-items-center">
              <svg width="34" height="26" viewBox="0 0 24 18" fill="none" aria-hidden="true">
                <path d="M2 9 L9 16 L22 2" stroke="currentColor" strokeWidth="2.5" strokeLinecap="round" strokeLinejoin="round" />
              </svg>
            </div>
            <h2 className="mt-8 font-serif text-[36px] sm:text-[44px] leading-[1.05] text-ink tracking-tight">
              Votre demande a bien été <em className="italic text-terracotta">transmise.</em>
            </h2>
            <p className="mt-5 text-coffee text-[16px] leading-[1.7] max-w-lg mx-auto">
              Le Bureau Exécutif d&apos;Elite Atacora reviendra vers vous dans les
              meilleurs délais, généralement sous 7 jours ouvrés.
            </p>
            <div className="mt-8">
              <button
                onClick={() => setSubmitted(false)}
                className="inline-flex items-center gap-3 border border-ink/15 text-ink hover:bg-ink hover:text-cream hover:border-ink transition-colors font-semibold text-[14px] px-7 py-4 rounded-full"
              >
                Soumettre une autre demande
              </button>
            </div>
          </div>
        </div>
      </section>
    )
  }

  return (
    <section id="formulaire" className="py-24 bg-paper">
      <div className="max-w-[1100px] mx-auto px-6">
        <div className="bg-cream rounded-[40px] ring-1 ring-ink/5 overflow-hidden grid grid-cols-12">
          {/* Left panel */}
          <div className="col-span-12 lg:col-span-5 bg-forest text-cream p-10 sm:p-12 relative overflow-hidden">
            <svg aria-hidden="true" className="absolute -bottom-32 -left-20 w-96 h-96 text-honey/15" viewBox="0 0 200 200" fill="none">
              <circle cx="100" cy="100" r="90" stroke="currentColor" strokeWidth="2" strokeDasharray="4 8" />
            </svg>
            <Eyebrow color="cream">Formulaire d&apos;adhésion</Eyebrow>
            <h2 className="mt-5 font-serif text-[36px] leading-[1.05] tracking-tight">
              Quelques minutes <em className="italic text-honey">suffisent.</em>
            </h2>
            <ul className="mt-10 space-y-4 text-[14px] text-cream/85">
              {[
                'Tous les champs marqués * sont obligatoires',
                'Vos données ne sont jamais cédées à des tiers',
                'Une réponse vous est garantie sous 7 jours',
              ].map((t) => (
                <li key={t} className="flex items-start gap-3">
                  <span className="w-5 h-5 rounded-full bg-honey grid place-items-center text-ink shrink-0 mt-0.5">
                    <svg width="10" height="8" viewBox="0 0 24 18" fill="none" aria-hidden="true">
                      <path d="M2 9 L9 16 L22 2" stroke="currentColor" strokeWidth="3" strokeLinecap="round" strokeLinejoin="round" />
                    </svg>
                  </span>
                  <span>{t}</span>
                </li>
              ))}
            </ul>
          </div>

          {/* Right panel : form */}
          <form onSubmit={onSubmit} className="col-span-12 lg:col-span-7 p-10 sm:p-12 space-y-5" noValidate>
            <input
              type="text"
              tabIndex={-1}
              autoComplete="off"
              value={form._honey}
              onChange={(e) => setForm({ ...form, _honey: e.target.value })}
              style={{ position: 'absolute', left: '-10000px', width: '1px', height: '1px', opacity: 0 }}
              aria-hidden="true"
            />

            <div className="grid grid-cols-2 gap-4">
              <Field label="Prénom *" type="text" value={form.prenom}  onChange={(v) => setForm({ ...form, prenom: v })}  />
              <Field label="Nom *"    type="text" value={form.nom}     onChange={(v) => setForm({ ...form, nom: v })}     />
            </div>
            <Field label="Email *"       type="email" value={form.email}     onChange={(v) => setForm({ ...form, email: v })}     />
            <Field label="Téléphone *"   type="tel"   value={form.telephone} onChange={(v) => setForm({ ...form, telephone: v })} placeholder="(+229) …" />

            <div>
              <label className="text-[11px] uppercase tracking-widest text-muted font-semibold">Type de membre souhaité *</label>
              <div className="mt-2 grid grid-cols-2 sm:grid-cols-4 gap-2">
                {TYPES.map((t) => (
                  <button
                    key={t}
                    type="button"
                    onClick={() => setForm({ ...form, type_adhesion: t })}
                    className={`px-3 py-2.5 rounded-full text-[12px] font-medium border transition-colors
                      ${form.type_adhesion === t ? 'bg-forest text-cream border-forest' : 'bg-paper border-paper text-ink hover:border-forest/30'}`}
                  >
                    {t}
                  </button>
                ))}
              </div>
            </div>

            <div>
              <label htmlFor="motivation" className="text-[11px] uppercase tracking-widest text-muted font-semibold">Lettre de motivation *</label>
              <textarea
                id="motivation"
                required
                minLength={50}
                value={form.motivation}
                onChange={(e) => setForm({ ...form, motivation: e.target.value })}
                className="mt-2 w-full bg-paper rounded-2xl px-5 py-4 text-[14px] ring-1 ring-transparent focus:ring-forest focus:bg-cream focus:outline-none transition-colors min-h-[140px] resize-y"
                placeholder="Pourquoi souhaitez-vous rejoindre Elite Atacora ? (minimum 50 caractères)"
              />
            </div>

            <label className="flex items-start gap-3 text-[13px] text-coffee/90">
              <input
                type="checkbox"
                required
                checked={form.politique}
                onChange={(e) => setForm({ ...form, politique: e.target.checked })}
                className="w-5 h-5 mt-0.5 rounded accent-forest"
              />
              <span>
                J&apos;accepte la <Link href="/politique-de-confidentialite" className="text-forest underline">politique de confidentialité</Link> et la conservation de mes données par l&apos;ONG Elite Atacora.
              </span>
            </label>

            {error && <div className="text-claretred text-[13px] font-semibold">{error}</div>}

            <div className="pt-2">
              <button
                type="submit"
                disabled={loading}
                className="group inline-flex items-center gap-3 bg-forest text-cream pl-7 pr-2 py-2 rounded-full text-[14px] font-semibold hover:bg-mossdk transition-colors disabled:opacity-60 disabled:cursor-wait"
              >
                {loading ? 'Envoi…' : 'Envoyer ma candidature'}
                <span className="w-9 h-9 rounded-full bg-honey text-ink grid place-items-center transition-transform group-hover:translate-x-1">
                  <ArrowIcon />
                </span>
              </button>
            </div>
          </form>
        </div>
      </div>
    </section>
  )
}

function Field({ label, type = 'text', value, onChange, placeholder = '' }: { label: string; type?: string; value: string; onChange: (v: string) => void; placeholder?: string }) {
  const id = 'f-' + label.toLowerCase().replace(/[^a-z0-9]+/g, '-')
  return (
    <div>
      <label htmlFor={id} className="text-[11px] uppercase tracking-widest text-muted font-semibold">{label}</label>
      <input
        id={id}
        type={type}
        required
        placeholder={placeholder}
        value={value}
        onChange={(e) => onChange(e.target.value)}
        className="mt-2 w-full bg-paper rounded-full px-5 py-3.5 text-[14px] ring-1 ring-transparent focus:ring-forest focus:bg-cream focus:outline-none transition-colors"
      />
    </div>
  )
}
