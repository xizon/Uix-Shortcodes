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
	

?>

    <form method="post" action="">
    
        <input type="hidden" name="<?php echo $hidden_field_name; ?>" value="Y">
        <?php wp_nonce_field( 'uix_sc_customcss' ); ?>
        
        <h4><?php _e( 'You can overview the original styles to overwrite it. It will be on creating new styles to your website, without modifying original <code>.css</code> files.', 'uix-shortcodes' ); ?></h4>
            
        <table class="form-table">
          <tr>
            <th scope="row">
              <?php _e( 'Paste your CSS code', 'uix-shortcodes' ); ?>
            </th>
            <td>
              <textarea name="uix_sc_opt_cssnewcode" class="regular-text" rows="25" style="width:98%;"><?php echo esc_textarea( get_option( 'uix_sc_opt_cssnewcode' ) ); ?></textarea>
            </td>
          </tr>
        </table> 
        
          
<?php

	
	$newFilePath                = get_stylesheet_directory() . '/uix-shortcodes-custom.css';
	$newFilePath2               = get_stylesheet_directory() . '/assets/css/uix-shortcodes-custom.css';
	$org_cssname_uix_shortcodes = UixShortcodes::core_css_file( 'name' );
	$org_csspath_uix_shortcodes = UixShortcodes::core_css_file();
	
	if ( UixShortcodes::core_css_file_exists() ) {
		$filetype = 'theme';
		
		//CSS file directory
		$filepath = '';
		
		if ( file_exists( $newFilePath2 ) ) {
			$filepath = 'assets/css/';
		}
		
	} else {
		$filetype = 'plugin';
		$filepath = 'assets/css/';
	}


	
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