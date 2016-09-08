<?php
/**
 * Template Name: Fornt Page Form
 */
?>

<?php get_header();?>

<?php
	if(isset($_POST['submit'])){
		$first_name = $_POST['first_name'];
		$last_name  = $_POST['last_name'];
		$email      = $_POST['email'];
		$password   = " ";
		$email_value = explode('@', $email);
		$user_name = $email_value[0];
		$user_array = array(
			'user_login' => $user_name,
			'user_email' => $email,
			'display_name' => $first_name. ' ' . $last_name,
			'first_name' => $first_name,
			'last_name' => $last_name,
			'role' => 'subscriber'
			);
		$user_id = wp_insert_user( $user_array ) ;
		print_r($user_id);
		// if(!is_wp_error( $user_id ) ) {
		// 	echo "user is",$user_id;
		// }
 	}

?>
<form action="" method ="post">
  <label for="first_name" class="label">First Name</label>
  <input type="text" name="first_name" placeholder="First Name" class="first"><br>
  <label for="last_name" class="label">Last Name</label>
  <input type="text" name="last_name" placeholder="Last Name" class="last"><br>
  <label for="email" class="label">Email</label>
  <input type="email" name="email" placeholder="Email" class="email"><br>
  <input type="submit" name="submit" value="Save">
</form>

<?php get_footer();?>