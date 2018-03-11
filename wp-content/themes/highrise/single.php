<?php get_header(); ?>

    <main class="site-main _bg-primary">

        <?php
            while ( have_posts() ) : the_post();

                $post_type = get_post_type( get_the_ID() );

                if($post_type == 'games') {
                    get_template_part( 'template-parts/posts/content', 'game-detail' );
                } else {
                    get_template_part('template-parts/posts/content', 'post');
                }

            endwhile;
        ?>

    </main><!-- .site-main -->

<?php get_footer();
