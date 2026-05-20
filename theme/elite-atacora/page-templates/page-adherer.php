<?php
/**
 * Template Name: Adhérer
 * Template Post Type: page
 *
 * Page: /adherer/
 * Sections: Hero → Types de membres → Tarifs → Processus → Formulaire → FAQ
 */
get_header();

/* ── Types de membres ─────────────────────────────────────────────── */
$types = [
	[
		'id'     => 'bienfaiteur',
		'label'  => __( 'Membre Bienfaiteur', 'elite-atacora' ),
		'price'  => __( '50 000 FCFA / an', 'elite-atacora' ),
		'color'  => 'honey',
		'badge'  => '',
		'perks'  => [
			__( 'Droit de vote à l\'Assemblée Générale', 'elite-atacora' ),
			__( 'Accès aux rapports annuels', 'elite-atacora' ),
			__( 'Invitation aux événements officiels', 'elite-atacora' ),
			__( 'Mention dans nos publications', 'elite-atacora' ),
			__( 'Newsletter mensuelle exclusive', 'elite-atacora' ),
		],
	],
	[
		'id'     => 'soutien',
		'label'  => __( 'Membre de Soutien', 'elite-atacora' ),
		'price'  => __( '10 000 FCFA / an', 'elite-atacora' ),
		'color'  => 'forest',
		'badge'  => __( 'Populaire', 'elite-atacora' ),
		'perks'  => [
			__( 'Droit de vote à l\'Assemblée Générale', 'elite-atacora' ),
			__( 'Accès aux rapports annuels', 'elite-atacora' ),
			__( 'Invitation aux événements officiels', 'elite-atacora' ),
			__( 'Newsletter mensuelle exclusive', 'elite-atacora' ),
		],
	],
	[
		'id'     => 'actif',
		'label'  => __( 'Membre Actif', 'elite-atacora' ),
		'price'  => __( '5 000 FCFA / an', 'elite-atacora' ),
		'color'  => 'terracotta',
		'badge'  => '',
		'perks'  => [
			__( 'Droit de vote à l\'Assemblée Générale', 'elite-atacora' ),
			__( 'Accès aux rapports annuels', 'elite-atacora' ),
			__( 'Newsletter mensuelle exclusive', 'elite-atacora' ),
		],
	],
	[
		'id'     => 'honneur',
		'label'  => __( 'Membre d\'Honneur', 'elite-atacora' ),
		'price'  => __( 'Sur invitation', 'elite-atacora' ),
		'color'  => 'honey',
		'badge'  => '',
		'perks'  => [
			__( 'Statut honorifique reconnu', 'elite-atacora' ),
			__( 'Invitations prioritaires', 'elite-atacora' ),
			__( 'Mention dans tous les supports', 'elite-atacora' ),
			__( 'Accès à tous les rapports', 'elite-atacora' ),
		],
	],
];

/* ── Processus d'adhésion ─────────────────────────────────────────── */
$process = [
	[
		'num'   => '01',
		'title' => __( 'Choisissez votre statut', 'elite-atacora' ),
		'body'  => __( 'Consultez les différents types de membres et choisissez celui qui correspond à votre engagement et à vos capacités.', 'elite-atacora' ),
	],
	[
		'num'   => '02',
		'title' => __( 'Remplissez le formulaire', 'elite-atacora' ),
		'body'  => __( 'Complétez le formulaire d\'adhésion en ligne avec vos informations personnelles et votre motivation.', 'elite-atacora' ),
	],
	[
		'num'   => '03',
		'title' => __( 'Réglez la cotisation', 'elite-atacora' ),
		'body'  => __( 'Effectuez le paiement de votre cotisation annuelle par Mobile Money, virement ou en espèces au siège.', 'elite-atacora' ),
	],
	[
		'num'   => '04',
		'title' => __( 'Bienvenue dans la famille', 'elite-atacora' ),
		'body'  => __( 'Vous recevez votre carte de membre et êtes officiellement intégré·e dans la communauté Elite Atacora !', 'elite-atacora' ),
	],
];

