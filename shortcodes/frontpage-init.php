<?php
/**
 * Enable the use of shortcodes in ...
 *
 */

add_filter( 'widget_text', 'do_shortcode' ); //text widgets.
add_filter( 'the_excerpt', 'do_shortcode' ); //excerpt.
add_filter( 'comment_text', 'do_shortcode' ); //comment.
	

//----------------------------------------------------------------------------------------------------
// Hello
//----------------------------------------------------------------------------------------------------

function uix_sc_fun_hello( $atts, $content = null ){
	extract( shortcode_atts( array( 
		  '' => '',
	 ), $atts ) );
	   
	

   $return_string = '
   <div style="margin:10px; padding:10px; background:#CED933; color:#fff">
	   <em>Shortcode Demo:</em>
	   <br>'.$content.'
   </div>
   ';
   
   
   return UixShortcodes::do_callback( $return_string );
}
add_shortcode( 'uix_hello', 'uix_sc_fun_hello' );


//----------------------------------------------------------------------------------------------------
// Hello2
//----------------------------------------------------------------------------------------------------
function uix_sc_fun_hello2( $atts, $content = null ){
	extract( shortcode_atts( array( 
		  '' => '',
	 ), $atts ) );
	   
	

   $return_string = '';
   
   
   return UixShortcodes::do_callback( $return_string );
}
add_shortcode( 'uix_hello2', 'uix_sc_fun_hello2' );





//----------------------------------------------------------------------------------------------------
// Container
//----------------------------------------------------------------------------------------------------
function uix_sc_fun_container( $atts, $content = null ){
	extract( shortcode_atts( array( 
		  'bgimage' => '',
          'bgimage_repeat' => '',
          'bgimage_position' => '',
          'bgimage_attachment' => '',
          'bgimage_size' => '',
		  'bgcolor' => '',
		  'layout' => 'fullwidth',
		  'margin_top' => 25,
		  'margin_bottom' => 25,
		  'margin_left' => 0,
		  'margin_right' => 0,
		  'padding_top' => 0,
		  'padding_bottom' => 0,
		  'padding_left' => 0,
		  'padding_right' => 0,
		  'height' => 'auto',
		  'class' => '',
		  'parallax' => 0,
		  'width' => '1200px',
		  'borderwidth' => '1px',
		  'bordercolor' => '',
		  'borderstyle' => 'solid',
	
	 ), $atts ) );
	 
	 
	$id = uniqid(); 
	$bgimage_css = '';
	$bgcolor_css = '';
	$width_css = '';
	$border_css = '';
	
	if ( isset( $bgimage ) && !empty( $bgimage ) ) $bgimage_css = 'background:url('.$bgimage.') '.( $parallax > 0 ? '50%' : 'top' ).' '.( $parallax > 0 ? 0 : $bgimage_position ).' '.$bgimage_repeat.' '.( $parallax > 0 ? 'fixed' : $bgimage_attachment ).';-webkit-background-size: '.$bgimage_size.';-moz-background-size: '.$bgimage_size.';background-size: '.$bgimage_size.';';
	
		
	
	if ( isset( $bgcolor ) && !empty( $bgcolor ) ) $bgcolor_css = 'background-color:'.$bgcolor.';';

	if ( $layout == 'center' ) $width_css = 'width:calc(100% - '.( $padding_right + $padding_left ).'px);max-width:'.$width.';';
	
	if ( !empty( $bordercolor ) ) $border_css = 'border-color:'.$bordercolor.';border-width:'.$borderwidth.';border-style:'.$borderstyle.';';
	

  
   $return_string = '<div id="uix-sc-container-wrapper-'.$id.'" class="uix-sc-container-wrapper" style="margin: '.$margin_top.'px '.$margin_right.'px '.$margin_bottom.'px '.$margin_left.'px;"><div id="uix-sc-container-'.$id.'" class="uix-sc-container '.( $layout == 'fullwidth' ? 'uix-sc-container-fullwidth' : '' ).' '.$class.'" style="padding: '.$padding_top.'px '.$padding_right.'px '.$padding_bottom.'px '.$padding_left.'px;'.( $height != 'auto' ? 'min-height:'.$height.'' : 'height:auto' ).';'.$bgimage_css.''.$bgcolor_css.''.$width_css.''.$border_css.'">'.$content.'</div></div>
        '.( $parallax > 0 ? '
		<script>
		( function($) {
			"use strict";
			$( function() { $( "#uix-sc-container-'.$id.'" ).bgParallax( "50%", '.$parallax.' ); } ); 
		} ) ( jQuery );
		</script>
		' : '' ).'

   ';	
	

	
	return UixShortcodes::do_callback( $return_string );
   
}
add_shortcode( 'uix_container', 'uix_sc_fun_container' );



//----------------------------------------------------------------------------------------------------
// Progress Bar
//----------------------------------------------------------------------------------------------------
function uix_sc_fun_progress_bar( $atts, $content = null ){
	extract( shortcode_atts( array( 
		  'barcolor' => '',
          'trackcolor' => '',
          'preccolor' => '',
          'size' => '',
          'shape' => '',
		  'percent' => '',
		  'units' => '%',
		  'linewidth' => 3,
		  'precsize' => '12px',
		  'title' => '',
		  'icon' => '',
		  'top' => 25,
		  'bottom' => 0,
		  'left' => 25,
		  'right' => 25  
	
	 ), $atts ) );
	 
	 
	$id = uniqid(); 
	$icon_name = ( isset( $icon ) && !empty( $icon ) )  ? $icon : '';


   $return_string = '
   
        '.( $shape == 'square' ? '
			<div id="uix-sc-bar-box-'.$id.'" class="uix-sc-bar-box uix-sc-bar-box-square" style="margin:'.$top.'px '.$right.'px '.$bottom.'px '.$left.'px; width:'.$size.';">
				<div class="uix-sc-bar-info">
					<h3 class="uix-sc-bar-title">'.$title.'</h3>
					<div class="uix-sc-bar-desc">'.$content.'</div>
				</div>
				<div class="uix-sc-bar" data-percent="'.$percent.'" data-linewidth="'.$linewidth.'" data-trackcolor="'.$trackcolor.'" data-barcolor="'.$barcolor.'" data-units="'.$units.'" data-size="'.$size.'" data-icon="'.$icon_name.'">
					<span class="uix-sc-bar-percent"></span>
					<span class="uix-sc-bar-placeholder">0</span>
					<span class="uix-sc-bar-text"  style="color:'.$preccolor.';font-size:'.$precsize.';">'.( !empty( $icon_name )  ? '<i class="fa fa-'.$icon_name.'"></i>' : ''.$percent.''.$units.'' ).'</span>
				</div>
			</div><!-- /.uix-sc-bar-box-square -->
		' : '
			<div id="uix-sc-bar-box-'.$id.'" class="uix-sc-bar-box uix-sc-bar-box-circular" style="margin: '.$top.'px '.$right.'px '.$bottom.'px '.$left.'px;">
				<div class="uix-sc-bar" data-percent="'.$percent.'" style="width:'.$size.';">
					<span class="uix-sc-bar-percent" data-linewidth="'.$linewidth.'" data-trackcolor="'.$trackcolor.'" data-barcolor="'.$barcolor.'" data-units="'.$units.'" data-size="'.$size.'"  data-icon="'.$icon_name.'" style="color:'.$preccolor.';font-size:'.$precsize.';"></span>
				</div>
				<h3 class="uix-sc-bar-title">'.$title.'</h3>
				<div class="uix-sc-bar-desc">'.$content.'</div>
			</div><!-- /.uix-sc-bar-box-circular -->
		' ).'
   ';	
		
	
	return UixShortcodes::do_callback( $return_string );
   
}
add_shortcode( 'uix_progress_bar', 'uix_sc_fun_progress_bar' );



