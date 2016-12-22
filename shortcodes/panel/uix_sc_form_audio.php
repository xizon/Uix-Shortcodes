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
				<?php echo UixSCFormCore::uixscform_callback( $form_js, $form_id, __( 'Add a Responsive Audio', 'uix-shortcodes' ) ); ?>					
				<?php echo UixSCFormCore::send_before( $form_js_vars, $form_id ); ?> 
				/*--**************** Custom shortcode begin ****************-- */
					if ( uix_sc_audio_soundcloud === true ) {
							uix_sc_audio_autoplay = uix_sc_audio_loop = 'null';
						}
						if ( uix_sc_audio_soundcloud === false ) {
							uix_sc_audio_height = 'null';
						} else {
							uix_sc_audio_height = uixscform_floatval( uix_sc_audio_height );
						}
					
					
				
					code = "[uix_audio width='"+uixscform_floatval( uix_sc_audio_width )+uix_sc_audio_width_units+"' height='"+uix_sc_audio_height+"' soundcloud='"+uix_sc_audio_soundcloud+"' autoplay='"+uix_sc_audio_autoplay+"' loop='"+uix_sc_audio_loop+"' url='"+uix_sc_audio_url+"']";	
				/*--**************** Custom shortcode end ****************-- */
				<?php echo UixSCFormCore::send_after(); ?> 
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
