<?php get_header(); ?>

    <main class="site-main">

    <?php if ( have_posts() ) : ?>

        <?php if ( is_home() && ! is_front_page() ) : ?>
            <header>
                <h1 class="site-title"><?php single_post_title(); ?></h1>
            </header>
        <?php endif; ?>

        <?php
        while ( have_posts() ) : the_post();

            get_template_part( 'content', get_post_format() );

        endwhile;

    else :
        get_template_part( 'template-parts/content', 'standard');

    endif;
    ?>

    </main><!-- .site-main -->

<?php get_footer(); ?>
