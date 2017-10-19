<?php
if ( !class_exists( 'UixShortcodes' ) ) {
    return;
}

/**
 * Note: 
 *
 * Please refer to sample:  uix_sc_module_sample_hello.php
 * 						    uix_sc_module_sample_hello2.php
 *
 * 1) For all ID attribute, special characters are only allowed underscores "_"
 * 2) Optional params of field "callback":  html, html-shortcode, attr, slug, url, number, number-deg_px, color-name, list, source-code
 * 3) String of clone trigger ID, must contain at least "_triggerclonelist"
 * 4) String of clone ID attribute must contain at least "_listitem"
 * 5) If multiple columns are used to clone event and there are multiple clone triggers, 
      the triggers ID and clone controls ID must contain the string "_one_", "_two", "_three_" or "_four_" for per column
*/

/**
 * Returns current module(form group) ID
 * ----------------------------------------------------
 */
$form_id = basename( __FILE__, '.php' );


/**
 * Form Type & Controls
 * ----------------------------------------------------
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
		    'callback'       => 'source-code',
			'default'        => array(
									'row'     => 15
				                )
		
		),
	
		
	
	)
;


/**
 * Returns form
 * ----------------------------------------------------
 */
UixSCFormCore::form_scripts( array(
	    'clone'                   => false,
		'form_id'                 => $form_id,
		'fields'                  => array(
										array(
											 'type'    => $form_type,
											 'values'  => $args
										),

									),
		'title'                   => esc_html__( 'Source Code', 'uix-shortcodes' ),
	
		/**
		 * /////////////// Customizing HTML output on the frontend /////////////// 
		 * 
		 * 
		 * Usage:
		 *
		 * 1) Written as pure HTML syntax.
		 * 2) Directly use the controls ID as a variable: ${???}
		 * 3) Using {{if}} and {{else}} to render conditional sections. 
		       -----E.g.
		       {{if your_field_id}} ... {{else}} ... {{/if}}
			   
		 * 4) Using {{each}} to render repeating sections.
		       -----E.g.
				{{each your_clone_trigger_id}}
					{{if your_listitem_field_id != ""}}
					    {{if $index == 0}}<li class="active">{{else}}<li>{{/if}}
						    ${your_listitem_field_id}
						</li>
					{{/if}}	
				{{/each}}
		 
		 */
	    'template'              => '
		
		    [uix_code language=\'${uix_sc_code_lan}\']<pre class=\'brush: ${uix_sc_code_lan};\'>${uix_sc_code_content}</pre>[/uix_code]

		'
    )
);


