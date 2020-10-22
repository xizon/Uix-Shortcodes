<?php
/**
* Field Type: Multiple CheckBox
*
* @print: 

	$_data = get_post_meta( get_the_ID(), 'cus_page_ex_demoname_11', true );
	$_echo = '';
	if ( !empty( $_data ) && is_array( $_data ) ) {

		foreach ( $_data as $value ) :
			$_echo .= $value.', ';
		endforeach; 
	}
	echo $_echo;
*
*/
class UixCmbFormType_MultiCheckbox extends Uix_Custom_Metaboxes {
	
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


				<div class="uix-cmb__multi-checkbox-selector">

						<?php 

						$br = false;
						if ( is_array ( $options )  && isset( $options[ 'br' ] ) ) {
							$br = $options[ 'br' ];
						}

						if ( is_array ( $options )  && isset( $options[ 'value' ] ) ) {

							$i = 0;
							foreach ( $options[ 'value' ] as $key => $value  ) {

								$checked = ''; 
								if ( is_array ( $default ) ) {
									if ( in_array( $key, $default ) ) {
										$checked = 'checked'; 
									} else {
										$checked = ''; 
									}
								}


								?>

								<label class="<?php if ( $br ) { echo 'uix-cmb__label'; } else { echo ''; }; ?>">
									<input name="<?php echo esc_attr( $id ); ?>[]" type="checkbox" value="<?php echo esc_attr( $key ); ?>" <?php echo esc_html( $checked ); ?>>
									<?php echo self::kses( $value ); ?>
								</label>

								<?php
								$i++;

							}

						} 
						?>


				</div>

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
