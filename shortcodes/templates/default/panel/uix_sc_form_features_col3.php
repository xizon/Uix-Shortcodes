<?php
if ( !class_exists( 'UixShortcodes' ) ) {
    return;
}

/**
 * Initialize sections template parameters
 * ----------------------------------------------------
 */
$form_vars = UixShortcodes::init_template_parameters( basename( __FILE__, '.php' ) );
if ( !is_array( $form_vars ) ) return;
foreach ( $form_vars as $key => $v ) :
	$$key = $v;
endforeach;


/**
 * Clone parameters
 * ----------------------------------------------------
 */
//clone list
$clone_trigger_id = 'uix_sc_features_col3_list';   // ID of clone trigger 
$clone_max        = 30;                        // Maximum of clone form 



/**
 * Form Type
 */
$form_type = array(
    'list' => false
);


$args = 
	array(
	
	 
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
											'id'        => 'dynamic-row-uix_sc_features_col3_listitem_title',
											'type'      => 'text'
										), 
									
										array(
											'id'        => 'dynamic-row-uix_sc_features_col3_listitem_desc',
											'type'      => 'textarea'
										),
										
										array(
											'id'        => 'dynamic-row-uix_sc_features_col3_listitem_icon',
											'type'      => 'icon'
										),								
																			

									 ),
									'max'                       => $clone_max
				                )
									
		),
		
		
			array(
				'id'             => 'uix_sc_features_col3_listitem_title',
				'title'          => '',
				'desc'           => '',
				'value'          => esc_html__( 'Feature Title', 'uix-shortcodes' ),
				'class'          => 'dynamic-row-uix_sc_features_col3_listitem_title', /*class of list item */
				'placeholder'    => '',
				'type'           => 'text'
			
			),
			
			
			array(
				'id'             => 'uix_sc_features_col3_listitem_desc',
				'title'          => '',
				'desc'           => '',
				'value'          => esc_html__( 'Some description text here. You can add a lot of it or can choose to leave it blank.', 'uix-shortcodes' ),
				'class'          => 'dynamic-row-uix_sc_features_col3_listitem_desc', /*class of list item */
				'placeholder'    => '',
				'type'           => 'textarea',
				'default'        => array(
										'row'     => 5,
										'format'  => true
									)
			
			),
		
			array(
				'id'             => 'uix_sc_features_col3_listitem_icon',
				'title'          => '',
				'desc'           => '',
				'value'          => '',
				'class'          => 'dynamic-row-uix_sc_features_col3_listitem_icon', /*class of list item */
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
																	'trigger_id'     => $clone_trigger_id,
																	'fields'         => array( 'uix_sc_features_col3_listitem_title', 'uix_sc_features_col3_listitem_desc', 'uix_sc_features_col3_listitem_icon' )
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
		'title'                   => esc_html__( 'Features (3 Column)', 'uix-shortcodes' ),
	    'js_template'             => '
		
			/* List Item ( step 2)  */
			var list_num = '.floatval( $clone_max ).';


			var show_list_item = \'\';
			for ( var i=0; i<=list_num; i++ ){

				var _uid = ( i == 0 ) ? \'#\' : \'#\'+i+\'-\',
					_title = $( _uid+\'uix_sc_features_col3_listitem_title\' ).val(),
					_icon = $( _uid+\'uix_sc_features_col3_listitem_icon\' ).val(),
					_desc = $( _uid+\'uix_sc_features_col3_listitem_desc\' ).val();





				var _item_v_title = ( _title != undefined ) ? _title : \'\',
					_item_v_icon = ( _icon != undefined ) ? _icon : \'\',
					_item_v_desc = ( _desc != undefined ) ? uixscform_shortcodeTextareaPrint( _desc ) : \'\';



				//last column
				var lastcol = ( i >=3 && i % 3 == 0 ) ? " last=\'1\'" : \'\';


				if ( _title != undefined ) {
					show_list_item += "<br>[uix_features_item col=\'3\' icon=\'"+_item_v_icon+"\' "+lastcol+"]";
					show_list_item += "<br>[uix_features_item_title]"+ _item_v_title +"[/uix_features_item_title]";			
					show_list_item += "<br>[uix_features_item_desc]"+ _item_v_desc +"[/uix_features_item_desc]";					
					show_list_item += "<br>[/uix_features_item]";

				}


			}


			code = "[uix_features col=\'3\']"+show_list_item+"<br>[/uix_features]";
		
		'
    )
);