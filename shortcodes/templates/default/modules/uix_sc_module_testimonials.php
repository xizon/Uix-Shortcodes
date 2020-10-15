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
$clone_trigger_id        = 'uix_sc_testimonials_triggerclonelist';  // String of clone trigger ID, must contain at least "_triggerclonelist"
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
			'id'             => 'uix_sc_testimonials_list_dir',
			'title'          => esc_html__( 'Direction', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 'horizontal',
			'placeholder'    => '',
			'type'           => 'radio',
			'default'        => array(
		                            'horizontal'  => esc_html__( 'Horizontal', 'uix-shortcodes' ),
				                    'vertical'  => esc_html__( 'Vertical', 'uix-shortcodes' ),
								)
		),
		
		array(
			'id'             => 'uix_sc_testimonials_list_auto',
			'title'          => esc_html__( 'Automatically Transition', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 1, // 0:false  1:true
			'placeholder'    => '',
			'type'           => 'checkbox'
		
		
		),
		
		array(
			'id'             => 'uix_sc_testimonials_list_paging',
			'title'          => esc_html__( 'Show Paging Navigation', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 1, // 0:false  1:true
			'placeholder'    => '',
			'type'           => 'checkbox'
		
		
		),	
		
		
		array(
			'id'             => 'uix_sc_testimonials_list_arrows',
			'title'          => esc_html__( 'Show Arrow Navigation', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 0, // 0:false  1:true
			'placeholder'    => '',
			'type'           => 'checkbox'
		
		
		),	
	
	
		array(
			'id'             => 'uix_sc_testimonials_list_draggable',
			'title'          => esc_html__( 'Draggable', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 0, // 0:false  1:true
			'placeholder'    => '',
			'type'           => 'checkbox'
		
		
		),	
	
	
	
		
		
		array(
			'id'             => 'uix_sc_testimonials_list_speed',
			'title'          => esc_html__( 'Speed of Images Appereance', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 1200,
			'placeholder'    => '',
			'type'           => 'short-text',
			'callback'       => 'number',
			'default'        => array(
									'units'  => 'ms'
								)
		
		),	
	
	
		
		array(
			'id'             => 'uix_sc_testimonials_list_timing',
			'title'          => esc_html__( 'Delay Between Images', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 7000,
			'placeholder'    => '',
			'type'           => 'short-text',
			'callback'       => 'number',
			'default'        => array(
									'units'  => 'ms'
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
				'id'             => 'uix_sc_testimonials_listitem_avatar',
				'title'          => '',
				'desc'           => '',
				'value'          => '',
				'placeholder'    => esc_html__( 'Avatar URL', 'uix-shortcodes' ),
				'type'           => 'image'
			
			),	
			array(
				/*
				 * @template vars: 
				 *
					${uix_sc_testimonials_listitem_name}
					${uix_sc_testimonials_listitem_name_attr}
				 *
				*/
				'id'             => 'uix_sc_testimonials_listitem_name',
				'title'          => '',
				'desc'           => '',
				'value'          => esc_html__( 'Name', 'uix-shortcodes' ),
				'placeholder'    => '',
				'type'           => 'text',
			    'callback'       => 'attr',
			
			),			
			
			array(
				/*
				 * @template vars: 
				 *
					${uix_sc_testimonials_listitem_position}
					${uix_sc_testimonials_listitem_position_attr}
				 *
				*/
				'id'             => 'uix_sc_testimonials_listitem_position',
				'title'          => '',
				'desc'           => '',
				'value'          => esc_html__( 'Position', 'uix-shortcodes' ),
				'placeholder'    => '',
				'type'           => 'text',
			    'callback'       => 'attr',
			
			),			
			array(
				'id'             => 'uix_sc_testimonials_listitem_intro',
				'title'          => '',
				'desc'           => '',
				'value'          => esc_html__( 'Enter some details for the customer giving this testimonial., E.g., Thank you from the bottom of our hearts.', 'uix-shortcodes' ),
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
																'uix_sc_testimonials_listitem_avatar', 
																'uix_sc_testimonials_listitem_name',
																'uix_sc_testimonials_listitem_position',
																'uix_sc_testimonials_listitem_intro',
															)
									),
		'form_id'                 => $form_id,
		'fields'                  => array(
										array(
											 'type'     => $form_type,
											 'values'   => $args
										),

									),
		'title'                   => esc_html__( 'Testimonials Carousel', 'uix-shortcodes' ),
	
	
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
		
		
		    [uix_testimonials dir=\'${uix_sc_testimonials_list_dir}\' draggable=\'{{if uix_sc_testimonials_list_draggable == 1}}true{{else}}false{{/if}}\' auto=\'{{if uix_sc_testimonials_list_auto == 1}}true{{else}}false{{/if}}\' paging=\'{{if uix_sc_testimonials_list_paging == 1}}true{{else}}false{{/if}}\' arrows=\'{{if uix_sc_testimonials_list_arrows == 1}}true{{else}}false{{/if}}\' speed=\'${uix_sc_testimonials_list_speed}\' timing=\'${uix_sc_testimonials_list_timing}\']
				<!-- loop start -->

					{{each '.$clone_trigger_id.'}}
						{{if uix_sc_testimonials_listitem_intro != ""}}
						<br>[uix_testimonials_item name=\'${uix_sc_testimonials_listitem_name_attr}\' avatar=\'${uix_sc_testimonials_listitem_avatar}\' position=\'${uix_sc_testimonials_listitem_position_attr}\']
							<br>[uix_testimonials_item_desc]${uix_sc_testimonials_listitem_intro}[/uix_testimonials_item_desc]	
						<br>[/uix_testimonials_item]
						{{/if}}	
					{{/each}}	

				<!-- loop end -->
			<br>[/uix_testimonials]
			

		'
	
    )
);


