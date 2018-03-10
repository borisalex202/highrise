<?php

/*
 * Includes
 */

require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/breadcrumbs.php';
require get_template_directory() . '/inc/taxonomy.php';


function highrise_setup() {

    load_theme_textdomain( 'highrise' );

    add_theme_support( 'automatic-feed-links' );

    add_theme_support( 'title-tag' );

    add_theme_support( 'post-thumbnails' );

    set_post_thumbnail_size( 825, 510, true );

    register_nav_menus( array(
        'primary'     => __( 'Main Menu',          'highrise' ),
        'social'      => __( 'Social Links Menu',  'highrise' ),
        'additional'  => __( 'Additional Menu',    'highrise' )
    ) );

    add_theme_support( 'html5', array(
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
    ) );

    add_theme_support( 'post-formats', array(
        'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
    ) );
}
add_action( 'after_setup_theme', 'highrise_setup' );

function highrise_scripts() {
    wp_enqueue_style( 'highrise-style', get_stylesheet_uri() );

    wp_enqueue_style( 'highrise-ie', get_template_directory_uri() . '/css/ie.css', array( 'highrise-style' ), '20141010' );
    wp_style_add_data( 'highrise-ie', 'conditional', 'lt IE 9' );

    wp_enqueue_style( 'highrise-ie7', get_template_directory_uri() . '/css/ie7.css', array( 'highrise-style' ), '20141010' );
    wp_style_add_data( 'highrise-ie7', 'conditional', 'lt IE 8' );

    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', get_template_directory_uri() . '/js/jquery/jquery.js', '', true);
    wp_enqueue_script( 'jquery' );

    wp_register_script( 'external-scripts', get_template_directory_uri() . '/js/external.js', '', true);
    wp_enqueue_script( 'external-scripts' );

    wp_register_script( 'internal-scripts', get_template_directory_uri() . '/js/internal.js', array( 'external-scripts' ), true);
    wp_enqueue_script( 'internal-scripts' );

}
add_action( 'wp_enqueue_scripts', 'highrise_scripts' );

function clean_script_tag($input) {
    $input = str_replace("type='text/javascript' ", '', $input);
    return str_replace("'", '"', $input);
}
add_filter('script_loader_tag', 'clean_script_tag');

function my_acf_google_map_api( $api ){

    $api['key'] = 'AIzaSyAH8x96bQJZ5oeR4WkFwCUiin0Y5WwqEDw';
    return $api;

}
add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');