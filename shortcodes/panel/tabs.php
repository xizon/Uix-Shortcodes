<?php
/**
 * Form ID
 */
$form_id = 'uix_sc_form_tabs';

/**
 * Form Type
 */
$form_type = [
    'list' => false
];


$args = 
	[
	
	
		array(
			'id'             => 'uix_sc_tabs_effect',
			'title'          => __( 'Transition Effect', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 3,
			'placeholder'    => '',
			'type'           => 'radio',
			'default'        => array(
									'1'  => 'slide',
									'2'  => 'fade',
									'3'  => 'none',
								)
		
		),
	
	
		//------list begin
		array(
			'id'             => 'uix_sc_tabs_list',
			'title'          => __( 'List Item', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'list',
			'default'        => array(
									'btn_text'                  => __( 'click here to add an item', 'uix-shortcodes' ),
									'clone_class'               => [ 
										array(
											'id'        => 'dynamic-row-uix_sc_listitem_imgURL',
											'type'      => 'text'
										), 
										array(
											'id'        => 'dynamic-row-uix_sc_tabs_listitem_con',
											'type'      => 'textarea'
										), 
	

									 ],
									'max'                       => 30
				                )
									
		),
	
			array(
				'id'             => 'uix_sc_tabs_listitem_title',
				'title'          => '',
				'desc'           => '',
				'value'          => __( 'Tab Title', 'uix-shortcodes' ),
				'class'          => 'dynamic-row-uix_sc_tabs_listitem_title', /*class of list item */
				'placeholder'    => '',
				'type'           => 'text'
			
			),
			
			array(
				'id'             => 'uix_sc_tabs_listitem_con',
				'title'          => '',
				'desc'           => '',
				'value'          => __( 'This is content of the tab.', 'uix-shortcodes' ),
				'class'          => 'dynamic-row-uix_sc_tabs_listitem_con', /*class of list item */
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
		var dynamic_append_box_content = '<?php echo UixShortcodes::dynamic_form_code( 'dynamic-row-uix_sc_tabs_listitem_title', $form_html ).UixShortcodes::dynamic_form_code( 'dynamic-row-uix_sc_tabs_listitem_con', $form_html ); ?>';
			
		
		
		 /* Callback before custom javascript of sweetalert */
		<?php echo UixShortcodes::sweetalert_before( $form_js, $form_html, $form_js_vars, $form_id, __( 'Insert Tabs', 'uix-shortcodes' ) ); ?>
		
		        
				/* List Item ( step 2)  */
		        var list_num = 30;
			
		
				var show_list_item = '',
				    show_list_tabs = '';
					
				show_list_tabs += "<br>[uix_toggle_item tabs='1']";
				show_list_item += "<br>[uix_toggle_group]";
				for ( var i=0; i<=list_num; i++ ){
					
			        var _uid = ( i == 0 ) ? '#' : '#'+i+'-',
					    _txt = $( _uid+'uix_sc_tabs_listitem_title' ).val(),
					    _con = $( _uid+'uix_sc_tabs_listitem_con' ).val();
						
					var _item_v_title = ( _txt != undefined ) ? _txt : '',
					    _item_v_con = ( _con != undefined ) ? uix_formatTextarea( _con ) : '';
						
				
					
					if ( _txt != undefined ) {
					
						show_list_tabs += "<br>[uix_toggle_item_title]"+ _item_v_title +"[/uix_toggle_item_title]";				
						show_list_item += "<br>[uix_toggle_item_content]"+ _item_v_con +"[/uix_toggle_item_content]";					
						
	
					}
					
						
					
				}
				show_list_tabs += "<br>[/uix_toggle_item]";	
				show_list_item += "<br>[/uix_toggle_group]";	
	
	
				window.send_to_editor( "[uix_toggle tabs='1' effect='"+uix_sc_tabs_effect+"']"+show_list_tabs+show_list_item+"<br>[/uix_toggle]" );
				
				
				
		   /* Callback after custom javascript of sweetalert */
		  <?php echo UixShortcodes::sweetalert_after(); ?>
				


	} ); 

	
	
} ) ( jQuery );

</script>
