<?php
require_once ('connect.php');

function DrinkPrice($u_id,$price){
	$useremail = getAllInfo($u_id);
	$useremail = $useremail['email'];
	$price_Company = $price*0.18;
	$price_user = $price - $price_Company;
	$prices = array($price_user,$price_Company,$useremail);
	return $prices;
}

function VidPrice($post_id){
	$vid_owner_dets = mysql_fetch_assoc(mysql_query("SELECT `user_id`,`Title` FROM `xpoliem`.`lib` WHERE `post_id` = '$post_id' "));
	$vid_owner_id = $vid_owner_dets['user_id'];
	$views = getvidviews($post_id);
	$views = $views['views'];
	$useremail = getAllInfo($vid_owner_id);
	$useremail = $useremail['email'];
	$vidname = $vid_owner_dets['Title'];
	$price = 0;
	if(($views >= 1000) AND ($views <= 10000)){
		$price = floor($views/1000);
	}else if($views > 10000){
		$price = floor(($views - 10000)/2000 + 10);
	}
	
	$ups = total_ups($vid_owner_id);
	$TotViewsOwner = total_views($vid_owner_id);
	
	$price_Company = ($price*0.18);
	
	if(($ups >= 2000) OR ($TotViewsOwner >= 30000)){
		$price_Company = ($price*0.1);
	}else if(($ups >= 100) OR ($TotViewsOwner >= 2000)){
		$price_Company = ($price*0.16);
	}
	
	$price_user = $price - $price_Company;
	$prices = array($price_user,$price_Company,$useremail,$vidname);
	return $prices;
}

function getvidviews($id){
	$sql = mysql_query("SELECT `views` FROM `xpoliem`.`lib` WHERE `post_id` = $id");
	
 	$row = mysql_fetch_assoc($sql);   
	return $row;
}

/*function total_views($u_id){
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
	$complete = $ups['up'] + $downs['down'];
	return $complete;
}*/

/*function getAllInfo($id){
	$sql = mysql_query("SELECT * FROM `users` WHERE `id` = $id");
	
 	$row = mysql_fetch_array($sql);   
	return $row;
}*/
?>