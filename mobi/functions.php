<?php
require_once 'index.php';

$my_id = $_SESSION['user_id'];

function find_Messages($u_id){
	$my_id = $_SESSION['user_id'];
	$query = "SELECT `id` FROM `xpoliem`.`chat` WHERE `userid_2` = '$u_id'";
	$query_run = mysql_query($query);
	$fol_ids=array();
	
	while ($columns = mysql_fetch_assoc($query_run)){
		$fol_ids[] = $columns['id'];
	}
	
	
	$followers_nr = 0;
	foreach ($fol_ids as $id_fol) {
		$followers_nr++;
	}
	$_SESSION['followers_nr'] = $followers_nr;
	return $fol_ids;
}

function find_all_followers($u_id){
	$my_id = $_SESSION['user_id'];
	$query = "SELECT `id` FROM `xpoliem`.`follow` WHERE `user_two` = '$u_id'";
	$query_run = mysql_query($query);
	$fol_ids=array();
	
	while ($columns = mysql_fetch_assoc($query_run)){
		$fol_ids[] = $columns['id'];
	}
	
	
	$followers_nr = 0;
	foreach ($fol_ids as $id_fol) {
		$followers_nr++;
	}
	$_SESSION['followers_nr'] = $followers_nr;
	return $fol_ids;
}

function find_all_vid_and_user(){
	$user = array();
	$vid = array();
	$nvid = mysql_query("SELECT `title` FROM `xpoliem`.`lib` WHERE `post_extension` = 'ogv'");
	while ($columns = mysql_fetch_assoc($nvid)){
		$vid[] = $columns['title'];
	}

	
	$nuser = mysql_query("SELECT `user_id` FROM `xpoliem`.`lib` WHERE `post_extension` = 'ogv'");
	while ($columns = mysql_fetch_assoc($nuser)){
		$user[] = $columns['user_id'];
	}

	$vid_and_user = array("vid" => $vid, "id" => $user);
	
	return $vid_and_user;
}


function find_all_user_ext(){
	$user = array();
	$ext = array();
	$next = mysql_query("SELECT `pp_extension` FROM `xpoliem`.`users`");
	while ($columns = mysql_fetch_assoc($next)){
		$ext[] = $columns['pp_extension'];
	}
	
	$nuser = mysql_query("SELECT `username` FROM `xpoliem`.`users`");
	while ($columns = mysql_fetch_assoc($nuser)){
		$user[] = $columns['username'];
	}

	$user_ext = array("ext" => $ext, "user" => $user);
	
	return $user_ext;
}


function find_favourites($u_id){
	$my_id = $_SESSION['user_id'];
	$query = "SELECT `id` FROM `xpoliem`.`follow` WHERE `user_one` = '$u_id'";
	$query_run = mysql_query($query);
	$fav_ids=array();
	
	while ($columns = mysql_fetch_assoc($query_run)){
		$fav_ids[] = $columns['id'];
	}
	
	$favourites_nr = 0;
	foreach ($fav_ids as $id_fav) {
		$favourites_nr++;
	}
	$_SESSION['$favourites_nr'] = $favourites_nr;
	return $fav_ids;
}


function test_same_user($u_id){
	if($u_id == $_SESSION['user_id']){
		return true;
	
	}else{
		return false;
								
	}
}

function find_posts_titles($u_id, $path){
	$query = "SELECT `title` FROM `xpoliem`.`$path` WHERE `user_id` = '$u_id' ORDER BY `post_id` DESC";
	$query_run = mysql_query($query);
	$post_titles=array();
	
	while ($columns = mysql_fetch_assoc($query_run)){
		$post_titles[] = $columns['title'];
		
	}
	
	return $post_titles;
}

function find_posts_ext($u_id, $path, $title){
	$query = "SELECT `post_extension` FROM `xpoliem`.`$path` WHERE `user_id` = '$u_id' AND `title` = '$title'";
	$query_run = mysql_query($query);
	$post_ext=array();
	
	$columns = mysql_fetch_assoc($query_run);
	$post_ext[] = $columns['post_extension'];
	return $post_ext;
}



