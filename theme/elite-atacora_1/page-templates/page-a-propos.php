<?php
/**
 * Template Name: À propos
 */
get_header(); ?>

<!-- PAGE HERO -->
<section class="page-hero bg-forest" aria-labelledby="page-hero-title">
    <div class="container">
        <div class="page-hero__inner">
            <div class="page-hero__content">
                <span class="eyebrow eyebrow--cream">L'ONG · à propos</span>
                <h1 id="page-hero-title" class="page-hero__title" style="font-family:var(--font-serif);font-size:clamp(2.5rem,5vw,4rem);line-height:1.02;color:var(--cream);margin-top:1.25rem;">
                    Connaître
                    <em style="font-style:italic;color:var(--honey)">celles et ceux qui font Elite Atacora.</em>
                </h1>
                <p class="page-hero__subtitle" style="color:var(--cream);opacity:.85;max-width:540px;margin-top:1.25rem;line-height:1.7;">
                    Fondée en 2018, Elite Atacora est une organisation non gouvernementale apolitique enracinée dans le département de l'Atacora, portée par des valeurs d'excellence, d'intégrité et de service aux communautés.
                </p>
                <nav class="breadcrumb" aria-label="Fil d'Ariane">
                    <ol>
                        <li><a href="<?php echo esc_url(home_url('/')); ?>" style="color:var(--honey)">Accueil</a></li>
                        <li aria-current="page" style="color:var(--cream)">À propos</li>
                    </ol>
                </nav>
            </div>
            <div class="page-hero__image" aria-hidden="true">
                <?php if (has_post_thumbnail()) : the_post_thumbnail('large', ['loading' => 'eager', 'alt' => '']);
                else : ?>
                    <div class="page-hero__img-placeholder"></div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<!-- ============================================================
     1. HISTORIQUE
     ============================================================ -->
<section class="section bg-paper" aria-labelledby="historique-title">
    <div class="container">
        <div class="historique__inner">
            <div class="historique__left">
                <span class="eyebrow eyebrow--terracotta">Notre histoire</span>
                <h2 id="historique-title" style="font-family:var(--font-serif);font-size:clamp(2.25rem,4vw,3rem);line-height:1.05;color:var(--ink);margin-top:1.25rem;">
                    Sept ans à <em style="font-style:italic;color:var(--terracotta)">marcher</em> avec l'Atacora.
                </h2>
                <p style="color:var(--coffee);line-height:1.75;margin-top:1.5rem;">
                    Née d'une conviction partagée par ses fondateurs, Elite Atacora a grandi année après année, étendant progressivement son action à six communes du département, multipliant les projets et les partenariats, et forgeant une identité forte au service des populations les plus vulnérables.
                </p>
            </div>
            <div class="historique__right">
                <div class="timeline">
                    <div class="timeline__line" aria-hidden="true"></div>
                    <ul class="timeline__list" role="list">
                        <li class="timeline__item">
                            <span class="timeline__dot" aria-hidden="true"></span>
                            <span class="timeline__year">2018</span>
                            <strong class="timeline__title">Fondation de l'ONG</strong>
                            <p class="timeline__body">Création officielle d'Elite Atacora à Godomey Togoudo, Cotonou, le 8 janvier 2018. Adoption des premiers statuts et constitution du Bureau Exécutif fondateur.</p>
                        </li>
                        <li class="timeline__item">
                            <span class="timeline__dot" aria-hidden="true"></span>
                            <span class="timeline__year">2020</span>
                            <strong class="timeline__title">Premiers programmes terrain</strong>
                            <p class="timeline__body">Lancement des premières actions d'envergure dans l'Atacora : distribution de kits scolaires, ateliers d'alphabétisation et formations en autonomisation économique.</p>
                        </li>
                        <li class="timeline__item">
                            <span class="timeline__dot" aria-hidden="true"></span>
                            <span class="timeline__year">2023</span>
                            <strong class="timeline__title">Reconnaissance & partenariats</strong>
                            <p class="timeline__body">Élargissement du réseau de partenaires institutionnels et locaux. Couverture de six communes du département. Plus de 2 000 bénéficiaires atteints.</p>
                        </li>
                        <li class="timeline__item">
                            <span class="timeline__dot" aria-hidden="true"></span>
                            <span class="timeline__year">2026</span>
                            <strong class="timeline__title">Révision des statuts</strong>
                            <p class="timeline__body">Mise en conformité avec la loi n°2025-19 du 22 juillet 2025 relative aux associations et ONG en République du Bénin. Nouveau cadre légal renforcé.</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================================
     2. MISSION / VISION
     ============================================================ -->
