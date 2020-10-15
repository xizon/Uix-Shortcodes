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
$clone_trigger_id        = 'uix_sc_imageslider_triggerclonelist';  // String of clone trigger ID, must contain at least "_triggerclonelist"
$clone_max               = 15;                                     // Maximum of clone form 


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
			'id'             => 'uix_sc_imageslider_list_effect',
			'title'          => esc_html__( 'Effect', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 'slide',
			'placeholder'    => '',
			'type'           => 'radio',
			'default'        => array(
		                            'slide'  => esc_html__( 'Slide', 'uix-shortcodes' ),
				                    'none'  => esc_html__( 'Fade', 'uix-shortcodes' ),
		                            'scale'  => esc_html__( 'Scale', 'uix-shortcodes' ),
								)
		
		),
		
		array(
			'id'             => 'uix_sc_imageslider_list_auto',
			'title'          => esc_html__( 'Automatically Transition', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 1, // 0:false  1:true
			'placeholder'    => '',
			'type'           => 'checkbox'
		
		
		),
		
		array(
			'id'             => 'uix_sc_imageslider_list_paging',
			'title'          => esc_html__( 'Show Paging Navigation', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 1, // 0:false  1:true
			'placeholder'    => '',
			'type'           => 'checkbox'
		
		
		),	
		
		
		array(
			'id'             => 'uix_sc_imageslider_list_arrows',
			'title'          => esc_html__( 'Show Arrow Navigation', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 0, // 0:false  1:true
			'placeholder'    => '',
			'type'           => 'checkbox'
		
		
		),	
	
	
		array(
			'id'             => 'uix_sc_imageslider_list_draggable',
			'title'          => esc_html__( 'Draggable', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 0, // 0:false  1:true
			'placeholder'    => '',
			'type'           => 'checkbox'
		
		
		),	
	
	
		
		
		array(
			'id'             => 'uix_sc_imageslider_list_speed',
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
			'id'             => 'uix_sc_imageslider_list_speed_tip',
			'desc'           => wp_kses( sprintf( __( 'Using the CSS animation/transition duration from Uix Shortcodes stylesheets. <br>You can find this code <code>.uix-sc-slideshow { ... }</code> <br><a target="_blank" href="%1$s">click here to set speed</a>', 'uix-shortcodes' ), admin_url( 'admin.php?page='.UixShortcodes::CUSPAGE.'&tab=custom-css' ) ), wp_kses_allowed_html( 'post' ) ),
			'type'           => 'note',
			'default'        => array(
		                            'fullwidth'  => false,
									'type'       => 'warning'  //error, success, warning, note, default
				                ),
		
		
		),	
		
		
		array(
			'id'             => 'uix_sc_imageslider_list_timing',
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
				'id'             => 'uix_sc_imageslider_listitem_photo',
				'title'          => '',
				'desc'           => '',
				'value'          => '',
				'placeholder'    => esc_html__( 'Image URL', 'uix-shortcodes' ),
				'type'           => 'image'
			
			),	
			
		
			array(
				'id'             => 'uix_sc_imageslider_listitem_title',
				'title'          => '',
				'desc'           => '',
				'value'          => '',
				'placeholder'    => esc_html__( 'Slider title', 'uix-shortcodes' ),
				'type'           => 'text',
			    'callback'       => 'html-shortcode',

			),
			
		
		

			
			array(
				'id'             => 'uix_sc_imageslider_listitem_intro',
				'title'          => '',
				'desc'           => '',
				'value'          => '',
				'placeholder'    => esc_html__( 'Slider introduction', 'uix-shortcodes' ),
				'type'           => 'textarea',
			    'callback'       => 'html-shortcode',
				'default'        => array(
										'row'     => 5
									)
			
			),
		
		
			array(
				'id'             => 'uix_sc_imageslider_listitem_url',
				'title'          => '',
				'desc'           => '',
				'value'          => '',
				'placeholder'    => esc_html__( 'Destination URL and can be left blank, e.g., http://your.site.com', 'uix-shortcodes' ),
				'type'           => 'text',
			    'callback'       => 'url',

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
													'uix_sc_imageslider_listitem_photo', 
													'uix_sc_imageslider_listitem_title',
													'uix_sc_imageslider_listitem_intro',
													'uix_sc_imageslider_listitem_url',
												)
						),
		'form_id'      => $form_id,
		'fields'       => array(
							array(
								 'type'     => $form_type,
								 'values'   => $args
							),

						),
		'title'        => esc_html__( 'Image Slider', 'uix-shortcodes' ),
	
	
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
		   
			[uix_imageslider effect=\'${uix_sc_imageslider_list_effect}\' draggable=\'{{if uix_sc_imageslider_list_draggable == 1}}true{{else}}false{{/if}}\' auto=\'{{if uix_sc_imageslider_list_auto == 1}}true{{else}}false{{/if}}\' paging=\'{{if uix_sc_imageslider_list_paging == 1}}true{{else}}false{{/if}}\' arrows=\'{{if uix_sc_imageslider_list_arrows == 1}}true{{else}}false{{/if}}\' speed=\'${uix_sc_imageslider_list_speed}\' timing=\'${uix_sc_imageslider_list_timing}\']

				<!-- loop start -->

					{{each '.$clone_trigger_id.'}}
						{{if uix_sc_imageslider_listitem_photo != ""}}

							<br>[uix_imageslider_item {{if uix_sc_imageslider_listitem_url != ""}}url=\'${uix_sc_imageslider_listitem_url}\'{{/if}} {{if uix_sc_imageslider_listitem_title != ""}}title=\'${uix_sc_imageslider_listitem_title}\'{{/if}} {{if uix_sc_imageslider_listitem_intro != ""}}desc=\'${uix_sc_imageslider_listitem_intro}\'{{/if}} image=\'{{if uix_sc_imageslider_listitem_photo != ""}}${uix_sc_imageslider_listitem_photo}{{/if}}\'][/uix_imageslider_item]

						{{/if}}
					{{/each}}	

				<!-- loop end -->


			<br>[/uix_imageslider]

		'
	
    )
);
