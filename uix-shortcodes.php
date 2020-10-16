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
 * Version:     1.9.0
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
	public static function disabled() {
        return false;
    }
    
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
        add_action( 'init', array( __CLASS__, 'do_my_shortcodes' ) );
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
		require_once UIX_SHORTCODES_PLUGIN_DIR.'includes/uixscform/init.php';
		
		//Enable gutenberg settings for Uix Shortcodes
		require_once UIX_SHORTCODES_PLUGIN_DIR.'includes/admin/block-init.php';
		
		//Add custom meta boxes API. 
		//Provides a compatible solution for some personalized themes that require Uix Shortcodes.
		require_once UIX_SHORTCODES_PLUGIN_DIR.'includes/admin/uix-custom-metaboxes/init.php';
		require_once UIX_SHORTCODES_PLUGIN_DIR.'includes/admin/uix-custom-metaboxes/controller-upload.php';
		
	}
	
	
	/*
	 * Register scripts and styles.
	 *
	 *
	 */
	public static function register_scripts() {
		
		
		//Add-ons
		//--------------------
		// Easy Pie Chart
		wp_register_script( 'easypiechart', self::plug_directory() .'assets/add-ons/piechart/jquery.easypiechart.min.js', array( 'jquery' ), '2.1.7', true );

		// prettyPhoto
		wp_register_script( 'prettyPhoto', self::plug_directory() .'assets/add-ons/prettyPhoto/jquery.prettyPhoto.js', array( 'jquery' ), '3.1.5', true );
		wp_register_style( 'prettyPhoto', self::plug_directory() .'assets/add-ons/prettyPhoto/jquery.prettyPhoto.css', false, '3.1.5', 'all' );
				
		// SyntaxHighlighter
		wp_register_script( 'syntaxhighlighter-core', self::plug_directory() .'assets/add-ons/syntaxhighlighter/scripts/shCore.js', false, '3.0.83', true );
		wp_register_script( 'syntaxhighlighter-autoloader', self::plug_directory() .'assets/add-ons/syntaxhighlighter/scripts/shAutoloader.js', false, '3.0.83', true );
		wp_register_style( 'syntaxhighlighter', self::plug_directory() .'assets/add-ons/syntaxhighlighter/styles/shCoreDefault.css', false, '3.0.83', 'all' );
		
		// Muuri
		wp_register_script( 'muuri', self::plug_directory() .'assets/add-ons/muuri/muuri.min.js', false, '0.8.0', true );
		
		
		
		//Core
		//--------------------		
		// Add shortcodes style to Front-End
		wp_register_style( self::PREFIX . '-shortcodes', self::core_css_file(), false, self::ver(), 'all' );
	    wp_register_style( self::PREFIX . '-shortcodes-rtl', self::to_rtl_css( self::core_css_file() ), false, self::ver(), 'all' );
		
	
		// Main stylesheets and scripts to Front-End
		wp_register_script( self::PREFIX . '-shortcodes', self::core_js_file(), array( 'jquery' ), self::ver(), true );
		wp_localize_script( self::PREFIX . '-shortcodes',  'wp_plug_uixsc_root_path', array( 
			'templateUrl'   => get_stylesheet_directory_uri(),
			'uixScRootUrl'  => self::plug_directory()
		 ) );
		
		// Admin panel stylesheets
		wp_register_style( self::PREFIX . '-shortcodes-editor', self::plug_directory() .'shortcodes/editor/style.min.css', false, self::ver(), 'all' );


	}
	
	
	/*
	 * Enqueue scripts and styles.
	 *
	 *
	 */
	public static function frontpage_scripts() {

		
		//Add-ons
		//--------------------
		wp_enqueue_script( 'imagesloaded' );
		wp_enqueue_script( 'muuri' ); //Use with `imagesloaded`
		wp_enqueue_script( 'easypiechart' );
		wp_enqueue_script( 'prettyPhoto' );
		wp_enqueue_style( 'prettyPhoto' );
		wp_enqueue_script( 'syntaxhighlighter-core' );
		wp_enqueue_script( 'syntaxhighlighter-autoloader' );
		wp_enqueue_style( 'syntaxhighlighter' );
		
		
		//Core
		//--------------------
		wp_enqueue_style( self::PREFIX . '-shortcodes' );
		//RTL		
		if ( is_rtl() ) {
			wp_enqueue_style( self::PREFIX . '-shortcodes-rtl' );
		}
		
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
                 
				  
					//Add-ons
					//--------------------
					wp_enqueue_script( 'imagesloaded' );
					wp_enqueue_script( 'muuri' ); //Use with `imagesloaded`
					wp_enqueue_script( 'easypiechart' );
					wp_enqueue_script( 'prettyPhoto' );
					wp_enqueue_style( 'prettyPhoto' );



					//Core
					//--------------------
					wp_enqueue_style( self::PREFIX . '-shortcodes' );
					//RTL		
					if ( is_rtl() ) {
						wp_enqueue_style( self::PREFIX . '-shortcodes-rtl' );
					}
				  
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
				  wp_enqueue_style( self::PREFIX . '-shortcodes-editor' ); 
	  
			  } 
			  
			  
		  }
		  

	}

		
	/*
	 * Returns RTL stylesheet name or directory
	 *
	 *
	 */
	public static function to_rtl_css( $str ) {	
		return str_replace( '.css', '-rtl.css', $str );
	}
	
	
	/*
	 * Call the specified form  [Use for theme]
	 *
	 *
	 */
	public static function call_form( $name ) {
		
		$newname = $name;
		
		switch ( $name ) {
			case 'container':
				$newname = 'uix_sc_module_container';
				break;				
			case 'pricing-3-col':
				$newname = 'uix_sc_module_pricing_col3';
				break;
			case 'pricing-4-col':
				$newname = 'uix_sc_module_pricing_col4';
				break;
			case 'features-2-col':
				$newname = 'uix_sc_module_features_col2';
				break;
			case 'features-3-col':
				$newname = 'uix_sc_module_features_col3';
				break;
			case 'team-grid':
				$newname = 'uix_sc_module_team_grid';
				break;
			case 'team-fullwidth':
				$newname = 'uix_sc_module_team_fullwidth';
				break;
			case 'progress-bar':
				$newname = 'uix_sc_module_bar';
				break;
			case 'testimonials':
				$newname = 'uix_sc_module_testimonials';
				break;
			case 'map':
				$newname = 'uix_sc_module_map';
				break;
			case 'heading':
				$newname = 'uix_sc_module_heading';
				break;
			case 'video':
				$newname = 'uix_sc_module_video';
				break;
			case 'tabs':
				$newname = 'uix_sc_module_tabs';
				break;	
			case 'share-buttons':
				$newname = 'uix_sc_module_share_buttons';
				break;	
			case 'recent-posts':
				$newname = 'uix_sc_module_recent_posts';
				break;	
			case 'portfolio':
				$newname = 'uix_sc_module_portfolio_grid';
				break;					
			case 'icon':
				$newname = 'uix_sc_module_icon';
				break;	
			case 'code':
				$newname = 'uix_sc_module_code';
				break;	
			case 'client':
				$newname = 'uix_sc_module_client';
				break;		
			case 'button':
				$newname = 'uix_sc_module_button';
				break;		
			case 'authorcard':
				$newname = 'uix_sc_module_authorcard';
				break;			
			case 'audio':
				$newname = 'uix_sc_module_audio';
				break;				
			case 'accordion':
				$newname = 'uix_sc_module_accordion';
				break;			
			case 'dividing-line':
				$newname = 'uix_sc_module_dividing_line';
				break;	
			case 'contact-form':
				$newname = 'uix_sc_module_contact_form';
				break;
			case 'timeline':
				$newname = 'uix_sc_module_timeline';
				break;	
			case 'imageslider':
				$newname = 'uix_sc_module_imageslider';
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
			$default_dir      = UIX_SHORTCODES_PLUGIN_DIR.'shortcodes/templates/default/modules/';
			$cur_dir          = UIX_SHORTCODES_PLUGIN_DIR.'shortcodes/templates/'.$shortcodes_style.'/modules/';
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
	 * Returns current shortcode templates panel directory URL.
	 *
	 *
	 */
	public static function templates_panel_directory_URL( $front = false ) {
	
		//shortcodes themes
		$shortcodes_style = self::theme();
		
		if ( !$front ) {
			$default_dir      = UIX_SHORTCODES_PLUGIN_URL.'shortcodes/templates/default/modules/';
			$cur_dir          = UIX_SHORTCODES_PLUGIN_URL.'shortcodes/templates/'.$shortcodes_style.'/modules/';
		} else {
			$default_dir      = UIX_SHORTCODES_PLUGIN_URL.'shortcodes/templates/default/';
			$cur_dir          = UIX_SHORTCODES_PLUGIN_URL.'shortcodes/templates/'.$shortcodes_style.'/';	
		}

		

		if( is_dir( UIX_SHORTCODES_PLUGIN_URL.'shortcodes/templates/'.$shortcodes_style ) ) {
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
        
        //move language files to System folder "languages/plugins/yourplugin-<locale>.po"
        global $wp_filesystem;

        if ( empty( $wp_filesystem ) ) {
            require_once (ABSPATH . '/wp-admin/includes/file.php');
            WP_Filesystem();
        }

        $filenames = array();
        $filepath = UIX_SHORTCODES_PLUGIN_DIR.'languages/';
        $systempath = WP_CONTENT_DIR . '/languages/plugins/';

        if ( !$wp_filesystem->is_dir( $systempath ) ) {
            $wp_filesystem->mkdir( $systempath, FS_CHMOD_DIR );
        }//endif is_dir( $systempath ) 
            
        if ( $wp_filesystem->is_dir( $systempath ) ) {
            
            //Only execute one-time scripts
            $transient = self::PREFIX . '-shortcodes-lang_files_onetime_check';
            if ( !get_transient( $transient ) ) {

                set_transient( $transient, 'locked', 1800 ); // lock function for 30 Minutes


                foreach(glob(dirname(__FILE__)."/languages/*.po") as $file) {
                    $filenames[] = str_replace(dirname(__FILE__)."/languages/", '', $file);
                }

                foreach(glob(dirname(__FILE__)."/languages/*.mo") as $file) {
                    $filenames[] = str_replace(dirname(__FILE__)."/languages/", '', $file);
                }

                foreach ($filenames as $filename) {

                    // Copy
                    $dir1 = $wp_filesystem->find_folder($filepath);
                    $file1 = trailingslashit($dir1).$filename;

                    $dir2 = $wp_filesystem->find_folder($systempath);
                    $file2 = trailingslashit($dir2).$filename;

                    $filecontent = $wp_filesystem->get_contents($file1);

                    $wp_filesystem->put_contents($file2, $filecontent, FS_CHMOD_FILE);  

                }
                



            }//endif get_transient( $transient )

            
        }//endif is_dir( $systempath )   
		

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
	public static function cat_list( $str, $classprefix = 'uix-sc-portfolio__' ) {

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
				
				
                  $output = UixShortcodes::wpfilesystem_write_file( 'custom_action_nonce', 'admin.php?page='.UixShortcodes::CUSPAGE.'&tab=???', 'helper/', 'debug.txt', 'This is test.' );
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
			  $contentdir = trailingslashit( get_stylesheet_directory() ).$path; 
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
	 * Output a string of attributes in the shortcode with HTML
	 *
	 *
	 */
	public static function decode_shortcode_htmlAttr( $str ) {
	
		return  str_replace( '&lt;', "<",	
				str_replace( '&gt;', ">",	
				str_replace( '&amp;#91;', "[",	
				str_replace( '&amp;#93;', "]",			
				$str 
				) ) ) );
		
	}
			
	
	
	/*
	 * Callback function of "do shortcodes"
	 *
	 * Avoid being escaped in different editors.
	 *
	 * @since 0.2.1
	 */
	public static function do_callback( $str ) {
	
		//Filters a string cleaned and escaped for output
		$str =  str_replace( ']</p>', "]",	
				str_replace( '<p>[', "[", 		
				str_replace( '&amp;#39;', "&#39;", 	   
				str_replace( '&amp;#34;', "&#34;", 
				str_replace( '&amp;#91;', "&#91;",			   
				str_replace( '&amp;#93;', "&#93;",	
				str_replace( '&amp;nbsp;', " ",
				str_replace( '&amp;#91;br&amp;#93;', "<br>",	
				$str 
				) ) ) ) ) ) ) );
		
		
		$value = do_shortcode( $str );

		
		 $searcharray[ 'sc_str' ] = array(
		   '[li]', '[/li]', '[ul]', '[/ul]', '[ol]', '[/ol]', '[s]', '[/s]', '[strong]', '[/strong]', '[b]', '[/b]', '[em]', '[/em]', '[i]', '[/i]', '[u]', '[/u]', '[del]', '[/del]', '[blockquote]', '[/blockquote]', '[p]', '[/p]', '[br]', '&#8243;', '&#8242;'
		
		  );
		  $replacearray[ 'sc_str' ] = array(
		   '<li>', '</li>', '<ul>', '</ul>', '<ol>', '</ol>', '<s>', '</s>', '<strong>', '</strong>', '<b>', '</b>', '<em>', '</em>', '<i>', '</i>', '<u>', '</u>', '<del>', '</del>', '<blockquote>', '</blockquote>', '<p>', '</p>', '<br>', '"', "'"
		  );  
		
		//Remove <br> or <br /> tags
		//Fixed a bug that if you create columns and add text with new lines it doesn’t show the line break.
		//@https://wordpress.org/support/topic/content-beak-tag/#post-11062590
		$value = preg_replace( '/((\>|\])(\s*?)\<br\s*\/>)+/', '>', $value );
		
		//Remove empty paragraph tags
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
	 * Determine whether the javascript core file exists
	 *
	 */
	public static function core_js_file_exists() {
		  $newFilePath      = get_stylesheet_directory() . '/uix-shortcodes-custom.js';
	      $newFilePath2     = get_stylesheet_directory() . '/assets/js/uix-shortcodes-custom.js';
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
			$validPath = get_stylesheet_directory_uri() . '/uix-shortcodes-custom.css';
			if ( $type == 'dir' ) {
				$validPath = get_stylesheet_directory() . '/uix-shortcodes-custom.css';
			}
		}
		
		
		if ( file_exists( $newFilePath2 ) ) {
			$validPath = get_stylesheet_directory_uri() . '/assets/css/uix-shortcodes-custom.css';
			if ( $type == 'dir' ) {
				$validPath = get_stylesheet_directory() . '/assets/css/uix-shortcodes-custom.css';
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
			$validPath = get_stylesheet_directory_uri() . '/uix-shortcodes-custom.js';
		}
		
	
		if ( file_exists( $newFilePath2 ) ) {
			$validPath = get_stylesheet_directory_uri() . '/assets/js/uix-shortcodes-custom.js';
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
	
	

	/**
	 * Checks whether we're currently loading a Gutenberg page
	 *
	 * @return boolean Whether Gutenberg is being loaded.
	 *
	 */
	public static function is_gutenberg_plug_page() {
		
		/*
		 * step 1.
		 * When I enable the classic editor, I set the block in the setting, but it can't be displayed.
		 * Only WP version >= 5.0
		 */
		if  ( version_compare( get_bloginfo( 'version' ), '5.0', '>=' ) ) {
			if ( true === function_exists( 'get_current_screen' ) && get_current_screen()->is_block_editor() ) {
				return true;
			}	
		}

		
		/*
		 * step 2.
		 * Whether the classic editor plugin is used.
		 */
		//for WordPress 5.0.x compatibility.
		if ( 
		    ( file_exists( WP_PLUGIN_DIR . '/classic-editor/classic-editor.php' ) && class_exists( 'Classic_Editor' ) ) ||
			isset( $_GET['classic-editor'] )
		) {
			return false;
		}

		//for Uix Plugins
		if ( get_post_type() == 'uix_products' || get_post_type() == 'uix-slideshow' ) {
			return false;
		}

		//for easy-digital-downloads
		if ( get_post_type() == 'download' ) {
			return false;
		}
		
		/*
		 * step 3.
		 * There have been reports of specialized loading scenarios where `get_current_screen`
		 * does not exist. In these cases, it is safe to say we are not loading Gutenberg.
		 */
		if ( true === function_exists( 'get_current_screen' ) && get_current_screen()->base !== 'post' ) {
			return false;
		}

		
		/*
		 * step 4.
		 * GUTENBERG core judgment.
		 */
		if ( false === defined( 'GUTENBERG_VERSION' ) && false === version_compare( get_bloginfo( 'version' ), '5.0', '>=' ) ) {
			return false;
		}
		
		return true;
	} // is_gutenberg_plug_page
	
	
	
			
	/**
	 * Filters content and keeps only allowable HTML elements.
	 *
	 */
	public static function kses( $html ){
		
		return wp_kses( $html, wp_kses_allowed_html( 'post' ) );

	}
	
	
}



//Not applicable to "Divi Builder pages", "Elementor"
$uix_shortcodes_plugin_init = 'init';

if ( isset( $_GET[ 'et_fb' ] ) ) $uix_shortcodes_plugin_init = 'disabled';
if ( isset( $_GET[ 'action' ] ) && $_GET[ 'action' ] == 'elementor' ) $uix_shortcodes_plugin_init = 'disabled';


add_action( 'plugins_loaded', array( 'UixShortcodes', $uix_shortcodes_plugin_init ) );
