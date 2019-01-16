<?php
/*[REDACTED]*/
    require_once ('core/init.php');
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
	if(empty($_GET['u_id'])){$u_id =escape($_SESSION['user_id']);}
	$u_id = escape($_GET['u_id']);
	
?>


<!DOCTYPE HTML>
<html lang="en-US">
    <head>
        <title>album home</title>
        <meta http-equiv="x-ua-compatible" content="IE=edge" />
        <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-touch-fullscreen" content="yes">
        <link rel="stylesheet" type="text/css" href="css/snap.css" />
        <link rel="stylesheet" type="text/css" href="css/demo 2.css" />
		 <link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel="stylesheet" href="../../themes/base/jquery.ui.all.css">
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<link rel="stylesheet" type="text/css" href="css/elastislide.css" />
		<link href="css/ext.css" rel="stylesheet"/>
		<link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow&v1' rel='stylesheet' type='text/css' />
		<link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css' />
		<link href="css/jquery.galereya.css" rel="stylesheet"/>
	
    
		<noscript>
			
		</noscript>
		
    </head>
    <body >
        
            
        <!-- <a href="#" id="open-left"></a> open button-->
        
        <div id="content"  class="snap-content">
            
			
			
			
			
			
            <div id="no-drag" data-snap-ignore="true">
				 <!--  <div id="galleryherepls">
        <img src="path/to/thumbnail"
            alt="Title here"
            title="Or here(more priority)"
            data-desc="some description"
            data-category="image category here"
            data-fullsrc="path/to/full/image."
        />  -->  
 <div id="galleryherepls">
      
			<?php
            $imageDisplay = "";
			$dir = 'uploads/lib/'.$u_id.'/images';
			$images = scandir($dir);//die file
			$ignore = array('.','..');
			$i ="1";
			$imageName= null;
			$views = null;
			
			//<img id='.$id.'" src="uploads/'.$file.' " border="none"/>
			foreach($images as $file){
					if(!in_array($file,$ignore)){ 
			/*verander die */
			$arr = explode(".", $file, 2);
			$arr = end($arr);
			$arr = explode(".", $arr);
			 $imageName = $arr[0];
			$arr = NULL;
			$query_r = mysql_query("SELECT `views` FROM `xpoliem`.`lib` WHERE `title` = '$imageName' AND `user_id` = '$u_id'");
			$views = mysql_fetch_assoc($query_r);
			$query_r = NULL;
			 $views = $views['views'];
			 if($views == null or $views == 0){
			 			 $views = 0;
			 }else{
			 			 $views = $views['views'];
			 }
			
		
			 $dir = 'uploads/lib/'.$u_id.'/images/'.$file;
			 
			 //sit net link in
			  echo  $imageDisplay = '<a href = "#"><img 
			id= "'.$i.'"
			src = "'.'uploads/lib/'.$u_id.'/images/'.$file.'"
		    alt="error could not find image" 
		    title="'.$imageName.' "
            data-desc= "Views '.$views.' "
            data-category=" "
            data-fullsrc="'.'uploads/lib/'.$u_id.'/images/'.$file.'"/></a>';
					$i++;
					
					
					
					}
					
			}
			?>

		
          
        
    </div></div>
        
		
        	
        
		<script type="text/javascript" src="jquery-1.9.1.js"></script>
		
		
		
		
		
		<!--[if lt IE 9]>
    <link rel="stylesheet" href="css/jquery.galereya.ie.css">
    <![endif]-->
    <script src="js/jquery.js"></script>
    <script src="js/jquery.galereya.js"></script>
	
    <script>
        $(function() {
            $('#galleryherepls').galereya({disableSliderOnClick: false});
        });
		
    </script>
       </body>
</html>
