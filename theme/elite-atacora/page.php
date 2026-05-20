<?php
/**
 * page.php — Generic page template (fallback for custom templates).
 */
get_header();
?>

<main id="main">
  <?php while ( have_posts() ) : the_post(); ?>

    <!-- Page hero -->
    <section class="ea-page-hero">
      <div class="ea-page-hero__blob-1" aria-hidden="true"></div>
      <div class="ea-page-hero__blob-2" aria-hidden="true"></div>
      <div class="ea-container" style="position:relative;">
        <nav class="ea-breadcrumb" aria-label="<?php esc_attr_e( 'Fil d\'Ariane', 'elite-atacora' ); ?>">
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Accueil', 'elite-atacora' ); ?></a>
          <span class="ea-breadcrumb__sep" aria-hidden="true">/</span>
          <span><?php the_title(); ?></span>
        </nav>
        <div class="ea-page-hero__grid ea-page-hero__grid--no-image">
          <div class="ea-page-hero__content">
            <h1 class="ea-page-hero__heading" style="font-family:var(--font-serif);font-size:clamp(40px,6vw,80px);line-height:1.05;letter-spacing:-.02em;color:var(--ink);margin-top:0;">
              <?php the_title(); ?>
            </h1>
            <?php if ( has_excerpt() ) : ?>
              <p class="ea-page-hero__subtitle"><?php the_excerpt(); ?></p>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </section>

    <!-- Page content -->
    <section class="ea-section" style="padding-top:0;">
      <div class="ea-container">
        <div class="ea-article__body" style="max-width:760px;margin-inline:auto;">
          <?php the_content(); ?>
        </div>
      </div>
    </section>

  <?php endwhile; ?>
</main>

<?php get_footer(); ?>
