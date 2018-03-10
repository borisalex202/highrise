<?php get_header(); ?>

	<?php if ( have_posts() ) : ?>
        <div class="site-banner _mini" style="background-image: url('<?php echo (get_theme_mod('main_img') ? get_theme_mod('main_img') : get_the_post_thumbnail_url( get_the_ID(), 'large' )); ?>')">
            <div class="container">
                <?php
                the_archive_title( sprintf( '<h1 class="site-banner__title _mini">', esc_url( get_permalink() ) ), '</h1>' );

                highrise_breadcrumbs();
                ?>
            </div>
        </div>
	<?php endif; ?>

    <main class="site-main section _bg-primary">
        <div class="container">
            <?php
                if ( have_posts() ) :

                    while ( have_posts() ) : the_post();

                        get_template_part( 'template-parts/posts/content', 'new-standard' );

                    endwhile;

                    the_posts_pagination(array(
                        'prev_text'    => __('<svg class="icon icon-arrow-down"><use xlink:href="#icon-arrow-down"></use></svg>'),
                        'next_text'    => __('<svg class="icon icon-arrow-down"><use xlink:href="#icon-arrow-down"></use></svg>'),
                    ));

                endif;
            ?>
        </div>
    </main><!-- .site-main -->

    <?php if(get_theme_mod('subscribe_show')) { ?>
        <section id="section-subscribe" class="section section--subscribe" <?php echo (get_theme_mod('subscribe_bg_color') ? 'style="background-color: ' . get_theme_mod('subscribe_bg_color') . ';"' : ''); ?>>
            <div class="container flex flex--wrap">
                <h3 class="site-heading"><?php echo (get_theme_mod('subscribe_heading') ? get_theme_mod('subscribe_heading') : 'Subscribe to our Newsletter'); ?></h3>

                <div class="subscribe">
                    <svg class="icon icon-subscribe subscribe__icon"><use xlink:href="#icon-subscribe"></use></svg>
                    <div class="subscribe__header">
                        <span class="subscribe__header-text">Subscribe</span>
                    </div>
                    <div class="subscribe__form">
                        <?php echo do_shortcode('[email-subscribers name=YES” group=”Public”]'); ?>
                    </div>
                    <div class="subscribe__info">
                        <?php echo get_theme_mod('subscribe_description'); ?>
                    </div>
                </div>
            </div>
        </section>
    <?php } ?>

<?php get_footer();
