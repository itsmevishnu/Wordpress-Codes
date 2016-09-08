<?php

function theme_admin_scripts() {
	/**
	 * 1.0 - Enqeue stylesheets
	 * ----------------------------------------------------------------------------
	 *

	 * 2.0 - Enqeue JavaScripts   
	 * ----------------------------------------------------------------------------
	 */
	wp_enqueue_script( 'meta_box_script', get_template_directory_uri() . '/inc/js/theme_options_upload.js', array(), '1.0.0', true );
	wp_enqueue_style( 'theme_options', get_template_directory_uri() . '/inc/css/themeoptions.css' );
}

add_action( 'admin_enqueue_scripts', 'theme_admin_scripts' );
