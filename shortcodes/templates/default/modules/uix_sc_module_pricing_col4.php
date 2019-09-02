<?php
if ( !class_exists( 'UixShortcodes' ) ) {
    return;
}

/**
 * Note: 
 *
 * Please refer to sample:  uix_sc_module_sample_hello.php
 * 						    uix_sc_module_sample_hello2.php
 *
 * 1) For all ID attribute, special characters are only allowed underscores "_"
 * 2) Optional params of field "callback":  html, html-shortcode, attr, slug, url, number, number-deg_px, color-name, list, source-code
 * 3) String of clone trigger ID, must contain at least "_triggerclonelist"
 * 4) String of clone ID attribute must contain at least "_listitem"
 * 5) If multiple columns are used to clone event and there are multiple clone triggers, 
      the triggers ID and clone controls ID must contain the string "_one_", "_two", "_three_" or "_four_" for per column
*/


/**
 * Returns current module(form group) ID
 * ----------------------------------------------------
 */
$form_id = basename( __FILE__, '.php' );


/**
 * Form Type & Controls
 * ----------------------------------------------------
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
			'type'           => 'text',
			'callback'       => 'html',
		
		),
		array(
			'id'             => 'uix_sc_pricing_col4_one_price',
			'title'          => esc_html__( 'Price', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 49,
			'placeholder'    => '',
			'type'           => 'text',
			'callback'       => 'number',
		
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
			'value'          => esc_html__( '$', 'uix-shortcodes' ),
			'placeholder'    => '',
			'type'           => 'text',
			'callback'       => 'html',
		
		),
		array(
		    /*
		     * @template vars: 
			 *
				${uix_sc_pricing_col4_one_period}
				${uix_sc_pricing_col4_one_period_attr}
			 *
			*/
			'id'             => 'uix_sc_pricing_col4_one_period',
			'title'          => esc_html__( 'Period', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => esc_html__( 'per month', 'uix-shortcodes' ),
			'placeholder'    => '',
			'type'           => 'text',
			'callback'       => 'attr',
		
		),	
		array(
			'id'             => 'uix_sc_pricing_col4_one_desc',
			'title'          => esc_html__( 'Description', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => esc_html__( 'Some description text here.', 'uix-shortcodes' ),
			'placeholder'    => '',
			'type'           => 'textarea',
			'callback'       => 'html',
			'default'        => array(
									'row'     => 2
				                )
		
		),	
		array(
			'id'             => 'uix_sc_pricing_col4_one_btn_label',
			'title'          => esc_html__( 'Button Label', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => esc_html__( 'TRY FOR FREE', 'uix-shortcodes' ),
			'placeholder'    => '',
			'type'           => 'text',
			'callback'       => 'html',
		
		),		
		array(
			'id'             => 'uix_sc_pricing_col4_one_btn_link',
			'title'          => esc_html__( 'Button Link', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => esc_url( '#' ),
			'placeholder'    => 'URL',
			'type'           => 'text',
			'callback'       => 'url',
		
		),	
		array(
		    /*
		     * @template vars: 
			 *
				${uix_sc_pricing_col4_one_btn_color}
				${uix_sc_pricing_col4_one_btn_color_name}
			 *
			*/
			'id'             => 'uix_sc_pricing_col4_one_btn_color',
			'title'          => esc_html__( 'Button Color', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '#a2bf2f',
			'placeholder'    => '',
			'type'           => 'color',
	     	'callback'       => 'color-name',
			'default'        => array( '#a2bf2f', '#d59a3e', '#DD514C', '#FA9ADF', '#4BB1CF',  '#0E90D2', '#5F9EA0', '#473f3f',  '#bebebe' )
		
		),
		
		array(
			'id'             => 'uix_sc_pricing_col4_one_btn_win',
			'title'          => esc_html__( 'Open in new tab', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 0, // 0:false  1:true
			'placeholder'    => '',
			'type'           => 'checkbox'
		
		),	
		array(
			'id'             => 'uix_sc_pricing_col4_one_features',
			'title'          => esc_html__( 'Features', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => UixSCFormCore::html_listTran( wp_kses( __( 'Feature Description<br>Another Feature Description<br><s>Invalid Feature Description</s>', 'uix-shortcodes' ), wp_kses_allowed_html( 'post' ) ) ),
			'placeholder'    => '',
			'type'           => 'textarea',
		    'callback'       => 'list',
			'default'        => array(
									'row'  => 5
									
				                )
		
		),	
		
	    array(
			'id'             => 'uix_sc_pricing_col4_one_features_tipinfo',
			'desc'           => esc_html__( 'Type one word or sentence per line when press "ENTER".', 'uix-shortcodes' ),
			'type'           => 'note',
			'default'        => array(
		                            'fullwidth'  => false,
									'type'       => 'default'  //error, success, warning, note, default
				                ),
		
		),	
		
		
		array(
			'id'             => 'uix_sc_pricing_col4_one_active',
			'title'          => esc_html__( 'Active', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 0, // 0:false  1:true
			'placeholder'    => '',
			'type'           => 'checkbox'
		
		),
		
		array(
			'id'             => 'uix_sc_pricing_col4_one_hide',
			'title'          => esc_html__( 'Hide', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 0, // 0:false  1:true
			'placeholder'    => '',
			'type'           => 'checkbox'
		
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
			'type'           => 'text',
			'callback'       => 'html',
		
		),
		array(
			'id'             => 'uix_sc_pricing_col4_two_price',
			'title'          => esc_html__( 'Price', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 69,
			'placeholder'    => '',
			'type'           => 'text',
			'callback'       => 'number',
		
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
			'value'          => esc_html__( '$', 'uix-shortcodes' ),
			'placeholder'    => '',
			'type'           => 'text',
			'callback'       => 'html',
		
		),
		array(
		    /*
		     * @template vars: 
			 *
				${uix_sc_pricing_col4_two_period}
				${uix_sc_pricing_col4_two_period_attr}
			 *
			*/	
			'id'             => 'uix_sc_pricing_col4_two_period',
			'title'          => esc_html__( 'Period', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => esc_html__( 'per month', 'uix-shortcodes' ),
			'placeholder'    => '',
			'type'           => 'text',
			'callback'       => 'attr',
		
		),	
		array(
			'id'             => 'uix_sc_pricing_col4_two_desc',
			'title'          => esc_html__( 'Description', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => esc_html__( 'Some description text here.', 'uix-shortcodes' ),
			'placeholder'    => '',
			'type'           => 'textarea',
			'callback'       => 'html',
			'default'        => array(
									'row'     => 2
				                )
		
		),	
		array(
			'id'             => 'uix_sc_pricing_col4_two_btn_label',
			'title'          => esc_html__( 'Button Label', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => esc_html__( 'BUY', 'uix-shortcodes' ),
			'placeholder'    => '',
			'type'           => 'text',
			'callback'       => 'html',
		
		),		
		array(
			'id'             => 'uix_sc_pricing_col4_two_btn_link',
			'title'          => esc_html__( 'Button Link', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => esc_url( '#' ),
			'placeholder'    => 'URL',
			'type'           => 'text',
			'callback'       => 'url',
		
		),	
		array(
		    /*
		     * @template vars: 
			 *
				${uix_sc_pricing_col4_two_btn_color}
				${uix_sc_pricing_col4_two_btn_color_name}
			 *
			*/
			'id'             => 'uix_sc_pricing_col4_two_btn_color',
			'title'          => esc_html__( 'Button Color', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '#a2bf2f',
			'placeholder'    => '',
			'type'           => 'color',
	     	'callback'       => 'color-name',
			'default'        => array( '#a2bf2f', '#d59a3e', '#DD514C', '#FA9ADF', '#4BB1CF',  '#0E90D2', '#5F9EA0', '#473f3f',  '#bebebe' )
		
		),
		
		array(
			'id'             => 'uix_sc_pricing_col4_two_btn_win',
			'title'          => esc_html__( 'Open in new tab', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 0, // 0:false  1:true
			'placeholder'    => '',
			'type'           => 'checkbox'
		
		),	
		array(
			'id'             => 'uix_sc_pricing_col4_two_features',
			'title'          => esc_html__( 'Features', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => UixSCFormCore::html_listTran( wp_kses( __( 'Feature Description<br>Another Feature Description<br>Another Feature Description<br><s>Invalid Feature Description</s>', 'uix-shortcodes' ), wp_kses_allowed_html( 'post' ) ) ),
			'placeholder'    => '',
			'type'           => 'textarea',
			'callback'       => 'list',
			'default'        => array(
									'row' => 5
									
				                )
		
		),	
		
	    array(
			'id'             => 'uix_sc_pricing_col4_two_features_tipinfo',
			'desc'           => esc_html__( 'Type one word or sentence per line when press "ENTER".', 'uix-shortcodes' ),
			'type'           => 'note',
			'default'        => array(
		                            'fullwidth'  => false,
									'type'       => 'default'  //error, success, warning, note, default
				                ),
		
		),	
		
		array(
			'id'             => 'uix_sc_pricing_col4_two_active',
			'title'          => esc_html__( 'Active', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 1, // 0:false  1:true
			'placeholder'    => '',
			'type'           => 'checkbox'
		
		),
		
		array(
			'id'             => 'uix_sc_pricing_col4_two_hide',
			'title'          => esc_html__( 'Hide', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 0, // 0:false  1:true
			'placeholder'    => '',
			'type'           => 'checkbox'
		
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
			'type'           => 'text',
			'callback'       => 'html',
		
		),
		array(
			'id'             => 'uix_sc_pricing_col4_three_price',
			'title'          => esc_html__( 'Price', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 109,
			'placeholder'    => '',
			'type'           => 'text',
			'callback'       => 'number',
		
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
			'value'          => esc_html__( '$', 'uix-shortcodes' ),
			'placeholder'    => '',
			'type'           => 'text',
			'callback'       => 'html',
		
		),
		array(
		    /*
		     * @template vars: 
			 *
				${uix_sc_pricing_col4_three_period}
				${uix_sc_pricing_col4_three_period_attr}
			 *
			*/
			'id'             => 'uix_sc_pricing_col4_three_period',
			'title'          => esc_html__( 'Period', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => esc_html__( 'per month', 'uix-shortcodes' ),
			'placeholder'    => '',
			'type'           => 'text',
			'callback'       => 'attr',
		
		),	
		array(
			'id'             => 'uix_sc_pricing_col4_three_desc',
			'title'          => esc_html__( 'Description', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => esc_html__( 'Some description text here.', 'uix-shortcodes' ),
			'placeholder'    => '',
			'type'           => 'textarea',
			'callback'       => 'html',
			'default'        => array(
									'row'     => 2
				                )
		
		),	
		array(
			'id'             => 'uix_sc_pricing_col4_three_btn_label',
			'title'          => esc_html__( 'Button Label', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => esc_html__( 'BUY', 'uix-shortcodes' ),
			'placeholder'    => '',
			'type'           => 'text',
			'callback'       => 'html',
		
		),		
		array(
			'id'             => 'uix_sc_pricing_col4_three_btn_link',
			'title'          => esc_html__( 'Button Link', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => esc_url( '#' ),
			'placeholder'    => 'URL',
			'type'           => 'text',
			'callback'       => 'url',
		
		),	
		array(
		    /*
		     * @template vars: 
			 *
				${uix_sc_pricing_col4_three_btn_color}
				${uix_sc_pricing_col4_three_btn_color_name}
			 *
			*/
			'id'             => 'uix_sc_pricing_col4_three_btn_color',
			'title'          => esc_html__( 'Button Color', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '#a2bf2f',
			'placeholder'    => '',
			'type'           => 'color',
	     	'callback'       => 'color-name',
			'default'        => array( '#a2bf2f', '#d59a3e', '#DD514C', '#FA9ADF', '#4BB1CF',  '#0E90D2', '#5F9EA0', '#473f3f',  '#bebebe' )
		
		),
		
		array(
			'id'             => 'uix_sc_pricing_col4_three_btn_win',
			'title'          => esc_html__( 'Open in new tab', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 0, // 0:false  1:true
			'placeholder'    => '',
			'type'           => 'checkbox'
		
		),	
		array(
			'id'             => 'uix_sc_pricing_col4_three_features',
			'title'          => esc_html__( 'Features', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => UixSCFormCore::html_listTran( wp_kses( __( 'Feature Description<br>Another Feature Description<br>Another Feature Description<br><s>Invalid Feature Description</s><br>Another Feature Description', 'uix-shortcodes' ), wp_kses_allowed_html( 'post' ) ) ),
			'placeholder'    => '',
			'type'           => 'textarea',
			'callback'       => 'list',
			'default'        => array(
									'row'  => 5
									
				                )
		
		),	
		
		
	    array(
			'id'             => 'uix_sc_pricing_col4_three_features_tipinfo',
			'desc'           => esc_html__( 'Type one word or sentence per line when press "ENTER".', 'uix-shortcodes' ),
			'type'           => 'note',
			'default'        => array(
		                            'fullwidth'  => false,
									'type'       => 'default'  //error, success, warning, note, default
				                ),
		
		),	
		
		array(
			'id'             => 'uix_sc_pricing_col4_three_active',
			'title'          => esc_html__( 'Active', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 0, // 0:false  1:true
			'placeholder'    => '',
			'type'           => 'checkbox'
		
		),
		
		array(
			'id'             => 'uix_sc_pricing_col4_three_hide',
			'title'          => esc_html__( 'Hide', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 0, // 0:false  1:true
			'placeholder'    => '',
			'type'           => 'checkbox'
		
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
			'type'           => 'text',
			'callback'       => 'html',
		
		),
		array(
			'id'             => 'uix_sc_pricing_col4_four_price',
			'title'          => esc_html__( 'Price', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 139,
			'placeholder'    => '',
			'type'           => 'text',
			'callback'       => 'number',
		
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
			'value'          => esc_html__( '$', 'uix-shortcodes' ),
			'placeholder'    => '',
			'type'           => 'text',
			'callback'       => 'html',
		
		),
		array(
		    /*
		     * @template vars: 
			 *
				${uix_sc_pricing_col4_four_period}
				${uix_sc_pricing_col4_four_period_attr}
			 *
			*/
			'id'             => 'uix_sc_pricing_col4_four_period',
			'title'          => esc_html__( 'Period', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => esc_html__( 'per month', 'uix-shortcodes' ),
			'placeholder'    => '',
			'type'           => 'text',
			'callback'       => 'attr',
		
		),	
		array(
			'id'             => 'uix_sc_pricing_col4_four_desc',
			'title'          => esc_html__( 'Description', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => esc_html__( 'Some description text here.', 'uix-shortcodes' ),
			'placeholder'    => '',
			'type'           => 'textarea',
			'callback'       => 'html',
			'default'        => array(
									'row'     => 2
				                )
		
		),	
		array(
			'id'             => 'uix_sc_pricing_col4_four_btn_label',
			'title'          => esc_html__( 'Button Label', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => esc_html__( 'BUY', 'uix-shortcodes' ),
			'placeholder'    => '',
			'type'           => 'text',
			'callback'       => 'html',
		
		),		
		array(
			'id'             => 'uix_sc_pricing_col4_four_btn_link',
			'title'          => esc_html__( 'Button Link', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => esc_url( '#' ),
			'placeholder'    => 'URL',
			'type'           => 'text',
			'callback'       => 'url',
		
		),	
		array(
		    /*
		     * @template vars: 
			 *
				${uix_sc_pricing_col4_four_btn_color}
				${uix_sc_pricing_col4_four_btn_color_name}
			 *
			*/
			'id'             => 'uix_sc_pricing_col4_four_btn_color',
			'title'          => esc_html__( 'Button Color', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '#a2bf2f',
			'placeholder'    => '',
			'type'           => 'color',
	     	'callback'       => 'color-name',
			'default'        => array( '#a2bf2f', '#d59a3e', '#DD514C', '#FA9ADF', '#4BB1CF',  '#0E90D2', '#5F9EA0', '#473f3f',  '#bebebe' )
		
		),
		
		array(
			'id'             => 'uix_sc_pricing_col4_four_btn_win',
			'title'          => esc_html__( 'Open in new tab', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 0, // 0:false  1:true
			'placeholder'    => '',
			'type'           => 'checkbox'
		
		),	
		array(
			'id'             => 'uix_sc_pricing_col4_four_features',
			'title'          => esc_html__( 'Features', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => UixSCFormCore::html_listTran( wp_kses( __( 'Feature Description<br>Another Feature Description<br>Another Feature Description<br><s>Invalid Feature Description</s><br>Another Feature Description<br>Another Feature Description', 'uix-shortcodes' ), wp_kses_allowed_html( 'post' ) ) ),
			'placeholder'    => '',
			'type'           => 'textarea',
			'callback'       => 'list',
			'default'        => array(
									'row'  => 5
									
				                )
		
		),	
		
	    array(
			'id'             => 'uix_sc_pricing_col4_four_features_tipinfo',
			'desc'           => esc_html__( 'Type one word or sentence per line when press "ENTER".', 'uix-shortcodes' ),
			'type'           => 'note',
			'default'        => array(
		                            'fullwidth'  => false,
									'type'       => 'default'  //error, success, warning, note, default
				                ),
		
		),		
		
		
		array(
			'id'             => 'uix_sc_pricing_col4_four_active',
			'title'          => esc_html__( 'Active', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 0, // 0:false  1:true
			'placeholder'    => '',
			'type'           => 'checkbox'
		
		),
		
		array(
			'id'             => 'uix_sc_pricing_col4_four_hide',
			'title'          => esc_html__( 'Hide', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => 0, // 0:false  1:true
			'placeholder'    => '',
			'type'           => 'checkbox'
		
		),	


	
	)
;


/**
 * Returns form
 * ----------------------------------------------------
 */
UixSCFormCore::form_scripts( array(
	    'clone'                   => false,
		'form_id'                 => $form_id,
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
		'title'                   => esc_html__( 'Pricing 4 column', 'uix-shortcodes' ),
	
		/**
		 * /////////////// Customizing HTML output on the frontend /////////////// 
		 * 
		 * 
		 * Usage:
		 *
		 * 1) Written as pure HTML syntax.
		 * 2) Directly use the controls ID as a variable: ${???}
		 * 3) Using {{if}} and {{else}} to render conditional sections. 
		       -----E.g.
		       {{if your_field_id}} ... {{else}} ... {{/if}}
			   
		 * 4) Using {{each}} to render repeating sections.
		       -----E.g.
				{{each your_clone_trigger_id}}
					{{if your_listitem_field_id != ""}}
					    {{if $index == 0}}<li class="active">{{else}}<li>{{/if}}
						    ${your_listitem_field_id}
						</li>
					{{/if}}	
				{{/each}}
		 
		 */
	    'template'              => '
		
			[uix_pricing]

				{{if uix_sc_pricing_col4_one_hide == 0}}

					<br>[uix_pricing_item target=\'{{if uix_sc_pricing_col4_one_btn_win == 1}}_blank{{/if}}\' class=\'{{if uix_sc_pricing_col4_one_active == 1}}uix-sc-price__important{{/if}}\' url=\'${uix_sc_pricing_col4_one_btn_link}\' period=\'${uix_sc_pricing_col4_one_period_attr}\' bcolor=\'${uix_sc_pricing_col4_one_btn_color_name}\' imcolor=\'${uix_sc_pricing_col4_one_emphasis_color}\' col=\'4\']
					<br>[uix_pricing_item_level]${uix_sc_pricing_col4_one_title}[/uix_pricing_item_level]
					<br>[uix_pricing_item_price]${uix_sc_pricing_col4_one_currency}${uix_sc_pricing_col4_one_price}[/uix_pricing_item_price]
					<br>[uix_pricing_item_desc]${uix_sc_pricing_col4_one_desc}[/uix_pricing_item_desc]
					<br>[uix_pricing_item_button]${uix_sc_pricing_col4_one_btn_label}[/uix_pricing_item_button]		
					<br>[uix_pricing_item_detail][ul]${uix_sc_pricing_col4_one_features}[/ul][/uix_pricing_item_detail]					
					<br>[/uix_pricing_item]<br>

				{{/if}}

				{{if uix_sc_pricing_col4_two_hide == 0}}

					<br>[uix_pricing_item target=\'{{if uix_sc_pricing_col4_two_btn_win == 1}}_blank{{/if}}\' class=\'{{if uix_sc_pricing_col4_two_active == 1}}uix-sc-price__important{{/if}}\' url=\'${uix_sc_pricing_col4_two_btn_link}\' period=\'${uix_sc_pricing_col4_two_period_attr}\' bcolor=\'${uix_sc_pricing_col4_two_btn_color_name}\' imcolor=\'${uix_sc_pricing_col4_two_emphasis_color}\' col=\'4\']
					<br>[uix_pricing_item_level]${uix_sc_pricing_col4_two_title}[/uix_pricing_item_level]
					<br>[uix_pricing_item_price]${uix_sc_pricing_col4_two_currency}${uix_sc_pricing_col4_two_price}[/uix_pricing_item_price]
					<br>[uix_pricing_item_desc]${uix_sc_pricing_col4_two_desc}[/uix_pricing_item_desc]
					<br>[uix_pricing_item_button]${uix_sc_pricing_col4_two_btn_label}[/uix_pricing_item_button]		
					<br>[uix_pricing_item_detail][ul]${uix_sc_pricing_col4_two_features}[/ul][/uix_pricing_item_detail]					
					<br>[/uix_pricing_item]<br>

				{{/if}}
				
				{{if uix_sc_pricing_col4_three_hide == 0}}

					<br>[uix_pricing_item target=\'{{if uix_sc_pricing_col4_three_btn_win == 1}}_blank{{/if}}\' class=\'{{if uix_sc_pricing_col4_three_active == 1}}uix-sc-price__important{{/if}}\' url=\'${uix_sc_pricing_col4_three_btn_link}\' period=\'${uix_sc_pricing_col4_three_period_attr}\' bcolor=\'${uix_sc_pricing_col4_three_btn_color_name}\' imcolor=\'${uix_sc_pricing_col4_three_emphasis_color}\' col=\'4\']
					<br>[uix_pricing_item_level]${uix_sc_pricing_col4_three_title}[/uix_pricing_item_level]
					<br>[uix_pricing_item_price]${uix_sc_pricing_col4_three_currency}${uix_sc_pricing_col4_three_price}[/uix_pricing_item_price]
					<br>[uix_pricing_item_desc]${uix_sc_pricing_col4_three_desc}[/uix_pricing_item_desc]
					<br>[uix_pricing_item_button]${uix_sc_pricing_col4_three_btn_label}[/uix_pricing_item_button]		
					<br>[uix_pricing_item_detail][ul]${uix_sc_pricing_col4_three_features}[/ul][/uix_pricing_item_detail]					
					<br>[/uix_pricing_item]<br>

				{{/if}}
				
				{{if uix_sc_pricing_col4_four_hide == 0}}

					<br>[uix_pricing_item target=\'{{if uix_sc_pricing_col4_four_btn_win == 1}}_blank{{/if}}\' class=\'{{if uix_sc_pricing_col4_four_active == 1}}uix-sc-price__important{{/if}}\' url=\'${uix_sc_pricing_col4_four_btn_link}\' period=\'${uix_sc_pricing_col4_four_period_attr}\' bcolor=\'${uix_sc_pricing_col4_four_btn_color_name}\' imcolor=\'${uix_sc_pricing_col4_four_emphasis_color}\' col=\'4\' last=\'1\']
					<br>[uix_pricing_item_level]${uix_sc_pricing_col4_four_title}[/uix_pricing_item_level]
					<br>[uix_pricing_item_price]${uix_sc_pricing_col4_four_currency}${uix_sc_pricing_col4_four_price}[/uix_pricing_item_price]
					<br>[uix_pricing_item_desc]${uix_sc_pricing_col4_four_desc}[/uix_pricing_item_desc]
					<br>[uix_pricing_item_button]${uix_sc_pricing_col4_four_btn_label}[/uix_pricing_item_button]		
					<br>[uix_pricing_item_detail][ul]${uix_sc_pricing_col4_four_features}[/ul][/uix_pricing_item_detail]					
					<br>[/uix_pricing_item]<br>

				{{/if}}


			[/uix_pricing]
		
		'
    )
);
