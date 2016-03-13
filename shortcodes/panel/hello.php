<?php
/**
 * Form ID
 */
$form_id = 'uix_sc_form_hello';

/**
 * Form Type
 */
$form_type = [
    'list' => false
];

$args = 
	[
		array(
			'desc'           => __( 'Note: 3 items per row.Per section insert "for a maximum of 3".', 'uix-shortcodes' ),
			'type'           => 'text'
		
		),
		array(
			'id'             => 'uix_sc_text',
			'title'          => __( 'Text', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'text'
		
		),
	    array(
			'id'             => 'uix_sc_radio',
			'title'          => __( 'Radio', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'radio',
			'default'        => array(
									'1'  => 'boy',
									'2'  => 'girl',
									'3'  => 'private',
				                )
		
		),

	    array(
			'id'             => 'uix_sc_slider',
			'title'          => __( 'Slider', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 1,
			'placeholder'    => '',
			'type'           => 'slider',
			'default'        => array(
			                        'units_id'  => 'uix_sc_slider_units',
									'units'  => 'px',
									'min'   => 1,
									'max'   => 20,
									'step'  => 1
				                )
		
		),
		
		
		array(
			'id'             => 'uix_sc_paddingdis',
			'title'          => __( 'Padding (px)', 'uix-shortcodes' ),
			'desc'           => __( 'Use the input fields below to customize the padding of your column shortcode. Measurement units is pixels (px).', 'uix-shortcodes' ),
			'value'          => array(
									'top'  => 20,
									'right'  => 0,
									'bottom'  => 20,
									'left'  => 0
				                ),
			'placeholder'    => '',
			'type'           => 'margin',
			'default'        => array(
									'units'  => 'px'
				                )
		
		),


		
		array(
			'id'             => 'uix_sc_textarea',
			'title'          => __( 'Textarea', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'textarea',
			'default'        => array(
									'row'     => 5,
									'format'  => true
				                )
		
		),
		
		array(
			'id'             => 'uix_sc_textarea_2',
			'title'          => __( 'Textarea(by default value)', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => __( 'Feature Description<br>Another Feature Description<br><s>Invalid Feature Description</s>', 'uix-shortcodes' ),
			'placeholder'    => '',
			'type'           => 'textarea',
			'default'        => array(
									'row'                       => 5,
									'format'                    => false,
									'default_value_htmlformat'  => true,
									'default_value_trigger'     => $form_id
				                )
		
		),
		
		array(
			'id'             => 'uix_sc_image',
			'title'          => __( 'Upload Image', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => __( 'Image URL', 'uix-shortcodes' ),
			'type'           => 'image',
			'default'        => array(
									'remove_btn_text'  => __( 'Remove image', 'uix-shortcodes' ),
									'upload_btn_text'  => __( 'Upload', 'uix-shortcodes' ),
				                )
		
		),	
		
		
	    array(
			'id'             => 'uix_sc_shorttext',
			'title'          => __( 'Short Text', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'short-text',
			'default'        => array(
									'units'  => 'px'
				                )
		
		),
	    array(
			'id'             => 'uix_sc_shortunitstext',
			'title'          => __( 'Short Units Text', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'short-units-text',
			'default'        => array(
									'units'  => [ 'px', 'em', '%' ],
									'units_id'  => 'uix_sc_shortunitstext_units'
				                )
		
		),
		
		//------toggle begin
		array(
			'id'             => 'uix_sc_toggle',
			'title'          => '',
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'toggle',
			'default'        => array(
			                        //'btn_textclass' => 'table-link-attr',
			                        'btn_text'      => __( 'set up links with toggle', 'uix-shortcodes' ),
									'toggle_class'  => [ 'uix_sc_toggle_url_class', 'uix_sc_toggle_url2_class' ]
				                )
		
		),	

			array(
				'id'             => 'uix_sc_toggle_url',
				'title'          => '',
				'desc'           => '',
				'value'          => '',
				'class'          => 'toggle-row uix_sc_toggle_url_class', /*class of toggle item */
				'placeholder'    => __( 'Toggle URL', 'uix-shortcodes' ),
				'type'           => 'text',
				'default'        => ''
			
			),
			
			array(
				'id'             => 'uix_sc_toggle_url2',
				'title'          => '',
				'desc'           => '',
				'value'          => '',
				'class'          => 'toggle-row uix_sc_toggle_url2_class',/*class of toggle item */
				'placeholder'    => __( 'Toggle URL2', 'uix-shortcodes' ),
				'type'           => 'textarea',
				'default'        => array(
										'row'     => 3,
										'format'  => true
									)
			
			),
		
		//------toggle end
		
		
		
		array(
			'id'             => 'uix_sc_single_color',
			'title'          => __( 'Color', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '#333333',
			'placeholder'    => '',
			'type'           => 'color',
			'default'        => [ '#fffff0', '#f5f5dc', '#f5deb3', '#d2b48c', '#c3b091', '#c0c0c0', '#808080', '#464646', '#333333', '#000080', '#084c9e', '#0000cd', '#007fff', '#00ffff', '#7fffd4', '#008080', '#228b22', '#808000', '#7fff00', '#bfff00', '#ffd700', '#daa520', '#ff7f50', '#fa8072', '#fc0fc0', '#ff77ff', '#cc8899', '#e0b0ff', '#b57edc', '#843179', '#4b0082', '#800000', '#E1A0A1', '#D84F51', '#dc143c', '#990002' ]
		
		),
		array(
			'id'             => 'uix_sc_select',
			'title'          => __( 'Select', 'uix-shortcodes' ),
			'desc'           => __( 'This is infomation.', 'uix-shortcodes' ),
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'select',
			'default'        => array(
									'1'  => 'student',
									'2'  => 'teacher',
									'3'  => 'manager'
	
				                )
		
		
		),
		
		array(
			'id'             => 'uix_sc_multiselect',
			'title'          => __( 'Multiple Selector', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => [ '1', '3' ], //It takes a variable like [ ]  if the value is empty.
			'placeholder'    => '',
			'type'           => 'multiselect',
			'default'        => array(
									'1'  => 'student',
									'2'  => 'teacher',
									'3'  => 'manager',
									'4'  => 'children'
	
				                )
		
		
		),
		
		array(
			'id'             => 'uix_sc_icon',
			'title'          => __( 'This is Icon Selector ', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'icon',
			'default'        => array(
			                        'social'  => false
				                )
		
		),
			
		
		array(
			'id'             => 'uix_sc_colormap',
			'title'          => __( 'Color Map', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 'rgb(162, 63, 3)',
			'placeholder'    => '',
			'type'           => 'colormap'
		
		
		),	
		array(
				'id'             => 'uix_sc_colormap2',
				'title'          => __( 'Color Map', 'uix-shortcodes' ),
				'desc'           => '',
				'value'          => '',
				'placeholder'    => '',
				'type'           => 'colormap',
				'default'        => array(
									'swatches' => 1
								)

		),	
		
		
		array(
			'id'             => 'uix_sc_checkbox',
			'title'          => __( 'Checkbox', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'checkbox',
			'default'        => array(
									'checked'  => false
				                )
		
		
		),	
		
		array(
			'id'             => 'uix_sc_checkbox_toggle',
			'title'          => __( 'Toggle for Checkbox', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'checkbox',
			'default'        => array(
									'checked'  => true
				                ),
			/* if show the target item, the target id require class like "toggle-row toggle-row-show" */
			'toggle'        => array(
									'trigger_id'  => 'uix_sc_checkbox_toggle', /* {item id}-{option id} */
									'toggle_class'  => [ 'uix_sc_checkbox_toggle_text_class' ]
				                )	
		
		
		),	
		
			array(
				'id'             => 'uix_sc_checkbox_toggle_text',
				'title'          => '',
				'desc'           => '',
				'value'          => 1,
				'class'          => 'toggle-row toggle-row-show uix_sc_checkbox_toggle_text_class', /*class of toggle item */
				'placeholder'    => '',
				'type'           => 'short-text',
				'default'        => array(
										'units'  => 'px'
									)
			
			),	
			
		


		
		//------list begin
		array(
			'id'             => 'uix_sc_list',
			'title'          => __( 'List Item', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'list',
			'default'        => array(
									'btn_text'                  => __( 'click here to add an item', 'uix-shortcodes' ),
									'clone_class'               => [ 
										array(
											'id'        => 'dynamic-row-uix_sc_listitem_imgURL',
											'type'      => 'image'
										), 
										array(
											'id'        => 'dynamic-row-uix_sc_listitem_imgtitle',
											'type'      => 'text'
										), 
										array(
											'id'        => 'dynamic-row-uix_sc_listitem_imgicon',
											'type'      => 'icon'
										), 
										array(
											'id'        => 'dynamic-row-uix_sc_listitem_radio',
											'type'      => 'radio'
										), 
										
										array(
											'id'        => 'dynamic-row-uix_sc_listitem_color',
											'type'      => 'color'
										), 									
										
										array(
											'id'        => 'dynamic-row-uix_sc_listitem_colormap',
											'type'      => 'colormap'
										), 										
										array(
											'id'        => 'dynamic-row-uix_sc_listitem_shorttext',
											'type'      => 'short-text'
										), 										
										
										array(
											'id'              => 'dynamic-row-uix_sc_listitem_toggle',
											'type'            => 'toggle',
											'toggle_class'    => [ 'dynamic-row-uix_sc_listitem_toggle_url', 'dynamic-row-uix_sc_listitem_toggle_icon' ]
										), 									
										
										

									 ],
									'max'                       => 3
				                )
									
		),
		
			array(
				'id'             => 'uix_sc_listitem_imgURL',
				'title'          => '',
				'desc'           => '',
				'value'          => '',
				'class'          => 'dynamic-row-uix_sc_listitem_imgURL', /*class of list item */
				'placeholder'    => __( 'Image URL', 'uix-shortcodes' ),
				'type'           => 'image',
				'default'        => array(
										'remove_btn_text'  => __( 'Remove image', 'uix-shortcodes' ),
										'upload_btn_text'  => __( 'Upload', 'uix-shortcodes' ),
									)
			
			),	
		
		
			array(
				'id'             => 'uix_sc_listitem_imgtitle',
				'title'          => '',
				'desc'           => '',
				'value'          => '',
				'class'          => 'dynamic-row-uix_sc_listitem_imgtitle', /*class of list item */
				'placeholder'    => __( 'Text', 'uix-shortcodes' ),
				'type'           => 'text'
			
			),
			
			array(
				'id'             => 'uix_sc_listitem_imgicon',
				'title'          => '',
				'desc'           => '',
				'value'          => '',
				'class'          => 'dynamic-row-uix_sc_listitem_imgicon', /*class of list item */
				'placeholder'    => '',
				'type'           => 'icon',
				'default'        => array(
										'social'  => true
									)
			
			),
			
			array(
				'id'             => 'uix_sc_listitem_radio',
				'title'          => '',
				'desc'           => '',
				'value'          => '',
				'class'          => 'dynamic-row-uix_sc_listitem_radio', /*class of list item */
				'placeholder'    => '',
				'type'           => 'radio',
				'default'        => array(
										'1'  => 'boy',
										'2'  => 'girl',
										'3'  => 'private',
				                )
			
			),
			
				
			array(
				'id'             => 'uix_sc_listitem_color',
				'title'          => '',
				'desc'           => '',
				'value'          => '#f5f5dc',
				'class'          => 'dynamic-row-uix_sc_listitem_color', /*class of list item */
				'placeholder'    => '',
				'type'           => 'color',
				'default'        => [ '#fffff0', '#f5f5dc', '#f5deb3', '#d2b48c' ]
			
			),	
			
			array(
				'id'             => 'uix_sc_listitem_colormap',
				'title'          => '',
				'desc'           => '',
				'value'          => 'rgb(162, 63, 3)',
				'class'          => 'dynamic-row-uix_sc_listitem_colormap', /*class of list item */
				'placeholder'    => '',
				'type'           => 'colormap',
				'default'        => array(
										'swatches' => 1
									)
			
			
			),	
			
			array(
				'id'             => 'uix_sc_listitem_shorttext',
				'title'          => '',
				'desc'           => '',
				'value'          => '',
				'class'          => 'dynamic-row-uix_sc_listitem_shorttext', /*class of list item */
				'placeholder'    => '',
				'type'           => 'short-text',
				'default'        => array(
										'units'  => 'px'
									)
			
			),
			
			
			//------toggle begin
			array(
				'id'             => 'uix_sc_listitem_toggle',
				'title'          => '',
				'desc'           => '',
				'value'          => '',
				'class'          => 'dynamic-row-uix_sc_listitem_toggle', /*class of list item */
				'placeholder'    => '',
				'type'           => 'toggle',
				'default'        => array(
										'btn_text'      => __( 'set up links with toggle', 'uix-shortcodes' ),
										'toggle_class'  => [ 'dynamic-row-uix_sc_listitem_toggle_url', 'dynamic-row-uix_sc_listitem_toggle_icon' ]
									)
			
			),	
	
				array(
					'id'             => 'uix_sc_listitem_toggle_url',
					'title'          => '',
					'desc'           => __( 'Note: 3 items per row.Per section insert "for a maximum of 3".', 'uix-shortcodes' ),
					'value'          => '',
					'class'          => 'toggle-row dynamic-row-uix_sc_listitem_toggle_url', /*class of toggle item */
					'placeholder'    => __( 'Toggle URL', 'uix-shortcodes' ),
					'type'           => 'text',
					'default'        => ''
				
				),
				array(
					'id'             => 'uix_sc_listitem_toggle_icon',
					'title'          => '',
					'desc'           => '',
					'value'          => '',
					'class'          => 'toggle-row dynamic-row-uix_sc_listitem_toggle_icon',/*class of toggle item */
					'placeholder'    => '',
					'type'           => 'icon',
					'default'        => array(
											'social'  => true
										)
				
				),
		
			
			//------toggle end
			
			
					
		
		
		//------list end
		
	
		

		
	
		

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
		
		/* List Item ( step 1) */
		var dynamic_append_box_content = '<?php echo UixShortcodes::dynamic_form_code( 'dynamic-row-uix_sc_listitem_imgURL', $form_html ).UixShortcodes::dynamic_form_code( 'dynamic-row-uix_sc_listitem_imgtitle', $form_html ).UixShortcodes::dynamic_form_code( 'dynamic-row-uix_sc_listitem_imgicon', $form_html ).UixShortcodes::dynamic_form_code( 'dynamic-row-uix_sc_listitem_radio', $form_html ).UixShortcodes::dynamic_form_code( 'dynamic-row-uix_sc_listitem_color', $form_html ).UixShortcodes::dynamic_form_code( 'dynamic-row-uix_sc_listitem_colormap', $form_html ).UixShortcodes::dynamic_form_code( 'dynamic-row-uix_sc_listitem_shorttext', $form_html ).UixShortcodes::dynamic_form_code( 'dynamic-row-uix_sc_listitem_toggle', $form_html, 'toggle' ).UixShortcodes::dynamic_form_code( 'dynamic-row-uix_sc_listitem_toggle_url', $form_html, 'toggle-row' ).UixShortcodes::dynamic_form_code( 'dynamic-row-uix_sc_listitem_toggle_icon', $form_html, 'toggle-row' ); ?>';
		
	
		
		 /* Callback before custom javascript of sweetalert */
		<?php echo UixShortcodes::sweetalert_before( $form_js, $form_html, $form_js_vars, $form_id, __( 'Demo Form 1', 'uix-shortcodes' ) ); ?>
		
	
				/* List Item ( step 2)  */
		        var list_num = 3;
				
		
				var show_list_item = '';
				for ( var i=0; i<=list_num; i++ ){
					
			        var _uid = ( i == 0 ) ? '#' : '#'+i+'-',
					    _txt = $( _uid+'uix_sc_listitem_imgtitle' ).val(),
					    _img = $( _uid+'uix_sc_listitem_imgURL' ).val(),
						_icon = $( _uid+'uix_sc_listitem_imgicon' ).val(),
						_radio = $( _uid+'uix_sc_listitem_radio' ).val(),
						_color = $( _uid+'uix_sc_listitem_color' ).val(),
						_colormap = $( _uid+'uix_sc_listitem_colormap' ).val(),
						_shorttext = $( _uid+'uix_sc_listitem_shorttext' ).val(),
						_toggle_url = $( _uid+'uix_sc_listitem_toggle_url' ).val(),
						_toggle_icon = $( _uid+'uix_sc_listitem_toggle_icon' ).val();
						
					
					
					if ( _txt != undefined )  show_list_item += _txt;   
					if ( _img != undefined ) show_list_item += '( Image URL: '+_img+' )';   
					if ( _icon != undefined ) show_list_item += '( Icon: '+_icon+' )';   
					if ( _radio != undefined ) show_list_item += '( Radio: '+_radio+' )';   
					if ( _color != undefined ) show_list_item += '( Color: '+_color+' )';   
					if ( _colormap != undefined ) show_list_item += '( Custom Color : '+_colormap+' )';   
					if ( _shorttext != undefined ) show_list_item += '( Units Txt : '+_shorttext+' )';   
					if ( _toggle_url != undefined ) show_list_item += '( Toggle URL : '+_toggle_url+' )';   
					if ( _toggle_icon != undefined ) show_list_item += '( Toggle Icon : '+_toggle_icon+' )';   
						
					
				}
				
				
				/* Multiple Selector */
				var multiselectorArr = uix_sc_multiselect.split( ',' ),
				    show_checkboxes = '';
				for ( var k=0; k < multiselectorArr.length; k++ ) {
					
					
					switch( multiselectorArr[k] ){ 
						case '1': 
						    show_checkboxes += 'student+';
							
						break; 
						
						case '2': 
						    show_checkboxes += 'teacher+';
						
						break; 
						
						case '3': 
						    show_checkboxes += 'manager+';
						
						break; 	
						
						case '4': 
						    show_checkboxes += 'children+';
						
						break; 				
						
						default: 

					}
					
				}
		
	
				/* Checkbox */
				var show_checkbox = '';
				if ( uix_sc_checkbox === true ){
					show_checkbox = '(checked)';
				}
				
			
				/* Output */
				_vhtml = '';
				_vhtml += '<hr>Text: '+uix_sc_text;
				_vhtml += '<hr>Textarea: '+uix_sc_textarea;
				_vhtml += '<hr>Short Text: <br>'+uix_sc_shorttext;
				_vhtml += '<hr>Short Units Text: '+uix_sc_shortunitstext+uix_sc_shortunitstext_units;
				_vhtml += '<hr>Select: '+uix_sc_select;
				_vhtml += '<hr>Upload Image: '+uix_sc_image;
				_vhtml += '<hr>Toggle URL: '+uix_sc_toggle_url;
				_vhtml += '<hr>Icon: '+uix_sc_icon;
				_vhtml += '<hr>Radio: '+uix_sc_radio;
				_vhtml += '<hr>Slider: '+uix_sc_slider+uix_sc_slider_units;
				_vhtml += '<hr>Color Map Value: '+uix_sc_colormap;
				_vhtml += '<hr>Multiple Checkboxes: '+show_checkboxes;
				_vhtml += '<hr>Padding: '+uix_sc_paddingdis_top+','+uix_sc_paddingdis_right+','+uix_sc_paddingdis_bottom+','+uix_sc_paddingdis_left;
				
				
				
				//---
				_vhtml += '<hr>List Item: '+show_list_item;
				_vhtml += '<hr>Checkbox: '+show_checkbox+'<br>';
			

				window.send_to_editor( "[uix_hello color='"+uix_sc_single_color+"']" + _vhtml + "[/uix_hello]" );
				
				
				
		   /* Callback after custom javascript of sweetalert */
		  <?php echo UixShortcodes::sweetalert_after(); ?>
				


	} ); 

	
	
} ) ( jQuery );

</script>
