<?php
require_once('core/init.php');
require_once ('connect.php');
require_once ('functions.php');

$my_id = escape($_SESSION['user_id']);
$action = escape($_GET['action']);
$u_id = escape($_GET['u_id']);
	
if($action == 'follow'){
	$check = check_follow($my_id,$u_id);
	if($check == 0){
	mysql_query("INSERT INTO `xpoliem`.`follow` (`id` ,`user_one` ,`user_two`)VALUES('', '$my_id', '$u_id')");
	}
}
if($action == 'unfollow'){
	mysql_query("DELETE FROM `xpoliem`.`follow` WHERE `user_one` = '$my_id' AND `user_two`='$u_id'");
}
/*upload*/
/*[Redacted]*/


/*post*/
if($action == 'post'){
	$path = escape($_GET['path']);
	$title = escape($_POST['title']);
	if (!empty($title)){
		if (post_exist($my_id, $title, $path) == false){
			error_reporting(E_ALL);
			
			$body = escape($_POST['body']);
			$file_type = escape($_POST['file_type']);
			$file = 'file';
			$old_name = $_FILES[$file]["name"];
			$extension = get_file_extension($old_name);

			if (empty($extension)){
				$extension='';
			}	
				
			define('KB', 1024);
			define('MB', 1048576);
			define('GB', 1073741824);
			define('TB', 1099511627776);

			if (!empty($old_name)){
				if($file_type == 'img'){
					if(test_img($extension)){
						if ($_FILES[$file]["size"] < 3*MB){
							if ($_FILES[$file]["error"] > 0){
								echo "Return Code: " .$_FILES[$file]["error"] . "<br />";
							}else{
								if (is_dir('uploads/lib/'.$my_id) == 0){
									mkdir('uploads/lib/'.$my_id);
								}
								if (is_dir('uploads/lib/'.$my_id.'/images') == 0){
									mkdir('uploads/lib/'.$my_id.'/images');
								}
								
								
								$place = "uploads/lib/".$my_id."/images/" . $my_id.".".$title.".".$extension;
								
								move_uploaded_file($_FILES[$file]["tmp_name"], $place);
								mysql_query("INSERT INTO `xpoliem`.`$path` (`post_id` ,`user_id` ,`title`,`body`,`category_id`,`post_date`,`post_exp_date`,`post_extension`)VALUES('', '$my_id', '$title','$body','','now()','','$extension')");
								mysql_query("INSERT INTO `xpoliem`.`lib` (`post_id` ,`user_id` ,`title`,`category_id`,`post_date`,`post_exp_date`)VALUES('', '$my_id', '$title','','now()','')");
								mysql_query("UPDATE `xpoliem`.`$path` SET `post_exp_date`='1992-06-12 10:10:10' WHERE `user_id`='$my_id' AND `title`='$title'");
								mysql_query("UPDATE `xpoliem`.`lib` SET `post_extension`='$extension' WHERE `user_id`='$my_id' AND `title`='$title'");
								$created = mysql_fetch_assoc(mysql_query("SELECT `post_id`,`post_date` FROM `xpoliem`.`$path` WHERE `title` = '$title' AND `user_id` = '$my_id'"));
								$post_id = $created['post_id'];
								$timestamp = new DateTime($created['post_date']);
								$timestamp->modify('+1 year');
								$timestamp = $timestamp->format('Y-m-d H:i:s');
								mysql_query("UPDATE `xpoliem`.`$path` SET `post_exp_date`='$timestamp' WHERE `post_id`='$post_id'");
								mysql_query("UPDATE `xpoliem`.`lib` SET `post_exp_date`='$timestamp' WHERE `title` = '$title' AND `user_id` = '$my_id'");
							}
						}else{
							header('location: post_form.php?u_id='.$u_id.'&to=posts&MB=3');
						}
					}else{
						header('location: post_form.php?u_id='.$u_id.'&to=posts&fault_inp=recognised image');
					}
				}else{
					if($file_type == 'video'){
						if(test_vid($extension)){
							if (($_FILES[$file]["size"] < 30*MB)){
								if ($_FILES[$file]["error"] > 0){
										echo "Return Code: " . $_FILES[$file]["error"] . "<br />";
								}else{
									if (is_dir('uploads/lib/'.$my_id) == 0){
										mkdir('uploads/lib/'.$my_id);
									}
									if (is_dir('uploads/lib/'.$my_id.'/videos') == 0){
										mkdir('uploads/lib/'.$my_id.'/videos');
									}
									if (is_dir('uploads/lib/'.$my_id.'/videos/thumbs') == 0){
										mkdir('uploads/lib/'.$my_id.'/videos/thumbs');
									}
									
									$place = "uploads/lib/".$my_id."/videos/" . $my_id.".".$title.".".$extension;
									
										//ffmpeg						
										$ffmpeg = 'C:\\ffmpeg\\bin\\ffmpeg';
										$imageFile = 'uploads/lib/'.$my_id.'/videos/thumbs/'.$title.'.jpg';
										$size = '120x90';
										$getFromSecond = 5;
										$cmd = "$ffmpeg -i $temp -an -ss $getFromSecond -s $size $imageFile";
										shell_exec($cmd);
										//ffmpeg
									
									
								
									move_uploaded_file($_FILES[$file]["tmp_name"], $place);
									mysql_query("INSERT INTO `xpoliem`.`$path` (`post_id` ,`user_id` ,`title`,`body`,`category_id`,`post_date`,`post_exp_date`,`post_extension`)VALUES('', '$my_id', '$title','$body','','now()','','$extension')");
									mysql_query("INSERT INTO `xpoliem`.`lib` (`post_id` ,`user_id` ,`title`,`category_id`,`post_date`,`post_exp_date`)VALUES('', '$my_id', '$title','','now()','')");
									mysql_query("UPDATE `xpoliem`.`$path` SET `post_exp_date`='1992-06-12 10:10:10' WHERE `user_id`='$my_id' AND `title`='$title'");
									mysql_query("UPDATE `xpoliem`.`lib` SET `post_extension`='$extension' WHERE `user_id`='$my_id' AND `title`='$title'");
									$created = mysql_fetch_assoc(mysql_query("SELECT `post_id`,`post_date` FROM `xpoliem`.`$path` WHERE `title` = '$title' AND `user_id` = '$my_id'"));
									$post_id = $created['post_id'];
									$timestamp = new DateTime($created['post_date']);
									$timestamp->modify('+1 year');
									$timestamp = $timestamp->format('Y-m-d H:i:s');
									mysql_query("UPDATE `xpoliem`.`$path` SET `post_exp_date`='$timestamp' WHERE `post_id`='$post_id'");
									mysql_query("UPDATE `xpoliem`.`lib` SET `post_exp_date`='$timestamp' WHERE `title` = '$title' AND `user_id` = '$my_id'");
								}
							}else{
								header('location: post_form.php?u_id='.$u_id.'&to=posts&MB=30');
							}
						}else{header('location: post_form.php?u_id='.$u_id.'&to=posts&fault_inp=recognised video');}
					}
				}
			}else{ 
				if(!empty($body)){
					mysql_query("INSERT INTO `xpoliem`.`$path` (`post_id` ,`user_id` ,`title`,`body`,`category_id`,`post_date`,`post_exp_date`)VALUES('', '$my_id', '$title','$body','','now()','')");
					mysql_query("UPDATE `xpoliem`.`$path` SET `post_exp_date`='1992-06-12 10:10:10' WHERE `user_id`='$my_id' AND `title`='$title'");
					$created = mysql_fetch_assoc(mysql_query("SELECT `post_id`,`post_date` FROM `xpoliem`.`$path` WHERE `title` = '$title' AND `user_id` = '$my_id'"));
					$post_id = $created['post_id'];
					$timestamp = new DateTime($created['post_date']);
					$timestamp->modify('+1 year');
					$timestamp = $timestamp->format('Y-m-d H:i:s');
					mysql_query("UPDATE `xpoliem`.`$path` SET `post_exp_date`='$timestamp' WHERE `post_id`='$post_id'");
				}else{
					header('location: post_form.php?u_id='.$u_id.'&to=posts&none=true');die();
				}
			}
			header('location: post_form.php?u_id='.$u_id.'&to=posts');
		}else{
			header('location: post_form.php?u_id='.$u_id.'&to=posts&exists=true&name='.$title);
		}
	}else{
		header('location: post_form.php?u_id='.$u_id.'&to=posts&none=true');
	}
}

