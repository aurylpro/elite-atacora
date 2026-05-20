<?php
/**
 * archive.php — Actualités archive (news listing).
 *
 * URL: /actualites/
 * Supports: category filter pills (ea_news_cat), search, pagination.
 * First result rendered as large featured card; remainder in 3-col grid.
 */
get_header();

/* ── Categories for filter pills ─────────────────────────────────── */
$cats = get_terms( [
	'taxonomy'   => 'ea_news_cat',
	'hide_empty' => true,
	'orderby'    => 'count',
	'order'      => 'DESC',
] );

/* ── Active filters from URL ──────────────────────────────────────── */
$active_cat    = isset( $_GET['cat'] )    ? sanitize_text_field( wp_unslash( $_GET['cat'] ) )    : '';
$active_search = isset( $_GET['search'] ) ? sanitize_text_field( wp_unslash( $_GET['search'] ) ) : '';

/* ── Build query ──────────────────────────────────────────────────── */
$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

$query_args = [
	'post_type'      => 'post',
	'post_status'    => 'publish',
	'posts_per_page' => 10,
	'paged'          => $paged,
];

if ( $active_cat ) {
	$query_args['tax_query'] = [ [
		'taxonomy' => 'ea_news_cat',
		'field'    => 'slug',
		'terms'    => $active_cat,
	] ];
}

if ( $active_search ) {
	$query_args['s'] = $active_search;
}

$news_query = new WP_Query( $query_args );
?>

