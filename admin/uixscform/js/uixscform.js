/*
	* Plugin: Uix Shortcodes Form
	* Version 2.0
	* Author: UIUX Lab
	* Twitter: @uiux_lab
	* Author URL: https://uiux.cc
	
	* Dual licensed under the MIT and GPL licenses:
	* http://www.opensource.org/licenses/mit-license.php
	* http://www.gnu.org/licenses/gpl.html
*/
(function($){
	$.fn.UixSCFormPop=function(options){
		var settings=$.extend({
			'postID'            : '',
			'title'             : '',
			'trigger'           : '',
			'errorInfo'         : 'Timeout expired. The timeout period elapsed prior to completion of the operation or the server is not responding. ',
			'initFunction'      : function(){ },	 //Callback: function( form ){ alert( form[ 'formID' ] ); }
			'startFunction'     : function(){ }	 //Callback: function( widgets ){ alert( widgets[ 'contentID' ] ); }
		}
		,options);
		this.each(function(){
			
			var $this               = $( this ),
			    $ID                 = settings.trigger.replace( '.', '' ).replace( '#', '' ),
				$title              = settings.title,
				$postID             = settings.postID,
				$trigger            = settings.trigger,
				$errorInfo          = settings.errorInfo,
				dataID              = 'uixscform-modal-open-' + $ID,
				formID              = $trigger.replace( '.', '' ).replace( '#', '' ).replace( '-widget_btn', '' );
			
				

			/*------------- Load core form templates ------------- */
			var form = { 'formID': formID, 'title': $title, 'thisModalID': dataID, 'thisFormName': $ID };
			
			if ( $( '.uixscform-modal-mask' ).length < 1 ) {
				$( 'body' ).prepend( '<div class="uixscform-modal-mask"></div>' );
			}
			
			if ( $( '#' + form[ 'thisModalID' ] ).length < 1 ) {
				$( 'body' ).prepend( '<div class="uixscform-modal-box" id="'+form[ 'thisModalID' ]+'"><a href="javascript:void(0)" class="close-btn close-uixscform-modal">&times;</a><div class="content"><h2>'+form[ 'title' ]+'</h2><span class="preview-box"></span><span class="iconslist-box"></span><span class="ajax-temp"></span></div></div>' );
				
			}
				
		
		    if ( Object.prototype.toString.call( settings.initFunction ) == '[object Function]' ) {
				settings.initFunction( form );
			}
				
			
			
	        $( document ).on( 'click', $trigger, function( e ) {
				e.preventDefault();
				
				var widget_ID               = $( this ).data( 'id' ),
					contentID               = ( typeof $( this ).data( 'target' ) !== typeof undefined ) ? $( this ).data( 'target' ) : 'content',
					widget_ID               = 0,
				    widgets                 = { 'ID': widget_ID, 'contentID': contentID, 'title': $title },
				    code                    = '',
					$obj                    = $( '.uixscform-modal-box#'+dataID ),
					modal_H_init            = $( '.uixscform-modal-box' ),
					modal_H_btn_init        = $( '.uixscform-modal-buttons' ),
					modal_H_max             = $( window ).height()*0.8 - 150;
				
				/*------------- Open Window ------------- */
				if ( $obj.length > 0 ) {
					
					$.ajax({
						url       : ajaxurl,
						type      : 'POST',
						data: {
							action    : 'uixscform_ajax_sections',
							tempID    : formID,
							sectionID : widget_ID,
							contentID : contentID,
							postID    : $postID
						},
						success   : function( result ){
							
							result = result.replace( /{index}/g, '\['+widget_ID+'\]' );
							
							
							$obj.find( '.ajax-temp' ).html( result );
							
							if ( $obj.find( '.iconslist-box' ).html().length == 0 ) {
								$obj.find( '.iconslist-box' ).html( $( '.uixscform-icon-selector-btn-target' ).html() );
							}
							if ( $obj.find( '.preview-box' ).html().length == 0 ) {
								$obj.find( '.preview-box' ).html( $( '.uixscform-livepreview-btn-target' ).html() );
							}			
							
							
							/*-- Init tinymce --*/
							$obj.find( '.uixscform-mce-editor' ).each( function()  {
								uixscform_editorInit( $( this ).find( 'textarea.mce' ).attr( 'id' ) );
							});
							
							
	
							/*-- Count new modal height --*/
							var newmHeight = 0,
								hEx        = 0,
								nocols     = $obj.find( '.ajax-temp .uixscform-form-container' ),
								cols       = $obj.find( '.ajax-temp .uixscform-table-cols-wrapper' ),
								colsH      = Array(),
								colsH_Max  = 0;
							if ( cols.length > 0 ) {
								
								cols.each( function( index ) {
									var curH  = $( this ).height();
									
									if ( $( this ).hasClass( 'uixscform-table-col-1' ) ) {
										hEx = curH;
									}
									
									colsH.push( parseFloat( curH ) + parseFloat( hEx ) );
									
									
								} );
								
								newmHeight = Math.max.apply( Math, colsH );
	
								
							} else {
								newmHeight = nocols.height();
							}
							
							if ( newmHeight == null || 
								newmHeight == 0 || 
								parseFloat( newmHeight + 150 + $( window ).height()*0.2 ) > $( window ).height()
							   ) 
							{
								newmHeight = modal_H_max;
							}
							//Initializes modal height
							modal_H_init.css( 'height', parseFloat( newmHeight + 150 ) + 'px' );
							$obj.find( '.ajax-temp .uixscform-modal-buttons' ).css( 'margin-top', parseFloat( newmHeight/2 + 20 ) + 'px' );
							
							
							//Add row
							$( '.uixscform_btn_trigger-clone' ).on( 'click', function( e ) {
								e.preventDefault();
								
								modal_H_init.css( 'height', parseFloat( modal_H_max + 150 ) + 'px' );
								$obj.find( '.ajax-temp .uixscform-modal-buttons' ).css( 'margin-top', parseFloat( modal_H_max/2 + 20 ) + 'px' );
							});	
							
							
							
							
							/*-- Initializes the form state --*/
							//Icon list
							$( '.uixscform-icon-selector' ).uixscform_iconSelector();
							
							//color picker
							$( '.wp-color-input' ).wpColorPicker();
							
							
							//toggle default
							$( '.uixscform_btn_trigger-toggleshow' ).each( function()  {
								if ( $( this ).closest( '.uixscform-box' ).find( 'input' ).val() == 1 ) {
									$( this ).uixscform_toggleshow();
								}
							});
							$( '.uixscform_btn_trigger-toggleswitch_checkbox' ).uixscform_toggleSwitchCheckboxStatus();
							$( '.uixscform_btn_trigger-toggleswitch_radio' ).uixscform_toggleSwitchRadioStatus();

							//insert media
							$( '.uixscform_btn_trigger-upload' ).uixscform_mediaStatus();

		
							
							/*-- Close --*/
							$( '.uixscform-modal-box .close-uixscform-modal' ).on( 'click', function( e ) {
								e.preventDefault();
								
								//remove modal
								$( '.uixscform-modal-box' ).removeClass( 'active' );
								$( '.uixscform-modal-mask' ).fadeOut( 'fast' );
								$( 'html' ).css( 'overflow-y', 'auto' );
								
								//remove sub window (live preview)
								$( '.uixscform-modal-box .preview-box' ).removeAttr( 'id' ).removeClass( 'active' );
								//remove sub window (icons)
								$( '.uixscform-modal-box .iconslist-box' ).removeAttr( 'id' ).removeClass( 'active' );
								//show main modal content
								$( '.uixscform-modal-box .ajax-temp' ).css( 'visibility', 'visible' );

							});	
							
							// stuff here
							return false;			
							

						},
						error: function(){
						    $obj.find( '.ajax-temp' ).html( $errorInfo );
						},
						beforeSend: function() {
							$obj.find( '.ajax-temp' ).html( '<span class="uixscform-loading"></span>' );
							//console.log( 'loading...' );
							
							//Initializes modal height
							modal_H_init.css( 'height', '220px' );
							modal_H_btn_init.css( 'margin-top', '50px' );

						}
					});
			
					
					$( '.uixscform-modal-mask' ).fadeIn( 'fast' );
					$obj.addClass( 'active' );
					$obj.find( '.content' ).animate( {scrollTop: 10 }, 100 );
					$( 'html' ).css( 'overflow-y', 'hidden' );
				}
	
				
				/*------------- Callback API ------------- */
				settings.startFunction( widgets );
				
				
				/*------------- Close ------------- */
				$( '.uixscform-modal-box .close-uixscform-modal' ).on( 'click', function( e ) {
					e.preventDefault();
					
					//remove modal
					$( this ).parent().removeClass( 'active' );
					$( '.uixscform-modal-box' ).removeClass( 'active' );
					$( '.uixscform-modal-mask' ).fadeOut( 'fast' );
					$( 'html' ).css( 'overflow-y', 'auto' );
					
					//remove sub window (live preview)
					$( '.uixscform-modal-box .preview-box' ).removeAttr( 'id' ).removeClass( 'active' );
					//remove sub window (icons)
					$( '.uixscform-modal-box .iconslist-box' ).removeAttr( 'id' ).removeClass( 'active' );
					//show main modal content
					$( '.uixscform-modal-box .ajax-temp' ).css( 'visibility', 'visible' );

				});
				
			} );

		
		})
	}
})(jQuery);



