<?php 



/*
 * Expansion module of development (DEMO modules)
 * 
 */
if ( UixShortcodes::DEMOFORM == 1 ) {
	$module_uix_sc_demo_modules = array(
		'sortname'        => esc_html__( 'Demo', 'uix-shortcodes' ).'<span> '. esc_html__( 'Just development mode display, please configure "uix-shortcodes.php" file.', 'uix-shortcodes' ).'</span>',
		'modules'         => array(

								array(
									'title'           => esc_html__( 'Hello Form', 'uix-shortcodes' ),
									'id'              => 'uix_sc_module_sample_hello.php',
									'thumb'           => 'uix_sc_module_sample_hello.jpg',
								
								),			
		
								array(
									'title'           => esc_html__( 'Column Form', 'uix-shortcodes' ),
									'id'              => 'uix_sc_module_sample_hello2.php',
									'thumb'           => 'uix_sc_module_sample_hello2.jpg',
								
								),		
		
				
							)
	
	);
	
} else {
	$module_uix_sc_demo_modules = array(
		'sortname'        => '',
		'modules'         => ''
	);
}


	


/*
 * Add the required modules to the shortcode modules
 * 
 */
$uix_sc_modules_config = array(
	
    $module_uix_sc_demo_modules,
	
	
	array(
		'sortname'        => esc_html__( 'Container/Parallax', 'uix-shortcodes' ),
		'modules'         => array(

	
								array(
									'title'           => esc_html__( 'Container/Parallax', 'uix-shortcodes' ),
									'id'              => 'uix_sc_module_container.php',
									'thumb'           => 'uix_sc_module_container.jpg',
								
								),							
								
				
							)
	
	),

	
	array(
		'sortname'        => esc_html__( 'Content', 'uix-shortcodes' ),
		'modules'         => array(
	
								array(
									'title'           => esc_html__( 'Recent Posts', 'uix-shortcodes' ),
									'id'              => 'uix_sc_module_recent_posts.php',
									'thumb'           => 'uix_sc_module_recent_posts.jpg',
								
								),
	
								array(
									'title'           => esc_html__( 'Pricing 3 Column', 'uix-shortcodes' ),
									'id'              => 'uix_sc_module_pricing_col3.php',
									'thumb'           => 'uix_sc_module_pricing_col3.jpg',
								
								),
	
								array(
									'title'           => esc_html__( 'Pricing 4 Column', 'uix-shortcodes' ),
									'id'              => 'uix_sc_module_pricing_col4.php',
									'thumb'           => 'uix_sc_module_pricing_col4.jpg',
								
								),
	
								array(
									'title'           => esc_html__( 'Accordion', 'uix-shortcodes' ),
									'id'              => 'uix_sc_module_accordion.php',
									'thumb'           => 'uix_sc_module_accordion.jpg',
								
								),
	
	
								array(
									'title'           => esc_html__( 'Tabs', 'uix-shortcodes' ),
									'id'              => 'uix_sc_module_tabs.php',
									'thumb'           => 'uix_sc_module_tabs.jpg',
								
								),
	
	
								array(
									'title'           => esc_html__( 'Portfolio', 'uix-shortcodes' ),
									'id'              => 'uix_sc_module_portfolio_grid.php',
									'thumb'           => 'uix_sc_module_portfolio_grid.jpg',
								
								),
	
	
								array(
									'title'           => esc_html__( 'Team Full Width', 'uix-shortcodes' ),
									'id'              => 'uix_sc_module_team_fullwidth.php',
									'thumb'           => 'uix_sc_module_team_fullwidth.jpg',
								
								),
	
	
								array(
									'title'           => esc_html__( 'Team Grid', 'uix-shortcodes' ),
									'id'              => 'uix_sc_module_team_grid.php',
									'thumb'           => 'uix_sc_module_team_grid.jpg',
								
								),
	
								array(
									'title'           => esc_html__( 'Features 2 Column', 'uix-shortcodes' ),
									'id'              => 'uix_sc_module_features_col2.php',
									'thumb'           => 'uix_sc_module_features_col2.jpg',
								
								),
	
	
								array(
									'title'           => esc_html__( 'Features 3 Column', 'uix-shortcodes' ),
									'id'              => 'uix_sc_module_features_col3.php',
									'thumb'           => 'uix_sc_module_features_col3.jpg',
								
								),
	
	
								array(
									'title'           => esc_html__( 'Client', 'uix-shortcodes' ),
									'id'              => 'uix_sc_module_client.php',
									'thumb'           => 'uix_sc_module_client.jpg',
								
								),
	
	
								array(
									'title'           => esc_html__( 'Testimonials Carousel', 'uix-shortcodes' ),
									'id'              => 'uix_sc_module_testimonials.php',
									'thumb'           => 'uix_sc_module_testimonials.jpg',
								
								),
	
								array(
									'title'           => esc_html__( 'Video', 'uix-shortcodes' ),
									'id'              => 'uix_sc_module_video.php',
									'thumb'           => 'uix_sc_module_video.jpg',
								
								),
	
	
								array(
									'title'           => esc_html__( 'Audio', 'uix-shortcodes' ),
									'id'              => 'uix_sc_module_audio.php',
									'thumb'           => 'uix_sc_module_audio.jpg',
								
								),
	
	
								array(
									'title'           => esc_html__( 'Author Card', 'uix-shortcodes' ),
									'id'              => 'uix_sc_module_authorcard.php',
									'thumb'           => 'uix_sc_module_authorcard.jpg',
								
								),
	
	
								array(
									'title'           => esc_html__( 'Image Slider', 'uix-shortcodes' ),
									'id'              => 'uix_sc_module_imageslider.php',
									'thumb'           => 'uix_sc_module_imageslider.jpg',
								
								),
	
								array(
									'title'           => esc_html__( 'Timeline', 'uix-shortcodes' ),
									'id'              => 'uix_sc_module_timeline.php',
									'thumb'           => 'uix_sc_module_timeline.jpg',
								
								),
	
	
				
							)
	
	),

	
	

	array(
		'sortname'        => esc_html__( 'Column', 'uix-shortcodes' ),
		'modules'         => array(
		
	
							
								array(
									'title'           => esc_html__( '1/4 1/4 1/4 1/4', 'uix-shortcodes' ),
									'id'              => 'uix_sc_module_column_average_4.php',
									'thumb'           => 'uix_sc_module_column_average_4.jpg',
								
								),
	
	
								array(
									'title'           => esc_html__( '1/3 1/3 1/3', 'uix-shortcodes' ),
									'id'              => 'uix_sc_module_column_average_3.php',
									'thumb'           => 'uix_sc_module_column_average_3.jpg',
								
								),
	
	
								array(
									'title'           => esc_html__( '1/2 1/2', 'uix-shortcodes' ),
									'id'              => 'uix_sc_module_column_average_2.php',
									'thumb'           => 'uix_sc_module_column_average_2.jpg',
								
								),
	
	
								array(
									'title'           => esc_html__( '1/3 2/3', 'uix-shortcodes' ),
									'id'              => 'uix_sc_module_column_1_3__2_3.php',
									'thumb'           => 'uix_sc_module_column_1_3__2_3.jpg',
								
								),
	
	
								array(
									'title'           => esc_html__( '2/3 1/3', 'uix-shortcodes' ),
									'id'              => 'uix_sc_module_column_2_3__1_3.php',
									'thumb'           => 'uix_sc_module_column_2_3__1_3.jpg',
								
								),
	
	
								array(
									'title'           => esc_html__( '1/4 3/4', 'uix-shortcodes' ),
									'id'              => 'uix_sc_module_column_1_4__3_4.php',
									'thumb'           => 'uix_sc_module_column_1_4__3_4.jpg',
								
								),
	
	
								array(
									'title'           => esc_html__( '3/4 1/4', 'uix-shortcodes' ),
									'id'              => 'uix_sc_module_column_3_4__1_4.php',
									'thumb'           => 'uix_sc_module_column_3_4__1_4.jpg',
								
								),
	
	
							
							)
	
	),		
	



	
	array(
		'sortname'        => esc_html__( 'Web Elements', 'uix-shortcodes' ),
		'modules'         => array(
		
	
							
								array(
									'title'           => esc_html__( 'Special Heading', 'uix-shortcodes' ),
									'id'              => 'uix_sc_module_heading.php',
									'thumb'           => 'uix_sc_module_heading.jpg',
								
								),
	
	
								array(
									'title'           => esc_html__( 'Dividing Line', 'uix-shortcodes' ),
									'id'              => 'uix_sc_module_dividing_line.php',
									'thumb'           => 'uix_sc_module_dividing_line.jpg',
								
								),
	
	
								array(
									'title'           => esc_html__( 'Button', 'uix-shortcodes' ),
									'id'              => 'uix_sc_module_button.php',
									'thumb'           => 'uix_sc_module_button.jpg',
								
								),
	
	
								array(
									'title'           => esc_html__( 'Share Buttons', 'uix-shortcodes' ),
									'id'              => 'uix_sc_module_share_buttons.php',
									'thumb'           => 'uix_sc_module_share_buttons.jpg',
								
								),
	
	
								array(
									'title'           => esc_html__( 'Icon', 'uix-shortcodes' ),
									'id'              => 'uix_sc_module_icon.php',
									'thumb'           => 'uix_sc_module_icon.jpg',
								
								),
	
	
								array(
									'title'           => esc_html__( 'Progress Bar', 'uix-shortcodes' ),
									'id'              => 'uix_sc_module_bar.php',
									'thumb'           => 'uix_sc_module_bar.jpg',
								
								),
	
	
								array(
									'title'           => esc_html__( 'Google Map', 'uix-shortcodes' ),
									'id'              => 'uix_sc_module_map.php',
									'thumb'           => 'uix_sc_module_map.jpg',
								
								),
	
	
								array(
									'title'           => esc_html__( 'Contact Form', 'uix-shortcodes' ),
									'id'              => 'uix_sc_module_contact_form.php',
									'thumb'           => 'uix_sc_module_contact_form.jpg',
								
								),
	
	
										
							
							)
	
	),		
	
	array(
		'sortname'        => esc_html__( 'Source Code', 'uix-shortcodes' ),
		'modules'         => array(
		
								array(
									'title'           => esc_html__( 'Source Code', 'uix-shortcodes' ),
									'id'              => 'uix_sc_module_code.php',
									'thumb'           => 'uix_sc_module_code.jpg',
								
								),
										
							
							)
	
	),			
);


