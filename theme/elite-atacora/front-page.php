<?php
/**
 * Homepage — front-page.php
 * Sections: Hero, Chiffres Clés, Mission + Valeurs, Actualités, Événements, CTA Adhérer
 */
get_header();
?>

<!-- ══════════════════════════════════════════════════════════
     HERO
══════════════════════════════════════════════════════════ -->
<section class="ea-section" id="hero" style="padding-top:32px;padding-bottom:0;position:relative;overflow:hidden;">
  <div aria-hidden="true" style="position:absolute;top:-128px;right:-128px;width:440px;height:440px;border-radius:50%;background:rgba(233,180,76,.2);filter:blur(80px);pointer-events:none;"></div>
  <div aria-hidden="true" style="position:absolute;top:33%;left:-128px;width:360px;height:360px;border-radius:50%;background:rgba(194,84,42,.15);filter:blur(80px);pointer-events:none;"></div>

  <div class="ea-container" style="display:grid;grid-template-columns:1fr;gap:40px;position:relative;">
    <!-- Text column -->
    <div style="padding-top:24px;">
      <?php ea_eyebrow( __( 'ONG · République du Bénin · Atacora', 'elite-atacora' ), 'forest' ); ?>

      <h1 style="font-family:var(--font-serif);font-size:clamp(52px,9vw,104px);line-height:.98;letter-spacing:-.02em;color:var(--ink);margin-top:24px;">
        <?php esc_html_e( 'Pour les', 'elite-atacora' ); ?>
        <em style="font-style:italic;color:var(--terracotta);display:block;"><?php esc_html_e( 'femmes,', 'elite-atacora' ); ?></em>
        <?php esc_html_e( 'pour les', 'elite-atacora' ); ?>
        <em style="font-style:italic;color:var(--terracotta);display:block;"><?php esc_html_e( 'enfants,', 'elite-atacora' ); ?></em>
        <?php esc_html_e( "pour l'Atacora.", 'elite-atacora' ); ?>
      </h1>

      <p style="margin-top:32px;font-size:clamp(16px,2vw,19px);line-height:1.7;color:var(--coffee);max-width:600px;">
        <?php esc_html_e( "Depuis 2018, nous marchons aux côtés des femmes, des enfants et des communautés rurales de l'Atacora.", 'elite-atacora' ); ?>
        <span class="underline-honey"><?php esc_html_e( 'Éducation, autonomisation, résilience climatique', 'elite-atacora' ); ?></span>
        <?php esc_html_e( '— alignés sur les ODD 4 et ODD 5 des Nations Unies.', 'elite-atacora' ); ?>
      </p>

      <div style="margin-top:40px;display:flex;flex-wrap:wrap;align-items:center;gap:16px;">
        <?php ea_pill_button( __( "Découvrir l'ONG", 'elite-atacora' ), ea_get_page_link( 'a-propos' ), 'primary' ); ?>
        <?php ea_pill_button( __( 'Nous rejoindre', 'elite-atacora' ), ea_get_page_link( 'adherer' ), 'outline' ); ?>
        <a href="<?php echo esc_url( ea_get_page_link( 'nos-actions' ) ); ?>"
           style="margin-left:8px;font-size:14px;color:var(--coffee);text-decoration:underline;text-decoration-color:var(--honey);text-underline-offset:4px;text-decoration-thickness:2px;transition:color .2s;">
          <?php esc_html_e( 'Voir nos actions terrain →', 'elite-atacora' ); ?>
        </a>
      </div>

      <!-- Info strip -->
      <div style="margin-top:56px;display:inline-flex;flex-wrap:wrap;align-items:stretch;background:rgba(255,255,255,.7);backdrop-filter:blur(8px);border-radius:24px;padding:8px;box-shadow:0 0 0 1px rgba(30,24,19,.08),0 20px 50px -30px rgba(30,24,19,.2);">
        <?php
        $infos = [
          [ __( 'Fondée le', 'elite-atacora' ),   __( '8 janvier 2018', 'elite-atacora' ) ],
          [ __( 'Statut',    'elite-atacora' ),   __( 'ONG apolitique', 'elite-atacora' ) ],
          [ __( 'Cadre légal', 'elite-atacora' ), __( 'Loi 2025-19 · RB', 'elite-atacora' ) ],
        ];
        foreach ( $infos as $i => $info ) :
        ?>
          <div style="padding:8px 20px;<?php echo $i < count( $infos ) - 1 ? 'border-right:1px solid rgba(30,24,19,.08);' : ''; ?>">
            <div style="font-size:10px;text-transform:uppercase;letter-spacing:.15em;color:var(--muted);"><?php echo esc_html( $info[0] ); ?></div>
            <div style="font-size:14px;font-weight:600;color:var(--ink);margin-top:4px;"><?php echo esc_html( $info[1] ); ?></div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>

    <!-- Photo column -->
    <div style="position:relative;padding-top:16px;">
      <?php
      $hero_img_id = get_theme_mod( 'ea_hero_image', 0 );
      ?>
      <div style="position:relative;">
        <div style="aspect-ratio:3/4;border-top-left-radius:9999px;border-top-right-radius:9999px;border-bottom-left-radius:24px;border-bottom-right-radius:24px;overflow:hidden;box-shadow:var(--shadow-ring);">
          <?php if ( $hero_img_id ) : ?>
            <?php echo wp_get_attachment_image( $hero_img_id, 'ea-hero', false, [ 'alt' => esc_attr__( "Membres de l'ONG en réunion", 'elite-atacora' ), 'style' => 'width:100%;height:100%;object-fit:cover;' ] ); ?>
          <?php else : ?>
            <div style="width:100%;height:100%;background:var(--paper);display:grid;place-items:center;">
              <div style="text-align:center;color:var(--muted);font-size:13px;padding:24px;">
                <?php esc_html_e( 'Définir une photo hero dans Apparence → Personnaliser', 'elite-atacora' ); ?>
              </div>
            </div>
          <?php endif; ?>
          <div style="position:absolute;inset:0;background:linear-gradient(to top,rgba(30,24,19,.4),transparent 60%);"></div>
          <div style="position:absolute;bottom:20px;left:20px;right:20px;color:var(--cream);">
            <div style="font-size:10px;text-transform:uppercase;letter-spacing:.15em;opacity:.8;"><?php esc_html_e( 'Assemblée Générale 2025', 'elite-atacora' ); ?></div>
            <div style="font-family:var(--font-serif);font-size:15px;margin-top:4px;">"<?php esc_html_e( 'Notre force, c\'est notre communauté.', 'elite-atacora' ); ?>"</div>
          </div>
        </div>

        <!-- Floating deco circle -->
        <svg aria-hidden="true" class="floaty" style="position:absolute;bottom:-32px;left:-48px;width:176px;height:176px;color:rgba(233,180,76,.6);" viewBox="0 0 200 200" fill="none">
          <circle cx="100" cy="100" r="90" stroke="currentColor" stroke-width="2" stroke-dasharray="4 8"/>
        </svg>

        <!-- Floating impact badge -->
        <div style="position:absolute;top:-12px;right:-12px;background:var(--cream);border-radius:16px;padding:16px 20px;box-shadow:0 0 0 1px rgba(30,24,19,.08),0 15px 30px -15px rgba(30,24,19,.3);transform:rotate(2deg);">
          <div style="font-size:10px;text-transform:uppercase;letter-spacing:.15em;color:var(--terracotta);font-weight:600;"><?php esc_html_e( 'Impact 2025', 'elite-atacora' ); ?></div>
          <div style="font-family:var(--font-serif);font-size:30px;color:var(--ink);margin-top:4px;line-height:1;">+ 3&nbsp;200</div>
          <div style="font-size:11px;color:var(--muted);margin-top:4px;"><?php esc_html_e( 'bénéficiaires directs', 'elite-atacora' ); ?></div>
        </div>

        <!-- ODD badge -->
        <div style="position:absolute;left:-8px;top:33%;background:var(--forest);color:var(--cream);border-radius:16px;padding:12px 16px;transform:rotate(-3deg);box-shadow:0 15px 30px -15px rgba(30,86,49,.6);">
          <div style="font-size:10px;text-transform:uppercase;letter-spacing:.15em;color:var(--honey);">ODD</div>
          <div style="font-family:var(--font-serif);font-size:18px;margin-top:4px;line-height:1;">4 · 5</div>
        </div>
      </div>
    </div>
  </div>

  <!-- Ticker -->
  <div class="ea-ticker" style="margin-top:96px;">
    <div class="ea-ticker__label">
      <span class="ea-ticker__dot"></span>
      <?php esc_html_e( 'En cours', 'elite-atacora' ); ?>
    </div>
    <div class="ea-ticker__track" aria-hidden="true">
      <div class="ea-ticker__inner">
        <?php
        $ticks = [
          __( 'Assemblée Générale 2026 · Natitingou · 28 juin', 'elite-atacora' ),
          __( 'Atelier ODD 4 & 5 · Tanguiéta · 14 juillet', 'elite-atacora' ),
          __( 'Recrutement bénévoles · programme AFR-1', 'elite-atacora' ),
          __( "Rapport d'activité 2025 disponible", 'elite-atacora' ),
          __( 'Adhésions ouvertes · 5 000 FCFA', 'elite-atacora' ),
          __( 'Caravane VBG · 22 août · Boukombé', 'elite-atacora' ),
        ];
        for ( $k = 0; $k < 2; $k++ ) {
          foreach ( $ticks as $tick ) {
            echo '<span>' . esc_html( $tick ) . '</span>';
            echo '<span class="ea-ticker__sep" aria-hidden="true">✦</span>';
          }
        }
        ?>
      </div>
    </div>
  </div>
