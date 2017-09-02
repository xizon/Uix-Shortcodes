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
			'id'             => 'uix_sc_code_lan',
			'title'          => esc_html__( 'Language', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 'javascript',
			'placeholder'    => '',
			'type'           => 'select',
			'default'        => array(
									'xml'   => 'xml',
									'css'   => 'css',
									'html'  => 'html/xhtml',
									'xslt'  => 'xslt',
									'php'  => 'php',
									'javascript'  => 'javascript',
									'python'  => 'python',
									'applescript'  => 'applescript',
									'as3'  => 'as3',
									'plain'  => 'plain',
									'perl'  => 'perl',
									'bash'  => 'bash',
									'javafx'  => 'javafx',
									'ruby'  => 'ruby',
									'shell'  => 'shell',
									'java'  => 'java',
									'sass'  => 'sass',
									'scss'  => 'scss',
									'scala'  => 'scala',
									'sql'  => 'sql',
									'coldfusion'  => 'coldfusion',
									'vb'  => 'vb',
									'groovy'  => 'groovy',
									'erlang'  => 'erlang',
									'diff'  => 'diff',
									'patch'  => 'patch',
									'delphi'  => 'delphi',
									'pascal'  => 'pascal',
									'c#'  => 'c#',
									'cpp'  => 'c/c++',

									
				                )
		
		
		),
		
		array(
			'id'             => 'uix_sc_code_content',
			'title'          => esc_html__( 'Source code', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'textarea',
			'default'        => array(
									'row'     => 15,
									'format'  => false
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
		'title'                   => esc_html__( 'Source Code', 'uix-shortcodes' ),
	    'js_template'             => '
		
			code = "[uix_code language=\'"+uix_sc_code_lan+"\']<pre class=\'brush: "+uix_sc_code_lan+";\'>"+uixscform_htmlEncode( uix_sc_code_content )+"</pre>[/uix_code]";
		
		'
    )
);


