<?php

	if (isset($_GET['name']) && isset($_SESSION['user_id'])): 
    
      require_once("../dbcon2.php");
  
      $name = cleanInput($_GET['name']);

      $getRooms = "SELECT *
  			           FROM chat_rooms
  		             WHERE name = '$name'";
  		         
      $roomResults = mysql_query($getRooms);
		
	  	if (mysql_num_rows($roomResults) < 1) {
  			header("Location: ../chatrooms.php");
  			die();
  		}
        	
      while ($rooms = mysql_fetch_array($roomResults)) {
          $file =  $rooms['file'];
      }
	 

		
	  	
        	
      

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
    <title>Welcome to: <?php echo $name; ?></title>
    
    <link rel="stylesheet" type="text/css" href="../main.css"/>
    
    <script src="jquery-1.9.1.js" type="text/javascript"></script>
    <script type="text/javascript" src="chat_1on1.js"></script>
    <script type="text/javascript">
    	var chat = new Chat('<?php echo $file; ?>');
    	chat.init();
    	//chat.getUsers(<?php echo "'" . $name ."','" .$_SESSION['userid']. "'"; ?>);
    	var name = '<?php echo $file?>';
    </script>
    <script type="text/javascript" src="settings_1on1.js"></script>

</head>

<body>

    <div id="page-wrap"> 
    
    	<div id="header">
    	
        	
        	<!--<div id="you"><span>Logged in as:</span> <?php echo $_SESSION['userid'];?></div>-->
        	
        </div>
        
    	<div id="section">
    
            <!--<h2><?php echo $name; ?></h2>-->
                     
            <div id="chat-wrap">
                <div id="chat-area"></div>
            </div>
            
            
                
                <form id="send-message-area" action="">
                    <textarea id="sendie" maxlength='100'></textarea>
					
                </form>
            
        </div>
        
    </div>
        
</body>

</html>

<?php
    
?>
