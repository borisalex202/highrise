<article id="post-<?php the_ID() ?>" <?php post_class('games-item'); ?>>

    <a href="<?php the_permalink(get_the_ID()); ?>" class="games-item__thumbnail" style="background-image: url('<?php echo get_the_post_thumbnail_url( get_the_ID(), 'post-thumbnail' ); ?>')">
        <?php
        $logo = get_field('game_logo');

        echo ($logo ? '<img class="games-item__logo" src="' . $logo . '" alt="' . $post->post_title . '">' : '');
        ?>
    </a><!-- .games-item__thumbnail -->

    <header class="games-item__header">
        <h4 class="games-item__title"><?php the_title(); ?></h4>
        <span class="games-item__line"></span>
        <?php
            if(get_the_excerpt()) {
                echo '<div class="games-item__excerpt">';
                the_excerpt();
                echo '</div>';
            }
        ?>
        <a href="<?php the_permalink(get_the_ID()); ?>" class="icon-wrapper games-item__trailer">
            <svg class="icon icon-trailer"><use xlink:href="#icon-trailer"></use></svg>
        </a>
    </header><!-- .games-item__header -->

    <div class="games-item__content">
        <span class="games-item__content-circle"></span>
        <h4 class="games-item__title"><?php the_title(); ?></h4>
        <span class="games-item__line"></span>
        <?php
            if(get_the_excerpt()) {
                echo '<div class="games-item__excerpt">';
                the_excerpt();
                echo '</div>';
            }
            $gameMinimumSpecifications = get_field('game_minimum_specifications');
            echo ($gameMinimumSpecifications ? '<div class="games-item__specifications"><p class="games-item__specifications-title">Minimum specifications:</p>' . $gameMinimumSpecifications . '</div>' : '');
        ?>
        <a href="<?php the_permalink(get_the_ID()); ?>" class="icon-wrapper games-item__trailer">
            <svg class="icon icon-trailer"><use xlink:href="#icon-trailer"></use></svg>
        </a>
        <div class="games-item__more js-toggle-content">
            <svg class="icon icon-game-more _off"><use xlink:href="#icon-game-more"></use></svg>
            <svg class="icon icon-arrow-down _on"><use xlink:href="#icon-arrow-down"></use></svg>
        </div>
    </div>

    <span class="games-item__about js-toggle-content">
        <span class="games-item__about-icon">
            <svg class="icon icon-about"><use xlink:href="#icon-about"></use></svg>
            <svg class="icon icon-arrow-down"><use xlink:href="#icon-arrow-down"></use></svg>
        </span>
        <span class="games-item__about-text">About</span>
    </span>

</article><!-- #post-## -->