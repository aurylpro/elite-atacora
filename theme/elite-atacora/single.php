<?php
/**
 * single.php — Single blog post (article detail).
 */
get_header();
?>

<main id="main">
<?php while ( have_posts() ) : the_post(); ?>

  <!-- Breadcrumb only zone -->
  <section class="ea-page-hero" style="padding-bottom:0;">
    <div class="ea-page-hero__blob-1" aria-hidden="true"></div>
    <div class="ea-container" style="position:relative;">
      <nav class="ea-breadcrumb" aria-label="<?php esc_attr_e( 'Fil d\'Ariane', 'elite-atacora' ); ?>">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Accueil', 'elite-atacora' ); ?></a>
        <span class="ea-breadcrumb__sep" aria-hidden="true">/</span>
        <a href="<?php echo esc_url( home_url( '/actualites/' ) ); ?>"><?php esc_html_e( 'Actualités', 'elite-atacora' ); ?></a>
        <span class="ea-breadcrumb__sep" aria-hidden="true">/</span>
        <span><?php echo esc_html( wp_trim_words( get_the_title(), 8, '…' ) ); ?></span>
      </nav>
    </div>
  </section>

  <!-- Article -->
  <article class="ea-section" style="padding-top:48px;" itemscope itemtype="https://schema.org/Article">

    <!-- Meta + heading -->
    <div class="ea-container ea-article__meta-wrap" style="max-width:820px;margin-inline:auto;padding-bottom:0;">

      <div class="ea-article-meta">
        <?php
        $terms    = get_the_terms( get_the_ID(), 'ea_news_cat' );
        $tag_name = ( $terms && ! is_wp_error( $terms ) ) ? $terms[0]->name : __( 'Actualité', 'elite-atacora' );
        ?>
        <span class="ea-tag <?php echo esc_attr( ea_news_tag_class( $tag_name ) ); ?>"><?php echo esc_html( $tag_name ); ?></span>
        <span class="ea-article-meta__date" itemprop="datePublished" content="<?php echo esc_attr( get_the_date( 'c' ) ); ?>">
          <?php echo esc_html( get_the_date( 'd F Y' ) ); ?>
        </span>
        <span class="ea-article-meta__dot" aria-hidden="true">·</span>
        <span class="ea-article-meta__reading">
          <?php printf( esc_html__( '%d min de lecture', 'elite-atacora' ), ea_reading_time( get_the_ID() ) ); ?>
        </span>
      </div>

      <h1 class="ea-article__heading" itemprop="headline"><?php the_title(); ?></h1>

      <?php if ( has_excerpt() ) : ?>
        <p class="ea-article__lead" itemprop="description"><?php the_excerpt(); ?></p>
      <?php endif; ?>

      <!-- Author -->
      <div class="ea-article__author" itemprop="author" itemscope itemtype="https://schema.org/Person">
        <div class="ea-article__author-avatar" aria-hidden="true">
          <?php echo esc_html( mb_strtoupper( mb_substr( get_the_author(), 0, 2 ) ) ); ?>
        </div>
        <div>
          <div class="ea-article__author-name" itemprop="name"><?php the_author(); ?></div>
          <div class="ea-article__author-role"><?php esc_html_e( "Équipe Elite Atacora", 'elite-atacora' ); ?></div>
        </div>
        <!-- Share buttons -->
        <div class="ea-article__share" aria-label="<?php esc_attr_e( 'Partager', 'elite-atacora' ); ?>">
          <button class="ea-share-btn" aria-label="<?php esc_attr_e( 'Partager', 'elite-atacora' ); ?>" style="padding:0 16px;">
            <?php esc_html_e( 'Partager', 'elite-atacora' ); ?>
          </button>
          <?php
          $share_url = rawurlencode( get_permalink() );
          $share_title = rawurlencode( get_the_title() );
          $share_links = [
            'F'  => 'https://www.facebook.com/sharer.php?u=' . $share_url,
            'X'  => 'https://twitter.com/intent/tweet?url=' . $share_url . '&text=' . $share_title,
            'in' => 'https://www.linkedin.com/shareArticle?mini=true&url=' . $share_url,
          ];
          foreach ( $share_links as $label => $href ) :
          ?>
            <a href="<?php echo esc_url( $href ); ?>" class="ea-share-btn ea-share-btn--icon" target="_blank" rel="noopener noreferrer" aria-label="<?php printf( esc_attr__( 'Partager sur %s', 'elite-atacora' ), $label ); ?>">
              <?php echo esc_html( $label ); ?>
            </a>
          <?php endforeach; ?>
        </div>
      </div>
    </div><!-- /.ea-article__meta-wrap -->

    <!-- Hero image -->
    <?php if ( has_post_thumbnail() ) : ?>
      <div class="ea-article__hero-img ea-container ea-article__hero-wrap" style="max-width:1180px;margin-inline:auto;margin-top:48px;">
        <figure>
          <?php the_post_thumbnail( 'ea-wide', [ 'itemprop' => 'image', 'style' => 'width:100%;aspect-ratio:16/9;object-fit:cover;border-radius:36px;box-shadow:0 0 0 1px rgba(30,24,19,.05);' ] ); ?>
          <?php $caption = get_the_post_thumbnail_caption(); if ( $caption ) : ?>
            <figcaption style="font-size:12px;color:var(--muted);text-align:center;font-style:italic;margin-top:12px;"><?php echo esc_html( $caption ); ?></figcaption>
          <?php endif; ?>
        </figure>
      </div>
    <?php endif; ?>

    <!-- Body content -->
    <div class="ea-container ea-article__body-wrap" style="max-width:760px;margin-inline:auto;margin-top:64px;" itemprop="articleBody">
      <div class="ea-article__body">
        <?php the_content(); ?>
      </div>

      <!-- Tags + CTA -->
      <div style="margin-top:64px;padding-top:32px;border-top:1px solid rgba(30,24,19,.1);display:flex;flex-wrap:wrap;align-items:center;justify-content:space-between;gap:24px;">
        <div class="ea-article__tags">
          <?php
          $all_terms = get_the_terms( get_the_ID(), 'ea_news_cat' );
          if ( $all_terms && ! is_wp_error( $all_terms ) ) {
            foreach ( $all_terms as $term ) {
              printf(
                '<span class="ea-article__hashtag">#%s</span>',
                esc_html( $term->name )
              );
            }
          }
          $tags = get_the_tags();
          if ( $tags && ! is_wp_error( $tags ) ) {
            foreach ( $tags as $tag ) {
              printf( '<span class="ea-article__hashtag">#%s</span>', esc_html( $tag->name ) );
            }
          }
          ?>
        </div>
        <?php ea_pill_button( __( 'Soutenir le programme', 'elite-atacora' ), ea_get_page_link( 'adherer' ), 'primary' ); ?>
      </div>
    </div>

  </article>

