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
			'id'             => 'uix_sc_container_layout',
			'title'          => esc_html__( 'Choose Layout', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 'fullwidth',
			'placeholder'    => '',
			'type'           => 'radio-image',
			'default'        => array(
									'boxed'        => UixShortcodes::plug_directory() .'admin/uixscform/images/container/style-1.jpg',
									'fullwidth'     => UixShortcodes::plug_directory() .'admin/uixscform/images/container/style-2.jpg',
				                ),
			/* If the toggle of switch with radio is enabled, the target id require class like "toggle-row" */
			'toggle'        => array(
			                        array(
										'trigger_id'           => 'uix_sc_container_layout-boxed', /* {item id}-{option id} */
										'toggle_class'         => array( 'uix_sc_container_layout_boxedtip_toggle_class' ),
										'toggle_remove_class'  => array()

									),
									
			                        array(
										'trigger_id'           => 'uix_sc_container_layout-fullwidth', /* {item id}-{option id} */
										'toggle_class'         => array(),
										'toggle_remove_class'  => array( 'uix_sc_container_layout_boxedtip_toggle_class' )

									),	
										
									
				                )	
							
		),
		
		
		array(
			'id'             => 'uix_sc_container_layout_boxedtip',
		    'class'          => 'toggle-row uix_sc_container_layout_boxedtip_toggle_class', /*class of toggle item */
			'desc'           => wp_kses( sprintf( __( 'You can custom the boxed width of the container for Uix Shortcodes stylesheets. <a target="_blank" href="%1$s">click here to custom</a>', 'uix-shortcodes' ), admin_url( 'admin.php?page='.UixShortcodes::CUSPAGE.'&tab=custom-css' ) ), wp_kses_allowed_html( 'post' ) ),
			'type'           => 'note',
			'default'        => array(
									'type'  => 'note'  //error, success, warning, note
				                ),
		
		
		),	
		

		array(
			'id'             => 'uix_sc_container_height',
			'title'          => esc_html__( 'Height', 'uix-shortcodes' ),
			'desc'           => wp_kses( __( 'The browser automatically calculates the container height if the value is <strong>"0"</strong>.', 'uix-shortcodes' ), wp_kses_allowed_html( 'post' ) ),
			'value'          => 300,
			'placeholder'    => '',
			'type'           => 'short-units-text',
			'default'        => array(
									'units'     => array( 'px', 'vh' ),
									'units_id'  => 'uix_sc_container_height_units'
				                )
		
		
		),	
		
		array(
			'id'             => 'uix_sc_container_vertical_center',
			'title'          => esc_html__( 'Vertically Center Content', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'checkbox',
			'default'        => array(
									'checked'  => true
				                ),
		
		
		),	
			
			
		array(
			'id'             => 'uix_sc_container_bgimage',
			'title'          => esc_html__( 'Background Image', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => UixSCFormCore::cover_placeholder(),
			'placeholder'    => '',
			'type'           => 'image',
			'default'        => array(
									'remove_btn_text'  => esc_html__( 'Remove image', 'uix-shortcodes' ),
									'upload_btn_text'  => esc_html__( 'Upload', 'uix-shortcodes' ),
									
									/* Show image properties 
									 * Javascript Vars:
									 
									   {item id}_repeat
									   {item id}_position
									   {item id}_attachment
									   {item id}_size
									*/
									'prop'  => true,
								)
		
		),	
	
		array(
			'id'             => 'uix_sc_container_bgcolor',
			'title'          => esc_html__( 'Background Color', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'color',
			'default'        => array( '#a2bf2f', '#d59a3e', '#DD514C', '#FA9ADF', '#4BB1CF',  '#0E90D2', '#5F9EA0', '#473f3f',  '#bebebe' )
		
		),
		
		//------toggle begin
		array(
			'id'             => 'uix_sc_container_bgcolor_toggle',
			'title'          => '',
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'toggle',
			'default'        => array(
			                        'btn_text'      => esc_html__( 'other color', 'uix-shortcodes' ),
									'toggle_class'  => array( 'uix_sc_container_bgcolor_other_class' )
				                )
		
		),	
			
			array(
				'id'             => 'uix_sc_container_bgcolor_other',
				'title'          => '',
				'desc'           => '',
				'value'          => '',
				'class'          => 'toggle-row uix_sc_container_bgcolor_other_class', /*class of toggle item */
				'placeholder'    => '',
				'type'           => 'colormap',
				'default'        => array(
										'swatches' => 1
									)
			
			
			),	
		

	
		
		
		array(
			'id'             => 'uix_sc_container_border_toggle',
			'title'          => esc_html__( 'Border', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'checkbox',
			'default'        => array(
									'checked'  => false
				                ),
			/* If the toggle of switch with checkbox is enabled, the target id require class like "toggle-row" */
			'toggle'        => array(
									'trigger_id'  => 'uix_sc_container_border_toggle', /* {item id}-{option id} */
									'toggle_class'  => array( 'uix_sc_container_border_width_toggle_class', 'uix_sc_container_border_color_toggle_class', 'uix_sc_container_border_style_toggle_class', 'uix_sc_container_border_color_toggle_toggle_class', 'uix_sc_container_border_color_other_class_class' ),
									
									/* if this toggle contains another toggle, please specifies "toggle_not_class" in order that default hiding form is still valid . */
									'toggle_not_class'  => array( 'uix_sc_container_border_color_other_class_class' )
				                )	
		
		
		),	
		
			array(
				'id'             => 'uix_sc_container_border_width',
				'title'          => esc_html__( 'Border Width', 'uix-shortcodes' ),
				'desc'           => '',
				'value'          => '1',
				'class'          => 'toggle-row uix_sc_container_border_width_toggle_class', /*class of toggle item */
				'placeholder'    => '',
				'type'           => 'short-text',
				'default'        => array(
										'units'  => 'px'
									)
			
			),
			
			
			array(
				'id'             => 'uix_sc_container_border_color',
				'title'          => esc_html__( 'Border Color', 'uix-shortcodes' ),
				'desc'           => '',
				'value'          => '',
				'class'          => 'toggle-row uix_sc_container_border_color_toggle_class', /*class of toggle item */
				'placeholder'    => '',
				'type'           => 'color',
				'default'        => array( '#a2bf2f', '#d59a3e', '#DD514C', '#FA9ADF', '#4BB1CF',  '#0E90D2', '#5F9EA0', '#473f3f',  '#bebebe' )
			
			),
			
			//------toggle begin
			array(
				'id'             => 'uix_sc_container_border_color_toggle',
				'title'          => '',
				'desc'           => '',
				'value'          => '',
				'class'          => 'toggle-row uix_sc_container_border_color_toggle_toggle_class', /*class of toggle item */
				'placeholder'    => '',
				'type'           => 'toggle',
				'default'        => array(
										'btn_text'      => esc_html__( 'other color', 'uix-shortcodes' ),
										'toggle_class'  => array( 'uix_sc_container_border_color_other_class' )
									)
			
			),	
				
				array(
					'id'             => 'uix_sc_container_border_color_other',
					'title'          => '',
					'desc'           => '',
					'value'          => '',
					'class'          => 'toggle-row uix_sc_container_border_color_other_class uix_sc_container_border_color_other_class_class', /*class of toggle item */
					'placeholder'    => '',
					'type'           => 'colormap',
					'default'        => array(
											'swatches' => 1
										)
				
				
				),	
			
			array(
				'id'             => 'uix_sc_container_border_style',
				'title'          => esc_html__( 'Border Style', 'uix-shortcodes' ),
				'desc'           => '',
				'value'          => 'solid',
				'class'          => 'toggle-row uix_sc_container_border_style_toggle_class', /*class of toggle item */
				'placeholder'    => '',
				'type'           => 'radio',
				'default'        => array(
										'solid'  => 'solid',
										'double'  => 'double',
										'dashed'  => 'dashed',
										'dotted'  => 'dotted',
									)
			
			),
			
		
	
	
	    array(
			'id'             => 'uix_sc_container_parallax',
			'title'          => esc_html__( 'Parallax', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 0,
			'placeholder'    => '',
			'type'           => 'slider',
			'default'        => array(
			                        'units_id'  => 'uix_sc_container_parallax_units',
									'units'  => '',
									'min'   => 0,
									'max'   => 10,
									'step'  => 0.1
				                )
		
		),
		
		
		array(
			'id'             => 'uix_sc_container_layout_margin',
			'title'          => esc_html__( 'Wrapper Margin (px)', 'uix-shortcodes' ),
			'desc'           => esc_html__( 'Use the input fields below to customize the margin of container wrapper.', 'uix-shortcodes' ),
			'value'          => array(
									'top'  => 25,
									'right'  => 0,
									'bottom'  => 25,
									'left'  => 0
								),
			'placeholder'    => '',
			'type'           => 'margin',
			'default'        => array(
									'units'  => 'px'
								)
		
		),
		
		
		array(
			'id'             => 'uix_sc_container_layout_padding',
			'title'          => esc_html__( 'Content Padding (px)', 'uix-shortcodes' ),
			'desc'           => esc_html__( 'Use the input fields below to customize the padding of content from container.', 'uix-shortcodes' ),
			'value'          => array(
									'top'  => 0,
									'right'  => 25,
									'bottom'  => 0,
									'left'  => 25
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
		'title'                   => esc_html__( 'Container', 'uix-shortcodes' ),
	    'js_template'             => '
		
		   var uix_sc_container_result_vertical_center = ( uix_sc_container_vertical_center === false ) ? "vertical_center=\'"+uix_sc_container_vertical_center+"\'" : \'\',
			   uix_sc_container_result_bgcolor = ( uix_sc_container_bgcolor_other != \'\' ) ? "bgcolor=\'"+uix_sc_container_bgcolor_other+"\'" : "bgcolor=\'"+uix_sc_container_bgcolor+"\'",
			   uix_sc_container_result_bgimage = ( uix_sc_container_bgimage != \'\' ) ? "bgimage=\'"+encodeURI( uix_sc_container_bgimage )+"\' bgimage_repeat=\'"+uix_sc_container_bgimage_repeat+"\' bgimage_position=\'"+uix_sc_container_bgimage_position+"\' bgimage_attachment=\'"+uix_sc_container_bgimage_attachment+"\' bgimage_size=\'"+uix_sc_container_bgimage_size+"\'" : "",
			   uix_sc_container_result_bgcolor,
			   uix_sc_container_result_height = ( uix_sc_container_height != \'\' && uix_sc_container_height != 0 ) ? uixscform_floatval( uix_sc_container_height ) + uix_sc_container_height_units : \'auto\',
			   uix_sc_container_result_bordercolor = ( uix_sc_container_border_color_other != \'\' ) ? uix_sc_container_border_color_other : uix_sc_container_border_color,
			   uix_sc_container_result_border = ( uixscform_toggleSwitchCheckboxVal( \'uix_sc_container_border_toggle\' ) === true ) ? "borderwidth=\'"+uixscform_floatval( uix_sc_container_border_width )+"px\' borderstyle=\'"+uix_sc_container_border_style+"\' bordercolor=\'"+uix_sc_container_result_bordercolor+"\'" : \'\';



			code = "[uix_container "+uix_sc_container_result_vertical_center+" parallax=\'"+uix_sc_container_parallax+"\' height=\'"+uix_sc_container_result_height+"\' margin_top=\'"+uixscform_floatval( uix_sc_container_layout_margin_top )+"\' margin_bottom=\'"+uixscform_floatval( uix_sc_container_layout_margin_bottom )+"\' margin_left=\'"+uixscform_floatval( uix_sc_container_layout_margin_left )+"\' margin_right=\'"+uixscform_floatval( uix_sc_container_layout_margin_right )+"\' padding_top=\'"+uixscform_floatval( uix_sc_container_layout_padding_top )+"\' padding_bottom=\'"+uixscform_floatval( uix_sc_container_layout_padding_bottom )+"\' padding_left=\'"+uixscform_floatval( uix_sc_container_layout_padding_left )+"\' padding_right=\'"+uixscform_floatval( uix_sc_container_layout_padding_right )+"\' "+uix_sc_container_result_bgimage+" "+uix_sc_container_result_border+" "+uix_sc_container_result_bgcolor+" layout=\'"+uix_sc_container_layout+"\' ]<p>'.esc_html__( 'Content here...', 'uix-shortcodes' ).'</p>[/uix_container]<br>";
		
		
		'
    )
);

