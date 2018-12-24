<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

if( isset( $_GET[ 'tab' ] ) && $_GET[ 'tab' ] == 'usage' ) {
?>

                   

          <p>
            <?php 
				$embed_code = wp_oembed_get('https://www.youtube.com/watch?v=8bX2vyA5iT4', array('width'=>560, 'height'=>315 )); 
				echo $embed_code;										 
			  ?>
        
        </p>   

        <p>
           <?php _e( '<h4 class="uix-bg-custom-title">1. After activating your theme, you can see a prompt pointed out as absolutely critical. Go to <strong>"Appearance -> Install Plugins"</strong>.
Or, upload the plugin to wordpress, Activate it. (Access the path (/wp-content/plugins/) And upload files there.)</h4>', 'uix-shortcodes' ); ?>
        </p>  

        <p>
           <?php _e( '<h4 class="uix-bg-custom-title">2. Go to your WordPress admin panel, edit or create a new post (or page). You’ll see our tiny little button in the toolbar, preceded by a separator:</h4>', 'uix-shortcodes' ); ?>
  
        </p>  
        <p>
           <img src="<?php echo UixShortcodes::plug_directory(); ?>helper/img/button.jpg" alt="">
        </p> 
        
        
        <p class="uix-bg-custom-desc">
           <?php _e( '<h4 class="uix-bg-custom-title">2-2. For Gutenberg. We should now be able to see our block in the <strong>Add Block</strong> menu.</h4>', 'uix-shortcodes' ); ?>
        </p>  
   
        <p>
           <img src="<?php echo UixShortcodes::plug_directory(); ?>helper/img/gutenberg-go.jpg" alt=""> 
        </p> 
            
        
        
        <p>
           <?php _e( '<h4 class="uix-bg-custom-title">3. You can overview the original styles to overwrite it. It will be on creating new styles to your website, without modifying original .css files. Go to "Uix Shortcodes" in the WordPress Administration Screens, then link to a specific tab like "Custom CSS".</h4>', 'uix-shortcodes' ); ?>
  
        </p> 
        
        <p>
           <?php _e( '<a class="button button-primary" href="' . admin_url( "admin.php?page=".UixShortcodes::CUSPAGE ) . '&tab=custom-css">Add custom stylesheets by clicking here</a>', 'uix-shortcodes' ); ?>
  
        </p>   
      
       
<?php } ?>