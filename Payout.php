<?php
	require_once ('connect.php');
	require_once ('functions.php');
	require_once ('core/init.php');
	if(isset($_GET['u_id']) && !empty($_GET['u_id'])){
		$u_id = $_GET['u_id'];
	}else{
		echo '<script>window.close();</script>';
	}
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
	$my_id_arr = getAllInfo($my_id);
	$u_id_arr = getAllInfo($u_id);
?>
<p>New window!!!!</p>
</body>
</html>