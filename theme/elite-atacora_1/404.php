<?php get_header(); ?>

<section class="error-404">
    <div class="container">
        <div class="error-404__inner">
            <span class="error-404__code" aria-hidden="true">404</span>
            <h1 class="error-404__title">Page introuvable</h1>
            <p class="error-404__desc">
                La page que vous cherchez n'existe pas ou a été déplacée.
                Revenez à l'accueil ou consultez nos actualités.
            </p>
            <div style="display:flex; gap:var(--s2); flex-wrap:wrap;">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn--primary">
                    ← Retour à l'accueil
                </a>
                <a href="<?php echo esc_url( home_url( '/actualites/' ) ); ?>" class="btn btn--outline">
                    Voir les actualités
                </a>
                <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn--outline">
                    Nous contacter
                </a>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
