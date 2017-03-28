<?php
if ( !class_exists( 'UixShortcodes' ) ) {
    return;
}

/**
 * Initialize sections template parameters
 * ----------------------------------------------------
 */
$form_vars = UixShortcodes::init_template_parameters( 'uix_sc_form_authorcard' );
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
			'id'             => 'uix_sc_authorcard_primary_color',
			'title'          => esc_html__( 'Primary Color', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '#a2bf2f',
			'placeholder'    => '',
			'type'           => 'color',
			'default'        => array( '#a2bf2f', '#d59a3e', '#DD514C', '#FA9ADF', '#4BB1CF',  '#0E90D2', '#5F9EA0', '#473f3f',  '#bebebe' )
		
		),

		array(
			'id'             => 'uix_sc_authorcard_avatar',
			'title'          => esc_html__( 'Author Picture', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => esc_html__( 'Avatar URL', 'uix-shortcodes' ),
			'type'           => 'image',
			'default'        => array(
									'remove_btn_text'  => esc_html__( 'Remove image', 'uix-shortcodes' ),
									'upload_btn_text'  => esc_html__( 'Upload', 'uix-shortcodes' ),
				                )
		
		),	
		

		
		array(
			'id'             => 'uix_sc_authorcard_name',
			'title'          => esc_html__( 'Author Name', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => esc_html__( 'Your Name', 'uix-shortcodes' ),
			'placeholder'    => '',
			'type'           => 'text'
		
		),
	
		
		array(
			'id'             => 'uix_sc_authorcard_intro',
			'title'          => esc_html__( 'Biographical Info', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => esc_html__( 'Quae cum praeponunt, ut sit aliqua rerum selectio, naturam videntur sequi; Tu vero, inquam, ducas licet, si sequetur; Ab his oratores, ab his imperatores ac rerum publicarum principes extiterunt. Igitur neque stultorum quisquam beatus neque sapientium non beatus.', 'uix-shortcodes' ),
			'placeholder'    => '',
			'type'           => 'textarea',
			'default'        => array(
									'row'     => 5,
									'format'  => true
								)
		
		),
	

		array(
			'id'             => 'uix_sc_authorcard_link_label',
			'title'          => esc_html__( 'Link Text', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => esc_html__( '&rarr;', 'uix-shortcodes' ),
			'placeholder'    => '',
			'type'           => 'text'
		
		),		
		array(
			'id'             => 'uix_sc_authorcard_link_link',
			'title'          => esc_html__( 'Link URL', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '#',
			'placeholder'    => 'URL',
			'type'           => 'text'
		
		),		



		array(
			'id'             => 'uix_sc_authorcard_1_url',
			'title'          => esc_html__( 'Social Network 1', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => esc_html__( 'Your Social Network Page URL 1', 'uix-shortcodes' ),
			'type'           => 'text',
			'default'        => ''
		
		),
		
		array(
			'id'             => 'uix_sc_authorcard_1_icon',
			'title'          => '',
			'desc'           => '',
			'value'          => '',
			'placeholder'    => esc_html__( 'Choose Social Icon 1', 'uix-shortcodes' ),
			'type'           => 'icon',
			'default'        => array(
									'social'  => true
								)
		
		),
		
		
		array(
			'id'             => 'uix_sc_authorcard_2_url',
			'title'          => esc_html__( 'Social Network 2', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => esc_html__( 'Your Social Network Page URL 2', 'uix-shortcodes' ),
			'type'           => 'text',
			'default'        => ''
		
		),
		
		array(
			'id'             => 'uix_sc_authorcard_2_icon',
			'title'          => '',
			'desc'           => '',
			'value'          => '',
			'placeholder'    => esc_html__( 'Choose Social Icon 2', 'uix-shortcodes' ),
			'type'           => 'icon',
			'default'        => array(
									'social'  => true
								)
		
		),
			
		
		array(
			'id'             => 'uix_sc_authorcard_3_url',
			'title'          => esc_html__( 'Social Network 3', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => esc_html__( 'Your Social Network Page URL 3', 'uix-shortcodes' ),
			'type'           => 'text',
			'default'        => ''
		
		),
		
		array(
			'id'             => 'uix_sc_authorcard_3_icon',
			'title'          => '',
			'desc'           => '',
			'value'          => '',
			'placeholder'    => esc_html__( 'Choose Social Icon 3', 'uix-shortcodes' ),
			'type'           => 'icon',
			'default'        => array(
									'social'  => true
								)
		
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
		'title'                   => esc_html__( 'An Author Card', 'uix-shortcodes' ),
	    'js_template'             => '
		
			code = "[uix_authorcard primarycolor=\'"+uix_sc_authorcard_primary_color+"\' btnlabel=\'"+uixscform_shortcodeHTMLEcode( uix_sc_authorcard_link_label )+"\' btnurl=\'"+encodeURI( uix_sc_authorcard_link_link )+"\' name=\'"+uixscform_shortcodeHTMLEcode( uix_sc_authorcard_name )+"\' avatar=\'"+encodeURI( uix_sc_authorcard_avatar )+"\' social_1=\'"+uix_sc_authorcard_1_icon+"|"+encodeURI( uix_sc_authorcard_1_url )+"\' social_2=\'"+uix_sc_authorcard_2_icon+"|"+encodeURI( uix_sc_authorcard_2_url )+"\' social_3=\'"+uix_sc_authorcard_3_icon+"|"+encodeURI( uix_sc_authorcard_3_url )+"\' ]"+uix_sc_authorcard_intro+"<br>[/uix_authorcard]";


		'
    )
);
