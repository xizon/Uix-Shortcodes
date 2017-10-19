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
			'id'             => 'uix_sc_authorcard_primary_color',
			'title'          => esc_html__( 'Primary Color', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '#a2bf2f',
			'placeholder'    => '',
			'type'           => 'color',
			'default'        => array( '#a2bf2f', '#d59a3e', '#DD514C', '#FA9ADF', '#4BB1CF',  '#0E90D2', '#5F9EA0', '#473f3f',  '#bebebe' )
		
		),

		array(
			'id'             => 'uix_sc_authorcard_avatar',
			'title'          => esc_html__( 'Author Picture', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => esc_html__( 'Avatar URL', 'uix-shortcodes' ),
			'type'           => 'image'
		
		),	
		

		
		array(
		    /*
		     * @template vars: 
			 *
				${uix_sc_authorcard_name}
				${uix_sc_authorcard_name_attr}
			 *
			*/
			'id'             => 'uix_sc_authorcard_name',
			'title'          => esc_html__( 'Author Name', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => esc_html__( 'Your Name', 'uix-shortcodes' ),
			'placeholder'    => '',
			'type'           => 'text',
		    'callback'       => 'attr', 
		
		),
	
		
		array(
			'id'             => 'uix_sc_authorcard_intro',
			'title'          => esc_html__( 'Biographical Info', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => esc_html__( 'Quae cum praeponunt, ut sit aliqua rerum selectio, naturam videntur sequi; Tu vero, inquam, ducas licet, si sequetur; Ab his oratores, ab his imperatores ac rerum publicarum principes extiterunt. Igitur neque stultorum quisquam beatus neque sapientium non beatus.', 'uix-shortcodes' ),
			'placeholder'    => '',
			'type'           => 'textarea',
		    'callback'       => 'html', 
			'default'        => array(
									'row'     => 5
								)
		
		),
	

		array(
		    /*
		     * @template vars: 
			 *
				${uix_sc_authorcard_link_label}
				${uix_sc_authorcard_link_label_attr}
			 *
			*/
			'id'             => 'uix_sc_authorcard_link_label',
			'title'          => esc_html__( 'Link Text', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => esc_html__( '&rarr;', 'uix-shortcodes' ),
			'placeholder'    => '',
			'type'           => 'text',
		    'callback'       => 'attr', 
		
		),		
		array(
			'id'             => 'uix_sc_authorcard_link_link',
			'title'          => esc_html__( 'Link URL', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => esc_url( '#' ),
			'placeholder'    => 'URL',
			'type'           => 'text',
		    'callback'       => 'url', 
		
		),		



		array(
			'id'             => 'uix_sc_authorcard_1_url',
			'title'          => esc_html__( 'Social Network 1', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => esc_html__( 'Your Social Network Page URL 1', 'uix-shortcodes' ),
			'type'           => 'text',
		    'callback'       => 'url', 
		
		),
		
		array(
			'id'             => 'uix_sc_authorcard_1_icon',
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
			'id'             => 'uix_sc_authorcard_2_url',
			'title'          => esc_html__( 'Social Network 2', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => esc_html__( 'Your Social Network Page URL 2', 'uix-shortcodes' ),
			'type'           => 'text',
		    'callback'       => 'url', 
		
		),
		
		array(
			'id'             => 'uix_sc_authorcard_2_icon',
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
			'id'             => 'uix_sc_authorcard_3_url',
			'title'          => esc_html__( 'Social Network 3', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => esc_html__( 'Your Social Network Page URL 3', 'uix-shortcodes' ),
			'type'           => 'text',
		    'callback'       => 'url', 
		
		),
		
		array(
			'id'             => 'uix_sc_authorcard_3_icon',
			'title'          => '',
			'desc'           => '',
			'value'          => '',
			'placeholder'    => esc_html__( 'Choose Social Icon 3', 'uix-shortcodes' ),
			'type'           => 'icon',
			'default'        => array(
									'social'  => true
								)
		
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
		'title'        => esc_html__( 'Author Card', 'uix-shortcodes' ),

	
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
		
		
		   [uix_authorcard primarycolor=\'${uix_sc_authorcard_primary_color}\' btnlabel=\'${uix_sc_authorcard_link_label_attr}\' btnurl=\'${uix_sc_authorcard_link_link}\' name=\'${uix_sc_authorcard_name_attr}\' avatar=\'${uix_sc_authorcard_avatar}\' social_1=\'${uix_sc_authorcard_1_icon}|${uix_sc_authorcard_1_url}\' social_2=\'${uix_sc_authorcard_2_icon}|${uix_sc_authorcard_2_url}\' social_3=\'${uix_sc_authorcard_3_icon}|${uix_sc_authorcard_3_url}\' ]${uix_sc_authorcard_intro}<br>[/uix_authorcard]

			
		'
    )
);


