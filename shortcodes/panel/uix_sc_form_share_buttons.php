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
$form_id = 'uix_sc_form_share_buttons';

/**
 * Form Type
 */
$form_type = [
    'list' => false
];


$args = 
	[
	

	
		array(
			'id'             => 'uix_sc_share_btn_name',
			'title'          => __( 'Choose Type of Button', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => [ '1', '2', '3' ], //It takes a variable like [ ]  if the value is empty.
			'placeholder'    => '',
			'type'           => 'multiselect',
			'default'        => array(
									'1'  => 'facebook',
									'2'  => 'twitter',
									'3'  => 'google_plus',
									'4'  => 'pinterest'
	
				                )
		
		
		),
	
		array(
			'id'             => 'uix_sc_share_btn_fillet',
			'title'          => __( 'Fillet Radius', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '25',
			'placeholder'    => '',
			'type'           => 'short-text',
			'default'        => array(
									'units'  => 'px'
								)
		
		),	
		
		
		
		array(
			'id'             => 'uix_sc_share_btn_color',
			'title'          => __( 'Button Color', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 1,
			'placeholder'    => '',
			'type'           => 'radio',
			'default'        => array(
									'1'  => 'black',
									'2'  => 'multicolor'
								)
		
		),

		array(
			'id'             => 'uix_sc_share_btn_size',
			'title'          => __( 'Button Size', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 1,
			'placeholder'    => '',
			'type'           => 'radio',
			'default'        => array(
									'1'  => 'small',
									'2'  => 'large'
								)
		
		),
		
		
		array(
			'desc'           => __( 'It takes that unique url and share it on the social page automagically.', 'uix-shortcodes' ),
			'type'           => 'text'
		
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
				<?php echo UixSCFormCore::uixscform_callback( $form_js, $form_id, __( 'Add Share Buttons', 'uix-shortcodes' ) ); ?>					
				<?php echo UixSCFormCore::send_before( $form_js_vars, $form_id ); ?> 
				/*--**************** Custom shortcode begin ****************-- */
					/* Multiple Selector */
					var multiselectorArr = uix_sc_share_btn_name.split( ',' ),
						show_checkboxes = '';
					for ( var k=0; k < multiselectorArr.length; k++ ) {
						
						
						switch( multiselectorArr[k] ){ 
							case '1': 
								show_checkboxes += 'facebook,';
								
							break; 
							
							case '2': 
								show_checkboxes += 'twitter,';
							
							break; 
							
							case '3': 
								show_checkboxes += 'google_plus,';
							
							break; 	
							
							case '4': 
								show_checkboxes += 'pinterest,';
							
							break; 				
							
							default: 
	
						}
						
					}  
					show_checkboxes = show_checkboxes.substring( 0, show_checkboxes.length-1 );
					 
					
				
					code = "[uix_share_buttons color='"+uix_sc_share_btn_color+"' size='"+uix_sc_share_btn_size+"' fillet='"+uixscform_floatval( uix_sc_share_btn_fillet )+"px' show='"+show_checkboxes+"']";

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
