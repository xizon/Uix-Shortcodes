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
	 *  Filterable
	 *************************************
	 */

	$.extend({ 
		uix_sc_filterable:function ( options ) { 

			var settings=$.extend({
				"classprefix": 'uix-sc-portfolio-',
				"ID": ''
			}
			,options);

			var filterBox = $( '#'+settings.classprefix+'filter-stage-'+settings.ID+'' ),
				filterNav = $( '#'+settings.classprefix+'cat-list-'+settings.ID+'' ),
				filterItemSelector = '.'+settings.classprefix+'item';
			
			
			 filterBox.shuffle({
				itemSelector: filterItemSelector,
				speed: 550, // Transition/animation speed (milliseconds).
				easing: 'ease-out', // CSS easing function to use.
				sizer: null // Sizer element. Use an element to determine the size of columns and gutters.
			  });
			  
			//init
			imagesLoaded( '#'+settings.classprefix+'filter-stage-'+settings.ID+'' ).on( 'always', function() {
				 $( '#'+settings.classprefix+'cat-list-'+settings.ID+' li:first a' ).trigger( 'click' ); 
			 });
			  
			
			filterNav.find( 'li > a' ).unbind( 'click' ).click( function(){
				
				  var thisBtn = $( this ),
					  activeClass = 'current',
					  isActive = thisBtn.hasClass( activeClass ),
					  group = isActive ? 'all' : thisBtn.data( 'group' );
			
				  // Hide current label, show current label in title
				  if ( !isActive ) {
					filterNav.find( '.' + activeClass ).removeClass( activeClass );
				  }
			
				  thisBtn.toggleClass( activeClass );
			
				  // Filter elements
				  filterBox.shuffle( 'shuffle', group );
				  
				  return false;
				  
				  
			} ); 
		
			
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
			
			// Progress Bar
			$( '.uix-sc-bar-box-square' ).each(function() {
				var perc  = $( '.uix-sc-bar', this).data( 'percent' ),
				    size  = $( '.uix-sc-bar', this).data( 'size' ),
				    linewidth  = $( '.uix-sc-bar', this).data( 'linewidth' ),
					trackcolor  = $( '.uix-sc-bar', this).data( 'trackcolor' ),
					barcolor  = $( '.uix-sc-bar', this).data( 'barcolor' ),
					units  = $( '.uix-sc-bar', this).data( 'units' ),
					iconName  = $( '.uix-sc-bar', this).data( 'icon' ),
					boxheight  = $( '.uix-sc-bar-info', this).height();
					
				if ( boxheight > 0 ) $( this ).css( { 'height': linewidth + boxheight + 'px' } );
				$( '.uix-sc-bar', this).css( { 'height': linewidth + 'px', 'width': '100%', 'background': trackcolor } );
				$( '.uix-sc-bar .uix-sc-bar-percent', this).css( { 'height': linewidth + 'px', 'width': 0, 'background': barcolor } ).animate( { percentage: perc, width: perc + '%' }, {duration: 1000 } );
				$( '.uix-sc-bar .uix-sc-bar-text', this).uix_sc_progress( { percentage: perc, units: units, icon: iconName } ); 
				
				
			});
			
			
			$( '.uix-sc-bar-box-circular' ).each(function() {
				var perc  = $( '.uix-sc-bar .uix-sc-bar-percent', this).data( 'percent' ),
				    size  = $( '.uix-sc-bar .uix-sc-bar-percent', this).data( 'size' ),
					sizeNum  = size.replace( 'px', '' ),
				    linewidth  = $( '.uix-sc-bar .uix-sc-bar-percent', this).data( 'linewidth' ),
					trackcolor  = $( '.uix-sc-bar .uix-sc-bar-percent', this).data( 'trackcolor' ),
					barcolor  = $( '.uix-sc-bar .uix-sc-bar-percent', this).data( 'barcolor' ),
					units  = $( '.uix-sc-bar .uix-sc-bar-percent', this).data( 'units' ),
					icon  = $( '.uix-sc-bar .uix-sc-bar-percent', this).data( 'icon' );
				
				$( '.uix-sc-bar', this ).easyPieChart({
					onStep: function(from, to, percent) { 
					    var txtShow = ( icon != '' ) ? '<i class="fa fa-'+icon+'"></i>' : Math.round( percent ) + units;
						$( this.el ).find( '.uix-sc-bar-percent' ).html( txtShow ).css( { 'line-height': size, 'width': size } ); 
					},
					barColor: barcolor,
					trackColor: trackcolor,
					scaleLength: 0,
					lineWidth: linewidth,
					size: sizeNum
				});

			});
	
		
			 
		} 
	}); 






	$( function() {  
			 $.uix_sc_init();
			
	} ); 
	
} ) ( jQuery );





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



/*! 
 *************************************
 * Number Incrementers of Progress Bar 
 *************************************
 */
( function( $ ) {
	$.fn.uix_sc_progress = function(options){

		var settings=$.extend({
			"percentage": 75,
			"speed": 1000,
			"units": '%',
			"icon": ''
		}
		,options);
		
		this.each(function(){
			    
			var $el = $( this ),
				value = settings.percentage;
		
			$( { percentage: 0 } ).stop(true).animate( { percentage: value }, {
				duration : settings.speed,
				step: function () {
					// percentage with 1 decimal;
					var percentageVal = parseInt( Math.round(this.percentage * 10) / 10 );
					
					if ( settings.icon != '' ) {
						$el.html( '<i class="fa fa-'+settings.icon+'"></i>' );
					} else {
						$el.html( percentageVal + settings.units );
					}
					
				}
			}).promise().done(function () {
				// hard set the value after animation is done to be
				// sure the value is correct
				if ( settings.icon != '' ) {
					$el.html( '<i class="fa fa-'+settings.icon+'"></i>' );
				} else {
					$el.html( value + settings.units );
				}			
				
				
			});

			
		} );

	
  };
} )( jQuery );


