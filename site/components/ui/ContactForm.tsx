'use client'

import { useState } from 'react'
import Link from 'next/link'
import { Eyebrow } from './Eyebrow'
import { ArrowIcon } from './ArrowIcon'

type FormState = {
  nom: string
  email: string
  sujet: string
  message: string
  politique: boolean
  _honey: string
}

const initial: FormState = { nom: '', email: '', sujet: '', message: '', politique: false, _honey: '' }

export function ContactForm() {
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
      const res = await fetch('/api/contact', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(form),
      })
      const data = await res.json().catch(() => ({}))
      if (!res.ok) throw new Error(data?.error || 'Erreur serveur')
      setSubmitted(true)
      setForm(initial)
    } catch (err: any) {
      setError(err?.message || 'Une erreur est survenue. Réessayez plus tard.')
    } finally {
      setLoading(false)
    }
  }

  if (submitted) {
    return (
      <div className="py-16 text-center">
        <div className="w-16 h-16 mx-auto rounded-full bg-forest text-cream grid place-items-center">
          <svg width="28" height="22" viewBox="0 0 24 18" fill="none" aria-hidden="true">
            <path d="M2 9 L9 16 L22 2" stroke="currentColor" strokeWidth="2.5" strokeLinecap="round" strokeLinejoin="round" />
          </svg>
        </div>
        <h3 className="mt-6 font-serif text-[28px] text-ink leading-tight">Message envoyé.</h3>
        <p className="mt-3 text-coffee max-w-md mx-auto">Nous reviendrons vers vous dans les meilleurs délais.</p>
        <button onClick={() => setSubmitted(false)} className="mt-6 text-[14px] font-semibold text-forest underline underline-offset-4">
          Envoyer un autre message
        </button>
      </div>
    )
  }

  return (
    <form onSubmit={onSubmit} className="space-y-5" noValidate>
      <input
        type="text"
        tabIndex={-1}
        autoComplete="off"
        value={form._honey}
        onChange={(e) => setForm({ ...form, _honey: e.target.value })}
        style={{ position: 'absolute', left: '-10000px', width: '1px', height: '1px', opacity: 0 }}
        aria-hidden="true"
      />

      <Eyebrow color="forest">Formulaire de contact</Eyebrow>
      <h2 className="font-serif text-[32px] sm:text-[40px] leading-[1.05] text-ink tracking-tight">
        Écrivez-nous <em className="italic text-terracotta">directement.</em>
      </h2>

      <div className="grid grid-cols-2 gap-4 pt-4">
        <Field label="Nom *"   value={form.nom}   onChange={(v) => setForm({ ...form, nom: v })}   />
        <Field label="Email *" value={form.email} onChange={(v) => setForm({ ...form, email: v })} type="email" />
      </div>
      <Field label="Sujet *" value={form.sujet} onChange={(v) => setForm({ ...form, sujet: v })} />
      <div>
        <label htmlFor="c-message" className="text-[11px] uppercase tracking-widest text-muted font-semibold">Message *</label>
        <textarea
          id="c-message"
          required
          minLength={20}
          value={form.message}
          onChange={(e) => setForm({ ...form, message: e.target.value })}
          className="mt-2 w-full bg-paper rounded-2xl px-5 py-4 text-[14px] ring-1 ring-transparent focus:ring-forest focus:bg-cream focus:outline-none transition-colors min-h-[140px] resize-y"
          placeholder="Décrivez votre demande… (minimum 20 caractères)"
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
        <span>J&apos;accepte la <Link href="/politique-de-confidentialite" className="text-forest underline">politique de confidentialité</Link>.</span>
      </label>

      {error && <div className="text-claretred text-[13px] font-semibold">{error}</div>}

      <div className="pt-2">
        <button
          type="submit"
          disabled={loading}
          className="group inline-flex items-center gap-3 bg-forest text-cream pl-7 pr-2 py-2 rounded-full text-[14px] font-semibold hover:bg-mossdk transition-colors disabled:opacity-60 disabled:cursor-wait"
        >
          {loading ? 'Envoi…' : 'Envoyer le message'}
          <span className="w-9 h-9 rounded-full bg-honey text-ink grid place-items-center transition-transform group-hover:translate-x-1">
            <ArrowIcon />
          </span>
        </button>
      </div>
    </form>
  )
}

function Field({ label, type = 'text', value, onChange }: { label: string; type?: string; value: string; onChange: (v: string) => void }) {
  const id = 'cf-' + label.toLowerCase().replace(/[^a-z0-9]+/g, '-')
  return (
    <div>
      <label htmlFor={id} className="text-[11px] uppercase tracking-widest text-muted font-semibold">{label}</label>
      <input
        id={id}
        type={type}
        required
        value={value}
        onChange={(e) => onChange(e.target.value)}
        className="mt-2 w-full bg-paper rounded-full px-5 py-3.5 text-[14px] ring-1 ring-transparent focus:ring-forest focus:bg-cream focus:outline-none transition-colors"
      />
    </div>
  )
}
