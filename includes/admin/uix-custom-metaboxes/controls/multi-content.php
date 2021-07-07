<?php
/**
* Field Type: Multiple Content Area
*
* @print: 

<div class="slide-wrapper">
	<?php

		$all_data = json_decode( get_post_meta( get_the_ID(), 'cus_page_ex_demoname_multicontent', true ), true );
		
		//
	    $all_data_res = json_decode( $all_data[0]['all_data'], true ); 
	    $all_reverse_data_res = json_decode( $all_data[0]['all_reverse_data'], true ); // Reverse Order of Data
	
	
	    //
	    $_data = $all_data_res; 
	
	
		if ( is_array( $_data ) && sizeof( $_data ) > 0 ) {

			//Parse JSON data from Editor
			foreach( $_data as $index => $value ) {
				

				if ( is_array( $value ) && sizeof( $value ) > 0 ) {

					//Parent Category
	                $parent = Uix_Custom_Metaboxes::parse_jsondata_from_editor( $value[ 'parent' ] );
	
					?>
					<section class="slide <?php echo ( !empty($parent) ? 'slide-child' : ''); ?> <?php echo esc_attr( Uix_Custom_Metaboxes::parse_jsondata_from_editor( $value[ 'classname' ] ) ); ?>" id="<?php echo esc_attr( Uix_Custom_Metaboxes::parse_jsondata_from_editor( $value[ 'id' ] ) ); ?>" data-parent="<?php echo esc_attr( $parent ); ?>">

						<h3><?php echo esc_html( Uix_Custom_Metaboxes::parse_jsondata_from_editor( $value[ 'name' ] ) ); ?></h3>
						<?php echo Uix_Custom_Metaboxes::kses( Uix_Custom_Metaboxes::autospace_to_front_from_jsondata( Uix_Custom_Metaboxes::parse_jsondata_from_editor( $value[ 'desc' ] ) ) ); ?>
						<hr>
						<?php echo Uix_Custom_Metaboxes::kses( Uix_Custom_Metaboxes::parse_jsondata_from_editor( $value[ 'value' ] ) ); ?>


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



*
*/
class UixCmbFormType_MultiContent extends Uix_Custom_Metaboxes {
	
	public static function add( $id = '', $title = '', $desc = '', $default = '', $options = '', $placeholder = '', $desc_primary = '', $enable_table = false ) {


		//---
		$all_data = json_decode( $default, true );
		
		//
	    $all_data_res = $all_data[0]['all_data'];
		$all_reverse_data_res = $all_data[0]['all_reverse_data'];
		$project_custom_attrs = $all_data[0]['list'];
		$label_title          = esc_html__( 'Title', 'uix-shortcodes' );
		$label_value          = esc_html__( 'Value', 'uix-shortcodes' );
		$label_desc           = esc_html__( 'Description', 'uix-shortcodes' );
		$label_id             = esc_html__( 'ID', 'uix-shortcodes' );
		$label_parent         = esc_html__( 'Parent Category', 'uix-shortcodes' );
		$label_classname      = esc_html__( 'Class Name', 'uix-shortcodes' );
		$label_upbtn_remove   = esc_html__( 'Remove', 'uix-shortcodes' );
		$label_upbtn_add      = esc_html__( 'Add New', 'uix-shortcodes' );


		//Use only one column as a separate module
		$one_column = false;

		//editor options
		$editor_toolbar = 'formatselect fontselect forecolor backcolor bold italic underline strikethrough bullist numlist blockquote code alignleft aligncenter alignright uix_cmb_link uix_cmb_unlink | removeformat outdent indent superscript subscript hr uix_cmb_image uix_cmb_highlightcode media uix_cmb_customcode fullscreen';
		$editor_toolbar_teeny = 'formatselect forecolor backcolor bold italic underline strikethrough alignleft aligncenter alignright uix_cmb_link uix_cmb_unlink removeformat uix_cmb_customcode';

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
			if ( isset( $options[ 'label_desc' ] ) ) $label_desc = $options[ 'label_desc' ];
			if ( isset( $options[ 'label_id' ] ) ) $label_id = $options[ 'label_id' ];
			if ( isset( $options[ 'label_parent' ] ) ) $label_parent = $options[ 'label_parent' ];
			if ( isset( $options[ 'label_classname' ] ) ) $label_classname = $options[ 'label_classname' ];
			if ( isset( $options[ 'label_upbtn_remove' ] ) ) $label_upbtn_remove = $options[ 'label_upbtn_remove' ];
			if ( isset( $options[ 'label_upbtn_add' ] ) ) $label_upbtn_add = $options[ 'label_upbtn_add' ];

			//
			if ( isset( $options[ 'one_column' ] ) ) $one_column = $options[ 'one_column' ];

		}

