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
$clone_trigger_id        = 'uix_sc_accordion_triggerclonelist';  // String of clone trigger ID, must contain at least "_triggerclonelist"
$clone_max               = 30;                               // Maximum of clone form 


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
			'id'             => 'uix_sc_accordion_effect',
			'title'          => esc_html__( 'Transition Effect', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 1,
			'placeholder'    => '',
			'type'           => 'radio',
			'default'        => array(
									'1'  => 'slide',
									'3'  => 'none',
								)
		
		),
	
	
		array(
			'id'             => 'uix_sc_accordion_open_first',
			'title'          => esc_html__( 'Open The First One Automatically', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 0, // 0:false  1:true
			'placeholder'    => '',
			'type'           => 'checkbox'
		
		
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
				'id'             => 'uix_sc_accordion_listitem_title',  /* String of clone ID attribute must contain at least "_listitem" */
				'title'          => '',
				'desc'           => '',
				'value'          => esc_html__( 'Accordion Title', 'uix-shortcodes' ),
				'placeholder'    => '',
				'type'           => 'text',
	            'callback'       => 'html', 
			
			),
			

		
		
			array(
				'id'             => 'uix_sc_accordion_listitem_con', /* String of clone ID attribute must contain at least "_listitem" */
				'title'          => '',
				'desc'           => '',
				'value'          => esc_html__( 'This is content of the accordion.', 'uix-shortcodes' ),
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
	    'clone'        => array(
							'trigger_id'     => $clone_trigger_id,
							'fields'         => array( 
													'uix_sc_accordion_listitem_title', 
													'uix_sc_accordion_listitem_con',
												)
						),
		'form_id'      => $form_id,
		'fields'       => array(
							array(
								 'type'     => $form_type,
								 'values'   => $args
							),

						),
		'title'                   => esc_html__( 'Accordion', 'uix-shortcodes' ),
	
	
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
		
		
		   [uix_toggle tabs=\'0\' effect=\'${uix_sc_accordion_effect}\']
				<!-- loop start -->

					{{each '.$clone_trigger_id.'}}
						{{if uix_sc_accordion_listitem_title != ""}}
						<br>[uix_toggle_item {{if uix_sc_accordion_open_first == 1}}{{if $index == 0}}open=\'true\'{{/if}}{{/if}}]
							<br>[uix_toggle_item_title]${uix_sc_accordion_listitem_title}[/uix_toggle_item_title]
							<br>[uix_toggle_item_content {{if uix_sc_accordion_open_first == 1}}{{if $index == 0}}open=\'true\'{{/if}}{{/if}}]${uix_sc_accordion_listitem_con}[/uix_toggle_item_content]				
						<br>[/uix_toggle_item]
						{{/if}}	
					{{/each}}	

				<!-- loop end -->	  
		   <br>[/uix_toggle]
		
		'
	
    )
);



