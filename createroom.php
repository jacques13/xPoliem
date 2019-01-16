<?php
	require_once 'core/init.php';
	require_once ('connect.php');
	
	require_once 'functions.php';
//INSERT INTO  `xpoliem`.`chat_rooms` (`id` ,`name` ,`numofuser` ,`file`)VALUES (NULL ,  'dirty shit',  '10',  'dirty_shit');


if (Token::check(Input::get('token')))
{	
	if (isset($_POST['name'])&& isset($_POST['number']))
	{	
		
		$name = escape($_POST['name']);	
		$number = escape($_POST['number']);	
		$file = $name.'.txt';
		$dir = 'room/';
		//$fileOpen = fopen($file,'x+');
		$query_r = "INSERT INTO `xpoliem`.`chat_rooms`(`id`, `name`, `numofuser`, `file`) VALUES (null,'$name','$number','$file')";
		mysql_query($query_r);
		
	
	}else{
	$mesg ="please fill in all fields";
	}

}
?>
			<style>
            	.centerA{text-align:center}
			</style>
			<link rel="stylesheet" href="css/global.css"/>
			<?php require_once 'nav-test.php';?>
<form action="" method="post" class="centerA upload" >
<h1><?php $mesg?></h1>
<fieldset>
        	<legend>Create a chat room</legend>
	
		
		<input type="text" name="name" id="name" value="" placeholder="Name of group"autocomplete="off"/>
	
	
		
		<input type="text" name="number" id="number" value="" placeholder="Number of users" autocomplete="off"/>
	
	
	<input type="hidden" name="token" value="<?php echo Token::generate(); ?>"/>
	<input type="submit" value="Make" style=""/>
	</fieldset>
</form>