//----------------------------------------------------------------------------------------------------
// Icons
//----------------------------------------------------------------------------------------------------
function uix_sc_fun_icons( $atts, $content = null ){
	extract( shortcode_atts( array( 
		'size' => '', 
		'units' => 'px', 
		'color' => '', 
		'name' => '',
	 ), $atts ) );
	   
	 $sizeclass = ( empty( $size ) ) ? '' : "font-size:{$size}{$units};";
	 $colorclass = ( empty( $color ) ) ? '' : "color:{$color};";
	 

	$return_string = '<i class="fa fa-'.$name.'" style="'.$sizeclass.' '.$colorclass.'"></i>';

   
   return UixShortcodes::do_callback( $return_string );
}
add_shortcode( 'uix_icons', 'uix_sc_fun_icons' );


//----------------------------------------------------------------------------------------------------
// Recent Posts
//----------------------------------------------------------------------------------------------------
function uix_sc_fun_recent_posts( $atts, $content = null ) {
	extract( shortcode_atts( array( 
		'show' => 5, 
		'before' => '&lt;ul&gt;', 
		'after' => '&lt;/ul&gt;', 
		
	 ), $atts ) );
	 
	 
	 $before = wp_specialchars_decode( $before )."\n";
	 $after = wp_specialchars_decode( $after )."\n";
	 
	 $return_string = '';
	query_posts( array( 
		'orderby' => 'date', 
		'order' => 'DESC' , 
		'showposts' => $show 
	) );
	
	if ( have_posts() ) :
	  while ( have_posts() ) : the_post();
	  
		//featured image
		$thumbnail_src  =  wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'thumbnail' );
		$post_thumbnail_src  =  $thumbnail_src[0];  
		$post_thumbnail = '<img class="uix-sc-recent-posts-thumbnail" src="'.$post_thumbnail_src.'" alt="'.esc_attr( get_the_title() ).'">';
		if ( empty( $post_thumbnail_src ) ) $post_thumbnail = '';
	  
	  
		$return_string .= str_replace( '[uix_recent_posts_link]', get_permalink(),
		           str_replace( '[uix_recent_posts_title]', esc_attr( get_the_title() ),
				   str_replace( '[uix_recent_posts_date_m]', get_the_time('m'),
				   str_replace( '[uix_recent_posts_date_M]', get_the_time('M'),
				   str_replace( '[uix_recent_posts_date_d]', get_the_time('d'),
				   str_replace( '[uix_recent_posts_date_y]', get_the_time('y'),
				   str_replace( '[uix_recent_posts_excerpt]', get_the_excerpt(),
				   str_replace( '[uix_recent_posts_thumbnail]', $post_thumbnail,
				   UixShortcodes::decode( $content )
				   ))))))))
				   ."\n";
	
	
		 
	  endwhile;
	endif;
	
	wp_reset_query();
	
	return UixShortcodes::do_callback( $before.$return_string.$after );
}

add_shortcode( 'uix_recent_posts', 'uix_sc_fun_recent_posts' );



//----------------------------------------------------------------------------------------------------
// Pricing
//----------------------------------------------------------------------------------------------------
function uix_sc_fun_pricing( $atts, $content = null ){
	
   $return_string = '
   <div class="uix-sc-price">
       <div class="uix-sc-row">
		  '.$content.'
		</div><!-- /.uix-sc-row -->
	</div><!-- /.uix-sc-price -->                                   
   ';
 
   
   return UixShortcodes::do_callback( $return_string );
}
add_shortcode( 'uix_pricing', 'uix_sc_fun_pricing' );

//-----
function uix_sc_fun_pricing_item( $atts, $content = null ){
	extract( shortcode_atts( array( 
		  'target' => '_self',
		  'class' => '',
		  'url' => '#',
		  'period' => 'per month',
		  'bcolor' => 'green',
		  'imcolor' => '#d59a3e',
		  'last' => 0,
		  'col' => 3
	 ), $atts ) );


   $id = uniqid();
   $col_last = ( $last == 1 ) ? 'uix-sc-col-last' : '';
   $col_num = ( $col == 4 ) ? 'uix-sc-col-3' : 'uix-sc-col-4';
 
   $return_string = '
   <div class="'.$col_num.' '.$col_last.'" id="uix-sc-col-js-'.$id.'">
       <div class="uix-sc-price-bg-hover uix-sc-price-init-height">
	       <div class="uix-sc-price-border '.$class.'">
				<h5 class="uix-sc-price-level">'.UixShortcodes::get_subtags( 'uix_pricing_item_level', $content ).'</h5>
				<h2 class="uix-sc-price-num" style="color:'.$imcolor.'">'.UixShortcodes::get_subtags( 'uix_pricing_item_price', $content ).' <span class="uix-sc-price-period">'.$period.'</span></h2>
				
				<div class="uix-sc-price-excerpt">
					<p>
					'.UixShortcodes::get_subtags( 'uix_pricing_item_desc', $content ).'
					</p>
				</div>
				<a href="'.$url.'" target="'.$target.'" class="uix-sc-btn uix-sc-btn-'.$bcolor.'">'.UixShortcodes::get_subtags( 'uix_pricing_item_button', $content ).'</a>
				
				<hr>
				<div class="uix-sc-price-detail">
					'.UixShortcodes::get_subtags( 'uix_pricing_item_detail', $content ).'
				</div>
		   </div>
		   
		</div>
	</div>    
	<script>(function($) { "use strict"; $(document).ready(function() { $.uix_sc_tableHover({id: "#uix-sc-col-js-'.$id.'", tcolor: "'.$imcolor.'"})  });})(jQuery);</script>               
   ';

   return UixShortcodes::do_callback( $return_string );
}
add_shortcode( 'uix_pricing_item', 'uix_sc_fun_pricing_item' );



//----------------------------------------------------------------------------------------------------
// Column
//----------------------------------------------------------------------------------------------------
function uix_sc_fun_column_wrapper( $atts, $content = null ){
	extract( shortcode_atts( array( 
		  'top' => 20,
		  'bottom' => 20,
		  'left' => 0,
		  'right' => 0
	 ), $atts ) );
	
   $return_string = '
   <div class="uix-sc-row" style="padding: '.$top.'px '.$right.'px '.$bottom.'px '.$left.'px;">
		  '.$content.'
	</div><!-- /.uix-sc-row -->                                   
   ';
 
   
   return UixShortcodes::do_callback( $return_string );
}
add_shortcode( 'uix_column_wrapper', 'uix_sc_fun_column_wrapper' );

