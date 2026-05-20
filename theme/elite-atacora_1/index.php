<?php
// Fichier de secours WordPress — ne devrait jamais être affiché directement
// Le routing est géré par front-page.php, archive.php, single.php, page.php
get_header(); ?>

<div class="page-content">
    <div class="container">
        <?php if ( have_posts() ) : ?>
            <div class="posts-grid">
                <?php while ( have_posts() ) : the_post(); ?>
                    <article class="post-card">
                        <div class="post-card__body">
                            <time class="post-card__date"><?php echo get_the_date('j F Y'); ?></time>
                            <h2 class="post-card__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            <p class="post-card__excerpt"><?php echo wp_trim_words( get_the_excerpt(), 20, '…' ); ?></p>
                            <a href="<?php the_permalink(); ?>" class="post-card__link">Lire →</a>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>
            <?php elite_pagination(); ?>
        <?php else : ?>
            <p class="no-content">Aucun contenu disponible pour le moment.</p>
        <?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>
