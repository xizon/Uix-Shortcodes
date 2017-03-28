<?php
if ( !class_exists( 'UixShortcodes' ) ) {
    return;
}

/**
 * Initialize sections template parameters
 * ----------------------------------------------------
 */
$form_vars = UixShortcodes::init_template_parameters( 'uix_sc_form_client' );
if ( !is_array( $form_vars ) ) return;
foreach ( $form_vars as $key => $v ) :
	$$key = $v;
endforeach;


/**
 * Clone parameters
 * ----------------------------------------------------
 */
//clone list
$clone_trigger_id = 'uix_sc_client_list';   // ID of clone trigger 
$clone_max        = 50;                   // Maximum of clone form 


/**
 * Form Type
 */
$form_type = array(
    'list' => false
);


$args = 
	array(
	
		array(
			'id'             => 'uix_sc_client_list_col',
			'title'          => esc_html__( 'Column', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 3,
			'placeholder'    => '',
			'type'           => 'radio',
			'default'        => array(
		                            '6'  => '6',
		                            '5'  => '5',
									'4'  => '4',
									'3'  => '3',
									'2'  => '2',
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
											'id'        => 'dynamic-row-uix_sc_client_listitem_logo',
											'type'      => 'image'
										), 
		
										array(
											'id'        => 'dynamic-row-uix_sc_client_listitem_url',
											'type'      => 'text'
										), 
									
										array(
											'id'        => 'dynamic-row-uix_sc_client_listitem_intro',
											'type'      => 'textarea'
										), 
										

									 ),
									'max'                       => $clone_max
				                )
									
		),
		
		
			array(
				'id'             => 'uix_sc_client_listitem_logo',
				'title'          => '',
				'desc'           => '',
				'value'          => '',
				'class'          => 'dynamic-row-uix_sc_client_listitem_logo', /*class of list item */
				'placeholder'    => esc_html__( 'Logo URL', 'uix-shortcodes' ),
				'type'           => 'image',
				'default'        => array(
										'remove_btn_text'  => esc_html__( 'Remove image', 'uix-shortcodes' ),
										'upload_btn_text'  => esc_html__( 'Upload Logo', 'uix-shortcodes' ),
									)
			
			),	
			

			array(
				'id'             => 'uix_sc_client_listitem_url',
				'title'          => '',
				'desc'           => '',
				'value'          => '',
				'class'          => 'dynamic-row-uix_sc_client_listitem_url', /*class of list item */
				'placeholder'    => esc_html__( 'Destination URL, e.g., http://your.clientsite.com', 'uix-shortcodes' ),
				'type'           => 'text',
				'default'        => ''

			),

			
			array(
				'id'             => 'uix_sc_client_listitem_intro',
				'title'          => '',
				'desc'           => '',
				'value'          => esc_html__( 'The Introduction of this member.', 'uix-shortcodes' ),
				'class'          => 'dynamic-row-uix_sc_client_listitem_intro', /*class of list item */
				'placeholder'    => '',
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
																	'fields'         => array( 'uix_sc_client_listitem_logo', 'uix_sc_client_listitem_intro', 'uix_sc_client_listitem_url' )
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
		'title'                   => esc_html__( 'Client Lists', 'uix-shortcodes' ),
	    'js_template'             => '
		

			/* List Item ( step 2)  */
			var list_num = '.floatval( $clone_max ).';


			var show_list_item = \'\';
			for ( var i=0; i<=list_num; i++ ){

				var _uid  = ( i == 0 ) ? \'#\' : \'#\'+i+\'-\',
					_logo = $( _uid+\'uix_sc_client_listitem_logo\' ).val(),
					_url  = $( _uid+\'uix_sc_client_listitem_url\' ).val(),
					_desc = $( _uid+\'uix_sc_client_listitem_intro\' ).val();




				var _item_v_logo = ( _logo != undefined ) ? encodeURI( _logo ) : \'\',
					_item_v_url  = ( _url != undefined && _url != \'\' ) ? "url=\'"+encodeURI( _url )+"\'" : \'\',
					_item_v_desc = ( _desc != undefined ) ? uixscform_shortcodeTextareaPrint( _desc ) : \'\';


				if ( _logo != undefined ) {
					show_list_item += "<br>[uix_client_item "+_item_v_url+" col=\'"+uix_sc_client_list_col+"\' logo=\'"+_item_v_logo+"\']";
					show_list_item += "<br>[uix_client_item_desc]"+ _item_v_desc +"[/uix_client_item_desc]";					
					show_list_item += "<br>[/uix_client_item]";

				}


			}


			code = "[uix_client]"+show_list_item+"<br>[/uix_client]";

		
		'
    )
);