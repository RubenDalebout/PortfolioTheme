<?php
// Stop script if accessed directly
if (!defined('ABSPATH')) exit;

// Enqueue scripts on the pages
function enqueue_theme_scripts() {
    // jQuery
    wp_enqueue_script('jquery');

    // Bootstrap
    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/inc/libraries/boostrap-5.3.0/js/bootstrap.min.js', array('jquery'), (wp_get_environment_type() === 'staging') ? time() : wp_get_theme()->get('Version'), false );


    // Main js file
    wp_enqueue_script( 'main', get_template_directory_uri() . '/assets/js/main.min.js', array('jquery'), (wp_get_environment_type() === 'staging') ? time() : wp_get_theme()->get('Version'), false );
    wp_localize_script( 'main', 'adminData', array( 
        'site' => home_url(),
    ));

    // Bootstrap
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/inc/libraries/boostrap-5.3.0/css/bootstrap.min.css', array(), (wp_get_environment_type() === 'staging') ? time() : wp_get_theme()->get('Version') );


    // Fontawesome
    wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/inc/libraries/fontawesome/css/all.min.css', array(), (wp_get_environment_type() === 'staging') ? time() : wp_get_theme()->get('Version') );
    
    // Base stylesheet
    wp_enqueue_style( 'base', get_template_directory_uri() . '/assets/css/base.min.css', array(), (wp_get_environment_type() === 'staging') ? time() : wp_get_theme()->get('Version') );
}
add_action('wp_enqueue_scripts', 'enqueue_theme_scripts');

// Enqueue scripts on the admin
function enqueue_theme_admin_scripts() {
    
}
add_action('admin_enqueue_scripts', 'enqueue_theme_admin_scripts');
