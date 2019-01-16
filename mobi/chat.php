<?php
/*require_once ('../core/init.php');
//require_once ('nav.php');
require_once ('../functions.php');
require_once ('../connect.php');
	
	 
	$user = new User();
	if ($user->isLoggedIn()) {
		 $data = $user->data();
            $id = $data->ID;
			$usernameR = escape($data->username);
			$email = escape($data->email);
			$gender = escape($data->gender);
			$_SESSION['user_id'] = $id;
		
	 } 
	 
     
	$u_id = $_GET['u_id'];
require_once ('../connect.php');
require_once ('../functions.php');
require_once ('../core/init.php');

if(!empty($_GET['u_id']) and !empty($_GET['mesg'])){
	$u_id = $_GET['u_id'];
	$my_id = $_SESSION['user_id'];
	$mesg = $_GET['mesg'];
	$name = unique($my_id,$u_id);
	mysql_query("INSERT INTO `chat`(`id`, `my_id`, `userid_2`, `mesg`, `name`) 
					VALUES (null,'$my_id','$u_id','$mesg','$name')");
					header('Location:chat.php?u_id='.$u_id);
	
	}
$u_id = $_GET['u_id'];	
//header("Location:chat.php?u_id=".$u_id);	
*/
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
    
    
  
    
    <script src="../jquery-1.9.1.js" type="text/javascript"></script>
	<link href="../css/hover.css" rel="stylesheet" media="all">
	<link href="../css/profilev2.css" rel="stylesheet" media="all">
    
<style>


#page-wrap { margin:  auto; width: auto; }
#section {  padding: 0;
height: 0;
text-align: center;}
#chat-wrap { border: 1px solid rgb(238, 238, 238);
background: rgba(0, 0, 0, 0.2);
height: 75%;
width: 100%;
overflow: auto; }
#chat-area { height: 80vh; overflow: auto; padding: 20px; 
border: 1px solid #0A00FF;
	}
#chat-area span { color: white; 
	
	background:  rgb(70, 130, 180); 
	padding: 4px 8px; -moz-border-radius: 5px;
	
	margin: 0 5px 0 0; 
	float:left;
	height: 3vh;
width: 12vw;
	}
#chat-area p { padding: 8px 0; border-bottom: 1px solid #ccc; color: #333;font-size: 3vh;margin: -1vh; }
#chat-area h1 { color: rgb(255, 255, 255);
background: rgb(70, 130, 180);
width: 16vw;
margin: auto;}
#chat-area img { height: 18vh;
width: 11vw;}
#sendie { width: 85vw; height: 10vh;float:left  ; }

.Main_buttons{
box-sizing: content-box;
-webkit-box-sizing: content-box;
-moz-box-sizing: content-box;
width: 11vw;
height: 9vh;

border: 0px none;
display: inline-block;
line-height: 1;
padding: 5px;
text-decoration: none;
font-weight: bold;
color: rgb(255, 255, 255);
background-color: #0070BA;
-moz-border-radius: 5px;
-webkit-border-radius: 5px;
-khtml-border-radius: 5px;
border-radius: 5px;

  -webkit-transition: all .5s;
 
}
.Main_buttons:hover{
width:6vw:
height:5vh;
color: rgb(255, 255, 255);
background-color: #6FC4FC;

}





</style>

</head>

<body>

    <div id="page-wrap"> 
    
    	
        
    	<div id="section" style="height:auto;margin:auto;">
   
          
                     
            <div id="chat-wrap">
			
                <div id="chat-area">
					<?php  echo $unique;?>
					<p><img src="../images/1.jpg"/><h1>Jacques</h1></p>
					<p><span>Jacques</span>apdfjeicnue </p>
					<p><span>Jacques</span>apdfjeicnue </p>
				</div>
            </div>
            
            
                
                <form id="send-message-area" action="">
                    <textarea id="sendie" maxlength='100'></textarea>
					<button id="send" class="push Main_buttons">SEND<button>
                </form>
            
        </div>
        
    </div>
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


