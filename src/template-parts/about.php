<?php
    /*
    Template Name: About Us
    */

    get_header();
?>

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

        <div class="post-content section section--about-page">
            <div class="container flex flex--wrap">
                <h3 class="site-heading">Our Story</h3>

                <?php
                    while ( have_posts() ) : the_post();
                        the_content();
                    endwhile;
                ?>
            </div>
        </div><!-- .post-content -->

    </article><!-- #post-## -->

    <div class="section section--team _bg-primary">
        <div class="container">
            <h3 class="site-heading">Our Team</h3>

            <div class="team-list">
                <?php
                query_posts(array(
                    'post_type' => 'team'
                ));
                while ( have_posts() ) : the_post();

                    get_template_part( 'template-parts/posts/content', 'team' );

                endwhile;
                ?>
            </div>
        </div>
    </div>

<?php get_footer(); ?>