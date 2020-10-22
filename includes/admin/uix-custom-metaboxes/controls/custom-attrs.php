<?php
/**
* Field Type: Custom Attributes
*
* @print: 

	<?php

	$_data = json_decode( get_post_meta( get_the_ID(), 'cus_page_ex_demoname_appear_5', true ), true );

	if ( is_array( $_data ) && sizeof( $_data ) > 0 ) {

		foreach( $_data as $value ) {
		?>
			<li>
				<strong><?php echo esc_html( Uix_Custom_Metaboxes::parse_json_data_from_editor( $value[ 'name' ] ) ); ?></strong>
				<p>
					<?php echo UixCmb::kses( Uix_Custom_Metaboxes::parse_json_data_from_editor( $value[ 'value' ] ) ); ?>
				</p>
			</li>
		<?php
		}
	} 

	?>

*
*/
class UixCmbFormType_CustomAttrs extends Uix_Custom_Metaboxes {
	
	public static function add( $id = '', $title = '', $desc = '', $default = '', $options = '', $placeholder = '', $desc_primary = '', $enable_table = false ) {

		$project_custom_attrs = json_decode( $default, true );
		$label_title          = esc_html__( 'Title', 'uix-shortcodes' );
		$label_value          = esc_html__( 'Value', 'uix-shortcodes' );
		$label_upbtn_remove   = esc_html__( 'Remove', 'uix-shortcodes' );
		$label_upbtn_add      = esc_html__( 'Add New', 'uix-shortcodes' );

		//Use only one column as a separate module
		$one_column = false; 


		//---
		if ( is_array ( $options ) ) {
			if ( isset( $options[ 'label_title' ] ) ) $label_title = $options[ 'label_title' ];
			if ( isset( $options[ 'label_value' ] ) ) $label_value = $options[ 'label_value' ];
			if ( isset( $options[ 'label_upbtn_remove' ] ) ) $label_upbtn_remove = $options[ 'label_upbtn_remove' ];
			if ( isset( $options[ 'label_upbtn_add' ] ) ) $label_upbtn_add = $options[ 'label_upbtn_add' ]; 

			//
			if ( isset( $options[ 'one_column' ] ) ) $one_column = $options[ 'one_column' ]; 

		}


		$temp = '
			<div class="uix-cmb__text--div">
				<label class="uix-cmb__text--p">
					<p class="uix-cmb__description">
						'.esc_html( $label_title ).'
					</p>
					<input class="uix-cmb__text--small" name="'.esc_attr( $id ).'_attrs_title[]" value="{name}"><span class="important2">*</span>&nbsp;&nbsp;
				</label>


				<label class="uix-cmb__text--p">
					<p class="uix-cmb__description">
						'.esc_html( $label_value ).'
					</p>
					<input class="uix-cmb__text--medium" name="'.esc_attr( $id ).'_attrs_value[]" value="{value}"><a href="javascript:void(0);" class="uix-cmb__custom-attributes-field__removebtn" title="'.esc_attr( $label_upbtn_remove ).'"><svg aria-hidden="true" role="img" focusable="false" class="dashicon dashicons-trash" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><path d="M12 4h3c.6 0 1 .4 1 1v1H3V5c0-.6.5-1 1-1h3c.2-1.1 1.3-2 2.5-2s2.3.9 2.5 2zM8 4h3c-.2-.6-.9-1-1.5-1S8.2 3.4 8 4zM4 7h11l-.9 10.1c0 .5-.5.9-1 .9H5.9c-.5 0-.9-.4-1-.9L4 7z"></path></svg></a>
				</label>
			</div>
		';


		$temp_attr = str_replace( '{name}', '', 
					 str_replace( '{value}', '',
					 $temp 
					));

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
									foreach( $project_custom_attrs as $value ) {

										if ( is_array( $value ) && sizeof( $value ) > 0 ) {
											echo str_replace( '{name}', esc_attr( self::parse_json_data_from_editor( $value[ 'name' ] ) ), 
														 str_replace( '{value}', esc_attr( self::parse_json_data_from_editor( $value[ 'value' ] ) ),
														 $temp 
														));           
										}


									}
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
