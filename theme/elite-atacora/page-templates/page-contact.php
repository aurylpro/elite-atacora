<?php
/**
 * Template Name: Contact
 * Template Post Type: page
 *
 * Page: /contact/
 * Sections: Hero → Info cards (4) → Map + Form → Social CTA
 */
get_header();

/* ── Contact info cards ───────────────────────────────────────────── */
$infos = [
	[
		'icon'  => '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>',
		'label' => __( 'Adresse', 'elite-atacora' ),
		'lines' => [ 'Quartier Kpénou, Rue de la Solidarité', 'Natitingou, Bénin', 'BP 142, Natitingou' ],
		'color' => 'forest',
	],
	[
		'icon'  => '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 11a19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 3.6 0h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 7.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 14.92z"/></svg>',
		'label' => __( 'Téléphone', 'elite-atacora' ),
		'lines' => [ '+229 97 00 00 00', '+229 66 00 00 00' ],
		'color' => 'terracotta',
		'link'  => 'tel:+22997000000',
	],
	[
		'icon'  => '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>',
		'label' => __( 'Email', 'elite-atacora' ),
		'lines' => [ 'contact@elite-atacora.org', 'programmes@elite-atacora.org' ],
		'color' => 'honey',
		'link'  => 'mailto:contact@elite-atacora.org',
	],
	[
		'icon'  => '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>',
		'label' => __( 'Horaires', 'elite-atacora' ),
		'lines' => [ __( 'Lun – Ven : 8h00 – 17h00', 'elite-atacora' ), __( 'Samedi : 9h00 – 13h00', 'elite-atacora' ), __( 'Dimanche : Fermé', 'elite-atacora' ) ],
		'color' => 'forest',
	],
];
?>