//-----
function uix_sc_fun_column( $atts, $content = null ){
	extract( shortcode_atts( array( 
		  'grid' => '',
		  'last' => 0
	 ), $atts ) );


   $col_last = ( $last == 1 ) ? 'uix-sc-col-last' : '';
  
   $return_string = '
   <div class="uix-sc-col-'.$grid.'  '.$col_last.'">
       '.$content.'
	</div>                  
   ';

   return UixShortcodes::do_callback( $return_string );
}
add_shortcode( 'uix_column', 'uix_sc_fun_column' );


//----------------------------------------------------------------------------------------------------
// Button
//----------------------------------------------------------------------------------------------------
function uix_sc_fun_button( $atts, $content = null ) {
	extract( shortcode_atts( array( 
		'icon' => '', 
		'fontsize' => '12px', 
		'paddingspacing' => 2, 
		'target' => 0, 
		'bgcolor' => '', 
		'txtcolor' => '', 
		'url' => '',
		'letterspacing' => '',
		'fillet' => '50px',
		
		
	 ), $atts ) );
	 
    //button size
	$sizeclass = '';
	if ($paddingspacing == 2) $sizeclass = 'uix-sc-btn-small';
	if ($paddingspacing == 3) $sizeclass = 'uix-sc-btn-small-small';
    
	//target
	$targetcode = ( $target == 1 ) ? ' target="_blank"' : '';
	
	//icon
	$iconshow = ( !empty( $icon ) ) ? '<i class="fa fa-'.$icon.'"></i>' : '';
	
	//button common css
	$commoncss = 'font-size:'.$fontsize.';letter-spacing:'.$letterspacing.';-webkit-border-radius: '.$fillet.'; -moz-border-radius: '.$fillet.'; border-radius: '.$fillet.';color:'.$txtcolor.';';
		
	//button background
	
	$bg_custom_color = ( UixShortcodes::inc_str( $bgcolor, 'rgb' ) ) ? 'uix-sc-btn-none '.$sizeclass.'" style="background:'.$bgcolor.';'.$commoncss.'"' : 'uix-sc-btn-'.$bgcolor.' '.$sizeclass.'" style="'.$commoncss.'"';
	
	
   $return_string = '<a class="uix-sc-btn '.$bg_custom_color.' '.$targetcode.' href="'.$url.'">'.$iconshow.''.$content.'</a>';	
		
		
	
	return UixShortcodes::do_callback( $return_string );
}

add_shortcode( 'uix_button', 'uix_sc_fun_button' );



//----------------------------------------------------------------------------------------------------
// Share Buttons
//----------------------------------------------------------------------------------------------------
function uix_sc_fun_share_buttons( $atts, $content = null ) {
	extract( shortcode_atts( array( 
		'color' => 1, 
		'fillet' => '25px',
		'show' => '',
		'size' => 1,
		
		
	 ), $atts ) );
	 
	 global $post;
	 
    //button color
	$bcolor = '';
	if ($color == 1) $bcolor = 'uix-sc-share-black';
	if ($color == 2) $bcolor = 'uix-sc-share-multicolor';
	
    //button size
	$bsize = '';
	if ($size == 1) $bsize = '';
	if ($size == 2) $bsize = 'uix-sc-share-big';
	
	
	
	$fillet_show = 'style="-webkit-border-radius: '.$fillet.'; -moz-border-radius: '.$fillet.'; border-radius: '.$fillet.'"';
	$targetcode = 'target="_blank"';
	
	$img = '';
	$thumbnail = '';
	if ( has_post_thumbnail() ) {
		// Display post thumbnail
		ob_start();
			the_post_thumbnail(); 
			$thumbnail = ob_get_contents();
		ob_end_clean(); 
	
        preg_match_all( "/[img|IMG].*?src=['|\"](.*?(?:[.gif|.jpg]))['|\"].*?[\/]?>/", $thumbnail, $match );
		$img = '&media='.$match[1][0];
		
	}
	
	$btn_fb = ( UixShortcodes::inc_str( $show, 'facebook' ) ) ? '<a class="'.$bcolor.' facebook" '.$targetcode.' href="//www.facebook.com/sharer/sharer.php?u='.UixShortcodes::page_uri().'"><i class="fa fa-facebook '.$bsize.'" '.$fillet_show.'></i></a>' : '';
	$btn_twitter = ( UixShortcodes::inc_str( $show, 'twitter' ) ) ? '<a class="'.$bcolor.' twitter" '.$targetcode.' href="//twitter.com/intent/tweet?url='.UixShortcodes::page_uri().'&text='.esc_attr( get_the_title() ).'"><i class="fa fa-twitter '.$bsize.'" '.$fillet_show.'></i></a>' : '';
	$btn_google = ( UixShortcodes::inc_str( $show, 'google' ) ) ? '<a class="'.$bcolor.' google-plus" '.$targetcode.' href="//plus.google.com/share?url='.UixShortcodes::page_uri().'"><i class="fa fa-google-plus '.$bsize.'" '.$fillet_show.'></i></a>' : '';
	$btn_pin = ( UixShortcodes::inc_str( $show, 'pinterest' ) ) ? '<a class="'.$bcolor.' pinterest" '.$targetcode.' href="//www.pinterest.com/pin/create/button/?url='.UixShortcodes::page_uri().''.$img.'&description='.esc_attr( get_the_title() ).'"><i class="fa fa-pinterest-p '.$bsize.'" '.$fillet_show.'></i></a>' : '';
	
   $return_string = '
   <div class="uix-sc-share">
		'.$btn_fb.'
		'.$btn_twitter.'
		'.$btn_google.'
		'.$btn_pin.'
   </div>
   ';	
		
		
	
	return UixShortcodes::do_callback( $return_string );
}

add_shortcode( 'uix_share_buttons', 'uix_sc_fun_share_buttons' );


//----------------------------------------------------------------------------------------------------
// Accordion & Tabs
//----------------------------------------------------------------------------------------------------
function uix_sc_fun_toggle( $atts, $content = null ){
	extract( shortcode_atts( array( 
		'tabs' => 0, 
		'effect' => 'slide', 
		'style' => 'horizontal', 
		
	 ), $atts ) );
	 
	
	 $tabclass = ( $tabs == 1 ) ? ' uix-sc-tabs '.( isset( $style ) && $style == 'vertical' ? 'uix-sc-tabs-vertical' : '' ).'' : '';
	 $transeffect = 'slide';
	 if ( $effect == 1 ) $transeffect = 'slide';
	 if ( $effect == 2 ) $transeffect = 'fade';
	 if ( $effect == 3 ) $transeffect = 'none';
	 
	
	
	if ( $tabs == 1 ) {
		$content = str_replace( '[uix_toggle_item_title]', '<li>',
				   str_replace( '[/uix_toggle_item_title]', '</li>',
			   $content
			   ) );
			   
	
	} else {
		$content = str_replace( '[uix_toggle_item_title]', '<h3 class="uix-sc-spoiler-title">',
				   str_replace( '[/uix_toggle_item_title]', '</h3>',
			   $content
			   ) );
			   

	}
	
	
   $return_string = '
   <div class="uix-sc-accordion-box">
	   <div class="uix-sc-accordion'.$tabclass.'" data-effect="'.$transeffect.'">
			  '.$content.'
		</div><!-- /.uix-sc-accordion, .uix-sc-tabs -->
	</div><!-- /.uix-sc-accordion-box -->                              
   ';
 
   
   return UixShortcodes::do_callback( $return_string );
}
add_shortcode( 'uix_toggle', 'uix_sc_fun_toggle' );

