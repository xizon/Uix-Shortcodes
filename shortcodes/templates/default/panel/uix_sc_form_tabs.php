<?php
if ( !class_exists( 'UixShortcodes' ) ) {
    return;
}

/**
 * Initialize sections template parameters
 * ----------------------------------------------------
 */
$form_vars = UixShortcodes::init_template_parameters( 'uix_sc_form_tabs' );
if ( !is_array( $form_vars ) ) return;
foreach ( $form_vars as $key => $v ) :
	$$key = $v;
endforeach;


/**
 * Clone parameters
 * ----------------------------------------------------
 */
//clone list
$clone_trigger_id = 'uix_sc_tabs_list';   // ID of clone trigger 
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
			'id'             => 'uix_sc_tabs_style',
			'title'          => esc_html__( 'Choose Style', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 'horizontal',
			'placeholder'    => '',
			'type'           => 'radio',
			'default'        => array(
									'vertical'  => 'vertical',
									'horizontal'  => 'horizontal',
								)
		
		),	
		
		array(
			'id'             => 'uix_sc_tabs_effect',
			'title'          => esc_html__( 'Transition Effect', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 1,
			'placeholder'    => '',
			'type'           => 'radio',
			'default'        => array(
									'1'  => 'slide',
									'2'  => 'fade',
									'3'  => 'none',
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
											'id'        => 'dynamic-row-uix_sc_listitem_imgURL',
											'type'      => 'text'
										), 
										array(
											'id'        => 'dynamic-row-uix_sc_tabs_listitem_con',
											'type'      => 'textarea'
										), 
	

									 ),
									'max'                       => $clone_max
				                )
									
		),
	
			array(
				'id'             => 'uix_sc_tabs_listitem_title',
				'title'          => '',
				'desc'           => '',
				'value'          => esc_html__( 'Tab Title', 'uix-shortcodes' ),
				'class'          => 'dynamic-row-uix_sc_tabs_listitem_title', /*class of list item */
				'placeholder'    => '',
				'type'           => 'text'
			
			),
			
			array(
				'id'             => 'uix_sc_tabs_listitem_con',
				'title'          => '',
				'desc'           => '',
				'value'          => esc_html__( 'This is content of the tab.', 'uix-shortcodes' ),
				'class'          => 'dynamic-row-uix_sc_tabs_listitem_con', /*class of list item */
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
																	'fields'         => array( 'uix_sc_tabs_listitem_title', 'uix_sc_tabs_listitem_con' )
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
		'title'                   => esc_html__( 'Tabs', 'uix-shortcodes' ),
	    'js_template'             => '
		
			/* List Item ( step 2)  */
			var list_num = '.floatval( $clone_max ).';


			var show_list_item = \'\',
				show_list_tabs = \'\';

			show_list_tabs += "<br>[uix_toggle_item tabs=\'1\']";
			show_list_item += "<br>[uix_toggle_group]";
			for ( var i=0; i<=list_num; i++ ){

				var _uid = ( i == 0 ) ? \'#\' : \'#\'+i+\'-\',
					_txt = $( _uid+\'uix_sc_tabs_listitem_title\' ).val(),
					_con = $( _uid+\'uix_sc_tabs_listitem_con\' ).val();

				var _item_v_title = ( _txt != undefined ) ? _txt : \'\',
					_item_v_con = ( _con != undefined ) ? uixscform_shortcodeTextareaPrint( _con ) : \'\';



				if ( _txt != undefined ) {

					show_list_tabs += "<br>[uix_toggle_item_title]"+ _item_v_title +"[/uix_toggle_item_title]";				
					show_list_item += "<br>[uix_toggle_item_content]"+ _item_v_con +"[/uix_toggle_item_content]";					


				}



			}
			show_list_tabs += "<br>[/uix_toggle_item]";	
			show_list_item += "<br>[/uix_toggle_group]";	


			code = "[uix_toggle style=\'"+uix_sc_tabs_style+"\' tabs=\'1\' effect=\'"+uix_sc_tabs_effect+"\']"+show_list_tabs+show_list_item+"<br>[/uix_toggle]";	
		
		'
    )
);