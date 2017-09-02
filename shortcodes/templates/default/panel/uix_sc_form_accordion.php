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
$clone_trigger_id = 'uix_sc_accordion_list';   // ID of clone trigger 
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
			'id'             => 'uix_sc_accordion_effect',
			'title'          => esc_html__( 'Transition Effect', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 1,
			'placeholder'    => '',
			'type'           => 'radio',
			'default'        => array(
									'1'  => 'slide',
									'3'  => 'none',
								)
		
		),
	
	
		array(
			'id'             => 'uix_sc_accordion_open_first',
			'title'          => esc_html__( 'Open The First One Automatically', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'checkbox',
			'default'        => array(
									'checked'  => true
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
											'id'        => 'dynamic-row-uix_sc_accordion_listitem_title',
											'type'      => 'text'
										), 
										array(
											'id'        => 'dynamic-row-uix_sc_accordion_listitem_con',
											'type'      => 'textarea'
										), 
	

									 ),
									'max'                       => $clone_max
				                )
									
		),
	
			array(
				'id'             => 'uix_sc_accordion_listitem_title',
				'title'          => '',
				'desc'           => '',
				'value'          => esc_html__( 'Accordion Title', 'uix-shortcodes' ),
				'class'          => 'dynamic-row-uix_sc_accordion_listitem_title', /*class of list item */
				'placeholder'    => '',
				'type'           => 'text'
			
			),
			
			array(
				'id'             => 'uix_sc_accordion_listitem_con',
				'title'          => '',
				'desc'           => '',
				'value'          => esc_html__( 'Accordion content here.', 'uix-shortcodes' ),
				'class'          => 'dynamic-row-uix_sc_accordion_listitem_con', /*class of list item */
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
																	'fields'         => array( 'uix_sc_accordion_listitem_title', 'uix_sc_accordion_listitem_con' )
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
		'title'                   => esc_html__( 'Accordion', 'uix-shortcodes' ),
	    'js_template'             => '
		
			/* List Item ( step 2)  */
			var list_num = '.floatval( $clone_max ).';


			var show_list_item = \'\';
			for ( var i=0; i<=list_num; i++ ){

				var _uid = ( i == 0 ) ? \'#\' : \'#\'+i+\'-\',
					_txt = $( _uid+\'uix_sc_accordion_listitem_title\' ).val(),
					_con = $( _uid+\'uix_sc_accordion_listitem_con\' ).val();

				var _item_v_title = ( _txt != undefined ) ? _txt : \'\',
					_item_v_con = ( _con != undefined ) ? uixscform_shortcodeTextareaPrint( _con ) : \'\',
					_item_v_first_open = \'\';

				if ( i == 0 ) {
					if ( uix_sc_accordion_open_first === true ) _item_v_first_open = " open=\'"+uix_sc_accordion_open_first+"\'";
				}


				if ( _txt != undefined ) {
					show_list_item += "<br>[uix_toggle_item"+_item_v_first_open+"]";
					show_list_item += "<br>[uix_toggle_item_title]"+ _item_v_title +"[/uix_toggle_item_title]";	
					show_list_item += "<br>[uix_toggle_item_content"+_item_v_first_open+"]"+ _item_v_con +"[/uix_toggle_item_content]";					
					show_list_item += "<br>[/uix_toggle_item]";

				}


			}


			code = "[uix_toggle tabs=\'0\' effect=\'"+uix_sc_accordion_effect+"\']"+show_list_item+"<br>[/uix_toggle]";
		
		'
    )
);