/* ── FAQ ──────────────────────────────────────────────────────────── */
$faq = [
	[
		'q' => __( 'Qui peut adhérer à Elite Atacora ?', 'elite-atacora' ),
		'a' => __( 'Toute personne physique ou morale partageant les valeurs et les objectifs de l\'ONG peut adhérer. Il n\'y a pas de condition de nationalité ou de résidence. Les membres doivent simplement s\'engager à respecter les statuts et le règlement intérieur.', 'elite-atacora' ),
	],
	[
		'q' => __( 'La cotisation est-elle déductible des impôts ?', 'elite-atacora' ),
		'a' => __( 'Pour les donateurs résidant dans certains pays, les cotisations et dons à Elite Atacora peuvent ouvrir droit à une déduction fiscale. Contactez-nous pour obtenir les justificatifs nécessaires selon votre pays de résidence.', 'elite-atacora' ),
	],
	[
		'q' => __( 'Comment est utilisée ma cotisation ?', 'elite-atacora' ),
		'a' => __( 'Les cotisations alimentent directement le fonds de soutien aux programmes : bourses scolaires, matériels pédagogiques, formation des enseignants. Un rapport annuel détaillé est transmis à tous les membres.', 'elite-atacora' ),
	],
	[
		'q' => __( 'Puis-je me désister après avoir adhéré ?', 'elite-atacora' ),
		'a' => __( 'La qualité de membre se perd par démission notifiée par écrit au Bureau Exécutif, par radiation (non-paiement de la cotisation ou manquement grave aux statuts) ou par décès. La cotisation versée n\'est pas remboursable.', 'elite-atacora' ),
	],
];

