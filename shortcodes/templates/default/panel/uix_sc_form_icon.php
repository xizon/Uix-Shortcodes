<?php
if ( !class_exists( 'UixShortcodes' ) ) {
    return;
}

/**
 * Initialize sections template parameters
 * ----------------------------------------------------
 */
$form_vars = UixShortcodes::init_template_parameters( basename( __FILE__, '.php' ) );
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
			'id'             => 'uix_sc_icon_color',
			'title'          => esc_html__( 'Color', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '#333333',
			'placeholder'    => '',
			'type'           => 'color',
			'default'        => array( '#fffff0', '#f5f5dc', '#f5deb3', '#d2b48c', '#c3b091', '#c0c0c0', '#808080', '#464646', '#333333', '#000080', '#084c9e', '#007fff', '#0E90D2', '#4BB1CF', '#5F9EA0', '#00ffff', '#7fffd4', '#008080', '#228b22', '#808000', '#a2bf2f', '#7fff00', '#bfff00', '#ffd700', '#daa520', '#ff7f50', '#fa8072', '#fc0fc0', '#ff77ff', '#e0b0ff', '#b57edc', '#843179', '#E1A0A1', '#D84F51', '#dc143c', '#990002' ,'#800000' )
		
		),
		
		//------toggle begin
		array(
			'id'             => 'uix_sc_icon_color_toggle',
			'title'          => '',
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'toggle',
			'default'        => array(
			                        'btn_text'      => esc_html__( 'other color', 'uix-shortcodes' ),
									'toggle_class'  => array( 'uix_sc_icon_color_other_class' )
				                )
		
		),	
			
			array(
				'id'             => 'uix_sc_icon_color_other',
				'title'          => '',
				'desc'           => '',
				'value'          => '',
				'class'          => 'toggle-row uix_sc_icon_color_other_class', /*class of toggle item */
				'placeholder'    => '',
				'type'           => 'colormap',
				'default'        => array(
										'swatches' => 1
									)
			
			
			),	
		
		array(
			'id'             => 'uix_sc_icon_name',
			'title'          => esc_html__( 'Icon', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'icon',
			'default'        => array(
			                        'social'  => false
				                )
		
		),
	    array(
			'id'             => 'uix_sc_icon_size',
			'title'          => esc_html__( 'Size', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '14',
			'placeholder'    => '',
			'type'           => 'short-text',
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
		'title'                   => esc_html__( 'Icon', 'uix-shortcodes' ),
	    'js_template'             => '
		
			var uix_sc_icon_result_color = ( uix_sc_icon_color_other != \'\' ) ? uix_sc_icon_color_other : uix_sc_icon_color;

			code = "[uix_icons size=\'"+uixscform_floatval( uix_sc_icon_size )+"\' units=\'px\' color=\'"+uix_sc_icon_result_color+"\' name=\'"+uix_sc_icon_name+"\']";	
		
		'
    )
);

