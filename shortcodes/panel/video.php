<?php
/**
 * Form ID
 */
$form_id = 'uix_sc_form_video';

/**
 * Form Type
 */
$form_type = [
    'list' => false
];


$args = 
	[
	
	 
	
		
		
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
		<?php echo UixShortcodes::sweetalert_before( $form_js, $form_html, $form_js_vars, $form_id, __( 'Add a Responsive Video', 'uix-shortcodes' ) ); ?>
		
		        
			
				<?php echo UixShortcodes::send_to_editor( $form_id ); ?> "[uix_video width='"+uix_sc_video_w+"' height='"+uix_sc_video_h+"' responsive='"+uix_sc_video_responsive+"' url='"+uix_sc_video_url+"']" );
				
				
				
		   /* Callback after custom javascript of sweetalert */
		  <?php echo UixShortcodes::sweetalert_after(); ?>
				


	} ); 

	
	
} ) ( jQuery );

</script>
