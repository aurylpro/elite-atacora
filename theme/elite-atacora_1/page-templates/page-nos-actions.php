<?php
/**
 * Template Name: Nos Actions
 */
get_header(); ?>

<!-- PAGE HERO -->
<section class="page-hero bg-forest" aria-labelledby="actions-hero-title">
    <div class="container">
        <div class="page-hero__inner">
            <div class="page-hero__content">
                <span class="eyebrow eyebrow--cream">Nos actions · sur le terrain</span>
                <h1 id="actions-hero-title" class="page-hero__title" style="font-family:var(--font-serif);font-size:clamp(2.5rem,5vw,4rem);line-height:1.02;color:var(--cream);margin-top:1.25rem;">
                    Six domaines,
                    <em style="font-style:italic;color:var(--honey)">un seul cap : l'Atacora.</em>
                </h1>
                <p class="page-hero__subtitle" style="color:var(--cream);opacity:.85;max-width:540px;margin-top:1.25rem;line-height:1.7;">
                    Depuis 2018, Elite Atacora mène des actions concrètes et mesurables dans six domaines complémentaires pour transformer durablement les conditions de vie des femmes et enfants de l'Atacora.
                </p>
                <nav class="breadcrumb" aria-label="Fil d'Ariane">
                    <ol>
                        <li><a href="<?php echo esc_url(home_url('/')); ?>" style="color:var(--honey)">Accueil</a></li>
                        <li aria-current="page" style="color:var(--cream)">Nos actions</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>

<!-- ============================================================
     1. DOMAINES
     ============================================================ -->
