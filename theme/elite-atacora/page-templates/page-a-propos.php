<?php
/**
 * Template Name: À propos
 * Template Post Type: page
 *
 * Page: /a-propos/
 * Sections: Hero → Timeline → Mission & Vision → Objectifs → Valeurs → Signification du logo → CTA
 */
get_header();

/* ── Timeline ─────────────────────────────────────────────────────── */
$timeline = [
	[ 'year' => '2017', 'label' => __( 'Fondation', 'elite-atacora' ),          'body' => __( 'Création d\'Elite Atacora par un groupe de jeunes militants de l\'éducation dans l\'Atacora.', 'elite-atacora' ) ],
	[ 'year' => '2018', 'label' => __( 'Enregistrement légal', 'elite-atacora' ), 'body' => __( 'Obtention du récépissé officiel auprès du Ministère de l\'Intérieur du Bénin.', 'elite-atacora' ) ],
	[ 'year' => '2019', 'label' => __( 'Premier programme', 'elite-atacora' ),    'body' => __( 'Lancement du programme de bourses scolaires pour 120 élèves dans 6 communes.', 'elite-atacora' ) ],
	[ 'year' => '2021', 'label' => __( 'Partenariat UNICEF', 'elite-atacora' ),   'body' => __( 'Signature d\'un accord cadre avec l\'UNICEF Bénin pour la promotion de l\'éducation des filles.', 'elite-atacora' ) ],
	[ 'year' => '2023', 'label' => __( 'Expansion régionale', 'elite-atacora' ),  'body' => __( 'Élargissement des activités aux départements voisins de la Donga et du Borgou.', 'elite-atacora' ) ],
	[ 'year' => '2024', 'label' => __( 'Cap des 3 200', 'elite-atacora' ),         'body' => __( 'Le programme franchit le cap de 3 200 bénéficiaires directs depuis sa création.', 'elite-atacora' ) ],
];

/* ── Objectifs ────────────────────────────────────────────────────── */
$objectifs = [
	[
		'icon'  => '🎓',
		'title' => __( 'Accès à l\'éducation', 'elite-atacora' ),
		'body'  => __( 'Garantir un accès équitable à une éducation de qualité pour tous les enfants de l\'Atacora, sans distinction de genre ou de milieu social.', 'elite-atacora' ),
		'color' => 'forest',
	],
	[
		'icon'  => '♀',
		'title' => __( 'Égalité des genres', 'elite-atacora' ),
		'body'  => __( 'Réduire les inégalités scolaires entre filles et garçons en soutenant spécifiquement la scolarisation des jeunes filles.', 'elite-atacora' ),
		'color' => 'terracotta',
	],
	[
		'icon'  => '📚',
		'title' => __( 'Qualité pédagogique', 'elite-atacora' ),
		'body'  => __( 'Améliorer les conditions d\'apprentissage par la formation des enseignants et la dotation en matériels didactiques.', 'elite-atacora' ),
		'color' => 'honey',
	],
	[
		'icon'  => '🤝',
		'title' => __( 'Partenariats durables', 'elite-atacora' ),
		'body'  => __( 'Tisser des alliances stratégiques avec les collectivités, l\'État et les organismes internationaux pour pérenniser nos actions.', 'elite-atacora' ),
		'color' => 'forest',
	],
	[
		'icon'  => '🌍',
		'title' => __( 'ODD 4 & 5', 'elite-atacora' ),
		'body'  => __( 'Contribuer directement aux Objectifs de Développement Durable relatifs à l\'éducation de qualité et à l\'égalité des genres.', 'elite-atacora' ),
		'color' => 'terracotta',
	],
	[
		'icon'  => '🏘',
		'title' => __( 'Ancrage communautaire', 'elite-atacora' ),
		'body'  => __( 'Impliquer les communautés locales dans la conception et le suivi des programmes pour en garantir la pertinence et l\'appropriation.', 'elite-atacora' ),
		'color' => 'honey',
	],
];

