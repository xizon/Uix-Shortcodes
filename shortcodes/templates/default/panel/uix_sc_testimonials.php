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
$clone_trigger_id = 'uix_sc_testimonials_list';   // ID of clone trigger 
$clone_max        = 15;                        // Maximum of clone form  

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
											'id'        => 'dynamic-row-uix_sc_testimonials_listitem_avatar',
											'type'      => 'image'
										), 
										
										array(
											'id'        => 'dynamic-row-uix_sc_testimonials_listitem_name',
											'type'      => 'text'
										), 										
										
										array(
											'id'        => 'dynamic-row-uix_sc_testimonials_listitem_position',
											'type'      => 'text'
										), 
									
										array(
											'id'        => 'dynamic-row-uix_sc_testimonials_listitem_intro',
											'type'      => 'textarea'
										), 
										

									 ),
									'max'                       => $clone_max
				                )
									
		),
		
		
			array(
				'id'             => 'uix_sc_testimonials_listitem_avatar',
				'title'          => '',
				'desc'           => '',
				'value'          => '',
				'class'          => 'dynamic-row-uix_sc_testimonials_listitem_avatar', /*class of list item */
				'placeholder'    => esc_html__( 'Avatar URL', 'uix-shortcodes' ),
				'type'           => 'image',
				'default'        => array(
										'remove_btn_text'  => esc_html__( 'Remove image', 'uix-shortcodes' ),
										'upload_btn_text'  => esc_html__( 'Upload', 'uix-shortcodes' ),
									)
			
			),	
			array(
				'id'             => 'uix_sc_testimonials_listitem_name',
				'title'          => '',
				'desc'           => '',
				'value'          => esc_html__( 'Name', 'uix-shortcodes' ),
				'class'          => 'dynamic-row-uix_sc_testimonials_listitem_name', /*class of list item */
				'placeholder'    => '',
				'type'           => 'text'
			
			),			
			
			array(
				'id'             => 'uix_sc_testimonials_listitem_position',
				'title'          => '',
				'desc'           => '',
				'value'          => esc_html__( 'Position', 'uix-shortcodes' ),
				'class'          => 'dynamic-row-uix_sc_testimonials_listitem_position', /*class of list item */
				'placeholder'    => '',
				'type'           => 'text'
			
			),			
			array(
				'id'             => 'uix_sc_testimonials_listitem_intro',
				'title'          => '',
				'desc'           => '',
				'value'          => esc_html__( 'Enter some details for the customer giving this testimonial., E.g., Thank you from the bottom of our hearts.', 'uix-shortcodes' ),
				'class'          => 'dynamic-row-uix_sc_testimonials_listitem_intro', /*class of list item */
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
																	'fields'         => array( 'uix_sc_testimonials_listitem_avatar', 'uix_sc_testimonials_listitem_name', 'uix_sc_testimonials_listitem_position', 'uix_sc_testimonials_listitem_intro' )
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
		'title'                   => esc_html__( 'Testimonials Carousel', 'uix-shortcodes' ),
	    'js_template'             => '
			/* List Item ( step 2)  */
			var list_num = '.floatval( $clone_max ).';


			var show_list_item = \'\';
			for ( var i=0; i<=list_num; i++ ){

				var _uid = ( i == 0 ) ? \'#\' : \'#\'+i+\'-\',
					_avatar = $( _uid+\'uix_sc_testimonials_listitem_avatar\' ).val(),
					_name = $( _uid+\'uix_sc_testimonials_listitem_name\' ).val(),
					_position = $( _uid+\'uix_sc_testimonials_listitem_position\' ).val(),
					_desc = $( _uid+\'uix_sc_testimonials_listitem_intro\' ).val();




				var _item_v_avatar = ( _avatar != undefined ) ? encodeURI( _avatar ) : \'\',
					_item_v_name = ( _name != undefined ) ? uixscform_shortcodeHTMLEcode( _name ) : \'\',
					_item_v_position = ( _position != undefined ) ? uixscform_shortcodeHTMLEcode( _position ) : \'\',
					_item_v_desc = ( _desc != undefined ) ? uixscform_shortcodeTextareaPrint( _desc ) : \'\';


				if ( _name != undefined ) {
					show_list_item += "<br>[uix_testimonials_item name=\'"+_item_v_name+"\' avatar=\'"+_item_v_avatar+"\' position=\'"+_item_v_position+"\']";
					show_list_item += "<br>[uix_testimonials_item_desc]"+ _item_v_desc +"[/uix_testimonials_item_desc]";					
					show_list_item += "<br>[/uix_testimonials_item]";

				}


			}


			code = "[uix_testimonials]"+show_list_item+"<br>[/uix_testimonials]";
		
		'
    )
);
