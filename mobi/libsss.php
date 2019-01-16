<?php

require_once ('connect.php');
require_once ('functions.php');
require_once ('core/init.php');


$u_id = escape($_GET['u_id']);
$my_id = $_SESSION['user_id'];
$action = escape($_GET['action']);
$post_id = escape($_GET['post_id']);
$type = escape($_GET['type']);

if($action == 'view'){
	$views = mysql_fetch_assoc(mysql_query("SELECT `views` FROM `xpoliem`.`lib` WHERE `post_id` = '$post_id'"));
	$views=$views['views'];
	if ($views == NULL){$views = 0;}
	$views++;
	mysql_query("UPDATE `xpoliem`.`lib` SET `views`='$views' WHERE `post_id`='$post_id'");
}
if ($type==''){
$loc = 'profile.php?u_id='.$u_id;
	
		}
if ($type=='img'){
	
	$loc = 'image.php?u_id='.$u_id;
		}else{ if($type == 'vid'){
		$loc = 'videoViewer.php?post_id='.$post_id.'&u_id='.$u_id;
			}}
			
			RedirectTo($loc);
			
function RedirectTo($location = null) {
			if ($location) {
				if (is_numeric($location)) {
					switch ($location) {
						case '404':
							header('HTTP/1.0 404 Not Found');
							include 'includes/errors/404.php';
							exit();
						break;
					}
				}
				ob_start();
				header('Location:'.$location);
				ob_end_flush();
				exit();
			}
		}
?>