<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; 
}

/**
 * Uix Custom Metaboxes
 *
 * @class 		: Uix_Custom_Metaboxes
 * @version		: 1.2 (July 13, 2018)
 * @author 		: UIUX Lab
 * @author URI 	: https://uiux.cc
 * @license     : MIT
 *
 *
 */

/*

 
if ( class_exists( 'Uix_Custom_Metaboxes' ) ) {

	$custom_metaboxes_page_vars = array(

		//-- Group
		array(
			'config' => array( 
				'id'         =>  'yourtheme_metaboxes-1', 
				'title'      =>  esc_html__( '[Demo] Normal Fields', 'your-theme' ),
				'screen'     =>  'page', 
				'context'    =>  'normal',
				'priority'   =>  'high',
				'fields' => array( 
					array(
						'id'          =>  'cus_page_ex_demoname_1',
						'type'        =>  'textarea',
						'title'       =>  esc_html__( 'Textarea', 'your-theme' ),
						'placeholder' =>  esc_html__( 'Placeholder Text', 'your-theme' ),
						'desc'        =>  esc_html__( 'Here is the description. It could be left blank. (Support for HTML tags)', 'your-theme' ),
						'default'     =>  '',
						'options'     =>  array( 
											'rows'  => 5	
										  )
					),
					array(
						'id'            =>  'cus_page_ex_demoname_2',
						'type'          =>  'text',
						'title'         =>  esc_html__( 'Text', 'your-theme' ),
						'desc_primary'  =>  esc_html__( 'Here is the description. It could be left blank.', 'your-theme' ),
						'default'       =>  '123',
					),

					array(
						'id'            =>  'cus_page_ex_demoname_3',
						'type'          =>  'url',
						'title'         =>  esc_html__( 'URL', 'your-theme' )
					),

					array(
						'id'          =>  'cus_page_ex_demoname_4',
						'type'        =>  'number',
						'title'       =>  esc_html__( 'Number', 'your-theme' ),
						'options'     =>  array( 
											'units'  =>  esc_html__( 'px', 'your-theme' )
										  )

					),



					array(
						'id'          =>  'cus_page_ex_demoname_5',
						'type'        =>  'radio',
						'title'       =>  esc_html__( 'Radio', 'your-theme' ),
						'default'     =>  '2',
						'options'     =>  array( 
											'radio_type'  => 'normal',
											'value'       => array(
												'1'            =>  esc_html__( 'Option: 1', 'your-theme' ),
												'2'            =>  esc_html__( 'Option: 2 (Default)', 'your-theme' ),
												'3'            =>  esc_html__( 'Option: 3', 'your-theme' ),	
											 )


										  )

					),

					array(
						'id'          =>  'cus_page_ex_demoname_5_2',
						'type'        =>  'radio',
						'title'       =>  esc_html__( 'Radio 2', 'your-theme' ),
						'options'     =>  array( 
											'br'          => true,
											'radio_type'  => 'normal',
											'value'       => array(
												'1'            =>  esc_html__( 'Option: 1', 'your-theme' ),
												'2'            =>  esc_html__( 'Option: 2', 'your-theme' ),
												'3'            =>  esc_html__( 'Option: 3', 'your-theme' ),	
											 )


										  )

					),



					array(
						'id'            =>  'cus_page_ex_demoname_6',
						'type'          =>  'radio',
						'title'         =>  esc_html__( 'Radio(Associated)', 'your-theme' ),
						'desc_primary'  =>  esc_html__( 'It is valid to assign height to page title area when the featured image is not empty.', 'your-theme' ),

						'default'     =>  'normal',
						'options'     =>  array( 
											'radio_type'  => 'normal',
											'value'       =>  array(
												'normal'       =>  esc_html__( 'Option: Normal(Default)', 'your-theme' ),
												'higher'       =>  esc_html__( 'Option: Higher', 'your-theme' ),
												'full-screen'  =>  esc_html__( 'Option: Full Screen', 'your-theme' ),
												'cus-height'   =>  esc_html__( 'Option: Custom Height', 'your-theme' ),
											 ),
											'toggle'      =>  array(
												'normal'       =>  '',
												'higher'       =>  '',
												'full-screen'  =>  '',
												'cus-height'   =>  array( 
																		'id'       =>  'cus_page_ex_demoname_6_opt-cus-height-toggle', 
																		'type'     =>  'number',
																		'default'  =>  350,
																		'units'    =>  esc_html__( 'px', 'your-theme' ),
																	),
											 ),
										  )

					),


					array(
						'id'          =>  'cus_page_ex_demoname_7',
						'type'        =>  'radio',
						'title'       =>  esc_html__( 'Radio Image', 'your-theme' ),
						'default'     =>  'no-sidebar',
						'options'     =>  array( 
											'radio_type'  => 'image',
											'value'       => array(
												'no-sidebar'    =>  esc_url( '/images/layouts/no-sidebar.png' ),
												'sidebar'       =>  esc_url( '/images/layouts/sidebar.png' ),
											 )


										  )

					),

					array(
						'id'            =>  'cus_page_ex_demoname_8',
						'type'          =>  'checkbox',
						'title'         =>  esc_html__( 'Checkbox', 'your-theme' ),
						'desc_primary'  =>  esc_html__( 'Here is the description. It could be left blank.', 'your-theme' ),

					),

					array(
						'id'          =>  'cus_page_ex_demoname_9',
						'type'        =>  'select',
						'title'       =>  esc_html__( 'Select', 'your-theme' ),
						'default'     =>  '3',
						'options'     =>  array( 
											'value'       => array(
												'1'            =>  esc_html__( 'Option: 1', 'your-theme' ),
												'2'            =>  esc_html__( 'Option: 2', 'your-theme' ),
												'3'            =>  esc_html__( 'Option: 3 (Default)', 'your-theme' ),	
											 )


										  )

					),

					array(
						'id'             =>  'cus_page_ex_demoname_10',
						'type'           =>  'price',
						'title'          =>  esc_html__( 'Price', 'your-theme' ),
						'desc_primary'   =>  esc_html__( 'Here is the description. It could be left blank.', 'your-theme' ),
						'options'        =>  array( 
											'units'  =>  esc_html__( '$', 'your-theme' )
										  )

					),

					array(
						'id'          =>  'cus_page_ex_demoname_11',
						'type'        =>  'multi-checkbox',
						'title'       =>  esc_html__( 'Multi Checkbox', 'your-theme' ),
						'default'     =>  array( 'opt-1', 'opt-3' ),
						'options'     =>  array( 
											'br'          => true,
											'value'       => array(
												'opt-1'            =>  esc_html__( 'Option: 1', 'your-theme' ),
												'opt-2'            =>  esc_html__( 'Option: 2', 'your-theme' ),
												'opt-3'            =>  esc_html__( 'Option: 3', 'your-theme' ),	
												'opt-4'            =>  esc_html__( 'Option: 4', 'your-theme' ),
												'opt-5'            =>  esc_html__( 'Option: 5', 'your-theme' ),
												'opt-6'            =>  esc_html__( 'Option: 6', 'your-theme' ),	
											 )


										  )

					),



				)
			)

		),

		//-- Group
		array(
			'config' => array( 
				'id'         =>  'yourtheme_metaboxes-2', 
				'title'      =>  esc_html__( '[Demo] Appearance Fields', 'your-theme' ),
				'screen'     =>  'page',
				'context'    =>  'normal',
				'priority'   =>  'high',
				'fields' => array( 
					array(
						'id'          =>  'cus_page_ex_demoname_appear_1',
						'type'        =>  'image',
						'title'       =>  esc_html__( 'Image', 'your-theme' ),
						'placeholder' =>  esc_html__( 'Image URL', 'your-theme' ),
					),
					array(
						'id'       =>  'cus_page_ex_demoname_appear_2',
						'type'     =>  'color',
						'title'    =>  esc_html__( 'Color', 'your-theme' ),
					),
					array(
						'id'       =>  'cus_page_ex_demoname_appear_3',
						'type'     =>  'editor',
						'title'    =>  esc_html__( 'Editor', 'your-theme' ),
						'options'     =>  array( 
											'textarea_rows'  => 8,
											'media_buttons'  => false,	
											'teeny'          => true,	
										  )
					),
					array(
						'id'            =>  'cus_page_ex_demoname_appear_4',
						'type'          =>  'date',
						'title'         =>  esc_html__( 'Date', 'your-theme' ),
						'desc_primary'  =>  UixShortcodes::kses( __( 'Enter date of your projects. <strong>(optional)</strong>', 'your-theme' ) ),
						'options'       =>  array( 
											'format'  => 'MM dd, yy',
										  )


					),

					array(
						'id'            =>  'cus_page_ex_demoname_appear_5',
						'type'          =>  'custom-attrs',
						'title'         =>  esc_html__( 'Custom Attributes', 'your-theme' ),
						'options'       =>  array( 
											'label_title'  => esc_html__( 'Title', 'your-theme' ),
											'label_value'  => esc_html__( 'Value', 'your-theme' ),
										  )



					),




				)
			)

		),	
	);

	$custom_metaboxes_page = new Uix_Custom_Metaboxes( $custom_metaboxes_page_vars );
}


 */



