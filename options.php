<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *  create theme option section template
 * ----------------------------------------------------------------------------
 */
function samples_options_page_fun() {
	wp_enqueue_media();
	?>
	<div id="theme-options-wrap">
		<h2>Theme Settings</h2>
		<p>Update various settings throughout your website.</p>
		<form method="post" action="options.php" enctype="multipart/form-data">
			<?php settings_fields( 'theme_options' ); ?>
			<?php do_settings_sections( __FILE__ ); ?>
			<input name="Submit" type="submit"  class="button-primary" value="<?php esc_attr_e( 'Save Changes' ); ?>" />
		</form>
	</div>	
	<?php
}

add_action( 'admin_init', 'register_and_build_fields' );

/**
 * declare sections for various options in theme options
 * ----------------------------------------------------------------------------
 */
function register_and_build_fields() {
	register_setting( 'theme_options', 'theme_options', 'validate_setting' );
	add_settings_section( 'general_settings', 'General Settings', 'section_general', __FILE__ );

	function section_general() {
		
	}

	add_settings_field( 'facebook_url', 'Facebook URL ', 'facebook_url_fun', __FILE__, 'general_settings' );
	add_settings_field( 'yoututbe_url', 'Youtube URL', 'youtube_url_fun', __FILE__, 'general_settings' );
//          add_settings_field('copy_right', 'Copyright', 'copy_right_fun', __FILE__, 'general_settings');
	add_settings_field( 'logo', 'Logo', 'logo_fun', __FILE__, 'general_settings' );
	add_settings_field( 'mob_logo', 'Mobile Logo', 'mob_logo_fun', __FILE__, 'general_settings' );
}

function validate_setting( $theme_options ) {
	return $theme_options;
}

/* * *  function call to create facebook url
 * ----------------------------------------------------------------------------
 */

function facebook_url_fun() {
	$options = get_option( 'theme_options' );
	echo "<input name='theme_options[facebook_url]' type='text' value='{$options[ 'facebook_url' ]}' />";
}

/* * *  function call to create Youtube url
 * ----------------------------------------------------------------------------
 */

function youtube_url_fun() {
	$options = get_option( 'theme_options' );
	echo "<input name='theme_options[youtube_url]' type='text' value='{$options[ 'youtube_url' ]}' />";
}

/* * *  function call to create a copyright text
 * ----------------------------------------------------------------------------
 */
//         function copy_right_fun() {
//            $options = get_option('theme_options');
//            echo "<input name='theme_options[copy_right]' type='text' value='{$options['copy_right']}' />";
//        }

/**
 *  function call to create logo uploading German
 * ----------------------------------------------------------------------------
 */
function logo_fun() {
	$options = get_option( 'theme_options' );
	echo "<div class='uploader'>
                 <input type='text' name='theme_options[logo]' id='_upld_files' value='{$options[ 'logo' ]}' />
                 <input class='button' name='_upld_files_button' id='_upld_files_button' value='Upload' />
                  </div>";

	echo main_image( $options[ 'logo' ] );
}

function mob_logo_fun() {
	$options = get_option( 'theme_options' );
	echo "<div class='uploader'>
                 <input type='text' name='theme_options[mob_logo]' id='_mob_upld_files' value='{$options[ 'mob_logo' ]}' />
                 <input class='button' name='_mob_upld_files_button' id='_mob_upld_files_button' value='Upload' />
                  </div>";

	echo main_image( $options[ 'mob_logo' ] );
}

function main_image( $src ) {
	//$options = get_option('theme_options');
	if ( !$src ) {
		$src	 = "http://placehold.it/209x251";
		$print	 = "<div id = 'img'><img src = '{$src}' title = 'Current logo' width = '250px' hieght = '300px' /></div>";
	} else {
		$print = "<div id = 'img'><img src = '{$src}' title = 'Current logo' width = '250px' hieght = '300px'/></div>";
	}

	return $print;
}

// add the admin options page
function add_theme_option_fun() {
	add_theme_page( 'Theme Options', 'Theme Options', 'administrator', 'theme_options', 'samples_options_page_fun' );
}

add_action( 'admin_menu', 'add_theme_option_fun' );

