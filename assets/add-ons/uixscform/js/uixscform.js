/*
	* Plugin: Uix Shortcodes Form
	* Version 1.0.0
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
			
				

			
			//Prepend section templates
			var form = { 'formID': formID, 'title': $title, 'thisModalID': dataID, 'thisFormName': $ID };
			
			if ( $( '.uixscform-modal-mask' ).length < 1 ) {
				$( 'body' ).prepend( '<div class="uixscform-modal-mask"></div>' );
			}
			
			if ( $( '#' + form[ 'thisModalID' ] ).length < 1 ) {
				$( 'body' ).prepend( '<div class="uixscform-modal-box" id="'+form[ 'thisModalID' ]+'"><a href="javascript:void(0)" class="close-btn close-uixscform-modal">×</a><div class="content"><h2>'+form[ 'title' ]+'</h2><span class="ajax-temp"></span></div></div>' );
				
			}
				
		
			settings.initFunction( form );
				
			
			/*-- Open Window -- */
	        $( document ).on( 'click', $trigger, function( e ) {
				e.preventDefault();
				
				var widget_ID       = $( this ).data( 'id' ),
					contentID       = ( $( this ).data( 'target' ) != undefined ) ? $( this ).data( 'target' ) : 'content',
					widget_ID       = 0,
				    widgets         = { 'ID': widget_ID, 'contentID': contentID, 'title': $title },
				    code            = '',
					$obj            = $( '.uixscform-modal-box#'+dataID );
				
				//Open
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
							//Icon list with the jQuery AJAX method
							$( '.icon-selector' ).uixscform_iconSelector();
							$( '.wp-color-input' ).wpColorPicker();
							
							//Close
							$( '.uixscform-modal-box .close-uixscform-modal' ).on( 'click', function( e ) {
								e.preventDefault();
								$( '.uixscform-modal-box' ).removeClass( 'active' );
								$( '.uixscform-modal-mask' ).fadeOut( 'fast' );
								$( 'html' ).css( 'overflow-y', 'auto' );
							});	

						},
						error: function(){
						    $obj.find( '.ajax-temp' ).html( $errorInfo );
						},
						beforeSend: function() {
							$obj.find( '.ajax-temp' ).html( '<span class="uixscform-loading"></span>' );
							//console.log( 'loading...' );

						}
					});
			
					
					$( '.uixscform-modal-mask' ).fadeIn( 'fast' );
					$obj.addClass( 'active' );
					$obj.find( '.content' ).animate( {scrollTop: 10 }, 100 );
					$( 'html' ).css( 'overflow-y', 'hidden' );
				}
	
				
				//Callback API
				settings.startFunction( widgets );
				
				
				//Close
				$( '.uixscform-modal-box .close-uixscform-modal' ).on( 'click', function( e ) {
					e.preventDefault();
					$( this ).parent().removeClass( 'active' );
					$( '.uixscform-modal-box' ).removeClass( 'active' );
					$( '.uixscform-modal-mask' ).fadeOut( 'fast' );
					$( 'html' ).css( 'overflow-y', 'auto' );
				});
				
			} );

		
		})
	}
})(jQuery);



