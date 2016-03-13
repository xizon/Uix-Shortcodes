<?php
class UixShortcodesForm_Image {
	
	public static function add( $args, $_output ) {
		
		if ( !is_array( $args ) ) return;
			
		$title            = ( isset( $args[ 'title' ] ) ) ? $args[ 'title' ] : '';
		$desc             = ( isset( $args[ 'desc' ] ) ) ? $args[ 'desc' ] : '';
		$default          = ( isset( $args[ 'default' ] ) && !empty( $args[ 'default' ] ) ) ? $args[ 'default' ] : '';
		$value            = ( isset( $args[ 'value' ] ) ) ? $args[ 'value' ] : '';
		$placeholder      = ( isset( $args[ 'placeholder' ] ) ) ? $args[ 'placeholder' ] : '';
		$id               = ( isset( $args[ 'id' ] ) ) ? $args[ 'id' ] : '';
		$type             = ( isset( $args[ 'type' ] ) ) ? $args[ 'type' ] : '';
		$class            = ( isset( $args[ 'class' ] ) && !empty( $args[ 'class' ] ) ) ? ' class="'.UixShortcodes::row_class( $args[ 'class' ] ).'"' : '';
		$toggle           = ( isset( $args[ 'toggle' ] ) && !empty( $args[ 'toggle' ] ) ) ? $args[ 'toggle' ] : '';
		
		$field = '';
		$jscode = '';
		$jscode_vars = '';
		
        if ( $type == 'image' ) {
            
            //Enqueue the media scripts
            wp_enqueue_media();
                                
            $remove_btn_text = '';
            $upload_btn_text = '';
            if ( is_array( $default ) && !empty( $default ) ) {
                $remove_btn_text = $default[ 'remove_btn_text' ];
                $upload_btn_text = $default[ 'upload_btn_text' ];
            }
            
            $field = '
			
			
                    <tr'.$class.'>
                        <th scope="row"><label>'.$title.'</label></th>
                        <td>
						    
							<div class="sweet-box">
							
							  
								<div class="sweet-upbtn-container">
									
									'.( !empty( $id ) ? '<input type="text" id="'.$id.'" class="sweet-normal sweet-input-text sweet-input-upload-text"  value="'.$value.'" placeholder="'.$placeholder.'" />' : '' ).' 
									'.( !empty( $desc ) ? '<p class="info">'.$desc.'</p>' : '' ).' 
									
									
									<input type="button" class="button sweet-upbtn" id="trigger_id_'.$id.'" data-insert-img="'.$id.'" data-insert-preview="'.$id.'_preview" value="'.$upload_btn_text.'" />
									<a href="javascript:" id="drop_trigger_id_'.$id.'" data-insert-img="'.$id.'" data-insert-preview="'.$id.'_preview" style="display:none">'.$remove_btn_text.'</a>
									'.( !empty( $value ) ? '<div id="'.$id.'_preview" class="uix_sc_field_img_preview" style="display:block"><img src="'.$value.'" alt=""></div>' : '<div id="'.$id.'_preview" class="uix_sc_field_img_preview"><img src="" alt=""></div>' ).' 
									
												
										
			
								</div>
            
                             </div>
                            
                        </td>
                    </tr> 
                '."\n";	
                
                
            $jscode_vars = '
                '.( !empty( $id ) ? 'var '.$id.' = $( "#'.$id.'" ).val();'."\n" : '' ).'
            ';
            $jscode = '

                /*-- Insert media  --*/
                $( document ).uix_uploadMediaCustom( { btnID: "#trigger_id_'.$id.'", closebtnID: "#drop_trigger_id_'.$id.'" } );
            ';	
                

        }
			
		//output code
		if ( $_output == 'html' ) return $field;
		if ( $_output == 'js' ) return $jscode;
		if ( $_output == 'js_vars' ) return $jscode_vars;

		
		
	}
	

}
