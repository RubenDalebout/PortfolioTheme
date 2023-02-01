<?php
// Stop script if accessed directly
if (!defined('ABSPATH')) exit;

// Enqueue scripts on the pages
function enqueue_theme_scripts() {
    // jQuery
    wp_enqueue_script('jquery');

    // Main js file
    wp_enqueue_script( 'main', get_template_directory_uri() . '/assets/js/main.min.js', array('jquery'), (wp_get_environment_type() === 'staging') ? time() : wp_get_theme()->get('Version'), false );
    wp_localize_script( 'main', 'adminData', array( 
        'site' => home_url(),
    ));
    
    // Base stylesheet
    wp_enqueue_style( 'base', get_template_directory_uri() . '/assets/css/base.min.css', array(), (wp_get_environment_type() === 'staging') ? time() : wp_get_theme()->get('Version') );
}
add_action('wp_enqueue_scripts', 'enqueue_theme_scripts');

// Enqueue scripts on the admin
function enqueue_theme_admin_scripts() {
    
}
add_action('admin_enqueue_scripts', 'enqueue_theme_admin_scripts');
