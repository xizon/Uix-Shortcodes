<?php
if ( !class_exists( 'UixShortcodes' ) ) {
    return;
}

/**
 * Note: 
 *
 * Please refer to sample:  uix_sc_module_sample_hello.php
 * 						    uix_sc_module_sample_hello2.php
 *
 * 1) For all ID attribute, special characters are only allowed underscores "_"
 * 2) Optional params of field "callback":  html, html-shortcode, attr, slug, url, number, number-deg_px, color-name, list, source-code
 * 3) String of clone trigger ID, must contain at least "_triggerclonelist"
 * 4) String of clone ID attribute must contain at least "_listitem"
 * 5) If multiple columns are used to clone event and there are multiple clone triggers, 
      the triggers ID and clone controls ID must contain the string "_one_", "_two", "_three_" or "_four_" for per column
*/



/**
 * Returns current module(form group) ID
 * ----------------------------------------------------
 */
$form_id = basename( __FILE__, '.php' );


/**
 * Form Type & Controls
 * ----------------------------------------------------
 */
$form_type = array(
	'list' => false
);
					


$args = 
	array(

	    array(
			'id'             => 'uix_sc_map_style',
			'title'          => esc_html__( 'Map Style', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 'normal',
			'placeholder'    => '',
			'type'           => 'radio-image',
			'default'        => array(
									'normal'   => UixSCFormCore::plug_directory() .'images/map/map-style-1.png',
									'gray'   => UixSCFormCore::plug_directory() .'images/map/map-style-2.png',
									'black'   => UixSCFormCore::plug_directory() .'images/map/map-style-3.png',
									'real'   => UixSCFormCore::plug_directory() .'images/map/map-style-4.png',
									'terrain'   => UixSCFormCore::plug_directory() .'images/map/map-style-5.png',
									'white'   => UixSCFormCore::plug_directory() .'images/map/map-style-6.png',
									'dark-blue'   => UixSCFormCore::plug_directory() .'images/map/map-style-7.png',
									'dark-blue-2'   => UixSCFormCore::plug_directory() .'images/map/map-style-8.png',
									'blue'   => UixSCFormCore::plug_directory() .'images/map/map-style-9.png',
									'flat'   => UixSCFormCore::plug_directory() .'images/map/map-style-10.png',
				                )
		
		),
		
	


	
		
	    array(
			'id'             => 'uix_sc_map_style_tipinfo',
			'desc'           => wp_kses( sprintf( __( 'Click on the exact location you\'d like coordinates for. Right-click on the pin and select "What\'s here?" <a href="%1$s" target="_blank" rel="nofollow">Get Latitude Longitude</a>', 'uix-shortcodes' ), 'https://www.google.ch/maps/' ), wp_kses_allowed_html( 'post' ) ),
			'type'           => 'note',
			'default'        => array(
		                            'fullwidth'  => false,
									'type'       => 'note'  //error, success, warning, note, default
				                ),
		
		),	
		
	
	
		
		array(

			'id'             => 'uix_sc_map_apikey',
			'title'          => esc_html__( 'Google API key', 'uix-shortcodes' ),
			'desc'           => wp_kses( sprintf( __( '<a href="%1$s" target="_blank">How to 
Get an API Key?</a> If left blank, the default Key will be used, but it will have a traffic excess problem that will not display properly.', 'uix-shortcodes' ), esc_url( '//developers.google.com/maps/documentation/javascript/get-api-key' ) ), wp_kses_allowed_html( 'post' ) ),
			'value'          => esc_attr( get_option( 'uix_sc_opt_map_api', '' ) ),
			'placeholder'    => esc_attr__( 'Your own Google API key', 'uix-shortcodes' ),
			'type'           => 'text',
		    'callback'       => 'attr',
		
		),
	
	
		
	    array(
		    /*
		     * @template vars: 
			 *
				${uix_sc_map_width}
				${uix_sc_map_width_units}
			 *
			*/
			'id'             => 'uix_sc_map_width',
			'title'          => esc_html__( 'Map Width', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 100,
			'placeholder'    => '',
			'type'           => 'short-units-text',
		    'callback'       => 'number',
			'default'        => array(
									'units'       => array( '%', 'px' ),
									'units_value' => '%',
				                )
		
		),
		
	    array(
		    /*
		     * @template vars: 
			 *
				${uix_sc_map_height}
				${uix_sc_map_height_units}
			 *
			*/
			'id'             => 'uix_sc_map_height',
			'title'          => esc_html__( 'Map Height', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 285,
			'placeholder'    => '',
			'type'           => 'short-units-text',
		    'callback'       => 'number',
			'default'        => array(
									'units'      => array( 'px', 'vh' ),
									'units_value' => 'px'
								)
		
		),	
		
		
		
		array(
		    /*
		     * @template vars: 
			 *
				${uix_sc_map_name}
				${uix_sc_map_name_attr}
			 *
			*/
			'id'             => 'uix_sc_map_name',
			'title'          => esc_html__( 'Place Name', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => esc_html__( 'SEO San Francisco, CA, Gough Street, San Francisco, CA', 'uix-shortcodes' ),
			'placeholder'    => '',
			'type'           => 'text',
		    'callback'       => 'attr',
		
		),
		
		array(
			'id'             => 'uix_sc_map_latitude',
			'title'          => esc_html__( 'Latitude', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 37.7770776,
			'placeholder'    => '',
			'type'           => 'text',
		    'callback'       => 'number',
		
		),
	
		array(
			'id'             => 'uix_sc_map_longitude',
			'title'          => esc_html__( 'Longitude', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => -122.4414289,
			'placeholder'    => '',
			'type'           => 'text',
		    'callback'       => 'number',
		
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
			'desc'           => esc_html__( 'Markers can display custom images, in which case they are usually referred to as "icons."', 'uix-shortcodes' ),
			'value'          => UixSCFormCore::plug_directory() .'images/map/map-location.png',
			'placeholder'    => esc_html__( 'Image URL', 'uix-shortcodes' ),
			'type'           => 'image'
		
		),		


	
	)
;

/**
 * Returns form
 * ----------------------------------------------------
 */
UixSCFormCore::form_scripts( array(
	    'clone'        => false,
		'form_id'      => $form_id,
		'fields'       => array(
							array(
								 'type'     => $form_type,
								 'values'   => $args
							),

						),
		'title'        => esc_html__( 'Google Map', 'uix-shortcodes' ),
	
	
		/**
		 * /////////////// Customizing HTML output on the frontend /////////////// 
		 * 
		 * 
		 * Usage:
		 *
		 * 1) Written as pure HTML syntax.
		 * 2) Directly use the controls ID as a variable: ${???}
		 * 3) Using {{if}} and {{else}} to render conditional sections. 
		       -----E.g.
		       {{if your_field_id}} ... {{else}} ... {{/if}}
			   
		 * 4) Using {{each}} to render repeating sections.
		       -----E.g.
				{{each your_clone_trigger_id}}
					{{if your_listitem_field_id != ""}}
					    {{if $index == 0}}<li class="active">{{else}}<li>{{/if}}
						    ${your_listitem_field_id}
						</li>
					{{/if}}	
				{{/each}}
		 
		 */
	    'template'              => '
		  
		 [uix_map style=\'${uix_sc_map_style}\' apikey=\'${uix_sc_map_apikey}\' width=\'${uix_sc_map_width}${uix_sc_map_width_units}\' height=\'${uix_sc_map_height}${uix_sc_map_height_units}\' latitude=\'${uix_sc_map_latitude}\' longitude=\'${uix_sc_map_longitude}\' zoom=\'${uix_sc_map_zoom}\' name=\'${uix_sc_map_name_attr}\' marker=\'${uix_sc_map_marker}\']
	
		'
	
    )
);

