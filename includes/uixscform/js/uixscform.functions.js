/*!
 * ************************************
 * Initialize Global
 *************************************
 */
( function( $ ) {
"use strict";
	$( document ).ready( function() {


		/*!
		 *
		 * Shortcode preview button (For Uix Shortcodes)
		 * ---------------------------------------------------
		 */
		$( document ).on( 'mouseenter', '.uixscform-modal-save-btn-wrapper', function( e ) {
			e.preventDefault();
			$( this ).find( '.uixscform-modal-button-icon' ).addClass( 'active' );

			return false;
		});
		$( document ).on( 'mouseleave', '.uixscform-modal-save-btn-wrapper', function( e ) {
			e.preventDefault();
			$( this ).find( '.uixscform-modal-button-icon' ).removeClass( 'active' );

			return false;
		});	

		$( document ).on( 'click', '.uixscform-modal-button-icon', function( e ) {
			e.preventDefault();


			var curmID             = uixscform_curModalID(), //current modal box ID
				curcode            = $( this ).data( 'code' ),
				$mainmodalcontent  = $( '#'+curmID+' .ajax-temp' ),
				$previewbox        = $( '#'+curmID+' .preview-box' ),
				$previewboxBtn     = $( '#'+curmID+' .preview-box > .uixscform-sub-window-buttons' );

			//console.log( curmID );

			jQuery.ajax({
				url: ajaxurl,
				type: 'POST',
				data: {
					action      : 'uixscform_ajax_shortcodepreview',
					previewcode : curcode
				},
				success: function(result) {

				   $previewbox.find(' > div' ).html( result );

				   //show preview box buttons
				   $previewboxBtn.css( 'visibility', 'visible' );

				   if ( jQuery.isFunction( jQuery.uix_sc_init ) ) {
					   jQuery.uix_sc_init();
				   }

					return false;
				},
				beforeSend: function() {

					//hide preview box buttons
					$previewboxBtn.css( 'visibility', 'hidden' );
					//hide main modal content
					$mainmodalcontent.css( 'visibility', 'hidden' );
					//show sub window (live preview)
					$previewbox.addClass( 'active' );
					$previewbox.find(' > div' ).html( '<span class="uixscform-loading"></span>' );



				}
			});


		});	

		$( document ).on( 'click', '.uixscform-modal-exitpreview-btn', function( e ) {
			e.preventDefault();

			//remove sub window (live preview)
			$( '.uixscform-modal-box .preview-box' ).removeAttr( 'id' ).removeClass( 'active' );
			//show main modal content
			$( '.uixscform-modal-box .ajax-temp' ).css( 'visibility', 'visible' );

		});
	
	
		
		/*! 
		 * 
		 * Buttons without tinyMCE (For Uix Shortcodes)
		 * ---------------------------------------------------
		 */
		$( document ).on( 'mouseenter', '.custom-button', function( e ) {
			e.preventDefault();
			var c = $( this ).attr( 'class' );
			
			if ( c.indexOf( '-widget_btn' ) >= 0 && c.indexOf( 'mce-' ) < 0 ) {
				c = c
				    .replace( /uix_sc_form_/g,'uix_sc_' )
					.replace( /uix_sc_/g,'uix_sc_module_' )
				    .replace( /uix_sc_module_module_/g,'uix_sc_module_' );
				
			}	
			
			if ( c.indexOf( '-widget_btn' ) >= 0 && c.indexOf( 'mce-' ) < 0 ) {
				c = c.replace( /uix_sc_/g,'mce-uix_sc_' );
				$( this ).attr( 'class', c );
			}	
		});
		
		
		/*!
		 *
		 * Remove current icon from icons list
		 * ---------------------------------------------------
		 */
		$( document ).on( 'click', '.uixscform-icon-clear', function( e ) {
			e.preventDefault();

			var c               = $( this ).closest( '.uixscform-box' ),
				s               = c.find( 'span.icon-selector' ),
				targetID        = '#' + s.attr( 'data-targetid' ),
				chooseBtnID     = '#' + s.attr( 'data-targetid' ) + '-choosebtn',
				labeltxtID      = '#' + s.attr( 'data-targetid' ) + '-label',
				previewID       = '#' + s.attr( 'data-previewid' );	


			$( this ).css( 'display', 'none' );
			c.find( 'input' ).val( '' );
			c.find( '.uixscform-icon-selector-icon-preview' ).html( '' ).removeClass( 'iconshow' );
			$( chooseBtnID ).show();
			$( labeltxtID ).show();
			$( previewID ).hide();

		});


		/*!
		 *
		 * Normal checkbox
		 * ---------------------------------------------------
		 */

		$( document ).on( 'click', '.uixscform_btn_trigger-normalchk', function() {

			// don't prevent mouse action
			var cur_targetID  = '#' + $( this ).attr( "data-targetid" );

			if( $( this ).is( ':checked' ) ) {
				$( cur_targetID ).val( 1 );
			} else {
				$( cur_targetID ).val( 0 );
			}
			
			//Dynamic listening for the latest value
			$( cur_targetID ).focus().blur();


		} );



		/*!
		 *
		 * Remove focus
		 * ---------------------------------------------------
		 */

		$( document ).on( 'click', '.uixscform-form-container', function() {
			// don't prevent mouse action
			$( this ).find( 'form .wp-color-input' ).blur();

		} );


		
		/*!
		 *
		 * Input elements of type "text" with attribute values and slug values
		 * ---------------------------------------------------
		 */	
		$( document ).on( 'keyup', '.uixscform-input-text-spy-attrslug', function() {
			
			var cur_value     = $( this ).val();
			
			//To attribute
			var $attr_input    = $( this ).closest( '.uixscform-box' ).find( '.uixscform-input-text-attr' );
			if ( $attr_input.length > 0 ) {
				$attr_input.val( uixscform_format_htmlAttr( cur_value ) );
			}	
			
			//To slug
			var $slug_input    = $( this ).closest( '.uixscform-box' ).find( '.uixscform-input-text-slug' );
			if ( $slug_input.length > 0 ) {
				$slug_input.val( uixscform_format_slug( cur_value ) );
			}	
			
		} );
			
		
		/*!
		 *
		 * Input elements of type "text" with units conversion
		 * ---------------------------------------------------
		 */	
		$( document ).on( 'keyup', '.uixscform-input-text-spy-deg_px', function() {
			
			var cur_value     = $( this ).val();
			
			//Degrees to px 
			var $attr_input    = $( this ).closest( '.uixscform-box' ).find( '.uixscform-input-text-deg_px' );
			if ( $attr_input.length > 0 ) {
				$attr_input.val( uixscform_format_degToPx( cur_value ) );
			}
			
			
		} );
		
		/*!
		 *
		 * Traditional Selector
		 * ---------------------------------------------------
		 */	
		$( document ).on( 'change', '.uixscform_btn_trigger-select', function( e ) {
			e.preventDefault();

			var $selector     = $( this ),
			    cur_targetID  = '#' + $selector.attr( "data-targetid" );
			
	
			$( cur_targetID ).val( $selector.find( ' option:selected' ).val() );
			
			//Add event and status
			$selector.uixscform_selectEvent();
			
			//Dynamic listening for the latest value
			$( cur_targetID ).focus().blur();

		} );
	
		

		/*!
		 *
		 * Multiple Selector
		 * ---------------------------------------------------
		 */	
		$( document ).on( 'click', '.uixscform_btn_trigger-multradio span', function( e ) {
			e.preventDefault();

			var $selector     = $( this ).parent(),
				$option       = $( this ),
			    cur_targetID  = '#' + $selector.attr( "data-targetid" ),
				cur_value     = $option.attr( 'data-value' ),
				tar_value     = $( cur_targetID ).val() + ',',
			    res_value     = '';
			
			$option.toggleClass( 'active' );
			
			if ( tar_value.indexOf( cur_value + ',' ) < 0 ) {
				res_value = tar_value + cur_value + ',';
			} else {
				res_value = tar_value.replace( cur_value + ',', '' );
			}

			res_value = res_value
							.replace(/,\s*$/, '' )
							.replace(/^,/, '' );
			
			$( cur_targetID ).val( res_value );
			
			//Add event and status
			$selector.uixscform_multipleEvent();
			
			//Dynamic listening for the latest value
			$( cur_targetID ).focus().blur();

		} );

		
		
		/*!
		 *
		 * Radio Selector
		 * ---------------------------------------------------
		 */	
		$( document ).on( 'click', '.uixscform_btn_trigger-radio span', function( e ) {
			e.preventDefault();

			var $selector     = $( this ).parent(),
				$option       = $( this ),
			    cur_targetID  = '#' + $selector.attr( "data-targetid" ),
				cur_value     = $option.attr( 'data-value' );
			
			
			//Color Selector
			var $colorname_input    = $selector.closest( '.uixscform-box' ).find( '.uixscform-color-name' );
			if ( $colorname_input.length > 0 ) {
				$colorname_input.val( uixscform_format_colorTran( cur_value ) );
			}	
			
			//Radio Selector
			$selector.find( 'span' ).removeClass( 'active' );
			$( cur_targetID ).val( cur_value );
			$option.addClass( 'active' );

			
			//Add event and status
			$selector.uixscform_radioEvent();
			
			//Dynamic listening for the latest value
			$( cur_targetID ).focus().blur();

		} );
		
		
		

		/*!
		 *
		 * Toggle of unidirectional display
		 * ---------------------------------------------------
		 */
		$( document ).on( 'click', '.uixscform_btn_trigger-toggleshow', function( e ) {
			e.preventDefault();
			
			var $this   = $( this ),
			    $target = $this.closest( '.uixscform-box' );

			
			$target.find( 'input[type="hidden"]' ).val( 1 );
			
			//Add event and status
			$this.uixscform_toggleEvent( { unidirectionalDisplay: true } );
			

		} );
		
			
		/*!
		 *
		 * Toggle of switch with checkbox
		 * ---------------------------------------------------
		 */
		$( document ).on( 'click', '.uixscform_btn_trigger-toggleswitch_checkbox', function( e ) {
			e.preventDefault();
			
			var $this          = $( this ),
			    $target        = $this.closest( '.uixscform-box' ).find( 'input[type="hidden"]' );

			
			if ( $target.val() == 1 ) {
				$target.val( 0 );
			} else {
				$target.val( 1 );
			}
			
			//Add event and status
			$this.uixscform_toggleEvent( { unidirectionalDisplay: false } );
			
			//Dynamic listening for the latest value
			$target.focus().blur();
			

		} );
		
		


		/*!
		 *
		 * Dynamic Adding Input
		 * ---------------------------------------------------
		 */
		/*-- Click Action --*/
		$( document ).on( 'click', '.uixscform_btn_trigger-clone', function( e ) {
			e.preventDefault();
			$( this ).uixscform_dynamicFormInit( { type: 'click' } );
		} );



		/*!
		 *
		 * Insert media
		 * ---------------------------------------------------
		 */
		$( document ).on( 'click', '.uixscform_btn_trigger-upload', function( e ) {
			e.preventDefault();

			var cur_btnID       = '#' + $( this ).attr( "data-insert-btnid" ),
				cur_closebtnID  = '#' + $( this ).attr( "data-insert-closebtnid" ),
				cur_targetID    = '#' + $( this ).attr( "data-targetid" ),
				cur_prop        = $( this ).attr( "data-insert-prop" );

			var upload_frame,
				value_id,
				propIDPrefix = cur_btnID.replace( '#', '' );


			/*-- Open upload window --*/
			var _targetImgContainer = $( this ).attr( "data-insert-img" );
			var _targetPreviewContainer = $( this ).attr( "data-insert-preview" );

			value_id =$( this ).attr( 'id' );
			event.preventDefault();

			if( upload_frame ){
				upload_frame.open();
				return;
			}
			upload_frame = wp.media( {
				title: uix_shortcodes_wp_plugin.lang_media_title,
				button: {
				text: uix_shortcodes_wp_plugin.lang_media_text,
			},
				multiple: false
			} );
			upload_frame.on( 'select',function(){
				var attachment;
				attachment = upload_frame.state().get( 'selection' ).first().toJSON();
				$( "#" + _targetImgContainer ).val( attachment.url );
				$( "#" + _targetPreviewContainer ).find( 'img' ).attr( "src",attachment.url );//image preview
				$( "#" + _targetPreviewContainer ).show();

				//Dynamic listening for the latest value
				$( "#" + _targetImgContainer ).focus().blur();

				//Upload container
				if ( _targetPreviewContainer != '' && _targetPreviewContainer != 'none' ) {
					$( cur_btnID ).parent( '.uixscform-upbtn-container' ).css( 'height','150px' );
				}


				if ( cur_closebtnID ){
					$( cur_closebtnID ).show().css( { 'display': 'block' } );
				}

				//Show image properties
				if ( cur_prop ) {
					$( "." + propIDPrefix + '_repeat' ).show().addClass( 'active' );
					$( "." + propIDPrefix + '_position' ).show().addClass( 'active' );
					$( "." + propIDPrefix + '_attachment' ).show().addClass( 'active' );
					$( "." + propIDPrefix + '_size' ).show().addClass( 'active' );


				}

			} );

			upload_frame.open();

			/*-- Delete current picture --*/
			 if ( cur_closebtnID ){
				$( document ).on( 'click', cur_closebtnID, function( e ) {
					e.preventDefault();
					var _targetImgContainer = $( this ).attr( "data-insert-img" );
					var _targetPreviewContainer = $( this ).attr( "data-insert-preview" );

					$( "#" + _targetImgContainer ).val( '' );
					$( "#" + _targetPreviewContainer ).find( 'img' ).attr( "src",'' );
					$( "#" + _targetPreviewContainer ).hide();

					//Dynamic listening for the latest value
					$( "#" + _targetImgContainer ).focus().blur();

					//Upload container
					if ( _targetPreviewContainer != '' && _targetPreviewContainer != 'none' ) {
						$( cur_btnID ).parent( '.uixscform-upbtn-container' ).css( 'height','40px' );
					}


					$( this ).hide();

					//Hide image properties
					if ( cur_prop ) {
						$( "." + propIDPrefix + '_repeat' ).hide().removeClass( 'active' );
						$( "." + propIDPrefix + '_position' ).hide().removeClass( 'active' );
						$( "." + propIDPrefix + '_attachment' ).hide().removeClass( 'active' );
						$( "." + propIDPrefix + '_size' ).hide().removeClass( 'active' );
					}


				} );

			 }


		});

	});
    
} ) ( jQuery );


