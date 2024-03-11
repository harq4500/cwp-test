<?php
/**
 * The Plugin main class
 */

class CWP_CustomFields{
    
    /**
     * Adds metabox to post
     */
    public static function add_meta_box(){
        add_meta_box(
            'cwp_custom_field_sectionid',   //meta box  ID
            __('CWP Custom Fields', CWP_TXT_DOMAIN),    //meta box  title
            array(__CLASS__,'meta_box_callback'),   //meta box callback function that prints the meta box HTML
            'post', // screen, post type to add meta box to
            'side',   // context/ position
            'default'  //priority
        );
    }

    /*
    * Meta box callback (add_meta_box method's argument), prints the meta box View / HTML
    * @param WP_Post $post.
    */

    public static function meta_box_callback($post){

         // Add a nonce field so we can check for it later for security and authentication.
         wp_nonce_field( 'cwp_save_meta_box_data', 'cwp_meta_box_nonce' );
        
         /*
         * Use get_post_meta() to retrieve an existing value
         * from the database and use the value for the form.
         */
         $text_custom_field = get_post_meta( $post->ID, 'cwp_text_custom_field', true ); // variable is used in the view file /views/metabox.php
         $date_custom_field = get_post_meta( $post->ID, 'cwp_date_custom_field', true ); // variable is used in the view file /views/metabox.php
         $image_custom_field = get_post_meta( $post->ID, 'cwp_image_custom_field', true );
        
         //Setting up image part
        
         $image_size = 'full'; // it would be better to use thumbnail size here (150x150 or so)
         $display = 'none'; // display state ot the "Remove image" button

         $image_attributes = wp_get_attachment_image_src($image_custom_field, $image_size );
       
         if( !empty($image_attributes)) {
     
             // $image_attributes[0] - image URL
             // $image_attributes[1] - image width
             // $image_attributes[2] - image height
             $display = 'inline-block';
         } 
     
          
         include_once CWP_PLUGIN_DIR.'views/metabox.php';
    }

    /**
     * Enqueue a script in the WordPress admin
     * 
     * @param string $hook Hook suffix for the current admin page.
     */
    public static function add_admin_script($hook ){
         //check admin page, if is the right page to enqueue the script
        if(!in_array($hook, array('post-new.php','post.php'))){
            return;
        }

        $screen = get_current_screen(); 
        if(!isset($screen) || $screen->post_type != 'post'){
            return;
        }
       
        if ( ! did_action( 'wp_enqueue_media' ) ) {
            wp_enqueue_media();
        }

        wp_enqueue_script( 'cwp-admin-script', CWP_PLUGIN_URL . 'assets/js/image.js', array('jquery'), null, false );
    }

    /**
     * When the post is saved, saves our custom data.
     *
     * @param int $post_id The ID of the post being saved.
     */
    public static function  save_meta_box_data( $post_id ) {

         // Check if a nonce is set.
        if ( ! isset( $_POST['cwp_meta_box_nonce'] ) ) {
            return;
        }

        // Check if a nonce is valid.
        if ( ! wp_verify_nonce( $_POST['cwp_meta_box_nonce'], 'cwp_save_meta_box_data') ) {
            return;
        }

        // Check if it's not an autosave.
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE && wp_is_post_autosave( $post_id ) ) {
            return;
        }

        // Check the user's permissions.
        if ( isset( $_POST['post_type'] ) && 'post' == $_POST['post_type'] ) {

            if ( ! current_user_can( 'edit_post', $post_id ) ) {
                return;
            }

        }

        // Check if it's not a revision.
        if ( wp_is_post_revision( $post_id ) ){
            return;
        }
        
        // Sanitize user input.
        $text_custom_field = sanitize_text_field( $_POST['cwp_text_custom_field'] );
        $date_custom_field =  sanitize_text_field($_POST['cwp_date_custom_field']);
        $image_custom_field = sanitize_text_field( $_POST['cwp_image_custom_field'] );
       
        //Update metas
        update_post_meta( $post_id, 'cwp_text_custom_field', $text_custom_field );
        update_post_meta( $post_id, 'cwp_date_custom_field', $date_custom_field );
        update_post_meta( $post_id, 'cwp_image_custom_field', $image_custom_field );

    }
}