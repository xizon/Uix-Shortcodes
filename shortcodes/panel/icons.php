<?php
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
		<?php echo UixShortcodes::sweetalert_before( $form_js, $form_html, $form_js_vars, $form_id, __( 'Add a Icon', 'uix-shortcodes' ) ); ?>
		
		        
				var uix_sc_icon_result_color = ( uix_sc_icon_color_other != '' ) ? uix_sc_icon_color_other : uix_sc_icon_color;
	
			
				window.send_to_editor( "[uix_icons size='"+uix_sc_icon_size+"' units='px' color='"+uix_sc_icon_result_color+"' name='"+uix_sc_icon_name+"']" );
				
				
				
		   /* Callback after custom javascript of sweetalert */
		  <?php echo UixShortcodes::sweetalert_after(); ?>
				


	} ); 

	
	
} ) ( jQuery );

</script>