/*!
 * ************************************
 * Insert media status
 *************************************
 */
 ( function( $ ) {
  jQuery.fn.uixscform_mediaStatus = function( options ) {
		var settings=$.extend( {}, options );
		return this.each( function() {

			var cur_btnID       = '#' + $( this ).attr( "data-insert-btnid" ),
			    cur_closebtnID  = '#' + $( this ).attr( "data-insert-closebtnid" ),
				cur_targetID    = '#' + $( this ).attr( "data-insert-img" ),
				cur_previewID   = '#' + $( this ).attr( "data-insert-preview" ),
				cur_prop        = $( this ).attr( "data-insert-prop" ),
				propIDPrefix    = cur_btnID.replace( '#', '' ),
				imgvalue        = $( cur_targetID ).val();

		
		
			if ( $( cur_targetID ).length > 0 ) {
				
				if ( imgvalue.length == 0 ) {
					$( cur_previewID ).hide().find( 'img' ).attr( 'src', '' );
				}
				

				if ( imgvalue.length > 0 ) {

					/*-- Show image properties and remove button --*/
					$( cur_closebtnID ).show().css( { 'display': 'block' } );
					$( cur_previewID ).show().find( 'img' ).attr( 'src', imgvalue );

					if ( cur_prop ) {
						$( "." + propIDPrefix + '_repeat' ).show();
						$( "." + propIDPrefix + '_position' ).show();
						$( "." + propIDPrefix + '_attachment' ).show();
						$( "." + propIDPrefix + '_size' ).show();

					}


					/*-- Delete current picture --*/
					 if ( cur_closebtnID ){
						$( document ).on( 'click', cur_closebtnID, function( e ) {
							e.preventDefault();
							var _targetImgContainer = $( this ).attr( "data-insert-img" );
							var _targetPreviewContainer = $( this ).attr( "data-insert-preview" );

							$( "#" + _targetImgContainer ).val( '' );
							$( "#" + _targetPreviewContainer ).find( 'img' ).attr( 'src', '' );
							$( "#" + _targetPreviewContainer ).hide();

							//Upload container
							if ( _targetPreviewContainer != '' && _targetPreviewContainer != 'none' ) {
								$( cur_btnID ).parent( '.uixscform-upbtn-container' ).css( 'height','40px' );
							}


							$( this ).hide();

							//Hide image properties
							if ( cur_prop ) {
								$( "." + propIDPrefix + '_repeat' ).hide();
								$( "." + propIDPrefix + '_position' ).hide();
								$( "." + propIDPrefix + '_attachment' ).hide();
								$( "." + propIDPrefix + '_size' ).hide();
							}


						} );

					 }



				}

			}



		} );

  };
} )( jQuery );


/*!
 * ************************************
 * Traditional Selector
 *************************************
 */
( function( $ ) {
  jQuery.fn.uixscform_selectEvent = function( options ) {

		var settings=$.extend( {}, options );
		return this.each( function() {
			

			var $this         = $( this ),
				cur_targetID  = '#' + $this.attr( 'data-targetid' ),
				cur_val       = $( cur_targetID ).val();

			if ( cur_val == '' ) {
				cur_val = $this.find( 'option:first' ).val();
				
				$( cur_targetID ).val( cur_val );
				
				//Dynamic listening for the latest value
				$( cur_targetID ).focus().blur();	

			}
			
			/*-- Compatible with 1.4.6 or before versions of .xml template files and pages that have saved data. --*/
			if ( $this.attr( 'data-targetid' ) == '' ) {
				cur_val = $this.closest( '.uixscform-box' ).find( 'input[type="hidden"]' ).val();	
			}
			
			
			
			/*-- Control Status --*/
			$this.val( cur_val );
			
			

		} );

  };
} )( jQuery );



/*!
 * ************************************
 * Multiple Selector
 *************************************
 */
( function( $ ) {
  jQuery.fn.uixscform_multipleEvent = function( options ) {

		var settings=$.extend( {}, options );
		return this.each( function() {
			

			var $this         = $( this ),
			    $option       = $this.find( 'span' ),
				cur_targetID  = '#' + $this.attr( 'data-targetid' );


			
			/*-- Control Status --*/
			$option.each( function()  {
				
				if ( $( cur_targetID ).val().indexOf( $( this ).attr( 'data-value' ) ) >= 0 ) {
					$( this ).addClass( 'active' );
				} else {
					$( this ).removeClass( 'active' );
				}	
			
				
			});
			
		
			

		} );

  };
} )( jQuery );



/*!
 * ************************************
 * Radio Selector
 *************************************
 */
( function( $ ) {
  jQuery.fn.uixscform_radioEvent = function( options ) {

		var settings=$.extend( {}, options );
		return this.each( function() {
			

			var $this         = $( this ),
			    $option       = $this.find( 'span' ),
				cur_targetID  = '#' + $this.attr( 'data-targetid' );

			
			/*-- Identifies this object as a clone object --*/
			if ( cur_targetID.indexOf( '_listitem' ) >= 0 ) {
				$this.attr( "data-trigger-clone", 1 );
			}
			
			
			
			/*-- Control Status --*/
			var	clone_list     = $this.attr( "data-trigger-clone" ),
			    clone_tr_class = $this.closest( 'tr' ).attr( 'class' );

			
			$option.each( function()  {
				
				//Radio status
				if ( $( this ).attr( 'data-value' ) == $( cur_targetID ).val() ) {
					$( this ).addClass( 'active' );
				} else {
					$( this ).removeClass( 'active' );
				}	
				
				
				//Toggle of switch with radio status
				var	option_targetID      = $( this ).attr( 'data-targetid' ),
					option_targetIDs     = uixscform_get_real_ids( option_targetID, cur_targetID, $this );
				
				
				if ( option_targetIDs != '' && option_targetIDs != ',' ) {

					if ( $( this ).attr( 'data-value' ) == $( cur_targetID ).val() ) {

						if ( clone_list == 1 ) {

							$( option_targetIDs ).closest( '.uixscform-box' ).show().addClass( 'active' );
							$( option_targetIDs ).addClass( 'active' );	

							//First clone object (not allowed to delete)
							if ( typeof clone_tr_class !== typeof undefined && clone_tr_class.indexOf( 'dynamic-row-' ) >= 0 ) {
								$( option_targetIDs ).closest( 'tr' ).show().addClass( 'active' );
							}	

						} else {

							$( option_targetIDs ).closest( 'tr' ).show().addClass( 'active' );
							$( option_targetIDs ).addClass( 'active' );	
						}

					} else {


						if ( clone_list == 1 ) {

							$( option_targetIDs ).closest( '.uixscform-box' ).hide().removeClass( 'active' );
							$( option_targetIDs ).removeClass( 'active' );

							//First clone object (not allowed to delete)
							if ( typeof clone_tr_class !== typeof undefined && clone_tr_class.indexOf( 'dynamic-row-' ) >= 0 ) {
								$( option_targetIDs ).closest( 'tr' ).hide().removeClass( 'active' );
							}


						} else {

							$( option_targetIDs ).closest( 'tr' ).hide().removeClass( 'active' );
							$( option_targetIDs ).removeClass( 'active' );		

						}	

					}		

				}

				
				/*-- Exclude unidirectional display --*/
				if ( typeof( option_targetIDs ) == 'string' && option_targetIDs.length > 0 ) {

					option_targetIDs = option_targetIDs + ',';

					var ids = option_targetIDs.split( ',' );

					for ( var i = 0; i < ids.length; i++ ) {

						if ( ids[i] == '' ) break;

						var $unidirectionalDisplayTrigger = $( ids[i] ).closest( '.uixscform-box' ).find( '.uixscform_btn_trigger-toggleshow' );
						if ( $unidirectionalDisplayTrigger.length > 0 ) {

							var _$this              = $unidirectionalDisplayTrigger,
								_$target            = _$this.closest( '.uixscform-box' ),
								_targetID           = _$this.attr( 'data-targetid' ),
								_curID              = _$target.find( 'input[type="hidden"]' ).attr( 'id' ),
								_curV               = _$target.find( 'input[type="hidden"]' ).val(),
								_option_targetIDs   = uixscform_get_real_ids( _targetID, _curID, _$this );



								//Identifies this object as a clone object
								if ( _curID.indexOf( '_listitem' ) >= 0 ) {
									_$this.attr( "data-trigger-clone", 1 );
								}

								//Control Status
								var _clone_list     = _$this.attr( "data-trigger-clone" ),
									_clone_tr_class = _$this.closest( 'tr' ).attr( 'class' );


								//Forcibly initialize unidirectional display
								if ( $( this ).attr( 'data-value' ) == $( cur_targetID ).val() ) {

									if ( _curV == 1 ) {


										if ( _clone_list == 1 ) {

											_$this.closest( '.uixscform-box' ).hide();

											if ( _option_targetIDs != '' ) {
												$( _option_targetIDs ).closest( '.uixscform-box' ).show().addClass( 'active' );
												$( _option_targetIDs ).addClass( 'active' );

												if ( typeof _clone_tr_class !== typeof undefined && _clone_tr_class.indexOf( 'dynamic-row-' ) >= 0 ) {
													$( _option_targetIDs ).closest( 'tr' ).show().addClass( 'active' );
												}
											}


										} else {
											_$this.closest( 'tr' ).hide();

											if ( _option_targetIDs != '' ) {
												$( _option_targetIDs ).closest( 'tr' ).show().addClass( 'active' );
												$( _option_targetIDs ).addClass( 'active' );	
											}	


										}	


									} else {

										if ( _clone_list == 1 ) {

											_$this.closest( '.uixscform-box' ).show();

											if ( _option_targetIDs != '' ) {
												$( _option_targetIDs ).closest( '.uixscform-box' ).hide().removeClass( 'active' );
												$( _option_targetIDs ).removeClass( 'active' );

												if ( typeof _clone_tr_class !== typeof undefined && _clone_tr_class.indexOf( 'dynamic-row-' ) >= 0 ) {
													$( _option_targetIDs ).closest( 'tr' ).hide().removeClass( 'active' );
												}
											}

										} else {

											_$this.closest( 'tr' ).show();

											if ( _option_targetIDs != '' ) {
												$( _option_targetIDs ).closest( 'tr' ).hide().removeClass( 'active' );
												$( _option_targetIDs ).removeClass( 'active' );		
											}


										}

									}//end if(_curV)							

								} else {


									if ( _clone_list == 1 ) {

										_$this.closest( '.uixscform-box' ).hide();

										if ( _option_targetIDs != '' ) {
											$( _option_targetIDs ).closest( '.uixscform-box' ).hide().removeClass( 'active' );
											$( _option_targetIDs ).removeClass( 'active' );

											if ( typeof _clone_tr_class !== typeof undefined && _clone_tr_class.indexOf( 'dynamic-row-' ) >= 0 ) {
												$( _option_targetIDs ).closest( 'tr' ).hide().removeClass( 'active' );
											}
										}


									} else {
										_$this.closest( 'tr' ).hide();

										if ( _option_targetIDs != '' ) {
											$( _option_targetIDs ).closest( 'tr' ).hide().removeClass( 'active' );
											$( _option_targetIDs ).removeClass( 'active' );		
										}


									}		


								}


						}


					}//end for

				}//end if	
				
				
			});
			
			
		

			//Dynamic form group‘s <tr> mandatory display
			$( '.dynamic-append-wrapper' ).parent( 'td' ).parent( 'tr' ).show();	
			
			

			

		} );

  };
} )( jQuery );


/*!
 * ************************************
 * Toggle Selector: Switch with checkbox, Unidirectional display.
 *************************************
 */
