<?php
/**
 * Template Name: Nos Actions
 * Template Post Type: page
 *
 * Page: /nos-actions/
 * Sections: Hero → Domaines d'action → Zones d'intervention → Galerie → Vidéos → CTA
 */
get_header();

/* ── Domaines d'action ────────────────────────────────────────────── */
$domaines = [
	[
		'icon'  => '🎓',
		'title' => __( 'Bourses scolaires', 'elite-atacora' ),
		'body'  => __( 'Attribution de bourses aux élèves les plus méritants et les plus vulnérables pour couvrir les frais de scolarité, de transport et de fournitures.', 'elite-atacora' ),
		'color' => 'forest',
		'stat'  => '3 200+',
		'unit'  => __( 'bénéficiaires', 'elite-atacora' ),
	],
	[
		'icon'  => '♀',
		'title' => __( 'Scolarisation des filles', 'elite-atacora' ),
		'body'  => __( 'Programme spécifique d\'accompagnement et de maintien des jeunes filles dans le système scolaire, avec suivi familial et mentorat.', 'elite-atacora' ),
		'color' => 'terracotta',
		'stat'  => '68%',
		'unit'  => __( 'de filles bénéficiaires', 'elite-atacora' ),
	],
	[
		'icon'  => '📚',
		'title' => __( 'Formation des enseignants', 'elite-atacora' ),
		'body'  => __( 'Modules de formation continue pour améliorer les pratiques pédagogiques et les compétences des enseignants du primaire et du secondaire.', 'elite-atacora' ),
		'color' => 'honey',
		'stat'  => '340',
		'unit'  => __( 'enseignants formés', 'elite-atacora' ),
	],
	[
		'icon'  => '🏫',
		'title' => __( 'Infrastructure scolaire', 'elite-atacora' ),
		'body'  => __( 'Construction et réhabilitation de salles de classe, de latrines séparées et de points d\'eau dans les écoles des zones rurales.', 'elite-atacora' ),
		'color' => 'forest',
		'stat'  => '12',
		'unit'  => __( 'établissements appuyés', 'elite-atacora' ),
	],
	[
		'icon'  => '🤝',
		'title' => __( 'Sensibilisation communautaire', 'elite-atacora' ),
		'body'  => __( 'Campagnes de mobilisation auprès des parents et chefs de communauté sur l\'importance de l\'éducation, notamment des filles.', 'elite-atacora' ),
		'color' => 'terracotta',
		'stat'  => '80+',
		'unit'  => __( 'villages sensibilisés', 'elite-atacora' ),
	],
	[
		'icon'  => '📊',
		'title' => __( 'Plaidoyer & recherche', 'elite-atacora' ),
		'body'  => __( 'Production de données, publications et participation aux instances de concertation pour influencer les politiques éducatives locales et nationales.', 'elite-atacora' ),
		'color' => 'honey',
		'stat'  => '8',
		'unit'  => __( 'rapports publiés', 'elite-atacora' ),
	],
];

/* ── Zones d'intervention ─────────────────────────────────────────── */
$zones = [
	[ 'commune' => 'Natitingou',  'desc' => __( 'Chef-lieu du département, siège de l\'ONG et zone principale d\'intervention.', 'elite-atacora' ), 'ecoles' => 4 ],
	[ 'commune' => 'Toucountouna', 'desc' => __( 'Zone rurale enclavée avec un fort taux d\'abandon scolaire chez les filles.', 'elite-atacora' ), 'ecoles' => 3 ],
	[ 'commune' => 'Boukoumbé',    'desc' => __( 'Commune frontalière avec le Togo, forte tradition communautaire favorable à la scolarisation.', 'elite-atacora' ), 'ecoles' => 2 ],
	[ 'commune' => 'Cobly',        'desc' => __( 'Zone d\'intervention prioritaire en raison du faible taux de scolarisation des filles.', 'elite-atacora' ), 'ecoles' => 2 ],
	[ 'commune' => 'Matéri',       'desc' => __( 'Commune du nord avec des défis d\'accès liés à l\'éloignement géographique.', 'elite-atacora' ), 'ecoles' => 2 ],
	[ 'commune' => 'Péhunco',      'desc' => __( 'Zone d\'expansion récente suite aux résultats du programme dans les autres communes.', 'elite-atacora' ), 'ecoles' => 1 ],
];

