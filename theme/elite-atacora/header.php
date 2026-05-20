<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="profile" href="https://gmpg.org/xfn/11">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page">

<!-- ══════════════════════════════════════════════════════════
     HEADER
══════════════════════════════════════════════════════════ -->
<header class="ea-header" id="site-header" role="banner">
  <div class="ea-header__inner">

    <!-- Logo -->
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="ea-header__logo" rel="home" aria-label="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?> — <?php esc_html_e( 'Accueil', 'elite-atacora' ); ?>">
      <div class="ea-header__logo-mark">
        <?php
        if ( has_custom_logo() ) {
          the_custom_logo();
        } else {
          printf(
            '<img src="%s" alt="%s" width="40" height="40">',
            esc_url( get_template_directory_uri() . '/assets/img/logo.png' ),
            esc_attr( get_bloginfo( 'name' ) )
          );
        }
        ?>
      </div>
      <span class="ea-header__logo-text">Elite Atacora</span>
    </a>

    <!-- Desktop navigation -->
    <nav class="ea-nav" id="site-nav" aria-label="<?php esc_attr_e( 'Navigation principale', 'elite-atacora' ); ?>">
      <?php
      wp_nav_menu( [
        'theme_location' => 'primary',
        'menu_class'     => 'ea-nav__menu',
        'container'      => false,
        'fallback_cb'    => 'ea_primary_nav_fallback',
        'walker'         => new EA_Nav_Walker(),
        'depth'          => 2,
      ] );
      ?>
    </nav>

    <!-- Right area -->
    <div class="ea-header__right">

      <!-- Language switcher (stub — connect to WPML / Polylang) -->
      <div class="ea-lang" aria-label="<?php esc_attr_e( 'Langue', 'elite-atacora' ); ?>">
        <button class="ea-lang__btn is-active" lang="fr">FR</button>
        <button class="ea-lang__btn" lang="en">EN</button>
        <button class="ea-lang__btn" lang="pt">PT</button>
      </div>

      <!-- Adhérer CTA -->
      <a href="<?php echo esc_url( ea_get_page_link( 'adherer' ) ); ?>" class="ea-header-cta" aria-label="<?php esc_attr_e( 'Adhérer à Elite Atacora', 'elite-atacora' ); ?>">
        <?php esc_html_e( 'Adhérer', 'elite-atacora' ); ?>
        <span class="ea-header-cta__badge" aria-hidden="true">
          <svg width="11" height="9" viewBox="0 0 16 12" fill="none">
            <path d="M1 6 H14 M10 1.5 L14.5 6 L10 10.5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </span>
      </a>

      <!-- Burger (mobile) -->
      <button class="ea-burger" aria-label="<?php esc_attr_e( 'Ouvrir le menu', 'elite-atacora' ); ?>" aria-expanded="false" aria-controls="mobile-nav">
        <svg class="ea-burger__bars" width="16" height="12" viewBox="0 0 18 14" fill="none" aria-hidden="true">
          <path d="M0 1 H18 M0 7 H18 M0 13 H12" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
        </svg>
        <svg class="ea-burger__close" width="14" height="14" viewBox="0 0 16 16" fill="none" aria-hidden="true" style="display:none">
          <path d="M3 3 L13 13 M13 3 L3 13" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
        </svg>
      </button>
    </div>
  </div>

  <!-- Mobile navigation -->
  <nav class="ea-mobile-nav" id="mobile-nav" aria-label="<?php esc_attr_e( 'Navigation mobile', 'elite-atacora' ); ?>">
    <div class="ea-mobile-nav__inner">

      <?php
      $nav_items = [
        [
          'label' => __( "L'ONG", 'elite-atacora' ),
          'href'  => ea_get_page_link( 'a-propos' ),
          'key'   => 'ong',
          'children' => [
            [ 'label' => __( 'À propos', 'elite-atacora' ),    'href' => ea_get_page_link( 'a-propos' ) ],
            [ 'label' => __( 'Gouvernance', 'elite-atacora' ), 'href' => ea_get_page_link( 'gouvernance' ) ],
          ],
        ],
        [ 'label' => __( 'Nos actions', 'elite-atacora' ), 'href' => ea_get_page_link( 'nos-actions' ) ],
        [ 'label' => __( 'Actualités', 'elite-atacora' ),  'href' => get_permalink( get_option( 'page_for_posts' ) ) ?: home_url( '/actualites/' ) ],
        [ 'label' => __( 'Événements', 'elite-atacora' ),  'href' => ea_get_page_link( 'evenements' ) ],
        [ 'label' => __( 'Contact', 'elite-atacora' ),     'href' => ea_get_page_link( 'contact' ) ],
      ];

      foreach ( $nav_items as $item ) :
        $is_active = ea_is_nav_active( $item['key'] ?? '' );
      ?>
        <div>
          <a href="<?php echo esc_url( $item['href'] ); ?>"
             class="ea-mobile-nav__link<?php echo $is_active ? ' is-active' : ''; ?>"
             <?php echo $is_active ? 'aria-current="page"' : ''; ?>>
            <?php echo esc_html( $item['label'] ); ?>
            <?php if ( ! empty( $item['children'] ) ) : ?>
              <span aria-hidden="true" class="ea-mobile-nav__chevron">→</span>
            <?php endif; ?>
          </a>
          <?php if ( ! empty( $item['children'] ) ) : ?>
            <div class="ea-mobile-nav__children">
              <?php foreach ( $item['children'] as $child ) : ?>
                <a href="<?php echo esc_url( $child['href'] ); ?>" class="ea-mobile-nav__child">
                  — <?php echo esc_html( $child['label'] ); ?>
                </a>
              <?php endforeach; ?>
            </div>
          <?php endif; ?>
        </div>
      <?php endforeach; ?>

      <div class="ea-mobile-nav__footer">
        <div style="display:flex;align-items:center;gap:8px;font-size:12px;">
          <span style="padding:4px 8px;border-radius:999px;background:rgba(30,24,19,.05);font-weight:600;">FR</span>
          <span style="color:var(--muted);">EN</span>
          <span style="color:var(--muted);">PT</span>
        </div>
        <a href="<?php echo esc_url( ea_get_page_link( 'adherer' ) ); ?>"
           style="background:var(--forest);color:var(--cream);padding:10px 20px;border-radius:999px;font-size:13px;font-weight:600;text-decoration:none;">
          <?php esc_html_e( 'Adhérer →', 'elite-atacora' ); ?>
        </a>
      </div>
    </div>
  </nav>
