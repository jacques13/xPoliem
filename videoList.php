<?php 
    
	require_once ('core/init.php');
	require_once ('functions.php');
	require_once ('connect.php');
	require_once ('nav.php');
	$vid_and_user = array();
	if(empty($_GET['u_id'])){$u_id =escape($_SESSION['user_id']);}
	$u_id = escape($_GET['u_id']);
	$post_titles = find_vid_titles($u_id, 'lib');
	$username = post_owner($u_id);
	
	
	
	

	$vid_and_user = find_all_vid_and_user();

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
            	<h2 id='lt'>Videos of <?php echo getUsername($u_id); ?></h3>
                <ul>
				<?php
					if(empty($post_titles)){
					echo "	<li class='img'>
								<a href='#'>No videos yet<br><strong></strong><br><strong></strong><span><img></span></a>
							</li>"; }
					foreach($post_titles as $title){
		$views = find_views($u_id,$title);
		$post_id = get_post_ids($title, $u_id);
		$full_name = get_fullname_from_postid($post_id);
		
		echo "	<li class='img'>
					<a href='libsss.php?action=view&post_id=$post_id&type=vid&u_id=$u_id'>$username[username]<br><strong>$views[views]</strong><br><strong>$title</strong><span><img src='uploads/lib/$u_id/videos/thumbs/$full_name.jpg'></span></a>
				</li>";
	}
					?>
					
					 
                </ul>
            </div>
        </div>
        
    </div>