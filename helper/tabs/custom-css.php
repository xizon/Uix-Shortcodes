<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}


// variables for the field and option names 
$hidden_field_name = 'submit_hidden_uix_sc_customcss';



// If they did, this hidden field will be set to 'Y'
if( isset($_POST[ $hidden_field_name ]) && $_POST[ $hidden_field_name ] == 'Y' ) {
	
	// Just security thingy that wordpress offers us
	check_admin_referer( 'uix_sc_customcss' );
	
	// Only if administrator
	if( current_user_can( 'administrator' ) ) {
		
		
		update_option( 'uix_sc_opt_cssnewcode', wp_unslash( $_POST[ 'uix_sc_opt_cssnewcode' ] ) );
	
	
		// Put a "settings saved" message on the screen
		echo '<div class="updated"><p><strong>'.__('Settings saved.', 'uix-shortcodes' ).'</strong></p></div>';

	
	}
	
	
	

 }  


if( isset( $_GET[ 'tab' ] ) && $_GET[ 'tab' ] == 'custom-css' ) {
	

	$newFilePath                 = get_stylesheet_directory() . '/uix-shortcodes-custom.css';
	$newFilePath2                = get_stylesheet_directory() . '/assets/css/uix-shortcodes-custom.css';
	$newJSFilePath               = get_stylesheet_directory() . '/uix-shortcodes-custom.js';
	$newJSFilePath2              = get_stylesheet_directory() . '/assets/js/uix-shortcodes-custom.js';
	$org_cssname_uix_shortcodes   = UixShortcodes::core_css_file( 'name' );
	$org_csspath_uix_shortcodes   = UixShortcodes::core_css_file();
	$org_jsname_uix_shortcodes    = UixShortcodes::core_js_file( 'name' );
	$org_jspath_uix_shortcodes    = UixShortcodes::core_js_file();

	if ( file_exists( $newFilePath ) || file_exists( $newFilePath2 ) || file_exists( $newJSFilePath ) || file_exists( $newJSFilePath2 ) ) {
		$filetype = 'theme';
		
		//CSS file directory
		$filepath = '';
		if ( file_exists( $newFilePath2 ) ) {
			$filepath = 'assets/css/';
		}
		
		//Javascript file directory
		$jsfilepath = '';
		if ( file_exists( $newJSFilePath2 ) ) {
			$jsfilepath = 'assets/js/';
		}	
		
		
	} else {
		$filetype   = 'plugin';
		
		//CSS file directory
		$filepath   = 'assets/css/';
		
		//Javascript file directory
		$jsfilepath = 'assets/js/';
	}
	
?>

    <form method="post" action="">
    
        <input type="hidden" name="<?php echo $hidden_field_name; ?>" value="Y">
        <?php wp_nonce_field( 'uix_sc_customcss' ); ?>
        
		<p class="uix-bg-custom-desc">
		   <?php _e( '1) Making a new Cascading Style Sheet (CSS) document which name to <strong>uix-shortcodes-custom.css</strong> to your templates directory ( <code>/wp-content/themes/{your-theme}/</code> or <code>/wp-content/themes/{your-theme}/assets/css/</code> ). You can connect to your site via an FTP client, make the changes and then upload the file back to the server. Once you have created an existing CSS file, Uix Shortcodes will use it as a default style sheet instead of the "<a href="'.$org_csspath_uix_shortcodes.'" target="_blank"><strong>uix-shortcodes.css</strong></a>" to your WordPress Theme. Of course, Uix Shortcodes\'s function of "Custom CSS" is still valid.', 'uix-shortcodes' ); ?>

		</p>    
		<p class="uix-bg-custom-desc">
		   <?php _e( '2) Making a new javascrpt (.js) document which name to <strong>uix-shortcodes-custom.js</strong> to your templates directory ( <code>/wp-content/themes/{your-theme}/</code> or <code>/wp-content/themes/{your-theme}/assets/js/</code> ). Once you have created an existing JS file, Uix Shortcodes will use it as a default script instead of the "<a href="'.$org_jspath_uix_shortcodes.'" target="_blank"><strong>uix-shortcodes.js</strong></a>" to your WordPress Theme.', 'uix-shortcodes' ); ?>

		</p>    
            
        <table class="form-table">
          <tr>
            <th scope="row">
              <?php _e( 'Paste your CSS code', 'uix-shortcodes' ); ?>
              <hr>
              <p class="uix-bg-custom-desc-note"><?php _e( 'You could add new styles code to your website, without modifying original .css files.', 'uix-shortcodes' ); ?></p>
            </th>
            <td>
              <textarea name="uix_sc_opt_cssnewcode" class="regular-text" rows="25" style="width:98%;"><?php echo esc_textarea( get_option( 'uix_sc_opt_cssnewcode' ) ); ?></textarea>
            </td>
          </tr>
        </table> 
        
          
<?php


	
	// capture output from WP_Filesystem
	ob_start();
	
		UixShortcodes::wpfilesystem_read_file( 'uix_sc_customcss', 'admin.php?page='.UixShortcodes::CUSPAGE.'&tab=custom-css', $filepath, $org_cssname_uix_shortcodes, $filetype );
		$filesystem_uix_shortcodes_out = ob_get_contents();
	ob_end_clean();
	
	if ( empty( $filesystem_uix_shortcodes_out ) ) {
		
		$style_org_code_uix_shortcodes = UixShortcodes::wpfilesystem_read_file( 'uix_sc_customcss', 'admin.php?page='.UixShortcodes::CUSPAGE.'&tab=custom-css', $filepath, $org_cssname_uix_shortcodes, $filetype );
		
		echo '
		
		         <p>'.__( 'CSS file root directory:', 'uix-shortcodes' ).' 
				     <a href="javascript:" id="uix_shortcodes_view_css" >'.$org_csspath_uix_shortcodes.'</a>
					 <div class="uix-shortcodes-dialog-mask"></div>
					 <div class="uix-shortcodes-dialog" id="uix-shortcodes-view-css-container">  
						<textarea rows="15" style=" width:95%;" class="regular-text">'.$style_org_code_uix_shortcodes.'</textarea>
						<a href="javascript:" id="uix_shortcodes_close_css" class="close button button-primary">'.__( 'Close', 'uix-shortcodes' ).'</a>  
					</div>
				 </p><hr />
				<script type="text/javascript">
					
				( function($) {
					
					"use strict";
					
					$( function() {
						
						var dialog_uix_shortcodes = $( "#uix-shortcodes-view-css-container, .uix-shortcodes-dialog-mask" );  
						
						$( "#uix_shortcodes_view_css" ).click( function() {
							dialog_uix_shortcodes.show();
						});
						$( "#uix_shortcodes_close_css" ).click( function() {
							dialog_uix_shortcodes.hide();
						});
					
			
					} );
					
				} ) ( jQuery );
				
				</script>
		
		';	

	} else {
		
		echo '
		         <p>'.__( 'CSS file root directory:', 'uix-shortcodes' ).' 
				     <a href="'.$org_csspath_uix_shortcodes.'" target="_blank">'.$org_csspath_uix_shortcodes.'</a>
				 </p><hr />

		';	
		
		
	}
?>
        
        
        <?php submit_button(); ?>

    
    </form>


    
<?php } ?>