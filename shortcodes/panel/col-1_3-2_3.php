<?php
/**
 * Form ID
 */
$form_id = 'uix_sc_form_column_1_3__2_3';

/**
 * Form Type
 */
$form_type = [
    'list' => false
];

$args = 
	[
	
	    array(
			'id'             => 'uix_sc_col_1_3__2_3_padding',
			'title'          => __( 'Padding (px)', 'uix-shortcodes' ),
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
		<?php echo UixShortcodes::sweetalert_before( $form_js, $form_html, $form_js_vars, $form_id, __( 'Column Two Third (last)', 'uix-shortcodes' ) ); ?>
		
	
			
				/* Output */
				_vhtml = '';
				_vhtml += "<br>[uix_column grid='3']<p><?php _e( 'Some content for this column.', 'uix-shortcodes' ); ?></p>[/uix_column]";
				_vhtml += "<br>[uix_column grid='9' last='1']<p><?php _e( 'Some content for this column.', 'uix-shortcodes' ); ?></p>[/uix_column]<br>";
				

				<?php echo UixShortcodes::send_to_editor_before( $form_id ); ?> "[uix_column_wrapper top='"+uix_sc_col_1_3__2_3_padding_top+"' bottom='"+uix_sc_col_1_3__2_3_padding_bottom+"' left='"+uix_sc_col_1_3__2_3_padding_left+"' right='"+uix_sc_col_1_3__2_3_padding_right+"']" + _vhtml + "[/uix_column_wrapper]" <?php echo UixShortcodes::send_to_editor_after(); ?>
				
				
				
		   /* Callback after custom javascript of sweetalert */
		  <?php echo UixShortcodes::sweetalert_after(); ?>
				


	} ); 

	
	
} ) ( jQuery );

</script>
