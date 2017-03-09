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
$form_id = 'uix_sc_form_timeline';

$clone_max = 30; // Maximum of clone form 

/**
 * Form Type
 */
$form_type = array(
    'list' => false
);


$args = 
	array(
	
	 
		array(
			'id'             => 'uix_sc_timeline_list_color',
			'title'          => __( 'Highlight Color', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '#a2bf2f',
			'placeholder'    => '',
			'type'           => 'color',
			'default'        => array( '#a2bf2f', '#d59a3e', '#DD514C', '#FA9ADF', '#4BB1CF',  '#0E90D2', '#5F9EA0', '#473f3f',  '#bebebe' )
		
		),
	
	
	 
		//------list begin
		array(
			'id'             => 'uix_sc_timeline_list',
			'title'          => __( 'List Item', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'list',
			'default'        => array(
									'btn_text'                  => __( 'click here to add an item', 'uix-shortcodes' ),
									'clone_class'               => array(
									
										array(
											'id'        => 'dynamic-row-uix_sc_timeline_listitem_highlight',
											'type'      => 'checkbox'
										), 
		
										array(
											'id'        => 'dynamic-row-uix_sc_timeline_listitem_date',
											'type'      => 'text'
										), 
		
										array(
											'id'        => 'dynamic-row-uix_sc_timeline_listitem_status',
											'type'      => 'text'
										), 
									
										

									 ),
									'max'                       => $clone_max
				                )
									
		),
		
		

			array(
				'id'             => 'uix_sc_timeline_listitem_highlight',
				'title'          => __( 'Highlight', 'uix-shortcodes' ),
				'desc'           => '',
				'value'          => '',
		        'class'          => 'dynamic-row-uix_sc_timeline_listitem_highlight', /*class of list item */
				'placeholder'    => '',
				'type'           => 'checkbox',
				'default'        => array(
										'checked'  => true
									)


			),	
		
		
			array(
				'id'             => 'uix_sc_timeline_listitem_date',
				'title'          => '',
				'desc'           => '',
				'value'          => '',
				'class'          => 'dynamic-row-uix_sc_timeline_listitem_date', /*class of list item */
				'placeholder'    => __( 'Date, e.g., 1/6/2017', 'uix-shortcodes' ),
				'type'           => 'text',
				'default'        => ''

			),	
			

			array(
				'id'             => 'uix_sc_timeline_listitem_status',
				'title'          => '',
				'desc'           => '',
				'value'          => __( 'Project Status Here', 'uix-shortcodes' ),
				'class'          => 'dynamic-row-uix_sc_timeline_listitem_status', /*class of list item */
				'placeholder'    => '',
				'type'           => 'text',
				'default'        => ''

			),

	
			
		
		//------list end
		
		


		
	
	)
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
	 
		/* List Item - Register clone vars ( step 1) */
		UixSCFormCore::reg_clone_vars( 'uix_sc_timeline_list', 
									  UixSCFormCore::dynamic_form_code( 'dynamic-row-uix_sc_timeline_listitem_highlight', $form_html )
									  .UixSCFormCore::dynamic_form_code( 'dynamic-row-uix_sc_timeline_listitem_date', $form_html )
									  .UixSCFormCore::dynamic_form_code( 'dynamic-row-uix_sc_timeline_listitem_status', $form_html )
									 );
	 
		
		?>
		<script type="text/javascript">
		( function($) {
		'use strict';
			$( function() {

				<?php echo UixSCFormCore::uixscform_callback( $form_js, $form_id, __( 'Insert Timeline', 'uix-shortcodes' ) ); ?>					
				<?php echo UixSCFormCore::send_before( $form_js_vars, $form_id ); ?> 
				/*--**************** Custom shortcode begin ****************-- */
					
					/* List Item ( step 2)  */
					var list_num = <?php echo $clone_max; ?>;
					
			
					var show_list_item = '';
					for ( var i=0; i<=list_num; i++ ){
						
						var _uid       = ( i == 0 ) ? '#' : '#'+i+'-',
							_date      = $( _uid+'uix_sc_timeline_listitem_date' ).val(),
							_highlight = $( _uid+'uix_sc_timeline_listitem_highlight-checkbox' ).is( ":checked" ),
							_status    = $( _uid+'uix_sc_timeline_listitem_status' ).val();
							
							
						if ( _date != undefined && _date != '' ) {
							show_list_item += "<br>[uix_timeline_item data='"+uixscform_shortcodeHTMLEcode( _date )+"' status='"+uixscform_shortcodeHTMLEcode( _status )+"' highlight='"+_highlight+"'][/uix_timeline_item]";
						}
							
						
					}
		
		
					code = "[uix_timeline color='"+uix_sc_timeline_list_color+"']"+show_list_item+"<br>[/uix_timeline]";

			
				
				/*--**************** Custom shortcode end ****************-- */
				<?php echo UixSCFormCore::send_after( $form_id ); ?>
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