</section>
<!-- /HERO -->


<!-- ══════════════════════════════════════════════════════════
     CHIFFRES CLÉS
══════════════════════════════════════════════════════════ -->
<section class="ea-section ea-figures">
  <div class="ea-container">
    <div class="ea-figures-head" style="margin-bottom:64px;">
      <div>
        <?php ea_eyebrow( __( 'L\'ONG en chiffres', 'elite-atacora' ), 'terracotta' ); ?>
        <h2 style="font-family:var(--font-serif);font-size:clamp(38px,5vw,58px);line-height:1.02;color:var(--ink);letter-spacing:-.02em;margin-top:20px;">
          <?php esc_html_e( 'Sept années d\'', 'elite-atacora' ); ?><em style="font-style:italic;color:var(--terracotta);"><?php esc_html_e( 'engagement', 'elite-atacora' ); ?></em>
          <?php esc_html_e( 'auprès de l\'Atacora.', 'elite-atacora' ); ?>
        </h2>
      </div>
      <div style="padding-top:48px;">
        <p style="font-size:16px;line-height:1.7;color:var(--coffee);">
          <?php esc_html_e( 'Des chiffres consolidés à partir des rapports validés par notre Bureau Exécutif et notre Commission de Contrôle. Mise à jour mensuelle.', 'elite-atacora' ); ?>
        </p>
      </div>
    </div>

    <div class="ea-figures__grid">
      <?php
      $stats = [
        [ 'value' => 2018, 'suffix' => '',  'label' => __( 'Année de fondation', 'elite-atacora' ),    'note' => __( 'Godomey Togoudo', 'elite-atacora' ),       'mod' => 1 ],
        [ 'value' => 24,   'suffix' => '+', 'label' => __( 'Projets menés', 'elite-atacora' ),          'note' => __( 'depuis la création', 'elite-atacora' ),    'mod' => 2 ],
        [ 'value' => 6,    'suffix' => '',  'label' => __( 'Communes couvertes', 'elite-atacora' ),      'note' => __( 'département Atacora', 'elite-atacora' ),   'mod' => 3 ],
        [ 'value' => 3200, 'suffix' => '+', 'label' => __( 'Bénéficiaires directs', 'elite-atacora' ),  'note' => __( 'femmes & enfants', 'elite-atacora' ),       'mod' => 4 ],
      ];
      foreach ( $stats as $s ) :
      ?>
        <div class="ea-figure-card ea-figure-card--<?php echo esc_attr( $s['mod'] ); ?> card-hover">
          <div class="ea-figure-card__num">N°<?php echo str_pad( $s['mod'], 2, '0', STR_PAD_LEFT ); ?></div>
          <div class="ea-figure-card__value">
            <?php ea_counter( $s['value'], $s['suffix'] ); ?>
          </div>
          <div class="ea-figure-card__label"><?php echo esc_html( $s['label'] ); ?></div>
          <div class="ea-figure-card__note"><?php echo esc_html( $s['note'] ); ?></div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<!-- /CHIFFRES CLÉS -->


