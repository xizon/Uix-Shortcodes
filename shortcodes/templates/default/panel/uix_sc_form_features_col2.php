<?php
if ( !class_exists( 'UixShortcodes' ) ) {
    return;
}

/**
 * Initialize sections template parameters
 * ----------------------------------------------------
 */
$form_vars = UixShortcodes::init_template_parameters( 'uix_sc_form_features_col2' );
if ( !is_array( $form_vars ) ) return;
foreach ( $form_vars as $key => $v ) :
	$$key = $v;
endforeach;


/**
 * Clone parameters
 * ----------------------------------------------------
 */
//clone list
$clone_trigger_id_1 = 'uix_sc_features_col2_one_list';   // ID of clone trigger 
$clone_trigger_id_2 = 'uix_sc_features_col2_two_list';  
$clone_max          = 15;                   // Maximum of clone form 


/**
 * Form Type
 */
$form_type = array(
    'list' => 2
);


$args_1 = 
	array(
	
		array(
			'desc'           => esc_html__( 'Note: multiple items per column', 'uix-shortcodes' ),
			'type'           => 'text'
		
		),
	 
		//------list begin
		array(
			'id'             => $clone_trigger_id_1,
			'title'          => esc_html__( 'List Item', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'list',
			'default'        => array(
									'btn_text'                  => esc_html__( 'click here to add an item', 'uix-shortcodes' ),
									'clone_class'               => array(
									
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

									 ),
									'max'                       => $clone_max
				                )
									
		),
		
		
			array(
				'id'             => 'uix_sc_features_col2_one_listitem_title',
				'title'          => '',
				'desc'           => '',
				'value'          => esc_html__( 'Feature Title', 'uix-shortcodes' ),
				'class'          => 'dynamic-row-uix_sc_features_col2_one_listitem_title', /*class of list item */
				'placeholder'    => '',
				'type'           => 'text'
			
			),
			
			array(
				'id'             => 'uix_sc_features_col2_one_listitem_desc',
				'title'          => '',
				'desc'           => '',
				'value'          => esc_html__( 'Some description text here. You can add a lot of it or can choose to leave it blank.', 'uix-shortcodes' ),
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
		
		


		
	
	)
;

$args_2 = 
	array(
	
		array(
			'desc'           => esc_html__( 'Note: multiple items per column', 'uix-shortcodes' ),
			'type'           => 'text'
		
		),
	 
		//------list begin
		array(
			'id'             => $clone_trigger_id_2,
			'title'          => esc_html__( 'List Item', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'list',
			'default'        => array(
									'btn_text'                  => esc_html__( 'click here to add an item', 'uix-shortcodes' ),
									'clone_class'               => array(
									
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
																			

									 ),
									'max'                       => $clone_max
				                )
									
		),
		
		
			array(
				'id'             => 'uix_sc_features_col2_two_listitem_title',
				'title'          => '',
				'desc'           => '',
				'value'          => esc_html__( 'Feature Title', 'uix-shortcodes' ),
				'class'          => 'dynamic-row-uix_sc_features_col2_two_listitem_title', /*class of list item */
				'placeholder'    => '',
				'type'           => 'text'
			
			),
			
			array(
				'id'             => 'uix_sc_features_col2_two_listitem_desc',
				'title'          => '',
				'desc'           => '',
				'value'          => esc_html__( 'Some description text here. You can add a lot of it or can choose to leave it blank.', 'uix-shortcodes' ),
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
																	'trigger_id'     => $clone_trigger_id_1,
																	'fields'         => array( 'uix_sc_features_col2_one_listitem_title', 'uix_sc_features_col2_one_listitem_desc', 'uix_sc_features_col2_one_listitem_icon' )
																),
																array(
																	'trigger_id'     => $clone_trigger_id_2,
																	'fields'         => array( 'uix_sc_features_col2_two_listitem_title', 'uix_sc_features_col2_two_listitem_desc', 'uix_sc_features_col2_two_listitem_icon' )
																),
															)
									),
		'form_id'                 => $form_id,
		'section_id'              => $sid,
	    'content_id'              => $cid,
		'fields'                  => array(
										array(
											 'type'    => $form_type,
											 'values'  => $args_1,
											 'title'   => esc_html__( 'Left Block', 'uix-shortcodes' )
										),
										array(
											 'type'    => $form_type,
											 'values'  => $args_2,
											 'title'   => esc_html__( 'Right Block', 'uix-shortcodes' )
										),

									),
		'title'                   => esc_html__( 'Features (2 Column)', 'uix-shortcodes' ),
	    'js_template'             => '
		
			/* List Item ( step 2)  */
			var list_num = '.floatval( $clone_max ).';


			var show_list_item_1 = \'\';
			for ( var i=0; i<=list_num; i++ ){

				var _uid = ( i == 0 ) ? \'#\' : \'#\'+i+\'-\',
					_title = $( _uid+\'uix_sc_features_col2_one_listitem_title\' ).val(),
					_icon = $( _uid+\'uix_sc_features_col2_one_listitem_icon\' ).val(),
					_desc = $( _uid+\'uix_sc_features_col2_one_listitem_desc\' ).val();





				var _item_v_title = ( _title != undefined ) ? _title : \'\',
					_item_v_icon = ( _icon != undefined ) ? _icon : \'\',
					_item_v_desc = ( _desc != undefined ) ? uixscform_shortcodeTextareaPrint( _desc ) : \'\';


				if ( _title != undefined ) {
					show_list_item_1 += "<br>[uix_features_item col=\'2\' icon=\'"+_item_v_icon+"\']";
					show_list_item_1 += "<br>[uix_features_item_title]"+ _item_v_title +"[/uix_features_item_title]";			
					show_list_item_1 += "<br>[uix_features_item_desc]"+ _item_v_desc +"[/uix_features_item_desc]";					
					show_list_item_1 += "<br>[/uix_features_item]";

				}


			}

			//-----

			var show_list_item_2 = \'\';
			for ( var i=0; i<=list_num; i++ ){

				var _uid = ( i == 0 ) ? \'#\' : \'#\'+i+\'-\',
					_title = $( _uid+\'uix_sc_features_col2_two_listitem_title\' ).val(),
					_icon = $( _uid+\'uix_sc_features_col2_two_listitem_icon\' ).val(),
					_desc = $( _uid+\'uix_sc_features_col2_two_listitem_desc\' ).val();





				var _item_v_title = ( _title != undefined ) ? _title : \'\',
					_item_v_icon = ( _icon != undefined ) ? _icon : \'\',
					_item_v_desc = ( _desc != undefined ) ? uixscform_shortcodeTextareaPrint( _desc ) : \'\';


				if ( _title != undefined ) {
					show_list_item_2 += "<br>[uix_features_item col=\'2\' icon=\'"+_item_v_icon+"\']";
					show_list_item_2 += "<br>[uix_features_item_title]"+ _item_v_title +"[/uix_features_item_title]";			
					show_list_item_2 += "<br>[uix_features_item_desc]"+ _item_v_desc +"[/uix_features_item_desc]";					
					show_list_item_2 += "<br>[/uix_features_item]";

				}



			}

			//-----
			show_list_item_1 = "<br>[uix_features_col_left]"+show_list_item_1+"<br>[/uix_features_col_left]";
			show_list_item_2 = "<br>[uix_features_col_right]"+show_list_item_2+"<br>[/uix_features_col_right]<br>";


			code = "[uix_features col=\'2\']"+show_list_item_1+show_list_item_2+"[/uix_features]";

		
		'
    )
);