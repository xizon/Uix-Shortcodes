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
$form_id = 'uix_sc_form_button';

/**
 * Form Type
 */
$form_type = [
    'list' => false
];


$args = 
	[
	
	 
	 
		array(
			'id'             => 'uix_sc_btn_color',
			'title'          => __( 'Button Color', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '#a2bf2f',
			'placeholder'    => '',
			'type'           => 'color',
			'default'        => [ '#a2bf2f', '#d59a3e', '#DD514C', '#FA9ADF', '#4BB1CF',  '#0E90D2', '#5F9EA0', '#473f3f',  '#bebebe' ]
		
		),
		
		//------toggle begin
		array(
			'id'             => 'uix_sc_btn_color_toggle',
			'title'          => '',
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'toggle',
			'default'        => array(
			                        'btn_text'      => __( 'other color', 'uix-shortcodes' ),
									'toggle_class'  => [ 'uix_sc_btn_color_other_class' ]
				                )
		
		),	
			
			array(
				'id'             => 'uix_sc_btn_color_other',
				'title'          => '',
				'desc'           => '',
				'value'          => '',
				'class'          => 'toggle-row uix_sc_btn_color_other_class', /*class of toggle item */
				'placeholder'    => '',
				'type'           => 'colormap',
				'default'        => array(
										'swatches' => 1
									)
			
			
			),	
	
		
		array(
			'id'             => 'uix_sc_btn_txtcolor',
			'title'          => __( 'Text Color', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '#ffffff',
			'placeholder'    => '',
			'type'           => 'color',
			'default'        => [ '#ffffff', '#000000', '#888888' ]
		
		
		),
		
		//------toggle begin
		array(
			'id'             => 'uix_sc_btn_txtcolor_toggle',
			'title'          => '',
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'toggle',
			'default'        => array(
			                        'btn_text'      => __( 'other color', 'uix-shortcodes' ),
									'toggle_class'  => [ 'uix_sc_btn_txtcolor_other_class' ]
				                )
		
		),	
			
			array(
				'id'             => 'uix_sc_btn_txtcolor_other',
				'title'          => '',
				'desc'           => '',
				'value'          => '',
				'class'          => 'toggle-row uix_sc_btn_txtcolor_other_class', /*class of toggle item */
				'placeholder'    => '',
				'type'           => 'colormap',
				'default'        => array(
										'swatches' => 1
									)
			
			
			),	
		
		
		
		array(
			'id'             => 'uix_sc_btn_label',
			'title'          => __( 'Link Text', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => __( 'Link to', 'uix-shortcodes' ),
			'placeholder'    => '',
			'type'           => 'text'
		
		),
		
		array(
			'id'             => 'uix_sc_btn_url',
			'title'          => __( 'Destination URL', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => __( 'http://', 'uix-shortcodes' ),
			'type'           => 'text'
		
		),
		
		
		array(
			'id'             => 'uix_sc_btn_fillet',
			'title'          => __( 'Fillet Radius', 'uix-shortcodes' ),
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
			'title'          => __( 'Open link in new tab', 'uix-shortcodes' ),
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
			                        'btn_textclass' => 'table-link-attr',
			                        'btn_text'      => __( 'click on the set more attributes', 'uix-shortcodes' ),
									'toggle_class'  => [ 'uix_sc_btn_attrs-uix_sc_btn_icon', 'uix_sc_btn_attrs-uix_sc_btn_fontsize', 'uix_sc_btn_attrs-uix_sc_btn_letterspacing', 'uix_sc_btn_attrs-uix_sc_btn_paddingspacing' ]
				                )
		
		),	
	
		
			array(
				'id'             => 'uix_sc_btn_icon',
				'title'          => __( 'Icon&apos;s Name', 'uix-shortcodes' ),
				'desc'           => __( 'Tips: that will be pure text button if icon does not choose.', 'uix-shortcodes' ),
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
				'title'          => __( 'Font-Size for Button', 'uix-shortcodes' ),
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
				'title'          => __( 'Letter Spacing', 'uix-shortcodes' ),
				'desc'           => '',
				'value'          => '0',
				'class'          => 'toggle-row uix_sc_btn_attrs-uix_sc_btn_letterspacing', /*class of toggle item */
				'placeholder'    => '',
				'type'           => 'short-text',
				'default'        => array(
										'units'  => 'px'
									)
			
			),
			
			
			
			array(
				'id'             => 'uix_sc_btn_paddingspacing',
				'title'          => __( 'Padding Spacing', 'uix-shortcodes' ),
				'desc'           => '',
				'value'          => 1,
				'class'          => 'toggle-row uix_sc_btn_attrs-uix_sc_btn_paddingspacing', /*class of toggle item */
				'placeholder'    => '',
				'type'           => 'radio',
				'default'        => array(
										'1'  => 'large',
										'2'  => 'medium',
										'3'  => 'small',
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
				<?php echo UixSCFormCore::uixscform_callback( $form_js, $form_id, __( 'Add a Button', 'uix-shortcodes' ) ); ?>					
				<?php echo UixSCFormCore::send_before( $form_js_vars, $form_id ); ?> 
				/*--**************** Custom shortcode begin ****************-- */
					
					var  uix_sc_btn_result_color = ( uix_sc_btn_color_other != '' ) ? uix_sc_btn_color_other : uixscform_colorTran( uix_sc_btn_color ),
						 uix_sc_btn_result_txtcolor = ( uix_sc_btn_txtcolor_other != '' ) ? uix_sc_btn_txtcolor_other : uix_sc_btn_txtcolor,
						 uix_sc_btn_result_target = ( uix_sc_btn_target === true ) ? 1 : 0,
						 uix_sc_btn_result_url = ( uix_sc_btn_url != '' ) ? uix_sc_btn_url : '#';
					
		
		
				
					code = "[uix_button icon='"+uix_sc_btn_icon+"' fontsize='"+uixscform_floatval( uix_sc_btn_fontsize )+"px' letterspacing='"+uixscform_floatval( uix_sc_btn_letterspacing )+"px' fillet='"+uixscform_floatval( uix_sc_btn_fillet )+"px' paddingspacing='"+uix_sc_btn_paddingspacing+"' target='"+uix_sc_btn_result_target+"' bgcolor='"+uix_sc_btn_result_color+"' txtcolor='"+uix_sc_btn_result_txtcolor+"' url='"+uix_sc_btn_result_url+"']"+uix_sc_btn_label+"[/uix_button]";
					

					
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