</header>
<!-- /HEADER -->

<?php
/**
 * Nav fallback when no menu is assigned.
 */
function ea_primary_nav_fallback(): void {
  $items = [
    __( "À propos",    'elite-atacora' ) => ea_get_page_link( 'a-propos' ),
    __( 'Gouvernance', 'elite-atacora' ) => ea_get_page_link( 'gouvernance' ),
    __( 'Nos actions', 'elite-atacora' ) => ea_get_page_link( 'nos-actions' ),
    __( 'Actualités',  'elite-atacora' ) => home_url( '/actualites/' ),
    __( 'Événements',  'elite-atacora' ) => ea_get_page_link( 'evenements' ),
    __( 'Contact',     'elite-atacora' ) => ea_get_page_link( 'contact' ),
  ];
  foreach ( $items as $label => $url ) {
    printf(
      '<div class="ea-nav__item"><a href="%s" class="ea-nav__link">%s</a></div>',
      esc_url( $url ),
      esc_html( $label )
    );
  }
}

/**
 * Return the permalink of a page by its slug.
 */
function ea_get_page_link( string $slug ): string {
  $page = get_page_by_path( $slug );
  return $page ? get_permalink( $page ) : home_url( "/{$slug}/" );
}

/**
 * Determine if a nav key is the current page context.
 */
function ea_is_nav_active( string $key ): bool {
  if ( empty( $key ) ) return false;
  $slug = get_post_field( 'post_name', get_queried_object_id() );
  $map  = [
    'ong'        => [ 'a-propos', 'gouvernance' ],
    'nos-actions' => [ 'nos-actions' ],
    'evenements'  => [ 'evenements' ],
    'contact'     => [ 'contact' ],
    'adherer'     => [ 'adherer' ],
  ];
  return isset( $map[ $key ] ) && in_array( $slug, $map[ $key ], true );
}
?>
