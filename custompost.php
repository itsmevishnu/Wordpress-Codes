<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//creating custom post type product with categories
function samples_product_init() {
	$labels		 = array(
		'name'				 => _x( 'Products', 'post type general name', 'samples' ),
		'singular_name'		 => _x( 'Product', 'post type singular name', 'samples' ),
		'menu_name'			 => _x( 'Products', 'admin menu', 'samples' ),
		'name_admin_bar'	 => _x( 'Product', 'add new on admin bar', 'samples' ),
		'add_new'			 => _x( 'Add New', 'product', 'samples' ),
		'add_new_item'		 => __( 'Add New Product', 'samples' ),
		'new_item'			 => __( 'New Product', 'samples' ),
		'edit_item'			 => __( 'Edit Product', 'samples' ),
		'view_item'			 => __( 'View Product', 'samples' ),
		'all_items'			 => __( 'All Products', 'samples' ),
		'search_items'		 => __( 'Search Products', 'samples' ),
		'parent_item_colon'	 => __( 'Parent Products:', 'samples' ),
		'not_found'			 => __( 'No Products found.', 'samples' ),
		'not_found_in_trash' => __( 'No products found in Trash.', 'samples' )
	);
	$supports	 = array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' );
	$args		 = array(
		'labels'			 => $labels,
		'description'		 => __( 'Description.', 'samples' ),
		'public'			 => true,
		'publicly_queryable' => true,
		'show_ui'			 => true,
		'show_in_menu'		 => true,
		'query_var'			 => true,
		'rewrite'			 => array( 'slug' => 'product' ),
		'capability_type'	 => 'post',
		'has_archive'		 => true,
		'hierarchical'		 => false,
		'menu_position'		 => null,
		'supports'			 => $supports
	);
	register_post_type( 'product', $args );
}

add_action( 'init', 'samples_product_init' );

//create the custom post type slider
function samples_slider_init() {
	$labels		 = array(
		'name'				 => _x( 'Sliders', 'post type general name', 'samples' ),
		'singular_name'		 => _x( 'Slider', 'post type singular name', 'samples' ),
		'menu_name'			 => _x( 'Sliders', 'admin menu', 'samples' ),
		'name_admin_bar'	 => _x( 'Slider', 'add new on admin bar', 'samples' ),
		'add_new'			 => _x( 'Add New', 'slider', 'samples' ),
		'add_new_item'		 => __( 'Add New Slider', 'samples' ),
		'new_item'			 => __( 'New Slider', 'samples' ),
		'edit_item'			 => __( 'Edit Slider', 'samples' ),
		'view_item'			 => __( 'View Slider', 'samples' ),
		'all_items'			 => __( 'All Sliders', 'samples' ),
		'search_items'		 => __( 'Search Sliders', 'samples' ),
		'parent_item_colon'	 => __( 'Parent Sliders:', 'samples' ),
		'not_found'			 => __( 'No Sliders found.', 'samples' ),
		'not_found_in_trash' => __( 'No sliders found in Trash.', 'samples' )
	);
	$supports	 = array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' );
	$args		 = array(
		'labels'			 => $labels,
		'description'		 => __( 'Description.', 'samples' ),
		'public'			 => true,
		'publicly_queryable' => true,
		'show_ui'			 => true,
		'show_in_menu'		 => true,
		'query_var'			 => true,
		'menu_icon'			 => 'dashicons-images-alt2', 
		'rewrite'			 => array( 'slug' => 'slider' ),
		'capability_type'	 => 'post',
		'has_archive'		 => true,
		'hierarchical'		 => false,
		'menu_position'		 => null,
		'supports'			 => $supports
	);
	register_post_type( 'slider', $args );
}

add_action( 'init', 'samples_slider_init' );
