<?php 
require_once ('connect.php');
	require_once ('functions.php');
	require_once ('core/init.php');
	
	
	require_once('classes/Rate.php');
	$objRate = new Rate();
	
	
	if(isset($_GET['u_id']) && !empty($_GET['u_id'])){
		$u_id = $_GET['u_id'];
	}else{
		$u_id = $_SESSION['user_id'];
	}
	$favourites = find_favourites($u_id); 
	$followers = find_all_followers($u_id);
	$lib_posts_titles = find_posts_titles($u_id, 'lib');
	$post_posts_titles = find_posts_titles($u_id, 'posts');
	$IP = ip($_SESSION['user_id']);
	$totalViews = total_views($u_id);
	$totalUps = total_ups($u_id);
	$ptv = Math::percentageViews($totalViews);
	$ptu = Math::percentageUps($totalUps);
	@$B_id =  $_GET['u_id'];
	$dsp_name = get_dsp($u_id);
	$gender = get_gender($u_id);
	$username = get_uname($u_id);
	$videoChatName =  unique($_SESSION['user_id'],$u_id);


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href='http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz' rel='stylesheet' type='text/css'>
<link href="../css/hover.css" rel="stylesheet" media="all">
<link href="../css/jquery.confirmon.css" rel="stylesheet" media="all">
<link href="../css/profilev2.mobi.css" rel="stylesheet" media="all">
<style>

</style>
<script src="../jquery-1.4.4.min.js" type="text/javascript"></script>
<script src="../js/jquery.confirmon.js"></script>

<script src="jquery.popmenu.js"></script>
<script>

</script>

</head>

<body style="background:#4AA0E4 url(images/img01.jpg) repeat; font-family:Yanone Kaffeesatz;
font-size:200px;">
<!--follow_system<?php
			if(isset($_GET['func_lib_posts']) && !empty($_GET['func_lib_posts'])){
				find_lib_posts();
			}
			?>follow_system-->
<div class="menu">


</div>

<div class="left">


				
				
				
				



</div>
<div class="right">
<div id="user_box" style="position: relative;">
			
			<!--post_system-->
				
			<div id="user_details">
			
			<?php include_once("actions_menu.php");?>
			
			<?php echo $objRate->buttonSet($u_id); ?>
			
				<div id="profile_text"class="border-fade"><textarea disabled><?php $ppost = get_post($u_id); echo $ppost ?></textarea></div>
				
				<div class="grow" id="profile_picture"  style="background: url(../<?php echo Need_pp($u_id) ?>); alt: top left no-repeat;background-size:100% 100%;"></div>
				<div style="float:right;z-index:10000;margin-left: -15vh;
margin-top: 15vh;">
				<canvas width="100%" height="100%" class="totalViews sink"></canvas>
			</div>
			<div style="float:right;">
				<canvas width="100%" height="100%" class="totalUps sink"></canvas>
			</div>
				<?php include_once("drinks_menu.php");?>
				<!--skuif op n later stadium-->
			
				<?php //require_once ('../actions_menu.php');?>
				<!--skuif op n later stadium-->
				<div class="tags grow" style="position: absolute; top: 0.5vw;margin-left: 78vh;"><textarea disabled><?php echo $dsp_name ?></textarea></div>
				<div class="tags grow" style="position: absolute; top: 4vw;margin-left: 78vh;"><textarea disabled><?php echo $gender ?></textarea></div>
				
				<!--follow_system--><?php 
				if(test_same_user($u_id) == false){
					$check = mysql_query("SELECT `id` FROM `xpoliem`.`follow` WHERE `user_one`='$my_id' AND `user_two`='$u_id'");
					if(mysql_num_rows($check) == 1){
					echo "<a class = 'button-link ppbuttons ' href='actions.php?action=unfollow&u_id=$u_id'>UnFollow</a>";
					}else{
					echo "<a class = 'button-link ppbuttons' href='actions.php?action=follow&u_id=$u_id'>Follow</a>";
					}
					echo "";
				}
				if(test_same_user($u_id) == true){
					
				}else{
					
					
					
				
				}?><!--follow_system-->
				<?php

		if(test_same_user($u_id) == false){
		//daarby action mut mens di shit kan koop
		

echo $objRate->buttonSet($B_id); 
		}?>
			</div>
		</div>



			

</div>

<div class="spacer"><?php 
			test_expire($u_id);
			if (test_same_user($u_id) == true){
				echo "<a class = ' ppbuttons new_post' href='post_form.php?to=posts&u_id=$u_id' style='margin-left: 25vw;
margin-top: 68.5vh;'>New</a>";
			}?>
			</div>
