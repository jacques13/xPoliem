<?php
/* <!--  <div id="galleryherepls">
        <img src="path/to/thumbnail"
            alt="Title here"
            title="Or here(more priority)"
            data-desc="some description"
            data-category="image category here"
            data-fullsrc="path/to/full/image."
        />  -->  */
		//file upload shit
/*if(isset($_FILE["ImageUpload"])){
	//if form has been submitted
	$imageName = $_FILES["imageUpload"] ['name'];
	$imageTemp = $_FILES["imageUpload"] ['tmp_name'];
	$imageType =  $_FILES["imageUpload"] ['type'];
	//filter the name 
	$imageName = preg_replace('#[^a-z0-9.]#i','',$imageName);
	//error handeling
		if(!$imageTemp){
			echo("you need to select a file to upload");
		}else{
			move_uploaded_file($imageTemp,"uploads/$imageName");
			}
	
	
	
}*/
   /* require_once ('../core/init.php');
	require_once ('../connect.php');
	$user = new User();*/
	
	$u_id = $_GET['u_id'];//wil ni u_id kry ni
	
?>


<!DOCTYPE HTML>
<html lang="en-US">
    <head>
        <title>album home</title>
        <meta http-equiv="x-ua-compatible" content="IE=edge" />
        <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-touch-fullscreen" content="yes">
       <link href="../css/jquery.galereya.css" rel="stylesheet"/>
	
    
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
			$dir = '../uploads/lib/'.$u_id.'/images';
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
			
		
			$dir = '../uploads/lib/'.$u_id.'/images/'.$file;
			$imageDisplay = '<img 
			id= "'.$i.'"
			src = '.$dir.'
		    alt="error could not find image" 
		    title="'.$imageName.' "
            data-desc= "Views '.$views.' "
            data-category=" "
            data-fullsrc='.$dir.'/>';
					$i++;
					echo($imageDisplay);
					
					
					}
					
			}
			?>
		
          
        
    </div></div>
        
	
		
		<!--[if lt IE 9]>
    <link rel="stylesheet" href="css/jquery.galereya.ie.css">
    <![endif]-->
    <script src="../js/jquery.js"></script>
    <script src="../js/jquery.galereya.min.js"></script>
	 <script src="../js/jquery.tabSlideOut.v1.3.js"></script>
    <script>
        $(function() {
            $('#galleryherepls').galereya({disableSliderOnClick: false});
        });
		
    </script>
       </body>
</html>
