<?php 
    
	require_once ('core/init.php');
	require_once ('functions.php');
	require_once ('connect.php');
	require_once ('nav.php');
	$user_ext = array();

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

	$favourites = find_all_followers($u_id);


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
            	<h2 id='lt'>Admirers</h3>
                <ul>
					<?php 
						if (empty($favourites)){
							echo '<div>NO admirers</div>';
						}else{
						
							foreach ($favourites as $id_fav) {
								$query_fav = mysql_query("SELECT `user_one` FROM `xpoliem`.`follow` WHERE `id` = '$id_fav'");
								$search_id_fav = mysql_fetch_row($query_fav);
							
								$query_fav = mysql_query("SELECT `username` FROM `xpoliem`.`users` WHERE `id` = '$search_id_fav[0]'");
								$name_fav = mysql_fetch_row($query_fav);
								
								$NAME = mysql_fetch_assoc(mysql_query("SELECT `display_name` FROM `xpoliem`.`users` WHERE `ID` = '$search_id_fav[0]'"));
								$NAME = $NAME['display_name'];
								
								$pic = Need_pp($search_id_fav[0]);
								
								echo "<li class='img'>
									<a href='profile.php?u_id=$search_id_fav[0]'>$NAME<br><strong>$name_fav[0]</strong><br><span><img src='$pic'></span></a>
								</li>";
							}
						}
					?>   
					
					
                </ul>
            </div>
        </div>
        
    </div>
</body>
</html>