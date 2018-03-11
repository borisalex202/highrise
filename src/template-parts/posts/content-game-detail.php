<?php
    $logo = get_field('game_logo');
    $gameMinimumSpecifications = get_field('game_minimum_specifications');
    $gameRecommendedSpecifications = get_field('game_recommended_specifications');
    $youtubeID = get_field('game_youtube_id');

    $sliderImages = get_field('game_slider');
    $galleryImages = get_field('game_gallery');


    $size = 'full';
?>

<article id="post-<?php the_ID() ?>" <?php post_class('games-detail'); ?>>

    <header class="post-header js-show-subscribe" data-shown_popup=false>
        <div class="site-banner _game-detail" style="background-image: url('<?php echo (get_the_post_thumbnail_url( get_the_ID(), 'large' ) ? get_the_post_thumbnail_url( get_the_ID(), 'large' ) : get_theme_mod('main_img')); ?>')">
            <?php
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
                    <?php if($gameMinimumSpecifications || $gameRecommendedSpecifications) { ?>
                        <span class="icon-wrapper js-smooth" data-target="#section-description">
                            <svg class="icon icon-about"><use xlink:href="#icon-about"></use></svg>
                        </span>
                    <?php } ?>
                    <?php if( $galleryImages ) { ?>
                        <span class="icon-wrapper js-smooth" data-target="#galley">
                            <svg class="icon icon-gallery"><use xlink:href="#icon-gallery"></use></svg>
                        </span>
                    <?php } ?>
                    <?php if($youtubeID) { ?>
                    <span class="icon-wrapper js-play-video" data-toggle="modal" data-target="#modal-youtube">
                        <svg class="icon icon-trailer"><use xlink:href="#icon-trailer"></use></svg>
                    </span>
                    <?php } ?>
                </div>
            </div>

            <span class="site-banner__arrow js-smooth smooth-link" data-target="#section-description">
                <svg class="icon icon-arrow-down"><use xlink:href="#icon-arrow-down"></use></svg>
            </span>
        </div>
    </header><!-- .post-header -->

    <div id="section-description" class="section section--games-detail _bg-default">
        <div class="_icons_circle"></div>
        <div class="container">
            <h3 class="site-heading">Description</h3>

            <?php the_content(); ?>
            <?php if($gameMinimumSpecifications || $gameRecommendedSpecifications) { ?>
                <div class="games-detail__specifications">
                    <?php if($gameMinimumSpecifications) { ?>
                        <div class="games-detail__specifications-col">
                            <span class="games-detail__specifications-header">Minimum specifications</span>
                            <div class="games-detail__specifications-text">
                                <?php echo $gameMinimumSpecifications; ?>
                            </div>
                        </div>
                    <?php } ?>
                    <?php if($gameRecommendedSpecifications) { ?>
                        <div class="games-detail__specifications-col">
                            <span class="games-detail__specifications-header">Recommended specifications</span>
                            <div class="games-detail__specifications-text">
                                <?php echo $gameRecommendedSpecifications; ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </div>


    <?php if( $sliderImages ): ?>
        <div class="games-detail__slider">
            <?php foreach( $sliderImages as $image ): ?>
                <div class="games-detail__slider-item" style="background-image: url('<?php echo $image["url"]; ?>')">
                    <div class="container">
                        <?php
                            echo '<p class="games-detail__slider-title">' . $image["title"] . '</p>';
                            echo '<p class="games-detail__slider-description">' . $image["description"] . '</p>';
                        ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <script>
            $(document).on('ready', function () {
                $('.games-detail__slider').slick({
                    prevArrow: '<button type="button" class="slick-prev"><svg class="icon icon-arrow-down"><use xlink:href="#icon-arrow-down"></use></svg></button>',
                    nextArrow: '<button type="button" class="slick-next"><svg class="icon icon-arrow-down"><use xlink:href="#icon-arrow-down"></use></svg></button>'
                });
            });
        </script>
    <?php endif; ?>

    <?php if( $galleryImages ) { ?>
        <div id="galley" class="games-detail__gallery">
            <?php foreach( $galleryImages as $image ): ?>
                <div class="games-detail__gallery-item js-change-img" data-toggle="modal" data-target="#modal-gallery" style="background-image: url('<?php echo $image["url"]; ?>')">
                    <div class="games-detail__gallery-zoom">
                        <span class="icon-wrapper">
                            <svg class="icon icon-zoom"><use xlink:href="#icon-zoom"></use></svg>
                        </span>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="modal fade _full _trailer _bg-primary" id="modal-gallery" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content games-detail__gallery-image js-img-push" style="background-image: url('<?php echo $galleryImages[0]['url']; ?>')">
                    <button class="modal-close" data-dismiss="modal">
                        <svg class="icon icon-close"><use xlink:href="#icon-close"></use></svg>
                    </button>
                    <button class="arrow prev js-prev-gallery">
                        <svg class="icon icon-arrow-down"><use xlink:href="#icon-arrow-down"></use></svg>
                    </button>
                    <button class="arrow next js-next-gallery">
                        <svg class="icon icon-arrow-down"><use xlink:href="#icon-arrow-down"></use></svg>
                    </button>
                </div>
            </div>
        </div>

        <script>
            var $currentIndex,
                $minIndex = $('.js-change-img:first-child').index(),
                $maxIndex = $('.js-change-img:last-child').index();

            $(document).on('click', '.js-change-img', function () {
                var $this = $(this),
                    $imgUrl = $this.css('background-image'),
                    $imgModal = $('.js-img-push');

                $imgModal.css('background-image', $imgUrl);
                $currentIndex = $this.index();

                if($currentIndex === $minIndex) {
                    $('.js-prev-gallery').addClass('_hidden');
                } else {
                    $('.js-prev-gallery').removeClass('_hidden');
                }
                if($currentIndex === $maxIndex) {
                    $('.js-next-gallery').addClass('_hidden');
                } else {
                    $('.js-next-gallery').removeClass('_hidden');
                }

            });
            $(document).on('click', '.js-prev-gallery', function () {

                $currentIndex -= 1;

                var $imgUrl = $('.js-change-img').eq($currentIndex).css('background-image'),
                    $imgModal = $('.js-img-push');

                $imgModal.css('background-image', $imgUrl);

                if($currentIndex === $minIndex) {
                    $(this).addClass('_hidden');
                    return false;
                }
                if($currentIndex < $maxIndex) {
                    $('.js-next-gallery').removeClass('_hidden');
                }
            });
            $(document).on('click', '.js-next-gallery', function () {

                $currentIndex += 1;

                var $imgUrl = $('.js-change-img').eq($currentIndex).css('background-image'),
                    $imgModal = $('.js-img-push');

                $imgModal.css('background-image', $imgUrl);

                if($currentIndex === $maxIndex) {
                    $(this).addClass('_hidden');
                    return false;
                }
                if($currentIndex > $minIndex) {
                    $('.js-prev-gallery').removeClass('_hidden');
                }
            });
        </script>
    <?php } ?>

    <?php if($youtubeID) { ?>
        <div class="modal fade _full _trailer _bg-primary" id="modal-youtube" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <button class="modal-close js-stop-video" data-dismiss="modal">
                        <svg class="icon icon-close"><use xlink:href="#icon-close"></use></svg>
                    </button>
                    <div id="player" class="video"></div>
                </div>
            </div>
        </div>

        <script src="https://www.youtube.com/iframe_api"></script>
        <script>
            var tag = document.createElement('script');

            tag.src = "https://www.youtube.com/iframe_api";
            var firstScriptTag = document.getElementsByTagName('script')[0];
            firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

            var player;
            function onYouTubeIframeAPIReady() {
                player = new YT.Player('player', {
                    height: '100%',
                    width: '100%',
                    videoId: '<?php echo $youtubeID; ?>'
                });
            }

            $('#modal-youtube').on('hidden.bs.modal', function () {
                stopVideo();
            });
            $(document).on('click', '.js-stop-video', function () {
                stopVideo();
            });
            $(document).on('click', '.js-play-video', function () {
                playVideo();
            });

            function playVideo() {
                player.playVideo();
            }

            function stopVideo() {
                player.stopVideo();
            }
        </script>
    <?php } ?>

</article><!-- #post-## -->