<!--<div class="img">
		img and vid
    <img src="images/1.jpg" class="float img"/>
    <button class = 'buttonP grow'style="float:left;" id='button".$x."' data="$message" >read more</button>
    <div class="text"><p>hey this a typicla p</p></div>
    <a class = 'buttonP grow' style="float:right; height:5vh;width:5vw;margin-top:-2vh;" 
    href='actions.php?action=delete&post_title=$post_title&post_path=$post_path&path=posts&u_id=$u_id'>				delete</a>
    <img src="images/1.jpg" class="profilePic pop"/>
    <h2 class="profilelink pulse-grow"><a>my profile page</a></h2>
</div>
<div class="img" style="height:20vh">
<!--text
    <img src="images/1.jpg" class="profilePictext pop"/>
    <h2 class="profilelinktext pulse-grow"><a>my profile page</a></h2>
    <p class="text" style=" margin-top:-3vh;">dis a typlical p</p>
    <button class = 'buttonP grow' style="float:left; height:5vh;margin-top:-0vh;" id='button".$x."' data="$message" >read more</button>
    
    <a class = 'buttonP grow' style="float:right; height:5vh;width:5vw;margin-top:-5vh;" 
    href='actions.php?action=delete&post_title=$post_title&post_path=$post_path&path=posts&u_id=$u_id'>				delete</a>



</div>-->
<div class="top">

<span id="Admirers_btn" class=" ppbuttons grow"style="margin:10px; padding:0px 5px 0px 5px;margin-top:30vw;width:auto;max-width:18vw">Admirers (<?php echo $_SESSION['followers_nr'];?>)</span>
				<span id="Favourites_btn" class="ppbuttons grow"style="width:auto;max-width:18vw padding:0px 5px 0px 5px">Favourites (<?php echo $_SESSION['$favourites_nr'];?>)</span>
				
				
				


													
															
