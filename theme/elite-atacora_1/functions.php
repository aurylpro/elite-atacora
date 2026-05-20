<?php
/**
 * Elite Atacora — functions.php
 * Thème WordPress custom · Design chaud et éditorial
 */

defined( 'ABSPATH' ) || exit;

define( 'ELITE_VERSION', '2.0.0' );
define( 'ELITE_DIR', get_template_directory() );
define( 'ELITE_URI', get_template_directory_uri() );

/* ============================================================
   1. SETUP DU THÈME
   ============================================================ */
add_action( 'after_setup_theme', 'elite_setup' );
function elite_setup() {
    load_theme_textdomain( 'elite-atacora', ELITE_DIR . '/languages' );

    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', [ 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'script', 'style' ] );
    add_theme_support( 'customize-selective-refresh-widgets' );
    add_theme_support( 'responsive-embeds' );
    add_theme_support( 'align-wide' );
    add_theme_support( 'editor-styles' );
    add_theme_support( 'wp-block-styles' );
    add_theme_support( 'custom-logo', [
        'height'      => 80,
        'width'       => 200,
        'flex-height' => true,
        'flex-width'  => true,
    ] );

    set_post_thumbnail_size( 1200, 630, true );
    add_image_size( 'elite-card',  800, 500, true );
    add_image_size( 'elite-thumb', 300, 300, true );
    add_image_size( 'elite-hero', 1440, 700, true );
    add_image_size( 'elite-portrait', 400, 500, true );

    register_nav_menus( [
        'primary' => __( 'Menu principal', 'elite-atacora' ),
        'footer'  => __( 'Menu footer',    'elite-atacora' ),
    ] );
}

/* ============================================================
   2. ENQUEUE STYLES & SCRIPTS
   ============================================================ */
add_action( 'wp_enqueue_scripts', 'elite_enqueue' );
function elite_enqueue() {
    // Google Fonts — DM Serif Display + Plus Jakarta Sans
    wp_enqueue_style(
        'elite-fonts',
        'https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap',
        [],
        null
    );

    wp_enqueue_style( 'elite-main',       ELITE_URI . '/assets/css/main.css',       [ 'elite-fonts' ], ELITE_VERSION );
    wp_enqueue_style( 'elite-responsive', ELITE_URI . '/assets/css/responsive.css', [ 'elite-main'  ], ELITE_VERSION );
    wp_enqueue_script( 'elite-main',      ELITE_URI . '/assets/js/main.js',         [],                ELITE_VERSION, true );
}

/* ============================================================
   3. MENUS — Walker personnalisé (ARIA + mobile)
   ============================================================ */
class Elite_Nav_Walker extends Walker_Nav_Menu {
    public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        $classes    = empty( $item->classes ) ? [] : (array) $item->classes;
        $is_current = in_array( 'current-menu-item', $classes );
        $has_sub    = $args->walker->has_children;

        $output .= '<li class="nav__item' . ( $has_sub ? ' nav__item--has-sub' : '' ) . '">';

        $atts = [
            'href'         => ! empty( $item->url ) ? $item->url : '#',
            'class'        => 'nav__link' . ( $is_current ? ' nav__link--active' : '' ),
            'aria-current' => $is_current ? 'page' : '',
        ];
        $atts_str = '';
        foreach ( $atts as $attr => $val ) {
            if ( $val ) $atts_str .= ' ' . $attr . '="' . esc_attr( $val ) . '"';
        }
        $output .= '<a' . $atts_str . '>' . esc_html( $item->title );
        if ( $has_sub ) {
            $output .= '<svg class="nav__caret" width="9" height="6" viewBox="0 0 9 6" fill="none" aria-hidden="true"><path d="M1 1 L4.5 5 L8 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>';
        }
        $output .= '</a>';
    }
    public function start_lvl( &$output, $depth = 0, $args = null ) {
        $output .= '<div class="nav__dropdown"><ul>';
    }
    public function end_lvl( &$output, $depth = 0, $args = null ) {
        $output .= '</ul></div>';
    }
}

/* ============================================================
   4. DÉSACTIVATIONS (sécurité + performance)
   ============================================================ */
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wp_shortlink_wp_head' );
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10 );
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
add_filter( 'xmlrpc_enabled', '__return_false' );
add_filter( 'show_admin_bar', '__return_false' );

add_filter( 'style_loader_src',  'elite_remove_ver', 9999 );
add_filter( 'script_loader_src', 'elite_remove_ver', 9999 );
function elite_remove_ver( $src ) {
    return strpos( $src, 'ver=' ) ? remove_query_arg( 'ver', $src ) : $src;
}

/* ============================================================
   5. EXCERPT
   ============================================================ */
