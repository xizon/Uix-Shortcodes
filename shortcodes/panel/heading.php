<?php
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
									'grand-fill-yellow'   => UixShortcodes::plug_directory() .'assets/images/heading/heading-style-1.png',
									'grand'               => UixShortcodes::plug_directory() .'assets/images/heading/heading-style-2.png',
				                ),
			/* if show the target item, the target id require class like "toggle-row toggle-row-show" */
			'toggle'        => array(
									'trigger_id'  => 'uix_sc_heading_style-grand-fill-yellow', /* {item id}-{option id} */
									'toggle_class'  => [ 'uix_sc_heading_fillbg_toggle_class' ]
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
			'value'          => 58.5,
			'placeholder'    => '',
			'type'           => 'short-text',
			'default'        => array(
									'units'  => 'px'
				                )
		
		),
		
		
		array(
			'id'             => 'uix_sc_heading_subtitle_toggle',
			'title'          => __( 'Using Subtitle', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'checkbox',
			'default'        => array(
									'checked'  => false
				                ),
			/* if show the target item, the target id require class like "toggle-row toggle-row-show" */
			'toggle'        => array(
									'trigger_id'  => 'uix_sc_heading_subtitle_toggle', /* {item id}-{option id} */
									'toggle_class'  => [ 'uix_sc_heading_subtitle_toggle_text_class', 'uix_sc_heading_subtitle_size_toggle_class', 'uix_sc_heading_subtitle_opacity_toggle_class' ]
				                )	
		
		
		),	
		
	
		
			array(
				'id'             => 'uix_sc_heading_subtitle',
				'title'          => __( 'Enter Subtitle', 'uix-shortcodes' ),
				'desc'           => '',
				'value'          => '',
				'class'          => 'toggle-row uix_sc_heading_subtitle_toggle_text_class', /*class of toggle item */
				'placeholder'    => '',
				'type'           => 'textarea',
				'default'        => array(
										'row'     => 3,
										'format'  => true
									)
			
			),
				
			array(
				'id'             => 'uix_sc_heading_subtitle_size',
				'title'          => __( 'Subtitle Size', 'uix-shortcodes' ),
				'desc'           => '',
				'value'          => 10,
				'class'          => 'toggle-row uix_sc_heading_subtitle_size_toggle_class', /*class of toggle item */
				'placeholder'    => '',
				'type'           => 'short-text',
				'default'        => array(
										'units'  => 'px'
									)
			
			),
			
			
			array(
				'id'             => 'uix_sc_heading_subtitle_opacity',
				'title'          => __( 'Subtitle Opacity', 'uix-shortcodes' ),
				'desc'           => '',
				'value'          => 65,
				'class'          => 'toggle-row uix_sc_heading_subtitle_opacity_toggle_class', /*class of toggle item */
				'placeholder'    => '',
				'type'           => 'slider',
				'default'        => array(
										'units_id'  => 'uix_sc_heading_subtitle_opacity_opacity_units',
										'units'  => '%',
										'min'   => 0,
										'max'   => 100,
										'step'  => 1
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
									'toggle_class'  => [ 'uix_sc_btn_attrs-uix_sc_heading_align', 'uix_sc_btn_attrs-uix_sc_heading_spacing', 'uix_sc_btn_attrs-uix_sc_heading_uppercase', 'uix_sc_btn_attrs-uix_sc_heading_line' ]
				                )
		
		),	
	
	
			
			array(
				'id'             => 'uix_sc_heading_align',
				'title'          => __( 'Alignment', 'uix-shortcodes' ),
				'desc'           => '',
				'value'          => 'center',
				'class'          => 'toggle-row uix_sc_btn_attrs-uix_sc_heading_align', /*class of toggle item */
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
				'class'          => 'toggle-row uix_sc_btn_attrs-uix_sc_heading_spacing', /*class of toggle item */
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
				'class'          => 'toggle-row uix_sc_btn_attrs-uix_sc_heading_uppercase', /*class of toggle item */
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
				'class'          => 'toggle-row uix_sc_btn_attrs-uix_sc_heading_line', /*class of toggle item */
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
					'title'          => __( 'Underline Width', 'uix-shortcodes' ),
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
					'title'          => __( 'Underline Height', 'uix-shortcodes' ),
					'desc'           => '',
					'value'          => '1',
					'class'          => 'toggle-row uix_sc_heading_line_height_toggle_class', /*class of toggle item */
					'placeholder'    => '',
					'type'           => 'short-text',
					'default'        => array(
											'units'  => 'px'
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
		<?php echo UixShortcodes::sweetalert_before( $form_js, $form_html, $form_js_vars, $form_id, __( 'Add a Special Heading', 'uix-shortcodes' ) ); ?>
		       
			   
			   var subhtml = ( uix_sc_heading_subtitle != '' ) ? "[uix_heading_sub align='"+uix_sc_heading_align+"' size='"+uix_sc_heading_subtitle_size+"px' uppercase='"+uix_sc_heading_uppercase+"' spacing='"+uix_sc_heading_spacing+"px' opacity='"+uix_sc_heading_subtitle_opacity+"']"+uix_sc_heading_subtitle+"[/uix_heading_sub]" : "";
			   
			   
			
				window.send_to_editor( "[uix_heading style='"+uix_sc_heading_style+"' align='"+uix_sc_heading_align+"' size='"+uix_sc_heading_size+"px' uppercase='"+uix_sc_heading_uppercase+"' spacing='"+uix_sc_heading_spacing+"px' fillbg='"+uix_sc_heading_fillbg+"']"+uix_sc_heading_title+"[/uix_heading]"+subhtml+"[uix_heading_line line='"+uix_sc_heading_line+"' width='"+uix_sc_heading_line_width+uix_sc_heading_line_width_units+"' height='"+uix_sc_heading_line_height+"px']" );
				
	
				
		   /* Callback after custom javascript of sweetalert */
		  <?php echo UixShortcodes::sweetalert_after(); ?>
				


	} ); 

	
	
} ) ( jQuery );

</script>
