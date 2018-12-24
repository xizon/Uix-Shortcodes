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
			
       
			var demo_button = '';
			
			if ( ed.getLang( 'uix_sc_custom_tinymce_plugin.lang_demo_enable' ) == 1 ) {

				demo_button = {
					text: ed.getLang( 'uix_sc_custom_tinymce_plugin.lang_demo_4' ),
					icon: 'icon dashicons-search',
					menu: [
						{
							text: ed.getLang( 'uix_sc_custom_tinymce_plugin.lang_demo_1' ),
							classes: 'uix-widget-btn uix_sc_module_sample_hello-widget_btn',
							onclick: function() {

							}
						},
						{
							text: ed.getLang( 'uix_sc_custom_tinymce_plugin.lang_demo_2' ),
							classes: 'uix-widget-btn uix_sc_module_sample_hello2-widget_btn',
							onclick: function() {

							}
						},
						{
							text: ed.getLang( 'uix_sc_custom_tinymce_plugin.lang_demo_3' ),
							onclick: function() {

								ed.insertContent('Hello World!');
							}
						}



					]
				}

			}
			

			ed.addButton( 'uix_shortcode_btn', {
				text: '',
				title: ed.getLang( 'uix_sc_custom_tinymce_plugin.lang_1' ),
				icon: 'mce-i-icon uix-shortcodes-icon',
				type: 'menubutton',
				onclick: function() { 
					
					/*-- Table Background  --*/
					//jQuery( '.uixscform-table-list:odd' ).addClass( 'even' );
					
					
				},
				menu: [
				
				    /* -----------   */
					demo_button,
					
				    /* -----------   */
				
					{
						text: ed.getLang( 'uix_sc_custom_tinymce_plugin.lang_32' ),
						icon: 'icon dashicons-desktop',
						classes: 'uix-widget-btn uix_sc_module_container-widget_btn',
						onclick: function() {
							
						}
					},
					
					
					/* -----------   */
					
					{
						
						text: ed.getLang( 'uix_sc_custom_tinymce_plugin.lang_2' ),
						icon: 'icon dashicons-editor-kitchensink',
						menu: [
							
							{
								text: ed.getLang( 'uix_sc_custom_tinymce_plugin.lang_3' ),
								classes: 'uix-widget-btn uix_sc_module_recent_posts-widget_btn',
								onclick: function() {
									
								}
							},
							{
								text: ed.getLang( 'uix_sc_custom_tinymce_plugin.lang_4' ),
								menu: [
									{
										text: ed.getLang( 'uix_sc_custom_tinymce_plugin.lang_5' ),
										classes: 'uix-widget-btn uix_sc_module_pricing_col3-widget_btn',
										onclick: function() {
										}
									},
									{
										text: ed.getLang( 'uix_sc_custom_tinymce_plugin.lang_6' ),
										classes: 'uix-widget-btn uix_sc_module_pricing_col4-widget_btn',
										onclick: function() {
										}
									},
								
									
								]
							
							},
					
							{
								text: ed.getLang( 'uix_sc_custom_tinymce_plugin.lang_7' ),
								classes: 'uix-widget-btn uix_sc_module_accordion-widget_btn',
								onclick: function() {
								}
							},	
										
							{
								text: ed.getLang( 'uix_sc_custom_tinymce_plugin.lang_8' ),
								classes: 'uix-widget-btn uix_sc_module_tabs-widget_btn',
								onclick: function() {
								}
							},	
							
							{
								text: ed.getLang( 'uix_sc_custom_tinymce_plugin.lang_31' ),
								classes: 'uix-widget-btn uix_sc_module_portfolio_grid-widget_btn',
								onclick: function() {
								}
							},						
							
							{
								text: ed.getLang( 'uix_sc_custom_tinymce_plugin.lang_9' ),
								menu: [
									{
										text: ed.getLang( 'uix_sc_custom_tinymce_plugin.lang_10' ),
										classes: 'uix-widget-btn uix_sc_module_team_fullwidth-widget_btn',
										onclick: function() {
										}
									},
									{
										text: ed.getLang( 'uix_sc_custom_tinymce_plugin.lang_11' ),
										classes: 'uix-widget-btn uix_sc_module_team_grid-widget_btn',
										onclick: function() {
										}
									},
								
									
								]
							
							},
							
							{
								text: ed.getLang( 'uix_sc_custom_tinymce_plugin.lang_12' ),
								menu: [
									{
										text: ed.getLang( 'uix_sc_custom_tinymce_plugin.lang_13' ),
										classes: 'uix-widget-btn uix_sc_module_features_col2-widget_btn',
										onclick: function() {
										}
									},
									{
										text: ed.getLang( 'uix_sc_custom_tinymce_plugin.lang_14' ),
										classes: 'uix-widget-btn uix_sc_module_features_col3-widget_btn',
										onclick: function() {
										}
									},
								
									
								]
							
							},	
							
							{
								text: ed.getLang( 'uix_sc_custom_tinymce_plugin.lang_15' ),
								classes: 'uix-widget-btn uix_sc_module_client-widget_btn',
								onclick: function() {
								}
							},
							
							{
								text: ed.getLang( 'uix_sc_custom_tinymce_plugin.lang_18' ),
								classes: 'uix-widget-btn uix_sc_module_testimonials-widget_btn',
								onclick: function() {
								}
							},		
									
							
							{
								text: ed.getLang( 'uix_sc_custom_tinymce_plugin.lang_19' ),
								classes: 'uix-widget-btn uix_sc_module_video-widget_btn',
								onclick: function() {
								}
							},				
							
							{
								text: ed.getLang( 'uix_sc_custom_tinymce_plugin.lang_20' ),
								classes: 'uix-widget-btn uix_sc_module_audio-widget_btn',
								onclick: function() {
								}
							},	
							
							
							{
								text: ed.getLang( 'uix_sc_custom_tinymce_plugin.lang_34' ),
								classes: 'uix-widget-btn uix_sc_module_authorcard-widget_btn',
								onclick: function() {
								}
							},	
							
							{
								text: ed.getLang( 'uix_sc_custom_tinymce_plugin.lang_16' ),
								classes: 'uix-widget-btn uix_sc_module_imageslider-widget_btn',
								onclick: function() {
								}
							},	
							
							{
								text: ed.getLang( 'uix_sc_custom_tinymce_plugin.lang_17' ),
								classes: 'uix-widget-btn uix_sc_module_timeline-widget_btn',
								onclick: function() {
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
								classes: 'uix-widget-btn uix_sc_module_column_average_4-widget_btn',
								onclick: function() {
								}
							},
							{
								text: '',
								icon: 'icon uix-shortcodes-col uix-shortcodes-col-average-3',
								classes: 'uix-widget-btn uix_sc_module_column_average_3-widget_btn',
								onclick: function() {
								}
							},
							{
								text: '',
								icon: 'icon uix-shortcodes-col uix-shortcodes-col-average-2',
								classes: 'uix-widget-btn uix_sc_module_column_average_2-widget_btn',
								onclick: function() {
								}
							},
							
							{
								text: '',
								icon: 'icon uix-shortcodes-col uix-shortcodes-col-1_3-2_3',
								classes: 'uix-widget-btn uix_sc_module_column_1_3__2_3-widget_btn',
								onclick: function() {
								}
							},
							
							{
								text: '',
								icon: 'icon uix-shortcodes-col uix-shortcodes-col-2_3-1_3',
								classes: 'uix-widget-btn uix_sc_module_column_2_3__1_3-widget_btn',
								onclick: function() {
								}
							},									
							
							
							{
								text: '',
								icon: 'icon uix-shortcodes-col uix-shortcodes-col-1_4-3_4',
								classes: 'uix-widget-btn uix_sc_module_column_1_4__3_4-widget_btn',
								onclick: function() {
								}
							},									
								{
								text: '',
								icon: 'icon uix-shortcodes-col uix-shortcodes-col-3_4-1_4',
								classes: 'uix-widget-btn uix_sc_module_column_3_4__1_4-widget_btn',
								onclick: function() {
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
								classes: 'uix-widget-btn uix_sc_module_heading-widget_btn',
								onclick: function() {
								}
							},	
					
							{
								text: ed.getLang( 'uix_sc_custom_tinymce_plugin.lang_24' ),
								classes: 'uix-widget-btn uix_sc_module_dividing_line-widget_btn',
								onclick: function() {
								}
							},	
						
												
							{
								text: ed.getLang( 'uix_sc_custom_tinymce_plugin.lang_25' ),
								classes: 'uix-widget-btn uix_sc_module_button-widget_btn',
								onclick: function() {
								}
							},
							{
								text: ed.getLang( 'uix_sc_custom_tinymce_plugin.lang_26' ),
								classes: 'uix-widget-btn uix_sc_module_share_buttons-widget_btn',
								onclick: function() {
								}
							},	
							
							{
								text: ed.getLang( 'uix_sc_custom_tinymce_plugin.lang_27' ),
								classes: 'uix-widget-btn uix_sc_module_icon-widget_btn',
								onclick: function() {
								}
							},
							
							{
								text: ed.getLang( 'uix_sc_custom_tinymce_plugin.lang_33' ),
								classes: 'uix-widget-btn uix_sc_module_bar-widget_btn',
								onclick: function() {
								}
							},						
							
							
							{
								text: ed.getLang( 'uix_sc_custom_tinymce_plugin.lang_28' ),
								classes: 'uix-widget-btn uix_sc_module_map-widget_btn',
								onclick: function() {
								}
							},			
							
							{
								text: ed.getLang( 'uix_sc_custom_tinymce_plugin.lang_29' ),
								classes: 'uix-widget-btn uix_sc_module_contact_form-widget_btn',
								onclick: function() {
								}
							},			
							
							
							
						]
					},
					
				    /* -----------   */
				
					{
						text: ed.getLang( 'uix_sc_custom_tinymce_plugin.lang_30' ),
						icon: 'icon dashicons-editor-code',
						classes: 'uix-widget-btn uix_sc_module_code-widget_btn',
						onclick: function() {
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