		//parent
		//Do not use "name" on <select>, because js may cause data to be empty and cannot be saved.
		$parent_res = '<select class="uix-cmb__text--fullwidth uix-cmb__text--div--toggle__sel">';
		$parent_res.= '<option value="">'.esc_html__( '-', 'uix-shortcodes' ).'</option>';

		if ( is_array( $project_custom_attrs ) && sizeof( $project_custom_attrs ) > 0 ) {


			//Parse JSON data from Editor
			foreach( $project_custom_attrs as $index => $value ) {


				if ( is_array( $value ) && sizeof( $value ) > 0 ) {

					//parent all
					$parent_res.= '<option value="'.esc_attr( $value[ 'id' ] ).'">'.esc_html( $value[ 'name' ] ).'</option>';

				}//endif $value




			}//end foreach   


		}  
		$parent_res .= '</select>';

		$temp = '

			<div class="uix-cmb__text--div uix-cmb__text--div--toggle uix-cmb__text--div--toggle-customlevel">
				<a href="javascript:void(0);" class="uix-cmb__text--div--toggle__trigger"><svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" role="img" aria-hidden="true" focusable="false"><path fill="none" d="M0 0h24v24H0V0z"></path><path d="M3 17v4h4l11-11-4-4L3 17zm3 2H5v-1l9-9 1 1-9 9zM21 6l-3-3h-1l-2 2 4 4 2-2V6z"></path></svg><span>{name}</span></a>

			   <a href="javascript:void(0);" class="uix-cmb__custom-attributes-field__removebtn" title="'.esc_attr( $label_upbtn_remove ).'"><svg aria-hidden="true" role="img" focusable="false" class="dashicon dashicons-trash" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><path d="M12 4h3c.6 0 1 .4 1 1v1H3V5c0-.6.5-1 1-1h3c.2-1.1 1.3-2 2.5-2s2.3.9 2.5 2zM8 4h3c-.2-.6-.9-1-1.5-1S8.2 3.4 8 4zM4 7h11l-.9 10.1c0 .5-.5.9-1 .9H5.9c-.5 0-.9-.4-1-.9L4 7z"></path></svg></a>

				<div class="uix-cmb__text--div--toggle__div">


					<label class="uix-cmb__text--row">
						<p class="uix-cmb__description">
							'.esc_html( $label_title ).'
						</p>
						<input type="text" class="uix-cmb__text--fullwidth uix-cmb__text--div--toggle__title" name="'.esc_attr( $id ).'_attrs_title[]" value="{name}"><span class="important2">*</span>
					</label>


					<label class="uix-cmb__text--row" style="display:none;">
						<p class="uix-cmb__description">
							'.esc_html( $label_id ).'
						</p>
						<input type="text" class="uix-cmb__text--fullwidth uix-cmb__text--div--toggle__id" name="'.esc_attr( $id ).'_attrs_id[]" value="{id}">
					</label>


					<label class="uix-cmb__text--row">
						<p class="uix-cmb__description">
							'.esc_html( $label_parent ).'
						</p>
						<input type="hidden" class="uix-cmb__text--div--toggle__toggleSelect" name="'.esc_attr( $id ).'_attrs_parent[]" value="{parent}">
						<div class="uix-cmb__text--div--toggle__toggleSelect__append">'.$parent_res.'</div>
					</label>    



					<label class="uix-cmb__text--row">
						<p class="uix-cmb__description">
							'.esc_html( $label_classname ).'
						</p>
						<input type="text" class="uix-cmb__text--fullwidth uix-cmb__text--div--toggle__classname" name="'.esc_attr( $id ).'_attrs_classname[]" value="{classname}">
					</label>   



					<label class="uix-cmb__text--row">
						<p class="uix-cmb__description">
							'.esc_html( $label_desc ).'
						</p>
						
						<textarea class="uix-cmb__text--div--toggle__textarea" rows="3" name="'.esc_attr( $id ).'_attrs_desc[]" >{desc}</textarea>  

