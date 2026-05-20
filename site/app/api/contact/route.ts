import { NextRequest, NextResponse } from 'next/server'

export async function POST(req: NextRequest) {
  try {
    const body = await req.json()
    const { nom, email, sujet, message, politique, _honey } = body

    // Anti-spam honeypot
    if (_honey) return NextResponse.json({ ok: true })

    // Validation
    if (!nom || !email || !sujet || !message) {
      return NextResponse.json({ error: 'Tous les champs obligatoires doivent être remplis.' }, { status: 400 })
    }
    if (!politique) {
      return NextResponse.json({ error: 'Vous devez accepter la politique de confidentialité.' }, { status: 400 })
    }
    if (message.length < 20) {
      return NextResponse.json({ error: 'Le message doit contenir au moins 20 caractères.' }, { status: 400 })
    }

    const resendKey = process.env.RESEND_API_KEY
    const ongEmail  = process.env.ONG_EMAIL || 'contact@elite-atacora.org'

    if (!resendKey || resendKey === 're_placeholder') {
      // Mode développement sans Resend configuré
      console.log('[CONTACT] Formulaire reçu (Resend non configuré) :', { nom, email, sujet })
      return NextResponse.json({ ok: true })
    }

    const { Resend } = await import('resend')
    const resend = new Resend(resendKey)

    await resend.emails.send({
      from: 'Site Elite Atacora <noreply@elite-atacora.org>',
      to: ongEmail,
      replyTo: email,
      subject: `[Contact] ${sujet} — ${nom}`,
      html: `
        <div style="font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto;">
          <div style="background: #2E7D32; color: white; padding: 20px 24px;">
            <h1 style="margin: 0; font-size: 18px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em;">
              Nouveau message de contact
            </h1>
          </div>
          <div style="padding: 24px; background: #f9f9f9; border: 1px solid #e0e0e0;">
            <table style="width: 100%; border-collapse: collapse;">
              ${[
                ['Nom', nom],
                ['Email', email],
                ['Sujet', sujet],
              ].map(([label, val]) => `
                <tr>
                  <td style="padding: 10px 0; font-weight: 700; font-size: 12px; text-transform: uppercase; color: #666; width: 120px; vertical-align: top;">${label}</td>
                  <td style="padding: 10px 0; font-size: 14px; color: #0D0D0D;">${val}</td>
                </tr>
              `).join('')}
              <tr>
                <td style="padding: 10px 0; font-weight: 700; font-size: 12px; text-transform: uppercase; color: #666; vertical-align: top;">Message</td>
                <td style="padding: 10px 0; font-size: 14px; color: #0D0D0D; white-space: pre-wrap;">${message}</td>
              </tr>
            </table>
          </div>
          <div style="padding: 16px 24px; background: #eee; font-size: 11px; color: #999;">
            Reçu via le formulaire de contact — eliteatacora.org
          </div>
        </div>
      `,
    })

    return NextResponse.json({ ok: true })
  } catch (err) {
    console.error('[CONTACT] Erreur :', err)
    return NextResponse.json({ error: 'Erreur serveur. Veuillez réessayer.' }, { status: 500 })
  }
}
