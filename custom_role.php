<?php
/*
* Add custom user type when the theme activated
*/
function samples_add_new_role(){
	$capabilities = array('delete_posts'     => true,
					'delete_published_posts' => true,
					'edit_posts'             => true,
					'edit_published_posts'   => true,
					'publish_posts'          => true,
					'read'                   => true,
					'upload_files'           => true
					);
	add_role( 'post_builder', 'Post Builder', $capabilities );
}
add_action( 'init', 'samples_add_new_role' );
?>
