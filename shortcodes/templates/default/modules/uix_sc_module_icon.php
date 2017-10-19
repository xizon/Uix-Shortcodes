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
			'id'             => 'uix_sc_icon_color',
			'title'          => esc_html__( 'Color', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '#333333',
			'placeholder'    => '',
			'type'           => 'color',
			'default'        => array( '#fffff0', '#f5f5dc', '#f5deb3', '#d2b48c', '#c3b091', '#c0c0c0', '#808080', '#464646', '#333333', '#000080', '#084c9e', '#007fff', '#0E90D2', '#4BB1CF', '#5F9EA0', '#00ffff', '#7fffd4', '#008080', '#228b22', '#808000', '#a2bf2f', '#7fff00', '#bfff00', '#ffd700', '#daa520', '#ff7f50', '#fa8072', '#fc0fc0', '#ff77ff', '#e0b0ff', '#b57edc', '#843179', '#E1A0A1', '#D84F51', '#dc143c', '#990002' ,'#800000' )
		
		),
		
		//--- Toggle of unidirectional display (begin)
		array(
			'id'             => 'uix_sc_icon_color_toggle',
			'title'          => '',
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'toggle',
			'toggle'        => array(
			                        'btn_text'      => esc_html__( 'other color', 'uix-shortcodes' ),
									'target_ids'    => array( 'uix_sc_icon_color_other' )
				                )
		
		),	
			
			array(
				'id'             => 'uix_sc_icon_color_other',
				'title'          => '',
				'desc'           => '',
				'value'          => '',
				'placeholder'    => '',
				'type'           => 'color-picker'
			
			
			),	
		
		//--- Toggle of unidirectional display (end)
		
		
		
		array(
			'id'             => 'uix_sc_icon_name',
			'title'          => esc_html__( 'Icon', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'icon',
			'default'        => array(
			                        'social'  => false
				                )
		
		),
	    array(
			'id'             => 'uix_sc_icon_size',
			'title'          => esc_html__( 'Size', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 14,
			'placeholder'    => '',
			'type'           => 'short-text',
			'callback'       => 'number',
			'default'        => array(
									'units'  => 'px'
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
		'title'                   => esc_html__( 'Icon', 'uix-shortcodes' ),
	
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
		
		    [uix_icons size=\'${uix_sc_icon_size}\' units=\'px\' color=\'{{if uix_sc_icon_color_other != ""}}${uix_sc_icon_color_other}{{else}}${uix_sc_icon_color}{{/if}}\' name=\'${uix_sc_icon_name}\']
		
	
		'
    )
);

