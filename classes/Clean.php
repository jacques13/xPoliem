<?php
	class Clean {
		public static function safe($string) {
		$key_value = "ajz";
			$encrypted_text = mcrypt_ecb(MCRYPT_DES, $key_value, $string, MCRYPT_ENCRYPT); 
				return $encrypted_text;
		}
		
	}
?>