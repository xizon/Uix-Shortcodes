<?php
/**
 * Callback form controls
 * 
 *
 * @param  {string} $widget_name       - Current widget name of section.
 * @param  {array} $arr1               - All field types.
 * @param  {array} $arr2               - All field values.
 * @param  {string} $code              - Control code output type, default is "html"
 * @param  {string} $config_id         - The form ID (Obtained via module ID).
 * @param  {string} $wrapper_name      - Current field name.
 * @return {string}                    - HTML code.
 *
 * @access public
 *
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; 
}


class UixSCFormCore_Components_Controls extends UixSCFormCore {


	/**
	 * Parameters for current form.
	 *
	 * @access private
	 *
	 */
	private $widget_name;
	private $config_id;
	private $arr1;
	private $arr2;
	private $code;
	private $wrapper_name;
	
	
	
	public function __construct( $widget_name, $config_id, $arr1 = null, $arr2 = null, $code = 'html', $wrapper_name = '' ) {
		
		$this->widget_name    = $widget_name;
		$this->config_id      = $config_id;
		$this->arr1           = $arr1;
		$this->arr2           = $arr2;
		$this->code           = $code;
		$this->wrapper_name   = $wrapper_name;
		
		
	}

	public function output() {
		
		
		$widget_name  = $this->widget_name;
		$config_id    = $this->config_id;
		$arr1         = $this->arr1;
		$arr2         = $this->arr2;
		$code         = $this->code;
		$wrapper_name = $this->wrapper_name;
		
	
		//----
		$section_args = array();
		$field_total  = array();
		$field_args   = array();
		$before       = '';
		$after        = '';
		$field        = '';
		$output       = '';
		$form_tags    = new UixSCFormCore_Components_Wrapper( $widget_name, $config_id );



		/**
		 * Get the configuration options
		 */

		if ( is_array( $arr2 ) ) {

			foreach ( $arr2 as $field_key => $field_value ) {
				$field_total[] = $field_value;
			}	

		}


		if ( !empty( $config_id ) ) {


			/**
			 * Add the form container
			 */
			 
			 if ( is_array( $arr1 ) ) { 

					if ( $arr1[ 'list' ] == false ) {

							$before = '
							 '.$form_tags -> form_before().'
								<table class="uixscform-table">
							'.PHP_EOL;


							$after = '
								</table>
							 '.$form_tags -> form_after().'
							'.PHP_EOL;


					}


					//Column 1
					if ( $arr1[ 'list' ] == 1 ) {

							$before = '

								 <div class="uixscform-table-cols-wrapper uixscform-table-col-1">
									<table class="uixscform-table-list">

										<tr class="item">
											<th colspan="2" scope="col">
											'.$wrapper_name.'
											</th>
										</tr> 

							'.PHP_EOL;


							$after = '
									</table>
								</div><!-- /.uixscform-table-cols-wrapper-->

							'.PHP_EOL;


					} 

					//Column 2
					if ( $arr1[ 'list' ] == 2 ) {

							$before = '

								 <div class="uixscform-table-cols-wrapper uixscform-table-col-2">
									<table class="uixscform-table-list">

										<tr class="item">
											<th colspan="2" scope="col">
											'.$wrapper_name.'
											</th>
										</tr> 

							'.PHP_EOL;


							$after = '
									</table>
								</div><!-- /.uixscform-table-cols-wrapper-->

							'.PHP_EOL;


					}

					//Column 3
					if ( $arr1[ 'list' ] == 3 ) {
						$before = '

								 <div class="uixscform-table-cols-wrapper uixscform-table-col-3">
									<table class="uixscform-table-list">

										<tr class="item">
											<th colspan="2" scope="col">
											'.$wrapper_name.'
											</th>
										</tr> 

							'.PHP_EOL;


							$after = '
									</table>
								</div><!-- /.uixscform-table-cols-wrapper-->

							'.PHP_EOL;

					}

					//Column 4
					if ( $arr1[ 'list' ] == 4 ) {
						$before = '

								 <div class="uixscform-table-cols-wrapper uixscform-table-col-4">
									<table class="uixscform-table-list">

										<tr class="item">
											<th colspan="2" scope="col">
											'.$wrapper_name.'
											</th>
										</tr> 

							'.PHP_EOL;


							$after = '
									</table>
								</div><!-- /.uixscform-table-cols-wrapper-->

							'.PHP_EOL;

					}

			 }




			/**
			 * Add the field to the properly indexed
			 */

			foreach ( $field_total as $key) {

				$_title    = ( isset( $key['title'] ) ) ? $key['title'] : '';
				$_desc     = ( isset( $key['desc'] ) ) ? $key['desc'] : '';
				$_default  = ( isset( $key['default'] ) ) ? $key['default'] : '';
				$_value    = ( isset( $key['value'] ) ) ? $key['value'] : '';
				$_ph       = ( isset( $key['placeholder'] ) ) ? $key['placeholder'] : '';
				$_id       = ( isset( $key['id'] ) ) ? $key['id'] : '';
				$_name     = ( isset( $key['name'] ) ) ? $key['name'] : '';
				$_type     = ( isset( $key['type'] ) ) ? $key['type'] : 'text';
				$_class    = ( isset( $key['class'] ) ) ? $key['class'] : '';
				$_callback = ( isset( $key['callback'] ) ) ? $key['callback'] : '';
				$_toggle   = ( isset( $key['toggle'] ) ) ? $key['toggle'] : '';
				$_colid    = ( isset( $key['colid'] ) ) ? $key['colid'] : '';


				$args = array(
					'title'             => $this -> filter_control_val( $_title ),
					'desc'              => $this -> filter_control_val( $_desc ),
					'value'             => $this -> filter_control_val( $_value ),
					'placeholder'       => $this -> filter_control_val( $_ph ),
					'default'           => $_default,
					'id'                => $_id,
					'name'              => $_name,
					'type'              => $_type,
					'class'             => $_class,
					'callback'          => $_callback,
					'toggle'            => $_toggle,
					'colid'             => $_colid

				);


				//icon
				$field .= UixSCFormType_Icon::add( $args, 'html' );

				//text
				$field .= UixSCFormType_Text::add( $args, 'html' );

				//short text
				$field .= UixSCFormType_ShortText::add( $args, 'html' );

				//short units text
				$field .= UixSCFormType_ShortUnitsText::add( $args, 'html' );	

				//select
				$field .= UixSCFormType_Select::add( $args, 'html' );				
				
				//textarea
				$field .= UixSCFormType_Textarea::add( $args, 'html' );

				//image
				$field .= UixSCFormType_Image::add( $args, 'html' );

				//radio
				$field .= UixSCFormType_Radio::add( $args, 'html' );

				//radio image
				$field .= UixSCFormType_RadioImage::add( $args, 'html' );			

				//multiple selector
				$field .= UixSCFormType_MultiSelector::add( $args, 'html' );		

				//slider
				$field .= UixSCFormType_Slider::add( $args, 'html' );

				//margin or padding
				$field .= UixSCFormType_MarginPadding::add( $args, 'html' );

				//checkbox
				$field .= UixSCFormType_Checkbox::add( $args, 'html' );

				//color
				$field .= UixSCFormType_Color::add( $args, 'html' );
				
				//color picker
				$field .= UixSCFormType_ColorPicker::add( $args, 'html' );

				//toggle
				$field .= UixSCFormType_Toggle::add( $args, 'html' );

				//Clone list
				$field .= UixSCFormType_ListClone::add( $args, 'html' );

				//Note
				$field .= UixSCFormType_Note::add( $args, 'html' );

				//Editor
				$field .= UixSCFormType_Editor::add( $args, 'html' );



			} // end foreach


			//HTML output
			if ( $code == 'html' ) $output = self::format_formcode( $before.$field.$after );


		}




		return $output;

	}
	
	
	/*
	 * Special character filter to avoid conflicts with JSON template data
	 *
	 * @return {string}                     - New string.
	 *
	 */
	private function filter_control_val( $str ) {
		return  str_replace( '$', '&#36;', 
				str_replace( '[', '&#91;',
				str_replace( ']', '&#93;',
			   $str 
			  ) ) );
	}

}
