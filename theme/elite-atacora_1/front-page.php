<?php get_header(); ?>

<!-- ============================================================
     HERO
     ============================================================ -->
<section class="hero" aria-label="Section principale">
    <div class="hero__blob-1" aria-hidden="true"></div>
    <div class="hero__blob-2" aria-hidden="true"></div>

    <div class="container">
        <div class="hero__inner">

            <!-- LEFT: Content -->
            <div class="hero__content">
                <span class="eyebrow">ONG · République du Bénin · Atacora</span>

                <h1 class="hero__title" style="font-family:var(--font-serif)">
                    Pour les <em style="font-style:italic;color:var(--terracotta)">femmes</em>,<br>
                    pour les <em style="font-style:italic;color:var(--terracotta)">enfants</em>,<br>
                    pour l'Atacora.
                </h1>

                <p class="hero__subtitle">
                    Elite Atacora est une ONG apolitique et à but non lucratif engagée pour l'autonomisation des femmes rurales, la scolarisation des enfants vulnérables et le développement durable des communautés du Nord-Bénin.
                </p>

                <div class="hero__ctas">
                    <a href="<?php echo esc_url(home_url('/nos-actions/')); ?>" class="btn btn--primary">Découvrir nos actions</a>
                    <a href="<?php echo esc_url(home_url('/adherer/')); ?>" class="btn btn--outline">Devenir membre</a>
                </div>
                <a href="<?php echo esc_url(home_url('/a-propos/')); ?>" class="hero__link">
                    En savoir plus sur l'ONG
                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" aria-hidden="true">
                        <path d="M2 7h10M8 3l4 4-4 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>

                <div class="hero__credentials" role="list">
                    <div class="hero__cred" role="listitem">
                        <span class="hero__cred-label">Fondée le</span>
                        <span class="hero__cred-value">8 jan 2018</span>
                    </div>
                    <div class="hero__cred" role="listitem">
                        <span class="hero__cred-label">Statut</span>
                        <span class="hero__cred-value">ONG apolitique</span>
                    </div>
                    <div class="hero__cred" role="listitem">
                        <span class="hero__cred-label">Cadre légal</span>
                        <span class="hero__cred-value">Loi 2025-19</span>
                    </div>
                </div>
            </div><!-- /.hero__content -->

            <!-- RIGHT: Visual -->
            <div class="hero__visual" aria-hidden="true">
                <div class="hero__arch">
                    <?php
                    $hero_img = get_theme_mod('elite_hero_image');
                    if ($hero_img) :
                        echo '<img src="' . esc_url($hero_img) . '" alt="Femmes de l\'Atacora" class="hero__arch-img" loading="eager">';
                    elseif (has_post_thumbnail(get_option('page_on_front'))) :
                        echo get_the_post_thumbnail(get_option('page_on_front'), 'large', ['class' => 'hero__arch-img', 'loading' => 'eager']);
                    else : ?>
                        <div class="hero__arch-placeholder" style="background:var(--paper);width:100%;height:100%;display:flex;align-items:center;justify-content:center;">
                            <svg width="80" height="80" viewBox="0 0 80 80" fill="none">
                                <circle cx="40" cy="40" r="38" stroke="var(--honey)" stroke-width="1.5" stroke-dasharray="6 4"/>
                                <circle cx="40" cy="30" r="14" fill="var(--muted)" opacity="0.3"/>
                                <ellipse cx="40" cy="62" rx="22" ry="12" fill="var(--muted)" opacity="0.2"/>
                            </svg>
                        </div>
                    <?php endif; ?>
                    <div class="hero__arch__overlay"></div>
                    <div class="hero__arch__caption">Atacora · Nord-Bénin</div>
                </div>

                <!-- Floating impact badge -->
                <div class="hero__badge-impact" role="img" aria-label="Impact 2025 : plus de 3 200 bénéficiaires">
                    <span class="hero__badge-impact-label">Impact 2025</span>
                    <span class="hero__badge-impact-number">+3 200</span>
                    <span class="hero__badge-impact-text">bénéficiaires</span>
                </div>

                <!-- Second photo medallion -->
                <div class="hero__medallion" aria-hidden="true">
                    <?php
                    $med_img = get_theme_mod('elite_hero_medallion');
                    if ($med_img) :
                        echo '<img src="' . esc_url($med_img) . '" alt="" loading="lazy">';
                    else : ?>
                        <div style="width:100%;height:100%;background:var(--forest);border-radius:50%;display:flex;align-items:center;justify-content:center;">
                            <svg width="36" height="36" viewBox="0 0 36 36" fill="none">
                                <path d="M18 4C10.268 4 4 10.268 4 18s6.268 14 14 14 14-6.268 14-14S25.732 4 18 4z" fill="var(--honey)" opacity="0.3"/>
                                <path d="M12 22c0-3.314 2.686-6 6-6s6 2.686 6 6" stroke="var(--honey)" stroke-width="1.5" fill="none"/>
                                <circle cx="18" cy="14" r="4" fill="var(--honey)" opacity="0.6"/>
                            </svg>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- ODD badge -->
                <div class="hero__badge-odd" aria-label="Objectifs de Développement Durable 4 et 5">
                    <span class="hero__badge-odd-label">ODD</span>
                    <span class="hero__badge-odd-numbers">4 · 5</span>
                </div>

                <!-- Deco circle -->
                <svg class="hero__deco-circle floaty" viewBox="0 0 160 160" fill="none" aria-hidden="true">
                    <circle cx="80" cy="80" r="78" stroke="var(--honey)" stroke-width="1" stroke-dasharray="6 5" opacity="0.4"/>
                    <circle cx="80" cy="80" r="60" stroke="var(--honey)" stroke-width="0.75" stroke-dasharray="4 6" opacity="0.25"/>
                </svg>

            </div><!-- /.hero__visual -->

        </div><!-- /.hero__inner -->
    </div><!-- /.container -->