<?php endwhile; ?>

<!-- Related articles -->
<?php
$current_id  = get_the_ID();
$related_q   = new WP_Query( [
  'post_type'      => 'post',
  'posts_per_page' => 2,
  'post__not_in'   => [ $current_id ],
  'post_status'    => 'publish',
  'orderby'        => 'rand',
] );

if ( $related_q->have_posts() ) :
?>
<section class="ea-section" style="background:var(--paper);">
  <div class="ea-container">
    <div class="ea-section-head-row">
      <div>
        <?php ea_eyebrow( __( 'Sur le même sujet', 'elite-atacora' ), 'forest' ); ?>
        <h2 style="font-family:var(--font-serif);font-size:clamp(32px,4vw,44px);line-height:1.05;color:var(--ink);margin-top:20px;">
          <?php esc_html_e( 'À lire', 'elite-atacora' ); ?>
          <em style="font-style:italic;color:var(--terracotta);"><?php esc_html_e( 'aussi.', 'elite-atacora' ); ?></em>
        </h2>
      </div>
      <a href="<?php echo esc_url( home_url( '/actualites/' ) ); ?>" style="font-size:14px;font-weight:600;color:var(--forest);text-decoration:none;display:inline-flex;align-items:center;gap:8px;white-space:nowrap;">
        <?php esc_html_e( 'Toutes les actualités', 'elite-atacora' ); ?>
        <?php echo ea_arrow_icon( 13 ); ?>
      </a>
    </div>
    <div class="ea-grid-related" style="display:grid;gap:28px;">
      <?php while ( $related_q->have_posts() ) : $related_q->the_post(); ?>
        <a href="<?php the_permalink(); ?>" class="ea-news-card card-hover" style="flex-direction:row;text-decoration:none;" aria-label="<?php the_title_attribute(); ?>">
          <div style="width:33%;overflow:hidden;aspect-ratio:1/1;">
            <?php if ( has_post_thumbnail() ) : ?>
              <?php the_post_thumbnail( 'ea-thumb', [ 'style' => 'width:100%;height:100%;object-fit:cover;transition:transform 700ms ease;', 'alt' => '' ] ); ?>
            <?php else : ?>
              <div style="width:100%;height:100%;background:var(--sand);"></div>
            <?php endif; ?>
          </div>
          <div class="ea-news-card__body" style="flex:1;padding:24px;justify-content:center;">
            <?php
            $rt = get_the_terms( get_the_ID(), 'ea_news_cat' );
            $rn = ( $rt && ! is_wp_error( $rt ) ) ? $rt[0]->name : '';
            if ( $rn ) echo '<div style="font-size:10px;text-transform:uppercase;letter-spacing:.1em;color:var(--terracotta);font-weight:600;margin-bottom:8px;">' . esc_html( $rn ) . '</div>';
            ?>
            <h3 class="ea-news-card__title" style="font-size:18px;"><?php the_title(); ?></h3>
            <div style="margin-top:12px;font-size:12px;color:var(--muted);"><?php echo esc_html( get_the_date( 'd F Y' ) ); ?></div>
          </div>
        </a>
      <?php endwhile; wp_reset_postdata(); ?>
    </div>
  </div>
</section>
<?php endif; ?>

</main>

<?php get_footer(); ?>
