<?php
/**
* Field Type: Multiple Content Area
*
* @print: 


	<?php

	$_data = json_decode( get_post_meta( get_the_ID(), 'cus_page_ex_demoname_multicontent', true ), true );

	if ( is_array( $_data ) && sizeof( $_data ) > 0 ) {

		//Parse JSON data from Editor
		foreach( $_data as $index => $value ) {

			if ( is_array( $value ) && sizeof( $value ) > 0 ) {

				//level 1
				?>
				<section class="slide <?php echo esc_attr( Uix_Custom_Metaboxes::parse_json_data_from_editor( $value[ 'classname' ] ) ); ?>" id="<?php echo esc_attr( Uix_Custom_Metaboxes::parse_json_data_from_editor( $value[ 'id' ] ) ); ?>" data-level="<?php echo esc_attr( Uix_Custom_Metaboxes::parse_json_data_from_editor( $value[ 'level' ] ) ); ?>">

					<h3><?php echo esc_html( Uix_Custom_Metaboxes::parse_json_data_from_editor( $value[ 'name' ] ) ); ?></h3>
					<?php echo UixCmb::kses( Uix_Custom_Metaboxes::parse_json_data_from_editor( $value[ 'subtitle' ] ) ); ?>
					<hr>
					<?php echo UixCmb::kses( Uix_Custom_Metaboxes::parse_json_data_from_editor( $value[ 'value' ] ) ); ?>


				<?php   

				//level 2
				$level_2_content = $value[ 'content' ];
				if ( is_array( $level_2_content ) && sizeof( $level_2_content ) > 0 ) {

					foreach( $level_2_content as $index => $value ) {
					?>
						<div class="slide slide-child <?php echo esc_attr( Uix_Custom_Metaboxes::parse_json_data_from_editor( $value[ 'classname' ] ) ); ?>" id="<?php echo esc_attr( Uix_Custom_Metaboxes::parse_json_data_from_editor( $value[ 'id' ] ) ); ?>" data-level="<?php echo esc_attr( Uix_Custom_Metaboxes::parse_json_data_from_editor( $value[ 'level' ] ) ); ?>">

							<h3><?php echo esc_html( Uix_Custom_Metaboxes::parse_json_data_from_editor( $value[ 'name' ] ) ); ?></h3>
							<?php echo UixCmb::kses( Uix_Custom_Metaboxes::parse_json_data_from_editor( $value[ 'subtitle' ] ) ); ?>
							<hr>
							<?php echo UixCmb::kses( Uix_Custom_Metaboxes::parse_json_data_from_editor( $value[ 'value' ] ) ); ?>

						</div>  

					<?php
					} 

				}//endif $level_2_content

			?>
			</section>     
			<?php

			}//endif $value


		}//end foreach   

	}    

	?>  


*
*/
class UixCmbFormType_MultiContent extends Uix_Custom_Metaboxes {
	