<section class="section bg-cream" aria-labelledby="domaines-title">
    <div class="container">
        <div style="text-align:center;max-width:600px;margin:0 auto 3.5rem;">
            <span class="eyebrow eyebrow--terracotta">Six terrains d'engagement</span>
            <h2 id="domaines-title" style="font-family:var(--font-serif);font-size:clamp(2.25rem,4vw,3rem);line-height:1.05;color:var(--ink);margin-top:1.25rem;">
                Là où nous <em style="font-style:italic;color:var(--terracotta)">marchons.</em>
            </h2>
        </div>
        <div class="domaines-grid">

            <article class="domaine-card domaine-card--forest" aria-labelledby="domaine-01">
                <div class="domaine-card__num" style="font-family:var(--font-serif);color:var(--honey)">01</div>
                <h3 id="domaine-01" class="domaine-card__title" style="font-family:var(--font-serif)">Autonomisation des femmes rurales</h3>
                <p class="domaine-card__body">Formations en entrepreneuriat, accès au micro-crédit, sensibilisation aux droits des femmes et accompagnement personnalisé pour renforcer l'autonomie économique et sociale.</p>
                <a href="<?php echo esc_url(home_url('/nos-actions/autonomisation-femmes/')); ?>" class="domaine-card__link">
                    En savoir plus
                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" aria-hidden="true">
                        <path d="M2 7h10M8 3l4 4-4 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>
            </article>

            <article class="domaine-card domaine-card--terracotta" aria-labelledby="domaine-02">
                <div class="domaine-card__num" style="font-family:var(--font-serif);color:var(--cream)">02</div>
                <h3 id="domaine-02" class="domaine-card__title" style="font-family:var(--font-serif)">Scolarisation des enfants vulnérables</h3>
                <p class="domaine-card__body">Distribution de kits scolaires, bourses d'études, sensibilisation des familles et soutien au maintien des filles à l'école pour réduire l'abandon scolaire dans l'Atacora.</p>
                <a href="<?php echo esc_url(home_url('/nos-actions/scolarisation-enfants/')); ?>" class="domaine-card__link">
                    En savoir plus
                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" aria-hidden="true">
                        <path d="M2 7h10M8 3l4 4-4 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>
            </article>

            <article class="domaine-card" style="background:var(--honey);color:var(--ink);" aria-labelledby="domaine-03">
                <div class="domaine-card__num" style="font-family:var(--font-serif);color:var(--terracotta)">03</div>
                <h3 id="domaine-03" class="domaine-card__title" style="font-family:var(--font-serif)">Inclusion financière</h3>
                <p class="domaine-card__body" style="color:var(--coffee)">Développement des coopératives d'épargne communautaires, formation à la gestion financière et facilitation de l'accès aux services bancaires formels pour les populations rurales.</p>
                <a href="<?php echo esc_url(home_url('/nos-actions/inclusion-financiere/')); ?>" class="domaine-card__link" style="color:var(--terracotta)">
                    En savoir plus
                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" aria-hidden="true">
                        <path d="M2 7h10M8 3l4 4-4 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>
            </article>

            <article class="domaine-card" style="background:var(--ink);color:var(--cream);" aria-labelledby="domaine-04">
                <div class="domaine-card__num" style="font-family:var(--font-serif);color:var(--honey)">04</div>
                <h3 id="domaine-04" class="domaine-card__title" style="font-family:var(--font-serif)">Lutte contre les VBG</h3>
                <p class="domaine-card__body" style="color:var(--cream);opacity:.85;">Campagnes de sensibilisation communautaires, formation des acteurs locaux, prise en charge psychosociale des victimes de violences basées sur le genre.</p>
                <a href="<?php echo esc_url(home_url('/nos-actions/lutte-vbg/')); ?>" class="domaine-card__link" style="color:var(--honey)">
                    En savoir plus
                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" aria-hidden="true">
                        <path d="M2 7h10M8 3l4 4-4 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>
            </article>

            <article class="domaine-card" style="background:var(--paper);color:var(--ink);" aria-labelledby="domaine-05">
                <div class="domaine-card__num" style="font-family:var(--font-serif);color:var(--forest)">05</div>
                <h3 id="domaine-05" class="domaine-card__title" style="font-family:var(--font-serif)">Résilience climatique</h3>
                <p class="domaine-card__body" style="color:var(--coffee)">Promotion des pratiques agricoles durables, gestion des ressources en eau, reboisement et formation aux techniques d'adaptation au changement climatique.</p>
                <a href="<?php echo esc_url(home_url('/nos-actions/resilience-climatique/')); ?>" class="domaine-card__link" style="color:var(--forest)">
                    En savoir plus
                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" aria-hidden="true">
                        <path d="M2 7h10M8 3l4 4-4 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>
            </article>

            <article class="domaine-card" style="background:var(--paper);color:var(--ink);border:1.5px solid var(--terracotta);" aria-labelledby="domaine-06">
                <div class="domaine-card__num" style="font-family:var(--font-serif);color:var(--terracotta)">06</div>
                <h3 id="domaine-06" class="domaine-card__title" style="font-family:var(--font-serif)">Œuvres sociales &amp; culturelles</h3>
                <p class="domaine-card__body" style="color:var(--coffee)">Initiatives culturelles, sportives et sociales qui renforcent la cohésion des communautés, valorisent le patrimoine local et favorisent l'inclusion de tous.</p>
                <a href="<?php echo esc_url(home_url('/nos-actions/oeuvres-sociales/')); ?>" class="domaine-card__link" style="color:var(--terracotta)">
                    En savoir plus
                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" aria-hidden="true">
                        <path d="M2 7h10M8 3l4 4-4 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>
            </article>

        </div>
    </div>
</section>

<!-- ============================================================
     2. ZONES D'INTERVENTION
     ============================================================ -->
<section class="section bg-paper" aria-labelledby="zones-title">
    <div class="container">
        <div class="zones__inner">
            <div class="zones__left">
                <span class="eyebrow eyebrow--terracotta">Zones d'intervention</span>
                <h2 id="zones-title" style="font-family:var(--font-serif);font-size:clamp(2.25rem,4vw,3rem);line-height:1.05;color:var(--ink);margin-top:1.25rem;">
                    Six communes, <em style="font-style:italic;color:var(--terracotta)">un département.</em>
                </h2>
                <p style="color:var(--coffee);line-height:1.75;margin-top:1.5rem;">
                    Nos actions couvrent l'ensemble des six communes que nous avons identifiées comme prioritaires dans le département de l'Atacora, pour un impact maximal sur les populations les plus vulnérables du Nord-Bénin.
                </p>
            </div>
            <div class="zones__right">
                <div class="zones-grid">
                    <?php
                    $communes = [
                        ['name' => 'Natitingou', 'icon' => '🏛'],
                        ['name' => 'Tanguiéta',  'icon' => '🌿'],
                        ['name' => 'Boukombé',   'icon' => '⛰'],
                        ['name' => 'Cobly',      'icon' => '🌾'],
                        ['name' => 'Matéri',     'icon' => '💧'],
                        ['name' => 'Toucountouna','icon' => '🌳'],
                    ];
                    foreach ($communes as $commune) : ?>
                    <div class="zone-item">
                        <span class="zone-item__icon" aria-hidden="true">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/>
                                <circle cx="12" cy="10" r="3"/>
                            </svg>
                        </span>
                        <span class="zone-item__name"><?php echo esc_html($commune['name']); ?></span>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================================
     3. GALERIE PHOTOS
     ============================================================ -->
