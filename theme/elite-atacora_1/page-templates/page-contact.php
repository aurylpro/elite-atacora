<?php
/**
 * Template Name: Contact
 */
get_header(); ?>

<!-- PAGE HERO -->
<section class="page-hero bg-forest" aria-labelledby="contact-hero-title">
    <div class="container">
        <div class="page-hero__inner">
            <div class="page-hero__content">
                <span class="eyebrow eyebrow--cream">Contact · Bureau Exécutif</span>
                <h1 id="contact-hero-title" class="page-hero__title" style="font-family:var(--font-serif);font-size:clamp(2.5rem,5vw,4rem);line-height:1.02;color:var(--cream);margin-top:1.25rem;">
                    Échangeons,
                    <em style="font-style:italic;color:var(--honey)">construisons ensemble.</em>
                </h1>
                <p class="page-hero__subtitle" style="color:var(--cream);opacity:.85;max-width:540px;margin-top:1.25rem;line-height:1.7;">
                    Vous souhaitez en savoir plus sur l'ONG, rejoindre notre réseau, proposer un partenariat ou simplement nous dire bonjour ? Nous sommes à votre écoute.
                </p>
                <nav class="breadcrumb" aria-label="Fil d'Ariane">
                    <ol>
                        <li><a href="<?php echo esc_url(home_url('/')); ?>" style="color:var(--honey)">Accueil</a></li>
                        <li aria-current="page" style="color:var(--cream)">Contact</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>

<!-- ============================================================
     1. INFOS DE CONTACT
     ============================================================ -->
<section class="section bg-cream" aria-labelledby="contact-infos-title">
    <div class="container">
        <div class="sr-only" id="contact-infos-title">Informations de contact</div>
        <div class="contact-infos">

            <!-- Adresse -->
            <div class="contact-card contact-card--forest">
                <div class="contact-card__icon" aria-hidden="true" style="background:var(--honey);">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="var(--forest)" stroke-width="1.8">
                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/>
                        <circle cx="12" cy="10" r="3"/>
                    </svg>
                </div>
                <span class="contact-card__label">Adresse</span>
                <address class="contact-card__value">
                    Quartier Dassagaté<br>
                    Natitingou, Atacora · Bénin
                </address>
            </div>

            <!-- Téléphone -->
            <div class="contact-card contact-card--terracotta">
                <div class="contact-card__icon" aria-hidden="true" style="background:var(--honey);">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="var(--terracotta)" stroke-width="1.8">
                        <path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.46 8.8 19.79 19.79 0 01.39 2.18 2 2 0 012.37.06h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.91 7.91a16 16 0 006.18 6.18l1.23-.84a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7a2 2 0 011.72 2z"/>
                    </svg>
                </div>
                <span class="contact-card__label">Téléphone</span>
                <div class="contact-card__value">
                    <a href="tel:+2290194055090" style="color:inherit;">(+229) 01 94 05 50 90</a>
                </div>
            </div>

            <!-- Email -->
            <div class="contact-card contact-card--honey">
                <div class="contact-card__icon" aria-hidden="true" style="background:var(--terracotta);">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="var(--cream)" stroke-width="1.8">
                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                        <polyline points="22,6 12,13 2,6"/>
                    </svg>
                </div>
                <span class="contact-card__label" style="color:var(--ink)">Email</span>
                <div class="contact-card__value" style="color:var(--ink)">
                    <a href="mailto:contact@eliteatacora.org" style="color:inherit;">contact@eliteatacora.org</a>
                </div>
            </div>

            <!-- Horaires -->
            <div class="contact-card contact-card--ink">
                <div class="contact-card__icon" aria-hidden="true" style="background:var(--honey);">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="var(--ink)" stroke-width="1.8">
                        <circle cx="12" cy="12" r="10"/>
                        <polyline points="12,6 12,12 16,14"/>
                    </svg>
                </div>
                <span class="contact-card__label" style="color:var(--honey)">Horaires</span>
                <div class="contact-card__value" style="color:var(--cream)">
                    Lun → Ven · 08h – 17h<br>
                    Sam · 09h – 13h
                </div>
            </div>

        </div>
    </div>
</section>

<!-- ============================================================
     2. CARTE + FORMULAIRE
     ============================================================ -->
