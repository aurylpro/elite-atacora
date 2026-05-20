<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page">

<header class="site-header" role="banner">
    <div class="site-header__inner">

        <!-- ===== LOGO ===== -->
        <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo" aria-label="<?php echo esc_attr(get_bloginfo('name')); ?> – Accueil">
            <span class="site-logo__circle" aria-hidden="true">
                <?php
                $custom_logo_id = get_theme_mod('custom_logo');
                if ($custom_logo_id) :
                    $logo_src = wp_get_attachment_image_url($custom_logo_id, 'full');
                    echo '<img src="' . esc_url($logo_src) . '" alt="' . esc_attr(get_bloginfo('name')) . '" width="44" height="44" loading="eager">';
                else : ?>
                    <svg viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg" width="44" height="44">
                        <circle cx="22" cy="22" r="22" fill="var(--forest)"/>
                        <text x="22" y="28" text-anchor="middle" font-family="serif" font-size="18" font-weight="700" fill="var(--honey)">EA</text>
                    </svg>
                <?php endif; ?>
            </span>
            <span class="site-logo__name" style="font-family:var(--font-serif)">Elite Atacora</span>
        </a>

        <!-- ===== NAV ===== -->
        <?php
        $nav_items = [
            [
                'label' => "L'ONG",
                'href'  => home_url('/a-propos/'),
                'key'   => 'ong',
                'children' => [
                    ['label' => 'À propos',    'href' => home_url('/a-propos/'),    'desc' => 'Mission, vision, valeurs'],
                    ['label' => 'Gouvernance', 'href' => home_url('/gouvernance/'), 'desc' => 'Bureau Exécutif & organes'],
                ],
            ],
            ['label' => 'Nos actions', 'href' => home_url('/nos-actions/'), 'key' => 'nos-actions'],
            ['label' => 'Actualités',  'href' => home_url('/actualites/'),  'key' => 'actualites'],
            ['label' => 'Événements',  'href' => home_url('/evenements/'),  'key' => 'evenements'],
            ['label' => 'Contact',     'href' => home_url('/contact/'),     'key' => 'contact'],
        ];
        $current_url = home_url(add_query_arg([], $GLOBALS['wp']->request ?? ''));
        ?>
        <nav class="site-nav" role="navigation" aria-label="Navigation principale">
            <ul style="display:contents;">
                <?php foreach ($nav_items as $item) :
                    $has_sub = !empty($item['children']);
                    $is_active = strpos($current_url, $item['href']) !== false;
                    $li_class = 'nav__item' . ($has_sub ? ' nav__item--has-sub' : '');
                ?>
                <li class="<?php echo esc_attr($li_class); ?>">
                    <a href="<?php echo esc_url($item['href']); ?>"
                       class="nav__link<?php echo $is_active ? ' nav__link--active' : ''; ?>"
                       <?php if ($has_sub) : ?>aria-haspopup="true" aria-expanded="false"<?php endif; ?>>
                        <?php echo esc_html($item['label']); ?>
                        <?php if ($has_sub) : ?>
                        <svg class="nav__caret" width="10" height="6" viewBox="0 0 10 6" fill="none" aria-hidden="true">
                            <path d="M1 1l4 4 4-4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <?php endif; ?>
                    </a>
                    <?php if ($has_sub) : ?>
                    <div class="nav__dropdown" role="region">
                        <ul>
                            <?php foreach ($item['children'] as $child) : ?>
                            <li>
                                <a href="<?php echo esc_url($child['href']); ?>" class="nav__dropdown__link">
                                    <span class="nav__dropdown__title"><?php echo esc_html($child['label']); ?></span>
                                    <span class="nav__dropdown__desc"><?php echo esc_html($child['desc']); ?></span>
                                </a>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <?php endif; ?>
                </li>
                <?php endforeach; ?>
            </ul>
        </nav>

        <!-- ===== ACTIONS ===== -->
        <div class="header__actions">
            <!-- Language switcher -->
            <div class="lang-switcher" aria-label="Choisir la langue">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="lang-switcher__pill lang-switcher__pill--active" hreflang="fr" aria-current="true">FR</a>
                <a href="#" class="lang-switcher__pill" hreflang="en">EN</a>
                <a href="#" class="lang-switcher__pill" hreflang="pt">PT</a>
            </div>

            <!-- Adhérer CTA -->
            <a href="<?php echo esc_url(home_url('/adherer/')); ?>" class="btn-pill" aria-label="Adhérer à l'ONG Elite Atacora">
                Adhérer
                <span class="btn-pill__chip" aria-hidden="true">
                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none">
                        <path d="M2 7h10M8 3l4 4-4 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </span>
            </a>

            <!-- Mobile burger -->
            <button class="burger" aria-expanded="false" aria-controls="mobile-nav" aria-label="Ouvrir le menu">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                    <path class="burger__line burger__line--top"    d="M3 6h18"  stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                    <path class="burger__line burger__line--mid"    d="M3 12h18" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                    <path class="burger__line burger__line--bottom" d="M3 18h18" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                </svg>
            </button>
        </div>

    </div><!-- /.site-header__inner -->
</header>

<!-- ===== MOBILE NAV ===== -->
<nav class="mobile-nav" id="mobile-nav" aria-label="Menu mobile" aria-hidden="true">
    <div class="mobile-nav__inner">
        <ul class="mobile-nav__list">
            <?php foreach ($nav_items as $item) :
                $has_sub = !empty($item['children']);
            ?>
            <li class="mobile-nav__item<?php echo $has_sub ? ' mobile-nav__item--has-sub' : ''; ?>">
                <?php if ($has_sub) : ?>
                <button class="mobile-nav__link mobile-nav__toggle" aria-expanded="false">
                    <?php echo esc_html($item['label']); ?>
                    <svg width="10" height="6" viewBox="0 0 10 6" fill="none" aria-hidden="true">
                        <path d="M1 1l4 4 4-4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
                <ul class="mobile-nav__sub">
                    <?php foreach ($item['children'] as $child) : ?>
                    <li>
                        <a href="<?php echo esc_url($child['href']); ?>" class="mobile-nav__sub-link">
                            <span class="mobile-nav__sub-title"><?php echo esc_html($child['label']); ?></span>
                            <span class="mobile-nav__sub-desc"><?php echo esc_html($child['desc']); ?></span>
                        </a>
                    </li>
                    <?php endforeach; ?>
                </ul>
                <?php else : ?>
                <a href="<?php echo esc_url($item['href']); ?>" class="mobile-nav__link">
                    <?php echo esc_html($item['label']); ?>
                </a>
                <?php endif; ?>
            </li>
            <?php endforeach; ?>
        </ul>

        <div class="mobile-nav__footer">
            <div class="lang-switcher" aria-label="Choisir la langue">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="lang-switcher__pill lang-switcher__pill--active" hreflang="fr">FR</a>
                <a href="#" class="lang-switcher__pill" hreflang="en">EN</a>
                <a href="#" class="lang-switcher__pill" hreflang="pt">PT</a>
            </div>
            <a href="<?php echo esc_url(home_url('/adherer/')); ?>" class="btn btn--primary" style="width:100%;text-align:center;">
                Adhérer à l'ONG
            </a>
        </div>
    </div><!-- /.mobile-nav__inner -->
</nav>

<main id="main" role="main">
