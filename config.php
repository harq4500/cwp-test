<?php
/**
 * Plugin related config data
 */

//Options settings
$options = array(
    array(
        'name'=>'cwp_text_field',
        'type'=>'boolean',
        'default_value'=>true,
        'description'=>'Text field'
    ),
    array(
        'name'=>'cwp_date_field',
        'type'=>'boolean',
        'default_value'=>true,
        'description'=>'Date field'
    ),
    array(
        'name'=>'cwp_image_field',
        'type'=>'boolean',
        'default_value'=>true,
        'description'=>'Image field'
    ),
    array(
        'name'=>'cwp_scope_option',
        'type'=>'text',
        'default_value'=>'after_content',
        'description'=>'Scope'
    )
);