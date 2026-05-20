<?php
/**
 * 404.php — Not found page.
 */
get_header();
?>

<main id="main">
  <div class="ea-404">
    <div>
      <div class="ea-404__code" aria-hidden="true">404</div>
      <h1 class="ea-404__title"><?php esc_html_e( 'Page introuvable', 'elite-atacora' ); ?></h1>
      <p class="ea-404__body">
        <?php esc_html_e( "La page que vous recherchez n'existe pas ou a été déplacée. Revenez à l'accueil ou explorez nos actualités.", 'elite-atacora' ); ?>
      </p>
      <div class="ea-404__actions">
        <?php ea_pill_button( __( 'Revenir à l\'accueil', 'elite-atacora' ), home_url( '/' ), 'primary' ); ?>
        <?php ea_pill_button( __( 'Nos actualités', 'elite-atacora' ), home_url( '/actualites/' ), 'outline' ); ?>
      </div>
    </div>
  </div>
</main>

<?php get_footer(); ?>
