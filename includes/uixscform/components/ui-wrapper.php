<?php
/**
 * Callback before tag of form
 * 
 *
 * @param  {string} $widget_name          - Current widget name of section.
 * @param  {string} $form_id              - The form ID (Obtained via module ID).
 * @return {string}                       - HTML code.
 *
 * @access public
 *
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; 
}


class UixSCFormCore_Components_Wrapper extends UixSCFormCore {


	/**
	 * Parameters for current form.
	 *
	 * @access private
	 *
	 */
	private $widget_name;
	private $form_id;
	
	
	public function __construct( $widget_name, $form_id ) {
		
		$this->widget_name  = $widget_name;
		$this->form_id      = $form_id;

		
	}
	
	
	public function form_before() {
		
		
		if ( UixShortcodes::is_gutenberg_plug_page() ) {
			$btnTxt = __( 'Generate shortcode', 'uix-shortcodes' );
			$btnTar = __( 'Copy to clipboard', 'uix-shortcodes' );
		} else {
			$btnTxt = __( 'Insert', 'uix-shortcodes' );
			$btnTar = '';
		}
		
		$widget_name = $this->widget_name;
		$form_id     = $this->form_id;
		$buttons     = '<div class="uixscform-modal-buttons"><input type="button" class="close-uixscform-modal uixscform-modal-button uixscform-modal-button-secondary uixscform-modal-cancel-btn" value="'.__( 'Cancel', 'uix-shortcodes' ).'" /><span class="uixscform-modal-save-btn-wrapper"><input type="submit" class="uixscform-modal-button uixscform-modal-button-primary uixscform-modal-save-btn" data-tbtn-txt="'.$btnTar.'" value="'.$btnTxt.'" id="'.$form_id.'_savebtn"/><span class="uixscform-modal-button uixscform-modal-button-icon" id="'.$form_id.'_preview_codebtn" data-code="" title="'.__( 'Preview', 'uix-shortcodes' ).'"><i class="fa fa-search-plus"></i></span></span></div>';
		
		if ( self::inc_str( $form_id, '_sample_hello2' ) ) {
			$buttons = '';
		}
		
		
		return '<div class="uixscform-form-container"><div class="uixscform-table-wrapper"><form method="post">'.$buttons.'<input type="hidden" name="section" value="'.$form_id.'"><input type="hidden" name="row" value=""><input type="hidden" name="widgetname" value="'.$widget_name.'"><input type="hidden" name="colid" value="">';
		
	}
	
	
	/*
	 * Callback after tag of form
	 *
	 * @return {string}                       - HTML code.
	 *
	 */
	public function form_after() {
		
		return '</form></div></div>';
		
	}
	

	
}

