<?php
if ( !class_exists( 'UixShortcodes' ) ) {
    return;
}

/**
 * Initialize sections template parameters
 * ----------------------------------------------------
 */
$form_vars = UixShortcodes::init_template_parameters( 'uix_sc_map' );
if ( !is_array( $form_vars ) ) return;
foreach ( $form_vars as $key => $v ) :
	$$key = $v;
endforeach;

/**
 * Form Type
 */
$form_type = array(
    'list' => false
);


$args = 
	array(
	
	 
	    array(
			'id'             => 'uix_sc_map_style',
			'title'          => esc_html__( 'Map Style', 'uix-shortcodes' ),
			'desc'           => esc_html__( 'You can make a search, use the name of a place, city, state, or address, or click the location on the map to get lat long coordinates. &rarr; <a href="//www.latlong.net/" target="_blank">Get Latitude Longitude</a>', 'uix-shortcodes' ),
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
			'title'          => esc_html__( 'Map Width', 'uix-shortcodes' ),
			'desc'           => esc_html__( 'It default to using a 100% width.', 'uix-shortcodes' ),
			'value'          => 100,
			'placeholder'    => '',
			'type'           => 'short-units-text',
			'default'        => array(
									'units'  => array( '%', 'px' ),
									'units_id'  => 'uix_sc_map_width_units'
				                )
		
		),
		
	    array(
			'id'             => 'uix_sc_map_height',
			'title'          => esc_html__( 'Map Height', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 285,
			'placeholder'    => '',
			'type'           => 'short-units-text',
			'default'        => array(
									'units'  => array( 'px', 'vh' ),
									'units_id'  => 'uix_sc_map_height_units'
				                )
		
		),	
		
		array(
			'id'             => 'uix_sc_map_name',
			'title'          => esc_html__( 'Place Name', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 'SEO San Francisco, CA, Gough Street, San Francisco, CA',
			'placeholder'    => '',
			'type'           => 'text'
		
		),
		
		array(
			'id'             => 'uix_sc_map_latitude',
			'title'          => esc_html__( 'Latitude', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '37.7770776',
			'placeholder'    => '',
			'type'           => 'text'
		
		),
	
		array(
			'id'             => 'uix_sc_map_longitude',
			'title'          => esc_html__( 'Longitude', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '-122.4414289',
			'placeholder'    => '',
			'type'           => 'text'
		
		),	
		
		
	    array(
			'id'             => 'uix_sc_map_zoom',
			'title'          => esc_html__( 'Zoom', 'uix-shortcodes' ),
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
			'title'          => esc_html__( 'Marker', 'uix-shortcodes' ),
			'desc'           => esc_html__( 'By default, a marker uses a standard image. Markers can display custom images, in which case they are usually referred to as "icons."', 'uix-shortcodes' ),
			'value'          => UixShortcodes::plug_directory().'admin/uixscform/images/map/map-location.png',
			'placeholder'    => esc_html__( 'Image URL', 'uix-shortcodes' ),
			'type'           => 'image',
			'default'        => array(
									'remove_btn_text'  => esc_html__( 'Remove image', 'uix-shortcodes' ),
									'upload_btn_text'  => esc_html__( 'Upload', 'uix-shortcodes' ),
				                )
		
		),	
		
	
	)
;


/**
 * Returns form javascripts
 * ----------------------------------------------------
 */
UixShortcodes::form_scripts( array(
	    'clone'                   => '',
		'form_id'                 => $form_id,
		'section_id'              => $sid,
	    'content_id'              => $cid,
		'fields'                  => array(
										array(
											 'type'    => $form_type,
											 'values'  => $args
										),

									),
		'title'                   => esc_html__( 'Embed a Google Map', 'uix-shortcodes' ),
	    'js_template'             => '
		
			code = "[uix_map style=\'"+uix_sc_map_style+"\' width=\'"+uixscform_floatval( uix_sc_map_width )+uix_sc_map_width_units+"\' height=\'"+uixscform_floatval( uix_sc_map_height )+uix_sc_map_height_units+"\' latitude=\'"+uixscform_floatval( uix_sc_map_latitude )+"\' longitude=\'"+uixscform_floatval( uix_sc_map_longitude )+"\' zoom=\'"+uix_sc_map_zoom+"\' name=\'"+uixscform_shortcodeHTMLEcode( uix_sc_map_name )+"\' marker=\'"+encodeURI( uix_sc_map_marker )+"\' ]";
		
		'
    )
);