<section class="section" aria-labelledby="mission-vision-title">
    <div class="container">
        <div class="mission-vision-grid">
            <article class="mission-card" aria-labelledby="mission-card-title">
                <span class="eyebrow eyebrow--cream">Mission · Article 4</span>
                <h2 id="mission-card-title" style="font-family:var(--font-serif);font-size:clamp(1.75rem,3vw,2.5rem);line-height:1.1;margin-top:1rem;">
                    Contribuer au <em style="font-style:italic;">développement</em> socio-économique et culturel.
                </h2>
                <p style="line-height:1.75;margin-top:1.5rem;opacity:.9;">
                    Elite Atacora a pour mission de contribuer au développement socio-économique, culturel et durable du département de l'Atacora en République du Bénin, en ciblant en priorité les femmes rurales, les enfants vulnérables et les communautés marginalisées, par des actions concrètes et mesurables.
                </p>
                <p class="mission-card__note">Article 4 &amp; 5 des Statuts de l'ONG Elite Atacora</p>
            </article>
            <article class="vision-card" aria-labelledby="vision-card-title">
                <span class="eyebrow eyebrow--terracotta">Vision</span>
                <h2 id="vision-card-title" style="font-family:var(--font-serif);font-size:clamp(1.75rem,3vw,2.5rem);line-height:1.1;color:var(--ink);margin-top:1rem;">
                    Une Atacora où chaque <em style="font-style:italic;color:var(--forest)">femme</em> et chaque <em style="font-style:italic;color:var(--forest)">enfant</em> vit dignement.
                </h2>
                <p style="line-height:1.75;margin-top:1.5rem;color:var(--coffee);">
                    Nous imaginons un département de l'Atacora où les femmes exercent pleinement leur autonomie économique, où les enfants ont accès à une éducation de qualité et où les communautés disposent des ressources et compétences pour tracer leur propre avenir.
                </p>
            </article>
        </div>
    </div>
</section>

<!-- ============================================================
     3. OBJECTIFS
     ============================================================ -->