/* ── Valeurs ──────────────────────────────────────────────────────── */
$valeurs = [
	[ 'letter' => 'E', 'word' => __( 'Équité', 'elite-atacora' ),       'body' => __( 'Chaque enfant mérite les mêmes chances, quelles que soient son origine ou sa situation économique.', 'elite-atacora' ), 'color' => '--forest' ],
	[ 'letter' => 'L', 'word' => __( 'Leadership', 'elite-atacora' ),   'body' => __( 'Nous formons les leaders de demain en développant leur confiance en eux et leur sens des responsabilités.', 'elite-atacora' ), 'color' => '--terracotta' ],
	[ 'letter' => 'I', 'word' => __( 'Intégrité', 'elite-atacora' ),    'body' => __( 'Transparence et honnêteté guident chacune de nos actions envers nos bénéficiaires et partenaires.', 'elite-atacora' ), 'color' => '--honey' ],
	[ 'letter' => 'T', 'word' => __( 'Témoignage', 'elite-atacora' ),   'body' => __( 'Nous documentons et partageons les histoires de transformation pour inspirer et mobiliser.', 'elite-atacora' ), 'color' => '--forest' ],
	[ 'letter' => 'E', 'word' => __( 'Excellence', 'elite-atacora' ),   'body' => __( 'Nous visons le plus haut standard dans la mise en œuvre de nos programmes éducatifs.', 'elite-atacora' ), 'color' => '--terracotta' ],
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
        <span><?php esc_html_e( 'À propos', 'elite-atacora' ); ?></span>
      </nav>
      <div class="ea-page-hero__grid ea-page-hero__grid--no-image">
        <div class="ea-page-hero__content">
          <?php ea_eyebrow( __( 'Notre histoire', 'elite-atacora' ), 'terracotta' ); ?>
          <h1 class="ea-page-hero__heading" style="font-family:var(--font-serif);font-size:clamp(40px,6vw,80px);line-height:1.05;letter-spacing:-.02em;color:var(--ink);margin-top:24px;">
            <?php esc_html_e( 'Une ONG née de la', 'elite-atacora' ); ?>
            <em style="font-style:italic;color:var(--terracotta);"><?php esc_html_e( 'conviction.', 'elite-atacora' ); ?></em>
          </h1>
          <p class="ea-page-hero__subtitle">
            <?php esc_html_e( 'Fondée en 2018 dans l\'Atacora, Elite Atacora œuvre chaque jour pour que l\'éducation devienne une réalité pour chaque enfant, chaque jeune fille.', 'elite-atacora' ); ?>
          </p>
          <div style="display:flex;gap:12px;flex-wrap:wrap;margin-top:32px;">
            <?php ea_pill_button( __( 'Notre programme', 'elite-atacora' ), ea_get_page_link( 'nos-actions' ), 'primary' ); ?>
            <?php ea_pill_button( __( 'Rejoindre l\'équipe', 'elite-atacora' ), ea_get_page_link( 'adherer' ), 'outline' ); ?>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Timeline -->
  <section class="ea-section">
    <div class="ea-container">
      <div class="ea-section-head" style="margin-bottom:64px;">
        <?php ea_eyebrow( __( 'Chronologie', 'elite-atacora' ), 'forest' ); ?>
        <h2 style="font-family:var(--font-serif);font-size:clamp(32px,4vw,52px);line-height:1.05;color:var(--ink);margin-top:20px;">
          <?php esc_html_e( 'Notre', 'elite-atacora' ); ?>
          <em style="font-style:italic;color:var(--forest);"><?php esc_html_e( 'parcours.', 'elite-atacora' ); ?></em>
        </h2>
      </div>

      <div class="ea-timeline">
        <?php foreach ( $timeline as $i => $step ) : ?>
          <div class="ea-timeline__item ea-reveal" style="--reveal-delay:<?php echo esc_attr( $i * 80 ); ?>ms;">
            <div class="ea-timeline__year"><?php echo esc_html( $step['year'] ); ?></div>
            <div class="ea-timeline__connector" aria-hidden="true">
              <div class="ea-timeline__dot"></div>
              <?php if ( $i < count( $timeline ) - 1 ) : ?>
                <div class="ea-timeline__line"></div>
              <?php endif; ?>
            </div>
            <div class="ea-timeline__content">
              <h3 class="ea-timeline__label"><?php echo esc_html( $step['label'] ); ?></h3>
              <p class="ea-timeline__body"><?php echo esc_html( $step['body'] ); ?></p>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- Mission & Vision -->
  <section class="ea-section" style="background:var(--paper);">
    <div class="ea-container">
      <div style="display:grid;gap:32px;grid-template-columns:1fr;" class="ea-mv-grid">
        <!-- Mission -->
        <div class="ea-mv-card ea-mv-card--forest">
          <div class="ea-mv-card__label"><?php esc_html_e( 'Mission', 'elite-atacora' ); ?></div>
          <h2 class="ea-mv-card__heading"><?php esc_html_e( 'Éduquer pour transformer.', 'elite-atacora' ); ?></h2>
          <p class="ea-mv-card__body">
            <?php esc_html_e( 'Elite Atacora a pour mission de promouvoir l\'accès à une éducation de qualité et équitable dans le département de l\'Atacora, en portant une attention particulière à la scolarisation et au maintien des filles dans le système éducatif.', 'elite-atacora' ); ?>
          </p>
          <p class="ea-mv-card__body">
            <?php esc_html_e( 'Nous agissons à travers des programmes de bourses, de formation, de sensibilisation communautaire et de plaidoyer, en partenariat avec les acteurs institutionnels et les organisations de la société civile.', 'elite-atacora' ); ?>
          </p>
        </div>

        <!-- Vision -->
        <div class="ea-mv-card ea-mv-card--terracotta">
          <div class="ea-mv-card__label"><?php esc_html_e( 'Vision', 'elite-atacora' ); ?></div>
          <h2 class="ea-mv-card__heading"><?php esc_html_e( 'Un Atacora où chaque enfant réussit.', 'elite-atacora' ); ?></h2>
          <p class="ea-mv-card__body">
            <?php esc_html_e( 'Nous croyons en un Atacora où chaque enfant, fille ou garçon, dispose des ressources et du soutien nécessaires pour accomplir son potentiel scolaire et devenir un acteur du développement de sa communauté.', 'elite-atacora' ); ?>
          </p>
          <p class="ea-mv-card__body">
            <?php esc_html_e( 'Notre vision est celle d\'une génération de leaders formés par l\'excellence, portés par les valeurs d\'intégrité et de service, capables de porter le développement durable de la région.', 'elite-atacora' ); ?>
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- Objectifs -->
  <section class="ea-section">
    <div class="ea-container">
      <div class="ea-section-head" style="margin-bottom:64px;">
        <?php ea_eyebrow( __( 'Nos objectifs', 'elite-atacora' ), 'terracotta' ); ?>
        <h2 style="font-family:var(--font-serif);font-size:clamp(32px,4vw,52px);line-height:1.05;color:var(--ink);margin-top:20px;">
          <?php esc_html_e( 'Ce que nous', 'elite-atacora' ); ?>
          <em style="font-style:italic;color:var(--terracotta);"><?php esc_html_e( 'poursuivons.', 'elite-atacora' ); ?></em>
        </h2>
      </div>

      <div class="ea-obj-grid">
        <?php foreach ( $objectifs as $i => $obj ) : ?>
          <div class="ea-obj-card ea-obj-card--<?php echo esc_attr( $obj['color'] ); ?> ea-reveal" style="--reveal-delay:<?php echo esc_attr( $i * 80 ); ?>ms;">
            <div class="ea-obj-card__icon" aria-hidden="true"><?php echo $obj['icon']; ?></div>
            <h3 class="ea-obj-card__title"><?php echo esc_html( $obj['title'] ); ?></h3>
            <p class="ea-obj-card__body"><?php echo esc_html( $obj['body'] ); ?></p>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- Valeurs (ELITE acronym) -->
  <section class="ea-section" style="background:var(--ink);color:var(--cream);">
    <div class="ea-container">
      <div class="ea-section-head" style="margin-bottom:64px;">
        <?php ea_eyebrow( __( 'Nos valeurs', 'elite-atacora' ), 'honey' ); ?>
        <h2 style="font-family:var(--font-serif);font-size:clamp(32px,4vw,52px);line-height:1.05;color:var(--cream);margin-top:20px;">
          <?php esc_html_e( 'ELITE, c\'est aussi', 'elite-atacora' ); ?>
          <em style="font-style:italic;color:var(--honey);"><?php esc_html_e( 'nos valeurs.', 'elite-atacora' ); ?></em>
        </h2>
      </div>

      <div class="ea-values-grid">
        <?php foreach ( $valeurs as $i => $val ) : ?>
          <div class="ea-value-card ea-reveal" style="--reveal-delay:<?php echo esc_attr( $i * 80 ); ?>ms;">
            <div class="ea-value-card__letter" style="color:var(<?php echo esc_attr( $val['color'] ); ?>);" aria-hidden="true">
              <?php echo esc_html( $val['letter'] ); ?>
            </div>
            <h3 class="ea-value-card__word"><?php echo esc_html( $val['word'] ); ?></h3>
            <p class="ea-value-card__body"><?php echo esc_html( $val['body'] ); ?></p>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- Signification du logo -->
  <section class="ea-section">
    <div class="ea-container">
      <div style="display:grid;gap:64px;align-items:center;max-width:1000px;margin-inline:auto;" class="ea-logo-meaning-grid">

        <!-- Logo visual placeholder -->
        <div style="display:flex;align-items:center;justify-content:center;background:var(--sand);border-radius:32px;aspect-ratio:1/1;max-width:360px;margin-inline:auto;padding:48px;">
          <?php
          $logo_id = get_theme_mod( 'custom_logo' );
          if ( $logo_id ) {
            echo wp_get_attachment_image( $logo_id, 'full', false, [ 'style' => 'width:100%;height:auto;', 'alt' => get_bloginfo( 'name' ) ] );
          } else {
            echo '<div style="font-family:var(--font-serif);font-size:72px;color:var(--forest);text-align:center;line-height:1;">EA</div>';
          }
          ?>
        </div>

        <!-- Explanation -->
        <div>
          <?php ea_eyebrow( __( 'Notre identité', 'elite-atacora' ), 'forest' ); ?>
          <h2 style="font-family:var(--font-serif);font-size:clamp(28px,3.5vw,44px);line-height:1.1;color:var(--ink);margin-top:20px;margin-bottom:24px;">
            <?php esc_html_e( 'La signification de notre logo.', 'elite-atacora' ); ?>
          </h2>
          <div style="display:flex;flex-direction:column;gap:20px;">
            <div style="display:flex;gap:16px;align-items:flex-start;">
              <div style="width:40px;height:40px;border-radius:50%;background:var(--forest);color:var(--cream);display:flex;align-items:center;justify-content:center;font-weight:700;flex-shrink:0;">E</div>
              <div>
                <div style="font-weight:700;color:var(--ink);margin-bottom:4px;"><?php esc_html_e( 'La Flamme', 'elite-atacora' ); ?></div>
                <p style="color:var(--muted);margin:0;font-size:15px;"><?php esc_html_e( 'Symbole du savoir, de l\'élan et de la volonté d\'éclairer les jeunes générations.', 'elite-atacora' ); ?></p>
              </div>
            </div>
            <div style="display:flex;gap:16px;align-items:flex-start;">
              <div style="width:40px;height:40px;border-radius:50%;background:var(--terracotta);color:white;display:flex;align-items:center;justify-content:center;font-weight:700;flex-shrink:0;">A</div>
              <div>
                <div style="font-weight:700;color:var(--ink);margin-bottom:4px;"><?php esc_html_e( 'Les Couleurs Terracotta & Forêt', 'elite-atacora' ); ?></div>
                <p style="color:var(--muted);margin:0;font-size:15px;"><?php esc_html_e( 'Le terracotta évoque la terre de l\'Atacora; le vert forêt, l\'espérance et la vie qui renaît par l\'éducation.', 'elite-atacora' ); ?></p>
              </div>
            </div>
            <div style="display:flex;gap:16px;align-items:flex-start;">
              <div style="width:40px;height:40px;border-radius:50%;background:var(--honey);color:var(--ink);display:flex;align-items:center;justify-content:center;font-weight:700;flex-shrink:0;">★</div>
              <div>
                <div style="font-weight:700;color:var(--ink);margin-bottom:4px;"><?php esc_html_e( 'Le Nom', 'elite-atacora' ); ?></div>
                <p style="color:var(--muted);margin:0;font-size:15px;"><?php esc_html_e( '"Elite" traduit l\'aspiration à l\'excellence; "Atacora" ancre l\'organisation dans son territoire d\'origine.', 'elite-atacora' ); ?></p>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- CTA -->
  <section class="ea-section" style="background:var(--forest);color:var(--cream);">
    <div class="ea-container" style="text-align:center;max-width:720px;margin-inline:auto;">
      <?php ea_eyebrow( __( 'Agir ensemble', 'elite-atacora' ), 'honey' ); ?>
      <h2 style="font-family:var(--font-serif);font-size:clamp(32px,4vw,56px);line-height:1.05;color:var(--cream);margin-top:24px;margin-bottom:20px;">
        <?php esc_html_e( 'Vous partagez notre', 'elite-atacora' ); ?>
        <em style="font-style:italic;color:var(--honey);"><?php esc_html_e( 'conviction ?', 'elite-atacora' ); ?></em>
      </h2>
      <p style="color:rgba(250,245,234,.75);margin-bottom:36px;font-size:18px;">
        <?php esc_html_e( 'Rejoignez Elite Atacora comme membre, partenaire ou bénévole et participez à la transformation éducative de l\'Atacora.', 'elite-atacora' ); ?>
      </p>
      <div style="display:flex;gap:12px;flex-wrap:wrap;justify-content:center;">
        <?php ea_pill_button( __( 'Adhérer à l\'ONG', 'elite-atacora' ), ea_get_page_link( 'adherer' ), 'onDark' ); ?>
        <?php ea_pill_button( __( 'Nous contacter', 'elite-atacora' ), ea_get_page_link( 'contact' ), 'ghost' ); ?>
      </div>
    </div>
  </section>

</main>

<?php get_footer(); ?>
