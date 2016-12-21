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
$form_id = 'uix_sc_form_features_col3';

/**
 * Form Type
 */
$form_type = [
    'list' => false
];


$args = 
	[
	
		array(
			'desc'           => __( 'Note: 3 items per row. Per section insert for a maximum of <strong>3</strong>.', 'uix-shortcodes' ),
			'type'           => 'text'
		
		),
	 
		//------list begin
		array(
			'id'             => 'uix_sc_features_col3_list',
			'title'          => __( 'List Item', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'list',
			'default'        => array(
									'btn_text'                  => __( 'click here to add an item', 'uix-shortcodes' ),
									'clone_class'               => [ 
									
										array(
											'id'        => 'dynamic-row-uix_sc_features_col3_listitem_title',
											'type'      => 'text'
										), 
									
										array(
											'id'        => 'dynamic-row-uix_sc_features_col3_listitem_desc',
											'type'      => 'textarea'
										),
										
										array(
											'id'        => 'dynamic-row-uix_sc_features_col3_listitem_icon',
											'type'      => 'icon'
										),								
																			

									 ],
									'max'                       => 3
				                )
									
		),
		
		
			array(
				'id'             => 'uix_sc_features_col3_listitem_title',
				'title'          => '',
				'desc'           => '',
				'value'          => __( 'Feature Title', 'uix-shortcodes' ),
				'class'          => 'dynamic-row-uix_sc_features_col3_listitem_title', /*class of list item */
				'placeholder'    => '',
				'type'           => 'text'
			
			),
			
			
			array(
				'id'             => 'uix_sc_features_col3_listitem_desc',
				'title'          => '',
				'desc'           => '',
				'value'          => __( 'Some description text here. You can add a lot of it or can choose to leave it blank.', 'uix-shortcodes' ),
				'class'          => 'dynamic-row-uix_sc_features_col3_listitem_desc', /*class of list item */
				'placeholder'    => '',
				'type'           => 'textarea',
				'default'        => array(
										'row'     => 5,
										'format'  => true
									)
			
			),
		
			array(
				'id'             => 'uix_sc_features_col3_listitem_icon',
				'title'          => '',
				'desc'           => '',
				'value'          => '',
				'class'          => 'dynamic-row-uix_sc_features_col3_listitem_icon', /*class of list item */
				'placeholder'    => '',
				'type'           => 'icon',
				'default'        => array(
										'social'  => false
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
		UixSCFormCore::reg_clone_vars( 'uix_sc_features_col3_list', 
									  UixSCFormCore::dynamic_form_code( 'dynamic-row-uix_sc_features_col3_listitem_title', $form_html )
									  .UixSCFormCore::dynamic_form_code( 'dynamic-row-uix_sc_features_col3_listitem_desc', $form_html )
									  .UixSCFormCore::dynamic_form_code( 'dynamic-row-uix_sc_features_col3_listitem_icon', $form_html )
									 );
		
		
		?>
		<script type="text/javascript">
		( function($) {
		'use strict';
			$( function() { 
				<?php echo UixSCFormCore::uixscform_callback( $form_js, $form_id, __( 'Insert Features (3 Column)', 'uix-shortcodes' ) ); ?>					
				<?php echo UixSCFormCore::send_before( $form_js_vars, $form_id ); ?> 
				/*--**************** Custom shortcode begin ****************-- */
					/* List Item ( step 2)  */
					var list_num = 3;
					
			
					var show_list_item = '';
					for ( var i=0; i<=list_num; i++ ){
						
						var _uid = ( i == 0 ) ? '#' : '#'+i+'-',
							_title = $( _uid+'uix_sc_features_col3_listitem_title' ).val(),
							_icon = $( _uid+'uix_sc_features_col3_listitem_icon' ).val(),
							_desc = $( _uid+'uix_sc_features_col3_listitem_desc' ).val();
							
							
							
							
							
						var _item_v_title = ( _title != undefined ) ? _title : '',
							_item_v_icon = ( _icon != undefined ) ? _icon : '',
							_item_v_desc = ( _desc != undefined ) ? uixscform_formatTextarea( _desc ) : '';
							
							
						
						//last column
						var lastcol = ( i == list_num ) ? " last='1'" : '';
						
						
						if ( _title != undefined ) {
							show_list_item += "<br>[uix_features_item col='3' icon='"+_item_v_icon+"' "+lastcol+"]";
							show_list_item += "<br>[uix_features_item_title]"+ _item_v_title +"[/uix_features_item_title]";			
							show_list_item += "<br>[uix_features_item_desc]"+ _item_v_desc +"[/uix_features_item_desc]";					
							show_list_item += "<br>[/uix_features_item]";
		
						}
							
						
					}
		
		
					code = "[uix_features col='3']"+show_list_item+"<br>[/uix_features]";

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