( function( $ ) {
  jQuery.fn.uixscform_toggleEvent = function( options ) {

		var settings=$.extend( {
			'unidirectionalDisplay'      : true
		}
		,options );
		return this.each( function() {
			

			var $this         = $( this ),
			    $target       = $this.closest( '.uixscform-box' ),
				targetID      = $this.attr( 'data-targetid' ),
				curID         = $target.find( 'input[type="hidden"]' ).attr( 'id' ),
				targetIDs     = uixscform_get_real_ids( targetID, curID, $this );

			/*-- Identifies this object as a clone object --*/
			if ( curID.indexOf( '_listitem' ) >= 0 ) {
				$this.attr( "data-trigger-clone", 1 );
			}
			

			
			/*-- Control Status --*/
			var clone_list     = $this.attr( "data-trigger-clone" ),
				clone_tr_class = $this.closest( 'tr' ).attr( 'class' );

			if ( $target.find( 'input[type="hidden"]' ).val() == 1 ) {


				//Activate this control
				if ( $this.hasClass( 'onoffswitch' ) ) $this.addClass( 'checked' );
				
				
				if ( clone_list == 1 ) {

					//Dynamic elements
					if ( settings.unidirectionalDisplay ) {
						$this.closest( '.uixscform-box' ).hide();
					}
					
					
					if ( targetIDs != '' ) {
						$( targetIDs ).closest( '.uixscform-box' ).show().addClass( 'active' );
						$( targetIDs ).addClass( 'active' );
						
						//First clone object (not allowed to delete)
						if ( typeof clone_tr_class !== typeof undefined && clone_tr_class.indexOf( 'dynamic-row-' ) >= 0 ) {
							$( targetIDs ).closest( 'tr' ).show().addClass( 'active' );
						}	
						
					}



				} else {
					if ( settings.unidirectionalDisplay ) {
					    $this.closest( 'tr' ).hide();
					}
					
					if ( targetIDs != '' ) {
						$( targetIDs ).closest( 'tr' ).show().addClass( 'active' );
						$( targetIDs ).addClass( 'active' );	
					}


				}

			} else {

				
				//Deactivate this control
				if ( $this.hasClass( 'onoffswitch' ) ) $this.removeClass( 'checked' );	
				

				if ( clone_list == 1 ) {

					//Dynamic elements
					if ( settings.unidirectionalDisplay ) {
					    $this.closest( '.uixscform-box' ).show();
					}
					
					if ( targetIDs != '' ) {
						$( targetIDs ).closest( '.uixscform-box' ).hide().removeClass( 'active' );
						$( targetIDs ).removeClass( 'active' );

						//First clone object (not allowed to delete)
						if ( typeof clone_tr_class !== typeof undefined && clone_tr_class.indexOf( 'dynamic-row-' ) >= 0 ) {
							$( targetIDs ).closest( 'tr' ).hide().removeClass( 'active' );
						}
					}
					



				} else {
					if ( settings.unidirectionalDisplay ) {
					    $this.closest( 'tr' ).show();
					}
					
					if ( targetIDs != '' ) {
						$( targetIDs ).closest( 'tr' ).hide().removeClass( 'active' );
						$( targetIDs ).removeClass( 'active' );		
					}
					


				}	


			}
			
			
			/*-- Exclude unidirectional display --*/
			if ( typeof( targetIDs ) == 'string' && targetIDs.length > 0 ) {

				targetIDs = targetIDs + ',';
				
				var ids = targetIDs.split( ',' );

				for ( var i = 0; i < ids.length; i++ ) {
					
					if ( ids[i] == '' ) break;
					
					var $unidirectionalDisplayTrigger = $( ids[i] ).closest( '.uixscform-box' ).find( '.uixscform_btn_trigger-toggleshow' );
					if ( $unidirectionalDisplayTrigger.length > 0 ) {
						
						var _$this         = $unidirectionalDisplayTrigger,
						    _$target       = _$this.closest( '.uixscform-box' ),
						    _targetID      = _$this.attr( 'data-targetid' ),
							_curID         = _$target.find( 'input[type="hidden"]' ).attr( 'id' ),
							_curV          = _$target.find( 'input[type="hidden"]' ).val(),
							_targetIDs     = uixscform_get_real_ids( _targetID, _curID, _$this );

							//Identifies this object as a clone object
							if ( _curID.indexOf( '_listitem' ) >= 0 ) {
								_$this.attr( "data-trigger-clone", 1 );
							}
			
							//Control Status
							var _clone_list     = _$this.attr( "data-trigger-clone" ),
								_clone_tr_class = _$this.closest( 'tr' ).attr( 'class' );
						
						
							//Forcibly initialize unidirectional display
						    if ( $target.find( 'input[type="hidden"]' ).val() == 1 ) {
								
								if ( _curV == 1 ) {


									if ( _clone_list == 1 ) {

										_$this.closest( '.uixscform-box' ).hide();

										if ( _targetIDs != '' ) {
											$( _targetIDs ).closest( '.uixscform-box' ).show().addClass( 'active' );
											$( _targetIDs ).addClass( 'active' );

											if ( typeof _clone_tr_class !== typeof undefined && _clone_tr_class.indexOf( 'dynamic-row-' ) >= 0 ) {
												$( _targetIDs ).closest( 'tr' ).show().addClass( 'active' );
											}
										}


									} else {
										_$this.closest( 'tr' ).hide();

										if ( _targetIDs != '' ) {
											$( _targetIDs ).closest( 'tr' ).show().addClass( 'active' );
											$( _targetIDs ).addClass( 'active' );	
										}	


									}	


								} else {

									if ( _clone_list == 1 ) {

										_$this.closest( '.uixscform-box' ).show();

										if ( _targetIDs != '' ) {
											$( _targetIDs ).closest( '.uixscform-box' ).hide().removeClass( 'active' );
											$( _targetIDs ).removeClass( 'active' );

											if ( typeof _clone_tr_class !== typeof undefined && _clone_tr_class.indexOf( 'dynamic-row-' ) >= 0 ) {
												$( _targetIDs ).closest( 'tr' ).hide().removeClass( 'active' );
											}
										}

									} else {

										_$this.closest( 'tr' ).show();

										if ( _targetIDs != '' ) {
											$( _targetIDs ).closest( 'tr' ).hide().removeClass( 'active' );
											$( _targetIDs ).removeClass( 'active' );		
										}


									}

								}//end if(_curV)							
								
							} else {
								
								
								if ( _clone_list == 1 ) {

									_$this.closest( '.uixscform-box' ).hide();

									if ( _targetIDs != '' ) {
										$( _targetIDs ).closest( '.uixscform-box' ).hide().removeClass( 'active' );
										$( _targetIDs ).removeClass( 'active' );

										if ( typeof _clone_tr_class !== typeof undefined && _clone_tr_class.indexOf( 'dynamic-row-' ) >= 0 ) {
											$( _targetIDs ).closest( 'tr' ).hide().removeClass( 'active' );
										}
									}


								} else {
									_$this.closest( 'tr' ).hide();

									if ( _targetIDs != '' ) {
										$( _targetIDs ).closest( 'tr' ).hide().removeClass( 'active' );
										$( _targetIDs ).removeClass( 'active' );		
									}


								}		
								
								
							}


					}


				}//end for

			}//end if	
			
			//Dynamic form group‘s <tr> mandatory display
			$( '.dynamic-append-wrapper' ).parent( 'td' ).parent( 'tr' ).show();

			

		} );

  };
} )( jQuery );



/*!
 * ************************************
 * Re-initialize Dynamic Adding Input 
 *************************************
 */
( function( $ ) {
  jQuery.fn.uixscform_dynamicFormInit = function( options ) {

		var settings=$.extend( {
			'type' : '', //Valid values: click, load
			
		}
		,options );
		return this.each( function() {


			var cur_appendID         = '#' + $( this ).attr( "data-clone-appendid" ),
				cur_removeCloneClass = $( this ).attr( "data-clone-removeclass" ),
				cur_colID            = $( this ).attr( "data-clone-colid" ),
				cur_formID           = $( this ).attr( "data-clone-formid" ),
				cur_max              = $( this ).attr( "data-clone-max" ),
				cur_sectionID        = $( this ).attr( "data-clone-sectionid" ),
				cur_renderTemp       = uixscform_module_form_ids( cur_formID, cur_sectionID, cur_colID, false ),
				cur_echo_tmpl_ID     = '#' + $( this ).closest( '.uixscform-modal-box' ).attr( 'id' ) + ' .echo-module-temp-clone',
				cur_echo_tmpl_code   = '',
				cur_load_tmpl_ID     = '',
			    $obj                 = $( '#uixscform-modal-open-mce-' + cur_formID + '-widget_btn' );
	
			/*-- Detects whether each form group contains multiple columns --*/
			var clone_multiTrigger_group_col2   = $( this ).closest( '.uixscform-modal-box' ).find( '.uixscform-table-col-2' ).length,
				clone_multiTrigger_group_col3   = $( this ).closest( '.uixscform-modal-box' ).find( '.uixscform-table-col-3' ).length,
				clone_multiTrigger_group_col4   = $( this ).closest( '.uixscform-modal-box' ).find( '.uixscform-table-col-4' ).length,
				clone_multiTrigger_group_cols   = 0,
				clone_multiTrigger_group_index  = 0;
			
			if ( clone_multiTrigger_group_col2 > 1 ) clone_multiTrigger_group_cols = clone_multiTrigger_group_col2;
			if ( clone_multiTrigger_group_col3 > 1 ) clone_multiTrigger_group_cols = clone_multiTrigger_group_col3;
			if ( clone_multiTrigger_group_col4 > 1 ) clone_multiTrigger_group_cols = clone_multiTrigger_group_col4;

			if ( cur_appendID.indexOf( '_one_' ) >= 0 ) clone_multiTrigger_group_index = 1;
			if ( cur_appendID.indexOf( '_two_' ) >= 0 ) clone_multiTrigger_group_index = 2;
			if ( cur_appendID.indexOf( '_three_' ) >= 0 ) clone_multiTrigger_group_index = 3;
			if ( cur_appendID.indexOf( '_four_' ) >= 0 ) clone_multiTrigger_group_index = 4;
			
			
			
			/*-- Call the specified page modules --*/
			if ( clone_multiTrigger_group_cols > 1 ) {

				var cur_formID_index = '-' + clone_multiTrigger_group_index;
				
				//Empty container contents
				$( cur_echo_tmpl_ID ).html( '' );

				if ( uixscform_isJSON( cur_renderTemp ) ) {
					//Use the saved data values
					$( '#module_tmpl_clone_' + settings.type + '__' + cur_formID + cur_formID_index ).tmpl( JSON.parse( cur_renderTemp ) ).appendTo( cur_echo_tmpl_ID );		
				} 
				cur_echo_tmpl_code = $( cur_echo_tmpl_ID ).html();


			}
			
			
			if ( clone_multiTrigger_group_cols == 0 ) {
				
				//Empty container contents
				$( cur_echo_tmpl_ID ).html( '' );

				if ( uixscform_isJSON( cur_renderTemp ) ) {
					//Use the saved data values
					$( '#module_tmpl_clone_' + settings.type + '__' + cur_formID ).tmpl( JSON.parse( cur_renderTemp ) ).appendTo( cur_echo_tmpl_ID );		
				} 
				cur_echo_tmpl_code = $( cur_echo_tmpl_ID ).html();

				
			}

			
			
			/*-- Initializes the clone controls --*/
			var show_count    = cur_max,
				widget_ID     = cur_sectionID,
				appendTotal   = $( cur_echo_tmpl_code ).find( '.delrow' ).length,
				clone_content = cur_echo_tmpl_code;


			//Add an index value
			/* 
			 * The converted form ID is like:

			   uix_pb_module_???-null-uix_pb_???_??-null-1
			   uix_pb_module_???-null-uix_pb_???_??-null-2
			   uix_pb_module_???-null-uix_pb_???_??-null-3
			   ...

			  *
			  *
			  -------------
			  __index__              Used for all controls
			  __removeCloneClass__   Used for remove button

			*/

			if ( appendTotal > 1 ) {
				$( this ).attr( 'data-clone-index', appendTotal );
			}

			var cur_index = parseFloat( $( this ).attr( 'data-clone-index' ) );
			if ( cur_index < show_count ) {

				clone_content = clone_content.replace( /__removeCloneClass__/g, cur_removeCloneClass );




				if ( settings.type == 'click' ) {
					//Use the button to trigger the dynamic form to add
					clone_content      = clone_content.replace( /__index__/g, cur_index );	
				} else if ( settings.type == 'load' ) {
					//Load the saved data to trigger the dynamic form to add
					clone_content      = clone_content.replace( /__index__/g, '' );	
				}



				$( cur_appendID ).after( clone_content );

				$( this ).attr( 'data-clone-index', cur_index + 1 );


			}

			if ( ( cur_index + 1 ) == show_count ) {
				$( this ).addClass( 'disable' );
			}		

			

			/*-- Initializes the controls state --*/
			$( document ).uixscform_init_controls( { form: $obj.find( '.dynamic-append-wrapper' ) } );
			
			

			/*-- The form focus --*/
			var srow            = $( cur_appendID ).closest( 'td' ).find( '.dynamic-row' ),
				srowcols_c      = $( cur_appendID ).closest( '.uixscform-table-cols-wrapper' ),
				srowsingle_c    = $( cur_appendID ).closest( '.uixscform-table-wrapper' ),
				sroworg         = null, 
				sroworg_trigger = null;
			
			
			srow.addClass( 'active' );

			if ( srowcols_c.length > 0 ) {
				sroworg         = srowcols_c.find( 'tr[class^="dynamic-row-"]' ),
				sroworg_trigger = srowcols_c.find( 'tr[class^="dynamic-row-"] td' );	
			} else {
				sroworg         = srowsingle_c.find( 'tr[class^="dynamic-row-"]' ),
				sroworg_trigger = srowsingle_c.find( 'tr[class^="dynamic-row-"] td' );	
			}



			$( srow ).on( 'mouseenter', function(){
				$( srow ).removeClass( 'hover' );
				$( srow ).addClass( 'hoverall' );
				$( sroworg ).removeClass( 'hover' );
				$( sroworg ).addClass( 'hoverall' );		

				$( this ).addClass( 'hover' );
				$( this ).removeClass( 'hoverall' );

				return false;
			});
			$( srow ).on( 'mouseleave', function(){
				$( srow ).removeClass( 'hoverall' );
				$( sroworg ).removeClass( 'hoverall' );	

				$( srow ).addClass( 'hover' );
				$( sroworg ).addClass( 'hover' );

				return false;

			});

			//--
			$( sroworg_trigger ).on( 'mouseenter', function(){
				$( srow ).removeClass( 'hover' );
				$( srow ).addClass( 'hoverall' );		

				$( sroworg ).addClass( 'hover' );
				$( sroworg ).removeClass( 'hoverall' );

				return false;
			});
			$( sroworg_trigger ).on( 'mouseleave', function(){
				$( srow ).removeClass( 'hoverall' );
				$( sroworg ).removeClass( 'hoverall' );	

				$( srow ).addClass( 'hover' );
				$( sroworg ).addClass( 'hover' );

				return false;
			});	


			 /*-- Remove input --*/
			 if ( cur_removeCloneClass ){

				 $( document ).on( 'click', '.' + cur_removeCloneClass, function( e ) {
					e.preventDefault();

					var  cur_thisBTN = $( this ).closest( 'table' ).find( '.uixscform_btn_trigger-clone' ),
						 cur_index   = parseFloat( cur_thisBTN.attr( 'data-clone-index' ) );

					if ( cur_index > 1 ) {
						$( this ).closest( '.dynamic-addnow' ).remove();
						cur_thisBTN.attr( 'data-clone-index', cur_index - 1 );
					}

					cur_thisBTN.removeClass( 'disable' );



				} );

			 }


		} );

  };
} )( jQuery );





/*!
 * ************************************
 * Normal checkbox status
 *************************************
 */
 ( function( $ ) {
  jQuery.fn.uixscform_normalCheckboxStatus = function( options ) {
		var settings=$.extend( {}, options );
		return this.each( function() {

			var $this         = $( this ),
				cur_targetID  = '#' + $this.attr( "data-targetid" );

			if ( $( cur_targetID ).val() == 1 ) {
				$this.prop( "checked", true );
			} else {
				$this.prop( "checked", false );
			}
			

			
		
		} );

  };
} )( jQuery );

/*!
 * ************************************
 * Icon Selector
 *************************************
 */
