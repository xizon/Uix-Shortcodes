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
$form_id = 'uix_sc_form_column_1_4__3_4';

/**
 * Form Type
 */
$form_type = [
    'list' => false
];

$args = 
	[
	
	    array(
			'id'             => 'uix_sc_col_1_4__3_4_padding',
			'title'          => __( 'Padding', 'uix-shortcodes' ),
			'desc'           => __( 'Use the input fields below to customize the padding of your column shortcode. Measurement units is pixels (px).', 'uix-shortcodes' ),
			'value'          => array(
									'top'  => 20,
									'right'  => 0,
									'bottom'  => 20,
									'left'  => 0
				                ),
			'placeholder'    => '',
			'type'           => 'margin',
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
	if( $currentScreen->base === "post" || $currentScreen->base === "widgets" || $currentScreen->base === "customize" || self::inc_str( $currentScreen->base, '_page_' ) ) {
	  	  
		if ( is_admin()) {
			
			echo UixSCFormCore::add_form( $cid, $sid, $form_id, '', '', 'active_btn' );
			?>
			<script type="text/javascript">
			( function($) {
			'use strict';
				$( function() {  
					<?php echo UixSCFormCore::uixscform_callback( $form_js, $form_id, __( 'Column Three Fourth (last)', 'uix-shortcodes' ) ); ?>					
					<?php echo UixSCFormCore::send_before( $form_js_vars, $form_id ); ?> 
					/*--**************** Custom shortcode begin ****************-- */
						
						/* Output */
						_vhtml = '';
						_vhtml += "<br>[uix_column grid='4']<p><?php _e( 'Some content for this column.', 'uix-shortcodes' ); ?></p>[/uix_column]";
						_vhtml += "<br>[uix_column grid='8' last='1']<p><?php _e( 'Some content for this column.', 'uix-shortcodes' ); ?></p>[/uix_column]<br>";
						
		
						code = "[uix_column_wrapper top='"+uix_sc_col_1_4__3_4_padding_top+"' bottom='"+uix_sc_col_1_4__3_4_padding_bottom+"' left='"+uix_sc_col_1_4__3_4_padding_left+"' right='"+uix_sc_col_1_4__3_4_padding_right+"']" + _vhtml + "[/uix_column_wrapper]";

						
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
