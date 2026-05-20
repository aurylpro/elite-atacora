<?php
/**
 * Template Name: Événements
 * Template Post Type: page
 *
 * Page: /evenements/
 * Sections: Hero → List/Calendar toggle → Featured event → Events grid → Past events → CTA
 *
 * CPT: ea_event
 * Meta keys: ea_event_date (YYYY-MM-DD), ea_event_time, ea_event_place, ea_event_type, ea_event_featured
 */
get_header();

$today = current_time( 'Y-m-d' );

/* ── Upcoming events ──────────────────────────────────────────────── */
$upcoming_q = new WP_Query( [
	'post_type'      => 'ea_event',
	'post_status'    => 'publish',
	'posts_per_page' => 12,
	'meta_key'       => 'ea_event_date',
	'orderby'        => 'meta_value',
	'order'          => 'ASC',
	'meta_query'     => [ [
		'key'     => 'ea_event_date',
		'value'   => $today,
		'compare' => '>=',
		'type'    => 'DATE',
	] ],
] );

/* ── Past events ──────────────────────────────────────────────────── */
$past_q = new WP_Query( [
	'post_type'      => 'ea_event',
	'post_status'    => 'publish',
	'posts_per_page' => 6,
	'meta_key'       => 'ea_event_date',
	'orderby'        => 'meta_value',
	'order'          => 'DESC',
	'meta_query'     => [ [
		'key'     => 'ea_event_date',
		'value'   => $today,
		'compare' => '<',
		'type'    => 'DATE',
	] ],
] );

/* ── Featured event (first upcoming with ea_event_featured = 1) ──── */
$featured_id = 0;
if ( $upcoming_q->have_posts() ) {
	foreach ( $upcoming_q->posts as $evt ) {
		if ( get_post_meta( $evt->ID, 'ea_event_featured', true ) ) {
			$featured_id = $evt->ID;
			break;
		}
	}
	if ( ! $featured_id ) {
		$featured_id = $upcoming_q->posts[0]->ID;
	}
}

/* ── Month labels for calendar view ──────────────────────────────── */
$months_fr = [
	1 => 'Janvier', 2 => 'Février', 3 => 'Mars', 4 => 'Avril',
	5 => 'Mai', 6 => 'Juin', 7 => 'Juillet', 8 => 'Août',
	9 => 'Septembre', 10 => 'Octobre', 11 => 'Novembre', 12 => 'Décembre',
];
$days_fr = [ 'Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam', 'Dim' ];
$cur_month = (int) current_time( 'n' );
$cur_year  = (int) current_time( 'Y' );

/* Build calendar days for current month */
$first_dow = (int) date( 'N', mktime( 0, 0, 0, $cur_month, 1, $cur_year ) ); /* 1=Mon … 7=Sun */
$days_in_month = (int) date( 't', mktime( 0, 0, 0, $cur_month, 1, $cur_year ) );
$today_day = (int) current_time( 'j' );