function post_owner($u_id){
	$name = mysql_fetch_assoc(mysql_query("SELECT `username` FROM `xpoliem`.`users` WHERE `ID` = '$u_id'"));
	return $name;
}

function find_views($u_id,$title){
	$views = mysql_fetch_assoc(mysql_query("SELECT `views` FROM `xpoliem`.`lib` WHERE `user_id` = '$u_id' AND `title` = '$title'"));
	return $views;
}

function get_file_extension($file_name) {
	$arr = explode(".", $file_name);
	return end($arr);
}

function get_file_owner_id($file_name) {
	$arr = explode(".", $file_name, 2);
	return $first = $arr[0];
}



function post_exist($my_id, $new_name, $path){
	$empty = mysql_fetch_assoc(mysql_query("SELECT `post_id` FROM `xpoliem`.`$path` WHERE `title` = '$new_name' AND `user_id` = '$my_id'"));
	$exsist = $empty['post_id'];
	if (!empty($exsist) ){
		return true;
	}else{
		return false;
	}
}

function find_post_body($u_id, $post_title){
	$query = "SELECT `body` FROM `xpoliem`.`posts` WHERE `user_id` = '$u_id' AND `title` = '$post_title'";
	$query_run = mysql_query($query);
	$post_bod=array();
	
	$columns = mysql_fetch_assoc($query_run);
	$post_bod[] = $columns['body'];
	return $post_bod;
}
function test_img($fileExtension){
	$ignore_img = array('bmp','dds','gif','jpg','png','psd','pspimage','tga','thm','tif','tiff','yuv');
	if(in_array($fileExtension,$ignore_img)){ 
	return true ;
	}else{
	return false;
	}
}
function test_vid($fileExtension){
	$ignore_vid = array('ogv','3g2','3gp','asf','asx,','avi','flv','m4v','mov,','mp4','3gp','mpg','rm,','srt','swf','vob','wmv');
	if(in_array($fileExtension,$ignore_vid)){
return true ;
	}else{
return false;
}
}

function delete($u_id,$post_title,$path,$post_path){
	if(test_same_user($u_id) == true){
		$my_id = $_SESSION['user_id'];
		if($path == 'lib/img'){
		$path = 'uploads/lib/'.$u_id.'/images/';
		$way = 'lib';
		$path = $path.$post_path;
		unlink($path);
		}
		if($path == 'lib/vid'){
		$path = 'uploads/lib/'.$u_id.'/videos/';
		$way = 'lib';
		$path = $path.$post_path;
		unlink($path);
		}
		if($path == 'posts'){
		$way = 'posts';
		}
		mysql_query("DELETE FROM `xpoliem`.`$way` WHERE `title` = '$post_title' AND `user_id`='$my_id'" );
	}
}

function get_upp($u_id){
	$ext = mysql_fetch_assoc(mysql_query("SELECT `pp_extension` FROM `xpoliem`.`users` WHERE `ID` = '$u_id'"));
	$name = NULL;
	if(!empty($ext['pp_extension'])){
		$name = $u_id.'.'.$ext['pp_extension'];
	}
	return $name;
}

function get_post($u_id){
	$post = mysql_fetch_assoc(mysql_query("SELECT `personal_message` FROM `xpoliem`.`users` WHERE `ID` = '$u_id'"));
	$msg = $post['personal_message'];
	return $msg;
}


function get_dsp($u_id){
	$post = mysql_fetch_assoc(mysql_query("SELECT `display_name` FROM `xpoliem`.`users` WHERE `ID` = '$u_id'"));
	if(empty($post['display_name'])){
		$repl = mysql_fetch_assoc(mysql_query("SELECT `username` FROM `xpoliem`.`users` WHERE `ID` = '$u_id'"));
		$post['display_name']=$repl['username'];
	}
	$msg = $post['display_name'];
	$nr = 0;
	while (isset($msg{$nr/2})) {
		$data[$nr] = $msg{$nr/2};
		$nr++;
		$data[$nr] = '&shy';
		$nr++;
	}
	$msg = implode($data);
	return $msg;
}

