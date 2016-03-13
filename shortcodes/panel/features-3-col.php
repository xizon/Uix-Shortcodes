<?php
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
											'id'        => 'dynamic-row-uix_sc_features_col3_listitem_titlecolor',
											'type'      => 'colormap'
										), 		
									
										array(
											'id'        => 'dynamic-row-uix_sc_features_col3_listitem_desc',
											'type'      => 'textarea'
										),
										array(
											'id'        => 'dynamic-row-uix_sc_features_col3_listitem_desccolor',
											'type'      => 'colormap'
										), 		
										 
										
										array(
											'id'        => 'dynamic-row-uix_sc_features_col3_listitem_icon',
											'type'      => 'icon'
										), 	
										
										array(
											'id'        => 'dynamic-row-uix_sc_features_col3_listitem_iconcolor',
											'type'      => 'colormap'
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
				'id'             => 'uix_sc_features_col3_listitem_titlecolor',
				'title'          => '',
				'desc'           => __( 'Title Color', 'uix-shortcodes' ),
				'value'          => '',
				'class'          => 'dynamic-row-uix_sc_features_col3_listitem_titlecolor', /*class of list item */
				'placeholder'    => '',
				'type'           => 'colormap',
				'default'        => array(
										'swatches' => 1
									)

			
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
				'id'             => 'uix_sc_features_col3_listitem_desccolor',
				'title'          => '',
				'desc'           => __( 'Description Color', 'uix-shortcodes' ),
				'value'          => '',
				'class'          => 'dynamic-row-uix_sc_features_col3_listitem_desccolor', /*class of list item */
				'placeholder'    => '',
				'type'           => 'colormap',
				'default'        => array(
										'swatches' => 1
									)
			
			),	
		
			array(
				'id'             => 'uix_sc_features_col3_listitem_icon',
				'title'          => '',
				'desc'           => '',
				'value'          => '',
				'class'          => 'dynamic-row-uix_sc_features_col3_listitem_icon', /*class of list item */
				'placeholder'    => __( 'Choose Feature Icon', 'uix-shortcodes' ),
				'type'           => 'icon',
				'default'        => array(
										'social'  => false
									)
			
			),
			
			array(
				'id'             => 'uix_sc_features_col3_listitem_iconcolor',
				'title'          => '',
				'desc'           => __( 'Icon Color', 'uix-shortcodes' ),
				'value'          => '',
				'class'          => 'dynamic-row-uix_sc_features_col3_listitem_iconcolor', /*class of list item */
				'placeholder'    => '',
				'type'           => 'colormap',
				'default'        => array(
										'swatches' => 1
									)
			
			),	

			
		
		//------list end
		
		


		
	
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
		
		
		/* List Item ( step 1) */
		var dynamic_append_box_content = '<?php echo UixShortcodes::dynamic_form_code( 'dynamic-row-uix_sc_features_col3_listitem_title', $form_html ).UixShortcodes::dynamic_form_code( 'dynamic-row-uix_sc_features_col3_listitem_titlecolor', $form_html ).UixShortcodes::dynamic_form_code( 'dynamic-row-uix_sc_features_col3_listitem_desc', $form_html ).UixShortcodes::dynamic_form_code( 'dynamic-row-uix_sc_features_col3_listitem_desccolor', $form_html ).UixShortcodes::dynamic_form_code( 'dynamic-row-uix_sc_features_col3_listitem_icon', $form_html ).UixShortcodes::dynamic_form_code( 'dynamic-row-uix_sc_features_col3_listitem_iconcolor', $form_html ); ?>';
			
		
		
		 /* Callback before custom javascript of sweetalert */
		<?php echo UixShortcodes::sweetalert_before( $form_js, $form_html, $form_js_vars, $form_id, __( 'Insert Features (3 Column)', 'uix-shortcodes' ) ); ?>
		
		        
				/* List Item ( step 2)  */
		        var list_num = 3;
				
		
				var show_list_item = '';
				for ( var i=0; i<=list_num; i++ ){
					
			        var _uid = ( i == 0 ) ? '#' : '#'+i+'-',
					    _title = $( _uid+'uix_sc_features_col3_listitem_title' ).val(),
						_titlecolor = $( _uid+'uix_sc_features_col3_listitem_titlecolor' ).val(),
						_icon = $( _uid+'uix_sc_features_col3_listitem_icon' ).val(),
						_iconcolor = $( _uid+'uix_sc_features_col3_listitem_iconcolor' ).val(),
						_desc = $( _uid+'uix_sc_features_col3_listitem_desc' ).val(),
						_desccolor = $( _uid+'uix_sc_features_col3_listitem_desccolor' ).val();
						
						
						
						
						
					var _item_v_title = ( _title != undefined ) ? _title : '',
					    _item_v_titlecolor = ( _titlecolor != undefined ) ? _titlecolor : '',
					    _item_v_icon = ( _icon != undefined ) ? _icon : '',
						_item_v_iconcolor = ( _iconcolor != undefined ) ? _iconcolor : '',
					    _item_v_desc = ( _desc != undefined ) ? uix_formatTextarea( _desc ) : '',
						_item_v_desccolor = ( _desccolor != undefined ) ? _desccolor : '';
						
						
					
					//last column
					var lastcol = ( i == list_num ) ? " last='1'" : '';
					
					
					if ( _title != undefined ) {
						show_list_item += "<br>[uix_features_item col='3' icon='"+_item_v_icon+"' iconcolor='"+_item_v_iconcolor+"' titlecolor='"+_item_v_titlecolor+"' desccolor='"+_item_v_desccolor+"' "+lastcol+"]";
						show_list_item += "<br>[uix_features_item_title]"+ _item_v_title +"[/uix_features_item_title]";			
						show_list_item += "<br>[uix_features_item_desc]"+ _item_v_desc +"[/uix_features_item_desc]";					
						show_list_item += "<br>[/uix_features_item]";
	
					}
						
					
				}
	
	
				window.send_to_editor( "[uix_features col='3']"+show_list_item+"<br>[/uix_features]" );
				
				
				
		   /* Callback after custom javascript of sweetalert */
		  <?php echo UixShortcodes::sweetalert_after(); ?>
				


	} ); 

	
	
} ) ( jQuery );

</script>
