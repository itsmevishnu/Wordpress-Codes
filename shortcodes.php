<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * 
 * @param type $content store the content of the shortcode
 * @return string $samples_plus
 * function used to create the shortcode [plus][/plus] for
 * creating a plus symbol with content
 */
function samples_back_button_shortcode( $atts, $content, $tag ) {
	$htmlstart	 = '<a href="#" class="prdt-back-link">'; //write the html codes here for the back_button sign
	$htmlend	 = "</a>"; //write the html code after the content
	$samples_back_button	 = $htmlstart . $content . $htmlend;
	return force_balance_tags($samples_back_button);
}

add_shortcode( 'back', 'samples_back_button_shortcode' );

/**
 * 
 * @param type $attribute
 * @param type $content
 * return string $samples_button
 * function used to create a shortcode to create a new button
 */
function samples_button_shortcode( $atts, $content, $tag ) {
	$htmlstart	 = '<div class="load-image button-group" style="display: block;"><span>'; //html starting code here
	$htmlend	 = '</span><input type="file" capture="camera" id="file-input" style="cursor: pointer;" accept ="image/jpeg, image/jpg"></div> '; //html ending code here
	$eee_button	 = $htmlstart . $content . $htmlend;
	return $eee_button;
}

add_shortcode( 'button', 'samples_button_shortcode' );

//short code for the title of the all pages
add_shortcode( 'title', 'samples_title_shortcode' );

/**
 * 
 * @param type $atts is a string that hold the attributes
 * @param type $content is the content of the shortcode
 * @param type $tag is the tag
 * @return string $samples_title 
 * function is used to create the title
 */
function samples_title_shortcode( $atts, $content, $tag ) {
	
	$htmlstart	 = '<div class="content-head"><h3 class="participate-win">';
	$htmlend	 = '</h3></div>';
	$samples_title	 = $htmlstart . $content . $htmlend;
	return force_balance_tags($samples_title);
}

add_shortcode( 'plus_link', 'samples_plus_link_shortcode' );

/**
 * 
 * @param type $atts is a string that hold the attributes
 * @param type $content is the content of the shortcode
 * @param type $tag is the tag
 * @return string $samples_plus_link 
 * function is used to create the plus_link
 */
function samples_plus_link_shortcode( $atts, $content, $tag ) {
	
	$htmlstart	 = '<div class="expand-block">';
	$htmlstart	 .=  '<div class="drop-down-arrow expand-arrow"></div><span>';
	$htmlend	 = '</span></div>';
	$samples_plus_link	 = $htmlstart . $content . $htmlend;
	return force_balance_tags($samples_plus_link);
}

add_shortcode( 'product_title', 'samples_product_title_shortcode' );

/**
 * 
 * @param type $atts is a string that hold the attributes
 * @param type $content is the content of the shortcode
 * @param type $tag is the tag
 * @return string $samples_product_title 
 * function is used to create the product_title
 */
function samples_product_title_shortcode( $atts, $content, $tag ) {
	
	$htmlstart	 = '<div class="prdt-title-head">';

	$htmlend	 = '</div>';
	$samples_product_title	 = $htmlstart . $content . $htmlend;
	return force_balance_tags($samples_product_title);
}
/*
* Function used to create the shortcode for the product
 */
function samples_product_button_shortcode($atts,$content,$tag){
	$htmlstart = '<div class="button-group">';
	$link = shortcode_atts( array( 'link' => '#' ), $atts );
	$htmlstart .=  '<a class="btn-prtn" href="'.$link['link'].'">';
	$htmlend = '</a></div>';
	$samples_product_button = $htmlstart.$content.$htmlend;
	return force_balance_tags($samples_product_button);
}
add_shortcode( 'product_button', 'samples_product_button_shortcode' );
// created by Asha for Whats inside
function samples_excerpt_text_shortcode( $atts, $content, $tag ) {
	$htmlstart	 = '<p>'; //html starting code here
	$htmlend	 = '</p>'; //html ending code here
	$excerpt_content	 = $htmlstart . $content . $htmlend;
	return $excerpt_content;
}

add_shortcode( 'more-text', 'samples_excerpt_text_shortcode' );
//short code for the text shortcode in excerpt

function samples_excerpt_button_shortcode( $atts, $content, $tag ) {
	$htmlstart	 = '<div class="button-group">'; //html starting code here
	$htmlend	 = '</div>'; //html ending code here
	$link		 = shortcode_atts( array( 'link' => '','class' => '' ), $atts );
	$excerpt_button	 = $htmlstart . '<a class='.$link['class'].'  href = #' . $link[ 'link' ] . '>' . $content . "</a>" . $htmlend;
	return $excerpt_button;
}

add_shortcode( 'more-button', 'samples_excerpt_button_shortcode' );
//short code for the buton shortcode in excerpt