					</label>



					<label class="uix-cmb__text--row">
						<p class="uix-cmb__description">
							'.esc_html( $label_value ).'
						</p>
						
						<textarea style="display: none;" name="'.esc_attr( $id ).'_attrs_value_sync[]" data-enter-value="true" class="mce-sync" rows="5" id="'.esc_attr( $id ).'-editor-{id}-sync">{value}</textarea>

						<div class="uix-cmb__mce-editor uix-cmb__mce-editor--multi" aria-init="0">

						   <textarea data-editor-toolbar="'.esc_attr( $editor_toolbar ).'" data-editor-height="'.esc_attr( $editor_height ).'" id="'.esc_attr( $id ).'-editor-{id}" name="'.esc_attr( $id ).'_attrs_value[]" >{value}</textarea>

						</div>   


					</label>
				</div>


			</div>
		';


		$temp_attr = str_replace( '{name}', esc_html__( 'Untitled', 'uix-shortcodes' ), 
					 str_replace( '{value}', '',  
					 str_replace( '{parent}', '',
					 str_replace( '{desc}', '',
					 str_replace( '{classname}', '',     
					 $temp 
					)))));

	?>

		<?php if ( $enable_table ) : ?>
		<tr>
			<th colspan="2">
		<?php endif; ?>	


				<!-- Begin Fields -->
				<div class="uix-cmb__wrapper uix-cmb__custom-attributes-field uix-cmb__custom-attributes-field--customlevel <?php echo esc_attr( $one_column? 'uix-cmb__wrapper--one-column' : '' ); ?>" data-append-id="<?php echo esc_attr( $id ); ?>_append" data-tmpl='<?php echo esc_attr( $temp_attr ); ?>'>


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
							
								<textarea style="display: none;" class="uix-cmb__custom-attributes-field__resultReverseData" name="<?php echo esc_attr( $id ); ?>_resultReverseData" ><?php echo esc_textarea( $all_reverse_data_res ); ?></textarea>
								<textarea style="display: none;" class="uix-cmb__custom-attributes-field__resultData" name="<?php echo esc_attr( $id ); ?>_resultData" ><?php echo esc_textarea( $all_data_res ); ?></textarea>

								<?php
								if ( is_array( $project_custom_attrs ) && sizeof( $project_custom_attrs ) > 0 ) {


									//Parse JSON data from Editor
									foreach( $project_custom_attrs as $index => $value ) {


										if ( is_array( $value ) && sizeof( $value ) > 0 ) {


											//parent all
											echo str_replace( '{name}', esc_attr( self::parse_jsondata_from_editor( $value[ 'name' ] ) ), 
														 str_replace( '{value}', esc_textarea( self::parse_jsondata_from_editor( $value[ 'value' ] ) ),
														 str_replace( '{id}', esc_attr( self::parse_jsondata_from_editor( $value[ 'id' ] ) ),
														 str_replace( '{parent}', esc_attr( self::parse_jsondata_from_editor( $value[ 'parent' ] ) ),
														 str_replace( '{desc}', self::autospace_to_textarea_from_jsondata( self::parse_jsondata_from_editor( $value[ 'desc' ] ) ),
														 str_replace( '{classname}', esc_attr( self::parse_jsondata_from_editor( $value[ 'classname' ] ) ), 
														 $temp 
														))))));        

										}//endif $value




									}//end foreach
								} 
								?> 

								<div class="uix-cmb__custom-attributes-field__append__wrapper" id="<?php echo esc_attr( $id ); ?>_append"></div>   

								<div class="uix-cmb__custom-attributes-field__addbtn__wrapper">
									 <a href="javascript:void(0);" class="uix-cmb__custom-attributes-field__addbtn uix-cmb__custom-attributes-field__addbtn--customlevel"><svg aria-hidden="true" role="img" focusable="false" class="dashicon dashicons-insert" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><path d="M10 1c-5 0-9 4-9 9s4 9 9 9 9-4 9-9-4-9-9-9zm0 16c-3.9 0-7-3.1-7-7s3.1-7 7-7 7 3.1 7 7-3.1 7-7 7zm1-11H9v3H6v2h3v3h2v-3h3V9h-3V6z"></path></svg><?php echo esc_html( $label_upbtn_add ); ?></a>
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