/* Map event dates to day numbers for this month */
$event_days = [];
if ( $upcoming_q->have_posts() ) {
	foreach ( $upcoming_q->posts as $evt ) {
		$d = get_post_meta( $evt->ID, 'ea_event_date', true );
		if ( $d ) {
			$parts = explode( '-', $d );
			if ( count( $parts ) === 3 && (int) $parts[0] === $cur_year && (int) $parts[1] === $cur_month ) {
				$event_days[ (int) $parts[2] ] = $evt->ID;
			}
		}
	}
}
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
        <span><?php esc_html_e( 'Événements', 'elite-atacora' ); ?></span>
      </nav>
      <div class="ea-page-hero__grid ea-page-hero__grid--no-image">
        <div class="ea-page-hero__content">
          <?php ea_eyebrow( __( 'Agenda', 'elite-atacora' ), 'honey' ); ?>
          <h1 class="ea-page-hero__heading" style="font-family:var(--font-serif);font-size:clamp(40px,6vw,80px);line-height:1.05;letter-spacing:-.02em;color:var(--ink);margin-top:24px;">
            <?php esc_html_e( 'Nos', 'elite-atacora' ); ?>
            <em style="font-style:italic;color:var(--honey);"><?php esc_html_e( 'événements.', 'elite-atacora' ); ?></em>
          </h1>
          <p class="ea-page-hero__subtitle">
            <?php esc_html_e( 'Formations, cérémonies de remise de bourses, ateliers communautaires… retrouvez tous nos rendez-vous.', 'elite-atacora' ); ?>
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- View toggle -->
  <section class="ea-section" style="padding-bottom:0;">
    <div class="ea-container">
      <div style="display:flex;gap:8px;align-items:center;margin-bottom:48px;">
        <button
          class="ea-view-toggle ea-view-toggle--active"
          data-view="list"
          aria-pressed="true"
          style="display:inline-flex;align-items:center;gap:8px;padding:10px 20px;border-radius:100px;font-size:14px;font-weight:600;border:1.5px solid var(--forest);color:var(--forest);background:transparent;cursor:pointer;transition:all 200ms ease;"
        >
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
            <line x1="8" y1="6" x2="21" y2="6"/><line x1="8" y1="12" x2="21" y2="12"/><line x1="8" y1="18" x2="21" y2="18"/>
            <line x1="3" y1="6" x2="3.01" y2="6"/><line x1="3" y1="12" x2="3.01" y2="12"/><line x1="3" y1="18" x2="3.01" y2="18"/>
          </svg>
          <?php esc_html_e( 'Liste', 'elite-atacora' ); ?>
        </button>
        <button
          class="ea-view-toggle"
          data-view="calendar"
          aria-pressed="false"
          style="display:inline-flex;align-items:center;gap:8px;padding:10px 20px;border-radius:100px;font-size:14px;font-weight:600;border:1.5px solid rgba(30,24,19,.15);color:var(--muted);background:transparent;cursor:pointer;transition:all 200ms ease;"
        >
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
            <line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/>
            <line x1="3" y1="10" x2="21" y2="10"/>
          </svg>
          <?php esc_html_e( 'Calendrier', 'elite-atacora' ); ?>
        </button>
      </div>

      <!-- LIST VIEW ─────────────────────────────────────────────────── -->
      <div id="ea-view-list">

        <?php if ( $upcoming_q->have_posts() ) : ?>

          <?php
          /* Featured event */
          if ( $featured_id ) :
            $f_meta  = ea_get_event_meta( $featured_id );
            $f_date  = $f_meta['date'];
            $f_title = get_the_title( $featured_id );
            $f_link  = get_permalink( $featured_id );
            $f_thumb = get_the_post_thumbnail( $featured_id, 'ea-wide', [ 'style' => 'width:100%;height:100%;object-fit:cover;', 'alt' => $f_title ] );
            $f_types = get_the_terms( $featured_id, 'ea_event_type' );
            $f_type  = ( $f_types && ! is_wp_error( $f_types ) ) ? $f_types[0]->name : __( 'Événement', 'elite-atacora' );
            $f_excerpt = wp_trim_words( get_the_excerpt( $featured_id ), 20, '…' );
          ?>
          <div class="ea-event-featured" style="margin-bottom:64px;">
            <div class="ea-event-featured__img">
              <?php if ( $f_thumb ) : ?>
                <?php echo $f_thumb; ?>
              <?php else : ?>
                <div style="width:100%;height:100%;background:var(--sand);"></div>
              <?php endif; ?>
            </div>
            <div class="ea-event-featured__body">
              <div style="display:flex;gap:12px;align-items:center;margin-bottom:16px;flex-wrap:wrap;">
                <span class="ea-tag ea-tag--honey"><?php esc_html_e( 'À la une', 'elite-atacora' ); ?></span>
                <?php if ( $f_type ) : ?>
                  <span style="font-size:12px;text-transform:uppercase;letter-spacing:.1em;color:var(--muted);font-weight:600;"><?php echo esc_html( $f_type ); ?></span>
                <?php endif; ?>
              </div>
              <h2 style="font-family:var(--font-serif);font-size:clamp(24px,3vw,40px);line-height:1.1;color:var(--cream);margin-bottom:16px;">
                <?php echo esc_html( $f_title ); ?>
              </h2>
              <?php if ( $f_excerpt ) : ?>
                <p style="color:rgba(250,245,234,.75);margin-bottom:24px;"><?php echo esc_html( $f_excerpt ); ?></p>
              <?php endif; ?>
              <div style="display:flex;flex-direction:column;gap:10px;margin-bottom:32px;">
                <?php if ( $f_date ) : ?>
                  <div style="display:flex;gap:10px;align-items:center;color:var(--honey);">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                      <rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/>
                    </svg>
                    <span style="font-size:14px;font-weight:600;"><?php echo esc_html( date_i18n( 'd F Y', strtotime( $f_date ) ) ); ?></span>
                    <?php if ( $f_meta['time'] ) : ?>
                      <span style="color:rgba(250,245,234,.5);">·</span>
                      <span style="font-size:14px;"><?php echo esc_html( $f_meta['time'] ); ?></span>
                    <?php endif; ?>
                  </div>
                <?php endif; ?>
                <?php if ( $f_meta['place'] ) : ?>
                  <div style="display:flex;gap:10px;align-items:center;color:rgba(250,245,234,.7);">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                      <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/>
                    </svg>
                    <span style="font-size:14px;"><?php echo esc_html( $f_meta['place'] ); ?></span>
                  </div>
                <?php endif; ?>
              </div>
              <a href="<?php echo esc_url( $f_link ); ?>" class="ea-btn ea-btn--honey">
                <?php esc_html_e( "S'inscrire", 'elite-atacora' ); ?>
                <?php echo ea_arrow_icon( 14 ); ?>
              </a>
            </div>
          </div>
          <?php endif; ?>

          <!-- Events grid -->
          <div class="ea-events-upcoming-grid" style="display:grid;gap:24px;">
            <?php
            $upcoming_q->rewind_posts();
            while ( $upcoming_q->have_posts() ) :
              $upcoming_q->the_post();
              if ( get_the_ID() === $featured_id ) continue;
              get_template_part( 'template-parts/event-card', null, [ 'post_id' => get_the_ID() ] );
            endwhile;
            wp_reset_postdata();
            ?>
          </div>

        <?php else : ?>
          <div style="text-align:center;padding:96px 0;">
            <div style="font-size:48px;margin-bottom:24px;" aria-hidden="true">📅</div>
            <h2 style="font-family:var(--font-serif);font-size:clamp(24px,3vw,36px);color:var(--ink);margin-bottom:16px;">
              <?php esc_html_e( 'Aucun événement à venir', 'elite-atacora' ); ?>
            </h2>
            <p style="color:var(--muted);max-width:480px;margin-inline:auto;">
              <?php esc_html_e( 'Nos prochains événements seront annoncés ici. Revenez bientôt ou inscrivez-vous à notre newsletter.', 'elite-atacora' ); ?>
            </p>
          </div>
        <?php endif; ?>

      </div><!-- /#ea-view-list -->

      <!-- CALENDAR VIEW ──────────────────────────────────────────────── -->
      <div id="ea-view-calendar" hidden>
        <div class="ea-calendar">
          <div class="ea-calendar__header">
            <h3 class="ea-calendar__month"><?php echo esc_html( $months_fr[ $cur_month ] . ' ' . $cur_year ); ?></h3>
          </div>
          <div class="ea-calendar__grid" role="grid" aria-label="<?php printf( esc_attr__( 'Calendrier de %s %d', 'elite-atacora' ), $months_fr[ $cur_month ], $cur_year ); ?>">
            <!-- Day labels -->
            <?php foreach ( $days_fr as $d ) : ?>
              <div class="ea-calendar__day-label" role="columnheader" aria-label="<?php echo esc_attr( $d ); ?>"><?php echo esc_html( $d ); ?></div>
            <?php endforeach; ?>

            <!-- Empty cells before first day (Mon-based) -->
            <?php for ( $e = 1; $e < $first_dow; $e++ ) : ?>
              <div class="ea-calendar__cell ea-calendar__cell--empty" role="gridcell" aria-hidden="true"></div>
            <?php endfor; ?>

            <!-- Day cells -->
            <?php for ( $d = 1; $d <= $days_in_month; $d++ ) :
              $has_event = isset( $event_days[ $d ] );
              $is_today  = ( $d === $today_day );
              $cell_class = 'ea-calendar__cell';
              if ( $is_today )  $cell_class .= ' ea-calendar__cell--today';
              if ( $has_event ) $cell_class .= ' ea-calendar__cell--event';
            ?>
              <div class="<?php echo esc_attr( $cell_class ); ?>" role="gridcell">
                <?php if ( $has_event ) : ?>
                  <a href="<?php echo esc_url( get_permalink( $event_days[ $d ] ) ); ?>" class="ea-calendar__day-link" aria-label="<?php printf( esc_attr__( '%d %s — voir l\'événement', 'elite-atacora' ), $d, $months_fr[ $cur_month ] ); ?>">
                    <?php echo esc_html( $d ); ?>
                  </a>
                <?php else : ?>
                  <span class="ea-calendar__day"><?php echo esc_html( $d ); ?></span>
                <?php endif; ?>
              </div>
            <?php endfor; ?>
          </div><!-- /.ea-calendar__grid -->
        </div><!-- /.ea-calendar -->
      </div><!-- /#ea-view-calendar -->

    </div>
  </section>

  <!-- Past events -->
  <?php if ( $past_q->have_posts() ) : ?>
  <section class="ea-section" style="background:var(--paper);">
    <div class="ea-container">
      <div class="ea-section-head" style="margin-bottom:48px;">
        <?php ea_eyebrow( __( 'Rétrospective', 'elite-atacora' ), 'muted' ); ?>
        <h2 style="font-family:var(--font-serif);font-size:clamp(28px,3.5vw,44px);line-height:1.05;color:var(--ink);margin-top:20px;">
          <?php esc_html_e( 'Événements', 'elite-atacora' ); ?>
          <em style="font-style:italic;color:var(--muted);"><?php esc_html_e( 'passés.', 'elite-atacora' ); ?></em>
        </h2>
      </div>

      <div class="ea-past-events-table" style="display:flex;flex-direction:column;gap:0;border:1px solid rgba(30,24,19,.08);border-radius:16px;overflow:hidden;">
        <?php
        $past_q->rewind_posts();
        $past_index = 0;
        while ( $past_q->have_posts() ) :
          $past_q->the_post();
          $p_meta   = ea_get_event_meta( get_the_ID() );
          $p_types  = get_the_terms( get_the_ID(), 'ea_event_type' );
          $p_type   = ( $p_types && ! is_wp_error( $p_types ) ) ? $p_types[0]->name : '';
        ?>
          <a
            href="<?php the_permalink(); ?>"
            class="ea-past-event-row"
            style="display:grid;grid-template-columns:120px 1fr auto;gap:24px;align-items:center;padding:20px 24px;text-decoration:none;background:<?php echo $past_index % 2 === 0 ? 'var(--cream)' : 'transparent'; ?>;border-bottom:1px solid rgba(30,24,19,.06);transition:background 200ms ease;"
          >
            <div style="font-size:14px;color:var(--muted);">
              <?php echo $p_meta['date'] ? esc_html( date_i18n( 'd M Y', strtotime( $p_meta['date'] ) ) ) : '—'; ?>
            </div>
            <div>
              <div style="font-weight:600;color:var(--ink);margin-bottom:2px;"><?php the_title(); ?></div>
              <?php if ( $p_meta['place'] || $p_type ) : ?>
                <div style="font-size:13px;color:var(--muted);">
                  <?php if ( $p_type ) echo esc_html( $p_type ); ?>
                  <?php if ( $p_type && $p_meta['place'] ) echo ' · '; ?>
                  <?php if ( $p_meta['place'] ) echo esc_html( $p_meta['place'] ); ?>
                </div>
              <?php endif; ?>
            </div>
            <div style="font-size:13px;font-weight:600;color:var(--terracotta);white-space:nowrap;display:flex;align-items:center;gap:6px;">
              <?php esc_html_e( 'Voir', 'elite-atacora' ); ?>
              <?php echo ea_arrow_icon( 11 ); ?>
            </div>
          </a>
          <?php $past_index++; ?>
        <?php endwhile; wp_reset_postdata(); ?>
      </div>
    </div>
  </section>
  <?php endif; ?>

  <!-- CTA inscription newsletter -->
  <section class="ea-section" style="background:var(--forest);color:var(--cream);">
    <div class="ea-container" style="text-align:center;max-width:640px;margin-inline:auto;">
      <?php ea_eyebrow( __( 'Ne rien manquer', 'elite-atacora' ), 'honey' ); ?>
      <h2 style="font-family:var(--font-serif);font-size:clamp(28px,3.5vw,44px);line-height:1.1;color:var(--cream);margin-top:24px;margin-bottom:16px;">
        <?php esc_html_e( 'Soyez informé·e de nos prochains', 'elite-atacora' ); ?>
        <em style="font-style:italic;color:var(--honey);"><?php esc_html_e( 'événements.', 'elite-atacora' ); ?></em>
      </h2>
      <p style="color:rgba(250,245,234,.75);margin-bottom:32px;">
        <?php esc_html_e( 'Inscrivez-vous à notre newsletter pour recevoir les annonces avant tout le monde.', 'elite-atacora' ); ?>
      </p>
      <div style="display:flex;gap:12px;flex-wrap:wrap;justify-content:center;">
        <?php ea_pill_button( __( 'S\'inscrire à la newsletter', 'elite-atacora' ), home_url( '/actualites/#newsletter' ), 'onDark' ); ?>
        <?php ea_pill_button( __( 'Adhérer à l\'ONG', 'elite-atacora' ), ea_get_page_link( 'adherer' ), 'ghost' ); ?>
      </div>
    </div>
  </section>

</main>

<?php get_footer(); ?>
