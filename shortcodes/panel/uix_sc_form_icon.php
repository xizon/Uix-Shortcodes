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
$form_id = 'uix_sc_form_icon';

/**
 * Form Type
 */
$form_type = [
    'list' => false
];


$args = 
	[
	
	 
		array(
			'id'             => 'uix_sc_icon_color',
			'title'          => __( 'Color', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '#333333',
			'placeholder'    => '',
			'type'           => 'color',
			'default'        => [ '#fffff0', '#f5f5dc', '#f5deb3', '#d2b48c', '#c3b091', '#c0c0c0', '#808080', '#464646', '#333333', '#000080', '#084c9e', '#007fff', '#0E90D2', '#4BB1CF', '#5F9EA0', '#00ffff', '#7fffd4', '#008080', '#228b22', '#808000', '#a2bf2f', '#7fff00', '#bfff00', '#ffd700', '#daa520', '#ff7f50', '#fa8072', '#fc0fc0', '#ff77ff', '#e0b0ff', '#b57edc', '#843179', '#E1A0A1', '#D84F51', '#dc143c', '#990002' ,'#800000' ]
		
		),
		
		//------toggle begin
		array(
			'id'             => 'uix_sc_icon_color_toggle',
			'title'          => '',
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'toggle',
			'default'        => array(
			                        'btn_text'      => __( 'other color', 'uix-shortcodes' ),
									'toggle_class'  => [ 'uix_sc_icon_color_other_class' ]
				                )
		
		),	
			
			array(
				'id'             => 'uix_sc_icon_color_other',
				'title'          => '',
				'desc'           => '',
				'value'          => '',
				'class'          => 'toggle-row uix_sc_icon_color_other_class', /*class of toggle item */
				'placeholder'    => '',
				'type'           => 'colormap',
				'default'        => array(
										'swatches' => 1
									)
			
			
			),	
		
		array(
			'id'             => 'uix_sc_icon_name',
			'title'          => __( 'Icon&apos;s Name', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'icon',
			'default'        => array(
			                        'social'  => false
				                )
		
		),
	    array(
			'id'             => 'uix_sc_icon_size',
			'title'          => __( 'Size', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '14',
			'placeholder'    => '',
			'type'           => 'short-text',
			'default'        => array(
									'units'  => 'px'
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
				<?php echo UixSCFormCore::uixscform_callback( $form_js, $form_id, __( 'Add a Icon', 'uix-shortcodes' ) ); ?> 
				<?php echo UixSCFormCore::send_before( $form_js_vars, $form_id ); ?> 
				/*--**************** Custom shortcode begin ****************-- */
					
					var uix_sc_icon_result_color = ( uix_sc_icon_color_other != '' ) ? uix_sc_icon_color_other : uix_sc_icon_color;
					
					code = "[uix_icons size='"+uix_sc_icon_size+"' units='px' color='"+uix_sc_icon_result_color+"' name='"+uix_sc_icon_name+"']";
					
					
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