function get_uname($u_id){
	$post = mysql_fetch_assoc(mysql_query("SELECT `username` FROM `xpoliem`.`users` WHERE `ID` = '$u_id'"));
	
	$msg = $post['username'];
	$nr = 0;
	while (isset($msg{$nr/2})) {
		$data[$nr] = $msg{$nr/2};
		$nr++;
		$data[$nr] = '&shy';
		$nr++;
	}
	$msg = implode($data);
	return $msg;
}

function get_gender($u_id){
	$post = mysql_fetch_assoc(mysql_query("SELECT `gender` FROM `xpoliem`.`users` WHERE `ID` = '$u_id'"));
	$msg = $post['gender'];
	return $msg;
}

function Need_pp($u_id){
	$pic_name = get_upp($u_id); 
	if(!empty($pic_name)){
		return 'uploads/details/'.$u_id.'/'.$pic_name;
	}else{
		return 'dataimages/no_picture.png';
	}
}


function test_expire($u_id){
	$query = mysql_query("SELECT `post_id`,`post_exp_date` FROM `xpoliem`.`lib` WHERE `user_id` = '$u_id'");
	while ($arr = mysql_fetch_assoc($query)){
		if(date("Y-m-d H:i:s") > $arr['post_exp_date']){
			$post_id = $arr['post_id'];
			$name = mysql_fetch_assoc(mysql_query("SELECT `title`,`post_extension` FROM `xpoliem`.`lib` WHERE `post_id` = '$post_id'"));
			mysql_query("DELETE FROM `xpoliem`.`lib` WHERE `post_id` = '$post_id'" );
			$post2_id = mysql_fetch_assoc(mysql_query("SELECT `post_id` FROM `xpoliem`.`posts` WHERE `title` = '$name[title]' AND `user_id` = '$u_id'"));
			mysql_query("DELETE FROM `xpoliem`.`posts` WHERE `post_id` = '$post2_id[post_id]'" );
			if(test_img($name['post_extension']) == true){
				$place = 'images';
			}
			if(test_vid($name['post_extension']) == true){
				$place = 'videos';
			}
			$my_id = $_SESSION['user_id'];
			$dir = 'uploads/lib/3/'.$place.'/'.$my_id.'.'.$name['title'].'.'.$name['post_extension'];
			unlink($dir);
		}
	}
}

function get_stuff($u_id){
	$post = mysql_fetch_assoc(mysql_query("SELECT `Post`,`post_title` FROM `xpoliem`.`users` WHERE `ID` = '$u_id'"));
	return $post;
}

function total_views($u_id){
	$query = mysql_query("SELECT `views` FROM `xpoliem`.`lib` WHERE `user_id` = '$u_id'");
	$v = 0;
	
	while ($views = mysql_fetch_assoc($query)){
		$v = $views['views'] + $v;
	}
	return $v;
}

function total_ups($u_id){
	$ups = mysql_fetch_assoc(mysql_query("SELECT `up` FROM `xpoliem`.`users` WHERE `ID` = '$u_id'"));
	$downs = mysql_fetch_assoc(mysql_query("SELECT `down` FROM `xpoliem`.`users` WHERE `ID` = '$u_id'"));
	$complete = $ups['up'] - $downs['down'];
	return $complete;
}

