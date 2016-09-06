<?php
/**
 * Uix Shortcodes
 *
 * @author UIUX Lab <uiuxlab@gmail.com>
 *
 *
 * Plugin name: Uix Shortcodes
 * Plugin URI:  https://uiux.cc/wp-plugins/uix-shortcodes/
 * Description: Uix Shortcodes brings an amazing set of beautiful and useful elements to your site that lets you do nifty things with very little effort.
 * Version:     1.0.2
 * Author:      UIUX Lab
 * Author URI:  https://uiux.cc
 * License:     GPLv2 or later
 * Text Domain: uix-shortcodes
 * Domain Path: /languages
 */
			
class UixShortcodes {

	const PREFIX   = 'uix';
	const CUSPAGE = 'uix-shortcodes-custom-submenu-page';
	

	/**
	 * Holds plugin data
	 *
	 */
	protected static $data;
	

	
	
	/**
	 * Initialize
	 *
	 */
	public static function init() {
		
		
        add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), array( __CLASS__, 'actions_links' ), -10 );
		add_action( 'admin_enqueue_scripts', array( __CLASS__, 'backstage_scripts' ), 999 );
		add_action( 'wp_enqueue_scripts', array( __CLASS__, 'frontpage_scripts' ) );
		add_action( 'wp_enqueue_scripts', array( __CLASS__, 'print_custom_stylesheet' ) );
		add_action( 'current_screen', array( __CLASS__, 'do_register_shortcodes' ) );
		add_action( 'admin_init', array( __CLASS__, 'tc_i18n' ) );
		add_action( 'admin_init', array( __CLASS__, 'load_form_core' ) );
		add_action( 'admin_init', array( __CLASS__, 'load_helper' ) );
		add_action( 'admin_menu', array( __CLASS__, 'options_admin_menu' ) );
		add_action( 'wp_head', array( __CLASS__, 'do_my_shortcodes' ) );
		add_filter( 'body_class', array( __CLASS__, 'new_class' ) );
		add_filter( 'mce_css', array( __CLASS__, 'mce_css' ) );
		
		
	}

	
	
	/*
	 * Enqueue scripts and styles.
	 *
	 *
	 */
	public static function frontpage_scripts() {
		

		
		//Add Icons
		wp_enqueue_style( 'font-awesome', self::plug_directory() .'assets/add-ons/fontawesome/font-awesome.css', array(), '4.5.0', 'all');
		wp_enqueue_style( 'flaticon', self::plug_directory() .'assets/add-ons/flaticon/flaticon.css', array(), '1.0', 'all');
	
	
		// Shuffle
		wp_enqueue_script( 'shuffle', self::plug_directory() .'assets/add-ons/shuffle/jquery.shuffle.js', array( 'jquery' ), '3.1.1', true );
		
		// Shuffle.js requires Modernizr..
		wp_enqueue_script( 'modernizr', self::plug_directory() .'assets/add-ons/HTML5/modernizr.min.js', false, '3.3.1', false );
			
		// Easing
		wp_enqueue_script( 'jquery-easing', self::plug_directory() .'assets/add-ons/easing/jquery.easing.js', array( 'jquery' ), '1.3', false );	


		// imagesloaded
		wp_enqueue_script( 'imagesloaded', self::plug_directory() .'assets/add-ons/preload/imagesloaded.min.js', array( 'jquery' ), '4.1.0', true );	

		//Easy Pie Chart
		wp_enqueue_script( 'easypiechart', self::plug_directory() .'assets/add-ons/piechart/jquery.easypiechart.min.js', array( 'jquery' ), '2.1.7', true );

		//flexslider
		wp_enqueue_script( 'flexslider', self::plug_directory() .'assets/add-ons/flexslider/jquery.flexslider.min.js', array( 'jquery' ), '2.5.0', true );	
		wp_enqueue_style( 'flexslider', self::plug_directory() .'assets/add-ons/flexslider/flexslider.css', false, '2.5.0', 'all' );
		
		// prettyPhoto
		wp_enqueue_script( 'prettyPhoto', self::plug_directory() .'assets/add-ons/prettyPhoto/jquery.prettyPhoto.js', array( 'jquery' ), '3.1.5', true );
		wp_enqueue_style( 'prettyPhoto', self::plug_directory() .'assets/add-ons/prettyPhoto/jquery.prettyPhoto.css', false, '3.1.5', 'all');
				
		// SyntaxHighlighter
		wp_enqueue_script( 'syntaxhighlighter-core', self::plug_directory() .'assets/add-ons/syntaxhighlighter/scripts/shCore.js', false, '3.0.83', true );
		wp_enqueue_script( 'syntaxhighlighter-autoloader', self::plug_directory() .'assets/add-ons/syntaxhighlighter/scripts/shAutoloader.js', false, '3.0.83', true );
		wp_enqueue_style( 'syntaxhighlighter', self::plug_directory() .'assets/add-ons/syntaxhighlighter/styles/shCoreDefault.css', false, '3.0.83', 'all');
					
		//Parallax
		wp_enqueue_script( 'bgParallax', self::plug_directory() .'assets/add-ons/parallax/jquery.bgParallax.js', array( 'jquery' ), '1.1.3', true );		
								
		//Add shortcodes style to Front-End
		wp_enqueue_style( self::PREFIX . '-shortcodes', self::sc_css_file(), false, self::ver(), 'all');
	
		//Main stylesheets and scripts to Front-End
		wp_enqueue_script( self::PREFIX . '-shortcodes', self::sc_js_file(), array( 'jquery' ), self::ver());

	}
	
	

	
	/*
	 * Enqueue scripts and styles  in the backstage
	 *
	 *
	 */
	public static function backstage_scripts() {
	
		  //Check if screen ID
		  $currentScreen = get_current_screen();
		  
		  
		  if( $currentScreen->base === "post" || $currentScreen->base === "widgets" || $currentScreen->base === "customize" || self::inc_str( $currentScreen->base, '_page_' ) ) {
			  
				if ( is_admin()) {
					
					
						//Add Icons
						wp_enqueue_style( 'font-awesome', self::plug_directory() .'assets/add-ons/fontawesome/font-awesome.css', array(), '4.5.0', 'all');
						wp_enqueue_style( 'flaticon', self::plug_directory() .'assets/add-ons/flaticon/flaticon.css', array(), '1.0', 'all');
						
					
						
						//Sweetalert
						wp_enqueue_style( self::PREFIX . '-shortcodes-sweetalert-css', self::plug_directory() .'assets/add-ons/sweetalert/sweetalert.css', false,'1.0.0', 'all');
						if( $currentScreen->base === "customize" ) {
							wp_enqueue_style( self::PREFIX . '-shortcodes-sweetalert-css-depth', self::plug_directory() .'assets/add-ons/sweetalert/sweetalert-depth.css', false,'1.0.0', 'all');
						}
						
						wp_enqueue_script( self::PREFIX . '-shortcodes-sweetalert', self::plug_directory() .'assets/add-ons/sweetalert/sweetalert.min.js', array( 'jquery' ), '1.0.0');
				
						//Colorpicker
						wp_enqueue_script( self::PREFIX . '-shortcodes-tinyColorPicker', self::plug_directory() .'assets/add-ons/tinyColorPicker/jqColorPicker.min.js', array( 'jquery' ), '1.0.0');
					
			
						//Main
						wp_enqueue_style( self::PREFIX . '-shortcodes-mce-main', self::plug_directory() .'shortcodes/core/style.css', false, self::ver(), 'all');
						wp_enqueue_script( self::PREFIX . '-shortcodes-mce-init', self::plug_directory() .'shortcodes/core/script.js', array( 'jquery' ), self::ver());
		
							
				}
  
		  } 
		  
		  if ( isset( $_GET[ 'tab' ] ) && isset( $_GET[ 'page' ] ) ) {
			  if( $_GET[ 'tab' ] == 'documentation' && $_GET[ 'page' ] == self::CUSPAGE ) {
				  
					if ( is_admin()) {
					
							//jQuery Accessible Tabs
							wp_enqueue_script( 'accTabs', self::plug_directory() .'assets/add-ons/accTabs/jquery.accTabs.js', array( 'jquery' ), '0.1.1');
							wp_enqueue_style( 'accTabs', self::plug_directory() .'assets/add-ons/accTabs/jquery.accTabs.css', false, '0.1.1', 'all');
								
							// SyntaxHighlighter
							wp_enqueue_script( 'syntaxhighlighter-core', self::plug_directory() .'assets/add-ons/syntaxhighlighter/scripts/shCore.js', false, '3.0.83', true );
							wp_enqueue_script( 'syntaxhighlighter-autoloader', self::plug_directory() .'assets/add-ons/syntaxhighlighter/scripts/shAutoloader.js', false, '3.0.83', true );
							wp_enqueue_style( 'syntaxhighlighter', self::plug_directory() .'assets/add-ons/syntaxhighlighter/styles/shCoreDefault.css', false, '3.0.83', 'all');	
												
								
					}
	  
			  }  
		  }
	

	}
	

	
	/*
	 * Call the specified form
	 *
	 *
	 */
	public static function call_form( $name ) {
		
		$folder = WP_PLUGIN_DIR.'/'.self::get_slug().'/shortcodes/panel/';
		require_once $folder.''.$name.'.php';
  
	}

	/*
	 * Returns current plugin version.
	 *
	 *
	 */
	public static function ver() {
	
		if ( ! function_exists( 'get_plugins' ) ) {
			require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
		}
		$plugin_folder = get_plugins( '/' . self::get_slug() );
		$plugin_file = basename( ( __FILE__ ) );
		return $plugin_folder[$plugin_file]['Version'];


	}


	
	
	/**
	 * Add plugin actions links
	 */
	public static function actions_links( $links ) {
		$links[] = '<a href="' . admin_url( "admin.php?page=".self::CUSPAGE ) . '">' . __( 'Settings', 'uix-shortcodes' ) . '</a>';
		$links[] = '<a href="' . admin_url( "admin.php?page=".self::CUSPAGE."&tab=usage" ) . '">' . __( 'How to use?', 'uix-shortcodes' ) . '</a>';
		return $links;
	}
	
	/*
	 * Register shortcodes
	 *
	 *
	 */
	public static function do_register_shortcodes() {
	
		  //Check if screen ID
		  $currentScreen = get_current_screen();
	
		  if( $currentScreen->base === "post" || self::inc_str( $currentScreen->base, '_page_' ) ) {
			
				require_once 'shortcodes/backstage-init.php';
		
		  } 
	

	}
	
	/**
	 * check the current post for the existence of a short code
	  * Note: The function will be used to .php file of theme when get_header() exist. The code could also be sought for header.php file.
	  *
	 */
	public static function has_shortcode( $shortcode = NULL ) {
	    
		
		$post_to_check = get_post( get_the_ID() );
	
		// false because we have to search through the post content first
		$found = false;
	
		// if no short code was provided, return false
		if ( ! $shortcode ) {
			return $found;
		}
		// check the post content for the short code
		if ( stripos( $post_to_check->post_content, '[' . $shortcode) !== FALSE ) {
			// we have found the short code
			$found = TRUE;
		}
	
		// return our final results
		return $found;
	}
	
		
	
	/*
	 * Register shortcodes of front-end
	 *
	 *
	 */
	public static function do_my_shortcodes() {
	
		  require_once 'shortcodes/frontpage-init.php';
	
	}
	
	
	/*
	 * Load all the form fields in the directory
	 *
	 */
	 public static function load_form_core() {

		foreach ( glob( dirname(__FILE__). "/shortcodes/core/form-inc/*.php") as $file ) {
			include $file;
		}	 
	 }

	/*
	 * Print Custom Stylesheet
	 *
	 */
	 public static function print_custom_stylesheet( $uix_sc_frontend_css = null ) {
      
		$custom_css = get_option( 'uix_sc_opt_cssnewcode' );
		
		if ( !empty( $uix_sc_frontend_css ) ) {
			$custom_css = $custom_css.$uix_sc_frontend_css;
		}
		wp_add_inline_style( self::PREFIX . '-shortcodes', $custom_css );
		
		return $uix_sc_frontend_css;


	 }


	
	
	/*
	 * Create customizable menu in backstage  panel
	 *
	 * Add a submenu page
	 *
	 */
	 public static function options_admin_menu() {
		 
		//Add a top level menu page.
		add_menu_page(
			__( 'Uix Shortcodes Settings', 'uix-shortcodes' ),
			__( 'Uix Shortcodes', 'uix-shortcodes' ),
			'manage_options',
			self::CUSPAGE,
			'uix_sc_options_page',
			'dashicons-editor-code',
			'81.' . rand( 0, 99 )
			
		);
		
	 }
	 
	/*
	 * Load helper
	 *
	 */
	 public static function load_helper() {
		 
		 require_once 'helper/settings.php';
	 }
	
	
	
	/**
	 * Internationalizing  Plugin
	 *
	 */
	public static function tc_i18n() {
	
	
	    load_plugin_textdomain( 'uix-shortcodes', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/'  );
		

	}


	
	/*
	 * Get current URI
	 *
	 */
	public static function cur_uri() {

		$protocol = strpos( strtolower( $_SERVER['SERVER_PROTOCOL'] ), 'https' )  === false ? 'http' : 'https';
		$thisURL = $protocol.'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		$weburl = $protocol.'://'.$_SERVER['HTTP_HOST'];
		
		if ( isset( $_SERVER['REQUEST_URI'] ) ) {
			$uri = $_SERVER['REQUEST_URI'];
		} else {
			if ( isset($_SERVER['argv'] ) ) {
				$uri = $_SERVER['PHP_SELF'] .'?'. $_SERVER['argv'][0];
			} else {
				$uri = $_SERVER['PHP_SELF'] .'?'. $_SERVER['QUERY_STRING'];
			}
		}
		return $weburl.$uri;


	}
	
	
	/*
	 * Get page URI
	 *
	 */
	
	public static function page_uri() {

		global $post;
		$_c = '';
	
		if ( is_single() || is_page() ) {
			$_c = get_permalink( get_the_ID() );
		}
		if ( is_home() ) {
			$_c = home_url('/');
		}
		if ( is_category() || is_category() && is_paged() ) {
			$_c = get_category_link(get_query_var( 'cat' ) );
		}
		if ( is_tag() || is_tag() && is_paged() ) {
			$_c = get_term_link(get_query_var( 'tag' ), 'post_tag' );
		}
		if ( is_search() || is_search() && is_paged() ) {
			$_c = get_search_link(get_query_var( 'search' ) );
		}
		if ( is_author() ) {
			$_c = esc_url(get_author_posts_url(get_the_author_meta( 'ID' ) ));
		}
		if ( is_date() ) {
			$_c = get_day_link( get_the_time('Y'), get_the_time('m'), get_the_time('d'));
		}
		
		if ( $_c == '' ) {
			$cururl = self::cur_uri();
			if ( is_paged() ) {
				
				if ( strpos( $cururl, '&paged=') ){
					$cururl_new = explode( '&paged=', $cururl );
					$cururl = $cururl_new[0];
					
				}
				
				
				if ( strpos( $cururl, '/page') ){
					$cururl_new = explode( '/page', $cururl );
					$cururl = $cururl_new[0];
				}
				
		
			}
			$_c = $cururl;
		}
		
	    return $_c;

	}

	/*
	 * The function finds the position of the first occurrence of a string inside another string.
	 *
	 * As strpos may return either FALSE (substring absent) or 0 (substring at start of string), strict versus loose equivalency operators must be used very carefully.
	 *
	 */
	public static function inc_str( $str, $incstr ) {
	
		if ( mb_strlen( strpos( $str, $incstr ), 'UTF8' ) > 0 ) {
			return true;
		} else {
			return false;
		}

	}



	/*
	 * Extend the default WordPress body classes.
	 *
	 *
	 */
	public static function new_class( $classes ) {
	
		$classes[] = 'uix-shortcodes-body';
		
		return $classes;



	}
	
	/*
	 * Transform string to slug for filterable categories
	 *
	 *
	 */
	public static function transform_slug( $str ) {
	
		return str_replace( ' ', '-', strtolower( $str ) );

	}

	/*
	 * Display categories on page
	 *
	 *
	 */
	public static function cat_list( $str, $classprefix = 'uix-sc-portfolio-' ) {

		$list = array();  
		$c = preg_match_all( '/\<div class="'.$classprefix.'type">(.*?)\<\/div\>/', $str, $m ); 
		$code = '';
		if( count( $m[1] ) > 0 ) { 
			for( $i=0; $i < $c; $i++ ) { 
			
				$new = !empty($m[1][$i]) ? $m[1][$i] : '';
				array_push( $list, array(
				    'slug' => self::transform_slug( $new ),
					'name' => $new
				));
				
			}  
			
			foreach ( $list as $key ) {
				$code .= '<li><a href="javascript:" data-group="'.$key[ 'slug' ].'">'.$key[ 'name' ].'</a></li>';
			}	
			
			return $code;

		} else {
			return '';
		}
	
	}


	
	/*
	 * Get attachment ID
	 *
	 *
	 */	
	public static function get_attachment_id( $img_url ) {
		$cache_key	= md5($img_url);
		$post_id	= wp_cache_get($cache_key, 'wpjam_attachment_id' );
		if($post_id == false){
	
			$attr		= wp_upload_dir();
			$base_url	= $attr['baseurl']."/";
			$path = str_replace($base_url, "", $img_url);
			if($path){
				global $wpdb;
				$post_id	= $wpdb->get_var("SELECT post_id FROM $wpdb->postmeta WHERE meta_value = '{$path}'");
				$post_id	= $post_id?$post_id:''; 
			}else{
				$post_id	= '';
			}
	
			wp_cache_set( $cache_key, $post_id, 'get_attachment_id', 86400);
		}
		return $post_id;
	}


	/*
	 * Shortcode Formatting Output
	 *
	 *
	 */
	public static function str_compression( $str ) {
		
		$str = str_replace( "\r\n", '', $str );
		$str = str_replace( "\n", '', $str );
		$str = str_replace( "\t", '', $str ); 
		$str = str_replace( "\t", '', $str );
		
		$pattern = array(
		"/> *([^ ]*) *</",
		"/[\s]+/",
		"/<!--[^!]*-->/",
		"/\"  /",
		"/ \"/",
		"'/\*[^*]*\*/'"
		);
		$replace = array(
		">\\1<",
		" ",
		"",
		"\"",
		"\"",
		""
		);
		
	  $outputcode = preg_replace( $pattern, $replace, $str );
		
	  return $outputcode;

	}
	
	
	
	/*
	 * Callback the plugin directory
	 *
	 *
	 */
	public static function plug_directory() {

	  return plugin_dir_url( __FILE__ );

	}
	
	/*
	 * Returns plugin slug
	 *
	 *
	 */
	public static function get_slug() {

         return dirname( plugin_basename( __FILE__ ) );
	
	}
	
	
	
	/**
	 * Initialize the WP_Filesystem
	 * 
	 * Example:
	 
            $output = "";
			$wpnonce_url = 'edit.php?post_type='.UixShortcodes::get_slug().'&page='.UixShortcodes::HELPER;
			$wpnonce_action = 'temp-filesystem-nonce';

            if ( !empty( $_POST ) ) {
				
				
                  $output = UixShortcodes::wpfilesystem_write_file( $wpnonce_action, $wpnonce_url, 'helper/tabs/', '1.txt', 'This is test.' );
				  echo $output;
			
            } else {
				
				wp_nonce_field( $wpnonce_action );
				echo '<p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="'.__( 'Click This Button to Copy Files', 'uix-shortcodes' ).'"  /></p>';
				
			}
	 *
	 */
	public static function wpfilesystem_connect_fs( $url, $method, $context, $fields = null) {
		  global $wp_filesystem;
		  if ( false === ( $credentials = request_filesystem_credentials( $url, $method, false, $context, $fields) ) ) {
			return false;
		  }
		
		  //check if credentials are correct or not.
		  if( !WP_Filesystem( $credentials ) ) {
			request_filesystem_credentials( $url, $method, true, $context);
			return false;
		  }
		
		  return true;
	}
	
	public static function wpfilesystem_write_file( $nonceaction, $nonce, $path, $pathname, $text ){
		  global $wp_filesystem;
		  
		
		  $url = wp_nonce_url( $nonce, $nonceaction );
		
		  $contentdir = trailingslashit( WP_PLUGIN_DIR .'/'.self::get_slug() ).$path; 
		  
		  if ( self::wpfilesystem_connect_fs( $url, '', $contentdir, '' ) ) {
			  
				$dir = $wp_filesystem->find_folder( $contentdir );
				$file = trailingslashit( $dir ) . $pathname;
				$wp_filesystem->put_contents( $file, $text, FS_CHMOD_FILE );
			
				return __( '<div class="notice notice-success"><p>Operation successfully completed!</p></div>', 'uix-shortcodes' );
				
		  } 
	}	
	
	 
	public static function wpfilesystem_read_file( $nonceaction, $nonce, $path, $pathname, $type = 'plugin' ){
		  global $wp_filesystem;
		
		  $url = wp_nonce_url( $nonce, $nonceaction );
	
		  if ( $type == 'plugin' ) {
			  $contentdir = trailingslashit( WP_PLUGIN_DIR .'/'.self::get_slug() ).$path; 
		  } 
		  if ( $type == 'theme' ) {
			  $contentdir = trailingslashit( get_template_directory() ).$path; 
		  } 	  
		
		  
		  if ( self::wpfilesystem_connect_fs( $url, '', $contentdir ) ) {
			  
				$dir = $wp_filesystem->find_folder( $contentdir );
				$file = trailingslashit( $dir ) . $pathname;
				
				
				if( $wp_filesystem->exists( $file ) ) {
					
				    return $wp_filesystem->get_contents( $file );
	
				} else {
					return '';
				}
		
		
		  } 
	}	 
	
	
	
		
	/*
	 * Check if the user needs a browser update
	 *
	 *
	 */
	public static function is_IE() {
         
		 if( self::inc_str( $_SERVER[ 'HTTP_USER_AGENT' ], 'MSIE' ) ) { 
		     return true;
		 } else {
			 return false;
		 }
        
	
	}
	
	/*
	 * Check if the Dynamic Adding Input
	 *
	 *
	 */
	public static function is_dynamic_input( $class ) {
         
		 if( self::inc_str( $class, 'dynamic-row' ) ) { 
		     return true;
		 } else {
			 return false;
		 }
        
	
	}
	
	
	/*
	 * Returns Row Class of Table 
	 *
	 *
	 */
	public static function row_class( $class ) {
         
		if( self::is_IE() && self::is_dynamic_input( $class ) ) {
			$new_class = str_replace( 'toggle-row', 'toggle-row isMSIE', $class );
		} else {
			$new_class = $class;
		}
		
		return $new_class;
        
	
	}
	
	
	/*
	 * Add custom CTA styles to TinyMCE editor
	 *
	 *
	 */
	public static function mce_css( $wp ) {
		$wp .= ',' . self::plug_directory() .'shortcodes/core/content.css';
		return $wp;
	}
	
	
	
	/*
	 * Callback function of "do shortcodes"
	 *
	 *
	 */
	public static function do_callback( $str ) {
	
	    $str = str_replace( '<p>[', "[", $str );
		$str = str_replace( ']</p>', "]", $str );
		$value = do_shortcode( $str );

		
		 $searcharray[ 'sc_str' ] = array(
		   '[li]', '[/li]', '[ul]', '[/ul]', '[ol]', '[/ol]', '[p]', '[/p]', '[br]', '&#8243;', '&#8242;'
		
		  );
		  $replacearray[ 'sc_str' ] = array(
		   '<li>', '</li>', '<ul>', '</ul>', '<ol>', '</ol>', '<p>', '</p>', '<br>', '"', "'"
		  );  
		
		//remove <br> or <br /> tags
		$value = preg_replace( '/(<br\s*\/>)+/', '', $value );
		
		//remove empty paragraph tags
		$value = preg_replace( '/<div(.*?)>([\s]*)<\/p>/', "<div$1>", $value );
		$value = preg_replace( '/<p>([\s]*)<\/div>/', "</div>", $value );
		
		$value = str_replace( $searcharray[ 'sc_str' ], $replacearray[ 'sc_str' ], $value );
		

	    return  $value;

	}
	
	
	/*
	 * Enable comments on pages.
	 *
	 *
	 */
	public static function comments_open( $open, $post_id ) {

		$post = get_post( $post_id );
		if ( 'page' == $post->post_type )
			$open = true;
		return $open;
		
	}
	


	/**
	 * Returns .css file name of custom shortcodes 
	 *
	 */
	public static function sc_css_file() {
		
		$validPath = self::plug_directory() .'assets/css/shortcodes.css';
		$newFilePath = get_stylesheet_directory() . '/uix-shortcodes-style.css';
	
		if ( file_exists( $newFilePath ) ) {
			$validPath = get_template_directory_uri() . '/uix-shortcodes-style.css';
		}
		
		return $validPath;
		
	}
	
	/**
	 * Returns .js file name of custom shortcodes script 
	 *
	 */
	public static function sc_js_file() {
		
		$validPath = self::plug_directory() .'assets/js/shortcodes.js';
		$newFilePath = get_stylesheet_directory() . '/uix-shortcodes-custom.js';
	
		if ( file_exists( $newFilePath ) ) {
			$validPath = get_template_directory_uri() . '/uix-shortcodes-custom.js';
		}
		
		return $validPath;
		
	}
	
	
	/*
	 * Returns readable Colour
	 *
	 *
	 */	
	public static function readable_color( $color ){
		
		if ( self::inc_str( $color, 'rgb' ) ) {
			$color = self::rgb2hex( $color );
		}
		
		if ( self::inc_str( $color, '#' ) ) {
			$color = str_replace('#', '', $color );
		}
		
		$r = hexdec(substr( $color, 0, 2 ) );
		$g = hexdec(substr( $color, 2, 2 ) );
		$b = hexdec(substr( $color, 4, 2 ) );
	
		$contrast = sqrt(
			$r * $r * .241 +
			$g * $g * .691 +
			$b * $b * .068
		);
	
	    //RGB Luminance
		if($contrast > 130){
			return '#000000';
		}else{
			return '#FFFFFF';
		}
	}
		
	public static function hex2rgb($hex) {
	   $hex = str_replace("#", "", $hex);
	
	   if(strlen($hex) == 3) {
		  $r = hexdec(substr($hex,0,1).substr($hex,0,1));
		  $g = hexdec(substr($hex,1,1).substr($hex,1,1));
		  $b = hexdec(substr($hex,2,1).substr($hex,2,1));
	   } else {
		  $r = hexdec(substr($hex,0,2));
		  $g = hexdec(substr($hex,2,2));
		  $b = hexdec(substr($hex,4,2));
	   }
	   $rgb = array($r, $g, $b);
	   //return implode(",", $rgb); // returns the rgb values separated by commas
	   return $rgb; // returns an array with the rgb values
	}
	
	public static function rgb2hex($rgb) {
	   $hex = "#";
	   $hex .= str_pad(dechex($rgb[0]), 2, "0", STR_PAD_LEFT);
	   $hex .= str_pad(dechex($rgb[1]), 2, "0", STR_PAD_LEFT);
	   $hex .= str_pad(dechex($rgb[2]), 2, "0", STR_PAD_LEFT);
	
	   return $hex; // returns the hex value including the number sign (#)
	}	
		
	
	/*
	 * Decode shortcodes template
	 *
	 *
	 */
	public static function decode( $str ) {


         if ( $str ) {
			 $restr = str_replace( '&#8217;', '\'',
					   str_replace( '&#8221;', '"',
					   str_replace( '&apos;', '\'',
					   str_replace( '&quot;', '"',
					   wp_specialchars_decode( $str )
					   ))));
					   
	 
		 } else {
		    $restr = $str;
		 }
		 
		 return $restr;

	}
	
	
	
	/*
	 * Get sub tags of shortcodes
	 *
	 *
	 */
	public static function get_subtags( $str, $content = null ) {

         if ( $str ) {
			 preg_match_all( '/\['.$str.'\](.*?)\[\/'.$str.'\]/si', $content , $match );
			 return $match[1][0];
		 } else {
		    return '';
		 }
	
	}
	
	/*
	 * Returns correctly icon class name of frond-end output
	 *
	 *
	 */
	public static function output_icon_class( $str ) {

		//Icon tyle
		if( self::inc_str( $str, 'flaticon-' ) ) { 
			$newstr = 'flaticon '.$str.'';
		} else {
			$newstr = 'fa fa-'.$str.'';
		}

		return $newstr;


	}
	
	
	/*
	 * Callback code of form
	 *
	 *
	 */
	public static function format_formcode( $str ) {

		$str = str_replace( '\'', '&apos;',
				   self::str_compression( $str )
				   );
	

		return $str;


	}
	

	
	/*
	 * Callback before tag of form
	 *
	 *
	 */
	public static function form_before() {
		
		return '<div class="sweet-table-wrapper">';

	}
	
	/*
	 * Callback after tag of form
	 *
	 *
	 */
	public static function form_after() {
		
		return '</div><!-- /.sweet-table-wrapper-->';

	}
	
	/*
	 * Callback before javascript of sweetalert
	 *
	 *
	 */
	public static function sweetalert_before( $form_js, $form_html, $form_js_vars, $form_id, $title ) {
		
		  //Check if screen ID
		  $currentScreen = get_current_screen();
	
		  if( $currentScreen->base === "widgets" || $currentScreen->base === "customize" ) {
			  $formid = '.'.$form_id.'-widget_btn';
			  $widget_content_id = "var widget_conID = $( this ).data( 'target' )";
			  
		  } else {
			  $formid = '#'.$form_id;
			  $widget_content_id = '';
		  }
		  
		return "
		
		{$form_js}
		
		$( '{$formid}' ).live( 'click',function(){
			{$widget_content_id}
			
			swal({   
				title: '{$title}',
				text: '{$form_html}',   
				html: true,
				type: 'input',
				showCancelButton: true,   
				confirmButtonColor: '#7ad03a',   
				cancelButtonText: '".__( 'Cancel', 'uix-shortcodes' )."',
				confirmButtonText: '".__( 'Insert into', 'uix-shortcodes' )."'
			}, 
			function(){ 
			    
			    {$form_js_vars}
		";

	}
	
	
	/*
	 * Callback after javascript of sweetalert
	 *
	 *
	 */
	public static function sweetalert_after() {
		
		return "
				/* Close */
				swal( '', '".__( 'Using the shortcodes successfully.', 'uix-shortcodes' )."', 'success' ); 

				
			});
			
			/*-- Icon list with the jQuery AJAX method --*/
			$( '.icon-selector' ).uix_iconSelector();
		
		});
		";

	}
	
	
	/*
	 * Callback before javascript of push to editor/textarea
	 *
	 *
	 */
	public static function send_to_editor_before( $tid = '' ) {
		
		  //Check if screen ID
		  $currentScreen = get_current_screen();
	
		  if( $currentScreen->base === "widgets" || $currentScreen->base === "customize" ) {
			  return "$( '#' + widget_conID ).val( $( '#' + widget_conID ).val() + uix_insertToTextarea( ";
		  } else {
			  return 'window.send_to_editor(';
		  }
	
	}
	
	
	/*
	 * Callback after javascript of push to editor/textarea
	 *
	 *
	 */
	public static function send_to_editor_after() {
		
		  //Check if screen ID
		  $currentScreen = get_current_screen();
	
		  if( $currentScreen->base === "widgets" || $currentScreen->base === "customize" ) {
			  return ") );";
		  } else {
			  return ');';
		  }
	
	}

	
     /*
	 * Returns dynamic form
	 *
	 *
	 */
	public static function dynamic_form_code( $class, $str, $toggle = null ) {
		
		 $searcharray[ 'list_str' ] = array(
			   'data-insert-preview="', //image
			   'data-insert-img="', //image
			   'pushinputID=',//icon
			   'id=',//input,textarea
			   '<td>',
			   '</td>'
			   
		
		  );
		  $replacearray[ 'list_str' ] = array(
			   'data-insert-preview="{dataID}', 
			   'data-insert-img="{dataID}', 
			   'pushinputID={dataID}', 
			   'data-id=',
			   '',
			   ''
		  );  

         if ( $str ) {
			 preg_match_all( '/<tr.*?'.$class.'">(.*?)<\/tr>/is', $str, $match );
			 $v = str_replace( $searcharray[ 'list_str' ], $replacearray[ 'list_str' ], $match[1][0] );
			 $v = preg_replace( '/<th.*?<\/th>/', '', $v );
			 
			//inscure browser
			if( self::is_IE() ) {
				 if ( $toggle == 'toggle-row' ) {
					 $v = '<div class="toggle-row isMSIE">'.$v.'</div>';
				 }
				 if ( $toggle == 'toggle' ) {
					 $v = '<div class="toggle-btn isMSIE">'.$v.'</div>';
				 }	 

			} else {
				 if ( $toggle == 'toggle-row' ) {
					 $v = '<div class="toggle-row">'.$v.'</div>';
				 }
				 if ( $toggle == 'toggle' ) {
					 $v = '<div class="toggle-btn">'.$v.'</div>';
				 }	 
	
			}
		
			 return self::str_compression( $v );
		 } else {
		    return '';
		 }
	

	}
	
	
	/*
	 * Callback form
	 *
	 * 
	 */
	 
	public static function add_form( $config_id, $arr1 = null, $arr2 = null, $code = 'html', $wrapper_name = '' ) {
		
		$section_args = array();
		$field_total = array();
		$field_args = array();
		$before = '';
		$after = '';
		$field = '';
		$output = '';
		$jscode = '';
		$jscode_vars = '';
		
		
		
		
		/**
		 * Get the configuration options
		 */
		
		if ( is_array( $arr2 ) ) {

			foreach ( $arr2 as $field_key => $field_value ) {
				$field_total[] = $field_value;
			}	
	
		}
	
	
        if ( !empty( $config_id ) ) {
			
			
			/**
			 * Add the form container
			 */
			 if ( is_array( $arr1 ) ) { 
			 
					if ( $arr1[ 'list' ] == false ) {
		
							$before = '
							 '.self::form_before().'
								<table class="sweet-table">
									<!-- Automatically repair display issues that readability of Sweetalert Form.  -->
									<input type="hidden" style="display:none"><!-- Required -->
							'."\n";
							
							
							$after = '
								</table>
							 '.self::form_after().'
							'."\n";
		
			
					}
					
					//Column 2
					if ( $arr1[ 'list' ] == 2 ) {
					
							$before = '
							 
								 <div class="sweet-table-cols-wrapper sweet-table-col-2">
									<table class="sweet-table-list">
										<!-- Automatically repair display issues that readability of Sweetalert Form.  -->
										<input type="hidden" style="display:none"><!-- Required -->
										
										
										<tr class="item">
											<th colspan="2" scope="col">
											'.$wrapper_name.'
											</th>
										</tr> 
										
							'."\n";
							
							
							$after = '
									</table>
								</div><!-- /.sweet-table-cols-wrapper-->
							 
							'."\n";
						
						
					}
					
					//Column 3
					if ( $arr1[ 'list' ] == 3 ) {
						$before = '
							 
								 <div class="sweet-table-cols-wrapper sweet-table-col-3">
									<table class="sweet-table-list">
										<!-- Automatically repair display issues that readability of Sweetalert Form.  -->
										<input type="hidden" style="display:none"><!-- Required -->
										
										
										<tr class="item">
											<th colspan="2" scope="col">
											'.$wrapper_name.'
											</th>
										</tr> 
										
							'."\n";
							
							
							$after = '
									</table>
								</div><!-- /.sweet-table-cols-wrapper-->
							 
							'."\n";
						
					}
					
					//Column 4
					if ( $arr1[ 'list' ] == 4 ) {
						$before = '
							 
								 <div class="sweet-table-cols-wrapper sweet-table-col-4">
									<table class="sweet-table-list">
										<!-- Automatically repair display issues that readability of Sweetalert Form.  -->
										<input type="hidden" style="display:none"><!-- Required -->
										
										
										<tr class="item">
											<th colspan="2" scope="col">
											'.$wrapper_name.'
											</th>
										</tr> 
										
							'."\n";
							
							
							$after = '
									</table>
								</div><!-- /.sweet-table-cols-wrapper-->
							 
							'."\n";
							
					}
			
			 }
			
			
			

			/**
			 * Add the field to the properly indexed
			 */
	
			foreach ( $field_total as $key) {
		
				$_title = ( isset( $key['title'] ) ) ? $key['title'] : '';
				$_desc = ( isset( $key['desc'] ) ) ? $key['desc'] : '';
				$_default = ( isset( $key['default'] ) ) ? $key['default'] : '';
				$_value = ( isset( $key['value'] ) ) ? $key['value'] : '';
				$_ph = ( isset( $key['placeholder'] ) ) ? $key['placeholder'] : '';
				$_id = ( isset( $key['id'] ) ) ? $key['id'] : '';
				$_type = ( isset( $key['type'] ) ) ? $key['type'] : 'text';
				$_class = ( isset( $key['class'] ) ) ? $key['class'] : '';
				$_toggle = ( isset( $key['toggle'] ) ) ? $key['toggle'] : '';
				
				$args = [
					'title'             => $_title,
					'desc'              => $_desc,
					'default'           => $_default,
					'value'             => $_value,
					'placeholder'       => $_ph,
					'id'                => $_id,
					'type'              => $_type,
					'class'              => $_class,
					'toggle'              => $_toggle

				];
			
				
				//icon
				$field .= UixShortcodesForm_Icon::add( $args, 'html' );
				$jscode .= UixShortcodesForm_Icon::add( $args, 'js' );
				$jscode_vars .= UixShortcodesForm_Icon::add( $args, 'js_vars' );
	
				//radio
				$field .= UixShortcodesForm_Radio::add( $args, 'html' );
				$jscode .= UixShortcodesForm_Radio::add( $args, 'js' );
				$jscode_vars .= UixShortcodesForm_Radio::add( $args, 'js_vars' );
				
				//radio image
				$field .= UixShortcodesForm_RadioImage::add( $args, 'html' );
				$jscode .= UixShortcodesForm_RadioImage::add( $args, 'js' );
				$jscode_vars .= UixShortcodesForm_RadioImage::add( $args, 'js_vars' );			
				
				//multiple selector
				$field .= UixShortcodesForm_MultiSelector::add( $args, 'html' );
				$jscode .= UixShortcodesForm_MultiSelector::add( $args, 'js' );
				$jscode_vars .= UixShortcodesForm_MultiSelector::add( $args, 'js_vars' );			
	
				//slider
				$field .= UixShortcodesForm_Slider::add( $args, 'html' );
				$jscode .= UixShortcodesForm_Slider::add( $args, 'js' );
				$jscode_vars .= UixShortcodesForm_Slider::add( $args, 'js_vars' );
				
				//margin
				$field .= UixShortcodesForm_Margin::add( $args, 'html' );
				$jscode .= UixShortcodesForm_Margin::add( $args, 'js' );
				$jscode_vars .= UixShortcodesForm_Margin::add( $args, 'js_vars' );
				
				
				//text
				$field .= UixShortcodesForm_Text::add( $args, 'html' );
				$jscode .= UixShortcodesForm_Text::add( $args, 'js' );
				$jscode_vars .= UixShortcodesForm_Text::add( $args, 'js_vars' );
	
	
				//textarea
				$field .= UixShortcodesForm_Textarea::add( $args, 'html' );
				$jscode .= UixShortcodesForm_Textarea::add( $args, 'js' );
				$jscode_vars .= UixShortcodesForm_Textarea::add( $args, 'js_vars' );
	
	
				//short text
				$field .= UixShortcodesForm_ShortText::add( $args, 'html' );
				$jscode .= UixShortcodesForm_ShortText::add( $args, 'js' );
				$jscode_vars .= UixShortcodesForm_ShortText::add( $args, 'js_vars' );
				
				//short units text
				$field .= UixShortcodesForm_ShortUnitsText::add( $args, 'html' );
				$jscode .= UixShortcodesForm_ShortUnitsText::add( $args, 'js' );
				$jscode_vars .= UixShortcodesForm_ShortUnitsText::add( $args, 'js_vars' );	
	
				//checkbox
				$field .= UixShortcodesForm_Checkbox::add( $args, 'html' );
				$jscode .= UixShortcodesForm_Checkbox::add( $args, 'js' );
				$jscode_vars .= UixShortcodesForm_Checkbox::add( $args, 'js_vars' );
	
				//color
				$field .= UixShortcodesForm_Color::add( $args, 'html' );
				$jscode .= UixShortcodesForm_Color::add( $args, 'js' );
				$jscode_vars .= UixShortcodesForm_Color::add( $args, 'js_vars' );
				
				//colormap
				$field .= UixShortcodesForm_ColorMap::add( $args, 'html' );
				$jscode .= UixShortcodesForm_ColorMap::add( $args, 'js' );
				$jscode_vars .= UixShortcodesForm_ColorMap::add( $args, 'js_vars' );
					
				
	
				//select
				$field .= UixShortcodesForm_Select::add( $args, 'html' );
				$jscode .= UixShortcodesForm_Select::add( $args, 'js' );
				$jscode_vars .= UixShortcodesForm_Select::add( $args, 'js_vars' );
	
				//image
				$field .= UixShortcodesForm_Image::add( $args, 'html' );
				$jscode .= UixShortcodesForm_Image::add( $args, 'js' );
				$jscode_vars .= UixShortcodesForm_Image::add( $args, 'js_vars' );
	
	
				//toggle 1
				$field .= UixShortcodesForm_Toggle::add( $args, 'html' );
				$jscode .= UixShortcodesForm_Toggle::add( $args, 'js' );
				$jscode_vars .= UixShortcodesForm_Toggle::add( $args, 'js_vars' );
	
				//list 1
				$field .= UixShortcodesForm_ListClone::add( $args, 'html' );
				$jscode .= UixShortcodesForm_ListClone::add( $args, 'js' );
				$jscode_vars .= UixShortcodesForm_ListClone::add( $args, 'js_vars' );
	
	


			} // end foreach
			

			//HTML output
			if ( $code == 'html' ) $output = self::format_formcode ( $before.$field.$after );
			
			//Javascript output
			if ( $code == 'js' || $code == 'javascript' ) $output = $jscode;
			
			//Javascript vars output
			if ( $code == 'js_vars' ) $output = $jscode_vars;		
			
			//Add simulation buttons
			if ( $code == 'active_btn' ) $output = '<a style="display:none" id="'.$config_id.'"></a>';		

			
		}
		
		
		
		
		return $output;
	
	}
	
	
	
}

add_action( 'plugins_loaded', array( 'UixShortcodes', 'init' ) );

