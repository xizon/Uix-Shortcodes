<?php
class UixSCFormType_ColorMap {
	
	public static function add( $args, $_output ) {
		
		if ( !is_array( $args ) ) return;
			
		$title            = ( isset( $args[ 'title' ] ) ) ? $args[ 'title' ] : '';
		$desc             = ( isset( $args[ 'desc' ] ) ) ? $args[ 'desc' ] : '';
		$default          = ( isset( $args[ 'default' ] ) && !empty( $args[ 'default' ] ) ) ? $args[ 'default' ] : '';
		$value            = ( isset( $args[ 'value' ] ) ) ? $args[ 'value' ] : '';
		$placeholder      = ( isset( $args[ 'placeholder' ] ) ) ? $args[ 'placeholder' ] : '';
		$id               = ( isset( $args[ 'id' ] ) ) ? $args[ 'id' ] : '';
		$name             = ( isset( $args[ 'name' ] ) ) ? $args[ 'name' ] : '';
		$type             = ( isset( $args[ 'type' ] ) ) ? $args[ 'type' ] : '';
		$class            = ( isset( $args[ 'class' ] ) && !empty( $args[ 'class' ] ) ) ? ' class="'.UixSCFormCore::row_class( $args[ 'class' ] ).'"' : '';
		$toggle           = ( isset( $args[ 'toggle' ] ) && !empty( $args[ 'toggle' ] ) ) ? $args[ 'toggle' ] : '';
		
		$field = '';
		$jscode = '';
		$jscode_vars = '';
	
        if ( $type == 'colormap' ) {
       
			$swatches = 1;
			if ( is_array( $default ) && !empty( $default ) ) {
				$swatches = ( isset( $default[ 'swatches' ] ) ) ? $default[ 'swatches' ] : 1;

			}
	        
			$field = '';
            $field .= '
                    <tr'.$class.'>
                        <th scope="row"><label>'.$title.'</label></th>
                        <td>	
						
						    <div class="uixscform-box">
								
			';
			
			if ( $swatches == 1 ) {
				$field .= ' 
				                <div class="uixscform-color-selector-onlybutton">
								        
										<div class="uixscform-color-selector-toggles">
											<input type="text" class="wp-color-input" id="'.$id.'" name="'.$name.'" value="'.$value.'">
										</div>	
										<span class="uixscform-color-selector-label">'.( !empty( $desc ) ? $desc : __( 'Add Custom Color', 'uix-shortcodes' ) ).'</span>		
								
								</div>

								
									 
				';	
			} else {
			
				$field .= ' 
				                <div class="uixscform-input-text-short">
				
									   '.( !empty( $id ) ? '<input type="text" id="'.$id.'" name="'.$name.'" class="uixscform-normal uixscform-input-text color" '.( !empty( $value ) ? 'style="background:'.$value.';color:'.UixSCFormCore::readable_color( $value ).'"' : '' ).' value="'.$value.'" placeholder="'.$placeholder.'">' : '' ).' 
									   
									  
								</div>
								
								'.( !empty( $desc ) ? '<p class="info">'.$desc.'</p>' : '' ).'
				';	
			}

			
			
			$field .= '
			 
								
							</div>
                        </td>
                    </tr> 
                '.PHP_EOL;	
                
				
          
                
            $jscode_vars = '
                '.( !empty( $id ) ? 'var '.$id.' = $( "#'.$id.'" ).val();'.PHP_EOL : '' ).'
            ';
			
			$jscode = '';


        }
			
		//output code
		if ( $_output == 'html' ) return $field;
		if ( $_output == 'js' ) return $jscode;
		if ( $_output == 'js_vars' ) return $jscode_vars;

		
		
	}
	

}
