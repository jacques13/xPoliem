
<?php

require_once ('connect.php');
require_once ('functions.php');
require_once ('core/init.php');

if(!empty($_GET['u_id']) and !empty($_GET['mesg'])){
	$u_id = escape($_GET['u_id']);
	$my_id = escape($_SESSION['user_id']);
	$mesg = escape($_GET['mesg']);
	$name = unique($my_id,$u_id);
	mysql_query("INSERT INTO `chat`(`id`, `my_id`, `userid_2`, `mesg`, `name`) 
					VALUES (null,'$my_id','$u_id','$mesg','$name')");
	
	}
	header('Location:chat.php?u_id='.$u_id);
	
	


?>

