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
			'id'             => 'uix_sc_container_layout',
			'title'          => esc_html__( 'Choose Layout', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 'fullwidth',
			'placeholder'    => '',
			'type'           => 'radio-image',
			'default'        => array(
									'boxed'        => UixSCFormCore::plug_directory() .'images/container/style-1.jpg',
									'fullwidth'     => UixSCFormCore::plug_directory() .'images/container/style-2.jpg',
				                ),
		
			/* Add the "toggle" field to enable the radio switch */
			'toggle'        => array(
			                        array(
										'trigger_id'        => 'boxed', /* The value of radio */
										'target_ids'        => array( 'uix_sc_container_layout_boxedtip' ) /* Associated control ID */

									),
			                        array(
										'trigger_id'        => 'fullwidth', /* The value of radio */
										'target_ids'        => array( '' ) /* Associated control ID */

									),
									
				                )
							
		),
		
		
		array(
			'id'             => 'uix_sc_container_layout_boxedtip',
			'desc'           => wp_kses( sprintf( __( 'You can custom the boxed width of the container for Uix Shortcodes stylesheets. <a target="_blank" href="%1$s">click here to custom</a>', 'uix-shortcodes' ), admin_url( 'admin.php?page='.UixShortcodes::CUSPAGE.'&tab=custom-css' ) ), wp_kses_allowed_html( 'post' ) ),
			'type'           => 'note',
			'default'        => array(
									'type'  => 'note'  //error, success, warning, note
				                ),
		
		
		),	
		

		array(
		    /*
		     * @template vars: 
			 *
				${uix_sc_container_height}
				${uix_sc_container_height_units}
			 *
			*/
			'id'             => 'uix_sc_container_height',
			'title'          => esc_html__( 'Height', 'uix-shortcodes' ),
			'desc'           => wp_kses( __( 'The browser automatically calculates the container height if the value is <strong>"0"</strong>.', 'uix-shortcodes' ), wp_kses_allowed_html( 'post' ) ),
			'value'          => 300,
			'placeholder'    => '',
			'type'           => 'short-units-text',
		    'callback'       => 'number', 
			'default'        => array(
									'units'       => array( 'px', 'vh' ),
									'units_value' => 'px',
				                )
		
		
		),	
		
		array(
			'id'             => 'uix_sc_container_vertical_center',
			'title'          => esc_html__( 'Vertically Center Content', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 1, //0:false  1:true
			'placeholder'    => '',
			'type'           => 'checkbox'
		
		
		),	
			
			
		array(
			'id'             => 'uix_sc_container_bgimage',
			'title'          => esc_html__( 'Background Image', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => UixSCFormCore::cover_placeholder(),
			'placeholder'    => '',
			'type'           => 'image',
			'default'        => array(
									/*
									 * Activate the image properties when the image URL is not empty.
									 *
									 * @template vars: 
									 *
										${uix_sc_container_bgimage_repeat}
										${uix_sc_container_bgimage_position}
										${uix_sc_container_bgimage_attachment}
										${uix_sc_container_bgimage_size}
									 *
									*/
									'prop_value'  => array(
														'repeat'      => 'no-repeat', 
														'position'    => 'left', 
														'attachment'  => 'scroll', 
														'size'        => 'cover' 
													),
				                )
		
		),	
	
		array(
			'id'             => 'uix_sc_container_bgcolor',
			'title'          => esc_html__( 'Background Color', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'color-picker'
		),
		
	
		
		//------ Toggle of switch with checkbox (begin)
		array(
			'id'             => 'uix_sc_container_border_toggle',
			'title'          => esc_html__( 'Border', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 0, // 0:close  1:open
			'placeholder'    => '',
			'type'           => 'checkbox',
			'toggle'         => array(
				                    'target_ids'  => array( 
															'uix_sc_container_border_width',
															'uix_sc_container_border_color',
															'uix_sc_container_border_style'
														)
				                )
		
		),	
		
			array(
				'id'             => 'uix_sc_container_border_width',
				'title'          => esc_html__( 'Border Width', 'uix-shortcodes' ),
				'desc'           => '',
				'value'          => 1,
				'placeholder'    => '',
				'type'           => 'short-text',
		        'callback'       => 'number',
				'default'        => array(
										'units'  => 'px'
									)
			
			),
			
			
			array(
				'id'             => 'uix_sc_container_border_color',
				'title'          => esc_html__( 'Border Color', 'uix-shortcodes' ),
				'desc'           => '',
				'value'          => '',
				'placeholder'    => '',
				'type'           => 'color-picker'
			),
			
		
			array(
				'id'             => 'uix_sc_container_border_style',
				'title'          => esc_html__( 'Border Style', 'uix-shortcodes' ),
				'desc'           => '',
				'value'          => 'solid',
				'placeholder'    => '',
				'type'           => 'radio',
				'default'        => array(
										'solid'  => 'solid',
										'double'  => 'double',
										'dashed'  => 'dashed',
										'dotted'  => 'dotted',
									)
			
			),
		
		//------ Toggle of switch with checkbox (end)
			
		
	
	
	    array(
			'id'             => 'uix_sc_container_parallax',
			'title'          => esc_html__( 'Parallax', 'uix-shortcodes' ),
			'desc'           => esc_html__( 'Recommended value: -10.00 to 10.00', 'uix-shortcodes' ),
			'value'          => 0,
			'placeholder'    => '',
			'type'           => 'short-text',
		    'callback'       => 'number', 
			'default'        => array(
									'units'  => ''
								)
		
		),
		
		
		array(
		    /*
		     * @template vars: 
			 *
				${uix_sc_container_layout_margin_top}
				${uix_sc_container_layout_margin_right}
				${uix_sc_container_layout_margin_bottom}
				${uix_sc_container_layout_margin_left}
			 *
			*/
			'id'             => 'uix_sc_container_layout_margin',
			'title'          => esc_html__( 'Wrapper Margin (px)', 'uix-shortcodes' ),
			'desc'           => esc_html__( 'Use the input fields below to customize the margin of container wrapper.', 'uix-shortcodes' ),
			'value'          => array(
									'top'     => 25,
									'right'   => 0,
									'bottom'  => 25,
									'left'    => 0
				                ),
			'placeholder'    => '',
			'type'           => 'margin-padding',
		    'callback'       => 'number',
		
		),
		
		
		array(
		    /*
		     * @template vars: 
			 *
				${uix_sc_container_layout_padding_top}
				${uix_sc_container_layout_padding_right}
				${uix_sc_container_layout_padding_bottom}
				${uix_sc_container_layout_padding_left}
			 *
			*/
			'id'             => 'uix_sc_container_layout_padding',
			'title'          => esc_html__( 'Content Padding (px)', 'uix-shortcodes' ),
			'desc'           => esc_html__( 'Use the input fields below to customize the padding of content from container.', 'uix-shortcodes' ),
			'value'          => array(
									'top'     => 0,
									'right'   => 25,
									'bottom'  => 0,
									'left'    => 25
				                ),
			'placeholder'    => '',
			'type'           => 'margin-padding',
		    'callback'       => 'number',
		
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
		'title'        => esc_html__( 'Container/Parallax', 'uix-shortcodes' ),

	
	
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
		
			[uix_container {{if uix_sc_container_vertical_center == 0}}vertical_center=\'false\'{{/if}} parallax=\'${uix_sc_container_parallax}\' height=\'{{if uix_sc_container_height != 0}}${uix_sc_container_height}${uix_sc_container_height_units}{{else}}auto{{/if}}\' margin_top=\'${uix_sc_container_layout_margin_top}\' margin_bottom=\'${uix_sc_container_layout_margin_bottom}\' margin_left=\'${uix_sc_container_layout_margin_left}\' margin_right=\'${uix_sc_container_layout_margin_right}\' padding_top=\'${uix_sc_container_layout_padding_top}\' padding_bottom=\'${uix_sc_container_layout_padding_bottom}\' padding_left=\'${uix_sc_container_layout_padding_left}\' padding_right=\'${uix_sc_container_layout_padding_right}\' {{if uix_sc_container_bgimage != ""}}bgimage=\'${uix_sc_container_bgimage}\' bgimage_repeat=\'${uix_sc_container_bgimage_repeat}\' bgimage_position=\'${uix_sc_container_bgimage_position}\' bgimage_attachment=\'${uix_sc_container_bgimage_attachment}\' bgimage_size=\'${uix_sc_container_bgimage_size}\'{{/if}} {{if uix_sc_container_border_toggle == 1}}borderwidth=\'${uix_sc_container_border_width}px\' borderstyle=\'${uix_sc_container_border_style}\' bordercolor=\'${uix_sc_container_border_color}\'{{/if}} {{if uix_sc_container_bgcolor != ""}}bgcolor=\'${uix_sc_container_bgcolor}\'{{/if}} layout=\'${uix_sc_container_layout}\' ]<p>'.esc_html__( 'Content here...', 'uix-shortcodes' ).'</p>
			[/uix_container]<br>

		'
	
	
    )
);
