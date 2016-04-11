/*
 * Uix Shortcodes
 * Plugin URI: https://uiux.cc/wp-plugins/uix-shortcodes/
 * Author: UIUX Lab
 * Author URI: https://uiux.cc
 * License: GPLv2 or later
*/


( function($) {
    'use strict';
	

	/*! 
	 *************************************
	 *  Table hover
	 *************************************
	 */

	$.extend({ 
		uix_sc_tableHover:function ( options ) { 

			var settings=$.extend({
				"id": '56d7d83e3edda',
				"tcolor": '#77a43a',
				"dcolor": '#090909'
				
			}
			,options);

 			$( settings.id ).hover(function() {
				$(this).find(".uix-sc-price-border").css({
					"border-color": settings.tcolor,
					"-webkit-box-shadow": "inset 0 0px 0px 6px " + settings.tcolor,
					"-moz-box-shadow": "inset 0 0px 0px 6px " + settings.tcolor,
					"box-shadow": "inset 0 0px 0px 6px " + settings.tcolor
				});
			},function() {
				$(this).find(".uix-sc-price-border").css({
					"border-color": settings.dcolor,
					"-webkit-box-shadow": "none",
					"-moz-box-shadow": "none",
					"box-shadow": "none"
				});
			});
		
			
		} 
	}); 


	
	/*! 
	 *************************************
	 * Initialize Uix Shortcodes
	 *************************************
	 */

	$.extend({ 
		uix_sc_init:function () { 
	
	         //Pricing
			 $( '.uix-sc-price' ).uix_sc_initPricing(); 
			 
			 //Accordion
			 $( '.uix-sc-accordion' ).uix_sc_initAccordion(); 
			 
			 //Gallery list
			 $( '.uix-sc-gallery' ).uix_sc_initGallerylist(); 
			
			 // prettyPhoto
			 $( "a[rel^='uix-sc-prettyPhoto']" ).prettyPhoto({
				 animation_speed:'normal',
				 theme:'dark_rounded',
				 slideshow:3000,
				 utoplay_slideshow: false
			 });
			 
			 // Testimonials
			$( '.uix-sc-testimonials-container .flexslider' ).flexslider( {
				namespace	      : "uix-sc-flex-",
				animation         : 'slide',
				slideshow         : true,
				smoothHeight      : true,
				controlNav        : true,
				directionNav      : false,
				animationSpeed    : 600,
				slideshowSpeed    : 7000,
				selector          : ".slides > li",
				start: function(slider) {
					
				}
	
			} ); 
			 
			
			 
		} 
	}); 



	$( function() {  
			 $.uix_sc_init();
			
	} ); 
	
} ) ( jQuery );

/*! 
 *************************************
 * Initialize Gallery list
 *************************************
 */
( function( $ ) {
	$.fn.uix_sc_initGallerylist = function(options){

		this.each(function(){
			
				//returns new id
				var $this = $( this ),
				    itemImgHeight = Array(),
				    itemBox = $this.find( '.uix-sc-gallery-list .uix-sc-gallery-list-imgbox a' ),
					itemImg = $this.find( '.uix-sc-gallery-list .uix-sc-gallery-list-imgbox a img' );
					
				itemImg.each( function( index ) {
					var tempheight = $( this ).height();
					
					itemImgHeight.push( tempheight );
				} );
				
				var itemImgHeight_min = Math.min.apply( Math, itemImgHeight );
	
				
				if ( itemBox.height() > itemImg.height() ){
					itemBox.css( 'height', itemImgHeight_min + 'px' );
				
				} 

			
		} );

	
  };
} )( jQuery );




/*! 
 *************************************
 * Initialize Pricing
 *************************************
 */
( function( $ ) {
	$.fn.uix_sc_initPricing = function(options){

		this.each(function(){
			    
				//returns new id
				var $this = $( this );
					
				var priceBGH = Array();
				var priceBGH_excerpt = Array();
				var $initHeight = $this.find( '.uix-sc-price-init-height' );
				
				$initHeight.each( function( index ) {
					//Screen protection of height 
					$( this ).find( '.uix-sc-price-border,.uix-sc-price-excerpt' ).css( 'height', 'auto' );
					
					var tempheight = $( this ).height();
					var tempheight_excerpt = $( this ).find( '.uix-sc-price-excerpt' ).height();
					priceBGH.push( tempheight );
					priceBGH_excerpt.push( tempheight_excerpt );
				
			
				} );
				var priceBGH_Max = Math.max.apply( Math, priceBGH );
				var priceBGH_Max_excerpt = Math.max.apply( Math, priceBGH_excerpt );
		
				
				
				if ( priceBGH_Max > 0 ) {
					if ( $( document.body ).width() > 768 ){
						$initHeight.find( '.uix-sc-price-border' ).css( 'height', priceBGH_Max + 'px' );
						$initHeight.find( '.uix-sc-price-border.uix-sc-price-important' ).css( 'height', priceBGH_Max + 80 + 'px' );
					
					} else {
						$initHeight.find( '.uix-sc-price-border' ).css( 'height', 'auto' );	
					}
	
				}
				

			
		} );

	
  };
} )( jQuery );






