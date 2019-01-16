<?php 
    
	require_once ('core/init.php');

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
    
    <title>Chat Rooms</title>
    
    <link rel="stylesheet" type="text/css" href="css/mainlist.css"/>
</head>

<body>

    <div id="page-wrap"> 
    
        
    	<div id="section">
    	
            <div id="rooms">
            	<h2 id='lt'>whatever</h3>
                <ul>
                   
					
					 <li class='text'>
                        <a href="">userName<span><strong>hello im going for a show later</strong></span></a>
                    </li>
					 <li class="img">
                        <a href="">userName<br><strong>views</strong><br><strong>name</strong><span><img src='images/1.jpg'></span></a>
                    </li>
					 
					 <li class="vid">
                         <a href="">userName<br><strong>views</strong><br><strong>name</strong><span><img src='images/1.jpg'></span></a>
                    </li>
					
					 
                </ul>
            </div>
        </div>
        
    </div>