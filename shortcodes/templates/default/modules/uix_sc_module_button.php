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
			'id'             => 'uix_sc_btn_paddingspacing',
			'title'          => esc_html__( 'Size', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 1,
			'placeholder'    => '',
			'type'           => 'radio',
			'default'        => array(
									'1'  => 'large',
									'2'  => 'medium',
									'3'  => 'small',
								)

		),

	 
		array(
			/*
			 * @template vars: 
			 *
				${uix_sc_btn_color}
				${uix_sc_btn_color_name}
			 *
			*/
			'id'             => 'uix_sc_btn_color',
			'title'          => esc_html__( 'Button Color', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '#a2bf2f',
			'placeholder'    => '',
			'type'           => 'color',
		    'callback'       => 'color-name',
			'default'        => array( '#a2bf2f', '#d59a3e', '#DD514C', '#FA9ADF', '#4BB1CF',  '#0E90D2', '#5F9EA0', '#473f3f',  '#bebebe' )
		
		),
	
		
		array(
			'id'             => 'uix_sc_btn_hovercolor',
			'title'          => esc_html__( 'Hover Color', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'color',
			'default'        => array( '#b2de70', '#eae081', '#eead8f', '#fdc8e2', '#8ec0e7',  '#3d9ae8', '#9ebfcc', '#8a8482',  '#dddddd' )
		
		),
		
	
		
		
		array(
			'id'             => 'uix_sc_btn_txtcolor',
			'title'          => esc_html__( 'Text Color', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '#ffffff',
			'placeholder'    => '',
			'type'           => 'color',
			'default'        => array( '#ffffff', '#000000', '#888888' )
		
		
		),
	
		
		
		array(
			'id'             => 'uix_sc_btn_label',
			'title'          => esc_html__( 'Link Text', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => esc_html__( 'Link to', 'uix-shortcodes' ),
			'placeholder'    => '',
			'type'           => 'text',
		    'callback'       => 'html',
		
		),
		
		array(
			'id'             => 'uix_sc_btn_url',
			'title'          => esc_html__( 'Destination URL', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => esc_html__( 'http://', 'uix-shortcodes' ),
			'type'           => 'text',
		    'callback'       => 'url',
		
		),
		
		
		array(
			'id'             => 'uix_sc_btn_fillet',
			'title'          => esc_html__( 'Fillet Radius', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 50,
			'placeholder'    => '',
			'type'           => 'short-text',
		    'callback'       => 'number',
			'default'        => array(
									'units'  => 'px'
								)
		
		),	

		
		array(
			'id'             => 'uix_sc_btn_target',
			'title'          => esc_html__( 'Open link in new tab', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 0, //0:false  1:true
			'placeholder'    => '',
			'type'           => 'checkbox'
		
		
		),	
		
		
		
		
		
		//--- Toggle of unidirectional display (begin)
		array(
			'id'             => 'uix_sc_btn_more_attributes_toggle',
			'title'          => '',
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'toggle',
			'toggle'         => array(
			                        'btn_textclass' => 'table-link-icon',
			                        'btn_text'      => esc_html__( 'click on the set more attributes', 'uix-shortcodes' ),
									'target_ids'    => array( 
															'uix_sc_btn_color_other',
															'uix_sc_btn_hovercolor_other',
															'uix_sc_btn_txtcolor_other',
															'uix_sc_btn_icon',
															'uix_sc_btn_fontsize',
															'uix_sc_btn_letterspacing'
														)
				                )
		
		),	
	
		
			
			array(
				'id'             => 'uix_sc_btn_color_other',
				'title'          => esc_html__( 'Other Color Button', 'uix-shortcodes' ),
				'desc'           => '',
				'value'          => '',
				'placeholder'    => '',
				'type'           => 'color-picker'
			
			
			),	
			
			array(
				'id'             => 'uix_sc_btn_hovercolor_other',
				'title'          => esc_html__( 'Other Color Hover', 'uix-shortcodes' ),
				'desc'           => '',
				'value'          => '',
				'placeholder'    => '',
				'type'           => 'color-picker'
			
			
			),	
		
			array(
				'id'             => 'uix_sc_btn_txtcolor_other',
				'title'          => esc_html__( 'Other Color Text', 'uix-shortcodes' ),
				'desc'           => '',
				'value'          => '',
				'placeholder'    => '',
				'type'           => 'color-picker'
			
			
			),	
		
			array(
				'id'             => 'uix_sc_btn_icon',
				'title'          => esc_html__( 'Icon&apos;s Name', 'uix-shortcodes' ),
				'desc'           => esc_html__( 'Tips: that will be pure text button if icon does not choose.', 'uix-shortcodes' ),
				'value'          => '',
				'placeholder'    => '',
				'type'           => 'icon',
				'default'        => array(
										'social'  => false
									)
			
			),
			
			array(
				'id'             => 'uix_sc_btn_fontsize',
				'title'          => esc_html__( 'Font-Size for Button', 'uix-shortcodes' ),
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
				'id'             => 'uix_sc_btn_letterspacing',
				'title'          => esc_html__( 'Letter Spacing', 'uix-shortcodes' ),
				'desc'           => '',
				'value'          => 0,
				'placeholder'    => '',
				'type'           => 'short-text',
			    'callback'       => 'number',
				'default'        => array(
										'units'  => 'px'
									)
			
			),
		
		//--- Toggle of unidirectional display (end)
			
			
		
		

		
	
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
		'title'                   => esc_html__( 'Button', 'uix-shortcodes' ),
	
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
		
		    [uix_button icon=\'${uix_sc_btn_icon}\' fontsize=\'${uix_sc_btn_fontsize}px\' letterspacing=\'${uix_sc_btn_letterspacing}px\' fillet=\'${uix_sc_btn_fillet}px\' paddingspacing=\'${uix_sc_btn_paddingspacing}\' target=\'${uix_sc_btn_target}\' {{if uix_sc_btn_hovercolor != "" || uix_sc_btn_hovercolor_other != ""}}defaultbgcolor=\'{{if uix_sc_btn_color_other != ""}}${uix_sc_btn_color_other}{{else}}${uix_sc_btn_color}{{/if}}\' hovercolor=\'{{if uix_sc_btn_hovercolor_other != ""}}${uix_sc_btn_hovercolor_other}{{else}}${uix_sc_btn_hovercolor}{{/if}}\'{{/if}} bgcolor=\'{{if uix_sc_btn_color_other != ""}}${uix_sc_btn_color_other}{{else}}${uix_sc_btn_color_name}{{/if}}\' txtcolor=\'{{if uix_sc_btn_txtcolor_other != ""}}${uix_sc_btn_txtcolor_other}{{else}}${uix_sc_btn_txtcolor}{{/if}}\' url=\'${uix_sc_btn_url}\']${uix_sc_btn_label}[/uix_button]

		'
	
    )
);


