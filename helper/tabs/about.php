<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

if( !isset( $_GET[ 'tab' ] ) || $_GET[ 'tab' ] == 'about' ) {
?>


        <p>
           <?php _e( 'Uix Shortcodes brings an amazing set of beautiful and useful elements to your site that lets you do nifty things with very little effort. It makes it easy and quick to add the shortcode you need to achieve the page layout or function you desire. It provides easy to use over 26+ shortcodes. Currently, Uix Shortcodes supports: <code>"container"</code>, <code>"parallax"</code>, <code>"image slider"</code>, <code>"timeline"</code>, <code>"columns"</code>, <code>"buttons"</code>, <code>"progress bar"</code>, <code>"google maps"</code>, <code>"special heading"</code>, <code>"pricing table"</code>, <code>"icons"</code>, <code>"features boxes"</code>, <code>"testimonials carousel"</code>, <code>"team"</code>, <code>"list of clients"</code>, <code>"responsive video"</code>, <code>"audio"</code>, <code>"accordion"</code>, <code>"dividing line"</code>, <code>"tabs"</code>, <code>"code with highlighter"</code>, <code>"share buttons"</code>, <code>"contact form(use commenting form template)"</code>, <code>"portfolio(support lightbox)"</code>, <code>"recent posts with custom template"</code> and <code>"author card"</code>.', 'uix-shortcodes' ); ?>
        </p> 
        <p>
           <?php _e( 'The content elements are the heart of any page builder. These are the elements shortcodes that come with theme. You may customize the shortcode by changing/adding the parameters. <strong>"Content Shortcode"</strong>, <strong>"Column Shortcode"</strong>, <strong>"Web Elements Shortcode"</strong>, <strong>"Container Shortcode"</strong>, and so on. They could be used together.', 'uix-shortcodes' ); ?>
        </p>  
        
         <p>
           <?php _e( 'The Uix Shortcodes consists of several core features that are key to support multi-style switch. According to current progress, some styles can be summarized as follows: <strong>Elegant (default), Slant, Rich.</strong>', 'uix-shortcodes' ); ?>
        </p>         
        
         <p>
           <?php _e( 'A variety of optional styles are available for Uix ShortCodes. Go to **"Uix ShortCodes -> Settings -> General Settings"**, you can choose the shortcodes style you want.', 'uix-shortcodes' ); ?>
        </p>  

                   

          <p>
            <?php 
				$embed_code = wp_oembed_get('https://www.youtube.com/watch?v=8bX2vyA5iT4', array('width'=>560, 'height'=>315 )); 
				echo $embed_code;										 
			  ?>
        
        </p>   

       
        <hr>
         <p>
           <?php _e( '<strong>If you like this plugin, you could sponsor me. I can spend less time thinking about private monetization channels and instead work more on content that benefits the Uix Shortcodes, e.g. more functions, shortcode themes, videos and extensions! Thanks.</strong>', 'uix-shortcodes' ); ?>
        </p>        
		<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">
		<input type="hidden" name="cmd" value="_s-xclick">
		<input type="hidden" name="hosted_button_id" value="9RTA29RH9Q8YW">
		<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_SM.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
		</form>         
                    





<?php } ?>