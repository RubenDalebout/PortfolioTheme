<?php
// Stop script if accessed directly
if (!defined('ABSPATH')) exit;

// Add a custom metabox to the project post type
function project_links_metabox() {
    add_meta_box( 
        'project_links', 
        __( 'Project links', 'tab' ), 
        'project_links_metabox_callback', 
        'project', 
        'side', 
        'default' 
    );
}
add_action( 'add_meta_boxes', 'project_links_metabox' );

// Callback function for the metabox
function project_links_metabox_callback( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'project_links_nonce' );
    $live_demo = get_post_meta( $post->ID, 'live_demo', true );
    $github = get_post_meta( $post->ID, 'github', true );
    ?>
    <p>
        <label for="live_demo"><?php _e( 'Live demo', 'tab' ); ?>:</label>
        <input type="text" id="live_demo" name="live_demo" value="<?php echo esc_url( $live_demo ); ?>" size="30" />
    </p>
    <p>
        <label for="github"><?php _e( 'Github', 'tab' ); ?>:</label>
        <input type="text" id="github" name="github" value="<?php echo esc_url( $github ); ?>" size="30" />
    </p>
    <?php
}

// Save the metabox data
function save_project_links_metabox( $post_id ) {
    if ( ! isset( $_POST['project_links_nonce'] ) || ! wp_verify_nonce( $_POST['project_links_nonce'], basename( __FILE__ ) ) ) {
        return;
    }
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }
    $live_demo = sanitize_text_field( $_POST['live_demo'] );
    $github = sanitize_text_field( $_POST['github'] );
    update_post_meta( $post_id, 'live_demo', $live_demo );
    update_post_meta( $post_id, 'github', $github );
}
add_action( 'save_post', 'save_project_links_metabox' );
