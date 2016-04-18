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
			'desc'           => __( 'Just enter the MP3, SoundCloud or Audiomack URL. If you are using SoundCloud or Audiomack, the following <strong>"Enable SoundCloud"</strong> checkbox should be checked.', 'uix-shortcodes' ),
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'text'
		
		),
		
		array(
			'id'             => 'uix_sc_audio_soundcloud',
			'title'          => __( 'Enable SoundCloud', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'checkbox',
			'default'        => array(
									'checked'  => false
				                )
		
		
		),	
		
		
	    array(
			'id'             => 'uix_sc_audio_width',
			'title'          => __( 'Player Width', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '100',
			'placeholder'    => '',
			'type'           => 'short-units-text',
			'default'        => array(
									'units'  => [ '%', 'px' ],
									'units_id'  => 'uix_sc_audio_width_units'
				                )
		
		),
		
	    array(
			'id'             => 'uix_sc_audio_height',
			'title'          => __( 'Player Height', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '150',
			'placeholder'    => '',
			'type'           => 'short-text',
			'default'        => array(
									'units'  => 'px'
								)
		
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
		
					if ( uix_sc_audio_soundcloud === true ) {
						uix_sc_audio_autoplay = uix_sc_audio_loop = 'null';
					}
					if ( uix_sc_audio_soundcloud === false ) {
						uix_sc_audio_height = 'null';
					}
				
				
			
				window.send_to_editor( "[uix_audio width='"+uix_sc_audio_width+uix_sc_audio_width_units+"' height='"+uix_sc_audio_height+"' soundcloud='"+uix_sc_audio_soundcloud+"' autoplay='"+uix_sc_audio_autoplay+"' loop='"+uix_sc_audio_loop+"' url='"+uix_sc_audio_url+"']" );
				
				
				
		   /* Callback after custom javascript of sweetalert */
		  <?php echo UixShortcodes::sweetalert_after(); ?>
				


	} ); 

	
	
} ) ( jQuery );

</script>
