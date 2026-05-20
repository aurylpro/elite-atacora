<?php
/**
 * Template Name: Politique de confidentialité
 * Template Post Type: page
 *
 * Page: /politique-de-confidentialite/
 * 8 numbered sections covering RGPD-aligned privacy policy.
 */
get_header();

$sections = [
	[
		'num'   => '1',
		'title' => __( 'Responsable du traitement', 'elite-atacora' ),
		'body'  => __( "Elite Atacora, ONG de droit béninois dont le siège est situé à Natitingou, Département de l'Atacora, Bénin (Récépissé n° 00XX/MISP/DGAP/DAP), est responsable du traitement des données personnelles collectées via ce site et dans le cadre de ses activités.\n\nContact : contact@elite-atacora.org", 'elite-atacora' ),
	],
	[
		'num'   => '2',
		'title' => __( 'Données collectées', 'elite-atacora' ),
		'body'  => __( "Nous collectons les données personnelles suivantes :\n\n• Données d'identification : nom, prénom, adresse e-mail, numéro de téléphone.\n• Données de navigation : adresse IP, type de navigateur, pages visitées, durée des visites (via des cookies analytiques).\n• Données de formulaire : informations saisies dans nos formulaires de contact, d'adhésion et de newsletter.\n• Données de paiement : ces données sont traitées directement par nos prestataires de paiement sécurisé et ne sont pas stockées sur nos serveurs.", 'elite-atacora' ),
	],
	[
		'num'   => '3',
		'title' => __( 'Finalités et bases légales', 'elite-atacora' ),
		'body'  => __( "Vos données sont traitées aux fins suivantes :\n\n• Répondre à vos demandes de contact (base légale : intérêt légitime).\n• Gérer votre adhésion à l'ONG (base légale : exécution d'un contrat).\n• Vous envoyer notre newsletter, avec votre consentement explicite (base légale : consentement).\n• Analyser la fréquentation du site pour l'améliorer (base légale : intérêt légitime).\n• Respecter nos obligations légales et comptables (base légale : obligation légale).", 'elite-atacora' ),
	],
	[
		'num'   => '4',
		'title' => __( 'Durée de conservation', 'elite-atacora' ),
		'body'  => __( "Nous conservons vos données personnelles pour les durées suivantes :\n\n• Données de contact : 3 ans à compter du dernier contact.\n• Données d'adhésion : durée de l'adhésion + 5 ans pour les obligations comptables.\n• Données de newsletter : jusqu'à désinscription.\n• Données de navigation : 13 mois maximum.\n\nAu-delà de ces délais, les données sont supprimées ou anonymisées.", 'elite-atacora' ),
	],
	[
		'num'   => '5',
		'title' => __( 'Destinataires des données', 'elite-atacora' ),
		'body'  => __( "Vos données peuvent être partagées avec :\n\n• Nos prestataires techniques (hébergeur, outil e-mailing) dans le cadre de contrats garantissant la confidentialité.\n• Les autorités compétentes en cas d'obligation légale.\n\nNous ne vendons, ne louons ni ne partageons vos données à des fins commerciales avec des tiers. Aucun transfert hors de l'Espace Économique Européen ou hors du Bénin n'est effectué sans garanties appropriées.", 'elite-atacora' ),
	],
	[
		'num'   => '6',
		'title' => __( 'Vos droits', 'elite-atacora' ),
		'body'  => __( "Conformément aux lois applicables sur la protection des données, vous disposez des droits suivants :\n\n• Droit d'accès : obtenir une copie de vos données.\n• Droit de rectification : corriger des données inexactes.\n• Droit à l'effacement : demander la suppression de vos données.\n• Droit à la limitation : suspendre le traitement de vos données.\n• Droit d'opposition : vous opposer à certains traitements.\n• Droit à la portabilité : recevoir vos données dans un format structuré.\n• Droit de retirer votre consentement à tout moment.\n\nPour exercer ces droits, contactez-nous à : contact@elite-atacora.org", 'elite-atacora' ),
	],
	[
		'num'   => '7',
		'title' => __( 'Cookies', 'elite-atacora' ),
		'body'  => __( "Notre site utilise des cookies pour :\n\n• Assurer le bon fonctionnement du site (cookies strictement nécessaires, exemptés de consentement).\n• Mesurer l'audience et améliorer nos services (cookies analytiques, soumis à consentement).\n\nVous pouvez paramétrer vos préférences de cookies via la bannière qui apparaît lors de votre première visite, ou à tout moment dans les paramètres de votre navigateur.", 'elite-atacora' ),
	],
	[
		'num'   => '8',
		'title' => __( 'Mise à jour de cette politique', 'elite-atacora' ),
		'body'  => __( "Cette politique de confidentialité peut être mise à jour pour refléter les évolutions légales ou nos pratiques. La date de dernière mise à jour est indiquée en bas de page. En continuant à utiliser notre site après modification, vous acceptez la version en vigueur.\n\nEn cas de litige non résolu, vous avez le droit de déposer une plainte auprès de l'autorité de protection des données compétente dans votre pays.", 'elite-atacora' ),
	],
];
?>

