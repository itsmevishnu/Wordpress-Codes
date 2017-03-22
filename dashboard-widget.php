<?php
/**
 * Testing some kind of wordpress details
 */
/**
 * Creating simple admin widget
 */

add_action('wp_dashboard_setup', 'my_custom_dashboard_function');

/**
 * Function to create a new dash board widget
 */

function my_custom_dashboard_function() {

  wp_add_dashboard_widget( 'custom-widget', __("This is my widget title"), 'my_widget_callback_function');
}

function my_widget_callback_function() {
  echo "Hello world, This is my widget content";
}
