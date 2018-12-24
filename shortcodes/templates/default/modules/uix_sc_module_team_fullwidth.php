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
$clone_trigger_id        = 'uix_sc_team_fullwidth_triggerclonelist';  // String of clone trigger ID, must contain at least "_triggerclonelist"
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
			'id'             => 'uix_sc_team_fullwidth_config_avatar_fillet',
			'title'          => esc_html__( 'Radius of Fillet Avatar', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 0,
			'placeholder'    => '',
			'type'           => 'short-text',
			'callback'       => 'number',
			'default'        => array(
									'units'  => '%'
								)
		
		),	
	
		
		array(
			'id'             => 'uix_sc_team_fullwidth_config_list_height',
			'title'          => esc_html__( 'Height of Grid', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 0,
			'placeholder'    => '',
			'type'           => 'short-text',
			'callback'       => 'number',
			'default'        => array(
									'units'  => 'px'
								)
		
		
		),	
		
		array(
			'id'             => 'uix_sc_team_fullwidth_config_avatar_gray',
			'title'          => esc_html__( 'Gray Avatar', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 0, //0:false  1:true
			'placeholder'    => '',
			'type'           => 'checkbox'
		
		
		),	

		
	    array(
			'id'             => 'uix_sc_team_fullwidth_config_list_height_tipinfo',
			'desc'           => wp_kses( __( 'Set height of grid so that it will fit its avatar photo. Browsers use a default stylesheet to render if the value is <strong>"0"</strong>.', 'uix-shortcodes' ), wp_kses_allowed_html( 'post' ) ),
			'type'           => 'note',
			'default'        => array(
		                            'fullwidth'  => false,
									'type'       => 'note'  //error, success, warning, note, default
				                ),
		
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
				'id'             => 'uix_sc_team_fullwidth_listitem_avatar',
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
					${uix_sc_team_fullwidth_listitem_name}
					${uix_sc_team_fullwidth_listitem_name_attr}
				 *
				*/
				'id'             => 'uix_sc_team_fullwidth_listitem_name',
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
					${uix_sc_team_fullwidth_listitem_position}
					${uix_sc_team_fullwidth_listitem_position_attr}
				 *
				*/
				'id'             => 'uix_sc_team_fullwidth_listitem_position',
				'title'          => '',
				'desc'           => '',
				'value'          => esc_html__( 'Position', 'uix-shortcodes' ),
				'placeholder'    => '',
				'type'           => 'text',
			    'callback'       => 'attr',
			
			),			
			array(
				'id'             => 'uix_sc_team_fullwidth_listitem_intro',
				'title'          => '',
				'desc'           => '',
				'value'          => esc_html__( 'The Introduction of this member.', 'uix-shortcodes' ),
				'placeholder'    => '',
				'type'           => 'textarea',
			    'callback'       => 'html',
				'default'        => array(
										'row'     => 5
									)
			
			),
		
		
			//--- Toggle of unidirectional display (begin)
			array(
				'id'             => 'uix_sc_team_fullwidth_listitem_toggle',
				'title'          => '',
				'desc'           => '',
				'value'          => 0, // 0:close  1:open
				'placeholder'    => '',
				'type'           => 'toggle',
				'toggle'         => array(
										'btn_text'      => esc_html__( 'set up links with toggle', 'uix-shortcodes' ),
		 								'target_ids'    => array( 
																'uix_sc_team_fullwidth_listitem_toggle_url1', 
																'uix_sc_team_fullwidth_listitem_toggle_icon1', 
																'uix_sc_team_fullwidth_listitem_toggle_url2', 
																'uix_sc_team_fullwidth_listitem_toggle_icon2', 
																'uix_sc_team_fullwidth_listitem_toggle_url3', 
																'uix_sc_team_fullwidth_listitem_toggle_icon3' 
															)
									)
			
			),	
	
				array(
					'id'             => 'uix_sc_team_fullwidth_listitem_toggle_url1',
					'title'          => '',
					'desc'           => '',
					'value'          => '',
					'placeholder'    => esc_html__( 'Your Social Network Page URL 1', 'uix-shortcodes' ),
					'type'           => 'text',
			        'callback'       => 'url',
				
				),
				array(
					'id'             => 'uix_sc_team_fullwidth_listitem_toggle_icon1',
					'title'          => '',
					'desc'           => '',
					'value'          => '',
					'placeholder'    => esc_html__( 'Choose Social Icon 1', 'uix-shortcodes' ),
					'type'           => 'icon',
					'default'        => array(
											'social'  => true
										)
				
				),
		
				array(
					'id'             => 'uix_sc_team_fullwidth_listitem_toggle_url2',
					'title'          => '',
					'desc'           => '',
					'value'          => '',
					'placeholder'    => esc_html__( 'Your Social Network Page URL 2', 'uix-shortcodes' ),
					'type'           => 'text',
			        'callback'       => 'url',
				
				),
				array(
					'id'             => 'uix_sc_team_fullwidth_listitem_toggle_icon2',
					'title'          => '',
					'desc'           => '',
					'value'          => '',
					'placeholder'    => esc_html__( 'Choose Social Icon 2', 'uix-shortcodes' ),
					'type'           => 'icon',
					'default'        => array(
											'social'  => true
										)
				
				),
		
				array(
					'id'             => 'uix_sc_team_fullwidth_listitem_toggle_url3',
					'title'          => '',
					'desc'           => '',
					'value'          => '',
					'placeholder'    => esc_html__( 'Your Social Network Page URL 3', 'uix-shortcodes' ),
					'type'           => 'text',
			        'callback'       => 'url',
				
				),
				array(
					'id'             => 'uix_sc_team_fullwidth_listitem_toggle_icon3',
					'title'          => '',
					'desc'           => '',
					'value'          => '',
					'placeholder'    => esc_html__( 'Choose Social Icon 3', 'uix-shortcodes' ),
					'type'           => 'icon',
					'default'        => array(
											'social'  => true
										)
				
				),
		
		
		    //--- Toggle of unidirectional display (end)
		
			
		
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
																'uix_sc_team_fullwidth_listitem_avatar', 
																'uix_sc_team_fullwidth_listitem_name',
																'uix_sc_team_fullwidth_listitem_position',
																'uix_sc_team_fullwidth_listitem_intro', 
																'uix_sc_team_fullwidth_listitem_toggle',
																'uix_sc_team_fullwidth_listitem_toggle_url1',
																'uix_sc_team_fullwidth_listitem_toggle_icon1', 
																'uix_sc_team_fullwidth_listitem_toggle_url2',
																'uix_sc_team_fullwidth_listitem_toggle_icon2',
																'uix_sc_team_fullwidth_listitem_toggle_url3',
																'uix_sc_team_fullwidth_listitem_toggle_icon3',
															)
									),
		'form_id'                 => $form_id,
		'fields'                  => array(
										array(
											 'type'    => $form_type,
											 'values'  => $args
										),

									),
		'title'                   => esc_html__( 'Team Normal', 'uix-shortcodes' ),
	
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
		
			[uix_team col=\'fullwidth\' {{if uix_sc_team_fullwidth_config_list_height > 0}}avatarheight=\'${uix_sc_team_fullwidth_config_list_height}px\'{{/if}} avatarfillet=\'${uix_sc_team_fullwidth_config_avatar_fillet}%\' gray=\'{{if uix_sc_team_fullwidth_config_avatar_gray == 1}}true{{else}}false{{/if}}\']

				<!-- loop start -->

					{{each '.$clone_trigger_id.'}}
						{{if uix_sc_team_fullwidth_listitem_name != ""}}

							<br>[uix_team_item col=\'fullwidth\' name=\'${uix_sc_team_fullwidth_listitem_name_attr}\' avatar=\'${uix_sc_team_fullwidth_listitem_avatar}\' position=\'${uix_sc_team_fullwidth_listitem_position_attr}\' social_1=\'${uix_sc_team_fullwidth_listitem_toggle_icon1}|${uix_sc_team_fullwidth_listitem_toggle_url1}\' social_2=\'${uix_sc_team_fullwidth_listitem_toggle_icon2}|${uix_sc_team_fullwidth_listitem_toggle_url2}\' social_3=\'${uix_sc_team_fullwidth_listitem_toggle_icon3}|${uix_sc_team_fullwidth_listitem_toggle_url3}\']
							<br>[uix_team_item_desc]${uix_sc_team_fullwidth_listitem_intro}[/uix_team_item_desc]					
							<br>[/uix_team_item]

						{{/if}}
					{{/each}}	

				<!-- loop end -->

			<br>[/uix_team]
		
		'
	
    )
);