</section>

<!-- ============================================================
     MARQUEE BAR
     ============================================================ -->
<div class="marquee-bar bg-forest" role="marquee" aria-label="Annonces en cours">
    <div class="marquee-bar__label">
        <span class="marquee-bar__pulse" aria-hidden="true"></span>
        <span>En cours</span>
    </div>
    <div class="marquee-bar__overflow">
        <div class="marquee-bar__track">
            <?php
            $announcements = [
                'Atelier de formation en alphabétisation — Natitingou · juin 2026',
                'Distribution de kits scolaires — Boukombé · Rentrée 2026',
                'Séminaire ODD 5 — Autonomisation des femmes rurales',
                'Campagne de sensibilisation VBG — 6 communes · Atacora',
                'Appel à candidatures bénévoles — Clôture 30 juin 2026',
            ];
            // Repeat twice for seamless loop
            for ($r = 0; $r < 2; $r++) :
                foreach ($announcements as $ann) : ?>
                <span class="marquee-bar__item"><?php echo esc_html($ann); ?></span>
                <span class="marquee-bar__sep" aria-hidden="true">✦</span>
            <?php endforeach; endfor; ?>
        </div>
    </div>
</div>

<!-- ============================================================
     CHIFFRES CLÉS
     ============================================================ -->
<section class="keyfigures section" aria-labelledby="keyfigures-title">
    <div class="container">
        <div class="section-header" style="text-align:center;max-width:640px;margin:0 auto 3.5rem;">
            <span class="eyebrow eyebrow--terracotta">Nos chiffres clés</span>
            <h2 id="keyfigures-title" style="font-family:var(--font-serif);font-size:clamp(2.25rem,4vw,3rem);line-height:1.05;color:var(--ink);margin-top:1.25rem;">
                Sept années d'<em style="font-style:italic;color:var(--terracotta)">engagement</em><br>mesurées en impact.
            </h2>
        </div>

        <div class="keyfigures__grid">
            <!-- 2018 -->
            <div class="stat-card stat-card--forest">
                <div class="stat-card__number" style="font-family:var(--font-serif)">2018</div>
                <div class="stat-card__label">Année de fondation</div>
                <div class="stat-card__note">Godomey Togoudo</div>
            </div>
            <!-- Projets -->
            <div class="stat-card stat-card--sand">
                <div class="stat-card__number" style="font-family:var(--font-serif)">
                    <span data-counter="24" data-suffix="+">24+</span>
                </div>
                <div class="stat-card__label">Projets menés</div>
                <div class="stat-card__note">depuis 2018</div>
            </div>
            <!-- Communes -->
            <div class="stat-card stat-card--terracotta">
                <div class="stat-card__number" style="font-family:var(--font-serif)">
                    <span data-counter="6">6</span>
                </div>
                <div class="stat-card__label">Communes couvertes</div>
                <div class="stat-card__note">département Atacora</div>
            </div>
            <!-- Bénéficiaires -->
            <div class="stat-card stat-card--honey">
                <div class="stat-card__number" style="font-family:var(--font-serif)">
                    <span data-counter="3200" data-suffix="+">3 200+</span>
                </div>
                <div class="stat-card__label">Bénéficiaires directs</div>
                <div class="stat-card__note">femmes &amp; enfants</div>
            </div>
        </div>

    </div>