//----
function uix_sc_fun_toggle_item( $atts, $content = null ){
	extract( shortcode_atts( array( 
	    'tabs' => 0, 
		'open' => 'false',
		
	 ), $atts ) );
	
	if ( $tabs == 1 ) {
		
		$return_string = '
		<ul class="uix-sc-tabs-title">
			  '.$content.'
		</ul>                   
		';
		
 
	
	} else {
		$openfirst_class = ( $open == 'true' ) ? ' uix-sc-spoiler-closed' : '';
		
		$return_string = '
		<div class="uix-sc-spoiler'.$openfirst_class.'">
			  '.$content.'
		</div>                   
		';
		

	}
	
   
   return UixShortcodes::do_callback( $return_string );
}
add_shortcode( 'uix_toggle_item', 'uix_sc_fun_toggle_item' );

//----
function uix_sc_fun_toggle_item_con( $atts, $content = null ){
	extract( shortcode_atts( array( 
		'open' => 'false',
		
	 ), $atts ) );
	
	
	$openfirst_class = ( $open == 'true' ) ? ' uix-sc-spoiler-content-show' : '';

	
   $return_string = '
   <div class="uix-sc-spoiler-content'.$openfirst_class.'">
		  '.$content.'
	</div>                   
   ';
 
   
   return UixShortcodes::do_callback( $return_string );
}
add_shortcode( 'uix_toggle_item_content', 'uix_sc_fun_toggle_item_con' );


//----
function uix_sc_fun_toggle_group( $atts, $content = null ){
	
	$return_string = '
	<div class="uix-sc-spoiler-group">
		  '.$content.'
	</div>                   
	';

   return UixShortcodes::do_callback( $return_string );
}
add_shortcode( 'uix_toggle_group', 'uix_sc_fun_toggle_group' );




//----------------------------------------------------------------------------------------------------
// Video
//----------------------------------------------------------------------------------------------------
function uix_sc_fun_video( $atts, $content = null ){
	extract( shortcode_atts( array( 
		'width' => '560', 
		'height' => '315', 
		'responsive' => 'true', 
		'url' => '',
	 ), $atts ) );
	 
	 if ( $responsive == 'true' ) {
		 $return_string = '<div class="uix-sc-embed-responsive">'.wp_oembed_get( $url ).'</div>';
	 } else {
		 $return_string = wp_oembed_get( $url, array( 'width'=>$width, 'height'=>$height ) );
	 }
	
   
   return UixShortcodes::do_callback( $return_string );
}
add_shortcode( 'uix_video', 'uix_sc_fun_video' );


//----------------------------------------------------------------------------------------------------
// Audio
//----------------------------------------------------------------------------------------------------
function uix_sc_fun_audio( $atts, $content = null ){
	extract( shortcode_atts( array( 
		'url' => '',
		'autoplay' => 'false',
		'width' => '100%',
		'soundcloud' => 'false',
		'height' => '150',
		'loop' => 'false',
	 ), $atts ) );
	
	$return_string = '<div style="width:'.$width.';">'.wp_audio_shortcode( array(
			'src'      => $url,
			'loop'     => ( $loop == 'true' ) ? 1 : 0,
			'autoplay' => ( $autoplay == 'true' ) ? 1 : 0,
			'preload' => 'none'
			) ).'</div>';
	
	if ( $soundcloud == 'true' ) {
		$return_string = '<div style="width:'.$width.';height:'.$height.'px">'.preg_replace( '/(width|height)=\"\d*\"\s/', '', wp_oembed_get( $url ) ).'</div>';
		$return_string = str_replace( 'scrolling', 'style="width:100%;height:'.$height.'px" scrolling', $return_string );
	}

  

   return UixShortcodes::do_callback( $return_string );
   
}
add_shortcode( 'uix_audio', 'uix_sc_fun_audio' );




//----------------------------------------------------------------------------------------------------
// Code
//----------------------------------------------------------------------------------------------------
function uix_sc_fun_code( $atts, $content = null ){
	extract( shortcode_atts( array( 
		'language' => '',
	 ), $atts ) );
	 
	
	add_action( 'wp_footer', 'uix_sc_fun_syntaxhighlighter', 100 );
	
	$return_string = str_replace( ']', '&#93;', str_replace( '[', '&#91;', $content ) );
	
	

   return UixShortcodes::do_callback( $return_string );
   
}
add_shortcode( 'uix_code', 'uix_sc_fun_code' );

function uix_sc_fun_syntaxhighlighter(){
	echo '
	<script type="text/javascript">
		( function($) {
			"use strict";
			
			function uix_syntaxhighlighter_path() {
				var args = arguments,
				result = [];
				for (var i = 0; i < args.length; i++) {
					result.push(args[i].replace("$", "'.UixShortcodes::plug_directory() .'assets/add-ons/syntaxhighlighter/scripts/"));
				}
				return result;
			}
	
			$(function () {
				SyntaxHighlighter.autoloader.apply(null, uix_syntaxhighlighter_path(
					"applescript            $shBrushAppleScript.js",
					"actionscript3 as3      $shBrushAS3.js",
					"bash shell             $shBrushBash.js",
					"coldfusion cf          $shBrushColdFusion.js",
					"cpp c                  $shBrushCpp.js",
					"c# c-sharp csharp      $shBrushCSharp.js",
					"css                    $shBrushCss.js",
					"delphi pascal          $shBrushDelphi.js",
					"diff patch pas         $shBrushDiff.js",
					"erl erlang             $shBrushErlang.js",
					"groovy                 $shBrushGroovy.js",
					"java                   $shBrushJava.js",
					"jfx javafx             $shBrushJavaFX.js",
					"js jscript javascript  $shBrushJScript.js",
					"perl pl                $shBrushPerl.js",
					"php                    $shBrushPhp.js",
					"text plain             $shBrushPlain.js",
					"py python              $shBrushPython.js",
					"ruby rails ror rb      $shBrushRuby.js",
					"sass scss              $shBrushSass.js",
					"scala                  $shBrushScala.js",
					"sql                    $shBrushSql.js",
					"vb vbnet               $shBrushVb.js",
					"xml xhtml xslt html    $shBrushXml.js"
				));
				SyntaxHighlighter.all();
			});
	
		} )( jQuery );
	</script>
	';
	
 
}