<main id="main">

  <!-- Hero -->
  <section class="ea-page-hero">
    <div class="ea-page-hero__blob-1" aria-hidden="true"></div>
    <div class="ea-page-hero__blob-2" aria-hidden="true"></div>
    <div class="ea-container" style="position:relative;">
      <nav class="ea-breadcrumb" aria-label="<?php esc_attr_e( 'Fil d\'Ariane', 'elite-atacora' ); ?>">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Accueil', 'elite-atacora' ); ?></a>
        <span class="ea-breadcrumb__sep" aria-hidden="true">/</span>
        <span><?php esc_html_e( 'Contact', 'elite-atacora' ); ?></span>
      </nav>
      <div class="ea-page-hero__grid ea-page-hero__grid--no-image">
        <div class="ea-page-hero__content">
          <?php ea_eyebrow( __( 'Parlons-nous', 'elite-atacora' ), 'forest' ); ?>
          <h1 class="ea-page-hero__heading" style="font-family:var(--font-serif);font-size:clamp(40px,6vw,80px);line-height:1.05;letter-spacing:-.02em;color:var(--ink);margin-top:24px;">
            <?php esc_html_e( 'Prenez', 'elite-atacora' ); ?>
            <em style="font-style:italic;color:var(--forest);"><?php esc_html_e( 'contact.', 'elite-atacora' ); ?></em>
          </h1>
          <p class="ea-page-hero__subtitle">
            <?php esc_html_e( 'Vous avez une question sur nos programmes, souhaitez devenir partenaire ou simplement en savoir plus ? Notre équipe vous répondra sous 48h.', 'elite-atacora' ); ?>
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- Info cards -->
  <section class="ea-section" style="padding-bottom:0;">
    <div class="ea-container">
      <div class="ea-contact-info-grid">
        <?php foreach ( $infos as $i => $info ) : ?>
          <div class="ea-contact-info-card ea-contact-info-card--<?php echo esc_attr( $info['color'] ); ?> ea-reveal" style="--reveal-delay:<?php echo esc_attr( $i * 80 ); ?>ms;">
            <div class="ea-contact-info-card__icon"><?php echo $info['icon']; ?></div>
            <div class="ea-contact-info-card__label"><?php echo esc_html( $info['label'] ); ?></div>
            <div class="ea-contact-info-card__lines">
              <?php foreach ( $info['lines'] as $line ) : ?>
                <?php if ( ! empty( $info['link'] ) ) : ?>
                  <a href="<?php echo esc_url( $info['link'] ); ?>" style="color:inherit;text-decoration:none;"><?php echo esc_html( $line ); ?></a>
                <?php else : ?>
                  <div><?php echo esc_html( $line ); ?></div>
                <?php endif; ?>
              <?php endforeach; ?>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- Map + Form -->
  <section class="ea-section">
    <div class="ea-container">
      <div class="ea-contact-panel">

        <!-- Map placeholder -->
        <div class="ea-contact-panel__map" aria-label="<?php esc_attr_e( 'Carte de localisation — Natitingou, Bénin', 'elite-atacora' ); ?>" role="img">
          <div class="ea-map-placeholder">
            <!-- Dot grid pattern -->
            <svg width="100%" height="100%" style="position:absolute;inset:0;opacity:.4;" aria-hidden="true">
              <defs>
                <pattern id="dotgrid" x="0" y="0" width="24" height="24" patternUnits="userSpaceOnUse">
                  <circle cx="2" cy="2" r="1.5" fill="var(--muted)"/>
                </pattern>
              </defs>
              <rect width="100%" height="100%" fill="url(#dotgrid)"/>
            </svg>
            <!-- City marker -->
            <div class="ea-map-marker" aria-hidden="true">
              <div class="ea-map-marker__dot"></div>
              <div class="ea-map-marker__label">Natitingou</div>
            </div>
            <!-- Replacement note -->
            <p style="position:absolute;bottom:16px;left:0;right:0;text-align:center;font-size:11px;color:var(--muted);margin:0;">
              <?php esc_html_e( 'Carte Google Maps — à configurer dans les réglages du thème', 'elite-atacora' ); ?>
            </p>
          </div>
        </div>

        <!-- Contact form -->
        <div class="ea-contact-panel__form">
          <h2 style="font-family:var(--font-serif);font-size:clamp(24px,3vw,36px);line-height:1.1;color:var(--ink);margin-bottom:8px;">
            <?php esc_html_e( 'Envoyez-nous un message', 'elite-atacora' ); ?>
          </h2>
          <p style="color:var(--muted);margin-bottom:32px;font-size:15px;">
            <?php esc_html_e( 'Réponse garantie sous 48 heures ouvrables.', 'elite-atacora' ); ?>
          </p>

          <?php
          /* Contact Form 7 integration */
          $cf7_id = get_theme_mod( 'ea_contact_form_id', 0 );
          if ( function_exists( 'wpcf7_contact_form' ) && $cf7_id ) :
            echo do_shortcode( '[contact-form-7 id="' . absint( $cf7_id ) . '" title="Contact Elite Atacora"]' );
          else :
          ?>
            <!-- Native fallback form -->
            <form class="ea-native-form" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post" novalidate>
              <?php wp_nonce_field( 'ea_contact_form', 'ea_contact_nonce' ); ?>
              <input type="hidden" name="action" value="ea_contact_submit">

              <div class="ea-form-row">
                <div class="ea-form-group">
                  <label class="ea-form-label" for="contact-name"><?php esc_html_e( 'Nom complet', 'elite-atacora' ); ?> <span aria-hidden="true">*</span></label>
                  <input type="text" id="contact-name" name="ea_name" class="ea-input" required autocomplete="name" placeholder="<?php esc_attr_e( 'Prénom Nom', 'elite-atacora' ); ?>">
                </div>
                <div class="ea-form-group">
                  <label class="ea-form-label" for="contact-email"><?php esc_html_e( 'Adresse e-mail', 'elite-atacora' ); ?> <span aria-hidden="true">*</span></label>
                  <input type="email" id="contact-email" name="ea_email" class="ea-input" required autocomplete="email" placeholder="<?php esc_attr_e( 'votre@email.com', 'elite-atacora' ); ?>">
                </div>
              </div>

              <div class="ea-form-group">
                <label class="ea-form-label" for="contact-phone"><?php esc_html_e( 'Téléphone', 'elite-atacora' ); ?></label>
                <input type="tel" id="contact-phone" name="ea_phone" class="ea-input" autocomplete="tel" placeholder="<?php esc_attr_e( '+229 XX XX XX XX', 'elite-atacora' ); ?>">
              </div>

              <div class="ea-form-group">
                <label class="ea-form-label" for="contact-subject"><?php esc_html_e( 'Objet', 'elite-atacora' ); ?> <span aria-hidden="true">*</span></label>
                <select id="contact-subject" name="ea_subject" class="ea-select" required>
                  <option value=""><?php esc_html_e( 'Choisissez un objet', 'elite-atacora' ); ?></option>
                  <option value="programme"><?php esc_html_e( 'Question sur un programme', 'elite-atacora' ); ?></option>
                  <option value="partenariat"><?php esc_html_e( 'Proposition de partenariat', 'elite-atacora' ); ?></option>
                  <option value="don"><?php esc_html_e( 'Don / financement', 'elite-atacora' ); ?></option>
                  <option value="presse"><?php esc_html_e( 'Demande presse', 'elite-atacora' ); ?></option>
                  <option value="autre"><?php esc_html_e( 'Autre', 'elite-atacora' ); ?></option>
                </select>
              </div>

              <div class="ea-form-group">
                <label class="ea-form-label" for="contact-message"><?php esc_html_e( 'Message', 'elite-atacora' ); ?> <span aria-hidden="true">*</span></label>
                <textarea id="contact-message" name="ea_message" class="ea-textarea" rows="6" required placeholder="<?php esc_attr_e( 'Décrivez votre demande…', 'elite-atacora' ); ?>"></textarea>
              </div>

              <div class="ea-form-group" style="display:flex;align-items:flex-start;gap:12px;">
                <input type="checkbox" id="contact-rgpd" name="ea_rgpd" value="1" required style="margin-top:3px;flex-shrink:0;">
                <label for="contact-rgpd" style="font-size:13px;color:var(--muted);line-height:1.5;">
                  <?php
                  printf(
                    esc_html__( 'J\'accepte que mes données soient traitées par Elite Atacora dans le cadre de ma demande. %sEn savoir plus%s.', 'elite-atacora' ),
                    '<a href="' . esc_url( ea_get_page_link( 'politique-de-confidentialite' ) ) . '" style="color:var(--forest);">',
                    '</a>'
                  );
                  ?>
                </label>
              </div>

              <button type="submit" class="ea-btn ea-btn--primary" style="width:100%;justify-content:center;">
                <?php esc_html_e( 'Envoyer le message', 'elite-atacora' ); ?>
                <?php echo ea_arrow_icon( 14 ); ?>
              </button>
            </form>

            <!-- Success state (shown by JS) -->
            <div class="ea-form-success" role="alert" aria-live="polite">
              <div style="font-size:40px;margin-bottom:16px;" aria-hidden="true">✓</div>
              <h3 style="font-family:var(--font-serif);font-size:24px;color:var(--forest);margin-bottom:8px;">
                <?php esc_html_e( 'Message envoyé !', 'elite-atacora' ); ?>
              </h3>
              <p style="color:var(--muted);">
                <?php esc_html_e( 'Merci pour votre message. Nous vous répondrons sous 48 heures ouvrables.', 'elite-atacora' ); ?>
              </p>
            </div>
          <?php endif; ?>

        </div><!-- /.ea-contact-panel__form -->
      </div><!-- /.ea-contact-panel -->
    </div>
  </section>

  <!-- Social CTA -->
  <section class="ea-section" style="background:var(--paper);">
    <div class="ea-container" style="text-align:center;max-width:640px;margin-inline:auto;">
      <?php ea_eyebrow( __( 'Réseaux sociaux', 'elite-atacora' ), 'terracotta' ); ?>
      <h2 style="font-family:var(--font-serif);font-size:clamp(28px,3.5vw,44px);line-height:1.1;color:var(--ink);margin-top:20px;margin-bottom:16px;">
        <?php esc_html_e( 'Suivez-nous sur', 'elite-atacora' ); ?>
        <em style="font-style:italic;color:var(--terracotta);"><?php esc_html_e( 'les réseaux.', 'elite-atacora' ); ?></em>
      </h2>
      <p style="color:var(--muted);margin-bottom:32px;">
        <?php esc_html_e( 'Actualités, photos du terrain, événements à venir — restez connecté avec Elite Atacora.', 'elite-atacora' ); ?>
      </p>
      <div style="display:flex;gap:12px;justify-content:center;flex-wrap:wrap;">
        <?php
        $socials = [
          [ 'label' => 'Facebook',  'url' => '#', 'letter' => 'F' ],
          [ 'label' => 'Instagram', 'url' => '#', 'letter' => 'Ig' ],
          [ 'label' => 'LinkedIn',  'url' => '#', 'letter' => 'in' ],
          [ 'label' => 'YouTube',   'url' => '#', 'letter' => 'YT' ],
        ];
        foreach ( $socials as $s ) :
        ?>
          <a href="<?php echo esc_url( $s['url'] ); ?>" rel="noopener noreferrer" target="_blank" class="ea-btn ea-btn--outline" aria-label="<?php printf( esc_attr__( 'Suivre sur %s', 'elite-atacora' ), $s['label'] ); ?>">
            <span aria-hidden="true"><?php echo esc_html( $s['letter'] ); ?></span>
            <?php echo esc_html( $s['label'] ); ?>
          </a>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

</main>

<?php get_footer(); ?>
