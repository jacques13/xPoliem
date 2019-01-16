<?php

require_once ('connect.php');
require_once ('functions.php');
require_once ('core/init.php');

$u_id = escape($_GET['u_id']);
$my_id = escape($_SESSION['user_id']);
$action = escape($_GET['what']);
$pp_or_dets = 0;
@$wrong = escape($_GET['wrong']);

if(test_same_user($u_id)== true){
	if($action == 'my_info'){
		$pp_or_dets = 'dets';
	}
	if($action == 'my_post'){
		$pp_or_dets = 'pp';
	}

	if ($pp_or_dets == 'dets' || $pp_or_dets == 'pp'){
		if ($pp_or_dets == 'dets' ){
			
			
			
		
			
			?>
			<html>
			<body  onload="textCounter(new_name,'counter',30) ; textCounter2(message,'counter2',200) ;" >
			<?php if($wrong == 'ni'){echo"<h1>Not a recognised image</h1>";}
			if($wrong == '3MB'){echo"<h1>Image must be less then 3MB</h1>";}?>
			<form action=<?php echo "actions.php?action=update_details&path=details&u_id=".$u_id ?> method="post" enctype="multipart/form-data" name="my_dets">
			<label for="rename">Display name:</label>
			<input type="text" maxlength="30" name="name" onkeyup="textCounter(this,'counter',30);" id="new_name" value="<?php $old_name = mysql_fetch_assoc(mysql_query("SELECT `display_name` FROM `xpoliem`.`users` WHERE `ID` = '$my_id'")); echo $old_name['display_name'];?>"/>
			<label for="count"> Characters remaining:</label>
			<input maxlength="7" size="3" value="30" id="counter" disabled />
			<br />
			<label for="body">personal message:</label><br/>
			<textarea name="body" rows="10" id="message" maxlength="200 characters" onkeyup="textCounter2(this,'counter2',200) ;" style="overflow:scroll;"><?php $old_body = mysql_fetch_assoc(mysql_query("SELECT `personal_message` FROM `xpoliem`.`users` WHERE `ID` = '$my_id'")); echo $old_body['personal_message'];?></textarea>
			<br />
			<label for="count"> Characters remaining:</label>
			<input maxlength="7" size="3" value="200" id="counter2" disabled />
			<br />
			<br />
			<label for="ppic"> Porfile picture:</label>
			<input type="file" name="file" id="picture" />
			<br/>
			<input type="submit" name="submit" id="submit" value="Submit" />
			</form>
			<br />
			<?php echo "<a class = 'back-link' href='profile.php?u_id=$u_id'>Back</a>" ?>
			<script>
			function textCounter2(field,field2,maxlimit)
			{
			 var countfield = document.getElementById(field2);
			 if ( field.value.length > maxlimit ) {
			  field.value = field.value.substring( 0, maxlimit );
			  return false;
			 } else {
			  countfield.value = maxlimit - field.value.length;
			 }
			}
			function textCounter(field,field2,maxlimit)
			{
			 var countfield = document.getElementById(field2);
			 if ( field.value.length > maxlimit ) {
			  field.value = field.value.substring( 0, maxlimit );
			  return false;
			 } else {
			  countfield.value = maxlimit - field.value.length;
			 }
			}
			</script>
			</body>
			</html>
			<?php				
				
				
				
				
				
				
			}else{
				if ($pp_or_dets == 'pp' ){
				
				
				
				
				
			?>
			<html>
			<body  onload="textCounter(new_name,'counter',64) ; textCounter2(message,'counter2',200) ;" >
			<?php if($wrong == 'pe'){echo'<h1>Must have a title and body</h1>';}?>
			<form action=<?php echo "actions.php?action=update_details&path=post&u_id=".$u_id ?> method="post" enctype="multipart/form-data" name="my_dets">
			<h2>Write us a summary about you. Or just post a status.</h2>
			<label for="rename">Summary title:</label>
			<input type="text" maxlength="64" name="name" onkeyup="textCounter(this,'counter',64);" id="new_name" value="<?php $old_name = mysql_fetch_assoc(mysql_query("SELECT `display_name` FROM `xpoliem`.`users` WHERE `ID` = '$my_id'")); echo $old_name['display_name'];?>"/>
			<label for="count"> Characters remaining:</label>
			<input maxlength="7" size="3" value="64" id="counter" disabled />
			<br />
			<label for="body">personal message:</label><br/>
			<textarea name="body" rows="10" id="message" maxlength="200 characters" onkeyup="textCounter2(this,'counter2',200) ;" style="overflow:scroll;"><?php $old_body = mysql_fetch_assoc(mysql_query("SELECT `personal_message` FROM `xpoliem`.`users` WHERE `ID` = '$my_id'")); echo $old_body['personal_message'];?></textarea>
			<br />
			<label for="count"> Characters remaining:</label>
			<input maxlength="7" size="3" value="200" id="counter2" disabled />
			<br />
			<br />
			<input type="submit" name="submit" id="submit" value="Submit" />
			</form>
			<br />
			<?php echo "<a class = 'back-link' href='profile.php?u_id=$u_id'>Back</a>" ?>
			<script>
			function textCounter2(field,field2,maxlimit)
			{
			 var countfield = document.getElementById(field2);
			 if ( field.value.length > maxlimit ) {
			  field.value = field.value.substring( 0, maxlimit );
			  return false;
			 } else {
			  countfield.value = maxlimit - field.value.length;
			 }
			}
			function textCounter(field,field2,maxlimit)
			{
			 var countfield = document.getElementById(field2);
			 if ( field.value.length > maxlimit ) {
			  field.value = field.value.substring( 0, maxlimit );
			  return false;
			 } else {
			  countfield.value = maxlimit - field.value.length;
			 }
			}
			</script>
			</body>
			</html>
			<?php
			
			
			
			
			
				
			}
		}
	}else{header('location: profile.php?u_id='.$u_id);}


}else{header('location: profile.php');}
?>