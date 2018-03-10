<article id="post-<?php the_ID() ?>" <?php post_class('news-item'); ?>>

    <?php if(get_the_post_thumbnail_url( get_the_ID(), 'post-thumbnail' )) { ?>
        <div class="news-item__thumbnail">
            <div class="news-item__thumbnail-circle">
                <a href="<?php the_permalink(get_the_ID()); ?>" class="icon-wrapper">
                    <svg class="icon icon-arrow-down"><use xlink:href="#icon-arrow-down"></use></svg>
                </a>
            </div>
            <a href="<?php the_permalink(get_the_ID()); ?>" class="news-item__thumbnail-img" style="background-image: url('<?php echo get_the_post_thumbnail_url( get_the_ID(), 'post-thumbnail' ); ?>')"></a>
        </div><!-- .news-item__thumbnail -->
    <?php } ?>

    <header class="news-item__header">
        <h4 class="news-item__title"><a href="<?php the_permalink(get_the_ID()); ?>"><?php the_title(); ?></a></h4>
        <div class="news-item__tools">
            <div class="news-item__date">
                <svg class="icon icon-date"><use xlink:href="#icon-date"></use></svg>
                <?php echo get_the_date( 'm-d-Y', get_the_ID() ); ?>
            </div>
            <div class="news-item__category">
                <svg class="icon icon-tag"><use xlink:href="#icon-tag"></use></svg>
                <?php the_category(); ?>
            </div>
        </div>
        <?php echo (get_the_excerpt() ? '<p class="news-item__excerpt">' . the_excerpt() . '</p>' : ''); ?>

        <a href="<?php the_permalink(get_the_ID()); ?>" class="btn btn-default">Read more</a>
    </header><!-- .news-item__header -->

</article><!-- #post-## -->