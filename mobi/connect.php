<?php

$connect = mysql_connect('localhost', 'root', '') OR die ('could not connect');

if($connect){
	mysql_select_db('xpoliem') OR die ('could not connect');
}else{
	echo ("Host Connecting Error");
}

?>