<main id="main">

  <!-- Page hero -->
  <section class="ea-page-hero">
    <div class="ea-page-hero__blob-1" aria-hidden="true"></div>
    <div class="ea-page-hero__blob-2" aria-hidden="true"></div>
    <div class="ea-container" style="position:relative;">
      <nav class="ea-breadcrumb" aria-label="<?php esc_attr_e( 'Fil d\'Ariane', 'elite-atacora' ); ?>">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Accueil', 'elite-atacora' ); ?></a>
        <span class="ea-breadcrumb__sep" aria-hidden="true">/</span>
        <span><?php esc_html_e( 'Actualités', 'elite-atacora' ); ?></span>
      </nav>
      <div class="ea-page-hero__grid ea-page-hero__grid--no-image">
        <div class="ea-page-hero__content">
          <?php ea_eyebrow( __( 'Journal de l\'ONG', 'elite-atacora' ), 'forest' ); ?>
          <h1 class="ea-page-hero__heading" style="font-family:var(--font-serif);font-size:clamp(40px,6vw,80px);line-height:1.05;letter-spacing:-.02em;color:var(--ink);margin-top:24px;">
            <?php esc_html_e( 'Nos', 'elite-atacora' ); ?>
            <em style="font-style:italic;color:var(--terracotta);"><?php esc_html_e( 'actualités.', 'elite-atacora' ); ?></em>
          </h1>
          <p class="ea-page-hero__subtitle">
            <?php esc_html_e( 'Suivez les avancées du programme, nos partenariats, et les témoignages du terrain.', 'elite-atacora' ); ?>
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- Filter + Search bar -->
  <section class="ea-section" style="padding-top:0;padding-bottom:0;">
    <div class="ea-container">
      <form class="ea-archive-filter" method="get" action="<?php echo esc_url( home_url( '/actualites/' ) ); ?>" role="search">

        <!-- Search input -->
        <div class="ea-archive-search">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
            <circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/>
          </svg>
          <input
            type="search"
            name="search"
            class="ea-archive-search__input"
            placeholder="<?php esc_attr_e( 'Rechercher un article…', 'elite-atacora' ); ?>"
            value="<?php echo esc_attr( $active_search ); ?>"
            aria-label="<?php esc_attr_e( 'Rechercher un article', 'elite-atacora' ); ?>"
          >
        </div>

        <!-- Category pills -->
        <div class="ea-archive-pills" role="group" aria-label="<?php esc_attr_e( 'Filtrer par catégorie', 'elite-atacora' ); ?>">
          <a
            href="<?php echo esc_url( home_url( '/actualites/' ) ); ?>"
            class="ea-filter-pill<?php echo ! $active_cat ? ' ea-filter-pill--active' : ''; ?>"
          >
            <?php esc_html_e( 'Tous', 'elite-atacora' ); ?>
          </a>
          <?php if ( ! is_wp_error( $cats ) && $cats ) : foreach ( $cats as $cat ) : ?>
            <?php
            $pill_url = add_query_arg( [
              'cat'    => $cat->slug,
              'search' => $active_search ?: null,
            ], home_url( '/actualites/' ) );
            ?>
            <a
              href="<?php echo esc_url( $pill_url ); ?>"
              class="ea-filter-pill<?php echo ( $active_cat === $cat->slug ) ? ' ea-filter-pill--active' : ''; ?>"
            >
              <?php echo esc_html( $cat->name ); ?>
            </a>
          <?php endforeach; endif; ?>
        </div>

        <noscript><button type="submit" class="ea-btn ea-btn--primary"><?php esc_html_e( 'Rechercher', 'elite-atacora' ); ?></button></noscript>
      </form>
    </div>
  </section>

  <!-- News grid -->
  <section class="ea-section">
    <div class="ea-container">

      <?php if ( $news_query->have_posts() ) : ?>

        <?php
        /* ── First post: large featured card ── */
        $news_query->the_post();
        get_template_part( 'template-parts/news-card', null, [
          'post_id' => get_the_ID(),
          'large'   => true,
        ] );
        wp_reset_postdata();
        $news_query->the_post(); // Rewind trick: actually we already consumed #1 so continue
        /* Actually: we need to loop correctly. Let me use a counter approach. */
        ?>

        <?php
        /*
         * Correct approach: track index inside the while loop.
         * Reset the query pointer first.
         */
        $news_query->rewind_posts();
        $post_index = 0;
        ?>

        <div class="ea-news__featured" style="margin-bottom:48px;">
        <?php while ( $news_query->have_posts() ) : $news_query->the_post(); ?>
          <?php if ( $post_index === 0 ) : ?>
            <?php
            get_template_part( 'template-parts/news-card', null, [
              'post_id' => get_the_ID(),
              'large'   => true,
            ] );
            ?>
            </div><!-- /.ea-news__featured -->
            <div class="ea-news__grid">
          <?php else : ?>
            <?php
            get_template_part( 'template-parts/news-card', null, [
              'post_id' => get_the_ID(),
              'large'   => false,
            ] );
            ?>
          <?php endif; ?>
          <?php $post_index++; ?>
        <?php endwhile; ?>
        </div><!-- /.ea-news__grid -->

        <?php wp_reset_postdata(); ?>

        <!-- Pagination -->
        <?php if ( $news_query->max_num_pages > 1 ) : ?>
          <nav class="ea-pagination" aria-label="<?php esc_attr_e( 'Navigation entre les pages', 'elite-atacora' ); ?>" style="margin-top:64px;">
            <?php
            echo paginate_links( [
              'base'      => add_query_arg( 'paged', '%#%' ),
              'format'    => '',
              'current'   => $paged,
              'total'     => $news_query->max_num_pages,
              'prev_text' => ea_arrow_icon( 11 ),
              'next_text' => ea_arrow_icon( 11 ),
              'type'      => 'list',
            ] );
            ?>
          </nav>
        <?php endif; ?>

      <?php else : ?>

        <!-- Empty state -->
        <div style="text-align:center;padding:96px 0;">
          <div style="font-size:48px;margin-bottom:24px;" aria-hidden="true">📭</div>
          <h2 style="font-family:var(--font-serif);font-size:clamp(24px,3vw,36px);color:var(--ink);margin-bottom:16px;">
            <?php esc_html_e( 'Aucun article trouvé', 'elite-atacora' ); ?>
          </h2>
          <p style="color:var(--muted);max-width:480px;margin-inline:auto;margin-bottom:32px;">
            <?php
            if ( $active_search || $active_cat ) {
              esc_html_e( 'Essayez de modifier vos critères de recherche ou explorez toutes nos actualités.', 'elite-atacora' );
            } else {
              esc_html_e( 'Aucun article n\'est disponible pour le moment. Revenez bientôt !', 'elite-atacora' );
            }
            ?>
          </p>
          <?php ea_pill_button( __( 'Toutes les actualités', 'elite-atacora' ), home_url( '/actualites/' ), 'primary' ); ?>
        </div>

      <?php endif; ?>

    </div>
  </section>

  <!-- Newsletter CTA -->
  <section class="ea-section" style="background:var(--paper);">
    <div class="ea-container">
      <div class="ea-cta-banner ea-cta-banner--forest" style="text-align:center;max-width:640px;margin-inline:auto;background:none;box-shadow:none;padding:0;">
        <?php ea_eyebrow( __( 'Newsletter', 'elite-atacora' ), 'terracotta' ); ?>
        <h2 style="font-family:var(--font-serif);font-size:clamp(28px,3.5vw,44px);color:var(--ink);margin-top:20px;margin-bottom:16px;">
          <?php esc_html_e( 'Restez', 'elite-atacora' ); ?>
          <em style="font-style:italic;color:var(--forest);"><?php esc_html_e( 'informé·e.', 'elite-atacora' ); ?></em>
        </h2>
        <p style="color:var(--muted);margin-bottom:32px;">
          <?php esc_html_e( 'Recevez nos actualités, rapports et appels à projets directement dans votre boîte mail.', 'elite-atacora' ); ?>
        </p>
        <form class="ea-newsletter-form" style="display:flex;gap:12px;flex-wrap:wrap;justify-content:center;" action="#" method="post">
          <?php wp_nonce_field( 'ea_newsletter', 'ea_nl_nonce' ); ?>
          <input
            type="email"
            name="ea_nl_email"
            required
            placeholder="<?php esc_attr_e( 'votre@email.com', 'elite-atacora' ); ?>"
            class="ea-input"
            style="flex:1;min-width:240px;max-width:340px;"
            aria-label="<?php esc_attr_e( 'Adresse e-mail', 'elite-atacora' ); ?>"
          >
          <button type="submit" class="ea-btn ea-btn--forest">
            <?php esc_html_e( "S'abonner", 'elite-atacora' ); ?>
            <?php echo ea_arrow_icon( 13 ); ?>
          </button>
        </form>
      </div>
    </div>
  </section>

</main>

<?php get_footer(); ?>
