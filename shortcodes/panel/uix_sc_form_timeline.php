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

$clone_max = 15; // Maximum of clone form 

/**
 * Form Type
 */
$form_type = [
    'list' => false
];


$args = 
	[
	
		array(
			'id'             => 'uix_sc_timeline_list_effect',
			'title'          => __( 'Column', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 'slide',
			'placeholder'    => '',
			'type'           => 'radio',
			'default'        => array(
		                            'slide'  => __( 'Slide', 'uix-shortcodes' ),
		                            'fade'  => __( 'Fade', 'uix-shortcodes' ),
								)
		
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
									'clone_class'               => [ 
									
										array(
											'id'        => 'dynamic-row-uix_sc_timeline_listitem_photo',
											'type'      => 'image'
										), 
		
										array(
											'id'        => 'dynamic-row-uix_sc_timeline_listitem_url',
											'type'      => 'text'
										), 
									
										array(
											'id'        => 'dynamic-row-uix_sc_timeline_listitem_intro',
											'type'      => 'textarea'
										), 
										

									 ],
									'max'                       => $clone_max
				                )
									
		),
		
		
			array(
				'id'             => 'uix_sc_timeline_listitem_photo',
				'title'          => '',
				'desc'           => '',
				'value'          => '',
				'class'          => 'dynamic-row-uix_sc_timeline_listitem_photo', /*class of list item */
				'placeholder'    => __( 'Image URL', 'uix-shortcodes' ),
				'type'           => 'image',
				'default'        => array(
										'remove_btn_text'  => __( 'Remove image', 'uix-shortcodes' ),
										'upload_btn_text'  => __( 'Upload Logo', 'uix-shortcodes' ),
									)
			
			),	
			

			array(
				'id'             => 'uix_sc_timeline_listitem_url',
				'title'          => '',
				'desc'           => '',
				'value'          => '',
				'class'          => 'dynamic-row-uix_sc_timeline_listitem_url', /*class of list item */
				'placeholder'    => __( 'Destination URL, e.g., http://your.timelinesite.com', 'uix-shortcodes' ),
				'type'           => 'text',
				'default'        => ''

			),

			
			array(
				'id'             => 'uix_sc_timeline_listitem_intro',
				'title'          => '',
				'desc'           => '',
				'value'          => '',
				'class'          => 'dynamic-row-uix_sc_timeline_listitem_intro', /*class of list item */
				'placeholder'    => __( 'The Introduction of this member.', 'uix-shortcodes' ),
				'type'           => 'textarea',
				'default'        => array(
										'row'     => 5,
										'format'  => true
									)
			
			),
		
	
			
		
		//------list end
		
		


		
	
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
	 
		/* List Item - Register clone vars ( step 1) */
		UixSCFormCore::reg_clone_vars( 'uix_sc_timeline_list', 
									  UixSCFormCore::dynamic_form_code( 'dynamic-row-uix_sc_timeline_listitem_photo', $form_html )
									  .UixSCFormCore::dynamic_form_code( 'dynamic-row-uix_sc_timeline_listitem_intro', $form_html ) 
									  .UixSCFormCore::dynamic_form_code( 'dynamic-row-uix_sc_timeline_listitem_url', $form_html )  
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
						
						var _uid  = ( i == 0 ) ? '#' : '#'+i+'-',
							_photo = $( _uid+'uix_sc_timeline_listitem_photo' ).val(),
							_url  = $( _uid+'uix_sc_timeline_listitem_url' ).val(),
							_desc = $( _uid+'uix_sc_timeline_listitem_intro' ).val();
							
							
							
							
						var _item_v_photo = ( _photo != undefined ) ? encodeURI( _photo ) : '',
							_item_v_url  = ( _url != undefined && _url != '' ) ? "url='"+encodeURI( _url )+"'" : '',
							_item_v_desc = ( _desc != undefined ) ? uixscform_shortcodeTextareaPrint( _desc ) : '';
							
						
						if ( _photo != undefined ) {
							show_list_item += "<br>[uix_timeline_item "+_item_v_url+" image='"+_item_v_photo+"']";
							show_list_item += "<br>[uix_timeline_item_desc]"+ _item_v_desc +"[/uix_timeline_item_desc]";					
							show_list_item += "<br>[/uix_timeline_item]";
		
						}
							
						
					}
		
		
					code = "[uix_timeline effect='"+uix_sc_timeline_list_effect+"']"+show_list_item+"<br>[/uix_timeline]";

			
				
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
