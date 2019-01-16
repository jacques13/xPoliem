<?php 
	require_once ('connect.php');
	require_once ('functions.php');
	require_once ('core/init.php');
	require_once ('nav.php');
	require_once('classes/Rate.php');
	$objRate = new Rate();
	
	
	if(isset($_GET['u_id']) && !empty($_GET['u_id'])){
		$u_id = escape($_GET['u_id']);
	}else{
		$u_id = get_currentID();
	}
	$favourites = find_favourites($u_id); 
	$followers = find_all_followers($u_id);
	$post_posts_IDtitles = find_posts_titles($u_id, 'posts');
	$totalViews = total_views($u_id);
	$totalUps = total_ups($u_id);
	$ptv = Math::percentageViews($totalViews);
	$ptu = Math::percentageUps($totalUps);
	$dsp_name = get_dsp($u_id);
	$gender = get_gender($u_id);
	$username = get_uname($u_id);
	$videoChatName =  unique(escape($_SESSION['user_id']),$u_id);// USE???


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Profile xPoliem</title>
<link href='http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz' rel='stylesheet' type='text/css'>
<link href="css/hover.css" rel="stylesheet" media="all">
<link href="css/jquery.confirmon.css" rel="stylesheet" media="all">
<link href="css/profilev2.css" rel="stylesheet" media="all">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script src="jquery-1.4.4.min.js" type="text/javascript"></script>
<script src="js/jquery.confirmon.js"></script>
<script src="js/jquery.popmenu.js"></script>
<link href="css/profile_importants.css" rel="stylesheet" media="all">
</head>