<?php 
									if (empty($post_posts_titles)){
//na die eerste img mut di volgende ene se margin 0 wees
										echo "<div class='img' style='height:20vh'>
													<img src='../".Need_pp($u_id)."' class='profilePictext pop'/>
																<h2 class='profilelinktext pulse-grow'><a href=''></a></h2>
																<p class='text' style=' margin-top:-7vh;'>No posts yet</p>
																


															</div>
										";
									}else{
									$x = -1;
									$textCounter = 0;
									$imgCounter = 0;
									$margin = -27.5;
									$ml = -57;
										foreach ($post_posts_titles as $post_title) {
																						
											
											$x++;
											
											$post_body = find_post_body($u_id, $post_title);
											$post_body = $post_body[0];
											$post_path = $u_id.'.'.$post_title;
											$extension = find_posts_ext($u_id, 'lib', $post_title);
											$post_path = $post_path.'.'.$extension[0];
											$message =$post_body;
											
											
											
											
											echo "";
											if (test_img($extension[0]) == true){
											$ml = -57;
															
															
															$imgCounter++;
															if($imgCounter > 1){
																$ml =$ml +57;
															}
												echo '<div class="img">
																													
															<img src="../uploads/lib/'.$u_id.'/images/'.$post_path.'" class="float img">
															<button class="ppbuttons grow" style="float:left; margin-left:'.$ml.'vh;" id="button'.$x.'" data="'.$message.'">Read</button>
															<div class="text"><p></p></div>

															<a class="ppbuttons grow" style="float:right;margin-top: -121.5vh;
														margin-right: 0.5vw;" href="actions.php?action=delete&post_title='.$post_title.'&post_path='.$post_path.'&path=posts&u_id='.$u_id.'">delete</a>

														</div>';
													/*echo "<div class='img'>
															<!--img and vid-->
																<img src='../uploads/lib/$u_id/images/$post_path' class='float img'/>
																<button class = 'ppbuttons grow'style='float:left; ' id='button".$x."' data='".$message."' >Read</button>
																<div class='text'><p>$post_body</p></div>
																<img src='../".Need_pp($u_id)."' class='profilePic pop'/>
																<h2 class='profilelink pulse-grow'><a>$username - $post_title</a></h2>
																<a class = 'ppbuttons grow' style='float:right; margin-top:4vh;' 
																href='actions.php?action=delete&post_title=$post_title&post_path=$post_path&path=posts&u_id=$u_id'>delete</a>
																
															</div>";*/
															
															
										
											}else { 
												if ($extension[0] == 'ogv'){
												$ml = -57;
															
															
															$imgCounter++;
															if($imgCounter > 1){
																$ml =$ml +57;
															}
													/*echo "<li class='p'>
													<a>$post_title<br><strong>$username</strong><br>
													<strong>$post_body<br>
													<button class='buttonP grow' id='button".$x."' data='".$message."'><p>Read more</p></button><br>
													<button class = 'buttonP grow' href='actions.php?action=delete&post_title=$post_title&post_path=$post_path&path=posts&u_id=$u_id'><p>Delete</p></button></strong></strong><span>
													<img src='uploads/lib/$u_id/images/$post_path'>
													</a></span>
													</li>";
													echo "<div class='img'>
															<!--img and vid-->
																<img src='../uploads/lib/$u_id/videos/thumbs/$post_path' class='float img'/>
																<button class = 'ppbuttons grow'style='float:left;' id='button".$x."' data='".$message."' >Read</button>
																<div class='text'><p>$post_body</p></div>
																<img src='../".Need_pp($u_id)."' class='profilePic pop'/>
																<h2 class='profilelink pulse-grow'><a>$username - $post_title</a></h2>
																<a class = 'ppbuttons grow' style='float:right; margin-top:4vh;' 
																href='actions.php?action=delete&post_title=$post_title&post_path=$post_path&path=posts&u_id=$u_id'>delete</a>
																
															</div>";*/
															echo '<div class="img">
																													
															<img src="../uploads/lib/'.$u_id.'/images/'.$post_path.'" class="float img">
															<button class="ppbuttons grow" style="float:left; margin-left:'.$ml.'vh;" id="button'.$x.'" data="'.$message.'">Read</button>
															<div class="text"><p></p></div>

															<a class="ppbuttons grow" style="float:right;margin-top: -121.5vh;
														margin-right: 0.5vw;" href="actions.php?action=delete&post_title='.$post_title.'&post_path='.$post_path.'&path=posts&u_id='.$u_id.'">delete</a>

														</div>';
												}else{
												if($textCounter > 1){
														$margin = $margin + 27;
														
														}
														$textCounter++;
													/*echo "<li class='text'>
													<a>$post_title<br><br><strong><b>$username</b></strong><br><br>
															<strong>$post_body</strong><br><strong>
															<button class=' buttonPl grow' id='button".$x."' data='".$message."'><p>Read more</p></button><br>
															<button class = ' buttonPl grow' href='actions.php?action=delete&post_title=$post_title&post_path=$post_path&path=posts&u_id=$u_id'><p>Delete</p></button>
															</strong></strong><span>
													</a></span>
													</li>";*/
													
													echo'<div class="img" style="height:20vh;margin:10vh">


																<p class="text" style=" margin-top:-7vh;">'.$post_body.'</p>
																<button class="ppbuttons grow" style="float:left; margin-top:'.$margin.'vh;" id="button'.$x.'" data="'.$message.'">Read</button>
																
																<a class="ppbuttons grow" style="float:right; height:5vh;width:5vw;margin-top:'.$margin.'vh;margin-right:0.4vh;" href="actions.php?action=delete&post_title='.$post_title.'&post_path='.$post_path.'&path=posts&u_id='.$u_id.'">delete</a>



															</div>';
															
													
													/*echo " <div class='img' style='height:20vh'>
													<img src='../".Need_pp($u_id)."' class='profilePictext pop'/>
																<h2 class='profilelinktext pulse-grow'><a href=''>$username - $post_title</a></h2>
																<p class='text' style=' margin-top:-7vh;'>$post_body</p>
																<button class = 'ppbuttons grow' style='float:left; height:5vh;margin-top:-0vh;' id='button".$x."' data='".$message."' >Read</button>
																
																<a class = 'ppbuttons grow' style='float:right; height:5vh;width:5vw;margin-top:-5vh;' 
																href='actions.php?action=delete&post_title=$post_title&post_path=$post_path&path=posts&u_id=$u_id'>delete</a>



															</div> ";*/
													
														
														
												}
											}
											//
											
											
											
										}
									}
								
								?>
								
								
								<script src="../js/jquery-hover-dropdown-box.js"></script>
	<link rel="stylesheet" href="../css/jquery-hover-dropdown-box.css" />
	<script type="text/javascript">
		$(function(){
			$('#Admirers_btn').appendHoverDropdownBox({
				title: 'Admirers (<?php echo $_SESSION['followers_nr'];?>)',
				
				items: {
				<?php 
							
							if (empty($followers)){
								echo '<div>NO ONE IS FOLLOWING YOU, YET.</div>';
							}else{
								foreach ($followers as $id_fol) {
									$query_fol = mysql_query("SELECT `user_one` FROM `xpoliem`.`follow` WHERE `id` = '$id_fol'");
									$search_id_fol = mysql_fetch_row($query_fol);
									
									$query_fol = mysql_query("SELECT `username` FROM `xpoliem`.`users` WHERE `id` = '$search_id_fol[0]'");
									$name_fol = mysql_fetch_row($query_fol);
									
									
										echo '"'.$name_fol[0].'": {
													color: "#e74c3c",
													href:"profile.php?u_id='.$search_id_fol[0].'",
													pic:"'.Need_pp($id_fol).'"
												},';
								}
							}
						?>   
					
					
					
					
					
				},
				
				
			});
		});
		</script>
	<script type="text/javascript">
		$(function(){
			$('#Favourites_btn').appendHoverDropdownBox({
				title: 'Favourites (<?php echo $_SESSION['$favourites_nr'];?>)',
				items: {
				<?php 
								if (empty($favourites)){
									echo'"NO favourites": {
												color: "#e74c3c",
											
											},';
								}else{
								
									foreach ($favourites as $id_fav) {
										$query_fav = mysql_query("SELECT `user_two` FROM `xpoliem`.`follow` WHERE `id` = '$id_fav'");
										$search_id_fav = mysql_fetch_row($query_fav);
									
										$query_fav = mysql_query("SELECT `username` FROM `xpoliem`.`users` WHERE `id` = '$search_id_fav[0]'");
										$name_fav = mysql_fetch_row($query_fav);
									
										echo '"'.$name_fav[0].'": {
													color: "#e74c3c",
													href:"profile.php?u_id='.$search_id_fav[0].'",
													pic:"'.Need_pp($id_fav).'"
													
												},';
												
									}
								}
							?> 
					
					
					
					
					
				},
				
				
			});
		});
		</script>
	  
	
