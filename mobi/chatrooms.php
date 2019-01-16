<?php 
    
	require_once ('core/init.php');
	

    require_once("dbcon2.php");
	$user = new User();
	if ($user->isLoggedIn()) {
		 $data = $user->data();
            $id = $data->ID;
			$usernameR = escape($data->username);
			$email = escape($data->email);
			$gender = escape($data->gender);
			$_SESSION['user_id'] = $id;
		}

    //if (checkVar($_SESSION['user_id'])){ 
 
        $getRooms = "SELECT *
        			 FROM chat_rooms";
        $roomResults = mysql_query($getRooms);		  
//}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
    <title>Chat Rooms</title>
	
    <link rel="stylesheet" type="text/css" href="../css/main.mobi.css"/>
</head>

<body style="background:#4AA0E4 url(images/img01.jpg) repeat;">

    <div id="page-wrap"> 
    
    	
    	<div id="section">
    	
            <div id="rooms">
            	<center><h3>Rooms</h3></center>
                <ul>
                    <?php 
                        while($rooms = mysql_fetch_array($roomResults)):
                            $room = $rooms['name'];
                            $query = mysql_query("SELECT * FROM `chat_users_rooms` WHERE `room` = '$room' ") or die("Cannot find data". mysql_error());
                            $numOfUsers = mysql_num_rows($query);
							
                    ?>
                    <li>
                        <a href="room/?name=<?php echo $rooms['name']?>"><?php echo $rooms['name'] . "<span>Users chatting: <strong>" . $numOfUsers . "</strong></span>" ?></a>
                    </li>
                    <?php endwhile; ?>
					
                </ul>
            </div>
        </div>
        
    </div>

</body>

</html>

