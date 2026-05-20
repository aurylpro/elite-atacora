<?php
/**
 * Template Name: Gouvernance
 */
get_header();

/**
 * Helper: Bureau Exécutif members
 */
function elite_get_bureau() {
    return [
        ['role' => 'Présidente',                        'name' => 'Nom & Prénom'],
        ['role' => '1er Vice-Président·e',              'name' => 'Nom & Prénom'],
        ['role' => '2ème Vice-Président·e',             'name' => 'Nom & Prénom'],
        ['role' => 'Secrétaire Général·e',              'name' => 'Nom & Prénom'],
        ['role' => 'Secrétaire Général·e Adjoint·e',    'name' => 'Nom & Prénom'],
        ['role' => 'Trésorier·e',                       'name' => 'Nom & Prénom'],
        ['role' => 'Trésorier·e Adjoint·e',             'name' => 'Nom & Prénom'],
        ['role' => 'Chargé·e des Relations Extérieures','name' => 'Nom & Prénom'],
        ['role' => 'Chargé·e de la Communication',      'name' => 'Nom & Prénom'],
    ];
}

/**
 * Helper: Conseil de Surveillance members
 */
function elite_get_surveillance() {
    return [
        ['role' => 'Président·e du Conseil',   'name' => 'Nom & Prénom'],
        ['role' => 'Membre du Conseil',        'name' => 'Nom & Prénom'],
    ];
}
?>

<!-- PAGE HERO -->
<section class="page-hero bg-forest" aria-labelledby="gouvernance-hero-title">
    <div class="container">
        <div class="page-hero__inner">
            <div class="page-hero__content">
                <span class="eyebrow eyebrow--cream">L'ONG · gouvernance</span>
                <h1 id="gouvernance-hero-title" class="page-hero__title" style="font-family:var(--font-serif);font-size:clamp(2.5rem,5vw,4rem);line-height:1.02;color:var(--cream);margin-top:1.25rem;">
                    Une gouvernance
                    <em style="font-style:italic;color:var(--honey)">claire, transparente, redevable.</em>
                </h1>
                <p class="page-hero__subtitle" style="color:var(--cream);opacity:.85;max-width:540px;margin-top:1.25rem;line-height:1.7;">
                    Conformément à la loi n°2025-19, Elite Atacora s'est dotée d'une structure de gouvernance solide articulée autour de quatre organes distincts dont les rôles et responsabilités sont définis aux articles 21 à 28 des statuts.
                </p>
                <nav class="breadcrumb" aria-label="Fil d'Ariane">
                    <ol>
                        <li><a href="<?php echo esc_url(home_url('/')); ?>" style="color:var(--honey)">Accueil</a></li>
                        <li><a href="<?php echo esc_url(home_url('/a-propos/')); ?>" style="color:var(--honey)">À propos</a></li>
                        <li aria-current="page" style="color:var(--cream)">Gouvernance</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>

<!-- ============================================================
     1. ORGANES
     ============================================================ -->
<section class="section bg-paper" aria-labelledby="organes-title">
    <div class="container">
        <div style="text-align:center;max-width:600px;margin:0 auto 3.5rem;">
            <span class="eyebrow eyebrow--terracotta">Article 21</span>
            <h2 id="organes-title" style="font-family:var(--font-serif);font-size:clamp(2.25rem,4vw,3rem);line-height:1.05;color:var(--ink);margin-top:1.25rem;">
                Quatre <em style="font-style:italic;color:var(--terracotta)">organes</em>, un même cap.
            </h2>
        </div>
        <div class="organe-grid">
            <!-- AG -->
            <article class="organe-card organe-card--forest" aria-labelledby="organe-ag">
                <div class="organe-card__accent organe-card__accent--honey" aria-hidden="true"></div>
                <div class="organe-card__sigla" style="font-family:var(--font-serif)">AG</div>
                <h3 id="organe-ag" class="organe-card__name" style="font-family:var(--font-serif)">Assemblée Générale</h3>
                <span class="organe-card__ref">Articles 22-23</span>
                <p class="organe-card__desc">Organe souverain de l'ONG, l'Assemblée Générale réunit tous les membres et prend les décisions stratégiques majeures. Elle se réunit en session ordinaire au moins une fois par an et peut être convoquée en session extraordinaire.</p>
            </article>
            <!-- BE -->
            <article class="organe-card organe-card--terracotta" aria-labelledby="organe-be">
                <div class="organe-card__accent organe-card__accent--cream" aria-hidden="true"></div>
                <div class="organe-card__sigla" style="font-family:var(--font-serif)">BE</div>
                <h3 id="organe-be" class="organe-card__name" style="font-family:var(--font-serif)">Bureau Exécutif</h3>
                <span class="organe-card__ref">Article 25</span>
                <p class="organe-card__desc">Composé de neuf membres élus, le Bureau Exécutif assure la gestion courante de l'ONG, l'exécution des décisions de l'Assemblée Générale et la représentation légale de l'organisation.</p>
            </article>
            <!-- VC -->
            <article class="organe-card organe-card--honey" aria-labelledby="organe-vc">
                <div class="organe-card__accent organe-card__accent--ink" aria-hidden="true"></div>
                <div class="organe-card__sigla" style="font-family:var(--font-serif);color:var(--ink)">VC</div>
                <h3 id="organe-vc" class="organe-card__name" style="font-family:var(--font-serif);color:var(--ink)">Vérificateur des Comptes</h3>
                <span class="organe-card__ref" style="color:var(--coffee)">Article 26</span>
                <p class="organe-card__desc" style="color:var(--coffee)">Garant de la régularité et de la sincérité des comptes de l'ONG, le Vérificateur des Comptes certifie les états financiers et présente son rapport annuel devant l'Assemblée Générale.</p>
            </article>
            <!-- CC -->
            <article class="organe-card organe-card--ink" aria-labelledby="organe-cc">
                <div class="organe-card__accent organe-card__accent--honey" aria-hidden="true"></div>
                <div class="organe-card__sigla" style="font-family:var(--font-serif);color:var(--honey)">CC</div>
                <h3 id="organe-cc" class="organe-card__name" style="font-family:var(--font-serif);color:var(--cream)">Conseil de Surveillance</h3>
                <span class="organe-card__ref" style="color:var(--honey)">Articles 27-28</span>
                <p class="organe-card__desc" style="color:var(--cream);opacity:.85;">Organe de contrôle indépendant, le Conseil de Surveillance veille au respect des statuts, à la bonne gouvernance et peut saisir l'Assemblée Générale en cas d'irrégularité constatée.</p>
            </article>
        </div>
    </div>
