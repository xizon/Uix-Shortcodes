<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; 
}


if ( !class_exists( 'Uix_UploadMedia' ) ) {
	
	class Uix_UploadMedia {
		
		public static function add( $args ) {
			
			if ( !is_array( $args ) ) return;
			$title            = ( isset( $args[ 'title' ] ) ) ? esc_html( $args[ 'title' ] ) : '';
			$value            = ( isset( $args[ 'value' ] ) ) ? esc_url( $args[ 'value' ] ) : '';
			$placeholder      = ( isset( $args[ 'placeholder' ] ) ) ? esc_attr( $args[ 'placeholder' ] ) : '';
			$id               = ( isset( $args[ 'id' ] ) ) ? esc_attr( $args[ 'id' ] ) : '';
			$class            = ( isset( $args[ 'class' ] ) ) ? esc_attr( $args[ 'class' ] ) : 'widefat';
			$name             = ( isset( $args[ 'name' ] ) ) ? esc_attr( $args[ 'name' ] ) : '';
			
			//Enqueue the media scripts
			wp_enqueue_media();
	
			echo '
			<div class="uix-cmb__btn--upload-container">
				
				<label for="'.esc_attr( $id ).'">'.esc_html( $title ).'</label>
				'.( !empty( $id ) ? '<input type="text" id="'.esc_attr( $id ).'" class="'.esc_attr( $class ).'" name="'.esc_attr( $name ).'" value="'.esc_url( $value ).'" placeholder="'.esc_attr( $placeholder ).'" />' : '' ).' 
				<a href="javascript:" class="uix-cmb__btn uix-cmb__btn--upload uix-cmb__upload-target" id="trigger_id_'.esc_attr( $id ).'" data-remove-btn="drop_trigger_id_'.esc_attr( $id ).'" data-insert-img="'.esc_attr( $id ).'" data-insert-preview="'.esc_attr( $id ).'_preview"><svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" role="img" aria-hidden="true" focusable="false"><path d="M0,0h24v24H0V0z" fill="none"></path><path d="m19 5v14h-14v-14h14m0-2h-14c-1.1 0-2 0.9-2 2v14c0 1.1 0.9 2 2 2h14c1.1 0 2-0.9 2-2v-14c0-1.1-0.9-2-2-2z"></path><path d="m14.14 11.86l-3 3.87-2.14-2.59-3 3.86h12l-3.86-5.14z"></path></svg>'.esc_html__( 'Select an image', 'uix-shortcodes' ).'</a>
				<a href="javascript:" class="uix-cmb__removebtn" id="drop_trigger_id_'.esc_attr( $id ).'" data-insert-img="'.esc_attr( $id ).'" data-insert-preview="'.esc_attr( $id ).'_preview" title="'.esc_attr__( 'remove image', 'uix-shortcodes' ).'" style="display:none"><svg version="1.1"id="Layer_1"xmlns="http://www.w3.org/2000/svg"xmlns:xlink="http://www.w3.org/1999/xlink"x="0px"y="0px"viewBox="0 0 24 24"style="enable-background:new 0 0 24 24;"xml:space="preserve"><g id="remove"><path id="path_15_"d="M16.825,15.036l-1.787,1.788c-0.098,0.099-0.26,0.099-0.358,0L12,14.146l-2.679,2.679c-0.098,0.098-0.26,0.098-0.358,0l-1.788-1.788c-0.098-0.099-0.098-0.26,0-0.358l2.679-2.679L7.176,9.32c-0.098-0.098-0.098-0.26,0-0.358l1.788-1.787c0.099-0.098,0.26-0.098,0.358,0L12,9.853l2.679-2.679c0.098-0.098,0.26-0.098,0.358,0l1.788,1.788c0.098,0.098,0.098,0.26,0,0.358l-2.678,2.678l2.679,2.679C16.923,14.776,16.923,14.937,16.825,15.036z"/></g></svg></a>
				'.( !empty( $value ) ? '<div id="'.esc_attr( $id ).'_preview" class="uix-cmb__upload-preview" style="display:block"><img src="'.esc_url( $value ).'" alt=""></div>' : '<div id="'.esc_attr( $id ).'_preview" class="uix-cmb__upload-preview"><img src="" alt=""></div>' ).' 
				
			</div>
			'.PHP_EOL;
		 
		}
		
	
	}

}


