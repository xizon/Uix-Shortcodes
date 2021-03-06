( function( $ ) {
"use strict";
    $( function() {
	
		/*!
		 *
		 * Accordion
		 * ---------------------------------------------------
		 */
		$( '.uix-bg-custom-accordion h3' ).on( 'click', function() {
		    $( this ).parent().parent().find( '.uix-bg-custom-faq-con' ).slideUp();
			if( !$( this ).next().is( ':visible' ) ) {
				$( this ).next().slideDown();
			}	
		});
		
		
		/*!
		 *
		 * Custom CSS
		 * ---------------------------------------------------
		 */
		var uix_sc_dialog_wrapper = '.uix-popwin-dialog-wrapper',
			uix_sc_dialog         = '.uix-popwin-dialog-mask, .uix-popwin-dialog';
		$( '.uix-popwin-viewcss-btn' ).on( 'click', function( e ) {
			e.preventDefault();
			$( this ).closest( uix_sc_dialog_wrapper ).find( uix_sc_dialog ).show();
			
		});
		
		$( '.uix-popwin-dialog .close' ).on( 'click', function( e ) {
			e.preventDefault();
			$( this ).closest( uix_sc_dialog_wrapper ).find( uix_sc_dialog ).hide();
		});
		
		

	} );
    
    
} ) ( jQuery );