/* ── Active type from URL ─────────────────────────────────────────── */
$active_type = isset( $_GET['type'] ) ? sanitize_key( $_GET['type'] ) : 'soutien';
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
        <span><?php esc_html_e( 'Adhérer', 'elite-atacora' ); ?></span>
      </nav>
      <div class="ea-page-hero__grid ea-page-hero__grid--no-image">
        <div class="ea-page-hero__content">
          <?php ea_eyebrow( __( 'Rejoindre l\'ONG', 'elite-atacora' ), 'honey' ); ?>
          <h1 class="ea-page-hero__heading" style="font-family:var(--font-serif);font-size:clamp(40px,6vw,80px);line-height:1.05;letter-spacing:-.02em;color:var(--ink);margin-top:24px;">
            <?php esc_html_e( 'Devenez', 'elite-atacora' ); ?>
            <em style="font-style:italic;color:var(--honey);"><?php esc_html_e( 'membre.', 'elite-atacora' ); ?></em>
          </h1>
          <p class="ea-page-hero__subtitle">
            <?php esc_html_e( 'En adhérant à Elite Atacora, vous rejoignez une communauté engagée pour l\'éducation et l\'avenir des enfants de l\'Atacora.', 'elite-atacora' ); ?>
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- Types de membres -->
  <section class="ea-section">
    <div class="ea-container">
      <div class="ea-section-head" style="margin-bottom:64px;">
        <?php ea_eyebrow( __( 'Statuts', 'elite-atacora' ), 'forest' ); ?>
        <h2 style="font-family:var(--font-serif);font-size:clamp(32px,4vw,52px);line-height:1.05;color:var(--ink);margin-top:20px;">
          <?php esc_html_e( 'Choisissez votre', 'elite-atacora' ); ?>
          <em style="font-style:italic;color:var(--forest);"><?php esc_html_e( 'engagement.', 'elite-atacora' ); ?></em>
        </h2>
      </div>

      <!-- Type selector buttons -->
      <div class="ea-type-selector" role="group" aria-label="<?php esc_attr_e( 'Type de membre', 'elite-atacora' ); ?>" style="display:flex;gap:8px;flex-wrap:wrap;margin-bottom:40px;">
        <?php foreach ( $types as $t ) : ?>
          <button
            class="ea-type-btn<?php echo ( $t['id'] === $active_type ) ? ' ea-type-btn--active' : ''; ?>"
            data-type="<?php echo esc_attr( $t['id'] ); ?>"
            aria-pressed="<?php echo $t['id'] === $active_type ? 'true' : 'false'; ?>"
          >
            <?php echo esc_html( $t['label'] ); ?>
          </button>
        <?php endforeach; ?>
      </div>

      <!-- Pricing cards (all rendered, JS toggles visibility) -->
      <div class="ea-pricing-grid">
        <?php foreach ( $types as $i => $t ) : ?>
          <div
            class="ea-pricing-card ea-pricing-card--<?php echo esc_attr( $t['color'] ); ?><?php echo ( $t['id'] === $active_type ) ? ' ea-pricing-card--active' : ''; ?>"
            data-type="<?php echo esc_attr( $t['id'] ); ?>"
            role="region"
            aria-label="<?php echo esc_attr( $t['label'] ); ?>"
          >
            <?php if ( $t['badge'] ) : ?>
              <div class="ea-pricing-card__badge"><?php echo esc_html( $t['badge'] ); ?></div>
            <?php endif; ?>
            <h3 class="ea-pricing-card__label"><?php echo esc_html( $t['label'] ); ?></h3>
            <div class="ea-pricing-card__price"><?php echo esc_html( $t['price'] ); ?></div>
            <ul class="ea-pricing-card__perks">
              <?php foreach ( $t['perks'] as $perk ) : ?>
                <li>
                  <span class="ea-pricing-card__check" aria-hidden="true">✓</span>
                  <?php echo esc_html( $perk ); ?>
                </li>
              <?php endforeach; ?>
            </ul>
            <a href="#adhesion-form" class="ea-btn ea-btn--primary" style="width:100%;justify-content:center;margin-top:24px;">
              <?php esc_html_e( 'Choisir ce statut', 'elite-atacora' ); ?>
            </a>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- Processus d'adhésion -->
  <section class="ea-section" style="background:var(--paper);">
    <div class="ea-container">
      <div class="ea-section-head" style="margin-bottom:64px;">
        <?php ea_eyebrow( __( 'Comment adhérer', 'elite-atacora' ), 'terracotta' ); ?>
        <h2 style="font-family:var(--font-serif);font-size:clamp(32px,4vw,52px);line-height:1.05;color:var(--ink);margin-top:20px;">
          <?php esc_html_e( 'En 4', 'elite-atacora' ); ?>
          <em style="font-style:italic;color:var(--terracotta);"><?php esc_html_e( 'étapes.', 'elite-atacora' ); ?></em>
        </h2>
      </div>

      <div class="ea-process-grid">
        <?php foreach ( $process as $i => $step ) : ?>
          <div class="ea-process-step ea-reveal" style="--reveal-delay:<?php echo esc_attr( $i * 100 ); ?>ms;">
            <div class="ea-process-step__num" aria-hidden="true"><?php echo esc_html( $step['num'] ); ?></div>
            <h3 class="ea-process-step__title"><?php echo esc_html( $step['title'] ); ?></h3>
            <p class="ea-process-step__body"><?php echo esc_html( $step['body'] ); ?></p>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- Formulaire d'adhésion -->
  <section class="ea-section" id="adhesion-form">
    <div class="ea-container" style="max-width:760px;margin-inline:auto;">
      <div class="ea-section-head" style="margin-bottom:48px;text-align:center;">
        <?php ea_eyebrow( __( 'Formulaire', 'elite-atacora' ), 'forest' ); ?>
        <h2 style="font-family:var(--font-serif);font-size:clamp(28px,3.5vw,44px);line-height:1.1;color:var(--ink);margin-top:20px;">
          <?php esc_html_e( 'Formulaire d\'adhésion', 'elite-atacora' ); ?>
        </h2>
      </div>

      <?php
      $cf7_adh_id = get_theme_mod( 'ea_adhesion_form_id', 0 );
      if ( function_exists( 'wpcf7_contact_form' ) && $cf7_adh_id ) :
        echo do_shortcode( '[contact-form-7 id="' . absint( $cf7_adh_id ) . '" title="Adhésion Elite Atacora"]' );
      else :
      ?>
        <form class="ea-native-form" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post" novalidate>
          <?php wp_nonce_field( 'ea_adhesion_form', 'ea_adh_nonce' ); ?>
          <input type="hidden" name="action" value="ea_adhesion_submit">

          <!-- Statut -->
          <div class="ea-form-group">
            <label class="ea-form-label" for="adh-type"><?php esc_html_e( 'Statut souhaité', 'elite-atacora' ); ?> <span aria-hidden="true">*</span></label>
            <select id="adh-type" name="ea_type" class="ea-select" required>
              <option value=""><?php esc_html_e( 'Choisissez votre statut', 'elite-atacora' ); ?></option>
              <?php foreach ( $types as $t ) : ?>
                <option value="<?php echo esc_attr( $t['id'] ); ?>"><?php echo esc_html( $t['label'] ); ?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <!-- Identité -->
          <div class="ea-form-row">
            <div class="ea-form-group">
              <label class="ea-form-label" for="adh-prenom"><?php esc_html_e( 'Prénom', 'elite-atacora' ); ?> <span aria-hidden="true">*</span></label>
              <input type="text" id="adh-prenom" name="ea_prenom" class="ea-input" required autocomplete="given-name">
            </div>
            <div class="ea-form-group">
              <label class="ea-form-label" for="adh-nom"><?php esc_html_e( 'Nom', 'elite-atacora' ); ?> <span aria-hidden="true">*</span></label>
              <input type="text" id="adh-nom" name="ea_nom" class="ea-input" required autocomplete="family-name">
            </div>
          </div>

          <div class="ea-form-row">
            <div class="ea-form-group">
              <label class="ea-form-label" for="adh-email"><?php esc_html_e( 'E-mail', 'elite-atacora' ); ?> <span aria-hidden="true">*</span></label>
              <input type="email" id="adh-email" name="ea_email" class="ea-input" required autocomplete="email">
            </div>
            <div class="ea-form-group">
              <label class="ea-form-label" for="adh-tel"><?php esc_html_e( 'Téléphone', 'elite-atacora' ); ?></label>
              <input type="tel" id="adh-tel" name="ea_tel" class="ea-input" autocomplete="tel">
            </div>
          </div>

          <div class="ea-form-group">
            <label class="ea-form-label" for="adh-ville"><?php esc_html_e( 'Ville / Pays de résidence', 'elite-atacora' ); ?> <span aria-hidden="true">*</span></label>
            <input type="text" id="adh-ville" name="ea_ville" class="ea-input" required autocomplete="address-level2">
          </div>

          <div class="ea-form-group">
            <label class="ea-form-label" for="adh-profession"><?php esc_html_e( 'Profession', 'elite-atacora' ); ?></label>
            <input type="text" id="adh-profession" name="ea_profession" class="ea-input" autocomplete="organization-title">
          </div>

          <div class="ea-form-group">
            <label class="ea-form-label" for="adh-motivation"><?php esc_html_e( 'Motivation', 'elite-atacora' ); ?> <span aria-hidden="true">*</span></label>
            <textarea id="adh-motivation" name="ea_motivation" class="ea-textarea" rows="5" required placeholder="<?php esc_attr_e( 'Pourquoi souhaitez-vous rejoindre Elite Atacora ?', 'elite-atacora' ); ?>"></textarea>
          </div>

          <div class="ea-form-group" style="display:flex;align-items:flex-start;gap:12px;">
            <input type="checkbox" id="adh-statuts" name="ea_statuts" value="1" required style="margin-top:3px;flex-shrink:0;">
            <label for="adh-statuts" style="font-size:13px;color:var(--muted);line-height:1.5;">
              <?php esc_html_e( 'Je déclare avoir pris connaissance des statuts et du règlement intérieur d\'Elite Atacora et m\'engage à les respecter.', 'elite-atacora' ); ?>
            </label>
          </div>

          <div class="ea-form-group" style="display:flex;align-items:flex-start;gap:12px;">
            <input type="checkbox" id="adh-rgpd" name="ea_rgpd" value="1" required style="margin-top:3px;flex-shrink:0;">
            <label for="adh-rgpd" style="font-size:13px;color:var(--muted);line-height:1.5;">
              <?php
              printf(
                esc_html__( 'J\'accepte que mes données soient traitées par Elite Atacora. %sEn savoir plus%s.', 'elite-atacora' ),
                '<a href="' . esc_url( ea_get_page_link( 'politique-de-confidentialite' ) ) . '" style="color:var(--forest);">',
                '</a>'
              );
              ?>
            </label>
          </div>

          <button type="submit" class="ea-btn ea-btn--primary" style="width:100%;justify-content:center;">
            <?php esc_html_e( 'Soumettre ma candidature', 'elite-atacora' ); ?>
            <?php echo ea_arrow_icon( 14 ); ?>
          </button>
        </form>

        <!-- Success state -->
        <div class="ea-form-success" role="alert" aria-live="polite">
          <div style="font-size:40px;margin-bottom:16px;" aria-hidden="true">🎉</div>
          <h3 style="font-family:var(--font-serif);font-size:24px;color:var(--forest);margin-bottom:8px;">
            <?php esc_html_e( 'Candidature envoyée !', 'elite-atacora' ); ?>
          </h3>
          <p style="color:var(--muted);">
            <?php esc_html_e( 'Merci pour votre intérêt. Le Bureau Exécutif étudiera votre candidature et vous contactera sous 5 jours ouvrables.', 'elite-atacora' ); ?>
          </p>
        </div>
      <?php endif; ?>
    </div>
  </section>

  <!-- FAQ -->
  <section class="ea-section" style="background:var(--paper);">
    <div class="ea-container" style="max-width:800px;margin-inline:auto;">
      <div class="ea-section-head" style="margin-bottom:48px;">
        <?php ea_eyebrow( __( 'Questions fréquentes', 'elite-atacora' ), 'forest' ); ?>
        <h2 style="font-family:var(--font-serif);font-size:clamp(28px,3.5vw,44px);line-height:1.1;color:var(--ink);margin-top:20px;">
          <?php esc_html_e( 'Vos questions,', 'elite-atacora' ); ?>
          <em style="font-style:italic;color:var(--forest);"><?php esc_html_e( 'nos réponses.', 'elite-atacora' ); ?></em>
        </h2>
      </div>

      <div class="ea-faq" role="list">
        <?php foreach ( $faq as $i => $item ) :
          $item_id = 'faq-' . $i;
          $panel_id = 'faq-panel-' . $i;
        ?>
          <div class="ea-faq__item" role="listitem">
            <h3 class="ea-faq__heading">
              <button
                class="ea-faq__btn"
                aria-expanded="false"
                aria-controls="<?php echo esc_attr( $panel_id ); ?>"
                id="<?php echo esc_attr( $item_id ); ?>"
              >
                <span><?php echo esc_html( $item['q'] ); ?></span>
                <span class="ea-faq__icon" aria-hidden="true">+</span>
              </button>
            </h3>
            <div
              class="ea-faq__panel"
              id="<?php echo esc_attr( $panel_id ); ?>"
              role="region"
              aria-labelledby="<?php echo esc_attr( $item_id ); ?>"
              hidden
            >
              <p class="ea-faq__answer"><?php echo esc_html( $item['a'] ); ?></p>
            </div>
          </div>
        <?php endforeach; ?>
      </div>

      <div style="text-align:center;margin-top:48px;">
        <p style="color:var(--muted);margin-bottom:20px;">
          <?php esc_html_e( 'Vous ne trouvez pas la réponse à votre question ?', 'elite-atacora' ); ?>
        </p>
        <?php ea_pill_button( __( 'Contactez-nous', 'elite-atacora' ), ea_get_page_link( 'contact' ), 'primary' ); ?>
      </div>
    </div>
  </section>

</main>

<?php get_footer(); ?>
