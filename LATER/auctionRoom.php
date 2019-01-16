<?php
require_once ('connect.php');
require_once ('functions.php');
require_once ('core/init.php');
require_once ('nav.php');
$my_id = $_SESSION['user_id'];

	
	$roomid= 1;


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" href="css/global.css"/>
<script src="jquery-1.4.4.min.js" type="text/javascript"></script>

</head>

<body>
<div class="centerA upload" >
   	<h3>place your bid for <?php echo 'name of person';?></h3>
	<br>
   	<input type="text" name="bid" id="bid"  placeholder="$1 min"/>
	
	<input name="submit" id="submit" type="button" value="place a  bid " />
	<br>
    <div id="bids"></div>
 </div>  
    
    
    <script type="text/javascript">

 $(document).ready(function() {
 
 $('#submit').click(function(){
	 var bid =  document.getElementById('bid').value;
	 
	 setInterval(function(){ var highBid =  document.getElementById('highBid').value;},500);
	
	 var roomid = <?php echo $roomid ;?>;
	 
	 
	  $.ajax({    
			type: "GET",
			url: "getBid.php?roomid="+roomid,             
			dataType: "html",                 
			success: function(response){                    
				 $("#bids").html(response); 
			   
			}
	
		});
	 
	 if(bid < highBid ){
		 $.ajax({    
      		    type: "GET",
				url: "bid.php?roomid="+roomid+"&bid="+bid,  
						   
								 
				success: function(response){                    
				  alert('bid is placed'+bid); 
				}

    		});
		 
		 
		 }else{
			 alert('your bid is less than the current bid'); 
			 }
	 
	 
 
 });
 
 

 
 setInterval(
     function() { 
	  var roomid = <?php echo $roomid ;?>;               
		 $.ajax({    
			type: "GET",
			url: "getBid.php?roomid="+roomid,             
			dataType: "html",                 
			success: function(response){                    
				 $("#bids").html(response); 
			   
			}
	
		});
    
}, 1000);

 
});

</script>
    
</body>
</html>
