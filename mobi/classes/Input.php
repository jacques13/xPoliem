<?php
class Input {
				public static function exists($type = 'post') {
					switch ($type) {
						case 'post':
							return (!empty($_POST)) ? true : false;
							break;
						case 'get':
							return (!empty($_GET)) ? true : false;
							break;
						default:
							return false;
							break;
					}
				}
		
				public static function get($item) {
					if (isset($_POST[$item])) {
						return $_POST[$item];
					} else if (isset($_GET[$item])) {
						return $_GET[$item];
					}
					return '';
				}
				
				public static function getIp($item) {
						if (!empty($_SERVER['HTTP_CLIENT_IP'])){
									 return  $item =$_SERVER['HTTP_CLIENT_IP'];
									   }else if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
										  return  $item =$_SERVER['HTTP_X_FORWARDED_FOR'];
										   }else{
											 return  $item =$_SERVER["REMOTE_ADDR"];
										   }
						
						
					
					
				}
}
?>