<!-- ══════════════════════════════════════════════════════════
     MISSION + VALEURS
══════════════════════════════════════════════════════════ -->
<section class="ea-mission">
  <!-- Deco circles -->
  <svg aria-hidden="true" class="ea-mission__deco" viewBox="0 0 200 200" fill="none" style="color:rgba(233,180,76,.4);">
    <circle cx="100" cy="100" r="90" stroke="currentColor" stroke-width="2" stroke-dasharray="4 8"/>
    <circle cx="100" cy="100" r="60" stroke="currentColor" stroke-width="2"/>
  </svg>

  <div class="ea-container" style="position:relative;">
    <div class="ea-mission-grid">
      <!-- Mission text -->
      <div>
        <?php ea_eyebrow( __( 'Notre mission', 'elite-atacora' ), 'forest' ); ?>
        <h2 class="ea-mission__heading">
          <?php esc_html_e( 'Marcher aux côtés des', 'elite-atacora' ); ?>
          <em><?php esc_html_e( 'femmes,', 'elite-atacora' ); ?></em><br>
          <?php esc_html_e( 'former les', 'elite-atacora' ); ?>
          <em style="color:var(--terracotta);"><?php esc_html_e( 'enfants,', 'elite-atacora' ); ?></em><br>
          <?php esc_html_e( 'faire grandir les', 'elite-atacora' ); ?>
          <em><?php esc_html_e( 'communautés.', 'elite-atacora' ); ?></em>
        </h2>

        <div class="ea-mission__bar-row">
          <div class="ea-mission__bar"></div>
          <p class="ea-mission__body">
            <?php esc_html_e( "Contribuer au développement des communautés rurales de l'Atacora et à la réduction de la pauvreté. Nos programmes se concentrent sur l'éducation des enfants vulnérables et l'autonomisation des femmes, en accord avec les ODD 4 et ODD 5.", 'elite-atacora' ); ?>
          </p>
        </div>

        <div style="margin-top:40px;display:flex;flex-wrap:wrap;gap:12px;">
          <?php ea_pill_button( __( 'Lire nos statuts', 'elite-atacora' ), ea_get_page_link( 'a-propos' ), 'secondary' ); ?>
          <?php ea_pill_button( __( 'Notre gouvernance', 'elite-atacora' ), ea_get_page_link( 'gouvernance' ), 'ghost' ); ?>
        </div>
      </div>

      <!-- Values -->
      <div>
        <?php ea_eyebrow( __( 'Nos cinq valeurs · Article 6', 'elite-atacora' ), 'terracotta' ); ?>
        <ul style="margin-top:24px;display:flex;flex-direction:column;gap:16px;list-style:none;padding:0;">
          <?php
          $values = [
            [ 'emoji' => '✦', 'title' => __( 'Excellence', 'elite-atacora' ),        'body' => __( 'Exigence et résultats mesurés sur le terrain.', 'elite-atacora' ) ],
            [ 'emoji' => '◈', 'title' => __( 'Professionnalisme', 'elite-atacora' ), 'body' => __( 'Méthode rigoureuse dans chaque programme.', 'elite-atacora' ) ],
            [ 'emoji' => '✺', 'title' => __( 'Transparence', 'elite-atacora' ),      'body' => __( 'Gouvernance ouverte, comptes publics.', 'elite-atacora' ) ],
            [ 'emoji' => '❀', 'title' => __( "Esprit d'équipe", 'elite-atacora' ),   'body' => __( 'Décisions collégiales, terrain partagé.', 'elite-atacora' ) ],
            [ 'emoji' => '❖', 'title' => __( 'Intégrité', 'elite-atacora' ),         'body' => __( 'Honnêteté envers chaque partenaire.', 'elite-atacora' ) ],
          ];
          foreach ( $values as $i => $v ) :
          ?>
            <li class="ea-value-card card-hover">
              <div class="ea-value-card__icon"><?php echo esc_html( $v['emoji'] ); ?></div>
              <div style="flex:1;">
                <div style="display:flex;align-items:baseline;gap:12px;">
                  <span class="ea-value-card__title"><?php echo esc_html( $v['title'] ); ?></span>
                  <span class="ea-value-card__counter">— <?php echo str_pad( $i + 1, 2, '0', STR_PAD_LEFT ); ?> / 05</span>
                </div>
                <p class="ea-value-card__body"><?php echo esc_html( $v['body'] ); ?></p>
              </div>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>
  </div>
