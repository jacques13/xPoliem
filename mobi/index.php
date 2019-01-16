<?php
	require_once 'core/init.php';
	

 
	$user = new User();
	if ($user->isLoggedIn()) {
		 $data = $user->data();
            $id = $data->ID;
			$usernameR = escape($data->username);
			$email = escape($data->email);
			$gender = escape($data->gender);
			$_SESSION['user_id'] = $id;
						
?>
	
   
 
<?php
	} else {
	header('location: Login.php');
		}
?>