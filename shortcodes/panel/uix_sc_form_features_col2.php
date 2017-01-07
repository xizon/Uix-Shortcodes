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
$form_id = 'uix_sc_form_features_col2';

$clone_max = 15; // Maximum of clone form 

/**
 * Form Type
 */
$form_type = [
    'list' => 2
];


$args_1 = 
	[
	
		array(
			'desc'           => __( 'Note: multiple items per column', 'uix-shortcodes' ),
			'type'           => 'text'
		
		),
	 
		//------list begin
		array(
			'id'             => 'uix_sc_features_col2_one_list',
			'title'          => __( 'List Item', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'list',
			'default'        => array(
									'btn_text'                  => __( 'click here to add an item', 'uix-shortcodes' ),
									'clone_class'               => [ 
									
										array(
											'id'        => 'dynamic-row-uix_sc_features_col2_one_listitem_title',
											'type'      => 'text'
										),
									
										array(
											'id'        => 'dynamic-row-uix_sc_features_col2_one_listitem_desc',
											'type'      => 'textarea'
										),
										
										array(
											'id'        => 'dynamic-row-uix_sc_features_col2_one_listitem_icon',
											'type'      => 'icon'
										), 								

									 ],
									'max'                       => $clone_max
				                )
									
		),
		
		
			array(
				'id'             => 'uix_sc_features_col2_one_listitem_title',
				'title'          => '',
				'desc'           => '',
				'value'          => __( 'Feature Title', 'uix-shortcodes' ),
				'class'          => 'dynamic-row-uix_sc_features_col2_one_listitem_title', /*class of list item */
				'placeholder'    => '',
				'type'           => 'text'
			
			),
			
			array(
				'id'             => 'uix_sc_features_col2_one_listitem_desc',
				'title'          => '',
				'desc'           => '',
				'value'          => __( 'Some description text here. You can add a lot of it or can choose to leave it blank.', 'uix-shortcodes' ),
				'class'          => 'dynamic-row-uix_sc_features_col2_one_listitem_desc', /*class of list item */
				'placeholder'    => '',
				'type'           => 'textarea',
				'default'        => array(
										'row'     => 5,
										'format'  => true
									)
			
			),
		
			array(
				'id'             => 'uix_sc_features_col2_one_listitem_icon',
				'title'          => '',
				'desc'           => '',
				'value'          => '',
				'class'          => 'dynamic-row-uix_sc_features_col2_one_listitem_icon', /*class of list item */
				'placeholder'    => '',
				'type'           => 'icon',
				'default'        => array(
										'social'  => false
									)
			
			),
			
		
		//------list end
		
		


		
	
	]
;

$args_2 = 
	[
	
		array(
			'desc'           => __( 'Note: multiple items per column', 'uix-shortcodes' ),
			'type'           => 'text'
		
		),
	 
		//------list begin
		array(
			'id'             => 'uix_sc_features_col2_two_list',
			'title'          => __( 'List Item', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'list',
			'default'        => array(
									'btn_text'                  => __( 'click here to add an item', 'uix-shortcodes' ),
									'clone_class'               => [ 
									
										array(
											'id'        => 'dynamic-row-uix_sc_features_col2_two_listitem_title',
											'type'      => 'text'
										), 
										array(
											'id'        => 'dynamic-row-uix_sc_features_col2_two_listitem_desc',
											'type'      => 'textarea'
										),
										
										array(
											'id'        => 'dynamic-row-uix_sc_features_col2_two_listitem_icon',
											'type'      => 'icon'
										), 									
																			

									 ],
									'max'                       => $clone_max
				                )
									
		),
		
		
			array(
				'id'             => 'uix_sc_features_col2_two_listitem_title',
				'title'          => '',
				'desc'           => '',
				'value'          => __( 'Feature Title', 'uix-shortcodes' ),
				'class'          => 'dynamic-row-uix_sc_features_col2_two_listitem_title', /*class of list item */
				'placeholder'    => '',
				'type'           => 'text'
			
			),
			
			array(
				'id'             => 'uix_sc_features_col2_two_listitem_desc',
				'title'          => '',
				'desc'           => '',
				'value'          => __( 'Some description text here. You can add a lot of it or can choose to leave it blank.', 'uix-shortcodes' ),
				'class'          => 'dynamic-row-uix_sc_features_col2_two_listitem_desc', /*class of list item */
				'placeholder'    => '',
				'type'           => 'textarea',
				'default'        => array(
										'row'     => 5,
										'format'  => true
									)
			
			),
		
			array(
				'id'             => 'uix_sc_features_col2_two_listitem_icon',
				'title'          => '',
				'desc'           => '',
				'value'          => '',
				'class'          => 'dynamic-row-uix_sc_features_col2_two_listitem_icon', /*class of list item */
				'placeholder'    => '',
				'type'           => 'icon',
				'default'        => array(
										'social'  => false
									)
			
			),
			
		
		//------list end
		
		


		
	
	]
;

//---

$form_html = UixSCFormCore::form_before( $cid, $sid, $form_id );

$form_html .= UixSCFormCore::add_form( $cid, $sid, $form_id, $form_type, $args_1, 'html', __( 'Left Block', 'uix-shortcodes' ) );
$form_html .= UixSCFormCore::add_form( $cid, $sid, $form_id, $form_type, $args_2, 'html', __( 'Right Block', 'uix-shortcodes' ) );

$form_html .= UixSCFormCore::form_after();

//----

$form_js = '';
$form_js .= UixSCFormCore::add_form( $cid, $sid, $form_id, $form_type, $args_1, 'js' );
$form_js .= UixSCFormCore::add_form( $cid, $sid, $form_id, $form_type, $args_2, 'js' );

//----

$form_js_vars = '';
$form_js_vars .= UixSCFormCore::add_form( $cid, $sid, $form_id, $form_type, $args_1, 'js_vars' );
$form_js_vars .= UixSCFormCore::add_form( $cid, $sid, $form_id, $form_type, $args_2, 'js_vars' );



/**
 * Returns actions of javascript
 */

if ( $sid == -1 && is_admin() ) {
	$currentScreen = get_current_screen();
	if( $currentScreen->base === "post" || $currentScreen->base === "widgets" || $currentScreen->base === "customize" || UixSCFormCore::inc_str( $currentScreen->base, '_page_' ) ) {
	  
		/* List Item - Register clone vars ( step 1) */
		UixSCFormCore::reg_clone_vars( 'uix_sc_features_col2_one_list', 
									  UixSCFormCore::dynamic_form_code( 'dynamic-row-uix_sc_features_col2_one_listitem_title', $form_html )
									  .UixSCFormCore::dynamic_form_code( 'dynamic-row-uix_sc_features_col2_one_listitem_desc', $form_html )
									  .UixSCFormCore::dynamic_form_code( 'dynamic-row-uix_sc_features_col2_one_listitem_icon', $form_html ) 
									 );  
		
		UixSCFormCore::reg_clone_vars( 'uix_sc_features_col2_two_list', 
									  UixSCFormCore::dynamic_form_code( 'dynamic-row-uix_sc_features_col2_two_listitem_title', $form_html )
									  .UixSCFormCore::dynamic_form_code( 'dynamic-row-uix_sc_features_col2_two_listitem_desc', $form_html )
									  .UixSCFormCore::dynamic_form_code( 'dynamic-row-uix_sc_features_col2_two_listitem_icon', $form_html )
									 );
	  
		
		?>
		<script type="text/javascript">
		( function($) {
		'use strict';
			$( function() { 
				<?php echo UixSCFormCore::uixscform_callback( $form_js, $form_id, __( 'Insert Features (2 Column)', 'uix-shortcodes' ) ); ?>					
				<?php echo UixSCFormCore::send_before( $form_js_vars, $form_id ); ?> 
				/*--**************** Custom shortcode begin ****************-- */
					/* List Item ( step 2)  */
					var list_num = <?php echo $clone_max; ?>;
					
			
					var show_list_item_1 = '';
					for ( var i=0; i<=list_num; i++ ){
						
						var _uid = ( i == 0 ) ? '#' : '#'+i+'-',
							_title = $( _uid+'uix_sc_features_col2_one_listitem_title' ).val(),
							_icon = $( _uid+'uix_sc_features_col2_one_listitem_icon' ).val(),
							_desc = $( _uid+'uix_sc_features_col2_one_listitem_desc' ).val();
							
							
							
							
							
						var _item_v_title = ( _title != undefined ) ? _title : '',
							_item_v_icon = ( _icon != undefined ) ? _icon : '',
							_item_v_desc = ( _desc != undefined ) ? uixscform_shortcodeTextareaPrint( _desc ) : '';
							
						
						if ( _title != undefined ) {
							show_list_item_1 += "<br>[uix_features_item col='2' icon='"+_item_v_icon+"']";
							show_list_item_1 += "<br>[uix_features_item_title]"+ _item_v_title +"[/uix_features_item_title]";			
							show_list_item_1 += "<br>[uix_features_item_desc]"+ _item_v_desc +"[/uix_features_item_desc]";					
							show_list_item_1 += "<br>[/uix_features_item]";
		
						}
							
						
					}
					
					//-----
					
					var show_list_item_2 = '';
					for ( var i=0; i<=list_num; i++ ){
						
						var _uid = ( i == 0 ) ? '#' : '#'+i+'-',
							_title = $( _uid+'uix_sc_features_col2_two_listitem_title' ).val(),
							_icon = $( _uid+'uix_sc_features_col2_two_listitem_icon' ).val(),
							_desc = $( _uid+'uix_sc_features_col2_two_listitem_desc' ).val();
							
							
							
							
							
						var _item_v_title = ( _title != undefined ) ? _title : '',
							_item_v_icon = ( _icon != undefined ) ? _icon : '',
							_item_v_desc = ( _desc != undefined ) ? uixscform_shortcodeTextareaPrint( _desc ) : '';
							
						
						if ( _title != undefined ) {
							show_list_item_2 += "<br>[uix_features_item col='2' icon='"+_item_v_icon+"']";
							show_list_item_2 += "<br>[uix_features_item_title]"+ _item_v_title +"[/uix_features_item_title]";			
							show_list_item_2 += "<br>[uix_features_item_desc]"+ _item_v_desc +"[/uix_features_item_desc]";					
							show_list_item_2 += "<br>[/uix_features_item]";
		
						}
						
							
						
					}
					
					//-----
					show_list_item_1 = "<br>[uix_features_col_left]"+show_list_item_1+"<br>[/uix_features_col_left]";
					show_list_item_2 = "<br>[uix_features_col_right]"+show_list_item_2+"<br>[/uix_features_col_right]<br>";
					
				
					code = "[uix_features col='2']"+show_list_item_1+show_list_item_2+"[/uix_features]";

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
