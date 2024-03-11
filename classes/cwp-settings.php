<?php

class CWP_Settings{

    /**
     * Start up
     */
    public function __construct(){

        $this->add_options();
        //initializing action hooks 
       
        add_action('admin_menu', array($this,'create_admin_menu'));
        add_action( 'admin_init', array( $this, 'page_init' ) );

    }

     /**
     * Add options page
     */
    public function create_admin_menu(){
        // This page will be under "Settings"
        add_submenu_page( 
            'options-general.php', 
            __('CWP Settings',CWP_TXT_DOMAIN), 
            __('CWP Settings',CWP_TXT_DOMAIN),
            'manage_options', 
            'cwp-settings', 
            array($this,'menu_callback')
        ); 
       
    }

    /**
     * Options page callback
     */
    public function menu_callback(){
       
        include_once CWP_PLUGIN_DIR.'views/settings.php';
    }

    /**
     * Register and add settings
     */
    public function page_init()
    {   
         //Getting options config array from config.php file
        global $options;
       
        foreach($options as $option){
            register_setting(
                'cwp_option_group', // Option group
                $option['name'], // Option name
                
                array(
                    'type' => $option['type'],
                    'default'=> $option['default_value']
                )
            
            );
        }
    }
    
    /**
     * Adds options with defrault values
     */
    private function add_options(){
        //Getting options config array from config.php file
        global $options;
        foreach($options as $option){
            add_option($option['name'],$option['default_value']);
        }
    }

    /**
     * Sanitize each setting field as needed
     *
     * @param array $input Contains all settings fields as array keys
     */
    public function sanitize( $input )
    {
        return sanitize_text_field($input);
    }
}