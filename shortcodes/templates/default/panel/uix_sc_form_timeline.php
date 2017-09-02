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
$clone_trigger_id = 'uix_sc_timeline_list';   // ID of clone trigger 
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
			'id'             => 'uix_sc_timeline_list_color',
			'title'          => esc_html__( 'Highlight Color', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '#a2bf2f',
			'placeholder'    => '',
			'type'           => 'color',
			'default'        => array( '#a2bf2f', '#d59a3e', '#DD514C', '#FA9ADF', '#4BB1CF',  '#0E90D2', '#5F9EA0', '#473f3f',  '#bebebe' )
		
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
											'id'        => 'dynamic-row-uix_sc_timeline_listitem_highlight',
											'type'      => 'checkbox'
										), 
		
										array(
											'id'        => 'dynamic-row-uix_sc_timeline_listitem_date',
											'type'      => 'text'
										), 
		
										array(
											'id'        => 'dynamic-row-uix_sc_timeline_listitem_status',
											'type'      => 'text'
										), 
									
										

									 ),
									'max'                       => $clone_max
				                )
									
		),
		
		

			array(
				'id'             => 'uix_sc_timeline_listitem_highlight',
				'title'          => '',
				'desc'           => esc_html__( 'Highlight', 'uix-shortcodes' ),
				'value'          => '',
		        'class'          => 'dynamic-row-uix_sc_timeline_listitem_highlight', /*class of list item */
				'placeholder'    => '',
				'type'           => 'checkbox',
				'default'        => array(
										'checked'  => true
									)


			),	
		
		
			array(
				'id'             => 'uix_sc_timeline_listitem_date',
				'title'          => '',
				'desc'           => '',
				'value'          => date( 'F j, Y' ),
				'class'          => 'dynamic-row-uix_sc_timeline_listitem_date', /*class of list item */
				'placeholder'    => wp_kses( sprintf( __( 'e.g., %1$s', 'uix-shortcodes' ), date( 'F j, Y' ) ), wp_kses_allowed_html( 'post' ) ),
				'type'           => 'text',
				'default'        => ''

			),	
		
			
			array(
				'id'             => 'uix_sc_timeline_listitem_status',
				'title'          => '',
				'desc'           => '',
				'value'          => esc_html__( 'Project Status Here', 'uix-shortcodes' ),
				'class'          => 'dynamic-row-uix_sc_timeline_listitem_status', /*class of list item */
				'placeholder'    => '',
				'type'           => 'text',
				'default'        => ''

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
																	'fields'         => array( 'uix_sc_timeline_listitem_highlight', 'uix_sc_timeline_listitem_date', 'uix_sc_timeline_listitem_status' )
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
		'title'                   => esc_html__( 'Timeline', 'uix-shortcodes' ),
	    'js_template'             => '

			/* List Item ( step 2)  */
			var list_num = '.floatval( $clone_max ).';


			var show_list_item = \'\';
			for ( var i=0; i<=list_num; i++ ){

				var _uid       = ( i == 0 ) ? \'#\' : \'#\'+i+\'-\',
					_date      = $( _uid+\'uix_sc_timeline_listitem_date\' ).val(),
					_highlight = $( _uid+\'uix_sc_timeline_listitem_highlight-checkbox\' ).is( ":checked" ),
					_status    = $( _uid+\'uix_sc_timeline_listitem_status\' ).val();


				if ( _date != undefined && _date != \'\' ) {
					show_list_item += "<br>[uix_timeline_item date=\'"+uixscform_shortcodeHTMLEcode( _date )+"\' status=\'"+uixscform_shortcodeHTMLEcode( _status )+"\' highlight=\'"+_highlight+"\'][/uix_timeline_item]";
				}


			}


			code = "[uix_timeline color=\'"+uix_sc_timeline_list_color+"\']"+show_list_item+"<br>[/uix_timeline]";

		
		'
    )
);