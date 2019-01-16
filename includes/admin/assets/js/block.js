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

			var _id       = $( this ).attr( 'id' );

	
			//Push the block ID to Uix Shortcodes Form
			UIXSC_BLOCK_CURRENT_ID = _id;
			
			//Open the modal box
			$( '#uix_sc_blocks_selector' ).UixSCFormPopWinReset( { heightChange: true, blockID: UIXSC_BLOCK_CURRENT_ID } );
			

			/*-- Close --*/
			$( '.uixscform-modal-box .close-uixscform-modal' ).on( 'click', function( e ) {
				e.preventDefault();

				$( document ).UixSCFormPopClose();


			});	

					

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





/*!
 *
 * Display the block, Enable gutenberg settings for Uix Shortcodes
 * ---------------------------------------------------
 */
var uixscBlockEl      = wp.element.createElement,
	uixscFragment          = wp.element.Fragment,
	uixscRegisterBlockType = wp.blocks.registerBlockType,
	uixscRichText          = wp.editor.RichText,
	uixscBlockSelector     = 'div',
	uixscBtnStyle          = { 
		backgroundColor: '#7AD03A', 
		color: '#fff', 
		borderColor: '#5EB83C', 
		textAlign: 'center', 
		fontFamily: 'Helvetica, Arial',
		outline: 'none',
		textDecoration: 'none'
	},
	uixscBtnClassName      = 'button uix-shortcodes-open-btn';

/**
 * A custom SVG path taken from fontastic
*/
var uixscBlockIcon = uixscBlockEl( 'svg', { width: 24, height: 24, viewBox: '0 0 18 18' },
  uixscBlockEl('path', { d: "M0 1v14h16v-14h-16zM15 14h-14v-12h14v12zM14 3h-12v10h12v-10zM7 8h-1v1h-1v1h-1v-1h1v-1h1v-1h-1v-1h-1v-1h1v1h1v1h1v1zM11 10h-3v-1h3v1z", fill: '#74D053' } )
);



uixscRegisterBlockType( 'myplugin/block-uix-shortcodes', {
	title: uix_shortcodes_block_vars.send_string_block_title,

	icon: uixscBlockIcon,

	category: 'common',

	attributes: {
		customMeta_text: {
			type: 'string',
			source: 'html',
			selector: uixscBlockSelector,
		},
		//ID will be passed to the background for use
		cid: {
			type: 'string',
		},
		alignment: {
			type: 'string',
		}
	},

	edit: function( props ) {
		var content    = props.attributes.customMeta_text,
			alignment  = props.attributes.alignment,
			cid        = 'js-cur-' + props.clientId;


		//Update the ID after loaded blocks
		props.setAttributes( { 
			cid            : props.clientId
		} );


		function onChangeContent( newContent ) {


			props.setAttributes( { 
				customMeta_text: newContent,
				cid            : props.clientId
			} );
		}

		function onChangeAlignment( newAlignment ) {
			props.setAttributes( { alignment: newAlignment } );
		}


		return (
			uixscBlockEl(
				uixscFragment,
				null,
				uixscBlockEl(
					wp.editor.BlockControls,
					null,
					uixscBlockEl(
						wp.editor.AlignmentToolbar,
						{
							value: alignment,
							onChange: onChangeAlignment
						}
					)
				),

				uixscBlockEl( 'a', 
				   { 
						style     : uixscBtnStyle, 
						className : uixscBtnClassName,
						href      : 'javascript:void(0)',
						id        : cid
					}, uix_shortcodes_block_vars.send_string_block_btn_title ),

				uixscBlockEl(
					uixscRichText,
					{
						key             : 'editable',
						tagName         : uixscBlockSelector,
						className       : props.className + ' cid-' + cid,
						style           : { textAlign: alignment },
						onChange        : onChangeContent,
						value           : content
					}
				)
			)
		);
	},

	save: function( props ) {
		// Rendering in PHP

		var content   = props.attributes.customMeta_text,
			alignment = props.attributes.alignment,
			newVal    = content;


		//Trigger the saving of empty data
		//Solve the problem of data being pushed to the back end of the 
		//rich text editor to save null values
		if ( typeof content === typeof undefined ) {
			newVal = '&nbsp;';
			
		} 
	


		newVal = newVal
		    .replace(/<\/p\s*[\/]?>/gi, '[/p]' )
		    .replace(/<p\s*[\/]?>/gi, '[p]' )
			.replace(/<br\s*[\/]?>/gi, '[br]' )
		    .replace(/\[\/p\]\[br\]/gi, '[/p]' )
			.replace(/\[br\]$/, '');


		return uixscBlockEl( uixscRichText.Content, {
			tagName         : uixscBlockSelector,
			className       : props.className,
			style           : { textAlign: alignment },
			value           : newVal,
			cid             : props.attributes.cid  //ID will be passed to the background for use
		} );

	}
} );	
