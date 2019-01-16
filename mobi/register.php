<?php
	
	
	require_once 'core/init.php';
	
	

	if (Input::exists()) {
		if (Token::check(Input::get('token'))) {
			$validate = new Validate();
			$validation = $validate->check($_POST, array(
				'username'	=> array(
					/*'fieldName'	=> 'Username',*/
					'required' 	=> true,
					'min'		=> 2,
					'max'		=> 20,
					'unique'	=> 'users'
				),
				'password'	=> array(
					/*'fieldName'	=> 'Password',*/
					'required' 	=> true,
					'min'		=> 6
				),
				'passwordAgain' => array(
					/*'fieldName'	=> 'passwordAgain',*/
					'required' 	=> true,
					'min'		=> 6,
					'matches'	=> 'password'
				),
				'email'	=> array(
					/*'fieldName'	=> 'email',*/
					'required' 	=> true,
					'min'		=> 2,
					'max'		=> 50
				),
				'terms'	=> array(
					/*'fieldName'	=> 'terms',*/
					'required' 	=> true
					
				),
				'gender'	=> array(
					/*'fieldName'	=> 'gender',*/
					'required' 	=> true
					
				)
				
			));

			if ($validation->passed()) {
				$user = new User();
				$salt = Hash::salt(32);
				try {
					$user->create(array(
						'username' 	=> Input::get('username'),
						'password' 	=> Hash::make(Input::get('password'),$salt),
						'salt' 		=> $salt,
						'email' 	=> Input::get('email'),
						'joined' 	=> date('Y-m-d H:i:s'),
						'userGroup'	=> 1,
						'ip_address'=> Input::getIp('ip_address'),
						'gender'    => Input::get('gender')
					));
					Session::flash('home','You have been registered and can now log in');
					Redirect::to('index.php');
				} catch (Exception $e) {
					die($e->getMessage());
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
			form .field{
			text-align:center;margin:0 auto;
			}
            	.centerA{text-align:center;margin:45px auto;}
				
			</style>
			<link rel="stylesheet" href="../css/global.mobi.css"/>
<form action="" method="post" class="centerA upload">
	<div class="field big">
		<label for="username">username</label><br>
		<input type="text" name="username" id="username" value="<?php echo escape(Input::get('username')); ?>" autocomplete="off"/>
	</div><br>
	<div class="field big">
		<label for="password">password</label><br>
		<input type="password" name="password" id="password"/>
	</div><br>
	<div class="field big">
		<label for="password_again">Enter your password again</label><br>
		<input type="password" name="passwordAgain" id="passwordAgain"/>
	</div><br>
	<div class="field big">
		<label for="email">Email</label><br>
		<input type="email" name="email" id="email" value="<?php echo escape(Input::get('email')); ?>"/>
	</div><br>
    <div class="field big">
		<label for="terms"><a href="#">Accept the terms and conditions</label></a></label><br>
		<input name="terms" type="checkbox" value="false"/>
	</div><br>
    <div class="field big">
		 <label name="gender">
    <input type="radio" name="gender" value="male" id="Male" />
    Male</label>
  <br />
  <label name="gender">
    <input type="radio" name="gender" value="female" id="Female" />
    Female</label>
  <br />
	</div><br>
	<input type="hidden" name="token" value="<?php echo Token::generate(); ?>"/>
	<input type="submit" value="Register" class="Main_buttons"/>
</form>