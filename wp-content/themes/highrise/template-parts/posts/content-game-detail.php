<article id="post-<?php the_ID() ?>" <?php post_class('games-detail'); ?>>

    <header class="post-header js-show-subscribe" data-shown_popup=false>
        <div class="site-banner _game-detail" style="background-image: url('<?php echo (get_the_post_thumbnail_url( get_the_ID(), 'large' ) ? get_the_post_thumbnail_url( get_the_ID(), 'large' ) : get_theme_mod('main_img')); ?>')">
            <?php
                $logo = get_field('game_logo');
                echo ($logo ? '<img class="games-item__logo" src="' . $logo . '" alt="' . $post->post_title . '">' : '');
            ?>

            <div class="games-detail__circle"></div>
            <div class="games-detail__info">
                <h1 class="games-detail__title"><?php the_title(); ?></h1>
                <?php
                    if(get_the_excerpt()) {
                        echo '<h2 class="games-detail__excerpt">';
                        the_excerpt();
                        echo '</h2>';
                    }
                ?>
                <div class="games-detail__icons">
                    <span class="icon-wrapper js-smooth" data-target="#section-description">
                        <svg class="icon icon-about"><use xlink:href="#icon-about"></use></svg>
                    </span>
                    <span class="icon-wrapper">
                        <svg class="icon icon-gallery"><use xlink:href="#icon-gallery"></use></svg>
                    </span>
                    <span class="icon-wrapper">
                        <svg class="icon icon-trailer"><use xlink:href="#icon-trailer"></use></svg>
                    </span>
                </div>
            </div>

            <span class="site-banner__arrow js-smooth smooth-link" data-target="#section-description">
                <svg class="icon icon-arrow-down"><use xlink:href="#icon-arrow-down"></use></svg>
            </span>
        </div>
    </header><!-- .post-header -->

    <div id="section-description" class="section section--game-dtioen">
        <div class="container">
            <h3 class="site-heading">Description</h3>

            <?php the_content(); ?>
        </div>
    </div>

</article><!-- #post-## -->