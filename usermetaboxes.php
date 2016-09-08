<?php
/*
* The file used to display and edit some extra values for
* the users.
 */

add_action( 'edit_user_profile', 'emme_additional_details' );
add_action( 'show_user_profile', 'emme_additional_details' );
function emme_additional_details(){
	$id = $_REQUEST['user_id'];
	$telefone = get_user_meta( $id, 'telefone',true);
	$alter = get_user_meta( $id, 'alter',true);
	?>
	<h2><?php _e('Addtional Information');?></h2>
	<table class="form-table">
		<tbody>
			<tr>
				<th>
					<label for = "alter"><?php _e('Age');?></label>
				</th>
				<td>
					<input class="regular-text" type = "text" name = "alter" value = "<?php echo $alter?>"></input>
				</td>
			</tr>
			<tr>
				<th>
					<label for = "telefone"><?php _e('Telephone');?></label>
				</th>
				<td>
					<input class="regular-text" type = "text" name = "telefone" value ="<?php echo $telefone?>"></input>
				</td>
			</tr>
		</tbody>
	</table>
	<?php
}
add_action( 'personal_options_update', 'emme_additional_details_save' );
add_action( 'edit_user_profile_update', 'emme_additional_details_save' );

function emme_additional_details_save() {
	$alter    = $_REQUEST['alter'];
	$telefone = $_REQUEST['telefone'];
	$id       = $_REQUEST['user_id'];
	update_user_meta( $id, 'alter', $alter);
	update_user_meta( $id, 'telefone', $telefone);
	
}
?>