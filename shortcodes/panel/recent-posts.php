<?php
/**
 * Form ID
 */
$form_id = 'uix_sc_form_recent_posts';

/**
 * Form Type
 */
$form_type = [
    'list' => false
];

$args = 
	[
	
	    array(
			'id'             => 'uix_sc_rposts_num',
			'title'          => __( 'Number of posts to show', 'uix-shortcodes' ),
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
			'title'          => __( 'Loop Template', 'uix-shortcodes' ),
			'desc'           => '
                  '.__( 'Use this template to display content on your website. You can use the following placeholders in the message templates, which will be replaced by the actual values when the content is displayed', 'uix-shortcodes' ).':<br>
                  <strong>                  
                    <code>[uix_recent_posts_link]</code> --&gt;  '.__( 'Permalink', 'uix-shortcodes' ).'<br>
                      <code>[uix_recent_posts_title]</code> --&gt;  '.__( 'Title', 'uix-shortcodes' ).'<br>
                      <code>[uix_recent_posts_date_m]</code> --&gt;  '.__( 'Month', 'uix-shortcodes' ).'<br>
                      <code>[uix_recent_posts_date_M]</code> --&gt;  '.__( 'Month display in English', 'uix-shortcodes' ).'<br>
                      <code>[uix_recent_posts_date_d]</code> --&gt;  '.__( 'Day', 'uix-shortcodes' ).'<br>
                      <code>[uix_recent_posts_date_y]</code> --&gt;  '.__( 'Year', 'uix-shortcodes' ).'<br>
                      <code>[uix_recent_posts_excerpt]</code> --&gt;  '.__( 'Excerpt', 'uix-shortcodes' ).'<br>
					  <code>[uix_recent_posts_thumbnail]</code> --&gt;  '.__( 'Featured image', 'uix-shortcodes' ).'
					  
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
			'title'          => __( 'Output text before the &lt;a&gt; of the link', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '&lt;ul&gt;',
			'placeholder'    => '',
			'type'           => 'text'
		
		),

		array(
			'id'             => 'uix_sc_rposts_after',
			'title'          => __( 'Output text after the &lt;/a&gt; of the link', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '&lt;/ul&gt;',
			'placeholder'    => '',
			'type'           => 'text'
		
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
		<?php echo UixShortcodes::sweetalert_before( $form_js, $form_html, $form_js_vars, $form_id, __( 'Insert Recent Posts', 'uix-shortcodes' ) ); ?>
	
				
				var before = uix_htmlencodeToShortcodeFormat ( uix_sc_rposts_before );
				var after = uix_htmlencodeToShortcodeFormat ( uix_sc_rposts_after );
				var temp = uix_htmlencodeToShortcodeFormat ( uix_sc_rposts_looptemp );
				
				
		
			
				window.send_to_editor( "[uix_recent_posts show='"+uix_sc_rposts_num+"' before='"+before+"' after='"+after+"']"+temp+"[/uix_recent_posts]" );
				
				
				
		   /* Callback after custom javascript of sweetalert */
		  <?php echo UixShortcodes::sweetalert_after(); ?>
				


	} ); 

	
	
} ) ( jQuery );

</script>

