<?php

require_once ('connect.php');
require_once ('functions.php');
require_once ('core/init.php');



	$bid = '';
if(!empty($_GET['bid']) and !empty($_GET['u_id'])){
	
	$my_id = $_SESSION['user_id'];
	$bid = $_GET['bid'];
	$u_id = $_GET['u_id'];
	mysql_query("INSERT INTO `videochatbids`(`id`, `my_id`, `user_id`, `bid`) 
				VALUES (null,$my_id,$u_id,$bid)");
	}
	
	
	


?>