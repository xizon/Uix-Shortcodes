<?php
/**
 * Form ID
 */
$form_id = 'uix_sc_form_pricing_col3';

/**
 * Form Type
 */

$form_type = [
    'list' => 3
];


$args_1 = 
	[
	
		array(
			'id'             => 'uix_sc_pricing_col3_one_title',
			'title'          => __( 'Title', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => __( 'free', 'uix-shortcodes' ),
			'placeholder'    => '',
			'type'           => 'text'
		
		),
		array(
			'id'             => 'uix_sc_pricing_col3_one_price',
			'title'          => __( 'Price', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 49,
			'placeholder'    => '',
			'type'           => 'text'
		
		),
		array(
			'id'             => 'uix_sc_pricing_col3_one_emphasis_color',
			'title'          => __( 'Price Color', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '#d59a3e',
			'placeholder'    => '',
			'type'           => 'color',
			'default'        => [ '#a2bf2f', '#d59a3e', '#DD514C', '#FA9ADF', '#4BB1CF',  '#0E90D2', '#5F9EA0', '#473f3f',  '#bebebe' ]
		
		),
		
		
		array(
			'id'             => 'uix_sc_pricing_col3_one_currency',
			'title'          => __( 'Currency', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '$',
			'placeholder'    => '',
			'type'           => 'text'
		
		),
		array(
			'id'             => 'uix_sc_pricing_col3_one_period',
			'title'          => __( 'Period', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => __( 'per month', 'uix-shortcodes' ),
			'placeholder'    => '',
			'type'           => 'text'
		
		),	
		array(
			'id'             => 'uix_sc_pricing_col3_one_desc',
			'title'          => __( 'Description', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => __( 'Some description text here.', 'uix-shortcodes' ),
			'placeholder'    => '',
			'type'           => 'textarea',
			'default'        => array(
									'row'     => 2,
									'format'  => true
				                )
		
		),	
		array(
			'id'             => 'uix_sc_pricing_col3_one_btn_label',
			'title'          => __( 'Button Label', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => __( 'TRY FOR FREE', 'uix-shortcodes' ),
			'placeholder'    => '',
			'type'           => 'text'
		
		),		
		array(
			'id'             => 'uix_sc_pricing_col3_one_btn_link',
			'title'          => __( 'Button Link', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => 'URL',
			'type'           => 'text'
		
		),	
		array(
			'id'             => 'uix_sc_pricing_col3_one_btn_color',
			'title'          => __( 'Button Color', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '#a2bf2f',
			'placeholder'    => '',
			'type'           => 'color',
			'default'        => [ '#a2bf2f', '#d59a3e', '#DD514C', '#FA9ADF', '#4BB1CF',  '#0E90D2', '#5F9EA0', '#473f3f',  '#bebebe' ]
		
		),
		
		array(
			'id'             => 'uix_sc_pricing_col3_one_btn_win',
			'title'          => __( 'Open in New Window', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'checkbox',
			'default'        => array(
									'checked'  => false
				                )
		
		),	
		array(
			'id'             => 'uix_sc_pricing_col3_one_features',
			'title'          => __( 'Features', 'uix-shortcodes' ),
			'desc'           => __( 'Type one word or sentence per line when press "ENTER".', 'uix-shortcodes' ),
			'value'          => __( 'Feature Description<br>Another Feature Description<br><s>Invalid Feature Description</s>', 'uix-shortcodes' ),
			'placeholder'    => '',
			'type'           => 'textarea',
			'default'        => array(
									'row'                       => 5,
									'format'                    => false,
									'default_value_htmlformat'  => true,
									'default_value_trigger'     => $form_id
									
				                )
		
		),	
		array(
			'id'             => 'uix_sc_pricing_col3_one_active',
			'title'          => __( 'Active', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'checkbox',
			'default'        => array(
									'checked'  => false
				                )
		
		),	
		array(
			'id'             => 'uix_sc_pricing_col3_one_hide',
			'title'          => __( 'Hide', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'checkbox',
			'default'        => array(
									'checked'  => false
				                )
		
		),	

	
	]
;

$args_2 = 
	[

	
		array(
			'id'             => 'uix_sc_pricing_col3_two_title',
			'title'          => __( 'Title', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => __( 'premium', 'uix-shortcodes' ),
			'placeholder'    => '',
			'type'           => 'text'
		
		),
		array(
			'id'             => 'uix_sc_pricing_col3_two_price',
			'title'          => __( 'Price', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 69,
			'placeholder'    => '',
			'type'           => 'text'
		
		),
		array(
			'id'             => 'uix_sc_pricing_col3_two_emphasis_color',
			'title'          => __( 'Price Color', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '#d59a3e',
			'placeholder'    => '',
			'type'           => 'color',
			'default'        => [ '#a2bf2f', '#d59a3e', '#DD514C', '#FA9ADF', '#4BB1CF',  '#0E90D2', '#5F9EA0', '#473f3f',  '#bebebe' ]
		
		),
		
		array(
			'id'             => 'uix_sc_pricing_col3_two_currency',
			'title'          => __( 'Currency', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '$',
			'placeholder'    => '',
			'type'           => 'text'
		
		),
		array(
			'id'             => 'uix_sc_pricing_col3_two_period',
			'title'          => __( 'Period', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => __( 'per month', 'uix-shortcodes' ),
			'placeholder'    => '',
			'type'           => 'text'
		
		),	
		array(
			'id'             => 'uix_sc_pricing_col3_two_desc',
			'title'          => __( 'Description', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => __( 'Some description text here.', 'uix-shortcodes' ),
			'placeholder'    => '',
			'type'           => 'textarea',
			'default'        => array(
									'row'     => 2,
									'format'  => true
				                )
		
		),	
		array(
			'id'             => 'uix_sc_pricing_col3_two_btn_label',
			'title'          => __( 'Button Label', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => __( 'BUY', 'uix-shortcodes' ),
			'placeholder'    => '',
			'type'           => 'text'
		
		),		
		array(
			'id'             => 'uix_sc_pricing_col3_two_btn_link',
			'title'          => __( 'Button Link', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => 'URL',
			'type'           => 'text'
		
		),	
		
		array(
			'id'             => 'uix_sc_pricing_col3_two_btn_color',
			'title'          => __( 'Button Color', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '#a2bf2f',
			'placeholder'    => '',
			'type'           => 'color',
			'default'        => [ '#a2bf2f', '#d59a3e', '#DD514C', '#FA9ADF', '#4BB1CF',  '#0E90D2', '#5F9EA0', '#473f3f',  '#bebebe' ]
		
		),
		
		array(
			'id'             => 'uix_sc_pricing_col3_two_btn_win',
			'title'          => __( 'Open in New Window', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'checkbox',
			'default'        => array(
									'checked'  => false
				                )
		
		),	
		array(
			'id'             => 'uix_sc_pricing_col3_two_features',
			'title'          => __( 'Features', 'uix-shortcodes' ),
			'desc'           => __( 'Type one word or sentence per line when press "ENTER".', 'uix-shortcodes' ),
			'value'          => __( 'Feature Description<br>Another Feature Description<br>Another Feature Description<br><s>Invalid Feature Description</s>', 'uix-shortcodes' ),
			'placeholder'    => '',
			'type'           => 'textarea',
			'default'        => array(
									'row'                       => 5,
									'format'                    => false,
									'default_value_htmlformat'  => true,
									'default_value_trigger'     => $form_id
				                )
		
		),	
		array(
			'id'             => 'uix_sc_pricing_col3_two_active',
			'title'          => __( 'Active', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'checkbox',
			'default'        => array(
									'checked'  => true
				                )
		
		),	
		array(
			'id'             => 'uix_sc_pricing_col3_two_hide',
			'title'          => __( 'Hide', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'checkbox',
			'default'        => array(
									'checked'  => false
				                )
		
		),	
		
	
	]
;


$args_3 = 
	[
	

		array(
			'id'             => 'uix_sc_pricing_col3_three_title',
			'title'          => __( 'Title', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => __( 'professional', 'uix-shortcodes' ),
			'placeholder'    => '',
			'type'           => 'text'
		
		),
		array(
			'id'             => 'uix_sc_pricing_col3_three_price',
			'title'          => __( 'Price', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 109,
			'placeholder'    => '',
			'type'           => 'text'
		
		),
		array(
			'id'             => 'uix_sc_pricing_col3_three_emphasis_color',
			'title'          => __( 'Price Color', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '#d59a3e',
			'placeholder'    => '',
			'type'           => 'color',
			'default'        => [ '#a2bf2f', '#d59a3e', '#DD514C', '#FA9ADF', '#4BB1CF',  '#0E90D2', '#5F9EA0', '#473f3f',  '#bebebe' ]
		
		),
		
		array(
			'id'             => 'uix_sc_pricing_col3_three_currency',
			'title'          => __( 'Currency', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '$',
			'placeholder'    => '',
			'type'           => 'text'
		
		),
		array(
			'id'             => 'uix_sc_pricing_col3_three_period',
			'title'          => __( 'Period', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => __( 'per month', 'uix-shortcodes' ),
			'placeholder'    => '',
			'type'           => 'text'
		
		),	
		array(
			'id'             => 'uix_sc_pricing_col3_three_desc',
			'title'          => __( 'Description', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => __( 'Some description text here.', 'uix-shortcodes' ),
			'placeholder'    => '',
			'type'           => 'textarea',
			'default'        => array(
									'row'     => 2,
									'format'  => true
				                )
		
		),	
		array(
			'id'             => 'uix_sc_pricing_col3_three_btn_label',
			'title'          => __( 'Button Label', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => __( 'BUY', 'uix-shortcodes' ),
			'placeholder'    => '',
			'type'           => 'text'
		
		),		
		array(
			'id'             => 'uix_sc_pricing_col3_three_btn_link',
			'title'          => __( 'Button Link', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => 'URL',
			'type'           => 'text'
		
		),	
		
		array(
			'id'             => 'uix_sc_pricing_col3_three_btn_color',
			'title'          => __( 'Button Color', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '#a2bf2f',
			'placeholder'    => '',
			'type'           => 'color',
			'default'        => [ '#a2bf2f', '#d59a3e', '#DD514C', '#FA9ADF', '#4BB1CF',  '#0E90D2', '#5F9EA0', '#473f3f',  '#bebebe' ]
		
		),
		
		array(
			'id'             => 'uix_sc_pricing_col3_three_btn_win',
			'title'          => __( 'Open in New Window', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'checkbox',
			'default'        => array(
									'checked'  => false
				                )
		
		),	
		array(
			'id'             => 'uix_sc_pricing_col3_three_features',
			'title'          => __( 'Features', 'uix-shortcodes' ),
			'desc'           => __( 'Type one word or sentence per line when press "ENTER".', 'uix-shortcodes' ),
			'value'          => __( 'Feature Description<br>Another Feature Description<br>Another Feature Description<br><s>Invalid Feature Description</s><br>Another Feature Description', 'uix-shortcodes' ),
			'placeholder'    => '',
			'type'           => 'textarea',
			'default'        => array(
									'row'                       => 5,
									'format'                    => false,
									'default_value_htmlformat'  => true,
									'default_value_trigger'     => $form_id
				                )
		
		),	
		array(
			'id'             => 'uix_sc_pricing_col3_three_active',
			'title'          => __( 'Active', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'checkbox',
			'default'        => array(
									'checked'  => false
				                )
		
		),	
		array(
			'id'             => 'uix_sc_pricing_col3_three_hide',
			'title'          => __( 'Hide', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'checkbox',
			'default'        => array(
									'checked'  => false
				                )
		
		),	
		
	
	]
;




//---

$form_html = UixShortcodes::form_before();

$form_html .= UixShortcodes::add_form( $form_id, $form_type, $args_1, 'html', __( 'Item 1', 'uix-shortcodes' ) );
$form_html .= UixShortcodes::add_form( $form_id, $form_type, $args_2, 'html', __( 'Item 2', 'uix-shortcodes' ) );
$form_html .= UixShortcodes::add_form( $form_id, $form_type, $args_3, 'html', __( 'Item 3', 'uix-shortcodes' ) );

$form_html .= UixShortcodes::form_after();

//----

$form_js = '';
$form_js .= UixShortcodes::add_form( $form_id, $form_type, $args_1, 'js' );
$form_js .= UixShortcodes::add_form( $form_id, $form_type, $args_2, 'js' );
$form_js .= UixShortcodes::add_form( $form_id, $form_type, $args_3, 'js' );

//----

$form_js_vars = '';
$form_js_vars .= UixShortcodes::add_form( $form_id, $form_type, $args_1, 'js_vars' );
$form_js_vars .= UixShortcodes::add_form( $form_id, $form_type, $args_2, 'js_vars' );
$form_js_vars .= UixShortcodes::add_form( $form_id, $form_type, $args_3, 'js_vars' );



/**
 * Add simulation buttons
 */
echo UixShortcodes::add_form( $form_id, '', '', 'active_btn' );

?>		


<script type="text/javascript">

( function($) {
    
	$( document ).ready( function() {
		

		
		 /* Callback before custom javascript of sweetalert */
		<?php echo UixShortcodes::sweetalert_before( $form_js, $form_html, $form_js_vars, $form_id, __( 'Insert Pricing Table (3 column)', 'uix-shortcodes' ) ); ?>
	
		  
					/* Making the button open in a new window */
					var _p_btn_target_1 = _p_btn_target_2 = _p_btn_target_3 = '';
					if ( uix_sc_pricing_col3_one_btn_win === true ) _p_btn_target_1 = '_blank';
					if ( uix_sc_pricing_col3_two_btn_win === true ) _p_btn_target_2 = '_blank';
					if ( uix_sc_pricing_col3_three_btn_win === true ) _p_btn_target_3 = '_blank';
					
					
					/* Mark a pricing as important */
					var _p_class_1 = _p_class_2 = _p_class_3 = '';
					if ( uix_sc_pricing_col3_one_active === true ) _p_class_1 = 'uix-sc-price-important';
					if ( uix_sc_pricing_col3_two_active === true ) _p_class_2 = 'uix-sc-price-important';
					if ( uix_sc_pricing_col3_three_active === true ) _p_class_3 = 'uix-sc-price-important';
					

				
		            /* Output */
			        var _vhtml_1 = "",_vhtml_2 = "",_vhtml_3 = "";
					_vhtml_1 += "<br>[uix_pricing_item target='"+_p_btn_target_1+"' class='"+_p_class_1+"' url='"+uix_sc_pricing_col3_one_btn_link+"' period='"+uix_sc_pricing_col3_one_period+"' bcolor='"+uix_colorTran( uix_sc_pricing_col3_one_btn_color )+"' imcolor='"+uix_sc_pricing_col3_one_emphasis_color+"' col='3']";
					_vhtml_1 += "<br>[uix_pricing_item_level]"+uix_sc_pricing_col3_one_title+"[/uix_pricing_item_level]";
					_vhtml_1 += "<br>[uix_pricing_item_price]"+uix_sc_pricing_col3_one_currency+uix_sc_pricing_col3_one_price+"[/uix_pricing_item_price]";
					_vhtml_1 += "<br>[uix_pricing_item_desc]"+uix_sc_pricing_col3_one_desc+"[/uix_pricing_item_desc]";
					_vhtml_1 += "<br>[uix_pricing_item_button]"+uix_sc_pricing_col3_one_btn_label+"[/uix_pricing_item_button]";		
					_vhtml_1 += "<br>[uix_pricing_item_detail]"+uix_html_listTran( uix_sc_pricing_col3_one_features, 'ul' )+"[/uix_pricing_item_detail]";					
					_vhtml_1 += "<br>[/uix_pricing_item]<br>";
					
					_vhtml_2 += "[uix_pricing_item target='"+_p_btn_target_2+"' class='"+_p_class_2+"' url='"+uix_sc_pricing_col3_two_btn_link+"' period='"+uix_sc_pricing_col3_two_period+"' bcolor='"+uix_colorTran( uix_sc_pricing_col3_two_btn_color )+"' imcolor='"+uix_sc_pricing_col3_two_emphasis_color+"' col='3']";
					_vhtml_2 += "<br>[uix_pricing_item_level]"+uix_sc_pricing_col3_two_title+"[/uix_pricing_item_level]";
					_vhtml_2 += "<br>[uix_pricing_item_price]"+uix_sc_pricing_col3_two_currency+uix_sc_pricing_col3_two_price+"[/uix_pricing_item_price]";
					_vhtml_2 += "<br>[uix_pricing_item_desc]"+uix_sc_pricing_col3_two_desc+"[/uix_pricing_item_desc]";
					_vhtml_2 += "<br>[uix_pricing_item_button]"+uix_sc_pricing_col3_two_btn_label+"[/uix_pricing_item_button]";		
					_vhtml_2 += "<br>[uix_pricing_item_detail]"+uix_html_listTran( uix_sc_pricing_col3_two_features, 'ul' )+"[/uix_pricing_item_detail]";					
					_vhtml_2 += "<br>[/uix_pricing_item]<br>";
					
					_vhtml_3 += "[uix_pricing_item target='"+_p_btn_target_3+"' class='"+_p_class_3+"' url='"+uix_sc_pricing_col3_three_btn_link+"' period='"+uix_sc_pricing_col3_three_period+"' bcolor='"+uix_colorTran( uix_sc_pricing_col3_three_btn_color )+"' imcolor='"+uix_sc_pricing_col3_three_emphasis_color+"' col='3' last='1']";
					_vhtml_3 += "<br>[uix_pricing_item_level]"+uix_sc_pricing_col3_three_title+"[/uix_pricing_item_level]";
					_vhtml_3 += "<br>[uix_pricing_item_price]"+uix_sc_pricing_col3_three_currency+uix_sc_pricing_col3_three_price+"[/uix_pricing_item_price]";
					_vhtml_3 += "<br>[uix_pricing_item_desc]"+uix_sc_pricing_col3_three_desc+"[/uix_pricing_item_desc]";
					_vhtml_3 += "<br>[uix_pricing_item_button]"+uix_sc_pricing_col3_three_btn_label+"[/uix_pricing_item_button]";		
					_vhtml_3 += "<br>[uix_pricing_item_detail]"+uix_html_listTran( uix_sc_pricing_col3_three_features, 'ul' )+"[/uix_pricing_item_detail]";					
					_vhtml_3 += "<br>[/uix_pricing_item]<br>";
					
					
					
					/* Hide item */
					if ( uix_sc_pricing_col3_one_hide === true ) _vhtml_1 = '';
					if ( uix_sc_pricing_col3_two_hide === true ) _vhtml_2 = '';
					if ( uix_sc_pricing_col3_three_hide === true ) _vhtml_3 = '';
					
					
										
				window.send_to_editor("[uix_pricing]" + _vhtml_1 + _vhtml_2 + _vhtml_3 + "[/uix_pricing]");
				
				
				
		   /* Callback after custom javascript of sweetalert */
		  <?php echo UixShortcodes::sweetalert_after(); ?>
				


	} ); 

	
	
} ) ( jQuery );

</script>
