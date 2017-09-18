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
		var uix_sc_dialog_wrapper = '.uix-shortcodes-dialog-wrapper',
			uix_sc_dialog         = '.uix-shortcodes-dialog-mask, .uix-shortcodes-dialog';
		$( '.uix-shortcodes-viewcss-btn' ).on( 'click', function( e ) {
			e.preventDefault();
			$( this ).closest( uix_sc_dialog_wrapper ).find( uix_sc_dialog ).show();
			
		});
		
		$( '.uix-shortcodes-dialog .close' ).on( 'click', function( e ) {
			e.preventDefault();
			$( this ).closest( uix_sc_dialog_wrapper ).find( uix_sc_dialog ).hide();
		});
		
		

	} );
    
    
} ) ( jQuery );