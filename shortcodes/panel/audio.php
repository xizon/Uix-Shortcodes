<?php
/**
 * Form ID
 */
$form_id = 'uix_sc_form_audio';

/**
 * Form Type
 */
$form_type = [
    'list' => false
];


$args = 
	[
	
	 
	
		
		
		array(
			'id'             => 'uix_sc_audio_url',
			'title'          => __( 'Audio URL', 'uix-shortcodes' ),
			'desc'           => __( 'Just enter the MP3 audio URL. <br>e.g., <strong>http://example.com/my-audiofile.mp3</strong>', 'uix-shortcodes' ),
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'text'
		
		),
		
		array(
			'id'             => 'uix_sc_audio_autoplay',
			'title'          => __( 'Autoplay', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'checkbox',
			'default'        => array(
									'checked'  => false
				                )
		
		
		),	
		
		array(
			'id'             => 'uix_sc_audio_loop',
			'title'          => __( 'Loop', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'checkbox',
			'default'        => array(
									'checked'  => false
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
		<?php echo UixShortcodes::sweetalert_before( $form_js, $form_html, $form_js_vars, $form_id, __( 'Add a Responsive audio', 'uix-shortcodes' ) ); ?>
		
		        
			
				window.send_to_editor( "[uix_audio autoplay='"+uix_sc_audio_autoplay+"' loop='"+uix_sc_audio_loop+"' url='"+uix_sc_audio_url+"']" );
				
				
				
		   /* Callback after custom javascript of sweetalert */
		  <?php echo UixShortcodes::sweetalert_after(); ?>
				


	} ); 

	
	
} ) ( jQuery );

</script>
