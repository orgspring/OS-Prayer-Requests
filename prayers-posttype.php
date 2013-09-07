<?php

/*
	A custom post type for adding prayer requests to your WordPress powered Website. By OrgSpring.
*/


add_action( 'init', 'register_cpt_os_prayer_request' );

function register_cpt_os_prayer_request() {

    $labels = array( 
        'name' => _x( 'Prayer Requests', 'os_prayer_request' ),
        'singular_name' => _x( 'Prayer Request', 'os_prayer_request' ),
        'add_new' => _x( 'Add New', 'os_prayer_request' ),
        'add_new_item' => _x( 'Add New Prayer Request', 'os_prayer_request' ),
        'edit_item' => _x( 'Edit Prayer Request', 'os_prayer_request' ),
        'new_item' => _x( 'New Prayer Request', 'os_prayer_request' ),
        'view_item' => _x( 'View Prayer Request', 'os_prayer_request' ),
        'search_items' => _x( 'Search Prayer Requests', 'os_prayer_request' ),
        'not_found' => _x( 'No prayer requests found', 'os_prayer_request' ),
        'not_found_in_trash' => _x( 'No prayer requests found in Trash', 'os_prayer_request' ),
        'parent_item_colon' => _x( 'Parent Prayer Request:', 'os_prayer_request' ),
        'menu_name' => _x( 'Prayer Requests', 'os_prayer_request' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => false,
        'description' => 'A custom post type for adding prayer requests to your WordPress powered Website. By OrgSpring.',
        'supports' => array( 'title', 'editor', 'author', 'custom-fields','comments'),
        'taxonomies' => array( 'os_prayer_type' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'menu_icon' => 'http://orgspring.com',
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => array( 
            'slug' => 'prayer-requests', 
            'with_front' => true,
            'feeds' => true,
            'pages' => true
        ),
        'capability_type' => 'post'
    );

    register_post_type( 'os_prayer_request', $args );
}