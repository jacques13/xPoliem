<?php
	require_once ('connect.php');
	require_once ('functions.php');
	require_once ('core/init.php');
	
	if(!empty($_SESSION['user_id'])){
	require_once ('nav-login.php');
	
	
	
	} else	{
	require_once ('nav-notLogin.php');
	
	
	
	
	}








?>