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
$form_id = 'uix_sc_form_pricing_col4';

/**
 * Form Type
 */

$form_type = [
    'list' => 4
];


$args_1 = 
	[
	
		array(
			'id'             => 'uix_sc_pricing_col4_one_title',
			'title'          => __( 'Title', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => __( 'free', 'uix-shortcodes' ),
			'placeholder'    => '',
			'type'           => 'text'
		
		),
		array(
			'id'             => 'uix_sc_pricing_col4_one_price',
			'title'          => __( 'Price', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 49,
			'placeholder'    => '',
			'type'           => 'text'
		
		),
		array(
			'id'             => 'uix_sc_pricing_col4_one_emphasis_color',
			'title'          => __( 'Price Color', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '#d59a3e',
			'placeholder'    => '',
			'type'           => 'color',
			'default'        => [ '#a2bf2f', '#d59a3e', '#DD514C', '#FA9ADF', '#4BB1CF',  '#0E90D2', '#5F9EA0', '#473f3f',  '#bebebe' ]
		
		),
		
		
		array(
			'id'             => 'uix_sc_pricing_col4_one_currency',
			'title'          => __( 'Currency', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '$',
			'placeholder'    => '',
			'type'           => 'text'
		
		),
		array(
			'id'             => 'uix_sc_pricing_col4_one_period',
			'title'          => __( 'Period', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => __( 'per month', 'uix-shortcodes' ),
			'placeholder'    => '',
			'type'           => 'text'
		
		),	
		array(
			'id'             => 'uix_sc_pricing_col4_one_desc',
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
			'id'             => 'uix_sc_pricing_col4_one_btn_label',
			'title'          => __( 'Button Label', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => __( 'TRY FOR FREE', 'uix-shortcodes' ),
			'placeholder'    => '',
			'type'           => 'text'
		
		),		
		array(
			'id'             => 'uix_sc_pricing_col4_one_btn_link',
			'title'          => __( 'Button Link', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => 'URL',
			'type'           => 'text'
		
		),	
		array(
			'id'             => 'uix_sc_pricing_col4_one_btn_color',
			'title'          => __( 'Button Color', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '#a2bf2f',
			'placeholder'    => '',
			'type'           => 'color',
			'default'        => [ '#a2bf2f', '#d59a3e', '#DD514C', '#FA9ADF', '#4BB1CF',  '#0E90D2', '#5F9EA0', '#473f3f',  '#bebebe' ]
		
		),
		
		array(
			'id'             => 'uix_sc_pricing_col4_one_btn_win',
			'title'          => __( 'Open in new tab', 'uix-shortcodes' ),
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
			'id'             => 'uix_sc_pricing_col4_one_active',
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
			'id'             => 'uix_sc_pricing_col4_one_hide',
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
			'id'             => 'uix_sc_pricing_col4_two_title',
			'title'          => __( 'Title', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => __( 'premium', 'uix-shortcodes' ),
			'placeholder'    => '',
			'type'           => 'text'
		
		),
		array(
			'id'             => 'uix_sc_pricing_col4_two_price',
			'title'          => __( 'Price', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 69,
			'placeholder'    => '',
			'type'           => 'text'
		
		),
		array(
			'id'             => 'uix_sc_pricing_col4_two_emphasis_color',
			'title'          => __( 'Price Color', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '#d59a3e',
			'placeholder'    => '',
			'type'           => 'color',
			'default'        => [ '#a2bf2f', '#d59a3e', '#DD514C', '#FA9ADF', '#4BB1CF',  '#0E90D2', '#5F9EA0', '#473f3f',  '#bebebe' ]
		
		),
		
		array(
			'id'             => 'uix_sc_pricing_col4_two_currency',
			'title'          => __( 'Currency', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '$',
			'placeholder'    => '',
			'type'           => 'text'
		
		),
		array(
			'id'             => 'uix_sc_pricing_col4_two_period',
			'title'          => __( 'Period', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => __( 'per month', 'uix-shortcodes' ),
			'placeholder'    => '',
			'type'           => 'text'
		
		),	
		array(
			'id'             => 'uix_sc_pricing_col4_two_desc',
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
			'id'             => 'uix_sc_pricing_col4_two_btn_label',
			'title'          => __( 'Button Label', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => __( 'BUY', 'uix-shortcodes' ),
			'placeholder'    => '',
			'type'           => 'text'
		
		),		
		array(
			'id'             => 'uix_sc_pricing_col4_two_btn_link',
			'title'          => __( 'Button Link', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => 'URL',
			'type'           => 'text'
		
		),	
		
		array(
			'id'             => 'uix_sc_pricing_col4_two_btn_color',
			'title'          => __( 'Button Color', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '#a2bf2f',
			'placeholder'    => '',
			'type'           => 'color',
			'default'        => [ '#a2bf2f', '#d59a3e', '#DD514C', '#FA9ADF', '#4BB1CF',  '#0E90D2', '#5F9EA0', '#473f3f',  '#bebebe' ]
		
		),
		
		array(
			'id'             => 'uix_sc_pricing_col4_two_btn_win',
			'title'          => __( 'Open in new tab', 'uix-shortcodes' ),
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
			'id'             => 'uix_sc_pricing_col4_two_active',
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
			'id'             => 'uix_sc_pricing_col4_two_hide',
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
			'id'             => 'uix_sc_pricing_col4_three_title',
			'title'          => __( 'Title', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => __( 'professional', 'uix-shortcodes' ),
			'placeholder'    => '',
			'type'           => 'text'
		
		),
		array(
			'id'             => 'uix_sc_pricing_col4_three_price',
			'title'          => __( 'Price', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 109,
			'placeholder'    => '',
			'type'           => 'text'
		
		),
		array(
			'id'             => 'uix_sc_pricing_col4_three_emphasis_color',
			'title'          => __( 'Price Color', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '#d59a3e',
			'placeholder'    => '',
			'type'           => 'color',
			'default'        => [ '#a2bf2f', '#d59a3e', '#DD514C', '#FA9ADF', '#4BB1CF',  '#0E90D2', '#5F9EA0', '#473f3f',  '#bebebe' ]
		
		),
		
		array(
			'id'             => 'uix_sc_pricing_col4_three_currency',
			'title'          => __( 'Currency', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '$',
			'placeholder'    => '',
			'type'           => 'text'
		
		),
		array(
			'id'             => 'uix_sc_pricing_col4_three_period',
			'title'          => __( 'Period', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => __( 'per month', 'uix-shortcodes' ),
			'placeholder'    => '',
			'type'           => 'text'
		
		),	
		array(
			'id'             => 'uix_sc_pricing_col4_three_desc',
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
			'id'             => 'uix_sc_pricing_col4_three_btn_label',
			'title'          => __( 'Button Label', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => __( 'BUY', 'uix-shortcodes' ),
			'placeholder'    => '',
			'type'           => 'text'
		
		),		
		array(
			'id'             => 'uix_sc_pricing_col4_three_btn_link',
			'title'          => __( 'Button Link', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => 'URL',
			'type'           => 'text'
		
		),	
		
		array(
			'id'             => 'uix_sc_pricing_col4_three_btn_color',
			'title'          => __( 'Button Color', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '#a2bf2f',
			'placeholder'    => '',
			'type'           => 'color',
			'default'        => [ '#a2bf2f', '#d59a3e', '#DD514C', '#FA9ADF', '#4BB1CF',  '#0E90D2', '#5F9EA0', '#473f3f',  '#bebebe' ]
		
		),
		
		array(
			'id'             => 'uix_sc_pricing_col4_three_btn_win',
			'title'          => __( 'Open in new tab', 'uix-shortcodes' ),
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
			'id'             => 'uix_sc_pricing_col4_three_active',
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
			'id'             => 'uix_sc_pricing_col4_three_hide',
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

$args_4 = 
	[
	

		array(
			'id'             => 'uix_sc_pricing_col4_four_title',
			'title'          => __( 'Title', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => __( 'expand', 'uix-shortcodes' ),
			'placeholder'    => '',
			'type'           => 'text'
		
		),
		array(
			'id'             => 'uix_sc_pricing_col4_four_price',
			'title'          => __( 'Price', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 139,
			'placeholder'    => '',
			'type'           => 'text'
		
		),
		array(
			'id'             => 'uix_sc_pricing_col4_four_emphasis_color',
			'title'          => __( 'Price Color', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '#d59a3e',
			'placeholder'    => '',
			'type'           => 'color',
			'default'        => [ '#a2bf2f', '#d59a3e', '#DD514C', '#FA9ADF', '#4BB1CF',  '#0E90D2', '#5F9EA0', '#473f3f',  '#bebebe' ]
		
		),
		
		array(
			'id'             => 'uix_sc_pricing_col4_four_currency',
			'title'          => __( 'Currency', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '$',
			'placeholder'    => '',
			'type'           => 'text'
		
		),
		array(
			'id'             => 'uix_sc_pricing_col4_four_period',
			'title'          => __( 'Period', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => __( 'per month', 'uix-shortcodes' ),
			'placeholder'    => '',
			'type'           => 'text'
		
		),	
		array(
			'id'             => 'uix_sc_pricing_col4_four_desc',
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
			'id'             => 'uix_sc_pricing_col4_four_btn_label',
			'title'          => __( 'Button Label', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => __( 'BUY', 'uix-shortcodes' ),
			'placeholder'    => '',
			'type'           => 'text'
		
		),		
		array(
			'id'             => 'uix_sc_pricing_col4_four_btn_link',
			'title'          => __( 'Button Link', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => 'URL',
			'type'           => 'text'
		
		),	
		
		array(
			'id'             => 'uix_sc_pricing_col4_four_btn_color',
			'title'          => __( 'Button Color', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '#a2bf2f',
			'placeholder'    => '',
			'type'           => 'color',
			'default'        => [ '#a2bf2f', '#d59a3e', '#DD514C', '#FA9ADF', '#4BB1CF',  '#0E90D2', '#5F9EA0', '#473f3f',  '#bebebe' ]
		
		),
		
		array(
			'id'             => 'uix_sc_pricing_col4_four_btn_win',
			'title'          => __( 'Open in new tab', 'uix-shortcodes' ),
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
			'title'          => __( 'Features', 'uix-shortcodes' ),
			'desc'           => __( 'Type one word or sentence per line when press "ENTER".', 'uix-shortcodes' ),
			'value'          => __( 'Feature Description<br>Another Feature Description<br>Another Feature Description<br><s>Invalid Feature Description</s><br>Another Feature Description<br>Another Feature Description', 'uix-shortcodes' ),
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
			'id'             => 'uix_sc_pricing_col4_four_active',
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
			'id'             => 'uix_sc_pricing_col4_four_hide',
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

$form_html = UixSCFormCore::form_before( $cid, $sid, $form_id );

$form_html .= UixSCFormCore::add_form( $cid, $sid, $form_id, $form_type, $args_1, 'html', __( 'Item 1', 'uix-shortcodes' ) );
$form_html .= UixSCFormCore::add_form( $cid, $sid, $form_id, $form_type, $args_2, 'html', __( 'Item 2', 'uix-shortcodes' ) );
$form_html .= UixSCFormCore::add_form( $cid, $sid, $form_id, $form_type, $args_3, 'html', __( 'Item 3', 'uix-shortcodes' ) );
$form_html .= UixSCFormCore::add_form( $cid, $sid, $form_id, $form_type, $args_4, 'html', __( 'Item 4', 'uix-shortcodes' ) );

$form_html .= UixSCFormCore::form_after();

//----

$form_js = '';
$form_js .= UixSCFormCore::add_form( $cid, $sid, $form_id, $form_type, $args_1, 'js' );
$form_js .= UixSCFormCore::add_form( $cid, $sid, $form_id, $form_type, $args_2, 'js' );
$form_js .= UixSCFormCore::add_form( $cid, $sid, $form_id, $form_type, $args_3, 'js' );
$form_js .= UixSCFormCore::add_form( $cid, $sid, $form_id, $form_type, $args_4, 'js' );


//----

$form_js_vars = '';
$form_js_vars .= UixSCFormCore::add_form( $cid, $sid, $form_id, $form_type, $args_1, 'js_vars' );
$form_js_vars .= UixSCFormCore::add_form( $cid, $sid, $form_id, $form_type, $args_2, 'js_vars' );
$form_js_vars .= UixSCFormCore::add_form( $cid, $sid, $form_id, $form_type, $args_3, 'js_vars' );
$form_js_vars .= UixSCFormCore::add_form( $cid, $sid, $form_id, $form_type, $args_4, 'js_vars' );

/**
 * Returns actions of javascript
 */

if ( $sid == -1 && is_admin() ) {
	$currentScreen = get_current_screen();
	if( $currentScreen->base === "post" || $currentScreen->base === "widgets" || $currentScreen->base === "customize" || self::inc_str( $currentScreen->base, '_page_' ) ) {
	  	  
		if ( is_admin()) {
			
			echo UixSCFormCore::add_form( $cid, $sid, $form_id, '', '', 'active_btn' );
			?>
			<script type="text/javascript">
			( function($) {
			'use strict';
				$( function() {  
					<?php echo UixSCFormCore::uixscform_callback( $form_js, $form_id, __( 'Insert Pricing Table (4 column)', 'uix-shortcodes' ) ); ?> 
					<?php echo UixSCFormCore::send_before( $form_js_vars, $form_id ); ?> 
					/*--**************** Custom shortcode begin ****************-- */
						
						/* Making the button open in a new window */
						var _p_btn_target_1 = "", _p_btn_target_2 = "", _p_btn_target_3 = "", _p_btn_target_4 = "";
						if ( uix_sc_pricing_col4_one_btn_win === true ) _p_btn_target_1 = '_blank';
						if ( uix_sc_pricing_col4_two_btn_win === true ) _p_btn_target_2 = '_blank';
						if ( uix_sc_pricing_col4_three_btn_win === true ) _p_btn_target_3 = '_blank';
						if ( uix_sc_pricing_col4_four_btn_win === true ) _p_btn_target_4 = '_blank';
						
						/* Mark a pricing as important */
						var _p_class_1 = "", _p_class_2 = "", _p_class_3 = "", _p_class_4 = "";
						if ( uix_sc_pricing_col4_one_active === true ) _p_class_1 = 'uix-sc-price-important';
						if ( uix_sc_pricing_col4_two_active === true ) _p_class_2 = 'uix-sc-price-important';
						if ( uix_sc_pricing_col4_three_active === true ) _p_class_3 = 'uix-sc-price-important';
						if ( uix_sc_pricing_col4_four_active === true ) _p_class_4 = 'uix-sc-price-important';
						
	
					
						/* Output */
						var _vhtml_1 = "",_vhtml_2 = "",_vhtml_3 = "",_vhtml_4 = "";
						_vhtml_1 += "<br>[uix_pricing_item target='"+_p_btn_target_1+"' class='"+_p_class_1+"' url='"+uix_sc_pricing_col4_one_btn_link+"' period='"+uix_sc_pricing_col4_one_period+"' bcolor='"+uixscform_colorTran( uix_sc_pricing_col4_one_btn_color )+"' imcolor='"+uix_sc_pricing_col4_one_emphasis_color+"' col='4']";
						_vhtml_1 += "<br>[uix_pricing_item_level]"+uix_sc_pricing_col4_one_title+"[/uix_pricing_item_level]";
						_vhtml_1 += "<br>[uix_pricing_item_price]"+uix_sc_pricing_col4_one_currency+uix_sc_pricing_col4_one_price+"[/uix_pricing_item_price]";
						_vhtml_1 += "<br>[uix_pricing_item_desc]"+uix_sc_pricing_col4_one_desc+"[/uix_pricing_item_desc]";
						_vhtml_1 += "<br>[uix_pricing_item_button]"+uix_sc_pricing_col4_one_btn_label+"[/uix_pricing_item_button]";		
						_vhtml_1 += "<br>[uix_pricing_item_detail]"+uixscform_html_listTran( uix_sc_pricing_col4_one_features, 'ul' )+"[/uix_pricing_item_detail]";					
						_vhtml_1 += "<br>[/uix_pricing_item]<br>";
						
						_vhtml_2 += "[uix_pricing_item target='"+_p_btn_target_2+"' class='"+_p_class_2+"' url='"+uix_sc_pricing_col4_two_btn_link+"' period='"+uix_sc_pricing_col4_two_period+"' bcolor='"+uixscform_colorTran( uix_sc_pricing_col4_two_btn_color )+"' imcolor='"+uix_sc_pricing_col4_two_emphasis_color+"' col='4']";
						_vhtml_2 += "<br>[uix_pricing_item_level]"+uix_sc_pricing_col4_two_title+"[/uix_pricing_item_level]";
						_vhtml_2 += "<br>[uix_pricing_item_price]"+uix_sc_pricing_col4_two_currency+uix_sc_pricing_col4_two_price+"[/uix_pricing_item_price]";
						_vhtml_2 += "<br>[uix_pricing_item_desc]"+uix_sc_pricing_col4_two_desc+"[/uix_pricing_item_desc]";
						_vhtml_2 += "<br>[uix_pricing_item_button]"+uix_sc_pricing_col4_two_btn_label+"[/uix_pricing_item_button]";		
						_vhtml_2 += "<br>[uix_pricing_item_detail]"+uixscform_html_listTran( uix_sc_pricing_col4_two_features, 'ul' )+"[/uix_pricing_item_detail]";					
						_vhtml_2 += "<br>[/uix_pricing_item]<br>";
						
						_vhtml_3 += "[uix_pricing_item target='"+_p_btn_target_3+"' class='"+_p_class_3+"' url='"+uix_sc_pricing_col4_three_btn_link+"' period='"+uix_sc_pricing_col4_three_period+"' bcolor='"+uixscform_colorTran( uix_sc_pricing_col4_three_btn_color )+"' imcolor='"+uix_sc_pricing_col4_three_emphasis_color+"' col='4']";
						_vhtml_3 += "<br>[uix_pricing_item_level]"+uix_sc_pricing_col4_three_title+"[/uix_pricing_item_level]";
						_vhtml_3 += "<br>[uix_pricing_item_price]"+uix_sc_pricing_col4_three_currency+uix_sc_pricing_col4_three_price+"[/uix_pricing_item_price]";
						_vhtml_3 += "<br>[uix_pricing_item_desc]"+uix_sc_pricing_col4_three_desc+"[/uix_pricing_item_desc]";
						_vhtml_3 += "<br>[uix_pricing_item_button]"+uix_sc_pricing_col4_three_btn_label+"[/uix_pricing_item_button]";		
						_vhtml_3 += "<br>[uix_pricing_item_detail]"+uixscform_html_listTran( uix_sc_pricing_col4_three_features, 'ul' )+"[/uix_pricing_item_detail]";					
						_vhtml_3 += "<br>[/uix_pricing_item]<br>";
						
						_vhtml_4 += "[uix_pricing_item target='"+_p_btn_target_4+"' class='"+_p_class_4+"' url='"+uix_sc_pricing_col4_four_btn_link+"' period='"+uix_sc_pricing_col4_four_period+"' bcolor='"+uixscform_colorTran( uix_sc_pricing_col4_four_btn_color )+"' imcolor='"+uix_sc_pricing_col4_four_emphasis_color+"' col='4' last='1']";
						_vhtml_4 += "<br>[uix_pricing_item_level]"+uix_sc_pricing_col4_four_title+"[/uix_pricing_item_level]";
						_vhtml_4 += "<br>[uix_pricing_item_price]"+uix_sc_pricing_col4_four_currency+uix_sc_pricing_col4_four_price+"[/uix_pricing_item_price]";
						_vhtml_4 += "<br>[uix_pricing_item_desc]"+uix_sc_pricing_col4_four_desc+"[/uix_pricing_item_desc]";
						_vhtml_4 += "<br>[uix_pricing_item_button]"+uix_sc_pricing_col4_four_btn_label+"[/uix_pricing_item_button]";		
						_vhtml_4 += "<br>[uix_pricing_item_detail]"+uixscform_html_listTran( uix_sc_pricing_col4_four_features, 'ul' )+"[/uix_pricing_item_detail]";					
						_vhtml_4 += "<br>[/uix_pricing_item]<br>";
						
						
						/* Hide item */
						if ( uix_sc_pricing_col4_one_hide === true ) _vhtml_1 = '';
						if ( uix_sc_pricing_col4_two_hide === true ) _vhtml_2 = '';
						if ( uix_sc_pricing_col4_three_hide === true ) _vhtml_3 = '';
						if ( uix_sc_pricing_col4_four_hide === true ) _vhtml_4 = '';
						
						
											
					code = "[uix_pricing]" + _vhtml_1 + _vhtml_2 + _vhtml_3 + _vhtml_4 + "[/uix_pricing]";

						
					/*--**************** Custom shortcode end ****************-- */
					<?php echo UixSCFormCore::send_after(); ?> 
			} ) ( jQuery );
			</script>
	 
			<?php
	
			
		}
	}
	
}


/**
 * Returns forms with ajax
 */
if ( $sid >= 0 && is_admin() ) {
	echo $form_html;	
}