//----------------------------------------------------------------------------------------------------
// Portfolio
//----------------------------------------------------------------------------------------------------
function uix_sc_fun_portfolio_wrapper( $atts, $content = null ){
	extract( shortcode_atts( array( 
		  'imagefillet' => '0%',
		  'classprefix' => 'uix-sc-portfolio-',
		  'col' => '3',
		  'filterable' => 1,
          
	 ), $atts ) );
	 
	
   $id = uniqid(); 
   $col_class = '';
    switch ( $col ) {
        case 4:
            $col_class = '{classprefix}col4';
            break;
        case 3:
            $col_class = '{classprefix}col3';
            break;
        case 2:
            $col_class = '{classprefix}col2';
            break;
    }
   
   

   $return_string = '

   <div class="'.$classprefix.'tiles '.$col_class.'" id="'.$classprefix.'filter-stage-'.$id.'">
          '.$content.'
    </div><!-- /.'.$classprefix.'tiles -->                                   
   ';
  
   
   $return_string = UixShortcodes::do_callback( $return_string );
   $return_string = str_replace( '{imagefillet}', 'style="-webkit-border-radius: '.$imagefillet.'; -moz-border-radius: '.$imagefillet.'; border-radius: '.$imagefillet.';"', $return_string );
   $return_string = str_replace( '{classprefix}', $classprefix, $return_string );
  
   //Display categories on page
   $catlist = '';
   
   if ( $filterable == 1 ) {
	   $catlist = '
		<div class="'.$classprefix.'cat-list" id="'.$classprefix.'cat-list-'.$id.'">
			<ul>
				<li class="current"><a href="javascript:" data-group="all">'.__( 'All', 'uix-shortcodes' ).'</a></li>
				'.UixShortcodes::cat_list( $return_string, $classprefix ).'
			</ul>
		</div> <!-- /.'.$classprefix.'cat-list -->
		<script>(function($) { "use strict"; $(document).ready(function() { $.uix_sc_filterable({ID: "'.$id.'", classprefix: "'.$classprefix.'"})  });})(jQuery);</script>  
	   ';  
   }
   

  

   return $catlist.$return_string;
   
}
add_shortcode( 'uix_portfolio', 'uix_sc_fun_portfolio_wrapper' );

//-----
function uix_sc_fun_portfolio_item( $atts, $content = null ){
	extract( shortcode_atts( array( 
		  'title' => '',
		  'type' => '',
		  'image' => '',
          'fullimage' => '',
		  'desc' => '',
          'url' => '',
          'target' => 1,
	 ), $atts ) );
	 

 
	//target
    $targetcode = '';
    if ( !empty( $url ) ) {
	    $targetcode = ( $target == 1 ) ? ' target="_blank"' : '';
    } else {
        $targetcode = 'rel="uix-sc-prettyPhoto"';
		if ( empty( $image ) ) $targetcode = '';
    }
    
    //fullimgURL
    $fullimgURL = ( empty( $fullimage ) ) ? $image : $fullimage;
	if ( !empty( $url ) ) {
		$fullimgURL = $url;
	}
    

   $return_string = '
        <div class="{classprefix}item" data-groups=\'["'.UixShortcodes::transform_slug( $type ).'"]\'>
            <span class="{classprefix}image" {imagefillet}>
                <a '.$targetcode.' href="'.$fullimgURL.'" title="'.esc_attr( $title ).'">
                <img src="'.$image.'" id="'.UixShortcodes::get_attachment_id( $image ).'" alt="" {imagefillet}>
                </a>
            </span>
            <h3><a '.$targetcode.' href="'.$fullimgURL.'" title="'.esc_attr( $title ).'">'.$title.'</a></h3>
			'.( !empty( $type ) ? '<div class="{classprefix}type">'.$type.'</div>' : '' ).'
            <div class="{classprefix}content">
                '.str_replace( '[uix_portfolio_item_desc]', '',
                  str_replace( '[/uix_portfolio_item_desc]', '',
                   $content
                   ) ).'
				<a class="{classprefix}link" '.$targetcode.' href="'.$fullimgURL.'" title="'.esc_attr( $title ).'"></a>
            </div>
    
        </div><!-- /.{classprefix}item -->          
   ';

  
  

   return UixShortcodes::do_callback( $return_string );
}
add_shortcode( 'uix_portfolio_item', 'uix_sc_fun_portfolio_item' );



//----------------------------------------------------------------------------------------------------
// Team
//----------------------------------------------------------------------------------------------------
function uix_sc_fun_team_wrapper( $atts, $content = null ){
	extract( shortcode_atts( array( 
		  'avatarfillet' => '0%',
		  'gray' => 'false',
		  'avatarheight'  => '',
		  'col' => 'fullwidth',
	 ), $atts ) );
	 

   if ( $col == 'fullwidth' ) {
	   $return_string = '
	   <div class="uix-sc-card">
			  '.$content.'
		</div><!-- /.uix-sc-card -->                                   
	   ';
   
   }
   
   if ( $col == 4 || $col == 3 || $col == 2 ) {
	   $return_string = '
	   <div class="uix-sc-gallery">
			  '.$content.'
		</div><!-- /.uix-sc-gallery -->                                   
	   ';
   
   }
  
   if ( isset( $avatarheight ) && !empty( $avatarheight ) ) {
	   $cus_height = 'style="height:'.$avatarheight.';"';
   } else {
	   $cus_height = '';
   }
   
   
   $return_string = UixShortcodes::do_callback( $return_string );
   $return_string = str_replace( '{avatarfillet}', 'style="-webkit-border-radius: '.$avatarfillet.'; -moz-border-radius: '.$avatarfillet.'; border-radius: '.$avatarfillet.';"', $return_string );
   $return_string = str_replace( '{avatarheight}', $cus_height, $return_string );
   
   
   if ( $gray == 'false' ) {
	   $return_string = str_replace( 'uix-sc-gray', '', $return_string );
   }
   
   return $return_string;
   
}
add_shortcode( 'uix_team', 'uix_sc_fun_team_wrapper' );