<section class="section bg-paper" aria-labelledby="contact-form-title">
    <div class="container">
        <div class="map-form-split">

            <!-- Carte -->
            <div class="map-placeholder">
                <div class="map-placeholder__dots" aria-hidden="true"></div>
                <iframe
                    loading="lazy"
                    src="https://maps.google.com/maps?q=Natitingou+Benin&output=embed"
                    width="100%"
                    height="100%"
                    style="border:0;min-height:420px;border-radius:1rem;"
                    allowfullscreen
                    title="Carte ONG Elite Atacora — Natitingou, Bénin"
                ></iframe>
                <div class="map-placeholder__content" aria-hidden="true">
                    <div class="map-placeholder__pin">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="var(--forest)" stroke-width="2">
                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/>
                            <circle cx="12" cy="10" r="3"/>
                        </svg>
                    </div>
                    <strong class="map-placeholder__city">Natitingou</strong>
                    <span class="map-placeholder__district">Département de l'Atacora</span>
                    <span class="map-placeholder__note">République du Bénin · Afrique de l'Ouest</span>
                </div>
            </div>

            <!-- Formulaire -->
            <div class="map-form-right">
                <span class="eyebrow eyebrow--terracotta">Formulaire de contact</span>
                <h2 id="contact-form-title" style="font-family:var(--font-serif);font-size:clamp(1.75rem,3vw,2.5rem);line-height:1.1;color:var(--ink);margin-top:1rem;">
                    Écrivez-nous <em style="font-style:italic;color:var(--terracotta)">directement.</em>
                </h2>

                <?php if (function_exists('wpcf7_get_tag')) :
                    echo do_shortcode('[wpcf7 id="contact" title="Formulaire de contact"]');
                else : ?>
                <form class="elite-form" action="#contact-form-title" method="post" novalidate aria-label="Formulaire de contact" style="margin-top:2rem;">
                    <?php wp_nonce_field('elite_contact', '_contact_nonce'); ?>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="ct-nom" class="form-label">Nom complet <span aria-hidden="true">*</span></label>
                            <input type="text" id="ct-nom" name="nom" class="form-input" required autocomplete="name" placeholder="Votre nom">
                        </div>
                        <div class="form-group">
                            <label for="ct-email" class="form-label">Email <span aria-hidden="true">*</span></label>
                            <input type="email" id="ct-email" name="email" class="form-input" required autocomplete="email" placeholder="votre@email.com">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="ct-sujet" class="form-label">Sujet <span aria-hidden="true">*</span></label>
                        <input type="text" id="ct-sujet" name="sujet" class="form-input" required placeholder="Objet de votre message">
                    </div>

                    <div class="form-group">
                        <label for="ct-message" class="form-label">Message <span aria-hidden="true">*</span></label>
                        <textarea id="ct-message" name="message" class="form-textarea" rows="6" required placeholder="Votre message..."></textarea>
                    </div>

                    <div class="form-group">
                        <label class="form-checkbox">
                            <input type="checkbox" name="privacy" required>
                            <span>J'accepte la <a href="<?php echo esc_url(home_url('/politique-de-confidentialite/')); ?>">politique de confidentialité</a>. <span aria-hidden="true">*</span></span>
                        </label>
                    </div>

                    <button type="submit" class="btn btn--primary" style="width:100%;">
                        Envoyer le message
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" aria-hidden="true" style="margin-left:.5rem;">
                            <path d="M2 8h12M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                </form>
                <?php endif; ?>
            </div>

        </div>
    </div>
</section>

<!-- ============================================================
     3. RÉSEAUX SOCIAUX
     ============================================================ -->
<section class="cta-banner cta-banner--ink bg-ink section--tight" aria-labelledby="social-title">
    <div class="container">
        <div class="cta-banner__inner" style="flex-wrap:wrap;gap:2rem;">
            <div class="cta-banner__content">
                <span class="eyebrow eyebrow--cream">Suivez-nous</span>
                <h2 id="social-title" style="font-family:var(--font-serif);font-size:clamp(1.75rem,3vw,2.5rem);line-height:1.1;color:var(--cream);margin-top:1rem;">
                    Restons connectés au <em style="font-style:italic;color:var(--honey)">quotidien.</em>
                </h2>
            </div>
            <div class="cta-banner__actions" style="display:flex;gap:1rem;flex-wrap:wrap;">
                <a href="#" class="btn btn--ondark" rel="noopener noreferrer" target="_blank">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" style="margin-right:.5rem;">
                        <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"/>
                    </svg>
                    Facebook
                </a>
                <a href="#" class="btn btn--ondark" rel="noopener noreferrer" target="_blank">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true" style="margin-right:.5rem;">
                        <rect x="2" y="2" width="20" height="20" rx="5"/>
                        <circle cx="12" cy="12" r="4"/>
                        <circle cx="17.5" cy="6.5" r="1" fill="currentColor" stroke="none"/>
                    </svg>
                    Instagram
                </a>
                <a href="#" class="btn btn--ondark" rel="noopener noreferrer" target="_blank">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" style="margin-right:.5rem;">
                        <path d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"/>
                        <circle cx="4" cy="4" r="2"/>
                    </svg>
                    LinkedIn
                </a>
                <a href="#" class="btn btn--honey" rel="noopener noreferrer" target="_blank">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" style="margin-right:.5rem;">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347"/>
                    </svg>
                    WhatsApp
                </a>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
