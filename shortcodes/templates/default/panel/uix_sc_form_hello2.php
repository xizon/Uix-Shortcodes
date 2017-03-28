<?php
if ( !class_exists( 'UixShortcodes' ) ) {
    return;
}

/**
 * Initialize sections template parameters
 * ----------------------------------------------------
 */
$form_vars = UixShortcodes::init_template_parameters( 'uix_sc_form_hello2' );
if ( !is_array( $form_vars ) ) return;
foreach ( $form_vars as $key => $v ) :
	$$key = $v;
endforeach;


/**
 * Form Type
 */
$form_type_col2 = array(
    'list'       => 2
);


$args_col2_1 = 
	array(
	
		array(
			'id'             => 'uix_sc_col_demo_col2_1_text',
			'title'          => esc_html__( 'Text2 - 1', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'text'
		
		),
		
			
		array(
			'id'             => 'uix_sc_col_demo_col2_1_textarea',
			'title'          => '',
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'textarea',
			'default'        => array(
									'row'     => 2,
									'format'  => true
								)
		
		),
		
		array(
			'id'             => 'uix_sc_col_demo_col2_1_icon',
			'title'          => esc_html__( 'Icon', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => esc_html__( 'Choose Demo Icon', 'uix-shortcodes' ),
			'type'           => 'icon',
			'default'        => array(
									'social'  => false
								)
		
		),
		
		array(
				'id'             => 'uix_sc_col_demo_col2_1_upload',
				'title'          => esc_html__( 'Upload Image', 'uix-shortcodes' ),
				'desc'           => '',
				'value'          => '',
				'placeholder'    => esc_html__( 'Image URL', 'uix-shortcodes' ),
				'type'           => 'image',
				'default'        => array(
										'remove_btn_text'  => esc_html__( 'Remove image', 'uix-shortcodes' ),
										'upload_btn_text'  => esc_html__( 'Upload', 'uix-shortcodes' )
									)
			
		),	
			
		
	    array(
			'id'             => 'uix_sc_col_demo_col2_1_slider',
			'title'          => esc_html__( 'SLider', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 0,
			'placeholder'    => '',
			'type'           => 'slider',
			'default'        => array(
			                        'units_id'  => 'uix_sc_col_demo_col2_1_slider_units',
									'units'  => '',
									'min'   => 0,
									'max'   => 10,
									'step'  => 0.1
				                )
		
		),		
		
	
	)
;


$args_col2_2 = 
	array(
		array(
			'id'             => 'uix_sc_col_demo_col2_2',
			'title'          => esc_html__( 'Text2 - 2', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'text'
		
		),
		
		array(
			'id'             => 'uix_sc_col_demo_col2_2_textarea',
			'title'          => '',
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'textarea',
			'default'        => array(
									'row'     => 2,
									'format'  => true
								)
		
		),
		
		array(
			'id'             => 'uix_sc_col_demo_col2_2_icon',
			'title'          => esc_html__( 'Icon', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => esc_html__( 'Choose Demo Icon', 'uix-shortcodes' ),
			'type'           => 'icon',
			'default'        => array(
									'social'  => false
								)
		
		),
		
		array(
				'id'             => 'uix_sc_col_demo_col2_2_upload',
				'title'          => esc_html__( 'Upload Image', 'uix-shortcodes' ),
				'desc'           => '',
				'value'          => '',
				'placeholder'    => esc_html__( 'Image URL', 'uix-shortcodes' ),
				'type'           => 'image',
				'default'        => array(
										'remove_btn_text'  => esc_html__( 'Remove image', 'uix-shortcodes' ),
										'upload_btn_text'  => esc_html__( 'Upload', 'uix-shortcodes' )
									)
			
		),	
			
	    array(
			'id'             => 'uix_sc_col_demo_col2_2_slider',
			'title'          => esc_html__( 'SLider', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 0,
			'placeholder'    => '',
			'type'           => 'slider',
			'default'        => array(
			                        'units_id'  => 'uix_sc_col_demo_col2_2_slider_units',
									'units'  => '',
									'min'   => 0,
									'max'   => 10,
									'step'  => 0.1
				                )
		
		),			
	
	)
;


//---------

$form_type_col3 = array(
    'list' => 3
);


$args_col3_1 = 
	array(
		array(
			'id'             => 'uix_sc_col_demo_col3_1',
			'title'          => esc_html__( 'Text3 - 1', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'text'
		
		),
		
	
	)
;

$args_col3_2 = 
	array(
		array(
			'id'             => 'uix_sc_col_demo_col3_2',
			'title'          => esc_html__( 'Text3 - 2', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'text'
		
		),
		
	
	)
;


$args_col3_3 = 
	array(
		array(
			'id'             => 'uix_sc_col_demo_col3_3',
			'title'          => esc_html__( 'Text3 - 3', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'text'
		
		),
		
	
	)
;



//---------

$form_type_col4 = array(
    'list' => 4
);


$args_col4_1 = 
	array(
		array(
			'id'             => 'uix_sc_col_demo_col4_1',
			'title'          => esc_html__( 'Text4 - 1', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'text'
		
		),
		
	
	)
;

$args_col4_2 = 
	array(
		array(
			'id'             => 'uix_sc_col_demo_col4_2',
			'title'          => esc_html__( 'Text4 - 2', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'text'
		
		),
		
	
	)
;
$args_col4_3 = 
	array(
		array(
			'id'             => 'uix_sc_col_demo_col4_3',
			'title'          => esc_html__( 'Text4 - 3', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'text'
		
		),
		
	
	)
;
$args_col4_4 = 
	array(
		array(
			'id'             => 'uix_sc_col_demo_col4_4',
			'title'          => esc_html__( 'Text4 - 4', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'text'
		
		),
		
	
	)
;



/**
 * Returns form javascripts
 * ----------------------------------------------------
 */
UixShortcodes::form_scripts( array(
	    'clone'                   => '',
		'form_id'                 => $form_id,
		'section_id'              => $sid,
	    'content_id'              => $cid,
		'fields'                  => array(
										array(
											 'type'    => $form_type_col2,
											 'values'  => $args_col2_1,
											 'title'   => esc_html__( 'Item 2_1', 'uix-shortcodes' )
										),
										array(
											 'type'    => $form_type_col2,
											 'values'  => $args_col2_2,
											 'title'   => esc_html__( 'Item 2_2', 'uix-shortcodes' )
										),
										array(
											 'type'    => $form_type_col3,
											 'values'  => $args_col3_1,
											 'title'   => esc_html__( 'Item 3_1', 'uix-shortcodes' )
										),
										array(
											 'type'    => $form_type_col3,
											 'values'  => $args_col3_2,
											 'title'   => esc_html__( 'Item 3_2', 'uix-shortcodes' )
										),
										array(
											 'type'    => $form_type_col3,
											 'values'  => $args_col3_3,
											 'title'   => esc_html__( 'Item 3_3', 'uix-shortcodes' )
										),
										array(
											 'type'    => $form_type_col4,
											 'values'  => $args_col4_1,
											 'title'   => esc_html__( 'Item 4_1', 'uix-shortcodes' )
										),
										array(
											 'type'    => $form_type_col4,
											 'values'  => $args_col4_2,
											 'title'   => esc_html__( 'Item 4_2', 'uix-shortcodes' )
										),
										array(
											 'type'    => $form_type_col4,
											 'values'  => $args_col4_3,
											 'title'   => esc_html__( 'Item 4_3', 'uix-shortcodes' )
										),
										array(
											 'type'    => $form_type_col4,
											 'values'  => $args_col4_4,
											 'title'   => esc_html__( 'Item 4_4', 'uix-shortcodes' )
										),
	

									),
		'title'                   => esc_html__( 'Demo Form 2', 'uix-shortcodes' ),
	    'js_template'             => '
		
		    code = "[uix_hello2][/uix_hello2]";
		
		'
    )
);