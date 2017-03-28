<?php
if ( !class_exists( 'UixShortcodes' ) ) {
    return;
}

/**
 * Initialize sections template parameters
 * ----------------------------------------------------
 */
$form_vars = UixShortcodes::init_template_parameters( 'uix_sc_dividing_line' );
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
			'id'             => 'uix_sc_dividing_line_style',
			'title'          => esc_html__( 'Choose Line Style', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 'solid',
			'placeholder'    => '',
			'type'           => 'radio-image',
			'default'        => array(
									'solid'     => UixShortcodes::plug_directory() .'admin/uixscform/images/line/line-style-1.png',
									'double'    => UixShortcodes::plug_directory() .'admin/uixscform/images/line/line-style-2.png',
									'dashed'    => UixShortcodes::plug_directory() .'admin/uixscform/images/line/line-style-3.png',
									'dotted'    => UixShortcodes::plug_directory() .'admin/uixscform/images/line/line-style-4.png',
									'shadow'    => UixShortcodes::plug_directory() .'admin/uixscform/images/line/line-style-5.png',
									'gradient'  => UixShortcodes::plug_directory() .'admin/uixscform/images/line/line-style-6.png',
									
				                )
		
		),
		
		array(
			'id'             => 'uix_sc_dividing_line_color',
			'title'          => esc_html__( 'Color', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '#333',
			'placeholder'    => '',
			'type'           => 'color',
			'default'        => array( '#333', '#fff' )
		
		),
		
	    array(
			'id'             => 'uix_sc_dividing_line_width',
			'title'          => esc_html__( 'Width', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '100',
			'placeholder'    => '',
			'type'           => 'short-units-text',
			'default'        => array(
									'units'  => array( '%', 'px' ),
									'units_id'  => 'uix_sc_dividing_line_width_units'
				                )
		
		),
		
	    array(
			'id'             => 'uix_sc_dividing_line_opacity',
			'title'          => esc_html__( 'Opacity', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 17,
			'placeholder'    => '',
			'type'           => 'slider',
			'default'        => array(
			                        'units_id'  => 'uix_sc_dividing_line_opacity_units',
									'units'  => '%',
									'min'   => 0,
									'max'   => 100,
									'step'  => 1
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
		'title'                   => esc_html__( 'Dividing Line', 'uix-shortcodes' ),
	    'js_template'             => '
		
			var uix_sc_dividing_line_result_color = \'\';

			if ( uix_sc_dividing_line_color == \'#fff\' ) uix_sc_dividing_line_result_color = \'light\';
			if ( uix_sc_dividing_line_color == \'#333\' ) uix_sc_dividing_line_result_color = \'dark\';


			code = "[uix_dividing_line style=\'"+uix_sc_dividing_line_style+"\' color=\'"+uix_sc_dividing_line_result_color+"\' width=\'"+uixscform_floatval( uix_sc_dividing_line_width )+uix_sc_dividing_line_width_units+"\' opacity=\'"+uix_sc_dividing_line_opacity+"\']";
		
		'
    )
);