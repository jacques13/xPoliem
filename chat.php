<?php
require_once ('core/init.php');
//require_once ('nav-test.php');
require_once ('functions.php');
require_once ('connect.php');
	
	 
	$user = new User();
	if ($user->isLoggedIn()) {
		 $data = $user->data();
            $id = $data->ID;
			$usernameR = escape($data->username);
			$email = escape($data->email);
			$gender = escape($data->gender);
			$_SESSION['user_id'] = $id;
		
	 } 
	 
     
	$u_id = escape($_GET['u_id']);


if(!empty($_GET['u_id']) and !empty($_GET['mesg'])){
	$u_id = escape($_GET['u_id']);
	$my_id = escape($_SESSION['user_id']);
	$mesg = escape($_GET['mesg']);
	$name = unique($my_id,$u_id);
	mysql_query("INSERT INTO `chat`(`id`, `my_id`, `userid_2`, `mesg`, `name`) 
					VALUES (null,'$my_id','$u_id','$mesg','$name')");
					header('Location:chat.php?u_id='.$u_id);
	
	}
$u_id = $_GET['u_id'];	
//header("Location:chat.php?u_id=".$u_id);	

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
    
    
  
    
    <script src="jquery-1.9.1.js" type="text/javascript"></script>
	<link href="css/hover.css" rel="stylesheet" media="all">
	<link href="css/profilev2.css" rel="stylesheet" media="all">
	<link href="css/global.css" rel="stylesheet" media="all">
	
    
<style>


#page-wrap { margin:  auto; width: auto; }
#section {  padding: 20px; width:50vw;height: 100vh;text-align:center; }
#chat-wrap {margin-top: 10%; border: 1px solid #eee; width:50vw; float:left;background: rgba(0,0,0,0.2); }
#chat-area { height: 50vh; overflow: auto; padding: 20px; 
border: 1px solid #0A00FF;
	}
#chat-area span { color: white; 
	
	background: rgba(50, 50, 50, 0.4);
	padding: 4px 8px; -moz-border-radius: 5px;
	
	margin: 0 5px 0 0; 
	float:left;
	height: 3vh;
width: 12vw;
	}#chat-area p { padding: 8px 0; border-bottom: 1px solid #ccc; color: #333; }
#sendie { width: 70vw; height: 10vh;  ;max-width: 50vw; }
button{
display:none;
}




</style>

</head>

<body>
<div class="nav" style="
    margin-top: 1%;"><?php require_once ('nav-test.php');?></div>

    <div id="page-wrap"> 
    
    	
        
    	<div id="section" style="height:auto;margin:auto;">
   
          
                     
            <div id="chat-wrap">
		
                <div id="chat-area">
					<?php  echo $unique;?>
				</div>
            </div>
            
            
                
                <form id="send-message-area" action="">
                    <textarea id="sendie" maxlength='100'></textarea>
					<input id="send" class="push" type="button" value="SEND"/>
					
                </form>
            
        </div>
        
    </div>
	<div class="drink" style="margin-top: -27%;"><?php require_once ('drinks_menu.php');?></div>
	<script>
		 $('#send').click(function(e){
		  e.preventDefault();
			 var text = $('#sendie').val();
                var maxLength = $('#sendie').attr("maxlength");  
                var length = text.length; 
                 
				 var u_id = '<?php echo $u_id?>';
                if (length <= maxLength + 1) {  
                    
					$.ajax({
						type: "GET",
						url: "mesg.php?u_id="+u_id+"&mesg="+text,             
						                 
						success: function(response){                    
							
						   
						}
					
					});    
						
					
					
					
                    $('#sendie').val("");
                } else {
                    $(this).val(text.substring(0, maxLength));
                }
		 
		 
		 });
            
               	
            
          
            
     
	
	
	</script>
	<script type="text/javascript">

 $(document).ready(function() {
 var u_id = '<?php echo $u_id?>';
  $.ajax({    
        type: "GET",
        url: "getMesg.php?u_id="+u_id,             
        dataType: "html",                 
        success: function(response){                    
            $("#chat-area").html(response); 
           
        }

    });
 
 setInterval(
     function() {                

      $.ajax({    
        type: "GET",
        url: "getMesg.php?u_id="+u_id,             
        dataType: "html",                 
        success: function(response){                    
            $("#chat-area").html(response); 
           
        }

    });
	
	
}, 2000);

 


 
});

</script>
        
</body>

</html>


