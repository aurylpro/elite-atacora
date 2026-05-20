<?php
/**
 * Template part: News Card
 *
 * Args:
 *   post_id int
 *   large   bool  — horizontal layout for featured card
 */
$post_id = $args['post_id'] ?? get_the_ID();
$large   = $args['large']   ?? false;

$title      = get_the_title( $post_id );
$permalink  = get_permalink( $post_id );
$date       = get_the_date( 'd F Y', $post_id );
$excerpt    = get_the_excerpt( $post_id );
$thumb_id   = get_post_thumbnail_id( $post_id );
$minutes    = ea_reading_time( $post_id );

// Category / tag
$terms    = get_the_terms( $post_id, 'ea_news_cat' );
$tag_name = ( $terms && ! is_wp_error( $terms ) ) ? $terms[0]->name : __( 'Actualité', 'elite-atacora' );
$tag_cls  = ea_news_tag_class( $tag_name );
?>
<article class="ea-news-card card-hover<?php echo $large ? ' ea-news-card--large' : ''; ?>"
         data-category="<?php echo esc_attr( strtolower( $tag_name ) ); ?>">

  <div class="ea-news-card__img">
    <?php if ( $thumb_id ) : ?>
      <?php echo wp_get_attachment_image( $thumb_id, $large ? 'ea-wide' : 'ea-card', false, [
        'alt'     => esc_attr( $title ),
        'loading' => 'lazy',
      ] ); ?>
    <?php else : ?>
      <div style="width:100%;height:100%;background:var(--paper);display:grid;place-items:center;color:var(--muted);font-size:13px;">
        <?php esc_html_e( 'Photo à venir', 'elite-atacora' ); ?>
      </div>
    <?php endif; ?>
    <span class="ea-tag <?php echo esc_attr( $tag_cls ); ?> ea-news-card__tag"><?php echo esc_html( $tag_name ); ?></span>
    <span class="ea-news-card__reading"><?php printf( esc_html__( '%d min de lecture', 'elite-atacora' ), $minutes ); ?></span>
  </div>

  <div class="ea-news-card__body">
    <div class="ea-news-card__date"><?php echo esc_html( $date ); ?></div>
    <h3 class="ea-news-card__title"><?php echo esc_html( $title ); ?></h3>
    <?php if ( $excerpt ) : ?>
      <p class="ea-news-card__excerpt"><?php echo esc_html( $excerpt ); ?></p>
    <?php endif; ?>
    <div class="ea-news-card__foot">
      <a href="<?php echo esc_url( $permalink ); ?>" class="ea-news-card__read">
        <?php esc_html_e( "Lire l'article", 'elite-atacora' ); ?>
      </a>
      <a href="<?php echo esc_url( $permalink ); ?>" class="ea-news-card__arrow-btn" aria-hidden="true" tabindex="-1">
        <?php echo ea_arrow_icon( 13 ); ?>
      </a>
    </div>
  </div>

</article>
