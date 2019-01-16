<?php 
require_once ('connect.php');
require_once ('functions.php');
require_once ('core/init.php');
if ($_SESSION['user_id']) 
{
$my_id = $_SESSION['user_id'];
mysql_query("UPDATE `users` SET `lastLoggedIn` = NOW() WHERE ID = $my_id
") or die(mysql_error());
}

?>