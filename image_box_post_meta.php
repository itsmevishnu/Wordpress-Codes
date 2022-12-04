
// Includes the banner image js for proper uploading
add_action('admin_enqueue_scripts', 'hyreo_include_image_js');	
function hyreo_include_image_js() {

	if ( ! did_action( 'wp_enqueue_media' ) ) {
        wp_enqueue_media();
    }
	
	wp_enqueue_script('hyreo_banner_script', get_stylesheet_directory_uri(). '/js/banner_image.js', ['jquery'], '1.0', true);
}

// Function for creating a metabox to store the banner image details.
function hyreo_banner_image_metabox() {
	add_meta_box(
		'hyreo_banner_image', 'Upload Banner Image', 'hyreo_banner_image_callback', 'post', 'normal', 'side'
		);
}

add_action( 'add_meta_boxes', 'hyreo_banner_image_metabox' );

// Call back function defined *hyero_banner_image_metabox
function hyreo_banner_image_callback( $post ) {
	$meta_key = 'hyreo_banner_image';
	$value = get_post_meta( $post->ID, $meta_key, true);
	$image = ' button">Upload banner image';
    $image_size = 'full'; // it would be better to use thumbnail size here (150x150 or so)
    $display = 'none'; // display state ot the "Remove image" button

    if( $image_attributes = wp_get_attachment_image_src( $value, $image_size ) ) {

        // $image_attributes[0] - image URL
        // $image_attributes[1] - image width
        // $image_attributes[2] - image height

        $image = '"><img src="' . $image_attributes[0] . '" style="max-width:95%;display:block;" />';
        $display = 'inline-block';

    } 

    return '
    <div>
        <a href="#" class="banner_image' . $image . '</a>
        <input type="hidden" name="' . $meta_key . '" id="image_banner" value="' . $value . '" />
        <a href="#" class="remove_banner_image" style="display:inline-block;display:' . $display . '">Remove image</a>
    </div>';
}


// Saves the hyreo banner image content with post save
function hyreo_banner_image_save( $post_id ) {
	$meta_key = 'hyreo_banner_image';
	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) 
	return $post_id;

	update_post_meta( $post_id, $meta_key, $_POST[$meta_key] );
	return $post_id;
}
 
add_action('save_post', 'hyreo_banner_image_save');
