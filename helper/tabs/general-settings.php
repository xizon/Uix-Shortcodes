<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}


// variables for the field and option names 
$hidden_field_name = 'submit_hidden_uix_sc_generalsettings';

	
// If they did, this hidden field will be set to 'Y'
if( isset($_POST[ $hidden_field_name ]) && $_POST[ $hidden_field_name ] == 'Y' ) {

	// Save the posted value in the database
	update_option( 'uix_sc_opt_icontype', $_POST[ 'uix_sc_opt_icontype' ] );


	// Put a "settings saved" message on the screen
	echo '<div class="updated"><p><strong>'.__('Settings saved.', 'uix-shortcodes' ).'</strong></p></div>';

 }  


if( isset( $_GET[ 'tab' ] ) && $_GET[ 'tab' ] == 'general-settings' ) {
	

?>

    <form name="form1" method="post" action="">
    
        <input type="hidden" name="<?php echo $hidden_field_name; ?>" value="Y">
  
        <table class="form-table">
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
        </table> 
        

        <?php submit_button(); ?>

    
    </form>


    
<?php } ?>