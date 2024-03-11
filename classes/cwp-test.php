<?php
/**
 * The Plugin main class
 */

class CWP_Test{

    private static $initiated = false;
    
    public static function init() {
        if ( ! self::$initiated ) {
            self::init_hooks();
        }
    }

    /**
    * Initializes WordPress hooks
    */
    private static function init_hooks() {
        self::$initiated = true;
         
        /**
         * Examples of adding actions as static methods
         */

         add_action( 'admin_enqueue_scripts', array('CWP_CustomFields', 'add_admin_script'));

         add_action('add_meta_boxes', array('CWP_CustomFields', 'add_meta_box'));
 
         add_action('save_post', array( 'CWP_CustomFields', 'save_meta_box_data') );

        /**
         * Example of adding actions as non static methods
         */
        
         //Hooks initialized in contructor
         $CWP_Settings = new CWP_Settings();

         $CWP_Front = new CWP_Front();
         add_action('wp_enqueue_scripts', array($CWP_Front, 'add_style'));
         
         add_filter( 'the_content', array( $CWP_Front, 'apply_filter'), 10, 1  );
    }
}