	public static function add( $id = '', $title = '', $desc = '', $default = '', $options = '', $placeholder = '', $desc_primary = '', $enable_table = false ) {


		//---
		$project_custom_attrs = json_decode( $default, true );
		$label_title          = esc_html__( 'Title', 'uix-shortcodes' );
		$label_value          = esc_html__( 'Value', 'uix-shortcodes' );
		$label_subtitle       = esc_html__( 'Subtitle', 'uix-shortcodes' );
		$label_id             = esc_html__( 'ID', 'uix-shortcodes' );
		$label_level          = esc_html__( 'Level', 'uix-shortcodes' );
		$label_classname      = esc_html__( 'Class Name', 'uix-shortcodes' );
		$label_upbtn_remove   = esc_html__( 'Remove', 'uix-shortcodes' );
		$label_upbtn_add      = esc_html__( 'Add New', 'uix-shortcodes' );


		//Use only one column as a separate module
		$one_column = false;

		//editor options
		$editor_toolbar = 'formatselect fontselect forecolor backcolor bold italic underline strikethrough bullist numlist blockquote code alignleft aligncenter alignright uix_cmb_link uix_cmb_unlink | removeformat outdent indent superscript subscript hr uix_cmb_image uix_cmb_highlightcode media customCode fullscreen';
		$editor_toolbar_teeny = 'formatselect forecolor backcolor bold italic underline strikethrough alignleft aligncenter alignright uix_cmb_link uix_cmb_unlink removeformat customCode';

		$editor_height = 200;
		$editor_height_teeny = 50;

		//---
		if ( is_array ( $options ) ) {
			if ( isset( $options[ 'editor_toolbar' ] ) ) $editor_toolbar = $options[ 'editor_toolbar' ];
			if ( isset( $options[ 'editor_height' ] ) ) $editor_height = $options[ 'editor_height' ];
			if ( isset( $options[ 'editor_height_teeny' ] ) ) $editor_height_teeny = $options[ 'editor_height_teeny' ];
			if ( isset( $options[ 'editor_toolbar_teeny' ] ) ) $editor_toolbar_teeny = $options[ 'editor_toolbar_teeny' ];
			if ( isset( $options[ 'label_title' ] ) ) $label_title = $options[ 'label_title' ];
			if ( isset( $options[ 'label_value' ] ) ) $label_value = $options[ 'label_value' ];
			if ( isset( $options[ 'label_subtitle' ] ) ) $label_subtitle = $options[ 'label_subtitle' ];
			if ( isset( $options[ 'label_id' ] ) ) $label_id = $options[ 'label_id' ];
			if ( isset( $options[ 'label_level' ] ) ) $label_level = $options[ 'label_level' ];
			if ( isset( $options[ 'label_classname' ] ) ) $label_classname = $options[ 'label_classname' ];
			if ( isset( $options[ 'label_upbtn_remove' ] ) ) $label_upbtn_remove = $options[ 'label_upbtn_remove' ];
			if ( isset( $options[ 'label_upbtn_add' ] ) ) $label_upbtn_add = $options[ 'label_upbtn_add' ];

			//
			if ( isset( $options[ 'one_column' ] ) ) $one_column = $options[ 'one_column' ];

		}

		//level
		//Do not use "name" on <select>, because js may cause data to be empty and cannot be saved.
		$level_res = '<select class="uix-cmb__text--fullwidth uix-cmb__text--div--toggle__sel">';
		$level_res.= '<option value="">'.esc_html__( '-', 'uix-shortcodes' ).'</option>';

		if ( is_array( $project_custom_attrs ) && sizeof( $project_custom_attrs ) > 0 ) {


			//Parse JSON data from Editor
			foreach( $project_custom_attrs as $index => $value ) {


				if ( is_array( $value ) && sizeof( $value ) > 0 ) {


					//level 1
					$level_res.= '<option value="'.esc_attr( $value[ 'id' ] ).'">'.esc_html( $value[ 'name' ] ).'</option>';

					//level 2
//                        $level_2_content = $value[ 'content' ];
//                        if ( is_array( $level_2_content ) && sizeof( $level_2_content ) > 0 ) {
//
//
//                            foreach( $level_2_content as $index => $value ) {
//                                $level_res.= '<option value="'.esc_attr( $value[ 'id' ] ).'">&nbsp;&nbsp;&nbsp;&nbsp;'.esc_html( $value[ 'name' ] ).'</option>'; 
//                            }
//
//                        }//endif $level_2_content

				}//endif $value




			}//end foreach   


		}  
		$level_res .= '</select>';

		$temp = '

			<div class="uix-cmb__text--div uix-cmb__text--div--toggle {childstyle}">
				<a href="javascript:void(0);" class="uix-cmb__text--div--toggle__trigger"><svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" role="img" aria-hidden="true" focusable="false"><path fill="none" d="M0 0h24v24H0V0z"></path><path d="M3 17v4h4l11-11-4-4L3 17zm3 2H5v-1l9-9 1 1-9 9zM21 6l-3-3h-1l-2 2 4 4 2-2V6z"></path></svg><span>{name}</span></a>

			   <a href="javascript:void(0);" class="uix-cmb__custom-attributes-field__removebtn" title="'.esc_attr( $label_upbtn_remove ).'"><svg aria-hidden="true" role="img" focusable="false" class="dashicon dashicons-trash" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><path d="M12 4h3c.6 0 1 .4 1 1v1H3V5c0-.6.5-1 1-1h3c.2-1.1 1.3-2 2.5-2s2.3.9 2.5 2zM8 4h3c-.2-.6-.9-1-1.5-1S8.2 3.4 8 4zM4 7h11l-.9 10.1c0 .5-.5.9-1 .9H5.9c-.5 0-.9-.4-1-.9L4 7z"></path></svg></a>

				<div class="uix-cmb__text--div--toggle__div">


					<label class="uix-cmb__text--row">
						<p class="uix-cmb__description">
							'.esc_html( $label_title ).'
						</p>
						<input class="uix-cmb__text--fullwidth uix-cmb__text--div--toggle__title" name="'.esc_attr( $id ).'_attrs_title[]" value="{name}"><span class="important2">*</span>
					</label>


					<label class="uix-cmb__text--row">
						<p class="uix-cmb__description">
							'.esc_html( $label_id ).'
						</p>
						<input class="uix-cmb__text--fullwidth uix-cmb__text--div--toggle__id" name="'.esc_attr( $id ).'_attrs_id[]" value="{id}">
					</label>


					<label class="uix-cmb__text--row">
						<p class="uix-cmb__description">
							'.esc_html( $label_level ).'
						</p>
						<input type="hidden" class="uix-cmb__text--div--toggle__toggleSelect" name="'.esc_attr( $id ).'_attrs_level[]" value="{level}">
						'.$level_res.'
					</label>    



					<label class="uix-cmb__text--row">
						<p class="uix-cmb__description">
							'.esc_html( $label_classname ).'
						</p>
						<input class="uix-cmb__text--fullwidth" name="'.esc_attr( $id ).'_attrs_classname[]" value="{classname}">
					</label>   



					<label class="uix-cmb__text--row">
						<p class="uix-cmb__description">
							'.esc_html( $label_subtitle ).'
						</p>

						<div class="uix-cmb__mce-editor uix-cmb__mce-editor--multi" aria-init="0">

						   <textarea data-editor-toolbar="'.esc_attr( $editor_toolbar_teeny ).'" data-editor-height="'.esc_attr( $editor_height_teeny ).'" id="'.esc_attr( $id ).'-editor-sub-{id}" name="'.esc_attr( $id ).'_attrs_subtitle[]" >{subtitle}</textarea>

						</div>   


					</label>



					<label class="uix-cmb__text--row">
						<p class="uix-cmb__description">
							'.esc_html( $label_value ).'
						</p>

						<div class="uix-cmb__mce-editor uix-cmb__mce-editor--multi" aria-init="0">

						   <textarea data-editor-toolbar="'.esc_attr( $editor_toolbar ).'" data-editor-height="'.esc_attr( $editor_height ).'" id="'.esc_attr( $id ).'-editor-{id}" name="'.esc_attr( $id ).'_attrs_value[]" >{value}</textarea>

						</div>   


					</label>
				</div>


			</div>
		';


		$temp_attr = str_replace( '{name}', esc_html__( 'Untitled', 'uix-shortcodes' ), 
					 str_replace( '{value}', '',  
					 str_replace( '{level}', '',
					 str_replace( '{subtitle}', '',
					 str_replace( '{classname}', '',
					 str_replace( '{childstyle}', '',        
					 $temp 
					))))));

	?>

		<?php if ( $enable_table ) : ?>
		<tr>
			<th colspan="2">
		<?php endif; ?>	


				<!-- Begin Fields -->
				<div class="uix-cmb__wrapper uix-cmb__custom-attributes-field <?php echo esc_attr( $one_column? 'uix-cmb__wrapper--one-column' : '' ); ?>" data-append-id="<?php echo esc_attr( $id ); ?>_append" data-tmpl='<?php echo esc_attr( $temp_attr ); ?>'>


					<?php if ( ! $one_column ) : ?>

					<table class="form-table uix-cmb">


						<tr>
							<th class="uix-cmb__title">
								<label><?php echo self::kses( $title ); ?></label>
								<?php if ( !empty ( $desc ) ) { ?>
									<p class="uix-cmb__title_desc"><?php echo self::kses( $desc ); ?></p>
								<?php } ?>
							</th>
							<td>  

					<?php else: ?>	    

						<label><?php echo self::kses( $title ); ?></label>
						<?php if ( !empty ( $desc ) ) { ?>
							<p class="uix-cmb__title_desc"><?php echo self::kses( $desc ); ?></p>
						<?php } ?> 

					<?php endif; ?>	

								<?php
								if ( is_array( $project_custom_attrs ) && sizeof( $project_custom_attrs ) > 0 ) {


									//Parse JSON data from Editor
									foreach( $project_custom_attrs as $index => $value ) {


										if ( is_array( $value ) && sizeof( $value ) > 0 ) {


											//level 1
											echo str_replace( '{name}', esc_attr( self::parse_json_data_from_editor( $value[ 'name' ] ) ), 
														 str_replace( '{value}', esc_textarea( self::parse_json_data_from_editor( $value[ 'value' ] ) ),
														 str_replace( '{id}', esc_attr( self::parse_json_data_from_editor( $value[ 'id' ] ) ),
														 str_replace( '{level}', esc_attr( self::parse_json_data_from_editor( $value[ 'level' ] ) ),
														 str_replace( '{subtitle}', esc_textarea( self::parse_json_data_from_editor( $value[ 'subtitle' ] ) ),
														 str_replace( '{classname}', esc_attr( self::parse_json_data_from_editor( $value[ 'classname' ] ) ), 
														 str_replace( '{childstyle}', '', 
														 $temp 
														)))))));        


											//level 2
											$level_2_content = $value[ 'content' ];
											if ( is_array( $level_2_content ) && sizeof( $level_2_content ) > 0 ) {


												foreach( $level_2_content as $index => $value ) {
													echo str_replace( '{name}', esc_attr( self::parse_json_data_from_editor( $value[ 'name' ] ) ), 
																 str_replace( '{value}', esc_textarea( self::parse_json_data_from_editor( $value[ 'value' ] ) ),
																 str_replace( '{id}', esc_attr( self::parse_json_data_from_editor( $value[ 'id' ] ) ),
																 str_replace( '{level}', esc_attr( self::parse_json_data_from_editor( $value[ 'level' ] ) ),
																 str_replace( '{subtitle}', esc_textarea( self::parse_json_data_from_editor( $value[ 'subtitle' ] ) ),
																 str_replace( '{classname}', esc_attr( self::parse_json_data_from_editor( $value[ 'classname' ] ) ), 
																 str_replace( '{childstyle}', 'uix-cmb__text--div--toggle--child',        
																 $temp 
																)))))));        
												}



											}//endif $level_2_content

										}//endif $value




									}//end foreach
								} 
								?> 

								<div class="uix-cmb__custom-attributes-field__append__wrapper" id="<?php echo esc_attr( $id ); ?>_append"></div>   

								<div class="uix-cmb__custom-attributes-field__addbtn__wrapper">
									 <a href="javascript:void(0);" class="uix-cmb__custom-attributes-field__addbtn"><svg aria-hidden="true" role="img" focusable="false" class="dashicon dashicons-insert" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><path d="M10 1c-5 0-9 4-9 9s4 9 9 9 9-4 9-9-4-9-9-9zm0 16c-3.9 0-7-3.1-7-7s3.1-7 7-7 7 3.1 7 7-3.1 7-7 7zm1-11H9v3H6v2h3v3h2v-3h3V9h-3V6z"></path></svg><?php echo esc_html( $label_upbtn_add ); ?></a>
								</div>




							</td>
						</tr>	


					</table>
				</div>
				<!-- End Fields -->

				<?php if ( !empty ( $desc_primary ) ) { ?>
					<p class="uix-cmb__description"><?php echo self::kses( $desc_primary ); ?></p>
				<?php } ?>



		<?php if ( $enable_table ) : ?>
			</th>
		</tr>
		<?php endif; ?>

	<?php	
	}		

}
