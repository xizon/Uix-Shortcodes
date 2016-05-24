<?php
/**
 * Form ID
 */
$form_id = 'uix_sc_form_bar';

/**
 * Form Type
 */
$form_type = [
    'list' => false
];


$args = 
	[
	
		array(
			'id'             => 'uix_sc_bar_shape',
			'title'          => __( 'Choose Style', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 'circular',
			'placeholder'    => '',
			'type'           => 'radio',
			'default'        => array(
									'circular'  => 'circular',
									'square'  => 'square'
								),
			/* if show the target item, the target id require class like "toggle-row toggle-row-show" */
			'toggle'        => array(
			                        array(
										'trigger_id'    => 'uix_sc_bar_shape-circular', /* {item id}-{option id} */
										'toggle_class'  => [ 'uix_sc_bar_circular_size_toggle_class' ]

									),
			                        array(
										'trigger_id'    => 'uix_sc_bar_shape-square', /* {item id}-{option id} */
										'toggle_class'  => [ 'uix_sc_bar_square_size_toggle_class' ]

									),
						
									
				                )		
								
		),
		
			array(
				'id'             => 'uix_sc_bar_circular_size',
				'title'          => __( 'Bar Size', 'uix-shortcodes' ),
				'desc'           => '',
				'value'          => '120',
				'class'          => 'toggle-row toggle-row-show uix_sc_bar_circular_size_toggle_class', /*class of toggle item */
				'placeholder'    => '',
				'type'           => 'short-text',
				'default'        => array(
										'units'  => 'px'
									)
			
			),
			
			array(
				'id'             => 'uix_sc_bar_square_size',
				'title'          => __( 'Bar Size', 'uix-shortcodes' ),
				'desc'           => '',
				'value'          => '100',
				'class'          => 'toggle-row uix_sc_bar_square_size_toggle_class', /*class of toggle item */
				'placeholder'    => '',
				'type'           => 'short-units-text',
				'default'        => array(
										'units'  => [ '%', 'px' ],
										'units_id'  => 'uix_sc_bar_square_size_units'
									)
			
			),	
			
		
	
		array(
			'id'             => 'uix_sc_bar_percent',
			'title'          => __( 'Percent', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 75,
			'placeholder'    => '',
			'type'           => 'short-text',
			'default'        => array(
									'units'  => '%'
								)
		
		),
	
		
		array(
			'id'             => 'uix_sc_bar_perc_icons_size',
			'title'          => __( 'Percentage & Icon Size', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '12',
			'placeholder'    => '',
			'type'           => 'short-text',
			'default'        => array(
									'units'  => 'px'
								)
		
		),	
		
		array(
			'id'             => 'uix_sc_bar_linewidth',
			'title'          => __( 'Line Width', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 3,
			'placeholder'    => '',
			'type'           => 'short-text',
			'default'        => array(
									'units'  => 'px'
								)
		
		),
		
		array(
			'id'             => 'uix_sc_bar_icon_toggle',
			'title'          => __( 'Icon', 'uix-shortcodes' ),
			'desc'           => __( 'Using Icon instead of percentage.', 'uix-shortcodes' ),
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'checkbox',
			'default'        => array(
									'checked'  => false
				                ),
			/* if show the target item, the target id require class like "toggle-row toggle-row-show" */
			'toggle'        => array(
									'trigger_id'  => 'uix_sc_bar_icon_toggle', /* {item id}-{option id} */
									'toggle_class'  => [ 'uix_sc_bar_icon_toggle_class', 'uix_sc_bar_iconsize_toggle_class' ]
				                )	
		
		
		),	
		
			array(
				'id'             => 'uix_sc_bar_icon',
				'title'          => '',
				'desc'           => '',
				'value'          => '',
				'class'          => 'toggle-row uix_sc_bar_icon_toggle_class', /*class of toggle item */
				'placeholder'    => '',
				'type'           => 'icon',
				'default'        => array(
										'social'  => false
									)
			
			),	
			
		array(
			'id'             => 'uix_sc_bar_color',
			'title'          => __( 'Bar Color', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '#a2bf2f',
			'placeholder'    => '',
			'type'           => 'color',
			'default'        => [ '#fffff0', '#f5f5dc', '#f5deb3', '#d2b48c', '#c3b091', '#c0c0c0', '#808080', '#464646', '#333333', '#000080', '#084c9e', '#007fff', '#0E90D2', '#4BB1CF', '#5F9EA0', '#00ffff', '#7fffd4', '#008080', '#228b22', '#808000', '#a2bf2f', '#7fff00', '#bfff00', '#ffd700', '#daa520', '#ff7f50', '#fa8072', '#fc0fc0', '#ff77ff', '#e0b0ff', '#b57edc', '#843179', '#E1A0A1', '#D84F51', '#dc143c', '#990002' ,'#800000' ]
		
		),
		
		//------toggle begin
		array(
			'id'             => 'uix_sc_bar_color_toggle',
			'title'          => '',
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'toggle',
			'default'        => array(
			                        'btn_text'      => __( 'other color', 'uix-shortcodes' ),
									'toggle_class'  => [ 'uix_sc_bar_color_other_class' ]
				                )
		
		),	
			
			array(
				'id'             => 'uix_sc_bar_color_other',
				'title'          => '',
				'desc'           => '',
				'value'          => '',
				'class'          => 'toggle-row uix_sc_bar_color_other_class', /*class of toggle item */
				'placeholder'    => '',
				'type'           => 'colormap',
				'default'        => array(
										'swatches' => 1
									)
			
			
			),	
	
	
		array(
			'id'             => 'uix_sc_bar_trackcolor',
			'title'          => __( 'Track color', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '#f1f1f1',
			'placeholder'    => '',
			'type'           => 'color',
			'default'        => [ '#ffffff', '#473f3f',  '#bebebe', '#dcdcdc', '#f1f1f1' ]
		
		),
		
		//------toggle begin
		array(
			'id'             => 'uix_sc_bar_trackcolor_toggle',
			'title'          => '',
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'toggle',
			'default'        => array(
			                        'btn_text'      => __( 'other color', 'uix-shortcodes' ),
									'toggle_class'  => [ 'uix_sc_bar_trackcolor_other_class' ]
				                )
		
		),	
			
			array(
				'id'             => 'uix_sc_bar_trackcolor_other',
				'title'          => '',
				'desc'           => '',
				'value'          => '',
				'class'          => 'toggle-row uix_sc_bar_trackcolor_other_class', /*class of toggle item */
				'placeholder'    => '',
				'type'           => 'colormap',
				'default'        => array(
										'swatches' => 1
									)
			
			
			),	
	
	
		array(
			'id'             => 'uix_sc_bar_percent_icon_color',
			'title'          => __( 'Percentage & Icon Color', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '#473f3f',
			'placeholder'    => '',
			'type'           => 'color',
			'default'        => [ '#ffffff', '#473f3f',  '#bebebe', '#dcdcdc', '#f1f1f1' ]
		
		),
		
		//------toggle begin
		array(
			'id'             => 'uix_sc_bar_percent_icon_color_toggle',
			'title'          => '',
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'toggle',
			'default'        => array(
			                        'btn_text'      => __( 'other color', 'uix-shortcodes' ),
									'toggle_class'  => [ 'uix_sc_bar_percent_icon_color_other_class' ]
				                )
		
		),	
			
			array(
				'id'             => 'uix_sc_bar_percent_icon_color_other',
				'title'          => '',
				'desc'           => '',
				'value'          => '',
				'class'          => 'toggle-row uix_sc_bar_percent_icon_color_other_class', /*class of toggle item */
				'placeholder'    => '',
				'type'           => 'colormap',
				'default'        => array(
										'swatches' => 1
									)
			
			
			),	
	
	    array(
			'id'             => 'uix_sc_bar_title',
			'title'          => __( 'Title', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'text'
		),	
		
		
	    array(
			'id'             => 'uix_sc_bar_desc',
			'title'          => __( 'Description', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'textarea',
			'default'        => array(
									'row'     => 2,
									'format'  => true
								)
		),	
		

		array(
			'id'             => 'uix_sc_bar_show_units',
			'title'          => __( 'Displayed Units', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '%',
			'placeholder'    => '',
			'type'           => 'text'
		
		),
		
		array(
			'id'             => 'uix_sc_bar_margin',
			'title'          => __( 'Margin (px)', 'uix-shortcodes' ),
			'desc'           => __( 'Use the input fields below to customize the margin of progress bar.', 'uix-shortcodes' ),
			'value'          => array(
									'top'  => 25,
									'right'  => 25,
									'bottom'  => 0,
									'left'  => 25
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
 * Add simulation bars
 */
echo UixShortcodes::add_form( $form_id, '', '', 'active_btn' );
?>		


<script type="text/javascript">

( function($) {
    
	$( document ).ready( function() {
		
		 /* Callback before custom javascript of sweetalert */
		<?php echo UixShortcodes::sweetalert_before( $form_js, $form_html, $form_js_vars, $form_id, __( 'Add a Progress Bar', 'uix-shortcodes' ) ); ?>
	
		        
				var  uix_sc_bar_result_color = ( uix_sc_bar_color_other != '' ) ? uix_sc_bar_color_other : uix_sc_bar_color,
				     uix_sc_bar_result_trackcolor = ( uix_sc_bar_trackcolor_other != '' ) ? uix_sc_bar_trackcolor_other : uix_sc_bar_trackcolor,
					 uix_sc_bar_result_percent_icon_color = ( uix_sc_bar_percent_icon_color_other != '' ) ? uix_sc_bar_percent_icon_color_other : uix_sc_bar_percent_icon_color,
					 uix_sc_bar_result_icon = ( uix_sc_bar_icon_toggle === true ) ? "icon='"+uix_sc_bar_icon+"'" : '',
					 uix_sc_bar_result_size = ( uix_sc_bar_shape == 'circular' ) ? "size='"+uix_sc_bar_circular_size+"px'" : "size='"+uix_sc_bar_square_size+""+uix_sc_bar_square_size_units+"'";
				
	
				<?php echo UixShortcodes::send_to_editor_before( $form_id ); ?> "[uix_progress_bar barcolor='"+uix_sc_bar_result_color+"' trackcolor='"+uix_sc_bar_result_trackcolor+"' preccolor='"+uix_sc_bar_result_percent_icon_color+"' "+uix_sc_bar_result_size+" shape='"+uix_sc_bar_shape+"' percent='"+uix_sc_bar_percent+"' units='"+uix_sc_bar_show_units+"' linewidth='"+uix_sc_bar_linewidth+"' precsize='"+uix_sc_bar_perc_icons_size+"px' title='"+uix_htmlencodeToShortcodeFormat( uix_sc_bar_title )+"' "+uix_sc_bar_result_icon+" top='"+uix_sc_bar_margin_top+"' bottom='"+uix_sc_bar_margin_bottom+"' left='"+uix_sc_bar_margin_left+"' right='"+uix_sc_bar_margin_right+"']"+uix_sc_bar_desc+"[/uix_progress_bar]" <?php echo UixShortcodes::send_to_editor_after(); ?>
				
				
				
		   /* Callback after custom javascript of sweetalert */
		  <?php echo UixShortcodes::sweetalert_after(); ?>
				


	} ); 

	
	
} ) ( jQuery );

</script>
