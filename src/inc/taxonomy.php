<?php

/*
 *
 * Games
 *
 */
add_action( 'init', 'register_post_games', 0 );

function register_post_games() {
    $args = array(
        'label'  => _x( 'Games', 'Post Type General Name', 'highrise' ),
        'labels' => array(
            'name' => _x( 'Games', 'Post Type General Name', 'highrise' ),
            'singular_name' => _x( 'Games', 'Post Type Singular Name', 'highrise' ),
            'add_new' => __( 'Add new Game', 'highrise' ),
            'add_new_item' => __( 'Add Game', 'highrise' ),
            'edit_item' => __( 'Edit Game', 'highrise' ),
            'new_item' => __( 'New Game', 'highrise' ),
            'view_item' => __( 'Show Game', 'highrise' ),
            'search_items' => __( 'Search Games', 'highrise' ),
            'not_found' => __( 'Games not found ', 'highrise' ),
            'not_found_in_trash' => __( 'Games in cart not found', 'highrise' ),
            'parent_item_colon' => null,
            'all_items' => __( 'All Games', 'highrise' ),
            'archives' => __( 'Archives of Games', 'highrise' ),
            'insert_into_item' => __( 'Paste in GAme', 'highrise' ),
            'uploaded_to_this_item' => _x( 'Download for:', 'highrise' ),
            'featured_image' => __( 'Thumbnail', 'highrise' ),
            'set_featured_image' => __( 'Set a thumbnail', 'highrise' ),
            'remove_featured_image' => __( 'Remove a thumbnail', 'highrise' ),
            'use_featured_image' => __( 'Use a thumbnail', 'highrise' ),
            'menu_name' => __( 'Games', 'highrise' ),
            'name_admin_bar' => __( 'Game', 'highrise' ),
            'items_list' => __( 'Games list', 'highrise' ),
            'items_list_navigation' => __( 'Pagination navigation', 'highrise' ),
            'filter_items_list' => __( 'Filter', 'highrise' ),
        ),
        'description' => '',
        'public' => true,
        'exclude_from_search' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_nav_menus' => true,
        'show_in_menu' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-image-filter',

        'map_meta_cap' => null,
        'hierarchical' => false,
        'supports' => array(
            'title',
            'editor',
            'author',
            'thumbnail',
            'excerpt',
            'trackbacks',
            'custom-fields',
            'comments',
            'revisions',
            'page-attributes',
            'post-formats',
        ),
        'register_meta_box_cb' => null,
        'taxonomies' => array('taxgames'),
        'has_archive' => false,
        'rewrite' => array(
            'slug' => 'games',
            'with_front' => false,
            'feeds' => false,
            'pages' => true,
        ),
        'permalink_epmask' => EP_PERMALINK,
        'query_var' => true,
        'can_export' => true,
        'delete_with_user' => null,
        'show_in_rest' => false,
        '_builtin' => false,
    );
    register_post_type( 'games', $args );
}

/*
 *
 * Team
 *
 */
add_action( 'init', 'register_post_team', 0 );

function register_post_team() {
    $args = array(
        'label'  => _x( 'Team', 'Post Type General Name', 'highrise' ),
        'labels' => array(
            'name' => _x( 'Team', 'Post Type General Name', 'highrise' ),
            'singular_name' => _x( 'Team', 'Post Type Singular Name', 'highrise' ),
            'add_new' => __( 'Add new team member', 'highrise' ),
            'add_new_item' => __( 'Add team member', 'highrise' ),
            'edit_item' => __( 'Edit team member', 'highrise' ),
            'new_item' => __( 'New team member', 'highrise' ),
            'view_item' => __( 'Show team member', 'highrise' ),
            'search_items' => __( 'Search team members', 'highrise' ),
            'not_found' => __( 'Team members not found ', 'highrise' ),
            'not_found_in_trash' => __( 'Team members in cart not found', 'highrise' ),
            'parent_item_colon' => null,
            'all_items' => __( 'All team members', 'highrise' ),
            'archives' => __( 'Archives of team members', 'highrise' ),
            'insert_into_item' => __( 'Paste in team member', 'highrise' ),
            'uploaded_to_this_item' => _x( 'Download for:', 'highrise' ),
            'featured_image' => __( 'Thumbnail', 'highrise' ),
            'set_featured_image' => __( 'Set a thumbnail', 'highrise' ),
            'remove_featured_image' => __( 'Remove a thumbnail', 'highrise' ),
            'use_featured_image' => __( 'Use a thumbnail', 'highrise' ),
            'menu_name' => __( 'Team', 'highrise' ),
            'name_admin_bar' => __( 'Team', 'highrise' ),
            'items_list' => __( 'Team list', 'highrise' ),
            'items_list_navigation' => __( 'Pagination navigation', 'highrise' ),
            'filter_items_list' => __( 'Filter', 'highrise' ),
        ),
        'description' => '',
        'public' => true,
        'exclude_from_search' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_nav_menus' => true,
        'show_in_menu' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-admin-users',

        'map_meta_cap' => null,
        'hierarchical' => false,
        'supports' => array(
            'title',
            'editor',
            'author',
            'thumbnail',
            'excerpt',
            'trackbacks',
            'custom-fields',
            'comments',
            'revisions',
            'page-attributes',
            'post-formats',
        ),
        'register_meta_box_cb' => null,
        'taxonomies' => array('taxteam'),
        'has_archive' => false,
        'rewrite' => array(
            'slug' => 'team',
            'with_front' => false,
            'feeds' => false,
            'pages' => true,
        ),
        'permalink_epmask' => EP_PERMALINK,
        'query_var' => true,
        'can_export' => true,
        'delete_with_user' => null,
        'show_in_rest' => false,
        '_builtin' => false,
    );
    register_post_type( 'team', $args );
}