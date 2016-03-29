<?php
/**
 * Form ID
 */
$form_id = 'uix_sc_contact_form';

/**
 * Form Type
 */
$form_type = [
    'list' => false
];

$args = 
	[
	
	
		array(
			'desc'           => __( 'Tips: Output a complete commenting form for use within a template. ', 'uix-shortcodes' ),
			'type'           => 'text'
		
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
		<?php echo UixShortcodes::sweetalert_before( $form_js, $form_html, $form_js_vars, $form_id, __( 'Insert Contact Form', 'uix-shortcodes' ) ); ?>
	
	
				window.send_to_editor( "[uix_contact_form]" );
				
				
				
		   /* Callback after custom javascript of sweetalert */
		  <?php echo UixShortcodes::sweetalert_after(); ?>
				


	} ); 

	
	
} ) ( jQuery );

</script>

