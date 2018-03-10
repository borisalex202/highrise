<article id="post-<?php the_ID(); ?>" <?php post_class('_bg-primary'); ?>>
    <header class="post-header js-show-subscribe" data-shown_popup=false>
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

            <div class="site-content-area">
                <div class="news-item__tools">
                    <span class="news-item__date">
                        <svg class="icon icon-date"><use xlink:href="#icon-date"></use></svg>
                        <?php echo get_the_date( 'm-d-Y', get_the_ID() ); ?>
                    </span>
                        <span class="news-item__category">
                        <svg class="icon icon-tag"><use xlink:href="#icon-tag"></use></svg>
                            <?php the_category(); ?>
                    </span>
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
        var flag = false;

        $(window).on('scroll resize', function () {
            var $area = $('.js-show-subscribe'),
                $modal = $('#modal-subscribe'),
                $shown = $area.data('shown_popup');


            if($shown) {
                return false;
            } else {
                setTimeout(function () {
                    $area.data('shown_popup', true);
                    if(!flag && $(window).scrollTop() >= $area.offset().top + $area.outerHeight()) {
                        flag = true;
                        $modal.modal('show');
                    }
                }, 2000);
            }
        });
    </script>

</article><!-- #post-## -->
