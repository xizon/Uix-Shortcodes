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
$form_id = 'uix_sc_form_hello';

$clone_max = 3; // Maximum of clone form 

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
			'id'             => 'uix_sc_tipinfo',
			'desc'           => sprintf( __( 'You can custom the boxed width of the container for Uix Shortcodes stylesheets. <a target="_blank" href="%1$s">click here to custom</a>', 'uix-shortcodes' ), admin_url( 'admin.php?page='.UixShortcodes::CUSPAGE.'&tab=custom-css' ) ),
			'type'           => 'note',
			'default'        => array(
		                            'fullwidth'  => false,
									'type'       => 'note'  //error, success, warning, note
				                ),
		
		),	
		
		array(
			'id'             => 'uix_sc_text',
			'title'          => __( 'Text', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'text'
		
		),
		
		/*
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
		*/

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
								),
			/* If the toggle of switch with radio is enabled, the target id require class like "toggle-row" */
			'toggle'        => array(
			                        array(
										'trigger_id'           => 'uix_sc_radio-1', /* {item id}-{option id} */
										'toggle_class'         => [ 'xxx_toggle_class' ],
										'toggle_remove_class'  => [ 'yyy_toggle_class', 'zzz_toggle_class' ]

									),
			                        array(
										'trigger_id'           => 'uix_sc_radio-2', /* {item id}-{option id} */
										'toggle_class'         => [ 'yyy_toggle_class' ],
										'toggle_remove_class'  => [ 'xxx_toggle_class', 'zzz_toggle_class' ]

									),
			                        array(
										'trigger_id'           => 'uix_sc_radio-3', /* {item id}-{option id} */
										'toggle_class'         => [ 'zzz_toggle_class' ],
										'toggle_remove_class'  => [ 'xxx_toggle_class', 'yyy_toggle_class' ]

									),
									
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
									'format'                    => false
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
									
									/* Show image properties 
									 * Javascript Vars:
									 
									   {item id}_repeat
									   {item id}_position
									   {item id}_attachment
									   {item id}_size
									*/
									//'prop'  => true,
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
		                            //'btn_textclass' => 'table-link-icon',
			                        'btn_text'      => __( 'set up links with toggle', 'uix-shortcodes' ),
									'toggle_class'  => [ 'uix_sc_toggle_url_class', 'uix_sc_toggle_url2_class', 'uix_sc_toggle_urlalign_class' ]
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
			'default'        => [ '#fffff0', '#f5f5dc', '#f5deb3', '#d2b48c', '#c3b091', '#c0c0c0', '#808080', '#464646', '#333333', '#000080', '#084c9e', '#007fff', '#0E90D2', '#4BB1CF', '#5F9EA0', '#00ffff', '#7fffd4', '#008080', '#228b22', '#808000', '#a2bf2f', '#7fff00', '#bfff00', '#ffd700', '#daa520', '#ff7f50', '#fa8072', '#fc0fc0', '#ff77ff', '#e0b0ff', '#b57edc', '#843179', '#E1A0A1', '#D84F51', '#dc143c', '#990002' ,'#800000' ]
		
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
			/* If the toggle of switch with checkbox is enabled, the target id require class like "toggle-row" */
			'toggle'        => array(
									'trigger_id'  => 'uix_sc_checkbox_toggle', /* {item id}-{option id} */
									'toggle_class'  => [ 'uix_sc_checkbox_toggle_text_class' ],
									
									/* if this toggle contains another toggle, please specifies "toggle_not_class" in order that default hiding form is still valid . */
									/*
									'toggle_not_class'  => [ '' ]
									*/
									
				                )	
		
		
		),	
		
			array(
				'id'             => 'uix_sc_checkbox_toggle_text',
				'title'          => '',
				'desc'           => '',
				'value'          => 1,
				'class'          => 'toggle-row uix_sc_checkbox_toggle_text_class', /*class of toggle item */
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
											'id'        => 'dynamic-row-uix_sc_listitem_imgdesc',
											'type'      => 'textarea'
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
									'max'                       => $clone_max
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
				'id'             => 'uix_sc_listitem_imgdesc',
				'title'          => '',
				'desc'           => '',
				'value'          => '',
				'class'          => 'dynamic-row-uix_sc_listitem_imgdesc', /*class of list item */
				'placeholder'    => __( 'Text', 'uix-shortcodes' ),
				'type'           => 'textarea',
				'default'        => array(
										'row'     => 2,
										'format'  => true
									)
			
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



$form_html = UixSCFormCore::add_form( $cid, $sid, $form_id, $form_type, $args, 'html' );
$form_js = UixSCFormCore::add_form( $cid, $sid, $form_id, $form_type, $args, 'js' );
$form_js_vars = UixSCFormCore::add_form( $cid, $sid, $form_id, $form_type, $args, 'js_vars' );

/**
 * Returns actions of javascript
 */

if ( $sid == -1 && is_admin() ) {
	$currentScreen = get_current_screen();
	if( $currentScreen->base === "post" || $currentScreen->base === "widgets" || $currentScreen->base === "customize" || UixSCFormCore::inc_str( $currentScreen->base, '_page_' ) ) {
	  	  
		/* List Item - Register clone vars ( step 1) */
		UixSCFormCore::reg_clone_vars( 'uix_sc_list', UixSCFormCore::dynamic_form_code( 'dynamic-row-uix_sc_listitem_imgURL', $form_html ).UixSCFormCore::dynamic_form_code( 'dynamic-row-uix_sc_listitem_imgdesc', $form_html ).UixSCFormCore::dynamic_form_code( 'dynamic-row-uix_sc_listitem_imgicon', $form_html ).UixSCFormCore::dynamic_form_code( 'dynamic-row-uix_sc_listitem_radio', $form_html ).UixSCFormCore::dynamic_form_code( 'dynamic-row-uix_sc_listitem_color', $form_html ).UixSCFormCore::dynamic_form_code( 'dynamic-row-uix_sc_listitem_colormap', $form_html ).UixSCFormCore::dynamic_form_code( 'dynamic-row-uix_sc_listitem_shorttext', $form_html ).UixSCFormCore::dynamic_form_code( 'dynamic-row-uix_sc_listitem_toggle', $form_html, 'toggle' ).UixSCFormCore::dynamic_form_code( 'dynamic-row-uix_sc_listitem_toggle_url', $form_html, 'toggle-row' ).UixSCFormCore::dynamic_form_code( 'dynamic-row-uix_sc_listitem_toggle_icon', $form_html, 'toggle-row' ) );
	
		
		?>
		<script type="text/javascript">
		( function($) {
		'use strict';
			$( function() { 

				<?php echo UixSCFormCore::uixscform_callback( $form_js, $form_id, __( 'Demo Form 1', 'uix-shortcodes' ) ); ?>					
				<?php echo UixSCFormCore::send_before( $form_js_vars, $form_id ); ?> 
				/*--**************** Custom shortcode begin ****************-- */
					/* List Item ( step 2)  */
					var list_num = <?php echo $clone_max; ?>;
					
			
					var show_list_item = '';
					for ( var i=0; i<=list_num; i++ ){
						
						var _uid = ( i == 0 ) ? '#' : '#'+i+'-',
							_desc = $( _uid+'uix_sc_listitem_imgdesc' ).val(),
							_img = $( _uid+'uix_sc_listitem_imgURL' ).val(),
							_icon = $( _uid+'uix_sc_listitem_imgicon' ).val(),
							_radio = $( _uid+'uix_sc_listitem_radio' ).val(),
							_color = $( _uid+'uix_sc_listitem_color' ).val(),
							_colormap = $( _uid+'uix_sc_listitem_colormap' ).val(),
							_shorttext = $( _uid+'uix_sc_listitem_shorttext' ).val(),
							_toggle_url = $( _uid+'uix_sc_listitem_toggle_url' ).val(),
							_toggle_icon = $( _uid+'uix_sc_listitem_toggle_icon' ).val();
							
						
						
						if ( _desc != undefined )  show_list_item += uixscform_shortcodeTextareaPrint( _desc );   
						if ( _img != undefined && _img != '' ) show_list_item += '( Image URL: '+_img+' )';   
						if ( _icon != undefined && _icon != '' ) show_list_item += '( Icon: '+_icon+' )';   
						if ( _radio != undefined && _radio != '' ) show_list_item += '( Radio: '+_radio+' )';   
						if ( _color != undefined && _color != '' ) show_list_item += '( Color: '+_color+' )';   
						if ( _colormap != undefined && _colormap != '' ) show_list_item += '( Custom Color : '+_colormap+' )';   
						if ( _shorttext != undefined && _shorttext != '' ) show_list_item += '( Units Txt : '+_shorttext+' )';   
						if ( _toggle_url != undefined && _toggle_url != '' ) show_list_item += '( Toggle URL : '+_toggle_url+' )';   
						if ( _toggle_icon != undefined && _toggle_icon != '' ) show_list_item += '( Toggle Icon : '+_toggle_icon+' )';   
							
						
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
				    _vhtml += '<hr>ToggleSwitch: '+uixscform_toggleSwitchCheckboxVal( 'uix_sc_checkbox_toggle' );
					_vhtml += '<hr>Short Text: <br>'+uix_sc_shorttext;
					_vhtml += '<hr>Short Units Text: '+uixscform_floatval( uix_sc_shortunitstext )+uix_sc_shortunitstext_units;
					_vhtml += '<hr>Select: '+uix_sc_select;
					_vhtml += '<hr>Upload Image: '+encodeURI( uix_sc_image );
					_vhtml += '<hr>Toggle URL: '+encodeURI( uix_sc_toggle_url );
					_vhtml += '<hr>Icon: '+uix_sc_icon;
					_vhtml += '<hr>Radio: '+uix_sc_radio;
					_vhtml += '<hr>Slider: '+uix_sc_slider+uix_sc_slider_units;
					_vhtml += '<hr>Color Map Value: '+uix_sc_colormap;
					_vhtml += '<hr>Multiple Checkboxes: '+show_checkboxes;
					_vhtml += '<hr>Padding: '+uixscform_floatval( uix_sc_paddingdis_top )+','+uixscform_floatval( uix_sc_paddingdis_right )+','+uixscform_floatval( uix_sc_paddingdis_bottom )+','+uixscform_floatval( uix_sc_paddingdis_left );
					
					
					
					//---
					_vhtml += '<hr>List Item: '+show_list_item;
					_vhtml += '<hr>Checkbox: '+show_checkbox+'<br>';
				
	
					code = "[uix_hello text='"+uixscform_shortcodeHTMLEcode( uix_sc_text )+"' color='"+uix_sc_single_color+"']" + uix_sc_textarea + " <p>" + _vhtml + "</p>[/uix_hello]";

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
