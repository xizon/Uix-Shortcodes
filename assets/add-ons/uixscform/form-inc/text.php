<?php
class UixSCFormType_Text {
	
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
		
		
		if ( $type == 'text' ) {
			$field = '
					<tr'.$class.'>
						<th scope="row"><label>'.$title.'</label></th>
						<td>	
						    
							<div class="uixscform-box">
							
							   '.( !empty( $id ) ? '<input type="text" id="'.$id.'" name="'.$name.'" class="uixscform-normal uixscform-input-text" value="'.$value.'" placeholder="'.$placeholder.'">' : '' ).' 	
			   	   
							   '.( !empty( $desc ) ? '<p class="info">'.$desc.'</p>' : '' ).' 
							   
							   
							</div>
						</td>
					</tr> 
				'.PHP_EOL;	

			$jscode_vars = '
				'.( !empty( $id ) ? 'var '.$id.' = $( "#'.$id.'" ).val();'.PHP_EOL : '' ).'
			';	

		}
			
		//output code
		if ( $_output == 'html' ) return $field;
		if ( $_output == 'js' ) return $jscode;
		if ( $_output == 'js_vars' ) return $jscode_vars;

		
		
	}
	

}