/*! 
 *************************************
 * Initialize Accordion & Tabs
 *************************************
 */
( function( $ ) {
	$.fn.uix_sc_initAccordion = function(options){
		var settings=$.extend({
			"speed": 300
		}
		,options);
		
		this.each(function(){
			
				//returns new id
				var $this = $( this ),
					tranEfftct = $this.data( 'effect' ),
					spoilerContent = '.uix-sc-spoiler-content';
					
					
				//Tabs
				if ( $this.hasClass('uix-sc-tabs') ) {
					
					var $tabsLi = $this.find( '.uix-sc-tabs-title li' );
					
					$this.find( '.uix-sc-tabs-title li:eq(0)' ).addClass( 'active' );
					$this.find( '.uix-sc-spoiler-content:eq(0)' ).show().addClass( 'active' );
					
					
						
						
					$tabsLi.unbind( 'click' ).click( function( e ){
					
						var  contentIndex = $( this ).index(),
							$title = $( this ),
							$content = $this.find( spoilerContent+':eq('+contentIndex+')' ),
							toggleClass = 'active';
							
							
								
							$tabsLi.removeClass( toggleClass );
							$this.find( spoilerContent ).removeClass( toggleClass );
							
							$title.toggleClass( toggleClass );
							$content.toggleClass( toggleClass );
							
							//Open/close content
							if ( tranEfftct == 'slide' ) {
								$this.find( spoilerContent ).not( '.' + toggleClass ).slideUp( settings.speed );	
								$content.slideDown( settings.speed );	
	
							}
							if ( tranEfftct == 'fade' ) {
								
								$this.find( spoilerContent ).not( '.' + toggleClass ).hide();	
								$content.fadeIn( settings.speed );
								
							}
							if ( tranEfftct == 'none' ) {
								$this.find( spoilerContent ).not( '.' + toggleClass ).hide();	
								$content.show();	
	
							}	
					
							
							// Scroll in spoiler in accordion
							e.preventDefault();	
					
					
					} );
	
					
				} else {
					
				    var $spoilerBox = $this.find( '.uix-sc-spoiler' ),
					    spoilerCloseClass = 'uix-sc-spoiler-closed';
					
					
					$spoilerBox.unbind( 'click' ).click( function( e ){ //prevent the extra click event from $spoilerBox
					
						var $title = $( '.uix-sc-spoiler-title', this ), 
							$spoiler = $title.parent(), 
							$content = $( this ).find( spoilerContent );
					
					
							if ( $title.css( 'widows' ) != 2 ) {
								
								// Open/close spoiler
								$spoiler.toggleClass( spoilerCloseClass );
								
								// Close other spoilers in accordion
								$spoilerBox.removeClass( spoilerCloseClass );	
								
								$( this ).addClass( spoilerCloseClass );
								
								//Open/close content
								if ( tranEfftct == 'slide' ) {
									$this.find( spoilerContent ).not( '.' + spoilerCloseClass ).slideUp( settings.speed );	
									$content.slideDown( settings.speed );	
		
								}
								if ( tranEfftct == 'fade' ) {
									$this.find( spoilerContent ).not( '.' + spoilerCloseClass ).hide();	
									$content.fadeIn( settings.speed );	
		
								}
								if ( tranEfftct == 'none' ) {
									$this.find( spoilerContent ).not( '.' + spoilerCloseClass ).hide();	
									$content.show();	
		
								}						
													
			
							} else {
								
								$( this ).removeClass( spoilerCloseClass );
								
								//Open/close content
								if ( tranEfftct == 'slide' ) {
									$this.find( spoilerContent ).not( '.' + spoilerCloseClass ).slideUp( settings.speed );	
								}
								if ( tranEfftct == 'fade' ) {
									$this.find( spoilerContent ).not( '.' + spoilerCloseClass ).fadeOut( settings.speed );	
								}
								if ( tranEfftct == 'none' ) {
									$this.find( spoilerContent ).not( '.' + spoilerCloseClass ).hide();	
								}												
									
							}
							
				
							// Scroll in spoiler in accordion
							e.preventDefault();	
					
					
					} );
	
					
				}
				
				

			
		} );

	
  };
} )( jQuery );


