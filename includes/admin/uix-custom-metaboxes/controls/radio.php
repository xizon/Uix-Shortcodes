<?php
/**
* Field Type: Radio & Radio Image
*
*/
class UixCmbFormType_Radio extends Uix_Custom_Metaboxes {
	
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


				  <div class="radio uix-cmb__radio-selector" data-target-id="<?php echo esc_attr( $id ); ?>">


					<?php 

					$br = false;
					if ( is_array ( $options )  && isset( $options[ 'br' ] ) ) {
						$br = $options[ 'br' ];
					}


					if ( is_array ( $options )  && isset( $options[ 'value' ] ) ) {

						$i          = 0;
						$j          = 0;
						$radio_type = isset( $options[ 'radio_type' ] ) ? $options[ 'radio_type' ] : 'normal';


						foreach ( $options[ 'value' ] as $key => $value  ) {

							//default
							if ( !empty( $default ) ) {
								if ( $key == $default ) { 
									$checked = 'checked'; 
								} else {
									$checked = '';
								}
							} else {
								if ( $i == 0 ) {
									$checked = 'checked';
									$default = $key;
								} else {
									$checked = '';
								}	
							}


							//toggle id
							$toggle_id = '';
							if ( isset( $options[ 'toggle' ] )             && 
								 is_array( $options[ 'toggle' ][ $key ] )  && 
								 isset( $options[ 'toggle' ][ $key ] ) ) 
							{

								$v                        = $options[ 'toggle' ][ $key ];
								$toggle_id                = $id.'-'.$key.'-'.'-wrapper';
								$toggle_ipt_id            = $v[ 'id' ];
								$toggle_ipt_type          = $v[ 'type' ];

							}


							//toggle switch id
							$toggle_switch_id = '';
							if ( isset( $options[ 'target_ids' ] )             && 
								 is_array( $options[ 'target_ids' ][ $key ] )  && 
								 isset( $options[ 'target_ids' ][ $key ] ) ) 
							{

								$v_switch = $options[ 'target_ids' ][ $key ];

								//Target ids
								if ( is_array( $v_switch ) && !empty( $v_switch ) ) {

									foreach ( $v_switch as $tid_value ) {
										$toggle_switch_id .= ''.$tid_value.','; 		
									}	

								}	


							}	



							?>


							<?php if ( $radio_type == 'normal' ) { ?>
								<label data-value="<?php echo esc_attr( $key ); ?>" data-toggle-id="<?php echo esc_attr( $toggle_id ); ?>" class="<?php if ( $br ) { echo 'uix-cmb__label'; } else { echo ''; }; ?> uix-cmb__radio-text uix-cmb__toggle-selector <?php if ( $default == esc_attr( $key ) || empty( $default ) ) { echo 'active'; } else { echo ''; }; ?>"><input type="radio" name="<?php echo esc_attr( $id ); ?>_r" value="<?php echo esc_attr( $key ); ?>" <?php echo esc_html( $checked ); ?>/><?php echo self::kses( $value ); ?></label>
							<?php } ?>

							<?php if ( $radio_type == 'image' ) { ?>
								<span data-value="<?php echo esc_attr( $key ); ?>" class="img <?php if ( $default == esc_attr( $key ) || empty( $default ) ) { echo 'active'; } else { echo ''; }; ?>">
								  <img alt="" src="<?php echo esc_url( $value ); ?>">
								</span>
							<?php } ?>	


							<?php if ( $radio_type == 'switch' ) { ?>
								<label data-value="<?php echo esc_attr( $key ); ?>" data-switch-ids="<?php echo esc_attr( $toggle_switch_id ); ?>" class="<?php if ( $br ) { echo 'uix-cmb__label'; } else { echo ''; }; ?> uix-cmb__radio-text uix-cmb__switch-radios <?php if ( $default == esc_attr( $key ) || empty( $default ) ) { echo 'active'; } else { echo ''; }; ?>"><input type="radio" name="<?php echo esc_attr( $id ); ?>_r" value="<?php echo esc_attr( $key ); ?>" <?php echo esc_html( $checked ); ?>/><?php echo self::kses( $value ); ?></label>
							<?php } ?>	



							<?php
							$i++;

						}//end foreach


						//================================
						foreach ( $options[ 'value' ] as $key => $value  ) {

							//default
							if ( !empty( $default ) ) {
								if ( $key == $default ) { 
									$checked = 'checked'; 
								} else {
									$checked = '';
								}
							} else {
								if ( $j == 0 ) {
									$checked = 'checked';
									$default = $key;
								} else {
									$checked = '';
								}	
							}


							//toggle id
							$toggle_id = '';
							if ( isset( $options[ 'toggle' ] )             && 
								 is_array( $options[ 'toggle' ][ $key ] )  && 
								 isset( $options[ 'toggle' ][ $key ] ) ) 
							{

								$v                        = $options[ 'toggle' ][ $key ];
								$toggle_id                = $id.'-'.$key.'-'.'-wrapper';
								$toggle_ipt_id            = $v[ 'id' ];
								$toggle_ipt_type          = $v[ 'type' ];

								//---
								$toggle_ipt_title         = ( isset( $v[ 'title' ] ) ) ? $v[ 'title' ] : esc_html__( 'Field Title', 'uix-shortcodes' );
								$toggle_ipt_placeholder   = ( isset( $v[ 'placeholder' ] ) ) ? $v[ 'placeholder' ] : '';
								$toggle_ipt_options       = ( isset( $v[ 'options' ] ) ) ? $v[ 'options' ] : '';
								$toggle_ipt_desc          = ( isset( $v[ 'desc' ] ) ) ? $v[ 'desc' ] : '';
								$toggle_ipt_desc_primary  = ( isset( $v[ 'desc_primary' ] ) ) ? $v[ 'desc_primary' ] : '';
								$toggle_ipt_value         = get_post_meta( get_the_ID(), $toggle_ipt_id, true );
								$toggle_ipt_value_default = ( isset( $v[ 'default' ] ) ) ? $v[ 'default' ] : '';
								$toggle_ipt_default       = ( metadata_exists( 'post', get_the_ID(), $toggle_ipt_id ) ) ? $toggle_ipt_value : $toggle_ipt_value_default; 
							}


							?>


							<!-- Associated controller -->
							<?php if ( !empty( $toggle_id ) ) { ?>

								<div class="uix-cmb__toggle-target" id="<?php echo esc_attr( $toggle_id ); ?>" style="display:none;" >
									<?php
									//------
									if ( $toggle_ipt_type == 'text' ) {
										UixCmbFormType_Text::add( $toggle_ipt_id, $toggle_ipt_title, $toggle_ipt_desc, $toggle_ipt_default, $toggle_ipt_options, $toggle_ipt_placeholder, $toggle_ipt_desc_primary, false );
									}	

									//------
									if ( $toggle_ipt_type == 'textarea' ) {
										UixCmbFormType_Textarea::add( $toggle_ipt_id, $toggle_ipt_title, $toggle_ipt_desc, $toggle_ipt_default, $toggle_ipt_options, $toggle_ipt_placeholder, $toggle_ipt_desc_primary, false );
									}	

									//------
									if ( $toggle_ipt_type == 'url' ) {
										UixCmbFormType_Url::add( $toggle_ipt_id, $toggle_ipt_title, $toggle_ipt_desc, $toggle_ipt_default, $toggle_ipt_options, $toggle_ipt_placeholder, $toggle_ipt_desc_primary, false );
									}	

									//------
									if ( $toggle_ipt_type == 'number' ) {
										UixCmbFormType_Number::add( $toggle_ipt_id, $toggle_ipt_title, $toggle_ipt_desc, $toggle_ipt_default, $toggle_ipt_options, $toggle_ipt_placeholder, $toggle_ipt_desc_primary, false );
									}				

									//------
									if ( $toggle_ipt_type == 'radio' ) {
										UixCmbFormType_Radio::add( $toggle_ipt_id, $toggle_ipt_title, $toggle_ipt_desc, $toggle_ipt_default, $toggle_ipt_options, $toggle_ipt_placeholder, $toggle_ipt_desc_primary, false );
									}			

									//------
									if ( $toggle_ipt_type == 'image' ) {
										UixCmbFormType_Image::add( $toggle_ipt_id, $toggle_ipt_title, $toggle_ipt_desc, $toggle_ipt_default, $toggle_ipt_options, $toggle_ipt_placeholder, $toggle_ipt_desc_primary, false );
									}						

									//------
									if ( $toggle_ipt_type == 'color' ) {
										UixCmbFormType_Color::add( $toggle_ipt_id, $toggle_ipt_title, $toggle_ipt_desc, $toggle_ipt_default, $toggle_ipt_options, $toggle_ipt_placeholder, $toggle_ipt_desc_primary, false );
									}				

									//------
									if ( $toggle_ipt_type == 'checkbox' ) {
										UixCmbFormType_Checkbox::add( $toggle_ipt_id, $toggle_ipt_title, $toggle_ipt_desc, $toggle_ipt_default, $toggle_ipt_options, $toggle_ipt_placeholder, $toggle_ipt_desc_primary, false );
									}		

									//------
									if ( $toggle_ipt_type == 'select' ) {
										UixCmbFormType_Select::add( $toggle_ipt_id, $toggle_ipt_title, $toggle_ipt_desc, $toggle_ipt_default, $toggle_ipt_options, $toggle_ipt_placeholder, $toggle_ipt_desc_primary, false );
									}					

									//------
									if ( $toggle_ipt_type == 'editor' ) {
										UixCmbFormType_Editor::add( $toggle_ipt_id, $toggle_ipt_title, $toggle_ipt_desc, $toggle_ipt_default, $toggle_ipt_options, $toggle_ipt_placeholder, $toggle_ipt_desc_primary, false );
									}					

									//------
									if ( $toggle_ipt_type == 'date' ) {
										UixCmbFormType_Date::add( $toggle_ipt_id, $toggle_ipt_title, $toggle_ipt_desc, $toggle_ipt_default, $toggle_ipt_options, $toggle_ipt_placeholder, $toggle_ipt_desc_primary, false );
									}				

									//------
									if ( $toggle_ipt_type == 'price' ) {
										UixCmbFormType_Price::add( $toggle_ipt_id, $toggle_ipt_title, $toggle_ipt_desc, $toggle_ipt_default, $toggle_ipt_options, $toggle_ipt_placeholder, $toggle_ipt_desc_primary, false );
									}		

									//------
									if ( $toggle_ipt_type == 'multi-checkbox' ) {
										UixCmbFormType_MultiCheckbox::add( $toggle_ipt_id, $toggle_ipt_title, $toggle_ipt_desc, $toggle_ipt_default, $toggle_ipt_options, $toggle_ipt_placeholder, $toggle_ipt_desc_primary, false );
									}	

									//------
									if ( $toggle_ipt_type == 'custom-attrs' ) {
										UixCmbFormType_CustomAttrs::add( $toggle_ipt_id, $toggle_ipt_title, $toggle_ipt_desc, $toggle_ipt_default, $toggle_ipt_options, $toggle_ipt_placeholder, $toggle_ipt_desc_primary, false );
									}	


									//------
									if ( $toggle_ipt_type == 'multi-content' ) {
										UixCmbFormType_MultiContent::add( $toggle_ipt_id, $toggle_ipt_title, $toggle_ipt_desc, $toggle_ipt_default, $toggle_ipt_options, $toggle_ipt_placeholder, $toggle_ipt_desc_primary, false );
									}	

									//------
									if ( $toggle_ipt_type == 'multi-portfolio' ) {
										UixCmbFormType_MultiPortfolio::add( $toggle_ipt_id, $toggle_ipt_title, $toggle_ipt_desc, $toggle_ipt_default, $toggle_ipt_options, $toggle_ipt_placeholder, $toggle_ipt_desc_primary, false );
									}	                                                               

									?>
								</div>


							<?php } ?>


							<?php
							$j++;

						}//end foreach




					} 
					?>

				  </div>
				  <input type="hidden" id="<?php echo esc_attr( $id ); ?>" name="<?php echo esc_attr( $id ); ?>" value="<?php echo esc_attr( $default ); ?>">


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
