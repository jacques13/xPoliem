<?php
    require_once ('core/init.php');
	require_once ('connect.php');
	require_once ('functions.php');
	$video_id = $_GET['post_id'];
	$name = get_fullname_from_postid($video_id);
	$u_id = $_GET['u_id'];
	$username = post_owner($u_id);
	$dsp_name = get_dsp($u_id);
	$src = "uploads/lib/$u_id/videos/$name";
	
?>
<?php //echo(Math::price(1020))

?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
    <title>Videos</title>
	<link type="text/css" rel="stylesheet" href="../css/jquery.videocontrols.mobi.css">
	<link href="../css/nanogallery.css" rel="stylesheet" type="text/css">
	<!-- nanoGALLERY - css file for the theme 'clean' -->
	<link href="../css/themes/clean/nanogallery_clean.css" rel="stylesheet" type="text/css">

	<!-- nanoGALLERY - css file for the theme 'light' -->
	<link href="../css/themes/light/nanogallery_light.css" rel="stylesheet" type="text/css">
	<style>
	.big{font-size: 10vh;
margin: 0;}
	.menu{background: rgb(4, 73, 110);
margin: 10px;
text-align:center;

margin: auto;
margin-top: 0vh;}
	.vid_holder{padding:10px;height:auto;width:100vw;}
	.Main_buttons{
box-sizing: content-box;
-webkit-box-sizing: content-box;
-moz-box-sizing: content-box;
width: 94.7vw;
height: 26vh;
border: 0px none;
display: inline-block;
line-height: 1;
padding: 5px;
text-decoration: none;
font-weight: bold;
color: rgb(255, 255, 255);
background-color: rgb(0, 112, 186);
-moz-border-radius: 5px;
-webkit-border-radius: 5px;
-khtml-border-radius: 5px;
/* border-radius: 5px; */
-webkit-transition: all .5s;
margin:auto;
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
<div class="vid_holder"> 
	<video   id="vid"  controls="controls"> 
		<source src="../uploads/videos20120512_130157.mp4<?php echo '';?>" type="video/mp4"> 
	</video> 
</div >

<div class="menu">
				<h2 class="big"><a><?php echo $username['username'].' - '.$dsp_name ?></a></h2>
				<h4 class="big"><a href="videoList.php?u_id=<?php echo $u_id ?>" >more from user go to video list</a></h4>
				<form id="form1" name="form1" method="post" action="">
						<input type="hidden" name="pid" id="pid" value="<?php echo $id; ?>" />
						<input type="submit" name="button" class="Main_buttons big"id="button" value="BUY" />
				</form>
				<br>
				<form method="get" action="download.php">
						 <input type="hidden" name="vid" value="<?php echo $src?>" />
						<input type="submit"class="Main_buttons big" value="Download file" />
				</form>
	<br>



				<h2 class="big">recommended</h2>
				
					<div id="nanoGallery2a"></div>
						
			
			
</div > 

 

		
		
<script src="../jquery-1.9.1.js" type="text/javascript"></script>
<script src="../js/jquery-1.10.2.min.map"></script>
<script type="text/javascript" src="../js/jquery.nanogallery.js"></script> 
<script type="text/javascript" src="../js/jquery.videocontrols.js"></script>
<script type="text/javascript"> 
    $(document).ready(function () 
    { 
        $('#vid').videocontrols( 
        { 
            markers: [], 
            
            theme: 
            { 
                progressbar: 'blue', 
                range: 'blue', 
                volume: 'blue' 
            } 
        }); 
		var contentGallery2a=[
		<?php 
		/*limit na 9-12
		$url="image.php?u_id=";
		$title="<a href="image.php?u_id=3">go to</a>";
		echo "{
					src: '".$src."',		// image url
					srct: '".$url."',	// thumbnail url
					title: '".$title."' 						// thumbnail title
				},";*/
		?>
				{
					src: '../demonstration/image_01ts.jpg',		// image url
					srct: '../demonstration/image_01ts.jpg',	// thumbnail url
					title: '<a href="image.php?u_id=3">go to</a>' 						// thumbnail title
				},
				{
					src: '../demonstration/image_01ts.jpg',		// image url
					srct: '../demonstration/image_01ts.jpg',	// thumbnail url
					title: '<a href="image.php?u_id=3">go to</a>' 						// thumbnail title
				},
				{
					src: '../demonstration/image_01.jpg',		// image url
					srct: '../demonstration/image_01ts.jpg',	// thumbnail url
					title: 'image 1' 						// thumbnail title
				},
				{
					src: '../demonstration/image_02.jpg',
					srct: '../demonstration/image_02ts.jpg',
					title: 'image 2'
				},
				{
					src: '../demonstration/image_02.jpg',
					srct: '../demonstration/image_02ts.jpg',
					title: 'image 2'
				},
				{
					src: '../demonstration/image_02.jpg',
					srct: '../demonstration/image_02ts.jpg',
					title: 'image 2'
				},
				{
					src: '../demonstration/image_02.jpg',
					srct: '../demonstration/image_02ts.jpg',
					title: 'image 2'
				},
				{
					src: '../demonstration/image_02.jpg',
					srct: 'demonstration/image_02ts.jpg',
					title: 'image 2'
				},
				{
					src: '../demonstration/image_02.jpg',
					srct: 'demonstration/image_02ts.jpg',
					title: 'image 2'
				},
				
				
				{
					src: '../demonstration/image_03.jpg',
					srct: 'demonstration/image_03ts.jpg',
					title: 'image 3'
				}];
		jQuery("#nanoGallery2a").nanoGallery({thumbnailWidth:120,thumbnailHeight:120,
				items:contentGallery2a,
				theme:'clean',
				thumbnailHoverEffect:'imageSplit4',    //'imageOpacity50',
				useTags:false,
        viewerDisplayLogo:false,
        theme:'light',
        i18n:{ 'thumbnailAlbumDescription':'Open Album'},
				thumbnailLabel:{display:true,position:'overImageOnMiddle'},
        colorSchemeViewer:'default'
			});
		
		
    }); 
</script>


   

</body>
</html>