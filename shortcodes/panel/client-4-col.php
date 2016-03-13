<?php
/**
 * Form ID
 */
$form_id = 'uix_sc_form_client_col4';

/**
 * Form Type
 */
$form_type = [
    'list' => false
];


$args = 
	[
	
		array(
			'desc'           => __( 'Note: 4 items per row. Per section insert for a maximum of <strong>4</strong>.', 'uix-shortcodes' ),
			'type'           => 'text'
		
		),
	
	 
		//------list begin
		array(
			'id'             => 'uix_sc_client_col4_list',
			'title'          => __( 'List Item', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'list',
			'default'        => array(
									'btn_text'                  => __( 'click here to add an item', 'uix-shortcodes' ),
									'clone_class'               => [ 
									
										array(
											'id'        => 'dynamic-row-uix_sc_client_col4_listitem_logo',
											'type'      => 'image'
										), 
									
										array(
											'id'        => 'dynamic-row-uix_sc_client_col4_listitem_intro',
											'type'      => 'textarea'
										), 
										

									 ],
									'max'                       => 4
				                )
									
		),
		
		
			array(
				'id'             => 'uix_sc_client_col4_listitem_logo',
				'title'          => '',
				'desc'           => '',
				'value'          => '',
				'class'          => 'dynamic-row-uix_sc_client_col4_listitem_logo', /*class of list item */
				'placeholder'    => __( 'Logo URL', 'uix-shortcodes' ),
				'type'           => 'image',
				'default'        => array(
										'remove_btn_text'  => __( 'Remove image', 'uix-shortcodes' ),
										'upload_btn_text'  => __( 'Upload Logo', 'uix-shortcodes' ),
									)
			
			),	
			
			
			
			array(
				'id'             => 'uix_sc_client_col4_listitem_intro',
				'title'          => '',
				'desc'           => '',
				'value'          => __( 'The Introduction of this member.', 'uix-shortcodes' ),
				'class'          => 'dynamic-row-uix_sc_client_col4_listitem_intro', /*class of list item */
				'placeholder'    => '',
				'type'           => 'textarea',
				'default'        => array(
										'row'     => 5,
										'format'  => true
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
		var dynamic_append_box_content = '<?php echo UixShortcodes::dynamic_form_code( 'dynamic-row-uix_sc_client_col4_listitem_logo', $form_html ).UixShortcodes::dynamic_form_code( 'dynamic-row-uix_sc_client_col4_listitem_intro', $form_html ); ?>';
			
		
		
		 /* Callback before custom javascript of sweetalert */
		<?php echo UixShortcodes::sweetalert_before( $form_js, $form_html, $form_js_vars, $form_id, __( 'Insert Client (4 Column)', 'uix-shortcodes' ) ); ?>
		
		        
				/* List Item ( step 2)  */
		        var list_num = 4;
				
		
				var show_list_item = '';
				for ( var i=0; i<=list_num; i++ ){
					
			        var _uid = ( i == 0 ) ? '#' : '#'+i+'-',
					    _logo = $( _uid+'uix_sc_client_col4_listitem_logo' ).val(),
						_desc = $( _uid+'uix_sc_client_col4_listitem_intro' ).val();
						
						
						
						
					var _item_v_logo = ( _logo != undefined ) ? _logo : '',
					    _item_v_desc = ( _desc != undefined ) ? uix_formatTextarea( _desc ) : '';
						
					
					//last column
					var lastcol = ( i == list_num ) ? " last='1'" : '';
					
					if ( _logo != undefined ) {
						show_list_item += "<br>[uix_client_item col='4' logo='"+_item_v_logo+"' "+lastcol+"]";
						show_list_item += "<br>[uix_client_item_desc]"+ _item_v_desc +"[/uix_client_item_desc]";					
						show_list_item += "<br>[/uix_client_item]";
	
					}
						
					
				}
	
	
				window.send_to_editor( "[uix_client]"+show_list_item+"<br>[/uix_client]" );
				
				
				
		   /* Callback after custom javascript of sweetalert */
		  <?php echo UixShortcodes::sweetalert_after(); ?>
				


	} ); 

	
	
} ) ( jQuery );

</script>