//-----
function uix_sc_fun_team_item( $atts, $content = null ){
	extract( shortcode_atts( array( 
		  'name' => '',
		  'avatar' => '',
		  'position' => '',
		  'col' => 'fullwidth',
		  'social_1' => '',
		  'social_2' => '',
		  'social_3' => ''
	 ), $atts ) );
	 

	 
   $avatarURL = ( !empty( $avatar ) ) ? $avatar : UixShortcodes::plug_directory() .'assets/images/no-photo.png';
   
   $social_arr_1 = explode( '|', $social_1 );
   $social_arr_2 = explode( '|', $social_2 );
   $social_arr_3 = explode( '|', $social_3 );
   
   $social_url_1 = ( !empty( $social_arr_1[1] ) ) ? $social_arr_1[1] : '#';
   $social_url_2 = ( !empty( $social_arr_2[1] ) ) ? $social_arr_2[1] : '#';
   $social_url_3 = ( !empty( $social_arr_3[1] ) ) ? $social_arr_3[1] : '#';
   
   $social_icon_1 = ( !empty( $social_arr_1[0] ) ) ? $social_arr_1[0] : 'link';
   $social_icon_2 = ( !empty( $social_arr_2[0] ) ) ? $social_arr_2[0] : 'link';
   $social_icon_3 = ( !empty( $social_arr_3[0] ) ) ? $social_arr_3[0] : 'link'; 
   
   
   $social_out_1 = ( !empty( $social_arr_1[1] ) ) ? '<a href=\''.$social_url_1.'\' target=\'_blank\'><i class=\'fa fa-'.$social_icon_1.'\'></i></a>' : '';
   $social_out_2 = ( !empty( $social_arr_2[1] ) ) ? '<a href=\''.$social_url_2.'\' target=\'_blank\'><i class=\'fa fa-'.$social_icon_2.'\'></i></a>' : '';
   $social_out_3 = ( !empty( $social_arr_3[1] ) ) ? '<a href=\''.$social_url_3.'\' target=\'_blank\'><i class=\'fa fa-'.$social_icon_3.'\'></i></a>' : '';


   if ( $col == 'fullwidth' ) {
	   $return_string = '
		<div class="uix-sc-card-item">
		  <div class="uix-sc-card-item-left uix-sc-gray">
					<div class="uix-sc-card-item-left-imgbox" {avatarheight}>
						<img src="'.$avatarURL.'" id="'.UixShortcodes::get_attachment_id( $avatarURL ).'" alt="'.esc_attr( $name ).'" {avatarfillet}>
					</div>
		  </div>
		  <div class="uix-sc-card-item-body">
			<h3 class="uix-sc-card-item-heading">'.$name.'</h3>
			<div class="uix-sc-card-item-social">
			   <em>'.$position.'</em>
				&nbsp;&nbsp;
				'.$social_out_1.'
				'.$social_out_2.'
				'.$social_out_3.'									
			
			</div>
			'.str_replace( '[uix_team_item_desc]', '<div class="uix-sc-card-item-desc">',
				   str_replace( '[/uix_team_item_desc]', '</div>',
			   $content
			   ) ).'
		  </div>
		</div>               
	   ';
   
   }
   
   if ( $col == 4 || $col == 3 || $col == 2 ) {
	   
	   
	   $col_class = '';
		switch ( $col ) {
			case 4:
				$col_class = 'uix-sc-gallery-list-col4';
				break;
			case 3:
				$col_class = 'uix-sc-gallery-list-col3';
				break;
			case 2:
				$col_class = 'uix-sc-gallery-list-col2';
				break;
		}

	   $return_string = '
		<div class="uix-sc-gallery-list '.$col_class.' uix-sc-gray">
			<div class="uix-sc-gallery-list-imgbox" {avatarheight}>
				<img src="'.$avatarURL.'" id="'.UixShortcodes::get_attachment_id( $avatarURL ).'" alt="'.esc_attr( $name ).'" {avatarfillet}>
				<span class="uix-sc-gallery-list-position">'.$position.'</span>
			</div>
			<div class="uix-sc-gallery-list-info">
				<h3 class="uix-sc-gallery-list-title">'.$name.'</h3>	
				<div class="uix-sc-gallery-list-desc">
							'.str_replace( '[uix_team_item_desc]', '<span class=\'uix-sc-gallery-list-desc-p\'>',
							  str_replace( '[/uix_team_item_desc]', '</span>',
							   $content
							   ) ).'
				</div>
				<div class="uix-sc-gallery-list-social">
					&nbsp;&nbsp;
					'.$social_out_1.'
					'.$social_out_2.'
					'.$social_out_3.'									
				
				</div>
				
			</div>
		</div>            
	   ';
   
   }
  

   return UixShortcodes::do_callback( $return_string );
}
add_shortcode( 'uix_team_item', 'uix_sc_fun_team_item' );



//----------------------------------------------------------------------------------------------------
// Features
//----------------------------------------------------------------------------------------------------
function uix_sc_fun_features_wrapper( $atts, $content = null ){
	extract( shortcode_atts( array( 
		  'col' => 3,
	 ), $atts ) );
	 
	
   if ( $col == 2 ) {
	   
		$content = str_replace( '[uix_features_col_left]', '<div class="uix-sc-col-6">',
				   str_replace( '[/uix_features_col_left]', '</div>',
				   str_replace( '[uix_features_col_right]', '<div class="uix-sc-col-6 uix-sc-col-last">',
				   str_replace( '[/uix_features_col_right]', '</div>',
			   $content
			   ) ) ) ); 
		   
	   
	   $return_string = '
	   <div class="uix-sc-feature">
           <div class="uix-sc-row">
			    '.$content.'
		   </div>
		</div><!-- /.uix-sc-feature -->                                   
	   ';
   
   }
   
   if ( $col == 3 ) {
	   $return_string = '
	   <div class="uix-sc-feature uix-sc-tc">
	       <div class="uix-sc-row">
			    '.$content.'
		   </div>
		</div><!-- /.uix-sc-feature -->                                   
	   ';
   
   }
   

   return UixShortcodes::do_callback( $return_string );
   
}
add_shortcode( 'uix_features', 'uix_sc_fun_features_wrapper' );

//-----
function uix_sc_fun_features_item( $atts, $content = null ){
	extract( shortcode_atts( array( 
		  'titlecolor' => '',
		  'icon' => '',
          'iconcolor' => '',
		  'desccolor' => '',
		  'col' => 3,
		  'last' => 0
	 ), $atts ) );
	 
	 $col_last = ( $last == 1 ) ? 'uix-sc-col-last' : '';
	 

   if ( $col == 2 ) {
	   
		$content = str_replace( '[uix_features_item_title]', '<h3 class="uix-sc-feature-title" '.( !empty( $titlecolor ) ? 'style="color:'.$titlecolor.'"' : '' ).'><span class="uix-sc-feature-icon-side"><i class="fa fa-'.( !empty( $icon ) ? $icon : 'check' ).'" '.( !empty( $iconcolor ) ? 'style="border-color:'.$iconcolor.';color:'.$iconcolor.'"' : '' ).'></i></span>',
				   str_replace( '[/uix_features_item_title]', '</h3>',
				   str_replace( '[uix_features_item_desc]', '<div class="uix-sc-feature-desc uix-sc-feature-desc-singlerow" '.( !empty( $desccolor ) ? 'style="color:'.$desccolor.'"' : '' ).'>',
				   str_replace( '[/uix_features_item_desc]', '</div>',
			   $content
			   ) ) ) ); 
		   
	   
	   $return_string = '
			<div class="uix-sc-feature-li">
				  '.$content.'
			 </div>        
	   ';
   
   }
   
   if ( $col == 3 ) {
	   
		$content = str_replace( '[uix_features_item_title]', '<h3 class="uix-sc-feature-title" '.( !empty( $titlecolor ) ? 'style="color:'.$titlecolor.'"' : '' ).'>',
				   str_replace( '[/uix_features_item_title]', '</h3>',
				   str_replace( '[uix_features_item_desc]', '<div class="uix-sc-feature-desc" '.( !empty( $desccolor ) ? 'style="color:'.$desccolor.'"' : '' ).'>',
				   str_replace( '[/uix_features_item_desc]', '</div>',
			   $content
			   ) ) ) ); 
		   
	   
	   $return_string = '
		<div class="uix-sc-col-4 '.$col_last.'">
			<div class="uix-sc-feature-li">
				  <p class="uix-sc-feature-icon"><i class="fa fa-'.( !empty( $icon ) ? $icon : 'check' ).'" '.( !empty( $iconcolor ) ? 'style="border-color:'.$iconcolor.';color:'.$iconcolor.'"' : '' ).'></i></p>
				  '.$content.'
			 </div>
		</div>          
	   ';
   
   }
  

   return UixShortcodes::do_callback( $return_string );
}

