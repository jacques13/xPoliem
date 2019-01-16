<?php 
    
	require_once ('core/init.php');
	require_once ('functions.php');
	require_once ('connect.php');
	require_once ('nav.php');
	$user_ext = array();

	$user_ext = find_all_user_ext();

	$user = new User();
	if ($user->isLoggedIn()) {
		 $data = $user->data();
            $id = $data->ID;
			$usernameR = escape($data->username);
			$email = escape($data->email);
			$gender = escape($data->gender);
			$_SESSION['user_id'] = $id;
		}

  /*  if (checkVar($_SESSION['user_id'])){ 
 
        $getRooms = "SELECT *
        			 FROM chat_rooms";
        $roomResults = mysql_query($getRooms);		  
}*/
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
    <USER>Chat Rooms</USER>
    
    <link rel="stylesheet" type="text/css" href="css/mainlist.css"/>
</head>

<body>

    <div id="page-wrap"> 
    
        
    	<div id="section">
    	
            <div id="rooms">
            	<h2 id='lt'>whatever</h3>
                <ul>
				<?php
					$num = 0;
					$max = count($user_ext['user']);
					while ($max>$num){
						if ($max==$num){Break;}
						$username = $user_ext['user'][$num];
						$ext = $user_ext['ext'][$num];
						if (empty($username)){
							/*echo "<li class='user'>
									<a href=''>userName<br><strong>views</strong><br><strong>name</strong><span><img src='images/1.jpg'></span></a>
								  </li>";*/
						}else{
							$USER =  $username;
								$NAME = mysql_fetch_assoc(mysql_query("SELECT `display_name` FROM `xpoliem`.`users` WHERE `username` = '$username'"));
								$NAME = $NAME['display_name'];
								$u_id = mysql_fetch_assoc(mysql_query("SELECT `ID` FROM `xpoliem`.`users` WHERE `username` = '$username'"));
								$pic = 'uploads/details/'.$u_id['ID'].'/'.$u_id['ID'].'.'.$ext;
								
								
								echo "<li class='img'>
									<a href='profile.php?u_id=$u_id[ID]'>$NAME<br><strong></strong><br><strong>$USER</strong><span><img src='$pic'></span></a>
								</li>";
							
						}
						$num++;
					}
					?>
					
					 
                </ul>
            </div>
        </div>
        
    </div>