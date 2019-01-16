<?php
//
require_once ('connect.php');
require_once ('functions.php');
require_once ('core/init.php');
$roomid = escape($_GET['roomid']);
$sql = mysql_query("
SELECT * 
FROM  `bids` 
WHERE `roomid` = $roomid
ORDER BY  `bids`.`bid` ASC  
");
	$count = mysql_num_rows($sql)+1; 
 	$row = mysql_fetch_array($sql); 
 	while($row = mysql_fetch_array($sql)){

			echo("<input type='hidden' id='highBid' value='". $row["bid"]."'/>");
		
			echo("<p>". getUsername($row["my_id"])." has bidded ". $row["bid"]." </p>");
		
	}
	
	
	


?>