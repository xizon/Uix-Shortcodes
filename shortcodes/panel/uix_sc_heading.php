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
$form_id = 'uix_sc_heading';

/**
 * Form Type
 */
$form_type = [
    'list' => false
];


$args = 
	[
	
	

		
	    array(
			'id'             => 'uix_sc_heading_title',
			'title'          => __( 'Title', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => __( 'Text Here', 'uix-shortcodes' ),
			'placeholder'    => '',
			'type'           => 'text'
		),	
		
	
	 
	    array(
			'id'             => 'uix_sc_heading_style',
			'title'          => __( 'Choose Title Style', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 'grand-fill-yellow',
			'placeholder'    => '',
			'type'           => 'radio-image',
			'default'        => array(
									'grand-fill-yellow'   => UixShortcodes::plug_directory() .'assets/images/heading/heading-style-1.jpg',
									'grand'               => UixShortcodes::plug_directory() .'assets/images/heading/heading-style-2.jpg',
				                ),
			/* if show the target item, the target id require class like "toggle-row toggle-row-show" */
			'toggle'        => array(
			                        array(
										'trigger_id'    => 'uix_sc_heading_style-grand-fill-yellow', /* {item id}-{option id} */
										'toggle_class'  => [ 'uix_sc_heading_fillbg_toggle_class' ]

									),
				                )	
								
		
		),
			
			array(
				'id'             => 'uix_sc_heading_fillbg',
				'title'          => '',
				'desc'           => '',
				'value'          => '',
				'class'          => 'toggle-row toggle-row-show uix_sc_heading_fillbg_toggle_class', /*class of toggle item */
				'placeholder'    => __( 'Image for Text Fill', 'uix-shortcodes' ),
				'type'           => 'image',
				'default'        => array(
										'remove_btn_text'  => __( 'Remove image', 'uix-shortcodes' ),
										'upload_btn_text'  => __( 'Upload', 'uix-shortcodes' ),
									)
			
			),	
		
	    array(
			'id'             => 'uix_sc_heading_size',
			'title'          => __( 'Size', 'uix-shortcodes' ),
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
			'title'          => __( 'Heading Color', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'color',
			'default'        => [ '#a2bf2f', '#d59a3e', '#DD514C', '#FA9ADF', '#4BB1CF',  '#0E90D2', '#5F9EA0', '#473f3f',  '#bebebe' ]
		
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
			                        'btn_text'      => __( 'other color', 'uix-shortcodes' ),
									'toggle_class'  => [ 'uix_sc_heading_color_other_class' ]
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
			'title'          => __( 'Alignment', 'uix-shortcodes' ),
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
			'title'          => __( 'Letter Spacing', 'uix-shortcodes' ),
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
			'title'          => __( 'Uppercase of Text', 'uix-shortcodes' ),
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
			'title'          => __( 'Underline', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'checkbox',
			'default'        => array(
									'checked'  => false
							),
			/* if show the target item, the target id require class like "toggle-row toggle-row-show" */
			'toggle'        => array(
									'trigger_id'  => 'uix_sc_heading_line', /* {item id}-{option id} */
									'toggle_class'  => [ 'uix_sc_heading_line_width_toggle_class', 'uix_sc_heading_line_height_toggle_class' ]
								)	
		
		
		),	
		
			array(
				'id'             => 'uix_sc_heading_line_width',
				'title'          => __( 'Line Width', 'uix-shortcodes' ),
				'desc'           => '',
				'value'          => '100',
				'class'          => 'toggle-row uix_sc_heading_line_width_toggle_class', /*class of toggle item */
				'placeholder'    => '',
				'type'           => 'short-units-text',
				'default'        => array(
										'units'  => [ '%', 'px' ],
										'units_id'  => 'uix_sc_heading_line_width_units'
									)
			
			),
			
			array(
				'id'             => 'uix_sc_heading_line_height',
				'title'          => __( 'Line Height', 'uix-shortcodes' ),
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
			'title'          => __( 'Description', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'checkbox',
			'default'        => array(
									'checked'  => false
				                ),
			/* if show the target item, the target id require class like "toggle-row toggle-row-show" */
			'toggle'        => array(
									'trigger_id'  => 'uix_sc_heading_desc_toggle', /* {item id}-{option id} */
									'toggle_class'  => [ 'uix_sc_heading_desc_toggle_class', 'uix_sc_heading_desc_size_toggle_class', 'uix_sc_heading_desc_color_toggle_class', 'uix_sc_heading_desc_color_toggle_toggle_class', 'uix_sc_heading_desc_color_other_class_class', 'uix_sc_heading_desc_opacity_toggle_class' ],
									
									/* if this toggle contains another toggle, please specifies "toggle_not_class" in order that default hiding form is still valid . */
									'toggle_not_class'  => [ 'uix_sc_heading_desc_color_other_class_class' ]
				                )	
		
		
		),	
		
	
		
			array(
				'id'             => 'uix_sc_heading_desc',
				'title'          => __( 'Displayed Text', 'uix-shortcodes' ),
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
				'title'          => __( 'Font Size', 'uix-shortcodes' ),
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
				'title'          => __( 'Description Color', 'uix-shortcodes' ),
				'desc'           => '',
				'value'          => '',
				'class'          => 'toggle-row uix_sc_heading_desc_color_toggle_class', /*class of toggle item */
				'placeholder'    => '',
				'type'           => 'color',
				'default'        => [ '#a2bf2f', '#d59a3e', '#DD514C', '#FA9ADF', '#4BB1CF',  '#0E90D2', '#5F9EA0', '#473f3f',  '#bebebe' ]
			
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
										'btn_text'      => __( 'other color', 'uix-shortcodes' ),
										'toggle_class'  => [ 'uix_sc_heading_desc_color_other_class' ]
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
				'title'          => __( 'Opacity', 'uix-shortcodes' ),
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
				<?php echo UixSCFormCore::uixscform_callback( $form_js, $form_id, __( 'Add a Special Heading', 'uix-shortcodes' ) ); ?>					
				<?php echo UixSCFormCore::send_before( $form_js_vars, $form_id ); ?> 
				/*--**************** Custom shortcode begin ****************-- */
				   var uix_sc_heading_result_color = ( uix_sc_heading_color_other != '' ) ? uix_sc_heading_color_other : uix_sc_heading_color,
					   uix_sc_heading_desc_result_color = ( uix_sc_heading_desc_color_other != '' ) ? uix_sc_heading_desc_color_other : uix_sc_heading_desc_color;
					  
				   
				   var subhtml = ( uix_sc_heading_desc != '' ) ? "[uix_heading_sub color='"+uix_sc_heading_desc_result_color+"' align='"+uix_sc_heading_align+"' size='"+uix_sc_heading_desc_size+"px' uppercase='"+uix_sc_heading_uppercase+"' spacing='"+uix_sc_heading_spacing+"px' opacity='"+uix_sc_heading_desc_opacity+"']"+uix_sc_heading_desc+"[/uix_heading_sub]" : "";
				   
				 
					code = "[uix_heading color='"+uix_sc_heading_result_color+"' style='"+uix_sc_heading_style+"' align='"+uix_sc_heading_align+"' size='"+uix_sc_heading_size+"px' uppercase='"+uix_sc_heading_uppercase+"' spacing='"+uix_sc_heading_spacing+"px' fillbg='"+uix_sc_heading_fillbg+"']"+uix_sc_heading_title+"[/uix_heading]"+subhtml+"[uix_heading_line line='"+uix_sc_heading_line+"' width='"+uix_sc_heading_line_width+uix_sc_heading_line_width_units+"' height='"+uix_sc_heading_line_height+"px']";
					

				/*--**************** Custom shortcode end ****************-- */
				<?php echo UixSCFormCore::send_after(); ?> 
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
