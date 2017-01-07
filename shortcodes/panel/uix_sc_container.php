<?php
if ( !class_exists( 'UixSCFormCore' ) ) {
    return;
}

$sid     = ( isset( $_POST[ 'sectionID' ] ) ) ? $_POST[ 'sectionID' ] : -1;
$pid     = ( isset( $_POST[ 'postID' ] ) ) ? $_POST[ 'postID' ] : 0;
$cid     = ( isset( $_POST[ 'contentID' ] ) ) ? $_POST[ 'contentID' ] : 'content';
/**
 * Form ID
 */
$form_id = 'uix_sc_container';

/**
 * Form Type
 */
$form_type = [
    'list' => false
];


$args = 
	[
	

	    array(
			'id'             => 'uix_sc_container_layout',
			'title'          => __( 'Choose Layout', 'uix-shortcodes' ),
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
										'toggle_class'         => [ 'uix_sc_container_layout_boxedtip_toggle_class' ],
										'toggle_remove_class'  => [ ]

									),
									
			                        array(
										'trigger_id'           => 'uix_sc_container_layout-fullwidth', /* {item id}-{option id} */
										'toggle_class'         => [ ],
										'toggle_remove_class'  => [ 'uix_sc_container_layout_boxedtip_toggle_class' ]

									),	
										
									
				                )	
							
		),
		
		
		array(
			'id'             => 'uix_sc_container_layout_boxedtip',
		    'class'          => 'toggle-row uix_sc_container_layout_boxedtip_toggle_class', /*class of toggle item */
			'desc'           => sprintf( __( 'You can custom the boxed width of the container for Uix Shortcodes stylesheets. <a target="_blank" href="%1$s">click here to custom</a>', 'uix-shortcodes' ), admin_url( 'admin.php?page='.UixShortcodes::CUSPAGE.'&tab=custom-css' ) ),
			'type'           => 'note',
			'default'        => array(
									'type'  => 'note'  //error, success, warning, note
				                ),
		
		
		),	
		

		array(
			'id'             => 'uix_sc_container_height',
			'title'          => __( 'Height', 'uix-shortcodes' ),
			'desc'           => __( 'The browser automatically calculates the container height if the value is <strong>"0"</strong>.', 'uix-shortcodes' ),
			'value'          => 300,
			'placeholder'    => '',
			'type'           => 'short-units-text',
			'default'        => array(
									'units'  => [ 'px', 'vh' ],
									'units_id'  => 'uix_sc_container_height_units'
				                )
		
		
		),	
		
		array(
			'id'             => 'uix_sc_container_vertical_center',
			'title'          => __( 'Vertically Center Content', 'uix-shortcodes' ),
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
			'title'          => __( 'Background Image', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => UixSCFormCore::cover_placeholder(),
			'placeholder'    => '',
			'type'           => 'image',
			'default'        => array(
									'remove_btn_text'  => __( 'Remove image', 'uix-shortcodes' ),
									'upload_btn_text'  => __( 'Upload', 'uix-shortcodes' ),
									
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
			'title'          => __( 'Background Color', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'color',
			'default'        => [ '#a2bf2f', '#d59a3e', '#DD514C', '#FA9ADF', '#4BB1CF',  '#0E90D2', '#5F9EA0', '#473f3f',  '#bebebe' ]
		
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
			                        'btn_text'      => __( 'other color', 'uix-shortcodes' ),
									'toggle_class'  => [ 'uix_sc_container_bgcolor_other_class' ]
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
			'title'          => __( 'Border', 'uix-shortcodes' ),
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
									'toggle_class'  => [ 'uix_sc_container_border_width_toggle_class', 'uix_sc_container_border_color_toggle_class', 'uix_sc_container_border_style_toggle_class', 'uix_sc_container_border_color_toggle_toggle_class', 'uix_sc_container_border_color_other_class_class' ],
									
									/* if this toggle contains another toggle, please specifies "toggle_not_class" in order that default hiding form is still valid . */
									'toggle_not_class'  => [ 'uix_sc_container_border_color_other_class_class' ]
				                )	
		
		
		),	
		
			array(
				'id'             => 'uix_sc_container_border_width',
				'title'          => __( 'Border Width', 'uix-shortcodes' ),
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
				'title'          => __( 'Border Color', 'uix-shortcodes' ),
				'desc'           => '',
				'value'          => '',
				'class'          => 'toggle-row uix_sc_container_border_color_toggle_class', /*class of toggle item */
				'placeholder'    => '',
				'type'           => 'color',
				'default'        => [ '#a2bf2f', '#d59a3e', '#DD514C', '#FA9ADF', '#4BB1CF',  '#0E90D2', '#5F9EA0', '#473f3f',  '#bebebe' ]
			
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
										'btn_text'      => __( 'other color', 'uix-shortcodes' ),
										'toggle_class'  => [ 'uix_sc_container_border_color_other_class' ]
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
				'title'          => __( 'Border Style', 'uix-shortcodes' ),
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
			'title'          => __( 'Parallax', 'uix-shortcodes' ),
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
			'title'          => __( 'Wrapper Margin (px)', 'uix-shortcodes' ),
			'desc'           => __( 'Use the input fields below to customize the margin of container wrapper.', 'uix-shortcodes' ),
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
			'title'          => __( 'Content Padding (px)', 'uix-shortcodes' ),
			'desc'           => __( 'Use the input fields below to customize the padding of content from container.', 'uix-shortcodes' ),
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
			
	
	]
;


$form_html = UixSCFormCore::add_form( $cid, $sid, $form_id, $form_type, $args, 'html' );
$form_js = UixSCFormCore::add_form( $cid, $sid, $form_id, $form_type, $args, 'js' );
$form_js_vars = UixSCFormCore::add_form( $cid, $sid, $form_id, $form_type, $args, 'js_vars' );





/**
 * Returns actions of javascript
 */

if ( $sid == -1 && is_admin() ) {
	$currentScreen = get_current_screen();
	if( $currentScreen->base === "post" || $currentScreen->base === "widgets" || $currentScreen->base === "customize" || UixSCFormCore::inc_str( $currentScreen->base, '_page_' ) ) {
	  
		
		?>
		<script type="text/javascript">
		( function($) {
		'use strict';
			$( function() {  
				<?php echo UixSCFormCore::uixscform_callback( $form_js, $form_id, __( 'Add a Container', 'uix-shortcodes' ) ); ?> 
				<?php echo UixSCFormCore::send_before( $form_js_vars, $form_id ); ?> 
				/*--**************** Custom shortcode begin ****************-- */
					
				   var uix_sc_container_result_vertical_center = ( uix_sc_container_vertical_center === false ) ? "vertical_center='"+uix_sc_container_vertical_center+"'" : '',
					   uix_sc_container_result_bgcolor = ( uix_sc_container_bgcolor_other != '' ) ? "bgcolor='"+uix_sc_container_bgcolor_other+"'" : "bgcolor='"+uix_sc_container_bgcolor+"'",
					   uix_sc_container_result_bgimage = ( uix_sc_container_bgimage != '' ) ? "bgimage='"+encodeURI( uix_sc_container_bgimage )+"' bgimage_repeat='"+uix_sc_container_bgimage_repeat+"' bgimage_position='"+uix_sc_container_bgimage_position+"' bgimage_attachment='"+uix_sc_container_bgimage_attachment+"' bgimage_size='"+uix_sc_container_bgimage_size+"'" : "",
					   uix_sc_container_result_bgcolor,
					   uix_sc_container_result_height = ( uix_sc_container_height != '' && uix_sc_container_height != 0 ) ? uixscform_floatval( uix_sc_container_height ) + uix_sc_container_height_units : 'auto',
					   uix_sc_container_result_bordercolor = ( uix_sc_container_border_color_other != '' ) ? uix_sc_container_border_color_other : uix_sc_container_border_color,
					   uix_sc_container_result_border = ( uixscform_toggleSwitchCheckboxVal( 'uix_sc_container_border_toggle' ) === true ) ? "borderwidth='"+uixscform_floatval( uix_sc_container_border_width )+"px' borderstyle='"+uix_sc_container_border_style+"' bordercolor='"+uix_sc_container_result_bordercolor+"'" : '';
					
			
				
					code = "[uix_container "+uix_sc_container_result_vertical_center+" parallax='"+uix_sc_container_parallax+"' height='"+uix_sc_container_result_height+"' margin_top='"+uixscform_floatval( uix_sc_container_layout_margin_top )+"' margin_bottom='"+uixscform_floatval( uix_sc_container_layout_margin_bottom )+"' margin_left='"+uixscform_floatval( uix_sc_container_layout_margin_left )+"' margin_right='"+uixscform_floatval( uix_sc_container_layout_margin_right )+"' padding_top='"+uixscform_floatval( uix_sc_container_layout_padding_top )+"' padding_bottom='"+uixscform_floatval( uix_sc_container_layout_padding_bottom )+"' padding_left='"+uixscform_floatval( uix_sc_container_layout_padding_left )+"' padding_right='"+uixscform_floatval( uix_sc_container_layout_padding_right )+"' "+uix_sc_container_result_bgimage+" "+uix_sc_container_result_border+" "+uix_sc_container_result_bgcolor+" layout='"+uix_sc_container_layout+"' ]<p><?php _e( 'Content here...', 'uix-shortcodes' ); ?></p>[/uix_container]<br>";

					
				/*--**************** Custom shortcode end ****************-- */
				<?php echo UixSCFormCore::send_after( $form_id ); ?> 
		} ) ( jQuery );
		</script>
 
		<?php
	
	}
	
}


/**
 * Returns forms with ajax
 */
if ( $sid >= 0 && is_admin() ) {
	echo $form_html;	
}
