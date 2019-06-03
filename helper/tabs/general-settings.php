<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}


// variables for the field and option names 
$hidden_field_name = 'submit_hidden_uix_sc_generalsettings';

	
// If they did, this hidden field will be set to 'Y'
if( isset($_POST[ $hidden_field_name ]) && $_POST[ $hidden_field_name ] == 'Y' ) {

	// Just security thingy that wordpress offers us
	check_admin_referer( 'uix_sc_generalsettings' );
	
	// Only if administrator
	if( current_user_can( 'administrator' ) ) {
		
		$uix_sc_opt_map_api   = sanitize_text_field( $_POST[ 'uix_sc_opt_map_api' ] );
		$uix_sc_opt_icontype  = sanitize_text_field( $_POST[ 'uix_sc_opt_icontype' ] );
		$uix_sc_opt_style     = sanitize_text_field( $_POST[ 'uix_sc_opt_style' ] );
		
		// Save the posted value in the database
		update_option( 'uix_sc_opt_map_api', $uix_sc_opt_map_api );
		update_option( 'uix_sc_opt_icontype', $uix_sc_opt_icontype );
		update_option( 'uix_sc_opt_style', $uix_sc_opt_style );
		
	
		// Put a "settings saved" message on the screen
		echo '<div class="updated"><p><strong>'.__('Settings saved.', 'uix-shortcodes' ).'</strong></p></div>';

		
	}


 }  


if( isset( $_GET[ 'tab' ] ) && $_GET[ 'tab' ] == 'general-settings' ) {
	
?>

    <form method="post" action="">
    
        <input type="hidden" name="<?php echo $hidden_field_name; ?>" value="Y">
        <?php wp_nonce_field( 'uix_sc_generalsettings' ); ?>
  
        <table class="form-table">
			
			
          <tr>
            <th scope="row">
              <?php _e( 'Google Map Settings', 'uix-shortcodes' ); ?>
				
            </th>
            <td>
                <p>
                    <label>
                        <input name="uix_sc_opt_map_api" type="text" size="50" value="<?php echo esc_attr( get_option( 'uix_sc_opt_map_api', '' ) ); ?>"/>
                        <?php _e( 'API Key', 'uix-shortcodes' ); ?>
                    </label>
                </p>
                
				<p>
				<?php
				   printf( __( '<a href="%1$s" target="_blank">How to 
Get an API Key?</a> If left blank, the default Key will be used, but it will have a traffic excess problem that will not display properly. <br><strong>You can also specify the Key separately when using the map module.</strong>', 'uix-shortcodes' ), esc_url( '//developers.google.com/maps/documentation/javascript/get-api-key' ) );   
				   ?>
				</p>

              
				
            </td>
             
            
          </tr>	
			
			
          <tr>
            <th scope="row">
              <?php _e( 'Icon Types', 'uix-shortcodes' ); ?>
              
            </th>
            <td>
                <p>
                    <label>
                        <input name="uix_sc_opt_icontype" type="radio" value="fontawesome" class="tog" <?php echo ( get_option( 'uix_sc_opt_icontype' ) == 'fontawesome' || !get_option( 'uix_sc_opt_icontype' ) ) ? 'checked' : ''; ?> />
                        <?php _e( 'Font Awesome', 'uix-shortcodes' ); ?>
                    </label>
                </p>
                
                <p>
                    <label>
                        <input name="uix_sc_opt_icontype" type="radio" value="flaticon" class="tog" <?php echo ( get_option( 'uix_sc_opt_icontype' ) == 'flaticon' ) ? 'checked' : ''; ?> />
                        <?php _e( 'Flaticon', 'uix-shortcodes' ); ?>
                    </label>
                </p>       
            </td>
             
            
          </tr>
          <?php
		  if ( UixShortcodes::core_css_file_exists() ) {
			  $stylechoose = 'style="display:none"';
		  } else {
			  $stylechoose = '';  
		  }
		  ?>
          <tr class="uix-field-custom-style" <?php echo $stylechoose; ?>>
            <th scope="row">
              <?php _e( 'Choose The Shortcodes Style', 'uix-shortcodes' ); ?>
              
            </th>
         
            <td>
               
                    <label>
                        <input name="uix_sc_opt_style" type="radio" value="elegant" class="tog" <?php echo ( get_option( 'uix_sc_opt_style' ) == 'elegant' || !get_option( 'uix_sc_opt_style' ) ) ? 'checked' : ''; ?> /> 
                        <span class="sp-con">
                             <img src="<?php echo UixShortcodes::plug_directory(); ?>assets/images/themes/elegant.png" alt="">
                            <span class="title"><?php _e( 'Elegant (default)', 'uix-shortcodes' ); ?></span>
                        </span>
                    </label>
               
                    <label>
                        <input name="uix_sc_opt_style" type="radio" value="slant" class="tog" <?php echo ( get_option( 'uix_sc_opt_style' ) == 'slant' ) ? 'checked' : ''; ?> />
                        <span class="sp-con">
                            <img src="<?php echo UixShortcodes::plug_directory(); ?>assets/images/themes/slant.png" alt="">
                            <span class="title"><?php _e( 'Slant', 'uix-shortcodes' ); ?></span>
                        </span>
                        
                    </label>
                    
                     <label>
                        <input name="uix_sc_opt_style" type="radio" value="rich" class="tog" <?php echo ( get_option( 'uix_sc_opt_style' ) == 'rich' ) ? 'checked' : ''; ?> />
                        <span class="sp-con">
                            <img src="<?php echo UixShortcodes::plug_directory(); ?>assets/images/themes/rich.png" alt="">
                            <span class="title"><?php _e( 'Rich', 'uix-shortcodes' ); ?></span>
                        </span>
                        
                    </label>        
                    
                    
            </td>         
            
          </tr>
        </table> 
        

        <?php submit_button(); ?>

    
    </form>


    
<?php } ?>