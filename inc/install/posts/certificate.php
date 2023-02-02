<?php
// Stop script if accessed directly
if (!defined('ABSPATH')) exit;

// Create custom post type for Certificates
function create_certificate_post_type() {
    $labels = array(
        'name' => __('Certificates', 'portfolio'),
        'singular_name' => __('Certificate', 'portfolio'),
        'add_new' => __('Add New', 'portfolio'),
        'add_new_item' => __('Add New Certificate', 'portfolio'),
        'edit_item' => __('Edit Certificate', 'portfolio'),
        'new_item' => __('New Certificate', 'portfolio'),
        'all_items' => __('All Certificates', 'portfolio'),
        'view_item' => __('View Certificate', 'portfolio'),
        'search_items' => __('Search Certificates', 'portfolio'),
        'not_found' => __('No Certificates found', 'portfolio'),
        'not_found_in_trash' => __('No Certificates found in Trash', 'portfolio'),
        'parent_item_colon' => '',
        'menu_name' => __('Certificates', 'portfolio')
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => 'certificate' ),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => 2,
        'supports' => array( 'title', 'editor', 'author', 'thumbnail'),
        'menu_icon' => 'dashicons-awards'
    );

    register_post_type( 'certificate', $args );
}

// Hook the custom post type function to the init action
add_action( 'init', 'create_certificate_post_type' );