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
		
		  if ( UixShortcodes::is_gutenberg_page() ) {


				wp_register_script( 'uix_shortcodes_block_handle', UixShortcodes::plug_directory() .'includes/admin/assets/js/block.min.js', array( 'jquery', 'uixscform' ), UixShortcodes::ver(), true );


				$curid      = get_the_ID();
				$post_id    = empty( $curid ) ? $_GET['post_id'] : $curid;


				$translation_array = array(
					'send_string_plugin_url'       => UixShortcodes::plug_directory(),
					'send_string_postid'           => $post_id
				);


				wp_localize_script( 'uix_shortcodes_block_handle', 'uix_shortcodes_block_vars', $translation_array );

				// Enqueued script with localized data.
				wp_enqueue_script( 'uix_shortcodes_block_handle' );


				//jQuery Accessible Tabs
				wp_enqueue_script( 'accTabs', UixShortcodes::plug_directory() .'includes/admin/assets/js/jquery.accTabs.js', array( 'jquery' ), '0.1.1', true );


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
 * Display the block, Enable gutenberg settings for Uix Shortcodes
 * 
 */
if ( !function_exists( 'uix_shortcodes_block' ) ) {
	
	add_action( 'admin_footer', 'uix_shortcodes_block' );  
	function uix_shortcodes_block() {  
		
		 if ( UixShortcodes::is_gutenberg_page() ) {
		
    ?>
 
	<script>
	// block.js
	( function( blocks, components, element ) {
		var el     = element.createElement,
			source = blocks.source;


	
		var btnStyle     = { backgroundColor: '#7AD03A', color: '#fff', borderColor: '#5EB83C', textAlign: 'center', fontFamily: 'Helvetica, Arial' },
			btnClassName = 'button uix-shortcodes-open-btn';

		blocks.registerBlockType( 'myplugin/block-uix-shortcodes', {
			title: '<?php echo esc_attr__( 'Add Uix Shortcodes', 'uix-shortcodes' ); ?>',

			icon: 'editor-code',

			category: 'common',

			attributes: {
				firstMeta_3: {
					type: 'string'
				}
			},



			edit: function( props ) {
				var children = [],
					cid      = 'js-cur-' + props.id;


				children.push(
					el( 'a', 
					   { 
							style     : btnStyle, 
							className : btnClassName,
							href      : 'javascript:void(0)',
							id        : cid
						}, 
					'<?php echo esc_attr__( '[ / ] Add Uix Shortodes', 'uix-shortcodes' ); ?>' )
				);


				var _val    = props.attributes.firstMeta_3,
					_valNew = jQuery( '[data-block-id="' + cid +'"]' ).attr( 'data-block-value' );


				function onChangeValue( newValue ) {
					//console.log( _valNew );
					props.setAttributes( { firstMeta_3: newValue } );
				}

				//default value here
				if ( typeof _val == typeof undefined ) {
					_val = '';
				} 
				if ( typeof _valNew != typeof undefined ) {
					_val = _valNew;

					//Get the new value that the textarea already exists
					onChangeValue( _val );
				} 

				//Trigger the value change of the textarea
				jQuery( document ).on( 'click', '#js-cur-' + props.id, function() {
					onChangeValue( _val );
				});
				jQuery( document ).off( 'click.UIXSC_FORMPOP_INSERT' ).on( 'click.UIXSC_FORMPOP_INSERT', '.uixscform-modal-save-btn', function() {
					onChangeValue( _val );
				});			

				children.push(
					el(
						components.TextareaControl,
						{
							onChange: onChangeValue,
							value: _val,
							rows  : 3,
							label: 'Shortcode'
						}
					)
				);



				return el( 'div', { }, children );
			},


			save: function( props ) {
				// Rendering in PHP
				return el( 'div', { }, props.attributes.firstMeta_3 );
			}

		} );


	} )(
		window.wp.blocks,
		window.wp.components,
		window.wp.element
	);

	</script>

        
        
<?php  
			  
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
		
		 if ( UixShortcodes::is_gutenberg_page() ) {
			 
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
