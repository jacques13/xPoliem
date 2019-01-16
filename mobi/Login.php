<?php
	require_once 'core/init.php';

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
<link rel="stylesheet" href="../css/global.mobi.css"/>
<form action="" method="post" class="upload">
<center>
	<div class="field big">
		<label for="username">Username</label><br>
		<input size="25" type="text" name="username" id="username" value="<?php echo escape(Input::get('username')); ?>" autocomplete="off"/>
	</div>
	<div class="field big">
		<label for="password">Password</label><br>
		<input type="password" name="password" id="password"/>
	</div>
	<div class="field big">
		<label for="remember"><br>
			<input  type="checkbox" name="remember" id="remember"/> Remember Me
		</label>
	</div>
	<input type="hidden" name="token" value="<?php echo Token::generate(); ?>"/>
	<input type="submit" value="Login"class="Main_buttons"/>
	</center>
</form>