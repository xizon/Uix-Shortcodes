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
			'id'             => 'uix_sc_bar_shape',
			'title'          => esc_html__( 'Choose Style', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 'circular',
			'placeholder'    => '',
			'type'           => 'radio',
			'default'        => array(
									'circular'  => 'circular',
									'square'  => 'square'
								),
		
			/* Add the "toggle" field to enable the radio switch */
			'toggle'        => array(
			                        array(
										'trigger_id'        => 'circular', /* The value of radio */
										'target_ids'        => array( 'uix_sc_bar_circular_size' ) /* Associated control ID */

									),
			                        array(
										'trigger_id'        => 'square', /* The value of radio */
										'target_ids'        => array( 'uix_sc_bar_square_size' ) /* Associated control ID */

									),
									
				                )	
								
		),
		
			array(
				'id'             => 'uix_sc_bar_circular_size',
				'title'          => esc_html__( 'Bar Size', 'uix-shortcodes' ),
				'desc'           => '',
				'value'          => 120,
				'placeholder'    => '',
				'type'           => 'short-text',
		        'callback'       => 'number',
				'default'        => array(
										'units'  => 'px'
									)
			
			),
			
			array(
		    /*
		     * @template vars: 
			 *
				${uix_sc_bar_square_size}
				${uix_sc_bar_square_size_units}
			 *
			*/
				'id'             => 'uix_sc_bar_square_size',
				'title'          => esc_html__( 'Bar Size', 'uix-shortcodes' ),
				'desc'           => '',
				'value'          => 100,
				'type'           => 'short-units-text',
		        'callback'       => 'number',
				'default'        => array(
										'units'      => array( '%', 'px' ),
										'units_value' => '%'
									)
			
			),	
			
		
	
		array(
			'id'             => 'uix_sc_bar_percent',
			'title'          => esc_html__( 'Percent', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 75,
			'placeholder'    => '',
			'type'           => 'short-text',
		    'callback'       => 'number',
			'default'        => array(
									'units'  => '%'
								)
		
		),
	
		
		array(
			'id'             => 'uix_sc_bar_perc_icons_size',
			'title'          => esc_html__( 'Percentage & Icon Size', 'uix-shortcodes' ),
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
			'id'             => 'uix_sc_bar_linewidth',
			'title'          => esc_html__( 'Line Width', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 3,
			'placeholder'    => '',
			'type'           => 'short-text',
		    'callback'       => 'number',
			'default'        => array(
									'units'  => 'px'
								)
		
		),
		
		
		//------ Toggle of switch with checkbox (begin)
		array(
			'id'             => 'uix_sc_bar_icon_toggle',
			'title'          => esc_html__( 'Icon', 'uix-shortcodes' ),
			'desc'           => esc_html__( 'Using Icon instead of percentage.', 'uix-shortcodes' ),
			'value'          => 0, // 0:close  1:open
			'placeholder'    => '',
			'type'           => 'checkbox',
			'toggle'         => array(
				                    'target_ids'  => array( 'uix_sc_bar_icon' )
				                )
		
		
		),	
		
			array(
				'id'             => 'uix_sc_bar_icon',
				'title'          => '',
				'desc'           => '',
				'value'          => '',
				'placeholder'    => '',
				'type'           => 'icon',
				'default'        => array(
										'social'  => false
									)
			
			),	
		//------ Toggle of switch with checkbox (end)
		
			
		array(
			'id'             => 'uix_sc_bar_color',
			'title'          => esc_html__( 'Bar Color', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '#a2bf2f',
			'placeholder'    => '',
			'type'           => 'color',
			'default'        => array( '#fffff0', '#f5f5dc', '#f5deb3', '#d2b48c', '#c3b091', '#c0c0c0', '#808080', '#464646', '#333333', '#000080', '#084c9e', '#007fff', '#0E90D2', '#4BB1CF', '#5F9EA0', '#00ffff', '#7fffd4', '#008080', '#228b22', '#808000', '#a2bf2f', '#7fff00', '#bfff00', '#ffd700', '#daa520', '#ff7f50', '#fa8072', '#fc0fc0', '#ff77ff', '#e0b0ff', '#b57edc', '#843179', '#E1A0A1', '#D84F51', '#dc143c', '#990002' ,'#800000' )
		
		),
		

	
		array(
			'id'             => 'uix_sc_bar_trackcolor',
			'title'          => esc_html__( 'Track color', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '#f1f1f1',
			'placeholder'    => '',
			'type'           => 'color',
			'default'        => array( '#ffffff', '#473f3f',  '#bebebe', '#dcdcdc', '#f1f1f1' )
		
		),
	
		array(
			'id'             => 'uix_sc_bar_percent_icon_color',
			'title'          => esc_html__( 'Percentage & Icon Color', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '#473f3f',
			'placeholder'    => '',
			'type'           => 'color',
			'default'        => array( '#ffffff', '#473f3f',  '#bebebe', '#dcdcdc', '#f1f1f1' )
		
		),
		
	
	    array(
			/*
			 * @template vars: 
			 *
				${uix_sc_bar_title}
				${uix_sc_bar_title_attr}
			 *
			*/
			'id'             => 'uix_sc_bar_title',
			'title'          => esc_html__( 'Title', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => esc_html__( 'Title', 'uix-shortcodes' ),
			'placeholder'    => '',
			'type'           => 'text',
			'callback'       => 'attr',
		),	
		
		
	    array(
			'id'             => 'uix_sc_bar_desc',
			'title'          => esc_html__( 'Description', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'textarea',
			'callback'       => 'html',
			'default'        => array(
									'row'     => 2
								)
		),	
		

		array(
			/*
			 * @template vars: 
			 *
				${uix_sc_bar_show_units}
				${uix_sc_bar_show_units_attr}
			 *
			*/
			'id'             => 'uix_sc_bar_show_units',
			'title'          => esc_html__( 'Displayed Units', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '%',
			'placeholder'    => '',
			'type'           => 'text',
			'callback'       => 'attr',
		
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
		'title'        => esc_html__( 'Progress Bar', 'uix-shortcodes' ),
	
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
		
			[uix_progress_bar barcolor=\'${uix_sc_bar_color}\' trackcolor=\'${uix_sc_bar_trackcolor}\' preccolor=\'${uix_sc_bar_percent_icon_color}\' {{if uix_sc_bar_shape == "circular"}}size=\'${uix_sc_bar_circular_size}px\'{{else}}size=\'${uix_sc_bar_square_size}${uix_sc_bar_square_size_units}\'{{/if}} shape=\'${uix_sc_bar_shape}\' percent=\'${uix_sc_bar_percent}\' units=\'${uix_sc_bar_show_units_attr}\' linewidth=\'${uix_sc_bar_linewidth}\' precsize=\'${uix_sc_bar_perc_icons_size}px\' title=\'${uix_sc_bar_title_attr}\' {{if uix_sc_bar_icon != ""}}icon=\'${uix_sc_bar_icon}\'{{/if}}]${uix_sc_bar_desc}[/uix_progress_bar]

		'
    )
);

