/* *************************************


	---------------------------
	UIX SHORTCODES SCRIPTS
	---------------------------

	TABLE OF CONTENTS
	---------------------------


	1. Accordion & Tabs
	2. Progress Bar
	3. Pricing
    4. Parallax
    5. Testimonials
	6. prettyPhoto
	7. Filterable


************************************* */

( function($) {
    'use strict';


	$.extend( { 
		uix_sc_init:function () {

			   var templateUrl  = wp_theme_root_path.templateUrl,
				   $window      = $( window ),
			  	   windowWidth  = $window.width(),
				   windowHeight = $window.height();
				
				
				/*!
				 *************************************
				 * 1. Accordion & Tabs
				 *************************************
				 */
				$( '.uix-sc-accordion' ).each( function(){

						//returns new id
						var $this              = $( this ),
							tranEfftct         = $this.data( 'effect' ),
							spoilerContent     = '.uix-sc-spoiler-content',
							speed              = 300,
							spoilerCloseClass  = 'uix-sc-spoiler-closed',
							$spoilerBox        = $this.find( '.uix-sc-spoiler' );



						//Tabs
						if ( $this.hasClass( 'uix-sc-tabs' ) ) {

							var $tabsLi = $this.find( '.uix-sc-tabs-title li' );

							$this.find( '.uix-sc-tabs-title li:eq(0)' ).addClass( 'active' );
							$this.find( '.uix-sc-spoiler-content:eq(0)' ).show().addClass( 'active' );




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






				/*!
				 *************************************
				 * 2. Progress Bar
				 *************************************
				 */
				var barspeed = 1000;

				$( '.uix-sc-bar-box-square' ).each(function() {
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
						boxheight   = $( '.uix-sc-bar-info', this).height();

					//Determines whether the width is 100%
					if ( $( this ).find( '> div' ).attr( 'style' ).indexOf( '100%' ) >= 0 ) {
						$( this ).css( 'width', '100%' );
					}


					if ( boxheight > 0 ) $( this ).css( { 'height': linewidth + boxheight + 'px' } );
					$( '.uix-sc-bar', this).css( { 'height': linewidth + 'px', 'width': '100%', 'background': trackcolor } );
					$( '.uix-sc-bar .uix-sc-bar-percent', this).css( { 'height': linewidth + 'px', 'width': 0, 'background': barcolor } );
					$( '.uix-sc-bar .uix-sc-bar-text', this).html( '' );


					$this.find( '.uix-sc-bar .uix-sc-bar-text' ).each( function()  {

						if ( $this.find( '.uix-sc-bar .uix-sc-bar-percent' ).width() == 0 ) {

							$this.find( '.uix-sc-bar .uix-sc-bar-percent' ).css( { 'height': linewidth + 'px', 'width': 0, 'background': barcolor } ).animate( { percentage: perc, width: perc + '%'  }, {duration: barspeed } );

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


				$( '.uix-sc-bar-box-circular' ).each(function() {

					var $this      = $( this ),
						perc       = $( '.uix-sc-bar', this).data( 'percent' ),
						size       = $( '.uix-sc-bar .uix-sc-bar-percent', this).data( 'size' ),
						sizeNum    = size.replace( 'px', '' ),
						linewidth  = $( '.uix-sc-bar .uix-sc-bar-percent', this).data( 'linewidth' ),
						trackcolor = $( '.uix-sc-bar .uix-sc-bar-percent', this).data( 'trackcolor' ),
						barcolor   = $( '.uix-sc-bar .uix-sc-bar-percent', this).data( 'barcolor' ),
						units      = $( '.uix-sc-bar .uix-sc-bar-percent', this).data( 'units' ),
						icon       = $( '.uix-sc-bar .uix-sc-bar-percent', this).data( 'icon' );

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

                $( '.uix-sc-bar-box-circular' ).each(function() {

					if ( $( '.uix-sc-bar .uix-sc-bar-percent', this ).text().length == 0 ) {

						var $this      = $( this ),
							perc       = $( '.uix-sc-bar', this).data( 'percent' ),
							size       = $( '.uix-sc-bar .uix-sc-bar-percent', this).data( 'size' ),
							sizeNum    = size.replace( 'px', '' ),
							linewidth  = $( '.uix-sc-bar .uix-sc-bar-percent', this).data( 'linewidth' ),
							trackcolor = $( '.uix-sc-bar .uix-sc-bar-percent', this).data( 'trackcolor' ),
							barcolor   = $( '.uix-sc-bar .uix-sc-bar-percent', this).data( 'barcolor' ),
							units      = $( '.uix-sc-bar .uix-sc-bar-percent', this).data( 'units' ),
							icon       = $( '.uix-sc-bar .uix-sc-bar-percent', this).data( 'icon' ),
							chkicon    = icon
											.replace(/fa/g, '' )
											.replace(/flaticon/g, '' )
											.replace(/-/g, '' ),
							$txtcont   = $( '.uix-sc-bar', this ).find( '.uix-sc-bar-percent' );


						$( '.uix-sc-bar', this ).data( 'easyPieChart' ).update( perc );
						$( '.uix-sc-bar', this ).find( '.uix-sc-bar-percent' ).css( { 'line-height': size, 'width': size } ).animate( { percentage: perc }, {duration: barspeed } );
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




				/*!
				 *************************************
				 * 3. Pricing
				 *************************************
				 */

				//Initialize the height
				$( '.uix-sc-price' ).each( function(){

						//returns new id
						var $this            = $( this ),
							priceBGH         = Array(),
							priceBGH_excerpt = Array(),
							$initHeight      = $this.find( '.uix-sc-price-init-height' );

						$initHeight.each( function( index ) {
							//Screen protection of height
							$( this ).find( '.uix-sc-price-border,.uix-sc-price-excerpt' ).css( 'height', 'auto' );

							var tempheight = $( this ).height();
							var tempheight_excerpt = $( this ).find( '.uix-sc-price-excerpt' ).height();
							priceBGH.push( tempheight );
							priceBGH_excerpt.push( tempheight_excerpt );


						} );

						var priceBGH_Max         = Math.max.apply( Math, priceBGH ),
							priceBGH_Max_excerpt = Math.max.apply( Math, priceBGH_excerpt );



						if ( priceBGH_Max > 0 ) {
							if ( $( document.body ).width() > 768 ){

								$initHeight.find( '.uix-sc-price-border' ).css( 'height', priceBGH_Max + 'px' );
								if ( $initHeight.find( '.uix-sc-price-border.uix-sc-price-important' ).length > 0 ) {
									var ty = Math.abs(parseInt($initHeight.find( '.uix-sc-price-border.uix-sc-price-important' ).css('transform').split(',')[5]));
									if ( !isNaN(ty) ) {
										$initHeight.find( '.uix-sc-price-border.uix-sc-price-important' ).css( 'height', priceBGH_Max + ty*2 + 'px' );
									}

								}


							} else {
								$initHeight.find( '.uix-sc-price-border' ).css( 'height', 'auto' );
							}

						}


				});

				//Border of the hover effect
				$( '.uix-sc-price-border-hover' ).each( function(){

					var $this        = $( this ),
						hw           = 6,
						defaultColor = $this.find( '.uix-sc-price-border' ).css( 'border-color' );

					if ( $this.css( 'top' ) != '0px' ) {

						$this.hover(function() {
							$(this).find( '.uix-sc-price-border' ).css({
								"border-color": $this.data( 'tcolor' ),
								"-webkit-box-shadow": "inset 0 0px 0px "+hw+"px " + $this.data( 'tcolor' ),
								"-moz-box-shadow": "inset 0 0px 0px "+hw+"px " + $this.data( 'tcolor' ),
								"box-shadow": "inset 0 0px 0px "+hw+"px " + $this.data( 'tcolor' )
							});
						},function() {
							$(this).find( '.uix-sc-price-border' ).css({
								"border-color": defaultColor,
								"-webkit-box-shadow": "none",
								"-moz-box-shadow": "none",
								"box-shadow": "none"
							});
						});

					}


				});



				/*!
				 *************************************
				 * 4. Parallax
				 *************************************
				 */
				uix_sc_parallaxInit();
				$( window ).on( 'resize', function() {
				   uix_sc_parallaxInit();

				});

				function uix_sc_parallaxInit() {
					$( '.uix-sc-parallax' ).each(function() {
						$( this ).bgParallax( "50%", $( this ).data( 'parallax' ) );
					});
				};




				/*!
				 *************************************
				 * 5. Testimonials
				 *************************************
				 */
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


				/*!
				 *************************************
				 * 6. prettyPhoto
				 *************************************
				 */
				 $( "a[rel^='uix-sc-prettyPhoto']" ).prettyPhoto({
					 animation_speed:'normal',
					 theme:'dark_rounded',
					 slideshow:3000,
					 utoplay_slideshow: false
				 });



				/*!
				 *************************************
				 * 7. Filterable
				 *************************************
				 */
				 $( '.uix-sc-filterable' ).each( function(){

					var $this              = $( this ),
						classprefix        = $this.data( 'classprefix' ),
						fid                = $this.data( 'filter-id' ),
						filterBox          = $( '#'+classprefix+'filter-stage-'+fid+'' ),
						filterNav          = $( '#'+classprefix+'cat-list-'+fid+'' ),
						filterItemSelector = '.'+classprefix+'item';


					 filterBox.shuffle({
						itemSelector: filterItemSelector,
						speed: 550, // Transition/animation speed (milliseconds).
						easing: 'ease-out', // CSS easing function to use.
						sizer: null // Sizer element. Use an element to determine the size of columns and gutters.
					  });

					//init
					imagesLoaded( '#'+classprefix+'filter-stage-'+fid+'' ).on( 'always', function() {
						 $( '#'+classprefix+'cat-list-'+fid+' li:first a' ).trigger( 'click' ); 
					 });


					filterNav.find( 'li > a' ).on( 'click', function( e ) {

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


				 });	
			
			
		} 
	}); 


	$( function() {  
		
	   if ( $.isFunction( $.uix_sc_init ) ) {
		   $.uix_sc_init();
	   }
	 
			
	} ); 
	
} ) ( jQuery );






