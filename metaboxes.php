<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

add_action( 'add_meta_boxes', 'samples_image_metabox' );

/**
 *  function samples_image_metabox is used to build a 
 *  simple form in slider post type
 */
function samples_image_metabox() {
	wp_enqueue_media();
	$where = array( 'slider', 'page' );
	add_meta_box(
	'samples_mobile_image', 'Upload image for mobile', 'samples_mobile_image_callback', $where, 'side'
	);
}

add_action( 'save_post', 'samples_mobile_image_save' );

/**
 * this is the call back function for the image metabox 
 */
function samples_mobile_image_callback( $post ) {
	$value	 = get_post_meta( $post->ID, 'samples_mobile_image', true );	
	$html	 = "<div>";
	$html .= "<input type='text' name='mob_img' id='_upld_files' value = '$value'/>";
	$html .= "<input class='button' name='_upld_files_button' id='_upld_files_button' value='Browse' />";
	$html .= "</div>";
	echo $html;
}

/**
 * 
 * @param type $post is the of the current posts
 * samples_mobile_image_save is used to save the images in post_meta table
 */
function samples_mobile_image_save( $post ) {
	global $post;
	if ( isset( $_POST[ 'mob_img' ] ) ) {
		$value_img = $_POST[ 'mob_img' ];
		update_post_meta( $post->ID, 'samples_mobile_image', $value_img );
	}
}

add_action( 'save_post', 'samples_mobile_image_save' );
/**
 * Metabox for saving the content of extra details of the product
 */
add_action( 'add_meta_boxes', 'samples_product_metabox' );
/*
 * function samples_product_metabox is used to create a simple text
 * box to save the product extra details
 */

function samples_product_metabox() {
	add_meta_box(
	'samples_product_details', 'Enter the product details', 'samples_product_callback', 'product'
	);
}

/**
 * call back function describe the display 
 */
function samples_product_callback( $post ) {
	$html = "<textarea  name ='product_details' id = 'excerpt'>";
	$html .= get_post_meta( $post->ID, 'samples_product_details', true );
	$html .= "</textarea>";
	echo $html;
}

/**
 * 
 * @param type $post_id is the id of current post id
 * save the product details in post meta table
 */
function samples_product_save( $post ) {
	global $post;
	if ( isset( $_POST[ 'product_details' ] ) ) {
		$value_data = $_POST[ 'product_details' ];
		update_post_meta( $post->ID, 'samples_product_details', $value_data );
	}
}

//add_action( 'save_post', 'samples_product_save' );


/*
 * function samples_product_metabox is used to create a simple text
 * box to save the product extra details
 */
/**
 * custom meta text box for adding the product background color
 */
add_action( 'add_meta_boxes', 'samples_product_color_metabox' );
/*
 * function samples_product_metabox is used to create a simple text
 * box to save the product extra details
 */

function samples_product_color_metabox() {
	add_meta_box(
	'samples_product_color_details', 'Select the Color for the product background', 'samples_product_color_callback', 'product'
	);
}

/**
 * call back function describe the display 
 */
function samples_product_color_callback( $post ) {
	$value	 = get_post_meta( $post->ID, 'samples_product_color_details', true );
	$colors = array("Blue"=>"blue","Red"=>"red","Yellow"=>"yellow","Brown"=>"brown","Light Brown"=>"lt-brown","Green"=>"green");
	$html	 = '<select name = "product_color_details">';
	foreach($colors as $color=>$name){
		if($name == $value){
			$html .= "<option value ='$name' selected = 'selected'>".$color."</option>";
		}
		$html .= "<option value ='$name'>".$color."</option>";
	}
	$html .= "</select>";
	echo $html;
}

/**
 * 
 * @param type $post_id is the id of current post id
 * save the product_color details in post meta table
 */
function samples_product_color_save( $post ) {
	global $post;
	if ( isset( $_POST[ 'product_color_details' ] ) ) {
		$value_data = $_POST[ 'product_color_details' ];
		update_post_meta( $post->ID, 'samples_product_color_details', $value_data );
	}
}

add_action( 'save_post', 'samples_product_color_save' );

/*
 * function samples_product_video_url_metabox is used to create a simple text
 * box to save the product extra details
 */

function samples_product_video_url_metabox() {
	add_meta_box(
	'samples_product_video_url_details', 'Enter the Youtube video URL', 'samples_product_video_url_callback', 'slider','side'
	);
}

/**
 * call back function describe the display 
 */
function samples_product_video_url_callback( $post ) {
	$value	 = get_post_meta( $post->ID, 'samples_product_video_url_details', true );
	$html	 = "<div>";
	$html 	.= "<input type='text' name='video_url' value = '$value'/>";
	$html 	.= "</div>";
	echo $html;
}

/**
 * 
 * @param type $post_id is the id of current post id
 * save the product_color details in post meta table
 */
function samples_product_video_url_save( $post ) {
	global $post;
	if ( isset( $_POST[ 'video_url' ] ) ) {
		$value_data = $_POST[ 'video_url' ];
		update_post_meta( $post->ID, 'samples_product_video_url_details', $value_data );
	}
}
add_action( 'add_meta_boxes', 'samples_product_video_url_metabox' );
add_action( 'save_post', 'samples_product_video_url_save' );

/*
 * function samples_slider_link_metabox is used to create a simple text
 * box to save the product extra details
 */

function samples_slider_link_metabox() {
	add_meta_box(
	'samples_slider_link_details', 'Enter the Link ', 'samples_slider_link_callback', 'slider'
	);
}

/**
 * call back function describe the display 
 */
function samples_slider_link_callback( $post ) {
	$value	 = get_post_meta( $post->ID, 'samples_slider_link_details', true );
	$html	 = "<div>";
	$html 	.= "<input type='text' id = 'excerpt' name='slider_link' value = '$value'/>";
	$html 	.= "</div>";
	echo $html;
}

/**
 * 
 * @param type $post_id is the id of current post id
 * save the product_color details in post meta table
 */
function samples_slider_link_save( $post ) {
	global $post;
	if ( isset( $_POST[ 'slider_link' ] ) ) {
		$value_data = $_POST[ 'slider_link' ];
		update_post_meta( $post->ID, 'samples_slider_link_details', $value_data );
	}
}
add_action( 'add_meta_boxes', 'samples_slider_link_metabox' );
add_action( 'save_post', 'samples_slider_link_save' );