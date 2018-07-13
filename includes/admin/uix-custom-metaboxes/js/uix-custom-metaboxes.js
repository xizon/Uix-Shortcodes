/*! 
 * ************************************************
 * Uix Custom Metaboxes
 *
 * @version		: 1.2 (July 13, 2018)
 * @author 		: UIUX Lab
 * @author URI 	: https://uiux.cc
 * @license     : MIT
 *
 *************************************************
 */
var UixCustomMetaboxes = function( obj ) {
	"use strict";


	var UixCustomMetaboxesConstructor = function( obj ) {
		this.init = obj;
	};

	UixCustomMetaboxesConstructor.prototype = {

		
		/*! 
		 * 
		 * Initialize the custom meta box
		 * ---------------------------------------------------
		 *
		 * @return {void}                  - The constructor.
		 */
		getInstance: function() {

			jQuery( document ).ready( function() {

				//(Calling "radio"... method using JavaScript prototype)
				UixCustomMetaboxesConstructor.prototype.radio.call( this, '.uix-cmb__radio-selector' );
				UixCustomMetaboxesConstructor.prototype.toggle.call( this, '.uix-cmb__toggle-selector' );
				UixCustomMetaboxesConstructor.prototype.color.call( this, '.uix-cmb__color-selector' );
				UixCustomMetaboxesConstructor.prototype.tabs.call( this, '.uix-cmb__tabsgroup-selector' );
				UixCustomMetaboxesConstructor.prototype.date.call( this, '.uix-cmb__date-selector' );
				UixCustomMetaboxesConstructor.prototype.upload.call( this, '.uix-cmb__upload-target' );
				UixCustomMetaboxesConstructor.prototype.customAttrs.call( this, '.uix-cmb__custom-attributes-field', 20 );
	
				
			});
			
			
			//Chain method calls
			return this;
		},
		
		
		/*! 
		 * 
		 * Radio
		 * ---------------------------------------------------
		 *
		 * @param  {string} selector       - The selector ID or class
		 * @return {void}                  - The constructor.
		 */
		radio: function( selector ) {

	
			jQuery( document ).ready( function() {
				
				jQuery( selector ).each(function(){

					var $this = jQuery( this ),
						tid   = $this.data( 'target-id' );

					
					$this.find( '[data-value]' ).on( 'click', function() {
					
						//Do not use preventDefault()
						var _curValue = jQuery( this ).attr( 'data-value' );
						$this.find( '[data-value]' ).removeClass( 'active' );
						jQuery( '#' + tid ).val( _curValue );
						jQuery( this ).addClass( 'active' );
						
					} );	

				} );			
			
				
			});
			

			//Chain method calls
			return this;
		},
		
		
	
		
		/*! 
		 * 
		 * Toggle
		 * ---------------------------------------------------
		 *
		 * @param  {string} selector       - The selector ID or class
		 * @return {void}                  - The constructor.
		 */
		toggle: function( selector ) {

	
			jQuery( document ).ready( function() {
				
				jQuery( selector ).each(function(){

					
					var $this = jQuery( this );

					$this.each( function()  {
						var tid = jQuery( this ).attr( 'data-toggle-id' );
						if ( $this.hasClass( 'active' ) ) {
							if ( tid != '' || typeof tid !== typeof undefined ) {
								$this.closest( '[data-target-id]' ).find( '.uix-cmb__toggle-target' ).hide();
								jQuery( '#' + tid ).show();
							}
						}
					});

					$this.on( "click", function() {
						var tid = jQuery( this ).attr( 'data-toggle-id' );
						$this.removeClass( 'active' );

						if ( tid != '' || typeof tid !== typeof undefined ) {
							$this.closest( '[data-target-id]' ).find( '.uix-cmb__toggle-target' ).hide();
							jQuery( '#' + tid ).show();
						}

						jQuery( this ).addClass( 'active' );
					} );	


				} );			
			
				
			});
			

			//Chain method calls
			return this;
		},
			
		
		/*! 
		 * 
		 * Tabs
		 * ---------------------------------------------------
		 *
		 * @param  {string} selector       - The selector ID or class
		 * @return {void}                  - The constructor.
		 */
		tabs: function( selector ) {

	
			jQuery( document ).ready( function() {
				
				jQuery( selector ).each(function(){

					
					var $this = jQuery( this ),
						tabID = $this.attr( 'id' );
					
					//Create ID
					$this.find( '> ul' ).find( 'li' ).each(function(index) {
						jQuery( ' a', this).attr( 'href', '#tab-' + index + tabID);
					});
					$this.find( '.item' ).each(function(index) {
						jQuery( this ).attr( 'id', 'tab-' + index + tabID);
					});

					$this.find( '> ul' ).each(function() {
						// For each set of tabs, we want to keep track of
						// which tab is active and its associated content
						var $active, content, links = jQuery( this ).find( 'a' );

						// If the location.hash matches one of the links, use that as the active tab.
						// If no match is found, use the first link as the initial active tab.
						$active = jQuery(links.filter( '[href="' + location.hash + '"]' )[0] || links[0]);
						$active.addClass( 'active' );

						content = jQuery($active[0].hash);

						// Hide the remaining content
						$this.find( '> ul' ).find( 'li a' ).removeClass( 'active' );
						links.not( $active ).each(function() {
							jQuery(this.hash).hide();
						});

						$this.find( '> ul' ).find( 'li:first a' ).addClass( 'active' );
						$this.find( '.item:first' ).show();

						//Prevent duplicate function assigned
						jQuery( this ).find( 'a' ).off( 'click' );
						
						// Bind the click event handler
						jQuery( this ).on( 'click', 'a',
						function(e) {
							// Make the old tab inactive.
							$active.removeClass( 'active' );
							content.hide();

							// Update the variables with the new link and content
							$active = jQuery( this );
							content = jQuery(this.hash);

							// Make the tab active.
							$active.addClass( 'active' );
							content.show();

							// Prevent the anchor's default click action
							e.preventDefault();
						});

					});

					


				} );			
			
				
			});
			

			//Chain method calls
			return this;
		},
			
			
		/*! 
		 * 
		 * Color Picker
		 * ---------------------------------------------------
		 *
		 * @param  {string} selector       - The selector ID or class
		 * @return {void}                  - The constructor.
		 */
		color: function( selector ) {

	
			jQuery( document ).ready( function() {
				if ( jQuery.isFunction( jQuery.fn.wpColorPicker ) ){
					jQuery( selector ).wpColorPicker();	
				}	
			});
			

			//Chain method calls
			return this;
		},		
		
		
		/*! 
		 * 
		 * Date Picker
		 * ---------------------------------------------------
		 *
		 * @param  {string} selector       - The selector ID or class
		 * @return {void}                  - The constructor.
		 */
		date: function( selector ) {

			jQuery( document ).ready( function() {
				if ( jQuery.isFunction( jQuery.fn.datepicker ) ) {
					
					jQuery( selector ).each( function(){

						var $this  = jQuery( this ),
							format = $this.data( 'format' );

						$this.datepicker({
							dateFormat : format
						});

					} );		
					
					
						
				}
			});
			

			//Chain method calls
			return this;
		},		
			
		
		

		/*! 
		 * 
		 * Upload Media Control
		 * ---------------------------------------------------
		 *
		 * @param  {string} selector       - The selector ID or class
		 * @return {void}                  - The constructor.
		 */
		upload: function( selector ) {

	
			jQuery( document ).ready( function() {
				

				jQuery( selector ).each( function()  {
					var $this     = jQuery( this ),
					    pid       = $this.data( 'insert-preview' ),
						rid       = $this.data( 'remove-btn' ),
						tid       = $this.data( 'insert-img' ),
						_closebtn = '#' + rid;

					if ( jQuery( '#' + tid ).val() != '' ) {
						jQuery( _closebtn ).show();
						$this.hide();
					} else {
						$this.show();
					}

					 //Delete pictrue   
					 if ( _closebtn ){

						//Prevent duplicate function assigned
						jQuery( _closebtn ).off( 'click' );
						 
						jQuery( document ).on( 'click', _closebtn, function( event ){

							event.preventDefault();

							jQuery( '#' + tid ).val( '' );
							jQuery( '#' + pid ).find( 'img' ).attr( 'src','' );
							jQuery( '#' + pid ).hide();

							jQuery( this ).hide();
							$this.show();
							$this.data( 'click', 1 );


						} );		

					 }

				});

				//Prevent duplicate function assigned
				jQuery( selector ).off( 'click' ).data( 'click', 1 );

				
				jQuery( document ).on( 'click', selector, function( e ) {
					e.preventDefault();

					var $this     = jQuery( this ),
						pid       = $this.data( 'insert-preview' ),
						rid       = $this.data( 'remove-btn' ),
						tid       = $this.data( 'insert-img' );

					var upload_frame, attachment, _closebtn = '#' + rid;


					if ( $this.data( 'click' ) == 1 ) {
						
						if( upload_frame ){
							upload_frame.open();
							return;
						}
						upload_frame = wp.media( {
							title: 'Select Files',
							button: {
							text: 'Insert into post',
						},
							multiple: false
						} );
						upload_frame.on( 'select',function(){
							attachment = upload_frame.state().get( 'selection' ).first().toJSON();
							jQuery( '#' + tid ).val( attachment.url );
							jQuery( '#' + pid ).find( 'img' ).attr( 'src',attachment.url );//image preview
							jQuery( '#' + pid ).show();

							if ( _closebtn ){
								jQuery( _closebtn ).show();
								$this.hide();
							}


						} );

						upload_frame.open();

						
						
					}
					
					$this.data( 'click', 0 );




					 //Delete pictrue   
					 if ( _closebtn ){

						//Prevent duplicate function assigned
						jQuery( _closebtn ).off( 'click' );

						jQuery( document ).on( 'click', _closebtn, function( event ){

							event.preventDefault();

							jQuery( '#' + tid ).val( '' );
							jQuery( '#' + pid ).find( 'img' ).attr( 'src','' );
							jQuery( '#' + pid ).hide();

							jQuery( this ).hide();
							$this.show();
							$this.data( 'click', 1 );


						} );		

					 }	


				});	
				
				
			});
			

			//Chain method calls
			return this;
		},


			
		
		/*! 
		 * 
		 * Custom Attributes
		 * ---------------------------------------------------
		 *
		 * @param  {string} selector       - The selector ID or class
		 * @param  {number} max            - Increase the maximum number dynamically.
		 * @return {void}                  - The constructor.
		 */
		customAttrs: function( selector, max ) {

	
			jQuery( document ).ready( function() {
				
				
				jQuery( selector ).each(function(){

					
					var $this       = jQuery( this ),
						$addButton  = $this.find( '.uix-cmb__custom-attributes-field__addbtn' ), //The add button selector ID or class
						wrapperID   = '#' + $this.data( 'append-id' ), //The field wrapper ID or class 
					    x           = 1,
						maxField    = max,
						fieldHTML   = $this.data( 'tmpl' );

					//Prevent duplicate function assigned
					$addButton.off( 'click' );

					$addButton.on( 'click', function( e ) {
						e.preventDefault();
						
						if( x < maxField ){ 
							x++;
							jQuery( wrapperID ).append( fieldHTML );
						}
						
						return false;
					});

					//Remove per item
					
					//Prevent duplicate function assigned
					jQuery( '.uix-cmb__custom-attributes-field__removebtn' ).off( 'click' );
					
					jQuery( document ).on( 'click', '.uix-cmb__custom-attributes-field__removebtn', function( e ) {
						e.preventDefault();

						var $li = jQuery( this ).closest( '.uix-cmb__text--div' );

						if ( jQuery( '.uix-cmb__custom-attributes-field .uix-cmb__text--div' ).length == 1 ) {
							$li.find( 'input' ).val( '' );
							$li.hide();
						} else {
							$li.remove();
						}


						x--;
					});	

					
					
				} );		
		
				
			});
			

			//Chain method calls
			return this;
		},

			
		
	};

	return new UixCustomMetaboxesConstructor( obj );
};


var UixCustomMetaboxesInit = new UixCustomMetaboxes();
UixCustomMetaboxesInit.getInstance(); 

