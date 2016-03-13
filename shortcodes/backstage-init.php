<?php
/**
 * Add shortcodes
 *
 * Search content for shortcodes and filter shortcodes through their hooks.
 */



/**
 * To add buttons to the editor
 *
 */
function uix_sc_register_buttons( $buttons ) {
    array_push( $buttons, 'uix_shortcode_btn' ); 
    return $buttons;
}
add_filter( 'mce_buttons', 'uix_sc_register_buttons' );


function uix_sc_add_buttons( $plugin_array ) {
    $plugin_array['uix_SC'] = UixShortcodes::plug_directory() .'shortcodes/core/tinymce-plugin.js';
    return $plugin_array;
}
add_filter( "mce_external_plugins", "uix_sc_add_buttons" );


/**
 * Load all the shortcodes panel in the directory
 *
 */
function uix_sc_form_output(){
	foreach ( glob( dirname(__FILE__). "/panel/*.php") as $file ) {
		include $file;
	}	

}
add_action( 'admin_footer', 'uix_sc_form_output' );








