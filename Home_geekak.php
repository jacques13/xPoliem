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
    require_once ('core/init.php');
	require_once ('nav.php');
	require_once ('connect.php');
	require_once ('functions.php');
	
	
	
?>
<!DOCTYPE HTML>
<html>
<head>

<script type="text/javascript" src="//use.typekit.net/vue1oix.js"></script>
<script type="text/javascript">try{Typekit.load();}catch(e){}</script>

<link rel="stylesheet" type="text/css" href="css/style.css" />



<title>jQuery Thumbnail/Content Slider: jsCarouselV2.0.0</title>

    <script src="js/jquery.js" type="text/javascript"></script>
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
	   <script type="text/javascript" src="js/jquery.waterwheelCarousel.js"></script>

    <script src="js/jsCarousel-2.0.0.js" type="text/javascript"></script>
	<script src="js/pushy.min.js" type="text/javascript"></script>

    <link href="css/jsCarousel-2.0.0.css" rel="stylesheet" type="text/css" />

    <script type="text/javascript">
        $(document).ready(function() {
         
           $('#carouselh').jsCarousel({ onthumbnailclick: function(src) {  }, autoscroll: false, circular: true, masked: false, itemstodisplay: 40, orientation: 'h' });
            $('#carouselhAuto').jsCarousel({ onthumbnailclick: function(src) {  }, autoscroll: false, circular: true, masked: false, itemstodisplay: 40, orientation: 'h' });
            $('#carouselhAuto2').jsCarousel({ onthumbnailclick: function(src) {  }, autoscroll: false, circular: true, masked: false, itemstodisplay: 40, orientation: 'h' });
			
            
        });       
        
    </script>

    <style type="text/css">
        body
        {
            background-color: ;
            padding-top: 40px;
        }
        #demo-wrapper
        {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            padding: 40px 20px 0px 20px;
        }
        #demo-left
        {
            width: 15%;
            float: left;
        }
        #demo-right
        {
		text-align:center;
            width: 100%;
            float: inherit;
        }
        #hWrapperAuto
        {text-align:center;
            margin-top: 20px;
        }
		 #hWrapperAuto2
        {text-align:center;
            margin-top: 20px;
        }
		 #hWrapper
        {text-align:center;
            margin-top: 20px;
        }
        #demo-tabs
        {
            width: 100%;
            height: 50px;
            color: White;
            margin: 0;
            padding: 0;
        }
        #demo-tabs div.item
        {
            height: 35px;
            float: left;
            background-color: #2F2F2F;
            border: solid 1px gray;
            border-bottom: none;
            padding: 0;
            margin: 0;
            margin-left: 10px;
            text-align: center;
            padding: 10px 4px 4px 4px;
            font-weight: bold;
        }
        #contents
        {
            width: 100%;
            margin: 0;
            padding: 0;
            color: White;
            font: arial;
            font-size: 11pt;
        }
        #demo-tabs div.item.active-tab
        {
            background-color: Black;
        }
        #demo-tabs div.item.active-tabc
        {
            background-color: Black;
        }
        #v1, #v2
        {
            margin: 20px;
        }
        .visible
        {
            display: block;
        }
        .hidden
        {
            display: none;
        }
        #oldWrapper
        {
            margin-left: 100px;
        }
        #contents a
        {
            color: yellow;
        }
        #contents a:hover
        {
            text-decoration: none;
            color: Gray;
        }
        .heading
        {
            font-size: 20pt;
            font-weight: bold;
        }
    </style>


