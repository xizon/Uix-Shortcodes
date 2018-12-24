<?php
// This file is based on wp-includes/js/tinymce/langs/wp-langs.php

if ( ! defined( 'ABSPATH' ) )
    exit;

if ( ! class_exists( '_WP_Editors' ) )
    require( ABSPATH . WPINC . '/class-wp-editor.php' );

function uix_sc_custom_tinymce_plugin_translation() {
    $strings = array(
		'lang_demo_enable' => UixShortcodes::DEMOFORM,
	    'lang_demo_1' => __( 'Hello Form', 'uix-shortcodes' ),
		'lang_demo_2' => __( 'Column Form', 'uix-shortcodes' ),
		'lang_demo_3' => __( 'Text', 'uix-shortcodes' ),
		'lang_demo_4' => __( 'Demo', 'uix-shortcodes' ),
        'lang_1' => __( 'Uix Shortcodes', 'uix-shortcodes' ),
		'lang_2' => __( 'Content', 'uix-shortcodes' ),
		'lang_3' => __( 'Recent Posts', 'uix-shortcodes' ),
		'lang_4' => __( 'Pricing', 'uix-shortcodes' ),
		'lang_5' => __( 'Pricing 3 Column', 'uix-shortcodes' ),
		'lang_6' => __( 'Pricing 4 Column', 'uix-shortcodes' ),
		'lang_7' => __( 'Accordion', 'uix-shortcodes' ),
		'lang_8' => __( 'Tabs', 'uix-shortcodes' ),
		'lang_9' => __( 'Team', 'uix-shortcodes' ),
		'lang_10' => __( 'Team Full Width', 'uix-shortcodes' ),
		'lang_11' => __( 'Team Grid', 'uix-shortcodes' ),
		'lang_12' => __( 'Features', 'uix-shortcodes' ),
		'lang_13' => __( 'Features 2 Column', 'uix-shortcodes' ),
		'lang_14' => __( 'Features 3 Column', 'uix-shortcodes' ),
		'lang_15' => __( 'Client', 'uix-shortcodes' ),
		'lang_16' => __( 'Image Slider', 'uix-shortcodes' ),
		'lang_17' => __( 'Timeline', 'uix-shortcodes' ),
		'lang_18' => __( 'Testimonials Carousel', 'uix-shortcodes' ),
		'lang_19' => __( 'Video', 'uix-shortcodes' ),
		'lang_20' => __( 'Audio', 'uix-shortcodes' ),
		'lang_21' => __( 'Column', 'uix-shortcodes' ),
		'lang_22' => __( 'Web Elements', 'uix-shortcodes' ),
		'lang_23' => __( 'Special Heading', 'uix-shortcodes' ),
		'lang_24' => __( 'Dividing Line', 'uix-shortcodes' ),
		'lang_25' => __( 'Button', 'uix-shortcodes' ),
		'lang_26' => __( 'Share Buttons', 'uix-shortcodes' ),
		'lang_27' => __( 'Icon', 'uix-shortcodes' ),
		'lang_28' => __( 'Google Map', 'uix-shortcodes' ),
		'lang_29' => __( 'Contact Form', 'uix-shortcodes' ),
		'lang_30' => __( 'Source Code', 'uix-shortcodes' ),
		'lang_31' => __( 'Portfolio', 'uix-shortcodes' ),
		'lang_32' => __( 'Container/Parallax', 'uix-shortcodes' ),
		'lang_33' => __( 'Progress Bar', 'uix-shortcodes' ),
		'lang_34' => __( 'Author Card', 'uix-shortcodes' ),
		
		
		
    );
    $locale = _WP_Editors::$mce_locale;
    $translated = 'tinyMCE.addI18n("' . $locale . '.uix_sc_custom_tinymce_plugin", ' . json_encode( $strings ) . ");".PHP_EOL;

     return $translated;
}

$strings = uix_sc_custom_tinymce_plugin_translation();