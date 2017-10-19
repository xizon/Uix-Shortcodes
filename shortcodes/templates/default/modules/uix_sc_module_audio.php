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
			'id'             => 'uix_sc_audio_url',
			'title'          => esc_html__( 'Audio URL', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'text',
			'callback'       => 'url',
		
		),
		
	    array(
			'id'             => 'uix_sc_audio_url_tipinfo',
			'desc'           => wp_kses( __( 'Just enter the MP3, SoundCloud or Audiomack URL. If you are using SoundCloud or Audiomack, the following <strong>"Enable SoundCloud"</strong> checkbox should be checked.', 'uix-shortcodes' ), wp_kses_allowed_html( 'post' ) ),
			'type'           => 'note',
			'default'        => array(
		                            'fullwidth'  => false,
									'type'       => 'note'  //error, success, warning, note, default
				                ),
		
		),	
		
		
		array(
			'id'             => 'uix_sc_audio_soundcloud',
			'title'          => esc_html__( 'Enable SoundCloud', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 0, //0:false  1:true
			'placeholder'    => '',
			'type'           => 'checkbox'
		
		
		),	
		
		
	    array(
		    /*
		     * @template vars: 
			 *
				${uix_sc_audio_width}
				${uix_sc_audio_width_units}
			 *
			*/
			'id'             => 'uix_sc_audio_width',
			'title'          => esc_html__( 'Player Width', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 100,
			'placeholder'    => '',
			'type'           => 'short-units-text',
			'callback'       => 'number',
			'default'        => array(
									'units'       => array( '%', 'px' ),
									'units_value' => '%',
				                )
		
		),
		
	    array(
			'id'             => 'uix_sc_audio_height',
			'title'          => esc_html__( 'Player Height', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 150,
			'placeholder'    => '',
			'type'           => 'short-text',
			'callback'       => 'number',
			'default'        => array(
									'units'  => 'px'
								)
		
		),
		
		
		array(
			'id'             => 'uix_sc_audio_autoplay',
			'title'          => esc_html__( 'Autoplay', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 0, //0:false  1:true
			'placeholder'    => '',
			'type'           => 'checkbox'
		
		
		),	
		
		array(
			'id'             => 'uix_sc_audio_loop',
			'title'          => esc_html__( 'Loop', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 0, //0:false  1:true
			'placeholder'    => '',
			'type'           => 'checkbox'
		
		
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
		'title'                   => esc_html__( 'Audio', 'uix-shortcodes' ),
	
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
		
		    [uix_audio width=\'${uix_sc_audio_width}${uix_sc_audio_width_units}\' height=\'{{if uix_sc_audio_soundcloud == 1}}${uix_sc_audio_height}{{else}}null{{/if}}\' soundcloud=\'{{if uix_sc_audio_soundcloud == 1}}true{{else}}false{{/if}}\' autoplay=\'{{if uix_sc_audio_soundcloud == 1}}null{{else}}{{if uix_sc_audio_autoplay == 1}}true{{else}}false{{/if}}{{/if}}\' loop=\'{{if uix_sc_audio_soundcloud == 1}}null{{else}}{{if uix_sc_audio_loop == 1}}true{{else}}false{{/if}}{{/if}}\' url=\'${uix_sc_audio_url}\']
		
		'
    )
);
