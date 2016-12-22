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
$form_id = 'uix_sc_form_team_grid';

$clone_max = 30; // Maximum of clone form 

/**
 * Form Type
 */
$form_type = [
    'list' => false
];


$args = 
	[
	
		array(
			'id'             => 'uix_sc_team_grid_listitem_col',
			'title'          => __( 'Column', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 4,
			'placeholder'    => '',
			'type'           => 'radio',
			'default'        => array(
									'4'  => '4',
									'3'  => '3',
									'2'  => '2',
								)
		
		),
		
		array(
			'id'             => 'uix_sc_team_grid_listitem_avatar_gray',
			'title'          => __( 'Gray Avatar', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'checkbox',
			'default'        => array(
									'checked'  => false
				                )
		
		
		),	
		
		array(
			'id'             => 'uix_sc_team_grid_listitem_avatar_fillet',
			'title'          => __( 'Radius of Fillet Avatar', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '0',
			'placeholder'    => '',
			'type'           => 'short-text',
			'default'        => array(
									'units'  => '%'
								)
		
		),	
			
		array(
			'id'             => 'uix_sc_team_grid_listitem_list_height',
			'title'          => __( 'Height of Grid', 'uix-shortcodes' ),
			'desc'           => __( 'Set height of grid so that it will fit its avatar photo. Browsers use a default stylesheet to render webpages if  the value is <strong>"0"</strong>.', 'uix-shortcodes' ),
			'value'          => '0',
			'placeholder'    => '',
			'type'           => 'short-text',
			'default'        => array(
									'units'  => 'px'
								)
		
		
		),		

	 
	 
	 
		//------list begin
		array(
			'id'             => 'uix_sc_team_grid_list',
			'title'          => __( 'List Item', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'list',
			'default'        => array(
									'btn_text'                  => __( 'click here to add an item', 'uix-shortcodes' ),
									'clone_class'               => [ 
									
										array(
											'id'        => 'dynamic-row-uix_sc_team_grid_listitem_avatar',
											'type'      => 'image'
										), 
									
										array(
											'id'        => 'dynamic-row-uix_sc_team_grid_listitem_name',
											'type'      => 'text'
										), 
										array(
											'id'        => 'dynamic-row-uix_sc_team_grid_listitem_position',
											'type'      => 'text'
										), 										
										
										array(
											'id'        => 'dynamic-row-uix_sc_team_grid_listitem_intro',
											'type'      => 'textarea'
										), 
										
										array(
											'id'              => 'dynamic-row-uix_sc_team_grid_listitem_toggle',
											'type'            => 'toggle',
											'toggle_class'    => [ 'dynamic-row-uix_sc_team_grid_listitem_toggle_1_url', 'dynamic-row-uix_sc_team_grid_listitem_toggle_1_icon', 'dynamic-row-uix_sc_team_grid_listitem_toggle_2_url', 'dynamic-row-uix_sc_team_grid_listitem_toggle_2_icon', 'dynamic-row-uix_sc_team_grid_listitem_toggle_3_url', 'dynamic-row-uix_sc_team_grid_listitem_toggle_3_icon', 'dynamic-row-uix_sc_team_grid_listitem_toggle_4_url', 'dynamic-row-uix_sc_team_grid_listitem_toggle_4_icon' ]
										), 	

									 ],
									'max'                       => $clone_max
				                )
									
		),
		
		
			array(
				'id'             => 'uix_sc_team_grid_listitem_avatar',
				'title'          => '',
				'desc'           => '',
				'value'          => '',
				'class'          => 'dynamic-row-uix_sc_team_grid_listitem_avatar', /*class of list item */
				'placeholder'    => __( 'Avatar URL', 'uix-shortcodes' ),
				'type'           => 'image',
				'default'        => array(
										'remove_btn_text'  => __( 'Remove image', 'uix-shortcodes' ),
										'upload_btn_text'  => __( 'Upload', 'uix-shortcodes' ),
									)
			
			),	
			
			array(
				'id'             => 'uix_sc_team_grid_listitem_name',
				'title'          => '',
				'desc'           => '',
				'value'          => __( 'Name', 'uix-shortcodes' ),
				'class'          => 'dynamic-row-uix_sc_team_grid_listitem_name', /*class of list item */
				'placeholder'    => '',
				'type'           => 'text'
			
			),
			
			array(
				'id'             => 'uix_sc_team_grid_listitem_position',
				'title'          => '',
				'desc'           => '',
				'value'          => __( 'Position', 'uix-shortcodes' ),
				'class'          => 'dynamic-row-uix_sc_team_grid_listitem_position', /*class of list item */
				'placeholder'    => '',
				'type'           => 'text'
			
			),		
			
			
			array(
				'id'             => 'uix_sc_team_grid_listitem_intro',
				'title'          => '',
				'desc'           => '',
				'value'          => __( 'The Introduction of this member.', 'uix-shortcodes' ),
				'class'          => 'dynamic-row-uix_sc_team_grid_listitem_intro', /*class of list item */
				'placeholder'    => '',
				'type'           => 'textarea',
				'default'        => array(
										'row'     => 5,
										'format'  => true
									)
			
			),
		
	
			//------toggle begin
			array(
				'id'             => 'uix_sc_team_grid_listitem_toggle',
				'title'          => '',
				'desc'           => '',
				'value'          => '',
				'class'          => 'dynamic-row-uix_sc_team_grid_listitem_toggle', /*class of list item */
				'placeholder'    => '',
				'type'           => 'toggle',
				'default'        => array(
										'btn_text'      => __( 'set up links with social network', 'uix-shortcodes' ),
										'toggle_class'  => [ 'dynamic-row-uix_sc_team_grid_listitem_toggle_1_url', 'dynamic-row-uix_sc_team_grid_listitem_toggle_1_icon', 'dynamic-row-uix_sc_team_grid_listitem_toggle_2_url', 'dynamic-row-uix_sc_team_grid_listitem_toggle_2_icon', 'dynamic-row-uix_sc_team_grid_listitem_toggle_3_url', 'dynamic-row-uix_sc_team_grid_listitem_toggle_3_icon' ]
									)
			
			),	
	
				array(
					'id'             => 'uix_sc_team_grid_listitem_toggle_1_url',
					'title'          => '',
					'desc'           => '',
					'value'          => '',
					'class'          => 'toggle-row dynamic-row-uix_sc_team_grid_listitem_toggle_1_url', /*class of toggle item */
					'placeholder'    => __( 'Your Social Network Page URL 1', 'uix-shortcodes' ),
					'type'           => 'text',
					'default'        => ''
				
				),
				
				array(
					'id'             => 'uix_sc_team_grid_listitem_toggle_1_icon',
					'title'          => '',
					'desc'           => '',
					'value'          => '',
					'class'          => 'toggle-row dynamic-row-uix_sc_team_grid_listitem_toggle_1_icon',/*class of toggle item */
					'placeholder'    => __( 'Choose Social Icon 1', 'uix-shortcodes' ),
					'type'           => 'icon',
					'default'        => array(
											'social'  => true
										)
				
				),
				
				
				array(
					'id'             => 'uix_sc_team_grid_listitem_toggle_2_url',
					'title'          => '',
					'desc'           => '',
					'value'          => '',
					'class'          => 'toggle-row dynamic-row-uix_sc_team_grid_listitem_toggle_2_url', /*class of toggle item */
					'placeholder'    => __( 'Your Social Network Page URL 2', 'uix-shortcodes' ),
					'type'           => 'text',
					'default'        => ''
				
				),
				
				array(
					'id'             => 'uix_sc_team_grid_listitem_toggle_2_icon',
					'title'          => '',
					'desc'           => '',
					'value'          => '',
					'class'          => 'toggle-row dynamic-row-uix_sc_team_grid_listitem_toggle_2_icon',/*class of toggle item */
					'placeholder'    => __( 'Choose Social Icon 2', 'uix-shortcodes' ),
					'type'           => 'icon',
					'default'        => array(
											'social'  => true
										)
				
				),
					
				
				array(
					'id'             => 'uix_sc_team_grid_listitem_toggle_3_url',
					'title'          => '',
					'desc'           => '',
					'value'          => '',
					'class'          => 'toggle-row dynamic-row-uix_sc_team_grid_listitem_toggle_3_url', /*class of toggle item */
					'placeholder'    => __( 'Your Social Network Page URL 3', 'uix-shortcodes' ),
					'type'           => 'text',
					'default'        => ''
				
				),
				
				array(
					'id'             => 'uix_sc_team_grid_listitem_toggle_3_icon',
					'title'          => '',
					'desc'           => '',
					'value'          => '',
					'class'          => 'toggle-row dynamic-row-uix_sc_team_grid_listitem_toggle_3_icon',/*class of toggle item */
					'placeholder'    => __( 'Choose Social Icon 3', 'uix-shortcodes' ),
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
		UixSCFormCore::reg_clone_vars( 'uix_sc_team_grid_list', UixSCFormCore::dynamic_form_code( 'dynamic-row-uix_sc_team_grid_listitem_avatar', $form_html ).UixSCFormCore::dynamic_form_code( 'dynamic-row-uix_sc_team_grid_listitem_name', $form_html ).UixSCFormCore::dynamic_form_code( 'dynamic-row-uix_sc_team_grid_listitem_position', $form_html ).UixSCFormCore::dynamic_form_code( 'dynamic-row-uix_sc_team_grid_listitem_intro', $form_html ).UixSCFormCore::dynamic_form_code( 'dynamic-row-uix_sc_team_grid_listitem_toggle', $form_html, 'toggle' ).UixSCFormCore::dynamic_form_code( 'dynamic-row-uix_sc_team_grid_listitem_toggle_1_url', $form_html, 'toggle-row' ).UixSCFormCore::dynamic_form_code( 'dynamic-row-uix_sc_team_grid_listitem_toggle_1_icon', $form_html, 'toggle-row' ).UixSCFormCore::dynamic_form_code( 'dynamic-row-uix_sc_team_grid_listitem_toggle_2_url', $form_html, 'toggle-row' ).UixSCFormCore::dynamic_form_code( 'dynamic-row-uix_sc_team_grid_listitem_toggle_2_icon', $form_html, 'toggle-row' ).UixSCFormCore::dynamic_form_code( 'dynamic-row-uix_sc_team_grid_listitem_toggle_3_url', $form_html, 'toggle-row' ).UixSCFormCore::dynamic_form_code( 'dynamic-row-uix_sc_team_grid_listitem_toggle_3_icon', $form_html, 'toggle-row' ) );
 
		
		?>
		<script type="text/javascript">
		( function($) {
		'use strict';
			$( function() { 
				<?php echo UixSCFormCore::uixscform_callback( $form_js, $form_id, __( 'Insert Team Grid', 'uix-shortcodes' ) ); ?>					
				<?php echo UixSCFormCore::send_before( $form_js_vars, $form_id ); ?> 
				/*--**************** Custom shortcode begin ****************-- */
					/* List Item ( step 2)  */
					var list_num = <?php echo $clone_max; ?>;
					
			
					var show_list_item = '';
					for ( var i=0; i<=list_num; i++ ){
						
						var _uid = ( i == 0 ) ? '#' : '#'+i+'-',
							_avatar = $( _uid+'uix_sc_team_grid_listitem_avatar' ).val(),
							_name = $( _uid+'uix_sc_team_grid_listitem_name' ).val(),
							_position = $( _uid+'uix_sc_team_grid_listitem_position' ).val(),
							_desc = $( _uid+'uix_sc_team_grid_listitem_intro' ).val(),
							_social_url_1 = $( _uid+'uix_sc_team_grid_listitem_toggle_1_url' ).val(),
							_social_icon_1 = $( _uid+'uix_sc_team_grid_listitem_toggle_1_icon' ).val(),
							_social_url_2 = $( _uid+'uix_sc_team_grid_listitem_toggle_2_url' ).val(),
							_social_icon_2 = $( _uid+'uix_sc_team_grid_listitem_toggle_2_icon' ).val(),
							_social_url_3 = $( _uid+'uix_sc_team_grid_listitem_toggle_3_url' ).val(),
							_social_icon_3 = $( _uid+'uix_sc_team_grid_listitem_toggle_3_icon' ).val();
							
							
							
							
						var _item_v_avatar = ( _avatar != undefined ) ? encodeURI( _avatar ) : '',
							_item_v_name = ( _name != undefined ) ? uixscform_shortcodeHTMLEcode( _name ) : '',
							_item_v_position = ( _position != undefined ) ? uixscform_shortcodeHTMLEcode( _position ) : '',
							_item_v_desc = ( _desc != undefined ) ? uixscform_shortcodeTextareaPrint( _desc ) : '',
							_item_v_s_url_1 = ( _social_url_1 != undefined ) ? encodeURI( _social_url_1 ) : '',
							_item_v_s_icon_1 = ( _social_icon_1 != undefined ) ? _social_icon_1 : '',
							_item_v_s_url_2 = ( _social_url_2 != undefined ) ? encodeURI( _social_url_2 ) : '',
							_item_v_s_icon_2 = ( _social_icon_2 != undefined ) ? _social_icon_2 : '',
							_item_v_s_url_3 = ( _social_url_3 != undefined ) ? encodeURI( _social_url_3 ) : '',
							_item_v_s_icon_3 = ( _social_icon_3 != undefined ) ? _social_icon_3 : '';
							
					
						
						if ( _name != undefined ) {
							show_list_item += "<br>[uix_team_item col='"+uix_sc_team_grid_listitem_col+"' name='"+uixscform_shortcodeHTMLEcode( _item_v_name )+"' avatar='"+_item_v_avatar+"' position='"+_item_v_position+"' social_1='"+_item_v_s_icon_1+"|"+_item_v_s_url_1+"' social_2='"+_item_v_s_icon_2+"|"+_item_v_s_url_2+"' social_3='"+_item_v_s_icon_3+"|"+_item_v_s_url_3+"']";
							show_list_item += "<br>[uix_team_item_desc]"+ _item_v_desc +"[/uix_team_item_desc]";					
							show_list_item += "<br>[/uix_team_item]";
		
						}
						
				
					}
					
					/* Height of grid */
					var photobox_height = "avatarheight='"+uixscform_floatval( uix_sc_team_grid_listitem_list_height )+"px'";
					if ( uix_sc_team_grid_listitem_list_height == 0 )  photobox_height = '';	
	
	
		
		
					code = "[uix_team col='"+uix_sc_team_grid_listitem_col+"' "+photobox_height+" avatarfillet='"+uixscform_floatval( uix_sc_team_grid_listitem_avatar_fillet )+"%' gray='"+uix_sc_team_grid_listitem_avatar_gray+"']"+show_list_item+"<br>[/uix_team]";
					

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
