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
	if ( get_post_type() != 'uix_page_builder' ) {
		foreach ( glob( dirname(__FILE__). "/panel/*.php") as $file ) {
			include $file;
		}	
	
	}

}
add_action( 'admin_footer', 'uix_sc_form_output' );


/**
 * To internationalize a TinyMCE button/plugin within a WordPress plugin
 * @link: https://codex.wordpress.org/Plugin_API/Filter_Reference/mce_external_languages
 *
 */
 
function uix_sc_custom_tinymce_plugin_add_locale( $locales ) {
    $locales [ 'uix_sc_custom_tinymce_plugin' ] = plugin_dir_path ( __FILE__ ) . 'core/tinymce-plugin-lang.php';
    return $locales;
}
add_filter( 'mce_external_languages', 'uix_sc_custom_tinymce_plugin_add_locale' );
