<?php
/**
* Field Type: Multiple Portfolio Area
*
* @print: 
z
	<?php
	$lightbox_enable = NULL;

	$_data = json_decode( get_post_meta( get_the_ID(), 'cus_page_ex_demoname_multiworks', true ), true );

	if ( is_array( $_data ) && sizeof( $_data ) > 1 ) {

		//----------
		foreach( $_data as $index => $value ) {
			if ( is_array( $value ) && sizeof( $value ) > 0 ) {

				//Exclude lightbox fields
				if ( array_key_exists( 'lightbox', $value ) ) {
					$lightbox_enable = esc_attr( Uix_Custom_Metaboxes::parse_json_data_from_editor( $value[ 'lightbox' ] ) );
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
				<div class="uix-shortcodes-portfolio-type-<?php echo esc_attr( Uix_Custom_Metaboxes::parse_json_data_from_editor( $value[ 'type' ] ) ); ?>">

					<?php
					$img_url = Uix_Custom_Metaboxes::parse_json_data_from_editor( $value[ 'filePath' ] );

					if ( !empty( $img_url ) ) {
						echo '<img src="'.esc_url( $img_url ).'" alt="" '.( $lightbox_enable == 'on' ? 'class="lightbox"' : '' ).'>';
					}
					?>

					<?php echo UixCmb::kses( Uix_Custom_Metaboxes::parse_json_data_from_editor( $value[ 'value' ] ) ); ?>

				</div>     
			<?php

				}//endif array_key_exists( 'lightbox', $value )

			}//endif $value


		}//end foreach   

	}    

	?>    



*
*/
class UixCmbFormType_MultiPortfolio extends Uix_Custom_Metaboxes {
	

