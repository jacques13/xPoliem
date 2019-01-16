<?php 
	
	require_once ('core/init.php');
	require_once ('functions.php');
	require_once ('connect.php');
	require_once ('nav.php');
	
	
	
	
if (isset($_POST['btn'])) {

	 $u_id = escape($_POST['btn']);
	 $my_id = escape($_SESSION['user_id']);
	$videoChatName = unique($my_id,$u_id);
	 $query_r="INSERT INTO `xpoliem`.`video_rooms` (`id`, `user_1`, `user_2`, `room`,`time`) VALUES (NULL, '$my_id', '$u_id', '$videoChatName',now())";
	 mysql_query($query_r);
	 
	 
	 
	 
	 
	 
	 
	 
	/*function*/print_r (Random_chat($my_id, 'video', '21'));//function// 21 is die previous user met wie gechat het, video is video of text chat
	 
	
	 
	 
	 
	 

}
$name = escape($_GET['name']);
?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Fresh Tilled Soil Video Conference | WebRTC jQuery Plug-in Demo</title>

<!-- Stylesheet Ressources -->
<link rel="stylesheet" href="css/fts-webrtc-styles.css">
<link href="css/profilev2.css" rel="stylesheet" media="all">

</head>

<body>
<a href="http://localhost:83/php/!xPoliem/xPoliem/profile%20view/Payout.php?u_id=<?php echo $u_id?>" onclick="window.open(this.href, '_blank', 'left=1050%,top=10%,width=300%,height=250%,toolbar=1,resizable=0'); return false;">Example Link</a>
<!--<input type='text' name='bid' id='bid'  placeholder='Give some cash'/><input name='submit' class='submit' id='submit' type='button' value='amount ' />

 main container -->
<div id="mainContainer" class="">


	<!-- local video -->
	<video id="localVideo" class="local-video"></video>

	<!-- remote video -->
	<video id="remoteVideo" class="remote-video" autoplay></video>

	<!-- video status & room entry bar -->
	<div id="videoStatus" class="video-status">
	</div>
	<input id="videoChannelInput1" class="video-channel-input1 " type="hidden" placeholder="enter channel name "  value="<?php echo $name?>test"/>
	</div>
<!-- JavaScript Ressources -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="js/jquery.fresh-tilled-soil-webrtc.js"></script>

<!-- Plugin Initialization -->
<script type="text/javascript">


	$(function() {
		$('#mainContainer').createVideoChat();
		$('.submit').click(function(){
	 
		var u_id = "<?php echo $u_id?>";
		var bid =  document.getElementById('amount').value;
		console.log(bid);
			$.ajax({    
					type: "GET",
					url: "videoChatBid.php?u_id="+u_id+"&bid="+bid,  
							   
									 
					success: function(response){                    
					  alert('bid is placed '+bid); 
					}
						});
	});
	});
	

		

			
</script>

</body>
</html>
