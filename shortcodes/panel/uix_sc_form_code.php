<?php
if ( !class_exists( 'UixSCFormCore' ) ) {
    return;
}

$sid     = ( isset( $_POST[ 'sectionID' ] ) ) ? $_POST[ 'sectionID' ] : -1;
$pid     = ( isset( $_POST[ 'postID' ] ) ) ? $_POST[ 'postID' ] : 0;
$cid     = ( isset( $_POST[ 'contentID' ] ) ) ? $_POST[ 'contentID' ] : 'content';
/**
 * Form ID
 */
$form_id = 'uix_sc_form_code';

/**
 * Form Type
 */
$form_type = [
    'list' => false
];


$args = 
	[

		array(
			'id'             => 'uix_sc_code_lan',
			'title'          => __( 'Language', 'uix-shortcodes' ),
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
			'title'          => __( 'Source code', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'textarea',
			'default'        => array(
									'row'     => 15,
									'format'  => false
				                )
		
		),
	
		
	
	]
;


$form_html = UixSCFormCore::add_form( $cid, $sid, $form_id, $form_type, $args, 'html' );
$form_js = UixSCFormCore::add_form( $cid, $sid, $form_id, $form_type, $args, 'js' );
$form_js_vars = UixSCFormCore::add_form( $cid, $sid, $form_id, $form_type, $args, 'js_vars' );





/**
 * Returns actions of javascript
 */

if ( $sid == -1 && is_admin() ) {
	$currentScreen = get_current_screen();
	if( $currentScreen->base === "post" || $currentScreen->base === "widgets" || $currentScreen->base === "customize" || UixSCFormCore::inc_str( $currentScreen->base, '_page_' ) ) {
	 
		
		?>
		<script type="text/javascript">
		( function($) {
		'use strict';
			$( function() {  
				<?php echo UixSCFormCore::uixscform_callback( $form_js, $form_id, __( 'Insert Source Code', 'uix-shortcodes' ) ); ?>					<?php echo UixSCFormCore::send_before( $form_js_vars, $form_id ); ?> 
				/*--**************** Custom shortcode begin ****************-- */
					
				code = "[uix_code language='"+uix_sc_code_lan+"']<pre class='brush: "+uix_sc_code_lan+";'>"+uixscform_htmlEncode( uix_sc_code_content )+"</pre>[/uix_code]";
					
				/*--**************** Custom shortcode end ****************-- */
				<?php echo UixSCFormCore::send_after( $form_id ); ?> 
		} ) ( jQuery );
		</script>
 
		<?php

	}
	
}


/**
 * Returns forms with ajax
 */
if ( $sid >= 0 && is_admin() ) {
	echo $form_html;	
}
