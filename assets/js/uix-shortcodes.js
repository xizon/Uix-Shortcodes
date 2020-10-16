/* *************************************


	---------------------------
	UIX SHORTCODES SCRIPTS
	---------------------------

	TABLE OF CONTENTS
	---------------------------

    1. Through the Pricing Styling Parameters to determine the style
	2. Accordion & Tabs
	3. Progress Bar
	4. Pricing
    5. Parallax
    6. Testimonials
	7. prettyPhoto
	8. Portfolio ( With Filterable and Masonry )
	9. Buttons
	10. Image Slider
	11. Initialize the map container
	12. Apply the original scripts
	


************************************* */


var templateUrl  = wp_plug_uixsc_root_path.templateUrl;
var uixScRootUrl = wp_plug_uixsc_root_path.uixScRootUrl;
var styleName    = 'elegant';

var uix_sc = (function ( $, window, document ) {
    'use strict';

    var uix_sc         = {},
        components    = { documentReady: [], pageLoaded: [] };

	if( $.isFunction( $.fn.waitForImages ) ){
		$( 'body' ).waitForImages( pageLoaded );
	} else {
		$( window ).on( 'load', pageLoaded );
	}

    $( document ).ready( documentReady );



    function documentReady( context ) {

        context = typeof context == typeof undefined ? $ : context;
        components.documentReady.forEach( function( component ) {
            component( context );
        });
    }

    function pageLoaded( context ){

        context = typeof context == "object" ? $ : context;
        components.pageLoaded.forEach( function( component ) {
           component( context );
        });
    }

    uix_sc.setContext = function ( contextSelector ) {
        var context = $;
        if( typeof contextSelector !== typeof undefined ) {
            return function( selector ) {
                return $( contextSelector ).find( selector );
            };
        }
        return context;
    };

    uix_sc.components         = components;
    uix_sc.documentReady      = documentReady;
	uix_sc.pageLoaded         = pageLoaded;

    return uix_sc;
}( jQuery, window, document ) );



(function($){
  var cache = {};

  $.UixSCTmpl = function UixSCTmpl(str, data){
	  

  // Figure out if we're getting a template, or if we need to
  // load the template - and be sure to cache the result.
   // The HTML code "<div data-tmpl="0"></div>" is order to fixed "Maximum call stack size exceeded"
  var fn = !/\W/.test(str) ?
      cache[str] = cache[str] ||
      UixSCTmpl( ( document.getElementById( str ) === null ? '<div data-tmpl="0"></div>' + str : document.getElementById(str).innerHTML ) ) :

      // Generate a reusable function that will serve as a template
      // generator (and which will be cached).
      new Function("obj",
        "var p=[],print=function(){p.push.apply(p,arguments);};" +

        // Introduce the data as local variables using with(){}
        "with(obj){p.push('" +

        // Convert the template into pure JavaScript
        str
          .replace(/[\r\t\n]/g, " ")
          .split("<%").join("\t")
          .replace(/((^|%>)[^\t]*)'/g, "$1\r")
          .replace(/\t=(.*?)%>/g, "',$1,'")
          .split("\t").join("');")
          .split("%>").join("p.push('")
          .split("\r").join("\\'")
      + "');}return p.join('');");

    // Provide some basic currying to the user
    return data ? fn( data ) : fn;
  };

  $.fn.UixSCTmpl = function(str, data){
    return this.each(function(){

		var curData = $.UixSCTmpl( str, data );
        $( this ).html( curData );
		
    });
  };
})(jQuery);	


/*!
 *************************************
 * 1. Through the Pricing Styling Parameters to determine the style
 *************************************
 */
uix_sc = ( function ( uix_sc, $, window, document ) {
    'use strict';


    var documentReady = function( $ ) {

		var curStyle  = $( '#uix-shortcodes-css' ).attr( 'href' );
		
		if( typeof curStyle != typeof undefined ) {
			
			if ( curStyle.indexOf( 'shortcodes.css' ) >= 0 ) styleName = 'elegant';
			if ( curStyle.indexOf( 'shortcodes-slant.css' ) >= 0 ) styleName = 'slant';
			if ( curStyle.indexOf( 'shortcodes-rich.css' ) >= 0 ) styleName = 'rich';
		
		}


	};


    uix_sc.stylesname = {
        documentReady : documentReady
    };

    uix_sc.components.documentReady.push( documentReady );
    return uix_sc;

}( uix_sc, jQuery, window, document ) );


/*!
 *************************************
 * 2. Accordion & Tabs
 *************************************
 */
uix_sc = ( function ( uix_sc, $, window, document ) {
    'use strict';


    var documentReady = function( $ ) {

		$( '.uix-sc-accordion' ).each( function(){

				//returns new id
				var $this              = $( this ),
					tranEfftct         = $this.data( 'effect' ),
					spoilerContent     = '.uix-sc-spoiler__content',
					speed              = 300,
					spoilerCloseClass  = 'uix-sc-spoiler--closed',
					$spoilerBox        = $this.find( '.uix-sc-spoiler' );



				//Tabs
				if ( $this.hasClass( 'uix-sc-tabs' ) ) {

					var $tabsLi = $this.find( '.uix-sc-tabs__title li' );

					$this.find( '.uix-sc-tabs__title li:eq(0)' ).addClass( 'active' );
					$this.find( '.uix-sc-spoiler__content:eq(0)' ).show().addClass( 'active' );




					$tabsLi.on( 'click', function( e ) {

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
								$this.find( spoilerContent ).not( '.' + toggleClass ).slideUp( speed );
								$content.slideDown( speed );

							}
							if ( tranEfftct == 'fade' ) {

								$this.find( spoilerContent ).not( '.' + toggleClass ).hide();
								$content.fadeIn( speed );

							}
							if ( tranEfftct == 'none' ) {
								$this.find( spoilerContent ).not( '.' + toggleClass ).hide();
								$content.show();

							}


							// Scroll in spoiler in accordion
							e.preventDefault();


					} );


				} else {

					$( '.uix-sc-accordion .'+spoilerCloseClass ).find( spoilerContent ).show();


					$spoilerBox.on( 'click', function( e ) { //prevent the extra click event from $spoilerBox

						var $title = $( '.uix-sc-spoiler__title', this ),
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
									$this.find( spoilerContent ).not( '.' + spoilerCloseClass ).slideUp( speed );
									$content.slideDown( speed );

								}
								if ( tranEfftct == 'fade' ) {
									$this.find( spoilerContent ).not( '.' + spoilerCloseClass ).hide();
									$content.fadeIn( speed );

								}
								if ( tranEfftct == 'none' ) {
									$this.find( spoilerContent ).not( '.' + spoilerCloseClass ).hide();
									$content.show();

								}


							} else {

								$( this ).removeClass( spoilerCloseClass );

								//Open/close content
								if ( tranEfftct == 'slide' ) {
									$this.find( spoilerContent ).not( '.' + spoilerCloseClass ).slideUp( speed );
								}
								if ( tranEfftct == 'fade' ) {
									$this.find( spoilerContent ).not( '.' + spoilerCloseClass ).fadeOut( speed );
								}
								if ( tranEfftct == 'none' ) {
									$this.find( spoilerContent ).not( '.' + spoilerCloseClass ).hide();
								}

							}


							// Scroll in spoiler in accordion
							e.preventDefault();


					} );


				}


		});

	};


    uix_sc.accordion = {
        documentReady : documentReady
    };

    uix_sc.components.documentReady.push( documentReady );
    return uix_sc;

}( uix_sc, jQuery, window, document ) );




/*!
 *************************************
 * 3. Progress Bar
 *************************************
 */