	public static function add( $id = '', $title = '', $desc = '', $default = '', $options = '', $placeholder = '', $desc_primary = '', $enable_table = false ) {


		//---
		$project_custom_attrs = json_decode( $default, true );
		$label_type           = array( 
									'file' => esc_html__( 'Files', 'uix-shortcodes' ),
									'html' => esc_html__( 'Text', 'uix-shortcodes' )
								);
		$label_html           = esc_html__( 'Custom Content', 'uix-shortcodes' );
		$label_file           = esc_html__( 'Upload Your Files', 'uix-shortcodes' );
		$label_upbtn_remove   = esc_html__( 'Remove', 'uix-shortcodes' );
		$label_upbtn_add_file = esc_html__( 'Add Files', 'uix-shortcodes' );
		$label_upbtn_add_html = esc_html__( 'Add Text', 'uix-shortcodes' );

		//upload
		$label_controller_up_remove   = esc_attr__( 'Remove', 'uix-shortcodes' );
		$label_controller_up_add      = esc_html__( 'Select image or video', 'uix-shortcodes' );

		//lightbox
		$label_lightbox = esc_html__( 'Enable Lightbox for this gallery?', 'uix-shortcodes' );

		//Use only one column as a separate module
		$one_column = false;


		//editor options
		$editor_toolbar = 'formatselect fontselect forecolor backcolor bold italic underline strikethrough bullist numlist blockquote code alignleft aligncenter alignright uix_cmb_link uix_cmb_unlink | removeformat outdent indent superscript subscript hr uix_cmb_image uix_cmb_highlightcode media customCode fullscreen';

		$editor_height = 200;


		//---
		if ( is_array ( $options ) ) {
			if ( isset( $options[ 'editor_toolbar' ] ) ) $editor_toolbar = $options[ 'editor_toolbar' ];
			if ( isset( $options[ 'editor_height' ] ) ) $editor_height = $options[ 'editor_height' ];
			if ( isset( $options[ 'label_type' ] ) ) $label_type = $options[ 'label_type' ];
			if ( isset( $options[ 'label_html' ] ) ) $label_html = $options[ 'label_html' ];
			if ( isset( $options[ 'label_file' ] ) ) $label_file = $options[ 'label_file' ];
			if ( isset( $options[ 'label_upbtn_remove' ] ) ) $label_upbtn_remove = $options[ 'label_upbtn_remove' ];
			if ( isset( $options[ 'label_upbtn_add_file' ] ) ) $label_upbtn_add_file = $options[ 'label_upbtn_add_file' ];
			if ( isset( $options[ 'label_upbtn_add_html' ] ) ) $label_upbtn_add_html = $options[ 'label_upbtn_add_html' ];
			if ( isset( $options[ 'label_controller_up_remove' ] ) ) $label_controller_up_remove = $options[ 'label_controller_up_remove' ];
			if ( isset( $options[ 'label_controller_up_add' ] ) ) $label_controller_up_add = $options[ 'label_controller_up_add' ]; 
			if ( isset( $options[ 'label_lightbox' ] ) ) $label_lightbox = $options[ 'label_lightbox' ]; 

			//
			if ( isset( $options[ 'one_column' ] ) ) $one_column = $options[ 'one_column' ];


		}


		//type
		//Do not use "name" on <select>, because js may cause data to be empty and cannot be saved.
		$type_res = '<select class="uix-cmb__text--fullwidth uix-cmb__text--div--toggle__simple-sel">';
		if ( is_array( $label_type ) && sizeof( $label_type ) > 0 ) {
			$i = 0;
			foreach( $label_type as $index => $value ) {
				$checked = ( $i == 0 ) ? 'selected' : '';
				$type_res .= '<option value="'.esc_attr( $index ).'" '.$checked.'>'.esc_html( $value ).'</option>'; 

				$i++;
			}
		}//endif $label_type       
		$type_res .= '</select>';


		//level
		$temp = '

			<div class="uix-cmb__text--div uix-cmb__text--div--toggle uix-cmb__text--div--toggle--sortable">
				<a href="javascript:void(0);" class="uix-cmb__text--div--toggle__trigger"><svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" role="img" aria-hidden="true" focusable="false"><path fill="none" d="M0 0h24v24H0V0z"></path><path d="M3 17v4h4l11-11-4-4L3 17zm3 2H5v-1l9-9 1 1-9 9zM21 6l-3-3h-1l-2 2 4 4 2-2V6z"></path></svg><span>{type}</span></a>

				<a href="javascript:void(0);" class="uix-cmb__custom-attributes-field__sortablebtn">
				  <svg width="15" height="15" aria-hidden="true" role="img" focusable="false" class="dashicon dashicons-trash" viewBox="0 0 51 58"xmlns="http://www.w3.org/2000/svg"><g fill="rgb(0,0,0)" fill-rule="nonzero" transform="translate(0 -1)"><path id="Shape" d="m25.9969 20h6v33c0 .5522847.4477153 1 1 1h10c.5522847 0 1-.4477153 1-1v-33h6c.3708398.002689.7118642-.2028062.8827573-.5319337s.1427857-.7262873-.0727573-1.0280663l-11.97-17.03c-.1884296-.25921249-.4895366-.41258597-.81-.41258597s-.6215704.15337348-.81.41258597l-3.12 4.42-6.93 9.81-1.98 2.8c-.215543.301779-.2436504.6989388-.0727573 1.0280663s.5119175.5346227.8827573.5319337z"/><path id="Shape" d="m2.1731 44.3575 6.93 9.81 3.12 4.42c.1884555.2591733.4895531.4125159.81.4125159s.6215445-.1533426.81-.4125159l11.97-17.03c.215543-.301779.2436504-.6989388.0727573-1.0280663s-.5119175-.5346227-.8827573-.5319337h-6v-32.9975c0-.55228475-.4477153-1-1-1h-10c-.55228475 0-1 .44771525-1 1v32.9975h-6c-.37083976-.002689-.71186417.2028062-.88275728.5319337-.17089312.3291275-.14278572.7262873.07275728 1.0280663z"/></g></svg>
				</a>


			   <a href="javascript:void(0);" class="uix-cmb__custom-attributes-field__removebtn" title="'.esc_attr( $label_upbtn_remove ).'"><svg aria-hidden="true" role="img" focusable="false" class="dashicon dashicons-trash" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><path d="M12 4h3c.6 0 1 .4 1 1v1H3V5c0-.6.5-1 1-1h3c.2-1.1 1.3-2 2.5-2s2.3.9 2.5 2zM8 4h3c-.2-.6-.9-1-1.5-1S8.2 3.4 8 4zM4 7h11l-.9 10.1c0 .5-.5.9-1 .9H5.9c-.5 0-.9-.4-1-.9L4 7z"></path></svg></a>

				<div class="uix-cmb__text--div--toggle__div">


					<label class="uix-cmb__text--row" style="display:none;">
						<input type="hidden" name="'.esc_attr( $id ).'_attrs_type[]" value="{type}">
						'.$type_res.'
					</label>    



					<label class="uix-cmb__text--row" data-type="file">
						<p class="uix-cmb__description">
							'.esc_html( $label_file ).'
						</p>
						<div class="uix-cmb__upload-wrapper">
							'.Uix_Cmb_UploadMedia::add( array(
								'title'          => '',
								'child'          => true,
								'id'             => esc_attr( $id ).'_attrs_file-{id}',
								'name'           => esc_attr( $id ).'_attrs_file[]',
								'value'          => '{filePath}',
								'label_remove'   => esc_attr( $label_controller_up_remove ),
								'label_add'      => esc_html( $label_controller_up_add ),
							), false ).'
						</div>  

					</label>                        


					<label class="uix-cmb__text--row" data-type="html">
						<p class="uix-cmb__description">
							'.esc_html( $label_html ).'
						</p>

						<div class="uix-cmb__mce-editor uix-cmb__mce-editor--multi" aria-init="0">

						   <textarea data-editor-toolbar="'.esc_attr( $editor_toolbar ).'" data-editor-height="'.esc_attr( $editor_height ).'" id="'.esc_attr( $id ).'-editor-{id}" name="'.esc_attr( $id ).'_attrs_value[]" >{value}</textarea>

						</div>   


					</label>
				</div>


			</div>
		';


		$temp_attr = str_replace( '{type}', '', 
					 str_replace( '{value}', '',  
					 str_replace( '{filePath}', '',     
					 $temp 
					)));

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

								$lightbox_enable = NULL;
								$item_code = '';
								if ( is_array( $project_custom_attrs ) && sizeof( $project_custom_attrs ) > 0 ) {


									//Parse JSON data from Editor
									foreach( $project_custom_attrs as $value ) {

										if ( is_array( $value ) && sizeof( $value ) > 0 ) { 


											//Exclude lightbox fields
											if ( array_key_exists( 'lightbox', $value ) ) {
												$lightbox_enable = esc_attr( self::parse_json_data_from_editor( $value[ 'lightbox' ] ) );
											} else {
												$item_code .= str_replace( '{type}', esc_attr( self::parse_json_data_from_editor( $value[ 'type' ] ) ),
															 str_replace( '{id}', uniqid(),
															 str_replace( '{value}', esc_textarea( self::parse_json_data_from_editor( $value[ 'value' ] ) ),
															 str_replace( '{filePath}', esc_textarea( self::parse_json_data_from_editor( $value[ 'filePath' ] ) ),
															 $temp 
															))));    
											}

										}


									}//end foreach
								} 
								?> 



								<div class="uix-cmb__checkbox-selector" <?php echo ( empty( $label_lightbox ) || $label_lightbox === false ? 'style="display: none;"' : '' ); ?>>

									<label>
										<input type="checkbox" value="on" name="<?php echo esc_attr( $id ); ?>_lightbox" <?php checked( 'on', $lightbox_enable ); ?>> 
										<?php if ( !empty ( $label_lightbox ) ) { ?>
											<span class="uix-cmb__description"><?php echo esc_html( $label_lightbox ); ?></span>
										<?php } ?>

									</label>

								</div>
								<?php echo ( empty( $label_lightbox ) || $label_lightbox === false ? '' : '<br>' ); ?>


								<?php echo $item_code; ?>


								<div class="uix-cmb__custom-attributes-field__append__wrapper" id="<?php echo esc_attr( $id ); ?>_append"></div>   

								<div class="uix-cmb__custom-attributes-field__addbtn__wrapper uix-cmb__custom-attributes-field__addbtn__wrapper--multi">
									 <a href="javascript:void(0);" class="uix-cmb__custom-attributes-field__addbtn uix-cmb__custom-attributes-field__addbtn--multi" data-type="file">
										 <svg xmlns="http://www.w3.org/2000/svg" role="img" aria-hidden="true" focusable="false" x="0px" y="0px" viewBox="0 0 426.667 426.667"><g><path d="M42.667,85.333H0V384c0,23.573,19.093,42.667,42.667,42.667h298.667V384H42.667V85.333z"/><path d="M384,0H128c-23.573,0-42.667,19.093-42.667,42.667v256c0,23.573,19.093,42.667,42.667,42.667h256
			c23.573,0,42.667-19.093,42.667-42.667v-256C426.667,19.093,407.573,0,384,0z M128,298.667l64-85.333l43.307,57.813L298.667,192
			L384,298.667H128z"/></g></svg>

										<span><?php echo esc_html( $label_upbtn_add_file ); ?></span>
									</a>

									 <a href="javascript:void(0);" class="uix-cmb__custom-attributes-field__addbtn uix-cmb__custom-attributes-field__addbtn--multi" data-type="html">
										 <svg aria-hidden="true" role="img" focusable="false" class="dashicon dashicons-insert" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><path class="cls-1" d="M1004.97,692.007a0.97,0.97,0,0,1-1.03,1.025H992.056a0.968,0.968,0,0,1-1.025-1.025h-1.024v5.021h1.024a0.919,0.919,0,0,1,.923-0.922h4.1v9.837a0.968,0.968,0,0,1-1.025,1.025v1.025h5.942v-1.025a0.969,0.969,0,0,1-1.023-1.025v-9.837h3.993a0.97,0.97,0,0,1,1.03,1.025h1.02v-5.124h-1.02Z" transform="translate(-990 -692)"></path></svg>
										<span><?php echo esc_html( $label_upbtn_add_html ); ?></span>
									</a> 
								</div>



					<?php if ( ! $one_column ) : ?>
							</td>
						</tr>	


					</table>
					<?php endif; ?>	


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
