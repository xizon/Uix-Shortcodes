<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

if( isset( $_GET[ 'tab' ] ) && $_GET[ 'tab' ] == 'usage' ) {
?>


        <p>
           <?php _e( '<h4 class="uix-bg-custom-title">1. After activating your theme, you can see a prompt pointed out as absolutely critical. Go to <strong>"Appearance -> Install Plugins"</strong>.
Or, upload the plugin to wordpress, Activate it. (Access the path (/wp-content/plugins/) And upload files there.)</h4>', 'uix-shortcodes' ); ?>
        </p>  
        <p>
           <img src="<?php echo UixShortcodes::plug_directory(); ?>helper/img/plug.jpg" alt="">
        </p> 
        <p>
           <?php _e( '<h4 class="uix-bg-custom-title">2. Go to your WordPress admin panel, edit or create a new post (or page). You’ll see our tiny little button in the toolbar, preceded by a separator:</h4>', 'uix-shortcodes' ); ?>
  
        </p>  
        <p>
           <img src="<?php echo UixShortcodes::plug_directory(); ?>helper/img/button.jpg" alt="">
        </p> 
        <p>
           <?php _e( '<h4 class="uix-bg-custom-title">3. You can overview the original styles to overwrite it. It will be on creating new styles to your website, without modifying original .css files. Go to "Uix Shortcodes" in the WordPress Administration Screens, then link to a specific tab like "Custom CSS". <br><a class="button button-primary" href="' . admin_url( "admin.php?page=".UixShortcodes::CUSPAGE ) . '&tab=custom-css">Add custom stylesheets by clicking here</a></h4>', 'uix-shortcodes' ); ?>
  
        </p> 
        
        <blockquote class="uix-bg-custom-blockquote">
			<p class="uix-bg-custom-desc">
			   <?php _e( 'There is a second way, make a new Cascading Style Sheet (CSS) document which name to <strong>uix-shortcodes-style.css</strong> to your templates directory ( <code>/wp-content/themes/{your-theme}/</code> or <code>/wp-content/themes/{your-theme}/assets/css/</code> ). You can connect to your site via an FTP client, make the changes and then upload the file back to the server. Once you have created an existing CSS file, Uix Shortcodes will use it as a default style sheet to your WordPress Theme. Of course, Uix Shortcodes\'s function of "Custom CSS" is still valid.', 'uix-shortcodes' ); ?>

			</p>    
			<p class="uix-bg-custom-desc">
			   <?php _e( '<b>Note:<b> Making a new javascrpt (.js) document which name to <strong>uix-shortcodes-custom.js</strong> to your templates directory ( <code>/wp-content/themes/{your-theme}/</code> or <code>/wp-content/themes/{your-theme}/assets/js/</code> ). Once you have created an existing JS file, Uix Shortcodes will use it as a default script to your WordPress Theme.', 'uix-shortcodes' ); ?>

			</p>
        </blockquote>        
        
      
       
<?php } ?>