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
$clone_trigger_id = 'uix_sc_portfolio_grid_list';   // ID of clone trigger 
$clone_max        = 100;                        // Maximum of clone form 


/**
 * Form Type
 */
$form_type = array(
    'list' => false
);


$args = 
	array(
	
	
		array(
			'id'             => 'uix_sc_portfolio_grid_listitem_col',
			'title'          => esc_html__( 'Column', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 3,
			'placeholder'    => '',
			'type'           => 'radio',
			'default'        => array(
									'4'  => '4',
									'3'  => '3',
									'2'  => '2',
								)
		
		),
		
		array(
			'id'             => 'uix_sc_portfolio_grid_filterable',
			'title'          => esc_html__( 'Filterable by Category', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'checkbox',
			'default'        => array(
									'checked'  => false
								)
		
		
		),	
		

		array(
			'id'             => 'uix_sc_portfolio_grid_target',
			'title'          => esc_html__( 'Open link in new tab', 'uix-shortcodes' ),
			'desc'           => esc_html__( 'This option is valid when you use destination URL.', 'uix-shortcodes' ),
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'checkbox',
			'default'        => array(
									'checked'  => false
								)
		
		
		),	
	
		
		array(
			'id'             => 'uix_sc_portfolio_grid_listitem_image_fillet',
			'title'          => esc_html__( 'Radius of Fillet Image', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '0',
			'placeholder'    => '',
			'type'           => 'short-text',
			'default'        => array(
									'units'  => '%'
								)
		
		),	
	
		array(
			'id'             => 'uix_sc_portfolio_grid_listitem_class_prefix',
			'title'          => esc_html__( 'Class Prefix', 'uix-shortcodes' ),
			'desc'           => wp_kses( __( 'Prefix string attached to the classes of all elements generated by the portfolio, the default value is &quot;<strong>uix-sc-portfolio-</strong>&quot;.', 'uix-shortcodes' ), wp_kses_allowed_html( 'post' ) ),
			'value'          => 'uix-sc-portfolio-',
			'placeholder'    => '',
			'type'           => 'text'
		
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
									'btn_text'                  => esc_html__( 'click here to add a item', 'uix-shortcodes' ),
									'clone_class'               => array(
									
										array(
											'id'        => 'dynamic-row-uix_sc_portfolio_grid_listitem_image',
											'type'      => 'image'
										), 
										
										array(
											'id'        => 'dynamic-row-uix_sc_portfolio_grid_listitem_full_image',
											'type'      => 'image'
										), 		
									
										array(
											'id'        => 'dynamic-row-uix_sc_portfolio_grid_listitem_title',
											'type'      => 'text'
										), 		
										
										array(
											'id'        => 'dynamic-row-uix_sc_portfolio_grid_listitem_type',
											'type'      => 'text'
										), 								
										
										array(
											'id'        => 'dynamic-row-uix_sc_portfolio_grid_listitem_desc',
											'type'      => 'textarea'
										), 
										
										array(
											'id'              => 'dynamic-row-uix_sc_portfolio_grid_listitem_toggle',
											'type'            => 'toggle',
											'toggle_class'    => array( 'dynamic-row-uix_sc_portfolio_grid_listitem_toggle_url' )
										), 	
															
							

									 ),
									'max'                       => $clone_max
				                )
									
		),
		
		
			array(
				'id'             => 'uix_sc_portfolio_grid_listitem_image',
				'title'          => '',
				'desc'           => '',
				'value'          => '',
				'class'          => 'dynamic-row-uix_sc_portfolio_grid_listitem_image', /*class of list item */
				'placeholder'    => esc_html__( 'Thumbnail', 'uix-shortcodes' ),
				'type'           => 'image',
				'default'        => array(
										'remove_btn_text'  => esc_html__( 'Remove image', 'uix-shortcodes' ),
										'upload_btn_text'  => esc_html__( 'Upload', 'uix-shortcodes' ),
									)
			
			),	
			
			array(
				'id'             => 'uix_sc_portfolio_grid_listitem_full_image',
				'title'          => '',
				'desc'           => '',
				'value'          => '',
				'class'          => 'dynamic-row-uix_sc_portfolio_grid_listitem_full_image', /*class of list item */
				'placeholder'    => esc_html__( 'Full Preview (Optional)', 'uix-shortcodes' ),
				'type'           => 'image',
				'default'        => array(
										'remove_btn_text'  => esc_html__( 'Remove image', 'uix-shortcodes' ),
										'upload_btn_text'  => esc_html__( 'Upload', 'uix-shortcodes' ),
									)
			
			),		
			
			
			array(
				'id'             => 'uix_sc_portfolio_grid_listitem_title',
				'title'          => '',
				'desc'           => '',
				'value'          => esc_html__( 'Project Title', 'uix-shortcodes' ),
				'class'          => 'dynamic-row-uix_sc_portfolio_grid_listitem_title', /*class of list item */
				'placeholder'    => '',
				'type'           => 'text'
			
			),
			
			array(
				'id'             => 'uix_sc_portfolio_grid_listitem_type',
				'title'          => '',
				'desc'           => '',
				'value'          => esc_html__( 'Category', 'uix-shortcodes' ),
				'class'          => 'dynamic-row-uix_sc_portfolio_grid_listitem_type', /*class of list item */
				'placeholder'    => '',
				'type'           => 'text'
			
			),	
			
			
	
			
			array(
				'id'             => 'uix_sc_portfolio_grid_listitem_desc',
				'title'          => '',
				'desc'           => '',
				'value'          => esc_html__( 'The description of this project.', 'uix-shortcodes' ),
				'class'          => 'dynamic-row-uix_sc_portfolio_grid_listitem_desc', /*class of list item */
				'placeholder'    => '',
				'type'           => 'textarea',
				'default'        => array(
										'row'     => 5,
										'format'  => true
									)
			
			),
			
			
			
			
	
			//------toggle begin
			array(
				'id'             => 'uix_sc_portfolio_grid_listitem_toggle',
				'title'          => '',
				'desc'           => '',
				'value'          => '',
				'class'          => 'dynamic-row-uix_sc_portfolio_grid_listitem_toggle', /*class of list item */
				'placeholder'    => '',
				'type'           => 'toggle',
				'default'        => array(
										'btn_text'      => esc_html__( 'set up destination URL with this project', 'uix-shortcodes' ),
										'toggle_class'  => array( 'dynamic-row-uix_sc_portfolio_grid_listitem_toggle_url' )
									)
			
			),	
			
				array(
					'id'             => 'uix_sc_portfolio_grid_listitem_toggle_url',
					'title'          => '',
					'desc'           => '',
					'value'          => '',
					'class'          => 'toggle-row dynamic-row-uix_sc_portfolio_grid_listitem_toggle_url', /*class of toggle item */
					'placeholder'    => esc_html__( 'Destination URL', 'uix-shortcodes' ),
					'type'           => 'text'
				
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
																	'fields'         => array( 'uix_sc_portfolio_grid_listitem_image', 'uix_sc_portfolio_grid_listitem_full_image', 'uix_sc_portfolio_grid_listitem_title', 'uix_sc_portfolio_grid_listitem_type', 'uix_sc_portfolio_grid_listitem_desc', 'uix_sc_portfolio_grid_listitem_toggle', 'uix_sc_portfolio_grid_listitem_toggle_url' )
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
		'title'                   => esc_html__( 'Portfolio', 'uix-shortcodes' ),
	    'js_template'             => '
		
			/* List Item ( step 2)  */
			var list_num = '.floatval( $clone_max ).';


			var show_list_item = \'\';
			for ( var i=0; i<=list_num; i++ ){

				var _uid = ( i == 0 ) ? \'#\' : \'#\'+i+\'-\',
					_image = $( _uid+\'uix_sc_portfolio_grid_listitem_image\' ).val(),
					_imagefull = $( _uid+\'uix_sc_portfolio_grid_listitem_full_image\' ).val(),
					_title = $( _uid+\'uix_sc_portfolio_grid_listitem_title\' ).val(),
					_type = $( _uid+\'uix_sc_portfolio_grid_listitem_type\' ).val(),
					_desc = $( _uid+\'uix_sc_portfolio_grid_listitem_desc\' ).val(),
					_item_url = ( $( _uid+\'uix_sc_portfolio_grid_listitem_toggle_url\' ).val() != \'\' ) ? encodeURI( $( _uid+\'uix_sc_portfolio_grid_listitem_toggle_url\' ).val() ) : \'\';	


				var _item_v_image = ( _image != undefined ) ? encodeURI( _image ) : \'\',
					_item_v_imagefull = ( _imagefull != undefined ) ? encodeURI( _imagefull ) : \'\',
					_item_v_title = ( _title != undefined ) ? uixscform_shortcodeHTMLEcode( _title ) : \'\',
					_item_v_type = ( _type != undefined ) ? uixscform_shortcodeHTMLEcode( _type ) : \'\',
					_item_v_desc = ( _desc != undefined ) ? uixscform_shortcodeTextareaPrint( _desc ) : \'\',
					_item_v_target = ( uix_sc_portfolio_grid_target === true ) ? 1 : 0,
					_item_v_filterable = ( uix_sc_portfolio_grid_filterable === true ) ? 1 : 0;



				if ( _title != undefined ) {
					show_list_item += "<br>[uix_portfolio_item type=\'"+_item_v_type+"\' title=\'"+_item_v_title+"\' image=\'"+_item_v_image+"\' fullimage=\'"+_item_v_imagefull+"\' target=\'"+_item_v_target+"\' url=\'"+_item_url+"\']";
					show_list_item += "<br>[uix_portfolio_item_desc]"+ _item_v_desc +"[/uix_portfolio_item_desc]";					
					show_list_item += "<br>[/uix_portfolio_item]";

				}


			}


			code = "[uix_portfolio filterable=\'"+_item_v_filterable+"\' classprefix=\'"+uixscform_shortcodeHTMLEcode( uix_sc_portfolio_grid_listitem_class_prefix )+"\' col=\'"+uix_sc_portfolio_grid_listitem_col+"\' imagefillet=\'"+uixscform_floatval( uix_sc_portfolio_grid_listitem_image_fillet )+"%\']"+show_list_item+"<br>[/uix_portfolio]";
		
		'
    )
);