<section class="section bg-cream" aria-labelledby="objectifs-title">
    <div class="container">
        <div style="text-align:center;max-width:600px;margin:0 auto 3.5rem;">
            <span class="eyebrow eyebrow--terracotta">Article 5</span>
            <h2 id="objectifs-title" style="font-family:var(--font-serif);font-size:clamp(2.25rem,4vw,3rem);line-height:1.05;color:var(--ink);margin-top:1.25rem;">
                Six objectifs <em style="font-style:italic;color:var(--terracotta)">opérationnels.</em>
            </h2>
        </div>
        <?php
        $objectifs = [
            ['n' => '01', 'denom' => '/ 06', 'title' => 'Autonomisation des femmes',     'body' => 'Promouvoir et renforcer l\'autonomie économique, sociale et politique des femmes rurales de l\'Atacora par des formations, l\'accès au micro-crédit et l\'accompagnement à l\'entrepreneuriat.'],
            ['n' => '02', 'denom' => '/ 06', 'title' => 'Scolarisation des enfants',     'body' => 'Favoriser l\'accès et le maintien des enfants vulnérables à l\'école par des dotations en kits scolaires, des bourses et un soutien aux familles en situation précaire.'],
            ['n' => '03', 'denom' => '/ 06', 'title' => 'Inclusion financière',          'body' => 'Développer l\'accès aux services financiers formels et informels pour les populations rurales, notamment à travers les coopératives d\'épargne et de crédit communautaires.'],
            ['n' => '04', 'denom' => '/ 06', 'title' => 'Lutte contre les VBG',          'body' => 'Sensibiliser et lutter contre les violences basées sur le genre par des campagnes communautaires, des formations et un accompagnement des victimes.'],
            ['n' => '05', 'denom' => '/ 06', 'title' => 'Résilience climatique',         'body' => 'Soutenir les pratiques agricoles durables et la gestion des ressources naturelles pour renforcer la résilience des communautés face aux changements climatiques.'],
            ['n' => '06', 'denom' => '/ 06', 'title' => 'Œuvres sociales & culturelles', 'body' => 'Encourager les initiatives culturelles, sportives et sociales qui renforcent la cohésion et l\'identité des communautés de l\'Atacora.'],
        ];
        ?>
        <div class="objectifs-grid">
            <?php foreach ($objectifs as $obj) : ?>
            <div class="objectif-card">
                <div class="objectif-card__index">
                    <span class="objectif-card__n"><?php echo esc_html($obj['n']); ?></span>
                    <span class="objectif-card__denom"><?php echo esc_html($obj['denom']); ?></span>
                </div>
                <h3 class="objectif-card__title" style="font-family:var(--font-serif)"><?php echo esc_html($obj['title']); ?></h3>
                <p class="objectif-card__body"><?php echo esc_html($obj['body']); ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ============================================================
     4. VALEURS
     ============================================================ -->
