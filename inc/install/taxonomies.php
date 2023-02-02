<?php
// Stop script if accessed directly
if (!defined('ABSPATH')) exit;

// Register custom taxonomy for Coding Languages
function create_coding_language_taxonomy() {
    $labels = array(
        'name' => __( 'Coding Languages', 'portfolio' ),
        'singular_name' => __( 'Coding Language', 'portfolio' ),
        'search_items' => __( 'Search Coding Languages', 'portfolio' ),
        'all_items' => __( 'All Coding Languages', 'portfolio' ),
        'parent_item' => __( 'Parent Coding Language', 'portfolio' ),
        'parent_item_colon' => __( 'Parent Coding Language:', 'portfolio' ),
        'edit_item' => __( 'Edit Coding Language', 'portfolio' ),
        'update_item' => __( 'Update Coding Language', 'portfolio' ),
        'add_new_item' => __( 'Add New Coding Language', 'portfolio' ),
        'new_item_name' => __( 'New Coding Language Name', 'portfolio' ),
        'menu_name' => __( 'Coding Languages', 'portfolio' ),
    );

    $args = array(
        'hierarchical' => false,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => 'coding-language' ),
    );

    register_taxonomy( 'coding_languages', array( 'project', 'certificate' ), $args );
}

// Hook the custom taxonomy function to the init action
add_action( 'init', 'create_coding_language_taxonomy' );

// Function to create the most common coding languages if they do not exist
function create_common_coding_languages() {
    $common_languages = array(
        'PHP',
        'JavaScript',
        'HTML',
        'CSS',
        'Java',
        'Python',
        'C++',
        'C#',
        'Ruby',
        'Swift',
        'Go',
        'TypeScript',
        'SQL',
        'Objective-C',
        'R',
        'Perl',
        'Kotlin',
        'Scala',
        'Dart',
        'Rust',
        'Vue.js',
        'React',
        'Angular',
        'Node.js'
    );
  
    foreach ($common_languages as $language) {
        if (!term_exists($language, 'coding_languages')) {
            wp_insert_term(
                $language,
                'coding_languages'
            );
        }
    }
}

// Hook the function to the init action
add_action( 'init', 'create_common_coding_languages' );

// Register the taxonomy
function register_tags_taxonomy() {
    register_taxonomy(
        'tags',
        'project',
        array(
            'labels' => array(
                'name' => __( 'Tags', 'portfolio' ),
                'singular_name' => __( 'Tag', 'portfolio' ),
                'search_items' => __( 'Search Tags', 'portfolio' ),
                'all_items' => __( 'All Tags', 'portfolio' ),
                'edit_item' => __( 'Edit Tag', 'portfolio' ),
                'update_item' => __( 'Update Tag', 'portfolio' ),
                'add_new_item' => __( 'Add New Tag', 'portfolio' ),
                'new_item_name' => __( 'New Tag Name', 'portfolio' ),
                'menu_name' => __( 'Tags', 'portfolio' ),
            ),
            'hierarchical' => false,
            'show_ui' => true,
            'show_admin_column' => true,
            'query_var' => true,
            'rewrite' => array( 'slug' => 'tag' ),
        )
    );
}

// Hook the taxonomy registration function to the init action
add_action( 'init', 'register_tags_taxonomy' );

// Function to create the tags if they do not exist
function create_tags() {
    $tags = array(
        'WordPress',
        'Minecraft',
        'Web',
        'App',
        'Finished',
        'Developing',
        'Gaming',
        'Business',
        'Fun',
        'Learning'
    );
  
    foreach ($tags as $tag) {
        if (!term_exists($tag, 'tags')) {
            wp_insert_term(
                $tag,
                'tags'
            );
        }
    }
}

// Hook the function to the init action
add_action( 'init', 'create_tags' );