<?php

class CWP_Front{

    private $options = array();

    public function __construct(){
        //Getting options config array from config.php file
        global $options;

        foreach($options as $option){
            if($option['type'] == 'boolean'){
                $this->options[$option['name']] =  (boolean) get_option($option['name']);
            }else{
                $this->options[$option['name']] =  get_option($option['name']);
            }
        }
    }

    public function apply_filter($content){
        global $post;
        
        if($post->post_type != 'post'){
            return $content;
        }
        // Check if we're inside the main loop in a single Post.
        if ( is_singular()) {
            return  $this->apply_custom_fields($content, $post);
        }
       
        return $content;
    }


    private function apply_custom_fields($content, $post){

        $text_custom_field = get_post_meta( $post->ID, 'cwp_text_custom_field', true ); 
        $date_custom_field = get_post_meta( $post->ID, 'cwp_date_custom_field', true ); 
        $image_custom_field = get_post_meta( $post->ID, 'cwp_image_custom_field', true );
        $image_attributes = wp_get_attachment_image_src($image_custom_field, 'full' );
   
        // //Gettings the custom part of the post
        ob_start();
        include  CWP_PLUGIN_DIR . 'views/front.php';
        $front = ob_get_clean();
        
        // //Checking and displaying before or after the content
        if($this->options['cwp_scope_option'] == 'before_content'){
            return  $front.$content;
        }else{
            return  $content.$front;
        }
    }

    /**
     * Add front style
     */
    public function add_style(){
        wp_enqueue_style( 'cwp-style', CWP_PLUGIN_URL. 'assets/css/front.css', false, '1.0', 'all' ); // Inside a plugin

    }
}