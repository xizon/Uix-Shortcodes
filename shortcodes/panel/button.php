<?php
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
				'value'          => '2',
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

$form_html = UixShortcodes::add_form( $form_id, $form_type, $args, 'html' );
$form_js = UixShortcodes::add_form( $form_id, $form_type, $args, 'js' );
$form_js_vars = UixShortcodes::add_form( $form_id, $form_type, $args, 'js_vars' );

/**
 * Add simulation buttons
 */
echo UixShortcodes::add_form( $form_id, '', '', 'active_btn' );
?>		


<script type="text/javascript">

( function($) {
    
	$( document ).ready( function() {
		
		 /* Callback before custom javascript of sweetalert */
		<?php echo UixShortcodes::sweetalert_before( $form_js, $form_html, $form_js_vars, $form_id, __( 'Add a Button', 'uix-shortcodes' ) ); ?>
		
		        
				var  uix_sc_btn_result_color = ( uix_sc_btn_color_other != '' ) ? uix_sc_btn_color_other : uix_colorTran( uix_sc_btn_color ),
				     uix_sc_btn_result_txtcolor = ( uix_sc_btn_txtcolor_other != '' ) ? uix_sc_btn_txtcolor_other : uix_sc_btn_txtcolor,
					 uix_sc_btn_result_target = ( uix_sc_btn_target === true ) ? 1 : 0,
					 uix_sc_btn_result_url = ( uix_sc_btn_url != '' ) ? uix_sc_btn_url : '#';
				
	
	
			
				window.send_to_editor( "[uix_button icon='"+uix_sc_btn_icon+"' fontsize='"+uix_sc_btn_fontsize+"px' letterspacing='"+uix_sc_btn_letterspacing+"px' fillet='"+uix_sc_btn_fillet+"px' paddingspacing='"+uix_sc_btn_paddingspacing+"' target='"+uix_sc_btn_result_target+"' bgcolor='"+uix_sc_btn_result_color+"' txtcolor='"+uix_sc_btn_result_txtcolor+"' url='"+uix_sc_btn_result_url+"']"+uix_sc_btn_label+"[/uix_button]" );
				
				
				
		   /* Callback after custom javascript of sweetalert */
		  <?php echo UixShortcodes::sweetalert_after(); ?>
				


	} ); 

	
	
} ) ( jQuery );

</script>
