<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

if( !isset( $_GET[ 'tab' ] ) || $_GET[ 'tab' ] == 'about' ) {
?>


        <p>
           <?php _e( 'Uix Shortcodes brings an amazing set of beautiful and useful elements to your site that lets you do nifty things with very little effort. It makes it easy and quick to add the shortcode you need to achieve the page layout or function you desire. It currently supports <code>"columns"</code>, <code>"buttons"</code>, <code>"google maps"</code>, <code>"special heading"</code>, <code>"pricing table"</code>, <code>"icons"</code>, <code>"features boxes"</code>, <code>"testimonials carousel"</code>, <code>"list of members(such as team with lightbox)"</code>, <code>"list of clients"</code>, <code>"responsive video"</code>, <code>"audio"</code>, <code>"accordion"</code>, <code>"dividing line"</code>, <code>"tabs"</code>, <code>"code with highlighter"</code>, <code>"share buttons"</code> and <code>"recent posts with custom template"</code>.', 'uix-shortcodes' ); ?>
        </p> 
        <p>
           <?php _e( 'The content elements are the heart of any page builder. These are the elements shortcodes that come with theme. You may customize the shortcode by changing/adding the parameters. <strong>"Content Shortcode"</strong>, <strong>"Column Shortcode"</strong>, <strong>"Web Elements Shortcode"</strong>, <strong>"Icon Shortcode"</strong>, and so on. They could be used together.', 'uix-shortcodes' ); ?>
        </p>  
        
    
<?php } ?>