uix_sc = ( function ( uix_sc, $, window, document ) {
    'use strict';


    var documentReady = function( $ ) {

		var barspeed = 1000;

		$( '.uix-sc-bar__box--square' ).each(function() {
			var $this       = $( this ),
				perc        = $( '.uix-sc-bar', this).data( 'percent' ),
				size        = $( '.uix-sc-bar', this).data( 'size' ),
				linewidth   = $( '.uix-sc-bar', this).data( 'linewidth' ),
				trackcolor  = $( '.uix-sc-bar', this).data( 'trackcolor' ),
				barcolor    = $( '.uix-sc-bar', this).data( 'barcolor' ),
				units       = $( '.uix-sc-bar', this).data( 'units' ),
				icon        = $( '.uix-sc-bar', this).data( 'icon' ),
				chkicon     = icon
								.replace(/fa/g, '' )
								.replace(/flaticon/g, '' )
								.replace(/-/g, '' ),
				boxheight   = $( '.uix-sc-bar__info', this).height();

			//Determines whether the width is 100%
			if ( $( this ).find( '> div' ).attr( 'style' ).indexOf( '100%' ) >= 0 ) {
				$( this ).css( 'width', '100%' );
			}


			if ( boxheight > 0 ) $( this ).css( { 'height': linewidth + boxheight + 'px' } );
			$( '.uix-sc-bar', this).css( { 'height': linewidth + 'px', 'width': '100%', 'background': trackcolor } );
			$( '.uix-sc-bar .uix-sc-bar__percent', this).css( { 'height': linewidth + 'px', 'width': 0, 'background': barcolor } );
			$( '.uix-sc-bar .uix-sc-bar__text', this).html( '' );


			$this.find( '.uix-sc-bar .uix-sc-bar__text' ).each( function()  {

				if ( $this.find( '.uix-sc-bar .uix-sc-bar__percent' ).width() == 0 ) {

					$this.find( '.uix-sc-bar .uix-sc-bar__percent' ).css( { 'height': linewidth + 'px', 'width': 0, 'background': barcolor } ).animate( { percentage: perc, width: perc + '%'  }, {duration: barspeed } );

					var $el = $( this ),
						value = perc;


					$( { percentage: 0 } ).stop(true).animate( { percentage: value }, {
						duration : barspeed,
						step: function () {
							// percentage with 1 decimal;
							var percentageVal = parseInt( Math.round(this.percentage * 10) / 10 );

							if ( chkicon.length > 2 ) {
								$el.html( '<i class="'+icon+'"></i>' );
							} else {
								$el.html( percentageVal + units );
							}

						}
					}).promise().done(function () {
						// hard set the value after animation is done to be
						// sure the value is correct
						if ( chkicon.length > 2 ) {
							$el.html( '<i class="'+icon+'"></i>' );
						} else {
							$el.html( value + units );
						}


					});


				}

			});


		});


		$( '.uix-sc-bar__box-circular' ).each(function() {

			var $this      = $( this ),
				perc       = $( '.uix-sc-bar', this).data( 'percent' ),
				size       = $( '.uix-sc-bar .uix-sc-bar__percent', this).data( 'size' ),
				sizeNum    = size.replace( 'px', '' ),
				linewidth  = $( '.uix-sc-bar .uix-sc-bar__percent', this).data( 'linewidth' ),
				trackcolor = $( '.uix-sc-bar .uix-sc-bar__percent', this).data( 'trackcolor' ),
				barcolor   = $( '.uix-sc-bar .uix-sc-bar__percent', this).data( 'barcolor' ),
				units      = $( '.uix-sc-bar .uix-sc-bar__percent', this).data( 'units' ),
				icon       = $( '.uix-sc-bar .uix-sc-bar__percent', this).data( 'icon' );

			$( '.uix-sc-bar', this ).easyPieChart({
				animate: barspeed,
				barColor: barcolor,
				trackColor: trackcolor,
				scaleLength: 0,
				lineWidth: linewidth,
				size: sizeNum
			});

			$( '.uix-sc-bar', this ).data( 'easyPieChart' ).update( 0 );



		});

		$( '.uix-sc-bar__box-circular' ).each(function() {

			if ( $( '.uix-sc-bar .uix-sc-bar__percent', this ).text().length == 0 ) {

				var $this      = $( this ),
					perc       = $( '.uix-sc-bar', this).data( 'percent' ),
					size       = $( '.uix-sc-bar .uix-sc-bar__percent', this).data( 'size' ),
					sizeNum    = size.replace( 'px', '' ),
					linewidth  = $( '.uix-sc-bar .uix-sc-bar__percent', this).data( 'linewidth' ),
					trackcolor = $( '.uix-sc-bar .uix-sc-bar__percent', this).data( 'trackcolor' ),
					barcolor   = $( '.uix-sc-bar .uix-sc-bar__percent', this).data( 'barcolor' ),
					units      = $( '.uix-sc-bar .uix-sc-bar__percent', this).data( 'units' ),
					icon       = $( '.uix-sc-bar .uix-sc-bar__percent', this).data( 'icon' ),
					chkicon    = icon
									.replace(/fa/g, '' )
									.replace(/flaticon/g, '' )
									.replace(/-/g, '' ),
					$txtcont   = $( '.uix-sc-bar', this ).find( '.uix-sc-bar__percent' );


				$( '.uix-sc-bar', this ).data( 'easyPieChart' ).update( perc );
				$( '.uix-sc-bar', this ).find( '.uix-sc-bar__percent' ).css( { 'line-height': size, 'width': size } ).animate( { percentage: perc }, {duration: barspeed } );
				$( { percentage: 0 } ).stop(true).animate( { percentage: perc }, {
					duration : barspeed,
					step: function () {
						// percentage with 1 decimal;
						var percentageVal = parseInt( Math.round(this.percentage * 10) / 10 );

						if ( chkicon.length > 2 ) {
							$txtcont.html( '<i class="'+icon+'"></i>' );
						} else {
							$txtcont.html( percentageVal + units );
						}

					}
				}).promise().done(function () {
					// hard set the value after animation is done to be
					// sure the value is correct
					if ( chkicon.length > 2 ) {
						$txtcont.html( '<i class="'+icon+'"></i>' );
					} else {
						$txtcont.html( perc + units );
					}


				});


			}


		});


	};


    uix_sc.progressbar = {
        documentReady : documentReady
    };

    uix_sc.components.documentReady.push( documentReady );
    return uix_sc;

}( uix_sc, jQuery, window, document ) );



/*!
 *************************************
 * 4. Pricing
 *************************************
 */
uix_sc = ( function ( uix_sc, $, window, document ) {
    'use strict';


    var documentReady = function( $ ) {

		
		//Initialize the height
		$( '.uix-sc-price' ).each( function(){
			

				//returns new id
				var $this            = $( this ),
					priceBGH         = Array(),
					priceBGH_excerpt = Array(),
					$initHeight      = $this.find( '.uix-sc-price__init-height' );

				$initHeight.each( function( index ) {
					//Screen protection of height
					$( this ).find( '.uix-sc-price__border,.uix-sc-price__excerpt' ).css( 'height', 'auto' );

					var tempheight = $( this ).height();
					var tempheight_excerpt = $( this ).find( '.uix-sc-price__excerpt' ).height();
					priceBGH.push( tempheight );
					priceBGH_excerpt.push( tempheight_excerpt );


				} );

				var priceBGH_Max         = Math.max.apply( Math, priceBGH ),
					priceBGH_Max_excerpt = Math.max.apply( Math, priceBGH_excerpt );



				if ( priceBGH_Max > 0 ) {
					if ( $( document.body ).width() > 768 ){
						
					    // Initialize the height of all columns
						$initHeight.find( '.uix-sc-price__border' ).css( 'height', priceBGH_Max + 'px' );
						
						// Actived columns
						$initHeight.find( '.uix-sc-price__border.uix-sc-price__important' ).each( function() {
							
							if ( styleName == 'elegant' || styleName == 'slant' ) {
								var ty = Math.abs( parseInt( $( this ).css('transform').split(',')[5]));
								if ( !isNaN(ty) ) {
									$( this ).css( 'height', priceBGH_Max + ty*2 + 'px' );
								}
							}
							
						});	
						
					


					} else {
						$initHeight.find( '.uix-sc-price__border' ).css( 'height', 'auto' );

						
					}
					
					
					// Actived columns
					$initHeight.find( '.uix-sc-price__border.uix-sc-price__important' ).each( function() {

						if ( styleName == 'rich' ) {
							var textColor = $( this ).closest( '.uix-sc-price__border-hover' ).data( 'tcolor' ),
								btnColor  = $( this ).closest( '.uix-sc-price__border-hover' ).data( 'bcolor' );

							$( this ).css( 'background-color', btnColor );
						}

					});	
						
					

				}


		});

		//Border of the hover effect
		$( '.uix-sc-price__border-hover' ).each( function(){

			var $this        = $( this ),
				hw           = 6,
				defaultColor = $this.find( '.uix-sc-price__border' ).css( 'border-color' ),
				textColor    = $this.data( 'tcolor' ),
				btnColor     = $this.data( 'bcolor' );

			if ( styleName == 'elegant' ) {
				$this.hover(function() {
					$(this).find( '.uix-sc-price__border' ).css({
						"border-color": textColor,
						"-webkit-box-shadow": "inset 0 0px 0px "+hw+"px " + textColor,
						"-moz-box-shadow": "inset 0 0px 0px "+hw+"px " + textColor,
						"box-shadow": "inset 0 0px 0px "+hw+"px " + textColor
					});
				},function() {
					$(this).find( '.uix-sc-price__border' ).css({
						"border-color": defaultColor,
						"-webkit-box-shadow": "none",
						"-moz-box-shadow": "none",
						"box-shadow": "none"
					});
				});
			}

		});	

	

	};


    uix_sc.pricing = {
        documentReady : documentReady
    };

    uix_sc.components.documentReady.push( documentReady );
    return uix_sc;

}( uix_sc, jQuery, window, document ) );



/*!
 *************************************
 * 5. Parallax
 *************************************
 */

/* 
 *************************************
 * Parallax Effect
 *
 * @param  {Number} speed     - The speed of movement between elements.
 * @param  {JSON} bg          - Specify the background display. Default value: { enable: true, xPos: '50%' }
 * @return {Void}             - The constructor.
 *************************************
 */

( function ( $ ) {
    $.fn.uix_sc_parallax = function( options ) {
 
        // This is the easiest way to have default options.
        var settings = $.extend({
			speed    : 0.25,
			bg       : { enable: true, xPos: '50%' }
        }, options );
 
        this.each( function() {
			
			var bgEff      = settings.bg,
				$this      = $( this ),
				bgXpos     = '50%',
				speed      = -parseFloat( settings.speed );
			
		
	
			//Prohibit transition delay
			$this.css( {
				'transition': 'none'
			} );

		    $( window ).on( 'scroll touchmove', function( e ){
				scrollUpdate();
			});
			
			
			//Initialize the position of the background
			if ( bgEff ) {
				//background parallax
				$this.css('background-position', bgXpos + ' ' + (-$this.offset().top*speed) + 'px' );
			
			} 
			
			
			function scrollUpdate() {
				var scrolled = $( window ).scrollTop(),
					st       = $this.offset().top - scrolled;
				

				if ( bgEff ) {
					//background parallax
					$this.css('background-position', bgXpos + ' ' + ( 0 - ( st * speed ) ) + 'px' );
				}
				
			}

			
			
		});
 
    };
 
}( jQuery ));


uix_sc = ( function ( uix_sc, $, window, document ) {
    'use strict';


    var documentReady = function( $ ) {

		
        var $window       = $( window ),
		    windowWidth   = $window.width();
		
		uix_sc_parallaxInit( windowWidth );
		
		$window.on('resize', function() {
			windowWidth = $window.width();
			uix_sc_parallaxInit( windowWidth );
		});
		
		function uix_sc_parallaxInit( w ) {
			$( '.uix-sc-parallax' ).each(function() {
				$( this ).uix_sc_parallax( { speed: $( this ).data( 'parallax' ) } );
			});
			
		}

	};


    uix_sc.parallax = {
        documentReady : documentReady
    };

    uix_sc.components.documentReady.push( documentReady );
    return uix_sc;

}( uix_sc, jQuery, window, document ) );




/*!
 *************************************
 * 6. Testimonials
 *************************************
 */
uix_sc = ( function ( uix_sc, $, window, document ) {
    'use strict';


    var documentReady = function( $ ) {

		$( '[data-uix-sc-hybridcontent-slider="1"]' ).each( function()  {

			 var $this     = $( this );

			$this.UixShortcodesHybridContentSlider({

				//Get parameter configuration from the data-* attribute of HTML
				dir               : $this.data( 'dir' ),
				auto              : $this.data( 'auto' ),
				speed             : $this.data( 'speed' ),
				timing            : $this.data( 'timing' ),
				loop              : $this.data( 'loop' ),
				draggable         : $this.data( 'draggable' ),
				draggableCursor   : $this.data( 'draggable-cursor' ),
				nextID            : $this.data( 'next' ),
				prevID            : $this.data( 'prev' ),
				paginationID      : $this.data( 'pagination' )
				
			});

		});	


	};


    uix_sc.testimonials = {
        documentReady : documentReady
    };

    uix_sc.components.documentReady.push( documentReady );
    return uix_sc;

}( uix_sc, jQuery, window, document ) );


/*!
 *************************************
 * 7. prettyPhoto
 *************************************
 */
uix_sc = ( function ( uix_sc, $, window, document ) {
    'use strict';


    var documentReady = function( $ ) {

	    $( "a[rel^='uix-sc-prettyPhoto']" ).prettyPhoto({
			 animation_speed:'normal',
			 theme:'dark_rounded',
			 slideshow:3000,
			 utoplay_slideshow: false
		 });

	};


    uix_sc.prettyPhoto = {
        documentReady : documentReady
    };

    uix_sc.components.documentReady.push( documentReady );
    return uix_sc;

}( uix_sc, jQuery, window, document ) );




