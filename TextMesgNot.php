<?php
require_once ('connect.php');
require_once ('functions.php');
require_once ('core/init.php');

$my_id = escape($_SESSION['user_id']);
$IDS = array();
$sql = mysql_query("SELECT * FROM `chat` WHERE `my_id` = '$my_id'");
if($count < 1 ){
echo "<li><a href='#'>No chats yet</a></li>";
}	
	$count = mysql_num_rows($sql); 
 	$row = mysql_fetch_array($sql);   
		while($row = mysql_fetch_array($sql)){ 
			if(!in_array($row['userid_2'],$IDS)){
				 echo"<li><a href='chat.php?u_id=".$row['userid_2']."'>".getUsername($row['userid_2'])." started a chat</a></li>";
				}
			 array_push($IDS,$row['userid_2']);
		}
			 
				
?>