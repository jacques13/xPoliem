<?php
require_once ('connect.php');
require_once ('functions.php');
require_once ('nav.php');
require_once ('core/init.php');
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
    <title>Search-Results</title>
    
    <link rel="stylesheet" type="text/css" href="css/mainlist.css"/>
</head>

<body>

    <div id="page-wrap"> 
    
        
    	<div id="section">
    	
            <div id="rooms">
            	<h2 id='lt'>Results</h2>
                <ul>
				<?php
				
					if (!$_SESSION["user_id"]) die; // Don't give the list to anybody not logged in 
						$users = mysql_query("SELECT * FROM `users` WHERE `lastLoggedIn` > NOW()-60") ;
						
						while($row=mysql_fetch_array($query))
						{
						echo "<li class='p'>
										<a>$user<br>
										<strong>".$row["userName"]."</strong>
										<br><strong></strong>
										<span><img src='".Need_pp($row["ID"])."'></span></a>
										</li>";
						} 
						
						
					
					?>
					
					 
                </ul>
            </div>
        </div>
        
    </div>
</body>
</html>