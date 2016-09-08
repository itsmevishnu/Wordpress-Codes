<?php

// 
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class samples_walker extends Walker_Nav_Menu {

	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$indent		 = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		$class_names = $value		 = '';

		$classes	 = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[]	 = 'menu-item-' . $item->ID;

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

		$id	 = apply_filters( 'nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args );
		$id	 = $id ? ' id="' . esc_attr( $id ) . '"' : '';

		$output .= $indent . '<li class = "hovernav"' . $id . $value . '>';

		$atts				 = array();
		$atts[ 'title' ]	 = !empty( $item->attr_title ) ? $item->attr_title : '';
		$atts[ 'target' ]	 = !empty( $item->target ) ? $item->target : '';
		$atts[ 'rel' ]		 = !empty( $item->xfn ) ? $item->xfn : '';
		$atts[ 'href' ]		 = !empty( $item->url ) ? $item->url : '';
		$atts				 = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );
		$attributes			 = '';
		foreach ( $atts as $attr => $value ) {
			if ( !empty( $value ) ) {
				$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
				$attributes .= ' ' . $attr . '="' . $value . '"';
			}
		}
		$item_output = $args->before;
		$item_output .= '<a' . $attributes . $class_names . '>';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}

	public function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat("\t", $depth);
		//$output .= "\n$indent<ul class=\"sub-nav\">\n";
		$classes	 = empty( $item->classes ) ? array() : (array) $item->classes;
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );

		$item_output .= "$indent<ul class = 'dropdown-menu '" . $class_names . ">";
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= $args->after;
		$output .= apply_filters( 'walker_nav_menu_start_lvl', $item_output, $item, $depth, $args );
	}

	public function end_lvl( &$output, $depth = 0, $args = array() ) {
		$output .= "</li>";
		$output .= "</ul>\n";
	}

	/**
	 * @see Walker::end_el()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param object $item Page data object. Not used.
	 * @param int $depth Depth of page. Not Used.
	 */
	function end_el( &$output, $item, $depth = 0, $args = array() ) {
		$output .= "</li>";
	}

}

class footer_menu_walker extends Walker_Nav_Menu {

	function start_el( &$output, $item, $depth, $args ) {
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$attributes = !empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) . '"' : '';
		$attributes .=!empty( $item->target ) ? ' target="' . esc_attr( $item->target ) . '"' : '';
		$attributes .=!empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) . '"' : '';
		$attributes .=!empty( $item->url ) ? ' href="' . esc_attr( $item->url ) . '"' : '';

		$item_output = $args->before;
		if ( $item->menu_order == 1 ) {
			$item_output .= '<a class = "first"' . $attributes . '>';
		} else {
			$item_output .= '<a' . $attributes . 'target = "_blank">';
		}
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;


		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}

}
