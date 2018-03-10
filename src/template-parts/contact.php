<?php
    /*
    Template Name: Contact Us
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

        <div class="post-content section section--contact-page _bg-dark">
            <?php
            $location = get_field('contact_map');

            if( !empty($location) ): ?>
                <div class="map acf-map">
                    <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
                </div>
                <span class="map-toggle js-map-toggle">
                    <svg class="icon icon-unfolding _off"><use xlink:href="#icon-unfolding"></use></svg>
                    <svg class="icon icon-folding _on"><use xlink:href="#icon-folding"></use></svg>
                </span>
            <?php endif; ?>

            <div class="container flex flex--wrap">
                <div class="contact-form">
                    <h3>Contact Us</h3>
                    <?php
                        $description = get_field('contact_description');

                        if($description) {
                            echo '<p>' . $description . '</p>';
                        }
                    ?>

                    <?php if ( has_nav_menu( 'social' ) ) : ?>
                        <nav class="site-social">
                            <?php
                            wp_nav_menu( array(
                                'theme_location' => 'social'
                            ) );
                            ?>
                        </nav><!-- .site-social -->
                    <?php endif; ?>
                    
                    <?php echo do_shortcode('[contact-form-7 id="152" title="Contact form"]'); ?>
                </div>
            </div>
        </div><!-- .post-content -->

    </article><!-- #post-## -->

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

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAH8x96bQJZ5oeR4WkFwCUiin0Y5WwqEDw"></script>
    <script type="text/javascript">
        (function($) {

            function new_map( $el ) {

                // var
                var $markers = $el.find('.marker');


                // vars
                var args = {
                    zoom		: 16,
                    center		: new google.maps.LatLng(0, 0),
                    mapTypeId	: google.maps.MapTypeId.ROADMAP
                };


                // create map
                var map = new google.maps.Map( $el[0], args);


                // add a markers reference
                map.markers = [];


                // add markers
                $markers.each(function(){

                    add_marker( $(this), map );

                });


                // center map
                center_map( map );


                // return
                return map;

            }

            function add_marker( $marker, map ) {

                // var
                var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );

                // create marker
                var marker = new google.maps.Marker({
                    position	: latlng,
                    map			: map
                });

                // add to array
                map.markers.push( marker );

                // if marker contains HTML, add it to an infoWindow
                if( $marker.html() )
                {
                    // create info window
                    var infowindow = new google.maps.InfoWindow({
                        content		: $marker.html()
                    });

                    // show info window when marker is clicked
                    google.maps.event.addListener(marker, 'click', function() {

                        infowindow.open( map, marker );

                    });
                }

            }

            function center_map( map ) {

                // vars
                var bounds = new google.maps.LatLngBounds();

                // loop through all markers and create bounds
                $.each( map.markers, function( i, marker ){

                    var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );

                    bounds.extend( latlng );

                });

                // only 1 marker?
                if( map.markers.length == 1 )
                {
                    // set center of map
                    map.setCenter( bounds.getCenter() );
                    map.setZoom( 16 );
                }
                else
                {
                    // fit to bounds
                    map.fitBounds( bounds );
                }

            }

            var map = null;
            $(document).ready(function(){

                $('.acf-map').each(function(){

                    map = new_map( $(this) );

                });

            });

        })(jQuery);
    </script>

<?php get_footer(); ?>