/*
 [Front-end Page]:
 
 $demoname = get_post_meta( get_the_ID(), 'cus_page_ex_demoname_1', true );
 
*/



if ( !class_exists( 'Uix_Custom_Metaboxes' ) ) {
	
	class Uix_Custom_Metaboxes {
		
		
		/**
		* Custom Meta Boxes Version
		*
		*/
		private static $ver = 1.2;	
		
		/**
		* Holds meta box parameters
		*
		*/
		private static $vars = null;
		
		
		/**
		* Holds meta box parameters of all post types
		*
		*/
		public static $all_config = array();
			
		


		/**
		* Initialize the custom meta box
		*
		*/
		public function __construct( $vars ) {
			
			self::$vars = $vars;
			
			//Push parameters of different post types
			array_push( self::$all_config, self::$vars );
			
			// If we are not in admin area exit.
			if ( ! is_admin() ) return;

			// Add metaboxes
			add_action( 'add_meta_boxes', array( __CLASS__, 'add' ) );

			
			// Save metaboxes
			add_action( 'save_post', array( __CLASS__, 'save' ) );
			
			
			//Enqueue scripts and styles in the backstage
			add_action( 'admin_enqueue_scripts', array( __CLASS__, 'backstage_scripts' ) );
			
			
			

		}


		
		/*
		 * Enqueue scripts and styles in the backstage
		 *
		 *
		 */
		public static function backstage_scripts() {
		
			  //Check if screen ID
			  $currentScreen = get_current_screen();
		
			  if ( $currentScreen->base === "post" || //page,post,custom post type
				   $currentScreen->base === "widgets" || 
				   $currentScreen->base === "customize" || 
				   UixShortcodes::inc_str( $currentScreen->base, '_page_' ) 
				 ) 
			  {
    
				
					wp_enqueue_style( 'uix-custom-metaboxes', UixShortcodes::plug_directory() .'includes/admin/uix-custom-metaboxes/css/uix-custom-metaboxes.min.css', false, self::$ver, 'all' );
					//RTL		
					if ( is_rtl() ) {
						wp_enqueue_style( 'uix-custom-metaboxes-rtl', UixShortcodes::plug_directory() .'includes/admin/uix-custom-metaboxes/css/uix-custom-metaboxes.min-rtl.css', false, self::$ver, 'all' );
					} 
				  
				  
					wp_enqueue_script( 'uix-custom-metaboxes', UixShortcodes::plug_directory() .'includes/admin/uix-custom-metaboxes/js/uix-custom-metaboxes.min.js', array( 'jquery' ), self::$ver, true );
					
				  

					//Colorpicker
					wp_enqueue_style( 'wp-color-picker' );
					wp_enqueue_script( 'wp-color-picker' );	
	
			  }
			
	
		}
		

		/**
		* Creating the Custom Field Box
		*
		* @link https://developer.wordpress.org/reference/functions/add_meta_box/
		*
		*/
		public static function add() {
			
			$all_args = self::$all_config;
			
			if ( !is_array( $all_args ) ) return;
			
			
			
			foreach ( $all_args as $args ) {
				
				//Creating the Custom Field Box
				foreach ( $args as $v ) {


					$id        = ( isset( $v[ 'config' ][ 'id' ] ) ) ? esc_attr( $v[ 'config' ][ 'id' ] ) : 'uix_shortcodes_custom_meta-default';
					$title     = ( isset( $v[ 'config' ][ 'title' ] ) ) ? esc_html( $v[ 'config' ][ 'title' ] ) : esc_html__( 'Group Title', 'uix-shortcodes' );
					$screen    = ( isset( $v[ 'config' ][ 'screen' ] ) ) ? esc_attr( $v[ 'config' ][ 'screen' ] ) : 'page';
					$context   = ( isset( $v[ 'config' ][ 'context' ] ) ) ? esc_attr( $v[ 'config' ][ 'context' ] ) : 'normal';
					$priority  = ( isset( $v[ 'config' ][ 'priority' ] ) ) ? esc_attr( $v[ 'config' ][ 'priority' ] ) : 'high';
					$fields    = $v[ 'config' ][ 'fields' ];


					add_meta_box( 
						$id, 
						$title, 
						array( __CLASS__, 'register_meta_boxes' ), 
						$screen, 
						$context, 
						$priority,
						$fields
					);

				}	
				
				
			}//end $all_args


			
			
	
		}

		
	
		/**
		* Get field ids
		*
		*/
		public static function field_ids() {
			
			$all_args = self::$all_config;
			
			if ( !is_array( $all_args ) ) return;
			
			$ids  = array();
			
			foreach ( $all_args as $args ) {
				
				

				foreach ( $args as $v ) {

					$fields_all_id   = self::array_get_by_key( $v[ 'config' ][ 'fields' ], 'id' );
					$fields_all_type = self::array_get_by_key( $v[ 'config' ][ 'fields' ], 'type' );

					foreach ( $fields_all_id as $key => $v ) {

						$cur_type = isset( $fields_all_type[ $key ] ) ? $fields_all_type[ $key ] : 'text';

						array_push( $ids, array( 
							'id'   => $v,
							'type' => $cur_type,
						) );
					}


				}	
				
			}//end $all_args	
			
	

			return $ids;
			
			
	
		}
		
		
		public static function array_get_by_key( array $array, $string ) {    
			if ( !trim( $string ) ) return false;    
			preg_match_all( "/\"$string\";\w{1}:(?:\d+:|)(.*?);/", serialize( $array ), $res );    
			return str_replace( '"', '', $res[1] );    
		}  	
		
		/**
		* Get post types
		*
		*/
		public static function post_types() {
			
			$all_args = self::$all_config;
			
			if ( !is_array( $all_args ) ) return;
			
			$post_types = array();
			
			foreach ( $all_args as $args ) {
				
				
				foreach ( $args as $v ) {
					array_push( $post_types, $v[ 'config' ][ 'screen' ] );	
				}
	
				
			}//end $all_args
			
		

			
			return self::array_multi_to_single( $post_types );
			
			
		}
		
		
		/**
		* Convert an array
		*
		*/
		public static function array_multi_to_single( $array, $clearRepeated = true ){
			if ( !isset( $array ) || !is_array( $array ) || empty( $array ) ) {
				return false;
			}
			if ( !in_array( $clearRepeated, array( 'true', 'false', '' )  ) ) {
				return false;
			}
			static $result_array = array();
			foreach( $array as $value ){
				if( is_array( $value ) ) {
					self::array_multi_to_single( $value );
				}else{
					$result_array[] = $value;
				}
			}
			if( $clearRepeated ){
				$result_array = array_unique( $result_array );
			}
			return $result_array;
		}
		
		
		/**
		* Callback function to show fields in meta box.
		*
		*/
		public static function register_meta_boxes( $post, $metabox ) {
			
	
			$fields = $metabox[ 'args' ];
		
			
			global $post;

			wp_nonce_field( basename( __FILE__ ) , 'uix-meta-box-nonce' );
			
			
			?>
			<!-- Begin Fields -->
			<div class="uix-cmb__wrapper">
				<table class="form-table uix-cmb">


					<?php
					foreach ( $fields as $v ) {

						if ( ( isset( $v[ 'id' ] ) && !empty( $v[ 'id' ] ) ) && ( isset( $v[ 'type' ] ) && !empty( $v[ 'type' ] ) ) ) {

							$type          = $v[ 'type' ];
							$id            = esc_attr( $v[ 'id' ] );
							$title         = ( isset( $v[ 'title' ] ) ) ? $v[ 'title' ] : esc_html__( 'Field Title', 'uix-shortcodes' );
							$placeholder   = ( isset( $v[ 'placeholder' ] ) ) ? $v[ 'placeholder' ] : '';
							$options       = ( isset( $v[ 'options' ] ) ) ? $v[ 'options' ] : '';
							$desc          = ( isset( $v[ 'desc' ] ) ) ? $v[ 'desc' ] : '';
							$desc_primary  = ( isset( $v[ 'desc_primary' ] ) ) ? $v[ 'desc_primary' ] : '';
							$value         = get_post_meta( $post->ID, $id, true );
							$value_default = ( isset( $v[ 'default' ] ) ) ? $v[ 'default' ] : '';
							$default       = ( metadata_exists( 'post', $post->ID, $id ) ) ? $value : $value_default;


							//------
							if ( $type == 'text' ) {
								self::addfield_text( $id, $title, $desc, $default, $options, $placeholder, $desc_primary );
							}	

							//------
							if ( $type == 'textarea' ) {
								self::addfield_textarea( $id, $title, $desc, $default, $options, $placeholder, $desc_primary );
							}	

							//------
							if ( $type == 'url' ) {
								self::addfield_url( $id, $title, $desc, $default, $options, $placeholder, $desc_primary );
							}	

							//------
							if ( $type == 'number' ) {
								self::addfield_number( $id, $title, $desc, $default, $options, $placeholder, $desc_primary );
							}				

							//------
							if ( $type == 'radio' ) {
								self::addfield_radio( $id, $title, $desc, $default, $options, $placeholder, $desc_primary );
							}			

							//------
							if ( $type == 'image' ) {
								self::addfield_image( $id, $title, $desc, $default, $options, $placeholder, $desc_primary );
							}						

							//------
							if ( $type == 'color' ) {
								self::addfield_color( $id, $title, $desc, $default, $options, $placeholder, $desc_primary );
							}				

							//------
							if ( $type == 'checkbox' ) {
								self::addfield_checkbox( $id, $title, $desc, $default, $options, $placeholder, $desc_primary );
							}		

							//------
							if ( $type == 'select' ) {
								self::addfield_select( $id, $title, $desc, $default, $options, $placeholder, $desc_primary );
							}					
							
							//------
							if ( $type == 'editor' ) {
								self::addfield_editor( $id, $title, $desc, $default, $options, $placeholder, $desc_primary );
							}					
							
							//------
							if ( $type == 'date' ) {
								self::addfield_date( $id, $title, $desc, $default, $options, $placeholder, $desc_primary );
							}				

							//------
							if ( $type == 'price' ) {
								self::addfield_price( $id, $title, $desc, $default, $options, $placeholder, $desc_primary );
							}		
							
							//------
							if ( $type == 'multi-checkbox' ) {
								self::addfield_multi_checkbox( $id, $title, $desc, $default, $options, $placeholder, $desc_primary );
							}	
							
							//------
							if ( $type == 'custom-attrs' ) {
								self::addfield_custom_attrs( $id, $title, $desc, $default, $options, $placeholder, $desc_primary );
							}	
							
							

						}

					}
					?>


				</table>
            </div>
			<!-- End Fields -->
			<?php

			
		}
		
		
		
		/**
		* Saving the Custom Data
		*
		*
		*/
		public static function save( $post_id ) {
			
			global $post_type;
			
			$post_type_object = get_post_type_object( $post_type );

			if ( ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )                      || // Check Autosave
				 ( ! isset( $_POST['post_ID'] ) || $post_id != $_POST['post_ID'] )      || // Check Revision
				 ( ! in_array( $post_type, self::post_types() ) )                       || // Check if current post type is supported.
				 ( ! check_admin_referer( basename( __FILE__ ), 'uix-meta-box-nonce') ) || // Check nonce - Security
				 ( ! current_user_can( $post_type_object->cap->edit_post, $post_id ) ) )   // Check permission
			{
			  return $post_id;
			}
			
			
			$ids = self::field_ids();

			if ( !is_array( $ids ) ) return;
			
			foreach ( $ids as $v ) {
				
				$id   = $v[ 'id' ];
				$type = $v[ 'type' ];
				
				if ( !isset( $v[ 'type' ] ) ) $type = 'text';
				
				$post_val = '';
				
				if ( isset( $_POST[ $id ] ) ) {
					
				
					if ( $type == 'text'     || 
						 $type == 'url'      ||
						 $type == 'radio'    ||
						 $type == 'image'    ||
						 $type == 'color'    ||
						 $type == 'checkbox' ||
						 $type == 'select'   ||
						 $type == 'date'
						
					   ) 
					{
						
						$post_val = sanitize_text_field( $_POST[ $id ] );
						
					} elseif ( $type == 'textarea' ) {
						
						$post_val = wp_unslash( $_POST[ $id ] );
						
					} elseif ( $type == 'editor' ) {
						
						$post_val = htmlspecialchars( $_POST[ $id ] );
						
					} elseif ( $type == 'number' || $type == 'price' ) {
						
						$post_val = floatval( $_POST[ $id ] );
						if ( empty( $post_val ) ) $post_val = 0;
						
					} elseif ( $type == 'multi-checkbox' ) {
						
						
						$post_val        = array();
						$new_values      = $_POST[ $id ];
				
						if ( !empty( $new_values ) ) {
						   foreach( $new_values as $new_value ) {
							  $post_val[] = $new_value ;
						   }
						}
						
						
						
					} else {
						
						$post_val = sanitize_text_field( $_POST[ $id ] );
						
					}
					
					
				}
				
				
				if ( $type == 'custom-attrs' ) {
					
					if ( isset( $_POST[ $id . '_attrs_title' ] ) ) {
						$custom_attrs          = array();
						$field_values_array_1  = $_POST[ $id . '_attrs_title' ];
						$field_values_array_2  = $_POST[ $id . '_attrs_value' ];


						foreach( $field_values_array_1 as $index => $value ) {	
							if ( !empty( $value ) ) {
								array_push( $custom_attrs, array(
																	'name'  => sanitize_text_field( $value ),
																	'value' => sanitize_text_field( $field_values_array_2[ $index ] )
																) );		
							}

						}

						$post_val = json_encode( $custom_attrs );
					}


				}
				
				
				update_post_meta( $post_id, $id, $post_val );
				
		
				
			}
			

			
		}
		

		
		/**
		* Field Type: Editor
		*
		* @print: 
		* echo wpautop( htmlspecialchars_decode( get_post_meta( get_the_ID(), 'cus_page_ex_demoname_appear_3', true ) ) );
	    *
		*/
		public static function addfield_editor( $id, $title, $desc, $default, $options = '', $placeholder = '', $desc_primary = '' ) {
		?>
			<tr>
				<th class="uix-cmb__title">
					<label><?php echo UixShortcodes::kses( $title ); ?></label>
					<?php if ( !empty ( $desc ) ) { ?>
					    <p class="uix-cmb__title_desc"><?php echo UixShortcodes::kses( $desc ); ?></p>
					<?php } ?>
				</th>
				<td>
					   
						<?php 
			
							$textarea_rows  = 8;
			                $media_buttons  = false;
			                $teeny          = true;
							if ( is_array ( $options ) ) {
								if ( isset( $options[ 'textarea_rows' ] ) ) $textarea_rows = $options[ 'textarea_rows' ];
								if ( isset( $options[ 'media_buttons' ] ) ) $media_buttons = $options[ 'media_buttons' ];
								if ( isset( $options[ 'teeny' ] ) ) $teeny = $options[ 'teeny' ];
							}
			
			
							wp_editor( htmlspecialchars_decode( $default ), esc_attr( $id ), 
								array(
								  'media_buttons' => $media_buttons,
								  'textarea_rows' => $textarea_rows,
								  'teeny'         => $teeny,
								  'quicktags'     => false,
								)
							);
			
						?> 

				</td>
			</tr>
		<?php	
		}	
		
		
		/**
		* Field Type: Textarea
		*
		*/
		public static function addfield_textarea( $id, $title, $desc, $default, $options = '', $placeholder = '', $desc_primary = '' ) {
		?>
			<tr>
				<th class="uix-cmb__title">
					<label><?php echo UixShortcodes::kses( $title ); ?></label>
					<?php if ( !empty ( $desc ) ) { ?>
					    <p class="uix-cmb__title_desc"><?php echo UixShortcodes::kses( $desc ); ?></p>
					<?php } ?>
				</th>
				<td>
					   
						<?php 
							$rows = 3;
							if ( is_array ( $options )  && isset( $options[ 'rows' ] ) ) {
								$rows = $options[ 'rows' ];
							}
						?>   

					   <textarea placeholder="<?php echo esc_attr( $placeholder ); ?>" rows="<?php echo absint( $rows ); ?>" cols="40" name="<?php echo esc_attr( $id ); ?>" id="<?php echo esc_attr( $id ); ?>"><?php echo esc_textarea( $default ); ?></textarea>
						<?php if ( !empty ( $desc_primary ) ) { ?>
							<p class="uix-cmb__description"><?php echo UixShortcodes::kses( $desc_primary ); ?></p>
						<?php } ?>

				</td>
			</tr>
		<?php	
		}	
		
		/**
		* Field Type: Text
		*
		*/
		public static function addfield_text( $id, $title, $desc, $default, $options = '', $placeholder = '', $desc_primary = '' ) {
		?>
			<tr>
				<th class="uix-cmb__title">
					<label><?php echo UixShortcodes::kses( $title ); ?></label>
					<?php if ( !empty ( $desc ) ) { ?>
					    <p class="uix-cmb__title_desc"><?php echo UixShortcodes::kses( $desc ); ?></p>
					<?php } ?>
				</th>
				<td>
					   <input placeholder="<?php echo esc_attr( $placeholder ); ?>" type="text" class="uix-cmb__normal-text" value="<?php echo esc_attr( $default ); ?>" name="<?php echo esc_attr( $id ); ?>" id="<?php echo esc_attr( $id ); ?>">
						<?php if ( !empty ( $desc_primary ) ) { ?>
							<p class="uix-cmb__description"><?php echo UixShortcodes::kses( $desc_primary ); ?></p>
						<?php } ?>
			
				</td>
			</tr>
		<?php	
		}	
		
		/**
		* Field Type: Date
		*
		*/
		public static function addfield_date( $id, $title, $desc, $default, $options = '', $placeholder = '', $desc_primary = '' ) {
		?>
			<tr>
				<th class="uix-cmb__title">
					<label><?php echo UixShortcodes::kses( $title ); ?></label>
					<?php if ( !empty ( $desc ) ) { ?>
					    <p class="uix-cmb__title_desc"><?php echo UixShortcodes::kses( $desc ); ?></p>
					<?php } ?>
				</th>
				<td>
				   
						<?php 
			
			                $format = 'MM dd, yy';
							if ( is_array ( $options ) && isset( $options[ 'format' ] ) ) {
								$format = $options[ 'format' ];
							}
			
						?>   
				   
					   <input data-format="<?php echo esc_attr( $format ); ?>" placeholder="<?php echo esc_attr( $placeholder ); ?>" type="text" class="uix-cmb__short-text uix-cmb__date-selector" value="<?php echo esc_attr( $default ); ?>" name="<?php echo esc_attr( $id ); ?>" id="<?php echo esc_attr( $id ); ?>">
						<?php if ( !empty ( $desc_primary ) ) { ?>
							<span class="uix-cmb__description"><?php echo UixShortcodes::kses( $desc_primary ); ?></span>
						<?php } ?>
			
				</td>
			</tr>
		<?php	
		}	
		
		
		
		
		/**
		* Field Type: URL
		*
		*/
		public static function addfield_url( $id, $title, $desc, $default, $options = '', $placeholder = '', $desc_primary = '' ) {
		?>
			<tr>
				<th class="uix-cmb__title">
					<label><?php echo UixShortcodes::kses( $title ); ?></label>
					<?php if ( !empty ( $desc ) ) { ?>
					    <p class="uix-cmb__title_desc"><?php echo UixShortcodes::kses( $desc ); ?></p>
					<?php } ?>
				</th>
				<td>
					   <input placeholder="<?php echo esc_attr( $placeholder ); ?>" type="text" class="uix-cmb__normal-text" value="<?php echo esc_url( $default ); ?>" name="<?php echo esc_attr( $id ); ?>" id="<?php echo esc_attr( $id ); ?>">
						<?php if ( !empty ( $desc_primary ) ) { ?>
							<p class="uix-cmb__description"><?php echo UixShortcodes::kses( $desc_primary ); ?></p>
						<?php } ?>
			
				</td>
			</tr>
		<?php	
		}	
		
		/**
		* Field Type: Number
		*
		*/
		public static function addfield_number( $id, $title, $desc, $default, $options = '', $placeholder = '', $desc_primary = '' ) {
		?>
			<tr>
				<th class="uix-cmb__title">
					<label><?php echo UixShortcodes::kses( $title ); ?></label>
					<?php if ( !empty ( $desc ) ) { ?>
					    <p class="uix-cmb__title_desc"><?php echo UixShortcodes::kses( $desc ); ?></p>
					<?php } ?>
				</th>
				<td>
					   <input placeholder="<?php echo esc_attr( $placeholder ); ?>" type="text" class="uix-cmb__short-text" value="<?php echo ( empty( $default ) ) ? 0 : floatval( $default ); ?>" name="<?php echo esc_attr( $id ); ?>" id="<?php echo esc_attr( $id ); ?>">
						<?php 
						if ( is_array ( $options ) && isset( $options[ 'units' ] ) ) {
							echo esc_html( $options[ 'units' ] );
						} 
						?>					   
					   
						<?php if ( !empty ( $desc_primary ) ) { ?>
							<p class="uix-cmb__description"><?php echo UixShortcodes::kses( $desc_primary ); ?></p>
						<?php } ?>
			
				</td>
			</tr>
		<?php	
		}		
		
		
		
		/**
		* Field Type: Price
		*
		*/
		public static function addfield_price( $id, $title, $desc, $default, $options = '', $placeholder = '', $desc_primary = '' ) {
		?>
			<tr>
				<th class="uix-cmb__title">
					<label><?php echo UixShortcodes::kses( $title ); ?></label>
					<?php if ( !empty ( $desc ) ) { ?>
					    <p class="uix-cmb__title_desc"><?php echo UixShortcodes::kses( $desc ); ?></p>
					<?php } ?>
				</th>
				<td>
						<?php 
						if ( is_array ( $options ) && isset( $options[ 'units' ] ) ) {
							echo esc_html( $options[ 'units' ] );
						} 
						?>	
					   <input placeholder="<?php echo esc_attr( $placeholder ); ?>" type="text" class="uix-cmb__short-text" value="<?php echo ( empty( $default ) ) ? 0 : floatval( $default ); ?>" name="<?php echo esc_attr( $id ); ?>" id="<?php echo esc_attr( $id ); ?>">
						<?php if ( !empty ( $desc_primary ) ) { ?>
							<span class="uix-cmb__description"><?php echo UixShortcodes::kses( $desc_primary ); ?></span>
						<?php } ?>
			
				</td>
			</tr>
		<?php	
		}	
		
		
		/**
		* Field Type: Image
		*
		*/
		public static function addfield_image( $id, $title, $desc, $default, $options = '', $placeholder = '', $desc_primary = '' ) {
		?>
			<tr>
				<th class="uix-cmb__title">
					<label><?php echo UixShortcodes::kses( $title ); ?></label>
					<?php if ( !empty ( $desc ) ) { ?>
					    <p class="uix-cmb__title_desc"><?php echo UixShortcodes::kses( $desc ); ?></p>
					<?php } ?>
				</th>
				<td>
				   
						<div class="uix-cmb__upload-wrapper">
							<?php
							Uix_UploadMedia::add( array(
								'title'          => '',
								'id'             => esc_attr( $id ),
								'name'           => esc_attr( $id ),
								'value'          => esc_url( $default ),
								'placeholder'    => esc_attr( $placeholder ),
							));
							?>
						</div>
						
				   
						<?php if ( !empty ( $desc_primary ) ) { ?>
							<p class="uix-cmb__description"><?php echo UixShortcodes::kses( $desc_primary ); ?></p>
						<?php } ?>
			
				</td>
			</tr>
		<?php	
		}	
		
		
		/**
		* Field Type: Color
		*
		*/
		public static function addfield_color( $id, $title, $desc, $default, $options = '', $placeholder = '', $desc_primary = '' ) {
		?>
			<tr>
				<th class="uix-cmb__title">
					<label><?php echo UixShortcodes::kses( $title ); ?></label>
					<?php if ( !empty ( $desc ) ) { ?>
					    <p class="uix-cmb__title_desc"><?php echo UixShortcodes::kses( $desc ); ?></p>
					<?php } ?>
				</th>
				<td>
					   <input placeholder="<?php echo esc_attr( $placeholder ); ?>" type="text" class="uix-cmb__color-selector" value="<?php echo esc_attr( $default ); ?>" name="<?php echo esc_attr( $id ); ?>" id="<?php echo esc_attr( $id ); ?>">
						<?php if ( !empty ( $desc_primary ) ) { ?>
							<p class="uix-cmb__description"><?php echo UixShortcodes::kses( $desc_primary ); ?></p>
						<?php } ?>
			
				</td>
			</tr>
		<?php	
		}	
		
		
		/**
		* Field Type: Checkbox
		*
		* @print: 
		* echo ( get_post_meta( get_the_ID(), 'cus_page_ex_demoname_8', true ) ) ? esc_attr( '_blank' ) : esc_attr( '_self' );
	    *
		*/
		public static function addfield_checkbox( $id, $title, $desc, $default, $options = '', $placeholder = '', $desc_primary = '' ) {
		?>
			<tr>
				<th class="uix-cmb__title">
					<label><?php echo UixShortcodes::kses( $title ); ?></label>
					<?php if ( !empty ( $desc ) ) { ?>
					    <p class="uix-cmb__title_desc"><?php echo UixShortcodes::kses( $desc ); ?></p>
					<?php } ?>
				</th>
				<td>

					<div class="uix-cmb__checkbox-selector">
					
						<label>
							<input name="<?php echo esc_attr( $id ); ?>" type="checkbox" value="1" <?php checked( $default, 1 ); ?>>
							<?php if ( !empty ( $desc_primary ) ) { ?>
								<span class="uix-cmb__description"><?php echo UixShortcodes::kses( $desc_primary ); ?></span>
							<?php } ?>
							
						</label>
					
					</div>
					

			
				</td>
			</tr>
		<?php	
		}		
		
		
		/**
		* Field Type: Multiple CheckBox
		*
		* @print: 
		
			$_data = get_post_meta( get_the_ID(), 'cus_page_ex_demoname_11', true );
			$_echo = '';
			if ( !empty( $_data ) && is_array( $_data ) ) {
				
				foreach ( $_data as $value ) :
					$_echo .= $value.', ';
				endforeach; 
			}
			echo $_echo;
	    *
		*/
		public static function addfield_multi_checkbox( $id, $title, $desc, $default, $options = '', $placeholder = '', $desc_primary = '' ) {
		?>
			<tr>
				<th class="uix-cmb__title">
					<label><?php echo UixShortcodes::kses( $title ); ?></label>
					<?php if ( !empty ( $desc ) ) { ?>
					    <p class="uix-cmb__title_desc"><?php echo UixShortcodes::kses( $desc ); ?></p>
					<?php } ?>
				</th>
				<td>
				
				<?php

			?>

				
					<div class="uix-cmb__multi-checkbox-selector">
					
							<?php 
			
							$br = false;
							if ( is_array ( $options )  && isset( $options[ 'br' ] ) ) {
								$br = $options[ 'br' ];
							}
			
							if ( is_array ( $options )  && isset( $options[ 'value' ] ) ) {

								$i = 0;
								foreach ( $options[ 'value' ] as $key => $value  ) {
									
									$checked = ''; 
									if ( is_array ( $default ) ) {
										if ( in_array( $key, $default ) ) {
											$checked = 'checked'; 
										} else {
											$checked = ''; 
										}
									}


									?>
									
									<label class="<?php if ( $br ) { echo 'uix-cmb__label'; } else { echo ''; }; ?>">
										<input name="<?php echo esc_attr( $id ); ?>[]" type="checkbox" value="<?php echo esc_attr( $key ); ?>" <?php echo esc_html( $checked ); ?>>
										<?php echo UixShortcodes::kses( $value ); ?>
									</label>
					
									<?php
									$i++;

								}

							} 
							?>
					
					
					</div>
					
					<?php if ( !empty ( $desc_primary ) ) { ?>
						<p class="uix-cmb__description"><?php echo UixShortcodes::kses( $desc_primary ); ?></p>
					<?php } ?>
		

			
				</td>
			</tr>
		<?php	
		}		
		

		/**
		* Field Type: Select
		*
		*/
		public static function addfield_select( $id, $title, $desc, $default, $options = '', $placeholder = '', $desc_primary = '' ) {
		?>
			<tr>
				<th class="uix-cmb__title">
					<label><?php echo UixShortcodes::kses( $title ); ?></label>
					<?php if ( !empty ( $desc ) ) { ?>
					    <p class="uix-cmb__title_desc"><?php echo UixShortcodes::kses( $desc ); ?></p>
					<?php } ?>
				</th>
				<td>
				   
					 
						<select name="<?php echo esc_attr( $id ); ?>" id="<?php echo esc_attr( $id ); ?>">

							<?php 
			
							if ( is_array ( $options )  && isset( $options[ 'value' ] ) ) {

								$i = 0;
								foreach ( $options[ 'value' ] as $key => $value  ) {

									//default
									if ( !empty( $default ) ) {
										if ( $key == $default ) { 
											$checked = 'selected'; 
										} else {
											$checked = '';
										}
									} else {
										if ( $i == 0 ) {
											$checked = 'selected';
											$default = $key;
										} else {
											$checked = '';
										}	
									}


									?>
									
									<option value="<?php echo esc_attr( $key ); ?>" <?php echo esc_html( $checked ); ?> ><?php echo UixShortcodes::kses( $value ); ?></option>
					
									<?php
									$i++;

								}

							} 
							?>
					     </select>

					
						<?php if ( !empty ( $desc_primary ) ) { ?>
							<p class="uix-cmb__description"><?php echo UixShortcodes::kses( $desc_primary ); ?></p>
						<?php } ?>
			
				</td>
			</tr>
		<?php	
		}		
		
		
		
		
		/**
		* Field Type: Radio & Radio Image
		*
		*/
		public static function addfield_radio( $id, $title, $desc, $default, $options = '', $placeholder = '', $desc_primary = '' ) {
		?>
			<tr>
				<th class="uix-cmb__title">
					<label><?php echo UixShortcodes::kses( $title ); ?></label>
					<?php if ( !empty ( $desc ) ) { ?>
					    <p class="uix-cmb__title_desc"><?php echo UixShortcodes::kses( $desc ); ?></p>
					<?php } ?>
				</th>
				<td>
				   
					  <div class="radio uix-cmb__radio-selector" data-target-id="<?php echo esc_attr( $id ); ?>">

							
						<?php 
			
						$br = false;
						if ( is_array ( $options )  && isset( $options[ 'br' ] ) ) {
							$br = $options[ 'br' ];
						}
			
			
						if ( is_array ( $options )  && isset( $options[ 'value' ] ) ) {
							
							$i          = 0;
							$radio_type = isset( $options[ 'radio_type' ] ) ? $options[ 'radio_type' ] : 'normal';
							
							
							foreach ( $options[ 'value' ] as $key => $value  ) {
								
								//default
								if ( !empty( $default ) ) {
									if ( $key == $default ) { 
										$checked = 'checked'; 
									} else {
										$checked = '';
									}
								} else {
									if ( $i == 0 ) {
										$checked = 'checked';
										$default = $key;
									} else {
										$checked = '';
									}	
								}
								
								
								//toggle id
								$toggle_id = '';
								if ( isset( $options[ 'toggle' ] )             && 
									 is_array( $options[ 'toggle' ][ $key ] )  && 
									 isset( $options[ 'toggle' ][ $key ] ) ) 
								{
									
									$toggle_id                = $id.'-'.$key.'-'.'-wrapper';
									$toggle_ipt_id            = $options[ 'toggle' ][ $key ][ 'id' ];
									$toggle_ipt_type          = $options[ 'toggle' ][ $key ][ 'type' ];
									$toggle_ipt_units         = $options[ 'toggle' ][ $key ][ 'units' ];
									$toggle_ipt_value         = get_post_meta( get_the_ID(), $toggle_ipt_id, true );
									$toggle_ipt_value_default = ( isset( $options[ 'toggle' ][ $key ][ 'default' ] ) ) ? $options[ 'toggle' ][ $key ][ 'default' ] : '';
									$toggle_ipt_default       = ( metadata_exists( 'post', get_the_ID(), $toggle_ipt_id ) ) ? $toggle_ipt_value : $toggle_ipt_value_default;

								}
								
							
								?>
								
								
								<?php if ( $radio_type == 'normal' ) { ?>
									<label data-value="<?php echo esc_attr( $key ); ?>" data-toggle-id="<?php echo esc_attr( $toggle_id ); ?>" class="<?php if ( $br ) { echo 'uix-cmb__label'; } else { echo ''; }; ?> uix-cmb__radio-text uix-cmb__toggle-selector <?php if ( $default == esc_attr( $key ) || empty( $default ) ) { echo 'active'; } else { echo ''; }; ?>"><input type="radio" name="<?php echo esc_attr( $id ); ?>_r" value="<?php echo esc_attr( $key ); ?>" <?php echo esc_html( $checked ); ?>/><?php echo UixShortcodes::kses( $value ); ?></label>
								<?php } ?>
									
								<?php if ( $radio_type == 'image' ) { ?>
									<span data-value="<?php echo esc_attr( $key ); ?>" class="img <?php if ( $default == esc_attr( $key ) || empty( $default ) ) { echo 'active'; } else { echo ''; }; ?>">
									  <img alt="" src="<?php echo esc_url( $value ); ?>">
									</span>
								<?php } ?>	
									
			
								
								<!-- Associated controller -->
								<?php if ( !empty( $toggle_id ) ) { ?>
									
									    <?php if ( $toggle_ipt_type == 'number' ) { ?>
											<span class="uix-cmb__toggle-target" id="<?php echo esc_attr( $toggle_id ); ?>" style="display:none;" >
												<input type="text" class="uix-cmb__short-text" value="<?php echo floatval( $toggle_ipt_default ); ?>" name="<?php echo esc_attr( $toggle_ipt_id ); ?>" id="<?php echo esc_attr( $toggle_ipt_id ); ?>"><?php echo esc_html( $toggle_ipt_units ); ?>

											</span>
										<?php } ?>
										
									
								<?php } ?>
								
								
								<?php
								$i++;
								
							}
							
						} 
						?>

					  </div>
					  <input type="hidden" id="<?php echo esc_attr( $id ); ?>" name="<?php echo esc_attr( $id ); ?>" value="<?php echo esc_attr( $default ); ?>">

					
						<?php if ( !empty ( $desc_primary ) ) { ?>
							<p class="uix-cmb__description"><?php echo UixShortcodes::kses( $desc_primary ); ?></p>
						<?php } ?>
			
				</td>
			</tr>
		<?php	
		}		
		
		
		/**
		* Field Type: Custom Attributes
		*
		* @print: 
		
		    $_data = json_decode( get_post_meta( get_the_ID(), 'cus_page_ex_demoname_appear_5', true ), true );
			
			if ( is_array( $_data ) && sizeof( $_data ) > 0 ) {

				foreach( $_data as $value ) {
				?>
					<li>
						<strong><?php echo UixShortcodes::kses( $value[ 'name' ] ); ?></strong>
						<span>
							<?php echo UixShortcodes::kses( $value[ 'value' ] ); ?>
						</span>
					</li>
				<?php
				}
			} 
	
	    *
		*/
		public static function addfield_custom_attrs( $id, $title, $desc, $default, $options = '', $placeholder = '', $desc_primary = '' ) {
			
			$project_custom_attrs = json_decode( $default, true );
			$label_title          = esc_html__( 'Title', 'uix-shortcodes' );
			$label_value          = esc_html__( 'Value', 'uix-shortcodes' );
			if ( is_array ( $options )  && isset( $options[ 'label_title' ] ) ) {
				$label_title = $options[ 'label_title' ];
			}
			if ( is_array ( $options )  && isset( $options[ 'label_value' ] ) ) {
				$label_value = $options[ 'label_value' ];

			}
			
			$temp = '
				<div class="uix-cmb__text--div">
					<label class="uix-cmb__text--p">
						<p class="uix-cmb__description">
							'.esc_html( $label_title ).'
						</p>
						<input class="uix-cmb__text--small" name="'.esc_attr( $id ).'_attrs_title[]" value="{name}"><span class="important2">*</span>&nbsp;&nbsp;
					</label>


					<label class="uix-cmb__text--p">
						<p class="uix-cmb__description">
							'.esc_html( $label_value ).'
						</p>
						<input class="uix-cmb__text--medium" name="'.esc_attr( $id ).'_attrs_value[]" value="{value}"><a href="javascript:void(0);" class="uix-cmb__custom-attributes-field__removebtn" title="'.esc_attr__( 'Remove field', 'uix-shortcodes' ).'"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAABHElEQVQ4y7VV2w2CQBBc/YBODHZhiA34+IECiKDWonVoM4r/BLQIxZ9zSWaTjfJWJ5nkgNvhdnfujqgcFtNnHpkp8wmmeOdjTissmTemaeCVuagTGjD3KuDEXDFHWI2Fccg8q3l7xH5AxO7MoGqS+nnEfCBmV5amiE2oPVzEFLFz3QCpWUDdESE2k0b5qmaDHoJFTAwNj2ADgwb0xRoaB4K3DDrYFw40EoJhzZtRTUsKbDznfxH8RcpjnbI0JfxCcKObIrY597TNkHnRtrGw0Q1M2hXbd2MTTg2Dvel2EJuiEUXsrO5wiBrSH2JledXhIFtopywRYwc4sIWNbm5UzUSstvZz1KPJg1lZmlRzBXiwQYLUcowP+FZ6BbwA8yaEV41zJXcAAAAASUVORK5CYII="/></a>
					</label>
				</div>
			';
			
	
			$temp_attr = str_replace( '{name}', '', 
						 str_replace( '{value}', '',
						 $temp 
						));

		?>
		
		
			<tr>
				<th colspan="2">
					
					<!-- Begin Fields -->
					<div class="uix-cmb__wrapper uix-cmb__custom-attributes-field" data-append-id="<?php echo esc_attr( $id ); ?>_append" data-tmpl='<?php echo esc_attr( $temp_attr ); ?>'>
					
					
					
						<table class="form-table uix-cmb">


							<tr>
								<th class="uix-cmb__title">
									<label><?php echo UixShortcodes::kses( $title ); ?></label>
									<?php if ( !empty ( $desc ) ) { ?>
										<p class="uix-cmb__title_desc"><?php echo UixShortcodes::kses( $desc ); ?></p>
									<?php } ?>
								</th>
								<td>

									   <a href="javascript:void(0);" class="uix-cmb__custom-attributes-field__addbtn"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAABmJLR0QA/wD/AP+gvaeTAAADGElEQVRIiZWV32scVRTHP+fMbGKT0CIaapJWhJSmD8UHLeZhDfjSSja1LUGrT6II/gOCj1bxUf8GEUVQrFrtbpEgKDXxR9Xqg1JQlFpM1qhFRbaJ2cz9+jC728lmZrd+H2a45575nu855547Rg9cnZ3euR6X5lx2XGgvMNra+t3gSpC9OxCF2uh7S/8UcVie8beH7hvZXE+eRnoKGOolAmgIXow2hl64bWGh0TfAr5V7p4PzFjDRh7gbv5iF+bGzn3yRNXp2UX+gfDI4H+WSC5S+Wo9t2CP5+frRmQezxk4Gy8fKhy3YOSDO4SYEkShljsxwt/z6Gk0FKhO1xQ86AeqzM6OKuAS6Je+bIKE772bo5KMArJ1+Fb75ErfcEAB/hNLGgT3vXLjqAMH1bBE5gAQaHmFwcj+Dk/sJwztRfpnauNWbA88A+Oqx6d1mPNHLW6YtZZeErHcE4Mn67MyoJ4pPAIP9vCkuRxFuUszx2OSVrD61FbYWMkgksoKFCErPlAmwtJlmXY2XKrHQVJY9UcDvmkY7hknDGIYoTR3suJWmDtJM6RFKm91oEL6+QGSWna4DMTDW4TcIiRh55HEGbr+jMPddR+bgyNwWW/PKZf6++Bnu0XV+Y9zJOff/u9pFEHFs2IrQPgATuBuN118m7BhC1vZLS7TrcKr6r4Uqm99/h2GdqY7WGrh5pyctLMegn4F9bemRObr4ebpsdTZINDFoBdi89C369MPrgyYDh8i7c7fLLrPaFhNpFrEbsTmxeXo1ZGSZpddFez/2dH9baU01T2RViq6v4trekFcUqPre6vkfML3Wy9NkdLfe1OcomL2yu7b4kwNEwU4B68W+YBtrNFfrNFfr+L9r/Qb7GklyiqyslbnyPGant0klrUgSQmt6wc2I3IuOszCbHz/78RnI/HDGa0tvS3o+NwMgdqcURZSiiLiYHIPn2uRbMmhj+Wj5YcNeov+/uBvXTDw2Vlt8M2v0bq+J6tIbZroH7NyNMguqyA91k0OfW2GlUj6E2Qmc+xGTwM2trT8xfkS8jzgzXlv8qojjP3mDIzt0pTbdAAAAAElFTkSuQmCC" alt="<?php echo esc_attr__( 'Add a custom attribute', 'uix-shortcodes' ); ?>"/></a>

								</td>
							</tr>	

							<tr>
								<th class="uix-cmb__title"></th>
								<td>

									<?php
									if ( is_array( $project_custom_attrs ) && sizeof( $project_custom_attrs ) > 0 ) {

										foreach( $project_custom_attrs as $value ) {
											echo str_replace( '{name}', esc_attr( $value[ 'name' ] ), 
														 str_replace( '{value}', esc_attr( $value[ 'value' ] ),
														 $temp 
														));
											
	
										}
									} 
									?> 

									<div id="<?php echo esc_attr( $id ); ?>_append"></div>

								</td>
							</tr>


						</table>
					</div>
					<!-- End Fields -->
				
					<?php if ( !empty ( $desc_primary ) ) { ?>
						<p class="uix-cmb__description"><?php echo UixShortcodes::kses( $desc_primary ); ?></p>
					<?php } ?>
				
				
					
			
				</th>
			</tr>
		<?php	
		}		
		
		
		
	
	}

}


