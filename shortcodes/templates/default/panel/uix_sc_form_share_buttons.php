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
 * Form Type
 */
$form_type = array(
    'list' => false
);


$args = 
	array(
	

	
		array(
			'id'             => 'uix_sc_share_btn_name',
			'title'          => esc_html__( 'Choose Type of Button', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => array( '1', '2', '3' ), //It takes a variable like [ ]  if the value is empty.
			'placeholder'    => '',
			'type'           => 'multiselect',
			'default'        => array(
									'1'  => 'facebook',
									'2'  => 'twitter',
									'3'  => 'google_plus',
									'4'  => 'pinterest'
	
				                )
		
		
		),
	
		array(
			'id'             => 'uix_sc_share_btn_fillet',
			'title'          => esc_html__( 'Fillet Radius', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '25',
			'placeholder'    => '',
			'type'           => 'short-text',
			'default'        => array(
									'units'  => 'px'
								)
		
		),	
		
		
		
		array(
			'id'             => 'uix_sc_share_btn_color',
			'title'          => esc_html__( 'Button Color', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 1,
			'placeholder'    => '',
			'type'           => 'radio',
			'default'        => array(
									'1'  => 'black',
									'2'  => 'multicolor'
								)
		
		),

		array(
			'id'             => 'uix_sc_share_btn_size',
			'title'          => esc_html__( 'Button Size', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 1,
			'placeholder'    => '',
			'type'           => 'radio',
			'default'        => array(
									'1'  => 'small',
									'2'  => 'large'
								)
		
		),
		
		
		array(
			'desc'           => esc_html__( 'It takes that unique url and share it on the social page automagically.', 'uix-shortcodes' ),
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
											 'type'    => $form_type,
											 'values'  => $args
										),

									),
		'title'                   => esc_html__( 'Share Buttons', 'uix-shortcodes' ),
	    'js_template'             => '
		
			/* Multiple Selector */
			var multiselectorArr = uix_sc_share_btn_name.split( \',\' ),
				show_checkboxes = \'\';
			for ( var k=0; k < multiselectorArr.length; k++ ) {


				switch( multiselectorArr[k] ){ 
					case \'1\': 
						show_checkboxes += \'facebook,\';

					break; 

					case \'2\': 
						show_checkboxes += \'twitter,\';

					break; 

					case \'3\': 
						show_checkboxes += \'google_plus,\';

					break; 	

					case \'4\': 
						show_checkboxes += \'pinterest,\';

					break; 				

					default: 

				}

			}  
			show_checkboxes = show_checkboxes.substring( 0, show_checkboxes.length-1 );



			code = "[uix_share_buttons color=\'"+uix_sc_share_btn_color+"\' size=\'"+uix_sc_share_btn_size+"\' fillet=\'"+uixscform_floatval( uix_sc_share_btn_fillet )+"px\' show=\'"+show_checkboxes+"\']";
		
		
		'
    )
);