<script src="../js/core.js" type="text/javascript"></script>
<script src="../jquery.mambo.js" type="text/javascript"></script>

<script type="text/javascript">
$(function(){
  $(".text p ").each(function(i){
    len=$(this).text().length;
    if(len>50)
    {
      $(this).text($(this).text().substr(0,50)+'...');
    }
  });
});
</script>
<script type="text/javascript">
$(function(){
  $("p.text ").each(function(i){
    len=$(this).text().length;
    if(len>50)
    {
      $(this).text($(this).text().substr(0,50)+'...');
    }
  });
});
</script>
    <script>
      
    </script>  
<script>
 $('#boxes').popmenu({'background':'url("dataimages/background_shit.png")','focusColor':'#09F','borderRadius':'10px'});
	  <?php
	  $X = -1;
	  $top = 10;
		foreach ($post_posts_titles as $post_title) {
		$X++;
		$top = $top+40;
		echo("$(function() {
							  var message = $('#button".$X."').attr('data');
											$('#button".$X."').confirmOn({
												 questionText: message,
								   
									textYes: 'yes , to remove read me button',
									textNo: 'No,to keep read me button',
									TopPosition: '".$top."vh',
											},'click', function(e, confirmed) {
												 if(confirmed) {
													$(this).remove();
												} 
											});
											
											
										});");
										
		}
	  ?>
										

									</script>

<script type="text/javascript" src="../js/jqIpLocation.js"></script>
<script type="text/javascript" >
//stu met ajax na database
$('#loc').click(
function getLocation()
{


    $('#divIP').empty().append('<div style="padding:3px;"><img src="loader.gif" /></div>');
    $.jqIpLocation({
    ip :'<?php echo $IP?>',
    locationType : 'city',
	success: function(location) {
			
			
			
					 $.ajax({
									url: 'profile.php?ipAddress=' +location.ipAddress + '&countryName=' + location.countryName + 
									'&cityName=' + location.cityName+'&latitude=' + location.latitude+
									'&longitude=' + location.longitude,
									type: "GET",
									
						
									success:    function(data) {
									
									   
									}
							});
			
           
       }
   });
  

}
);

</script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-3621996-5']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<script type="text/javascript">
$(".totalViews").mambo({
					  percentage: <?php echo $ptv ;  ?>,
					  label: "TV",
					  displayValue: true,
					  circleColor: '#7ACAD9',
					  ringStyle: "full",
					  ringColor: "#7ACAD9",
					  drawShadow: true
			});
				$(".totalUps").mambo({
				  percentage: <?php echo $ptu ;  ?>,
				  label: "TUp",
				  displayValue: true,
				  circleColor: '#7ACAD9',
				  ringStyle: "full",
				  ringColor: "#7ACAD9",
				  drawShadow: true
				});
  

</script>




</body>
</html>
