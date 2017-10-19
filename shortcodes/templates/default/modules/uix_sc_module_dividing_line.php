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
			'id'             => 'uix_sc_dividing_line_style',
			'title'          => esc_html__( 'Choose Line Style', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 'solid',
			'placeholder'    => '',
			'type'           => 'radio-image',
			'default'        => array(
									'solid'     => UixSCFormCore::plug_directory() .'images/line/line-style-1.png',
									'double'    => UixSCFormCore::plug_directory() .'images/line/line-style-2.png',
									'dashed'    => UixSCFormCore::plug_directory() .'images/line/line-style-3.png',
									'dotted'    => UixSCFormCore::plug_directory() .'images/line/line-style-4.png',
									'shadow'    => UixSCFormCore::plug_directory() .'images/line/line-style-5.png',
									'gradient'  => UixSCFormCore::plug_directory() .'images/line/line-style-6.png',
									
				                )
		
		),
		
		array(
			'id'             => 'uix_sc_dividing_line_color',
			'title'          => esc_html__( 'Color', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '#333',
			'placeholder'    => '',
			'type'           => 'color',
			'default'        => array( '#333', '#fff' )
		
		),
		
	    array(
		    /*
		     * @template vars: 
			 *
				${uix_sc_dividing_line_width}
				${uix_sc_dividing_line_width_units}
			 *
			*/
			'id'             => 'uix_sc_dividing_line_width',
			'title'          => esc_html__( 'Width', 'uix-shortcodes' ),
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
			'id'             => 'uix_sc_dividing_line_opacity',
			'title'          => esc_html__( 'Opacity', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 17,
			'placeholder'    => '',
			'type'           => 'slider',
			'default'        => array(
									'units'  => '%',
									'min'   => 0,
									'max'   => 100,
									'step'  => 1
				                )
		
		),
		
		
		
		
			
	)
;


/**
 * Returns form
 * ----------------------------------------------------
 */
UixSCFormCore::form_scripts( array(
	    'clone'                   => false,
		'form_id'                 => $form_id,
		'fields'                  => array(
										array(
											 'type'    => $form_type,
											 'values'  => $args
										),

									),
		'title'                   => esc_html__( 'Dividing Line', 'uix-shortcodes' ),
	
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
		
		    [uix_dividing_line style=\'${uix_sc_dividing_line_style}\' color=\'{{if uix_sc_dividing_line_color == "#fff"}}light{{/if}}{{if uix_sc_dividing_line_color == "#333"}}dark{{/if}}\' width=\'${uix_sc_dividing_line_width}${uix_sc_dividing_line_width_units}\' opacity=\'${uix_sc_dividing_line_opacity}\']
		

		'
    )
);