<?php
if ( !class_exists( 'UixShortcodes' ) ) {
    return;
}

/**
 * Initialize sections template parameters
 * ----------------------------------------------------
 */
$form_vars = UixShortcodes::init_template_parameters( 'uix_sc_form_video' );
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
			'id'             => 'uix_sc_video_url',
			'title'          => esc_html__( 'Video URL', 'uix-shortcodes' ),
			'desc'           => wp_kses( __( 'Copy the video\'s URL from your web browser\'s address bar while viewing the video, paste it. <br>e.g., <strong>https://www.youtube.com/watch?v=abc</strong>', 'uix-shortcodes' ), wp_kses_allowed_html( 'post' ) ),
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'text'
		
		),
	
		
		
		array(
			'id'             => 'uix_sc_video_w',
			'title'          => esc_html__( 'Display Width', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '560',
			'placeholder'    => '',
			'type'           => 'short-text',
			'default'        => array(
									'units'  => 'px'
								)
		
		),	
		
		array(
			'id'             => 'uix_sc_video_h',
			'title'          => esc_html__( 'Display Height', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '315',
			'placeholder'    => '',
			'type'           => 'short-text',
			'default'        => array(
									'units'  => 'px'
								)
		
		),	
		
		array(
			'id'             => 'uix_sc_video_responsive',
			'title'          => esc_html__( 'Responsive of Display', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'checkbox',
			'default'        => array(
									'checked'  => true
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
		'title'                   => esc_html__( 'Responsive Video', 'uix-shortcodes' ),
	    'js_template'             => '
		
			code = "[uix_video width=\'"+uixscform_floatval( uix_sc_video_w )+"\' height=\'"+uixscform_floatval( uix_sc_video_h )+"\' responsive=\'"+uix_sc_video_responsive+"\' url=\'"+encodeURI( uix_sc_video_url )+"\']";
		
		'
    )
);