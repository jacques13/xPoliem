<?php
require_once ('connect.php');
	require_once ('functions.php');
	require_once ('core/init.php');
	
	
	if(isset($_GET['u_id']) && !empty($_GET['u_id'])){
		$u_id = escape($_GET['u_id']);
	}else{
		$u_id = escape($_SESSION['user_id']);
	}
	$favourites = find_favourites($u_id); 
	$followers = find_all_followers($u_id);
	$lib_posts_titles = find_posts_titles($u_id, 'lib');
	$post_posts_titles = find_posts_titles($u_id, 'posts');
	$IP = ip(escape($_SESSION['user_id']));
	$totalViews = total_views($u_id);
	$totalUps = total_ups($u_id);
	$ptv = Math::percentageViews($totalViews);
	$ptu = Math::percentageUps($totalUps);
	@$B_id =  $u_id;
	$dsp_name = get_dsp($u_id);
	$gender = get_gender($u_id);
	$username = get_uname($u_id);
	$videoChatName =  unique(escape($_SESSION['user_id']),$u_id);

?><!doctype html>

<html lang="en">

<head>

	<meta charset="utf-8">

	<title>dropdown menu</title>
	<meta name="description" content="Fixed Table of Contents Dropdown Menu with jQuery">
	<meta name="author" content="Impressive Webs">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="shortcut icon" href="/favicon.ico">
	<link rel="apple-touch-icon" href="/apple-touch-icon.png">

	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/styles.css?v=1.1">

	<!--[if lt IE 9]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
<style>
.vid_button{border:none;
background: rgb(123, 123, 123);
color: rgb(0, 255, 255);
font-size:20px;
padding: 5px 20px 5px 30px}

</style>
</head>
<body>



	<div id="toc-holder" class="toc-holder">
		<a href="#" class="toc-link" id="toc-link"><span>&#9660;</span>ACTIONS</a>
		<ul id="toc" class="toc">
		<?php
		if(test_same_user($u_id) == true){
					echo '<li class="toc-h1"><a href="#"  >VIDEO CHATS </a>
			<ul class="toc-sub closed"id="vidChatNotifications">
				
			</ul>
		</li>
		<li class="toc-h1"><a  href="#">MESSAGES</a>
			<ul class="toc-sub closed"id="textChatNotifications">
				
			</ul>
		</li>
		<li><a class="toc-h1"  href="details.php?what=my_info&u_id='.$u_id.'">Edit Details</a></li>
		<li ><a class="toc-h1" href="post_form.php?to=posts&u_id='.$u_id.'" >New Post</a></li>
		<li ><a class="toc-h1" href="uploads.php">Upload multiple Items</a></li>
		<li ><a class="toc-h1" href="createroom.php" >Start a Group Chat</a></li>
		
		';
				}else{
				echo'
		<li ><a class="toc-h1"><form  method="post" action="videoChat.php?name= '.$videoChatName.'">
									<button class="vid_button" type="submit" name="btn" value=" '.$u_id.'"><p>video chat</p></button>
									
								</form></a></li>
		<li ><a class="toc-h1" type="submit" name="btn" href="chat.php?u_id='.$u_id.'">Message</a></li>
		';
				
				}
		
		?>
		
		
		
	</ul>
	</div><!-- .toc-holder -->
	

	




<script src="js/jquery.fixedTOC.js?v=3.0"></script>
<script>
// call the plugin on the "#toc" element
$('#toc').fixedTOC({
	menuOpens: 'mouseenter', // or 'mouseenter'
	scrollSpeed: 1000,
	menuSpeed: 300,
	useSubMenus: true,
	resetSubMenus: true,
	topLinkWorks: true
});
</script>

<script type="text/javascript">

 $(document).ready(function() {
 
 
 
 setInterval(
     function() {                

      $.ajax({    
        type: "GET",
        url: "videoChatNot.php",             
        dataType: "html",                 
        success: function(response){                    
            $("#vidChatNotifications").html(response); 
           
        }

    });
	
	 $.ajax({    
        type: "GET",
        url: "TextMesgNot.php",             
        dataType: "html",                 
        success: function(response){                    
            $("#textChatNotifications").html(response); 
           
        }
		
		

    });
	$.ajax({    
        type: "POST",
        url: "update_online.php",             
                         
        success: function(response){                    
            
        }   
        });
}, 2000);

 


 
});

</script>
</body>
</html>