/*!
 *************************************
 * 8. Portfolio ( With Filterable and Masonry )
 *************************************
 */
uix_sc = ( function ( uix_sc, $, window, document ) {
    'use strict';


    var documentReady = function( $ ) {

		
		/* @ Version 1.0 (October 15, 2020) */
		$( '.uix-sc-portfolio__wrapper' ).each( function() {

			var galleryType    = $( this ).data( 'show-type' ),
			    filterCat      = $( this ).data( 'filter-id' ),
				$grid          = $( this ).find( '.uix-sc-portfolio__tiles' ),
				$allItems      = $( this ).find( '.uix-sc-portfolio__item' ),
				$filterOptions = $( filterCat );
			
			if ( typeof galleryType === typeof undefined ) return false;
			
			
			/* 
			 ---------------------------
			 Add a tagname to each list item
			 ---------------------------
			 */ 
			// Masonry
			if ( galleryType.indexOf( 'masonry' ) >= 0  ) {
				$( this ).addClass( 'masonry-container' );
				$( this ).find( '.uix-sc-portfolio__item' ).addClass( 'masonry-item' );
			}
			
			// Filterable
			if ( galleryType.indexOf( 'filter' ) >= 0  ) {
				$( this ).addClass( 'filter-container' );
				$( this ).find( '.uix-sc-portfolio__item' ).addClass( 'filter-item' );	
			}	

			
			if ( galleryType.indexOf( 'filter' ) >= 0 || galleryType.indexOf( 'masonry' ) >= 0 ) {

				var MuuriGrid = new Muuri( $grid.get(0), {
					items: $grid.get(0).querySelectorAll( '.uix-sc-portfolio__item' ),
					
					// Default show animation
					showDuration: 300,
					showEasing: 'ease',

					// Default hide animation
					hideDuration: 300,
					hideEasing: 'ease',

					// Item's visible/hidden state styles
					visibleStyles: {
						opacity: '1',
						transform: 'scale(1)'
					},
					hiddenStyles: {
						opacity: '0',
						transform: 'scale(0.5)'
					},

					// Layout
					layout: {
						fillGaps: false,
						horizontal: false,
						alignRight: false,
						alignBottom: false,
						rounding: true
					},
					layoutOnResize: 100,
					layoutOnInit: true,
					layoutDuration: 300,
					layoutEasing: 'ease',
					
					//// Drag & Drop
					dragEnabled: false
				});


				// When all items have loaded refresh their
				// dimensions and layout the grid.
				imagesLoaded( $grid ).on( 'always', function() {
					MuuriGrid.refreshItems().layout();
					// For a little finishing touch, let's fade in
					// the images after all them have loaded and
					// they are corrertly positioned.
					$( 'body' ).addClass( 'images-loaded' );
				});

				
				/* 
				 ---------------------------
				 Function of Filterable and Masonry
				 ---------------------------
				 */ 
				if ( galleryType.indexOf( 'filter' ) >= 0 ) {
	
					$filterOptions.find( 'li > a' ).off( 'click' ).on( 'click', function() {
						var $this       = $( this );
						var activeClass = 'current-cat',
							  isActive    = $this.parent().hasClass( activeClass ),
							  group       = isActive ? 'all' : $this.data( 'group' );

						// Hide current label, show current label in title
						if ( !isActive ) {
							$filterOptions.find( '.' + activeClass ).removeClass( activeClass );
						}

						$this.parent().toggleClass( activeClass );

						// Filter elements
						var filterFieldValue = group;
						MuuriGrid.filter( function ( item ) {

							var element       = item.getElement(),
								  curCats       = element.getAttribute( 'data-groups' ).toString().replace(/^\,|\,$/g, '').replace(/^\[|\]$/g, '') + ',all',
								  isFilterMatch = !filterFieldValue ? true : ( curCats || '' ).indexOf( filterFieldValue ) > -1;

							return isFilterMatch;
						});


						return false;	
					});	
				}

				

			}//endif galleryType.indexOf( 'filter' ) >= 0 || galleryType.indexOf( 'masonry' ) >= 0

			

				
			//remove filter button of all
			//-------
			if ( galleryType.indexOf( 'filter' ) < 0 ) {
				if ( filterCat == '' ) {
					$filterOptions = $( '.uix-products-cat-list' );
				}
				
				$filterOptions.find( '[data-group="all"]' ).parent( 'li' ).remove();
			}	
			

		} );

	};


    uix_sc.portfolio = {
        documentReady : documentReady
    };

    uix_sc.components.documentReady.push( documentReady );
    return uix_sc;

}( uix_sc, jQuery, window, document ) );


/*!
 *************************************
 * 9. Buttons
 *************************************
 */
uix_sc = ( function ( uix_sc, $, window, document ) {
    'use strict';


    var documentReady = function( $ ) {

		 $( '.uix-sc-btn' ).each( function(){

			var $this              = $( this ),
				hoverbg            = $this.data( 'hover' ),
				defaultbg          = $this.data( 'default-bg' );

			 if ( hoverbg != '' ) {

				$this.on( 'mouseenter', function( e ) {
					e.preventDefault();
					$( this ).css( 'background-color', hoverbg );

					return false;
				});
				$this.on( 'mouseleave', function( e ) {
					e.preventDefault();
					$( this ).css( 'background-color', defaultbg );

					return false;
				});		 

			 }




		 });	


	};


    uix_sc.buttons = {
        documentReady : documentReady
    };

    uix_sc.components.documentReady.push( documentReady );
    return uix_sc;

}( uix_sc, jQuery, window, document ) );


/*!
 *************************************
 * 10. Image Slider
 *************************************
 */
uix_sc = ( function ( uix_sc, $, window, document ) {
    'use strict';


    var documentReady = function( $ ) {
		
		$( '[data-uix-sc-slideshow="1"]' ).each( function()  {

			 var $this     = $( this );

			$this.UixShortcodesSlideshow({

				//Get parameter configuration from the data-* attribute of HTML
				auto              : $this.data( 'auto' ),
				timing            : $this.data( 'timing' ),
				loop              : $this.data( 'loop' ),
				countTotalID      : $this.data( 'count-total' ),
				countCurID        : $this.data( 'count-now' ),
				paginationID      : $this.data( 'controls-pagination' ),
				arrowsID          : $this.data( 'controls-arrows' ),
				draggable         : $this.data( 'draggable' ),
				draggableCursor   : $this.data( 'draggable-cursor' )
			});

		});	

	};


    uix_sc.imageSlider = {
        documentReady : documentReady
    };

    uix_sc.components.documentReady.push( documentReady );
    return uix_sc;

}( uix_sc, jQuery, window, document ) );


/*!
 *************************************
 * 11. Initialize the map container
 *************************************
 */
uix_sc = ( function ( uix_sc, $, window, document ) {
    'use strict';


    var documentReady = function( $ ) {

		$( '.uix-sc-map-preview-container' ).each( function( index )  {

			var $frame    = $( this ),
				fullclass = $frame.parent( 'div' ).attr( 'class' ),
			    curheight = $frame.data( 'height' );

			$frame.prev( '.uix-sc-map-preview-tmpl' ).load( uixScRootUrl + 'includes/preview/map.html', function( response, status, xhr ) {

				response = response.replace(/\<script([^>]+)\>/g, '' ).replace(/\<\/script\>/g, '' );

				//If it is full screen map
				if( typeof fullclass != typeof undefined ) {
					if ( fullclass.indexOf( 'full' ) > 0 ) {
						
						$frame.css( 'height', $( window ).height() + 'px' );
						curheight = '100%';
					} 		
				}

				
				$frame.UixSCTmpl( response, {
					pluginPath : uixScRootUrl,
					width      : $frame.data( 'width' ),
					height     : curheight,
					style      : $frame.data( 'style' ),
					apikey     : $frame.data( 'apikey' ),
					latitude   : $frame.data( 'latitude' ),
					longitude  : $frame.data( 'longitude' ),
					zoom       : $frame.data( 'zoom' ),
					name       : $frame.data( 'name' ),
					marker     : $frame.data( 'marker' )
				} );
			});

		});


	};


    uix_sc.map = {
        documentReady : documentReady
    };

    uix_sc.components.documentReady.push( documentReady );
    return uix_sc;

}( uix_sc, jQuery, window, document ) );



/*! 
 * ************************************
 * 12. Apply the original scripts
 * 
 * Usage: if ( $.isFunction( $.uix_sc_init ) ) { $.uix_sc_init(); }
 *
 *************************************
 */	
( function($) {
    'use strict';

	$.extend( { 
		uix_sc_init:function () {

			var scipts_pageLoaded    = uix_sc.components.pageLoaded,
				scipts_documentReady = uix_sc.components.documentReady;
			
			
			for ( var i = 0, len = scipts_pageLoaded.length; i < len; i++ ) {
			     scipts_pageLoaded[i]();
			}
			for ( var i = 0, len = scipts_documentReady.length; i < len; i++ ) {
			     scipts_documentReady[i]( $ );
			}	
	
			
		} 
	});
	
} ) ( jQuery );






/* 
 *************************************
 * Custom Slidershow for Uix Shortcodes
 * @ Version 1.1 (July 30, 2020)
 *
 * @param  {Boolean} auto                  - Setup a slideshow for the slider to animate automatically.
 * @param  {Number} timing                 - Autoplay interval.
 * @param  {Boolean} loop                  - Gives the slider a seamless infinite loop.
 * @param  {String} countTotalID           - Total number ID or class of counter.
 * @param  {String} countCurID             - Current number ID or class of counter.
 * @param  {String} paginationID           - Navigation ID for paging control of each slide.
 * @param  {String} arrowsID               - Previous/Next arrow navigation ID.
 * @param  {Boolean} draggable             - Allow drag and drop on the slider.
 * @param  {String} draggableCursor        - Drag & Drop Change icon/cursor while dragging.
 *
 *************************************
 */    
