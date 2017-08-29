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
 * Version:     1.5.3
 * Author:      UIUX Lab
 * Author URI:  https://uiux.cc
 * License:     GPLv2 or later
 * Text Domain: uix-shortcodes
 * Domain Path: /languages
 */

class UixShortcodes {

	const PREFIX      = 'uix';
	const CUSPAGE     = 'uix-shortcodes-custom-submenu-page';
	const DEMOFORM    = 0; //Show test form when this value is "1" (For developer)
	
	
	/**
	 * Initialize
	 *
	 */
	public static function init() {
		
		self::setup_constants();
		self::includes();
		
		add_action( 'init', array( __CLASS__, 'register_scripts' ) );
        add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), array( __CLASS__, 'actions_links' ), -10 );
		add_action( 'admin_enqueue_scripts', array( __CLASS__, 'backstage_scripts' ), 999 );
		add_action( 'admin_enqueue_scripts', array( __CLASS__, 'backstage_scripts_fe' ), 999 );
		add_action( 'wp_enqueue_scripts', array( __CLASS__, 'frontpage_scripts' ) );
		add_action( 'wp_enqueue_scripts', array( __CLASS__, 'print_custom_stylesheet' ) );
		add_action( 'current_screen', array( __CLASS__, 'do_register_shortcodes' ) );
		add_action( 'admin_init', array( __CLASS__, 'tc_i18n' ) );
		add_action( 'admin_init', array( __CLASS__, 'load_helper' ) );
		add_action( 'admin_menu', array( __CLASS__, 'options_admin_menu' ) );
		add_action( 'wp_head', array( __CLASS__, 'do_my_shortcodes' ) );
		add_action( 'admin_init', array( __CLASS__, 'do_my_shortcodes' ) );
		add_filter( 'body_class', array( __CLASS__, 'new_class' ) );
		
		
		
	}

	/**
	 * Setup plugin constants.
	 *
	 */
	public static  function setup_constants() {

		// Plugin Folder Path.
		if ( ! defined( 'UIX_SHORTCODES_PLUGIN_DIR' ) ) {
			define( 'UIX_SHORTCODES_PLUGIN_DIR', trailingslashit( plugin_dir_path( __FILE__ ) ) );
		}

		// Plugin Folder URL.
		if ( ! defined( 'UIX_SHORTCODES_PLUGIN_URL' ) ) {
			define( 'UIX_SHORTCODES_PLUGIN_URL', trailingslashit( plugin_dir_url( __FILE__ ) ) );
		}

		// Plugin Root File.
		if ( ! defined( 'UIX_SHORTCODES_PLUGIN_FILE' ) ) {
			define( 'UIX_SHORTCODES_PLUGIN_FILE', trailingslashit( __FILE__ ) );
		}
	}
	
	/*
	 * Include required files.
	 *
	 *
	 */
	public static function includes() {
		require_once UIX_SHORTCODES_PLUGIN_DIR.'admin/uixscform/init.php';
	}
	
	
	/*
	 * Register scripts and styles.
	 *
	 *
	 */
	public static function register_scripts() {
		
		// jQuery Accessible Tabs
		wp_register_script( 'accTabs', self::plug_directory() .'assets/add-ons/accTabs/jquery.accTabs.js', array( 'jquery' ), '0.1.1' );
		wp_register_style( 'accTabs-uix-shortcodes', self::plug_directory() .'assets/add-ons/accTabs/jquery.accTabs.css', false, '0.1.1', 'all' );
		
		// Shuffle
		wp_register_script( 'shuffle', self::plug_directory() .'assets/add-ons/shuffle/jquery.shuffle.js', array( 'jquery' ), '3.1.1', true );
		
		// Shuffle.js requires Modernizr..
		wp_register_script( 'modernizr', self::plug_directory() .'assets/add-ons/HTML5/modernizr.min.js', false, '3.3.1', false );
			
		// Easing
		wp_register_script( 'jquery-easing', self::plug_directory() .'assets/add-ons/easing/jquery.easing.js', array( 'jquery' ), '1.3', false );	

		// Easy Pie Chart
		wp_register_script( 'easypiechart', self::plug_directory() .'assets/add-ons/piechart/jquery.easypiechart.min.js', array( 'jquery' ), '2.1.7', true );

		//flexslider
		wp_register_script( 'flexslider', self::plug_directory() .'assets/add-ons/flexslider/jquery.flexslider.min.js', array( 'jquery' ), '2.5.0', true );	
		wp_register_style( 'flexslider', self::plug_directory() .'assets/add-ons/flexslider/flexslider.css', false, '2.5.0', 'all' );
		
		// prettyPhoto
		wp_register_script( 'prettyPhoto', self::plug_directory() .'assets/add-ons/prettyPhoto/jquery.prettyPhoto.js', array( 'jquery' ), '3.1.5', true );
		wp_register_style( 'prettyPhoto', self::plug_directory() .'assets/add-ons/prettyPhoto/jquery.prettyPhoto.css', false, '3.1.5', 'all' );
				
		// SyntaxHighlighter
		wp_register_script( 'syntaxhighlighter-core', self::plug_directory() .'assets/add-ons/syntaxhighlighter/scripts/shCore.js', false, '3.0.83', true );
		wp_register_script( 'syntaxhighlighter-autoloader', self::plug_directory() .'assets/add-ons/syntaxhighlighter/scripts/shAutoloader.js', false, '3.0.83', true );
		wp_register_style( 'syntaxhighlighter', self::plug_directory() .'assets/add-ons/syntaxhighlighter/styles/shCoreDefault.css', false, '3.0.83', 'all' );
					
		// Parallax
		wp_register_script( 'bgParallax', self::plug_directory() .'assets/add-ons/parallax/jquery.bgParallax.js', array( 'jquery' ), '1.1.3', true );		
								
		// Add shortcodes style to Front-End
		wp_register_style( self::PREFIX . '-shortcodes', self::core_css_file(), false, self::ver(), 'all' );
	
		// Main stylesheets and scripts to Front-End
		wp_register_script( self::PREFIX . '-shortcodes', self::core_js_file(), array( 'jquery' ), self::ver(), true );
		wp_localize_script( self::PREFIX . '-shortcodes',  'wp_theme_root_path', array( 
			'templateUrl'   => get_stylesheet_directory_uri(),
			'uixScRootUrl'  => self::plug_directory()
		 ) );
		
		// Admin panel stylesheets
		wp_register_style( self::PREFIX . '-shortcodes-admin', self::plug_directory() .'shortcodes/editor/style.css', false, self::ver(), 'all' );



	}
	
	
	/*
	 * Enqueue scripts and styles.
	 *
	 *
	 */
	public static function frontpage_scripts() {

		wp_enqueue_script( 'shuffle' );
		wp_enqueue_script( 'modernizr' );
		wp_enqueue_script( 'jquery-easing' );
		wp_enqueue_script( 'imagesloaded' );
		wp_enqueue_script( 'easypiechart' );
		wp_enqueue_script( 'flexslider' );	
		wp_enqueue_style( 'flexslider' );
		wp_enqueue_script( 'prettyPhoto' );
		wp_enqueue_style( 'prettyPhoto' );
		wp_enqueue_script( 'syntaxhighlighter-core' );
		wp_enqueue_script( 'syntaxhighlighter-autoloader' );
		wp_enqueue_style( 'syntaxhighlighter' );
		wp_enqueue_script( 'bgParallax' );
		wp_enqueue_style( self::PREFIX . '-shortcodes' );
		wp_enqueue_script( self::PREFIX . '-shortcodes' );

	}
	
	

	
	/*
	 * Enqueue scripts and styles  in the backstage
	 *
	 *
	 */
	public static function backstage_scripts_fe() {
	
	      if ( get_post_type() != 'uix_page_builder' ) {
			  
			  //Check if screen ID
			  $currentScreen = get_current_screen();
			  
			  if ( $currentScreen->base === "post" || 
				   $currentScreen->base === "widgets" || 
				   $currentScreen->base === "customize" || 
				   self::inc_str( $currentScreen->base, '_page_' ) 
				 ) 
			  {
					wp_enqueue_script( 'shuffle' );
					wp_enqueue_script( 'modernizr' );
					wp_enqueue_script( 'jquery-easing' );
					wp_enqueue_script( 'imagesloaded' );
					wp_enqueue_script( 'easypiechart' );
					wp_enqueue_script( 'flexslider' );	
					wp_enqueue_style( 'flexslider' );
					wp_enqueue_script( 'prettyPhoto' );
					wp_enqueue_style( 'prettyPhoto' );
					wp_enqueue_script( 'bgParallax' );
					wp_enqueue_style( self::PREFIX . '-shortcodes' );
					wp_enqueue_script( self::PREFIX . '-shortcodes' );			

			  } 

			  
		  }
		  

	}
	
	
	
	public static function backstage_scripts() {
	
	      if ( get_post_type() != 'uix_page_builder' ) {
			  
			  //Check if screen ID
			  $currentScreen = get_current_screen();
			  
			  
			  if ( $currentScreen->base === "post" || 
				   $currentScreen->base === "widgets" || 
				   $currentScreen->base === "customize" || 
				   self::inc_str( $currentScreen->base, '_page_' ) 
				 ) 
			  {
				  wp_enqueue_style( self::PREFIX . '-shortcodes-admin' );
	  
			  } 
			  
			  if ( isset( $_GET[ 'tab' ] ) && isset( $_GET[ 'page' ] ) ) {
				  
				  if( $_GET[ 'tab' ] == 'documentation' && $_GET[ 'page' ] == self::CUSPAGE ) {
					  
						wp_enqueue_script( 'accTabs' );
						wp_enqueue_style( 'accTabs-uix-shortcodes' );
						wp_enqueue_script( 'syntaxhighlighter-core' );
						wp_enqueue_script( 'syntaxhighlighter-autoloader' );
						wp_enqueue_style( 'syntaxhighlighter' );
					
		  
				  }  
			  }
	
			  
		  }
		  

	}
	

	
	/*
	 * Call the specified form  [Use for theme]
	 *
	 *
	 */
	public static function call_form( $name ) {
		
		$newname = $name;
		
		switch ( $name ) {
			case 'pricing-3-col':
				$newname = 'uix_sc_form_pricing_col3';
				break;
			case 'pricing-4-col':
				$newname = 'uix_sc_form_pricing_col4';
				break;
			case 'features-2-col':
				$newname = 'uix_sc_form_features_col2';
				break;
			case 'features-3-col':
				$newname = 'uix_sc_form_features_col3';
				break;
			case 'team-grid':
				$newname = 'uix_sc_form_team_grid';
				break;
			case 'team-fullwidth':
				$newname = 'uix_sc_form_team_fullwidth';
				break;
			case 'progress-bar':
				$newname = 'uix_sc_form_bar';
				break;
			case 'testimonials':
				$newname = 'uix_sc_testimonials';
				break;
			case 'map':
				$newname = 'uix_sc_map';
				break;
			case 'heading':
				$newname = 'uix_sc_heading';
				break;
			case 'video':
				$newname = 'uix_sc_form_video';
				break;
			case 'tabs':
				$newname = 'uix_sc_form_tabs';
				break;	
			case 'share-buttons':
				$newname = 'uix_sc_form_share_buttons';
				break;	
			case 'recent-posts':
				$newname = 'uix_sc_form_recent_posts';
				break;	
			case 'portfolio':
				$newname = 'uix_sc_form_portfolio_grid';
				break;					
			case 'icon':
				$newname = 'uix_sc_form_icon';
				break;	
			case 'code':
				$newname = 'uix_sc_form_code';
				break;	
			case 'client':
				$newname = 'uix_sc_form_client';
				break;		
			case 'button':
				$newname = 'uix_sc_form_button';
				break;		
			case 'authorcard':
				$newname = 'uix_sc_form_authorcard';
				break;			
			case 'audio':
				$newname = 'uix_sc_form_audio';
				break;				
			case 'accordion':
				$newname = 'uix_sc_form_accordion';
				break;			
			case 'dividing-line':
				$newname = 'uix_sc_dividing_line';
				break;	
			case 'contact-form':
				$newname = 'uix_sc_contact_form';
				break;
			case 'timeline':
				$newname = 'uix_sc_form_timeline';
				break;	
			case 'imageslider':
				$newname = 'uix_sc_form_imageslider';
				break;		
			default:
				$newname = $name;
				break;
		}
		
		$folder = self::templates_panel_directory();
		$file   = $folder.''.$newname.'.php';
		
		if ( file_exists( $file ) ) require_once $file;
		
		
		
		
  
	}
	
	/*
	 * Returns current theme
	 *
	 *
	 */
	public static function theme() {
		return get_option( 'uix_sc_opt_style', 'elegant' );	
	}
	
	/*
	 * Returns current shortcode templates panel directory.
	 *
	 *
	 */
	public static function templates_panel_directory( $front = false ) {
	
		//shortcodes themes
		$shortcodes_style = self::theme();
		
		if ( !$front ) {
			$default_dir      = UIX_SHORTCODES_PLUGIN_DIR.'shortcodes/templates/default/panel/';
			$cur_dir          = UIX_SHORTCODES_PLUGIN_DIR.'shortcodes/templates/'.$shortcodes_style.'/panel/';
		} else {
			$default_dir      = UIX_SHORTCODES_PLUGIN_DIR.'shortcodes/templates/default/';
			$cur_dir          = UIX_SHORTCODES_PLUGIN_DIR.'shortcodes/templates/'.$shortcodes_style.'/';	
		}

		

		if( is_dir( UIX_SHORTCODES_PLUGIN_DIR.'shortcodes/templates/'.$shortcodes_style ) ) {
		    return $cur_dir;
		} else {
			return $default_dir;
		}
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
		$links[] = '<a href="' . admin_url( "admin.php?page=".self::CUSPAGE."&tab=general-settings" ) . '">' . __( 'Settings', 'uix-shortcodes' ) . '</a>';
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
			
				require_once UIX_SHORTCODES_PLUGIN_DIR.'shortcodes/backstage-init.php';
		
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
	
		$file = self::templates_panel_directory( true ) . 'frontpage-init.php';
		if ( file_exists( $file ) ) require_once $file;
	
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
	
		add_submenu_page(
			self::CUSPAGE,
			__( 'How to use?', 'uix-shortcodes' ),
			__( 'How to use?', 'uix-shortcodes' ),
			'manage_options',
			'admin.php?page='.self::CUSPAGE.'&tab=usage'
		);	  
		 
        //Add sub links
		add_submenu_page(
			self::CUSPAGE,
			__( 'Settings', 'uix-shortcodes' ),
			__( 'Settings', 'uix-shortcodes' ),
			'manage_options',
			'admin.php?page='.self::CUSPAGE.'&tab=general-settings'
		);
	
		add_submenu_page(
			self::CUSPAGE,
			__( 'Custom CSS', 'uix-shortcodes' ),
			__( 'Custom CSS', 'uix-shortcodes' ),
			'manage_options',
			'admin.php?page='.self::CUSPAGE.'&tab=custom-css'
		);	
		
		add_submenu_page(
			self::CUSPAGE,
			__( 'Helper', 'uix-shortcodes' ),
			__( 'Helper', 'uix-shortcodes' ),
			'manage_options',
			'admin.php?page='.self::CUSPAGE
		);	
		
		// remove the "main" submenue page
		remove_submenu_page( self::CUSPAGE, self::CUSPAGE );
			
			
	 }
	
	
	 
	/*
	 * Load helper
	 *
	 */
	 public static function load_helper() {
		 
		 require_once UIX_SHORTCODES_PLUGIN_DIR.'helper/settings.php';
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
		
		$incstr = str_replace( '(', '\(',
				  str_replace( ')', '\)',
				  str_replace( '|', '\|',
				  str_replace( '*', '\*',
				  str_replace( '+', '\+',
			      str_replace( '.', '\.',
				  str_replace( '[', '\[',
				  str_replace( ']', '\]',
				  str_replace( '?', '\?',
				  str_replace( '/', '\/',
				  str_replace( '^', '\^',
			      str_replace( '{', '\{',
				  str_replace( '}', '\}',	
				  str_replace( '$', '\$',
			      str_replace( '\\', '\\\\',
				  $incstr 
				  )))))))))))))));
			
		if ( !empty( $incstr ) ) {
			if ( preg_match( '/'.$incstr.'/', $str ) ) {
				return true;
			} else {
				return false;
			}
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
	
		return sanitize_title( $str );

	}

	/*
	 * Display categories on page
	 *
	 *
	 */
	public static function cat_list( $str, $classprefix = 'uix-sc-portfolio-' ) {

		$list = array();  
		$html = array();  
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
				array_push( $html, '<li><a href="javascript:" data-group="'.$key[ 'slug' ].'">'.$key[ 'name' ].'</a></li>' );
			}
			$html = array_unique( $html );
			
			foreach ( $html as $key ) {
				$code .= $key;
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
		
		$str = str_replace( PHP_EOL, '', $str );
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
	 * Callback the plugin directory URL
	 *
	 *
	 */
	public static function plug_directory() {

	  return UIX_SHORTCODES_PLUGIN_URL;

	}
	
	/*
	 * Callback the plugin directory
	 *
	 *
	 */
	public static function plug_filepath() {

	  return UIX_SHORTCODES_PLUGIN_DIR;

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
			
            if ( !empty( $_POST ) && check_admin_referer( 'custom_action_nonce') ) {
				
				
                  $output = UixShortcodes::wpfilesystem_write_file( 'custom_action_nonce', 'admin.php?page='.UixShortcodes::HELPER.'&tab=???', 'helper/', 'debug.txt', 'This is test.' );
				  echo $output;
			
            } else {
				
				wp_nonce_field( 'custom_action_nonce' );
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
		
		  $contentdir = UIX_SHORTCODES_PLUGIN_DIR.$path; 
		  
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
			  $contentdir = UIX_SHORTCODES_PLUGIN_DIR.$path; 
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
	
	

	/**
	 * Determine whether the css core file exists
	 *
	 */
	public static function core_css_file_exists() {
		  $newFilePath      = get_stylesheet_directory() . '/uix-shortcodes-custom.css';
	      $newFilePath2     = get_stylesheet_directory() . '/assets/css/uix-shortcodes-custom.css';
		  if ( file_exists( $newFilePath ) || file_exists( $newFilePath2 ) ) {
			  return true;
		  } else {
			  return false;
		  }	
	}
	
	
	/**
	 * Returns .css file name of custom shortcodes 
	 *
	 */
	public static function core_css_file( $type = 'uri' ) {
		
		//default style
		$validPath    = self::plug_directory() .'assets/css/shortcodes.css';
		$newFilePath  = get_stylesheet_directory() . '/uix-shortcodes-custom.css';
		$newFilePath2 = get_stylesheet_directory() . '/assets/css/uix-shortcodes-custom.css';
		
		//shortcodes themes
		$shortcodes_style = self::theme();
		$filenames        = array();
		$filepath         = UIX_SHORTCODES_PLUGIN_DIR. 'assets/css/';
		
		foreach ( glob( dirname(__FILE__). "/assets/css/shortcodes-*") as $file ) {
		    $filenames[] = str_replace( '.css', '', str_replace( 'shortcodes-', '', str_replace( dirname(__FILE__). "/assets/css/", '', $file ) ) );
		}	
		
		foreach ( $filenames as $filename ) {
			if ( $shortcodes_style == $filename ) {
				$validPath = self::plug_directory() .'assets/css/shortcodes-'.$filename.'.css';
				break;
			}
		}	
		
		
		if ( self::inc_str( $validPath, $shortcodes_style ) ) {
			if ( $type == 'dir' ) $validPath = str_replace( trailingslashit( self::plug_directory() ), UIX_SHORTCODES_PLUGIN_DIR, $validPath );
			if ( $type == 'name' ) $validPath = 'shortcodes-'.$shortcodes_style.'.css';
		} else {
			if ( $type == 'dir' ) $validPath = str_replace( '-'.$shortcodes_style, '', str_replace( trailingslashit( self::plug_directory() ), UIX_SHORTCODES_PLUGIN_DIR, $validPath ) );
			if ( $type == 'name' ) $validPath = 'shortcodes.css';	
		}
		
	    //custom stylesheet for WP theme directory
		if ( file_exists( $newFilePath ) ) {
			$validPath = get_template_directory_uri() . '/uix-shortcodes-custom.css';
			if ( $type == 'dir' ) {
				$validPath = get_template_directory() . '/uix-shortcodes-custom.css';
			}
		}
		
		
		if ( file_exists( $newFilePath2 ) ) {
			$validPath = get_template_directory_uri() . '/assets/css/uix-shortcodes-custom.css';
			if ( $type == 'dir' ) {
				$validPath = get_template_directory() . '/assets/css/uix-shortcodes-custom.css';
			}

		}
		
		if ( file_exists( $newFilePath ) || file_exists( $newFilePath2 ) ) {
			if ( $type == 'name' ) {
				$validPath = 'uix-shortcodes-custom.css';
			}
		}
		
		
		return $validPath;
		
	}
	
	
	
	/**
	 * Returns .js file name of custom shortcodes script 
	 *
	 */
	public static function core_js_file( $type = 'uri' ) {
		
		$validPath    = self::plug_directory() .'assets/js/uix-shortcodes.js';
		$newFilePath  = get_stylesheet_directory() . '/uix-shortcodes-custom.js';
		$newFilePath2 = get_stylesheet_directory() . '/assets/js/uix-shortcodes-custom.js';
	
		if ( file_exists( $newFilePath ) ) {
			$validPath = get_template_directory_uri() . '/uix-shortcodes-custom.js';
		}
		
	
		if ( file_exists( $newFilePath2 ) ) {
			$validPath = get_template_directory_uri() . '/assets/js/uix-shortcodes-custom.js';
		}
		
		if ( $type == 'name' ) {
			if ( file_exists( $newFilePath ) || file_exists( $newFilePath2 ) ) {
				$validPath = 'uix-shortcodes-custom.js';
			} else {
				$validPath = 'uix-shortcodes.js';
			}
		}
		
		
		return $validPath;
		
	}
	
	
	
	
	/*
	 * Decode template for shortcode attributes
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
	 * Get numbers from string
	 *
	 *
	 */
	public static function get_numerics( $str ) {
	
		if ( $str ) {
			if ( preg_match_all( '/\d+(\.\d+)?/', $str, $matches ) ) {
				return $matches[0][0];
			} else {
				return 0;
			}	
		} else {
			return 0;
		}

	}
	
	/*
	 * Get text of unit from string
	 *
	 *
	 */
	public static function get_unit_txt( $str ) {
		return str_replace( self::get_numerics( $str ), '', $str );
	}
	
	
	/*
	 * Get text of unit from string
	 *
	 *
	 */
	public static function color_transform( $str ) {
		
		if( self::inc_str( $str, '#' ) ) { 
			switch( $str ) {
				case '#a2bf2f':
					return 'green';

				  break;
				case '#d59a3e':
					return 'yellow';

				  break;

				case '#DD514C':
					return 'red';	 
				  break;

				case '#FA9ADF':
					return 'pink';	

				  break;

				case '#4BB1CF':
					return 'blue'; 
				  break;

				case '#0E90D2':
					return 'darkblue'; 
				  break;	  


				case '#5F9EA0':
					return 'cadetblue';
				  break;

				case '#473f3f':
					return 'black';
				  break;


				case '#bebebe':
					return 'gray';
				  break;       


				default:
					return 'green';

			}
	
		} else {
			switch( $str ) {
				case 'green':
					return '#a2bf2f';

				  break;
				case 'yellow':
					return '#d59a3e';

				  break;

				case 'red':
					return '#DD514C';	 
				  break;

				case 'pink':
					return '#FA9ADF';	

				  break;

				case 'blue':
					return '#4BB1CF'; 
				  break;

				case 'darkblue':
					return '#0E90D2'; 
				  break;	  


				case 'cadetblue':
					return '#5F9EA0';
				  break;

				case 'black':
					return '#473f3f';
				  break;


				case 'gray':
					return '#bebebe';
				  break;       


				default:
					return '#a2bf2f';

			}

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
	 * Older version themes are functionally compatible
	 *
	 *
	 */
	public static function comments_open( $open, $post_id ) {

		$post = get_post( $post_id );
		if ( 'page' == $post->post_type ) {
			//do something
		}
		return $open;
		
	}
	
	/*
	 * Initialize sections template parameters
	 *
	 *
	 */
	public static function init_template_parameters( $id ) {

		//Form ID
		$form_id = $id;

		//Sections template parameters
		$sid     = ( isset( $_POST[ 'sectionID' ] ) ) ? $_POST[ 'sectionID' ] : -1;
		$pid     = ( isset( $_POST[ 'postID' ] ) ) ? $_POST[ 'postID' ] : 0;
		$cid     = ( isset( $_POST[ 'contentID' ] ) ) ? $_POST[ 'contentID' ] : 'content';

		$vars = array(
			'sid'        => $sid,
			'pid'        => $pid,
			'cid'      => $cid,
			'form_id'    => $form_id
		);
		
		return $vars;

	}

	/*
	 * Append associative array elements
	 *
	 *
	 */
	public static function array_push_associative(&$arr) {
	   $args = func_get_args();
	   $ret  = null;
	   foreach ($args as $arg) {
		   if (is_array($arg)) {
			   foreach ($arg as $key => $value) {
				   $arr[$key] = $value;
				   $ret++;
			   }
		   }else{
			   $arr[$arg] = "";
		   }
	   }
	   return $ret;
	}	
	
	
	/*
	 * Form javascripts output when in ajax or default state
	 *
	 *
	 */
	public static function form_scripts( $arr ) {
		
	
		if ( is_array( $arr ) && sizeof( $arr ) >= 6 ) {
		
			//basic
			$title            = $arr[ 'title' ];
			$form_id          = $arr[ 'form_id' ];
			$cid            = $arr[ 'content_id' ];
			$sid              = $arr[ 'section_id' ];
			$fields_args      = $arr[ 'fields' ];
			$form_js_template = $arr[ 'js_template' ];
			$multi_columns    = false;
			$form_html        = '';
			$form_js          = '';
			$form_js_vars     = '';

			if ( is_array( $fields_args ) ) {

				foreach( $fields_args as $v ) :
					if ( isset( $v[ 'title' ] ) && !empty( $v[ 'title' ] ) ) {
						$multi_columns = true;
						break;
						
					}
				endforeach;
				
				if ( $multi_columns ) $form_html .= UixSCFormCore::form_before( $cid, $sid, $form_id );
				
				foreach( $fields_args as $v ) :
					$column_title = '';
					if ( isset( $v[ 'title' ] ) && !empty( $v[ 'title' ] ) ) {
						$column_title  = $v[ 'title' ];
					}
					
					$form_html    .= UixSCFormCore::add_form( $cid, $sid, $form_id, $v[ 'type' ], $v[ 'values' ], 'html', $column_title );
					$form_js      .= UixSCFormCore::add_form( $cid, $sid, $form_id, $v[ 'type' ], $v[ 'values' ], 'js' );
					$form_js_vars .= UixSCFormCore::add_form( $cid, $sid, $form_id, $v[ 'type' ], $v[ 'values' ], 'js_vars' );
	
				endforeach;
				
				if ( $multi_columns ) $form_html .= UixSCFormCore::form_after();
				

			}
			
			
			
			//clone
			$clone                       = $arr[ 'clone' ];
			$clone_enable                = false;
			$clone_trigger_id            = '';
			$clone_max                   = 1;
			$clone_fields_group          = '';
		

			if ( is_array( $clone ) && sizeof( $clone ) >= 1 ) {
				$clone_enable                = true;
				$clone_fields_group          = $clone[ 'fields_group' ];

				if ( isset( $clone[ 'max' ] ) ) {
					$clone_max = $clone[ 'max' ];
				}
	
			}



			// ---------- Returns actions of javascript
			if ( $sid == -1 && is_admin() ) {
				$currentScreen = get_current_screen();
				if( $currentScreen->base === "post" || $currentScreen->base === "widgets" || $currentScreen->base === "customize" || UixSCFormCore::inc_str( $currentScreen->base, '_page_' ) ) {
				
						//List Item - Register clone vars ( step 1)
						if ( $clone_enable && is_array( $clone_fields_group ) ) {
						
							foreach( $clone_fields_group as $v ) :
								
								$clone_fields        = $v[ 'fields' ];
								$clone_trigger_id    = $v[ 'trigger_id' ];
								$clone_fields_value  = '';
								
								
								foreach( $clone_fields as $name ) :
									
									$toggle = '';
									if( self::inc_str( $name, '_toggle' ) && !self::inc_str( $name, '_toggle_' ) ) {
										$toggle = 'toggle';
									}
									if( self::inc_str( $name, '_toggle_' ) ) {
										$toggle = 'toggle-row';
									}								
									
									$clone_fields_value .= UixSCFormCore::dynamic_form_code( 'dynamic-row-'.$name.'', $form_html, $toggle );
							
								endforeach;

								UixSCFormCore::reg_clone_vars( $clone_trigger_id, $clone_fields_value );
								
							endforeach;
						
						}


						?>
						<script type="text/javascript">
						( function($) {
						'use strict';
							$( function() { 
								<?php
					             echo UixSCFormCore::uixscform_callback( $form_js, $form_id, $title );
					             echo UixSCFormCore::send_before( $form_js_vars, $form_id );
					             echo $form_js_template; //Custom shortcode
					             echo UixSCFormCore::send_after( $form_id );
					            ?>
						} ) ( jQuery );
						</script>
						<?php

				}

			}


			// ---------- Returns form with ajax
			if ( $sid >= 0 && is_admin() ) {
				echo $form_html;	
			}
			
			
		}
	

	}


	
	
	
}

add_action( 'plugins_loaded', array( 'UixShortcodes', 'init' ) );

