<?php
require_once ('connect.php');
require_once ('functions.php');
require_once ('core/init.php');
$chats = findchats($my_id);

		if(empty($chats)){echo
				"
				<li>no chats at the moment</li>
				";}else{foreach($chats as $chat){
				$room = find_room($chat, $my_id);
				
				echo
				"
				<li><a href='videoChat.php?name=$room'>wants to videochat $chat</a></li>
				";
				}}
				
?>