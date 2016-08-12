<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}


// variables for the field and option names 
$hidden_field_name = 'submit_hidden_icontype';

//---
$uix_sc_opt_icontype = 'uix_sc_opt_icontype';
$icontype_uix_shortcodes = get_option( $uix_sc_opt_icontype, 'fontawesome' );

	
// If they did, this hidden field will be set to 'Y'
if( isset($_POST[ $hidden_field_name ]) && $_POST[ $hidden_field_name ] == 'Y' ) {
	// Read their posted value
	$icontype_uix_shortcodes = $_POST[ 'uix_sc_opt_icontype' ];
	

	// Save the posted value in the database
	update_option( $uix_sc_opt_icontype, $icontype_uix_shortcodes );


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
                <p><label>
                    <input name="uix_sc_opt_icontype" type="radio" value="fontawesome" class="tog"  <?php if ( $icontype_uix_shortcodes == 'fontawesome' ){ echo 'checked="checked"';}; ?> />
                    Font Awesome	</label>
                </p>
                
                 <p><label>
                    <input name="uix_sc_opt_icontype" type="radio" value="flaticon" class="tog"  <?php if ( $icontype_uix_shortcodes == 'flaticon' ){ echo 'checked="checked"';}; ?> />
                    Flaticon	</label>
                </p>        
            </td>
          </tr>
        </table> 
        

        <?php submit_button(); ?>

    
    </form>


    
<?php } ?>