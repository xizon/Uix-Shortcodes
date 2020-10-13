<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; 
}

/**
 * Uix Custom Metaboxes
 *
 * @class 		: Uix_Custom_Metaboxes
 * @version		: 1.7 (October 13, 2020)
 * @author 		: UIUX Lab
 * @author URI 	: https://uiux.cc
 * @license     : MIT
 *
 *
 */

if ( !class_exists( 'Uix_Custom_Metaboxes' ) ) {
	
	class Uix_Custom_Metaboxes {
		
		
		/**
		* Custom Meta Boxes Version
		*
		*/
		private static $ver = 1.7;	
		
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
		* Check if wp_nonce_field() exists before using it
		*
		*/
		public static $nonce_field = true;

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

        

		/**
		* The TinyMCE "syntax-highlight-code" and "code" buttons is not included with WP by default
		*
		*/    
//        public static function mce_external_plugins($plugins) {   
//
//            $plugins['code'] = UixShortcodes::plug_directory() .'includes/admin/uix-custom-metaboxes/editor/plugins/syntax-highlight-code/prism.js';
//            return $plugins;
//        }
//        add_filter('mce_external_plugins', 'my_mce_external_plugins');
//


		
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
                  
                  
					wp_localize_script( 'uix-custom-metaboxes',  'uix_custom_metaboxes_lang', array( 
						'ed_lang'                 => get_locale(),
						'ed_url'                  => UixShortcodes::plug_directory() .'includes/admin/uix-custom-metaboxes/',
						'ed_media_title'          => __( 'Select Files', 'uix-shortcodes' ),
						'ed_media_text'           => __( 'Insert', 'uix-shortcodes' ),				
						'ed_image'                => __( 'Insert Image', 'uix-shortcodes' ),
						'ed_unlink_title'         => __( 'Remove link', 'uix-shortcodes' ),
						'ed_link_title'           => __( 'Insert/Edit link', 'uix-shortcodes' ),
						'ed_link_field_url'       => __( 'URL', 'uix-shortcodes' ),
						'ed_link_field_text'      => __( 'Link Text', 'uix-shortcodes' ),
						'ed_link_field_win'       => __( 'Open link in a new tab', 'uix-shortcodes' ),
						'ed_hcode_title'          => __( 'Syntax Highlight Code', 'uix-shortcodes' ),
						'ed_hcode_field_label'    => __( 'Language', 'uix-shortcodes' ),
                        'select_empty_text'       => __( '-', 'uix-shortcodes' ),
                        'delete_confirm_text'     => __( 'Are you sure you want to delete?', 'uix-shortcodes' ),
                        
					 ) );	
				 
					
				  

					//Colorpicker
					wp_enqueue_style( 'wp-color-picker' );
					wp_enqueue_script( 'wp-color-picker' );	
				  
				    //date picker
				    wp_enqueue_script('jquery-ui-datepicker');
	
			  }
			
	
		}
		

		/**
		* Creating the Custom Field Box
		*
		* @link https://developer.wordpress.org/reference/functions/add_meta_box/
		*
		*/
		public static function add() {
			
			$all_args = apply_filters( 'uix_custom_metaboxes_vars', self::$all_config );
			
			if ( !is_array( $all_args ) ) return;
			
			
			
			foreach ( $all_args as $args ) {
				
				//Creating the Custom Field Box
				foreach ( $args as $v ) {


					$id        = ( isset( $v[ 'config' ][ 'id' ] ) ) ? esc_attr( $v[ 'config' ][ 'id' ] ) : 'uix_custom_meta-default';
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
			
			$all_args = apply_filters( 'uix_custom_metaboxes_vars', self::$all_config );
			
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
			
			$all_args = apply_filters( 'uix_custom_metaboxes_vars', self::$all_config );
			
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
		* Filter JSON data to update_post_meta() 
        * Fixed php json_decode quotes problem
		*
		*/        
		public static function json_encode_to_update_post_meta( $arr ){
			
            $result = self::unicode_decode( json_encode( $arr ) );
            
            $result = str_replace(
                                array( '\r\n', '\r', '\n', '&quot;', '&apos;', '&#034;', '&#039;' ),
                                array( '', '', '', '\u0022', '\u0027', '\u0022', '\u0027' ),
                            $result );  
            
			return $result;
		}
		      
		
		/**
		* Parse JSON data from Editor
		*
		*/        
		public static function parse_json_data_from_editor( $str ){
			
            $result = wp_specialchars_decode( self::unicode_decode( $str ) );
                                             
			return $result;
		}
        
        
			
        
        
		/**
		* Decode Unicode strings in PHP
		*
		*/
        public static function replace_unicode_escape_sequence($match) {
            return mb_convert_encoding(pack('H*', $match[1]), 'UTF-8', 'UCS-2BE');
        }
        public static function unicode_decode($str) {
            return preg_replace_callback('/\\\\u([0-9a-f]{4})/i', array( __CLASS__, 'replace_unicode_escape_sequence' ), $str);
        } 
		   
        
        
		
		/**
		* Callback function to show fields in meta box.
		*
		*/
		public static function register_meta_boxes( $post, $metabox ) {
			
	
			$fields = $metabox[ 'args' ];
		
			
			global $post;

            if ( self::$nonce_field ) {
                wp_nonce_field( basename( __FILE__ ) , 'uix-meta-box-nonce' );
                
                //
                self::$nonce_field = false;
            }
			
			
			
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
								self::addfield_text( $id, $title, $desc, $default, $options, $placeholder, $desc_primary, true );
							}	

							//------
							if ( $type == 'textarea' ) {
								self::addfield_textarea( $id, $title, $desc, $default, $options, $placeholder, $desc_primary, true );
							}	

							//------
							if ( $type == 'url' ) {
								self::addfield_url( $id, $title, $desc, $default, $options, $placeholder, $desc_primary, true );
							}	

							//------
							if ( $type == 'number' ) {
								self::addfield_number( $id, $title, $desc, $default, $options, $placeholder, $desc_primary, true );
							}				

							//------
							if ( $type == 'radio' ) {
								self::addfield_radio( $id, $title, $desc, $default, $options, $placeholder, $desc_primary, true );
							}			

							//------
							if ( $type == 'image' ) {
								self::addfield_image( $id, $title, $desc, $default, $options, $placeholder, $desc_primary, true );
							}						

							//------
							if ( $type == 'color' ) {
								self::addfield_color( $id, $title, $desc, $default, $options, $placeholder, $desc_primary, true );
							}				

							//------
							if ( $type == 'checkbox' ) {
								self::addfield_checkbox( $id, $title, $desc, $default, $options, $placeholder, $desc_primary, true );
							}		

							//------
							if ( $type == 'select' ) {
								self::addfield_select( $id, $title, $desc, $default, $options, $placeholder, $desc_primary, true );
							}					
							
							//------
							if ( $type == 'editor' ) {
								self::addfield_editor( $id, $title, $desc, $default, $options, $placeholder, $desc_primary, true );
							}					
							
							//------
							if ( $type == 'date' ) {
								self::addfield_date( $id, $title, $desc, $default, $options, $placeholder, $desc_primary, true );
							}				

							//------
							if ( $type == 'price' ) {
								self::addfield_price( $id, $title, $desc, $default, $options, $placeholder, $desc_primary, true );
							}		
							
							//------
							if ( $type == 'multi-checkbox' ) {
								self::addfield_multi_checkbox( $id, $title, $desc, $default, $options, $placeholder, $desc_primary, true );
							}	
							
							//------
							if ( $type == 'custom-attrs' ) {
								self::addfield_custom_attrs( $id, $title, $desc, $default, $options, $placeholder, $desc_primary, true );
							}	
							
							
							//------
							if ( $type == 'multi-content' ) {
								self::addfield_multi_content( $id, $title, $desc, $default, $options, $placeholder, $desc_primary, true );
							}	
                            
                            
							//------
							if ( $type == 'multi-portfolio' ) {
								self::addfield_multi_portfolio( $id, $title, $desc, $default, $options, $placeholder, $desc_primary, true );
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
						
						$post_val = wp_unslash( $_POST[ $id ] );
						
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
																	'name'  => esc_attr( $value ),
																	'value' => esc_attr( $field_values_array_2[ $index ] )
																) );		
							}

						}

						$post_val = self::json_encode_to_update_post_meta( $custom_attrs );
                        
                        
					}


				}
				
                
				if ( $type == 'multi-content' ) {
					
					if ( isset( $_POST[ $id . '_attrs_title' ] ) ) {
						$custom_attrs          = array();
						$field_values_array_1  = $_POST[ $id . '_attrs_title' ];
						$field_values_array_2  = $_POST[ $id . '_attrs_value' ];
                        $field_values_array_3  = $_POST[ $id . '_attrs_id' ];
                        $field_values_array_4  = $_POST[ $id . '_attrs_subtitle' ];
                        $field_values_array_5  = $_POST[ $id . '_attrs_level' ];
                        $field_values_array_6  = $_POST[ $id . '_attrs_classname' ];
                        
                 
                        //var_dump( $field_values_array_1 );
                        //var_dump( $field_values_array_5 );
                        //wp_die();
                    
						foreach( $field_values_array_1 as $index => $value ) {	
							if ( !empty( $value ) ) {
                                
                                $title = $field_values_array_1[ $index ];
                                $item_id = $field_values_array_3[ $index ];
                                $level_id = $field_values_array_5[ $index ];
                                $sub_title = $field_values_array_4[ $index ];
                                $classname = $field_values_array_6[ $index ];
                                $content = $field_values_array_2[ $index ];
                                
                                
                                //level 2
                                $level_2 = array();
                                foreach( $field_values_array_1 as $index_2 => $value ) {
                                    if ( !empty( $value ) ) {
                                        
                                        
                                        $title_2 = $field_values_array_1[ $index_2 ];
                                        $item_id_2 = $field_values_array_3[ $index_2 ];
                                        $level_id_2 = $field_values_array_5[ $index_2 ];
                                        $sub_title_2 = $field_values_array_4[ $index_2 ];
                                        $classname_2 = $field_values_array_6[ $index_2 ];
                                        $content_2 = $field_values_array_2[ $index_2 ];

                                        
                                        if ( !empty( $level_id_2 ) && $level_id_2 == $item_id ) {
                                       
                                            array_push( $level_2, array(
                                                                        'name'  => esc_attr( $title_2 ),
                                                                        'value' => esc_html( $content_2 ),
                                                                        'id' => esc_attr( $item_id_2 ),
                                                                        'subtitle' => esc_html( $sub_title_2 ),
                                                                        'level' => esc_attr( $level_id_2 ),
                                                                        'classname' => esc_attr( $classname_2 ),
                                                                        'content' => ''
                                                                    ) );

                                        }     
   
                                    }
                                }
                                

                                //level 1
                                $level_1 = array();
                                if ( empty( $level_id ) ) {
                                    $level_1 = array(
                                                    'name'  => esc_attr( $title ),
                                                    'value' => esc_html( $content ),
                                                    'id' => esc_attr( $item_id ),
                                                    'subtitle' => esc_html( $sub_title ),
                                                    'level' => esc_attr( $level_id ),
                                                    'classname' => esc_attr( $classname ),
                                                    'content' => $level_2
                                                );
                                }
                                

                                
                                //---
                                array_push( $custom_attrs, $level_1 );
                               

							}

						}
              
						$post_val = self::json_encode_to_update_post_meta( $custom_attrs );
                   
                        
					}


				}         
                
                
                
				if ( $type == 'multi-portfolio' ) {
					
                    $custom_attrs = array();
					if ( isset( $_POST[ $id . '_attrs_type' ] ) ) {
						
						$field_values_array_1  = $_POST[ $id . '_attrs_type' ];
						$field_values_array_2  = $_POST[ $id . '_attrs_value' ];
                        $field_values_array_3  = $_POST[ $id . '_attrs_file' ];
                        
                    
						foreach( $field_values_array_1 as $index => $value ) {	
							if ( !empty( $value ) ) {
                                
                                $type = $field_values_array_1[ $index ];
                                $html = $field_values_array_2[ $index ];
                                $file = $field_values_array_3[ $index ];
                             
                                array_push( $custom_attrs, array(
                                                    'type'  => esc_attr( $type ),
                                                    'value' => esc_html( $html ),
                                                    'filePath' => esc_html( $file ),
                                                ) );
                               

							}

						}
                        
                        
                        
					}//endif isset( $_POST[ $id . '_attrs_type' ] )

                    
                    //
                    array_push( $custom_attrs, array(
                                                'lightbox'  => $_POST[ $id . '_lightbox' ]
                                            ) );
  
                    
                    //
                    $post_val = self::json_encode_to_update_post_meta( $custom_attrs );

				}     
                
                
		
				update_post_meta( $post_id, $id, $post_val );
				
		
				
			}
			

			
		}
		

		
		/**
		* Field Type: Editor
		*
		* @print: 
		* echo UixShortcodes::kses( get_post_meta( get_the_ID(), 'cus_page_ex_demoname_appear_3', true ) );
	    *
		*/
		public static function addfield_editor( $id, $title, $desc, $default, $options = '', $placeholder = '', $desc_primary = '', $enable_table = false ) {
            
            //editor options
            $editor_toolbar = 'formatselect fontselect forecolor backcolor bold italic underline strikethrough bullist numlist blockquote code alignleft aligncenter alignright uix_link uix_unlink | removeformat outdent indent superscript subscript hr uix_image uix_highlightcode media customCode fullscreen';
            $editor_height = 200;  
            
            
		?>
            <?php if ( $enable_table ) : ?>
			<tr>
				<th class="uix-cmb__title">
					<label><?php echo UixShortcodes::kses( $title ); ?></label>
					<?php if ( !empty ( $desc ) ) { ?>
					    <p class="uix-cmb__title_desc"><?php echo UixShortcodes::kses( $desc ); ?></p>
					<?php } ?>
				</th>
				<td>
            <?php endif; ?>
					   
						<?php 
			
							$editor_toolbar  = 'formatselect fontselect forecolor backcolor bold italic underline strikethrough bullist numlist blockquote code alignleft aligncenter alignright uix_link uix_unlink | removeformat outdent indent superscript subscript hr uix_image uix_highlightcode media customCode fullscreen';
			                $editor_height   = 200;
							if ( is_array ( $options ) ) {
								if ( isset( $options[ 'editor_toolbar' ] ) ) $editor_toolbar = $options[ 'editor_toolbar' ];
								if ( isset( $options[ 'editor_height' ] ) ) $editor_height = $options[ 'editor_height' ];
							}
			
						?> 

                        <div class="uix-cmb__mce-editor" aria-init="0">

                           <textarea data-editor-toolbar="<?php echo esc_attr( $editor_toolbar ); ?>" data-editor-height="<?php echo esc_attr( $editor_height ); ?>" id="<?php echo esc_attr( $id ); ?>-editor" name="<?php echo esc_attr( $id ); ?>" ><?php echo esc_textarea( $default ); ?></textarea>

                        </div>
                    

            <?php if ( $enable_table ) : ?>  
				</td>
			</tr>
            <?php endif; ?>
		<?php	
		}	
		
		
		/**
		* Field Type: Textarea
		*
		*/
		public static function addfield_textarea( $id, $title, $desc, $default, $options = '', $placeholder = '', $desc_primary = '', $enable_table = false ) {
		?>
            <?php if ( $enable_table ) : ?>
			<tr>
				<th class="uix-cmb__title">
					<label><?php echo UixShortcodes::kses( $title ); ?></label>
					<?php if ( !empty ( $desc ) ) { ?>
					    <p class="uix-cmb__title_desc"><?php echo UixShortcodes::kses( $desc ); ?></p>
					<?php } ?>
				</th>
				<td>
            <?php endif; ?>
                    
                    
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

            <?php if ( $enable_table ) : ?>  
				</td>
			</tr>
            <?php endif; ?>
		<?php	
		}	
		
		/**
		* Field Type: Text
		*
		*/
		public static function addfield_text( $id, $title, $desc, $default, $options = '', $placeholder = '', $desc_primary = '', $enable_table = false ) {
		?>
            <?php if ( $enable_table ) : ?>
			<tr>
				<th class="uix-cmb__title">
					<label><?php echo UixShortcodes::kses( $title ); ?></label>
					<?php if ( !empty ( $desc ) ) { ?>
					    <p class="uix-cmb__title_desc"><?php echo UixShortcodes::kses( $desc ); ?></p>
					<?php } ?>
				</th>
				<td>
            <?php endif; ?>
                    
					   <input placeholder="<?php echo esc_attr( $placeholder ); ?>" type="text" class="uix-cmb__normal-text" value="<?php echo esc_attr( $default ); ?>" name="<?php echo esc_attr( $id ); ?>" id="<?php echo esc_attr( $id ); ?>">
						<?php if ( !empty ( $desc_primary ) ) { ?>
							<p class="uix-cmb__description"><?php echo UixShortcodes::kses( $desc_primary ); ?></p>
						<?php } ?>
			
            <?php if ( $enable_table ) : ?> 
				</td>
			</tr>
            <?php endif; ?>
		<?php	
		}	
		
		/**
		* Field Type: Date
		*
		*/
		public static function addfield_date( $id, $title, $desc, $default, $options = '', $placeholder = '', $desc_primary = '', $enable_table = false ) {
		?>
            <?php if ( $enable_table ) : ?>
			<tr>
				<th class="uix-cmb__title">
					<label><?php echo UixShortcodes::kses( $title ); ?></label>
					<?php if ( !empty ( $desc ) ) { ?>
					    <p class="uix-cmb__title_desc"><?php echo UixShortcodes::kses( $desc ); ?></p>
					<?php } ?>
				</th>
				<td>
            <?php endif; ?>    
                    
				   
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
			
            <?php if ( $enable_table ) : ?>  
				</td>
			</tr>
            <?php endif; ?>
		<?php	
		}	
		
		
		
		
		/**
		* Field Type: URL
		*
		*/
		public static function addfield_url( $id, $title, $desc, $default, $options = '', $placeholder = '', $desc_primary = '', $enable_table = false ) {
		?>
            <?php if ( $enable_table ) : ?>
			<tr>
				<th class="uix-cmb__title">
					<label><?php echo UixShortcodes::kses( $title ); ?></label>
					<?php if ( !empty ( $desc ) ) { ?>
					    <p class="uix-cmb__title_desc"><?php echo UixShortcodes::kses( $desc ); ?></p>
					<?php } ?>
				</th>
				<td>
            <?php endif; ?>      
                    
                    
					   <input placeholder="<?php echo esc_attr( $placeholder ); ?>" type="text" class="uix-cmb__normal-text" value="<?php echo esc_url( $default ); ?>" name="<?php echo esc_attr( $id ); ?>" id="<?php echo esc_attr( $id ); ?>">
						<?php if ( !empty ( $desc_primary ) ) { ?>
							<p class="uix-cmb__description"><?php echo UixShortcodes::kses( $desc_primary ); ?></p>
						<?php } ?>
			
            <?php if ( $enable_table ) : ?>   
				</td>
			</tr>
            <?php endif; ?>   

		<?php	
		}	
		
		/**
		* Field Type: Number
		*
		*/
		public static function addfield_number( $id, $title, $desc, $default, $options = '', $placeholder = '', $desc_primary = '', $enable_table = false ) {
		?>
            <?php if ( $enable_table ) : ?>
			<tr>
				<th class="uix-cmb__title">
					<label><?php echo UixShortcodes::kses( $title ); ?></label>
					<?php if ( !empty ( $desc ) ) { ?>
					    <p class="uix-cmb__title_desc"><?php echo UixShortcodes::kses( $desc ); ?></p>
					<?php } ?>
				</th>
				<td>
            <?php endif; ?>    
                    
					   <input placeholder="<?php echo esc_attr( $placeholder ); ?>" type="text" class="uix-cmb__short-text" value="<?php echo ( empty( $default ) ) ? 0 : floatval( $default ); ?>" name="<?php echo esc_attr( $id ); ?>" id="<?php echo esc_attr( $id ); ?>">
						<?php 
						if ( is_array ( $options ) && isset( $options[ 'units' ] ) ) {
							echo esc_html( $options[ 'units' ] );
						} 
						?>					   
					   
						<?php if ( !empty ( $desc_primary ) ) { ?>
							<p class="uix-cmb__description"><?php echo UixShortcodes::kses( $desc_primary ); ?></p>
						<?php } ?>
			
            <?php if ( $enable_table ) : ?>   
				</td>
			</tr>
            <?php endif; ?>

		<?php	
		}		
		
		
		
		/**
		* Field Type: Price
		*
		*/
		public static function addfield_price( $id, $title, $desc, $default, $options = '', $placeholder = '', $desc_primary = '', $enable_table = false ) {
		?>
            <?php if ( $enable_table ) : ?>
			<tr>
				<th class="uix-cmb__title">
					<label><?php echo UixShortcodes::kses( $title ); ?></label>
					<?php if ( !empty ( $desc ) ) { ?>
					    <p class="uix-cmb__title_desc"><?php echo UixShortcodes::kses( $desc ); ?></p>
					<?php } ?>
				</th>
				<td>
            <?php endif; ?>    
                    
						<?php 
						if ( is_array ( $options ) && isset( $options[ 'units' ] ) ) {
							echo esc_html( $options[ 'units' ] );
						} 
						?>	
					   <input placeholder="<?php echo esc_attr( $placeholder ); ?>" type="text" class="uix-cmb__short-text" value="<?php echo ( empty( $default ) ) ? 0 : floatval( $default ); ?>" name="<?php echo esc_attr( $id ); ?>" id="<?php echo esc_attr( $id ); ?>">
						<?php if ( !empty ( $desc_primary ) ) { ?>
							<span class="uix-cmb__description"><?php echo UixShortcodes::kses( $desc_primary ); ?></span>
						<?php } ?>
			
            <?php if ( $enable_table ) : ?>   
				</td>
			</tr>
            <?php endif; ?>

		<?php	
		}	
		
		
		/**
		* Field Type: Image
		*
		*/
		public static function addfield_image( $id, $title, $desc, $default, $options = '', $placeholder = '', $desc_primary = '', $enable_table = false ) {
            
                                         
            $label_controller_up_remove   = esc_attr__( 'Remove', 'uix-shortcodes' );
            $label_controller_up_add      = esc_html__( 'Select image or video', 'uix-shortcodes' );
            
            //---
            if ( is_array ( $options ) ) {
                if ( isset( $options[ 'label_controller_up_remove' ] ) ) $label_controller_up_remove = $options[ 'label_controller_up_remove' ];
                if ( isset( $options[ 'label_controller_up_add' ] ) ) $label_controller_up_add = $options[ 'label_controller_up_add' ]; 
                
            }
            
		?>
            <?php if ( $enable_table ) : ?>
			<tr>
				<th class="uix-cmb__title">
					<label><?php echo UixShortcodes::kses( $title ); ?></label>
					<?php if ( !empty ( $desc ) ) { ?>
					    <p class="uix-cmb__title_desc"><?php echo UixShortcodes::kses( $desc ); ?></p>
					<?php } ?>
				</th>
				<td>
            <?php endif; ?>   
				   
						<div class="uix-cmb__upload-wrapper">
							<?php
							Uix_UploadMedia::add( array(
								'title'          => '',
								'id'             => esc_attr( $id ),
								'name'           => esc_attr( $id ),
								'value'          => esc_url( $default ),
								'placeholder'    => esc_attr( $placeholder ),
                                'label_remove'   => esc_attr( $label_controller_up_remove ),
                                'label_add'      => esc_html( $label_controller_up_add ),
							));
							?>
						</div>
						
				   
						<?php if ( !empty ( $desc_primary ) ) { ?>
							<p class="uix-cmb__description"><?php echo UixShortcodes::kses( $desc_primary ); ?></p>
						<?php } ?>
			
            <?php if ( $enable_table ) : ?>   
				</td>
			</tr>
            <?php endif; ?>

		<?php	
		}	
		
		
		/**
		* Field Type: Color
		*
		*/
		public static function addfield_color( $id, $title, $desc, $default, $options = '', $placeholder = '', $desc_primary = '', $enable_table = false ) {
		?>
            <?php if ( $enable_table ) : ?>
			<tr>
				<th class="uix-cmb__title">
					<label><?php echo UixShortcodes::kses( $title ); ?></label>
					<?php if ( !empty ( $desc ) ) { ?>
					    <p class="uix-cmb__title_desc"><?php echo UixShortcodes::kses( $desc ); ?></p>
					<?php } ?>
				</th>
				<td>
            <?php endif; ?>     
                    
					   <input placeholder="<?php echo esc_attr( $placeholder ); ?>" type="text" class="uix-cmb__color-selector" value="<?php echo esc_attr( $default ); ?>" name="<?php echo esc_attr( $id ); ?>" id="<?php echo esc_attr( $id ); ?>">
						<?php if ( !empty ( $desc_primary ) ) { ?>
							<p class="uix-cmb__description"><?php echo UixShortcodes::kses( $desc_primary ); ?></p>
						<?php } ?>
			
            <?php if ( $enable_table ) : ?>  
				</td>
			</tr>
            <?php endif; ?>

		<?php	
		}	
		
		
		/**
		* Field Type: Checkbox
		*
		* @print: 
		* echo ( get_post_meta( get_the_ID(), 'cus_page_ex_demoname_8', true ) ) ? esc_attr( '_blank' ) : esc_attr( '_self' );
	    *
		*/
		public static function addfield_checkbox( $id, $title, $desc, $default, $options = '', $placeholder = '', $desc_primary = '', $enable_table = false ) {
		?>
            <?php if ( $enable_table ) : ?>
			<tr>
				<th class="uix-cmb__title">
					<label><?php echo UixShortcodes::kses( $title ); ?></label>
					<?php if ( !empty ( $desc ) ) { ?>
					    <p class="uix-cmb__title_desc"><?php echo UixShortcodes::kses( $desc ); ?></p>
					<?php } ?>
				</th>
				<td>
            <?php endif; ?>      
                    

					<div class="uix-cmb__checkbox-selector">
					
						<label>
							<input name="<?php echo esc_attr( $id ); ?>" type="checkbox" value="1" <?php checked( $default, 1 ); ?>>
							<?php if ( !empty ( $desc_primary ) ) { ?>
								<span class="uix-cmb__description"><?php echo UixShortcodes::kses( $desc_primary ); ?></span>
							<?php } ?>
							
						</label>
					
					</div>
					

            <?php if ( $enable_table ) : ?>
				</td>
			</tr>
            <?php endif; ?>

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
		public static function addfield_multi_checkbox( $id, $title, $desc, $default, $options = '', $placeholder = '', $desc_primary = '', $enable_table = false ) {
		?>
            <?php if ( $enable_table ) : ?>
			<tr>
				<th class="uix-cmb__title">
					<label><?php echo UixShortcodes::kses( $title ); ?></label>
					<?php if ( !empty ( $desc ) ) { ?>
					    <p class="uix-cmb__title_desc"><?php echo UixShortcodes::kses( $desc ); ?></p>
					<?php } ?>
				</th>
				<td>
            <?php endif; ?>

				
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
		

            <?php if ( $enable_table ) : ?>
				</td>
			</tr>
            <?php endif; ?>

		<?php	
		}		
		

		/**
		* Field Type: Select
		*
		*/
		public static function addfield_select( $id, $title, $desc, $default, $options = '', $placeholder = '', $desc_primary = '', $enable_table = false ) {
		?>
            <?php if ( $enable_table ) : ?>
			<tr>
				<th class="uix-cmb__title">
					<label><?php echo UixShortcodes::kses( $title ); ?></label>
					<?php if ( !empty ( $desc ) ) { ?>
					    <p class="uix-cmb__title_desc"><?php echo UixShortcodes::kses( $desc ); ?></p>
					<?php } ?>
				</th>
				<td>
            <?php endif; ?>          
				   
					 
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
			
            <?php if ( $enable_table ) : ?>   
				</td>
			</tr>
            <?php endif; ?>

		<?php	
		}		
		
		
		
		
		/**
		* Field Type: Radio & Radio Image
		*
		*/
		public static function addfield_radio( $id, $title, $desc, $default, $options = '', $placeholder = '', $desc_primary = '', $enable_table = false ) {
		?>
            <?php if ( $enable_table ) : ?>
			<tr>
				<th class="uix-cmb__title">
					<label><?php echo UixShortcodes::kses( $title ); ?></label>
					<?php if ( !empty ( $desc ) ) { ?>
					    <p class="uix-cmb__title_desc"><?php echo UixShortcodes::kses( $desc ); ?></p>
					<?php } ?>
				</th>
				<td>
            <?php endif; ?>     
                    
				   
					  <div class="radio uix-cmb__radio-selector" data-target-id="<?php echo esc_attr( $id ); ?>">

							
						<?php 
			
						$br = false;
						if ( is_array ( $options )  && isset( $options[ 'br' ] ) ) {
							$br = $options[ 'br' ];
						}
			
			
						if ( is_array ( $options )  && isset( $options[ 'value' ] ) ) {
							
							$i          = 0;
                            $j          = 0;
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
									
                                    $v                        = $options[ 'toggle' ][ $key ];
									$toggle_id                = $id.'-'.$key.'-'.'-wrapper';
									$toggle_ipt_id            = $v[ 'id' ];
									$toggle_ipt_type          = $v[ 'type' ];
                                    
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
									
			
								<?php
								$i++;
								
							}//end foreach
                            
                            
                            //================================
							foreach ( $options[ 'value' ] as $key => $value  ) {
								
								//default
								if ( !empty( $default ) ) {
									if ( $key == $default ) { 
										$checked = 'checked'; 
									} else {
										$checked = '';
									}
								} else {
									if ( $j == 0 ) {
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
									
                                    $v                        = $options[ 'toggle' ][ $key ];
									$toggle_id                = $id.'-'.$key.'-'.'-wrapper';
									$toggle_ipt_id            = $v[ 'id' ];
									$toggle_ipt_type          = $v[ 'type' ];
                                    
                                    //---
                                    $toggle_ipt_title         = ( isset( $v[ 'title' ] ) ) ? $v[ 'title' ] : esc_html__( 'Field Title', 'uix-shortcodes' );
                                    $toggle_ipt_placeholder   = ( isset( $v[ 'placeholder' ] ) ) ? $v[ 'placeholder' ] : '';
                                    $toggle_ipt_options       = ( isset( $v[ 'options' ] ) ) ? $v[ 'options' ] : '';
                                    $toggle_ipt_desc          = ( isset( $v[ 'desc' ] ) ) ? $v[ 'desc' ] : '';
                                    $toggle_ipt_desc_primary  = ( isset( $v[ 'desc_primary' ] ) ) ? $v[ 'desc_primary' ] : '';
									$toggle_ipt_value         = get_post_meta( get_the_ID(), $toggle_ipt_id, true );
									$toggle_ipt_value_default = ( isset( $v[ 'default' ] ) ) ? $v[ 'default' ] : '';
									$toggle_ipt_default       = ( metadata_exists( 'post', get_the_ID(), $toggle_ipt_id ) ) ? $toggle_ipt_value : $toggle_ipt_value_default; 
								}
								
							
								?>
								
			
								<!-- Associated controller -->
								<?php if ( !empty( $toggle_id ) ) { ?>
									
                                    <div class="uix-cmb__toggle-target" id="<?php echo esc_attr( $toggle_id ); ?>" style="display:none;" >
                                        <?php
                                        //------
                                        if ( $toggle_ipt_type == 'text' ) {
                                            self::addfield_text( $toggle_ipt_id, $toggle_ipt_title, $toggle_ipt_desc, $toggle_ipt_default, $toggle_ipt_options, $toggle_ipt_placeholder, $toggle_ipt_desc_primary, false );
                                        }	

                                        //------
                                        if ( $toggle_ipt_type == 'textarea' ) {
                                            self::addfield_textarea( $toggle_ipt_id, $toggle_ipt_title, $toggle_ipt_desc, $toggle_ipt_default, $toggle_ipt_options, $toggle_ipt_placeholder, $toggle_ipt_desc_primary, false );
                                        }	

                                        //------
                                        if ( $toggle_ipt_type == 'url' ) {
                                            self::addfield_url( $toggle_ipt_id, $toggle_ipt_title, $toggle_ipt_desc, $toggle_ipt_default, $toggle_ipt_options, $toggle_ipt_placeholder, $toggle_ipt_desc_primary, false );
                                        }	

                                        //------
                                        if ( $toggle_ipt_type == 'number' ) {
                                            self::addfield_number( $toggle_ipt_id, $toggle_ipt_title, $toggle_ipt_desc, $toggle_ipt_default, $toggle_ipt_options, $toggle_ipt_placeholder, $toggle_ipt_desc_primary, false );
                                        }				

                                        //------
                                        if ( $toggle_ipt_type == 'radio' ) {
                                            self::addfield_radio( $toggle_ipt_id, $toggle_ipt_title, $toggle_ipt_desc, $toggle_ipt_default, $toggle_ipt_options, $toggle_ipt_placeholder, $toggle_ipt_desc_primary, false );
                                        }			

                                        //------
                                        if ( $toggle_ipt_type == 'image' ) {
                                            self::addfield_image( $toggle_ipt_id, $toggle_ipt_title, $toggle_ipt_desc, $toggle_ipt_default, $toggle_ipt_options, $toggle_ipt_placeholder, $toggle_ipt_desc_primary, false );
                                        }						

                                        //------
                                        if ( $toggle_ipt_type == 'color' ) {
                                            self::addfield_color( $toggle_ipt_id, $toggle_ipt_title, $toggle_ipt_desc, $toggle_ipt_default, $toggle_ipt_options, $toggle_ipt_placeholder, $toggle_ipt_desc_primary, false );
                                        }				

                                        //------
                                        if ( $toggle_ipt_type == 'checkbox' ) {
                                            self::addfield_checkbox( $toggle_ipt_id, $toggle_ipt_title, $toggle_ipt_desc, $toggle_ipt_default, $toggle_ipt_options, $toggle_ipt_placeholder, $toggle_ipt_desc_primary, false );
                                        }		

                                        //------
                                        if ( $toggle_ipt_type == 'select' ) {
                                            self::addfield_select( $toggle_ipt_id, $toggle_ipt_title, $toggle_ipt_desc, $toggle_ipt_default, $toggle_ipt_options, $toggle_ipt_placeholder, $toggle_ipt_desc_primary, false );
                                        }					

                                        //------
                                        if ( $toggle_ipt_type == 'editor' ) {
                                            self::addfield_editor( $toggle_ipt_id, $toggle_ipt_title, $toggle_ipt_desc, $toggle_ipt_default, $toggle_ipt_options, $toggle_ipt_placeholder, $toggle_ipt_desc_primary, false );
                                        }					

                                        //------
                                        if ( $toggle_ipt_type == 'date' ) {
                                            self::addfield_date( $toggle_ipt_id, $toggle_ipt_title, $toggle_ipt_desc, $toggle_ipt_default, $toggle_ipt_options, $toggle_ipt_placeholder, $toggle_ipt_desc_primary, false );
                                        }				

                                        //------
                                        if ( $toggle_ipt_type == 'price' ) {
                                            self::addfield_price( $toggle_ipt_id, $toggle_ipt_title, $toggle_ipt_desc, $toggle_ipt_default, $toggle_ipt_options, $toggle_ipt_placeholder, $toggle_ipt_desc_primary, false );
                                        }		

                                        //------
                                        if ( $toggle_ipt_type == 'multi-checkbox' ) {
                                            self::addfield_multi_checkbox( $toggle_ipt_id, $toggle_ipt_title, $toggle_ipt_desc, $toggle_ipt_default, $toggle_ipt_options, $toggle_ipt_placeholder, $toggle_ipt_desc_primary, false );
                                        }	

                                        //------
                                        if ( $toggle_ipt_type == 'custom-attrs' ) {
                                            self::addfield_custom_attrs( $toggle_ipt_id, $toggle_ipt_title, $toggle_ipt_desc, $toggle_ipt_default, $toggle_ipt_options, $toggle_ipt_placeholder, $toggle_ipt_desc_primary, false );
                                        }	


                                        //------
                                        if ( $toggle_ipt_type == 'multi-content' ) {
                                            self::addfield_multi_content( $toggle_ipt_id, $toggle_ipt_title, $toggle_ipt_desc, $toggle_ipt_default, $toggle_ipt_options, $toggle_ipt_placeholder, $toggle_ipt_desc_primary, false );
                                        }	
                                                                   
                                        //------
                                        if ( $toggle_ipt_type == 'multi-portfolio' ) {
                                            self::addfield_multi_portfolio( $toggle_ipt_id, $toggle_ipt_title, $toggle_ipt_desc, $toggle_ipt_default, $toggle_ipt_options, $toggle_ipt_placeholder, $toggle_ipt_desc_primary, false );
                                        }	                                                               
                                                                   
                                        ?>
                                    </div>
										
									
								<?php } ?>
								
								
								<?php
								$j++;
								
							}//end foreach
							     
                            
                            
							
						} 
						?>

					  </div>
					  <input type="hidden" id="<?php echo esc_attr( $id ); ?>" name="<?php echo esc_attr( $id ); ?>" value="<?php echo esc_attr( $default ); ?>">

					
						<?php if ( !empty ( $desc_primary ) ) { ?>
							<p class="uix-cmb__description"><?php echo UixShortcodes::kses( $desc_primary ); ?></p>
						<?php } ?>
			
            <?php if ( $enable_table ) : ?> 
				</td>
			</tr>
            <?php endif; ?>

		<?php	
		}		
		
		
		/**
		* Field Type: Custom Attributes
		*
		* @print: 
		
            <?php
            
            $_data = json_decode( get_post_meta( get_the_ID(), 'cus_page_ex_demoname_appear_5', true ), true );

            if ( is_array( $_data ) && sizeof( $_data ) > 0 ) {

                foreach( $_data as $value ) {
                ?>
                    <li>
                        <strong><?php echo esc_html( Uix_Custom_Metaboxes::parse_json_data_from_editor( $value[ 'name' ] ) ); ?></strong>
                        <p>
                            <?php echo UixShortcodes::kses( Uix_Custom_Metaboxes::parse_json_data_from_editor( $value[ 'value' ] ) ); ?>
                        </p>
                    </li>
                <?php
                }
            } 
            
            ?>
	
	    *
		*/
		public static function addfield_custom_attrs( $id, $title, $desc, $default, $options = '', $placeholder = '', $desc_primary = '', $enable_table = false ) {
			
			$project_custom_attrs = json_decode( $default, true );
			$label_title          = esc_html__( 'Title', 'uix-shortcodes' );
			$label_value          = esc_html__( 'Value', 'uix-shortcodes' );
            $label_upbtn_remove   = esc_html__( 'Remove', 'uix-shortcodes' );
            $label_upbtn_add      = esc_html__( 'Add New', 'uix-shortcodes' );
            
            //Use only one column as a separate module
            $one_column = false; 
            
            
            //---
            if ( is_array ( $options ) ) {
                if ( isset( $options[ 'label_title' ] ) ) $label_title = $options[ 'label_title' ];
                if ( isset( $options[ 'label_value' ] ) ) $label_value = $options[ 'label_value' ];
                if ( isset( $options[ 'label_upbtn_remove' ] ) ) $label_upbtn_remove = $options[ 'label_upbtn_remove' ];
                if ( isset( $options[ 'label_upbtn_add' ] ) ) $label_upbtn_add = $options[ 'label_upbtn_add' ]; 
                
                //
                if ( isset( $options[ 'one_column' ] ) ) $one_column = $options[ 'one_column' ]; 
                
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
						<input class="uix-cmb__text--medium" name="'.esc_attr( $id ).'_attrs_value[]" value="{value}"><a href="javascript:void(0);" class="uix-cmb__custom-attributes-field__removebtn" title="'.esc_attr( $label_upbtn_remove ).'"><svg aria-hidden="true" role="img" focusable="false" class="dashicon dashicons-trash" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><path d="M12 4h3c.6 0 1 .4 1 1v1H3V5c0-.6.5-1 1-1h3c.2-1.1 1.3-2 2.5-2s2.3.9 2.5 2zM8 4h3c-.2-.6-.9-1-1.5-1S8.2 3.4 8 4zM4 7h11l-.9 10.1c0 .5-.5.9-1 .9H5.9c-.5 0-.9-.4-1-.9L4 7z"></path></svg></a>
					</label>
				</div>
			';
			
	
			$temp_attr = str_replace( '{name}', '', 
						 str_replace( '{value}', '',
						 $temp 
						));

		?>
		
		
            <?php if ( $enable_table ) : ?>
			<tr>
				<th colspan="2">
             <?php endif; ?> 
                    
					
					<!-- Begin Fields -->
					<div class="uix-cmb__wrapper uix-cmb__custom-attributes-field <?php echo esc_attr( $one_column? 'uix-cmb__wrapper--one-column' : '' ); ?>" data-append-id="<?php echo esc_attr( $id ); ?>_append" data-tmpl='<?php echo esc_attr( $temp_attr ); ?>'>
					

                        <?php if ( ! $one_column ) : ?>
                 
						<table class="form-table uix-cmb">


							<tr>
								<th class="uix-cmb__title">
									<label><?php echo UixShortcodes::kses( $title ); ?></label>
									<?php if ( !empty ( $desc ) ) { ?>
										<p class="uix-cmb__title_desc"><?php echo UixShortcodes::kses( $desc ); ?></p>
									<?php } ?>
								</th>
								<td>  
                                    
                        <?php else: ?>	    
                                    
                            <label><?php echo UixShortcodes::kses( $title ); ?></label>
                            <?php if ( !empty ( $desc ) ) { ?>
                                <p class="uix-cmb__title_desc"><?php echo UixShortcodes::kses( $desc ); ?></p>
                            <?php } ?> 
                        
                        <?php endif; ?>	

                                    
									<?php
									if ( is_array( $project_custom_attrs ) && sizeof( $project_custom_attrs ) > 0 ) {

                                         //Parse JSON data from Editor
										foreach( $project_custom_attrs as $value ) {
                                            
                                            if ( is_array( $value ) && sizeof( $value ) > 0 ) {
                                                echo str_replace( '{name}', esc_attr( self::parse_json_data_from_editor( $value[ 'name' ] ) ), 
                                                             str_replace( '{value}', esc_attr( self::parse_json_data_from_editor( $value[ 'value' ] ) ),
                                                             $temp 
                                                            ));           
                                            }

	
										}
									} 
									?> 

									<div class="uix-cmb__custom-attributes-field__append__wrapper" id="<?php echo esc_attr( $id ); ?>_append"></div> 
                                    
                                    <div class="uix-cmb__custom-attributes-field__addbtn__wrapper">
                                        <a href="javascript:void(0);" class="uix-cmb__custom-attributes-field__addbtn"><svg aria-hidden="true" role="img" focusable="false" class="dashicon dashicons-insert" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><path d="M10 1c-5 0-9 4-9 9s4 9 9 9 9-4 9-9-4-9-9-9zm0 16c-3.9 0-7-3.1-7-7s3.1-7 7-7 7 3.1 7 7-3.1 7-7 7zm1-11H9v3H6v2h3v3h2v-3h3V9h-3V6z"></path></svg><?php echo esc_html( $label_upbtn_add ); ?></a>
                                    </div>
                                    
                                    


								</td>
							</tr>	


						</table>
					</div>
					<!-- End Fields -->
				
					<?php if ( !empty ( $desc_primary ) ) { ?>
						<p class="uix-cmb__description"><?php echo UixShortcodes::kses( $desc_primary ); ?></p>
					<?php } ?>
				
				
					
            <?php if ( $enable_table ) : ?>
				</th>
			</tr>
            <?php endif; ?>

		<?php	
		}		
		
		/**
		* Field Type: Multiple Content Area
		*
		* @print: 
            

            <?php

            $_data = json_decode( get_post_meta( get_the_ID(), 'uix_themeplugin_multicontent', true ), true );

            if ( is_array( $_data ) && sizeof( $_data ) > 0 ) {

                //Parse JSON data from Editor
                foreach( $_data as $index => $value ) {

                    if ( is_array( $value ) && sizeof( $value ) > 0 ) {

                        //level 1
                        ?>
                        <section class="slide <?php echo esc_attr( Uix_Custom_Metaboxes::parse_json_data_from_editor( $value[ 'classname' ] ) ); ?>" id="<?php echo esc_attr( Uix_Custom_Metaboxes::parse_json_data_from_editor( $value[ 'id' ] ) ); ?>" data-level="<?php echo esc_attr( Uix_Custom_Metaboxes::parse_json_data_from_editor( $value[ 'level' ] ) ); ?>">

                            <h3><?php echo esc_html( Uix_Custom_Metaboxes::parse_json_data_from_editor( $value[ 'name' ] ) ); ?></h3>
                            <?php echo UixShortcodes::kses( Uix_Custom_Metaboxes::parse_json_data_from_editor( $value[ 'subtitle' ] ) ); ?>
                            <hr>
                            <?php echo UixShortcodes::kses( Uix_Custom_Metaboxes::parse_json_data_from_editor( $value[ 'value' ] ) ); ?>


                        <?php   

                        //level 2
                        $level_2_content = $value[ 'content' ];
                        if ( is_array( $level_2_content ) && sizeof( $level_2_content ) > 0 ) {

                            foreach( $level_2_content as $index => $value ) {
                            ?>
                                <div class="slide slide-child <?php echo esc_attr( Uix_Custom_Metaboxes::parse_json_data_from_editor( $value[ 'classname' ] ) ); ?>" id="<?php echo esc_attr( Uix_Custom_Metaboxes::parse_json_data_from_editor( $value[ 'id' ] ) ); ?>" data-level="<?php echo esc_attr( Uix_Custom_Metaboxes::parse_json_data_from_editor( $value[ 'level' ] ) ); ?>">

                                    <h3><?php echo esc_html( Uix_Custom_Metaboxes::parse_json_data_from_editor( $value[ 'name' ] ) ); ?></h3>
                                    <?php echo UixShortcodes::kses( Uix_Custom_Metaboxes::parse_json_data_from_editor( $value[ 'subtitle' ] ) ); ?>
                                    <hr>
                                    <?php echo UixShortcodes::kses( Uix_Custom_Metaboxes::parse_json_data_from_editor( $value[ 'value' ] ) ); ?>

                                </div>  

                            <?php
                            } 

                        }//endif $level_2_content

                    ?>
                    </section>     
                    <?php

                    }//endif $value


                }//end foreach   

            }    

            ?>  
           
	
	    *
		*/
											
        
		public static function addfield_multi_content( $id, $title, $desc, $default, $options = '', $placeholder = '', $desc_primary = '', $enable_table = false ) {
            
     
            //---
			$project_custom_attrs = json_decode( $default, true );
			$label_title          = esc_html__( 'Title', 'uix-shortcodes' );
			$label_value          = esc_html__( 'Value', 'uix-shortcodes' );
            $label_subtitle       = esc_html__( 'Subtitle', 'uix-shortcodes' );
            $label_id             = esc_html__( 'ID', 'uix-shortcodes' );
            $label_level          = esc_html__( 'Level', 'uix-shortcodes' );
            $label_classname      = esc_html__( 'Class Name', 'uix-shortcodes' );
            $label_upbtn_remove   = esc_html__( 'Remove', 'uix-shortcodes' );
            $label_upbtn_add      = esc_html__( 'Add New', 'uix-shortcodes' );
            
          
            //Use only one column as a separate module
            $one_column = false;
            
            //editor options
            $editor_toolbar = 'formatselect fontselect forecolor backcolor bold italic underline strikethrough bullist numlist blockquote code alignleft aligncenter alignright uix_link uix_unlink | removeformat outdent indent superscript subscript hr uix_image uix_highlightcode media customCode fullscreen';
            $editor_toolbar_teeny = 'formatselect forecolor backcolor bold italic underline strikethrough alignleft aligncenter alignright uix_link uix_unlink removeformat customCode';
            
            $editor_height = 200;
            $editor_height_teeny = 50;
            
            //---
            if ( is_array ( $options ) ) {
                if ( isset( $options[ 'editor_toolbar' ] ) ) $editor_toolbar = $options[ 'editor_toolbar' ];
                if ( isset( $options[ 'editor_height' ] ) ) $editor_height = $options[ 'editor_height' ];
                if ( isset( $options[ 'editor_height_teeny' ] ) ) $editor_height_teeny = $options[ 'editor_height_teeny' ];
                if ( isset( $options[ 'editor_toolbar_teeny' ] ) ) $editor_toolbar_teeny = $options[ 'editor_toolbar_teeny' ];
                if ( isset( $options[ 'label_title' ] ) ) $label_title = $options[ 'label_title' ];
                if ( isset( $options[ 'label_value' ] ) ) $label_value = $options[ 'label_value' ];
                if ( isset( $options[ 'label_subtitle' ] ) ) $label_subtitle = $options[ 'label_subtitle' ];
                if ( isset( $options[ 'label_id' ] ) ) $label_id = $options[ 'label_id' ];
                if ( isset( $options[ 'label_level' ] ) ) $label_level = $options[ 'label_level' ];
                if ( isset( $options[ 'label_classname' ] ) ) $label_classname = $options[ 'label_classname' ];
                if ( isset( $options[ 'label_upbtn_remove' ] ) ) $label_upbtn_remove = $options[ 'label_upbtn_remove' ];
                if ( isset( $options[ 'label_upbtn_add' ] ) ) $label_upbtn_add = $options[ 'label_upbtn_add' ];
                
                //
                if ( isset( $options[ 'one_column' ] ) ) $one_column = $options[ 'one_column' ];
                
            }
            
            //level
            //Do not use "name" on <select>, because js may cause data to be empty and cannot be saved.
            $level_res = '<select class="uix-cmb__text--fullwidth uix-cmb__text--div--toggle__sel">';
            $level_res.= '<option value="">'.esc_html__( '-', 'uix-shortcodes' ).'</option>';
       
            if ( is_array( $project_custom_attrs ) && sizeof( $project_custom_attrs ) > 0 ) {

                
                //Parse JSON data from Editor
                foreach( $project_custom_attrs as $index => $value ) {


                    if ( is_array( $value ) && sizeof( $value ) > 0 ) {


                        //level 1
                        $level_res.= '<option value="'.esc_attr( $value[ 'id' ] ).'">'.esc_html( $value[ 'name' ] ).'</option>';
                        
                        //level 2
//                        $level_2_content = $value[ 'content' ];
//                        if ( is_array( $level_2_content ) && sizeof( $level_2_content ) > 0 ) {
//
//
//                            foreach( $level_2_content as $index => $value ) {
//                                $level_res.= '<option value="'.esc_attr( $value[ 'id' ] ).'">&nbsp;&nbsp;&nbsp;&nbsp;'.esc_html( $value[ 'name' ] ).'</option>'; 
//                            }
//
//                        }//endif $level_2_content

                    }//endif $value




                }//end foreach   
                
                
            }  
            $level_res .= '</select>';
            
			$temp = '

				<div class="uix-cmb__text--div uix-cmb__text--div--toggle {childstyle}">
                    <a href="javascript:void(0);" class="uix-cmb__text--div--toggle__trigger"><svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" role="img" aria-hidden="true" focusable="false"><path fill="none" d="M0 0h24v24H0V0z"></path><path d="M3 17v4h4l11-11-4-4L3 17zm3 2H5v-1l9-9 1 1-9 9zM21 6l-3-3h-1l-2 2 4 4 2-2V6z"></path></svg><span>{name}</span></a>
                    
                   <a href="javascript:void(0);" class="uix-cmb__custom-attributes-field__removebtn" title="'.esc_attr( $label_upbtn_remove ).'"><svg aria-hidden="true" role="img" focusable="false" class="dashicon dashicons-trash" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><path d="M12 4h3c.6 0 1 .4 1 1v1H3V5c0-.6.5-1 1-1h3c.2-1.1 1.3-2 2.5-2s2.3.9 2.5 2zM8 4h3c-.2-.6-.9-1-1.5-1S8.2 3.4 8 4zM4 7h11l-.9 10.1c0 .5-.5.9-1 .9H5.9c-.5 0-.9-.4-1-.9L4 7z"></path></svg></a>
                    
                    <div class="uix-cmb__text--div--toggle__div">
                    
                        
                        <label class="uix-cmb__text--row">
                            <p class="uix-cmb__description">
                                '.esc_html( $label_title ).'
                            </p>
                            <input class="uix-cmb__text--fullwidth uix-cmb__text--div--toggle__title" name="'.esc_attr( $id ).'_attrs_title[]" value="{name}"><span class="important2">*</span>
                        </label>

                    
                        <label class="uix-cmb__text--row">
                            <p class="uix-cmb__description">
                                '.esc_html( $label_id ).'
                            </p>
                            <input class="uix-cmb__text--fullwidth uix-cmb__text--div--toggle__id" name="'.esc_attr( $id ).'_attrs_id[]" value="{id}">
                        </label>
                        
                        
                        <label class="uix-cmb__text--row">
                            <p class="uix-cmb__description">
                                '.esc_html( $label_level ).'
                            </p>
                            <input type="hidden" class="uix-cmb__text--div--toggle__toggleSelect" name="'.esc_attr( $id ).'_attrs_level[]" value="{level}">
                            '.$level_res.'
                        </label>    

                         

                        <label class="uix-cmb__text--row">
                            <p class="uix-cmb__description">
                                '.esc_html( $label_classname ).'
                            </p>
                            <input class="uix-cmb__text--fullwidth" name="'.esc_attr( $id ).'_attrs_classname[]" value="{classname}">
                        </label>   
                        

                        
                        <label class="uix-cmb__text--row">
                            <p class="uix-cmb__description">
                                '.esc_html( $label_subtitle ).'
                            </p>

                            <div class="uix-cmb__mce-editor uix-cmb__mce-editor--multi" aria-init="0">

                               <textarea data-editor-toolbar="'.esc_attr( $editor_toolbar_teeny ).'" data-editor-height="'.esc_attr( $editor_height_teeny ).'" id="'.esc_attr( $id ).'-editor-sub-{id}" name="'.esc_attr( $id ).'_attrs_subtitle[]" >{subtitle}</textarea>

                            </div>   


                        </label>

                        
                        
                        <label class="uix-cmb__text--row">
                            <p class="uix-cmb__description">
                                '.esc_html( $label_value ).'
                            </p>

                            <div class="uix-cmb__mce-editor uix-cmb__mce-editor--multi" aria-init="0">

                               <textarea data-editor-toolbar="'.esc_attr( $editor_toolbar ).'" data-editor-height="'.esc_attr( $editor_height ).'" id="'.esc_attr( $id ).'-editor-{id}" name="'.esc_attr( $id ).'_attrs_value[]" >{value}</textarea>

                            </div>   


                        </label>
                    </div>
                    

				</div>
			';
			
	
			$temp_attr = str_replace( '{name}', esc_html__( 'Untitled', 'uix-shortcodes' ), 
						 str_replace( '{value}', '',  
                         str_replace( '{level}', '',
                         str_replace( '{subtitle}', '',
                         str_replace( '{classname}', '',
                         str_replace( '{childstyle}', '',        
						 $temp 
						))))));

		?>
		
            <?php if ( $enable_table ) : ?>
			<tr>
				<th colspan="2">
            <?php endif; ?>	
                    
                    
					<!-- Begin Fields -->
					<div class="uix-cmb__wrapper uix-cmb__custom-attributes-field <?php echo esc_attr( $one_column? 'uix-cmb__wrapper--one-column' : '' ); ?>" data-append-id="<?php echo esc_attr( $id ); ?>_append" data-tmpl='<?php echo esc_attr( $temp_attr ); ?>'>
					

                        <?php if ( ! $one_column ) : ?>
                 
						<table class="form-table uix-cmb">


							<tr>
								<th class="uix-cmb__title">
									<label><?php echo UixShortcodes::kses( $title ); ?></label>
									<?php if ( !empty ( $desc ) ) { ?>
										<p class="uix-cmb__title_desc"><?php echo UixShortcodes::kses( $desc ); ?></p>
									<?php } ?>
								</th>
								<td>  
                                    
                        <?php else: ?>	    
                                    
                            <label><?php echo UixShortcodes::kses( $title ); ?></label>
                            <?php if ( !empty ( $desc ) ) { ?>
                                <p class="uix-cmb__title_desc"><?php echo UixShortcodes::kses( $desc ); ?></p>
                            <?php } ?> 
                        
                        <?php endif; ?>	
                                    
									<?php
									if ( is_array( $project_custom_attrs ) && sizeof( $project_custom_attrs ) > 0 ) {

                                   
                                        //Parse JSON data from Editor
										foreach( $project_custom_attrs as $index => $value ) {
                                            

                                            if ( is_array( $value ) && sizeof( $value ) > 0 ) {
                                                
                                                
                                                //level 1
                                                echo str_replace( '{name}', esc_attr( self::parse_json_data_from_editor( $value[ 'name' ] ) ), 
                                                             str_replace( '{value}', esc_textarea( self::parse_json_data_from_editor( $value[ 'value' ] ) ),
                                                             str_replace( '{id}', esc_attr( self::parse_json_data_from_editor( $value[ 'id' ] ) ),
                                                             str_replace( '{level}', esc_attr( self::parse_json_data_from_editor( $value[ 'level' ] ) ),
                                                             str_replace( '{subtitle}', esc_textarea( self::parse_json_data_from_editor( $value[ 'subtitle' ] ) ),
                                                             str_replace( '{classname}', esc_attr( self::parse_json_data_from_editor( $value[ 'classname' ] ) ), 
                                                             str_replace( '{childstyle}', '', 
                                                             $temp 
                                                            )))))));        
                                                
                                                
                                                //level 2
                                                $level_2_content = $value[ 'content' ];
                                                if ( is_array( $level_2_content ) && sizeof( $level_2_content ) > 0 ) {
                                                    
                                                    
                                                    foreach( $level_2_content as $index => $value ) {
                                                        echo str_replace( '{name}', esc_attr( self::parse_json_data_from_editor( $value[ 'name' ] ) ), 
                                                                     str_replace( '{value}', esc_textarea( self::parse_json_data_from_editor( $value[ 'value' ] ) ),
                                                                     str_replace( '{id}', esc_attr( self::parse_json_data_from_editor( $value[ 'id' ] ) ),
                                                                     str_replace( '{level}', esc_attr( self::parse_json_data_from_editor( $value[ 'level' ] ) ),
                                                                     str_replace( '{subtitle}', esc_textarea( self::parse_json_data_from_editor( $value[ 'subtitle' ] ) ),
                                                                     str_replace( '{classname}', esc_attr( self::parse_json_data_from_editor( $value[ 'classname' ] ) ), 
                                                                     str_replace( '{childstyle}', 'uix-cmb__text--div--toggle--child',        
                                                                     $temp 
                                                                    )))))));        
                                                    }
                                                    
      
                                                    
                                                }//endif $level_2_content
                                                    
                                            }//endif $value
                                            

                                           
	
										}//end foreach
									} 
									?> 

									<div class="uix-cmb__custom-attributes-field__append__wrapper" id="<?php echo esc_attr( $id ); ?>_append"></div>   
                                    
                                    <div class="uix-cmb__custom-attributes-field__addbtn__wrapper">
                                         <a href="javascript:void(0);" class="uix-cmb__custom-attributes-field__addbtn"><svg aria-hidden="true" role="img" focusable="false" class="dashicon dashicons-insert" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><path d="M10 1c-5 0-9 4-9 9s4 9 9 9 9-4 9-9-4-9-9-9zm0 16c-3.9 0-7-3.1-7-7s3.1-7 7-7 7 3.1 7 7-3.1 7-7 7zm1-11H9v3H6v2h3v3h2v-3h3V9h-3V6z"></path></svg><?php echo esc_html( $label_upbtn_add ); ?></a>
                                    </div>
                                    
                                    


								</td>
							</tr>	


						</table>
					</div>
					<!-- End Fields -->
				
					<?php if ( !empty ( $desc_primary ) ) { ?>
						<p class="uix-cmb__description"><?php echo UixShortcodes::kses( $desc_primary ); ?></p>
					<?php } ?>
				
				
					
            <?php if ( $enable_table ) : ?>
				</th>
			</tr>
            <?php endif; ?>

		<?php	
		}		
		
        
		/**
		* Field Type: Multiple Portfolio Area
		*
		* @print: 
            
            <?php
            $lightbox_enable = NULL;
            
            $_data = json_decode( get_post_meta( get_the_ID(), 'uix_themeplugin_multiworks', true ), true );

            if ( is_array( $_data ) && sizeof( $_data ) > 1 ) {

                //----------
                foreach( $_data as $index => $value ) {
                    if ( is_array( $value ) && sizeof( $value ) > 0 ) {

                        //Exclude lightbox fields
                        if ( array_key_exists( 'lightbox', $value ) ) {
                            $lightbox_enable = esc_attr( Uix_Custom_Metaboxes::parse_json_data_from_editor( $value[ 'lightbox' ] ) );
                            break;
                        }//endif array_key_exists( 'lightbox', $value )
                    }//endif $value
                }//end foreach      


                //----------
                foreach( $_data as $index => $value ) {

                    if ( is_array( $value ) && sizeof( $value ) > 0 ) {
                        //Exclude lightbox fields
                        if ( ! array_key_exists( 'lightbox', $value ) ) {

                    ?>
                        <div class="uix-portfolio-type-<?php echo esc_attr( Uix_Custom_Metaboxes::parse_json_data_from_editor( $value[ 'type' ] ) ); ?>">

                            <?php
                            $img_url = Uix_Custom_Metaboxes::parse_json_data_from_editor( $value[ 'filePath' ] );

                            if ( !empty( $img_url ) ) {
                                echo '<img src="'.esc_url( $img_url ).'" alt="" '.( $lightbox_enable == 'on' ? 'class="lightbox"' : '' ).'>';
                            }
                            ?>

                            <?php echo UixShortcodes::kses( Uix_Custom_Metaboxes::parse_json_data_from_editor( $value[ 'value' ] ) ); ?>

                        </div>     
                    <?php
                    
                        }//endif array_key_exists( 'lightbox', $value )

                    }//endif $value


                }//end foreach   

            }    

            ?>    
            
       
	
	    *
		*/
											
        
		public static function addfield_multi_portfolio( $id, $title, $desc, $default, $options = '', $placeholder = '', $desc_primary = '', $enable_table = false ) {
            
     
            //---
			$project_custom_attrs = json_decode( $default, true );
			$label_type           = array( 
                                        'file' => esc_html__( 'Files', 'uix-shortcodes' ),
                                        'html' => esc_html__( 'Text', 'uix-shortcodes' )
                                    );
			$label_html           = esc_html__( 'Custom Content', 'uix-shortcodes' );
            $label_file           = esc_html__( 'Upload Your Files', 'uix-shortcodes' );
            $label_upbtn_remove   = esc_html__( 'Remove', 'uix-shortcodes' );
            $label_upbtn_add_file = esc_html__( 'Add Files', 'uix-shortcodes' );
            $label_upbtn_add_html = esc_html__( 'Add Text', 'uix-shortcodes' );

            //upload
            $label_controller_up_remove   = esc_attr__( 'Remove', 'uix-shortcodes' );
            $label_controller_up_add      = esc_html__( 'Select image or video', 'uix-shortcodes' );
            
            //lightbox
            $label_lightbox = esc_html__( 'Enable Lightbox for this gallery?', 'uix-shortcodes' );
                
            //Use only one column as a separate module
            $one_column = false;

          
            //editor options
            $editor_toolbar = 'formatselect fontselect forecolor backcolor bold italic underline strikethrough bullist numlist blockquote code alignleft aligncenter alignright uix_link uix_unlink | removeformat outdent indent superscript subscript hr uix_image uix_highlightcode media customCode fullscreen';
            
            $editor_height = 200;
            
            
            //---
            if ( is_array ( $options ) ) {
                if ( isset( $options[ 'editor_toolbar' ] ) ) $editor_toolbar = $options[ 'editor_toolbar' ];
                if ( isset( $options[ 'editor_height' ] ) ) $editor_height = $options[ 'editor_height' ];
                if ( isset( $options[ 'label_type' ] ) ) $label_type = $options[ 'label_type' ];
                if ( isset( $options[ 'label_html' ] ) ) $label_html = $options[ 'label_html' ];
                if ( isset( $options[ 'label_file' ] ) ) $label_file = $options[ 'label_file' ];
                if ( isset( $options[ 'label_upbtn_remove' ] ) ) $label_upbtn_remove = $options[ 'label_upbtn_remove' ];
                if ( isset( $options[ 'label_upbtn_add_file' ] ) ) $label_upbtn_add_file = $options[ 'label_upbtn_add_file' ];
                if ( isset( $options[ 'label_upbtn_add_html' ] ) ) $label_upbtn_add_html = $options[ 'label_upbtn_add_html' ];
                if ( isset( $options[ 'label_controller_up_remove' ] ) ) $label_controller_up_remove = $options[ 'label_controller_up_remove' ];
                if ( isset( $options[ 'label_controller_up_add' ] ) ) $label_controller_up_add = $options[ 'label_controller_up_add' ]; 
                if ( isset( $options[ 'label_lightbox' ] ) ) $label_lightbox = $options[ 'label_lightbox' ]; 
                
                //
                if ( isset( $options[ 'one_column' ] ) ) $one_column = $options[ 'one_column' ];
         
                
            }
            

            //type
            //Do not use "name" on <select>, because js may cause data to be empty and cannot be saved.
            $type_res = '<select class="uix-cmb__text--fullwidth uix-cmb__text--div--toggle__simple-sel">';
            if ( is_array( $label_type ) && sizeof( $label_type ) > 0 ) {
                $i = 0;
                foreach( $label_type as $index => $value ) {
                    $checked = ( $i == 0 ) ? 'selected' : '';
                    $type_res .= '<option value="'.esc_attr( $index ).'" '.$checked.'>'.esc_html( $value ).'</option>'; 
                    
                    $i++;
                }
            }//endif $label_type       
            $type_res .= '</select>';
   
            
            //level
			$temp = '

				<div class="uix-cmb__text--div uix-cmb__text--div--toggle uix-cmb__text--div--toggle--sortable">
                    <a href="javascript:void(0);" class="uix-cmb__text--div--toggle__trigger"><svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" role="img" aria-hidden="true" focusable="false"><path fill="none" d="M0 0h24v24H0V0z"></path><path d="M3 17v4h4l11-11-4-4L3 17zm3 2H5v-1l9-9 1 1-9 9zM21 6l-3-3h-1l-2 2 4 4 2-2V6z"></path></svg><span>{type}</span></a>
                    
                    <a href="javascript:void(0);" class="uix-cmb__custom-attributes-field__sortablebtn">
                      <svg width="15" height="15" aria-hidden="true" role="img" focusable="false" class="dashicon dashicons-trash" viewBox="0 0 51 58"xmlns="http://www.w3.org/2000/svg"><g fill="rgb(0,0,0)" fill-rule="nonzero" transform="translate(0 -1)"><path id="Shape" d="m25.9969 20h6v33c0 .5522847.4477153 1 1 1h10c.5522847 0 1-.4477153 1-1v-33h6c.3708398.002689.7118642-.2028062.8827573-.5319337s.1427857-.7262873-.0727573-1.0280663l-11.97-17.03c-.1884296-.25921249-.4895366-.41258597-.81-.41258597s-.6215704.15337348-.81.41258597l-3.12 4.42-6.93 9.81-1.98 2.8c-.215543.301779-.2436504.6989388-.0727573 1.0280663s.5119175.5346227.8827573.5319337z"/><path id="Shape" d="m2.1731 44.3575 6.93 9.81 3.12 4.42c.1884555.2591733.4895531.4125159.81.4125159s.6215445-.1533426.81-.4125159l11.97-17.03c.215543-.301779.2436504-.6989388.0727573-1.0280663s-.5119175-.5346227-.8827573-.5319337h-6v-32.9975c0-.55228475-.4477153-1-1-1h-10c-.55228475 0-1 .44771525-1 1v32.9975h-6c-.37083976-.002689-.71186417.2028062-.88275728.5319337-.17089312.3291275-.14278572.7262873.07275728 1.0280663z"/></g></svg>
                    </a>
                    
                   <a href="javascript:void(0);" class="uix-cmb__custom-attributes-field__removebtn" title="'.esc_attr( $label_upbtn_remove ).'"><svg aria-hidden="true" role="img" focusable="false" class="dashicon dashicons-trash" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><path d="M12 4h3c.6 0 1 .4 1 1v1H3V5c0-.6.5-1 1-1h3c.2-1.1 1.3-2 2.5-2s2.3.9 2.5 2zM8 4h3c-.2-.6-.9-1-1.5-1S8.2 3.4 8 4zM4 7h11l-.9 10.1c0 .5-.5.9-1 .9H5.9c-.5 0-.9-.4-1-.9L4 7z"></path></svg></a>
                    
                    <div class="uix-cmb__text--div--toggle__div">
                    
                        
                        <label class="uix-cmb__text--row" style="display:none;">
                            <input type="hidden" name="'.esc_attr( $id ).'_attrs_type[]" value="{type}">
                            '.$type_res.'
                        </label>    
                        

                    
                        <label class="uix-cmb__text--row" data-type="file">
                            <p class="uix-cmb__description">
                                '.esc_html( $label_file ).'
                            </p>
                            <div class="uix-cmb__upload-wrapper">
                                '.Uix_UploadMedia::add( array(
                                    'title'          => '',
                                    'child'          => true,
                                    'id'             => esc_attr( $id ).'_attrs_file-{id}',
                                    'name'           => esc_attr( $id ).'_attrs_file[]',
                                    'value'          => '{filePath}',
                                    'label_remove'   => esc_attr( $label_controller_up_remove ),
                                    'label_add'      => esc_html( $label_controller_up_add ),
                                ), false ).'
                            </div>  

                        </label>                        
                        
                        
                        <label class="uix-cmb__text--row" data-type="html">
                            <p class="uix-cmb__description">
                                '.esc_html( $label_html ).'
                            </p>

                            <div class="uix-cmb__mce-editor uix-cmb__mce-editor--multi" aria-init="0">

                               <textarea data-editor-toolbar="'.esc_attr( $editor_toolbar ).'" data-editor-height="'.esc_attr( $editor_height ).'" id="'.esc_attr( $id ).'-editor-{id}" name="'.esc_attr( $id ).'_attrs_value[]" >{value}</textarea>

                            </div>   


                        </label>
                    </div>
                    

				</div>
			';
			
	
			$temp_attr = str_replace( '{type}', '', 
                         str_replace( '{value}', '',  
                         str_replace( '{filePath}', '',     
						 $temp 
						)));

		?>
		
            <?php if ( $enable_table ) : ?>
			<tr>
				<th colspan="2">
            <?php endif; ?>	
                    
                    
					<!-- Begin Fields -->
					<div class="uix-cmb__wrapper uix-cmb__custom-attributes-field <?php echo esc_attr( $one_column? 'uix-cmb__wrapper--one-column' : '' ); ?>" data-append-id="<?php echo esc_attr( $id ); ?>_append" data-tmpl='<?php echo esc_attr( $temp_attr ); ?>'>
					

                        <?php if ( ! $one_column ) : ?>
                 
						<table class="form-table uix-cmb">


							<tr>
								<th class="uix-cmb__title">
									<label><?php echo UixShortcodes::kses( $title ); ?></label>
									<?php if ( !empty ( $desc ) ) { ?>
										<p class="uix-cmb__title_desc"><?php echo UixShortcodes::kses( $desc ); ?></p>
									<?php } ?>
								</th>
								<td>  
                                    
                        <?php else: ?>	    
                                    
                            <label><?php echo UixShortcodes::kses( $title ); ?></label>
                            <?php if ( !empty ( $desc ) ) { ?>
                                <p class="uix-cmb__title_desc"><?php echo UixShortcodes::kses( $desc ); ?></p>
                            <?php } ?> 
                        
                        <?php endif; ?>	
                                    
                                    
                          
									<?php
            
                                    $lightbox_enable = NULL;
                                    $item_code = '';
									if ( is_array( $project_custom_attrs ) && sizeof( $project_custom_attrs ) > 0 ) {

                                   
                                        //Parse JSON data from Editor
										foreach( $project_custom_attrs as $value ) {
                                            
                                            if ( is_array( $value ) && sizeof( $value ) > 0 ) { 
                                                
                                                
                                                //Exclude lightbox fields
                                                if ( array_key_exists( 'lightbox', $value ) ) {
                                                    $lightbox_enable = esc_attr( self::parse_json_data_from_editor( $value[ 'lightbox' ] ) );
                                                } else {
                                                    $item_code .= str_replace( '{type}', esc_attr( self::parse_json_data_from_editor( $value[ 'type' ] ) ),
                                                                 str_replace( '{id}', uniqid(),
                                                                 str_replace( '{value}', esc_textarea( self::parse_json_data_from_editor( $value[ 'value' ] ) ),
                                                                 str_replace( '{filePath}', esc_textarea( self::parse_json_data_from_editor( $value[ 'filePath' ] ) ),
                                                                 $temp 
                                                                ))));    
                                                }
          
                                            }
                                            

										}//end foreach
									} 
									?> 
 
                                    
                                    
                                    <div class="uix-cmb__checkbox-selector" <?php echo ( empty( $label_lightbox ) || $label_lightbox === false ? 'style="display: none;"' : '' ); ?>>

                                        <label>
                                            <input type="checkbox" value="on" name="<?php echo esc_attr( $id ); ?>_lightbox" <?php checked( 'on', $lightbox_enable ); ?>> 
                                            <?php if ( !empty ( $label_lightbox ) ) { ?>
                                                <span class="uix-cmb__description"><?php echo esc_html( $label_lightbox ); ?></span>
                                            <?php } ?>

                                        </label>

                                    </div>
                                    <?php echo ( empty( $label_lightbox ) || $label_lightbox === false ? '' : '<br>' ); ?>
                                    
                                    
                                    <?php echo $item_code; ?>
                                    
                                    
									<div class="uix-cmb__custom-attributes-field__append__wrapper" id="<?php echo esc_attr( $id ); ?>_append"></div>   
                                    
                                    <div class="uix-cmb__custom-attributes-field__addbtn__wrapper uix-cmb__custom-attributes-field__addbtn__wrapper--multi">
                                         <a href="javascript:void(0);" class="uix-cmb__custom-attributes-field__addbtn uix-cmb__custom-attributes-field__addbtn--multi" data-type="file">
                                             <svg xmlns="http://www.w3.org/2000/svg" role="img" aria-hidden="true" focusable="false" x="0px" y="0px" viewBox="0 0 426.667 426.667"><g><path d="M42.667,85.333H0V384c0,23.573,19.093,42.667,42.667,42.667h298.667V384H42.667V85.333z"/><path d="M384,0H128c-23.573,0-42.667,19.093-42.667,42.667v256c0,23.573,19.093,42.667,42.667,42.667h256
				c23.573,0,42.667-19.093,42.667-42.667v-256C426.667,19.093,407.573,0,384,0z M128,298.667l64-85.333l43.307,57.813L298.667,192
				L384,298.667H128z"/></g></svg>
                                             
                                            <span><?php echo esc_html( $label_upbtn_add_file ); ?></span>
                                        </a>
                                        
                                         <a href="javascript:void(0);" class="uix-cmb__custom-attributes-field__addbtn uix-cmb__custom-attributes-field__addbtn--multi" data-type="html">
                                             <svg aria-hidden="true" role="img" focusable="false" class="dashicon dashicons-insert" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><path class="cls-1" d="M1004.97,692.007a0.97,0.97,0,0,1-1.03,1.025H992.056a0.968,0.968,0,0,1-1.025-1.025h-1.024v5.021h1.024a0.919,0.919,0,0,1,.923-0.922h4.1v9.837a0.968,0.968,0,0,1-1.025,1.025v1.025h5.942v-1.025a0.969,0.969,0,0,1-1.023-1.025v-9.837h3.993a0.97,0.97,0,0,1,1.03,1.025h1.02v-5.124h-1.02Z" transform="translate(-990 -692)"></path></svg>
                                            <span><?php echo esc_html( $label_upbtn_add_html ); ?></span>
                                        </a> 
                                    </div>
                                    
                                    

                        <?php if ( ! $one_column ) : ?>
								</td>
							</tr>	


						</table>
                        <?php endif; ?>	


					</div>
					<!-- End Fields -->
				
					<?php if ( !empty ( $desc_primary ) ) { ?>
						<p class="uix-cmb__description"><?php echo UixShortcodes::kses( $desc_primary ); ?></p>
					<?php } ?>
				
				
					
            <?php if ( $enable_table ) : ?>
				</th>
			</tr>
            <?php endif; ?>

		<?php	
		}		
		  
        
        
        
	
        //////
	}

}


