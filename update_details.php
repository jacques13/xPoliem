<?php
	require_once 'core/init.php';
	require_once 'nav.php';
	$user = new User();

	if (!$user->isLoggedIn()) {
		Redirect::to('index.php');
	}

	if (Input::exists()) {
		if (Token::check(Input::get('token'))) {
			$validate = new Validate();
			$validation = $validate->check($_POST, array(
				'email'	=> array(
					'fieldName'	=> 'email',
					'required' 	=> true,
					'min'		=> 2,
					'max'		=> 50
				)
			));

			if ($validation->passed()) {
				$user = new User();
				try {
					$user->update(array(
						'email' => Input::get('email')
					));
					Session::flash('home','Your details have been updated');
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
<link rel="stylesheet" href="css/global.css"/>
<form action="" method="post" class="upload">
	<div class="field">
		<label for="email">Email</label>
		<input type="text" name="email" id="email" value="<?php echo escape($user->data()->email); ?>" />
	</div><br>
	<input type="hidden" name="token" value="<?php echo Token::generate(); ?>"/>
	<input type="submit" value="Update"/>
</form>