</section>

<!-- ============================================================
     2. BUREAU EXÉCUTIF
     ============================================================ -->
<section class="section bg-cream" aria-labelledby="bureau-title">
    <div class="container">
        <div style="text-align:center;max-width:600px;margin:0 auto 3.5rem;">
            <span class="eyebrow eyebrow--terracotta">Bureau Exécutif · Article 25</span>
            <h2 id="bureau-title" style="font-family:var(--font-serif);font-size:clamp(2.25rem,4vw,3rem);line-height:1.05;color:var(--ink);margin-top:1.25rem;">
                Neuf <em style="font-style:italic;color:var(--terracotta)">femmes et hommes</em> au service de l'Atacora.
            </h2>
            <p style="color:var(--muted);margin-top:1rem;line-height:1.7;">
                Le Bureau Exécutif est élu pour un mandat de trois ans renouvelable une fois. Il assure la gestion administrative, financière et opérationnelle de l'ONG.
            </p>
        </div>
        <div class="bureau-grid">
            <?php foreach (elite_get_bureau() as $member) :
                $initials = '';
                $parts = explode(' ', trim($member['name']));
                foreach (array_slice($parts, 0, 2) as $p) $initials .= mb_strtoupper(mb_substr($p, 0, 1));
                if (strlen($initials) < 2) $initials = 'EA';
            ?>
            <div class="member-card">
                <div class="member-card__portrait">
                    <div class="member-card__initials" aria-label="<?php echo esc_attr($member['name']); ?>"><?php echo esc_html($initials); ?></div>
                    <span class="member-card__portrait-label">Photo à venir</span>
                </div>
                <div class="member-card__body">
                    <span class="member-card__role"><?php echo esc_html($member['role']); ?></span>
                    <strong class="member-card__name" style="font-family:var(--font-serif)"><?php echo esc_html($member['name']); ?></strong>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ============================================================
     3. CONSEIL DE SURVEILLANCE
     ============================================================ -->
<section class="section bg-paper" aria-labelledby="surveillance-title">
    <div class="container">
        <div style="max-width:600px;margin:0 auto 3.5rem;">
            <span class="eyebrow eyebrow--terracotta">Conseil de Surveillance · Articles 27-28</span>
            <h2 id="surveillance-title" style="font-family:var(--font-serif);font-size:clamp(2.25rem,4vw,3rem);line-height:1.05;color:var(--ink);margin-top:1.25rem;">
                Le regard <em style="font-style:italic;color:var(--terracotta)">indépendant.</em>
            </h2>
            <p style="color:var(--muted);margin-top:1rem;line-height:1.7;">
                Organe de contrôle distinct du Bureau Exécutif, le Conseil de Surveillance garantit la conformité des actes de l'ONG avec ses statuts et la loi.
            </p>
        </div>
        <div class="surveillance-grid">
            <?php foreach (elite_get_surveillance() as $member) :
                $initials = '';
                $parts = explode(' ', trim($member['name']));
                foreach (array_slice($parts, 0, 2) as $p) $initials .= mb_strtoupper(mb_substr($p, 0, 1));
                if (strlen($initials) < 2) $initials = 'EA';
            ?>
            <div class="member-card member-card--large">
                <div class="member-card__portrait">
                    <div class="member-card__initials" aria-label="<?php echo esc_attr($member['name']); ?>"><?php echo esc_html($initials); ?></div>
                    <span class="member-card__portrait-label">Photo à venir</span>
                </div>
                <div class="member-card__body">
                    <span class="member-card__role"><?php echo esc_html($member['role']); ?></span>
                    <strong class="member-card__name" style="font-family:var(--font-serif)"><?php echo esc_html($member['name']); ?></strong>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ============================================================
     4. CTA
     ============================================================ -->
<section class="cta-banner cta-banner--forest bg-forest section--tight" aria-labelledby="gouv-cta-title">
    <div class="container">
        <div class="cta-banner__inner">
            <div class="cta-banner__content">
                <span class="eyebrow eyebrow--honey">Prendre contact</span>
                <h2 id="gouv-cta-title" style="font-family:var(--font-serif);font-size:clamp(2rem,3.5vw,2.75rem);line-height:1.08;color:var(--cream);margin-top:1rem;">
                    Contactez directement le <em style="font-style:italic;color:var(--honey)">Bureau Exécutif.</em>
                </h2>
                <p style="color:var(--cream);opacity:.85;margin-top:1rem;max-width:480px;">
                    Pour toute question relative à la gouvernance, aux statuts ou aux activités de l'ONG, notre Bureau Exécutif est joignable via le formulaire de contact.
                </p>
            </div>
            <div class="cta-banner__actions">
                <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn--honey">Nous écrire</a>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
