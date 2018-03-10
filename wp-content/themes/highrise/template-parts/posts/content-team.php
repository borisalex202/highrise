<article id="post-<?php the_ID() ?>" <?php post_class('team-item'); ?>>

    <div class="team-item__thumbnail" style="background-image: url('<?php echo get_the_post_thumbnail_url( get_the_ID(), 'post-thumbnail' ); ?>')"></div><!-- .team-item__thumbnail -->

    <header class="team-item__header">
        <h4 class="team-item__title"><?php the_title(); ?></h4>
        <?php
            $who = get_field('team_who');
            echo ($who ? '<p class="team-item__who">' . $who . '</p>' : '');
        ?>
    </header><!-- .team-item__header -->

    <div class="team-item__content">
        <?php
            if(get_the_content()) {
                echo '<div class="team-item__info">';
                    the_content();
                echo '</div>';
            }

            $address = get_field('team_address');
            echo ($address ? '<p class="team-item__address"><svg class="icon icon-map"><use xlink:href="#icon-map"></use></svg><span>' . $address . '</span></p>' : '');
        ?>
    </div>
</article><!-- #post-## -->