add_shortcode( 'uix_features_item', 'uix_sc_fun_features_item' );




//----------------------------------------------------------------------------------------------------
// Client
//----------------------------------------------------------------------------------------------------
function uix_sc_fun_client_wrapper( $atts, $content = null ){
	

   $return_string = '
   <div class="uix-sc-client uix-sc-tc">
       <div class="uix-sc-row">
            '.$content.'
       </div>
    </div><!-- /.uix-sc-client -->                                   
   ';
   

   return UixShortcodes::do_callback( $return_string );
   
}
add_shortcode( 'uix_client', 'uix_sc_fun_client_wrapper' );

//-----
function uix_sc_fun_client_item( $atts, $content = null ){
	extract( shortcode_atts( array( 
		  'logo' => '',
		  'col' => 3,
		  'last' => 0
	 ), $atts ) );
	 
	 $col_last = ( $last == 1 ) ? 'uix-sc-col-last' : '';
	
   if ( $col == 3 ) $gridclass = 'uix-sc-col-4';
   if ( $col == 4 ) $gridclass = 'uix-sc-col-3';

    $desc = str_replace( '[uix_client_item_desc]', '',
               str_replace( '[/uix_client_item_desc]', '',
           $content
           ) ); 
       
   
   $return_string = '
        <div class="'.$gridclass.' '.$col_last.'">
            <div class="uix-sc-client-li">
                <p class="uix-sc-img">
                   <img src="'.$logo.'" alt="">
                </p>
                '.$desc.'	
            </div>																	                                                    
        </div>	      
   ';
  
  

   return UixShortcodes::do_callback( $return_string );
}

add_shortcode( 'uix_client_item', 'uix_sc_fun_client_item' );



//----------------------------------------------------------------------------------------------------
// Testimonials
//----------------------------------------------------------------------------------------------------
function uix_sc_fun_testimonials_wrapper( $atts, $content = null ){
	

   $return_string = '
   <div class="uix-sc-testimonials" id="uix-testimonials-'.uniqid().'">
		<div class="uix-sc-testimonials-container">
			<div class="flexslider">
				<ul class="slides">
					'.$content.'
				</ul><!-- .uix-sc-testimonials-slides -->
			</div><!-- .flexslider -->
		</div><!-- .uix-sc-testimonials-container -->
    </div><!-- /.uix-sc-testimonials -->                                   
   ';
   

   return UixShortcodes::do_callback( $return_string );
   
}
add_shortcode( 'uix_testimonials', 'uix_sc_fun_testimonials_wrapper' );

//-----
function uix_sc_fun_testimonials_item( $atts, $content = null ){
	extract( shortcode_atts( array( 
		  'avatar' => '',
		  'name' => '',
		  'position' => ''
	 ), $atts ) );
	 

    $desc = str_replace( '[uix_testimonials_item_desc]', '<div class="uix-sc-testimonials-content">',
               str_replace( '[/uix_testimonials_item_desc]', '</div>',
           $content
           ) ); 
       
   
   $return_string = '
        <li>
           '.$desc.'
		   <div class="uix-sc-testimonials-signature">
		       '.( !empty( $avatar )  ? '<img class="uix-sc-testimonials-avatar" src="'.$avatar.'" alt="'.$name.'" />': '<span class="uix-sc-testimonials-no-avatar"></span>' ).'
		       <strong '.( !empty( $avatar )  ? '': 'class="uix-sc-testimonials-pure-text"' ).'>'.$name.'</strong> - '.$position.'
		   </div>														                                                    
        </li>    
   ';
  
  

   return UixShortcodes::do_callback( $return_string );
}

add_shortcode( 'uix_testimonials_item', 'uix_sc_fun_testimonials_item' );


//----------------------------------------------------------------------------------------------------
// Map
//----------------------------------------------------------------------------------------------------
function uix_sc_fun_map( $atts, $content = null ) {
	extract( shortcode_atts( array( 
		'style' => 'normal',
		'width' => '100%',
		'height' => '285px',
		'latitude' => '37.7770776',
		'longitude' => '-122.4414289',
		'zoom' => 14,
		'name' => 'SEO San Francisco, CA, Gough Street, San Francisco, CA',
		'marker' => UixShortcodes::plug_directory().'assets/images/map/map-location.png',
		
	 ), $atts ) );
	 
	
   $return_string = '
		<!--  Google map show  begin -->
		<section class="site-google-map">
			<iframe  frameborder="0" style="width:'.$width.';height:'.$height.'" hspace="0" vspace="0" scrolling="no"  allowTransparency="true" src="'.UixShortcodes::plug_directory().'shortcodes/embed/map-iframe.php?cusheight=0&rootpath='.UixShortcodes::plug_directory().'&style='.$style.'&height='.str_replace( 'px', '', $height ).'&latitude='.$latitude.'&longitude='.$longitude.'&zoom='.$zoom.'&name='.$name.'&marker='.$marker.'"></iframe>	
		</section>
		<!--  Google map show  end -->
   ';
	
	return UixShortcodes::do_callback( $return_string );
}

add_shortcode( 'uix_map', 'uix_sc_fun_map' );


//----------------------------------------------------------------------------------------------------
// Heading
//----------------------------------------------------------------------------------------------------
function uix_sc_fun_heading( $atts, $content = null ) {
	extract( shortcode_atts( array( 
		'style' => 'grand-fill-yellow',
		'size' => '58.5px',
		'uppercase' => 'true',
		'spacing' => '2px',
		'color' => '',
		'align'=> 'center',
		'fillbg'=> '',

	 ), $atts ) );
	
	
	$colorclass = ( empty( $color ) ) ? '' : "color:{$color};";
	$fillcss = ( !empty( $fillbg ) ) ? 'style="background: -webkit-linear-gradient(transparent, transparent), url('.$fillbg.') repeat;background: -o-linear-gradient(transparent, transparent);-webkit-background-clip: text;-webkit-text-fill-color: transparent;-moz-background-clip: text;-moz-text-fill-color: transparent;"' : '';
	
	
	$transform = ( $uppercase == 'true' ) ? 'uppercase' : 'none';
	$alignment = '';
	if ( $align == 'center' ) $alignment = 'uix-sc-tc';
	if ( $align == 'left' ) $alignment = 'uix-sc-tl';
	if ( $align == 'right' ) $alignment = 'uix-sc-tr';
	
	
	
	$textcss = 'style="'.$colorclass.'font-size:'.$size.';text-transform:'.$transform.';letter-spacing:'.$spacing.';"';
	
	if ( $style == 'grand-fill-yellow' ) {
	   $return_string = '
		 <div class="uix-sc-heading uix-sc-f-fill '.( empty( $fillbg )  ? 'uix-sc-f-fill-yellow': '' ).' '.$alignment.'" '.$textcss.'>
			 <span '.$fillcss.'>'.$content.'</span>
		 </div>
	   ';
	
	}
	
	if ( $style == 'grand' || !empty( $color ) ) {
	   $return_string = '
		 <div class="uix-sc-heading '.$alignment.'" '.$textcss.'>
			 '.$content.'
		 </div>
	   ';
	
	}
	
	return UixShortcodes::do_callback( $return_string );
}

