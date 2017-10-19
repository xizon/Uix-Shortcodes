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
 * Clone parameters
 * ----------------------------------------------------
 */
$clone_trigger_id_1        = 'uix_sc_features_col2_one_triggerclonelist';  // String of clone trigger ID, must contain at least "_triggerclonelist"
$clone_trigger_id_2        = 'uix_sc_features_col2_two_triggerclonelist';  // String of clone trigger ID, must contain at least "_triggerclonelist"
$clone_max                 = 15;                                           // Maximum of clone form 


/**
 * Form Type & Controls
 * ----------------------------------------------------
 */
$form_type = array(
	'list' => 2
);

$args_1 = 
	array(
	
		//------ Clone controls list (begin)
		array(
			'id'             => $clone_trigger_id_1,
			'title'          => esc_html__( 'List Item', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'list',
			'default'        => array(
									'max' => $clone_max
				                )
									
		),
		

		
			array(
				'id'             => 'uix_sc_features_col2_one_listitem_title',
				'title'          => '',
				'desc'           => '',
				'value'          => esc_html__( 'Feature Title', 'uix-shortcodes' ),
				'placeholder'    => '',
				'type'           => 'text',
			    'callback'       => 'html',
			
			),
			

			
			array(
				'id'             => 'uix_sc_features_col2_one_listitem_desc',
				'title'          => '',
				'desc'           => '',
				'value'          => esc_html__( 'Some description text here. You can add a lot of it or can choose to leave it blank.', 'uix-shortcodes' ),
				'placeholder'    => '',
				'type'           => 'textarea',
			    'callback'       => 'html',
				'default'        => array(
										'row'     => 5
									)
			
			),
			
		
			array(
				'id'             => 'uix_sc_features_col2_one_listitem_icon',
				'title'          => '',
				'desc'           => '',
				'value'          => '',
				'placeholder'    => '',
				'type'           => 'icon',
				'default'        => array(
										'social'  => false
									)
			
			),
			
		
		//------ Clone controls list (end)
		
		


		
	
	)
;

$args_2 = 
	array(

	 
		//------ Clone controls list (begin)
		array(
			'id'             => $clone_trigger_id_2,
			'title'          => esc_html__( 'List Item', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'list',
			'default'        => array(
									'max' => $clone_max
				                )
									
		),
		

		
			array(
				'id'             => 'uix_sc_features_col2_two_listitem_title',
				'title'          => '',
				'desc'           => '',
				'value'          => esc_html__( 'Feature Title', 'uix-shortcodes' ),
				'placeholder'    => '',
				'type'           => 'text',
			    'callback'       => 'html',	
			
			),
			

			
			array(
				'id'             => 'uix_sc_features_col2_two_listitem_desc',
				'title'          => '',
				'desc'           => '',
				'value'          => esc_html__( 'Some description text here. You can add a lot of it or can choose to leave it blank.', 'uix-shortcodes' ),
				'placeholder'    => '',
				'type'           => 'textarea',
			    'callback'       => 'html',
				'default'        => array(
										'row'     => 5
									)
			
			),
			
		
			array(
				'id'             => 'uix_sc_features_col2_two_listitem_icon',
				'title'          => '',
				'desc'           => '',
				'value'          => '',
				'placeholder'    => '',
				'type'           => 'icon',
				'default'        => array(
										'social'  => false
									)
			
			),
			
		
		//------ Clone controls list (end)
		

	
	)
;


/**
 * Returns form
 * ----------------------------------------------------
 */
UixSCFormCore::form_scripts( array(
		'clone'                    => array(
										'trigger_id'     => array( $clone_trigger_id_1, $clone_trigger_id_2 ),
										'fields'         => array(
																array( 
																	'uix_sc_features_col2_one_listitem_title', 
																	'uix_sc_features_col2_one_listitem_desc',
																	'uix_sc_features_col2_one_listitem_icon',
																),
																array( 
																	'uix_sc_features_col2_two_listitem_title', 
																	'uix_sc_features_col2_two_listitem_desc',
																	'uix_sc_features_col2_two_listitem_icon',
																)
															)
									),
		'form_id'                 => $form_id,
		'fields'                  => array(
										array(
											 'type'    => $form_type,
											 'values'  => $args_1,
											 'title'   => esc_html__( 'Left Block', 'uix-shortcodes' )
										),
										array(
											 'type'    => $form_type,
											 'values'  => $args_2,
											 'title'   => esc_html__( 'Right Block', 'uix-shortcodes' )
										),

									),
		'title'                   => esc_html__( 'Features 2 Column', 'uix-shortcodes' ),
	
	
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
		
			[uix_features col=\'2\']
			
				<br>[uix_features_col_left]

					<!-- loop start -->

						{{each '.$clone_trigger_id_1.'}}
							<br>[uix_features_item col=\'2\' icon=\'{{if uix_sc_features_col2_one_listitem_icon != ""}}${uix_sc_features_col2_one_listitem_icon}{{/if}}\']
							<br>[uix_features_item_title]${uix_sc_features_col2_one_listitem_title}[/uix_features_item_title]			
							<br>[uix_features_item_desc]${uix_sc_features_col2_one_listitem_desc}[/uix_features_item_desc]					
							<br>[/uix_features_item]
						{{/each}}	

					<!-- loop end -->	

				<br>[/uix_features_col_left]

				<br>[uix_features_col_right]

					<!-- loop start -->

						{{each '.$clone_trigger_id_2.'}}
							<br>[uix_features_item col=\'2\' icon=\'{{if uix_sc_features_col2_two_listitem_icon != ""}}${uix_sc_features_col2_two_listitem_icon}{{/if}}\']
							<br>[uix_features_item_title]${uix_sc_features_col2_two_listitem_title}[/uix_features_item_title]			
							<br>[uix_features_item_desc]${uix_sc_features_col2_two_listitem_desc}[/uix_features_item_desc]					
							<br>[/uix_features_item]
						{{/each}}	

					<!-- loop end -->	

				<br>[/uix_features_col_right]

			<br>[/uix_features]

		'
    )
);
			