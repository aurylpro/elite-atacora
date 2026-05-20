<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

<article class="single-post" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <!-- En-tête article -->
    <header class="single-post__header">
        <div class="container container--narrow">
            <!-- Fil d'Ariane -->
            <nav class="breadcrumb" aria-label="Fil d'Ariane">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Accueil</a>
                <span aria-hidden="true">→</span>
                <a href="<?php echo esc_url( home_url( '/actualites/' ) ); ?>">Actualités</a>
                <span aria-hidden="true">→</span>
                <span aria-current="page"><?php the_title(); ?></span>
            </nav>

            <?php $cat = get_the_category(); if ( $cat ) : ?>
                <a href="<?php echo esc_url( get_category_link( $cat[0]->term_id ) ); ?>" class="post-cat-badge">
                    <?php echo esc_html( $cat[0]->name ); ?>
                </a>
            <?php endif; ?>

            <h1 class="single-post__title"><?php the_title(); ?></h1>

            <div class="single-post__meta">
                <time datetime="<?php echo get_the_date( 'Y-m-d' ); ?>">
                    <?php echo get_the_date( 'j F Y' ); ?>
                </time>
                <span aria-hidden="true">·</span>
                <span><?php echo get_the_author(); ?></span>
                <span aria-hidden="true">·</span>
                <span><?php echo ceil( str_word_count( strip_tags( get_the_content() ) ) / 200 ); ?> min de lecture</span>
            </div>
        </div>
    </header>

    <!-- Image mise en avant -->
    <?php if ( has_post_thumbnail() ) : ?>
        <div class="single-post__featured-image">
            <div class="container">
                <?php the_post_thumbnail( 'elite-hero', [
                    'class'   => 'single-post__image',
                    'loading' => 'eager',
                    'alt'     => get_the_title(),
                ] ); ?>
            </div>
        </div>
    <?php endif; ?>

    <!-- Contenu -->
    <div class="single-post__content">
        <div class="container container--narrow">
            <div class="entry-content">
                <?php the_content(); ?>
            </div>

            <!-- Tags -->
            <?php $tags = get_the_tags(); if ( $tags ) : ?>
                <div class="single-post__tags">
                    <span class="single-post__tags-label">Tags :</span>
                    <?php foreach ( $tags as $tag ) : ?>
                        <a href="<?php echo esc_url( get_tag_link( $tag->term_id ) ); ?>" class="tag-badge">
                            <?php echo esc_html( $tag->name ); ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <!-- Navigation article -->
            <nav class="post-navigation" aria-label="Navigation entre articles">
                <div class="post-navigation__prev">
                    <?php previous_post_link( '%link', '← Article précédent' ); ?>
                </div>
                <div class="post-navigation__next">
                    <?php next_post_link( '%link', 'Article suivant →' ); ?>
                </div>
            </nav>
        </div>
    </div>

</article>

<!-- Articles similaires -->
<?php
$current_cats = wp_get_post_categories( get_the_ID() );
if ( $current_cats ) :
    $related = new WP_Query( [
        'category__in'   => $current_cats,
        'post__not_in'   => [ get_the_ID() ],
        'posts_per_page' => 3,
        'orderby'        => 'rand',
    ] );
    if ( $related->have_posts() ) : ?>
        <section class="related-posts" aria-labelledby="related-title">
            <div class="container">
                <h2 class="section-title" id="related-title">À lire aussi</h2>
                <div class="posts-grid">
                    <?php while ( $related->have_posts() ) : $related->the_post(); ?>
                        <article class="post-card">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <a href="<?php the_permalink(); ?>" class="post-card__image-link" tabindex="-1" aria-hidden="true">
                                    <?php the_post_thumbnail( 'elite-card', [ 'class' => 'post-card__image', 'loading' => 'lazy' ] ); ?>
                                </a>
                            <?php else : ?>
                                <div class="post-card__image-placeholder" aria-hidden="true"><span>ELITE ATACORA</span></div>
                            <?php endif; ?>
                            <div class="post-card__body">
                                <time class="post-card__date" datetime="<?php echo get_the_date('Y-m-d'); ?>"><?php echo get_the_date('j F Y'); ?></time>
                                <h3 class="post-card__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <a href="<?php the_permalink(); ?>" class="post-card__link">Lire →</a>
                            </div>
                        </article>
                    <?php endwhile; wp_reset_postdata(); ?>
                </div>
            </div>
        </section>
    <?php endif;
endif; ?>

<?php endwhile; ?>

<?php get_footer(); ?>
