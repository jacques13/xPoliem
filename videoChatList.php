<?php
require_once ('connect.php');
require_once ('functions.php');
require_once ('core/init.php');
$chats = findchats($my_id);
$list = '';
		if(empty($chats)){echo
				"
				<li>no chats at the moment</li>
				";}else{foreach($chats as $chat){
				$room = find_room($chat, $my_id);
				$id = usernameToID($chat);
				
				$pic = Need_pp($id);
				 $list.="<li class='img'>
							<a href='videoChat.php?name=$room'>
								$chat<br><strong>
								$chat</strong><br><span>
								<img src='$pic'></span></a>
						</li>";	
				}}
function usernameToID($username){
	$sql = mysql_query("SELECT * FROM `users` WHERE `username` = '$username'");
	
 	$row = mysql_fetch_array($sql);   
	return $row['ID'];
}				
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
   
   
    
    <link rel="stylesheet" type="text/css" href="css/mainlist.css"/>
	<style>
	body{
background:#4AA0E4 url(images/img01.jpg) repeat;
}
	</style>
</head>

<body>

    <div id="page-wrap"> 
    
        
    	<div id="section">
    	
            <div id="rooms">
            	<h2 id='lt'>USERS</h3>
                <ul>
				<?php echo $list;?>
				</ul>
            </div>
        </div>
        
    </div>
</body>
</html>