</section>
<!-- /MISSION + VALEURS -->


<!-- ══════════════════════════════════════════════════════════
     ACTUALITÉS
══════════════════════════════════════════════════════════ -->
<section class="ea-section ea-news" id="actualites">
  <div class="ea-container">
    <div class="ea-section-head-row">
      <div class="ea-section-head" style="margin-bottom:0;">
        <?php ea_eyebrow( __( 'Nos actualités', 'elite-atacora' ), 'forest' ); ?>
        <h2>
          <?php esc_html_e( 'Les histoires', 'elite-atacora' ); ?>
          <em><?php esc_html_e( 'qui nous animent.', 'elite-atacora' ); ?></em>
        </h2>
      </div>
      <a href="<?php echo esc_url( home_url( '/actualites/' ) ); ?>"
         style="display:inline-flex;align-items:center;gap:12px;font-size:14px;font-weight:600;color:var(--ink);text-decoration:none;transition:color .2s;white-space:nowrap;"
         onmouseover="this.style.color='var(--forest)'" onmouseout="this.style.color='var(--ink)'">
        <span style="border-bottom:1px solid rgba(30,24,19,.3);padding-bottom:2px;"><?php esc_html_e( 'Toutes les actualités', 'elite-atacora' ); ?></span>
        <span style="width:40px;height:40px;border-radius:50%;background:var(--ink);color:var(--cream);display:grid;place-items:center;"><?php echo ea_arrow_icon( 13 ); ?></span>
      </a>
    </div>

    <?php
    $news_query = new WP_Query( [
      'post_type'      => 'post',
      'posts_per_page' => 3,
      'post_status'    => 'publish',
      'orderby'        => 'date',
      'order'          => 'DESC',
    ] );

    if ( $news_query->have_posts() ) :
    ?>
      <div class="ea-news__grid">
        <?php while ( $news_query->have_posts() ) : $news_query->the_post(); ?>
          <?php get_template_part( 'template-parts/news-card', null, [ 'post_id' => get_the_ID() ] ); ?>
        <?php endwhile; wp_reset_postdata(); ?>
      </div>
    <?php else : ?>
      <p style="text-align:center;color:var(--muted);padding:48px 0;"><?php esc_html_e( 'Aucune actualité pour le moment.', 'elite-atacora' ); ?></p>
    <?php endif; ?>
  </div>
