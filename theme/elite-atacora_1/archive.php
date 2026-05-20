<?php get_header(); ?>

<div class="page-header">
    <div class="container">
        <span class="section-label">Blog</span>
        <h1 class="page-header__title">
            <?php
            if ( is_category() )      echo 'Catégorie : ' . single_cat_title( '', false );
            elseif ( is_tag() )       echo 'Tag : ' . single_tag_title( '', false );
            elseif ( is_date() )      echo 'Archives : ' . get_the_date( 'F Y' );
            else                      echo 'Toutes les actualités';
            ?>
        </h1>
        <?php if ( is_category() && category_description() ) : ?>
            <p class="page-header__desc"><?php echo category_description(); ?></p>
        <?php endif; ?>
    </div>
</div>

<div class="archive-layout">
    <div class="container">
        <div class="archive-layout__inner">

            <!-- Grille d'articles -->
            <div class="archive-layout__main">
                <?php if ( have_posts() ) : ?>
                    <div class="posts-grid posts-grid--archive">
                        <?php while ( have_posts() ) : the_post(); ?>
                            <article class="post-card" aria-labelledby="post-<?php the_ID(); ?>-title">
                                <?php if ( has_post_thumbnail() ) : ?>
                                    <a href="<?php the_permalink(); ?>" class="post-card__image-link" tabindex="-1" aria-hidden="true">
                                        <?php the_post_thumbnail( 'elite-card', [ 'class' => 'post-card__image', 'loading' => 'lazy' ] ); ?>
                                    </a>
                                <?php else : ?>
                                    <div class="post-card__image-placeholder" aria-hidden="true">
                                        <span>ELITE ATACORA</span>
                                    </div>
                                <?php endif; ?>

                                <div class="post-card__body">
                                    <div class="post-card__meta">
                                        <time datetime="<?php echo get_the_date( 'Y-m-d' ); ?>" class="post-card__date">
                                            <?php echo get_the_date( 'j F Y' ); ?>
                                        </time>
                                        <?php $cat = get_the_category(); if ( $cat ) : ?>
                                            <a href="<?php echo esc_url( get_category_link( $cat[0]->term_id ) ); ?>" class="post-card__cat">
                                                <?php echo esc_html( $cat[0]->name ); ?>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                    <h2 class="post-card__title" id="post-<?php the_ID(); ?>-title">
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </h2>
                                    <p class="post-card__excerpt"><?php echo wp_trim_words( get_the_excerpt(), 22, '…' ); ?></p>
                                    <a href="<?php the_permalink(); ?>" class="post-card__link" aria-label="Lire : <?php the_title_attribute(); ?>">
                                        Lire l'article →
                                    </a>
                                </div>
                            </article>
                        <?php endwhile; ?>
                    </div>

                    <?php elite_pagination(); ?>

                <?php else : ?>
                    <div class="no-content">
                        <p>Aucun article trouvé.</p>
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn--outline">Retour à l'accueil</a>
                    </div>
                <?php endif; ?>
            </div><!-- /.archive-layout__main -->

            <!-- Sidebar -->
            <aside class="archive-layout__sidebar" aria-label="Sidebar">
                <!-- Catégories -->
                <div class="sidebar-widget">
                    <h2 class="sidebar-widget__title">Catégories</h2>
                    <ul class="sidebar-cats">
                        <?php wp_list_categories( [
                            'title_li'   => '',
                            'hide_empty' => true,
                            'orderby'    => 'count',
                            'order'      => 'DESC',
                        ] ); ?>
                    </ul>
                </div>

                <!-- Articles récents -->
                <div class="sidebar-widget">
                    <h2 class="sidebar-widget__title">Articles récents</h2>
                    <?php
                    $recent = new WP_Query( [ 'posts_per_page' => 4, 'post_status' => 'publish' ] );
                    if ( $recent->have_posts() ) : ?>
                        <ul class="sidebar-recent">
                            <?php while ( $recent->have_posts() ) : $recent->the_post(); ?>
                                <li class="sidebar-recent__item">
                                    <a href="<?php the_permalink(); ?>" class="sidebar-recent__link">
                                        <?php the_title(); ?>
                                    </a>
                                    <span class="sidebar-recent__date"><?php echo get_the_date( 'j M Y' ); ?></span>
                                </li>
                            <?php endwhile; wp_reset_postdata(); ?>
                        </ul>
                    <?php endif; ?>
                </div>

                <!-- CTA Adhésion -->
                <div class="sidebar-widget sidebar-widget--cta">
                    <h2 class="sidebar-widget__title">Rejoignez-nous</h2>
                    <p>Devenez membre d'Elite Atacora et agissez pour les communautés de l'Atacora.</p>
                    <a href="<?php echo esc_url( home_url( '/adherer/' ) ); ?>" class="btn btn--primary btn--full">
                        Adhérer →
                    </a>
                </div>
            </aside>

        </div><!-- /.archive-layout__inner -->
    </div><!-- /.container -->
</div><!-- /.archive-layout -->

<?php get_footer(); ?>
