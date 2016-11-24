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
$form_id = 'uix_sc_dividing_line';

/**
 * Form Type
 */
$form_type = [
    'list' => false
];


$args = 
	[
	
	    array(
			'id'             => 'uix_sc_dividing_line_style',
			'title'          => __( 'Choose Line Style', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 'solid',
			'placeholder'    => '',
			'type'           => 'radio-image',
			'default'        => array(
									'solid'     => UixShortcodes::plug_directory() .'assets/images/line/line-style-1.png',
									'double'    => UixShortcodes::plug_directory() .'assets/images/line/line-style-2.png',
									'dashed'    => UixShortcodes::plug_directory() .'assets/images/line/line-style-3.png',
									'dotted'    => UixShortcodes::plug_directory() .'assets/images/line/line-style-4.png',
									'shadow'    => UixShortcodes::plug_directory() .'assets/images/line/line-style-5.png',
									'gradient'  => UixShortcodes::plug_directory() .'assets/images/line/line-style-6.png',
									
				                )
		
		),
		
		array(
			'id'             => 'uix_sc_dividing_line_color',
			'title'          => __( 'Color', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '#333',
			'placeholder'    => '',
			'type'           => 'color',
			'default'        => [ '#333', '#fff' ]
		
		),
		
	    array(
			'id'             => 'uix_sc_dividing_line_width',
			'title'          => __( 'Width', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '100',
			'placeholder'    => '',
			'type'           => 'short-units-text',
			'default'        => array(
									'units'  => [ '%', 'px' ],
									'units_id'  => 'uix_sc_dividing_line_width_units'
				                )
		
		),
		
	    array(
			'id'             => 'uix_sc_dividing_line_opacity',
			'title'          => __( 'Opacity', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 17,
			'placeholder'    => '',
			'type'           => 'slider',
			'default'        => array(
			                        'units_id'  => 'uix_sc_dividing_line_opacity_units',
									'units'  => '%',
									'min'   => 0,
									'max'   => 100,
									'step'  => 1
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
	if( $currentScreen->base === "post" || $currentScreen->base === "widgets" || $currentScreen->base === "customize" || self::inc_str( $currentScreen->base, '_page_' ) ) {
	  	  
		if ( is_admin()) {
			
			echo UixSCFormCore::add_form( $cid, $sid, $form_id, '', '', 'active_btn' );
			?>
			<script type="text/javascript">
			( function($) {
			'use strict';
				$( function() {  
					<?php echo UixSCFormCore::uixscform_callback( $form_js, $form_id, __( 'Add a Dividing Line', 'uix-shortcodes' ) ); ?>					<?php echo UixSCFormCore::send_before( $form_js_vars, $form_id ); ?> 
					/*--**************** Custom shortcode begin ****************-- */
						
						var uix_sc_dividing_line_result_color = '';
						
						if ( uix_sc_dividing_line_color == '#fff' ) uix_sc_dividing_line_result_color = 'light';
						if ( uix_sc_dividing_line_color == '#333' ) uix_sc_dividing_line_result_color = 'dark';
					  
					
						code = "[uix_dividing_line style='"+uix_sc_dividing_line_style+"' color='"+uix_sc_dividing_line_result_color+"' width='"+uix_sc_dividing_line_width+uix_sc_dividing_line_width_units+"' opacity='"+uix_sc_dividing_line_opacity+"']";
						
	
						
					/*--**************** Custom shortcode end ****************-- */
					<?php echo UixSCFormCore::send_after(); ?> 
			} ) ( jQuery );
			</script>
	 
			<?php
	
			
		}
	}
	
}


/**
 * Returns forms with ajax
 */
if ( $sid >= 0 && is_admin() ) {
	echo $form_html;	
}
