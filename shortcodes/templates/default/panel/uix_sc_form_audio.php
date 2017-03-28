<?php
if ( !class_exists( 'UixShortcodes' ) ) {
    return;
}

/**
 * Initialize sections template parameters
 * ----------------------------------------------------
 */
$form_vars = UixShortcodes::init_template_parameters( 'uix_sc_form_audio' );
if ( !is_array( $form_vars ) ) return;
foreach ( $form_vars as $key => $v ) :
	$$key = $v;
endforeach;


/**
 * Form Type
 */
$form_type = array(
    'list' => false
);


$args = 
	array(
	
		array(
			'id'             => 'uix_sc_audio_url',
			'title'          => esc_html__( 'Audio URL', 'uix-shortcodes' ),
			'desc'           => wp_kses( __( 'Just enter the MP3, SoundCloud or Audiomack URL. If you are using SoundCloud or Audiomack, the following <strong>"Enable SoundCloud"</strong> checkbox should be checked.', 'uix-shortcodes' ), wp_kses_allowed_html( 'post' ) ),
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'text'
		
		),
		
		array(
			'id'             => 'uix_sc_audio_soundcloud',
			'title'          => esc_html__( 'Enable SoundCloud', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'checkbox',
			'default'        => array(
									'checked'  => false
				                )
		
		
		),	
		
		
	    array(
			'id'             => 'uix_sc_audio_width',
			'title'          => esc_html__( 'Player Width', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '100',
			'placeholder'    => '',
			'type'           => 'short-units-text',
			'default'        => array(
									'units'  => array( '%', 'px' ),
									'units_id'  => 'uix_sc_audio_width_units'
				                )
		
		),
		
	    array(
			'id'             => 'uix_sc_audio_height',
			'title'          => esc_html__( 'Player Height', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '150',
			'placeholder'    => '',
			'type'           => 'short-text',
			'default'        => array(
									'units'  => 'px'
								)
		
		),
		
		
		array(
			'id'             => 'uix_sc_audio_autoplay',
			'title'          => esc_html__( 'Autoplay', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'checkbox',
			'default'        => array(
									'checked'  => false
				                )
		
		
		),	
		
		array(
			'id'             => 'uix_sc_audio_loop',
			'title'          => esc_html__( 'Loop', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'checkbox',
			'default'        => array(
									'checked'  => false
				                )
		
		
		),	
	
	
		
	
	)
;

/**
 * Returns form javascripts
 * ----------------------------------------------------
 */
UixShortcodes::form_scripts( array(
	    'clone'                   => '',
		'form_id'                 => $form_id,
		'section_id'              => $sid,
	    'content_id'              => $cid,
		'fields'                  => array(
										array(
											 'type'    => $form_type,
											 'values'  => $args
										),

									),
		'title'                   => esc_html__( 'Audio', 'uix-shortcodes' ),
	    'js_template'             => '
		
			if ( uix_sc_audio_soundcloud === true ) {
					uix_sc_audio_autoplay = uix_sc_audio_loop = \'null\';
				}
				if ( uix_sc_audio_soundcloud === false ) {
					uix_sc_audio_height = \'null\';
				} else {
					uix_sc_audio_height = uixscform_floatval( uix_sc_audio_height );
				}


			code = "[uix_audio width=\'"+uixscform_floatval( uix_sc_audio_width )+uix_sc_audio_width_units+"\' height=\'"+uix_sc_audio_height+"\' soundcloud=\'"+uix_sc_audio_soundcloud+"\' autoplay=\'"+uix_sc_audio_autoplay+"\' loop=\'"+uix_sc_audio_loop+"\' url=\'"+uix_sc_audio_url+"\']";	
		
		'
    )
);
