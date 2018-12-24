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
			'id'             => 'uix_sc_heading_title',
			'title'          => esc_html__( 'Title', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => esc_html__( 'Text Here', 'uix-shortcodes' ),
			'placeholder'    => '',
			'type'           => 'text',
		    'callback'       => 'html',
		),	
		
	
	 
	    array(
			'id'             => 'uix_sc_heading_style',
			'title'          => esc_html__( 'Choose Title Style', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 'grand-fill-yellow',
			'placeholder'    => '',
			'type'           => 'radio-image',
			'default'        => array(
									'grand-fill-yellow'   => UixShortcodes::plug_directory() .'includes/uixscform/images/heading/heading-style-1.jpg',
									'grand'               => UixShortcodes::plug_directory() .'includes/uixscform/images/heading/heading-style-2.jpg',
				                ),
		
			/* Add the "toggle" field to enable the radio switch */
			'toggle'        => array(
			                        array(
										'trigger_id'        => 'grand-fill-yellow', /* The value of radio */
										'target_ids'        => array( 'uix_sc_heading_fillbg' ) /* Associated control ID */

									),
			                        array(
										'trigger_id'        => 'grand', /* The value of radio */
										'target_ids'        => array( 
																	'uix_sc_heading_color', 
																	'uix_sc_heading_color_toggle', 
																	'uix_sc_heading_color_other' 
																) /* Associated control ID */

									),
									
				                )
								
		
		),
			
			array(
				'id'             => 'uix_sc_heading_fillbg',
				'title'          => '',
				'desc'           => '',
				'value'          => '',
				'placeholder'    => esc_html__( 'Image for Text Fill', 'uix-shortcodes' ),
				'type'           => 'image'
			
			),	
		
		
			array(
				'id'             => 'uix_sc_heading_color',
				'title'          => esc_html__( 'Heading Color', 'uix-shortcodes' ),
				'desc'           => '',
				'value'          => '',
				'placeholder'    => '',
				'type'           => 'color',
				'default'        => array( '#a2bf2f', '#d59a3e', '#DD514C', '#FA9ADF', '#4BB1CF',  '#0E90D2', '#5F9EA0', '#473f3f',  '#bebebe' )

			),
		
		

			//--- Toggle of unidirectional display (begin)
			array(
				'id'             => 'uix_sc_heading_color_toggle',
				'title'          => '',
				'desc'           => '',
				'value'          => '',
				'placeholder'    => '',
				'type'           => 'toggle',
				'toggle'         => array(
										'btn_text'      => esc_html__( 'other color', 'uix-shortcodes' ),
										'target_ids'    => array( 'uix_sc_heading_color_other' )
									)

			),	

				array(
					'id'             => 'uix_sc_heading_color_other',
					'title'          => '',
					'desc'           => '',
					'value'          => '',
					'placeholder'    => '',
					'type'           => 'color-picker'


				),	
			//--- Toggle of unidirectional display (end)

		
		
	    array(
			'id'             => 'uix_sc_heading_size',
			'title'          => esc_html__( 'Size', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 52,
			'placeholder'    => '',
			'type'           => 'short-text',
		    'callback'       => 'number',
			'default'        => array(
									'units'  => 'px'
				                )
		
		),
		
		

		
		
			
		array(
			'id'             => 'uix_sc_heading_align',
			'title'          => esc_html__( 'Alignment', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 'center',
			'placeholder'    => '',
			'type'           => 'radio',
			'default'        => array(
									'left'    => 'left',
									'center'  => 'center',
									'right'  => 'right',
								)
		
		),	
		
		array(
			'id'             => 'uix_sc_heading_spacing',
			'title'          => esc_html__( 'Letter Spacing', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 2,
			'placeholder'    => '',
			'type'           => 'short-text',
		    'callback'       => 'number',
			'default'        => array(
									'units'  => 'px'
								)
		
		),
		
		
		
		array(
			'id'             => 'uix_sc_heading_uppercase',
			'title'          => esc_html__( 'Uppercase of Text', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 1, //0:false  1:true
			'placeholder'    => '',
			'type'           => 'checkbox'
		
		
		),	
		
		//------ Toggle of switch with checkbox (begin)
		array(
			'id'             => 'uix_sc_heading_line',
			'title'          => esc_html__( 'Underline', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 0, // 0:close  1:open
			'placeholder'    => '',
			'type'           => 'checkbox',
			'toggle'         => array(
				                    'target_ids'  => array( 
														'uix_sc_heading_line_width', 
														'uix_sc_heading_line_height' 
													)
				                )
		
		
		),	
		
			array(
		    /*
		     * @template vars: 
			 *
				${uix_sc_heading_line_width}
				${uix_sc_heading_line_width_units}
			 *
			*/
				'id'             => 'uix_sc_heading_line_width',
				'title'          => esc_html__( 'Line Width', 'uix-shortcodes' ),
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
				'id'             => 'uix_sc_heading_line_height',
				'title'          => esc_html__( 'Line Height', 'uix-shortcodes' ),
				'desc'           => '',
				'value'          => 1,
				'placeholder'    => '',
				'type'           => 'short-text',
		        'callback'       => 'number',
				'default'        => array(
										'units'  => 'px'
									)
			
			),
		//------ Toggle of switch with checkbox (end)
		
		
		//------ Toggle of switch with checkbox (begin)
		array(
			'id'             => 'uix_sc_heading_desc_toggle',
			'title'          => esc_html__( 'Description', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 0, // 0:close  1:open
			'placeholder'    => '',
			'type'           => 'checkbox',
			'toggle'         => array(
				                    'target_ids'  => array( 
														'uix_sc_heading_desc', 
														'uix_sc_heading_desc_size',
														'uix_sc_heading_desc_color',
														'uix_sc_heading_desc_color_toggle',
														'uix_sc_heading_desc_color_other',
														'uix_sc_heading_desc_opacity'
													)
				                )
		),	
		
	
		
			array(
				'id'             => 'uix_sc_heading_desc',
				'title'          => esc_html__( 'Displayed Text', 'uix-shortcodes' ),
				'desc'           => '',
				'value'          => '',
				'placeholder'    => '',
				'type'           => 'textarea',
		        'callback'       => 'html',
				'default'        => array(
										'row'     => 3
									)
			
			),
			
				
			array(
				'id'             => 'uix_sc_heading_desc_size',
				'title'          => esc_html__( 'Font Size', 'uix-shortcodes' ),
				'desc'           => '',
				'value'          => 12,
				'placeholder'    => '',
				'type'           => 'short-text',
		        'callback'       => 'number',
				'default'        => array(
										'units'  => 'px'
									)
			
			),
			
			
		
			array(
				'id'             => 'uix_sc_heading_desc_color',
				'title'          => esc_html__( 'Description Color', 'uix-shortcodes' ),
				'desc'           => '',
				'value'          => '',
				'placeholder'    => '',
				'type'           => 'color',
				'default'        => array( '#a2bf2f', '#d59a3e', '#DD514C', '#FA9ADF', '#4BB1CF',  '#0E90D2', '#5F9EA0', '#473f3f',  '#bebebe' )
			
			),
			
			//--- Toggle of unidirectional display (begin)
			array(
				'id'             => 'uix_sc_heading_desc_color_toggle',
				'title'          => '',
				'desc'           => '',
				'value'          => '',
				'placeholder'    => '',
				'type'           => 'toggle',
				'toggle'         => array(
										'btn_text'      => esc_html__( 'other color', 'uix-shortcodes' ),
										'target_ids'    => array( 'uix_sc_heading_desc_color_other' )
									)
			
			),	
				
				array(
					'id'             => 'uix_sc_heading_desc_color_other',
					'title'          => '',
					'desc'           => '',
					'value'          => '',
					'placeholder'    => '',
					'type'           => 'color-picker'
				
				
				),		
		    //--- Toggle of unidirectional display (end)
	
			
			
			array(
				'id'             => 'uix_sc_heading_desc_opacity',
				'title'          => esc_html__( 'Opacity', 'uix-shortcodes' ),
				'desc'           => '',
				'value'          => 65,
				'placeholder'    => '',
				'type'           => 'slider',
				'default'        => array(
										'units'  => '%',
										'min'   => 0,
										'max'   => 100,
										'step'  => 1
									)
			
			),
		//------ Toggle of switch with checkbox (end)
		
	
	
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
		'title'                   => esc_html__( 'Special Heading', 'uix-shortcodes' ),
	
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
		
			[uix_heading color=\'{{if uix_sc_heading_style == "grand"}}{{if uix_sc_heading_color_other != ""}}${uix_sc_heading_color_other}{{else}}${uix_sc_heading_color}{{/if}}{{/if}}\' style=\'${uix_sc_heading_style}\' align=\'${uix_sc_heading_align}\' size=\'${uix_sc_heading_size}px\' uppercase=\'{{if uix_sc_heading_uppercase == 1}}true{{else}}false{{/if}}\' spacing=\'${uix_sc_heading_spacing}px\' fillbg=\'${uix_sc_heading_fillbg}\']
				${uix_sc_heading_title}
			[/uix_heading]

			{{if uix_sc_heading_desc != "" && uix_sc_heading_desc_toggle == 1}}

				[uix_heading_sub color=\'{{if uix_sc_heading_desc_color_other != ""}}${uix_sc_heading_desc_color_other}{{else}}${uix_sc_heading_desc_color}{{/if}}\' align=\'${uix_sc_heading_align}\' size=\'${uix_sc_heading_desc_size}px\' uppercase=\'{{if uix_sc_heading_uppercase == 1}}true{{else}}false{{/if}}\' spacing=\'${uix_sc_heading_spacing}px\' opacity=\'${uix_sc_heading_desc_opacity}\']
					${uix_sc_heading_desc}
				[/uix_heading_sub]

			{{/if}}


			[uix_heading_line line=\'{{if uix_sc_heading_line == 1}}true{{else}}false{{/if}}\' width=\'${uix_sc_heading_line_width}${uix_sc_heading_line_width_units}\' height=\'${uix_sc_heading_line_height}px\']


		'
	
    )
);
