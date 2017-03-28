<?php
if ( !class_exists( 'UixShortcodes' ) ) {
    return;
}

/**
 * Initialize sections template parameters
 * ----------------------------------------------------
 */
$form_vars = UixShortcodes::init_template_parameters( 'uix_sc_contact_form' );
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
			'id'             => 'uix_sc_contactform_tipinfo',
			'desc'           => esc_html__( 'Output a complete commenting form with your theme.', 'uix-shortcodes' ),
			'type'           => 'note',
			'default'        => array(
		                            'fullwidth'  => true,
									'type'       => 'note'  //error, success, warning, note
				                ),
		
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
		'title'                   => esc_html__( 'Contact Form', 'uix-shortcodes' ),
	    'js_template'             => '
		
		    code = "[uix_contact_form]";
	
		'
    )
);

