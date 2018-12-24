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
$clone_trigger_id        = 'uix_sc_clients_triggerclonelist';  // String of clone trigger ID, must contain at least "_triggerclonelist"
$clone_max               = 50;                               // Maximum of clone form 


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
			'id'             => 'uix_sc_clients_config_grid',
			'title'          => esc_html__( 'Column', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 3,
			'placeholder'    => '',
			'type'           => 'radio',
			'default'        => array(
		                            '6'  => '6',
		                            '5'  => '5',
									'4'  => '4',
									'3'  => '3',
									'2'  => '2',
								)
		
		),	
		
		
		//------ Clone controls list (begin)

		
		array(
			'id'             => $clone_trigger_id,
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
				'id'             => 'uix_sc_clients_listitem_logo',
				'title'          => '',
				'desc'           => '',
				'value'          => '',
				'placeholder'    => esc_html__( 'LOGO URL', 'uix-shortcodes' ),
				'type'           => 'image'
			
			),	
				
			array(
				'id'             => 'uix_sc_clients_listitem_url',
				'title'          => '',
				'desc'           => '',
				'value'          => '',
				'placeholder'    => esc_html__( 'Destination URL, e.g., http://your.clientsite.com', 'uix-shortcodes' ),
				'type'           => 'text',
			    'callback'       => 'url',

			),
		
			array(
				'id'             => 'uix_sc_clients_listitem_intro',
				'title'          => '',
				'desc'           => '',
				'value'          => esc_html__( 'The Introduction of this client.', 'uix-shortcodes' ),
				'placeholder'    => '',
				'type'           => 'textarea',
			    'callback'       => 'html',
				'default'        => array(
										'row'     => 5
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
										'trigger_id'     => $clone_trigger_id,
										'fields'         => array( 
																'uix_sc_clients_listitem_logo', 
																'uix_sc_clients_listitem_url',
																'uix_sc_clients_listitem_intro',
															)
									),
		'form_id'                 => $form_id,
		'fields'                  => array(
										array(
											 'type'    => $form_type,
											 'values'  => $args
										),

									),
		'title'                   => esc_html__( 'Clients', 'uix-shortcodes' ),
	
	
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
		
		    [uix_client]
				<!-- loop start -->

					{{each '.$clone_trigger_id.'}}
						<br>[uix_client_item {{if uix_sc_clients_listitem_url != ""}}url=\'${uix_sc_clients_listitem_url}\'{{/if}} col=\'${uix_sc_clients_config_grid}\' logo=\'${uix_sc_clients_listitem_logo}\']
						<br>[uix_client_item_desc]${uix_sc_clients_listitem_intro}[/uix_client_item_desc]					
						<br>[/uix_client_item]
					{{/each}}	

				<!-- loop end -->
			<br>[/uix_client]
		
		'
	
    )
);
