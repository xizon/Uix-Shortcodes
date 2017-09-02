<?php
if ( !class_exists( 'UixShortcodes' ) ) {
    return;
}

/**
 * Initialize sections template parameters
 * ----------------------------------------------------
 */
$form_vars = UixShortcodes::init_template_parameters( basename( __FILE__, '.php' ) );
if ( !is_array( $form_vars ) ) return;
foreach ( $form_vars as $key => $v ) :
	$$key = $v;
endforeach;



/**
 * Form Type
 */

$form_type = array(
    'list' => 4
);


$args_1 = 
	array(
	
		array(
			'id'             => 'uix_sc_pricing_col4_one_title',
			'title'          => esc_html__( 'Title', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => esc_html__( 'free', 'uix-shortcodes' ),
			'placeholder'    => '',
			'type'           => 'text'
		
		),
		array(
			'id'             => 'uix_sc_pricing_col4_one_price',
			'title'          => esc_html__( 'Price', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 49,
			'placeholder'    => '',
			'type'           => 'text'
		
		),
		array(
			'id'             => 'uix_sc_pricing_col4_one_emphasis_color',
			'title'          => esc_html__( 'Price Color', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '#d59a3e',
			'placeholder'    => '',
			'type'           => 'color',
			'default'        => array( '#a2bf2f', '#d59a3e', '#DD514C', '#FA9ADF', '#4BB1CF',  '#0E90D2', '#5F9EA0', '#473f3f',  '#bebebe' )
		
		),
		
		
		array(
			'id'             => 'uix_sc_pricing_col4_one_currency',
			'title'          => esc_html__( 'Currency', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '$',
			'placeholder'    => '',
			'type'           => 'text'
		
		),
		array(
			'id'             => 'uix_sc_pricing_col4_one_period',
			'title'          => esc_html__( 'Period', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => esc_html__( 'per month', 'uix-shortcodes' ),
			'placeholder'    => '',
			'type'           => 'text'
		
		),	
		array(
			'id'             => 'uix_sc_pricing_col4_one_desc',
			'title'          => esc_html__( 'Description', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => esc_html__( 'Some description text here.', 'uix-shortcodes' ),
			'placeholder'    => '',
			'type'           => 'textarea',
			'default'        => array(
									'row'     => 2,
									'format'  => true
				                )
		
		),	
		array(
			'id'             => 'uix_sc_pricing_col4_one_btn_label',
			'title'          => esc_html__( 'Button Label', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => esc_html__( 'TRY FOR FREE', 'uix-shortcodes' ),
			'placeholder'    => '',
			'type'           => 'text'
		
		),		
		array(
			'id'             => 'uix_sc_pricing_col4_one_btn_link',
			'title'          => esc_html__( 'Button Link', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => 'URL',
			'type'           => 'text'
		
		),	
		array(
			'id'             => 'uix_sc_pricing_col4_one_btn_color',
			'title'          => esc_html__( 'Button Color', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '#a2bf2f',
			'placeholder'    => '',
			'type'           => 'color',
			'default'        => array( '#a2bf2f', '#d59a3e', '#DD514C', '#FA9ADF', '#4BB1CF',  '#0E90D2', '#5F9EA0', '#473f3f',  '#bebebe' )
		
		),
		
		array(
			'id'             => 'uix_sc_pricing_col4_one_btn_win',
			'title'          => esc_html__( 'Open in new tab', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'checkbox',
			'default'        => array(
									'checked'  => false
				                )
		
		),	
		array(
			'id'             => 'uix_sc_pricing_col4_one_features',
			'title'          => esc_html__( 'Features', 'uix-shortcodes' ),
			'desc'           => esc_html__( 'Type one word or sentence per line when press "ENTER".', 'uix-shortcodes' ),
			'value'          => wp_kses( __( 'Feature Description<br>Another Feature Description<br><s>Invalid Feature Description</s>', 'uix-shortcodes' ), wp_kses_allowed_html( 'post' ) ),
			'placeholder'    => '',
			'type'           => 'textarea',
			'default'        => array(
									'row'                       => 5,
									'format'                    => false
				                )
		
		),	
		array(
			'id'             => 'uix_sc_pricing_col4_one_active',
			'title'          => esc_html__( 'Active', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'checkbox',
			'default'        => array(
									'checked'  => false
				                )
		
		),	
		array(
			'id'             => 'uix_sc_pricing_col4_one_hide',
			'title'          => esc_html__( 'Hide', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'checkbox',
			'default'        => array(
									'checked'  => false
				                )
		
		),	

	
	)
;

$args_2 = 
	array(

	
		array(
			'id'             => 'uix_sc_pricing_col4_two_title',
			'title'          => esc_html__( 'Title', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => esc_html__( 'premium', 'uix-shortcodes' ),
			'placeholder'    => '',
			'type'           => 'text'
		
		),
		array(
			'id'             => 'uix_sc_pricing_col4_two_price',
			'title'          => esc_html__( 'Price', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 69,
			'placeholder'    => '',
			'type'           => 'text'
		
		),
		array(
			'id'             => 'uix_sc_pricing_col4_two_emphasis_color',
			'title'          => esc_html__( 'Price Color', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '#d59a3e',
			'placeholder'    => '',
			'type'           => 'color',
			'default'        => array( '#a2bf2f', '#d59a3e', '#DD514C', '#FA9ADF', '#4BB1CF',  '#0E90D2', '#5F9EA0', '#473f3f',  '#bebebe' )
		
		),
		
		array(
			'id'             => 'uix_sc_pricing_col4_two_currency',
			'title'          => esc_html__( 'Currency', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '$',
			'placeholder'    => '',
			'type'           => 'text'
		
		),
		array(
			'id'             => 'uix_sc_pricing_col4_two_period',
			'title'          => esc_html__( 'Period', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => esc_html__( 'per month', 'uix-shortcodes' ),
			'placeholder'    => '',
			'type'           => 'text'
		
		),	
		array(
			'id'             => 'uix_sc_pricing_col4_two_desc',
			'title'          => esc_html__( 'Description', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => esc_html__( 'Some description text here.', 'uix-shortcodes' ),
			'placeholder'    => '',
			'type'           => 'textarea',
			'default'        => array(
									'row'     => 2,
									'format'  => true
				                )
		
		),	
		array(
			'id'             => 'uix_sc_pricing_col4_two_btn_label',
			'title'          => esc_html__( 'Button Label', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => esc_html__( 'BUY', 'uix-shortcodes' ),
			'placeholder'    => '',
			'type'           => 'text'
		
		),		
		array(
			'id'             => 'uix_sc_pricing_col4_two_btn_link',
			'title'          => esc_html__( 'Button Link', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => 'URL',
			'type'           => 'text'
		
		),	
		
		array(
			'id'             => 'uix_sc_pricing_col4_two_btn_color',
			'title'          => esc_html__( 'Button Color', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '#a2bf2f',
			'placeholder'    => '',
			'type'           => 'color',
			'default'        => array( '#a2bf2f', '#d59a3e', '#DD514C', '#FA9ADF', '#4BB1CF',  '#0E90D2', '#5F9EA0', '#473f3f',  '#bebebe' )
		
		),
		
		array(
			'id'             => 'uix_sc_pricing_col4_two_btn_win',
			'title'          => esc_html__( 'Open in new tab', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'checkbox',
			'default'        => array(
									'checked'  => false
				                )
		
		),	
		array(
			'id'             => 'uix_sc_pricing_col4_two_features',
			'title'          => esc_html__( 'Features', 'uix-shortcodes' ),
			'desc'           => esc_html__( 'Type one word or sentence per line when press "ENTER".', 'uix-shortcodes' ),
			'value'          => wp_kses( __( 'Feature Description<br>Another Feature Description<br>Another Feature Description<br><s>Invalid Feature Description</s>', 'uix-shortcodes' ), wp_kses_allowed_html( 'post' ) ),
			'placeholder'    => '',
			'type'           => 'textarea',
			'default'        => array(
									'row'                       => 5,
									'format'                    => false
				                )
		
		),	
		array(
			'id'             => 'uix_sc_pricing_col4_two_active',
			'title'          => esc_html__( 'Active', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'checkbox',
			'default'        => array(
									'checked'  => true
				                )
		
		),	
		array(
			'id'             => 'uix_sc_pricing_col4_two_hide',
			'title'          => esc_html__( 'Hide', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'checkbox',
			'default'        => array(
									'checked'  => false
				                )
		
		),	
		
	
	)
;


$args_3 = 
	array(
	

		array(
			'id'             => 'uix_sc_pricing_col4_three_title',
			'title'          => esc_html__( 'Title', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => esc_html__( 'professional', 'uix-shortcodes' ),
			'placeholder'    => '',
			'type'           => 'text'
		
		),
		array(
			'id'             => 'uix_sc_pricing_col4_three_price',
			'title'          => esc_html__( 'Price', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 109,
			'placeholder'    => '',
			'type'           => 'text'
		
		),
		array(
			'id'             => 'uix_sc_pricing_col4_three_emphasis_color',
			'title'          => esc_html__( 'Price Color', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '#d59a3e',
			'placeholder'    => '',
			'type'           => 'color',
			'default'        => array( '#a2bf2f', '#d59a3e', '#DD514C', '#FA9ADF', '#4BB1CF',  '#0E90D2', '#5F9EA0', '#473f3f',  '#bebebe' )
		
		),
		
		array(
			'id'             => 'uix_sc_pricing_col4_three_currency',
			'title'          => esc_html__( 'Currency', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '$',
			'placeholder'    => '',
			'type'           => 'text'
		
		),
		array(
			'id'             => 'uix_sc_pricing_col4_three_period',
			'title'          => esc_html__( 'Period', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => esc_html__( 'per month', 'uix-shortcodes' ),
			'placeholder'    => '',
			'type'           => 'text'
		
		),	
		array(
			'id'             => 'uix_sc_pricing_col4_three_desc',
			'title'          => esc_html__( 'Description', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => esc_html__( 'Some description text here.', 'uix-shortcodes' ),
			'placeholder'    => '',
			'type'           => 'textarea',
			'default'        => array(
									'row'     => 2,
									'format'  => true
				                )
		
		),	
		array(
			'id'             => 'uix_sc_pricing_col4_three_btn_label',
			'title'          => esc_html__( 'Button Label', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => esc_html__( 'BUY', 'uix-shortcodes' ),
			'placeholder'    => '',
			'type'           => 'text'
		
		),		
		array(
			'id'             => 'uix_sc_pricing_col4_three_btn_link',
			'title'          => esc_html__( 'Button Link', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => 'URL',
			'type'           => 'text'
		
		),	
		
		array(
			'id'             => 'uix_sc_pricing_col4_three_btn_color',
			'title'          => esc_html__( 'Button Color', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '#a2bf2f',
			'placeholder'    => '',
			'type'           => 'color',
			'default'        => array( '#a2bf2f', '#d59a3e', '#DD514C', '#FA9ADF', '#4BB1CF',  '#0E90D2', '#5F9EA0', '#473f3f',  '#bebebe' )
		
		),
		
		array(
			'id'             => 'uix_sc_pricing_col4_three_btn_win',
			'title'          => esc_html__( 'Open in new tab', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'checkbox',
			'default'        => array(
									'checked'  => false
				                )
		
		),	
		array(
			'id'             => 'uix_sc_pricing_col4_three_features',
			'title'          => esc_html__( 'Features', 'uix-shortcodes' ),
			'desc'           => esc_html__( 'Type one word or sentence per line when press "ENTER".', 'uix-shortcodes' ),
			'value'          => wp_kses( __( 'Feature Description<br>Another Feature Description<br>Another Feature Description<br><s>Invalid Feature Description</s><br>Another Feature Description', 'uix-shortcodes' ), wp_kses_allowed_html( 'post' ) ),
			'placeholder'    => '',
			'type'           => 'textarea',
			'default'        => array(
									'row'                       => 5,
									'format'                    => false
				                )
		
		),	
		array(
			'id'             => 'uix_sc_pricing_col4_three_active',
			'title'          => esc_html__( 'Active', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'checkbox',
			'default'        => array(
									'checked'  => false
				                )
		
		),	
		array(
			'id'             => 'uix_sc_pricing_col4_three_hide',
			'title'          => esc_html__( 'Hide', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'checkbox',
			'default'        => array(
									'checked'  => false
				                )
		
		),	
		
	
	)
;

$args_4 = 
	array(
	

		array(
			'id'             => 'uix_sc_pricing_col4_four_title',
			'title'          => esc_html__( 'Title', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => esc_html__( 'expand', 'uix-shortcodes' ),
			'placeholder'    => '',
			'type'           => 'text'
		
		),
		array(
			'id'             => 'uix_sc_pricing_col4_four_price',
			'title'          => esc_html__( 'Price', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 139,
			'placeholder'    => '',
			'type'           => 'text'
		
		),
		array(
			'id'             => 'uix_sc_pricing_col4_four_emphasis_color',
			'title'          => esc_html__( 'Price Color', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '#d59a3e',
			'placeholder'    => '',
			'type'           => 'color',
			'default'        => array( '#a2bf2f', '#d59a3e', '#DD514C', '#FA9ADF', '#4BB1CF',  '#0E90D2', '#5F9EA0', '#473f3f',  '#bebebe' )
		
		),
		
		array(
			'id'             => 'uix_sc_pricing_col4_four_currency',
			'title'          => esc_html__( 'Currency', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '$',
			'placeholder'    => '',
			'type'           => 'text'
		
		),
		array(
			'id'             => 'uix_sc_pricing_col4_four_period',
			'title'          => esc_html__( 'Period', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => esc_html__( 'per month', 'uix-shortcodes' ),
			'placeholder'    => '',
			'type'           => 'text'
		
		),	
		array(
			'id'             => 'uix_sc_pricing_col4_four_desc',
			'title'          => esc_html__( 'Description', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => esc_html__( 'Some description text here.', 'uix-shortcodes' ),
			'placeholder'    => '',
			'type'           => 'textarea',
			'default'        => array(
									'row'     => 2,
									'format'  => true
				                )
		
		),	
		array(
			'id'             => 'uix_sc_pricing_col4_four_btn_label',
			'title'          => esc_html__( 'Button Label', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => esc_html__( 'BUY', 'uix-shortcodes' ),
			'placeholder'    => '',
			'type'           => 'text'
		
		),		
		array(
			'id'             => 'uix_sc_pricing_col4_four_btn_link',
			'title'          => esc_html__( 'Button Link', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => 'URL',
			'type'           => 'text'
		
		),	
		
		array(
			'id'             => 'uix_sc_pricing_col4_four_btn_color',
			'title'          => esc_html__( 'Button Color', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '#a2bf2f',
			'placeholder'    => '',
			'type'           => 'color',
			'default'        => array( '#a2bf2f', '#d59a3e', '#DD514C', '#FA9ADF', '#4BB1CF',  '#0E90D2', '#5F9EA0', '#473f3f',  '#bebebe' )
		
		),
		
		array(
			'id'             => 'uix_sc_pricing_col4_four_btn_win',
			'title'          => esc_html__( 'Open in new tab', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'checkbox',
			'default'        => array(
									'checked'  => false
				                )
		
		),	
		array(
			'id'             => 'uix_sc_pricing_col4_four_features',
			'title'          => esc_html__( 'Features', 'uix-shortcodes' ),
			'desc'           => esc_html__( 'Type one word or sentence per line when press "ENTER".', 'uix-shortcodes' ),
			'value'          => wp_kses( __( 'Feature Description<br>Another Feature Description<br>Another Feature Description<br><s>Invalid Feature Description</s><br>Another Feature Description<br>Another Feature Description', 'uix-shortcodes' ), wp_kses_allowed_html( 'post' ) ),
			'placeholder'    => '',
			'type'           => 'textarea',
			'default'        => array(
									'row'                       => 5,
									'format'                    => false
				                )
		
		),	
		array(
			'id'             => 'uix_sc_pricing_col4_four_active',
			'title'          => esc_html__( 'Active', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'checkbox',
			'default'        => array(
									'checked'  => false
				                )
		
		),	
		array(
			'id'             => 'uix_sc_pricing_col4_four_hide',
			'title'          => esc_html__( 'Hide', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'checkbox',
			'default'        => array(
									'checked'  => false
				                )
		
		),	
		
	
	)
;


/**
 * Returns form javascripts
 * ----------------------------------------------------
 */
UixShortcodes::form_scripts( array(
	    'clone'                   => '',
		'form_id'                 => $form_id,
		'section_id'              => $sid,
	    'content_id'              => $cid,
		'fields'                  => array(
										array(
											 'type'    => $form_type,
											 'values'  => $args_1,
											 'title'   => esc_html__( 'Table 1', 'uix-shortcodes' )
										),
										array(
											 'type'    => $form_type,
											 'values'  => $args_2,
											 'title'   => esc_html__( 'Table 2', 'uix-shortcodes' )
										),
										array(
											 'type'    => $form_type,
											 'values'  => $args_3,
											 'title'   => esc_html__( 'Table 3', 'uix-shortcodes' )
										),
										array(
											 'type'    => $form_type,
											 'values'  => $args_4,
											 'title'   => esc_html__( 'Table 4', 'uix-shortcodes' )
										),

									),
		'title'                   => esc_html__( 'Pricing Table (4 column)', 'uix-shortcodes' ),
	    'js_template'             => '
		
			/* Making the button open in a new window */
			var _p_btn_target_1 = "", _p_btn_target_2 = "", _p_btn_target_3 = "", _p_btn_target_4 = "";
			if ( uix_sc_pricing_col4_one_btn_win === true ) _p_btn_target_1 = \'_blank\';
			if ( uix_sc_pricing_col4_two_btn_win === true ) _p_btn_target_2 = \'_blank\';
			if ( uix_sc_pricing_col4_three_btn_win === true ) _p_btn_target_3 = \'_blank\';
			if ( uix_sc_pricing_col4_four_btn_win === true ) _p_btn_target_4 = \'_blank\';

			/* Mark a pricing as important */
			var _p_class_1 = "", _p_class_2 = "", _p_class_3 = "", _p_class_4 = "";
			if ( uix_sc_pricing_col4_one_active === true ) _p_class_1 = \'uix-sc-price-important\';
			if ( uix_sc_pricing_col4_two_active === true ) _p_class_2 = \'uix-sc-price-important\';
			if ( uix_sc_pricing_col4_three_active === true ) _p_class_3 = \'uix-sc-price-important\';
			if ( uix_sc_pricing_col4_four_active === true ) _p_class_4 = \'uix-sc-price-important\';



			/* Output */
			var _vhtml_1 = "",_vhtml_2 = "",_vhtml_3 = "",_vhtml_4 = "";
			_vhtml_1 += "<br>[uix_pricing_item target=\'"+_p_btn_target_1+"\' class=\'"+_p_class_1+"\' url=\'"+uix_sc_pricing_col4_one_btn_link+"\' period=\'"+uix_sc_pricing_col4_one_period+"\' bcolor=\'"+uixscform_colorTran( uix_sc_pricing_col4_one_btn_color )+"\' imcolor=\'"+uix_sc_pricing_col4_one_emphasis_color+"\' col=\'4\']";
			_vhtml_1 += "<br>[uix_pricing_item_level]"+uix_sc_pricing_col4_one_title+"[/uix_pricing_item_level]";
			_vhtml_1 += "<br>[uix_pricing_item_price]"+uix_sc_pricing_col4_one_currency+uixscform_floatval( uix_sc_pricing_col4_one_price )+"[/uix_pricing_item_price]";
			_vhtml_1 += "<br>[uix_pricing_item_desc]"+uix_sc_pricing_col4_one_desc+"[/uix_pricing_item_desc]";
			_vhtml_1 += "<br>[uix_pricing_item_button]"+uix_sc_pricing_col4_one_btn_label+"[/uix_pricing_item_button]";		
			_vhtml_1 += "<br>[uix_pricing_item_detail][ul]"+uixscform_html_listTran( uix_sc_pricing_col4_one_features, \'li\' )+"[/ul][/uix_pricing_item_detail]";					
			_vhtml_1 += "<br>[/uix_pricing_item]<br>";

			_vhtml_2 += "[uix_pricing_item target=\'"+_p_btn_target_2+"\' class=\'"+_p_class_2+"\' url=\'"+uix_sc_pricing_col4_two_btn_link+"\' period=\'"+uix_sc_pricing_col4_two_period+"\' bcolor=\'"+uixscform_colorTran( uix_sc_pricing_col4_two_btn_color )+"\' imcolor=\'"+uix_sc_pricing_col4_two_emphasis_color+"\' col=\'4\']";
			_vhtml_2 += "<br>[uix_pricing_item_level]"+uix_sc_pricing_col4_two_title+"[/uix_pricing_item_level]";
			_vhtml_2 += "<br>[uix_pricing_item_price]"+uix_sc_pricing_col4_two_currency+uixscform_floatval( uix_sc_pricing_col4_two_price )+"[/uix_pricing_item_price]";
			_vhtml_2 += "<br>[uix_pricing_item_desc]"+uix_sc_pricing_col4_two_desc+"[/uix_pricing_item_desc]";
			_vhtml_2 += "<br>[uix_pricing_item_button]"+uix_sc_pricing_col4_two_btn_label+"[/uix_pricing_item_button]";		
			_vhtml_2 += "<br>[uix_pricing_item_detail][ul]"+uixscform_html_listTran( uix_sc_pricing_col4_two_features, \'li\' )+"[/ul][/uix_pricing_item_detail]";					
			_vhtml_2 += "<br>[/uix_pricing_item]<br>";

			_vhtml_3 += "[uix_pricing_item target=\'"+_p_btn_target_3+"\' class=\'"+_p_class_3+"\' url=\'"+uix_sc_pricing_col4_three_btn_link+"\' period=\'"+uix_sc_pricing_col4_three_period+"\' bcolor=\'"+uixscform_colorTran( uix_sc_pricing_col4_three_btn_color )+"\' imcolor=\'"+uix_sc_pricing_col4_three_emphasis_color+"\' col=\'4\']";
			_vhtml_3 += "<br>[uix_pricing_item_level]"+uix_sc_pricing_col4_three_title+"[/uix_pricing_item_level]";
			_vhtml_3 += "<br>[uix_pricing_item_price]"+uix_sc_pricing_col4_three_currency+uixscform_floatval( uix_sc_pricing_col4_three_price )+"[/uix_pricing_item_price]";
			_vhtml_3 += "<br>[uix_pricing_item_desc]"+uix_sc_pricing_col4_three_desc+"[/uix_pricing_item_desc]";
			_vhtml_3 += "<br>[uix_pricing_item_button]"+uix_sc_pricing_col4_three_btn_label+"[/uix_pricing_item_button]";		
			_vhtml_3 += "<br>[uix_pricing_item_detail][ul]"+uixscform_html_listTran( uix_sc_pricing_col4_three_features, \'li\' )+"[/ul][/uix_pricing_item_detail]";					
			_vhtml_3 += "<br>[/uix_pricing_item]<br>";

			_vhtml_4 += "[uix_pricing_item target=\'"+_p_btn_target_4+"\' class=\'"+_p_class_4+"\' url=\'"+uix_sc_pricing_col4_four_btn_link+"\' period=\'"+uix_sc_pricing_col4_four_period+"\' bcolor=\'"+uixscform_colorTran( uix_sc_pricing_col4_four_btn_color )+"\' imcolor=\'"+uix_sc_pricing_col4_four_emphasis_color+"\' col=\'4\' last=\'1\']";
			_vhtml_4 += "<br>[uix_pricing_item_level]"+uix_sc_pricing_col4_four_title+"[/uix_pricing_item_level]";
			_vhtml_4 += "<br>[uix_pricing_item_price]"+uix_sc_pricing_col4_four_currency+uixscform_floatval( uix_sc_pricing_col4_four_price )+"[/uix_pricing_item_price]";
			_vhtml_4 += "<br>[uix_pricing_item_desc]"+uix_sc_pricing_col4_four_desc+"[/uix_pricing_item_desc]";
			_vhtml_4 += "<br>[uix_pricing_item_button]"+uix_sc_pricing_col4_four_btn_label+"[/uix_pricing_item_button]";		
			_vhtml_4 += "<br>[uix_pricing_item_detail][ul]"+uixscform_html_listTran( uix_sc_pricing_col4_four_features, \'li\' )+"[/ul][/uix_pricing_item_detail]";					
			_vhtml_4 += "<br>[/uix_pricing_item]<br>";


			/* Hide item */
			if ( uix_sc_pricing_col4_one_hide === true ) _vhtml_1 = \'\';
			if ( uix_sc_pricing_col4_two_hide === true ) _vhtml_2 = \'\';
			if ( uix_sc_pricing_col4_three_hide === true ) _vhtml_3 = \'\';
			if ( uix_sc_pricing_col4_four_hide === true ) _vhtml_4 = \'\';



			code = "[uix_pricing]" + _vhtml_1 + _vhtml_2 + _vhtml_3 + _vhtml_4 + "[/uix_pricing]";

		
		'
    )
);

