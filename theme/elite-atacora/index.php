<?php
/**
 * index.php — The loop fallback. WordPress requires this file.
 * The actual blog archive is handled by archive.php.
 */
get_header();
?>

<main id="main" class="ea-section">
  <div class="ea-container">
    <div class="ea-section-head">
      <?php ea_eyebrow( __( 'Journal de l\'ONG', 'elite-atacora' ), 'forest' ); ?>
      <h1><?php esc_html_e( 'Dernières actualités', 'elite-atacora' ); ?></h1>
    </div>

    <?php if ( have_posts() ) : ?>
      <div class="ea-news__grid">
        <?php while ( have_posts() ) : the_post(); ?>
          <?php get_template_part( 'template-parts/news-card', null, [ 'post_id' => get_the_ID() ] ); ?>
        <?php endwhile; ?>
      </div>
      <div class="ea-pagination" style="margin-top:64px;">
        <?php
        echo paginate_links( [
          'prev_text' => ea_arrow_icon( 11 ),
          'next_text' => ea_arrow_icon( 11 ),
          'type'      => 'list',
        ] );
        ?>
      </div>
    <?php else : ?>
      <p style="text-align:center;color:var(--muted);padding:64px 0;">
        <?php esc_html_e( 'Aucun article disponible.', 'elite-atacora' ); ?>
      </p>
    <?php endif; ?>
  </div>
</main>

<?php get_footer(); ?>
