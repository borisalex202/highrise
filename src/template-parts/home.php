<?php
/*
Template Name: Home
*/
?>
<?php get_header(); ?>

    <main class="site-main">
        <div class="site-banner" style="background-image: url('<?php echo get_theme_mod('main_img'); ?>')">
            <div class="container">
                <?php
                echo '<h1 class="site-banner__title">' . get_theme_mod('main_company_name') . '</h1>';
                echo '<h2 class="site-banner__description">' . get_theme_mod('main_company_desc') . '</h2>';
                ?>
                <span class="site-banner__arrow js-smooth smooth-link" data-target="#section-about">
                    <svg class="icon icon-arrow-down"><use xlink:href="#icon-arrow-down"></use></svg>
                </span>
            </div>
        </div>
        <?php if(get_theme_mod('about_us_show')) { ?>
            <section id="section-about" class="section section--about _bg-primary" <?php echo (get_theme_mod('about_us_bg_color') ? 'style="background-color: ' . get_theme_mod('about_us_bg_color') . ';"' : ''); ?>>
                <div class="container flex flex--wrap">
                    <h3 class="site-heading"><?php echo (get_theme_mod('about_us_heading') ? get_theme_mod('about_us_heading') : 'About Us'); ?></h3>

                    <div class="section--about_thumb" style="background-image: url('<?php echo get_theme_mod('about_us_img'); ?>')"></div>
                    <div class="section--about_info">
                        <?php echo (get_theme_mod('about_us_description') ? '<p>' . get_theme_mod('about_us_description') . '</p>' : ''); ?>

                        <a href="<?php echo (get_theme_mod('about_us_button_link') ? get_theme_mod('about_us_button_link') : '#'); ?>" class="btn btn-default"><?php echo (get_theme_mod('about_us_button') ? get_theme_mod('about_us_button') : 'Read more'); ?></a>
                    </div>
                </div>
            </section>
        <?php } ?>
        <?php if(get_theme_mod('about_us_show')) { ?>
            <section id="section-games" class="section section--games" <?php echo (get_theme_mod('our_games_bg_color') ? 'style="background-color: ' . get_theme_mod('our_games_bg_color') . ';"' : ''); ?>>
                <?php echo (get_theme_mod('our_games_icon') ? '<svg class="icon section--games_icon icon-' . get_theme_mod('our_games_icon') . '"><use xlink:href="#icon-' . get_theme_mod('our_games_icon') . '"></use></svg>' : ''); ?>
                <div class="container">
                    <h3 class="site-heading"><?php echo (get_theme_mod('our_games_heading') ? get_theme_mod('our_games_heading') : 'Our Games'); ?></h3>

                        <div class="games-list">
                            <?php
                                query_posts(array(
                                    'post_type' => 'games',
                                    'posts_per_page' => (get_theme_mod('our_games_count' ) ? get_theme_mod('our_games_count' ) : '4')
                                ));
                                while ( have_posts() ) : the_post();

                                    get_template_part( 'template-parts/posts/content', 'game' );

                                endwhile;
                            ?>
                        </div>

                        <div class="text-center">
                            <a href="<?php echo (get_theme_mod('our_games_link') ? get_theme_mod('our_games_link') : '#'); ?>" class="btn btn-default"><?php echo (get_theme_mod('our_games_button') ? get_theme_mod('our_games_button') : 'More Games'); ?></a>
                        </div>
                </div>
            </section>
        <?php } ?>
        <?php if(get_theme_mod('news_show')) { ?>
            <section id="section-news" class="section section--news _bg-primary" <?php echo (get_theme_mod('news_bg_color') ? 'style="background-color: ' . get_theme_mod('news_bg_color') . ';"' : ''); ?>>
                <div class="container flex flex--wrap">
                    <h3 class="site-heading"><?php echo (get_theme_mod('news_heading') ? get_theme_mod('news_heading') : 'Latest News'); ?></h3>

                    <div class="news-list">
                        <?php
                            query_posts(array(
                                'post_type' => 'post',
                                'cat' => (get_theme_mod( 'news_category' ) ? get_theme_mod( 'news_category' ) : -1),
                                'posts_per_page' => (get_theme_mod('news_count' ) ? get_theme_mod('news_count' ) : '3')
                            ));
                            while ( have_posts() ) : the_post();

                                get_template_part( 'template-parts/posts/content', 'new' );

                            endwhile;
                        ?>
                    </div>
                </div>
            </section>
        <?php } ?>
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
    </main>

<?php get_footer(); ?>