( function( $ ) {
  jQuery.fn.uixscform_iconSelector = function( options ) {
	
		return this.each( function() {
			
			var $this           = $( this ),
			    containerID     = '#' + $this.attr( 'data-containerid' ),
				targetID        = '#' + $this.attr( 'data-targetid' ),
				chooseBtnID     = '#' + $this.attr( 'data-targetid' ) + '-choosebtn',
				labeltxtID      = '#' + $this.attr( 'data-targetid' ) + '-label',
				previewID       = '#' + $this.attr( 'data-previewid' ),
				iconURL         = $this.attr( 'data-listurl' ),
				listContainerID = 'icon-list-' + $this.attr( 'data-targetid' ),
				defaultIconName =  $( targetID ).val(),
				$formContainer  = $( previewID ).closest( '.uixscform-box' );
				
			
			/*-- Default status --*/
			if ( $formContainer.find( 'input' ).val() == '' ) {
				$formContainer.find( '.uixscform-icon-clear' ).css( 'display', 'none' );
				$formContainer.find( 'input' ).val( '' );
				$formContainer.find( '.uixscform-icon-selector-icon-preview' ).html( '' ).removeClass( 'iconshow' );
				$( chooseBtnID ).show();
				$( labeltxtID ).show();
				$( previewID ).hide();

			} else {
				$formContainer.find( '.uixscform-icon-clear' ).css( 'display', 'inline-block' );
				$formContainer.find( '.uixscform-icon-selector-icon-preview' ).html( '<i class="fa fa-'+$formContainer.find( 'input' ).val()+'"></i>' ).show().addClass( 'iconshow' );
				$( chooseBtnID ).hide();
				$( labeltxtID ).hide();
			}

			
			
			/*-- Icon list in new window --*/
			$( document ).on( 'click', chooseBtnID, function( e ) {
				e.preventDefault();
				
				//current modal box ID
				var curmID          = uixscform_curModalID(),
					$socialIcon     = $( '#'+curmID+' .iconslist-box .b:not(.social)' ),
				    $socialTitle    = $( '#'+curmID+' .iconslist-box .uixscform-icon-social-title' )
				
				//console.log( curmID );

				//show sub window (icons)
				$( '#'+curmID+' .iconslist-box' )
					.attr( 'id', listContainerID )
					.addClass( 'active' );
				
				
				//social icons
				if ( $this.hasClass( 'icon-social' ) ) {
					$socialIcon.hide();	
					$socialTitle.hide();		
				} else {
					$socialIcon.show();	
					$socialTitle.show();		
				}
				
			});
			
		

			/*-- Click event for icon type: Font Awesome --*/
			$( document ).on( 'click', '#' + listContainerID + ' .b.fontawesome', function( e ) {
				e.preventDefault();
				var _v = $(this).find( '.fa' ).attr( 'class' );
				
				
				_v = _v.replace( 'fa fa-', '' );
				$( targetID ).val(_v);
				$( previewID ).html( '<i class="fa fa-'+_v+'"></i>' ).show().addClass( 'iconshow' );
				
				//remove button
				$formContainer.find( '.uixscform-icon-clear' ).css( 'display', 'inline-block' );
				$( chooseBtnID ).hide();
				$( labeltxtID ).hide();
				
				
				//remove sub window (icons)
				$( '.uixscform-modal-box .iconslist-box' ).removeAttr( 'id' ).removeClass( 'active' );

				//Dynamic listening for the latest value
				$( targetID ).focus().blur();	
				
				
			});
			
			
			/*-- Click event for icon type: Flaticon --*/
			$( document ).on( 'click', '#' + listContainerID + ' .b.flaticon', function( e ) {
				e.preventDefault();
				var _v = $(this).find( '.flaticon' ).attr( 'class' );
				
				
				_v = _v.replace( 'flaticon ', '' );
				$( targetID ).val(_v);
				$( previewID ).html( '<i class="flaticon '+_v+'"></i>' ).show().addClass( 'iconshow' );
				
				//remove button
				$formContainer.find( '.uixscform-icon-clear' ).css( 'display', 'inline-block' );
				$( chooseBtnID ).hide();
				$( labeltxtID ).hide();
				
				
				//remove sub window (icons)
				$( '.uixscform-modal-box .iconslist-box' ).removeAttr( 'id' ).removeClass( 'active' );

				//Dynamic listening for the latest value
				$( targetID ).focus().blur();	
				
				
			});
			
	
		} );
	
  };
} )( jQuery );



/*! 
 * ************************************
 * Initializes the controls state
 *
 * Valid when opening a window or triggering a clone event
 * @param  {object} form                        - The current form object
 * @return {void}                               - The constructor.
 *
 *************************************
 */	
 ( function( $ ) {
  jQuery.fn.uixscform_init_controls = function( options ) {
		var settings=$.extend( {
			'form' : '',
			
		}
		,options );
		return this.each( function() {

			var $this         = $( this ),
				$obj          = settings.form;

			//Init tinyMCE
			$obj.find( '.uixscform-mce-editor' ).each( function()  {
				$( this ).find( 'textarea.mce' ).val( uixscform_to_controlSaveData_ToHTML( $( this ).find( 'textarea.mce' ).val() ) );	
				uixscform_editorInit( $( this ).find( 'textarea.mce' ).attr( 'id' ) );
			});
			
		
			//Check the status of all form values as "&nbsp;"
			$obj.find( '[data-enter-value]' ).each( function()  {

				if ( $.trim( $( this ).val() ) == '' ) {
					$( this ).val( '' );
				}
				
				//Filter the default value with jQuery Templates plugin
				if ( $.trim( $( this ).val() ).length > 0 ) {
					
					var cur_val      = $( this ).val(),
						pattern_val  = /_tmplitem=".*?"/g,
						matchArr_val = '';

					
					while ( ( matchArr_val = pattern_val.exec( cur_val ) ) ) {
						var _re = new RegExp( '(\\s|)'+matchArr_val[0]+'(\\s|)' , 'g' );
						cur_val = cur_val.replace( _re, '' );
					}	
					
					$( this ).val( cur_val );
				}
				
			});	

			//Traditional Selector
			$obj.find( '.uixscform_btn_trigger-select' ).each( function()  {
				$( this ).uixscform_selectEvent();
			});
		
			//Icon list
			$obj.find( '.uixscform-icon-selector' ).uixscform_iconSelector();

			//Color picker
			$obj.find( '.wp-color-input' ).wpColorPicker();

			//Toggle of unidirectional display
			$obj.find( '.uixscform_btn_trigger-toggleshow' ).each( function()  {
				$( this ).uixscform_toggleEvent( { unidirectionalDisplay: true } );
			});

			//Toggle of switch with checkbox
			$obj.find( '.uixscform_btn_trigger-toggleswitch_checkbox' ).each( function()  {
				$( this ).uixscform_toggleEvent( { unidirectionalDisplay: false } );
			});			

			//Multiple Selector
			$obj.find( '.uixscform_btn_trigger-multradio' ).each( function()  {
				$( this ).uixscform_multipleEvent();
			});	

			//Radio Selector
			$obj.find( '.uixscform_btn_trigger-radio' ).each( function()  {
				$( this ).uixscform_radioEvent();
			});	


			//Normal checkbox status	
			$obj.find( '.uixscform_btn_trigger-normalchk' ).uixscform_normalCheckboxStatus();

			//Insert media status
			$obj.find( '.uixscform_btn_trigger-upload' ).uixscform_mediaStatus();	
			
		
		} );

  };
} )( jQuery );

			


/*! 
 * ************************************
 * Get the real form ID from the associated attribute "data-targetid"
 *
 * Note: Used for controls "toggle", "checkbox", "radio"
 *
 * @param  {string} targetID          - All id of the target control. Like this: uix_pb_???_??, uix_pb_???_??, uix_pb_???_??,
 * @param  {string} curID             - Current control ID. Like this: uix_pb_module_???-null-uix_pb_???_??-null-1
 * @param  {string} obj               - Current control object.
 * @return {string}                   - Converted value matching this (clone) control ID. Note that the prefix has a "#".
                                            Like this: #uix_pb_module_???-null-uix_pb_???_??-null-,
											           #uix_pb_module_???-null-uix_pb_???_??-null-1,
													   #uix_pb_module_???-null-uix_pb_???_??-null-2,
 
 
 *	 
 *************************************
 */	
function uixscform_get_real_ids( targetID, curID, obj ) {
	
	var result = '';
	( function( $ ) {
	"use strict";
		$( function() {
			
			if ( typeof targetID !== typeof undefined && targetID != '' ) {

				targetID = targetID.replace(/,\s*$/, '' );
				targetID = uixscform_filter_control_id( targetID );
				
				

				obj.closest( 'form' ).find( '[id]' ).each( function()  {

					var _fieldID = $( this ).attr( 'id' );

					if ( typeof( _fieldID ) == 'string' && _fieldID.length > 0 ) {

						var ids = targetID.split( ',' );

						for ( var i = 0; i < ids.length; i++ ) {


							if (  
								ids[i] != '' && 
								_fieldID.indexOf( ids[i] ) >= 0 &&
								curID.indexOf( _fieldID ) < 0 
							) {
								

								// Check the value of the attribute "data-targetid" of the already cloned control, 
								// and convert it to the value matching this clone control ID.
								_fieldID = uixscform_to_cloneControl_targetID( curID, _fieldID );

								
								if ( _fieldID != '' ) {
									result += '#' + _fieldID + ',';
								}

							}

						}//end for

					}//end if

				});	
				
				

				result = result.replace(/,\s*$/, '' );

			}	
			

		} );
		
	} ) ( jQuery );
	

	return result;
	

}

	

/*! 
 * ************************************
 * Number formatting
 *************************************
 */	
function uixscform_format_floatval( str ) {
	
	if ( typeof( str ) == 'string' && str.length > 0 ) {
	    return ( !isNaN( parseFloat( str ) ) ) ? parseFloat( str ) : 0;
	} else {
		return str;
	}

}



/*! 
 * ************************************
 * Convert degrees to px 
 *************************************
 */	
function uixscform_format_degToPx( str ) {
	
	if ( typeof( str ) == 'string' || typeof( str ) == 'number' ) {
	    return Math.abs( ( uixscform_format_floatval( str ) * 180 / Math.PI )/2 );
	} else {
		return str;
	}

}



/*!
 * ************************************
 * HTML Encode form textarea and input
 *************************************
 */
