<?php

ob_start();


require_once ('connect.php');
require_once ('functions.php');
require_once ('nav.php');
require_once ('core/init.php');//sit op pages

@$name = escape($_GET['name']);
@$none = escape($_GET['none']);
@$exists = escape($_GET['exists']);
@$to = escape($_GET['to']);
@$fault_input = escape($_GET['fault_inp']);
$mb = 0;
@$mb = escape($_GET['MB']);
if($mb == 3 || $mb == 30){
	$state = 'less';
}
$lib_or_posts = 0;
$u_id = escape($_GET['u_id']);

if (test_same_user($u_id) == true){
	if($to == 'lib'){
		$lib_or_posts = 'lib';
	}else{
	if($to == 'posts'){
		$lib_or_posts = 'posts';
	}else{ die('recource incorrect');}}
	}else{header('location: profile.php');}

if ($lib_or_posts == 'lib' || $lib_or_posts == 'posts'){
if ($lib_or_posts == 'lib' ){

header('location: profile.php');



/*[REDACTED]*/




}else{
if ($lib_or_posts == 'posts' ){?>
<html>
<body>
<link rel="stylesheet" href="css/global.css"/>
<?php 	if(!empty ($none)){ echo '<h1>A title and content must be provided</h1>';} 
		if(!empty ($exists)){ echo '<h1>PREVIOUS FILE, ('.$name.') ALREADY EXISTS.</h1>';}
		if(!empty ($mb)){ echo '<h1>File must be '.$state.' then '.$mb.'MB</h1>';}
		if(!empty ($fault_input)){ echo '<h1>Not a '.$fault_input.'</h1>';}
?>
<form style="text-align:center;"class= "upload" action=<?php echo "actions.php?action=post&path=posts&u_id=".$u_id ?> method="post" enctype="multipart/form-data" name="form">
<label for="Name">Title:</label>
<input type="text" maxlength="32" name="title" onkeyup="textCounter(this,'counter',32);" id="new_name"/>
<label for="count"> Characters remaining:</label>
<input maxlength="7" size="3" value="32" id="counter" disabled />
<br />
<label for="body">Body:</label><br/>
<textarea name="body" rows="10" maxlength="6500 characters" onkeyup="textCounter2(this,'counter2',6500) ;" style="overflow:scroll;"></textarea>
<br />
<label for="count"> Characters remaining:</label>
<input maxlength="7" size="3" value="6500" id="counter2" disabled />
<br />
<br />
<input type="file" name="file" id="get_new_name" />
<br />
<input type="radio" name="file_type"
value="img" checked="checked">image max 3MB
<input type="radio" name="file_type"
value="video">video max 30MB
<br/>
<input type="submit" name="submit" id="submit" value="Submit" />
<br/>
expires in 1 year



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
var xmlhttp = new XMLHttpRequest(),uploaded;
xmlhttp.upload.addEventListener('progress',function(event){
			var percent;
			
			if(event.lengthComputable === true){
			
				percent = Math.round((event.loaded / event.total)*100);
				
				setProgress(percent);
				if(percent == 100){
				alert('uploaded');
				}
			}
		});
</script>

</body>
</html>

<?php
}}}else{header('location: profile.php?u_id='.$u_id);}
ob_end_flush();

?>