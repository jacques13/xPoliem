<?php
require_once ('connect.php');
require_once ('functions.php');
require_once ('core/init.php');

$my_id = escape($_SESSION['user_id']);
$IDS = array();
$list = '';
$sql = mysql_query("SELECT * FROM `chat` WHERE `my_id` = '$my_id'");
 $count = mysql_num_rows($sql); 
 	$row = mysql_fetch_array($sql);   
	if($count == 0){
	 $list.="<li class='img'>
							<a href='#'>
								No chats at the moment<br><strong>
								</strong><br><span>
								</span></a>
						</li>";	
	}
		while($row = mysql_fetch_array($sql)){ 
		$NAME = getAllInfoUser($row['userid_2'],'username');
		$DNAME = getAllInfoUser($row['userid_2'],'display_name');
		$pic = Need_pp($row['userid_2']);
			if(!in_array($row['userid_2'],$IDS)){
				 $list.="<li class='img'>
							<a href='profile.php?u_id=".$row['userid_2']."'>
								$NAME<br><strong>
								$DNAME</strong><br><span>
								<img src='$pic'></span></a>
						</li>";	
				}
			 array_push($IDS,$row['userid_2']);
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