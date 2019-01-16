<?php

require_once ('connect.php');
require_once ('functions.php');
require_once ('core/init.php');

$roomid = '';

	$bid = '';
if(!empty($_GET['roomid']) and !empty($_GET['bid'])){
	$roomid =escape( $_GET['roomid']);
	$my_id = escape( $_SESSION['user_id']);
	$bid =escape($_GET['bid']);
	mysql_query("INSERT INTO `bids`(`id`, `roomid`, `my_id`, `bid`) VALUES (null,$roomid,$my_id,$bid)");
	
	}
	
	
	


?>