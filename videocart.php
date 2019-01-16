<?php 
	require_once ('core/init.php');
	//require_once ('functions.php');
	//require_once ('functions.paypal.php');
	require_once ('connect.php');
if (isset($_POST['pid'])) {
	 $post_id = escape($_POST['pid']);
	 
  print_r(PayPal::splitPay($post_id));		

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

   
        
