/*! 
 * ************************************
 * Adding Buttons
 *************************************
 */	
 (function() {
    tinymce.create('tinymce.plugins.uix_SC', {
		
        /**
         * Initializes the plugin, this will be executed after the plugin has been created.
         * This call is done before the editor instance has finished it's initialization so use the onInit event
         * of the editor instance to intercept that event.
         *
         * @param {tinymce.Editor} ed Editor instance that the plugin is initialized in.
         * @param {string} url Absolute URL to where the plugin is located.
         */
        init : function(ed, url) {
			
			
			ed.addButton( 'uix_shortcode_btn', {
				text: '',
				title: ed.getLang( 'uix_sc_custom_tinymce_plugin.lang_1' ),
				icon: 'mce-i-icon uix-shortcodes-icon',
				type: 'menubutton',
				onclick: function() { 
					/*-- Clone List  --*/
					jQuery( ".table-link-normal" ).parent( ".sweet-box" ).parent().parent( "tr.isMSIE" ).hide();
					
					/*-- Table Background  --*/
					jQuery( '.sweet-table-list:odd' ).addClass( 'even' );
				},
				menu: [
				
				    /* -----------   */
					
					/*
					{
						text: ed.getLang( 'uix_sc_custom_tinymce_plugin.lang_demo_4' ),
						icon: 'icon dashicons-search',
						menu: [
							{
								text: ed.getLang( 'uix_sc_custom_tinymce_plugin.lang_demo_1' ),
								onclick: function() {
					
									jQuery( '#uix_sc_form_hello' ).trigger( 'click' );
									

														
								}
							},
							{
								text: ed.getLang( 'uix_sc_custom_tinymce_plugin.lang_demo_2' ),
								onclick: function() {
									
									jQuery( '#uix_sc_form_hello2' ).trigger( 'click' );
								}
							},
							{
								text: ed.getLang( 'uix_sc_custom_tinymce_plugin.lang_demo_3' ),
								onclick: function() {
					
									ed.insertContent('Hello World!');
								}
							}
						
							
							
						]
					},
					*/
					
					
				    /* -----------   */
				
					{
						text: ed.getLang( 'uix_sc_custom_tinymce_plugin.lang_32' ),
						icon: 'icon dashicons-desktop',
						onclick: function() {
							jQuery( '#uix_sc_container' ).trigger( 'click' );
						}
					},
					
					
					/* -----------   */
					
					{
						
						text: ed.getLang( 'uix_sc_custom_tinymce_plugin.lang_2' ),
						icon: 'icon dashicons-editor-kitchensink',
						menu: [
							
							{
								text: ed.getLang( 'uix_sc_custom_tinymce_plugin.lang_3' ),
								onclick: function() {
									
									jQuery( '#uix_sc_form_recent_posts' ).trigger( 'click' );
								}
							},
							{
								text: ed.getLang( 'uix_sc_custom_tinymce_plugin.lang_4' ),
								menu: [
									{
										text: ed.getLang( 'uix_sc_custom_tinymce_plugin.lang_5' ),
										onclick: function() {
											jQuery( '#uix_sc_form_pricing_col3' ).trigger( 'click' );
										}
									},
									{
										text: ed.getLang( 'uix_sc_custom_tinymce_plugin.lang_6' ),
										onclick: function() {
											jQuery( '#uix_sc_form_pricing_col4' ).trigger( 'click' );
										}
									},
								
									
								]
							
							},
					
							{
								text: ed.getLang( 'uix_sc_custom_tinymce_plugin.lang_7' ),
								onclick: function() {
									jQuery( '#uix_sc_form_accordion' ).trigger( 'click' );
								}
							},	
										
							{
								text: ed.getLang( 'uix_sc_custom_tinymce_plugin.lang_8' ),
								onclick: function() {
									jQuery( '#uix_sc_form_tabs' ).trigger( 'click' );
								}
							},	
							
							{
								text: ed.getLang( 'uix_sc_custom_tinymce_plugin.lang_31' ),
								onclick: function() {
									jQuery( '#uix_sc_form_portfolio_grid' ).trigger( 'click' );
								}
							},						
							
							{
								text: ed.getLang( 'uix_sc_custom_tinymce_plugin.lang_9' ),
								menu: [
									{
										text: ed.getLang( 'uix_sc_custom_tinymce_plugin.lang_10' ),
										onclick: function() {
											jQuery( '#uix_sc_form_team_fullwidth' ).trigger( 'click' );
										}
									},
									{
										text: ed.getLang( 'uix_sc_custom_tinymce_plugin.lang_11' ),
										onclick: function() {
											jQuery( '#uix_sc_form_team_grid' ).trigger( 'click' );
										}
									},
								
									
								]
							
							},
							
							{
								text: ed.getLang( 'uix_sc_custom_tinymce_plugin.lang_12' ),
								menu: [
									{
										text: ed.getLang( 'uix_sc_custom_tinymce_plugin.lang_13' ),
										onclick: function() {
											jQuery( '#uix_sc_form_features_col2' ).trigger( 'click' );
										}
									},
									{
										text: ed.getLang( 'uix_sc_custom_tinymce_plugin.lang_14' ),
										onclick: function() {
											jQuery( '#uix_sc_form_features_col3' ).trigger( 'click' );
										}
									},
								
									
								]
							
							},	
							
							{
								text: ed.getLang( 'uix_sc_custom_tinymce_plugin.lang_15' ),
								menu: [
									{
										text: ed.getLang( 'uix_sc_custom_tinymce_plugin.lang_16' ),
										onclick: function() {
											jQuery( '#uix_sc_form_client_col3' ).trigger( 'click' );
										}
									},
									{
										text: ed.getLang( 'uix_sc_custom_tinymce_plugin.lang_17' ),
										onclick: function() {
											jQuery( '#uix_sc_form_client_col4' ).trigger( 'click' );
										}
									},
								
									
								]
							
							},	
							
							{
								text: ed.getLang( 'uix_sc_custom_tinymce_plugin.lang_18' ),
								onclick: function() {
									jQuery( '#uix_sc_testimonials' ).trigger( 'click' );
								}
							},		
									
							
							{
								text: ed.getLang( 'uix_sc_custom_tinymce_plugin.lang_19' ),
								onclick: function() {
									jQuery( '#uix_sc_form_video' ).trigger( 'click' );
								}
							},				
							
							{
								text: ed.getLang( 'uix_sc_custom_tinymce_plugin.lang_20' ),
								onclick: function() {
									jQuery( '#uix_sc_form_audio' ).trigger( 'click' );
								}
							},						
											
						]
							

					},
					
					/* -----------   */
					
					{
						
						text: ed.getLang( 'uix_sc_custom_tinymce_plugin.lang_21' ),
						icon: 'icon dashicons-text',
						menu: [
							
							{
								text: '',
								icon: 'icon uix-shortcodes-col uix-shortcodes-col-average-4',
								onclick: function() {
									jQuery( '#uix_sc_form_column_average_4' ).trigger( 'click' );
								}
							},
							{
								text: '',
								icon: 'icon uix-shortcodes-col uix-shortcodes-col-average-3',
								onclick: function() {
									jQuery( '#uix_sc_form_column_average_3' ).trigger( 'click' );
								}
							},
							{
								text: '',
								icon: 'icon uix-shortcodes-col uix-shortcodes-col-average-2',
								onclick: function() {
									jQuery( '#uix_sc_form_column_average_2' ).trigger( 'click' );
								}
							},
							
							{
								text: '',
								icon: 'icon uix-shortcodes-col uix-shortcodes-col-1_3-2_3',
								onclick: function() {
									jQuery( '#uix_sc_form_column_1_3__2_3' ).trigger( 'click' );
								}
							},
							
							{
								text: '',
								icon: 'icon uix-shortcodes-col uix-shortcodes-col-2_3-1_3',
								onclick: function() {
									jQuery( '#uix_sc_form_column_2_3__1_3' ).trigger( 'click' );
								}
							},									
							
							
							{
								text: '',
								icon: 'icon uix-shortcodes-col uix-shortcodes-col-1_4-3_4',
								onclick: function() {
									jQuery( '#uix_sc_form_column_1_4__3_4' ).trigger( 'click' );
								}
							},									
								{
								text: '',
								icon: 'icon uix-shortcodes-col uix-shortcodes-col-3_4-1_4',
								onclick: function() {
									jQuery( '#uix_sc_form_column_3_4__1_4' ).trigger( 'click' );
								}
							},				
							
							
							
						]
							

					},
					
				    /* -----------   */
				
					{
						text: ed.getLang( 'uix_sc_custom_tinymce_plugin.lang_22' ),
						icon: 'icon dashicons-admin-customizer',
						menu: [
						
							{
								text: ed.getLang( 'uix_sc_custom_tinymce_plugin.lang_23' ),
								onclick: function() {
									jQuery( '#uix_sc_heading' ).trigger( 'click' );
								}
							},	
					
							{
								text: ed.getLang( 'uix_sc_custom_tinymce_plugin.lang_24' ),
								onclick: function() {
									jQuery( '#uix_sc_dividing_line' ).trigger( 'click' );
								}
							},	
						
												
							{
								text: ed.getLang( 'uix_sc_custom_tinymce_plugin.lang_25' ),
								onclick: function() {
									jQuery( '#uix_sc_form_button' ).trigger( 'click' );
								}
							},
							{
								text: ed.getLang( 'uix_sc_custom_tinymce_plugin.lang_26' ),
								onclick: function() {
									jQuery( '#uix_sc_form_share_buttons' ).trigger( 'click' );
								}
							},	
							
							{
								text: ed.getLang( 'uix_sc_custom_tinymce_plugin.lang_27' ),
								onclick: function() {
									jQuery( '#uix_sc_form_icon' ).trigger( 'click' );
								}
							},
							
							{
								text: ed.getLang( 'uix_sc_custom_tinymce_plugin.lang_33' ),
								onclick: function() {
									jQuery( '#uix_sc_form_bar' ).trigger( 'click' );
								}
							},						
							
							
							{
								text: ed.getLang( 'uix_sc_custom_tinymce_plugin.lang_28' ),
								onclick: function() {
									jQuery( '#uix_sc_map' ).trigger( 'click' );
								}
							},			
							
							{
								text: ed.getLang( 'uix_sc_custom_tinymce_plugin.lang_29' ),
								onclick: function() {
									jQuery( '#uix_sc_contact_form' ).trigger( 'click' );
								}
							},			
							
							
							
						]
					},
					
				    /* -----------   */
				
					{
						text: ed.getLang( 'uix_sc_custom_tinymce_plugin.lang_30' ),
						icon: 'icon dashicons-editor-code',
						onclick: function() {
							jQuery( '#uix_sc_form_code' ).trigger( 'click' );
						}
					},
					
					
					
				]
			});
				

			
			
			
        },

        /**
         * Creates control instances based in the incomming name. This method is normally not
         * needed since the addButton method of the tinymce.Editor class is a more easy way of adding buttons
         * but you sometimes need to create more complex controls like listboxes, split buttons etc then this
         * method can be used to create those.
         *
         * @param {String} n Name of the control to create.
         * @param {tinymce.ControlManager} cm Control manager to use inorder to create new control.
         * @return {tinymce.ui.Control} New control instance or null if no control was created.
         */
        createControl : function(n, cm) {
            return null;
        },
		
		


    });
	
    // Register plugin
    tinymce.PluginManager.add( 'uix_SC', tinymce.plugins.uix_SC );
	
	
})();



