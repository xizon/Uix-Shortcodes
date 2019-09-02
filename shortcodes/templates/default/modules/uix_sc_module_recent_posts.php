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

//Show All Categories as Links

$categories = get_categories( array(
    'orderby' => 'name',
    'order'   => 'ASC'
) );
$categories_value = array( 'all' => esc_html__( '- All -', 'uix-shortcodes' ) );


if ( ! empty( $categories ) ) {
	foreach( $categories as $category ) {
		UixShortcodes::array_push_associative( $categories_value, array( $category->term_id => esc_html( $category->cat_name ) ) );
	}
}
//print_r($categories_value);
									  
$args = 
	array(
	
	    array(
			'id'             => 'uix_sc_rposts_num',
			'title'          => esc_html__( 'Number of posts to show', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 5,
			'placeholder'    => '',
			'type'           => 'short-text',
			'callback'       => 'number',
			'default'        => array(
									'units'  => ''
				                )
		
		),
		
	    array(
			'id'             => 'uix_sc_rposts_order',
			'title'          => esc_html__( 'Order By', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'radio',
			'default'        => array(
									'DESC'  => 'desc',
									'ASC'  => 'asc',
		                            'rand'  => 'rand'
				                )
		
		),
	
		array(
			'id'             => 'uix_sc_rposts_cats',
			'title'          => esc_html__( 'Select Category', 'uix-shortcodes' ),
			'desc'           => esc_html__( 'Get all posts related to particular category name.', 'uix-shortcodes' ),
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'select',
			'default'        => $categories_value

		),

		
		array(
			'id'             => 'uix_sc_rposts_looptemp',
			'title'          => esc_html__( 'Loop Template', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => esc_html( '
				<li>
					<div class="uix-sc-imgposts__thumb">
						<a class="featured-image" href="[uix_recent_posts_link]">[uix_recent_posts_thumbnail]</a>
					</div>
					<div class="uix-sc-imgposts__info">
						<div class="uix-sc-imgposts__info__title"><a href="[uix_recent_posts_link]">[uix_recent_posts_title]</a></div>
						<div class="uix-sc-imgposts__info__date">[uix_recent_posts_date_M] [uix_recent_posts_date_d], [uix_recent_posts_date_y]</div>
						<div class="uix-sc-imgposts__info__desc">[uix_recent_posts_excerpt]</div>	
					</div>
				</li>
			' ),
			'placeholder'    => '',
			'type'           => 'textarea',
			'callback'       => 'html-shortcode',
			'default'        => array(
									'row'     => 5
				                )
		
		),
		
	    array(
			'id'             => 'uix_sc_rposts_looptemp_tipinfo',
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
					  <code>[uix_recent_posts_cat_link]</code> --&gt;  '.esc_html__( 'Categories with hyperlinks)', 'uix-shortcodes' ).'<br>
					  <code>[uix_recent_posts_cat_text]</code> --&gt;  '.esc_html__( 'Categories', 'uix-shortcodes' ).'<br>
					  <code>[uix_recent_posts_cat_attr]</code> --&gt;  '.esc_html__( 'HTML attributes of categories', 'uix-shortcodes' ).'<br>
					  <code>[uix_recent_posts_thumbnail]</code> --&gt;  '.esc_html__( 'Featured image', 'uix-shortcodes' ).'<br>
					  <code>[uix_recent_posts_thumbnail_url]</code> --&gt;  '.esc_html__( 'Featured image URL', 'uix-shortcodes' ).'<br>
					  <code>[uix_recent_posts_format]</code> --&gt;  '.esc_html__( 'Format slug', 'uix-shortcodes' ).'
					  
                  </strong>
			',
			'type'           => 'note',
			'default'        => array(
		                            'fullwidth'  => false,
									'type'       => 'default'  //error, success, warning, note, default
				                ),
		
		),	
		
		
		array(
			'id'             => 'uix_sc_rposts_before',
			'title'          => esc_html__( 'Output text before the &lt;a&gt; of the link', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => esc_html( '<ul class="uix-sc-imgposts">' ),
			'placeholder'    => '',
			'type'           => 'text',
		    'callback'       => 'html-shortcode',
		
		),

		array(
			'id'             => 'uix_sc_rposts_after',
			'title'          => esc_html__( 'Output text after the &lt;/a&gt; of the link', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => esc_html( '</ul>' ),
			'placeholder'    => '',
			'type'           => 'text',
		    'callback'       => 'html-shortcode',
		
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
		'title'                   => esc_html__( 'Recent Posts', 'uix-shortcodes' ),
	
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
		
		    [uix_recent_posts order=\'${uix_sc_rposts_order}\' cat=\'${uix_sc_rposts_cats}\' show=\'${uix_sc_rposts_num}\' before=\'${uix_sc_rposts_before}\' after=\'${uix_sc_rposts_after}\']${uix_sc_rposts_looptemp}[/uix_recent_posts]

		'
	
    )
);

