<?php
/**
 * Form ID
 */
$form_id = 'uix_sc_form_hello2';

/**
 * Form Type
 */
$form_type_col2 = [
    'list'       => 2
];


$args_col2_1 = 
	[
		array(
			'id'             => 'uix_sc_col_demo_col2_1',
			'title'          => __( 'Text2 - 1', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'text'
		
		),
		
	
	]
;


$args_col2_2 = 
	[
		array(
			'id'             => 'uix_sc_col_demo_col2_2',
			'title'          => __( 'Text2 - 2', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'text'
		
		),
		
	
	]
;


//---------

$form_type_col3 = [
    'list' => 3
];


$args_col3_1 = 
	[
		array(
			'id'             => 'uix_sc_col_demo_col3_1',
			'title'          => __( 'Text3 - 1', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'text'
		
		),
		
	
	]
;

$args_col3_2 = 
	[
		array(
			'id'             => 'uix_sc_col_demo_col3_2',
			'title'          => __( 'Text3 - 2', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'text'
		
		),
		
	
	]
;


$args_col3_3 = 
	[
		array(
			'id'             => 'uix_sc_col_demo_col3_3',
			'title'          => __( 'Text3 - 3', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'text'
		
		),
		
	
	]
;



//---------

$form_type_col4 = [
    'list' => 4
];


$args_col4_1 = 
	[
		array(
			'id'             => 'uix_sc_col_demo_col4_1',
			'title'          => __( 'Text4 - 1', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'text'
		
		),
		
	
	]
;

$args_col4_2 = 
	[
		array(
			'id'             => 'uix_sc_col_demo_col4_2',
			'title'          => __( 'Text4 - 2', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'text'
		
		),
		
	
	]
;
$args_col4_3 = 
	[
		array(
			'id'             => 'uix_sc_col_demo_col4_3',
			'title'          => __( 'Text4 - 3', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'text'
		
		),
		
	
	]
;
$args_col4_4 = 
	[
		array(
			'id'             => 'uix_sc_col_demo_col4_4',
			'title'          => __( 'Text4 - 4', 'uix-shortcodes' ),
			'desc'           => '',
			'value'          => '',
			'placeholder'    => '',
			'type'           => 'text'
		
		),
		
	
	]
;


//---

$form_html = UixShortcodes::form_before();


$form_html .= UixShortcodes::add_form( $form_id, $form_type_col2, $args_col2_2, 'html', __( 'Item 1', 'uix-shortcodes' ) );
$form_html .= UixShortcodes::add_form( $form_id, $form_type_col2, $args_col2_2, 'html', __( 'Item 2', 'uix-shortcodes' ) );


$form_html .= UixShortcodes::add_form( $form_id, $form_type_col3, $args_col3_1, 'html', __( 'Item 1', 'uix-shortcodes' ) );
$form_html .= UixShortcodes::add_form( $form_id, $form_type_col3, $args_col3_2, 'html', __( 'Item 2', 'uix-shortcodes' ) );
$form_html .= UixShortcodes::add_form( $form_id, $form_type_col3, $args_col3_3, 'html', __( 'Item 3', 'uix-shortcodes' ) );


$form_html .= UixShortcodes::add_form( $form_id, $form_type_col4, $args_col4_1, 'html', __( 'Item 1', 'uix-shortcodes' ) );
$form_html .= UixShortcodes::add_form( $form_id, $form_type_col4, $args_col4_2, 'html', __( 'Item 2', 'uix-shortcodes' ) );
$form_html .= UixShortcodes::add_form( $form_id, $form_type_col4, $args_col4_3, 'html', __( 'Item 3', 'uix-shortcodes' ) );
$form_html .= UixShortcodes::add_form( $form_id, $form_type_col4, $args_col4_4, 'html', __( 'Item 4', 'uix-shortcodes' ) );


$form_html .= UixShortcodes::form_after();

//----

$form_js = '';
$form_js .= UixShortcodes::add_form( $form_id, $form_type_col2, $args_col2_2, 'js' );
$form_js .= UixShortcodes::add_form( $form_id, $form_type_col2, $args_col2_2, 'js' );


$form_js .= UixShortcodes::add_form( $form_id, $form_type_col3, $args_col3_1, 'js' );
$form_js .= UixShortcodes::add_form( $form_id, $form_type_col3, $args_col3_2, 'js' );
$form_js .= UixShortcodes::add_form( $form_id, $form_type_col3, $args_col3_3, 'js' );


$form_js .= UixShortcodes::add_form( $form_id, $form_type_col4, $args_col4_1, 'js' );
$form_js .= UixShortcodes::add_form( $form_id, $form_type_col4, $args_col4_2, 'js' );
$form_js .= UixShortcodes::add_form( $form_id, $form_type_col4, $args_col4_3, 'js' );
$form_js .= UixShortcodes::add_form( $form_id, $form_type_col4, $args_col4_4, 'js' );

//----

$form_js_vars = '';
$form_js_vars .= UixShortcodes::add_form( $form_id, $form_type_col2, $args_col2_2, 'js_vars' );
$form_js_vars .= UixShortcodes::add_form( $form_id, $form_type_col2, $args_col2_2, 'js_vars' );

$form_js_vars .= UixShortcodes::add_form( $form_id, $form_type_col3, $args_col3_1, 'js_vars' );
$form_js_vars .= UixShortcodes::add_form( $form_id, $form_type_col3, $args_col3_2, 'js_vars' );
$form_js_vars .= UixShortcodes::add_form( $form_id, $form_type_col3, $args_col3_3, 'js_vars' );


$form_js_vars .= UixShortcodes::add_form( $form_id, $form_type_col4, $args_col4_1, 'js_vars' );
$form_js_vars .= UixShortcodes::add_form( $form_id, $form_type_col4, $args_col4_2, 'js_vars' );
$form_js_vars .= UixShortcodes::add_form( $form_id, $form_type_col4, $args_col4_3, 'js_vars' );
$form_js_vars .= UixShortcodes::add_form( $form_id, $form_type_col4, $args_col4_4, 'js_vars' );





/**
 * Add simulation buttons
 */
echo UixShortcodes::add_form( $form_id, '', '', 'active_btn' );

?>		


<script type="text/javascript">

( function($) {
    
	$( document ).ready( function() {
		
		 /* Callback before custom javascript of sweetalert */
		<?php echo UixShortcodes::sweetalert_before( $form_js, $form_html, $form_js_vars, $form_id, __( 'Demo Form 2', 'uix-shortcodes' ) ); ?>
	
		
				window.send_to_editor( "[uix_hello2][/uix_hello2]" );
				
				
				
				
		   /* Callback after custom javascript of sweetalert */
		  <?php echo UixShortcodes::sweetalert_after(); ?>
				

	} ); 

	
	
} ) ( jQuery );

</script>
