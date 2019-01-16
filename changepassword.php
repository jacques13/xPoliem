<?php
	require_once 'core/init.php';
	//require_once 'nav.php';
	$user = new User();

	if (!$user->isLoggedIn()) {
		Redirect::to('index.php');
	}

	if (Input::exists()) {
		if (Token::check(Input::get('token'))) {
			$validate = new Validate();
			$validation = $validate->check($_POST, array(
				'currentPassword' => array(
					'fieldName'	=> 'Existing Password',
					'required' 	=> true,
					'min'		=> 6,
					'max'		=> 50
				),
				'newPassword' => array(
					'fieldName'	=> 'New Password',
					'required' 	=> true,
					'min'		=> 6,
					'max'		=> 50
				),
				'newPasswordAgain' => array(
					'fieldName'	=> 'New Password Again',
					'required' 	=> true,
					'min'		=> 6,
					'max'		=> 50,
					'matches'	=> 'newPassword'
				)
			));

			if ($validation->passed()) {
				$user = new User();
				if (Hash::make(Input::get('currentPassword'), $user->data()->salt) !== $user->data()->password) {
					echo 'Your current password is incorrect';
				} else {
					$salt = Hash::salt(32);
					$user->update(array(
						'password' 	=> Hash::make(Input::get('newPassword'), $salt),
						'salt' 		=> $salt
					));
					Session::flash('home','Your details have been updated');
					Redirect::to('index.php');
				}
			} else {
				foreach ($validation->errors() as $error) {
					echo $error, '<br>';
				}
			}
		}
	}
?>
<style>
            .centerA{text-align:center}
			</style>
			<link rel="stylesheet" href="css/global.css"/>

<form action="" method="post" class="centerA upload">
	<div class="field">
		<label for="currentPassword">Your existing Password   <span class="countdown_currentPassword"></span></label>
		<input type="password" maxlength="20"name="currentPassword" id="currentPassword"/>
	</div>
	<div class="field">
		<label for="newPassword">New Password   <span class="countdown_newPassword"></span></label>
		<input type="password"maxlength="20" name="newPassword" id="newPassword"/>
	</div>
	<div class="field">
		<label for="newPasswordAgain">Enter your new password again   <span class="countdown_newPasswordAgain"></span></label>
		<input type="password"maxlength="20" name="newPasswordAgain" id="newPasswordAgain"/>
	</div><br>
	<input type="hidden" name="token" value="<?php echo Token::generate(); ?>"/>
	<input type="submit" value="Update"/>
</form>
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script>
  function updateCountdown() {
    // 220 is the max message length
    var user_remaining = 20 - jQuery('#currentPassword').val().length;
    jQuery('.countdown_currentPassword').text(user_remaining + '');
	var  pass_remaining = 20 - jQuery('#newPassword').val().length;
    jQuery('.countdown_newPassword').text(pass_remaining + '');
	var  pass_remaining = 20 - jQuery('#newPasswordAgain').val().length;
    jQuery('.countdown_newPasswordAgain').text(pass_remaining + '');
}

jQuery(document).ready(function($) {
    updateCountdown();
    $('#currentPassword').change(updateCountdown);
    $('#currentPassword').keyup(updateCountdown);
	$('#newPassword').change(updateCountdown);
    $('#newPassword').keyup(updateCountdown);
	$('#newPasswordAgain').change(updateCountdown);
    $('#newPasswordAgain').keyup(updateCountdown);
});

</script>