</section>

<!-- ============================================================
     MISSION + VALEURS
     ============================================================ -->
<section class="mission-values section bg-paper" aria-labelledby="mission-title">
    <div class="mission-values__deco" aria-hidden="true">
        <svg viewBox="0 0 300 300" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="150" cy="150" r="148" stroke="var(--honey)" stroke-width="1" stroke-dasharray="6 5" opacity="0.3"/>
            <circle cx="150" cy="150" r="110" stroke="var(--terracotta)" stroke-width="0.75" stroke-dasharray="4 6" opacity="0.2"/>
        </svg>
    </div>

    <div class="container">
        <div class="mission-values__inner">

            <!-- MISSION -->
            <div class="mission-col">
                <span class="eyebrow eyebrow--terracotta">Notre mission · Article 4</span>
                <h2 id="mission-title" style="font-family:var(--font-serif);font-size:clamp(2rem,3.5vw,2.75rem);line-height:1.08;color:var(--ink);margin-top:1.25rem;">
                    Marcher aux côtés des <em style="font-style:italic;color:var(--terracotta)">femmes</em>,
                    former les <em style="font-style:italic;color:var(--terracotta)">enfants</em>,
                    faire grandir les <em style="font-style:italic;color:var(--terracotta)">communautés</em>.
                </h2>
                <div class="mission__body-wrap">
                    <div class="mission__bar" aria-hidden="true"></div>
                    <p class="mission__body">
                        Fondée le 8 janvier 2018 à Godomey Togoudo, Elite Atacora est une organisation non gouvernementale apolitique dont la vocation est de contribuer au développement socio-économique et culturel du département de l'Atacora en République du Bénin. Notre action cible en priorité les femmes rurales, les enfants vulnérables et les communautés marginalisées.
                    </p>
                </div>
                <div class="mission__ctas">
                    <a href="<?php echo esc_url(home_url('/a-propos/')); ?>" class="btn btn--outline">Lire nos statuts</a>
                    <a href="<?php echo esc_url(home_url('/gouvernance/')); ?>" class="btn btn--outline">Notre gouvernance</a>
                </div>
            </div>

            <!-- VALUES -->
            <div class="values-col">
                <span class="eyebrow">Nos cinq valeurs · Article 6</span>
                <?php
                $valeurs = [
                    ['icon' => '✦', 'name' => 'Excellence',       'body' => 'Nous visons l'excellence dans chaque projet, chaque formation et chaque action menée sur le terrain.'],
                    ['icon' => '◈', 'name' => 'Professionnalisme','body' => 'Notre équipe agit avec rigueur, méthode et responsabilité pour garantir des résultats durables.'],
                    ['icon' => '✺', 'name' => 'Transparence',     'body' => 'Nous rendons compte à nos membres, partenaires et bénéficiaires avec honnêteté et ouverture.'],
                    ['icon' => '❀', 'name' => 'Esprit d\'équipe',  'body' => 'Ensemble, nous sommes plus forts. La solidarité interne reflète notre engagement communautaire.'],
                    ['icon' => '❖', 'name' => 'Intégrité',        'body' => 'Nos actes sont alignés avec nos paroles. L'éthique guide chacune de nos décisions.'],
                ];
                ?>
                <ul class="values__list" role="list">
                    <?php foreach ($valeurs as $val) : ?>
                    <li class="value-item" role="listitem">
                        <span class="value-item__icon" aria-hidden="true"><?php echo esc_html($val['icon']); ?></span>
                        <div class="value-item__content">
                            <strong class="value-item__name"><?php echo esc_html($val['name']); ?></strong>
                            <p class="value-item__body"><?php echo esc_html($val['body']); ?></p>
                        </div>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>

        </div>
    </div>
</section>

<!-- ============================================================
     ACTUALITÉS
     ============================================================ -->
<section class="news-section section" aria-labelledby="news-title">
    <div class="container">
        <div class="section-header">
            <span class="eyebrow eyebrow--terracotta">Nos actualités</span>
            <h2 id="news-title" style="font-family:var(--font-serif);font-size:clamp(2.25rem,4vw,3rem);line-height:1.05;color:var(--ink);margin-top:1.25rem;">
                Les dernières <em style="font-style:italic;color:var(--terracotta)">nouvelles</em> de l'ONG.
            </h2>
            <a href="<?php echo esc_url(home_url('/actualites/')); ?>" class="section-header__link">
                Toutes les actualités
                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" aria-hidden="true">
                    <path d="M2 7h10M8 3l4 4-4 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </a>
        </div>

        <div class="news-grid">
            <?php
            $news_query = new WP_Query([
                'post_type'      => 'post',
                'posts_per_page' => 3,
                'post_status'    => 'publish',
            ]);

            if ($news_query->have_posts()) :
                while ($news_query->have_posts()) : $news_query->the_post();
                    $cats       = get_the_category();
                    $cat_name   = $cats ? esc_html($cats[0]->name) : 'Actualité';
                    $word_count = str_word_count(wp_strip_all_tags(get_the_content()));
                    $read_time  = max(1, round($word_count / 200));
                    ?>
                    <article class="news-card" aria-labelledby="news-<?php the_ID(); ?>">
                        <div class="news-card__image-wrap">
                            <?php if (has_post_thumbnail()) : ?>
                                <a href="<?php the_permalink(); ?>" tabindex="-1" aria-hidden="true">
                                    <?php the_post_thumbnail('medium_large', ['class' => 'news-card__img', 'loading' => 'lazy']); ?>
                                </a>
                            <?php else : ?>
                                <div class="news-card__img-placeholder" aria-hidden="true"></div>
                            <?php endif; ?>
                            <span class="news-card__tag"><?php echo $cat_name; ?></span>
                            <span class="news-card__read-time"><?php echo esc_html($read_time); ?> min</span>
                        </div>
                        <div class="news-card__body">
                            <time class="news-card__date" datetime="<?php echo esc_attr(get_the_date('Y-m-d')); ?>">
                                <?php echo esc_html(get_the_date('j F Y')); ?>
                            </time>
                            <h3 class="news-card__title" id="news-<?php the_ID(); ?>" style="font-family:var(--font-serif)">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h3>
                            <p class="news-card__excerpt"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                            <div class="news-card__footer">
                                <a href="<?php the_permalink(); ?>" class="news-card__cta">
                                    Lire l'article
                                    <span class="news-card__arrow" aria-hidden="true">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                                            <circle cx="10" cy="10" r="9" stroke="currentColor" stroke-width="1.2"/>
                                            <path d="M7 10h6M10 7l3 3-3 3" stroke="currentColor" stroke-width="1.2" stroke-linecap="round"/>
                                        </svg>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </article>
                <?php endwhile;
                wp_reset_postdata();
            else :
                // Placeholder cards when no posts
                $placeholders = [
                    ['title' => 'Séminaire sur les ODD 5 — Natitingou 2026', 'cat' => 'Événements', 'date' => '12 mai 2026', 'excerpt' => 'Plus de 80 femmes rurales ont participé au séminaire régional sur les Objectifs de Développement Durable organisé par Elite Atacora.'],
                    ['title' => 'Distribution de kits scolaires à Boukombé',  'cat' => 'Actions',    'date' => '3 avril 2026',  'excerpt' => 'L\'ONG a remis 240 kits scolaires complets aux enfants vulnérables de la commune de Boukombé lors de la rentrée 2025-2026.'],
                    ['title' => 'Atelier d\'alphabétisation — Tanguiéta',     'cat' => 'Formation',  'date' => '18 mars 2026',  'excerpt' => 'Un atelier de six semaines a permis à 35 femmes de la commune de Tanguiéta d\'acquérir les bases de la lecture et du calcul.'],
                ];
                foreach ($placeholders as $ph) : ?>
                <article class="news-card">
                    <div class="news-card__image-wrap">
                        <div class="news-card__img-placeholder" aria-hidden="true"></div>
                        <span class="news-card__tag"><?php echo esc_html($ph['cat']); ?></span>
                        <span class="news-card__read-time">3 min</span>
                    </div>
                    <div class="news-card__body">
                        <time class="news-card__date"><?php echo esc_html($ph['date']); ?></time>
                        <h3 class="news-card__title" style="font-family:var(--font-serif)"><?php echo esc_html($ph['title']); ?></h3>
                        <p class="news-card__excerpt"><?php echo esc_html($ph['excerpt']); ?></p>
                        <div class="news-card__footer">
                            <a href="<?php echo esc_url(home_url('/actualites/')); ?>" class="news-card__cta">
                                Lire l'article
                                <span class="news-card__arrow" aria-hidden="true">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                                        <circle cx="10" cy="10" r="9" stroke="currentColor" stroke-width="1.2"/>
                                        <path d="M7 10h6M10 7l3 3-3 3" stroke="currentColor" stroke-width="1.2" stroke-linecap="round"/>
                                    </svg>
                                </span>
                            </a>
                        </div>
                    </div>
                </article>
                <?php endforeach;
            endif; ?>
        </div>
    </div>
</section>

<!-- ============================================================
     ÉVÉNEMENTS
     ============================================================ -->
<section class="events-section bg-forest section" aria-labelledby="events-title">
    <div class="events-section__deco" aria-hidden="true">
        <svg viewBox="0 0 300 300" fill="none">
            <circle cx="150" cy="150" r="148" stroke="var(--honey)" stroke-width="1" stroke-dasharray="6 5" opacity="0.2"/>
            <circle cx="150" cy="150" r="110" stroke="var(--honey)" stroke-width="0.75" stroke-dasharray="4 6" opacity="0.15"/>
            <circle cx="150" cy="150" r="72"  stroke="var(--honey)" stroke-width="0.5" stroke-dasharray="3 7" opacity="0.12"/>
        </svg>
    </div>

    <div class="container">
        <div class="section-header">
            <span class="eyebrow eyebrow--cream">Agenda · prochains rendez-vous</span>
            <h2 id="events-title" style="font-family:var(--font-serif);font-size:clamp(2.25rem,4vw,3rem);line-height:1.05;color:var(--cream);margin-top:1.25rem;">
                Venez nous <em style="font-style:italic;color:var(--honey)">rencontrer.</em>
            </h2>
            <a href="<?php echo esc_url(home_url('/evenements/')); ?>" class="section-header__link section-header__link--light">
                Voir tout l'agenda
                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" aria-hidden="true">
                    <path d="M2 7h10M8 3l4 4-4 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </a>
        </div>

        <div class="events-grid">
            <?php
            // Try The Events Calendar plugin
            $has_tec = function_exists('tribe_get_events');
            $tec_events = $has_tec ? tribe_get_events(['posts_per_page' => 3, 'start_date' => date('Y-m-d')]) : [];

            if (!empty($tec_events)) :
                $featured = $tec_events[0];
                $sidebar_events = array_slice($tec_events, 1, 2);
            else :
                // Static placeholder events
                $featured = null;
                $sidebar_events = [];
            endif;
            ?>

            <!-- Featured event -->
            <div class="event-featured">
                <div class="event-featured__img-wrap">
                    <?php if ($featured && has_post_thumbnail($featured->ID)) :
                        echo get_the_post_thumbnail($featured->ID, 'medium_large', ['class' => 'event-featured__img', 'loading' => 'lazy', 'alt' => '']);
                    else : ?>
                        <div class="event-featured__img-placeholder" aria-hidden="true"></div>
                    <?php endif; ?>
                    <span class="event-featured__featured-badge">À la une</span>
                </div>
                <div class="event-featured__content">
                    <?php if ($featured) :
                        $start = tribe_get_start_date($featured->ID, false, 'Y-m-d');
                        $day   = date('d', strtotime($start));
                        $month = date('M', strtotime($start));
                    else :
                        $day = '14'; $month = 'Juin';
                    endif; ?>
                    <div class="event-featured__date-chip" aria-label="Date : <?php echo esc_attr($day . ' ' . $month); ?>">
                        <span class="event-featured__date-day"><?php echo esc_html($day); ?></span>
                        <span class="event-featured__date-month"><?php echo esc_html($month); ?></span>
                    </div>
                    <div class="event-featured__meta">
                        <span class="event-featured__type">
                            <?php echo $featured ? esc_html(implode(', ', wp_get_post_terms($featured->ID, 'tribe_events_cat', ['fields' => 'names']))) : 'Séminaire'; ?>
                        </span>
                        <span class="event-featured__time">
                            <?php echo $featured ? esc_html(tribe_get_start_time($featured->ID)) : '09h00'; ?>
                        </span>
                    </div>
                    <h3 class="event-featured__title" style="font-family:var(--font-serif)">
                        <?php echo $featured ? esc_html($featured->post_title) : 'Séminaire régional ODD 5 — Autonomisation des femmes'; ?>
                    </h3>
                    <p class="event-featured__place">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/>
                        </svg>
                        <?php echo $featured ? esc_html(tribe_get_venue($featured->ID)) : 'Natitingou, Atacora · Bénin'; ?>
                    </p>
                    <a href="<?php echo $featured ? esc_url(get_permalink($featured->ID)) : esc_url(home_url('/evenements/')); ?>" class="btn btn--honey">
                        Voir cet événement
                    </a>
                </div>
            </div><!-- /.event-featured -->

            <!-- Sidebar events -->
            <div class="events-sidebar">
                <?php
                $sidebar_placeholders = [
                    ['title' => 'Distribution de kits scolaires — Boukombé', 'type' => 'Action terrain', 'time' => '08h00', 'place' => 'Boukombé, Atacora', 'day' => '28', 'month' => 'Juin'],
                    ['title' => 'Atelier alphabétisation — Tanguiéta',        'type' => 'Formation',     'time' => '10h00', 'place' => 'Tanguiéta, Atacora', 'day' => '5',  'month' => 'Juil'],
                ];
                for ($si = 0; $si < 2; $si++) :
                    $ev = !empty($sidebar_events[$si]) ? $sidebar_events[$si] : null;
                    $ph = $sidebar_placeholders[$si];
                    $ev_day   = $ev ? date('d', strtotime(tribe_get_start_date($ev->ID, false, 'Y-m-d'))) : $ph['day'];
                    $ev_month = $ev ? date('M', strtotime(tribe_get_start_date($ev->ID, false, 'Y-m-d'))) : $ph['month'];
                    $ev_title = $ev ? $ev->post_title : $ph['title'];
                    $ev_type  = $ev ? implode(', ', wp_get_post_terms($ev->ID, 'tribe_events_cat', ['fields' => 'names'])) : $ph['type'];
                    $ev_time  = $ev ? tribe_get_start_time($ev->ID) : $ph['time'];
                    $ev_place = $ev ? tribe_get_venue($ev->ID) : $ph['place'];
                    $ev_url   = $ev ? get_permalink($ev->ID) : home_url('/evenements/');
                ?>
                <a href="<?php echo esc_url($ev_url); ?>" class="event-card">
                    <div class="event-card__date" aria-label="<?php echo esc_attr($ev_day . ' ' . $ev_month); ?>">
                        <span class="event-card__day"><?php echo esc_html($ev_day); ?></span>
                        <span class="event-card__month"><?php echo esc_html($ev_month); ?></span>
                    </div>
                    <div class="event-card__content">
                        <div class="event-card__meta">
                            <span class="event-card__type"><?php echo esc_html($ev_type); ?></span>
                            <span class="event-card__time"><?php echo esc_html($ev_time); ?></span>
                        </div>
                        <h4 class="event-card__title" style="font-family:var(--font-serif)"><?php echo esc_html($ev_title); ?></h4>
                        <span class="event-card__place">
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/>
                            </svg>
                            <?php echo esc_html($ev_place); ?>
                        </span>
                    </div>
                </a>
                <?php endfor; ?>
            </div><!-- /.events-sidebar -->

        </div><!-- /.events-grid -->
    </div>
</section>

<!-- ============================================================
     CTA ADHÉSION
     ============================================================ -->
<section class="join-cta section" aria-labelledby="join-title">
    <div class="container">
        <div class="join-cta__box bg-honey">
            <div class="join-cta__left">
                <span class="eyebrow eyebrow--terracotta">Rejoindre l'ONG</span>
                <h2 id="join-title" style="font-family:var(--font-serif);font-size:clamp(2rem,3.5vw,2.75rem);line-height:1.08;color:var(--ink);margin-top:1.25rem;">
                    Et si vous deveniez membre de la <em style="font-style:italic;color:var(--terracotta)">communauté</em> ?
                </h2>
                <p style="color:var(--coffee);margin:1.5rem 0;">
                    Adhérer à Elite Atacora, c'est rejoindre une communauté engagée pour l'Atacora. Droits d'adhésion : 5 000 FCFA. Cotisation annuelle : 2 000 FCFA. Processus de validation sous 7 jours.
                </p>
                <div class="join-cta__ctas">
                    <a href="<?php echo esc_url(home_url('/adherer/')); ?>" class="btn btn--primary">Postuler maintenant</a>
                    <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn--outline">Nous écrire</a>
                </div>
            </div>

            <div class="join-cta__right">
                <div class="join-cta__process">
                    <p class="join-cta__process-label" style="font-family:var(--font-serif);font-weight:600;margin-bottom:1.5rem;color:var(--ink)">
                        Comment adhérer ?
                    </p>
                    <ol class="join-cta__steps">
                        <li class="join-cta__step">
                            <span class="join-cta__step-num">01</span>
                            <span class="join-cta__step-text">Remplissez le formulaire d'adhésion en ligne</span>
                        </li>
                        <li class="join-cta__step">
                            <span class="join-cta__step-num">02</span>
                            <span class="join-cta__step-text">Recevez l'avis du Bureau Exécutif sous 7 jours</span>
                        </li>
                        <li class="join-cta__step">
                            <span class="join-cta__step-num">03</span>
                            <span class="join-cta__step-text">Réglez les droits d'adhésion et la cotisation</span>
                        </li>
                        <li class="join-cta__step">
                            <span class="join-cta__step-num">04</span>
                            <span class="join-cta__step-text">Recevez votre carte de membre officielle</span>
                        </li>
                    </ol>
                </div>
            </div>

            <div class="join-cta__box-deco" aria-hidden="true">
                <svg viewBox="0 0 200 200" fill="none">
                    <circle cx="100" cy="100" r="98" stroke="var(--terracotta)" stroke-width="1" stroke-dasharray="5 4" opacity="0.3"/>
                    <circle cx="100" cy="100" r="70"  stroke="var(--terracotta)" stroke-width="0.75" stroke-dasharray="4 5" opacity="0.2"/>
                </svg>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
