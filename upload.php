<?php 
header('Content-type: application/json');
include_once('core/init.php');
include_once('connect.php');
include_once('functions.php');
$uploaded = [];
$allowed = ['mp4' , 'png','jpg'];
$img = ['bmp','dds','gif','jpg','png','psd','pspimage','tga','thm','tif','tiff','yuv'];
$vid = ['ogv','3g2','3gp','asf','asx,','avi','flv','m4v','mov,','mp4','3gp','mpg','rm,','srt','swf','vob','wmv'];
$succeeded = [];
$images = [];
$videos = [];
$failed = [];
$my_id = escape($_SESSION['user_id']);




if(!empty($_FILES['file'])){

	
	

		foreach($_FILES['file']['name'] as $key => $name){
			if($_FILES['file']['error'][$key] === 0){
				$temp = $_FILES['file']['tmp_name'][$key];
				$ext = explode('.',$name);
				$ext = strtolower(end($ext));
				$rname = explode(".", $name, 2);
				$rname = $rname[0];
				
				
					$file = $temp .time(). '.' . $ext;
				
				if (post_exist($my_id, $rname, 'posts') == false){
				
				mysql_query("INSERT INTO `posts`(`post_id`, `user_id`, `title`, `body`, `category_id`, `post_date`, `post_exp_date`, `post_extension`) 
										VALUES (null,'$my_id','$rname','','','now()','','$ext')");
				mysql_query("INSERT INTO `xpoliem`.`lib` (`post_id` ,`user_id` ,`title`,`category_id`,`post_date`,`post_exp_date`)
							VALUES('', '$my_id', '$rname','','now()','')");
							
				mysql_query("UPDATE `xpoliem`.`posts` SET `post_exp_date`='1992-06-12 10:10:10' WHERE `user_id`='$my_id' AND `title`='$rname'");
				mysql_query("UPDATE `xpoliem`.`lib` SET `post_extension`='$ext' WHERE `user_id`='$my_id' AND `title`='$rname'");
				
				$created = mysql_fetch_assoc(mysql_query("SELECT `post_id`,`post_date` FROM `xpoliem`.`posts` WHERE `title` = '$rname' AND `user_id` = '$my_id'"));
				$post_id = $created['post_id'];
				$timestamp = new DateTime($created['post_date']);
				$timestamp->modify('+1 year');
				$timestamp = $timestamp->format('Y-m-d H:i:s');
				mysql_query("UPDATE `xpoliem`.`posts` SET `post_exp_date`='$timestamp' WHERE `post_id`='$post_id'");
				mysql_query("UPDATE `xpoliem`.`lib` SET `post_exp_date`='$timestamp' WHERE `title` = '$rname' AND `user_id` = '$my_id'");
				
				
				if (is_dir('uploads/lib/'.$my_id) == 0){
					mkdir('uploads/lib/'.$my_id);
				}
				if (is_dir('uploads/lib/'.$my_id.'/videos') == 0){
					mkdir('uploads/lib/'.$my_id.'/videos');
				}
				if (is_dir('uploads/lib/'.$my_id.'/images') == 0){
					mkdir('uploads/lib/'.$my_id.'/images');
				}
				if (is_dir('uploads/lib/'.$my_id.'/videos/thumbs') == 0){
					mkdir('uploads/lib/'.$my_id.'/videos/thumbs');
				}
		
				if(in_array($ext,$img) === true  ){
					if(move_uploaded_file($temp,'uploads/lib/'.escape($_SESSION['user_id']).'/images/'.escape($_SESSION['user_id']).'.'.$rname.'.'.$ext) === true){
						$images [] = array(
								'name' => $name,
								'file' => $file
							);
						
					
					}
				
					
					
					
					}else if (in_array($ext,$vid) === true){
						//ffmpeg
								
								$ffmpeg = 'C:\\ffmpeg\\bin\\ffmpeg';
								$imageFile = 'uploads/lib/'.escape($_SESSION['user_id']).'/videos/thumbs/'.escape($_SESSION['user_id']).'.'.$rname.'.jpg';
								$size = '120x90';
								$getFromSecond = 5;
								$cmd = "$ffmpeg -i $temp -an -ss $getFromSecond -s $size $imageFile";
								shell_exec($cmd);
						//ffmpeg
						
						if(move_uploaded_file($temp,'uploads/lib/'.escape($_SESSION['user_id']).'/videos/'.escape($_SESSION['user_id']).'.'.$rname.'.'.$ext) === true){
						$videos [] = array(
									'name' => $name,
									'file' => $file
								);
								
							/*[REDACTED]*/
												
												
												
												
												
							
							
						
						}
					
					
					}else{
						$failed [] = array(
							'name' => $name
						);
					}
					 
				
				
				}else{
					$failed [] = array(
							'name' => $name.' failed due to post exists'
						);
				}
			}
		}
	if(!empty($_POST['ajax'])){
			
	}
	echo json_encode(array(
		'images' => $images,
		'videos' => $videos,
		'failed' => $failed
	));
	
	}
	
	
	
	
	
	
	