<?php
	function cleanUp($string) {
		$string = htmlspecialchars($string, ENT_IGNORE, 'utf-8');
		$string =  htmlentities($string, ENT_QUOTES, 'UTF-8');
		$string = strip_tags($string);
		$string = stripslashes($string);
		
		
		$string =  mysql_real_escape_string($string);
		return $string;
		
		
		

	}
?>