( function ( $ ) {
	'use strict';
    $.fn.UixShortcodesSlideshow = function( options ) {
 
        // This is the easiest way to have default options.
        var settings = $.extend({
			auto              : false,
            timing            : 10000,
			loop              : false,
            countTotalID      : 'p.count em.count',
            countCurID        : 'p.count em.current',
            paginationID      : '.uix-advanced-slider__pagination',
            arrowsID          : '.uix-advanced-slider__arrows',
            draggable         : false,
            draggableCursor   : 'move'
        }, options );
 
 
        this.each( function() {
			
			
            var $window                   = $( window ),
                windowWidth               = window.innerWidth,
                windowHeight              = window.innerHeight,
                animDelay                 = 0,
                $sliderWrapper            = $( this );


            sliderInit( false );

            $window.on( 'resize', function() {
                // Check window width has actually changed and it's not just iOS triggering a resize event on scroll
                if ( window.innerWidth != windowWidth ) {

                    // Update the window width for next time
                    windowWidth = window.innerWidth;

                    sliderInit( true );

                }
            });



            /*
             * Get the CSS animation/transition duration for a DOM element
             * Useful for matching CSS animations and JS events
             *
             * @private
             * @description This function can be used separately in HTML pages or custom JavaScript.
             * @param  {Object} el     - Target object, using class name or ID to locate.
             * @return {String|JSON}   - The value of property.
             */
            function getTransitionDuration( el ) {
                
                if ( typeof el === typeof undefined ) {
                    return 0;
                }


                var style    = window.getComputedStyle(el),
                    duration = style.webkitTransitionDuration,
                    delay    = style.webkitTransitionDelay;
                

                if ( typeof duration != typeof undefined ) {
                    // fix miliseconds vs seconds
                    duration = (duration.indexOf("ms")>-1) ? parseFloat(duration) : parseFloat(duration)*1000;
                    delay = (delay.indexOf("ms")>-1) ? parseFloat(delay) : parseFloat(delay)*1000;

                    return duration;
                } else {
                    return 0;
                }

            }   

           
        

            /*
             * Initialize slideshow
             *
             * @param  {Boolean} resize            - Determine whether the window size changes.
             * @return {Void}
             */
            function sliderInit( resize ) {

                $sliderWrapper.each( function()  {

                    var $this                    = $( this ),
                        $items                   = $this.find( '.uix-sc-slideshow__item' ),
                        $first                   = $items.first(),
                        nativeItemW,
                        nativeItemH,
                        activated                = $this.data( 'activated' ); 
				
				
                
                    if ( typeof activated === typeof undefined || activated === 0 ) {
                        
                        var dataAuto                = settings.auto, 
                            dataTiming              = settings.timing, 
                            dataLoop                = settings.loop, 
                            dataControlsPagination  = settings.paginationID, 
                            dataControlsArrows      = settings.arrowsID,
                            dataDraggable           = settings.draggable,
                            dataDraggableCursor     = settings.draggableCursor,                     
                            dataCountTotal          = settings.countTotalID,
                            dataCountCur            = settings.countCurID;    

                        
                        if ( typeof dataAuto === typeof undefined ) dataAuto = false;	
                        if ( typeof dataTiming === typeof undefined ) dataTiming = 10000;
                        if ( typeof dataLoop === typeof undefined ) dataLoop = false; 
                        if ( typeof dataControlsPagination === typeof undefined ) dataControlsPagination = '.uix-advanced-slider__pagination';
                        if ( typeof dataControlsArrows === typeof undefined || dataControlsArrows == false ) dataControlsArrows = '.uix-advanced-slider__arrows';
                        if ( typeof dataDraggable === typeof undefined ) dataDraggable = false;
                        if ( typeof dataDraggableCursor === typeof undefined || dataDraggableCursor == false ) dataDraggableCursor = 'move';
                        if ( typeof dataCountTotal === typeof undefined ) dataCountTotal = 'p.count em.count';
                        if ( typeof dataCountCur === typeof undefined ) dataCountCur = 'p.count em.current';      

                        
                        //Images loaded
                        //-------------------------------------	
                        var images = [];
                        $items.each( function()  {
                            var imgURL   = $( this ).find( 'img' ).attr( 'src' );
                            if ( typeof imgURL != typeof undefined ) {
                                images.push( imgURL );
                            }
                        });

                        loader( images, loadImage, function () {
                            $sliderWrapper.addClass( 'is-loaded' );
                        });	
                        
                        

                        //Autoplay times
                        var playTimes;
                        //A function called "timer" once every second (like a digital watch).
                        $this[0].animatedSlides;


                        setTimeout( function(){

                            //The speed of movement between elements.
                            // Avoid the error that getTransitionDuration takes 0
                            animDelay = getTransitionDuration( $first[0] );

                        }, 100 );  



                        //Initialize the first item container
                        //-------------------------------------		
                        $items.addClass( 'next' );
                        setTimeout( function() {
                            $first.addClass( 'is-active' );
                        }, animDelay );  


                        if ( $first.find( 'video' ).length > 0 ) {

                            //Returns the dimensions (intrinsic height and width ) of the video
                            var video    = document.getElementById( $first.find( 'video' ).attr( 'id' ) ),
                                videoURL = $first.find( 'source:first' ).attr( 'src' );
                          
                            if ( typeof videoURL === typeof undefined ) videoURL = $first.find( 'video' ).attr( 'src' );
                            $first.find( 'video' ).css({
                                'width': $this.width() + 'px'
                            });
                            

                            video.addEventListener( 'loadedmetadata', function( e ) {
                                $this.css( 'height', this.videoHeight*($this.width()/this.videoWidth) + 'px' );	

                                nativeItemW = this.videoWidth;
                                nativeItemH = this.videoHeight;	

                                //Initialize all the items to the stage
                                addItemsToStage( $this, nativeItemW, nativeItemH, dataControlsPagination, dataControlsArrows, dataLoop, dataDraggable, dataDraggableCursor, dataCountTotal, dataCountCur );

                            }, false);	

                            video.src = videoURL;


                        } else {

                            var imgURL   = $first.find( 'img' ).attr( 'src' );

                            if ( typeof imgURL != typeof undefined ) {
                                var img = new Image();

                                img.onload = function() {
                                    $this.css( 'height', $this.width()*(this.height/this.width) + 'px' );		

                                    nativeItemW = this.width;
                                    nativeItemH = this.height;	

                                    //Initialize all the items to the stage
                                    addItemsToStage( $this, nativeItemW, nativeItemH, dataControlsPagination, dataControlsArrows, dataLoop, dataDraggable, dataDraggableCursor, dataCountTotal, dataCountCur );

                                };

                                img.src = imgURL;
                            }



                        }	



                        //Autoplay Slider
                        //-------------------------------------		
                        if ( !resize ) {



                            if ( dataAuto && !isNaN( parseFloat( dataTiming ) ) && isFinite( dataTiming ) ) {

                                sliderAutoPlay( playTimes, dataTiming, dataLoop, $this, dataCountTotal, dataCountCur, dataControlsPagination, dataControlsArrows );

                                $this.on({
                                    mouseenter: function() {
                                        clearInterval( $this[0].animatedSlides );
                                    },
                                    mouseleave: function() {
                                        sliderAutoPlay( playTimes, dataTiming, dataLoop, $this, dataCountTotal, dataCountCur, dataControlsPagination, dataControlsArrows );
                                    }
                                });	

                            }


                        }   

                        //Prevents front-end javascripts that are activated with AJAX to repeat loading.
                        $this.data( 'activated', 1 );

                    }//endif activated
  
                    

                });


            }




            /*
             * Trigger slider autoplay
             *
             * @param  {Function} playTimes            - Number of times.
             * @param  {Number} timing                 - Autoplay interval.
             * @param  {Boolean} loop                  - Gives the slider a seamless infinite loop.
             * @param  {Object} slider                 - Selector of the slider .
             * @param  {String} countTotalID           - Total number ID or class of counter.
             * @param  {String} countCurID             - Current number ID or class of counter.
             * @param  {String} paginationID           - Navigation ID for paging control of each slide.
             * @param  {String} arrowsID               - Previous/Next arrow navigation ID.
             * @return {Void}                          - The constructor.
             */
            function sliderAutoPlay( playTimes, timing, loop, slider, countTotalID, countCurID, paginationID, arrowsID ) {	

                var items = slider.find( '.uix-sc-slideshow__item' ),
                    total = items.length;

                slider[0].animatedSlides = setInterval( function() {

                    playTimes = parseFloat( items.filter( '.is-active' ).index() );
                    playTimes++;


                    if ( !loop ) {
                        if ( playTimes < total && playTimes >= 0 ) sliderUpdates( playTimes, $sliderWrapper, 'next', countTotalID, countCurID, paginationID, arrowsID, loop );
                    } else {
                        if ( playTimes == total ) playTimes = 0;
                        if ( playTimes < 0 ) playTimes = total-1;		
                        sliderUpdates( playTimes, $sliderWrapper, 'next', countTotalID, countCurID, paginationID, arrowsID, loop );
                    }



                }, timing );	
            }




            /*
             * Initialize all the items to the stage
             *
             * @param  {Object} slider                 - Current selector of each slider.
             * @param  {Number} nativeItemW            - Returns the intrinsic width of the image/video.
             * @param  {Number} nativeItemH            - Returns the intrinsic height of the image/video.
             * @param  {String} paginationID           - Navigation ID for paging control of each slide.
             * @param  {String} arrowsID               - Previous/Next arrow navigation ID.
             * @param  {Boolean} loop                  - Gives the slider a seamless infinite loop. 
             * @param  {Boolean} draggable             - Allow drag and drop on the slider.
             * @param  {String} draggableCursor        - Drag & Drop Change icon/cursor while dragging.
             * @param  {String} countTotalID           - Total number ID or class of counter.
             * @param  {String} countCurID             - Current number ID or class of counter.
             * @return {Void}
             */
            function addItemsToStage( slider, nativeItemW, nativeItemH, paginationID, arrowsID, loop, draggable, draggableCursor, countTotalID, countCurID ) {

                var $this                    = slider,
                    $items                   = $this.find( '.uix-sc-slideshow__item' ),
                    $first                   = $items.first(),
                    itemsTotal               = $items.length;


                //If arrows does not exist on the page, it will be added by default, 
                //and the drag and drop function will be activated.
                if ( $( arrowsID ).length == 0 ) {
                    $( 'body' ).prepend( '<div style="display:none;" class="uix-sc-slideshow__arrows '+arrowsID.replace('#','').replace('.','')+'"><a href="#" class="uix-sc-slideshow__arrows--prev"></a><a href="#" class="uix-sc-slideshow__arrows--next"></a></div>' );
                }



                //Prevent bubbling
                if ( itemsTotal == 1 ) {
                    $( paginationID ).hide();
                    $( arrowsID ).hide();
                }
                
                
                //Add identifiers for the first and last items
                $items.last().addClass( 'last' );
                $items.first().addClass( 'first' );



                //Pagination dots 
                //-------------------------------------	
                var _dot       = '',
                    _dotActive = '';
                _dot += '<ul>';
                for ( var i = 0; i < itemsTotal; i++ ) {

                    _dotActive = ( i == 0 ) ? 'class="is-active"' : '';

                    _dot += '<li><a '+_dotActive+' data-index="'+i+'" href="javascript:"></a></li>';
                }
                _dot += '</ul>';

                if ( $( paginationID ).html() == '' ) $( paginationID ).html( _dot );

                $( paginationID ).find( 'li a' ).off( 'click' ).on( 'click', function( e ) {
                    e.preventDefault();
                    
                    //Prevent buttons' events from firing multiple times
                    var $btn = $( this );
                    if ( $btn.attr( 'aria-disabled' ) == 'true' ) return false;
                    $( paginationID ).find( 'li a' ).attr( 'aria-disabled', 'true' );
                    setTimeout( function() {
                        $( paginationID ).find( 'li a' ).attr( 'aria-disabled', 'false' );
                    }, animDelay );
                    

                    if ( !$( this ).hasClass( 'is-active' ) ) {


                        //Determine the direction
                        var curDir = 'prev';
                        if ( $( this ).attr( 'data-index' ) > parseFloat( $items.filter( '.is-active' ).index() ) ) {
                            curDir = 'next';
                        }


                        sliderUpdates( $( this ).attr( 'data-index' ), $this, curDir, countTotalID, countCurID, paginationID, arrowsID, loop );

                        //Pause the auto play event
                        clearInterval( $this[0].animatedSlides );	
                    }



                });

                //Next/Prev buttons
                //-------------------------------------		
                var _prev = $( arrowsID ).find( '.uix-sc-slideshow__arrows--prev' ),
                    _next = $( arrowsID ).find( '.uix-sc-slideshow__arrows--next' );

                $( arrowsID ).find( 'a' ).attr( 'href', 'javascript:' );

                $( arrowsID ).find( 'a' ).removeClass( 'is-disabled' );
                if ( !loop ) {
                    _prev.addClass( 'is-disabled' );
                }


                _prev.off( 'click' ).on( 'click', function( e ) {
                    e.preventDefault();
                    
                    //Prevent buttons' events from firing multiple times
                    if ( _prev.attr( 'aria-disabled' ) == 'true' ) return false;
                    _prev.attr( 'aria-disabled', 'true' );
                    setTimeout( function() {
                        _prev.attr( 'aria-disabled', 'false' );
                    }, animDelay );
                    

                    sliderUpdates( parseFloat( $items.filter( '.is-active' ).index() ) - 1, $this, 'prev', countTotalID, countCurID, paginationID, arrowsID, loop );

                    //Pause the auto play event
                    clearInterval( $this[0].animatedSlides );

                });

                _next.off( 'click' ).on( 'click', function( e ) {
                    e.preventDefault();
                    
                    
                    //Prevent buttons' events from firing multiple times
                    if ( _next.attr( 'aria-disabled' ) == 'true' ) return false;
                   _next.attr( 'aria-disabled', 'true' );
                    setTimeout( function() {
                        _next.attr( 'aria-disabled', 'false' );
                    }, animDelay );
                    

                    sliderUpdates( parseFloat( $items.filter( '.is-active' ).index() ) + 1, $this, 'next', countTotalID, countCurID, paginationID, arrowsID, loop );


                    //Pause the auto play event
                    clearInterval( $this[0].animatedSlides );


                });



                //Added touch method to mobile device and desktop
                //-------------------------------------	
                var $dragDropTrigger = $items;


                //Make the cursor a move icon when a user hovers over an item
                if ( draggable && draggableCursor != '' && draggableCursor != false ) $dragDropTrigger.css( 'cursor', draggableCursor );


                //Mouse event
                $dragDropTrigger.on( 'mousedown.UixShortcodesSlideshow touchstart.UixShortcodesSlideshow', function( e ) {

                    //Do not use "e.preventDefault()" to avoid prevention page scroll on drag in IOS and Android

                    var touches = e.originalEvent.touches;

                    $( this ).addClass( 'is-dragging' );


                    if ( touches && touches.length ) {	
                        $( this ).data( 'origin_mouse_x', parseInt( touches[0].pageX ) );
                        $( this ).data( 'origin_mouse_y', parseInt( touches[0].pageY ) );

                    } else {

                        if ( draggable ) {
                            $( this ).data( 'origin_mouse_x', parseInt( e.pageX ) );
                            $( this ).data( 'origin_mouse_y', parseInt( e.pageY ) );	
                        }


                    }

                    $dragDropTrigger.on( 'mouseup.UixShortcodesSlideshow touchmove.UixShortcodesSlideshow', function( e ) {


                        $( this ).removeClass( 'is-dragging' );
                        var touches        = e.originalEvent.touches,
                            origin_mouse_x = $( this ).data( 'origin_mouse_x' ),
                            origin_mouse_y = $( this ).data( 'origin_mouse_y' );

                        if ( touches && touches.length ) {

                            var deltaX = origin_mouse_x - touches[0].pageX,
                                deltaY = origin_mouse_y - touches[0].pageY;

                            //--- left
                            if ( deltaX >= 50) {
                                if ( $items.filter( '.is-active' ).index() < itemsTotal - 1 ) _next.trigger( 'click' );
                            }

                            //--- right
                            if ( deltaX <= -50) {
                                if ( $items.filter( '.is-active' ).index() > 0 ) _prev.trigger( 'click' );
                            }

                            //--- up
                            if ( deltaY >= 50) {


                            }

                            //--- down
                            if ( deltaY <= -50) {


                            }


                            if ( Math.abs( deltaX ) >= 50 || Math.abs( deltaY ) >= 50 ) {
                                $dragDropTrigger.off( 'touchmove.UixShortcodesSlideshow' );
                            }	


                        } else {


                            if ( draggable ) {
                                //right
                                if ( e.pageX > origin_mouse_x ) {				
                                    if ( $items.filter( '.is-active' ).index() > 0 ) _prev.trigger( 'click' );
                                }

                                //left
                                if ( e.pageX < origin_mouse_x ) {
                                    if ( $items.filter( '.is-active' ).index() < itemsTotal - 1 ) _next.trigger( 'click' );
                                }

                                //down
                                if ( e.pageY > origin_mouse_y ) {

                                }

                                //up
                                if ( e.pageY < origin_mouse_y ) {

                                }	

                                $dragDropTrigger.off( 'mouseup.UixShortcodesSlideshow' );

                            }	



                        }



                    } );//end: mouseup.UixShortcodesSlideshow touchmove.UixShortcodesSlideshow




                } );// end: mousedown.UixShortcodesSlideshow touchstart.UixShortcodesSlideshow

            }




            /*
             * Transition Between Slides
             *
             * @param  {Number} elementIndex           - Index of current slider.
             * @param  {Object} slider                 - Selector of the slider .
             * @param  {String} dir                    - Switching direction indicator.
             * @param  {String} countTotalID           - Total number ID or class of counter.
             * @param  {String} countCurID             - Current number ID or class of counter.
             * @param  {String} paginationID           - Navigation ID for paging control of each slide.
             * @param  {String} arrowsID               - Previous/Next arrow navigation ID.
             * @param  {Boolean} loop                  - Gives the slider a seamless infinite loop.
             * @return {Void}
             */
            function sliderUpdates( elementIndex, slider, dir, countTotalID, countCurID, paginationID, arrowsID, loop ) {

                var $items                   = slider.find( '.uix-sc-slideshow__item' ),
                    total                    = $items.length;



                //Prevent bubbling
                if ( total == 1 ) {
                    $( paginationID ).hide();
                    $( arrowsID ).hide();
                    return false;
                }



                //Transition Interception
                //-------------------------------------
                if ( loop ) {
                    if ( elementIndex == total ) elementIndex = 0;
                    if ( elementIndex < 0 ) elementIndex = total-1;	
                } else {
                    $( arrowsID ).find( 'a' ).removeClass( 'is-disabled' );
                    if ( elementIndex == total - 1 ) $( arrowsID ).find( '.uix-sc-slideshow__arrows--next' ).addClass( 'is-disabled' );
                    if ( elementIndex == 0 ) $( arrowsID ).find( '.uix-sc-slideshow__arrows--prev' ).addClass( 'is-disabled' );
                }

                // To determine if it is a touch screen.
                var isTouchCapable = 'ontouchstart' in window ||
                                    window.DocumentTouch && document instanceof window.DocumentTouch ||
                                    navigator.maxTouchPoints > 0 ||
                                    window.navigator.msMaxTouchPoints > 0;  
                
                if ( isTouchCapable ) {
                    if ( elementIndex == total ) elementIndex = total-1;
                    if ( elementIndex < 0 ) elementIndex = 0;	

                    //Prevent bubbling
                    if ( !loop ) {
                        //first item
                        if ( elementIndex == 0 ) {
                            $( arrowsID ).find( '.uix-sc-slideshow__arrows--prev' ).addClass( 'is-disabled' );
                        }

                        //last item
                        if ( elementIndex == total - 1 ) {
                            $( arrowsID ).find( '.uix-sc-slideshow__arrows--next' ).addClass( 'is-disabled' );
                        }	
                    }


                }
				

				// call the current item
				//-------------------------------------
				var $current = $items.eq( elementIndex );	



                //Determine the direction and add class to switching direction indicator.
                var dirIndicatorClass = '';
                if ( dir == 'prev' ) dirIndicatorClass = 'prev';
                if ( dir == 'next' ) dirIndicatorClass = 'next';



                //Add transition class to Controls Pagination
                $( paginationID ).find( 'li a' ).removeClass( 'leave' );
                $( paginationID ).find( 'li a.is-active' ).removeClass( 'is-active' ).addClass( 'leave');
                $( paginationID ).find( 'li a[data-index="'+elementIndex+'"]' ).addClass( 'is-active').removeClass( 'leave' );

                //Add transition class to each item
                $items.removeClass( 'leave prev next' );
                $items.addClass( dirIndicatorClass );
                slider.find( '.uix-sc-slideshow__item.is-active' ).removeClass( 'is-active' ).addClass( 'leave ' + dirIndicatorClass );
                $items.eq( elementIndex ).addClass( 'is-active ' + dirIndicatorClass ).removeClass( 'leave' );




                //Display counter
                //-------------------------------------
                $( countTotalID ).text( total );
                $( countCurID ).text( parseFloat( elementIndex ) + 1 );		


                //Reset the default height of item
                //-------------------------------------	
                itemDefaultInit( slider, $current );		



            }

            /*
             * Initialize the default height of item
             *
             * @param  {Object} slider                 - Selector of the slider .
             * @param  {Object} currentLlement         - Current selector of each slider.
             * @return {Void}
             */
            function itemDefaultInit( slider, currentLlement ) {

                if ( currentLlement.find( 'video' ).length > 0 ) {

                    //Returns the dimensions (intrinsic height and width ) of the video
                    var video    = document.getElementById( currentLlement.find( 'video' ).attr( 'id' ) ),
                        videoURL = currentLlement.find( 'source:first' ).attr( 'src' );
                    
                    if ( typeof videoURL === typeof undefined ) videoURL = currentLlement.find( 'video' ).attr( 'src' );

                    currentLlement.find( 'video' ).css({
                        'width': currentLlement.closest( '.uix-sc-slideshow__outline' ).width() + 'px'
                    });   
                    
                    
                    video.addEventListener( 'loadedmetadata', function( e ) {

                        slider.css( 'height', this.videoHeight*(currentLlement.closest( '.uix-sc-slideshow__outline' ).width()/this.videoWidth) + 'px' );	

                    }, false);	

                    video.src = videoURL;


                } else {

                    var imgURL   = currentLlement.find( 'img' ).attr( 'src' );


                    if ( typeof imgURL != typeof undefined ) {
                        var img = new Image();

                        img.onload = function() {

                            slider.css( 'height', currentLlement.closest( '.uix-sc-slideshow__outline' ).width()*(this.height/this.width) + 'px' );		

                        };

                        img.src = imgURL;	
                    }



                }	


            }

            // loader will 'load' items by calling thingToDo for each item,
            // before calling allDone when all the things to do have been done.
            function loader(items, thingToDo, allDone) {
                if (!items) {
                    // nothing to do.
                    return;
                }

                if ("undefined" === items.length) {
                    // convert single item to array.
                    items = [items];
                }

                var count = items.length;

                // this callback counts down the things to do.
                var thingToDoCompleted = function (items, i) {
                    count--;
                    if (0 == count) {
                        allDone(items);
                    }
                };

                for (var i = 0; i < items.length; i++) {
                    // 'do' each thing, and await callback.
                    thingToDo(items, i, thingToDoCompleted);
                }
            }

            function loadImage(items, i, onComplete) {
                var onLoad = function (e) {
                    e.target.removeEventListener("load", onLoad);

                    // this next line can be removed.
                    // only here to prove the image was loaded.
                    document.body.appendChild(e.target);

                    // notify that we're done.
                    onComplete(items, i);
                }
                var img = new Image();
                img.addEventListener("load", onLoad, false);
                img.src = items[i];
                img.style.display = 'none';
            }	

		});
 
    };
 
}( jQuery ));





