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
			$( '.uix-shortcodes-block-col-tabs' ).UixSCBlockTabs(); 
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





/*!
 * jQuery Accessible Tabs for Uix Shortcodes (!!!change the plugin name)
 *
 * @description: Creates accessible tabs - a single content area with multiple panels
 * @source: https://github.com/nomensa/jquery.accessible-tabs.git
 * @version: '0.1.1'
 *
 * @author: Nomensa
 * @license: licenced under MIT - http://opensource.org/licenses/mit-license.php
*/

(function($, window, document, undefined) {
    'use strict';

    var pluginName,
        defaults,
        counter = 0;

    pluginName = 'UixSCBlockTabs';
    defaults = {
        // Specify which tab to open by default using 0-based position
        defaultTab: 0,
        // Callback when the plugin is created
        callbackCreate: function() {},
        // Callback when the plugin is destroyed
        callbackDestroy: function() {},
        // A class applied to the target element
        containerClass: 'js-tabs',
        // A class applied to the active tab control
        controlActiveClass: 'js-tabs_control-item--active',
        // An explanation of how the tabs operate, which is prepended to the tabs content
        controlsText: 'Use the tab and enter or arrow keys to move between tabs',
        // Class to apply to the controls text element
        controlsTextClass: 'js-tabs_control-text',
        // Class to apply the controls list
        tabControlsClass: 'js-tabs_control',
        // Ids for tab controls should start with the following string
        tabControlId: 'js-tabs_control-item--',
        // Class to be applied to the tab panel
        tabPanelClass: 'js-tabs_panel',
        // Ids for tab panels should start with the following string
        tabPanelId: 'js-tabs_panel--'
    };

    function AccTabs(element, options) {
    /*
     Constructor function for the tabs plugin
     */
        var self = this;

        self.element = $(element);
        // Combine user options with default options
        self.options = $.extend({}, defaults, options);

        function init() {
        /*
            Our init function to create an instance of the plugin
        */
            self.controlsWrapper = $('<ul class="' + self.options.tabControlsClass + '" role="tablist" />');

            // Create a control for each tab panel
            $('> div', self.element).each(function(index, value) {
                var tabId = self.options.tabControlId + counter + index,
                    panelId = self.options.tabPanelId + counter + index,
                    heading = $($(value).prev()),
                    headingContent = heading.html(),
                    liMarkup = $('<li role="presentation">' +
                                     '<button aria-selected="false" data-controls="' + panelId + '" id="' + tabId + '" role="tab">' +
                                         headingContent +
                                     '</button>' +
                                 '</li>');

                // Hide heading that has been used for the control button text
                heading.hide();

                // Bind event handlers
                $('button', liMarkup)
                    .click(createHandleClick(self))
                    .keydown(createHandleKeyDown(self));

                self.controlsWrapper.append(liMarkup);
            });

            // Prepend the constructed controls
            self.element.prepend(self.controlsWrapper);

            // Add classes and attributes to tab panels
            $('> div', self.element).each(function(index, value) {
                $(value)
                    .addClass(self.options.tabPanelClass)
                    .attr({
                        'aria-hidden': 'true',
                        'aria-labelledby': self.options.tabControlId + counter + index,
                        'id': self.options.tabPanelId + counter + index,
                        'role': 'tabpanel'
                    })
                    .hide();
            });

            // Add explanatory control text
            self.controlsTextWrapper = $('<p class="' + self.options.controlsTextClass + '">' + self.options.controlsText + '</p>');
            self.element.prepend(self.controlsTextWrapper);

            // Activate the default tab
            self.activateTab($('button', self.controlsWrapper).eq(self.options.defaultTab));

            // Add the active class
            self.element.addClass(self.options.containerClass);

            // Increment counter for unique ID's
            counter++;

            self.options.callbackCreate();
        }

        function createHandleClick() {
        /*
            Create the click event handle
        */
            self.handleClick = function(event) {
                event.preventDefault();

                self.activateTab(this);
            };
            return self.handleClick;
        }

        function createHandleKeyDown() {
        /*
            Create the keydown event handle
        */
            self.handleKeyDown = function(event) {
                switch (event.which) {
                    // arrow left or up
                    case 37:
                    case 38:
                        event.preventDefault();

                        // Allow us to loop through the controls
                        if ($(this).parent().prev().length !== 0) {
                            $(this).parent().prev().find('> button').focus().click();
                        } else {
                            $(self.controlsWrapper).find('li:last > button').focus().click();
                        }
                        break;
                    // arrow right or down
                    case 39:
                    case 40:
                        event.preventDefault();

                        // Allow us to loop through the controls
                        if ($(this).parent().next().length !== 0) {
                            $(this).parent().next().find('> button').focus().click();
                        } else {
                            $(self.controlsWrapper).find('li:first > button').focus().click();
                        }
                        break;
                }
            };
            return self.handleKeyDown;
        }

        init();
    }

    AccTabs.prototype.activateTab = function(tab) {
    /*
        Public method for activating a tab
    */
        // Checks if the tab is already active before trying to activate it
        if ($(tab).attr('aria-selected') === 'false') {
            var activeTabClass = this.options.controlActiveClass,
                tabPanelId = '#' + $(tab).attr('data-controls');

            // Reset state if another tab is active
            if ($('[aria-selected="true"]', this.controlsWrapper).length !== 0) {
                $('[aria-selected="true"]', this.controlsWrapper)
                    .attr('aria-selected', 'false')
                    .parent('li').removeClass(activeTabClass);

                $('> [aria-hidden="false"]', this.element)
                    .attr('aria-hidden', 'true')
                    .hide();
            }

            // Update state of newly selected tab control
            $(tab, this.element).attr('aria-selected', 'true');
            $(tab, this.element).parent('li').addClass(activeTabClass);

            // Update state of newly selected tab panel
            $(tabPanelId, this.element)
                .attr('aria-hidden', 'false')
                .show();
        }
    };

    AccTabs.prototype.rebuild = function() {
    /*
        Public method for rebuild the plugin and options
    */
        return new AccTabs(this.element, this.options);
    };

    AccTabs.prototype.destroy = function () {
    /*
        Public method for return the DOM back to its initial state
    */
        var self = this;

        this.element.removeClass(this.options.containerClass);
        $('> .' + this.options.controlsTextClass, this.element).remove();
        $('> .' + this.options.tabControlsClass, this.element).remove();
        $('> div', this.element).prev().removeAttr('style');

        $('> div', this.element).each(function(index, value) {
            $(value)
                .removeAttr('aria-hidden aria-labelledby id role style')
                .removeClass(self.options.tabPanelClass);
        });

        this.options.callbackDestroy();
    };

    $.fn[pluginName] = function(options) {
    /*
        Guards against multiple instantiations
    */
        return this.each(function() {
            if (!$.data(this, 'plugin_' + pluginName)) {
                $.data(this, 'plugin_' + pluginName, new AccTabs(this, options));
            }
        });
    };

})(jQuery, window, document);