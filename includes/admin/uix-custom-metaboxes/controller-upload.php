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
				<a href="javascript:" class="uix-cmb__btn uix-cmb__btn--upload uix-cmb__upload-target" id="trigger_id_'.esc_attr( $id ).'" data-remove-btn="drop_trigger_id_'.esc_attr( $id ).'" data-insert-img="'.esc_attr( $id ).'" data-insert-preview="'.esc_attr( $id ).'_preview"><i class="dashicons dashicons-format-image"></i>'.esc_html__( 'Select an image', 'uix-shortcodes' ).'</a>
				<a href="javascript:" class="remove-btn" id="drop_trigger_id_'.esc_attr( $id ).'" data-insert-img="'.esc_attr( $id ).'" data-insert-preview="'.esc_attr( $id ).'_preview" style="display:none">'.esc_html__( 'remove image', 'uix-shortcodes' ).'</a>
				'.( !empty( $value ) ? '<div id="'.esc_attr( $id ).'_preview" class="uix-cmb__upload-preview" style="display:block"><img src="'.esc_url( $value ).'" alt=""></div>' : '<div id="'.esc_attr( $id ).'_preview" class="uix-cmb__upload-preview"><img src="" alt=""></div>' ).' 
				
			</div>
			'.PHP_EOL;
		 
		}
		
	
	}

}


