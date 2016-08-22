<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

if( isset( $_GET[ 'tab' ] ) && $_GET[ 'tab' ] == 'credits' ) {
?>


        <h3>
           <?php _e( 'I would like to give special thanks to credits. The following is a guide to the list of credits for this plugin:', 'uix-shortcodes' ); ?>
        </h3>  
        <p>
        
        <ul>
            <li><a href="https://github.com/PitPik/tinyColorPicker" target="_blank" rel="nofollow"><?php _e( 'tinyColorPicker', 'uix-shortcodes' ); ?></a></li>
            <li><a href="http://t4t5.github.io/sweetalert" target="_blank" rel="nofollow"><?php _e( 'Sweetalert', 'uix-shortcodes' ); ?></a></li>
            <li><a href="https://fortawesome.github.io/Font-Awesome/" target="_blank" rel="nofollow"><?php _e( 'Font Awesome', 'uix-shortcodes' ); ?></a></li>
            <li><a href="https://github.com/nomensa/jquery.accessible-tabs.git" target="_blank" rel="nofollow"><?php _e( 'jQuery Accessible Tabs', 'uix-shortcodes' ); ?></a></li>
            <li><a href="http://www.no-margin-for-errors.com/projects/prettyphoto-jquery-lightbox-clone/#prettyPhoto" target="_blank" rel="nofollow"><?php _e( 'prettyPhoto', 'uix-shortcodes' ); ?></a></li>
            <li><a href="http://alexgorbatchev.com/SyntaxHighlighter/" target="_blank" rel="nofollow"><?php _e( 'SyntaxHighlighter', 'uix-shortcodes' ); ?></a></li>
            <li><a href="https://github.com/woothemes/FlexSlider" target="_blank" rel="nofollow"><?php _e( 'Flexslider', 'uix-shortcodes' ); ?></a></li>
            <li><a href="https://github.com/IanLunn/jQuery-Parallax" target="_blank" rel="nofollow"><?php _e( 'jQuery Parallax', 'uix-shortcodes' ); ?></a></li>
            <li><a href="https://github.com/Vestride/Shuffle" target="_blank" rel="nofollow"><?php _e( 'Shuffle (filtering and sorting)', 'uix-shortcodes' ); ?></a></li>
            <li><a href="https://github.com/desandro/imagesloaded" target="_blank" rel="nofollow"><?php _e( 'imagesloaded', 'uix-shortcodes' ); ?></a></li>
            <li><a href="https://github.com/xizon/easy-pie-chart" target="_blank" rel="nofollow"><?php _e( 'Easy Pie Chart', 'uix-shortcodes' ); ?></a></li>
            <li><a href="http://www.flaticon.com" target="_blank" rel="nofollow"><?php _e( 'Flaticon', 'uix-shortcodes' ); ?></a></li>
        
         

        </ul>
        
        </p> 
        
    
<?php } ?>