<body>
<div id="space_maker"></div><!--remove when no-longer needed-->
<div class='Box_wrap'>
	<div class="right">
	
	</div>
	<div class="left">
		<div class="user_box">
			
			<!--post_system-->
			
			<div id="user_details">
				<div id="profile_text" class="border-fade"><textarea disabled><?php $ppost = get_post($u_id); echo $ppost ?></textarea></div>
				<div class="grow" id="profile_picture"  style="background: url(<?php echo Need_pp($u_id) ?>) top left no-repeat; background-size:100% 100%;"></div>
				<div class="tags grow" style="top: 0.94vw;"><textarea id="username_tag" disabled><?php echo $dsp_name ?></textarea>
				<script> 
				if( username_tag.offsetHeight < username_tag.scrollHeight || username_tag.offsetHeight < username_tag.scrollHeight ){
				   document.write('<a class="tooltip">?<span class="custom info"><img src="Dataimages/Info.png" height="50%" width="35%" />scroll</span></a>');
				}
				</script></div>
				<div class="tags grow lessen_font" style="top: 2.94vw;"><textarea disabled><?php echo $gender ?></textarea></div>
				
				
				<!--follow_system--><?php 
				if(test_same_user($u_id) == false){
					$check = check_follow($my_id,$u_id);
					if($check >= 1){
						echo "<a class = 'grow button-link ppbuttons follow_un' href='actions.php?action=unfollow&u_id=$u_id'>UnFollow</a>";
					}else{
						echo "<a class = 'grow button-link ppbuttons follow_un' href='actions.php?action=follow&u_id=$u_id'>Follow</a>";
					}
				//follow_system_end
				
				//css not checked by A, for fear of J not knowing where to find after moving
				 
				}?>
				<!--skuif op n later stadium-->
				<?php
				require_once ('actions_menu.php');?>
				<!--skuif op n later stadium-->
				<?php 
					if(test_same_user($u_id) == false){
						//require_once('drinks_menu.php'); FIX DIE Skuif
					}?>
				<!-- TILL HERE (css not checked) A -->
			</div>
		</div>

		<span class="ppbuttons grow Admire_Fav">Admirers (<?php echo escape($_SESSION['followers_nr']);?>)</span>
		<div class="hover_block hover_block_left">
			<h3>Admirers (<?php echo escape($_SESSION['followers_nr']);?>)</h3>
			<?php if (empty($favourites)){
				echo "NO Admirers YET";
			}else{
				$two_or_one = 'user_one';
				foreach ($followers as $id_fol) {
					$got_id = get_FavFol_id($id_fol, $two_or_one);
					$name_fol = get_uname($got_id);
				
					echo "<a href='profilev3.php?u_id=".$got_id."'>
						<div class='content_item' href='profile.php?u_id=".$got_id."'>
							<img class='fav_fol_img' src='".Need_pp($got_id)."'></img>
							<div class = 'fav_fol_uname'>$name_fol</div>
						</div>
					</a>";
							
				}
			}?>
		</div>
		<div  class="ppbuttons grow Admire_Fav"><span>Favourites (<?php echo escape($_SESSION['$favourites_nr']);?>)</span></div>
		<div class="hover_block hover_block_right">
			<h3>Favourites (<?php echo escape($_SESSION['$favourites_nr']);?>)</h3>
			<?php if (empty($favourites)){
				echo "NO favourites";
			}else{
				$two_or_one = 'user_two';
				foreach ($favourites as $id_fav) {
					$got_id = get_FavFol_id($id_fav, $two_or_one);
					$name_fav = get_uname($got_id);
				
					echo "<a href='profilev3.php?u_id=".$got_id."'>
							<div class='content_item' href='profile.php?u_id=".$got_id."'>
								<img class='fav_fol_img' src='".Need_pp($got_id)."'></img>
								<div class = 'fav_fol_uname'>$name_fav</div>
							</div>
						</a>";
							
				}
			}?>
		</div>
									
		<?php 
		if(test_same_user($u_id) == false){
			echo $objRate->buttonSet($u_id); //werk??? css not checked
			//require_once('drinks_menu.php');
		}?>
		
		<div >
			<canvas width="100%" height="100%" class="totalViews sink"></canvas><!-- .totalViews en .totalUps not checked css (could not find) A-->
		</div>
		<div style="float:left;">
			<canvas width="100%" height="100%" class="totalUps sink"></canvas><!-- previous comment-->
		</div>
					

	</div>
	<div class="center_content">
		<div id="POSTS">
			<?php 
			if (empty($post_posts_titles)){
				echo "<div class='user img_and_text'>
					<div class='pic_and_name'>
						<img src='".Need_pp($u_id)."' class='profilePic pop'/>
						<ul class='post_username'>
							<a class='grow add_shadow' href='Home.php'><li>xPoliem</li></a>
						</ul>
					</div>
					<div class='text_body'>
						<div class='text_title'>
							<b>No posts yet</b>
						</div>";
							if(test_same_user($u_id) == true){
								echo"<span>Please Post something so that everyone can get to know you. Simply click on the 'ACTIONS' tab next to your display picture and select New Post. ENJOY</span>";
							}
					echo "</div>
				</div>";
				
							
							
						
							
				
			}else{
				$pure_text = -1;
				$text_img = -1;
				$x = -1;
				foreach ($post_posts_IDtitles as $post) {
					$post_title = get_file_allButOwner($post);
					$post_owner_id = get_file_owner_id($post);
					$post_body = find_post_body($post_owner_id, $post_title);
					$post_body = $post_body[0];
					$post_path = $post_owner_id.'.'.$post_title;
					$extension = find_posts_ext($post_owner_id, 'lib', $post_title);
					$post_path = $post_path.'.'.$extension[0];
					$message =$post_body;
					$user_nonuser = 'nonuser';
					$username = get_uname($post_owner_id);
					if(test_same_user($u_id) == true AND test_same_user($post_owner_id) == true){
						$user_nonuser = 'user';
					}
					$x++;
					if (test_img($extension[0]) == true){
						if($post_body == NULL){
							echo "<div class='$user_nonuser img'>
								<!--img and vid-->
								<div class='pic_and_name'>
									<img src='".Need_pp($post_owner_id)."' class='profilePic pop'/>
									<ul class='post_username'>
										<a class='grow add_shadow' href='profile.php?u_id=$post_owner_id'><li>$username</li></a>
									</ul>";
									if(test_same_user($u_id) == true AND test_same_user($post_owner_id) == true){
										echo "<a class = 'delete_fix_lrg read_delete' href='actions.php?action=delete&post_title=$post_title&post_path=$post_path&path=posts&u_id=$post_owner_id'>Delete</a>";
									};
									$id_for_use = get_post_ids_from_posts($post_title, $post_owner_id);
								echo "</div>
								<a class='img_body' href='libsss.php?u_id=$post_owner_id&action=view&type=img&post_id=$id_for_use'>
									<img src='uploads/lib/$post_owner_id/images/$post_path' class='float post_pic'/>
									<div class='img_title'>
										<b>$post_title</b>
									</div>
								</a>
							</div>";
						}else{
							echo "<div class='$user_nonuser img_and_text'>
								<!--img and vid-->
								<div class='pic_and_name'>
									<img src='".Need_pp($post_owner_id)."' class='profilePic pop'/>
									<ul class='post_username'>
										<a class='grow add_shadow' href='profile.php?u_id=$post_owner_id'><li>$username</li></a>
									</ul>";
									if(test_same_user($u_id) == true AND test_same_user($post_owner_id) == true){
										echo "<a class = 'delete_fix read_delete' href='actions.php?action=delete&post_title=$post_title&post_path=$post_path&path=posts&u_id=$post_owner_id'>Delete</a>";
									};
								$id_for_use = get_post_ids_from_posts($post_title, $post_owner_id);
								echo "</div>
								<a class='img_body' href='libsss.php?u_id=$post_owner_id&action=view&type=img&post_id=$id_for_use'>
									<img src='uploads/lib/$post_owner_id/images/$post_path' class='float post_pic_text'/>
									<div class='text_img_title img_and_text".$text_img."'>
										<b>$post_title</b>
									</div>";
									$text_img++;
									echo "<span id='img_and_text".$text_img."' class='text_between_imgs'>$post_body</span>
									<script type='text/javascript'>
										if($('#img_and_text".$text_img."')[0].scrollHeight >  $('#img_and_text".$text_img."').height()){
											$('#img_and_text".$text_img."').height('4vw');
											document.write('<button class = \'read_delete ppbuttons\'  id=\'button".$x."\' data=\'".$message."\' >Read</button>');
										}
									</script>
								</a>
							</div>";
						}
					}else{ 
						if ($extension[0] == 'ogv'){
							if($post_body == NULL){
								echo "<div class='$user_nonuser img'>
									<!--img and vid-->
									<div class='pic_and_name'>
										<img src='".Need_pp($post_owner_id)."' class='profilePic pop'/>
										<ul class='post_username'>
											<a class='grow add_shadow' href='profile.php?u_id=$post_owner_id'><li>$username</li></a>
										</ul>";
										if(test_same_user($u_id) == true AND test_same_user($post_owner_id) == true){
											echo "<a class = 'delete_fix_lrg read_delete' href='actions.php?action=delete&post_title=$post_title&post_path=$post_path&path=posts&u_id=$post_owner_id'>Delete</a>";
										};
									$id_for_use = get_post_ids_from_posts($post_title, $post_owner_id);
									echo "</div>
									<a class='img_body' href='libsss.php?u_id=$post_owner_id&action=view&type=vid&post_id=$id_for_use'>
										<img src='uploads/lib/$post_owner_id/videos/thumbs/$post_path' class='float post_pic'/>
										<div class='img_title'>
											<b>$post_title</b>
										</div>
									</a>
								</div>";
							}else{
								echo "<div class='$user_nonuser img_and_text'>
									<!--img and vid-->
									<div class='pic_and_name'>
										<img src='".Need_pp($post_owner_id)."' class='profilePic pop'/>
										<ul class='post_username'>
											<a class='grow add_shadow' href='profile.php?u_id=$post_owner_id'><li>$username</li></a>
										</ul>";
										if(test_same_user($u_id) == true AND test_same_user($post_owner_id) == true){
											echo "<a class = 'delete_fix read_delete' href='actions.php?action=delete&post_title=$post_title&post_path=$post_path&path=posts&u_id=$post_owner_id'>Delete</a>";
										};
									$id_for_use = get_post_ids_from_posts($post_title, $post_owner_id);
									echo "</div>
									<a class='img_body' href='libsss.php?u_id=$post_owner_id&action=view&type=vid&post_id=$id_for_use'>
										<img src='uploads/lib/$post_owner_id/videos/thumbs/$post_path' class='float post_pic_text'/>
										<div class='text_img_title img_and_text".$text_img."'>
											<b>$post_title</b>
										</div>";
										$text_img++;
									echo "</a>
										<span id='img_and_text".$text_img."' class='text_between_imgs'>$post_body</span>
										<script type='text/javascript'>
											if($('#img_and_text".$text_img."')[0].scrollHeight >  $('#img_and_text".$text_img."').height()){
												$('#img_and_text".$text_img."').height('4vw');
												document.write('<button class = \'read_delete ppbuttons\'  id=\'button".$x."\' data=\'".$message."\' >Read</button>');
											}
										</script>
									</div>
								</div>";
									
							}
						}else{
							echo "<div class='$user_nonuser img_and_text'>
								<div class='pic_and_name'>
									<img src='".Need_pp($post_owner_id)."' class='profilePic pop'/>
									<ul class='post_username'>
										<a class='grow add_shadow' href='profile.php?u_id=$post_owner_id'><li>$username</li></a>
									</ul>";
									if(test_same_user($u_id) == true AND test_same_user($post_owner_id) == true){
										echo "<a class = 'delete_fix read_delete' href='actions.php?action=delete&post_title=$post_title&post_path=$post_path&path=posts&u_id=$post_owner_id'>Delete</a>";
									};
								$id_for_use = get_post_ids_from_posts($post_title, $post_owner_id);
								echo "</div>
								<a class='text_body' href='libsss.php?u_id=$post_owner_id&action=view&post_id=$id_for_use'>
									<div class='text_title'>
										<b>$post_title</b>
									</div>";
									$pure_text++;
									echo "<span id='pure_text".$pure_text."' class='text_next_img'>$post_body</span>
									<script type='text/javascript'>
										if($('#pure_text".$pure_text."')[0].scrollHeight >  $('#pure_text".$pure_text."').height()){
											$('#pure_text".$pure_text."').height('4vw');
											document.write('<button class = \'read_delete ppbuttons\'  id=\'button".$x."\' data=\'".$message."\' >Read</button>');
										}
									</script>
								</a>
							</div>";
						}
					}
				}
			}
			?>
		</div>
	</div>

									

		<script type="text/javascript">
		$.each([<?php echo $pure_text.','.$text_img?>], function( index,value ){
			if(index == 0){
				z = ('#pure_text');
			}
			if(index == 1){
				z = ('#img_and_text');
			}
			for (i = 0; i <= value; i++) {
				k = (z + i);
				if($(k)[0].scrollHeight >  $(k).height()){
					$(k).height('4vw');
					while ($(k)[0].scrollHeight >  $(k).height()) {
						$(k).text($(k).text().substr(0,$(k).text().length - 4)+'...');
					}
				}
			}
		});
		</script>
		  
		
	<script src="js/core.js" type="text/javascript"></script>
	<script src="jquery.mambo.js" type="text/javascript"></script>
		 
	<script>
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
									   title: 'Title',
									   date: '17 augustus',
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
		
	

	<script type="text/javascript">
	$(".totalViews").mambo({
						  percentage: <?php echo $ptv ;?>,
						  label: "TV",
						  displayValue: true,
						  circleColor: '#7ACAD9',
						  ringStyle: "full",
						  ringColor: "#7ACAD9",
						  drawShadow: true
				});
					$(".totalUps").mambo({
					  percentage: <?php echo $ptu ;?>,
					  label: "TUp",
					  displayValue: true,
					  circleColor: '#7ACAD9',
					  ringStyle: "full",
					  ringColor: "#7ACAD9",
					  drawShadow: true
					});
	  

	</script>

	
</div>
</body>
</html>