<section class="section bg-cream" aria-labelledby="galerie-title">
    <div class="container">
        <div style="text-align:center;max-width:600px;margin:0 auto 3rem;">
            <span class="eyebrow eyebrow--terracotta">Photothèque</span>
            <h2 id="galerie-title" style="font-family:var(--font-serif);font-size:clamp(2.25rem,4vw,3rem);line-height:1.05;color:var(--ink);margin-top:1.25rem;">
                Les <em style="font-style:italic;color:var(--terracotta)">visages</em> derrière les actions.
            </h2>
        </div>

        <?php
        $gallery_imgs = get_posts([
            'post_type'      => 'attachment',
            'numberposts'    => 8,
            'post_mime_type' => 'image',
            'post_status'    => 'inherit',
            'orderby'        => 'date',
            'order'          => 'DESC',
        ]);
        ?>
        <div class="gallery-grid" role="list" aria-label="Galerie de photos">
            <?php if (!empty($gallery_imgs)) :
                foreach ($gallery_imgs as $img) :
                    $img_url    = wp_get_attachment_image_url($img->ID, 'medium_large');
                    $img_full   = wp_get_attachment_image_url($img->ID, 'full');
                    $img_alt    = get_post_meta($img->ID, '_wp_attachment_image_alt', true) ?: get_the_title($img->ID);
                    $img_cap    = wp_get_attachment_caption($img->ID);
            ?>
            <div class="gallery-item" role="listitem" data-full="<?php echo esc_url($img_full); ?>" data-caption="<?php echo esc_attr($img_cap ?: $img_alt); ?>">
                <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($img_alt); ?>" loading="lazy" class="gallery-item__img">
                <div class="gallery-item__overlay" aria-hidden="true">
                    <span class="gallery-item__caption"><?php echo esc_html($img_cap ?: $img_alt); ?></span>
                    <span class="gallery-item__zoom">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                            <circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/>
                            <path d="M11 8v6M8 11h6" stroke-linecap="round"/>
                        </svg>
                    </span>
                </div>
            </div>
            <?php endforeach;
            else :
                for ($i = 1; $i <= 8; $i++) : ?>
                <div class="gallery-item gallery-item--placeholder" role="listitem" aria-label="Photo <?php echo esc_attr($i); ?>">
                    <div class="gallery-item__img" style="background:var(--paper);width:100%;aspect-ratio:4/3;display:flex;align-items:center;justify-content:center;">
                        <svg width="48" height="48" viewBox="0 0 48 48" fill="none" aria-hidden="true">
                            <rect x="4" y="10" width="40" height="30" rx="3" stroke="var(--muted)" stroke-width="1.5" fill="none"/>
                            <circle cx="16" cy="20" r="4" stroke="var(--muted)" stroke-width="1.5" fill="none"/>
                            <path d="M4 32l10-8 8 8 8-6 14 10" stroke="var(--muted)" stroke-width="1.5" fill="none"/>
                        </svg>
                    </div>
                    <div class="gallery-item__overlay" aria-hidden="true">
                        <span class="gallery-item__caption">Photo <?php echo esc_html($i); ?> — Elite Atacora</span>
                    </div>
                </div>
            <?php endfor;
            endif; ?>
        </div>

        <!-- Lightbox -->
        <div class="lightbox" id="gallery-lightbox" role="dialog" aria-modal="true" aria-label="Visionneuse photo" hidden>
            <button class="lightbox__close" aria-label="Fermer la visionneuse">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M18 6L6 18M6 6l12 12"/>
                </svg>
            </button>
            <img class="lightbox__img" src="" alt="" loading="lazy">
            <div class="lightbox__footer">
                <span class="lightbox__caption"></span>
            </div>
        </div>
    </div>