/* 
 *************************************
 * Custom Hybrid Content Slider for Uix Shortcodes
 * @ Version 1.1 (July 30, 2020)
 *
 * @param  {String} dir                    - Switching direction. The value is horizontal/vertical.
 * @param  {Boolean} auto                  - Setup a slideshow for the slider to animate automatically.
 * @param  {Number} timing                 - Autoplay interval.
 * @param  {Boolean} loop                  - Gives the slider a seamless infinite loop.
 * @param  {Number} speed                  - Delay Between items.
 * @param  {String} nextID                 - Next arrow navigation ID.
 * @param  {String} prevID                 - Previous arrow navigation ID.
 * @param  {String} paginationID           - Navigation ID for paging control of each slide.
 * @param  {Boolean} draggable             - Allow drag and drop on the slider.
 * @param  {String} draggableCursor        - Drag & Drop Change icon/cursor while dragging.
 *
 *************************************
 */    
( function ( $ ) {
	'use strict';
    $.fn.UixShortcodesHybridContentSlider = function( options ) {
 
        // This is the easiest way to have default options.
        var settings = $.extend({
			dir               : 'horizontal',   //horizontal,vertical
			auto              : false,
            timing            : 10000,
			speed             : 550,
			loop              : false,
            nextID            : '#uix-sc-hybridcontent-slider__controls-5 .uix-sc-hybridcontent-slider__controls--next',
            prevID             : '#uix-sc-hybridcontent-slider__controls-5 .uix-sc-hybridcontent-slider__controls--prev',
            paginationID      : '#uix-sc-hybridcontent-slider__pagination-5',
            draggable         : false,
            draggableCursor   : 'move'
        }, options );
 
 
        this.each( function() {
			
			
            var $window                   = $( window ),
                windowWidth               = window.innerWidth,
                windowHeight              = window.innerHeight,
                animDelay                 = 0,
                $sliderWrapper            = $( this );

			
			var	$carouselWrapper,
				$carousel,
				$carouselItem,
				itemTotal,
				amountVisible,
				carouselDir,
				carouselSpeed,
				carouselNext,
				carouselPrev,
				carouselPagination,
				carouseDraggable,
				carouseDraggableCursor,
				dataAuto,
				dataTiming,
				dataLoop;

			//each item width and height
			var eachItemNewWidth, eachItemNewHeight = [];


			//Store the latest position (X,Y) in a temporary variable
			var tempItemsPos = [];
			

			//Autoplay times
			var playTimes;
			

			//Returns the total height of items
			var totalItemsHeight = 0;


            sliderInit( false );

            $window.on( 'resize', function() {
                // Check window width has actually changed and it's not just iOS triggering a resize event on scroll
                if ( window.innerWidth != windowWidth ) {

                    // Update the window width for next time
                    windowWidth = window.innerWidth;

                    sliderInit( true );

                }
            });

        

            /*
             * Initialize slideshow
             *
             * @param  {Boolean} resize            - Determine whether the window size changes.
             * @return {Void}
             */
            function sliderInit( resize ) {

                $sliderWrapper.each( function()  {
					
					
					$carouselWrapper        = $( this );
					var	activated           = $carouselWrapper.data( 'activated' ); 



					if ( typeof activated === typeof undefined || activated === 0 ) {


						$carousel               = $carouselWrapper.find( '.uix-sc-hybridcontent-slider__items' );
						$carouselItem           = $carouselWrapper.find( '.uix-sc-hybridcontent-slider__items > div' );
						itemTotal               = $carouselItem.length;
						amountVisible           = 1;
						carouselDir             = settings.dir;
						carouselSpeed           = settings.speed;
						carouselNext            = settings.nextID;
						carouselPrev            = settings.prevID;
						carouselPagination      = settings.paginationID;
						carouseDraggable        = settings.draggable;
						carouseDraggableCursor  = settings.draggableCursor;



						if ( typeof carouselDir === typeof undefined ) carouselDir = 'horizontal';
						if ( typeof carouselSpeed === typeof undefined ) carouselSpeed = 250;
						if ( typeof carouselNext === typeof undefined ) carouselNext = '#uix-sc-hybridcontent-slider__controls-123 .uix-sc-hybridcontent-slider__controls--next';
						if ( typeof carouselPrev === typeof undefined ) carouselPrev = '#uix-sc-hybridcontent-slider__controls-123 .uix-sc-hybridcontent-slider__controls--prev';
						if ( typeof carouselPagination === typeof undefined ) carouselPagination = '#uix-sc-hybridcontent-slider__pagination-123';
						if ( typeof carouseDraggable === typeof undefined ) carouseDraggable = false;
						if ( typeof carouseDraggableCursor === typeof undefined ) carouseDraggableCursor = 'move';


						//Autoplay parameters
						dataAuto                   = settings.auto;
						dataTiming                 = settings.timing;
						dataLoop                   = settings.loop;

						if ( typeof dataAuto === typeof undefined ) dataAuto = false;	
						if ( typeof dataTiming === typeof undefined ) dataTiming = 10000;
						if ( typeof dataLoop === typeof undefined ) dataLoop = false; 


						//set speed for dom
						$carousel.css('transition', 'all '+carouselSpeed+'ms');	
						$carouselItem.css('transition', 'all '+carouselSpeed+'ms');
						
						
						
						//A function called "timer" once every second (like a digital watch).
						$carouselWrapper[0].animatedSlides;




						// Get the width and height of each item
						$carouselItem.each( function( index ) {
							var _height = $( this ).height();
							
							eachItemNewHeight.push( _height );
							$( this ).attr({
								'data-height': _height,
								'data-index': index
							});
						});


						//Returns the total height of items
						for (var i = 0; i < eachItemNewHeight.length; i++ ) {
							totalItemsHeight += eachItemNewHeight[i];
							if ( (i+1) == (itemTotal - amountVisible) ) break;
						}

						//Set target index of the carousel buttons
						setButtonTargetIndex( $( carouselNext ), $( carouselPrev ), 'init', null );



						//set actived item & initialize the height of container
						setContainerSize( 0 );    
						$carouselItem.addClass( 'js-is-ready' ); 


						// Activate the current item from carouse
						setItemState( 0 );    


						/* 
						 ---------------------------
						 Initialize carousel
						 ---------------------------
						 */  
						var eachItemOldWidth  = $carousel.width()/amountVisible;

						eachItemNewWidth = ( $carouselWrapper.width() / amountVisible );

						if ( carouselDir == 'horizontal' ) {
							$carousel.css( 'width', itemTotal * eachItemOldWidth );
						}


						// Re-order all items
						carouselReOrder();



						//default button status
						$( carouselPrev ).addClass( 'is-disabled' ).data( 'disabled', 1 );	



						/* 
						 ---------------------------
						 Move left/up
						 ---------------------------
						 */ 
						$( carouselNext ).off( 'click' ).on( 'click', $carouselWrapper, function( e ) {
							e.preventDefault();

							//Prevent buttons' events from firing multiple times
							if ( $( this ).attr( 'aria-disabled' ) == 'true' ) return false;
							$( this ).attr( 'aria-disabled', 'true' );

							$( this )
								.delay(carouselSpeed)
								.queue(function(next) { $( this ).attr( 'aria-disabled', 'false' ); next(); });                

							//
							movePositionWithButton( false, $( this ), e, 'next' );

							//Pause the auto play event
							clearInterval( $carouselWrapper[0].animatedSlides );	 


						});


						/* 
						 ---------------------------
						 Move right/down
						 ---------------------------
						 */ 

						$( carouselPrev ).off( 'click' ).on( 'click', $carouselWrapper, function( e ) {
							e.preventDefault();

							//Prevent buttons' events from firing multiple times
							if ( $( this ).attr( 'aria-disabled' ) == 'true' ) return false;
							$( this ).attr( 'aria-disabled', 'true' );

							$( this )
								.delay(carouselSpeed)
								.queue(function(next) { $( this ).attr( 'aria-disabled', 'false' ); next(); });

							//
							movePositionWithButton( false, $( this ), e, 'prev' );

							//Pause the auto play event
							clearInterval( $carouselWrapper[0].animatedSlides );

						});


						/* 
						 ---------------------------
						 Pagination
						 ---------------------------
						 */ 
						if ( $( carouselPagination ).length > 0 && $( carouselPagination ).html().length == 0 ) {
							//Button to add pagination automatically
							var _dot       = '';
							_dot += '<ul class="uix-sc-hybridcontent-slider__pagination--default">';
							for ( var i = 0; i < itemTotal; i++ ) {
								_dot += '<li><a data-target-index="'+i+'" href="javascript:void(0);"></a></li>';
							}
							_dot += '</ul>';

							$( carouselPagination ).html( _dot ).promise().done( function(){
								// Activate the currently selected Pagination
								setPaginationState( 0 );
							});	
						} else {
							// Activate the currently selected Pagination
							setPaginationState( 0 ); 
						}


						$( carouselPagination ).find( 'li a' ).off( 'click' ).on( 'click', $carouselWrapper, function( e ) {
							e.preventDefault();

							//Prevent buttons' events from firing multiple times
							if ( $( this ).attr( 'aria-disabled' ) == 'true' ) return false;
							$( carouselPagination ).find( 'li a' ).attr( 'aria-disabled', 'true' );

							$( carouselPagination ).find( 'li a' )
								.delay(carouselSpeed)
								.queue(function(next) { $( carouselPagination ).find( 'li a' ).attr( 'aria-disabled', 'false' ); next(); }); 


							//
							if ( !$( this ).parent().hasClass( 'is-active' ) ) {

								movePositionWithButton( true, $( this ), e, 'next' );

								//Pause the auto play event
								clearInterval( $carouselWrapper[0].animatedSlides );	
							}

						});		


						
						
						

						//Added touch method to mobile device and desktop
						//-------------------------------------	
						var $dragDropTrigger = $carouselWrapper;


						//Make the cursor a move icon when a user hovers over an item
						if ( carouseDraggable && carouseDraggableCursor != '' && carouseDraggableCursor != false ) $dragDropTrigger.css( 'cursor', carouseDraggableCursor );



						var direction;

			
						//Mouse event
						$dragDropTrigger.on( 'mousedown.UixShortcodesHybridContentSlider touchstart.UixShortcodesHybridContentSlider', function( e ) {

							//Do not use "e.preventDefault()" to avoid prevention page scroll on drag in IOS and Android

							var touches = e.originalEvent.touches;

							$( this ).addClass( 'is-dragging' );


							if ( touches && touches.length ) {	
								$( this ).data( 'origin_mouse_x', parseInt( touches[0].pageX ) );
								$( this ).data( 'origin_mouse_y', parseInt( touches[0].pageY ) );

							} else {

								if ( carouseDraggable ) {
									$( this ).data( 'origin_mouse_x', parseInt( e.pageX ) );
									$( this ).data( 'origin_mouse_y', parseInt( e.pageY ) );	
								}


							}

							$dragDropTrigger.on( 'mouseup.UixShortcodesHybridContentSlider touchmove.UixShortcodesHybridContentSlider', function( e ) {


								$( this ).removeClass( 'is-dragging' );
								var touches        = e.originalEvent.touches,
									origin_mouse_x = $( this ).data( 'origin_mouse_x' ),
									origin_mouse_y = $( this ).data( 'origin_mouse_y' );

								if ( touches && touches.length ) {

									var deltaX = origin_mouse_x - touches[0].pageX,
										deltaY = origin_mouse_y - touches[0].pageY;




									if ( carouselDir == 'horizontal' ) {
										//--- left
										if ( deltaX >= 50) {
											direction = 'panleft';
										}

										//--- right
										if ( deltaX <= -50) {
											direction = 'panright';
										}
									} else {
										//--- up
										if ( deltaY >= 50) {
											direction = 'panup';
										}

										//--- down
										if ( deltaY <= -50) {
											direction = 'pandown';
										}
									}



									if ( Math.abs( deltaX ) >= 50 || Math.abs( deltaY ) >= 50 ) {
										$dragDropTrigger.off( 'touchmove.UixShortcodesHybridContentSlider' );
									}	




								} else {


									if ( carouseDraggable ) {
										
										

										if ( carouselDir == 'horizontal' ) {
											//right
											if ( e.pageX > origin_mouse_x ) {				
												direction = 'panright';
											}

											//left
											if ( e.pageX < origin_mouse_x ) {
												direction = 'panleft';
											}
	
										} else {
											//down
											if ( e.pageY > origin_mouse_y ) {
												direction = 'pandown';
											}

											//up
											if ( e.pageY < origin_mouse_y ) {
												direction = 'panup';
											}	
										}	

										


										$dragDropTrigger.off( 'mouseup.UixShortcodesHybridContentSlider' );

									}	



								}
								
								


								//===============
								//===============
								switch ( direction ) {
									case 'panleft':
									case 'panup':

										$( carouselNext ).trigger( 'click' );

										break;

									case 'panright':
									case 'pandown':

										$( carouselPrev ).trigger( 'click' );

										break;                 

								}

							
								//Pause the auto play event
								clearInterval( $carouselWrapper[0].animatedSlides );



							} );//end: mouseup.UixShortcodesHybridContentSlider touchmove.UixShortcodesHybridContentSlider




						} );// end: mousedown.UixShortcodesHybridContentSlider touchstart.UixShortcodesHybridContentSlider


						
						
						
						
						

						//Autoplay Slider
						//-------------------------------------		
						if ( dataAuto && !isNaN( parseFloat( dataTiming ) ) && isFinite( dataTiming ) ) {

							sliderAutoPlay( playTimes, dataTiming, dataLoop );

							$carouselWrapper.on({
								mouseenter: function() {
									clearInterval( $carouselWrapper[0].animatedSlides );
								},
								mouseleave: function() {
									sliderAutoPlay( playTimes, dataTiming, dataLoop );
								}
							});	

						}





						//Prevents front-end javascripts that are activated with AJAX to repeat loading.
						$carouselWrapper.data( 'activated', 1 );

					}//endif activated	


	
					
					
					
				});


            }



			/* 
			 ---------------------------
			 Re-order all items
			 ---------------------------
			 */ 

			function carouselReOrder() {


				//Initialize the width and height of each item
				if ( carouselDir == 'horizontal' ) {
					var boxWidth = eachItemNewWidth;
				
					$carouselItem.each( function( i )  {
						$( this ).css({
							'width': boxWidth + 'px',
							'height': eachItemNewHeight[i] + 'px',
							'transform': 'translateX( '+(i * boxWidth)+'px )'
						});
					});
				

				} else {
					
					$carouselItem.each( function( i )  {
						
						var yIncrement = 0;
						for (var k = 0; k < eachItemNewHeight.length; k++ ) {    
							var tempY = ( typeof eachItemNewHeight[k-1] === typeof undefined ) ? 0 : eachItemNewHeight[k-1];
							yIncrement += tempY;
							if ( k == i ) break;
						}   

						$( this ).css({
							'height': eachItemNewHeight[i] + 'px',
							'transform': 'translateY( '+yIncrement+'px )'
						});
					});
					

				}


			}




			/*
			 * Trigger slider autoplay
			 *
			 * @param  {Function} playTimes      - Number of times.
			 * @param  {Number} timing           - Autoplay interval.
			 * @param  {Boolean} loop            - Gives the slider a seamless infinite loop.
			 * @return {Void}             
			 */
			function sliderAutoPlay( playTimes, timing, loop ) {	

				$carouselWrapper[0].animatedSlides = setInterval( function() {

					var autoMove = function( indexGo ) {

						// Retrieve the position (X,Y) of an element 
						var moveX = eachItemNewWidth * indexGo;

						var moveYIncrement = 0;
						for (var k = 0; k < eachItemNewHeight.length; k++ ) {    
							var tempY = ( typeof eachItemNewHeight[k-1] === typeof undefined ) ? 0 : eachItemNewHeight[k-1];
							moveYIncrement += tempY;
							if ( k == indexGo ) break;
						}
						var moveY = moveYIncrement;

						//
						var delta = ( carouselDir == 'horizontal' ) ? -moveX : -moveY;

						//
						itemUpdates( $carouselWrapper, 'auto', delta, null, false, indexGo, eachItemNewHeight );    
					}; 

					playTimes = parseFloat( $carouselItem.filter( '.is-active' ).index() );
					playTimes++;


					if ( !loop ) {
						if ( playTimes < itemTotal && playTimes >= 0 ) {
							autoMove( playTimes );
						}
					} else {
						if ( playTimes == itemTotal ) playTimes = 0;
						if ( playTimes < 0 ) playTimes = itemTotal-1;		

						autoMove( playTimes );
					}

				}, timing );	
			}




			/*
			 * Transition Between Items
			 *
			 * @param  {Element} wrapper            - Wrapper of carousel.
			 * @param  {?Element|String} curBtn     - The button that currently triggers the move.
			 * @param  {Number|Array} delta         - The value returned will need to be adjusted according to the offset rate.
			 * @param  {?Number} speed              - Sliding speed. Please set to 0 when rebounding.
			 * @param  {Boolean} dragging           - Determine if the object is being dragged.
			 * @param  {!Number} indexGo            - The target item index.
			 * @param  {String|Array} itemsHeight   - Return all items height.
			 * @return {Void}
			 */
			function itemUpdates( wrapper, curBtn, delta, speed, dragging, indexGo, itemsHeight ) {

				if ( speed == null ) speed = carouselSpeed/1000;

				var $curWrapper = wrapper.children( '.uix-sc-hybridcontent-slider__items' ),  //Default: $carousel
					$curItems   = $curWrapper.find( '> div' ); //Default: $carouselItem


				//Get height constant
				var itemsHeightArr = [];
				var _itemsHeight = itemsHeight.toString().split( ',' );
				_itemsHeight.forEach( function( element ) {
					itemsHeightArr.push( parseFloat(element) );
				});


				//Check next or previous event
				var btnType = 'init';
				if ( curBtn != null && curBtn != 'auto' ) {
					if ( typeof curBtn.attr( 'class' ) !== typeof undefined ) {
						btnType = ( curBtn.attr( 'class' ).indexOf( '--next' ) >=0 ) ? 'next' : 'prev';
					} else {
						btnType = 'next';
					}

				}

				//Check next or previous event ( Autoplay )
				if ( curBtn == 'auto' ) btnType = 'next';;


				//Clone the first element to the last position
				if ( carouselDir == 'horizontal' ) {

					var boxWidth = eachItemNewWidth;

					
					$curItems.each( function( i )  {
						
						var xIncrement = 0;

						for (var k = 0; k < itemTotal; k++ ) {    
							var tempX = ( k == 0 ) ? 0 : boxWidth;
							xIncrement += tempX;
							if ( k == i ) break;
						}   



						if ( Array.isArray( delta ) ) {

							//Rebound effect of drag offset 
							xIncrement = ( delta.length == 0 ) ? xIncrement : delta[i];     

						} else {

							if ( !dragging ) {
								//console.log( 'btnType: ' + btnType + ' indexGo: ' + indexGo );


								var curWidthIncrement = 0;

								for (var m= 0; m < itemTotal; m++ ) {    
									var tempW = ( m == 0 ) ? 0 : boxWidth;
									curWidthIncrement += tempW;
									if ( m == ( btnType == 'next' ? indexGo : indexGo-1 ) ) break;
								} 

								xIncrement = xIncrement + -curWidthIncrement;  
							} else {
								//console.log( 'dragging...' );
								var x = Math.round(getTranslate(target ) / boxWidth ) * boxWidth;
								xIncrement = x + delta; 
							}
						}

						
						//--
						$( this ).css({
							'transform': 'translateX( '+xIncrement+'px )'
						});
						
						//--
						setTimeout( function() {
							
							if ( !dragging && !Array.isArray( delta ) ) {

								//Get index of current element
								var currentIndex = 0;
								
						

								//The state of the control button
								setButtonState( Math.round( getTranslate($curItems.first()[0] ) ), Math.round( ($curItems.length - amountVisible) * boxWidth ) );  

								//Initialize the height of container
								currentIndex = Math.round( getTranslate($curItems.first()[0] )/boxWidth );
								setContainerSize( currentIndex );  	 

								//Set target index of the carousel buttons
								setButtonTargetIndex( $( carouselNext ), $( carouselPrev ), btnType, ( btnType == 'next' ? Math.abs( currentIndex ) : Math.abs( currentIndex ) + 1 ) );   

								// Activate the currently selected Pagination
								setPaginationState( Math.abs( currentIndex ) );

								// Activate the current item from carouse
								setItemState( Math.abs( currentIndex ) );     

								//Store the latest position (X,Y) in a temporary variable
								tempItemsPos = createStoreLatestPosition();  

							}
						}, speed);	
						
					});


				} else {

					
					$curItems.each( function( i )  {
						
						var yIncrement = 0;

						for (var k = 0; k < itemsHeightArr.length; k++ ) {    
							var tempY = ( typeof itemsHeightArr[k-1] === typeof undefined ) ? 0 : itemsHeightArr[k-1];
							yIncrement += tempY;
							if ( k == i ) break;
						}  

						if ( Array.isArray( delta ) ) {

							//Rebound effect of drag offset 
							yIncrement =  ( delta.length == 0 ) ? yIncrement : delta[i];   

						} else {

							if ( !dragging ) {
								//console.log( 'btnType: ' + btnType + ' indexGo: ' + indexGo );


								var curHeightIncrement = 0;

								for (var m = 0; m < itemsHeightArr.length; m++ ) {    
									var tempH = ( typeof itemsHeightArr[m-1] === typeof undefined ) ? 0 : itemsHeightArr[m-1];
									curHeightIncrement += tempH;
									if ( m == ( btnType == 'next' ? indexGo : indexGo-1 ) ) break;
								}   


								yIncrement =  yIncrement + -curHeightIncrement;  
							} else {
								//console.log( 'dragging...' );
								var draggingItemHeight = ( typeof itemsHeightArr[indexGo-1] === typeof undefined ) ? itemsHeightArr[indexGo] : itemsHeightArr[indexGo-1];

								var y = Math.round(getTranslate(target ) / draggingItemHeight ) * draggingItemHeight;
								yIncrement =  y + delta; 
							}
						}

						
						//--
						$( this ).css({
							'transform': 'translateY( '+yIncrement+'px )'
						});
						
						//--
						setTimeout( function() {
							
							if ( !dragging && !Array.isArray( delta ) ) {

								//The state of the control button
								setButtonState( getTranslate($curItems.first()[0] ), totalItemsHeight );   

								//Set target index of the carousel buttons
								setButtonTargetIndex( $( carouselNext ), $( carouselPrev ), btnType, indexGo ); 

								//set actived item & initialize the height of container
								setContainerSize( ( btnType == 'next' ? indexGo : indexGo-1 ) );

								// Activate the currently selected Pagination
								setPaginationState( ( btnType == 'next' ? indexGo : indexGo-1 ) ); 

								// Activate the current item from carouse
								setItemState( ( btnType == 'next' ? indexGo : indexGo-1 ) );               

								//Store the latest position (X,Y) in a temporary variable
								tempItemsPos = createStoreLatestPosition();   


							}
		
						}, speed);	
						
					});
					
					
		
				}




			}



			/*
			 * Use the button to trigger the transition between the two sliders
			 *
			 * @param  {Boolean} paginationEnable   - Determine whether it is triggered by pagination
			 * @param  {Element} $btn               - The button that currently triggers the move.
			 * @param  {Object} event               - Bind an event handler to the "click" JavaScript event,
			 * @param  {String} type                - Move next or previous.
			 * @return {Void}
			 */
			function movePositionWithButton( paginationEnable, $btn, event, type ) {
				var $curWrapper = $( event.data[0] ),
					  //Protection button is not triggered multiple times.
					  btnDisabled = $btn.data( 'disabled' ),

					  //Get current button index
					  tIndex      = parseFloat( $btn.attr( 'data-target-index' ) );


				// Retrieve the position (X,Y) of an element 
				var moveX = eachItemNewWidth,
					moveY = ( typeof eachItemNewHeight[tIndex-1] === typeof undefined ) ? 0 : eachItemNewHeight[tIndex-1];   

				if ( paginationEnable ) {

					//--
					moveX = eachItemNewWidth * tIndex;

					//--
					var moveYIncrement = 0;
					for (var k = 0; k < eachItemNewHeight.length; k++ ) {    
						var tempY = ( typeof eachItemNewHeight[k-1] === typeof undefined ) ? 0 : eachItemNewHeight[k-1];
						moveYIncrement += tempY;
						if ( k == tIndex ) break;
					}
					moveY = moveYIncrement;

				}



				//
				var delta;
				if ( type == 'next' ) {
					delta = ( carouselDir == 'horizontal' ) ? -moveX : -moveY;
				} else {
					delta = ( carouselDir == 'horizontal' ) ? moveX : moveY;
				}


				if ( typeof btnDisabled === typeof undefined ) {	
					itemUpdates( $curWrapper, $btn, delta, null, false, tIndex, eachItemNewHeight );

				}    
			}  



			/*
			 * Activate the currently selected Pagination
			 *
			 * @param  {Number} index          - Get index of current element.
			 * @return {Void}
			 */
			function setPaginationState( index ) {
				$( carouselPagination ).find( 'li' ).removeClass( 'is-active' );
				$( carouselPagination ).find( 'li a[data-target-index="'+index+'"]' ).parent().addClass( 'is-active' );   
			}   

			/*
			 * Activate the current item from carouse
			 *
			 * @param  {Number} index          - Get index of current element.
			 * @return {Void}
			 */
			function setItemState( index ) {
				$carouselItem.removeClass( 'is-active' );
				$carouselItem.eq( index ).addClass( 'is-active' );   
			}      

			/*
			 * Store the latest position (X,Y) in a temporary variable
			 *
			 * @return {Array}              - Return to a new position.
			 */
			function createStoreLatestPosition() {
				var pos = [];
				// Retrieve the temporary variable of each item.
				$carouselItem.each( function() {
					pos.push( ( carouselDir == 'horizontal' ? getTranslate($( this )[0] ) : getTranslate($( this )[0] ) ) );
				}); 
				return pos;
			}  


			/*
			 * Initialize the height of container
			 *
			 * @param  {Number} index          - Get index of current element.
			 * @return {Void}
			 */
			function setContainerSize( index ) {
				
				var _h = eachItemNewHeight[Math.abs( index )];
				if ( typeof _h !== typeof undefined ) {
					$carousel.css( 'height', eachItemNewHeight[Math.abs( index )] + 'px' );
					   
				}

			}   




			/*
			 * Set target index of the carousel buttons
			 *
			 * @param  {Element} nextBtn      - The next move button.
			 * @param  {Element} prevBtn      - The previous move button.
			 * @param  {String} type          - The type of button is triggered. Values: next, prev, init
			 * @param  {?Number} indexGo      - The target item index.
			 * @return {Void}
			 */
			function setButtonTargetIndex( nextBtn, prevBtn, type, indexGo ) {

				switch ( type ) {
					case 'init':
						nextBtn.attr({
							'data-target-index': 1
						});   
						prevBtn.attr({
							'data-target-index': 0
						});   

						break;

					case 'next':
						var nextBtnOldTargetIndex1 = parseFloat( nextBtn.attr( 'data-target-index' ) );
						var prevBtnOldTargetIndex1 = parseFloat( prevBtn.attr( 'data-target-index' ) );

						if ( indexGo != null ) {
							nextBtnOldTargetIndex1 = indexGo;
							prevBtnOldTargetIndex1 = indexGo-1;
						}

						nextBtn.attr({
							'data-target-index': nextBtnOldTargetIndex1+1
						});   
						prevBtn.attr({
							'data-target-index': prevBtnOldTargetIndex1+1
						});  

						break;  

					case 'prev':
						var nextBtnOldTargetIndex2 = parseFloat( nextBtn.attr( 'data-target-index' ) ) - 1;
						var prevBtnOldTargetIndex2 = parseFloat( prevBtn.attr( 'data-target-index' ) ) - 1;

						if ( indexGo != null ) {
							nextBtnOldTargetIndex2 = indexGo;
							prevBtnOldTargetIndex2 = indexGo-1;
						} 


						nextBtn.attr({
							'data-target-index': nextBtnOldTargetIndex2
						});   
						prevBtn.attr({
							'data-target-index': prevBtnOldTargetIndex2
						});   

						break;  
				}      
			}              

			/*
			 * The state of the control button
			 *
			 * @param  {Number} firstOffset          - Get the computed Translate X or Y values of a given first DOM element.
			 * @param  {Number} lastOffset           - Get the computed Translate X or Y values of a given last DOM element.
			 * @return {Void}
			 */
			function setButtonState( firstOffset, lastOffset ) {

				if ( Math.abs( firstOffset ) == lastOffset ) {
					$( carouselNext ).addClass( 'is-disabled' ).data( 'disabled', 1 );
					$( carouselPrev ).removeClass( 'is-disabled' ).removeData( 'disabled' );
				} else if ( Math.round( firstOffset ) == 0 ) {
					$( carouselNext ).removeClass( 'is-disabled' ).removeData( 'disabled' );
					$( carouselPrev ).addClass( 'is-disabled' ).data( 'disabled', 1 );
				} else {
					$( carouselNext ).removeClass( 'is-disabled' ).removeData( 'disabled' );
					$( carouselPrev ).removeClass( 'is-disabled' ).removeData( 'disabled' );
				}
			}   	
			

			

			/*
			 * Get transform value
			 *
			 * @param  {Number} node           - Dom node selector
			 * @return {Void}
			 */
			function getTranslate(node){
				var transformStyle = node.style.transform;
				// => "translateX(1239.32px)"
				
				var translateXorY = transformStyle.replace(/[^\d.]/g, '');
				return translateXorY;
			}
			
			


		});
 
    };
 
}( jQuery ));