if($action == 'update_details'){
	$name = escape($_POST['name']);
	$path = escape($_GET['path']);
	$post = escape($_POST['body']);
	$file = 'file';
	
	if($path == 'details' AND !empty($name) AND !empty($u_id) AND test_same_user($u_id) == true){
		if(!empty($_FILES[$file]["name"])){
			$old_name = $_FILES[$file]["name"];
			$extension = get_file_extension($old_name);
			if(test_img($extension)== true){
				if (is_dir('uploads/details/'.$my_id) == 0){
					mkdir('uploads/details/'.$my_id);
				}
				define('MB', 1048576);
				if($_FILES[$file]["size"] < 3*MB){
					$old_ext = mysql_fetch_assoc(mysql_query("SELECT `pp_extension` FROM `xpoliem`.`users` WHERE `ID` = '$my_id'"));
					$old_ext = $old_ext['pp_extension'];
					if(!empty($old_ext)){
						$old_name = $my_id.'.'.$old_ext;
						unlink('uploads/details/'.$my_id.'/'.$old_name);
					}
					$place = "uploads/details/".$my_id."/".$my_id.".".$extension;
					move_uploaded_file($_FILES[$file]["tmp_name"], $place);
					mysql_query("UPDATE `xpoliem`.`users` SET `pp_extension` = '$extension' WHERE `ID` = '$my_id'");
				}else{
					header('location: details.php?what=my_info&wrong=3MB&u_id='.$my_id);die();//weerhou dat die naam geupdate word as die image gefail het
				}
			}else{
				header('location: details.php?what=my_info&wrong=ni&u_id='.$my_id);die();//weerhou dat die naam geupdate word as die image gefail het
			}
		}
		mysql_query("UPDATE `xpoliem`.`users` SET `display_name` = '$name', `personal_message` = '$post' WHERE `ID` = '$my_id'");
	}else{
	
	
	

		if($path == 'post'){
			if(!empty($post) AND !empty($name) AND !empty($u_id) AND test_same_user($u_id) == true){
				mysql_query("UPDATE `xpoliem`.`users` SET `Post` = '$post', `post_title` = '$name' WHERE `ID` = '$my_id'");
			}else{
				header('location: details.php?what=my_post&wrong=pe&u_id='.$my_id);die();//weerhou dat die naam geupdate word as die image gefail het
			}
		}
	}
	header('location: profile.php?u_id='.$u_id);
}

if($action == 'delete'){
	if (test_same_user($post_owner_id) == true){
		$post_title = escape($_GET['post_title']);
		$post_path = escape($_GET['post_path']);
		$path = escape($_GET['path']);
		delete($u_id,$post_title,$path,$post_path);
	}
}

if($action != 'upload' AND $action != 'post' AND $action != 'update_details'){
	header('location: profilev3.php?u_id='.$my_id);
}
?>