<?php
/**
* Field Type: Select
*
*/
class UixCmbFormType_Select extends Uix_Custom_Metaboxes {
	
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


					<select name="<?php echo esc_attr( $id ); ?>" id="<?php echo esc_attr( $id ); ?>">

						<?php 

						if ( is_array ( $options )  && isset( $options[ 'value' ] ) ) {

							$i = 0;
							foreach ( $options[ 'value' ] as $key => $value  ) {

								//default
								if ( !empty( $default ) ) {
									if ( $key == $default ) { 
										$checked = 'selected'; 
									} else {
										$checked = '';
									}
								} else {
									if ( $i == 0 ) {
										$checked = 'selected';
										$default = $key;
									} else {
										$checked = '';
									}	
								}


								?>

								<option value="<?php echo esc_attr( $key ); ?>" <?php echo esc_html( $checked ); ?> ><?php echo self::kses( $value ); ?></option>

								<?php
								$i++;

							}

						} 
						?>
					 </select>


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