<style>
			
					.es-carousel ul{
							display:block;
					}
					.slide-out-div {
					position:absolute;
							padding: 0px;
							width: 250px;
							background: -webkit-linear-gradient(top,rgba(240,194,228,0.6), #f0c2e4);
							background: -moz-linear-gradient(top,rgba(240,194,228,0.6)),#f0c2e4;
							background: -o-linear-gradient(top,rgba(240,194,228,0.6), #f0c2e4));
							background: -ms-linear-gradient(top, rgba(240,194,228,0.6), #f0c2e4));
							background: linear-gradient(top, rgba(240,194,228,0.6), #f0c2e4)));
							border: #f0c2e4 2px solid;
							
			
							
					}
					.img{
							height:60px;
							width:60px;
							
					}
				
					#dropList:hover{
							border: #f0c2e8 5px solid;	
					}
					/*na dit geupdate het laat dit uit fade*/
					.dropList{
					overflow:hidden;
					}
	                .center{
					text-align:center;
					
					
					
					}
					.inner{
					height:280px;
					width:31.7%;
					float:left;
					margin:5px;
					padding:5px;
					border:1px solid blue;
					
					}
					.h{font-size:20px;}
			</style>

<script src="js/dragsensitive.jquery.js"></script>
<script src="js/jquery.tabSlideOut.v1.3.js"></script>

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<script>

$(document).ready(function() {

	$('.content').dragSensitive({
	
		// The length of every row. Default is 10 items per row
		rowLength : 10,
		
		// The default width of the box. 
		
		
		// The default height of the box.
		
		
		// The rate at which grabbing pans across items
		// The default is 1.3. Increasing makes it go slower.
		rate      : 1.3,
		
		// Sets whether or not the UI will snap to the last
		// element when the user stops grabbing
		round     : true,
		
		// This amount a user can drag (in pixels) while still
		// being able to click an object. Usually clicking is
		// disabled on drag, but within a (by default) 20px movement
		// clicking will still be enabled
		mistake   : 20
		
	});

});

</script>

 <script type="text/javascript">
      $(document).ready(function () {
        var carousel = $("#carousel1").waterwheelCarousel({
		
          flankingItems: 3,
          movingToCenter: function ($item) {
            $('#callback-output').prepend('movingToCenter: ' + $item.attr('id') + '<br/>');
          },
          movedToCenter: function ($item) {
            $('#callback-output').prepend('movedToCenter: ' + $item.attr('id') + '<br/>');
          },
          movingFromCenter: function ($item) {
            $('#callback-output').prepend('movingFromCenter: ' + $item.attr('id') + '<br/>');
          },
          movedFromCenter: function ($item) {
            $('#callback-output').prepend('movedFromCenter: ' + $item.attr('id') + '<br/>');
          },
          clickedCenter: function ($item) {
            $('#callback-output').prepend('clickedCenter: ' + $item.attr('id') + '<br/>');
          }
        });

        $('#prev').bind('click', function () {
          carousel.prev();
          return false
        });

        $('#next').bind('click', function () {
          carousel.next();
          return false;
        });

        $('#reload').bind('click', function () {
          newOptions = eval("(" + $('#newoptions').val() + ")");
          carousel.reload(newOptions);
          return false;
        });

      });
    </script>
	 <script type="text/javascript">
      $(document).ready(function () {
        var carousel = $("#carousel2").waterwheelCarousel({
		
          flankingItems: 3,
          movingToCenter: function ($item) {
            $('#callback-output').prepend('movingToCenter: ' + $item.attr('id') + '<br/>');
          },
          movedToCenter: function ($item) {
            $('#callback-output').prepend('movedToCenter: ' + $item.attr('id') + '<br/>');
          },
          movingFromCenter: function ($item) {
            $('#callback-output').prepend('movingFromCenter: ' + $item.attr('id') + '<br/>');
          },
          movedFromCenter: function ($item) {
            $('#callback-output').prepend('movedFromCenter: ' + $item.attr('id') + '<br/>');
          },
          clickedCenter: function ($item) {
            $('#callback-output').prepend('clickedCenter: ' + $item.attr('id') + '<br/>');
          }
        });

        $('#prev1').bind('click', function () {
          carousel.prev();
          return false
        });

        $('#next1').bind('click', function () {
          carousel.next();
          return false;
        });

        $('#reload').bind('click', function () {
          newOptions = eval("(" + $('#newoptions').val() + ")");
          carousel.reload(newOptions);
          return false;
        });

      });
    </script>
 <script type="text/javascript">
      $(document).ready(function () {
        var carousel = $("#carousel").waterwheelCarousel({
	
          flankingItems: 3,
          movingToCenter: function ($item) {
            $('#callback-output').prepend('movingToCenter: ' + $item.attr('id') + '<br/>');
          },
          movedToCenter: function ($item) {
            $('#callback-output').prepend('movedToCenter: ' + $item.attr('id') + '<br/>');
          },
          movingFromCenter: function ($item) {
            $('#callback-output').prepend('movingFromCenter: ' + $item.attr('id') + '<br/>');
          },
          movedFromCenter: function ($item) {
            $('#callback-output').prepend('movedFromCenter: ' + $item.attr('id') + '<br/>');
          },
          clickedCenter: function ($item) {
            $('#callback-output').prepend('clickedCenter: ' + $item.attr('id') + '<br/>');
          }
        });

        $('#prev2').bind('click', function () {
          carousel.prev();
          return false
        });

        $('#next2').bind('click', function () {
          carousel.next();
          return false;
        });

        $('#reload').bind('click', function () {
          newOptions = eval("(" + $('#newoptions').val() + ")");
          carousel.reload(newOptions);
          return false;
        });

      });
    </script>
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
<style type="text/css">
      
      .example-desc {
        margin:3px 0;
        padding:5px;
      }

      #carousel {
        width:90vw;
        border:1px solid #222;
        height:30vh;
        position:relative;
        clear:both;
        overflow:hidden;
       background: -webkit-linear-gradient(top,#09F, #03F);
		margin:0px auto;
		padding:0px auto;
      }
	  #carousel1 {
        width:90vw;
        border:1px solid #222;
        height:30vh;
        position:relative;
        clear:both;
        overflow:hidden;
        background: -webkit-linear-gradient(top,#09F, #03F);
		margin:0px auto;
		padding:0px auto;
		
      }
	  #carousel2 {
        width:90vw;
        border:1px solid #222;
        height:30vh;
        position:relative;
        clear:both;
        overflow:hidden;
       background: -webkit-linear-gradient(top,#09F, #03F);
		margin:0px auto;
		padding:0px auto;
      }
      #carousel img {
        visibility:hidden; /* hide images until carousel can handle them */
        cursor:pointer; /* otherwise it's not as obvious items can be clicked */
		width:30vw;
		height:30vh;
      }
	  #carousel1 img {
        visibility:hidden; /* hide images until carousel can handle them */
        cursor:pointer; /* otherwise it's not as obvious items can be clicked */
		width:30vw;
		height:30vh;
      }
	  #carousel2 img {
        visibility:hidden; /* hide images until carousel can handle them */
        cursor:pointer; /* otherwise it's not as obvious items can be clicked */
		width:30vw;
		height:30vh;
		
      }

      .split-left {
        width:450px;
        float:left;
      }
      .split-right {
        width:400px;
        float:left;
        margin-left:10px;
      }
      #callback-output {
        height:250px;
        overflow:scroll;
      }
      textarea#newoptions {
        width:430px;
      }
	  .button{
	  width:4vw;
	  height:1vh;
	  font-size:2vh;
	  text-align:center;
	  }
    </style>
