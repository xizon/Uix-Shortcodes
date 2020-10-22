<?php
/**
* Field Type: Textarea
*
*/
class UixCmbFormType_Textarea extends Uix_Custom_Metaboxes {
	
	public static function add( $id = '', $title = '', $desc = '', $default = '', $options = '', $placeholder = '', $desc_primary = '', $enable_table = false ) {
	?>
		<?php if ( $enable_table ) : ?>
		<tr>
			<th class="uix-cmb__title">
				<label><?php echo self::kses( $title ); ?></label>
				<?php if ( !empty ( $desc ) ) { ?>
					<p class="uix-cmb__title_desc"><?php echo self::kses( $desc ); ?></p>
				<?php } ?>
			</th>
			<td>
		<?php endif; ?>


					<?php 
						$rows = 3;
						if ( is_array ( $options )  && isset( $options[ 'rows' ] ) ) {
							$rows = $options[ 'rows' ];
						}
					?>   

				   <textarea placeholder="<?php echo esc_attr( $placeholder ); ?>" rows="<?php echo absint( $rows ); ?>" cols="40" name="<?php echo esc_attr( $id ); ?>" id="<?php echo esc_attr( $id ); ?>"><?php echo esc_textarea( $default ); ?></textarea>
					<?php if ( !empty ( $desc_primary ) ) { ?>
						<p class="uix-cmb__description"><?php echo self::kses( $desc_primary ); ?></p>
					<?php } ?>

		<?php if ( $enable_table ) : ?>  
			</td>
		</tr>
		<?php endif; ?>
	<?php	
	}	


}
