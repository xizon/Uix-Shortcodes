<?php
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
		<?php echo UixShortcodes::sweetalert_before( $form_js, $form_html, $form_js_vars, $form_id, __( 'Add Share Buttons', 'uix-shortcodes' ) ); ?>
		
		   
		   
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
				 
				
			
				<?php echo UixShortcodes::send_to_editor_before( $form_id ); ?> "[uix_share_buttons color='"+uix_sc_share_btn_color+"' size='"+uix_sc_share_btn_size+"' fillet='"+uix_sc_share_btn_fillet+"px' show='"+show_checkboxes+"']" <?php echo UixShortcodes::send_to_editor_after(); ?>
				
				
				
		   /* Callback after custom javascript of sweetalert */
		  <?php echo UixShortcodes::sweetalert_after(); ?>
				


	} ); 

	
	
} ) ( jQuery );

</script>
