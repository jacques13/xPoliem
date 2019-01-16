<?php 
	require_once ('connect.php');
	require_once ('functions.php');
	require_once ('core/init.php');
	//kort meer userom te toets
	$user = new User();
	if ($user->isLoggedIn()) {
		 $data = $user->data();
            $id = $data->ID;
			$usernameR = escape($data->username);
			$email = escape($data->email);
			$gender = escape($data->gender);
			$_SESSION['user_id'] = $id;
			$u_id = escape($_SESSION['user_id']);
		}
	
	$countryName = getAllInfoUser($u_id,"countryName");
	$cityName = getAllInfoUser($u_id,"cityName");
if(!empty($_GET['key'])){
	if($_GET['key'] == 'country'){
		$sql ="SELECT * FROM `users` WHERE `countryName` = '$countryName'";
	}else if($_GET['key'] == 'city') {
		$sql ="SELECT * FROM `users` WHERE `cityName` = '$cityName'";
	}
	


	$list = '';
	$count = mysql_num_rows($sql); 
 	$row = mysql_fetch_array($sql);   
		while($row = mysql_fetch_array($sql)){ 
		$NAME = getAllInfoUser($row['ID'],'username');
		$DNAME = getAllInfoUser($row['ID'],'display_name');
		$pic = Need_pp($row['ID']);
		$list.="<li class='img'>
					<a href='profile.php?u_id=".$row['ID']."'>$NAME<br><strong>$DNAME</strong><br><span><img src='$pic'></span></a>
				</li>";		
			
				
			
		}
		
		
		
		

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