<?php
/**
 * Template part: Page Hero
 *
 * Args via get_template_part() $args:
 *   eyebrow    string
 *   title      string  (raw HTML allowed — caller must sanitize)
 *   subtitle   string
 *   breadcrumb array   [ ['label' => '', 'href' => ''] ]
 *   image_id   int     attachment ID for the side photo
 *   actions    string  raw HTML for CTA buttons
 */
$eyebrow    = $args['eyebrow']    ?? '';
$title      = $args['title']      ?? '';
$subtitle   = $args['subtitle']   ?? '';
$breadcrumb = $args['breadcrumb'] ?? [];
$image_id   = $args['image_id']   ?? 0;
$actions    = $args['actions']    ?? '';
$has_image  = $image_id > 0;
?>
<section class="ea-page-hero">
  <div class="ea-page-hero__blob-1" aria-hidden="true"></div>
  <div class="ea-page-hero__blob-2" aria-hidden="true"></div>

  <div class="ea-container" style="position:relative;">

    <?php if ( $breadcrumb ) : ?>
      <nav class="ea-breadcrumb" aria-label="<?php esc_attr_e( 'Fil d\'Ariane', 'elite-atacora' ); ?>">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Accueil', 'elite-atacora' ); ?></a>
        <?php foreach ( $breadcrumb as $crumb ) : ?>
          <span class="ea-breadcrumb__sep" aria-hidden="true">/</span>
          <?php if ( ! empty( $crumb['href'] ) ) : ?>
            <a href="<?php echo esc_url( $crumb['href'] ); ?>"><?php echo esc_html( $crumb['label'] ); ?></a>
          <?php else : ?>
            <span><?php echo esc_html( $crumb['label'] ); ?></span>
          <?php endif; ?>
        <?php endforeach; ?>
      </nav>
    <?php endif; ?>

    <div class="ea-page-hero__grid <?php echo $has_image ? '' : 'ea-page-hero__grid--no-image'; ?>">
      <div class="ea-page-hero__content">
        <?php if ( $eyebrow ) : ?>
          <?php ea_eyebrow( $eyebrow, 'forest' ); ?>
        <?php endif; ?>

        <?php if ( $title ) : ?>
          <h1 class="ea-page-hero__heading">
            <?php echo wp_kses_post( $title ); ?>
          </h1>
        <?php endif; ?>

        <?php if ( $subtitle ) : ?>
          <p class="ea-page-hero__subtitle"><?php echo esc_html( $subtitle ); ?></p>
        <?php endif; ?>

        <?php if ( $actions ) : ?>
          <div class="ea-page-hero__actions">
            <?php echo wp_kses_post( $actions ); ?>
          </div>
        <?php endif; ?>
      </div>

      <?php if ( $has_image ) : ?>
        <div class="ea-page-hero__image">
          <?php echo wp_get_attachment_image( $image_id, 'ea-portrait', false, [ 'alt' => '' ] ); ?>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>
