# Uix Custom Meta Boxes ( For Uix Shortcodes and your Theme )

Provides a compatible solution for some personalized themes that require custom meta boxes for WordPress.

## Developers

[@uiux_lab](https://twitter.com/uiux_lab) 


## Tested under

- WP 4.2.*
- WP 4.3.*
- WP 4.4.1
- WP 4.4.2
- WP 4.5
- WP 4.5.1
- WP 4.5.2
- WP 4.5.3
- WP 4.6.*
- WP 4.7.*
- WP 4.8.*
- WP 4.9.*
- WP 5.1.*
- WP 5.2.*
- WP 5.3.*
- WP 5.4.*
- WP 5.5.*
- WP 5.6.*
- WP 5.7.*
- WP 6.0.*
- WP 6.1.*



## Usage


**Step 1.** Add include PHP files to WordPress theme or plugin.

```sh
require_once {your_directory}/uix-custom-metaboxes/init.php';
```


**Step 2.** Use the following API to add a custom meta boxes.

```sh
if ( class_exists( 'Uix_Custom_Metaboxes' ) ) {

	$custom_metaboxes_page_vars = array(

		//-- Group
		array(
			'config' => array( 
				'id'         =>  'yourtheme_metaboxes-1', 
				'title'      =>  esc_html__( '[Demo] Normal Fields', 'uix-shortcodes' ),
				'screen'     =>  'page', // page, post, uix_products, uix-slideshow, ...
				'context'    =>  'normal',
				'priority'   =>  'high',
				'fields' => array( 
					array(
						'id'          =>  'cus_page_ex_demoname_1',
						'type'        =>  'textarea',
						'title'       =>  esc_html__( 'Textarea', 'uix-shortcodes' ),
						'placeholder' =>  esc_html__( 'Placeholder Text', 'uix-shortcodes' ),
						'desc'        =>  esc_html__( 'Here is the description. It could be left blank. (Support for HTML tags)', 'uix-shortcodes' ),
						'default'     =>  '',
						'options'     =>  array( 
											'rows'  => 5	
										  )
					),
					array(
						'id'            =>  'cus_page_ex_demoname_2',
						'type'          =>  'text',
						'title'         =>  esc_html__( 'Text', 'uix-shortcodes' ),
						'desc_primary'  =>  esc_html__( 'Here is the description. It could be left blank.', 'uix-shortcodes' ),
						'default'       =>  '123',
					),

					array(
						'id'            =>  'cus_page_ex_demoname_3',
						'type'          =>  'url',
						'title'         =>  esc_html__( 'URL', 'uix-shortcodes' )
					),

					array(
						'id'          =>  'cus_page_ex_demoname_4',
						'type'        =>  'number',
						'title'       =>  esc_html__( 'Number', 'uix-shortcodes' ),
						'options'     =>  array( 
											'units'  =>  esc_html__( 'px', 'uix-shortcodes' )
										  )

					),



					array(
						'id'          =>  'cus_page_ex_demoname_5',
						'type'        =>  'radio',
						'title'       =>  esc_html__( 'Radio', 'uix-shortcodes' ),
						'default'     =>  '2',
						'options'     =>  array( 
											'radio_type'  => 'normal',
											'value'       => array(
												'1'            =>  esc_html__( 'Option: 1', 'uix-shortcodes' ),
												'2'            =>  esc_html__( 'Option: 2 (Default)', 'uix-shortcodes' ),
												'3'            =>  esc_html__( 'Option: 3', 'uix-shortcodes' ),	
											 )


										  )

					),

					array(
						'id'          =>  'cus_page_ex_demoname_5_2',
						'type'        =>  'radio',
						'title'       =>  esc_html__( 'Radio 2', 'uix-shortcodes' ),
						'options'     =>  array( 
											'br'          => true,
											'radio_type'  => 'normal',
											'value'       => array(
												'1'            =>  esc_html__( 'Option: 1', 'uix-shortcodes' ),
												'2'            =>  esc_html__( 'Option: 2', 'uix-shortcodes' ),
												'3'            =>  esc_html__( 'Option: 3', 'uix-shortcodes' ),	
											 )


										  )

					),



					array(
						'id'            =>  'cus_page_ex_demoname_6',
						'type'          =>  'radio',
						'title'         =>  esc_html__( 'Radio(Associated)', 'uix-shortcodes' ),
						'desc_primary'  =>  esc_html__( 'It is valid to assign height to page title area when the featured image is not empty.', 'uix-shortcodes' ),

						'default'     =>  'normal',
						'options'     =>  array( 
											'radio_type'  => 'normal',
											'value'       =>  array(
												'normal'       =>  esc_html__( 'Option: Normal(Default)', 'uix-shortcodes' ),
												'higher'       =>  esc_html__( 'Option: Higher', 'uix-shortcodes' ),
												'full-screen'  =>  esc_html__( 'Option: Full Screen', 'uix-shortcodes' ),
												'cus-height'   =>  esc_html__( 'Option: Custom Height', 'uix-shortcodes' ),
											 ),
											'toggle'      =>  array(
												'normal'       =>  '',
												'higher'       =>  '',
												'full-screen'  =>  array(
                                                                    'id'             =>  'cus_page_ex_demoname_6_opt-full-screen-toggle',
                                                                    'type'           =>  'text',
                                                                    'title'          =>  esc_html__( 'full-screen', 'uix-shortcodes' ),
                                                                    'desc_primary'   =>  '',
                                                                ),
												'cus-height'   =>  array( 
                                                                    'id'       =>  'cus_page_ex_demoname_6_opt-cus-height-toggle', 
                                                                    'type'     =>  'number',
                                                                    'default'  =>  350,
                                                                    'options'     =>  array( 
                                                                                        'units'  =>  esc_html__( 'px', 'uix-shortcodes' )
                                                                                      )
                                                                ),
											 ),
										  )

					),


					array(
						'id'            =>  'cus_page_ex_demoname_s6',
						'type'          =>  'radio',
						'title'         =>  esc_html__( 'Switch(Associated)', 'uix-shortcodes' ),
						'desc_primary'  =>  esc_html__( 'Can control multiple forms to display or hide.', 'uix-shortcodes' ),

						'default'     =>  'my-switch-1',
						'options'     =>  array( 
											'radio_type'  => 'switch',
											'value'       =>  array(
												'my-switch-1'       =>  esc_html__( 'My Switch 1', 'uix-shortcodes' ),
												'my-switch-2'       =>  esc_html__( 'My Switch 2', 'uix-shortcodes' )
											 ),
											'target_ids'      =>  array(
												'my-switch-1'       =>  '',
												'my-switch-2'       =>  array( 
																			'cus_page_ex_demoname_7', 
																			'cus_page_ex_demoname_8', 
																			'cus_page_ex_demoname_9'
																		),
											 ),
										  )

					),



					array(
						'id'          =>  'cus_page_ex_demoname_7',
						'type'        =>  'radio',
						'title'       =>  esc_html__( 'Radio Image', 'uix-shortcodes' ),
						'default'     =>  'no-sidebar',
						'options'     =>  array( 
											'radio_type'  => 'image',
											'value'       => array(
												'no-sidebar'    =>  esc_url( '/images/layouts/no-sidebar.png' ),
												'sidebar'       =>  esc_url( '/images/layouts/sidebar.png' ),
											 )


										  )

					),

					array(
						'id'            =>  'cus_page_ex_demoname_8',
						'type'          =>  'checkbox',
						'title'         =>  esc_html__( 'Checkbox', 'uix-shortcodes' ),
						'desc_primary'  =>  esc_html__( 'Here is the description. It could be left blank.', 'uix-shortcodes' ),

					),

					array(
						'id'          =>  'cus_page_ex_demoname_9',
						'type'        =>  'select',
						'title'       =>  esc_html__( 'Select', 'uix-shortcodes' ),
						'default'     =>  '3',
						'options'     =>  array( 
											'value'       => array(
												'1'            =>  esc_html__( 'Option: 1', 'uix-shortcodes' ),
												'2'            =>  esc_html__( 'Option: 2', 'uix-shortcodes' ),
												'3'            =>  esc_html__( 'Option: 3 (Default)', 'uix-shortcodes' ),	
											 )


										  )

					),

					array(
						'id'             =>  'cus_page_ex_demoname_10',
						'type'           =>  'price',
						'title'          =>  esc_html__( 'Price', 'uix-shortcodes' ),
						'desc_primary'   =>  esc_html__( 'Here is the description. It could be left blank.', 'uix-shortcodes' ),
						'options'        =>  array( 
											'units'  =>  esc_html__( '$', 'uix-shortcodes' )
										  )

					),

					array(
						'id'          =>  'cus_page_ex_demoname_11',
						'type'        =>  'multi-checkbox',
						'title'       =>  esc_html__( 'Multi Checkbox', 'uix-shortcodes' ),
						'default'     =>  array( 'opt-1', 'opt-3' ),
						'options'     =>  array( 
											'br'          => true,
											'value'       => array(
												'opt-1'            =>  esc_html__( 'Option: 1', 'uix-shortcodes' ),
												'opt-2'            =>  esc_html__( 'Option: 2', 'uix-shortcodes' ),
												'opt-3'            =>  esc_html__( 'Option: 3', 'uix-shortcodes' ),	
												'opt-4'            =>  esc_html__( 'Option: 4', 'uix-shortcodes' ),
												'opt-5'            =>  esc_html__( 'Option: 5', 'uix-shortcodes' ),
												'opt-6'            =>  esc_html__( 'Option: 6', 'uix-shortcodes' ),	
											 )


										  )

					),



				)
			)

		),

		//-- Group
		array(
			'config' => array( 
				'id'         =>  'yourtheme_metaboxes-2', 
				'title'      =>  esc_html__( '[Demo] Appearance Fields', 'uix-shortcodes' ),
				'screen'     =>  'page', // page, post, uix_products, uix-slideshow, ...
				'context'    =>  'normal',
				'priority'   =>  'high',
				'fields' => array( 
					array(
						'id'          =>  'cus_page_ex_demoname_appear_1',
						'type'        =>  'image',
						'title'       =>  esc_html__( 'Image or Video', 'uix-shortcodes' ),
						'placeholder' =>  esc_html__( 'Image or Video URL', 'uix-shortcodes' ),
                        'options'     =>  array( 
                                                'label_controller_up_remove'  => esc_html__( 'Remove', 'uix-shortcodes' ),
                                                'label_controller_up_add'     => esc_html__( 'Select a file', 'uix-shortcodes' )
                                          )
					),
					array(
						'id'       =>  'cus_page_ex_demoname_appear_2',
						'type'     =>  'color',
						'title'    =>  esc_html__( 'Color', 'uix-shortcodes' ),
					),
					array(
						'id'       =>  'cus_page_ex_demoname_appear_3',
						'type'     =>  'editor',
						'title'    =>  esc_html__( 'Editor', 'uix-shortcodes' ),
						'options'     =>  array( 
											'editor_height'   => 200,
											'editor_toolbar'  => 'formatselect fontselect forecolor backcolor bold italic underline strikethrough bullist numlist blockquote code alignleft aligncenter alignright uix_cmb_link uix_cmb_unlink | removeformat outdent indent superscript subscript hr uix_cmb_image uix_cmb_highlightcode media uix_cmb_customcode fullscreen'
										  )
					),
					array(
						'id'            =>  'cus_page_ex_demoname_appear_4',
						'type'          =>  'date',
						'title'         =>  esc_html__( 'Date', 'uix-shortcodes' ),
						'desc_primary'  =>  wp_kses_post( __( 'Enter date of your projects. <strong>(optional)</strong>', 'uix-shortcodes' ) ),
						'options'       =>  array( 
											'format'  => 'MM dd, yy',
										  )


					),

					array(
						'id'            =>  'cus_page_ex_demoname_attrs',
						'type'          =>  'custom-attrs',
						'title'         =>  esc_html__( 'Custom Attributes', 'uix-shortcodes' ),
						'options'       =>  array( 
                                                'one_column'         => false, //Use only one column as a separate module
                                                'label_title'        => esc_html__( 'Title', 'uix-shortcodes' ),
                                                'label_value'        => esc_html__( 'Value', 'uix-shortcodes' ),
                                                'label_upbtn_remove' => esc_html__( 'Remove', 'uix-shortcodes' ),
                                                'label_upbtn_add'    => esc_html__( 'Add New', 'uix-shortcodes' ),

										  )



					),
                    
                    
                    
					array(
						'id'            =>  'cus_page_ex_demoname_multicontent',
						'type'          =>  'multi-content',
						'title'         =>  esc_html__( 'Multiple Content Area', 'uix-shortcodes' ),
						'options'       =>  array( 
                                                'one_column'          => false, //Use only one column as a separate module
                                                'label_title'         => esc_html__( 'Title', 'uix-shortcodes' ),
                                                'label_value'         => esc_html__( 'Contnet', 'uix-shortcodes' ),
                                                'label_desc'          => esc_html__( 'Description', 'uix-shortcodes' ),
                                                'label_parent'        => esc_html__( 'Parent Category', 'uix-shortcodes' ),
                                                'label_classname'     => esc_html__( 'Class Name', 'uix-shortcodes' ),
                                                'label_upbtn_remove'  => esc_html__( 'Remove', 'uix-shortcodes' ),
                                                'label_upbtn_add'     => esc_html__( 'Add New', 'uix-shortcodes' ),
                                                'editor_height_teeny' => 50,
                                                'editor_toolbar_teeny'=> 'formatselect forecolor backcolor bold italic underline strikethrough alignleft aligncenter alignright uix_cmb_link uix_cmb_unlink removeformat uix_cmb_customcode',
                                                'editor_height'       => 450,
                                                'editor_toolbar'      => 'formatselect fontselect forecolor backcolor bold italic underline strikethrough bullist numlist blockquote code alignleft aligncenter alignright uix_cmb_link uix_cmb_unlink | removeformat outdent indent superscript subscript hr uix_cmb_image uix_cmb_highlightcode media uix_cmb_customcode fullscreen'
										  )



					),

                    array(
                        'id'            =>  'cus_page_ex_demoname_multiworks',
                        'type'          =>  'multi-portfolio',
                        'title'         =>  '',
                        'options'       =>  array( 
                                                'one_column'      => true, //Use only one column as a separate module
                                                'label_type'      => array( 
                                                    'file' => esc_html__( 'Files', 'uix-shortcodes' ),
                                                    'html' => esc_html__( 'Text', 'uix-shortcodes' )

                                                ),
                                                'label_lightbox'              => esc_html__( 'Enable Lightbox for this gallery?', 'uix-shortcodes' ),
                                                'label_controller_up_remove'  => esc_html__( 'Remove', 'uix-shortcodes' ),
                                                'label_controller_up_add'     => esc_html__( 'Select image or video', 'uix-shortcodes' ), 
                                                'label_html'           => esc_html__( 'Custom Content', 'uix-shortcodes' ),
                                                'label_file'           => esc_html__( 'Upload Your Files', 'uix-shortcodes' ),
                                                'label_upbtn_remove'   => esc_html__( 'Remove', 'uix-shortcodes' ),
                                                'label_upbtn_add_file' => esc_html__( 'Add Files', 'uix-shortcodes' ),
                                                'label_upbtn_add_html' => esc_html__( 'Add Text', 'uix-shortcodes' ),
                                                'editor_height'        => 300,
                                                'editor_toolbar'       => 'formatselect fontselect forecolor backcolor bold italic underline strikethrough bullist numlist blockquote code alignleft aligncenter alignright uix_cmb_link uix_cmb_unlink | removeformat outdent indent superscript subscript hr uix_cmb_image uix_cmb_highlightcode media uix_cmb_customcode fullscreen'
                                          )



                    ),      
                        

				)
			)

		),	
	);

	$custom_metaboxes_page = new Uix_Custom_Metaboxes( $custom_metaboxes_page_vars );
}

```


**Step 3.** Used in front-end pages:

```sh

//--------------------------------------
//Field Type: Editor
//--------------------------------------
//@print: 
    <?php
    echo wp_kses_post( get_post_meta( get_the_ID(), 'cus_page_ex_demoname_appear_3', true ) );
    ?>

//--------------------------------------
//Field Type: Checkbox
//--------------------------------------
//@print: 

    <?php
    echo ( get_post_meta( get_the_ID(), 'cus_page_ex_demoname_8', true ) ) ? esc_attr( '_blank' ) : esc_attr( '_self' ); 
    ?>

//--------------------------------------
//Field Type: Multiple CheckBox
//--------------------------------------
//@print: 

    <?php

    $_data = get_post_meta( get_the_ID(), 'cus_page_ex_demoname_11', true );
    $_echo = '';
    if ( !empty( $_data ) && is_array( $_data ) ) {

        foreach ( $_data as $value ) :
            $_echo .= $value.', ';
        endforeach; 
    }
    echo esc_attr( $_echo );  

    ?>

//--------------------------------------
//Field Type: Custom Attributes
//--------------------------------------
//@print: 

    <?php

    $_data = get_post_meta( get_the_ID(), 'cus_page_ex_demoname_attrs', true );

    if ( is_array( $_data ) && sizeof( $_data ) > 0 ) {

        foreach( $_data as $value ) {
        ?>
            <li>
                <strong><?php echo esc_html( $value[ 'name' ] ); ?></strong>
                <p>
                    <?php echo wp_kses_post( $value[ 'value' ] ); ?>
                </p>
            </li>
        <?php
        }
    } 

    ?>


//--------------------------------------
//Field Type: Multiple Content Area
//--------------------------------------
//@print: 


	<div class="slide-wrapper">
		<?php

			$all_data = get_post_meta( get_the_ID(), 'cus_page_ex_demoname_multicontent', true );

			//
			$all_data_res = is_array($all_data) ? json_decode( Uix_Custom_Metaboxes::format_json_str( $all_data[0]['all_data'] ), true ) : []; 
			$all_reverse_data_res = is_array($all_data) ? json_decode( Uix_Custom_Metaboxes::format_json_str( $all_data[0]['all_reverse_data'] ), true ) : []; // Reverse Order of Data


			//
			$_data = $all_data_res; 


			if ( is_array( $_data ) && sizeof( $_data ) > 0 ) {

				//Parse JSON data from Editor
				foreach( $_data as $index => $value ) {


					if ( is_array( $value ) && sizeof( $value ) > 0 ) {

						//Parent Category
						$parent = $value[ 'parent' ];

						?>
						<section class="slide <?php echo ( !empty($parent) ? 'slide-child' : ''); ?> <?php echo esc_attr( $value[ 'classname' ] ); ?>" id="<?php echo esc_attr( $value[ 'id' ] ); ?>" data-parent="<?php echo esc_attr( $parent ); ?>">

							<h3><?php echo esc_html( $value[ 'name' ] ); ?></h3>
							<?php echo wp_kses_post( $value[ 'desc' ] ); ?>
							<hr>
							<?php echo wp_kses_post( $value[ 'value' ] ); ?>


						</section> 



					<?php

					}//endif $value


				}//end foreach   

			}    


		?>

	</div>
	<script>
	//Move the child element to the previous element
	jQuery( document ).ready( function() {
		jQuery( '.slide' ).each( function()  {
			const root = $( this );
			const rootEl = root.attr( 'id' );
			jQuery( '.slide' ).each( function()  {
				if ( rootEl == $( this ).data( 'parent' ) ) jQuery( this ).appendTo( root );
			});

		});
	});
	</script>





//--------------------------------------
//Field Type: Multiple Portfolio Area
//--------------------------------------
//@print: 

    <?php
    $lightbox_enable = NULL;

    $_data = get_post_meta( get_the_ID(), 'cus_page_ex_demoname_multiworks', true );

    if ( is_array( $_data ) && sizeof( $_data ) > 1 ) {

        //----------
        foreach( $_data as $index => $value ) {
            if ( is_array( $value ) && sizeof( $value ) > 0 ) {

                //Exclude lightbox fields
                if ( array_key_exists( 'lightbox', $value ) ) {
                    $lightbox_enable = esc_attr( $value[ 'lightbox' ] );
                    break;
                }//endif array_key_exists( 'lightbox', $value )
            }//endif $value
        }//end foreach      


        //----------
        foreach( $_data as $index => $value ) {

            if ( is_array( $value ) && sizeof( $value ) > 0 ) {
                //Exclude lightbox fields
                if ( ! array_key_exists( 'lightbox', $value ) ) {

            ?>
                <div class="uix-portfolio-type-<?php echo esc_attr( $value[ 'type' ] ); ?>">

                    <?php
                    $img_url = $value[ 'filePath' ];

                    if ( !empty( $img_url ) ) {
                        echo '<img src="'.esc_url( $img_url ).'" alt="" '.( $lightbox_enable == 'on' ? 'class="lightbox"' : '' ).'>';
                    }
                    ?>

                    <?php echo wp_kses_post( Uix_Custom_Metaboxes::format_json_str( $value[ 'value' ] ) ); ?>

                </div>     
            <?php

                }//endif array_key_exists( 'lightbox', $value )

            }//endif $value


        }//end foreach   

    }    

    ?>      
```

**Step 4.** Configuration:

Modify the `$directory` variable in `init.php` to your own directory.



**Step 5.** ( Optional ) Added filter for current Custom Metaboxes. Add the following code to your theme or plugin:

```sh
// Custom metaboxes
//----------------------
if ( !function_exists( 'mytheme_uix_modify_vars' ) ) {
    add_filter( 'uix_custom_metaboxes_vars', 'mytheme_uix_modify_vars' );
    function mytheme_uix_modify_vars() {

        $all_config = array();
        $config  = array(

                //-- Settings 1
                array(
                    'config' => array( ... )
                ),

               //-- Settings 2
                array(
                    'config' => array( ... )
                ),

            );

        array_push( $all_config, $config );

        return $all_config;

    } 
}



// Custom publish page
//----------------------
if ( !function_exists( 'mytheme_uix_publish_page' ) ) {
    add_action( 'admin_enqueue_scripts' , 'mytheme_uix_publish_page' );
    function mytheme_uix_publish_page() {
        $currentScreen = get_current_screen();

        if ( $currentScreen->id == 'custom-post-type' ) {

            //Hide editor
            $custom_css = "
            #postdivrich {
                display: none;
            }";
            wp_add_inline_style( 'your-style-slug', $custom_css ); 


            //Disable excerpt
            remove_meta_box( 'postexcerpt', 'custom-post-type', 'normal' ); 

        }

    }

}
```



## Updates


##### = 2.2 (October 24, 2022) =

* Fix: Fixed some form character escaping issues.
* Tweak: Data Sanitized, Escaped, and Validated.
* Tweak: Simplify the process of data storage.



##### = 2.0 (July 5, 2021) =

* Fix: Fixed the display and escaping problem of the code block in the editor.
* Tweak: Performance optimization of dynamic forms (use virtual tree to update dom).



##### = 1.9 (December 8, 2020) =

* Tweak: Upgraded the uploading control.


##### = 1.8 (October 21, 2020) =

* Tweak: Refactored structure of the custom metaboxes controller.
* Tweak: Beautify the appearance of the editor.
* New: Added the switch using radios, which can control the hide and display of other fields.
* New: Added color selector transparency settings.


##### = 1.7 (October 13, 2020) =

* Tweak: When the editor inserts a video, it will automatically be converted into a video tag.
* New: According to the language of the theme, the editor automatically supports multiple languages.


##### = 1.6 (December 31, 2019) =

* New: Added support for video formats.


##### = 1.4 (November 11, 2019) =

* Fix: Fixed button trigger event for uploading image control.
* Dev: New loop fields control for richer release types.
* Tweak: Optimized scalability for components such as uploads.



##### = 1.3.2 (September 18, 2019) =

* Tweak: Enhance the functionality of the uix custom metabox.
* Tweak: MCEEditor upgrade in form component.


##### = 1.3.1  (September 24, 2019) =

* Dev: Added filter `add_filter( 'uix_custom_metaboxes_vars', 'mytheme_modify_vars' );` for current Custom Metaboxes.


##### = 1.3.0  (September 18, 2019) =

* Tweak: MCEEditor upgrade in form component.
* Tweak: Upgrade Fontawesome to 5.0+.


##### = 0.0.5 (January 22, 2017) =

* Tweak: Optimized enqueue scripts for front-end.
* Tweak: Enhanced theme compatibility.



##### = 0.0.1 (January 17, 2017) =

* First release.



## Licensing

Licensed under the [MIT](https://opensource.org/licenses/MIT).