add_filter( 'excerpt_length', fn() => 25 );
add_filter( 'excerpt_more',   fn() => '…' );

/* ============================================================
   6. SIDEBAR
   ============================================================ */
add_action( 'widgets_init', 'elite_widgets_init' );
function elite_widgets_init() {
    register_sidebar( [
        'name'          => __( 'Sidebar Blog', 'elite-atacora' ),
        'id'            => 'sidebar-blog',
        'before_widget' => '<div class="widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget__title">',
        'after_title'   => '</h3>',
    ] );
}

/* ============================================================
   7. BUREAU EXÉCUTIF
   ============================================================ */
function elite_get_bureau() {
    return [
        [ 'nom' => 'SANGA PEMA Tébouwa Gislaine épse KOUTI', 'poste' => 'Présidente',                              'initials' => 'SG' ],
        [ 'nom' => 'SIMBA Kado Alphonse',                     'poste' => 'Vice-Présidente',                        'initials' => 'SA' ],
        [ 'nom' => 'TOHOYESSOU AGOLI-AGBO Majoie Géroxie',    'poste' => 'Secrétaire Générale',                   'initials' => 'TM' ],
        [ 'nom' => 'LAFIA YAROU Djibril Adamou',               'poste' => 'Secrétaire Générale Adjointe',          'initials' => 'LD' ],
        [ 'nom' => 'OUIN-OURO Massopa Brigitte',               'poste' => 'Trésorière Générale',                   'initials' => 'OB' ],
        [ 'nom' => 'SINAISSIRE Chèrifatou',                    'poste' => 'Trésorière Générale Adjointe',          'initials' => 'SC' ],
        [ 'nom' => 'ZOUNTCHEGBE Yanick',                       'poste' => 'Chargée de la Communication',           'initials' => 'ZY' ],
        [ 'nom' => 'SOGAN Monique',                            'poste' => 'Chargée des Partenariats',              'initials' => 'SM' ],
        [ 'nom' => 'TOUNGAKOUAGOU Sabine épse SAMA',           'poste' => 'Chargée des ODD',                       'initials' => 'TS' ],
    ];
}
function elite_get_surveillance() {
    return [
        [ 'nom' => 'ATIOGBE SODOKIN Gélase', 'poste' => 'Présidente du Conseil de Surveillance', 'initials' => 'AG' ],
        [ 'nom' => 'BEKOUSSANRI Sylvère',     'poste' => 'Secrétaire du Conseil de Surveillance', 'initials' => 'BS' ],
    ];
}

/* ============================================================
   8. SHORTCODES
   ============================================================ */
add_shortcode( 'elite_tarifs', 'elite_tarifs_shortcode' );
function elite_tarifs_shortcode() {
    ob_start(); ?>
    <div class="pricing-boxes">
        <div class="pricing-box">
            <div class="pricing-box__label">Droit d'adhésion</div>
            <div class="pricing-box__amount">5 000</div>
            <div class="pricing-box__unit">FCFA · unique</div>
        </div>
        <div class="pricing-box">
            <div class="pricing-box__label">Cotisation</div>
            <div class="pricing-box__amount">2 000</div>
            <div class="pricing-box__unit">FCFA / mois</div>
        </div>
        <div class="pricing-box">
            <div class="pricing-box__label">Annuelle</div>
            <div class="pricing-box__amount">24 000</div>
            <div class="pricing-box__unit">FCFA / an</div>
        </div>
    </div>
    <?php return ob_get_clean();
}

/* ============================================================
   9. PAGINATION
   ============================================================ */
function elite_pagination() {
    $pages = paginate_links( [
        'type'      => 'array',
        'prev_text' => '← Précédent',
        'next_text' => 'Suivant →',
    ] );
    if ( ! $pages ) return;
    echo '<nav class="pagination" aria-label="Navigation entre les pages"><ul class="pagination__list">';
    foreach ( $pages as $page ) echo '<li class="pagination__item">' . $page . '</li>';
    echo '</ul></nav>';
}

/* ============================================================
   10. OPEN GRAPH META (complément Yoast)
   ============================================================ */
add_action( 'wp_head', 'elite_meta_tags', 1 );
function elite_meta_tags() {
    if ( function_exists( 'wpseo_head' ) ) return;
    ?>
    <meta name="description" content="ONG béninoise engagée pour l'autonomisation des femmes rurales, l'éducation de qualité et la résilience des communautés du département de l'Atacora.">
    <meta property="og:site_name" content="ONG Elite Atacora">
    <meta property="og:locale" content="fr_BJ">
    <meta property="og:type" content="website">
    <?php
}

add_theme_support( 'yoast-seo-breadcrumbs' );
