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
				title: 'Uix Shortcodes',
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
						text: 'Demo',
						icon: 'icon dashicons-search',
						menu: [
							{
								text: 'Hello Form',
								onclick: function() {
					
									jQuery( '#uix_sc_form_hello' ).trigger( 'click' );
									

														
								}
							},
							{
								text: 'Column Form',
								onclick: function() {
									
									jQuery( '#uix_sc_form_hello2' ).trigger( 'click' );
								}
							},
							{
								text: 'Text',
								onclick: function() {
					
									ed.insertContent('Hello World!');
								}
							}
						
							
							
						]
					},
					*/
					
					
					
					/* -----------   */
					
					{
						
						text: 'Content',
						icon: 'icon dashicons-editor-kitchensink',
						menu: [
							
							{
								text: 'Recent Posts',
								onclick: function() {
									
									jQuery( '#uix_sc_form_recent_posts' ).trigger( 'click' );
								}
							},
							{
								text: 'Pricing',
								menu: [
									{
										text: 'Pricing 3 Column',
										onclick: function() {
											jQuery( '#uix_sc_form_pricing_col3' ).trigger( 'click' );
										}
									},
									{
										text: 'Pricing 4 Column',
										onclick: function() {
											jQuery( '#uix_sc_form_pricing_col4' ).trigger( 'click' );
										}
									},
								
									
								]
							
							},
					
							{
								text: 'Accordion',
								onclick: function() {
									jQuery( '#uix_sc_form_accordion' ).trigger( 'click' );
								}
							},	
										
							{
								text: 'Tabs',
								onclick: function() {
									jQuery( '#uix_sc_form_tabs' ).trigger( 'click' );
								}
							},	
							
							{
								text: 'Team',
								menu: [
									{
										text: 'Team Full Width',
										onclick: function() {
											jQuery( '#uix_sc_form_team_fullwidth' ).trigger( 'click' );
										}
									},
									{
										text: 'Team 4 Column',
										onclick: function() {
											jQuery( '#uix_sc_form_team_col4' ).trigger( 'click' );
										}
									},
								
									
								]
							
							},
							
							{
								text: 'Features',
								menu: [
									{
										text: 'Features 2 Column',
										onclick: function() {
											jQuery( '#uix_sc_form_features_col2' ).trigger( 'click' );
										}
									},
									{
										text: 'Features 3 Column',
										onclick: function() {
											jQuery( '#uix_sc_form_features_col3' ).trigger( 'click' );
										}
									},
								
									
								]
							
							},	
							
							{
								text: 'Client',
								menu: [
									{
										text: 'Client 3 Column',
										onclick: function() {
											jQuery( '#uix_sc_form_client_col3' ).trigger( 'click' );
										}
									},
									{
										text: 'Client 4 Column',
										onclick: function() {
											jQuery( '#uix_sc_form_client_col4' ).trigger( 'click' );
										}
									},
								
									
								]
							
							},	
							
							{
								text: 'Testimonials',
								onclick: function() {
									jQuery( '#uix_sc_testimonials' ).trigger( 'click' );
								}
							},		
									
							
							{
								text: 'Responsive Video',
								onclick: function() {
									jQuery( '#uix_sc_form_video' ).trigger( 'click' );
								}
							},				
							
							{
								text: 'Audio',
								onclick: function() {
									jQuery( '#uix_sc_form_audio' ).trigger( 'click' );
								}
							},						
											
						]
							

					},
					
					/* -----------   */
					
					{
						
						text: 'Column',
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
						text: 'Web Elements',
						icon: 'icon dashicons-admin-customizer',
						menu: [
						
							{
								text: 'Special Heading',
								onclick: function() {
									jQuery( '#uix_sc_heading' ).trigger( 'click' );
								}
							},	
					
							{
								text: 'Dividing Line',
								onclick: function() {
									jQuery( '#uix_sc_dividing_line' ).trigger( 'click' );
								}
							},	
						
												
							{
								text: 'Button',
								onclick: function() {
									jQuery( '#uix_sc_form_button' ).trigger( 'click' );
								}
							},
							{
								text: 'Share Buttons',
								onclick: function() {
									jQuery( '#uix_sc_form_share_buttons' ).trigger( 'click' );
								}
							},	
							
							{
								text: 'Icon',
								onclick: function() {
									jQuery( '#uix_sc_form_icon' ).trigger( 'click' );
								}
							},
							
							{
								text: 'Google Map',
								onclick: function() {
									jQuery( '#uix_sc_map' ).trigger( 'click' );
								}
							},			
							
		
							
							
						]
					},
					
				    /* -----------   */
				
					{
						text: 'Code',
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



