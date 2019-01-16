<?php
	class Encryption {
		public static function set($string) {
		$key_value = "ajz";
			$encrypted_text = mcrypt_ecb(MCRYPT_DES, $key_value, $string, MCRYPT_ENCRYPT); 
				return $encrypted_text;
		}
		public static function get($string) {
		$key_value = "ajz";
			$decrypted_text = mcrypt_ecb(MCRYPT_DES, $key_value, $string, MCRYPT_DECRYPT); 
				return $decrypted_text;
		}
	}
?>