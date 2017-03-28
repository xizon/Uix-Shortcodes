<?php
if ( !class_exists( 'UixShortcodes' ) ) {
    return;
}

/**
 * Initialize sections template parameters
 * ----------------------------------------------------
 */
$form_vars = UixShortcodes::init_template_parameters( 'uix_sc_form_team_fullwidth' );
if ( !is_array( $form_vars ) ) return;
foreach ( $form_vars as $key => $v ) :
	$$key = $v;
endforeach;


/**
 * Clone parameters
 * ----------------------------------------------------
 */
//clone list
$clone_trigger_id = 'uix_sc_team_fullwidth_list';   // ID of clone trigger 
$clone_max        = 30;                        // Maximum of clone form 


/**
 * Form Type
 */
$form_type = array(
    'list' => false
);


$args = 
	array(
	
		array(
			'id'             => 'uix_sc_team_fullwidth_listitem_avatar_gray',
			'title'          => esc_html__( 'Gray Avatar', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'checkbox',
			'default'        => array(
									'checked'  => false
				                )
		
		
		),	

		array(
			'id'             => 'uix_sc_team_fullwidth_listitem_avatar_fillet',
			'title'          => esc_html__( 'Radius of Fillet Avatar', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '0',
			'placeholder'    => '',
			'type'           => 'short-text',
			'default'        => array(
									'units'  => '%'
								)
		
		),	
	
		
		array(
			'id'             => 'uix_sc_team_fullwidth_listitem_list_height',
			'title'          => esc_html__( 'Height of Grid', 'uix-shortcodes' ),
			'desc'           => wp_kses( __( 'Set height of grid so that it will fit its avatar photo. Browsers use a default stylesheet to render webpages if  the value is <strong>"0"</strong>.', 'uix-shortcodes' ), wp_kses_allowed_html( 'post' ) ),
			'value'          => '0',
			'placeholder'    => '',
			'type'           => 'short-text',
			'default'        => array(
									'units'  => 'px'
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
											'id'        => 'dynamic-row-uix_sc_team_fullwidth_listitem_avatar',
											'type'      => 'image'
										), 
									
										array(
											'id'        => 'dynamic-row-uix_sc_team_fullwidth_listitem_name',
											'type'      => 'text'
										), 
										array(
											'id'        => 'dynamic-row-uix_sc_team_fullwidth_listitem_position',
											'type'      => 'text'
										), 										
										
										array(
											'id'        => 'dynamic-row-uix_sc_team_fullwidth_listitem_intro',
											'type'      => 'textarea'
										), 
										
										array(
											'id'              => 'dynamic-row-uix_sc_team_fullwidth_listitem_toggle',
											'type'            => 'toggle',
											'toggle_class'    => array( 'dynamic-row-uix_sc_team_fullwidth_listitem_toggle_1_url', 'dynamic-row-uix_sc_team_fullwidth_listitem_toggle_1_icon', 'dynamic-row-uix_sc_team_fullwidth_listitem_toggle_2_url', 'dynamic-row-uix_sc_team_fullwidth_listitem_toggle_2_icon', 'dynamic-row-uix_sc_team_fullwidth_listitem_toggle_3_url', 'dynamic-row-uix_sc_team_fullwidth_listitem_toggle_3_icon', 'dynamic-row-uix_sc_team_fullwidth_listitem_toggle_4_url', 'dynamic-row-uix_sc_team_fullwidth_listitem_toggle_4_icon' )
										), 	

									 ),
									'max'                       => $clone_max
				                )
									
		),
		
		
			array(
				'id'             => 'uix_sc_team_fullwidth_listitem_avatar',
				'title'          => '',
				'desc'           => '',
				'value'          => '',
				'class'          => 'dynamic-row-uix_sc_team_fullwidth_listitem_avatar', /*class of list item */
				'placeholder'    => esc_html__( 'Avatar URL', 'uix-shortcodes' ),
				'type'           => 'image',
				'default'        => array(
										'remove_btn_text'  => esc_html__( 'Remove image', 'uix-shortcodes' ),
										'upload_btn_text'  => esc_html__( 'Upload', 'uix-shortcodes' ),
									)
			
			),	
			
			array(
				'id'             => 'uix_sc_team_fullwidth_listitem_name',
				'title'          => '',
				'desc'           => '',
				'value'          => esc_html__( 'Name', 'uix-shortcodes' ),
				'class'          => 'dynamic-row-uix_sc_team_fullwidth_listitem_name', /*class of list item */
				'placeholder'    => '',
				'type'           => 'text'
			
			),
			
			array(
				'id'             => 'uix_sc_team_fullwidth_listitem_position',
				'title'          => '',
				'desc'           => '',
				'value'          => esc_html__( 'Position', 'uix-shortcodes' ),
				'class'          => 'dynamic-row-uix_sc_team_fullwidth_listitem_position', /*class of list item */
				'placeholder'    => '',
				'type'           => 'text'
			
			),		
			
			
			array(
				'id'             => 'uix_sc_team_fullwidth_listitem_intro',
				'title'          => '',
				'desc'           => '',
				'value'          => esc_html__( 'The Introduction of this member.', 'uix-shortcodes' ),
				'class'          => 'dynamic-row-uix_sc_team_fullwidth_listitem_intro', /*class of list item */
				'placeholder'    => '',
				'type'           => 'textarea',
				'default'        => array(
										'row'     => 5,
										'format'  => true
									)
			
			),
		
	
			//------toggle begin
			array(
				'id'             => 'uix_sc_team_fullwidth_listitem_toggle',
				'title'          => '',
				'desc'           => '',
				'value'          => '',
				'class'          => 'dynamic-row-uix_sc_team_fullwidth_listitem_toggle', /*class of list item */
				'placeholder'    => '',
				'type'           => 'toggle',
				'default'        => array(
										'btn_text'      => esc_html__( 'set up links with social network', 'uix-shortcodes' ),
										'toggle_class'  => array( 'dynamic-row-uix_sc_team_fullwidth_listitem_toggle_1_url', 'dynamic-row-uix_sc_team_fullwidth_listitem_toggle_1_icon', 'dynamic-row-uix_sc_team_fullwidth_listitem_toggle_2_url', 'dynamic-row-uix_sc_team_fullwidth_listitem_toggle_2_icon', 'dynamic-row-uix_sc_team_fullwidth_listitem_toggle_3_url', 'dynamic-row-uix_sc_team_fullwidth_listitem_toggle_3_icon' )
									)
			
			),	
	
				array(
					'id'             => 'uix_sc_team_fullwidth_listitem_toggle_1_url',
					'title'          => '',
					'desc'           => '',
					'value'          => '',
					'class'          => 'toggle-row dynamic-row-uix_sc_team_fullwidth_listitem_toggle_1_url', /*class of toggle item */
					'placeholder'    => esc_html__( 'Your Social Network Page URL 1', 'uix-shortcodes' ),
					'type'           => 'text',
					'default'        => ''
				
				),
				
				array(
					'id'             => 'uix_sc_team_fullwidth_listitem_toggle_1_icon',
					'title'          => '',
					'desc'           => '',
					'value'          => '',
					'class'          => 'toggle-row dynamic-row-uix_sc_team_fullwidth_listitem_toggle_1_icon',/*class of toggle item */
					'placeholder'    => esc_html__( 'Choose Social Icon 1', 'uix-shortcodes' ),
					'type'           => 'icon',
					'default'        => array(
											'social'  => true
										)
				
				),
				
				
				array(
					'id'             => 'uix_sc_team_fullwidth_listitem_toggle_2_url',
					'title'          => '',
					'desc'           => '',
					'value'          => '',
					'class'          => 'toggle-row dynamic-row-uix_sc_team_fullwidth_listitem_toggle_2_url', /*class of toggle item */
					'placeholder'    => esc_html__( 'Your Social Network Page URL 2', 'uix-shortcodes' ),
					'type'           => 'text',
					'default'        => ''
				
				),
				
				array(
					'id'             => 'uix_sc_team_fullwidth_listitem_toggle_2_icon',
					'title'          => '',
					'desc'           => '',
					'value'          => '',
					'class'          => 'toggle-row dynamic-row-uix_sc_team_fullwidth_listitem_toggle_2_icon',/*class of toggle item */
					'placeholder'    => esc_html__( 'Choose Social Icon 2', 'uix-shortcodes' ),
					'type'           => 'icon',
					'default'        => array(
											'social'  => true
										)
				
				),
					
				
				array(
					'id'             => 'uix_sc_team_fullwidth_listitem_toggle_3_url',
					'title'          => '',
					'desc'           => '',
					'value'          => '',
					'class'          => 'toggle-row dynamic-row-uix_sc_team_fullwidth_listitem_toggle_3_url', /*class of toggle item */
					'placeholder'    => esc_html__( 'Your Social Network Page URL 3', 'uix-shortcodes' ),
					'type'           => 'text',
					'default'        => ''
				
				),
				
				array(
					'id'             => 'uix_sc_team_fullwidth_listitem_toggle_3_icon',
					'title'          => '',
					'desc'           => '',
					'value'          => '',
					'class'          => 'toggle-row dynamic-row-uix_sc_team_fullwidth_listitem_toggle_3_icon',/*class of toggle item */
					'placeholder'    => esc_html__( 'Choose Social Icon 3', 'uix-shortcodes' ),
					'type'           => 'icon',
					'default'        => array(
											'social'  => true
										)
				
				),		
	
			
			//------toggle end
			
			
		
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
																	'fields'         => array( 'uix_sc_team_fullwidth_listitem_avatar', 'uix_sc_team_fullwidth_listitem_name', 'uix_sc_team_fullwidth_listitem_position', 'uix_sc_team_fullwidth_listitem_intro', 'uix_sc_team_fullwidth_listitem_toggle', 'uix_sc_team_fullwidth_listitem_toggle_1_url', 'uix_sc_team_fullwidth_listitem_toggle_1_icon', 'uix_sc_team_fullwidth_listitem_toggle_2_url', 'uix_sc_team_fullwidth_listitem_toggle_2_icon', 'uix_sc_team_fullwidth_listitem_toggle_3_url', 'uix_sc_team_fullwidth_listitem_toggle_3_icon' )
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
		'title'                   => esc_html__( 'Team Fullwidth', 'uix-shortcodes' ),
	    'js_template'             => '
		
			/* List Item ( step 2)  */
			var list_num = '.floatval( $clone_max ).';


			var show_list_item = \'\';
			for ( var i=0; i<=list_num; i++ ){

				var _uid = ( i == 0 ) ? \'#\' : \'#\'+i+\'-\',
					_avatar = $( _uid+\'uix_sc_team_fullwidth_listitem_avatar\' ).val(),
					_name = $( _uid+\'uix_sc_team_fullwidth_listitem_name\' ).val(),
					_position = $( _uid+\'uix_sc_team_fullwidth_listitem_position\' ).val(),
					_desc = $( _uid+\'uix_sc_team_fullwidth_listitem_intro\' ).val(),
					_social_url_1 = $( _uid+\'uix_sc_team_fullwidth_listitem_toggle_1_url\' ).val(),
					_social_icon_1 = $( _uid+\'uix_sc_team_fullwidth_listitem_toggle_1_icon\' ).val(),
					_social_url_2 = $( _uid+\'uix_sc_team_fullwidth_listitem_toggle_2_url\' ).val(),
					_social_icon_2 = $( _uid+\'uix_sc_team_fullwidth_listitem_toggle_2_icon\' ).val(),
					_social_url_3 = $( _uid+\'uix_sc_team_fullwidth_listitem_toggle_3_url\' ).val(),
					_social_icon_3 = $( _uid+\'uix_sc_team_fullwidth_listitem_toggle_3_icon\' ).val();




				var _item_v_avatar = ( _avatar != undefined ) ? encodeURI( _avatar ) : \'\',
					_item_v_name = ( _name != undefined ) ? uixscform_shortcodeHTMLEcode( _name ) : \'\',
					_item_v_position = ( _position != undefined ) ? uixscform_shortcodeHTMLEcode( _position ) : \'\',
					_item_v_desc = ( _desc != undefined ) ? uixscform_shortcodeTextareaPrint( _desc ) : \'\',
					_item_v_s_url_1 = ( _social_url_1 != undefined ) ? encodeURI( _social_url_1 ) : \'\',
					_item_v_s_icon_1 = ( _social_icon_1 != undefined ) ? _social_icon_1 : \'\',
					_item_v_s_url_2 = ( _social_url_2 != undefined ) ? encodeURI( _social_url_2 ) : \'\',
					_item_v_s_icon_2 = ( _social_icon_2 != undefined ) ? _social_icon_2 : \'\',
					_item_v_s_url_3 = ( _social_url_3 != undefined ) ? encodeURI( _social_url_3 ) : \'\',
					_item_v_s_icon_3 = ( _social_icon_3 != undefined ) ? _social_icon_3 : \'\';



				if ( _name != undefined ) {
					show_list_item += "<br>[uix_team_item col=\'fullwidth\' name=\'"+uixscform_shortcodeHTMLEcode( _item_v_name )+"\' avatar=\'"+_item_v_avatar+"\' position=\'"+_item_v_position+"\' social_1=\'"+_item_v_s_icon_1+"|"+_item_v_s_url_1+"\' social_2=\'"+_item_v_s_icon_2+"|"+_item_v_s_url_2+"\' social_3=\'"+_item_v_s_icon_3+"|"+_item_v_s_url_3+"\']";
					show_list_item += "<br>[uix_team_item_desc]"+ _item_v_desc +"[/uix_team_item_desc]";					
					show_list_item += "<br>[/uix_team_item]";

				}


			}

			/* Height of grid */
			var photobox_height = "avatarheight=\'"+uixscform_floatval( uix_sc_team_fullwidth_listitem_list_height )+"px\'";
			if ( uix_sc_team_fullwidth_listitem_list_height == 0 )  photobox_height = \'\';	


			code = "[uix_team col=\'fullwidth\' "+photobox_height+" avatarfillet=\'"+uixscform_floatval( uix_sc_team_fullwidth_listitem_avatar_fillet )+"%\' gray=\'"+uix_sc_team_fullwidth_listitem_avatar_gray+"\']"+show_list_item+"<br>[/uix_team]";

		
		'
    )
);