</section>
<!-- /ACTUALITÉS -->


<!-- ══════════════════════════════════════════════════════════
     ÉVÉNEMENTS
══════════════════════════════════════════════════════════ -->
<section class="ea-events-section" id="evenements">
  <!-- Deco -->
  <svg aria-hidden="true" class="ea-events-section__deco" viewBox="0 0 200 200" fill="none">
    <circle cx="100" cy="100" r="90" stroke="currentColor" stroke-width="2"/>
    <circle cx="100" cy="100" r="60" stroke="currentColor" stroke-width="2" stroke-dasharray="3 6"/>
    <circle cx="100" cy="100" r="30" stroke="currentColor" stroke-width="2"/>
  </svg>

  <div class="ea-container" style="position:relative;">
    <div class="ea-section-head-row" style="margin-bottom:56px;">
      <div class="ea-section-head" style="margin-bottom:0;">
        <?php ea_eyebrow( __( 'Agenda · prochains rendez-vous', 'elite-atacora' ), 'cream' ); ?>
        <h2 style="color:var(--cream);">
          <?php esc_html_e( 'Venez nous', 'elite-atacora' ); ?>
          <em style="color:var(--honey);"><?php esc_html_e( 'rencontrer.', 'elite-atacora' ); ?></em>
        </h2>
      </div>
      <a href="<?php echo esc_url( ea_get_page_link( 'evenements' ) ); ?>"
         style="display:inline-flex;align-items:center;gap:12px;font-size:14px;font-weight:600;color:var(--cream);text-decoration:none;white-space:nowrap;">
        <span style="border-bottom:1px solid rgba(250,245,234,.4);padding-bottom:2px;"><?php esc_html_e( 'Calendrier complet', 'elite-atacora' ); ?></span>
        <span style="width:40px;height:40px;border-radius:50%;background:var(--honey);color:var(--ink);display:grid;place-items:center;"><?php echo ea_arrow_icon( 13 ); ?></span>
      </a>
    </div>

    <?php
    $today      = date( 'Ymd' );
    $events_q   = new WP_Query( [
      'post_type'      => 'ea_event',
      'posts_per_page' => 3,
      'post_status'    => 'publish',
      'meta_key'       => 'ea_event_date',
      'orderby'        => 'meta_value',
      'order'          => 'ASC',
      'meta_query'     => [
        [
          'key'     => 'ea_event_date',
          'value'   => $today,
          'compare' => '>=',
          'type'    => 'DATE',
        ],
      ],
    ] );

    $featured_id = 0;
    $rest_ids    = [];

    if ( $events_q->have_posts() ) {
      while ( $events_q->have_posts() ) {
        $events_q->the_post();
        $meta = ea_get_event_meta( get_the_ID() );
        if ( ! $featured_id && $meta['featured'] ) {
          $featured_id = get_the_ID();
        } else {
          $rest_ids[] = get_the_ID();
        }
      }
      wp_reset_postdata();
      // If no explicit featured, take first
      if ( ! $featured_id ) {
        $events_q->rewind_posts();
        $events_q->the_post();
        $featured_id = get_the_ID();
        wp_reset_postdata();
        $rest_ids = array_diff( $rest_ids, [ $featured_id ] );
      }
    }

    if ( $featured_id ) :
      $f_meta  = ea_get_event_meta( $featured_id );
      $f_ts    = $f_meta['date'] ? strtotime( $f_meta['date'] ) : false;
      $f_day   = $f_ts ? date_i18n( 'd', $f_ts ) : '—';
      $f_month = $f_ts ? date_i18n( 'M', $f_ts ) : '—';
      $f_year  = $f_ts ? date_i18n( 'Y', $f_ts ) : '';
    ?>
    <div class="ea-events-grid">
      <!-- Featured event -->
      <article class="ea-event-featured">
        <div class="ea-event-featured__img">
          <?php if ( has_post_thumbnail( $featured_id ) ) : ?>
            <?php echo get_the_post_thumbnail( $featured_id, 'ea-card', [ 'alt' => esc_attr( get_the_title( $featured_id ) ) ] ); ?>
          <?php endif; ?>
          <div class="ea-event-featured__img-overlay"></div>
          <span class="ea-event-featured__badge"><?php esc_html_e( 'À la une', 'elite-atacora' ); ?></span>
        </div>
        <div class="ea-event-featured__content">
          <div class="ea-event-featured__meta">
            <div class="ea-event-date-badge">
              <div class="ea-event-date-badge__day tabular"><?php echo esc_html( $f_day ); ?></div>
              <div class="ea-event-date-badge__month"><?php echo esc_html( $f_month ); ?></div>
            </div>
            <div>
              <div class="ea-event-featured__type"><?php echo esc_html( $f_meta['type'] ); ?></div>
              <div class="ea-event-featured__time"><?php echo esc_html( $f_meta['time'] ); ?></div>
            </div>
          </div>
          <h3 class="ea-event-featured__title"><?php echo esc_html( get_the_title( $featured_id ) ); ?></h3>
          <p class="ea-event-featured__place"><?php echo esc_html( $f_meta['place'] ); ?></p>
          <div class="ea-event-featured__cta">
            <?php ea_pill_button( __( 'Réserver ma place', 'elite-atacora' ), get_permalink( $featured_id ), 'honey' ); ?>
          </div>
        </div>
      </article>

      <!-- Other events -->
      <div style="display:flex;flex-direction:column;gap:28px;">
        <?php foreach ( array_slice( $rest_ids, 0, 2 ) as $eid ) :
          $e_meta  = ea_get_event_meta( $eid );
          $e_ts    = $e_meta['date'] ? strtotime( $e_meta['date'] ) : false;
          $e_day   = $e_ts ? date_i18n( 'd', $e_ts ) : '—';
          $e_month = $e_ts ? date_i18n( 'M.', $e_ts ) : '—';
        ?>
          <article class="ea-event-card card-hover">
            <div class="ea-event-card__date">
              <div class="ea-event-card__date-day tabular"><?php echo esc_html( $e_day ); ?></div>
              <div class="ea-event-card__date-month"><?php echo esc_html( $e_month ); ?></div>
            </div>
            <div style="flex:1;">
              <div style="display:flex;align-items:center;gap:8px;">
                <span class="ea-event-card__type"><?php echo esc_html( $e_meta['type'] ); ?></span>
                <span style="color:rgba(250,245,234,.4);">·</span>
                <span class="ea-event-card__time"><?php echo esc_html( $e_meta['time'] ); ?></span>
              </div>
              <h3 class="ea-event-card__title"><?php echo esc_html( get_the_title( $eid ) ); ?></h3>
              <p class="ea-event-card__place"><?php echo esc_html( $e_meta['place'] ); ?></p>
            </div>
          </article>
        <?php endforeach; ?>

        <?php if ( empty( $rest_ids ) && ! $featured_id ) : ?>
          <p style="color:rgba(250,245,234,.7);font-size:14px;"><?php esc_html_e( 'Aucun événement à venir.', 'elite-atacora' ); ?></p>
        <?php endif; ?>
      </div>
    </div>

    <?php else : ?>
      <p style="text-align:center;color:rgba(250,245,234,.7);padding:48px 0;"><?php esc_html_e( 'Aucun événement à venir.', 'elite-atacora' ); ?></p>
    <?php endif; ?>
  </div>
