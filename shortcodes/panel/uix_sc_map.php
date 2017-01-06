<?php
if ( !class_exists( 'UixSCFormCore' ) ) {
    return;
}

$sid     = ( isset( $_POST[ 'sectionID' ] ) ) ? $_POST[ 'sectionID' ] : -1;
$pid     = ( isset( $_POST[ 'postID' ] ) ) ? $_POST[ 'postID' ] : 0;
$cid     = ( isset( $_POST[ 'contentID' ] ) ) ? $_POST[ 'contentID' ] : 'content';
/**
 * Form ID
 */
$form_id = 'uix_sc_map';

/**
 * Form Type
 */
$form_type = [
    'list' => false
];


$args = 
	[
	
	 
	    array(
			'id'             => 'uix_sc_map_style',
			'title'          => __( 'Map Style', 'uix-shortcodes' ),
			'desc'           => __( 'You can make a search, use the name of a place, city, state, or address, or click the location on the map to get lat long coordinates. &rarr; <a href="//www.latlong.net/" target="_blank">Get Latitude Longitude</a>', 'uix-shortcodes' ),
			'value'          => 'normal',
			'placeholder'    => '',
			'type'           => 'radio-image',
			'default'        => array(
									'normal'   => UixShortcodes::plug_directory() .'admin/uixscform/images/map/map-style-1.png',
									'gray'   => UixShortcodes::plug_directory() .'admin/uixscform/images/map/map-style-2.png',
									'black'   => UixShortcodes::plug_directory() .'admin/uixscform/images/map/map-style-3.png',
									'real'   => UixShortcodes::plug_directory() .'admin/uixscform/images/map/map-style-4.png',
									'terrain'   => UixShortcodes::plug_directory() .'admin/uixscform/images/map/map-style-5.png',
									'white'   => UixShortcodes::plug_directory() .'admin/uixscform/images/map/map-style-6.png',
									'dark-blue'   => UixShortcodes::plug_directory() .'admin/uixscform/images/map/map-style-7.png',
									'dark-blue-2'   => UixShortcodes::plug_directory() .'admin/uixscform/images/map/map-style-8.png',
									'blue'   => UixShortcodes::plug_directory() .'admin/uixscform/images/map/map-style-9.png',
									'flat'   => UixShortcodes::plug_directory() .'admin/uixscform/images/map/map-style-10.png',
				                )
		
		),
		
	    array(
			'id'             => 'uix_sc_map_width',
			'title'          => __( 'Map Width', 'uix-shortcodes' ),
			'desc'           => __( 'It default to using a 100% width.', 'uix-shortcodes' ),
			'value'          => 100,
			'placeholder'    => '',
			'type'           => 'short-units-text',
			'default'        => array(
									'units'  => [ '%', 'px' ],
									'units_id'  => 'uix_sc_map_width_units'
				                )
		
		),
		
	    array(
			'id'             => 'uix_sc_map_height',
			'title'          => __( 'Map Height', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 285,
			'placeholder'    => '',
			'type'           => 'short-text',
			'default'        => array(
									'units'  => 'px'
				                )
		
		),	
		
		array(
			'id'             => 'uix_sc_map_name',
			'title'          => __( 'Place Name', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 'SEO San Francisco, CA, Gough Street, San Francisco, CA',
			'placeholder'    => '',
			'type'           => 'text'
		
		),
		
		array(
			'id'             => 'uix_sc_map_latitude',
			'title'          => __( 'Latitude', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '37.7770776',
			'placeholder'    => '',
			'type'           => 'text'
		
		),
	
		array(
			'id'             => 'uix_sc_map_longitude',
			'title'          => __( 'Longitude', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '-122.4414289',
			'placeholder'    => '',
			'type'           => 'text'
		
		),	
		
		
	    array(
			'id'             => 'uix_sc_map_zoom',
			'title'          => __( 'Zoom', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 14,
			'placeholder'    => '',
			'type'           => 'slider',
			'default'        => array(
									'min'   => 3,
									'max'   => 21,
									'step'  => 1
				                )
		
		),
		
		array(
			'id'             => 'uix_sc_map_marker',
			'title'          => __( 'Marker', 'uix-shortcodes' ),
			'desc'           => __( 'By default, a marker uses a standard image. Markers can display custom images, in which case they are usually referred to as "icons."', 'uix-shortcodes' ),
			'value'          => UixShortcodes::plug_directory().'admin/uixscform/images/map/map-location.png',
			'placeholder'    => __( 'Image URL', 'uix-shortcodes' ),
			'type'           => 'image',
			'default'        => array(
									'remove_btn_text'  => __( 'Remove image', 'uix-shortcodes' ),
									'upload_btn_text'  => __( 'Upload', 'uix-shortcodes' ),
				                )
		
		),	
		
	
	]
;



$form_html = UixSCFormCore::add_form( $cid, $sid, $form_id, $form_type, $args, 'html' );
$form_js = UixSCFormCore::add_form( $cid, $sid, $form_id, $form_type, $args, 'js' );
$form_js_vars = UixSCFormCore::add_form( $cid, $sid, $form_id, $form_type, $args, 'js_vars' );

/**
 * Returns actions of javascript
 */

if ( $sid == -1 && is_admin() ) {
	$currentScreen = get_current_screen();
	if( $currentScreen->base === "post" || $currentScreen->base === "widgets" || $currentScreen->base === "customize" || UixSCFormCore::inc_str( $currentScreen->base, '_page_' ) ) {
	  	
		
		?>
		<script type="text/javascript">
		( function($) {
		'use strict';
			$( function() {  
				<?php echo UixSCFormCore::uixscform_callback( $form_js, $form_id, __( 'Embed a Google Map', 'uix-shortcodes' ) ); ?>					
				<?php echo UixSCFormCore::send_before( $form_js_vars, $form_id ); ?> 
				/*--**************** Custom shortcode begin ****************-- */
					
				code = "[uix_map style='"+uix_sc_map_style+"' width='"+uixscform_floatval( uix_sc_map_width )+uix_sc_map_width_units+"' height='"+uixscform_floatval( uix_sc_map_height )+"px' latitude='"+uixscform_floatval( uix_sc_map_latitude )+"' longitude='"+uixscform_floatval( uix_sc_map_longitude )+"' zoom='"+uix_sc_map_zoom+"' name='"+uixscform_shortcodeHTMLEcode( uix_sc_map_name )+"' marker='"+encodeURI( uix_sc_map_marker )+"' ]";
					
				/*--**************** Custom shortcode end ****************-- */
				<?php echo UixSCFormCore::send_after( $form_id ); ?> 
		} ) ( jQuery );
		</script>
 
		<?php
	
		
	}
	
}


/**
 * Returns forms with ajax
 */
if ( $sid >= 0 && is_admin() ) {
	echo $form_html;	
}
