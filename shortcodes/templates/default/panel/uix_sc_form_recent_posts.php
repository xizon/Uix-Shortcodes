<?php
if ( !class_exists( 'UixShortcodes' ) ) {
    return;
}

/**
 * Initialize sections template parameters
 * ----------------------------------------------------
 */
$form_vars = UixShortcodes::init_template_parameters( 'uix_sc_form_recent_posts' );
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
			'id'             => 'uix_sc_rposts_num',
			'title'          => esc_html__( 'Number of posts to show', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 5,
			'placeholder'    => '',
			'type'           => 'short-text',
			'default'        => array(
									'units'  => ''
				                )
		
		),
		array(
			'id'             => 'uix_sc_rposts_looptemp',
			'title'          => esc_html__( 'Loop Template', 'uix-shortcodes' ),
			'desc'           => '
                  '.esc_html__( 'Use this template to display content on your website. You can use the following placeholders in the post list item templates, which will be replaced by the actual values when the content is displayed', 'uix-shortcodes' ).':<br>
                  <strong>                  
                    <code>[uix_recent_posts_link]</code> --&gt;  '.esc_html__( 'Permalink', 'uix-shortcodes' ).'<br>
                      <code>[uix_recent_posts_title]</code> --&gt;  '.esc_html__( 'Title', 'uix-shortcodes' ).'<br>
                      <code>[uix_recent_posts_date_m]</code> --&gt;  '.esc_html__( 'Month', 'uix-shortcodes' ).'<br>
                      <code>[uix_recent_posts_date_M]</code> --&gt;  '.esc_html__( 'Month display in English', 'uix-shortcodes' ).'<br>
                      <code>[uix_recent_posts_date_d]</code> --&gt;  '.esc_html__( 'Day', 'uix-shortcodes' ).'<br>
                      <code>[uix_recent_posts_date_y]</code> --&gt;  '.esc_html__( 'Year', 'uix-shortcodes' ).'<br>
                      <code>[uix_recent_posts_excerpt]</code> --&gt;  '.esc_html__( 'Excerpt', 'uix-shortcodes' ).'<br>
					  <code>[uix_recent_posts_thumbnail]</code> --&gt;  '.esc_html__( 'Featured image', 'uix-shortcodes' ).'
					  
                  </strong>
			',
			'value'          => '&lt;li&gt;&lt;a href="[uix_recent_posts_link]"&gt;[uix_recent_posts_title]&lt;/a&gt;&lt;/li&gt;',
			'placeholder'    => '',
			'type'           => 'textarea',
			'default'        => array(
									'row'     => 5,
									'format'  => true
				                )
		
		),
		
		array(
			'id'             => 'uix_sc_rposts_before',
			'title'          => esc_html__( 'Output text before the &lt;a&gt; of the link', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '&lt;ul&gt;',
			'placeholder'    => '',
			'type'           => 'text'
		
		),

		array(
			'id'             => 'uix_sc_rposts_after',
			'title'          => esc_html__( 'Output text after the &lt;/a&gt; of the link', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '&lt;/ul&gt;',
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
											 'type'    => $form_type,
											 'values'  => $args
										),

									),
		'title'                   => esc_html__( 'Recent Posts', 'uix-shortcodes' ),
	    'js_template'             => '
		
			var before = uixscform_shortcodeUsableHtmlToAttr( uix_sc_rposts_before );
			var after = uixscform_shortcodeUsableHtmlToAttr( uix_sc_rposts_after );
			var temp = uixscform_shortcodeUsableHtmlToAttr( uix_sc_rposts_looptemp );

			code = "[uix_recent_posts show=\'"+uixscform_floatval( uix_sc_rposts_num )+"\' before=\'"+before+"\' after=\'"+after+"\']"+temp+"[/uix_recent_posts]";
		
		
		'
    )
);

