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
			'id'             => 'uix_sc_heading_title',
			'title'          => esc_html__( 'Title', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => esc_html__( 'Text Here', 'uix-shortcodes' ),
			'placeholder'    => '',
			'type'           => 'text'
		),	
		
	
	 
	    array(
			'id'             => 'uix_sc_heading_style',
			'title'          => esc_html__( 'Choose Title Style', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 'grand-fill-yellow',
			'placeholder'    => '',
			'type'           => 'radio-image',
			'default'        => array(
									'grand-fill-yellow'   => UixShortcodes::plug_directory() .'admin/uixscform/images/heading/heading-style-1.jpg',
									'grand'               => UixShortcodes::plug_directory() .'admin/uixscform/images/heading/heading-style-2.jpg',
				                ),
			/* If the toggle of switch with radio is enabled, the target id require class like "toggle-row" */
			'toggle'        => array(
			                        array(
										'trigger_id'           => 'uix_sc_heading_style-grand-fill-yellow', /* {item id}-{option id} */
										'toggle_class'         => array( 'uix_sc_heading_fillbg_toggle_class' ),
										'toggle_remove_class'  => array()

									),
									
			                        array(
										'trigger_id'           => 'uix_sc_heading_style-grand', /* {item id}-{option id} */
										'toggle_class'         => array(),
										'toggle_remove_class'  => array( 'uix_sc_heading_fillbg_toggle_class' )

									),	
										
									
				                )	
								
		
		),
			
			array(
				'id'             => 'uix_sc_heading_fillbg',
				'title'          => '',
				'desc'           => '',
				'value'          => '',
				'class'          => 'toggle-row uix_sc_heading_fillbg_toggle_class', /*class of toggle item */
				'placeholder'    => esc_html__( 'Image for Text Fill', 'uix-shortcodes' ),
				'type'           => 'image',
				'default'        => array(
										'remove_btn_text'  => esc_html__( 'Remove image', 'uix-shortcodes' ),
										'upload_btn_text'  => esc_html__( 'Upload', 'uix-shortcodes' ),
									)
			
			),	
		
	    array(
			'id'             => 'uix_sc_heading_size',
			'title'          => esc_html__( 'Size', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 52,
			'placeholder'    => '',
			'type'           => 'short-text',
			'default'        => array(
									'units'  => 'px'
				                )
		
		),
		
		
		array(
			'id'             => 'uix_sc_heading_color',
			'title'          => esc_html__( 'Heading Color', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'color',
			'default'        => array( '#a2bf2f', '#d59a3e', '#DD514C', '#FA9ADF', '#4BB1CF',  '#0E90D2', '#5F9EA0', '#473f3f',  '#bebebe' )
		
		),
		
		//------toggle begin
		array(
			'id'             => 'uix_sc_heading_color_toggle',
			'title'          => '',
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'toggle',
			'default'        => array(
			                        'btn_text'      => esc_html__( 'other color', 'uix-shortcodes' ),
									'toggle_class'  => array( 'uix_sc_heading_color_other_class' )
				                )
		
		),	
			
			array(
				'id'             => 'uix_sc_heading_color_other',
				'title'          => '',
				'desc'           => '',
				'value'          => '',
				'class'          => 'toggle-row uix_sc_heading_color_other_class', /*class of toggle item */
				'placeholder'    => '',
				'type'           => 'colormap',
				'default'        => array(
										'swatches' => 1
									)
			
			
			),	
		

		
		
			
		array(
			'id'             => 'uix_sc_heading_align',
			'title'          => esc_html__( 'Alignment', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 'center',
			'placeholder'    => '',
			'type'           => 'radio',
			'default'        => array(
									'left'    => 'left',
									'center'  => 'center',
									'right'  => 'right',
								)
		
		),	
		
		array(
			'id'             => 'uix_sc_heading_spacing',
			'title'          => esc_html__( 'Letter Spacing', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '2',
			'placeholder'    => '',
			'type'           => 'short-text',
			'default'        => array(
									'units'  => 'px'
								)
		
		),
		
		
		
		array(
			'id'             => 'uix_sc_heading_uppercase',
			'title'          => esc_html__( 'Uppercase of Text', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'checkbox',
			'default'        => array(
									'checked'  => true
								)
		
		
		),	
		
		
		array(
			'id'             => 'uix_sc_heading_line',
			'title'          => esc_html__( 'Underline', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'checkbox',
			'default'        => array(
									'checked'  => false
							),
			/* If the toggle of switch with checkbox is enabled, the target id require class like "toggle-row" */
			'toggle'        => array(
									'trigger_id'  => 'uix_sc_heading_line', /* {item id}-{option id} */
									'toggle_class'  => array( 'uix_sc_heading_line_width_toggle_class', 'uix_sc_heading_line_height_toggle_class' )
								)	
		
		
		),	
		
			array(
				'id'             => 'uix_sc_heading_line_width',
				'title'          => esc_html__( 'Line Width', 'uix-shortcodes' ),
				'desc'           => '',
				'value'          => '100',
				'class'          => 'toggle-row uix_sc_heading_line_width_toggle_class', /*class of toggle item */
				'placeholder'    => '',
				'type'           => 'short-units-text',
				'default'        => array(
										'units'  => array( '%', 'px' ),
										'units_id'  => 'uix_sc_heading_line_width_units'
									)
			
			),
			
			array(
				'id'             => 'uix_sc_heading_line_height',
				'title'          => esc_html__( 'Line Height', 'uix-shortcodes' ),
				'desc'           => '',
				'value'          => '1',
				'class'          => 'toggle-row uix_sc_heading_line_height_toggle_class', /*class of toggle item */
				'placeholder'    => '',
				'type'           => 'short-text',
				'default'        => array(
										'units'  => 'px'
									)
			
			),
		
		
		array(
			'id'             => 'uix_sc_heading_desc_toggle',
			'title'          => esc_html__( 'Description', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'checkbox',
			'default'        => array(
									'checked'  => false
				                ),
			/* If the toggle of switch with checkbox is enabled, the target id require class like "toggle-row" */
			'toggle'        => array(
									'trigger_id'  => 'uix_sc_heading_desc_toggle', /* {item id}-{option id} */
									'toggle_class'  => array( 'uix_sc_heading_desc_toggle_class', 'uix_sc_heading_desc_size_toggle_class', 'uix_sc_heading_desc_color_toggle_class', 'uix_sc_heading_desc_color_toggle_toggle_class', 'uix_sc_heading_desc_color_other_class_class', 'uix_sc_heading_desc_opacity_toggle_class' ),
									
									/* if this toggle contains another toggle, please specifies "toggle_not_class" in order that default hiding form is still valid . */
									'toggle_not_class'  => array( 'uix_sc_heading_desc_color_other_class_class' )
				                )	
		
		
		),	
		
	
		
			array(
				'id'             => 'uix_sc_heading_desc',
				'title'          => esc_html__( 'Displayed Text', 'uix-shortcodes' ),
				'desc'           => '',
				'value'          => '',
				'class'          => 'toggle-row uix_sc_heading_desc_toggle_class', /*class of toggle item */
				'placeholder'    => '',
				'type'           => 'textarea',
				'default'        => array(
										'row'     => 3,
										'format'  => true
									)
			
			),
			
				
			array(
				'id'             => 'uix_sc_heading_desc_size',
				'title'          => esc_html__( 'Font Size', 'uix-shortcodes' ),
				'desc'           => '',
				'value'          => 12,
				'class'          => 'toggle-row uix_sc_heading_desc_size_toggle_class', /*class of toggle item */
				'placeholder'    => '',
				'type'           => 'short-text',
				'default'        => array(
										'units'  => 'px'
									)
			
			),
			
			
		
			array(
				'id'             => 'uix_sc_heading_desc_color',
				'title'          => esc_html__( 'Description Color', 'uix-shortcodes' ),
				'desc'           => '',
				'value'          => '',
				'class'          => 'toggle-row uix_sc_heading_desc_color_toggle_class', /*class of toggle item */
				'placeholder'    => '',
				'type'           => 'color',
				'default'        => array( '#a2bf2f', '#d59a3e', '#DD514C', '#FA9ADF', '#4BB1CF',  '#0E90D2', '#5F9EA0', '#473f3f',  '#bebebe' )
			
			),
			
			//------toggle begin
			array(
				'id'             => 'uix_sc_heading_desc_color_toggle',
				'title'          => '',
				'desc'           => '',
				'value'          => '',
				'class'          => 'toggle-row uix_sc_heading_desc_color_toggle_toggle_class', /*class of toggle item */
				'placeholder'    => '',
				'type'           => 'toggle',
				'default'        => array(
										'btn_text'      => esc_html__( 'other color', 'uix-shortcodes' ),
										'toggle_class'  => array( 'uix_sc_heading_desc_color_other_class' )
									)
			
			),	
				
				array(
					'id'             => 'uix_sc_heading_desc_color_other',
					'title'          => '',
					'desc'           => '',
					'value'          => '',
					'class'          => 'toggle-row uix_sc_heading_desc_color_other_class uix_sc_heading_desc_color_other_class_class', /*class of toggle item */
					'placeholder'    => '',
					'type'           => 'colormap',
					'default'        => array(
											'swatches' => 1
										)
				
				
				),		
	
			
			
			array(
				'id'             => 'uix_sc_heading_desc_opacity',
				'title'          => esc_html__( 'Opacity', 'uix-shortcodes' ),
				'desc'           => '',
				'value'          => 65,
				'class'          => 'toggle-row uix_sc_heading_desc_opacity_toggle_class', /*class of toggle item */
				'placeholder'    => '',
				'type'           => 'slider',
				'default'        => array(
										'units_id'  => 'uix_sc_heading_desc_opacity_opacity_units',
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
		'title'                   => esc_html__( 'Special Heading', 'uix-shortcodes' ),
	    'js_template'             => '

		   var uix_sc_heading_result_color = ( uix_sc_heading_color_other != \'\' ) ? uix_sc_heading_color_other : uix_sc_heading_color,
			   uix_sc_heading_desc_result_color = ( uix_sc_heading_desc_color_other != \'\' ) ? uix_sc_heading_desc_color_other : uix_sc_heading_desc_color;


		   var subhtml = ( uix_sc_heading_desc != \'\' ) ? "[uix_heading_sub color=\'"+uix_sc_heading_desc_result_color+"\' align=\'"+uix_sc_heading_align+"\' size=\'"+uixscform_floatval( uix_sc_heading_desc_size )+"px\' uppercase=\'"+uix_sc_heading_uppercase+"\' spacing=\'"+uixscform_floatval( uix_sc_heading_spacing )+"px\' opacity=\'"+uix_sc_heading_desc_opacity+"\']"+uix_sc_heading_desc+"[/uix_heading_sub]" : "";


			code = "[uix_heading color=\'"+uix_sc_heading_result_color+"\' style=\'"+uix_sc_heading_style+"\' align=\'"+uix_sc_heading_align+"\' size=\'"+uixscform_floatval( uix_sc_heading_size )+"px\' uppercase=\'"+uix_sc_heading_uppercase+"\' spacing=\'"+uixscform_floatval( uix_sc_heading_spacing )+"px\' fillbg=\'"+uix_sc_heading_fillbg+"\']"+uix_sc_heading_title+"[/uix_heading]"+subhtml+"[uix_heading_line line=\'"+uix_sc_heading_line+"\' width=\'"+uixscform_floatval( uix_sc_heading_line_width )+uix_sc_heading_line_width_units+"\' height=\'"+uixscform_floatval( uix_sc_heading_line_height )+"px\']";

		'
    )
);