/* ── Photos de galerie (IDs de médias WordPress) ──────────────────── */
$gallery_ids = get_post_meta( get_the_ID(), 'ea_gallery_ids', true );
/* Fallback: use recent attachment IDs if meta not set */
if ( ! $gallery_ids ) {
	$attachments = get_posts( [
		'post_type'      => 'attachment',
		'post_mime_type' => 'image',
		'posts_per_page' => 9,
		'post_status'    => 'inherit',
	] );
	$gallery_ids = array_column( $attachments, 'ID' );
}

/* ── Vidéos (embed URLs) ──────────────────────────────────────────── */
$videos = [
	[
		'title'    => __( 'Remise des bourses 2024', 'elite-atacora' ),
		'duration' => '4:32',
		'embed'    => '', /* paste YouTube embed URL here */
		'thumb_id' => 0,
	],
	[
		'title'    => __( 'Témoignage — Aïssa, lauréate 2022', 'elite-atacora' ),
		'duration' => '2:18',
		'embed'    => '',
		'thumb_id' => 0,
	],
	[
		'title'    => __( 'Le programme en images — Rapport 2023', 'elite-atacora' ),
		'duration' => '7:05',
		'embed'    => '',
		'thumb_id' => 0,
	],
];
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
        <span><?php esc_html_e( 'Nos actions', 'elite-atacora' ); ?></span>
      </nav>
      <div class="ea-page-hero__grid ea-page-hero__grid--no-image">
        <div class="ea-page-hero__content">
          <?php ea_eyebrow( __( 'Sur le terrain', 'elite-atacora' ), 'terracotta' ); ?>
          <h1 class="ea-page-hero__heading" style="font-family:var(--font-serif);font-size:clamp(40px,6vw,80px);line-height:1.05;letter-spacing:-.02em;color:var(--ink);margin-top:24px;">
            <?php esc_html_e( 'Ce que nous', 'elite-atacora' ); ?>
            <em style="font-style:italic;color:var(--terracotta);"><?php esc_html_e( 'faisons.', 'elite-atacora' ); ?></em>
          </h1>
          <p class="ea-page-hero__subtitle">
            <?php esc_html_e( 'De la bourse scolaire à la formation des enseignants, nos programmes couvrent toute la chaîne de valeur éducative dans 6 communes de l\'Atacora.', 'elite-atacora' ); ?>
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- Domaines d'action -->
  <section class="ea-section">
    <div class="ea-container">
      <div class="ea-section-head" style="margin-bottom:64px;">
        <?php ea_eyebrow( __( 'Nos programmes', 'elite-atacora' ), 'forest' ); ?>
        <h2 style="font-family:var(--font-serif);font-size:clamp(32px,4vw,52px);line-height:1.05;color:var(--ink);margin-top:20px;">
          <?php esc_html_e( 'Domaines', 'elite-atacora' ); ?>
          <em style="font-style:italic;color:var(--forest);"><?php esc_html_e( 'd\'action.', 'elite-atacora' ); ?></em>
        </h2>
      </div>

      <div class="ea-domains-grid">
        <?php foreach ( $domaines as $i => $domain ) : ?>
          <div class="ea-domain-card ea-domain-card--<?php echo esc_attr( $domain['color'] ); ?> ea-reveal" style="--reveal-delay:<?php echo esc_attr( $i * 80 ); ?>ms;">
            <div class="ea-domain-card__icon" aria-hidden="true"><?php echo $domain['icon']; ?></div>
            <h3 class="ea-domain-card__title"><?php echo esc_html( $domain['title'] ); ?></h3>
            <p class="ea-domain-card__body"><?php echo esc_html( $domain['body'] ); ?></p>
            <div class="ea-domain-card__stat">
              <span class="ea-domain-card__stat-num"><?php echo esc_html( $domain['stat'] ); ?></span>
              <span class="ea-domain-card__stat-unit"><?php echo esc_html( $domain['unit'] ); ?></span>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- Zones d'intervention -->
  <section class="ea-section" style="background:var(--paper);">
    <div class="ea-container">
      <div class="ea-section-head-row" style="margin-bottom:64px;">
        <div>
          <?php ea_eyebrow( __( 'Géographie', 'elite-atacora' ), 'terracotta' ); ?>
          <h2 style="font-family:var(--font-serif);font-size:clamp(32px,4vw,52px);line-height:1.05;color:var(--ink);margin-top:20px;">
            <?php esc_html_e( 'Zones', 'elite-atacora' ); ?>
            <em style="font-style:italic;color:var(--terracotta);"><?php esc_html_e( 'd\'intervention.', 'elite-atacora' ); ?></em>
          </h2>
        </div>
      </div>

      <div class="ea-zones-grid">
        <?php foreach ( $zones as $i => $zone ) : ?>
          <div class="ea-zone-card ea-reveal" style="--reveal-delay:<?php echo esc_attr( $i * 80 ); ?>ms;">
            <div class="ea-zone-card__dot" aria-hidden="true"></div>
            <div>
              <h3 class="ea-zone-card__commune"><?php echo esc_html( $zone['commune'] ); ?></h3>
              <p class="ea-zone-card__desc"><?php echo esc_html( $zone['desc'] ); ?></p>
              <div class="ea-zone-card__stat">
                <span style="font-weight:700;color:var(--forest);"><?php echo esc_html( $zone['ecoles'] ); ?></span>
                <?php echo esc_html( _n( 'établissement soutenu', 'établissements soutenus', $zone['ecoles'], 'elite-atacora' ) ); ?>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- Galerie photos -->
  <?php if ( ! empty( $gallery_ids ) ) : ?>
  <section class="ea-section">
    <div class="ea-container">
      <div class="ea-section-head" style="margin-bottom:48px;">
        <?php ea_eyebrow( __( 'Galerie', 'elite-atacora' ), 'honey' ); ?>
        <h2 style="font-family:var(--font-serif);font-size:clamp(32px,4vw,52px);line-height:1.05;color:var(--ink);margin-top:20px;">
          <?php esc_html_e( 'Le terrain', 'elite-atacora' ); ?>
          <em style="font-style:italic;color:var(--honey);"><?php esc_html_e( 'en images.', 'elite-atacora' ); ?></em>
        </h2>
      </div>

      <div class="ea-gallery__grid" role="list">
        <?php foreach ( $gallery_ids as $img_id ) :
          $img_url  = wp_get_attachment_image_url( $img_id, 'ea-wide' );
          $img_full = wp_get_attachment_image_url( $img_id, 'full' );
          $img_alt  = get_post_meta( $img_id, '_wp_attachment_image_alt', true );
          if ( ! $img_url ) continue;
        ?>
          <button
            class="ea-gallery__item card-hover"
            role="listitem"
            data-lightbox="<?php echo esc_attr( $img_full ); ?>"
            data-caption="<?php echo esc_attr( $img_alt ); ?>"
            aria-label="<?php printf( esc_attr__( 'Agrandir : %s', 'elite-atacora' ), $img_alt ); ?>"
            style="padding:0;border:none;background:none;cursor:zoom-in;overflow:hidden;border-radius:16px;"
          >
            <img
              src="<?php echo esc_url( $img_url ); ?>"
              alt="<?php echo esc_attr( $img_alt ); ?>"
              loading="lazy"
              style="width:100%;height:100%;object-fit:cover;display:block;transition:transform 700ms ease;"
            >
          </button>
        <?php endforeach; ?>
      </div>

      <!-- Lightbox -->
      <div class="ea-lightbox" id="ea-lightbox" role="dialog" aria-modal="true" aria-label="<?php esc_attr_e( 'Visionneuse d\'images', 'elite-atacora' ); ?>" hidden>
        <button class="ea-lightbox__close" id="ea-lightbox-close" aria-label="<?php esc_attr_e( 'Fermer', 'elite-atacora' ); ?>">×</button>
        <figure class="ea-lightbox__figure">
          <img class="ea-lightbox__img" id="ea-lightbox-img" src="" alt="">
          <figcaption class="ea-lightbox__caption" id="ea-lightbox-caption"></figcaption>
        </figure>
      </div>
    </div>
  </section>
  <?php endif; ?>

  <!-- Vidéos -->
  <section class="ea-section" style="background:var(--ink);">
    <div class="ea-container">
      <div class="ea-section-head" style="margin-bottom:64px;">
        <?php ea_eyebrow( __( 'Vidéos', 'elite-atacora' ), 'honey' ); ?>
        <h2 style="font-family:var(--font-serif);font-size:clamp(32px,4vw,52px);line-height:1.05;color:var(--cream);margin-top:20px;">
          <?php esc_html_e( 'Nos', 'elite-atacora' ); ?>
          <em style="font-style:italic;color:var(--honey);"><?php esc_html_e( 'témoignages.', 'elite-atacora' ); ?></em>
        </h2>
      </div>

      <div class="ea-videos-grid">
        <?php foreach ( $videos as $i => $video ) : ?>
          <div class="ea-video-card ea-reveal" style="--reveal-delay:<?php echo esc_attr( $i * 100 ); ?>ms;">
            <?php if ( $video['embed'] ) : ?>
              <div class="ea-video-card__embed" style="position:relative;aspect-ratio:16/9;border-radius:16px;overflow:hidden;">
                <iframe
                  src="<?php echo esc_url( $video['embed'] ); ?>"
                  title="<?php echo esc_attr( $video['title'] ); ?>"
                  frameborder="0"
                  allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                  allowfullscreen
                  loading="lazy"
                  style="width:100%;height:100%;position:absolute;inset:0;"
                ></iframe>
              </div>
            <?php else : ?>
              <!-- Placeholder when no embed URL is set -->
              <div class="ea-video-card__placeholder" style="aspect-ratio:16/9;border-radius:16px;background:rgba(255,255,255,.05);display:flex;align-items:center;justify-content:center;border:1px dashed rgba(255,255,255,.15);">
                <div style="text-align:center;color:rgba(250,245,234,.5);">
                  <div style="font-size:40px;margin-bottom:8px;" aria-hidden="true">▶</div>
                  <div style="font-size:13px;"><?php esc_html_e( 'Vidéo à venir', 'elite-atacora' ); ?></div>
                </div>
              </div>
            <?php endif; ?>
            <div style="padding:20px 0 0;">
              <div style="font-size:12px;color:var(--honey);margin-bottom:8px;"><?php echo esc_html( $video['duration'] ); ?></div>
              <h3 style="font-size:17px;font-weight:600;color:var(--cream);margin:0;"><?php echo esc_html( $video['title'] ); ?></h3>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- CTA -->
  <section class="ea-section" style="background:var(--honey);">
    <div class="ea-container" style="text-align:center;max-width:720px;margin-inline:auto;">
      <?php ea_eyebrow( __( 'Agir ensemble', 'elite-atacora' ), 'forest' ); ?>
      <h2 style="font-family:var(--font-serif);font-size:clamp(32px,4vw,56px);line-height:1.05;color:var(--ink);margin-top:24px;margin-bottom:20px;">
        <?php esc_html_e( 'Soutenez', 'elite-atacora' ); ?>
        <em style="font-style:italic;color:var(--forest);"><?php esc_html_e( 'le programme.', 'elite-atacora' ); ?></em>
      </h2>
      <p style="color:var(--coffee);margin-bottom:36px;font-size:18px;">
        <?php esc_html_e( 'Votre soutien finance directement les bourses, la formation des enseignants et les actions de terrain.', 'elite-atacora' ); ?>
      </p>
      <div style="display:flex;gap:12px;flex-wrap:wrap;justify-content:center;">
        <?php ea_pill_button( __( 'Adhérer à l\'ONG', 'elite-atacora' ), ea_get_page_link( 'adherer' ), 'primary' ); ?>
        <?php ea_pill_button( __( 'Nous contacter', 'elite-atacora' ), ea_get_page_link( 'contact' ), 'outline' ); ?>
      </div>
    </div>
  </section>

</main>

<?php get_footer(); ?>
