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
		    /*
		     * @template vars: 
			 *
				${uix_sc_col_3_4__1_4_padding_top}
				${uix_sc_col_3_4__1_4_padding_right}
				${uix_sc_col_3_4__1_4_padding_bottom}
				${uix_sc_col_3_4__1_4_padding_left}
			 *
			*/
			'id'             => 'uix_sc_col_3_4__1_4_padding',
			'title'          => esc_html__( 'Padding (px)', 'uix-shortcodes' ),
			'desc'           => esc_html__( 'Use the input fields below to customize the padding of your column shortcode. Measurement units is pixels (px).', 'uix-shortcodes' ),
			'value'          => array(
									'top'     => 20,
									'right'   => 0,
									'bottom'  => 20,
									'left'    => 0
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
	    'clone'                   => false,
		'form_id'                 => $form_id,
		'fields'                  => array(
										array(
											 'type'    => $form_type,
											 'values'  => $args
										),

									),
		'title'                   => esc_html__( 'Column Three Fourth', 'uix-shortcodes' ),
	

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
		
		

			[uix_column_wrapper top=\'${uix_sc_col_3_4__1_4_padding_top}\' bottom=\'${uix_sc_col_3_4__1_4_padding_bottom}\' left=\'${uix_sc_col_3_4__1_4_padding_left}\' right=\'${uix_sc_col_3_4__1_4_padding_right}\']
				<br>[uix_column grid=\'8\']<p>'.esc_html__( 'Some content for this column.', 'uix-shortcodes' ).'</p>[/uix_column]
				<br>[uix_column grid=\'4\' last=\'1\']<p>'.esc_html__( 'Some content for this column.', 'uix-shortcodes' ).'</p>[/uix_column]<br>
			[/uix_column_wrapper]
			
		'
    )
);

