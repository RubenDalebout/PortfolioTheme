<?php
// Stop script if accessed directly
if (!defined('ABSPATH')) exit;

add_action( 'rest_api_init', function() {
    $routes_to_remove = array( 'posts', 'pages', 'comments', 'categories', 'tags' );
    foreach( $routes_to_remove as $route ) {
        register_rest_route( 'wp/v2', '/' . $route, array(
            'methods' => array(),
        ) );
    }
});

// Function to create the custom route for the project post type
function projects_route() {
    // Route for retrieving all published projects
    register_rest_route( 'projects', '/', array(
        'methods'  => 'GET',
        'callback' => 'get_all_published_projects',
        'args'     => array(
            'key' => array(
                'required' => true,
                'validate_callback' => function( $value ) {
                    return $value === 'MY_SECRET_KEY';
                },
                'description' => __( 'A secret key to access the route.', 'portfolio' ),
            ),
        ),
    ) );

    // Route for retrieving a single project by ID
    register_rest_route( 'projects', '/(?P<id>\d+)', array(
        'methods'  => 'GET',
        'callback' => 'get_project',
        'args'     => array(
            'key' => array(
                'required' => true,
                'validate_callback' => function( $value ) {
                    return $value === 'MY_SECRET_KEY';
                },
                'description' => __( 'A secret key to access the route.', 'portfolio' ),
            ),
        ),
    ) );
}
add_action( 'rest_api_init', 'projects_route' );

// Function to retrieve all published projects
function get_all_published_projects( $data ) {
    // Check if the key is correct
    if ( ! isset( $data['key'] ) || $data['key'] !== 'MY_SECRET_KEY' ) {
        return new WP_Error( 'no_access', __( 'You do not have access to this route.', 'portfolio' ), array( 'status' => 401 ) );
    }

    // Query arguments to retrieve all published projects
    $args = array(
        'post_type'      => 'project',
        'posts_per_page' => -1,
        'post_status'    => 'publish',
    );
    $projects = get_posts( $args );

    // Loop through the projects to prepare the data for response
    $data = array();
    foreach ( $projects as $project ) {
        $data[] = array(
            'title'   => $project->post_title,
            'content' => $project->post_content,
            'excerpt' => $project->post_excerpt,
        );
    }
    return $data;
}

// get a single project by ID
function get_project( $data ) {
    // check if access key provided in the request is correct
    $access_key = $data['access_key'];
    if ( $access_key !== 'secret_key' ) {
        return new WP_Error( 'forbidden', __( 'Access denied. Invalid key.', 'tab' ), [ 'status' => 403 ] );
    }
    
    // get the project
    $project = get_post( $data['id'] );
    
    // format the response data
    $response = [
        'id' => $project->ID,
        'title' => $project->post_title,
        'content' => $project->post_content
    ];
    
    return $response;
}