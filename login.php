<?php
	require_once 'core/init.php';
	//require_once 'nav.php';
	if (Input::exists()) {
		if (Token::check(Input::get('token'))) {
			$validate = new Validate();
			$validation = $validate->check($_POST, array(
				'username'	=> array(
					'fieldName'	=> 'Username'
					
				),
				'password'	=> array(
					'fieldName'	=> 'Password'
					
				)
			));

			if ($validation->passed()) {
				$user 		= new User();
				$remember 	= (Input::get('remember') === 'on') ? true : false;
				$login 		= $user->login(Input::get('username'),Input::get('password'), $remember);
				
		

				if ($login) {
					header('Location:profile.php?u_id=');
				} else {
					echo "Sorry we could not log you in";
				}
			} else {
				foreach ($validation->errors() as $error) {
					echo $error, '<br>';
				}
			}
		}
	}
?>
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<link rel="stylesheet" href="css/global.css"/>
<form action="" method="post" class="upload">
	<div class="field">
		<label for="username">Username   <span class="countdown_user"></span></label>
		
		<input type="text" maxlength="20"name="username" id="username" value="<?php echo escape(Input::get('username')); ?>" autocomplete="off"/>
	</div>
	<div class="field">
		<label for="password">Password   <span class="countdown_pass"></span></label>
		<input type="password" maxlength="20"name="password" id="password"/>
	</div>
	<div class="field">
		<label for="remember">
			<input type="checkbox" name="remember" id="remember"/> Remember Me
		</label>
	</div><br>
	<input type="hidden" name="token" value="<?php echo Token::generate(); ?>"/>
	<input type="submit" value="Login"/>
	
</form>
<script>
  function updateCountdown() {
    // 220 is the max message length
    var user_remaining = 20 - jQuery('#username').val().length;
    jQuery('.countdown_user').text(user_remaining + '');
	var  pass_remaining = 20 - jQuery('#password').val().length;
    jQuery('.countdown_pass').text(pass_remaining + '');
}

jQuery(document).ready(function($) {
    updateCountdown();
    $('#username').change(updateCountdown);
    $('#username').keyup(updateCountdown);
	$('#password').change(updateCountdown);
    $('#password').keyup(updateCountdown);
});

</script>