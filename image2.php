<?php
/*[REDACTED]*/
    require_once ('core/init.php');
	require_once ('connect.php');
	require_once ('functions.php');
	$user = new User();
	if ($user->isLoggedIn()) {
		 $data = $user->data();
            $id = $data->ID;
			$usernameR = escape($data->username);
			$email = escape($data->email);
			$gender = escape($data->gender);
			$_SESSION['user_id'] = $id;
		}
	if(empty($_GET['u_id'])){$u_id =escape($_SESSION['user_id']);}else{$u_id = escape($_GET['u_id']);}
	
	
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
			$query_r = mysql_query("SELECT `views` FROM `xpoliem`.`posts` WHERE `title` = '$imageName' AND `user_id` = '$u_id'");
			$views = mysql_fetch_assoc($query_r);
			$query_r = NULL;
			$id_for_use = get_post_ids_from_posts($imageName, $u_id);
			$from_lib = "libsss.php?u_id=$u_id&action=view&post_id=$id_for_use";
			if (empty($views['views'])){
				$views['views'] = 0;
				$from_lib = "#";
			};
			$views = $views['views'];
			$dir = 'uploads/lib/'.$u_id.'/images/'.$file;
			$imageDisplay = '<a href="'.$from_lib.'"><img 
			id= "'.$i.'"
			src = '.$dir.'
		    alt="error could not find image" 
		    title="'.$imageName.' "
            data-desc= "Views '.$views.' "
            data-category=" "
            data-fullsrc='.$dir.'/><a>';
					$i++;
					echo($imageDisplay);
					
					
					}
					
			}
			?>
		
          
        
    </div></div>
        
		
        	
        <script type="text/javascript" src="js/demo 2.js"></script>
        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>       
    
		<script type="text/javascript" src="jquery-1.9.1.js"></script>
		<script type="text/javascript" src="js/jquery.tmpl.min.js"></script>
		<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
		<script type="text/javascript" src="js/jquery.elastislide.js"></script>
		<script type="text/javascript" src="js/gallery.js"></script>
		
        <script src="ui/jquery.ui.core.js"></script>
		<script src="ui/jquery.ui.widget.js"></script>
		<script src="ui/jquery.ui.mouse.js"></script>
		<script src="ui/jquery.ui.draggable.js"></script>
		<script src="ui/jquery.ui.droppable.js"></script>
		<script src="ui/jquery.ui.sortable.js"></script>
	    <script src="js/jquery.tabSlideOut.v1.3.js"></script>
		 
		<script>
         $(function(){
             $('.slide-out-div').tabSlideOut({
                 tabHandle: '.handle',                              //class of the element that will be your tab
                 pathToTabImage: 'thumbs/contact_tab.gif',          //path to the image for the tab (optionaly can be set using css)
                 imageHeight: '122px',                               //height of tab image
                 imageWidth: '40px',                               //width of tab image    
                 tabLocation: 'right',                               //side of screen where tab lives, top, right, bottom, or left
                 speed: 500,                                        //speed of animation
                 action: 'click',                                   //options: 'click' or 'hover', action to trigger animation
                 topPos: '200px',                                   //position from the top
                 fixedPosition: true                              //options: true makes it stick(fixed position) on scroll
             });
         });
		
		

         </script>
		 <script>
		  $(function() {
      
		$( "li#drag" ).draggable({cursor:'pointer',
		                      revert:true,
							  helper: 'clone',
							  cursor:"pointer",
                              connectToSortable: '#dropList',
                              appendTo: '#dropList'							  });
							 
							 
		$( "#dropList,#drag" ).sortable({containment:"#dropList",
					   tolerance:"pointer",
				   cursor:"pointer",
					   revert:true,
					   connectWith:"#dropList,#drag",
								   
});
$('#droplist').droppable();
		
	});//change more
		 </script>
		<script id="img-wrapper-tmpl" type="text/x-jquery-tmpl">	
			<div class="rg-image-wrapper">
				{{if itemsCount > 1}}
					<div class="rg-image-nav">
						<a href="#" class="rg-image-nav-prev">Previous Image</a>
						<a href="#" class="rg-image-nav-next">Next Image</a>
					</div>
				{{/if}}
				<div class="rg-image"></div>
				<div class="rg-loading"></div>
				<div class="rg-caption-wrapper">
					<div class="rg-caption" style="display:none;">
						<p></p>
					</div>
				</div>
			</div>
		</script> 
		<script type="text/javascript" src="js/snap.js"></script>
        <script type="text/javascript">
            var snapper = new Snap({
                element: document.getElementById('content'),
                disable: 'right',
				hyperextensible: false
			
            });
        </script>
		<!--[if lt IE 9]>
    <link rel="stylesheet" href="css/jquery.galereya.ie.css">
    <![endif]-->
    <script src="js/jquery.js"></script>
    <script src="js/jquery.galereya.min.js"></script>
	 <script src="js/jquery.tabSlideOut.v1.3.js"></script>
    <script>
        $(function() {
            $('#galleryherepls').galereya({disableSliderOnClick: true});
        });
		
    </script>
       </body>
</html>