<main id="main">

  <!-- Hero -->
  <section class="ea-page-hero">
    <div class="ea-page-hero__blob-1" aria-hidden="true"></div>
    <div class="ea-container" style="position:relative;">
      <nav class="ea-breadcrumb" aria-label="<?php esc_attr_e( 'Fil d\'Ariane', 'elite-atacora' ); ?>">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Accueil', 'elite-atacora' ); ?></a>
        <span class="ea-breadcrumb__sep" aria-hidden="true">/</span>
        <span><?php esc_html_e( 'Politique de confidentialité', 'elite-atacora' ); ?></span>
      </nav>
      <div class="ea-page-hero__grid ea-page-hero__grid--no-image">
        <div class="ea-page-hero__content">
          <h1 class="ea-page-hero__heading" style="font-family:var(--font-serif);font-size:clamp(32px,5vw,64px);line-height:1.05;letter-spacing:-.02em;color:var(--ink);margin-top:24px;">
            <?php esc_html_e( 'Politique de', 'elite-atacora' ); ?>
            <em style="font-style:italic;color:var(--forest);"><?php esc_html_e( 'confidentialité.', 'elite-atacora' ); ?></em>
          </h1>
          <p class="ea-page-hero__subtitle">
            <?php
            /* translators: date the policy was last updated */
            printf(
              esc_html__( 'Dernière mise à jour : %s', 'elite-atacora' ),
              date_i18n( 'd F Y', strtotime( '2024-01-15' ) )
            );
            ?>
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- Intro -->
  <section class="ea-section" style="padding-bottom:0;">
    <div class="ea-container">
      <div class="ea-article__body" style="max-width:760px;margin-inline:auto;">
        <p style="font-size:18px;color:var(--coffee);line-height:1.7;">
          <?php esc_html_e( 'Elite Atacora s\'engage à protéger la vie privée de ses membres, bénéficiaires, partenaires et visiteurs. La présente politique décrit la nature des données collectées, leur utilisation et vos droits en matière de protection des données personnelles.', 'elite-atacora' ); ?>
        </p>
      </div>
    </div>
  </section>

  <!-- Table des matières -->
  <section class="ea-section" style="padding-top:32px;padding-bottom:0;">
    <div class="ea-container">
      <nav style="max-width:760px;margin-inline:auto;background:var(--paper);border-radius:16px;padding:32px;" aria-label="<?php esc_attr_e( 'Table des matières', 'elite-atacora' ); ?>">
        <div style="font-size:12px;text-transform:uppercase;letter-spacing:.12em;font-weight:700;color:var(--forest);margin-bottom:16px;"><?php esc_html_e( 'Sommaire', 'elite-atacora' ); ?></div>
        <ol style="margin:0;padding:0 0 0 20px;display:flex;flex-direction:column;gap:8px;">
          <?php foreach ( $sections as $sec ) : ?>
            <li>
              <a href="#section-<?php echo esc_attr( $sec['num'] ); ?>" style="color:var(--forest);font-size:14px;font-weight:500;text-decoration:none;transition:color 150ms ease;">
                <?php echo esc_html( $sec['title'] ); ?>
              </a>
            </li>
          <?php endforeach; ?>
        </ol>
      </nav>
    </div>
  </section>

  <!-- Sections -->
  <section class="ea-section">
    <div class="ea-container">
      <div class="ea-privacy-sections" style="max-width:760px;margin-inline:auto;display:flex;flex-direction:column;gap:48px;">
        <?php foreach ( $sections as $sec ) : ?>
          <div class="ea-privacy-section" id="section-<?php echo esc_attr( $sec['num'] ); ?>">
            <div style="display:flex;gap:20px;align-items:flex-start;">
              <div style="width:48px;height:48px;border-radius:50%;background:var(--forest);color:var(--cream);display:flex;align-items:center;justify-content:center;font-family:var(--font-serif);font-size:20px;font-weight:700;flex-shrink:0;" aria-hidden="true">
                <?php echo esc_html( $sec['num'] ); ?>
              </div>
              <div style="flex:1;">
                <h2 style="font-family:var(--font-serif);font-size:clamp(20px,2.5vw,28px);line-height:1.2;color:var(--ink);margin:0 0 16px;">
                  <?php echo esc_html( $sec['title'] ); ?>
                </h2>
                <div class="ea-article__body">
                  <?php
                  $paragraphs = explode( "\n\n", $sec['body'] );
                  foreach ( $paragraphs as $p ) {
                    $p = trim( $p );
                    if ( str_starts_with( $p, '•' ) ) {
                      $items = array_filter( array_map( 'trim', explode( "\n", $p ) ) );
                      echo '<ul style="margin:0 0 16px;padding-left:20px;">';
                      foreach ( $items as $item ) {
                        $item = ltrim( $item, '• ' );
                        echo '<li style="margin-bottom:6px;">' . esc_html( $item ) . '</li>';
                      }
                      echo '</ul>';
                    } else {
                      echo '<p>' . nl2br( esc_html( $p ) ) . '</p>';
                    }
                  }
                  ?>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- CTA -->
  <section class="ea-section" style="background:var(--paper);">
    <div class="ea-container" style="text-align:center;max-width:640px;margin-inline:auto;">
      <h2 style="font-family:var(--font-serif);font-size:clamp(24px,3vw,36px);color:var(--ink);margin-bottom:16px;">
        <?php esc_html_e( 'Des questions sur vos données ?', 'elite-atacora' ); ?>
      </h2>
      <p style="color:var(--muted);margin-bottom:28px;">
        <?php esc_html_e( 'Notre équipe est disponible pour répondre à toutes vos interrogations relatives à la protection de vos données personnelles.', 'elite-atacora' ); ?>
      </p>
      <?php ea_pill_button( __( 'Nous contacter', 'elite-atacora' ), ea_get_page_link( 'contact' ), 'primary' ); ?>
    </div>
  </section>

</main>

<?php get_footer(); ?>
