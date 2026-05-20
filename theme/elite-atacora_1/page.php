<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

<div class="page-header">
    <div class="container">
        <?php if ( function_exists( 'yoast_breadcrumb' ) ) yoast_breadcrumb( '<nav class="breadcrumb" aria-label="Fil d\'Ariane">', '</nav>' ); ?>
        <h1 class="page-header__title"><?php the_title(); ?></h1>
        <?php if ( has_excerpt() ) : ?>
            <p class="page-header__desc"><?php the_excerpt(); ?></p>
        <?php endif; ?>
    </div>
</div>

<div class="page-content">
    <div class="container">
        <?php if ( has_post_thumbnail() ) : ?>
            <div style="margin-bottom: var(--s4); border: var(--b1);">
                <?php the_post_thumbnail( 'elite-hero', [ 'style' => 'width:100%;max-height:420px;object-fit:cover;display:block;' ] ); ?>
            </div>
        <?php endif; ?>
        <div class="entry-content">
            <?php the_content(); ?>
        </div>
    </div>
</div>

<?php endwhile; ?>

<?php get_footer(); ?>
