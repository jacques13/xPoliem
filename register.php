<?php
	
	
	require_once 'core/init.php';
	//require_once 'nav.php';
	

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
			<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
			<link rel="stylesheet" href="css/global.css"/>
<form action="" method="post" class="centerA upload">
	<div class="field">
		<label for="username">Username   <span class="countdown_user"></span> <span class="available_user"></span></label><br>
		
		<input type="text" maxlength="20"name="username" id="username" value="<?php echo escape(Input::get('username')); ?>" autocomplete="off"/>
	</div><br>
	<div class="field">
		<label for="password">Password   <span class="countdown_pass"></span></label><br>
		<input type="password" maxlength="20"name="password" id="password"/>
	</div><br>
	<div class="field">
		<label for="password_again">Enter your password again   <span class="countdown_again"></span></label><br>
		<input type="password"maxlength="20" name="passwordAgain" id="passwordAgain"/>
	</div><br>
	<div class="field">
		<label for="email">Email</label><br>
		<input type="email" name="email" id="email" value="<?php echo escape(Input::get('email')); ?>"/>
	</div><br>
    <div class="field">
		<label for="terms"><a href="#">Accept the terms and conditions</label></a></label>
		<input name="terms" type="checkbox" value="false"/>
	</div><br>
    <div class="field">
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
	<input type="submit" value="Register"/>
</form>
<script>
  function updateCountdown() {
    // 220 is the max message length
    var user_remaining = 20 - jQuery('#username').val().length;
    jQuery('.countdown_user').text(user_remaining + '');
	var  pass_remaining = 20 - jQuery('#password').val().length;
    jQuery('.countdown_pass').text(pass_remaining + '');
	var  pass_remaining = 20 - jQuery('#passwordAgain').val().length;
    jQuery('.countdown_again').text(pass_remaining + '');
}

jQuery(document).ready(function($) {
    updateCountdown();
    $('#username').change(updateCountdown);
    $('#username').keyup(updateCountdown);
	$('#password').change(updateCountdown);
    $('#password').keyup(updateCountdown);
	$('#passwordAgain').change(updateCountdown);
    $('#passwordAgain').keyup(updateCountdown);
});
$('#username').keyup(function(e) {
var name = $(this).val();
	 $.ajax({    
						type: "GET",
						url: "checkUsername.php?name="+name,             
						dataType: "html",                 
						success: function(response){ 
							$('.available_user').html(response);
						}
			});

});


</script>