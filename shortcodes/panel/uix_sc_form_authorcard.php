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


$form_html = UixSCFormCore::add_form( $cid, $sid, $form_id, $form_type, $args, 'html' );
$form_js = UixSCFormCore::add_form( $cid, $sid, $form_id, $form_type, $args, 'js' );
$form_js_vars = UixSCFormCore::add_form( $cid, $sid, $form_id, $form_type, $args, 'js_vars' );





/**
 * Returns actions of javascript
 */

if ( $sid == -1 && is_admin() ) {
	$currentScreen = get_current_screen();
	if( $currentScreen->base === "post" || $currentScreen->base === "widgets" || $currentScreen->base === "customize" || UixSCFormCore::inc_str( $currentScreen->base, '_page_' ) ) {
	
			
		
		?>
		<script type="text/javascript">
		( function($) {
		'use strict';
			$( function() {  
				<?php echo UixSCFormCore::uixscform_callback( $form_js, $form_id, __( 'Insert An Author Card', 'uix-shortcodes' ) ); ?>					<?php echo UixSCFormCore::send_before( $form_js_vars, $form_id ); ?> 
				/*--**************** Custom shortcode begin ****************-- */
					
					code = "[uix_authorcard primarycolor='"+uix_sc_authorcard_primary_color+"' btnlabel='"+uixscform_htmlencodeFormat( uix_sc_authorcard_link_label )+"' btnurl='"+uix_sc_authorcard_link_link+"' name='"+uixscform_htmlencodeFormat( uix_sc_authorcard_name )+"' avatar='"+uix_sc_authorcard_avatar+"' social_1='"+uix_sc_authorcard_1_icon+"|"+uix_sc_authorcard_1_url+"' social_2='"+uix_sc_authorcard_2_icon+"|"+uix_sc_authorcard_2_url+"' social_3='"+uix_sc_authorcard_3_icon+"|"+uix_sc_authorcard_3_url+"' ]"+uix_sc_authorcard_intro+"<br>[/uix_authorcard]";
					
					

					
				/*--**************** Custom shortcode end ****************-- */
				<?php echo UixSCFormCore::send_after(); ?> 
		} ) ( jQuery );
		</script>
 
		<?php
	
	}
	
}


/**
 * Returns forms with ajax
 */
if ( $sid >= 0 && is_admin() ) {
	echo $form_html;	
}

