<?php
    require_once ('core/init.php');
	require_once ('connect.php');
	require_once ('nav.php');
	require_once ('functions.php');
	require_once ('functions.paypal.php');
	$video_id = escape($_GET['post_id']);
	$name = get_fullname_from_postid($video_id);
	$u_id = escape($_GET['u_id']);
	$username = post_owner($u_id);
	$dsp_name = get_dsp($u_id);
	$src = "uploads/lib/$u_id/videos/$name";
	$price = VidPrice($video_id);
	$views = getvidviews($video_id);
	if($views['views']>=1000){
						$src = "uploads/lib/$u_id/videos/thumbs/$name.jpg";
					}

?>
<?php 

?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
    <title>Videos</title>
	<link type="text/css" rel="stylesheet" href="css/jquery.videocontrols.css">
	<link href="css/nanogallery.css" rel="stylesheet" type="text/css">
	<!-- nanoGALLERY - css file for the theme 'clean' -->
	<link href="css/themes/clean/nanogallery_clean.css" rel="stylesheet" type="text/css">

	<!-- nanoGALLERY - css file for the theme 'light' -->
	<link href="css/themes/light/nanogallery_light.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="css/global.css"/>
	
    
    
</head>
<body>
<div style="padding:10px;height:100vh;"> 
	
		 
		
		<?php
				if($views['views']>=1000){
						echo'<img style="padding: 10px;
										height: auto;
										max-height: 50%;
										width: auto;
										max-width: 50%;" 
									src="'. $src.'"/>';
					}else{
						echo'<video   id="vid"  controls="controls"> 
								<source src="'. $src.'" type="video/mp4">
							</video> ';
					}?>
	
</div > 
<div style="background: dimgrey;
margin: -46% 22% 10px 10px;
max-width: 450px;
float: right;
margin-right: 9%;
width: 37%;
text-align: center;
padding: 10px;
border: 1px solid rgb(250, 235, 215);">
				<h2><a href="profile.php?u_id=<?php echo $u_id ?>"><?php echo $username['username'].' - '.$dsp_name ?></a></h2>
				<h4><a href="videoList.php?u_id=<?php echo $u_id ?>" >more from user go to video list</a></h4>
				<h4>views <?php echo $views['views'];?></h4>
				<h4>price <?php echo $price[0]+$price[1];?></h4>
				
				<?php 
					if($views['views']>=1000){
						echo'<form id="form1" name="form1" method="post" action="videocart.php">
								<input type="hidden" name="pid" id="pid" value="'. $video_id .'" />
								<input type="submit" name="button" id="button" value="Buy" />
							</form>';
					}else{
						echo'<form method="get" action="download.php">
									 <input type="hidden" name="vid" value="<?php echo $src?>" />
									<input type="submit" value="Download file" style="width:auto"/>
							</form>';
					}
				
				?>
				
				<br>
				
<br>



				<h2>recommended</h2>
				
						<br>
						<div id="nanoGallery1a"></div>
						<br>
						<div id="nanoGallery2a"></div>
					
					
		</div > 



		
		

<script type="text/javascript" src="js/jquery.nanogallery.js"></script> 
<script type="text/javascript" src="js/jquery.videocontrols.js"></script>
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
		$url="videoViewer.php?post_id=";
		$title="<a href=".$url.">go to</a>";
		echo "{
					src: '".$src."',		// image url
					srct: '".$url."',	// thumbnail url
					title: '".$title."' 						// thumbnail title
				},";*/
		?>
				{
					src: 'demonstration/image_01ts.jpg',		// image url
					srct: 'demonstration/image_01ts.jpg',	// thumbnail url
					title: '<a href="image.php?u_id=3">go to</a>' 						// thumbnail title
				},
				{
					src: 'demonstration/image_01.jpg',		// image url
					srct: 'demonstration/image_01ts.jpg',	// thumbnail url
					title: 'image 1' 						// thumbnail title
				},
				{
					src: 'demonstration/image_02.jpg',
					srct: 'demonstration/image_02ts.jpg',
					title: 'image 2'
				},
				{
					src: 'demonstration/image_02.jpg',
					srct: 'demonstration/image_02ts.jpg',
					title: 'image 2'
				},
				{
					src: 'demonstration/image_02.jpg',
					srct: 'demonstration/image_02ts.jpg',
					title: 'image 2'
				},
				{
					src: 'demonstration/image_02.jpg',
					srct: 'demonstration/image_02ts.jpg',
					title: 'image 2'
				},
				{
					src: 'demonstration/image_02.jpg',
					srct: 'demonstration/image_02ts.jpg',
					title: 'image 2'
				},
				{
					src: 'demonstration/image_02.jpg',
					srct: 'demonstration/image_02ts.jpg',
					title: 'image 2'
				},
				
				
				{
					src: 'demonstration/image_03.jpg',
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