<?php
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

$form_html = UixShortcodes::add_form( $form_id, $form_type, $args, 'html' );
$form_js = UixShortcodes::add_form( $form_id, $form_type, $args, 'js' );
$form_js_vars = UixShortcodes::add_form( $form_id, $form_type, $args, 'js_vars' );

/**
 * Add simulation buttons
 */
echo UixShortcodes::add_form( $form_id, '', '', 'active_btn' );
?>		


<script type="text/javascript">

( function($) {
    
	$( document ).ready( function() {
		
		 /* Callback before custom javascript of sweetalert */
		<?php echo UixShortcodes::sweetalert_before( $form_js, $form_html, $form_js_vars, $form_id, __( 'Insert Source Code', 'uix-shortcodes' ) ); ?>
		
		        
			
				window.send_to_editor( "[uix_code language='"+uix_sc_code_lan+"']<pre class='brush: "+uix_sc_code_lan+";'>"+uix_htmlEncode( uix_sc_code_content )+"</pre>[/uix_code]" );
				
				
				
		   /* Callback after custom javascript of sweetalert */
		  <?php echo UixShortcodes::sweetalert_after(); ?>
				


	} ); 

	
	
} ) ( jQuery );

</script>