</section>
<!-- /ÉVÉNEMENTS -->


<!-- ══════════════════════════════════════════════════════════
     CTA ADHÉRER
══════════════════════════════════════════════════════════ -->
<section class="ea-section ea-join" id="adherer">
  <div class="ea-container">
    <div class="ea-join__box">
      <!-- Deco -->
      <svg aria-hidden="true" class="ea-join__deco" viewBox="0 0 200 200" fill="none" style="color:var(--terracotta);">
        <circle cx="100" cy="100" r="90" stroke="currentColor" stroke-width="2"/>
        <circle cx="100" cy="100" r="60" stroke="currentColor" stroke-width="2"/>
        <circle cx="100" cy="100" r="30" stroke="currentColor" stroke-width="2"/>
      </svg>

      <div class="ea-join-grid" style="position:relative;">
        <div class="ea-join__content">
          <?php ea_eyebrow( __( "Rejoindre l'ONG", 'elite-atacora' ), 'terracotta' ); ?>
          <h2 class="ea-join__heading">
            <?php esc_html_e( 'Et si vous deveniez membre de la', 'elite-atacora' ); ?>
            <em><?php esc_html_e( 'communauté', 'elite-atacora' ); ?></em>
            <?php esc_html_e( '?', 'elite-atacora' ); ?>
          </h2>
          <p class="ea-join__lead">
            <?php esc_html_e( "Quatre catégories d'adhésion · droits 5 000 FCFA · cotisation 2 000 FCFA / mois. Soumettez votre candidature en ligne, le Bureau Exécutif vous répond sous 7 jours.", 'elite-atacora' ); ?>
          </p>
          <div class="ea-join__actions">
            <?php ea_pill_button( __( 'Postuler maintenant', 'elite-atacora' ), ea_get_page_link( 'adherer' ), 'primary' ); ?>
            <?php ea_pill_button( __( 'Nous écrire', 'elite-atacora' ), ea_get_page_link( 'contact' ), 'outline' ); ?>
          </div>
        </div>

        <div class="ea-join__steps">
          <div class="ea-join__steps-label"><?php esc_html_e( 'Processus en 4 étapes', 'elite-atacora' ); ?></div>
          <ol class="ea-join__steps-list">
            <?php
            $steps = [
              __( 'Remplir le formulaire en ligne', 'elite-atacora' ),
              __( "Recevoir l'avis du Bureau Exécutif", 'elite-atacora' ),
              __( "Régler les droits en agence", 'elite-atacora' ),
              __( 'Recevoir sa carte de membre', 'elite-atacora' ),
            ];
            foreach ( $steps as $i => $step ) :
            ?>
              <li class="ea-join__step">
                <span class="ea-join__step-n"><?php echo esc_html( $i + 1 ); ?></span>
                <span class="ea-join__step-text"><?php echo esc_html( $step ); ?></span>
              </li>
            <?php endforeach; ?>
          </ol>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /CTA ADHÉRER -->

<?php get_footer(); ?>
