<?php
	require_once 'core/init.php';
	require_once 'classes/Redirect.php';

	$user = new User();
	$user->logout();

	Redirect::to('Home.php');
?>