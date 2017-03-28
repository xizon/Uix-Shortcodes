<?php
if ( !class_exists( 'UixShortcodes' ) ) {
    return;
}

/**
 * Initialize sections template parameters
 * ----------------------------------------------------
 */
$form_vars = UixShortcodes::init_template_parameters( 'uix_sc_form_bar' );
if ( !is_array( $form_vars ) ) return;
foreach ( $form_vars as $key => $v ) :
	$$key = $v;
endforeach;



/**
 * Form Type
 */
$form_type = array(
    'list' => false
);


$args = 
	array(
	
		array(
			'id'             => 'uix_sc_bar_shape',
			'title'          => esc_html__( 'Choose Style', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 'circular',
			'placeholder'    => '',
			'type'           => 'radio',
			'default'        => array(
									'circular'  => 'circular',
									'square'  => 'square'
								),
			/* If the toggle of switch with radio is enabled, the target id require class like "toggle-row" */
			'toggle'        => array(
			                        array(
										'trigger_id'           => 'uix_sc_bar_shape-circular', /* {item id}-{option id} */
										'toggle_class'         => array( 'uix_sc_bar_circular_size_toggle_class' ),
										'toggle_remove_class'  => array( 'uix_sc_bar_square_size_toggle_class' )

									),
			                        array(
										'trigger_id'           => 'uix_sc_bar_shape-square', /* {item id}-{option id} */
										'toggle_class'         => array( 'uix_sc_bar_square_size_toggle_class' ),
										'toggle_remove_class'  => array( 'uix_sc_bar_circular_size_toggle_class' )

									),
						
									
				                )		
								
		),
		
			array(
				'id'             => 'uix_sc_bar_circular_size',
				'title'          => esc_html__( 'Bar Size', 'uix-shortcodes' ),
				'desc'           => '',
				'value'          => '120',
				'class'          => 'toggle-row uix_sc_bar_circular_size_toggle_class', /*class of toggle item */
				'placeholder'    => '',
				'type'           => 'short-text',
				'default'        => array(
										'units'  => 'px'
									)
			
			),
			
			array(
				'id'             => 'uix_sc_bar_square_size',
				'title'          => esc_html__( 'Bar Size', 'uix-shortcodes' ),
				'desc'           => '',
				'value'          => '100',
				'class'          => 'toggle-row uix_sc_bar_square_size_toggle_class', /*class of toggle item */
				'placeholder'    => '',
				'type'           => 'short-units-text',
				'default'        => array(
										'units'  => array( '%', 'px' ),
										'units_id'  => 'uix_sc_bar_square_size_units'
									)
			
			),	
			
		
	
		array(
			'id'             => 'uix_sc_bar_percent',
			'title'          => esc_html__( 'Percent', 'uix-shortcodes' ),
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
			'title'          => esc_html__( 'Percentage & Icon Size', 'uix-shortcodes' ),
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
			'title'          => esc_html__( 'Line Width', 'uix-shortcodes' ),
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
			'title'          => esc_html__( 'Icon', 'uix-shortcodes' ),
			'desc'           => esc_html__( 'Using Icon instead of percentage.', 'uix-shortcodes' ),
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'checkbox',
			'default'        => array(
									'checked'  => false
				                ),
			/* If the toggle of switch with checkbox is enabled, the target id require class like "toggle-row" */
			'toggle'        => array(
									'trigger_id'  => 'uix_sc_bar_icon_toggle', /* {item id}-{option id} */
									'toggle_class'  => array( 'uix_sc_bar_icon_toggle_class', 'uix_sc_bar_iconsize_toggle_class' )
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
			'title'          => esc_html__( 'Bar Color', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '#a2bf2f',
			'placeholder'    => '',
			'type'           => 'color',
			'default'        => array( '#fffff0', '#f5f5dc', '#f5deb3', '#d2b48c', '#c3b091', '#c0c0c0', '#808080', '#464646', '#333333', '#000080', '#084c9e', '#007fff', '#0E90D2', '#4BB1CF', '#5F9EA0', '#00ffff', '#7fffd4', '#008080', '#228b22', '#808000', '#a2bf2f', '#7fff00', '#bfff00', '#ffd700', '#daa520', '#ff7f50', '#fa8072', '#fc0fc0', '#ff77ff', '#e0b0ff', '#b57edc', '#843179', '#E1A0A1', '#D84F51', '#dc143c', '#990002' ,'#800000' )
		
		),
		
		
	
	
		array(
			'id'             => 'uix_sc_bar_trackcolor',
			'title'          => esc_html__( 'Track color', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '#f1f1f1',
			'placeholder'    => '',
			'type'           => 'color',
			'default'        => array( '#ffffff', '#473f3f',  '#bebebe', '#dcdcdc', '#f1f1f1' )
		
		),
	
	
		array(
			'id'             => 'uix_sc_bar_percent_icon_color',
			'title'          => esc_html__( 'Percentage & Icon Color', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '#473f3f',
			'placeholder'    => '',
			'type'           => 'color',
			'default'        => array( '#ffffff', '#473f3f',  '#bebebe', '#dcdcdc', '#f1f1f1' )
		
		),
		
	
	    array(
			'id'             => 'uix_sc_bar_title',
			'title'          => esc_html__( 'Title', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => esc_html__( 'Title', 'uix-shortcodes' ),
			'placeholder'    => '',
			'type'           => 'text'
		),	
		
		
	    array(
			'id'             => 'uix_sc_bar_desc',
			'title'          => esc_html__( 'Description', 'uix-shortcodes' ),
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
			'title'          => esc_html__( 'Displayed Units', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '%',
			'placeholder'    => '',
			'type'           => 'text'
		
		),
		

	
	)
;

/**
 * Returns form javascripts
 * ----------------------------------------------------
 */
UixShortcodes::form_scripts( array(
	    'clone'                   => '',
		'form_id'                 => $form_id,
		'section_id'              => $sid,
	    'content_id'              => $cid,
		'fields'                  => array(
										array(
											 'type'    => $form_type,
											 'values'  => $args
										),

									),
		'title'                   => esc_html__( 'Progress Bar', 'uix-shortcodes' ),
	    'js_template'             => '
		
			var  uix_sc_bar_result_color = uix_sc_bar_color,
				 uix_sc_bar_result_trackcolor = uix_sc_bar_trackcolor,
				 uix_sc_bar_result_percent_icon_color = uix_sc_bar_percent_icon_color,
				 uix_sc_bar_result_icon = ( uix_sc_bar_icon != \'\' ) ? "icon=\'"+uix_sc_bar_icon+"\'" : \'\',
				 uix_sc_bar_result_size = ( uix_sc_bar_shape == \'circular\' ) ? "size=\'"+uixscform_floatval( uix_sc_bar_circular_size )+"px\'" : "size=\'"+uixscform_floatval( uix_sc_bar_square_size )+""+uix_sc_bar_square_size_units+"\'";


			code = "[uix_progress_bar barcolor=\'"+uix_sc_bar_result_color+"\' trackcolor=\'"+uix_sc_bar_result_trackcolor+"\' preccolor=\'"+uix_sc_bar_result_percent_icon_color+"\' "+uix_sc_bar_result_size+" shape=\'"+uix_sc_bar_shape+"\' percent=\'"+uixscform_floatval( uix_sc_bar_percent )+"\' units=\'"+uix_sc_bar_show_units+"\' linewidth=\'"+uixscform_floatval( uix_sc_bar_linewidth )+"\' precsize=\'"+uixscform_floatval( uix_sc_bar_perc_icons_size )+"px\' title=\'"+uixscform_shortcodeHTMLEcode( uix_sc_bar_title )+"\' "+uix_sc_bar_result_icon+"]"+uix_sc_bar_desc+"[/uix_progress_bar]";
		
		'
    )
);