<link href="css/hover.css" rel="stylesheet" media="all">
<style type="text/css">


/* THESE ARE THE IMAGES FOR THE ALBUM COVERS */
/* === CHANGE THE URL TO CHANGE THE IMAGE == */

/*.drag .wrapper:nth-of-type(1) .item:nth-of-type(1) .front { background: url('images/1.jpg'); }*/
<?php
            $imageDisplay = "";
			$imageclass = "";
			$dir = 'home-folder/best';
			$images = scandir($dir);
			$ignore = array('.','..');
			$i ="1";
			$x ="1";
			$c ="1";
			
			
       /* .drag .wrapper:nth-of-type(".$x.").item:nth-of-type(" .$i. ") .front { background: url(' uploads/" .$file ." ') } */
			

foreach($images as $file){
				if(!in_array($file,$ignore)){ 
				        
						 $imageclass = ".front".$c." { background: url(' home-folder/best/" .$file ." ');height:135px;border-radius: 8px; } ";
									$imageDisplay = "
									.drag .wrapper:nth-of-type(".$x.").item:nth-of-type(" .$i. ")".$imageclass;
								 if($i==10){
										 $i = '0';
										 $x++;
										 }
									 $i++;
									  $c++;
									echo($imageDisplay);
									echo($imageclass
);
									
									
									
				
						
				}
		}
					
		?>	


