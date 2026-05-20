<?php
/**
 * Template Name: Gouvernance
 * Template Post Type: page
 *
 * Page: /gouvernance/
 * Sections: Hero → Organes → Bureau exécutif → Conseil de surveillance → CTA
 */
get_header();

/* ── Organes de gouvernance ───────────────────────────────────────── */
$organes = [
	[
		'title' => __( 'Assemblée Générale', 'elite-atacora' ),
		'abbr'  => 'AG',
		'color' => 'forest',
		'body'  => __( 'Organe souverain de l\'ONG. Elle regroupe l\'ensemble des membres et se réunit au moins une fois par an pour approuver les orientations stratégiques et les comptes.', 'elite-atacora' ),
	],
	[
		'title' => __( 'Bureau Exécutif', 'elite-atacora' ),
		'abbr'  => 'BE',
		'color' => 'terracotta',
		'body'  => __( 'Organe de direction élu par l\'Assemblée Générale. Il assure la mise en œuvre des décisions et la gestion quotidienne de l\'association.', 'elite-atacora' ),
	],
	[
		'title' => __( 'Conseil de Surveillance', 'elite-atacora' ),
		'abbr'  => 'CS',
		'color' => 'honey',
		'body'  => __( 'Organe de contrôle interne chargé de vérifier la régularité des actes de gestion et de veiller au respect des statuts et des règlements.', 'elite-atacora' ),
	],
	[
		'title' => __( 'Comité Scientifique', 'elite-atacora' ),
		'abbr'  => 'CScien',
		'color' => 'forest',
		'body'  => __( 'Instance consultative composée d\'experts. Elle évalue la pertinence et l\'impact des programmes et formule des recommandations techniques.', 'elite-atacora' ),
	],
];

/* ── Bureau exécutif (9 membres) ──────────────────────────────────── */
$bureau = [
	[
		'name'     => 'M. Alidou BORI',
		'role'     => __( 'Président', 'elite-atacora' ),
		'initials' => 'AB',
		'color'    => 'forest',
		'bio'      => __( 'Enseignant chercheur, militant de l\'éducation depuis 15 ans. Fondateur d\'Elite Atacora.', 'elite-atacora' ),
	],
	[
		'name'     => 'Mme Fatouma KORA',
		'role'     => __( 'Vice-Présidente chargée des programmes', 'elite-atacora' ),
		'initials' => 'FK',
		'color'    => 'terracotta',
		'bio'      => __( 'Spécialiste en genre et développement, ancienne cadre de l\'UNICEF Bénin.', 'elite-atacora' ),
	],
	[
		'name'     => 'M. Thierry AKOUETE',
		'role'     => __( 'Secrétaire Général', 'elite-atacora' ),
		'initials' => 'TA',
		'color'    => 'honey',
		'bio'      => __( 'Juriste et spécialiste en droit des associations. Coordonne la vie statutaire de l\'ONG.', 'elite-atacora' ),
	],
	[
		'name'     => 'Mme Rosalie DOSSA',
		'role'     => __( 'Trésorière Générale', 'elite-atacora' ),
		'initials' => 'RD',
		'color'    => 'forest',
		'bio'      => __( 'Comptable agréée, experte en gestion des fonds de développement international.', 'elite-atacora' ),
	],
	[
		'name'     => 'M. Armand TESSI',
		'role'     => __( 'Chargé des partenariats', 'elite-atacora' ),
		'initials' => 'AT',
		'color'    => 'terracotta',
		'bio'      => __( 'Expert en mobilisation de ressources et en négociation de partenariats stratégiques.', 'elite-atacora' ),
	],
	[
		'name'     => 'Mme Céleste KOUNDE',
		'role'     => __( 'Chargée de communication', 'elite-atacora' ),
		'initials' => 'CK',
		'color'    => 'honey',
		'bio'      => __( 'Journaliste et communicante, spécialisée dans la communication pour le développement.', 'elite-atacora' ),
	],
	[
		'name'     => 'M. Gratien MAMA',
		'role'     => __( 'Chargé du suivi-évaluation', 'elite-atacora' ),
		'initials' => 'GM',
		'color'    => 'forest',
		'bio'      => __( 'Spécialiste MEAL (Monitoring, Evaluation, Accountability and Learning) avec 10 ans d\'expérience.', 'elite-atacora' ),
	],
	[
		'name'     => 'Mme Yvonne AKOBI',
		'role'     => __( 'Représentante des bénéficiaires', 'elite-atacora' ),
		'initials' => 'YA',
		'color'    => 'terracotta',
		'bio'      => __( 'Ancienne boursière du programme, aujourd\'hui enseignante et militante de l\'éducation des filles.', 'elite-atacora' ),
	],
	[
		'name'     => 'M. Pascal TCHABI',
		'role'     => __( 'Conseiller juridique', 'elite-atacora' ),
		'initials' => 'PT',
		'color'    => 'honey',
		'bio'      => __( 'Avocat au barreau du Bénin, spécialisé en droit des ONG et des organisations de la société civile.', 'elite-atacora' ),
	],
];