function uixscform_format_htmlAttr( str ) {

	if ( typeof( str ) == 'string' && str.length > 0 ) {
		
		//Filters the whitespace and break key
		str = str
			.toString()
		    .replace(/(\r)*\n/g, "{br}" )
			.replace(/\s/g, '{s}' );
		
		
	    return str.replace(/\[|\]|"|&|'|<|>|[\x00-\x20]|[\x7F-\xFF]|[\u0100-\u2700]/g,
                    function($0){
                        var c = $0.charCodeAt(0), r = ["&#"];
                        c = (c == 0x20) ? 0xA0 : c;
                        r.push(c); r.push(";");
                        return r.join("");
                    })
		            //Filters a string cleaned and escaped for output in an HTML attribute.
					.replace(/\&\#34;/g, '&amp;#34;' )
					.replace(/\&\#39;/g, "&amp;#39;" )
		            //Filters a string cleaned and escaped for output in an HTML attribute and WP shortcodes.
					.replace(/\&\#91;/g, "&amp;#91;" )
					.replace(/\&\#93;/g, "&amp;#93;" )
					//Filters a string cleaned and escaped for output in an HTML tags.
					.replace(/\&\#60;/g, '&amp;#60;' )
					.replace(/\&\#62;/g, "&amp;#62;" )
		            //Filters the whitespace
					.replace(/\{s\}/g, '&amp;nbsp;' )
		            //Filters the break key
					.replace(/\{br\}/g, '&amp;#91;br&amp;#93;' );
		
		
	} else {
		return str;
	}
	
};


/*! 
 * ************************************
 * HTML Encode form textarea for source code (<pre>)
 *************************************
 */	
function uixscform_format_sourcecodePre( str ) {
	
	if ( typeof( str ) == 'string' && str.length > 0 ) {
		
		//Filters the whitespace and break key
		str = str
			.toString()
		    .replace(/(\r)*\n/g, "{br}" )
			.replace(/\s/g, '{s}' );
		
		
	    return str.replace(/\[|\]|"|&|'|<|>|[\x00-\x20]|[\x7F-\xFF]|[\u0100-\u2700]/g,
                    function($0){
                        var c = $0.charCodeAt(0), r = ["&#"];
                        c = (c == 0x20) ? 0xA0 : c;
                        r.push(c); r.push(";");
                        return r.join("");
                    })
		            //Filters a string cleaned and escaped for output in an HTML attribute.
					.replace(/\&\#34;/g, '&amp;#34;' )
					.replace(/\&\#39;/g, "&amp;#39;" )
		            //Filters a string cleaned and escaped for output in an HTML attribute and WP shortcodes.
					.replace(/\&\#91;/g, "&amp;#91;" )
					.replace(/\&\#93;/g, "&amp;#93;" )
					//Filters a string cleaned and escaped for output in an HTML tags.
					.replace(/\&\#60;/g, '&amp;#60;' )
					.replace(/\&\#62;/g, "&amp;#62;" )
		            //Filters the whitespace
					.replace(/\{s\}/g, '&amp;nbsp;' )
		            //Filters the break key
					.replace(/\{br\}/g, '&amp;#91;br&amp;#93;' );
		
		
	} else {
		return str;
	} 
};



/*!
 * ************************************
 * Encodes a Uniform Resource Identifier (URI) by replacing each instance of certain characters 
 *************************************
 */
function uixscform_format_urlEncode( str ) {

	var newstr = '';
	if ( typeof( str ) == 'string' && str.length > 0 ) {

		
		var re = new RegExp('^\#');
		
		if ( !re.test( str ) ) {
			if ( str.indexOf( 'http://' ) < 0 && str.indexOf( 'https://' ) < 0 ) {
				newstr =  'http://' + encodeURI( str );
			} else {
				newstr =  encodeURI( str );
			}	
		} else {
			newstr = str;
		}
		

	} else {
		newstr = str;
	}

	
	
	return newstr;
	
};



/*! 
 * ************************************
 * Escape a string of attributes in the shortcode with HTML
 *************************************
 */	
function uixscform_format_shortcodeUsableHtmlToAttr( str ) {
	
	if ( typeof( str ) == 'string' && str.length > 0 ) {
		
	    return str
			   .replace(/(\r)*\n/g, "<br>" )
			   .replace(/'/g, '' )
		       .replace(/"/g, '' )
			   .replace(/<|>/g,
				function($0){
					var c = $0.charCodeAt(0), r = ["&#"];
					c = (c == 0x20) ? 0xA0 : c;
					r.push(c); r.push(";");
					return r.join("");
				})
				//Filters a string cleaned and escaped for output in an HTML tags.
				.replace(/\&\#60;/g, '&amp;#60;' )
				.replace(/\&\#62;/g, "&amp;#62;" )
				//Filters a string cleaned and escaped for output in an HTML attribute and WP shortcodes.
				.replace(/\&\#91;/g, "&amp;#91;" )
				.replace(/\&\#93;/g, "&amp;#93;" );
		
		
	} else {
		return str;
	}

}


/*!
 * ************************************
 * Color transform
 *************************************
 */
function uixscform_format_colorTran( value ) {

	switch( value ) {
		case '#a2bf2f':
		    return 'green';

		  break;
		case '#d59a3e':
		    return 'yellow';

		  break;

		case '#DD514C':
		    return 'red';
		  break;

		case '#FA9ADF':
		    return 'pink';

		  break;

		case '#4BB1CF':
		    return 'blue';
		  break;

		case '#0E90D2':
		    return 'darkblue';
		  break;


		case '#5F9EA0':
		    return 'cadetblue';
		  break;

		case '#473f3f':
		    return 'black';
		  break;


		case '#bebebe':
		    return 'gray';
		  break;
			
		case '#ffffff':
		    return 'white';
		  break;		


		default:

	}

};


/*!
 * ************************************
 * HTML tags like "<li>","<ul>","<ol>" transform
 *************************************
 */
function uixscform_format_html_listTran( str, type ) {


	var newstr = '';

	if ( str != '' ) {

		if( typeof str !== typeof undefined ) {
			str = str.toString()
				     .replace(/(\r)*\n/g, '<br>' )
				     .replace(/\s/g, "&nbsp;"); //step 2
		}

		//Convert an escape white space character
		var re  = /\<([^\>]+)\>/ig;
		if ( re.test( str ) ) {
			str = str.replace( re, function( m ){ return m.replace(/&nbsp;/ig, ' ' ); } );	
		}
		
		var re2 = new RegExp( "\<" + type + "\>" , 'g' ),
			re3 = new RegExp( "\<\/" + type + "\>" , 'g' );

		str = str.replace( re2, '['+type+']' )
			     .replace( re3, '[/'+type+']' );

		

		if ( str.indexOf( '<br>' ) >= 0 ) {

			var strarr = str.split( '<br>' );

			for (var i = 0; i < strarr.length; i++ ) {

				if ( strarr[i].indexOf( '['+type+']' ) >= 0 ) {
					newstr += strarr[i];
				} else {
					newstr += '['+type+']'+strarr[i]+'[/'+type+']';
				}


			}

		} else {

			if ( str.indexOf( '['+type+']' ) >= 0 ) {
				newstr = str;
			} else {
				newstr = '['+type+']'+str+'[/'+type+']';
			}

		}


	}
	
	var re4  = new RegExp( "\\["+type+"\\]\\[\\/"+type+"\\]" , 'g' );
	newstr = newstr.replace( re4, '' );
	
	
	//Special character filter to avoid conflicts with JSON template data
	newstr = newstr
				.replace(/\[/g, '&#91;')
				.replace(/\]/g, '&#93;');
	
	
	return newstr;

};



/*!
 * ************************************
 * Format the value of a form control for the specified type
 *************************************
 */
function uixscform_value_callback( str, type ) {

	var newstr = '';
	if ( typeof( str ) == 'string' && str.length > 0 ) {

		switch( type ) {	
			case 'url':
				newstr  = uixscform_format_urlEncode( str );

			  break;
			case 'attr':
				newstr  = uixscform_format_htmlAttr( str );

			  break;
			
			case 'slug':
				newstr  = uixscform_format_slug( str );

			  break;
			case 'html':
				newstr  = uixscform_format_text_entering( str );

			  break;

			case 'number':
				newstr  = uixscform_format_floatval( str );

			  break;
				
			case 'number-deg_px':
				newstr  = uixscform_format_degToPx( str );

			  break;	
				
			case 'html-shortcode':
				newstr  = uixscform_format_shortcodeUsableHtmlToAttr( str );

			  break;

			case 'color-name':
				newstr  = uixscform_format_colorTran( str );

			  break;	  


			case 'list':
				newstr  = uixscform_format_html_listTran( str, 'li' );

			  break;  
				
			case 'source-code':
				newstr  = uixscform_format_sourcecodePre( str );

			  break;	
				
			default:
				newstr  = uixscform_format_text_entering( str );
				

		}
		
	} else {
		newstr = str;
	}
	
	return newstr;
	

};


/*!
 * ************************************
 * HTML5 Range
 *************************************
 */
function uixscform_rangeSlider(sliderid, outputid, cusunits) {
        var x = document.getElementById( sliderid ).value;
		document.getElementById( outputid ).innerHTML = x + cusunits;

};




/*!
 * ************************************
 * Insert shortcode
 *************************************
 */
function uixscform_insertCodes( code, conid ) {
	
	( function( $ ) {
	"use strict";
		$( function() {
			if ( conid == 'content' ) {
				wp.media.editor.insert( code );
			} else {

				$( '#' + conid ).val( $( '#' + conid ).val() + uixscform_insertToTextarea( code ) );

				//Dynamic listening for the latest value
				$( '#' + conid ).focus().trigger( 'change' );
			}
			
		} );

	} ) ( jQuery );

};

/*! 
 * ************************************
 * Insert value to textarea
 *************************************
 */	
function uixscform_insertToTextarea( s ) {
      return (typeof s != "string") ? s :  
          s.replace(/<br\s*[\/]?>/gi, '\n' );
};




/*!
 * ************************************
 * Decodes an encoded string.
 *
 * Used when using jQuery to read textarea
 *
 *
 * @param  {string}   str           - A string.
 * @return {string}                 - A new string.
 *	 
 *************************************
 */	
function uixscform_format_text_decode( str ){
	
	var newstr = '';
	if ( typeof( str ) == 'string' && str.length > 0 ) {
	
		newstr  = str
					.replace(/&quot;/g, '"')
					.replace(/&#39;/g, "'")
					.replace(/&lt;/g, '<')
					.replace(/&gt;/g, '>')
					.replace(/\&amp;\#60;/g, '&lt;' )
					.replace(/\&amp;\#62;/g, "&gt;" );
		
		
		//Unescaped source code
		var re  = /\<pre.*?\>([^\>]+)\<\/pre\>/ig;
		if ( re.test( newstr ) ) {
			
			newstr = newstr.replace( re, function( m ){ 
				return m
					.replace(/\&amp;nbsp;/g, "&nbsp;" )
					.replace( /\&amp;\#/g, "&#" )
					.replace(/\&\#91;br\&\#93;/g, "<br>" );
			} );	
		}


	}
	
	return newstr;
	

}




/*!
 * ************************************
 * Shortcodes textarea and input format when you are entering
 *
 * Before saving HTML code (include shortcode) of <textarea> tag for a single module.
 *
 *************************************
 */
function uixscform_format_text_entering( str ){
	
	
	if( typeof str !== typeof undefined ) {
	
		str = str.toString()
				.replace(/\&\#91;/g, '[')    //step 1
				.replace(/\&\#93;/g, ']')    //step 2
				.replace(/(\r)*\n/g, "<br>" ) //step 3    
				.replace(/\s/g, "&nbsp;" );    //step 4
		

		
		//Convert an escape white space charact
		var re  = /\<([^\>]+)\>/ig,
			re2 = /\[([^\]]+)\]/ig;

		if ( re.test( str ) ) {
			str = str.replace( re, function( m ){ return m.replace(/&nbsp;/ig, ' ' ); } );	
		}
		if ( re2.test( str ) ) {
			str = str.replace( re2, function( m ){ return m.replace(/&nbsp;/ig, ' ' ); } );	
		}	
		
		str = str.replace(/\"/g, '&quot;' )
			     .replace(/\'/g, '&apos;' )
				 .replace(/<br\w*\/*>/g,"[br]")
				 .replace(/<p>/g,"[p]")
				 .replace(/<\/p>/g,"[\/p]");
		
		
		//Special character filter to avoid conflicts with JSON template data
		str = str
			.replace(/\[/g, '&#91;')
			.replace(/\]/g, '&#93;');
		


		
		
	}

	return str;
}



/*!
 * ************************************
 * Determine if the per module content contains WP shortcode
 *
 * Filter shortcodes of each column widget HTML code through their hooks.
 * Discard the rendering of separated module when the module contains these WP shortcodes, "*" represents a wildcard.
 *
 *************************************
 */
function uixscform_per_module_has_shortcode( str ){
	
	var hasShortcode = false;
		
	if( typeof str !== typeof undefined ) {
	
		var re  = /\[([^\]]+)\]/ig;
		if ( re.test( str ) ) {
			hasShortcode = true;
		}

	}

	return hasShortcode;

}



/*! 
 * ************************************
 * Returns current modal box ID
 *************************************
 */	
function uixscform_curModalID() {
	var result = '';
	( function( $ ) {
	"use strict";
		$( function() {
			
			$( '.uixscform-modal-box' ).each( function()  {
				if ( $( this ).css( 'display' ) != 'none' ) {
					result = $( this ).attr( 'id' )
					return false;
				}
			});	

		} );
		
	} ) ( jQuery );
	
	return result;
};

/*! 
 * ************************************
 * Generate human-readable url slugs from any ordinary string.
 *************************************
 */	
function uixscform_format_slug( str ) {
	if ( typeof( str ) == 'string' && str.length > 0 ) {
		return str
			    .toString()
				.replace(/[^\w\s\-！￥【】\u4e00-\u9eff]/gi, '')
				.replace(/\s/g, '-')
				.replace(/(\-){2,}/g, '-')
				.replace(/\-\s*$/, '' )
				.toLowerCase();

	} else {
		return '';
	}
}




/*! 
 * ************************************
 * Check if a string is a valid JSON string
 *
 * Note: Used when certain functions use "JSON.parse"
 *
 *************************************
 */		
function uixscform_isJSON( str ){
	if ( typeof( str ) == 'string' && str.length > 0 ) {
		
		if ( str.replace( /\"\"/g, '' ).replace( /\,/g, '' ) == '[{}]' ) {
			return false;
		} else {
		
			if (/^[\],:{}\s]*$/.test( str.replace(/\\["\\\/bfnrtu]/g, '@' ).
			replace(/"[^"\\\n\r]*"|true|false|null|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?/g, ']').
			replace(/(?:^|:|,)(?:\s*\[)+/g, ''))) {

				return true;

			}else{

				return false;

			}	
			
		}
		
	} else {
		return false;
	}
	
	
	
	

}

		

/*! 
 * ************************************
 * Initialize editor
 *************************************
 */	
/**
 * Based on "code" plugin
 *
 * Released under LGPL License.
 * Copyright (c) 1999-2015 Ephox Corp. All rights reserved
 *
 * License: http://www.tinymce.com/license
 * Contributing: http://www.tinymce.com/contributing
 */
( function( $ ) {
"use strict";
    $( function() {

		
		if ( typeof(tinymce) !== 'undefined' ) {
			
			tinymce.PluginManager.add('customCode', function(editor) {
				function showDialog() {
					var win = editor.windowManager.open({
						title: "Source code",
						body: {
							type: 'textbox',
							name: 'customCode',
							multiline: true,
							minWidth: editor.getParam("code_dialog_width", 600),
							minHeight: editor.getParam("code_dialog_height", Math.min(tinymce.DOM.getViewPort().h - 200, 500)),
							spellcheck: false,
							style: 'direction: ltr; text-align: left'
						},
						onSubmit: function(e) {
							// We get a lovely "Wrong document" error in IE 11 if we
							// don't move the focus to the editor before creating an undo
							// transation since it tries to make a bookmark for the current selection
							editor.focus();

							if(editor.readonly != true){
								editor.undoManager.transact(function() {
									editor.setContent(e.data.customCode);
								});
							}

							editor.selection.setCursorLocation();
							editor.nodeChanged();

						}
					});


					// Gecko has a major performance issue with textarea
					// contents so we need to set it when all reflows are done
					win.find('#customCode').value(editor.getContent({source_view: true}));

					//disable source code editing while in readonly mode
					if(editor.readonly){
						var id = win.find('#customCode')[0]._id;
						$(win.find('#customCode')[0]._elmCache[id]).prop('readonly', true);
					}

					//This was an attempt to disable the "save" button but nothing I've tried is working. 
					//So far we are good because the user cannot modify the source code anyway
					/*for (var property in win.find('#code')[0].rootControl.controlIdLookup) {
						if (win.find('#code')[0].rootControl.controlIdLookup.hasOwnProperty(property)) {
							var realProperty = win.find('#code')[0].rootControl.controlIdLookup[property];
							var element = $($(realProperty._elmCache[realProperty._id])[0].children[0]);
							if(element.prop('type') == 'button'){
								$(element).prop('disabled', true);
								console.log(element.attr('disabled'));
								console.log(element.prop('disabled'));
							}
						}
					}*/
				}

				editor.addCommand("mceCustomCodeEditor", showDialog);

				editor.addButton('customCode', {
					icon: 'code',
					tooltip: 'Source code',
					onclick: showDialog,
					classes:'customCode'
				});

				editor.addMenuItem('customCode', {
					icon: 'code',
					text: 'Source code',
					context: 'tools',
					onclick: showDialog
				});
			});	
			
		}



	} );
    
    
} ) ( jQuery );


function uixscform_editorInit( id ){
	( function( $ ) {
	"use strict";
		$( function() {
			
            if( typeof id !== typeof undefined ) {
				
				var vid     = id.toString().replace( '-editor', '' ),
					$sync   = $( 'textarea#' + vid ),
					editorH = $sync.data( 'editor-height' );
		
		
				tinyMCE.execCommand( 'mceRemoveEditor', true, id );
				tinymce.init({
					//tinyMCE Image Displaying Correctly, but not Updating src
					relative_urls : false,
					content_css : '',
					convert_urls : false,
					media_live_embeds: true,
					//---
					selector:  'textarea#' + id,
					height : editorH,
					menubar: false,
					plugins: 'textcolor image media hr customCode colorpicker',		
				    toolbar: 'undo redo removeformat  | forecolor backcolor styleselect | uixsc_link uixsc_unlink bold italic | bullist numlist outdent indent alignleft aligncenter alignright | hr uixsc_image media customCode',
					setup:function( ed ) {
						
						
					
					   //Avoid formatting all contents of <textarea> 
					   $sync.addClass( 'mce-sync' );
						
					   ed.on( 'change', function(e) {
						   
						   
						   //Dynamically filter content in TinyMCE
						   var newvalue = ed.getContent()
						                                 .replace(/\r?\n/gm, '' )
						                                 .replace(/\.\.\/wp-content\/uploads\//g, uix_shortcodes_wp_plugin.upload_dir_url );
						  
						   
						   $sync.val( newvalue ).trigger( 'change' );
						   
						   
					   });
						
                        //Add media button
						function uixsc_mce_insertImage() {
							var upload_frame;
							if( upload_frame ){
								upload_frame.open();
								return;
							}
							upload_frame = wp.media( {
								title: uix_shortcodes_wp_plugin.lang_media_title,
								button: {
								text: uix_shortcodes_wp_plugin.lang_media_text,
							},
								multiple: false
							} );
							upload_frame.on( 'select',function() {
								var attachment;
								attachment = upload_frame.state().get( 'selection' ).first().toJSON();
								ed.insertContent( '<img src="'+attachment.url+'" alt="">' );

								
							} );

							upload_frame.open();
							
						}

						ed.addButton( 'uixsc_image', {
						  icon: 'mce-ico mce-i-image',
						  tooltip: uix_shortcodes_wp_plugin.lang_mce_image,
						  onclick: uixsc_mce_insertImage
						});
						
						
						// Add link button
						ed.addButton('uixsc_link', {
							icon: 'mce-ico mce-i-link',
							tooltip: uix_shortcodes_wp_plugin.lang_mce_link_title,
							onclick: function (e) {
								
								var urlRegex     = /<a href="(.*?)"/g,
									urlMatch     = '',
									selectedtxt  = ed.selection.getContent(),
									curlabel     = selectedtxt.replace(/<a\b[^>]*>/i, '' ).replace(/<\/a>/i, '' ),
									curlinkURL   = '';
								
								while( urlMatch = urlRegex.exec( selectedtxt ) ){
									curlinkURL = urlMatch[1];
								}	

								ed.windowManager.open( {
									title: uix_shortcodes_wp_plugin.lang_mce_link_title,
									body: [
									{
										type: 'textbox',
										label: uix_shortcodes_wp_plugin.lang_mce_link_field_url,
										name: 'link_url',
										value: curlinkURL,
										placeholder: 'https://',
										multiline: true,
										minWidth: 500,
										minHeight: 30,
									},
									{
										type: 'textbox',
										label: uix_shortcodes_wp_plugin.lang_mce_link_field_text,
										name: 'link_text',
										value: curlabel,
										multiline: true,
										minWidth: 500,
										minHeight: 30,
									},	   
										
									{
										type: 'checkbox',
										name: 'link_target',
										label: ' ',
										text: ' ' + uix_shortcodes_wp_plugin.lang_mce_link_field_win,
									},
				
										
									],
									onsubmit: function( e ) {
										
										var curtxt      = ( e.data.link_text != '' ) ? e.data.link_text : e.data.link_url,
											target      = ( e.data.link_target ) ? 'target="_blank"' : '';
										
										ed.insertContent( '<a href="' + e.data.link_url + '" ' + target + '>' + curtxt + '</a>');
									}
								});
							}
						});
						
						
						//Delete link button
						ed.addButton('uixsc_unlink', {
							icon: 'mce-ico mce-i-unlink',
							tooltip: uix_shortcodes_wp_plugin.lang_mce_unlink_title,
							onclick: function (e) {
								
								var selectedtxt  = ed.selection.getContent();
								selectedtxt = selectedtxt.replace(/<a\b[^>]*>/i, '' ).replace(/<\/a>/i, '' );
								ed.insertContent(  selectedtxt );
								
							}
						});

						
				   },
				  content_css: [
					uix_shortcodes_wp_plugin.url + 'css/uixscform.editor.css'
				  ]
				});	
			}
			

		} );
		
	} ) ( jQuery );
	

}



/*! 
 * ************************************
 * Display categories on page
 *
 * @param  {string} arr               - HTML code.
 * @param  {string} classprefix       - A string.
 * @return {string}                   - HTML code.
 *	 
 *************************************
 */	
function uixscform_catlist( str, classprefix ) {
	
	var result = '';
	if ( typeof( str ) == 'string' && str.length > 0 ) {

		var re      = new RegExp("(.*?)\<\/div\>","gim"),
			v       = '<div class="'+classprefix+'type">',
			re      = new RegExp("" + v + "(.*?)\<\/div\>","gim"),
			arr     = [];


		str.replace( re, function(s, match) {
			
			   match = match
				   .replace(/\&lt;/g, '')
				   .replace(/\&gt;/g, '')
				   .replace(/\&amp;/g, '');
			
			   arr.push(match);
			  });	


		//Remove Duplicates from JavaScript Array
		var uniqueArr = [];
		uniqueArr = arr.filter(function(item, pos, self) {
			return self.indexOf(item) == pos;
		});


		//Output
		var newArr = uniqueArr;
		for( var j = 0; j < newArr.length; j++ ) {
			result += '<li><a href="javascript:" data-group="'+uixscform_format_slug( newArr[j] )+'">'+newArr[j]+'</a></li>';
		}

	}
	
	return result;
	

}



/*!
 * ************************************
 * Check the value of the attribute "data-targetid" of the already cloned control, 
 * and convert it to the value matching this clone control ID.
 *
 * @param  {string} curControlID      - Current clone control ID. Like this: uix_pb_module_???-null-uix_pb_???_??-null-1
 * @param  {string} targetObjID       - The value of the attribute "data-targetid" of the already cloned field. 
                                            Like this: uix_pb_module_???-null-uix_pb_???_??-null-
											           uix_pb_module_???-null-uix_pb_???_??-null-1
													   uix_pb_module_???-null-uix_pb_???_??-null-2
									
 * @param  {number}   indexNum      - A default number.
 * @return {string}                 - A new string.
 *	
 *************************************
 */
function uixscform_to_cloneControl_targetID( curControlID, targetObjID, indexNum ) {

	var newTargetID  = '';
	if ( typeof( curControlID ) == 'string' && curControlID.length > 0 ) {
	
		var realID    = curControlID,
			newID     = '',
			oldIndex  = '',
			reIndex   = realID.match(/-null(-|-\d+)(?=[^(-|-\d+)]*$)/);

	
		if ( reIndex ) {
		
			oldIndex = reIndex[0];

			//Use the specified number instead of the automatic fetch
			if ( typeof indexNum !== typeof undefined && indexNum != '' && Number.isInteger( indexNum ) ) {
			    oldIndex = indexNum;
			}
			

			var oldTargetID    = targetObjID,
				re            = /-null(-|-\d+)(?=[^(-|-\d+)]*$)/,
				reTargetIndex = oldTargetID.match( re );

			if ( reTargetIndex ) {
				newTargetID = oldTargetID.replace( re, oldIndex );
			}

		}
	}
	
	return newTargetID;
	

		
}



/*!
 * ************************************
 * Clone Character Conversions: Template JSON data key converted to usable
 *
 * @param  {string} str             - A string. Like this:  uix_pb_???_??2__fieldID  or uix_pb_???_??3__fieldVal
 * @return {string}                 - A new string.  Like this:  uix_pb_???_??__fieldID  or uix_pb_???_??__fieldVal
 *	
 *************************************
 */
function uixscform_to_cloneControlKey_ToSave( str ) {

	if ( typeof( str ) == 'string' && str.length > 0 ) {

		return str
				.replace(/\d+__fieldID(?=[^\d+__fieldID]*$)/, '__fieldID' )
				.replace(/\d+__fieldVal(?=[^\d+__fieldVal]*$)/, '__fieldVal' );	
	
	} else {
		return str;
	}
	
		
}


/*!
 * ************************************
 * Check whether the template JSON data key contains a loop index
 *
 * @param  {string} str             - A string. Like this:  uix_pb_???_??2__fieldID  or uix_pb_???_??3__fieldVal
 * @return {string}                 - A new string.  Like this:  uix_pb_???_??__fieldID  or uix_pb_???_??__fieldVal
 *	
 *************************************
 */
function uixscform_to_cloneControlKey_notLoopIndex( str ) {

	
	if ( typeof( str ) == 'string' && str.length > 0 ) {
		
		if ( 
			! /\d+__fieldID(?=[^\d+__fieldID]*$)/.test( str ) && 
			! /\d+__fieldVal(?=[^\d+__fieldVal]*$)/.test( str ) 
		) {
			return true;
		} else {
			return false;
		}
	
	}
	
		
}


/*!
 * ************************************
 * Clone Character Conversions: Control ID of JSON data value converted to usable ID
 *
 * @param  {string} str             - A string. Like this:  uix_pb_module_???-null-uix_pb_???_??-null-1
 * @param  {string} sectionID       - The section ID. (Obtained via gridster widget ID.)
 * @return {string}                 - A new string.  Like this:  uix_pb_module_???-null-uix_pb_???_??-null-
 *	
 *************************************
 */
function uixscform_to_cloneControlValueID_ToVar( str, sectionID ) {

	var newstr = '';
	if ( typeof( str ) == 'string' && str.length > 0 ) {
	
		
		var re = new RegExp( "-" + sectionID + "-\\d+" , 'g' );
	    newstr = str.replace( re, '-' + sectionID + '-' );
		
	}
	
	return newstr;
		
}


/*!
 * ************************************
 * Format all contents of <textarea> when you will save or display data
 *
 * Determine if the per module content contains "MCE Sync Data" and "Per Module HTML Data"
 *
 * @param  {object}   obj           - An object.
 * @param  {string}   val           - A default string.
 * @return {string}                 - New HTML code.
 *	 
 *************************************
 */
function uixscform_format_textarea( obj, val ){

	var newstr = '';
	
	if( typeof obj !== typeof undefined ) {
	    
		var value        = ( typeof val !== typeof undefined && val != '' ) ? val : obj.val();

		if ( value != '' ) {
			
			//Exclude data that the HTML editor synchronizes
			if ( ! obj.hasClass( 'mce-sync' ) ) {

				newstr = uixscform_to_controlSaveData_ToHTML( value );

			}	
		}

	}

	return newstr;
}



/*! 
 * ************************************
 * Convert the HTML code of JSON data (saved) to renderable HTML code
 *
 * @param  {string}   str           - A string that contains HTML code.
 * @return {string}                 - New renderable HTML code.
 *	 
 *************************************
 */	
function uixscform_to_controlSaveData_ToHTML( str ) {

	var newstr = '';
	if ( typeof( str ) == 'string' && str.length > 0 ) {
	
		newstr  = uixscform_format_text_decode( str );
		

	}
	
	return newstr;
		

}


/*! 
 * ************************************
 * Format the array to JSON in order to variables of templates
 *
 * @param  {array}   arr            - An array containing key names and key values
 * @param  {boolean} json           - If true, returns an array of strings
 * @param  {boolean} renderFrontend - If true, use the front-end template processing method
 * @return {string}                 - The JSON format string.
 *	 
 *************************************
 */	
function uixscform_arr_to_tempjson( arr, json, renderFrontend ) {
	
	var jsondata      = '',
		jsondata_arr  = [],
		old_cloneKey  = '',
		new_cloneKey  = '',
		old_clone_con = '',
		new_clone_con = '';
	
	if( typeof arr !== typeof undefined ) {
	
		
		jsondata = JSON.stringify( arr )
									//remove the first "[" and the last "]"
									.replace(/^\[?|\]?$/g, '' );

		
		//Convert content commas to avoid cloning errors
		var pattern_con = /:".*?"/g;
		if ( pattern_con.test( jsondata ) ) {
			jsondata = jsondata.replace( pattern_con, function( m ){ return m.replace(/,/g, '#comma#' ); } );	
		}
		
	
		//Extract the key values of the clone form
		var pattern_con2 = /:\[(.*?)\]/g;
		if ( pattern_con2.test( jsondata ) ) {
			jsondata = jsondata.replace( pattern_con2, function( m ){ return m.replace(/},{/g, '#boundary#' ); } );	
		}
		
		
		//Use the front-end template processing method
		if ( typeof renderFrontend !== typeof undefined && renderFrontend ) {
			jsondata = jsondata.replace(/_triggerclonelist__fieldID/g, '_triggerclonelist' )
			                   .replace(/__fieldVal/g, '' );	
		}
		
		
		
		jsondata     = jsondata
							.replace(/},{/g, ',' )
							.replace(/\#boundary\#/g, '},{' )
			                //remove the first "{" and the last "}"
							.replace(/^\{?|\}?$/g, '' );
	
		

		if ( typeof json !== typeof undefined && json ) {
			
			var _jsondata = jsondata.split( ',' );
			for ( var i = 0; i < _jsondata.length; i++ ) {
				jsondata_arr.push( _jsondata[i].replace(/\#comma\#/g, ',' ) );

			}
			
			jsondata = jsondata_arr;
	
		} else {
			jsondata = '[{' + jsondata + '}]';	
			jsondata     = jsondata.replace(/\#comma\#/g, ',' );
		}
		

	}

	return jsondata;


}


/*! 
 * ************************************
 * Convert a valid variable ID for controls
 *
 *
 * @param  {string} str             - A string. Like this:  uix_pb_???_??__fieldID  or uix_pb_???_??__fieldVal
 * @param  {string} tempID          - Form of module ID.
 * @param  {string} sectionID       - The section ID. (Obtained via gridster widget ID.)
 * @param  {string} colID           - The column ID of each module. Like this: null
 * @return {string}                 - A new string. Like this: uix_pb_module_???-null-uix_pb_???_??-null-
 *	
 *	 
 *************************************
 */	
function uixscform_to_controlID_ToVar( str, tempID, sectionID, colID ) {
	
	var newstr = '';
	if ( typeof( str ) == 'string' && str.length > 0 ) {
		
		var field_name = str.replace( '__fieldID', '' ).replace( '__fieldVal', '' );
		
		newstr  = tempID + '-' + colID + '-' + field_name + '-' + sectionID + '-';
		newstr  = newstr
			            .replace( '---', '----' )
						.replace(/\[/g, '' )
						.replace(/\]/g, '' )
		

	}
	
	return newstr;
		
}




/*! 
 * ************************************
 * Obtain the clone of the object to determine its existence
 *
 *
 * @param  {string} str             - The final JSON data
 * @return {boolean}                - Returns a Boolean value to determine if clone data exists.
 *	
 *	 
 *************************************
 */	
function uixscform_clonedata_exists( str ) {
	
	var obj = '';
	if ( uixscform_isJSON( str ) ) {
		obj = JSON.stringify( str );
	}
	
	if ( typeof( str ) == 'string' && str.length > 0 ) {
		obj = str;
	}
	
	if ( obj.indexOf( '_triggerclonelist' ) >= 0 ) {
		return true;
	} else {
		return false;
	}
	
		
}


/*! 
 * ************************************
 * Convert the JSON data (saved) ID to a control name
 *
 *
 * @param  {string} str             - A string. Like this:  uix_pb_module_???|[null][uix_pb_???_??][null]
 * @param  {string} tempID          - Form of module ID.
 * @param  {string} sectionID       - The section ID. (Obtained via gridster widget ID.)
 * @param  {string} colID           - The column ID of each module. Like this: null
 * @return {string}                 - A new string. Like this: uix_pb_???_??
 *	
 *	 
 *************************************
 */	
function uixscform_to_controlSaveID_ToName( str, tempID, sectionID, colID ) {
	
	var newstr = '';
	if ( typeof( str ) == 'string' && str.length > 0 ) {
	
	    newstr = str
				 .replace( tempID + '|', '' )
				 .replace( '[' + sectionID + ']', '' )
				 .replace( '[' + colID + ']', '' )
				 .replace( '[', '' )
				 .replace( ']', '' );
	

	}
	
	return newstr;
		
}



/*! 
 * ************************************
 * Convert the valid variable ID to a control name
 *
 *
 * @param  {string} str             - A string. Like this: uix_pb_module_???-null-uix_pb_???_??-null-
 * @return {string}                 - A new string. Like this: uix_pb_???_??
 *	
 *	 
 *************************************
 */	
function uixscform_to_controlVarID_ToName( str ) {
	
	var newstr = '';
	if ( typeof( str ) == 'string' && str.length > 0 ) {
	
		var reName = str.match(/.*-null-(.*)-null-.*/);
		if ( reName ) {
			newstr = reName[1];
			
		}
	

	}
	
	return newstr;
		
}


/*! 
 * ************************************
 * Convert a control name to a valid variable ID for controls
 *
 *
 * @param  {string} str             - A string. Like this:  uix_pb_???_??
 * @param  {string} tempID          - Form of module ID.
 * @param  {string} sectionID       - The section ID. (Obtained via gridster widget ID.)
 * @param  {string} colID           - The column ID of each module. Like this: null
 * @return {string}                 - A new string. Like this: uix_pb_module_???-null-uix_pb_???_??-null-
 *	
 *
 *************************************
 */	
function uixscform_to_controlName_ToVar( str, tempID, sectionID, colID ) {
	
	var newstr = '';
	if ( typeof( str ) == 'string' && str.length > 0 ) {
		
		var _colID = colID.replace( '---', '----' );
		newstr = tempID + '-' + _colID + '-' + str + '-' + sectionID + '-';
	}
	
	return newstr;
		
}


/*! 
 * ************************************
 * Convert the JSON data (saved) ID to a valid variable ID for controls
 *
 *
 * @param  {string} str             - A string. Like this:  uix_pb_module_???|[null][uix_pb_???_??][null]
 * @param  {string} sectionID       - The section ID. (Obtained via gridster widget ID.)
 * @return {string}                 - A new string. Like this: uix_pb_module_???-null-uix_pb_???_??-null-
 *	
 *	 
 *************************************
 */	
function uixscform_to_controlSaveID_ToVar( str, sectionID ) {
	
	var newstr = '';
	if ( typeof( str ) == 'string' && str.length > 0 ) {
	
		var re = new RegExp( sectionID , 'g' );
	    newstr = str
			       .replace( re, '|' + sectionID + '|' )
			       .replace(/\|/g, '-')
				   .replace(/\[/g, '' )
			       .replace(/\]/g, '' );
		

	}
	
	return newstr;
		
}


/*! 
 * ************************************
 * Convert a control ID to a new ID for JSON data (saved)
 *
 *
 * @param  {string} str             - A string. Like this:  uix_pb_???_?? 
 * @param  {string} tempID          - Form of module ID.
 * @param  {string} sectionID       - The section ID. (Obtained via gridster widget ID.)
 * @param  {string} colID           - The column ID of each module. Like this: null
 * @return {string}                 - A new string. Like this: uix_pb_module_???|[null][uix_pb_???_??][null]
 *	
 *	 
 *************************************
 */	
function uixscform_to_controlName_fieldSaveID( str, tempID, sectionID, colID ) {
	
	var newstr = '';
	if ( typeof( str ) == 'string' && str.length > 0 ) {
	
		newstr = tempID + '|[' + colID + '][' + str + '][' + sectionID + ']';
	}
	
	return newstr;
		
}


/*! 
 * ************************************
 * Convert the JSON data (saved) ID to be saved
 *
 *
 * @param  {string} str             - A string. Like this:  uix_pb_module_???-null-uix_pb_???_??-null-
 * @param  {string} tempID          - Form of module ID.
 * @param  {string} sectionID       - The section ID. (Obtained via gridster widget ID.)
 * @param  {string} colID           - The column ID of each module. Like this: null
 * @return {string}                 - A new string. Like this: uix_pb_module_???|[null][uix_pb_???_??][null]
 *	
 *	 
 *************************************
 */	
function uixscform_to_controlID_ToSave( str, tempID, sectionID, colID ) {
	
	if ( typeof( str ) == 'string' && str.length > 0 ) {
	
		return str
				 .replace( tempID + '-' + _colID + '-' , tempID + '|[' + colID + '][' )
				 .replace( '-'+sectionID+'-', ']['+sectionID+']' );

	} else {
		return str;
	}
		
}


/*! 
 * ************************************
 * Check if the control ID is valid if it is not valid automatically
 *
 * @param  {string}  str          - A string. Like this: uix_pb_???_??
 * @param  {boolean} reverse      - If true, the converted English letter is used to restore the original form identifier.
 * @return {string}               - A new string.
 * 
 *************************************
 */	
function uixscform_filter_control_id( str, reverse ) {
	
	var newstr = str;
	if ( typeof( str ) == 'string' && str.length > 0 ) {
		
		if ( str.indexOf( '_listitem' ) >= 0 ) {
			newstr = newstr.replace(/0/g, 'Ⅰ' )
			.replace(/1/g, 'Ⅱ' )
			.replace(/2/g, 'Ⅲ' )
			.replace(/3/g, 'Ⅳ' )
			.replace(/4/g, 'Ⅴ' )
			.replace(/5/g, 'Ⅵ' )
			.replace(/6/g, 'Ⅶ' )
			.replace(/7/g, 'Ⅷ' )
			.replace(/8/g, 'Ⅸ' )
			.replace(/9/g, 'Ⅹ' );
			
			
			if ( typeof reverse !== typeof undefined && reverse ) {
				
				newstr = newstr.replace(/Ⅰ/g, '0' )
				.replace(/Ⅱ/g, '1' )
				.replace(/Ⅲ/g, '2' )
				.replace(/Ⅳ/g, '3' )
				.replace(/Ⅴ/g, '4' )
				.replace(/Ⅵ/g, '5' )
				.replace(/Ⅶ/g, '6' )
				.replace(/Ⅷ/g, '7' )
				.replace(/Ⅸ/g, '8' )
				.replace(/Ⅹ/g, '9' );	
				
			}
			
			
			
		}

	
	}
	return newstr;
		
}


/*! 
 * ************************************
 * Returns the JSON result value of the module template for front-end rendering
 * Convert the english letter to the original form identifier.
 *
 * @param  {string}  str          - A JSON string.
 * @return {string}               - A new JSON string.
 * 
 *************************************
 */	
function uixscform_module_form_JsonResult_frontend( str ) {
	
	var newstr = str;
	if ( typeof( str ) == 'string' && str.length > 0 ) {
		
		var pattern_id = /".*?"\:/g;
		if ( pattern_id.test( newstr ) ) {
			newstr = newstr.replace( pattern_id, function( m ){ return uixscform_filter_control_id( m, true ); } );	
		}
	
	}
	return newstr;
		
}


/*! 
 * ************************************
 * Special character filter to avoid conflicts with JSON template data
 *
 * @param  {string} str                  - A string.
 * @return {string}                      - A new string.
 *	 
 *************************************
 */	
function uixscform_filter_control_val( str ) {

	var newstr = str;
	if ( typeof( str ) == 'string' && str.length > 0 ) {
		
		newstr = newstr
					.replace(/\$/g, '&#36;' )
					.replace(/\[/g, '&#91;')
					.replace(/\]/g, '&#93;');
			
	
	}
	return newstr;
	
}




/*! 
 * ************************************
 * Returns the keys of the module template.
 *
 * @param  {string} str             - HTML code.
 * @return {array}                  - An array of strings.
 *	 
 *************************************
 */	
function uixscform_module_form_keys( str ) {
	
	var result = [];
	if ( typeof( str ) == 'string' && str.length > 0 ) {
		
		
		var re      = new RegExp("\\${(.*?)}","gim"),
			arr     = [],
			result  = [];


		str.replace( re, function(s, match) {
			   arr.push(match);
			  });	



		//Remove Duplicates from JavaScript Array
		var uniqueArr = [];
		uniqueArr = arr.filter(function(item, pos, self) {
			return self.indexOf(item) == pos;
		});

		//Output
		var newArr = uniqueArr;
		for( var j = 0; j < newArr.length; j++ ) {
			result.push( uixscform_filter_control_id( newArr[j] ) );
		}


	}

	
	
	return result;
	
	
}




/*! 
 * ************************************
 * Returns the total number of clone group index.
 *
 * @param  {array} beforeArr             - Unformatted clone group.
 * @param  {number} groupTotal           - The total number of each clone group
 * @param  {number} beforeGroupTotal     - The total number of default clone controls (excluding clone groups)
 * @return {number}                      - A number.
 *	 
 *************************************
 */	
function uixscform_cloned_groupIndexTotal( beforeArr, groupTotal, beforeGroupTotal ) {
	
	var result = 0;

	if( Object.prototype.toString.call( beforeArr ) === '[object Array]' ) {

		for( var i = 0; i < beforeArr.length; i++ ) {

			if ( 
				(i+1) % beforeGroupTotal == 0 && 
				(i+1) < groupTotal
			) {
				result++;
			}	
		}	
	}

	
	return result;
	
	
}



/*! 
 * ************************************
 * Returns the group string that has been cloned
 *
 * @param  {string} sectionID            - The section ID. (Obtained via gridster widget ID.)
 * @param  {array} beforeArr             - Unformatted clone group.
 * @param  {array} newControlsArr        - New controls.
 * @param  {number} groupTotal           - The total number of each clone group
 * @param  {number} beforeGroupTotal     - The total number of default clone controls (excluding clone groups)
 * @param  {number} newControlsTotal     - The number of new controls (just refer to the visible form)
 * @return {array}                       - A new object.
 *	 
 *************************************
 */	
function uixscform_cloned_groupStr( sectionID, newControlsArr, beforeArr, groupTotal, beforeGroupTotal, newControlsTotal ) {
	
	var result                = '',
		cloneTempListGroupRe  = new RegExp( "-" + sectionID + "-\\d+" , 'g' );

	if( Object.prototype.toString.call( beforeArr ) === '[object Array]' ) {
		
		//Format the array to JSON in order to variables of templates
		beforeArr = uixscform_arr_to_tempjson( beforeArr, true, false );
		
		// Returns the total number of clone group index.
		var groupIndexTotal = uixscform_cloned_groupIndexTotal( beforeArr, groupTotal, beforeGroupTotal );

		
		for( var i = 0; i < beforeArr.length; i++ ) {


			var v    = '',
				vArr = [];
			

			//Update the index value of the control (not for JSON)
			v    = beforeArr[i].replace( cloneTempListGroupRe, '-' + sectionID + '-' + groupIndexTotal );

			//Convert the english letter to the original form identifier.
			vArr = v.split( ':' );
			v    = v.replace( vArr[0], uixscform_filter_control_id( vArr[0], true ) );



			if ( 
				(i+1) % beforeGroupTotal == 0 && 
				(i+1) < groupTotal
			) {

				//Loop the new controls
				for ( var g = 0; g < newControlsTotal; g++ ) {
					var newcontrol_o   = newControlsArr[g],
						newcontrol     = null,
						newcontrol_id  = '',
						newcontrol_val = '';	


					if ( typeof newcontrol_o !== typeof undefined && newcontrol_o != ''  ) {

						newcontrol     = JSON.stringify( newcontrol_o ).replace(/^\{?|\}?$/g, '' ).split( ',' ),
						newcontrol_id  = newcontrol[1].replace(/-null(-|-\d+)(?=[^(-|-\d+)]*$)/g, '-' + sectionID + '-' + groupIndexTotal );

						newcontrol_val = newcontrol[0];


						if ( newcontrol_val != '' &&
							 newcontrol_id != ''
						) {
							result += newcontrol_val + ',';
							result += newcontrol_id + ',';
						}	

					}


				}//end for	

				result += v + '},{';
				groupIndexTotal--;
			} else {
				result += v + ',';
			}


		}
		
		
		result = result.replace(/,\s*$/, '' );
		result = JSON.parse( '[{' + result + '}]' );
		
		//Exclude default raw form data
		result.pop();
		
	}

	
	return result;
	
	
}


/*! 
 * ************************************
 * Returns the group string of the front-end rendering template that has been cloned
 *
 * @param  {array} beforeArr             - Unformatted clone group.
 * @param  {number} groupTotal           - The total number of each clone group
 * @param  {number} beforeGroupTotal     - The total number of default clone controls (excluding clone groups)
 * @return {array}                       - A new object.
 *	 
 *************************************
 */	
function uixscform_cloned_groupStr_frontend( beforeArr, groupTotal, beforeGroupTotal ) {
	
	var result = '';

	if( Object.prototype.toString.call( beforeArr ) === '[object Array]' ) {
		
		
		//Format the array to JSON in order to variables of templates
		beforeArr = uixscform_arr_to_tempjson( beforeArr, true, false );
		
		for( var i = 0; i < beforeArr.length; i++ ) {

			var per_data = beforeArr[i];

			if ( 
				(i+1) % beforeGroupTotal == 0 && 
				(i+1) < groupTotal
			) {
				result += per_data + '},{'
			} else {
				result += per_data + ',';
			}	


		}
		
		
		result = result.replace(/,\s*$/, '' );
		result = JSON.parse( '[{' + result + '}]' );
		
	}

	return result;
	
	
}





/*! 
 * ************************************
 * Returns all form ID values for a module
 *
 * @param  {string} tempID          - Form of module ID.
 * @param  {string} sectionID       - The section ID. (Obtained via gridster widget ID.)
 * @param  {string} colID           - The column ID of each module. Like this: null
 * @param  {boolean} returnTempID   - If true, only return the ID of the control of the front-end rendering template
 * @return {string}                 - The JSON format string.
 *	  
 *************************************
 */	
/*
 Like this:
 
[
    {
        "colID": "null", 
        "sectionID": "null", 
        "formID": "uix_pb_module_tabs", 
        "uix_pb_tabs_style__fieldVal": "horizontal", 
        "uix_pb_tabs_style__fieldID": "uix_pb_module_tabs-null-uix_pb_tabs_style-null-", 		
        "uix_pb_tabs_listitem_title__fieldVal": "Tab Title", 
        "uix_pb_tabs_listitem_title__fieldID": "uix_pb_module_tabs-null-uix_pb_tabs_listitem_title-null-", 
        "uix_pb_tabs_listitem_con__fieldVal": "This is content of the tab.", 
        "uix_pb_tabs_listitem_con__fieldID": "uix_pb_module_tabs-null-uix_pb_tabs_listitem_con-null-",
		"uix_pb_tabs_triggerclonelist__fieldID": [
				{ 
					"uix_pb_tabs_listitem_title__fieldVal": "Tab Title3" ,
					"uix_pb_tabs_listitem_title__fieldID": "uix_pb_module_tabs-null-uix_pb_tabs_listitem_title-null-3",
					"uix_pb_tabs_listitem_con__fieldVal": "This is content of the tab.",
					"uix_pb_tabs_listitem_con__fieldID": "uix_pb_module_tabs-null-uix_pb_tabs_listitem_con-null-3",
				},
				{ 
					"uix_pb_tabs_listitem_title__fieldVal": "Tab Title2",
					"uix_pb_tabs_listitem_title__fieldID": "uix_pb_module_tabs-null-uix_pb_tabs_listitem_title-null-2",
					"uix_pb_tabs_listitem_con__fieldVal": "This is content of the tab.",
					"uix_pb_tabs_listitem_con__fieldID": "uix_pb_module_tabs-null-uix_pb_tabs_listitem_con-null-2" 
			    },
			
			
		],
		
        "uix_pb_module_tabs_temp__fieldVal": "...", 
        "uix_pb_module_tabs_temp__fieldID": "uix_pb_module_tabs-null-uix_pb_module_tabs_temp-null-"
    }
]

*/
function uixscform_module_form_ids( tempID, sectionID, colID, returnTempID ) {
	
	var result = [];
	if( typeof tempID !== typeof undefined ) {
		( function( $ ) {
		"use strict";
			$( function() {

				//Push "colID", "sectionID" and "formID"  (Used to clone form templates)
				result.push( { colID: colID } );
				result.push( { sectionID: sectionID } );	
				result.push( { formID: tempID } );
				
				
				
				var //Returns the keys of the module template.
					keys                        = uixscform_module_form_keys( $( '#module_tmpl__' + tempID ).html() ),
					
					//Clone form IDs and elements
					cloneTempListKey            = [],
					cloneBeforeTempListIndex    = [],
					cloneBeforeTempListElements = [],
					cloneTempListElements       = [],
					cloneTempListElementsNew    = [],
					cloneTempListMax            = $( $( '#module_tmpl__' + tempID ).html() ).find( '[data-clone-max]' ).attr( 'data-clone-max' ),
					
					//The form ID of the front-end code after rendering module template
					renderTempID                = '',
					renderTempElement1          = '',
					renderTempElement2          = '',
					
					//All form control IDs
					all_field_ids              = $( '#uixscform-form-all-field-ids-' + tempID ).attr( 'data-field-ids' ),
					all_clonefield_ids         = '';
					
				if ( typeof all_field_ids !== typeof undefined ) {

					var new_all_field_ids_arr = all_field_ids.split( ',' );

					for ( var i = 0; i < new_all_field_ids_arr.length; i++ ) {

						if ( new_all_field_ids_arr[i]  != '' && new_all_field_ids_arr[i].indexOf( '_triggerclonelist' ) < 0 ) {
							var _new_field_name    = new_all_field_ids_arr[i],
								_new_key_id        = uixscform_filter_control_id( _new_field_name ) + '__fieldID';

							
							all_clonefield_ids += _new_key_id + ',';

							

						}//end if

					}//end for

				}


				/*! 
				 * ************************************
				 * Use the default value of the form controls (Completely new widget)
				 *	
				 *************************************
				 */
				if( Object.prototype.toString.call( keys ) === '[object Array]' ) {


					for( var i = 0; i < keys.length; i++ ) {

						var _key_id_vid    = keys[i],
							_field_name    = '',
							_field_full_id = '',
							_field_value   = '';



						//Exclude the original form ID of the clone
						if ( _key_id_vid.indexOf( '__index__' ) < 0 && _key_id_vid.indexOf( '_triggerclonelist' ) < 0 ) {

							if ( 
								_key_id_vid.indexOf( '__fieldID' ) >= 0 && 
								_key_id_vid.indexOf( '_temp' ) < 0
							   ) {
								_field_full_id = uixscform_to_controlID_ToVar( _key_id_vid, tempID, sectionID, colID );
								result.push( { [_key_id_vid]: _field_full_id }  );
							}

							if ( 
								_key_id_vid.indexOf( '__fieldVal' ) >= 0 && 
								_key_id_vid.indexOf( '_temp' ) < 0
							) {
								result.push( { [_key_id_vid]: "" }  );
							}	


							if ( 
								_key_id_vid.indexOf( '__fieldID' ) >= 0 && 
								_key_id_vid.indexOf( '_temp' ) >= 0
							) {
								_field_full_id      = uixscform_to_controlID_ToVar( _key_id_vid, tempID, sectionID, colID );
								renderTempElement1  = { [_key_id_vid]: _field_full_id };
								renderTempID        = _field_full_id;
							}

							if ( 
								_key_id_vid.indexOf( '__fieldVal' ) >= 0 && 
								_key_id_vid.indexOf( '_temp' ) >= 0
							) {
								renderTempElement2   = { [_key_id_vid]: "" };
							}	


						}//end if



					}	

				}


				/*! 
				 * ************************************
				 * Push clone controls to result
				 *
				 * @param  {array}  keys                            - Returns the keys of the module template.
				 * @param  {array} cloneTempListKey                 -  The key of clone controls array
				 * @param  {array}  cloneBeforeTempListElements     - The object of clone loops before
				 * @param  {array}  cloneTempListElements           - The object of clone loops
				 * @param  {number} cloneTempListMax                - The maximum value of the clone
				 *
				 *************************************
				 */	
				if ( typeof cloneTempListMax !== typeof undefined && cloneTempListMax > 0 ) {

					// Make a key of clone object
					if( Object.prototype.toString.call( keys ) === '[object Array]' ) {

						for( var i = 0; i < keys.length; i++ ) {
							if ( keys[i].indexOf( '_triggerclonelist' ) >= 0 ) {
								cloneTempListKey.push( keys[i] );
							}
						}

					}




					//The total number of each clone group
					var cloneBeforeTempListTotal    = 0, //Merged with IDs and values
						cloneTempListTotal          = 0, //Merged with IDs and values
						cloneTempListJsonArr        = [],
						cloneTempListJson           = '',
						cloneTempListGroupIndex     = 0,
						cloneTempListNewControlArr    = [],
						//The number of new controls (just refer to the visible form)
						cloneTempListNewControlTotal  = cloneTempListElementsNew.length;


					if ( cloneTempListElementsNew.length > 0 ) {
						cloneTempListNewControlArr = cloneTempListElementsNew;
					}


					 // If multiple columns are used to clone event and there are multiple clone triggers, 
					 // the triggers ID and clone controls ID must contain the string "_one_", "_two", "_three_" or "_four_" for per column
					var cloneBeforeTempListTotal_one_col    = 0,
						cloneBeforeTempListTotal_two_col    = 0,
						cloneBeforeTempListTotal_three_col  = 0,
						cloneBeforeTempListTotal_four_col   = 0,
						cloneTempListTotal_one_col          = 0,
						cloneTempListTotal_two_col          = 0,
						cloneTempListTotal_three_col        = 0,
						cloneTempListTotal_four_col         = 0,
						cloneTempListGroupIndex_one_col     = 0,
						cloneTempListGroupIndex_two_col     = 0,
						cloneTempListGroupIndex_three_col   = 0,
						cloneTempListGroupIndex_four_col    = 0,
						cloneTempListJson_one               = '',
						cloneTempListJson_two               = '',
						cloneTempListJson_three             = '',
						cloneTempListJson_four              = '',
						cloneTempListJsonArr_one            = [],
						cloneTempListJsonArr_two            = [],
						cloneTempListJsonArr_three          = [],
						cloneTempListJsonArr_four           = [];



					for( var k = 0; k < cloneBeforeTempListElements.length; k++ ) {

						var _v = JSON.stringify( cloneBeforeTempListElements[k] );

						if ( _v.indexOf( '_one_' ) >=0 ) cloneBeforeTempListTotal_one_col++;
						if ( _v.indexOf( '_two_' ) >=0 ) cloneBeforeTempListTotal_two_col++;
						if ( _v.indexOf( '_three_' ) >=0 ) cloneBeforeTempListTotal_three_col++;
						if ( _v.indexOf( '_four_' ) >=0 ) cloneBeforeTempListTotal_four_col++;

						if (
							_v.indexOf( '_one_' ) < 0 &&
							_v.indexOf( '_two_' ) < 0 &&
							_v.indexOf( '_three_' ) < 0 &&
							_v.indexOf( '_four_' ) < 0 
						) {
							cloneBeforeTempListTotal++;
						}	


					}	


					for( var k = 0; k < cloneTempListElements.length; k++ ) {

						var _el = cloneTempListElements[k],
							_v  = JSON.stringify( _el );

						if ( _v.indexOf( '_one_' ) >=0 ) cloneTempListTotal_one_col++, cloneTempListJsonArr_one.push( _el );
						if ( _v.indexOf( '_two_' ) >=0 ) cloneTempListTotal_two_col++, cloneTempListJsonArr_two.push( _el );
						if ( _v.indexOf( '_three_' ) >=0 ) cloneTempListTotal_three_col++, cloneTempListJsonArr_three.push( _el );
						if ( _v.indexOf( '_four_' ) >=0 ) cloneTempListTotal_four_col++, cloneTempListJsonArr_four.push( _el );

						if (
							_v.indexOf( '_one_' ) < 0 &&
							_v.indexOf( '_two_' ) < 0 &&
							_v.indexOf( '_three_' ) < 0 &&
							_v.indexOf( '_four_' ) < 0 
						) {
							cloneTempListTotal++;
							cloneTempListJsonArr.push( _el );

						}


					}


					cloneBeforeTempListTotal            = cloneBeforeTempListTotal * 2;
					cloneBeforeTempListTotal_one_col    = cloneBeforeTempListTotal_one_col * 2;
					cloneBeforeTempListTotal_two_col    = cloneBeforeTempListTotal_two_col * 2;
					cloneBeforeTempListTotal_three_col  = cloneBeforeTempListTotal_three_col * 2;
					cloneBeforeTempListTotal_four_col   = cloneBeforeTempListTotal_four_col * 2;

					cloneTempListTotal                  = cloneTempListTotal * 2;
					cloneTempListTotal_one_col          = cloneTempListTotal_one_col * 2;
					cloneTempListTotal_two_col          = cloneTempListTotal_two_col * 2;
					cloneTempListTotal_three_col        = cloneTempListTotal_three_col * 2;
					cloneTempListTotal_four_col         = cloneTempListTotal_four_col * 2;



					// Returns the group string that has been cloned
					cloneTempListJson     = uixscform_cloned_groupStr( sectionID, cloneTempListNewControlArr, cloneTempListJsonArr, cloneTempListTotal, cloneBeforeTempListTotal, cloneTempListNewControlTotal );

					cloneTempListJson_one = uixscform_cloned_groupStr( sectionID, cloneTempListNewControlArr, cloneTempListJsonArr_one, cloneTempListTotal_one_col, cloneBeforeTempListTotal_one_col, cloneTempListNewControlTotal );

					cloneTempListJson_two = uixscform_cloned_groupStr( sectionID, cloneTempListNewControlArr, cloneTempListJsonArr_two, cloneTempListTotal_two_col, cloneBeforeTempListTotal_two_col, cloneTempListNewControlTotal );

					cloneTempListJson_three = uixscform_cloned_groupStr( sectionID, cloneTempListNewControlArr, cloneTempListJsonArr_three, cloneTempListTotal_three_col, cloneBeforeTempListTotal_three_col, cloneTempListNewControlTotal );

					cloneTempListJson_four = uixscform_cloned_groupStr( sectionID, cloneTempListNewControlArr, cloneTempListJsonArr_four, cloneTempListTotal_four_col, cloneBeforeTempListTotal_four_col, cloneTempListNewControlTotal );


					//Add the looped data to the trigger
					if ( cloneTempListKey.length > 0 ) {

						for ( var p = 0; p < cloneTempListKey.length; p++ ) {

							var _key = cloneTempListKey[p];
							if ( JSON.stringify( result ).indexOf( _key ) < 0 ) {


								if ( _key.indexOf( '_one_' ) >= 0 && cloneTempListJson_one.length > 0 ) result.push( { [_key]: cloneTempListJson_one } );
								if ( _key.indexOf( '_two_' ) >= 0 && cloneTempListJson_two.length > 0 ) result.push( { [_key]: cloneTempListJson_two } );
								if ( _key.indexOf( '_three_' ) >= 0 && cloneTempListJson_three.length > 0 ) result.push( { [_key]: cloneTempListJson_three } );
								if ( _key.indexOf( '_four_' ) >= 0 && cloneTempListJson_four.length > 0 ) result.push( { [_key]: cloneTempListJson_four } );

								if (
									_key.indexOf( '_one_' ) < 0 &&
									_key.indexOf( '_two_' ) < 0 &&
									_key.indexOf( '_three_' ) < 0 &&
									_key.indexOf( '_four_' ) < 0 &&
									cloneTempListJson.length > 0
								) {
									result.push( { [_key]: cloneTempListJson } );
								}




							}		

						}//end for(array: cloneTempListKey)

					}//end if


				}
				
				
				
				/*! 
				 * ************************************
				 * Push "renderTempElement1" and "renderTempElement2"  to result in the last
				 *	
				 *************************************
				 */
				if ( renderTempElement1 != '' ) result.push( renderTempElement1  );	
				if ( renderTempElement2 != '' ) result.push( renderTempElement2  );	
				
				
				/*! 
				 * ************************************
				 * Format the JSON data format for the template
				 *	
				 *************************************
				 */
				result = uixscform_arr_to_tempjson( result, false, false );
				
				
				
				/*! 
				 * ************************************
				 * Convert the english letter to the original form identifier.
				 *	
				 *************************************
				 */		
				var _result     = result.replace(/^\{?|\}?$/g, '' ),
					_result_arr = _result.split( ',' );
				
				
				for( var i = 0; i < _result_arr.length; i++ ) {
					var _re_key_id_arr  = _result_arr[i].split( ':' ),
					    _re_old_key_id  = _re_key_id_arr[0].replace(/"/g, '' ),
						_re_new_key_id  = uixscform_filter_control_id( _re_old_key_id, true );
					
					
					
					if ( _re_old_key_id.indexOf( '_listitem' ) >= 0 ) {
						result = result.replace( _re_old_key_id, _re_new_key_id );
					}
					
					
					
				}
				
			
				
				/*! 
				 * ************************************
				 * Returns the control ID of the template
				 *	
				 *************************************
				 */
				if ( returnTempID ) {
					result = renderTempID.replace(/\[/g, '')
										 .replace(/\]/g, '');
				}
				
				
			

			} );

		} ) ( jQuery );

		
	}
	

	return result;
	

}

