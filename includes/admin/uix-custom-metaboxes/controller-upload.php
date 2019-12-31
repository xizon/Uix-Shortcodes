<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; 
}


if ( !class_exists( 'Uix_UploadMedia' ) ) {
	
	class Uix_UploadMedia {
		
		public static function add( $args, $echo = true ) {
			
			if ( !is_array( $args ) ) return;
			$title            = ( isset( $args[ 'title' ] ) ) ? esc_html( $args[ 'title' ] ) : '';
			$value            = ( isset( $args[ 'value' ] ) ) ? esc_attr( $args[ 'value' ] ) : '';
			$placeholder      = ( isset( $args[ 'placeholder' ] ) ) ? esc_attr( $args[ 'placeholder' ] ) : '';
			$id               = ( isset( $args[ 'id' ] ) ) ? esc_attr( $args[ 'id' ] ) : uniqid();
			$class            = ( isset( $args[ 'class' ] ) ) ? esc_attr( $args[ 'class' ] ) : 'widefat';
			$name             = ( isset( $args[ 'name' ] ) ) ? esc_attr( $args[ 'name' ] ) : '';
			$child            = ( isset( $args[ 'child' ] ) ) ? esc_attr( $args[ 'child' ] ) : false;
            $label_remove     = ( isset( $args[ 'label_remove' ] ) ) ? esc_attr( $args[ 'label_remove' ] ) : '';
            $label_add        = ( isset( $args[ 'label_add' ] ) ) ? esc_html( $args[ 'label_add' ] ) : '';
    
            
			//Enqueue the media scripts
			wp_enqueue_media();
            
            
            //check file type
            $is_video = false;
            $file_type = pathinfo( $value,PATHINFO_EXTENSION );

            if( $file_type == 'mp4' || 
                $file_type == 'avi' || 
                $file_type == 'wmv' || 
                $file_type == 'flv' || 
                $file_type == 'mpg'
            ) {
                $is_video = true;
            }  
            
	
			$code =  '
			<div class="uix-cmb__btn--upload-container '.( $child ? 'uix-cmb__btn--upload-container--child' : '' ).'">
            
                <input type="hidden" id="'.esc_attr( $id ).'_filetype" name="'.esc_attr( $id ).'_filetype" value="'.esc_attr( ( $is_video ? 'video' : 'image' ) ).'"/>
				
				<label for="'.esc_attr( $id ).'">'.esc_html( $title ).'</label>
				'.( !empty( $id ) ? '<input type="text" id="'.esc_attr( $id ).'" class="'.esc_attr( $class ).'" name="'.esc_attr( $name ).'" value="'.esc_attr( $value ).'" placeholder="'.esc_attr( $placeholder ).'" />' : '' ).' 
				<a href="javascript:" class="uix-cmb__btn uix-cmb__btn--upload uix-cmb__upload-target" id="trigger_id_'.esc_attr( $id ).'" data-insert-img="'.esc_attr( $id ).'" data-insert-preview="'.esc_attr( $id ).'_preview"><svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" role="img" aria-hidden="true" focusable="false" x="0px" y="0px" viewBox="0 0 550.801 550.8"><g><path d="M515.828,61.201H34.972C15.659,61.201,0,76.859,0,96.172v358.458C0,473.942,15.659,489.6,34.972,489.6h480.856 c19.314,0,34.973-15.658,34.973-34.971V96.172C550.801,76.859,535.143,61.201,515.828,61.201z M515.828,96.172V350.51l-68.92-62.66 c-10.359-9.416-26.289-9.04-36.186,0.866l-69.752,69.741L203.438,194.179c-10.396-12.415-29.438-12.537-39.99-0.271L34.972,343.219 V96.172H515.828z M367.201,187.972c0-26.561,21.523-48.086,48.084-48.086c26.562,0,48.086,21.525,48.086,48.086 c0,26.561-21.523,48.085-48.086,48.085C388.725,236.058,367.201,214.533,367.201,187.972z"/></g></svg>'.esc_html( $label_add ).'</a>
				<a href="javascript:" class="uix-cmb__removebtn" data-insert-img="'.esc_attr( $id ).'" data-insert-preview="'.esc_attr( $id ).'_preview" title="'.esc_attr( $label_remove ).'" style="display:none"><svg version="1.1"id="Layer_1"xmlns="http://www.w3.org/2000/svg"xmlns:xlink="http://www.w3.org/1999/xlink"x="0px"y="0px"viewBox="0 0 24 24"style="enable-background:new 0 0 24 24;"xml:space="preserve"><g id="remove"><path id="path_15_"d="M16.825,15.036l-1.787,1.788c-0.098,0.099-0.26,0.099-0.358,0L12,14.146l-2.679,2.679c-0.098,0.098-0.26,0.098-0.358,0l-1.788-1.788c-0.098-0.099-0.098-0.26,0-0.358l2.679-2.679L7.176,9.32c-0.098-0.098-0.098-0.26,0-0.358l1.788-1.787c0.099-0.098,0.26-0.098,0.358,0L12,9.853l2.679-2.679c0.098-0.098,0.26-0.098,0.358,0l1.788,1.788c0.098,0.098,0.098,0.26,0,0.358l-2.678,2.678l2.679,2.679C16.923,14.776,16.923,14.937,16.825,15.036z"/></g></svg></a>
				'.( !empty( $value ) ? '<div id="'.esc_attr( $id ).'_preview" class="uix-cmb__upload-preview" style="display:block"><img src="'.esc_attr( $value ).'" alt=""></div>' : '<div id="'.esc_attr( $id ).'_preview" class="uix-cmb__upload-preview"><img src="" alt=""></div>' ).' 
				
			</div>
			'.PHP_EOL;
            
            if ( $echo ) {
                echo $code;
            } else {
                return $code;
            }

		 
		}
		
	
	}

}