<section class="section bg-paper" aria-labelledby="valeurs-title">
    <div class="container">
        <div style="text-align:center;max-width:600px;margin:0 auto 3.5rem;">
            <span class="eyebrow eyebrow--terracotta">Article 6</span>
            <h2 id="valeurs-title" style="font-family:var(--font-serif);font-size:clamp(2.25rem,4vw,3rem);line-height:1.05;color:var(--ink);margin-top:1.25rem;">
                La <em style="font-style:italic;color:var(--terracotta)">boussole</em> de nos actions.
            </h2>
        </div>
        <?php
        $valeurs_page = [
            ['icon' => '✦', 'name' => 'Excellence',        'idx' => '01', 'body' => 'Nous visons l'excellence dans chaque projet, chaque formation et chaque action menée sur le terrain, pour un impact durable et mesurable.'],
            ['icon' => '◈', 'name' => 'Professionnalisme', 'idx' => '02', 'body' => 'Notre équipe agit avec rigueur, méthode et responsabilité pour garantir des résultats à la hauteur des besoins des communautés.'],
            ['icon' => '✺', 'name' => 'Transparence',      'idx' => '03', 'body' => 'Nous rendons compte à nos membres, partenaires et bénéficiaires avec honnêteté et ouverture totale sur nos activités et finances.'],
            ['icon' => '❀', 'name' => 'Esprit d\'équipe',  'idx' => '04', 'body' => 'Ensemble, nous sommes plus forts. La solidarité interne reflète et nourrit notre engagement communautaire au quotidien.'],
            ['icon' => '❖', 'name' => 'Intégrité',         'idx' => '05', 'body' => 'Nos actes sont alignés avec nos paroles et nos engagements. L'éthique guide chacune de nos décisions, sans compromis.'],
        ];
        ?>
        <div class="values-grid-5">
            <?php foreach ($valeurs_page as $val) : ?>
            <div class="objectif-card objectif-card--value">
                <div class="objectif-card__index">
                    <span class="objectif-card__n"><?php echo esc_html($val['idx']); ?></span>
                    <span class="objectif-card__denom">/ 05</span>
                </div>
                <div class="objectif-card__icon" aria-hidden="true" style="font-size:1.75rem;margin:1rem 0 .5rem;"><?php echo esc_html($val['icon']); ?></div>
                <h3 class="objectif-card__title" style="font-family:var(--font-serif)"><?php echo esc_html($val['name']); ?></h3>
                <p class="objectif-card__body"><?php echo esc_html($val['body']); ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ============================================================
     5. LOGO & SIGNIFICATION
     ============================================================ -->
<section class="section bg-cream" aria-labelledby="logo-title">
    <div class="container">
        <div class="logo-meaning">
            <div class="logo-meaning__frame">
                <?php
                $logo_id = get_theme_mod('custom_logo');
                if ($logo_id) :
                    echo '<img src="' . esc_url(wp_get_attachment_image_url($logo_id, 'medium')) . '" alt="Logo Elite Atacora" class="logo-meaning__img" loading="lazy">';
                else : ?>
                    <div class="logo-meaning__placeholder" aria-hidden="true">
                        <svg viewBox="0 0 120 120" fill="none" width="120" height="120">
                            <circle cx="60" cy="60" r="58" fill="var(--forest)"/>
                            <text x="60" y="72" text-anchor="middle" font-family="serif" font-size="38" font-weight="700" fill="var(--honey)">EA</text>
                        </svg>
                    </div>
                <?php endif; ?>
            </div>
            <div class="logo-meaning__content">
                <span class="eyebrow eyebrow--terracotta">Notre identité visuelle</span>
                <h2 id="logo-title" style="font-family:var(--font-serif);font-size:clamp(2rem,3.5vw,2.75rem);line-height:1.08;color:var(--ink);margin-top:1.25rem;">
                    Une femme qui gravit, <em style="font-style:italic;color:var(--terracotta)">un symbole d'avenir.</em>
                </h2>
                <p style="color:var(--coffee);line-height:1.75;margin:1.5rem 0;">
                    Le logo d'Elite Atacora n'est pas un simple emblème. Il raconte l'histoire d'une femme déterminée qui s'élève, pas à pas, vers un avenir meilleur — symbole de résilience, de dignité et de progrès collectif pour toutes les communautés de l'Atacora.
                </p>
                <div class="logo-meaning__elements">
                    <div class="logo-meaning__element">
                        <strong class="logo-meaning__element-title">La femme</strong>
                        <p class="logo-meaning__element-body">Représentation de la femme rurale de l'Atacora, actrice centrale du changement et première bénéficiaire des actions de l'ONG.</p>
                    </div>
                    <div class="logo-meaning__element">
                        <strong class="logo-meaning__element-title">L'escalier</strong>
                        <p class="logo-meaning__element-body">Chaque marche symbolise une étape du développement : éducation, autonomisation, inclusion, égalité — une progression continue.</p>
                    </div>
                    <div class="logo-meaning__element">
                        <strong class="logo-meaning__element-title">La carte</strong>
                        <p class="logo-meaning__element-body">Le département de l'Atacora en toile de fond — ancrage géographique et identitaire fort de l'organisation.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================================
     6. CTA BANNER
     ============================================================ -->
<section class="cta-banner cta-banner--ink bg-ink section--tight" aria-labelledby="apropos-cta-title">
    <div class="container">
        <div class="cta-banner__inner">
            <div class="cta-banner__content">
                <span class="eyebrow eyebrow--cream">Vous voulez aller plus loin ?</span>
                <h2 id="apropos-cta-title" style="font-family:var(--font-serif);font-size:clamp(2rem,3.5vw,2.75rem);line-height:1.08;color:var(--cream);margin-top:1rem;">
                    Rejoignez notre <em style="font-style:italic;color:var(--honey)">communauté</em> et faites bouger l'Atacora.
                </h2>
            </div>
            <div class="cta-banner__actions">
                <a href="<?php echo esc_url(home_url('/adherer/')); ?>" class="btn btn--honey">Adhérer à l'ONG</a>
                <a href="<?php echo esc_url(home_url('/gouvernance/')); ?>" class="btn btn--ondark">Voir l'équipe</a>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
