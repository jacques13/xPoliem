<?php

$connect = mysql_connect('50.62.209.74:3306', 'xpoliemteam', ' xPoliemteam1') OR die ('could not connect');

if($connect){
	mysql_select_db('xpoliem') OR die ('could not connect');
}else{
	echo ("Host Connecting Error");
}

?>