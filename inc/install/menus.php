<?php
// Stop script if accessed directly
if (!defined('ABSPATH')) exit;

function register_menus() {
    // Register Menus
    register_nav_menus(array(
        'primary-menu' => __('Primary Menu'),
        'footer-menu' => __('Footer Menu')
    ));
}
add_action('init', 'register_menus');

// Look if menus exists
$primaryItems = wp_get_nav_menu_object('Primary');
$footerItems = wp_get_nav_menu_object('Footer');

// Create Primary menu items
if(!$primaryItems) {
    $primaryMenu = wp_create_nav_menu('Primary');

    // Set menu to Primary Menu location
    $primaryLocation = get_theme_mod('nav_menu_locations');
    $primaryLocation['primary-menu'] = $primaryMenu;
    set_theme_mod('nav_menu_locations', $primaryLocation);

    $frontpage = wp_update_nav_menu_item($primaryMenu, 0, array(
        'menu-item-title' =>  'Frontpage',
        'menu-item-object-id' => get_page_by_path('hey')->ID, 
        'menu-item-object' => 'page',
        'menu-item-status' => 'publish',
        'menu-item-type' => 'post_type'
    ));

    $me = wp_update_nav_menu_item($primaryMenu, 0, array(
        'menu-item-title' =>  'About me',
        'menu-item-object-id' => get_page_by_path('me')->ID, 
        'menu-item-object' => 'page',
        'menu-item-status' => 'publish',
        'menu-item-type' => 'post_type'
    ));
 
    $projects = wp_update_nav_menu_item($primaryMenu, 0, array(
        'menu-item-title' =>  'Projects',
        'menu-item-object-id' => get_page_by_path('projects')->ID, 
        'menu-item-object' => 'page',
        'menu-item-status' => 'publish',
        'menu-item-type' => 'post_type'
    ));

    $contact = wp_update_nav_menu_item($primaryMenu, 0, array(
        'menu-item-title' =>  'Contact',
        'menu-item-object-id' => get_page_by_path('contact')->ID, 
        'menu-item-object' => 'page',
        'menu-item-status' => 'publish',
        'menu-item-type' => 'post_type'
    ));
}