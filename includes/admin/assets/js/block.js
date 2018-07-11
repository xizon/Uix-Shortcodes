/* Global: uix_shortcodes_block_vars */

var UIXSC_BLOCK_CURRENT_ID = null;

( function( $ ) {
"use strict";
    $( function() {

		
		/*!
		 *
		 * Initialize list buttons of shortcode modules in admin panel
		 * ---------------------------------------------------
		 */
		if ( $( document.body ).width() > 768 ) { 
			$( '.uix-shortcodes-block-col-tabs' ).accTabs(); 
		}
		
	  

	   /*!
		 *
		 * Display the list buttons of shortcode modules 
		 * ---------------------------------------------------
		 */
		$( document ).on( 'click', '.uix-shortcodes-open-btn', function( e ) {
		
		    e.preventDefault();

			var _id       = $( this ).attr( 'id' ),
				_text     = $( this ).next( '.editor-rich-text' ).find( '.components-autocomplete > p' ),
				_code     = '';

	
			//Push the block ID to Uix Shortcodes Form
			UIXSC_BLOCK_CURRENT_ID = _id;
			
			//Open the modal box
			$( '#uix_sc_blocks_selector' ).UixSCFormPopWinReset( { heightChange: true, blockID: UIXSC_BLOCK_CURRENT_ID } );
			

			/*-- Close --*/
			$( '.uixscform-modal-box .close-uixscform-modal' ).on( 'click', function( e ) {
				e.preventDefault();

				$( document ).UixSCFormPopClose();


			});	

					
			
			//Temporarily store the current shortcode
			_text.attr( {
				'data-block-id'    : _id,
				'data-block-value' : _code
			} );


		});
		

		//Open the current module
		$( document ).on( 'click', '.mce-uix-widget-btn', function( e ) {
			
			e.preventDefault();
			
			//Switch between different pop-up windows when the pop-up windows is not fully closed.
			$( document ).UixSCFormPopSwitchTransition();
			
			
			//Open the modal box
			$( '#uixscform-modal-open-mce-'+$( this ).data( 'slug' )+'-widget_btn' ).UixSCFormPopWinReset( { heightChange: true, blockID: UIXSC_BLOCK_CURRENT_ID } );
			

		});


		
		
		
    } );

} ) ( jQuery );
