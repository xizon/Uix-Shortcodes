<?php
if ( !class_exists( 'UixShortcodes' ) ) {
    return;
}

/**
 * Initialize sections template parameters
 * ----------------------------------------------------
 */
$form_vars = UixShortcodes::init_template_parameters( 'uix_sc_form_imageslider' );
if ( !is_array( $form_vars ) ) return;
foreach ( $form_vars as $key => $v ) :
	$$key = $v;
endforeach;


/**
 * Clone parameters
 * ----------------------------------------------------
 */
//clone list
$clone_trigger_id = 'uix_sc_imageslider_list';   // ID of clone trigger 
$clone_max        = 15;                        // Maximum of clone form 


/**
 * Form Type
 */
$form_type = array(
    'list' => false
);


$args = 
	array(
	
		array(
			'id'             => 'uix_sc_imageslider_list_effect',
			'title'          => esc_html__( 'Effect', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 'slide',
			'placeholder'    => '',
			'type'           => 'radio',
			'default'        => array(
		                            'slide'  => esc_html__( 'Slide', 'uix-shortcodes' ),
		                            'fade'  => esc_html__( 'Fade', 'uix-shortcodes' ),
								)
		
		),
		
		array(
			'id'             => 'uix_sc_imageslider_list_loop',
			'title'          => esc_html__( 'Automatically Transition', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'checkbox',
			'default'        => array(
									'checked'  => true
				                )
		
		
		),
		
		array(
			'id'             => 'uix_sc_imageslider_list_paging',
			'title'          => esc_html__( 'Show Paging Navigation', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'checkbox',
			'default'        => array(
									'checked'  => false
				                )
		
		
		),	
		
		
		array(
			'id'             => 'uix_sc_imageslider_list_arrows',
			'title'          => esc_html__( 'Show Arrow Navigation', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'checkbox',
			'default'        => array(
									'checked'  => true
				                )
		
		
		),	
		
		
		array(
			'id'             => 'uix_sc_imageslider_list_speed',
			'title'          => esc_html__( 'Speed of Images Appereance', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 1000,
			'placeholder'    => '',
			'type'           => 'short-text',
			'default'        => array(
									'units'  => 'ms'
								)
		
		),	
		
		array(
			'id'             => 'uix_sc_imageslider_list_timing',
			'title'          => esc_html__( 'Delay Between Images', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 7000,
			'placeholder'    => '',
			'type'           => 'short-text',
			'default'        => array(
									'units'  => 'ms'
								)
		
		),	
		
	 
		//------list begin
		array(
			'id'             => $clone_trigger_id,
			'title'          => esc_html__( 'List Item', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'list',
			'default'        => array(
									'btn_text'                  => esc_html__( 'click here to add an item', 'uix-shortcodes' ),
									'clone_class'               => array(
									
										array(
											'id'        => 'dynamic-row-uix_sc_imageslider_listitem_photo',
											'type'      => 'image'
										), 
		
										array(
											'id'        => 'dynamic-row-uix_sc_imageslider_listitem_url',
											'type'      => 'text'
										), 
		
										array(
											'id'        => 'dynamic-row-uix_sc_imageslider_listitem_title',
											'type'      => 'text'
										), 
									
										array(
											'id'        => 'dynamic-row-uix_sc_imageslider_listitem_intro',
											'type'      => 'textarea'
										), 
										

									 ),
									'max'                       => $clone_max
				                )
									
		),
		
		
			array(
				'id'             => 'uix_sc_imageslider_listitem_photo',
				'title'          => '',
				'desc'           => '',
				'value'          => '',
				'class'          => 'dynamic-row-uix_sc_imageslider_listitem_photo', /*class of list item */
				'placeholder'    => esc_html__( 'Image URL', 'uix-shortcodes' ),
				'type'           => 'image',
				'default'        => array(
										'remove_btn_text'  => esc_html__( 'Remove image', 'uix-shortcodes' ),
										'upload_btn_text'  => esc_html__( 'Upload Image', 'uix-shortcodes' ),
									)
			
			),	
			

			array(
				'id'             => 'uix_sc_imageslider_listitem_url',
				'title'          => '',
				'desc'           => '',
				'value'          => '',
				'class'          => 'dynamic-row-uix_sc_imageslider_listitem_url', /*class of list item */
				'placeholder'    => esc_html__( 'Destination URL and can be left blank, e.g., http://your.site.com', 'uix-shortcodes' ),
				'type'           => 'text',
				'default'        => ''

			),
		
			array(
				'id'             => 'uix_sc_imageslider_listitem_title',
				'title'          => '',
				'desc'           => '',
				'value'          => '',
				'class'          => 'dynamic-row-uix_sc_imageslider_listitem_title', /*class of list item */
				'placeholder'    => esc_html__( 'Slider title', 'uix-shortcodes' ),
				'type'           => 'text',
				'default'        => ''

			),
			
		
		

			
			array(
				'id'             => 'uix_sc_imageslider_listitem_intro',
				'title'          => '',
				'desc'           => '',
				'value'          => '',
				'class'          => 'dynamic-row-uix_sc_imageslider_listitem_intro', /*class of list item */
				'placeholder'    => esc_html__( 'Slider introduction', 'uix-shortcodes' ),
				'type'           => 'textarea',
				'default'        => array(
										'row'     => 5,
										'format'  => true
									)
			
			),
		
	
			
		
		//------list end
		
		


		
	
	)
;


/**
 * Returns form javascripts
 * ----------------------------------------------------
 */
UixShortcodes::form_scripts( array(
	    'clone'                   => array(
										'max'               => $clone_max,
										'fields_group'  => array(
																array(
																	'trigger_id'     => $clone_trigger_id,
																	'fields'         => array( 'uix_sc_imageslider_listitem_photo', 'uix_sc_imageslider_listitem_title', 'uix_sc_imageslider_listitem_intro', 'uix_sc_imageslider_listitem_url' )
																),
															)
									),
		'form_id'                 => $form_id,
		'section_id'              => $sid,
	    'content_id'              => $cid,
		'fields'                  => array(
										array(
											 'type'    => $form_type,
											 'values'  => $args
										),

									),
		'title'                   => esc_html__( 'Image Slider', 'uix-shortcodes' ),
	    'js_template'             => '

			/* List Item ( step 2)  */
			var list_num = '.floatval( $clone_max ).';


			var show_list_item = \'\';
			for ( var i=0; i<=list_num; i++ ){

				var _uid  = ( i == 0 ) ? \'#\' : \'#\'+i+\'-\',
					_photo = $( _uid+\'uix_sc_imageslider_listitem_photo\' ).val(),
					_url  = $( _uid+\'uix_sc_imageslider_listitem_url\' ).val(),
					_title = $( _uid+\'uix_sc_imageslider_listitem_title\' ).val(),
					_desc = $( _uid+\'uix_sc_imageslider_listitem_intro\' ).val();




				var _item_v_photo = ( _photo != undefined ) ? encodeURI( _photo ) : \'\',
					_item_v_url  = ( _url != undefined && _url != \'\' ) ? "url=\'"+encodeURI( _url )+"\'" : \'\',
					_item_v_title = ( _title != undefined && _title != \'\' ) ? "title=\'"+uixscform_shortcodeHTMLEcode( _title )+"\'" : \'\',
					_item_v_desc = ( _desc != undefined && _desc != \'\' ) ? "desc=\'"+uixscform_shortcodeHTMLEcode( _desc )+"\'" : \'\';


				if ( _photo != undefined && _photo != \'\' ) {
					show_list_item += "<br>[uix_imageslider_item "+_item_v_url+" "+_item_v_title+" "+_item_v_desc+" image=\'"+_item_v_photo+"\'][/uix_imageslider_item]";
				}


			}


			code = "[uix_imageslider effect=\'"+uix_sc_imageslider_list_effect+"\' loop=\'"+uix_sc_imageslider_list_loop+"\' paging=\'"+uix_sc_imageslider_list_paging+"\' arrows=\'"+uix_sc_imageslider_list_arrows+"\' speed=\'"+uix_sc_imageslider_list_speed+"\' timing=\'"+uix_sc_imageslider_list_timing+"\']"+show_list_item+"<br>[/uix_imageslider]";

		
		'
    )
);