add_shortcode( 'uix_heading', 'uix_sc_fun_heading' );


//---
function uix_sc_fun_heading_line( $atts, $content = null ) {
	extract( shortcode_atts( array( 
		'line'=> 'false',
		'width'=> '100%',
		'height'=> '1px',
		
	 ), $atts ) );
	
	$hr = ( $line == 'true' ) ? '<hr class="uix-sc-hr" style="width:'.$width.';border-width:'.$height.';">' : '';
	
	$return_string = $hr;
	
	return UixShortcodes::do_callback( $return_string );
}

add_shortcode( 'uix_heading_line', 'uix_sc_fun_heading_line' );

//---
function uix_sc_fun_subheading( $atts, $content = null ) {
	extract( shortcode_atts( array( 
		'size' => '58.5px',
		'opacity' => '65',
		'spacing' => '2px',
		'color' => '',
		'uppercase' => 'true',
		'align'=> 'center',
		
	 ), $atts ) );
	 
	$colorclass = ( empty( $color ) ) ? '' : "color:{$color};";
	$transform = ( $uppercase == 'true' ) ? 'uppercase' : 'none';
	$alignment = '';
	if ( $align == 'center' ) $alignment = 'uix-sc-tc';
	if ( $align == 'left' ) $alignment = 'uix-sc-tl';
	if ( $align == 'right' ) $alignment = 'uix-sc-tr';
	
	$textcss = 'style="'.$colorclass.'font-size:'.$size.';filter:alpha(opacity='.$opacity.');-moz-opacity:'.($opacity/100).';opacity: '.($opacity/100).';letter-spacing:'.$spacing.';text-transform:'.$transform.';"';
	
   $return_string = '
	 <div class="uix-sc-subheading '.$alignment.'" '.$textcss.'>
		 '.$content.'
	 </div>
   ';
   
   
	
	return UixShortcodes::do_callback( $return_string );
}

add_shortcode( 'uix_heading_sub', 'uix_sc_fun_subheading' );

//----------------------------------------------------------------------------------------------------
// Dividing Line
//----------------------------------------------------------------------------------------------------
function uix_sc_fun_dividing_line( $atts, $content = null ) {
	extract( shortcode_atts( array( 
		'style' => 'solid',
		'width' => '100%',
		'opacity'=> '17',
		'color'=> 'dark',
		
		
	 ), $atts ) );
	
	
	$textcss = 'style="width:'.$width.';filter:alpha(opacity='.$opacity.');-moz-opacity:'.($opacity/100).';opacity: '.($opacity/100).';';
									
	if ( $style == 'solid' ) $return_string = '<div class="uix-sc-separator-base uix-sc-separator-solid" '.$textcss.''.( $color == 'light' ? 'border-color:#fff': '' ).'"></div>';
	if ( $style == 'double' ) $return_string = '<div class="uix-sc-separator-base uix-sc-separator-double" '.$textcss.''.( $color == 'light' ? 'border-color:#fff': '' ).'"></div>';
	if ( $style == 'dashed' ) $return_string = '<div class="uix-sc-separator-base uix-sc-separator-dashed" '.$textcss.''.( $color == 'light' ? 'border-color:#fff': '').'"></div>';
	if ( $style == 'dotted' ) $return_string = '<div class="uix-sc-separator-base uix-sc-separator-dotted" '.$textcss.''.( $color == 'light' ? 'border-color:#fff' : '').'"></div>';
	if ( $style == 'shadow' ) $return_string = '<div class="uix-sc-separator-shadow" '.$textcss.'"><span><i '.( $color == 'light' ? 'style="
	-webkit-box-shadow:0 0 8px #fff;
	-moz-box-shadow:0 0 8px #fff;
	box-shadow:0 0 8px #fff;"' : '' ).'></i></span></div>';
	if ( $style == 'gradient' ) $return_string = '<div class="uix-sc-separator-gradient" '.$textcss.''.( $color == 'light' ? '
	background:#fff;
	background:-moz-linear-gradient(left,rgba(255,255,255,0) 0,rgba(255,255,255,1) 35%,rgba(255,255,255,1) 70%,rgba(255,255,255,0) 100%);
	background:-webkit-gradient(linear,left top,right top,color-stop(0,rgba(255,255,255,0)),color-stop(35%,rgba(255,255,255,1)),color-stop(70%,rgba(255,255,255,1)),color-stop(100%,rgba(255,255,255,0)));
	background:-webkit-linear-gradient(left,rgba(255,255,255,0) 0,rgba(255,255,255,1) 35%,rgba(255,255,255,1) 70%,rgba(255,255,255,0) 100%);
	background:-o-linear-gradient(left,rgba(255,255,255,0) 0,rgba(255,255,255,1) 35%,rgba(255,255,255,1) 70%,rgba(255,255,255,0) 100%);
	background:-ms-linear-gradient(left,rgba(255,255,255,0) 0,rgba(255,255,255,1) 35%,rgba(255,255,255,1) 70%,rgba(255,255,255,0) 100%);
	background:linear-gradient(to right,rgba(255,255,255,0) 0,rgba(255,255,255,1) 35%,rgba(255,255,255,1) 70%,rgba(255,255,255,0) 100%);
	' : '' ).'"></div>';
	
	
	return UixShortcodes::do_callback( $return_string );
}

add_shortcode( 'uix_dividing_line', 'uix_sc_fun_dividing_line' );




//----------------------------------------------------------------------------------------------------
// Contact Form
//----------------------------------------------------------------------------------------------------
function uix_sc_fun_contact_form( $atts, $content = null ) {
	
	
    // capture output from the widgets
	ob_start();
	
	   comment_form();
		
		$out = ob_get_contents();
	ob_end_clean();
	 
	$return_string = '';
	
	$pattern = "/<h3.+class=\"comment-reply-title\".*?>.*?<\/h3>/ism";
   
	$matchCount = preg_match_all( $pattern, $out, $match ); 
	if ( $matchCount > 0 ) {
		$return_string = str_replace( $match[0][0], '', $out );
	}
	

	// If comments are closed and there are comments,let's leave a little note,shall we?
	if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) {
		$return_string = '<p class="no-comments uix-sc-no-comments">'.__( 'Comments are closed.', 'uix-shortcodes' ).'</p>';
	} 

	
   
   return UixShortcodes::do_callback( $return_string );
}

add_shortcode( 'uix_contact_form', 'uix_sc_fun_contact_form' );