</section>

<!-- ============================================================
     4. VIDÉOS
     ============================================================ -->
<section class="section bg-paper" aria-labelledby="videos-title">
    <div class="container">
        <div style="text-align:center;max-width:600px;margin:0 auto 3rem;">
            <span class="eyebrow eyebrow--terracotta">Vidéos terrain</span>
            <h2 id="videos-title" style="font-family:var(--font-serif);font-size:clamp(2.25rem,4vw,3rem);line-height:1.05;color:var(--ink);margin-top:1.25rem;">
                <em style="font-style:italic;color:var(--terracotta)">Voir</em> nos actions.
            </h2>
        </div>
        <div class="videos-grid">
            <?php
            $videos = [
                ['title' => 'Séminaire régional ODD 5',           'desc' => 'Retour sur le séminaire dédié à l\'autonomisation des femmes rurales, réunissant 80 participantes de l\'Atacora.',       'thumb' => '', 'duration' => '12:34'],
                ['title' => 'Distribution de kits scolaires',     'desc' => 'Distribution de 240 kits complets aux enfants vulnérables de Boukombé pour la rentrée scolaire 2025-2026.',              'thumb' => '', 'duration' => '8:20'],
                ['title' => 'Atelier d\'alphabétisation — Tanguiéta','desc' => 'Témoignages des 35 femmes ayant participé à l\'atelier de six semaines en lecture, écriture et calcul de base.',      'thumb' => '', 'duration' => '6:45'],
            ];
            foreach ($videos as $video) : ?>
            <div class="video-card">
                <div class="video-card__thumb" aria-hidden="true">
                    <?php if (!empty($video['thumb'])) : ?>
                        <img src="<?php echo esc_url($video['thumb']); ?>" alt="" loading="lazy" class="video-card__thumb-img">
                    <?php else : ?>
                        <div class="video-card__thumb-placeholder" style="background:var(--forest);display:flex;align-items:center;justify-content:center;aspect-ratio:16/9;">
                            <svg width="56" height="56" viewBox="0 0 56 56" fill="none">
                                <circle cx="28" cy="28" r="27" stroke="var(--honey)" stroke-width="1"/>
                                <polygon points="22,18 42,28 22,38" fill="var(--honey)" opacity="0.8"/>
                            </svg>
                        </div>
                    <?php endif; ?>
                    <span class="video-card__play" aria-hidden="true">
                        <svg width="44" height="44" viewBox="0 0 44 44" fill="none">
                            <circle cx="22" cy="22" r="21" fill="rgba(0,0,0,0.5)"/>
                            <polygon points="17,14 33,22 17,30" fill="white"/>
                        </svg>
                    </span>
                    <span class="video-card__duration"><?php echo esc_html($video['duration']); ?></span>
                </div>
                <div class="video-card__body">
                    <h3 class="video-card__title" style="font-family:var(--font-serif)"><?php echo esc_html($video['title']); ?></h3>
                    <p class="video-card__desc"><?php echo esc_html($video['desc']); ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ============================================================
     5. CTA BÉNÉVOLAT
     ============================================================ -->
<section class="cta-banner cta-banner--terracotta section--tight" style="background:var(--terracotta);" aria-labelledby="actions-cta-title">
    <div class="container">
        <div class="cta-banner__inner">
            <div class="cta-banner__content">
                <span class="eyebrow eyebrow--cream">Rejoignez-nous</span>
                <h2 id="actions-cta-title" style="font-family:var(--font-serif);font-size:clamp(2rem,3.5vw,2.75rem);line-height:1.08;color:var(--cream);margin-top:1rem;">
                    Rejoignez-nous sur le <em style="font-style:italic;color:var(--honey)">terrain.</em>
                </h2>
                <p style="color:var(--cream);opacity:.85;margin-top:1rem;max-width:480px;">
                    Vous souhaitez contribuer directement à nos actions ? Rejoignez notre réseau de bénévoles et participez concrètement à la transformation de l'Atacora.
                </p>
            </div>
            <div class="cta-banner__actions">
                <a href="<?php echo esc_url(home_url('/adherer/')); ?>" class="btn btn--honey">Devenir bénévole</a>
                <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn--ondark">Nous contacter</a>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
