<?php
/**
 * Template part: Event Card (for events page list)
 *
 * Args:
 *   post_id int
 */
$post_id  = $args['post_id'] ?? get_the_ID();
$title    = get_the_title( $post_id );
$permalink = get_permalink( $post_id );
$meta     = ea_get_event_meta( $post_id );

$date_ts  = $meta['date'] ? strtotime( $meta['date'] ) : false;
$day      = $date_ts ? date_i18n( 'd',  $date_ts ) : '—';
$month    = $date_ts ? date_i18n( 'M.', $date_ts ) : '—';
$year     = $date_ts ? date_i18n( 'Y',  $date_ts ) : '';
$type     = $meta['type']  ?: __( 'Événement', 'elite-atacora' );
$time     = $meta['time']  ?: '';
$place    = $meta['place'] ?: '';
?>
<article class="ea-event-page-card card-hover">
  <div class="ea-event-page-card__date-col">
    <div class="ea-event-page-card__month"><?php echo esc_html( $month ); ?></div>
    <div class="ea-event-page-card__day tabular"><?php echo esc_html( $day ); ?></div>
    <div class="ea-event-page-card__year"><?php echo esc_html( $year ); ?></div>
  </div>
  <div class="ea-event-page-card__body">
    <div class="ea-event-page-card__meta">
      <span class="ea-tag ea-tag--honey"><?php echo esc_html( $type ); ?></span>
      <?php if ( $time ) : ?>
        <span style="font-size:12px;color:var(--muted);"><?php echo esc_html( $time ); ?></span>
      <?php endif; ?>
    </div>
    <h3 class="ea-event-page-card__title"><?php echo esc_html( $title ); ?></h3>
    <?php if ( $place ) : ?>
      <div class="ea-event-page-card__place"><?php echo esc_html( $place ); ?></div>
    <?php endif; ?>
    <div class="ea-event-page-card__foot">
      <a href="<?php echo esc_url( $permalink ); ?>" class="ea-event-page-card__link">
        <?php esc_html_e( 'Voir le détail', 'elite-atacora' ); ?>
      </a>
      <a href="<?php echo esc_url( $permalink ); ?>" class="ea-news-card__arrow-btn" aria-hidden="true" tabindex="-1">
        <?php echo ea_arrow_icon( 13 ); ?>
      </a>
    </div>
  </div>
</article>
