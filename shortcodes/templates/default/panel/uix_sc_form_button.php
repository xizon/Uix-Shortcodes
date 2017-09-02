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
			'id'             => 'uix_sc_btn_paddingspacing',
			'title'          => esc_html__( 'Size', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 1,
			'placeholder'    => '',
			'type'           => 'radio',
			'default'        => array(
									'1'  => 'large',
									'2'  => 'medium',
									'3'  => 'small',
								)

		),

	 
		array(
			'id'             => 'uix_sc_btn_color',
			'title'          => esc_html__( 'Button Color', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '#a2bf2f',
			'placeholder'    => '',
			'type'           => 'color',
			'default'        => array( '#a2bf2f', '#d59a3e', '#DD514C', '#FA9ADF', '#4BB1CF',  '#0E90D2', '#5F9EA0', '#473f3f',  '#bebebe' )
		
		),
	
		
		array(
			'id'             => 'uix_sc_btn_hovercolor',
			'title'          => esc_html__( 'Hover Color', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'color',
			'default'        => array( '#b2de70', '#eae081', '#eead8f', '#fdc8e2', '#8ec0e7',  '#3d9ae8', '#9ebfcc', '#8a8482',  '#dddddd' )
		
		),
		
	
		
		
		array(
			'id'             => 'uix_sc_btn_txtcolor',
			'title'          => esc_html__( 'Text Color', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '#ffffff',
			'placeholder'    => '',
			'type'           => 'color',
			'default'        => array( '#ffffff', '#000000', '#888888' )
		
		
		),
	
		
		
		array(
			'id'             => 'uix_sc_btn_label',
			'title'          => esc_html__( 'Link Text', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => esc_html__( 'Link to', 'uix-shortcodes' ),
			'placeholder'    => '',
			'type'           => 'text'
		
		),
		
		array(
			'id'             => 'uix_sc_btn_url',
			'title'          => esc_html__( 'Destination URL', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => esc_html__( 'http://', 'uix-shortcodes' ),
			'type'           => 'text'
		
		),
		
		
		array(
			'id'             => 'uix_sc_btn_fillet',
			'title'          => esc_html__( 'Fillet Radius', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '50',
			'placeholder'    => '',
			'type'           => 'short-text',
			'default'        => array(
									'units'  => 'px'
								)
		
		),	

		
		array(
			'id'             => 'uix_sc_btn_target',
			'title'          => esc_html__( 'Open link in new tab', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'checkbox',
			'default'        => array(
									'checked'  => false
				                )
		
		
		),	
		
		
		
		
		
		//------toggle begin
		array(
			'id'             => 'uix_sc_btn_more_attributes_toggle',
			'title'          => '',
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'toggle',
			'default'        => array(
			                        'btn_textclass' => 'table-link-icon',
			                        'btn_text'      => esc_html__( 'click on the set more attributes', 'uix-shortcodes' ),
									'toggle_class'  => array( 'uix_sc_btn_attrs-uix_sc_btn_icon', 'uix_sc_btn_attrs-uix_sc_btn_fontsize', 'uix_sc_btn_attrs-uix_sc_btn_letterspacing', 'uix_sc_btn_attrs-uix_sc_btn_color_other', 'uix_sc_btn_attrs-uix_sc_btn_hovercolor_other', 'uix_sc_btn_attrs-uix_sc_btn_txtcolor_other' )
				                )
		
		),	
	
		
			
			array(
				'id'             => 'uix_sc_btn_color_other',
				'title'          => esc_html__( 'Other Color Button', 'uix-shortcodes' ),
				'desc'           => '',
				'value'          => '',
				'class'          => 'toggle-row uix_sc_btn_attrs-uix_sc_btn_color_other', /*class of toggle item */
				'placeholder'    => '',
				'type'           => 'colormap',
				'default'        => array(
										'swatches' => 1
									)
			
			
			),	
			
			array(
				'id'             => 'uix_sc_btn_hovercolor_other',
				'title'          => esc_html__( 'Other Color Hover', 'uix-shortcodes' ),
				'desc'           => '',
				'value'          => '',
				'class'          => 'toggle-row uix_sc_btn_attrs-uix_sc_btn_hovercolor_other', /*class of toggle item */
				'placeholder'    => '',
				'type'           => 'colormap',
				'default'        => array(
										'swatches' => 1
									)
			
			
			),	
		
			array(
				'id'             => 'uix_sc_btn_txtcolor_other',
				'title'          => esc_html__( 'Other Color Text', 'uix-shortcodes' ),
				'desc'           => '',
				'value'          => '',
				'class'          => 'toggle-row uix_sc_btn_attrs-uix_sc_btn_txtcolor_other', /*class of toggle item */
				'placeholder'    => '',
				'type'           => 'colormap',
				'default'        => array(
										'swatches' => 1
									)
			
			
			),	
		
			array(
				'id'             => 'uix_sc_btn_icon',
				'title'          => esc_html__( 'Icon&apos;s Name', 'uix-shortcodes' ),
				'desc'           => esc_html__( 'Tips: that will be pure text button if icon does not choose.', 'uix-shortcodes' ),
				'value'          => '',
				'class'          => 'toggle-row uix_sc_btn_attrs-uix_sc_btn_icon', /*class of toggle item */
				'placeholder'    => '',
				'type'           => 'icon',
				'default'        => array(
										'social'  => false
									)
			
			),
			
			array(
				'id'             => 'uix_sc_btn_fontsize',
				'title'          => esc_html__( 'Font-Size for Button', 'uix-shortcodes' ),
				'desc'           => '',
				'value'          => '12',
				'class'          => 'toggle-row uix_sc_btn_attrs-uix_sc_btn_fontsize', /*class of toggle item */
				'placeholder'    => '',
				'type'           => 'short-text',
				'default'        => array(
										'units'  => 'px'
									)
			
			),
			
			array(
				'id'             => 'uix_sc_btn_letterspacing',
				'title'          => esc_html__( 'Letter Spacing', 'uix-shortcodes' ),
				'desc'           => '',
				'value'          => '0',
				'class'          => 'toggle-row uix_sc_btn_attrs-uix_sc_btn_letterspacing', /*class of toggle item */
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
		'title'                   => esc_html__( 'Button', 'uix-shortcodes' ),
	    'js_template'             => '
		
			var  uix_sc_btn_result_color          = ( uix_sc_btn_color_other != \'\' ) ? uix_sc_btn_color_other : uixscform_colorTran( uix_sc_btn_color ),
				 uix_sc_btn_result_defaultbgcolor = ( uix_sc_btn_color_other != \'\' ) ? uix_sc_btn_color_other : uix_sc_btn_color,
				 uix_sc_btn_result_hovercolor     = ( uix_sc_btn_hovercolor_other != \'\' ) ? uix_sc_btn_hovercolor_other : uix_sc_btn_hovercolor,
				 uix_sc_btn_result_txtcolor       = ( uix_sc_btn_txtcolor_other != \'\' ) ? uix_sc_btn_txtcolor_other : uix_sc_btn_txtcolor,
				 uix_sc_btn_result_target         = ( uix_sc_btn_target === true ) ? 1 : 0,
				 uix_sc_btn_result_url            = ( uix_sc_btn_url != \'\' ) ? uix_sc_btn_url : \'#\',
				 uix_sc_btn_result_hoverattr      = ( uix_sc_btn_result_hovercolor != \'\' ) ? "defaultbgcolor=\'"+uix_sc_btn_result_defaultbgcolor+"\' hovercolor=\'"+uix_sc_btn_result_hovercolor+"\'" : \'\';




			code = "[uix_button icon=\'"+uix_sc_btn_icon+"\' fontsize=\'"+uixscform_floatval( uix_sc_btn_fontsize )+"px\' letterspacing=\'"+uixscform_floatval( uix_sc_btn_letterspacing )+"px\' fillet=\'"+uixscform_floatval( uix_sc_btn_fillet )+"px\' paddingspacing=\'"+uix_sc_btn_paddingspacing+"\' target=\'"+uix_sc_btn_result_target+"\' "+uix_sc_btn_result_hoverattr+" bgcolor=\'"+uix_sc_btn_result_color+"\' txtcolor=\'"+uix_sc_btn_result_txtcolor+"\' url=\'"+uix_sc_btn_result_url+"\']"+uix_sc_btn_label+"[/uix_button]";
		
		'
    )
);


