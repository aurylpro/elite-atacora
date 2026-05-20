<?php
/**
 * Elite Atacora — functions.php
 * Theme setup, enqueue, nav, custom post types, helpers.
 */

defined( 'ABSPATH' ) || exit;

/* ──────────────────────────────────────────────────────────────
   THEME SETUP
─────────────────────────────────────────────────────────────── */

function ea_theme_setup(): void {
	load_theme_textdomain( 'elite-atacora', get_template_directory() . '/languages' );

	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', [ 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ] );
	add_theme_support( 'customize-selective-refresh-widgets' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support(
		'custom-logo',
		[
			'height'      => 80,
			'width'       => 80,
			'flex-height' => true,
			'flex-width'  => true,
		]
	);

	add_image_size( 'ea-hero',      1400, 900,  true );
	add_image_size( 'ea-card',      800,  640,  true );
	add_image_size( 'ea-portrait',  480,  600,  true );
	add_image_size( 'ea-thumb',     200,  200,  true );
	add_image_size( 'ea-wide',      1200, 675,  true );

	register_nav_menus(
		[
			'primary'  => __( 'Menu principal', 'elite-atacora' ),
			'footer-1' => __( 'Footer — L\'ONG', 'elite-atacora' ),
			'footer-2' => __( 'Footer — Ressources', 'elite-atacora' ),
		]
	);
}
add_action( 'after_setup_theme', 'ea_theme_setup' );

/* ──────────────────────────────────────────────────────────────
   ENQUEUE STYLES & SCRIPTS
─────────────────────────────────────────────────────────────── */

function ea_enqueue_assets(): void {
	$ver = wp_get_theme()->get( 'Version' );

	// Google Fonts
	wp_enqueue_style(
		'ea-google-fonts',
		'https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap',
		[],
		null
	);

	// Main stylesheet
	wp_enqueue_style( 'elite-atacora-style', get_template_directory_uri() . '/style.css', [], $ver );

	// Component CSS
	wp_enqueue_style(
		'ea-main',
		get_template_directory_uri() . '/assets/css/main.css',
		[ 'elite-atacora-style' ],
		$ver
	);

	// Responsive CSS
	wp_enqueue_style(
		'ea-responsive',
		get_template_directory_uri() . '/assets/css/responsive.css',
		[ 'ea-main' ],
		$ver
	);

	// Main JS (deferred)
	wp_enqueue_script(
		'ea-main',
		get_template_directory_uri() . '/assets/js/main.js',
		[],
		$ver,
		[ 'strategy' => 'defer', 'in_footer' => true ]
	);

	// Pass AJAX URL to JS
	wp_localize_script( 'ea-main', 'eaData', [
		'ajaxUrl' => admin_url( 'admin-ajax.php' ),
		'nonce'   => wp_create_nonce( 'ea_nonce' ),
		'homeUrl' => home_url( '/' ),
	] );
}
add_action( 'wp_enqueue_scripts', 'ea_enqueue_assets' );

/* ──────────────────────────────────────────────────────────────
   CUSTOM POST TYPE — Événements (ea_event)
─────────────────────────────────────────────────────────────── */

function ea_register_post_types(): void {
	register_post_type(
		'ea_event',
		[
			'labels'        => [
				'name'               => __( 'Événements', 'elite-atacora' ),
				'singular_name'      => __( 'Événement', 'elite-atacora' ),
				'add_new_item'       => __( 'Ajouter un événement', 'elite-atacora' ),
				'edit_item'          => __( 'Modifier l\'événement', 'elite-atacora' ),
				'new_item'           => __( 'Nouvel événement', 'elite-atacora' ),
				'view_item'          => __( 'Voir l\'événement', 'elite-atacora' ),
				'search_items'       => __( 'Rechercher des événements', 'elite-atacora' ),
				'not_found'          => __( 'Aucun événement trouvé', 'elite-atacora' ),
			],
			'public'        => true,
			'has_archive'   => false,
			'menu_icon'     => 'dashicons-calendar-alt',
			'menu_position' => 5,
			'supports'      => [ 'title', 'editor', 'thumbnail', 'custom-fields', 'excerpt' ],
			'show_in_rest'  => true,
			'rewrite'       => [ 'slug' => 'evenements' ],
		]
	);
}
add_action( 'init', 'ea_register_post_types' );

/* ──────────────────────────────────────────────────────────────
   CUSTOM TAXONOMY — Catégorie actualité
─────────────────────────────────────────────────────────────── */

function ea_register_taxonomies(): void {
	register_taxonomy(
		'ea_news_cat',
		'post',
		[
			'labels'            => [
				'name'          => __( 'Catégories Actualités', 'elite-atacora' ),
				'singular_name' => __( 'Catégorie', 'elite-atacora' ),
			],
			'hierarchical'      => true,
			'show_admin_column' => true,
			'show_in_rest'      => true,
			'rewrite'           => [ 'slug' => 'categorie' ],
		]
	);

	register_taxonomy(
		'ea_event_type',
		'ea_event',
		[
			'labels'       => [
				'name'          => __( 'Types d\'événements', 'elite-atacora' ),
				'singular_name' => __( 'Type', 'elite-atacora' ),
			],
			'hierarchical' => false,
			'show_in_rest' => true,
			'rewrite'      => [ 'slug' => 'type-evenement' ],
		]
	);
}
add_action( 'init', 'ea_register_taxonomies' );

/* ──────────────────────────────────────────────────────────────
   NAV WALKER — Dropdown nav with ARIA
─────────────────────────────────────────────────────────────── */

class EA_Nav_Walker extends Walker_Nav_Menu {

	public function start_lvl( &$output, $depth = 0, $args = null ): void {
		$output .= '<div class="ea-dropdown" role="region">';
		$output .= '<ul class="ea-dropdown__list">';
	}

	public function end_lvl( &$output, $depth = 0, $args = null ): void {
		$output .= '</ul></div>';
	}

	public function start_el( &$output, $data_object, $depth = 0, $args = null, $current_object_id = 0 ): void {
		$item    = $data_object;
		$classes = empty( $item->classes ) ? [] : (array) $item->classes;

		$has_children = in_array( 'menu-item-has-children', $classes, true );

		if ( $depth === 0 ) {
			$output .= '<div class="ea-nav__item' . ( $has_children ? ' ea-nav__item--has-children' : '' ) . '">';
		}

		$atts            = [];
		$atts['href']    = ! empty( $item->url ) ? esc_url( $item->url ) : '#';
		$atts['class']   = 'ea-nav__link';
		if ( $has_children ) {
			$atts['aria-haspopup'] = 'true';
			$atts['aria-expanded'] = 'false';
		}
		if ( in_array( 'current-menu-item', $classes, true ) || in_array( 'current-menu-ancestor', $classes, true ) ) {
			$atts['aria-current'] = 'page';
			$atts['class']       .= ' is-active';
		}

		$attrs_str = '';
		foreach ( $atts as $attr => $value ) {
			$attrs_str .= ' ' . esc_attr( $attr ) . '="' . esc_attr( $value ) . '"';
		}

		$title = apply_filters( 'the_title', $item->title, $item->ID );

		if ( $depth === 0 ) {
			$chevron = $has_children
				? '<svg class="ea-nav__chevron" width="9" height="6" viewBox="0 0 9 6" fill="none" aria-hidden="true"><path d="M1 1 L4.5 5 L8 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>'
				: '';
			$output .= '<a' . $attrs_str . '>' . esc_html( $title ) . $chevron . '</a>';
		} else {
			// Dropdown child item
			$output .= '<li class="ea-dropdown__item"><a href="' . esc_url( $item->url ) . '" class="ea-dropdown__link">';
			$output .= '<span class="ea-dropdown__link-title">' . esc_html( $title ) . '</span>';
			if ( ! empty( $item->description ) ) {
				$output .= '<span class="ea-dropdown__link-desc">' . esc_html( $item->description ) . '</span>';
			}
			$output .= '</a>';
		}
	}

	public function end_el( &$output, $data_object, $depth = 0, $args = null ): void {
		if ( $depth === 0 ) {
			$output .= '</div>';
		} else {
			$output .= '</li>';
		}
	}
}

/* ──────────────────────────────────────────────────────────────
   HELPER FUNCTIONS
─────────────────────────────────────────────────────────────── */

/**
 * Render the eyebrow label (small uppercase label + line).
 */
function ea_eyebrow( string $text, string $color = 'forest' ): void {
	$color_class = match ( $color ) {
		'terracotta' => 'ea-eyebrow--terracotta',
		'honey'      => 'ea-eyebrow--honey',
		'cream'      => 'ea-eyebrow--cream',
		default      => 'ea-eyebrow--forest',
	};
	printf(
		'<div class="ea-eyebrow %s"><span class="ea-eyebrow__line"></span><span>%s</span></div>',
		esc_attr( $color_class ),
		esc_html( $text )
	);
}

/**
 * Render a pill button / CTA link.
 * $variant: primary | secondary | outline | honey | ghost | onDark
 */
function ea_pill_button( string $label, string $url = '#', string $variant = 'primary', bool $arrow = true, string $extra_class = '' ): void {
	printf(
		'<a href="%s" class="ea-btn ea-btn--%s %s">
			<span>%s</span>
			%s
		</a>',
		esc_url( $url ),
		esc_attr( $variant ),
		esc_attr( $extra_class ),
		esc_html( $label ),
		$arrow ? '<svg class="ea-btn__arrow" width="14" height="12" viewBox="0 0 16 12" fill="none" aria-hidden="true"><path d="M1 6 H14 M10 1.5 L14.5 6 L10 10.5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>' : ''
	);
}

/**
 * Return the arrow SVG icon.
 */
function ea_arrow_icon( int $size = 13 ): string {
	return sprintf(
		'<svg class="ea-arrow-icon" width="%1$d" height="%2$d" viewBox="0 0 16 12" fill="none" aria-hidden="true"><path d="M1 6 H14 M10 1.5 L14.5 6 L10 10.5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>',
		$size,
		(int) round( $size * 0.78 )
	);
}

/**
 * Return event meta stored in post meta.
 * Keys: ea_event_date (YYYY-MM-DD), ea_event_time, ea_event_place, ea_event_type, ea_event_featured.
 */
function ea_get_event_meta( int $post_id ): array {
	return [
		'date'     => get_post_meta( $post_id, 'ea_event_date', true ),
		'time'     => get_post_meta( $post_id, 'ea_event_time', true ) ?: '',
		'place'    => get_post_meta( $post_id, 'ea_event_place', true ) ?: '',
		'type'     => get_post_meta( $post_id, 'ea_event_type', true ) ?: '',
		'featured' => (bool) get_post_meta( $post_id, 'ea_event_featured', true ),
	];
}

/**
 * Render a counter span that JS will animate on scroll.
 */
function ea_counter( int $to, string $suffix = '' ): void {
	printf(
		'<span class="ea-counter tabular" data-to="%d" data-suffix="%s">0%s</span>',
		$to,
		esc_attr( $suffix ),
		esc_html( $suffix )
	);
}

/**
 * Return news tag background/text classes.
 */
function ea_news_tag_class( string $tag ): string {
	return match ( $tag ) {
		'Programme', 'Rapport', 'Partenariat' => 'ea-tag--forest',
		'Témoignage'                           => 'ea-tag--terracotta',
		'Terrain', 'Presse'                    => 'ea-tag--honey',
		default                                => 'ea-tag--forest',
	};
}

/* ──────────────────────────────────────────────────────────────
   SIDEBARS
─────────────────────────────────────────────────────────────── */

function ea_register_sidebars(): void {
	register_sidebar(
		[
			'name'          => __( 'Barre latérale Article', 'elite-atacora' ),
			'id'            => 'sidebar-article',
			'description'   => __( 'Widgets affichés sur les articles.', 'elite-atacora' ),
			'before_widget' => '<div class="ea-sidebar-widget">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="ea-sidebar-widget__title">',
			'after_title'   => '</h3>',
		]
	);
}
add_action( 'widgets_init', 'ea_register_sidebars' );

/* ──────────────────────────────────────────────────────────────
   EXCERPT LENGTH
─────────────────────────────────────────────────────────────── */

function ea_excerpt_length( int $length ): int {
	return 25;
}
add_filter( 'excerpt_length', 'ea_excerpt_length' );

function ea_excerpt_more( string $more ): string {
	return '…';
}
add_filter( 'excerpt_more', 'ea_excerpt_more' );

/* ──────────────────────────────────────────────────────────────
   READING TIME
─────────────────────────────────────────────────────────────── */

function ea_reading_time( int $post_id ): int {
	$content    = get_post_field( 'post_content', $post_id );
	$word_count = str_word_count( strip_tags( $content ) );
	return max( 1, (int) ceil( $word_count / 200 ) );
}

/* ──────────────────────────────────────────────────────────────
   CLEAN UP WP HEAD
─────────────────────────────────────────────────────────────── */

remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wp_shortlink_wp_head' );

/* ──────────────────────────────────────────────────────────────
   CF7 SHORTCODE FALLBACK (if Contact Form 7 not installed)
─────────────────────────────────────────────────────────────── */

if ( ! function_exists( 'wpcf7_contact_form' ) ) {
	function ea_cf7_fallback( string $msg = '' ): string {
		$default = __( 'Veuillez installer le plugin Contact Form 7 pour activer ce formulaire.', 'elite-atacora' );
		return '<p class="ea-cf7-notice">' . esc_html( $msg ?: $default ) . '</p>';
	}
}

/* ──────────────────────────────────────────────────────────────
   DOCUMENT TITLE SEPARATOR
─────────────────────────────────────────────────────────────── */

function ea_document_title_separator(): string {
	return '—';
}
add_filter( 'document_title_separator', 'ea_document_title_separator' );

/* ──────────────────────────────────────────────────────────────
   BODY CLASSES
─────────────────────────────────────────────────────────────── */

function ea_body_classes( array $classes ): array {
	if ( is_singular() && ! is_front_page() ) {
		$classes[] = 'ea-single';
	}
	if ( is_front_page() ) {
		$classes[] = 'ea-home';
	}
	return $classes;
}
add_filter( 'body_class', 'ea_body_classes' );
