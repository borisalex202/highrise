<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
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

	<div class="post-content">
		<?php the_content(); ?>
	</div><!-- .post-content -->

</article><!-- #post-## -->
