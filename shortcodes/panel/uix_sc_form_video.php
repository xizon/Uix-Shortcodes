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
$form_id = 'uix_sc_form_video';

/**
 * Form Type
 */
$form_type = array(
    'list' => false
);


$args = 
	array(
	
	 
	
		
		
		array(
			'id'             => 'uix_sc_video_url',
			'title'          => __( 'Video URL', 'uix-shortcodes' ),
			'desc'           => __( 'Copy the video\'s URL from your web browser\'s address bar while viewing the video, paste it. <br>e.g., <strong>https://www.youtube.com/watch?v=abc</strong>', 'uix-shortcodes' ),
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'text'
		
		),
	
		
		
		array(
			'id'             => 'uix_sc_video_w',
			'title'          => __( 'Display Width', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '560',
			'placeholder'    => '',
			'type'           => 'short-text',
			'default'        => array(
									'units'  => 'px'
								)
		
		),	
		
		array(
			'id'             => 'uix_sc_video_h',
			'title'          => __( 'Display Height', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '315',
			'placeholder'    => '',
			'type'           => 'short-text',
			'default'        => array(
									'units'  => 'px'
								)
		
		),	
		
		array(
			'id'             => 'uix_sc_video_responsive',
			'title'          => __( 'Responsive of Display', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'checkbox',
			'default'        => array(
									'checked'  => true
				                )
		
		
		),	
		
	
		
	
	)
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
				<?php echo UixSCFormCore::uixscform_callback( $form_js, $form_id, __( 'Add a Responsive Video', 'uix-shortcodes' ) ); ?>					
				<?php echo UixSCFormCore::send_before( $form_js_vars, $form_id ); ?> 
				/*--**************** Custom shortcode begin ****************-- */
					
				code = "[uix_video width='"+uixscform_floatval( uix_sc_video_w )+"' height='"+uixscform_floatval( uix_sc_video_h )+"' responsive='"+uix_sc_video_responsive+"' url='"+encodeURI( uix_sc_video_url )+"']";
					
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
