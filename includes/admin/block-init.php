<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; 
}


/*
 * Enqueue scripts and styles of block
 * 
 */
if ( !function_exists( 'uix_shortcodes_block_script' ) ) {
	add_action( 'admin_enqueue_scripts', 'uix_shortcodes_block_script' );
	function uix_shortcodes_block_script() {
		
		  if ( UixShortcodes::is_gutenberg_plug_page() ) {


				wp_register_script( 'uix_shortcodes_block_handle', UixShortcodes::plug_directory() .'includes/admin/assets/js/block.min.js', array( 'jquery', 'uixscform', 'wp-block-library' ), UixShortcodes::ver(), true );


				$curid      = get_the_ID();
				$post_id    = empty( $curid ) && isset( $_GET['post_id'] ) ? $_GET['post_id'] : $curid;


				$translation_array = array(
					'send_string_plugin_url'       => UixShortcodes::plug_directory(),
					'send_string_postid'           => $post_id,
					'send_string_block_title'       => esc_attr__( 'Uix Shortcodes', 'uix-shortcodes' ),
					'send_string_block_btn_title'   => esc_attr__( '[ / ] Click here to add shortode', 'uix-shortcodes' )
				);


				wp_localize_script( 'uix_shortcodes_block_handle', 'uix_shortcodes_block_vars', $translation_array );

				// Enqueued script with localized data.
				wp_enqueue_script( 'uix_shortcodes_block_handle' );


				//Main
				wp_enqueue_style( UixShortcodes::PREFIX . '-shortcodes-block-admin', UixShortcodes::plug_directory() .'includes/admin/assets/css/block.min.css', false, UixShortcodes::ver(), 'all' );
				//RTL		
				if ( is_rtl() ) {
					wp_enqueue_style( UixShortcodes::PREFIX . '-shortcodes-block-admin-rtl', UixShortcodes::plug_directory() .'includes/admin/assets/css/block.min-rtl.css', false, UixShortcodes::ver(), 'all' );
				}


		  } 
			
	}
}



/*
 * List buttons of shortcode modules in admin panel
 * 
 */
if ( !function_exists( 'uix_shortcodes_modules' ) ) {
	
	add_action( 'admin_footer', 'uix_shortcodes_modules' );  
	function uix_shortcodes_modules() {  
		
		 if ( UixShortcodes::is_gutenberg_plug_page() ) {
			 
			  include UixShortcodes::templates_panel_directory( true ) . 'config.php';

			  $thumbs_folder = UixShortcodes::templates_panel_directory( true ) . 'thumbs';
			  $thumbs_URL    = UixShortcodes::templates_panel_directory_URL( true ) . 'thumbs';
			 
			 
			 if ( is_dir( $thumbs_folder ) ) {
				 

				//Output the shortcode modules
				$btns = '<div class="uix-shortcodes-block-col-tabs">';

				foreach ( $uix_sc_modules_config as $v ) {

					if ( !empty( $v[ 'sortname' ] ) ) {


						$btns .= '<h3>'.$v[ 'sortname' ].'</h3><div>';

						foreach ( $v[ 'modules' ] as $key ) {

							if ( !empty( $key[ 'id' ] ) ) {
								$keyid  = str_replace( '.php', '', $key[ 'id' ] );

								//If there is no image in the theme directory, then switch to the plugin directory
								$imgsrc     = $thumbs_URL . '/' .$key[ 'thumb' ];

								if ( !file_exists( $thumbs_folder . '/' .$key[ 'thumb' ] ) ) {
									$imgsrc = $thumbs_URL . '/_none.png';
								}

							
								$btns .= "<div class=\"uix-shortcodes-block-col\"><a class=\"mce-uix-widget-btn mce-".$keyid."-widget_btn\" data-slug=\"".$keyid."\" data-name=\"".esc_attr( $key[ 'title' ] )."\" href=\"javascript:\"><span class=\"t\">".$key[ 'title' ]."</span><span class=\"img\"><img src=\"".esc_url( $imgsrc )."\" alt=\"".esc_attr( $key[ 'title' ] )."\"></span></a></div>";

							}


						}		

						$btns .= '</div>';



					}


				}

				$btns .= '</div>';

				 
				echo '<div class="uixscform-modal-box uixscform-modal-box-elementsselector" id="uix_sc_blocks_selector"><a href="javascript:void(0)" class="close-btn close-uixscform-modal">&times;</a><div class="content"><h2>'.__( 'Choose Shortcode You Want', 'uix-shortcodes' ).'</h2>'.$btns.'</div></div>';
		
			 }
			 
		  }
	}  
}
