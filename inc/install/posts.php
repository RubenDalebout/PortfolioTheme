<?php
// Stop script if accessed directly
if (!defined('ABSPATH')) exit;

array_map(function($file) {
    // Include each file in the "posts" directory
    include get_template_directory() . '/inc/install/posts/' . $file;
}, array_diff(scandir(get_template_directory() . '/inc/install/posts/'), array('.', '..')));  

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