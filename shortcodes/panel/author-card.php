<?php
/**
 * Form ID
 */
$form_id = 'uix_sc_form_authorcard';

/**
 * Form Type
 */
$form_type = [
    'list' => false
];



$args = 
	[
	
		array(
			'id'             => 'uix_sc_authorcard_primary_color',
			'title'          => __( 'Primary Color', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '#a2bf2f',
			'placeholder'    => '',
			'type'           => 'color',
			'default'        => [ '#a2bf2f', '#d59a3e', '#DD514C', '#FA9ADF', '#4BB1CF',  '#0E90D2', '#5F9EA0', '#473f3f',  '#bebebe' ]
		
		),

		array(
			'id'             => 'uix_sc_authorcard_avatar',
			'title'          => __( 'Author Picture', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => __( 'Avatar URL', 'uix-shortcodes' ),
			'type'           => 'image',
			'default'        => array(
									'remove_btn_text'  => __( 'Remove image', 'uix-shortcodes' ),
									'upload_btn_text'  => __( 'Upload', 'uix-shortcodes' ),
				                )
		
		),	
		

		
		array(
			'id'             => 'uix_sc_authorcard_name',
			'title'          => __( 'Author Name', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'text'
		
		),
	
		
		array(
			'id'             => 'uix_sc_authorcard_intro',
			'title'          => __( 'Biographical Info', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'textarea',
			'default'        => array(
									'row'     => 5,
									'format'  => true
								)
		
		),
	

		array(
			'id'             => 'uix_sc_authorcard_link_label',
			'title'          => __( 'Link Text', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => __( '&rarr;', 'uix-shortcodes' ),
			'placeholder'    => '',
			'type'           => 'text'
		
		),		
		array(
			'id'             => 'uix_sc_authorcard_link_link',
			'title'          => __( 'Link URL', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '#',
			'placeholder'    => 'URL',
			'type'           => 'text'
		
		),		



		array(
			'id'             => 'uix_sc_authorcard_1_url',
			'title'          => __( 'Social Network 1', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => __( 'Your Social Network Page URL 1', 'uix-shortcodes' ),
			'type'           => 'text',
			'default'        => ''
		
		),
		
		array(
			'id'             => 'uix_sc_authorcard_1_icon',
			'title'          => '',
			'desc'           => '',
			'value'          => '',
			'placeholder'    => __( 'Choose Social Icon 1', 'uix-shortcodes' ),
			'type'           => 'icon',
			'default'        => array(
									'social'  => true
								)
		
		),
		
		
		array(
			'id'             => 'uix_sc_authorcard_2_url',
			'title'          => __( 'Social Network 2', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => __( 'Your Social Network Page URL 2', 'uix-shortcodes' ),
			'type'           => 'text',
			'default'        => ''
		
		),
		
		array(
			'id'             => 'uix_sc_authorcard_2_icon',
			'title'          => '',
			'desc'           => '',
			'value'          => '',
			'placeholder'    => __( 'Choose Social Icon 2', 'uix-shortcodes' ),
			'type'           => 'icon',
			'default'        => array(
									'social'  => true
								)
		
		),
			
		
		array(
			'id'             => 'uix_sc_authorcard_3_url',
			'title'          => __( 'Social Network 3', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => __( 'Your Social Network Page URL 3', 'uix-shortcodes' ),
			'type'           => 'text',
			'default'        => ''
		
		),
		
		array(
			'id'             => 'uix_sc_authorcard_3_icon',
			'title'          => '',
			'desc'           => '',
			'value'          => '',
			'placeholder'    => __( 'Choose Social Icon 3', 'uix-shortcodes' ),
			'type'           => 'icon',
			'default'        => array(
									'social'  => true
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
		<?php echo UixShortcodes::sweetalert_before( $form_js, $form_html, $form_js_vars, $form_id, __( 'Insert An Author Card', 'uix-shortcodes' ) ); ?>
		
		        
	
				<?php echo UixShortcodes::send_to_editor_before( $form_id ); ?> "[uix_authorcard primarycolor='"+uix_sc_authorcard_primary_color+"' btnlabel='"+uix_htmlencodeToShortcodeFormat( uix_sc_authorcard_link_label )+"' btnurl='"+uix_sc_authorcard_link_link+"' name='"+uix_htmlencodeToShortcodeFormat( uix_sc_authorcard_name )+"' avatar='"+uix_sc_authorcard_avatar+"' social_1='"+uix_sc_authorcard_1_icon+"|"+uix_sc_authorcard_1_url+"' social_2='"+uix_sc_authorcard_2_icon+"|"+uix_sc_authorcard_2_url+"' social_3='"+uix_sc_authorcard_3_icon+"|"+uix_sc_authorcard_3_url+"' ]"+uix_sc_authorcard_intro+"<br>[/uix_authorcard]" <?php echo UixShortcodes::send_to_editor_after(); ?>
				
				
				
		   /* Callback after custom javascript of sweetalert */
		  <?php echo UixShortcodes::sweetalert_after(); ?>
				


	} ); 

	
	
} ) ( jQuery );

</script>
