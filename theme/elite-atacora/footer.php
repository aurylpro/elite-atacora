<!-- ══════════════════════════════════════════════════════════
     FOOTER
══════════════════════════════════════════════════════════ -->
<footer class="ea-footer" id="site-footer" role="contentinfo">

  <!-- Decorative wave lines top-right -->
  <svg aria-hidden="true" class="ea-footer__deco-top" width="420" height="180" viewBox="0 0 420 180" fill="none" preserveAspectRatio="none" style="color:rgba(233,180,76,.15);pointer-events:none;">
    <path d="M-20 40 Q 80 0 180 40 T 380 40 T 580 40" stroke="currentColor" stroke-width="1.5" stroke-dasharray="2 6" fill="none"/>
    <path d="M-20 80 Q 80 40 180 80 T 380 80 T 580 80" stroke="currentColor" stroke-width="1" stroke-dasharray="2 8" fill="none"/>
  </svg>
  <div class="ea-footer__blob" aria-hidden="true"></div>

  <!-- Newsletter CTA -->
  <div class="ea-footer__cta" style="position:relative;">
    <div>
      <div class="ea-footer__cta-tag"><?php esc_html_e( 'Restons en contact', 'elite-atacora' ); ?></div>
      <h3 class="ea-footer__cta-heading">
        <?php esc_html_e( "Soutenez l'Atacora,", 'elite-atacora' ); ?><br>
        <em><?php esc_html_e( 'une marche à la fois.', 'elite-atacora' ); ?></em>
      </h3>
    </div>
    <div>
      <p class="ea-footer__newsletter-lead">
        <?php esc_html_e( 'Recevez nos actualités, rapports et invitations directement dans votre boîte mail.', 'elite-atacora' ); ?>
      </p>
      <form class="ea-footer__newsletter-form" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="POST">
        <?php wp_nonce_field( 'ea_newsletter', 'ea_newsletter_nonce' ); ?>
        <input type="hidden" name="action" value="ea_newsletter">
        <input
          type="email"
          name="ea_email"
          class="ea-footer__newsletter-input"
          placeholder="<?php esc_attr_e( 'Votre adresse email', 'elite-atacora' ); ?>"
          required
          aria-label="<?php esc_attr_e( 'Adresse email pour la newsletter', 'elite-atacora' ); ?>">
        <button type="submit" class="ea-footer__newsletter-btn">
          <?php esc_html_e( "S'abonner →", 'elite-atacora' ); ?>
        </button>
      </form>
    </div>
  </div>

  <!-- Columns -->
  <div class="ea-footer__cols">

    <!-- Brand -->
    <div class="ea-footer__brand">
      <div class="ea-footer__brand-row">
        <div class="ea-footer__brand-mark">
          <?php
          if ( has_custom_logo() ) {
            the_custom_logo();
          } else {
            printf(
              '<img src="%s" alt="%s" width="48" height="48">',
              esc_url( get_template_directory_uri() . '/assets/img/logo.png' ),
              esc_attr( get_bloginfo( 'name' ) )
            );
          }
          ?>
        </div>
        <div>
          <div class="ea-footer__brand-name">Elite Atacora</div>
          <div class="ea-footer__brand-sub"><?php esc_html_e( 'ONG · Bénin · depuis 2018', 'elite-atacora' ); ?></div>
        </div>
      </div>
      <p class="ea-footer__brand-desc">
        <?php esc_html_e( "Organisation non gouvernementale béninoise, apolitique et à but non lucratif. Engagée pour l'autonomisation des femmes, l'éducation des enfants vulnérables et la résilience climatique de l'Atacora.", 'elite-atacora' ); ?>
      </p>

      <!-- Social links -->
      <div class="ea-footer__socials">
        <?php
        $socials = [
          'Facebook'  => [ '#', 'M9.5 8.5 H7 V11.5 H9.5 V19 H12.5 V11.5 H14.8 L15.2 8.5 H12.5 V7 C12.5 6.3 12.7 6 13.4 6 H15.2 V3 H13 C10.6 3 9.5 4 9.5 6.4 V8.5 Z' ],
          'Instagram' => [ '#', 'M7 3 H15 C17.2 3 19 4.8 19 7 V15 C19 17.2 17.2 19 15 19 H7 C4.8 19 3 17.2 3 15 V7 C3 4.8 4.8 3 7 3 Z M11 8 A3 3 0 1 1 11 14 A3 3 0 1 1 11 8 Z M15.5 6.5 H15.51' ],
          'LinkedIn'  => [ '#', 'M5 8 H7.5 V18 H5 V8 Z M6.25 5 A1.5 1.5 0 1 1 6.25 7 A1.5 1.5 0 1 1 6.25 5 Z M10 8 H12.4 V9.4 C12.9 8.5 14 7.7 15.5 7.7 C18 7.7 18.5 9.4 18.5 11.5 V18 H16 V12.3 C16 10.9 15.7 9.9 14.5 9.9 C13.1 9.9 12.5 10.9 12.5 12.3 V18 H10 V8 Z' ],
          'WhatsApp'  => [ '#', 'M5 18 L6 14.5 A7.5 7.5 0 1 1 8.5 17 L5 18 Z M9 11 Q10 13 11.5 13.5 Q12.5 13.8 13 13 L14 13.5 Q14 14.5 12.5 14.5 Q10.5 14 9 12 Q7.5 10 8 8.5 Q8.5 7.5 9.5 8 L10 9 Q9.5 9.5 9 11 Z' ],
        ];
        foreach ( $socials as $name => $data ) :
          [$url, $path] = $data;
        ?>
          <a href="<?php echo esc_url( $url ); ?>" class="ea-footer__social" aria-label="<?php echo esc_attr( $name ); ?>" target="_blank" rel="noopener noreferrer">
            <svg width="20" height="20" viewBox="0 0 22 22" fill="none" aria-hidden="true">
              <path d="<?php echo esc_attr( $path ); ?>" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </a>
        <?php endforeach; ?>
      </div>
    </div>

    <!-- Col: L'ONG -->
    <div>
      <div class="ea-footer__col-title"><?php esc_html_e( "L'ONG", 'elite-atacora' ); ?></div>
      <ul class="ea-footer__col-list">
        <li><a href="<?php echo esc_url( ea_get_page_link( 'a-propos' ) ); ?>"><?php esc_html_e( 'À propos', 'elite-atacora' ); ?></a></li>
        <li><a href="<?php echo esc_url( ea_get_page_link( 'gouvernance' ) ); ?>"><?php esc_html_e( 'Gouvernance', 'elite-atacora' ); ?></a></li>
        <li><a href="<?php echo esc_url( ea_get_page_link( 'nos-actions' ) ); ?>"><?php esc_html_e( 'Nos actions', 'elite-atacora' ); ?></a></li>
        <li><a href="<?php echo esc_url( ea_get_page_link( 'adherer' ) ); ?>"><?php esc_html_e( 'Adhérer', 'elite-atacora' ); ?></a></li>
      </ul>
    </div>

    <!-- Col: Ressources -->
    <div>
      <div class="ea-footer__col-title"><?php esc_html_e( 'Ressources', 'elite-atacora' ); ?></div>
      <ul class="ea-footer__col-list">
        <li><a href="<?php echo esc_url( home_url( '/actualites/' ) ); ?>"><?php esc_html_e( 'Actualités', 'elite-atacora' ); ?></a></li>
        <li><a href="<?php echo esc_url( ea_get_page_link( 'evenements' ) ); ?>"><?php esc_html_e( 'Événements', 'elite-atacora' ); ?></a></li>
        <li><a href="<?php echo esc_url( ea_get_page_link( 'contact' ) ); ?>"><?php esc_html_e( 'Contact', 'elite-atacora' ); ?></a></li>
        <li><a href="<?php echo esc_url( ea_get_page_link( 'confidentialite' ) ); ?>"><?php esc_html_e( 'Confidentialité', 'elite-atacora' ); ?></a></li>
      </ul>
    </div>

    <!-- Col: Contact -->
    <div>
      <div class="ea-footer__col-title"><?php esc_html_e( 'Contact', 'elite-atacora' ); ?></div>
      <ul class="ea-footer__contact-list">
        <li class="ea-footer__contact-item">
          <span class="ea-footer__contact-icon" aria-hidden="true">
            <svg width="14" height="16" viewBox="0 0 12 14" fill="none">
              <path d="M6 13 Q1 8 1 5 A5 5 0 1 1 11 5 Q11 8 6 13 Z M6 5 A1 1 0 1 1 6 7 A1 1 0 1 1 6 5 Z" stroke="currentColor" stroke-width="1.3"/>
            </svg>
          </span>
          <span><?php esc_html_e( 'Quartier Dassagaté', 'elite-atacora' ); ?><br><?php esc_html_e( 'Natitingou, Atacora · Bénin', 'elite-atacora' ); ?></span>
        </li>
        <li class="ea-footer__contact-item">
          <span class="ea-footer__contact-icon" aria-hidden="true">
            <svg width="15" height="15" viewBox="0 0 13 13" fill="none">
              <path d="M2 2.5 Q2 2 2.5 2 H4 L5 5 L3.8 6.2 Q5 8.5 6.8 9.2 L8 8 L11 9 V10.5 Q11 11 10.5 11 Q6 11 4 9 Q2 7 2 2.5 Z" stroke="currentColor" stroke-width="1.3" stroke-linejoin="round"/>
            </svg>
          </span>
          <a href="tel:+2290194055090">(+229) 01 94 05 50 90</a>
        </li>
        <li class="ea-footer__contact-item">
          <span class="ea-footer__contact-icon" aria-hidden="true">
            <svg width="15" height="12" viewBox="0 0 14 11" fill="none">
              <path d="M1 2 H13 V10 H1 Z M1 2 L7 6.5 L13 2" stroke="currentColor" stroke-width="1.3" stroke-linejoin="round"/>
            </svg>
          </span>
          <a href="mailto:contact@eliteatacora.org">contact@eliteatacora.org</a>
        </li>
      </ul>
    </div>
  </div><!-- /.ea-footer__cols -->

  <!-- Legal strip -->
  <div class="ea-footer__legal">
    <div>© <?php echo esc_html( date( 'Y' ) ); ?> <?php esc_html_e( 'ONG Elite Atacora · tous droits réservés', 'elite-atacora' ); ?></div>
    <div><?php esc_html_e( 'Conformément à la loi n°2025-19 du 22 juillet 2025 · République du Bénin', 'elite-atacora' ); ?></div>
  </div>

</footer>
<!-- /FOOTER -->

<!-- Scroll to top -->
<button class="ea-scroll-top" aria-label="<?php esc_attr_e( 'Retour en haut', 'elite-atacora' ); ?>">
  <svg width="16" height="14" viewBox="0 0 16 12" fill="none" aria-hidden="true">
    <path d="M8 11 V1 M3 5.5 L8 1 L13 5.5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
  </svg>
</button>

</div><!-- /#page -->

<?php wp_footer(); ?>
</body>
</html>
