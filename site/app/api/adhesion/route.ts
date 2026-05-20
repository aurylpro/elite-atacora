import { NextRequest, NextResponse } from 'next/server'

export async function POST(req: NextRequest) {
  try {
    const body = await req.json()
    const { nom, prenom, email, telephone, type_adhesion, motivation, politique, _honey } = body

    // Anti-spam honeypot
    if (_honey) return NextResponse.json({ ok: true })

    // Validation
    if (!nom || !prenom || !email || !telephone || !type_adhesion || !motivation) {
      return NextResponse.json({ error: 'Tous les champs obligatoires doivent être remplis.' }, { status: 400 })
    }
    if (!politique) {
      return NextResponse.json({ error: 'Vous devez accepter la politique de confidentialité.' }, { status: 400 })
    }
    if (motivation.length < 50) {
      return NextResponse.json({ error: 'La lettre de motivation doit contenir au moins 50 caractères.' }, { status: 400 })
    }

    const resendKey = process.env.RESEND_API_KEY
    const ongEmail  = process.env.ONG_EMAIL || 'contact@elite-atacora.org'

    if (!resendKey || resendKey === 're_placeholder') {
      console.log('[ADHÉSION] Formulaire reçu (Resend non configuré) :', { nom, prenom, email, type_adhesion })
      return NextResponse.json({ ok: true })
    }

    const { Resend } = await import('resend')
    const resend = new Resend(resendKey)

    const dateHeure = new Date().toLocaleString('fr-FR', { timeZone: 'Africa/Porto-Novo' })

    await resend.emails.send({
      from: 'Site Elite Atacora <noreply@elite-atacora.org>',
      to: ongEmail,
      replyTo: email,
      subject: `Nouvelle demande d'adhésion — ${nom} ${prenom}`,
      html: `
        <div style="font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto;">
          <div style="background: #2E7D32; color: white; padding: 20px 24px;">
            <h1 style="margin: 0; font-size: 18px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em;">
              Nouvelle demande d'adhésion
            </h1>
            <p style="margin: 6px 0 0; font-size: 13px; color: rgba(255,255,255,0.8);">Reçue le ${dateHeure}</p>
          </div>

          <div style="padding: 24px; background: #f9f9f9; border: 1px solid #e0e0e0;">
            <h2 style="font-size: 14px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.08em; color: #2E7D32; margin: 0 0 16px; border-bottom: 2px solid #F9A825; padding-bottom: 8px;">
              Informations du candidat
            </h2>
            <table style="width: 100%; border-collapse: collapse;">
              ${[
                ['Nom', nom],
                ['Prénom', prenom],
                ['Email', email],
                ['Téléphone', telephone],
                ['Type d\'adhésion', type_adhesion],
              ].map(([label, val]) => `
                <tr style="border-bottom: 1px solid #e9e9e9;">
                  <td style="padding: 10px 12px; font-weight: 700; font-size: 12px; text-transform: uppercase; color: #666; width: 150px; background: #fff;">${label}</td>
                  <td style="padding: 10px 12px; font-size: 14px; color: #0D0D0D; background: #fff;">${val}</td>
                </tr>
              `).join('')}
            </table>

            <h2 style="font-size: 14px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.08em; color: #2E7D32; margin: 24px 0 12px; border-bottom: 2px solid #F9A825; padding-bottom: 8px;">
              Lettre de motivation
            </h2>
            <div style="background: white; border: 1px solid #ddd; padding: 16px; font-size: 14px; color: #0D0D0D; line-height: 1.7; white-space: pre-wrap;">
${motivation}
            </div>
          </div>

          <div style="padding: 16px 24px; background: #2E7D32; color: white; font-size: 12px; text-align: center;">
            <strong>ACTION REQUISE</strong> — Examinez cette candidature et contactez le candidat dans les meilleurs délais.
          </div>
          <div style="padding: 12px 24px; background: #eee; font-size: 11px; color: #999; text-align: center;">
            Soumis via le formulaire d'adhésion — eliteatacora.org
          </div>
        </div>
      `,
    })

    return NextResponse.json({ ok: true })
  } catch (err) {
    console.error('[ADHÉSION] Erreur :', err)
    return NextResponse.json({ error: 'Erreur serveur. Veuillez réessayer.' }, { status: 500 })
  }
}
