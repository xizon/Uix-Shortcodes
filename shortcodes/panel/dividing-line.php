<?php
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
		<?php echo UixShortcodes::sweetalert_before( $form_js, $form_html, $form_js_vars, $form_id, __( 'Add a Dividing Line', 'uix-shortcodes' ) ); ?>
		        
				
				var uix_sc_dividing_line_result_color = '';
				
				if ( uix_sc_dividing_line_color == '#fff' ) uix_sc_dividing_line_result_color = 'light';
				if ( uix_sc_dividing_line_color == '#333' ) uix_sc_dividing_line_result_color = 'dark';
		      
			
				<?php echo UixShortcodes::send_to_editor( $form_id ); ?> "[uix_dividing_line style='"+uix_sc_dividing_line_style+"' color='"+uix_sc_dividing_line_result_color+"' width='"+uix_sc_dividing_line_width+uix_sc_dividing_line_width_units+"' opacity='"+uix_sc_dividing_line_opacity+"']" );
				
	
				
		   /* Callback after custom javascript of sweetalert */
		  <?php echo UixShortcodes::sweetalert_after(); ?>
				


	} ); 

	
	
} ) ( jQuery );

</script>