function ip($u_id){
	$ups = mysql_fetch_assoc(mysql_query("SELECT ip_address
FROM  `users` 
WHERE id =".$u_id."
LIMIT 0 , 30"));
	
	return $complete = $ups['ip_address'];
}

function drink_dets($my_id){
	$query_u_id = mysql_query("SELECT `u_id` FROM `xpoliem`.`drink` WHERE `my_id` = '$my_id'");
	$u_ids = array();
	while ($arr_u_id = mysql_fetch_assoc($query_u_id)){
		if (!in_array($arr_u_id['u_id'],$u_ids)){
			$u_ids[] = $arr_u_id['u_id'];
		}
	}
	$new_array = array();
	foreach($u_ids as $u_id){
		$name = mysql_fetch_assoc(mysql_query("SELECT `username` FROM `xpoliem`.`users` WHERE `ID` = '$u_id'"));
		$query_r = mysql_query("SELECT `drink` FROM `xpoliem`.`drink` WHERE `my_id` = '$my_id' AND `u_id` = '$u_id'");
		while ($query_drink = mysql_fetch_assoc($query_r)){
			$drinks[$name['username']][] = $query_drink['drink'];
		}
    }
	return $drinks;
}

function findchats($id){
	$ids = mysql_fetch_assoc(mysql_query("SELECT `user_2` FROM `xpoliem`.`video_rooms` WHERE `user_1` = '$id'"));
	foreach ($ids as $id){
		$post_owner = post_owner($id);
	}
	return $post_owner;
}

function find_room($chat, $my_id){
	$id = mysql_fetch_assoc(mysql_query("SELECT `ID` FROM `xpoliem`.`users` WHERE `username` = '$chat' "));
	$room = mysql_fetch_assoc(mysql_query("SELECT `room` FROM `xpoliem`.`video_rooms` WHERE `user_1` = '$my_id' and `user_2` = '$id[ID]' "));
	return $room['room'];
}

function findtextchats($id){
	$ids = mysql_fetch_assoc(mysql_query("SELECT `userid_2` FROM `xpoliem`.`chat` WHERE `userid_1` = '$id'"));
	foreach ($ids as $id){
		$post_owner = post_owner($id);
	}
	return $post_owner;
}

function find_id($chat){
	$id = mysql_fetch_assoc(mysql_query("SELECT `ID` FROM `xpoliem`.`users` WHERE `username` = '$chat' "));
	return $id;
}

function get_fullname_from_postid($post_id){
	$list = mysql_fetch_assoc(mysql_query("SELECT `user_id`,`title`,`post_extension` FROM `xpoliem`.`lib` WHERE `post_id` = '$post_id' "));
	$name = $list['user_id'].'.'.$list['title'].'.'.$list['post_extension'];
	return $name;
}

function get_post_ids($title, $u_id){
	$list = mysql_fetch_assoc(mysql_query("SELECT `post_id` FROM `xpoliem`.`lib` WHERE `title`='$title' AND `user_id` = '$u_id' "));
	return $list['post_id'];
}

function find_vid_titles($u_id, $path){
	$query = "SELECT `title` FROM `xpoliem`.`$path` WHERE `user_id` = '$u_id' AND `post_extension` = 'ogv' ";
	$query_run = mysql_query($query);
	$post_titles=array();
	
	while ($columns = mysql_fetch_assoc($query_run)){
		$post_titles[] = $columns['title'];
		
	}
	
	return $post_titles;
}

function get_id_frm_field_users($specific,$field){
	$return = mysql_fetch_assoc(mysql_query("SELECT `ID` FROM `xpoliem`.`users` WHERE `$field`='$specific'"));
	return $return['ID'];
}

function search_and_oganise($table,$coloumb,$requirement){
	$arr = array("first", "second", "third", "last");
	$arr['first'] = "SELECT `$coloumb` FROM `xpoliem`.`$table` WHERE `$coloumb` LIKE '$requirement'; ";
	$arr['second'] = "SELECT `$coloumb` FROM `xpoliem`.`$table` WHERE `$coloumb` LIKE '$requirement%'; ";
	$arr['third'] = "SELECT `$coloumb` FROM `xpoliem`.`$table` WHERE `$coloumb` LIKE '%$requirement'; ";
	$arr['last'] = "SELECT `$coloumb` FROM `xpoliem`.`$table` WHERE `$coloumb` LIKE '%$requirement%'; ";
	
	$result = array();
	foreach($arr as $query){
		if($holder=mysql_query($query)){
			while ($res = mysql_fetch_assoc($holder)){
				if(!in_array($res['username'], $result)){
					$result[] = $res['username'];
				}
			}
		}
	}
	
	return $result;
}
function unique($id1,$id2){
$name1 = getUsername($id1);
$name2 = getUsername($id2);
if($id1 < $id2){
	
	return $unique = $name1.$name2;
}else{
	return $unique = $name2.$name1;
	

}
 

}
function getUsername($id){
	$sql = mysql_query("SELECT `username` FROM `users` WHERE id = $id");
	
 	$row = mysql_fetch_array($sql);   
	return $name = $row["username"];
}

function getAllInfo($id){
	$sql = mysql_query("SELECT * FROM `users` WHERE `id` = $id");
	
 	$row = mysql_fetch_array($sql);   
	return $row;
}
?>