/* ── Conseil de surveillance (2 membres) ──────────────────────────── */
$surveillance = [
	[
		'name'     => 'M. Ézéchiel GONROUDOBOU',
		'role'     => __( 'Président du Conseil de Surveillance', 'elite-atacora' ),
		'initials' => 'EG',
		'color'    => 'forest',
		'bio'      => __( 'Inspecteur principal des Finances publiques, garant de la transparence financière de l\'ONG.', 'elite-atacora' ),
	],
	[
		'name'     => 'Mme Alphonsine GUEDEGBE',
		'role'     => __( 'Membre du Conseil de Surveillance', 'elite-atacora' ),
		'initials' => 'AG',
		'color'    => 'terracotta',
		'bio'      => __( 'Présidente d\'une organisation féminine, experte en gouvernance associative et contrôle interne.', 'elite-atacora' ),
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
        <span><?php esc_html_e( 'Gouvernance', 'elite-atacora' ); ?></span>
      </nav>
      <div class="ea-page-hero__grid ea-page-hero__grid--no-image">
        <div class="ea-page-hero__content">
          <?php ea_eyebrow( __( 'Structure & transparence', 'elite-atacora' ), 'forest' ); ?>
          <h1 class="ea-page-hero__heading" style="font-family:var(--font-serif);font-size:clamp(40px,6vw,80px);line-height:1.05;letter-spacing:-.02em;color:var(--ink);margin-top:24px;">
            <?php esc_html_e( 'Une gouvernance', 'elite-atacora' ); ?>
            <em style="font-style:italic;color:var(--forest);"><?php esc_html_e( 'responsable.', 'elite-atacora' ); ?></em>
          </h1>
          <p class="ea-page-hero__subtitle">
            <?php esc_html_e( 'Elite Atacora est gouvernée par des instances représentatives, transparentes et engagées dans l\'intégrité et la redevabilité envers nos bénéficiaires et partenaires.', 'elite-atacora' ); ?>
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- Organes -->
  <section class="ea-section">
    <div class="ea-container">
      <div class="ea-section-head" style="margin-bottom:64px;">
        <?php ea_eyebrow( __( 'Organisation', 'elite-atacora' ), 'forest' ); ?>
        <h2 style="font-family:var(--font-serif);font-size:clamp(32px,4vw,52px);line-height:1.05;color:var(--ink);margin-top:20px;">
          <?php esc_html_e( 'Nos', 'elite-atacora' ); ?>
          <em style="font-style:italic;color:var(--forest);"><?php esc_html_e( 'organes.', 'elite-atacora' ); ?></em>
        </h2>
      </div>

      <div class="ea-organs-grid">
        <?php foreach ( $organes as $i => $organ ) : ?>
          <div class="ea-organ-card ea-organ-card--<?php echo esc_attr( $organ['color'] ); ?> ea-reveal" style="--reveal-delay:<?php echo esc_attr( $i * 80 ); ?>ms;">
            <div class="ea-organ-card__abbr"><?php echo esc_html( $organ['abbr'] ); ?></div>
            <h3 class="ea-organ-card__title"><?php echo esc_html( $organ['title'] ); ?></h3>
            <p class="ea-organ-card__body"><?php echo esc_html( $organ['body'] ); ?></p>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- Bureau exécutif -->
  <section class="ea-section" style="background:var(--paper);">
    <div class="ea-container">
      <div class="ea-section-head" style="margin-bottom:64px;">
        <?php ea_eyebrow( __( 'Équipe dirigeante', 'elite-atacora' ), 'terracotta' ); ?>
        <h2 style="font-family:var(--font-serif);font-size:clamp(32px,4vw,52px);line-height:1.05;color:var(--ink);margin-top:20px;">
          <?php esc_html_e( 'Le Bureau', 'elite-atacora' ); ?>
          <em style="font-style:italic;color:var(--terracotta);"><?php esc_html_e( 'exécutif.', 'elite-atacora' ); ?></em>
        </h2>
      </div>

      <div class="ea-members-grid">
        <?php foreach ( $bureau as $i => $member ) : ?>
          <div class="ea-member-card ea-reveal" style="--reveal-delay:<?php echo esc_attr( $i * 60 ); ?>ms;">
            <div class="ea-member-card__avatar ea-member-card__avatar--<?php echo esc_attr( $member['color'] ); ?>" aria-hidden="true">
              <?php echo esc_html( $member['initials'] ); ?>
            </div>
            <div class="ea-member-card__body">
              <div class="ea-member-card__name"><?php echo esc_html( $member['name'] ); ?></div>
              <div class="ea-member-card__role"><?php echo esc_html( $member['role'] ); ?></div>
              <p class="ea-member-card__bio"><?php echo esc_html( $member['bio'] ); ?></p>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- Conseil de surveillance -->
  <section class="ea-section">
    <div class="ea-container">
      <div class="ea-section-head" style="margin-bottom:64px;">
        <?php ea_eyebrow( __( 'Contrôle interne', 'elite-atacora' ), 'forest' ); ?>
        <h2 style="font-family:var(--font-serif);font-size:clamp(32px,4vw,52px);line-height:1.05;color:var(--ink);margin-top:20px;">
          <?php esc_html_e( 'Conseil de', 'elite-atacora' ); ?>
          <em style="font-style:italic;color:var(--forest);"><?php esc_html_e( 'surveillance.', 'elite-atacora' ); ?></em>
        </h2>
      </div>

      <div class="ea-members-grid ea-members-grid--2col">
        <?php foreach ( $surveillance as $i => $member ) : ?>
          <div class="ea-member-card ea-member-card--large ea-reveal" style="--reveal-delay:<?php echo esc_attr( $i * 80 ); ?>ms;">
            <div class="ea-member-card__avatar ea-member-card__avatar--<?php echo esc_attr( $member['color'] ); ?>" style="width:72px;height:72px;font-size:22px;" aria-hidden="true">
              <?php echo esc_html( $member['initials'] ); ?>
            </div>
            <div class="ea-member-card__body">
              <div class="ea-member-card__name" style="font-size:20px;"><?php echo esc_html( $member['name'] ); ?></div>
              <div class="ea-member-card__role"><?php echo esc_html( $member['role'] ); ?></div>
              <p class="ea-member-card__bio"><?php echo esc_html( $member['bio'] ); ?></p>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- Transparence financière -->
  <section class="ea-section" style="background:var(--sand);">
    <div class="ea-container">
      <div style="display:grid;gap:48px;align-items:center;max-width:1000px;margin-inline:auto;" class="ea-two-col-grid">
        <div>
          <?php ea_eyebrow( __( 'Transparence', 'elite-atacora' ), 'terracotta' ); ?>
          <h2 style="font-family:var(--font-serif);font-size:clamp(28px,3.5vw,44px);line-height:1.1;color:var(--ink);margin-top:20px;margin-bottom:20px;">
            <?php esc_html_e( 'Nos engagements de redevabilité.', 'elite-atacora' ); ?>
          </h2>
          <ul style="list-style:none;padding:0;margin:0;display:flex;flex-direction:column;gap:16px;">
            <?php
            $engagements = [
              __( 'Publication annuelle des rapports d\'activité et financiers.', 'elite-atacora' ),
              __( 'Audit indépendant des comptes par un cabinet agréé.', 'elite-atacora' ),
              __( 'Transmission régulière des données au Ministère de tutelle.', 'elite-atacora' ),
              __( 'Présentation des bilans aux bailleurs de fonds et partenaires.', 'elite-atacora' ),
              __( 'Mécanisme de plaintes accessible à tous les bénéficiaires.', 'elite-atacora' ),
            ];
            foreach ( $engagements as $eng ) :
            ?>
              <li style="display:flex;gap:12px;align-items:flex-start;">
                <span style="width:24px;height:24px;border-radius:50%;background:var(--forest);color:var(--cream);display:flex;align-items:center;justify-content:center;font-size:12px;font-weight:700;flex-shrink:0;margin-top:1px;">✓</span>
                <span style="color:var(--coffee);font-size:15px;"><?php echo esc_html( $eng ); ?></span>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
        <div style="background:var(--cream);border-radius:24px;padding:40px;box-shadow:0 0 0 1px rgba(30,24,19,.06);">
          <div style="font-family:var(--font-serif);font-size:48px;color:var(--forest);margin-bottom:8px;">100%</div>
          <div style="font-weight:700;color:var(--ink);margin-bottom:12px;"><?php esc_html_e( 'des fonds traçables', 'elite-atacora' ); ?></div>
          <p style="color:var(--muted);font-size:14px;margin:0 0 24px;"><?php esc_html_e( 'Chaque euro/franc CFA reçu est documenté et son utilisation justifiée auprès de nos partenaires financiers.', 'elite-atacora' ); ?></p>
          <div style="border-top:1px solid rgba(30,24,19,.08);padding-top:24px;margin-top:0;">
            <div style="font-family:var(--font-serif);font-size:36px;color:var(--terracotta);">24+</div>
            <div style="font-weight:700;color:var(--ink);margin-bottom:4px;"><?php esc_html_e( 'partenaires actifs', 'elite-atacora' ); ?></div>
            <p style="color:var(--muted);font-size:14px;margin:0;"><?php esc_html_e( 'Institutions publiques, ONG, entreprises et organismes internationaux.', 'elite-atacora' ); ?></p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA -->
  <section class="ea-section" style="background:var(--forest);color:var(--cream);">
    <div class="ea-container" style="text-align:center;max-width:720px;margin-inline:auto;">
      <?php ea_eyebrow( __( 'Nous rejoindre', 'elite-atacora' ), 'honey' ); ?>
      <h2 style="font-family:var(--font-serif);font-size:clamp(32px,4vw,56px);line-height:1.05;color:var(--cream);margin-top:24px;margin-bottom:20px;">
        <?php esc_html_e( 'Devenez acteur du', 'elite-atacora' ); ?>
        <em style="font-style:italic;color:var(--honey);"><?php esc_html_e( 'changement.', 'elite-atacora' ); ?></em>
      </h2>
      <p style="color:rgba(250,245,234,.75);margin-bottom:36px;font-size:18px;">
        <?php esc_html_e( 'Rejoignez Elite Atacora et participez à la gouvernance d\'une ONG qui transforme des vies chaque jour.', 'elite-atacora' ); ?>
      </p>
      <div style="display:flex;gap:12px;flex-wrap:wrap;justify-content:center;">
        <?php ea_pill_button( __( 'Adhérer à l\'ONG', 'elite-atacora' ), ea_get_page_link( 'adherer' ), 'onDark' ); ?>
        <?php ea_pill_button( __( 'Nous contacter', 'elite-atacora' ), ea_get_page_link( 'contact' ), 'ghost' ); ?>
      </div>
    </div>
  </section>

</main>

<?php get_footer(); ?>
