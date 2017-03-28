<?php
if ( !class_exists( 'UixShortcodes' ) ) {
    return;
}

/**
 * Initialize sections template parameters
 * ----------------------------------------------------
 */
$form_vars = UixShortcodes::init_template_parameters( 'uix_sc_form_column_1_4__3_4' );
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
			'id'             => 'uix_sc_col_1_4__3_4_padding',
			'title'          => esc_html__( 'Padding', 'uix-shortcodes' ),
			'desc'           => esc_html__( 'Use the input fields below to customize the padding of your column shortcode. Measurement units is pixels (px).', 'uix-shortcodes' ),
			'value'          => array(
									'top'  => 20,
									'right'  => 0,
									'bottom'  => 20,
									'left'  => 0
				                ),
			'placeholder'    => '',
			'type'           => 'margin',
			'default'        => array(
									'units'  => 'px'
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
		'title'                   => esc_html__( 'Column Three Fourth (last)', 'uix-shortcodes' ),
	    'js_template'             => '
		
			/* Output */
			_vhtml = \'\';
			_vhtml += "<br>[uix_column grid=\'4\']<p>'.esc_html__( 'Some content for this column.', 'uix-shortcodes' ).'</p>[/uix_column]";
			_vhtml += "<br>[uix_column grid=\'8\' last=\'1\']<p>'.esc_html__( 'Some content for this column.', 'uix-shortcodes' ).'</p>[/uix_column]<br>";


			code = "[uix_column_wrapper top=\'"+uixscform_floatval( uix_sc_col_1_4__3_4_padding_top )+"\' bottom=\'"+uixscform_floatval( uix_sc_col_1_4__3_4_padding_bottom )+"\' left=\'"+uixscform_floatval(  uix_sc_col_1_4__3_4_padding_left )+"\' right=\'"+uixscform_floatval(  uix_sc_col_1_4__3_4_padding_right )+"\']" + _vhtml + "[/uix_column_wrapper]";

		
		'
    )
);

