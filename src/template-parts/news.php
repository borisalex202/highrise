<?php
    /*
    Template Name: News
    */

    get_header();
?>

    <article id="post-<?php the_ID(); ?>" <?php post_class('_bg-primary'); ?>>
        <header class="post-header">
            <div class="site-banner _mini" style="background-image: url('<?php echo (get_the_post_thumbnail_url( get_the_ID(), 'large' ) ? get_the_post_thumbnail_url( get_the_ID(), 'large' ) : get_theme_mod('main_img')); ?>')">
                <div class="container">
                    <?php
                    the_title( sprintf( '<h1 class="site-banner__title">', esc_url( get_permalink() ) ), '</h1>' );
                    highrise_breadcrumbs();
                    ?>
                </div>
            </div>
        </header><!-- .post-header -->

        <div class="post-content section">
            <div class="container">
                <div class="news-list">
                    <?php
                        query_posts(array(
                            'posts_per_page' => '6',
                            'paged' => get_query_var( 'paged' )
                        ));
                        while ( have_posts() ) : the_post();

                            get_template_part( 'template-parts/posts/content', 'new-standard' );

                        endwhile;

                        the_posts_pagination(array(
                            'prev_text'    => __('<svg class="icon icon-arrow-down"><use xlink:href="#icon-arrow-down"></use></svg>'),
                            'next_text'    => __('<svg class="icon icon-arrow-down"><use xlink:href="#icon-arrow-down"></use></svg>'),
                        ));
                    ?>
                </div>
            </div>
        </div><!-- .post-content -->

    </article><!-- #post-## -->

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

<?php get_footer(); ?>