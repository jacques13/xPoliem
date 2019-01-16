<?php
	function escape($string) {
		$string =  htmlentities($string, ENT_QUOTES, 'UTF-8');
		$string =  mysql_real_escape_string($string);
		$string = stripslashes($string);
		$string = htmlspecialchars($string, ENT_IGNORE, 'utf-8');
		$string = strip_tags($string);

	}
?>