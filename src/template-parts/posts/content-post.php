<article id="post-<?php the_ID(); ?>" <?php post_class('_bg-primary'); ?>>
    <header class="post-header">
        <div class="site-banner _mini" style="background-image: url('<?php echo (get_the_post_thumbnail_url( get_the_ID(), 'large' ) ? get_the_post_thumbnail_url( get_the_ID(), 'large' ) : get_theme_mod('main_img')); ?>')">
            <div class="container">
                <?php
                the_title( sprintf( '<h1 class="site-banner__title _mini">', esc_url( get_permalink() ) ), '</h1>' );
                highrise_breadcrumbs();
                ?>
            </div>
        </div>
    </header><!-- .post-header -->

	<div class="post-content section">
        <div class="container">

            <div class="site-content-area js-show-subscribe">
                <div class="news-item__tools">
                    <div class="news-item__author">
                        <svg class="icon icon-user"><use xlink:href="#icon-user"></use></svg>
                        <?php echo get_the_author(); ?>
                    </div>
                    <div class="news-item__date">
                        <svg class="icon icon-date"><use xlink:href="#icon-date"></use></svg>
                        <?php echo get_the_date( 'm-d-Y', get_the_ID() ); ?>
                    </div>
                    <div class="news-item__category">
                        <svg class="icon icon-tag"><use xlink:href="#icon-tag"></use></svg>
                            <?php the_category(); ?>
                    </div>
                </div>

		        <?php the_content(); ?>
            </div>

            <div class="site-follow">
                <h5>Follow us on social networks:</h5>

                <?php if ( has_nav_menu( 'social' ) ) : ?>
                    <nav class="site-social">
                        <?php
                        wp_nav_menu( array(
                            'theme_location' => 'social'
                        ) );
                        ?>
                    </nav><!-- .site-social -->
                <?php endif; ?>
            </div>
        </div>
	</div><!-- .post-content -->

    <?php if(get_theme_mod('subscribe_show')) { ?>
        <section id="section-subscribe" class="section section--subscribe _bg-default" <?php echo (get_theme_mod('subscribe_bg_color') ? 'style="background-color: ' . get_theme_mod('subscribe_bg_color') . ';"' : ''); ?>>
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

    <div class="modal fade" id="modal-subscribe" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <button class="modal-close" data-dismiss="modal">
                    <svg class="icon icon-close"><use xlink:href="#icon-close"></use></svg>
                </button>
                <div class="subscribe">
                    <svg class="icon icon-subscribe subscribe__icon"><use xlink:href="#icon-subscribe"></use></svg>
                    <div class="subscribe__header">
                        <span class="subscribe__header-text">Subscribe</span>
                    </div>
                    <div class="subscribe__form">
                        <?php echo do_shortcode('[email-subscribers name=YES” group=”Public”]'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        var shownModal = false;

        $(window).on('scroll resize', function () {
            var $area = $('.js-show-subscribe'),
                $modal = $('#modal-subscribe');

            if(!shownModal && $(document).scrollTop() + $(window).height() >= $area.offset().top + $area.outerHeight()) {
                shownModal = true;
                $modal.modal('show');
            }
        });
    </script>

</article><!-- #post-## -->
