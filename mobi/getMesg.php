<?php 

require_once ('connect.php');
require_once ('functions.php');
require_once ('core/init.php');
$u_id = $_GET['u_id'];
$name = unique($_SESSION['user_id'],$u_id);

$sql = mysql_query("SELECT * FROM `chat` WHERE `name` = '$name'");
	$count = mysql_num_rows($sql); 
 	$row = mysql_fetch_array($sql);   
		while($row = mysql_fetch_array($sql)){ 
		 
			 $mesg = $row["mesg"];
			 $my_id = post_owner($row["my_id"]);
			 
			echo("<p><span>". $my_id['username']."</span>". $mesg." </p>");
			
			 }
			
			 
		
			
	
	
	
	

?>