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
	var el                = wp.element.createElement,
		Fragment          = wp.element.Fragment,
		registerBlockType = wp.blocks.registerBlockType,
		RichText          = wp.editor.RichText,
		BlockControls     = wp.editor.BlockControls,
		AlignmentToolbar  = wp.editor.AlignmentToolbar,
		BlockSelector     = 'div',
		btnStyle          = { 
			backgroundColor: '#7AD03A', 
			color: '#fff', 
			borderColor: '#5EB83C', 
			textAlign: 'center', 
			fontFamily: 'Helvetica, Arial' 
		},
		btnClassName      = 'button uix-shortcodes-open-btn';

	/**
	 * A custom SVG path taken from fontastic
	*/
	var mupluginIcon = el( 'svg', { width: 24, height: 24, viewBox: '0 0 18 18' },
	  el('path', { d: "M0 1v14h16v-14h-16zM15 14h-14v-12h14v12zM14 3h-12v10h12v-10zM7 8h-1v1h-1v1h-1v-1h1v-1h1v-1h-1v-1h-1v-1h1v1h1v1h1v1zM11 10h-3v-1h3v1z", fill: '#74D053' } )
	);

		
		

	registerBlockType( 'myplugin/block-uix-shortcodes', {
		title: '<?php echo esc_attr__( 'Add Uix Shortcodes', 'uix-shortcodes' ); ?>',

		icon: mupluginIcon,

		category: 'common',

		attributes: {
			customMeta_text: {
				type: 'string',
				source: 'html',
				selector: BlockSelector,
			},
			//ID will be passed to the background for use
			cid: {
				type: 'string',
			},
			alignment: {
				type: 'string',
			}
		},

		edit: function( props ) {
			var content    = props.attributes.customMeta_text,
				alignment  = props.attributes.alignment,
				cid        = 'js-cur-' + props.clientId;

			//Update the ID after loaded blocks
			props.setAttributes( { 
				cid            : props.clientId
			} );

			
			function onChangeContent( newContent ) {
				props.setAttributes( { 
					customMeta_text: newContent,
					cid            : props.clientId
				} );
			}

			function onChangeAlignment( newAlignment ) {
				props.setAttributes( { alignment: newAlignment } );
			}
			


			return (
				el(
					Fragment,
					null,
					el(
						BlockControls,
						null,
						el(
							AlignmentToolbar,
							{
								value: alignment,
								onChange: onChangeAlignment
							}
						)
					),

					el( 'a', 
					   { 
							style     : btnStyle, 
							className : btnClassName,
							href      : 'javascript:void(0)',
							id        : cid
						}, 
					'<?php echo esc_attr__( '[ / ] Add Uix Shortodes', 'uix-shortcodes' ); ?>' ),

					el(
						RichText,
						{
							key             : 'editable',
							tagName         : BlockSelector,
							className       : props.className + ' cid-' + cid,
							style           : { textAlign: alignment },
							onChange        : onChangeContent,
							value           : content
						}
					)
				)
			);
		},

		save: function( props ) {
			// Rendering in PHP
			
			var content   = props.attributes.customMeta_text,
				alignment = props.attributes.alignment,
				newVal    = content;
			
		
			//Trigger the saving of empty data
			//Solve the problem of data being pushed to the back end of the 
			//rich text editor to save null values
			if ( typeof content === typeof undefined ) {
				newVal = '&nbsp;';
			}
	
			
			newVal = newVal.replace(/<br\s*[\/]?>/gi, '[br]' );

			return el( RichText.Content, {
				tagName         : BlockSelector,
				className       : props.className,
				style           : { textAlign: alignment },
				value           : newVal,
				cid             : props.attributes.cid  //ID will be passed to the background for use
			} );

		}
	} );	


	
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
