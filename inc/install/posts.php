<?php
// Stop script if accessed directly
if (!defined('ABSPATH')) exit;

// Create custom post type for Projects
function create_project_post_type() {
    $labels = array(
        'name' => __('Projects', 'portfolio'),
        'singular_name' => __('Project', 'portfolio'),
        'add_new' => __('Add New', 'portfolio'),
        'add_new_item' => __('Add New Project', 'portfolio'),
        'edit_item' => __('Edit Project', 'portfolio'),
        'new_item' => __('New Project', 'portfolio'),
        'all_items' => __('All Projects', 'portfolio'),
        'view_item' => __('View Project', 'portfolio'),
        'search_items' => __('Search Projects', 'portfolio'),
        'not_found' => __('No Projects found', 'portfolio'),
        'not_found_in_trash' => __('No Projects found in Trash', 'portfolio'),
        'parent_item_colon' => '',
        'menu_name' => __('Projects', 'portfolio')
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => 'project' ),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => 2,
        'supports' => array( 'title', 'editor', 'author', 'thumbnail'),
        'menu_icon' => 'dashicons-portfolio'
    );

    register_post_type( 'project', $args );
}

// Hook the custom post type function to the init action
add_action( 'init', 'create_project_post_type' );

// Add post thumbnail support for custom post type
add_theme_support( 'post-thumbnails', array( 'project' ) );

// Remove the Posts menu item and Comments menu item
function remove_posts_comments_menu() {
    remove_menu_page('edit.php');
    remove_menu_page('edit-comments.php');
}
add_action( 'admin_menu', 'remove_posts_comments_menu' );

// Redirect users trying to access the Posts and Comments pages
function redirect_posts_comments_page() {
    if (strpos($_SERVER['REQUEST_URI'], '/wp-admin/edit.php') !== false && !isset($_GET['post_type']) || strpos($_SERVER['REQUEST_URI'], '/wp-admin/edit-comments.php') !== false) {
        wp_redirect(admin_url());
    }
}
add_action( 'admin_init', 'redirect_posts_comments_page' );