</style>

<title>VIDEOS</title>

</head>
<body>






<div class="content"><!-- onthou om ads in te sit-->
	<?php 
	 $imageback = "";
		$images = scandir("home-folder/best");//di lib
		$ignore = array('.','..');
		$i ="1";
		$x ="1";
		$stars = 1;
		$views = 1;
		$name = "name";
		//images/1.jpg
foreach($images as $file){
			if(!in_array($file,$ignore)){ 
			$imageback = '<div class="item" > <div class="itemcontent"><center><p class="p"><a href="#"><h3>play</h3></a></p><p class="p">Views '.$views.'</p><p class="p">Title '.$name.'</p></center></div> </div>';
			echo($imageback);
			$i++;
			}
		}

?>

</div>

<div class="test-div"> </div>
<div class="center">

	<h3>HOT</h3>
	
	<div id="carousel">
	<?php
            $imageDisplay = "";
			$dir = 'home-folder/hot';
			$images = scandir($dir);
			$ignore = array('.','..');
			$h = 1;
			
			
       /* <a href="#"><img src="images/1.jpg" id="item-1" /></a> */
			

				foreach($images as $file){
					if(!in_array($file,$ignore)){ 
							
							
										$imageDisplay = '<a href="#"><img src="home-folder/hot/'.$file.'" id="item-'.$h.'" /></a> ';
									 
										echo($imageDisplay);
										
										$h++;
										
					}
				}
					
		?>	

    </div>
     <a href="#"rel="bubble-top" class="button  bubble-top" id="prev2">Prev</a><a href="#" rel="bubble-top" class="button bubble-top"id="next2">Next</a>
	
     

	<h3>TRENDING</h3>
	
	<div id="carousel1">
	<?php
            $imageDisplay = "";
			$dir = 'home-folder/trending';
			$images = scandir($dir);
			$ignore = array('.','..');
			$h = 1;
			
			
       /* <a href="#"><img src="images/1.jpg" id="item-1" /></a> */
			

				foreach($images as $file){
					if(!in_array($file,$ignore)){ 
							
							
										$imageDisplay = '<a href="#"><img src="home-folder/trending/'.$file.'" id="item-'.$h.'" /></a> ';
									 
										echo($imageDisplay);
										
										$h++;
										
					}
				}
					
		?>	

    </div>
    <a href="#"rel="bubble-top" class="button  bubble-top" id="prev">Prev</a><a href="#" rel="bubble-top" class="button bubble-top"id="next">Next</a>


	<h3>NEW</h3>
	
	<div id="carousel2">
	<?php
            $imageDisplay = "";
			$dir = 'home-folder/new';
			$images = scandir($dir);
			$ignore = array('.','..');
			$h = 1;
			
			
       /* <a href="#"><img src="images/1.jpg" id="item-1" /></a> */
			

				foreach($images as $file){
					if(!in_array($file,$ignore)){ 
							
							
										$imageDisplay = '<a href="#"><img src="home-folder/new/'.$file.'" id="item-'.$h.'" /></a> ';
									 
										echo($imageDisplay);
										
										$h++;
										
					}
				}
					
		?>	

    </div>
     <a href="#"rel="bubble-top" class="button  bubble-top" id="prev1">Prev</a><a href="#" rel="bubble-top" class="button bubble-top"id="next1">Next</a>
	</div>	

</div>
                   
<form action="auctionRoom.php" method="post" enctype="multipart/form-data" id="upload" class="upload">
    	<fieldset >
        	<legend>auction for your private show</legend>
			<input name="submit" id="submit" type="submit" value="start a auction" />
        </fieldset>
</form>

<script type="text/javascript">

 /*$(document).ready(function() {
 
 $('.auction').click(function(){
	 $.ajax({    
        type: "GET",
        url: "intoRoom.php",             
        dataType: "html",                 
        success: function(response){                    
            
           
        }

    });
 
 });
 
 

 


 
});*/

</script>



</body>
</html>