<?php
/**
 * Form ID
 */
$form_id = 'uix_sc_testimonials';

/**
 * Form Type
 */
$form_type = [
    'list' => false
];


$args = 
	[
	
		//------list begin
		array(
			'id'             => 'uix_sc_testimonials_col3_list',
			'title'          => __( 'List Item', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'list',
			'default'        => array(
									'btn_text'                  => __( 'click here to add an item', 'uix-shortcodes' ),
									'clone_class'               => [ 
									
										array(
											'id'        => 'dynamic-row-uix_sc_testimonials_col3_listitem_avatar',
											'type'      => 'image'
										), 
										
										array(
											'id'        => 'dynamic-row-uix_sc_testimonials_col3_listitem_name',
											'type'      => 'text'
										), 										
										
										array(
											'id'        => 'dynamic-row-uix_sc_testimonials_col3_listitem_position',
											'type'      => 'text'
										), 
									
										array(
											'id'        => 'dynamic-row-uix_sc_testimonials_col3_listitem_intro',
											'type'      => 'textarea'
										), 
										

									 ],
									'max'                       => 15
				                )
									
		),
		
		
			array(
				'id'             => 'uix_sc_testimonials_col3_listitem_avatar',
				'title'          => '',
				'desc'           => '',
				'value'          => '',
				'class'          => 'dynamic-row-uix_sc_testimonials_col3_listitem_avatar', /*class of list item */
				'placeholder'    => __( 'Avatar URL', 'uix-shortcodes' ),
				'type'           => 'image',
				'default'        => array(
										'remove_btn_text'  => __( 'Remove image', 'uix-shortcodes' ),
										'upload_btn_text'  => __( 'Upload', 'uix-shortcodes' ),
									)
			
			),	
			array(
				'id'             => 'uix_sc_testimonials_col3_listitem_name',
				'title'          => '',
				'desc'           => '',
				'value'          => __( 'Name', 'uix-shortcodes' ),
				'class'          => 'dynamic-row-uix_sc_testimonials_col3_listitem_name', /*class of list item */
				'placeholder'    => '',
				'type'           => 'text'
			
			),			
			
			array(
				'id'             => 'uix_sc_testimonials_col3_listitem_position',
				'title'          => '',
				'desc'           => '',
				'value'          => __( 'Position', 'uix-shortcodes' ),
				'class'          => 'dynamic-row-uix_sc_testimonials_col3_listitem_position', /*class of list item */
				'placeholder'    => '',
				'type'           => 'text'
			
			),			
			array(
				'id'             => 'uix_sc_testimonials_col3_listitem_intro',
				'title'          => '',
				'desc'           => '',
				'value'          => __( 'Enter some details for the customer giving this testimonial., E.g., Thank you from the bottom of our hearts.', 'uix-shortcodes' ),
				'class'          => 'dynamic-row-uix_sc_testimonials_col3_listitem_intro', /*class of list item */
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
		var dynamic_append_box_content = '<?php echo UixShortcodes::dynamic_form_code( 'dynamic-row-uix_sc_testimonials_col3_listitem_avatar', $form_html ).UixShortcodes::dynamic_form_code( 'dynamic-row-uix_sc_testimonials_col3_listitem_name', $form_html ).UixShortcodes::dynamic_form_code( 'dynamic-row-uix_sc_testimonials_col3_listitem_position', $form_html ).UixShortcodes::dynamic_form_code( 'dynamic-row-uix_sc_testimonials_col3_listitem_intro', $form_html ); ?>';
			
		
		
		 /* Callback before custom javascript of sweetalert */
		<?php echo UixShortcodes::sweetalert_before( $form_js, $form_html, $form_js_vars, $form_id, __( 'Insert Testimonials Carousel', 'uix-shortcodes' ) ); ?>
		
		        
				/* List Item ( step 2)  */
		        var list_num = 15;
				
		
				var show_list_item = '';
				for ( var i=0; i<=list_num; i++ ){
					
			        var _uid = ( i == 0 ) ? '#' : '#'+i+'-',
					    _avatar = $( _uid+'uix_sc_testimonials_col3_listitem_avatar' ).val(),
						_name = $( _uid+'uix_sc_testimonials_col3_listitem_name' ).val(),
						_position = $( _uid+'uix_sc_testimonials_col3_listitem_position' ).val(),
						_desc = $( _uid+'uix_sc_testimonials_col3_listitem_intro' ).val();
						
						
						
						
					var _item_v_avatar = ( _avatar != undefined ) ? _avatar : '',
					    _item_v_name = ( _name != undefined ) ? uix_htmlencodeToShortcodeFormat( _name ) : '',
						_item_v_position = ( _position != undefined ) ? uix_htmlencodeToShortcodeFormat( _position ) : '',
					    _item_v_desc = ( _desc != undefined ) ? uix_formatTextarea( _desc ) : '';
						
					
					if ( _name != undefined ) {
						show_list_item += "<br>[uix_testimonials_item name='"+_item_v_name+"' avatar='"+_item_v_avatar+"' position='"+_item_v_position+"']";
						show_list_item += "<br>[uix_testimonials_item_desc]"+ _item_v_desc +"[/uix_testimonials_item_desc]";					
						show_list_item += "<br>[/uix_testimonials_item]";
	
					}
						
					
				}
	
	
				window.send_to_editor( "[uix_testimonials]"+show_list_item+"<br>[/uix_testimonials]" );
				
				
				
		   /* Callback after custom javascript of sweetalert */
		  <?php echo UixShortcodes::sweetalert_after(); ?>
				


	} ); 

	
	
} ) ( jQuery );

</script>
