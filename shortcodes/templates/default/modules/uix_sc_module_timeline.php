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
$clone_trigger_id        = 'uix_sc_timeline_triggerclonelist';  // String of clone trigger ID, must contain at least "_triggerclonelist"
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
			'id'             => 'uix_sc_timeline_config_color',
			'title'          => esc_html__( 'Highlight Color', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '#a2bf2f',
			'placeholder'    => '',
			'type'           => 'color-picker'
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
				'id'             => 'uix_sc_timeline_listitem_highlight',
				'title'          => '',
				'desc'           => esc_html__( 'Highlight', 'uix-shortcodes' ),
				'value'          => 1, //0:false  1:true
				'placeholder'    => '',
				'type'           => 'checkbox'


			),	
		
		
			array(
				/*
				 * @template vars: 
				 *
					${uix_sc_timeline_listitem_date}
					${uix_sc_timeline_listitem_date_attr}
				 *
				*/
				'id'             => 'uix_sc_timeline_listitem_date',
				'title'          => '',
				'desc'           => '',
				'value'          => date( 'F j, Y' ),
				'placeholder'    => wp_kses( sprintf( __( 'e.g., %1$s', 'uix-shortcodes' ), date( 'F j, Y' ) ), wp_kses_allowed_html( 'post' ) ),
				'type'           => 'text',
			    'callback'       => 'attr',

			),	
		
			
			array(
				/*
				 * @template vars: 
				 *
					${uix_sc_timeline_listitem_status}
					${uix_sc_timeline_listitem_status_attr}
				 *
				*/
				'id'             => 'uix_sc_timeline_listitem_status',
				'title'          => '',
				'desc'           => '',
				'value'          => esc_html__( 'Project Status Here', 'uix-shortcodes' ),
				'placeholder'    => '',
				'type'           => 'textarea',
			    'callback'       => 'attr',

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
																'uix_sc_timeline_listitem_highlight', 
																'uix_sc_timeline_listitem_date',
																'uix_sc_timeline_listitem_status',
															)
									),
		'form_id'                 => $form_id,
		'fields'                  => array(
										array(
											 'type'    => $form_type,
											 'values'  => $args
										),

									),
		'title'                   => esc_html__( 'Timeline', 'uix-shortcodes' ),
	
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
		
			[uix_timeline color=\'${uix_sc_timeline_config_color}\']

			<!-- loop start -->

					{{each '.$clone_trigger_id.'}}
						{{if uix_sc_timeline_listitem_date != ""}}

							<br>[uix_timeline_item date=\'${uix_sc_timeline_listitem_date_attr}\' status=\'${uix_sc_timeline_listitem_status_attr}\' highlight=\'{{if uix_sc_timeline_listitem_highlight == 1}}true{{else}}false{{/if}}\'][/uix_timeline_item]

						{{/if}}
					{{/each}}	

				<!-- loop end -->

			<br>[/uix_timeline]


		'
    )
);