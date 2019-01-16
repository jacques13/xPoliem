<?php
	class Math {
		public static function percentageViews($number) {
		$views = "1000";
		$number= ($number/$views)*100;
		return $number;
			
		}
		public static function percentageUps($number) {
		$ups = "200";
		$number= ($number/$ups)*100;
		return $number;
			
		}
		public static function distance($number) {
		$theta = $lon1 - $lon2; 
		$dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta)); 
		$dist = acos($dist); 
		$dist = rad2deg($dist); 
		$miles = $dist * 60 * 1.1515;
		$unit = strtoupper($unit);
		if($unit == "K")
				{
					return ($miles * 1.609344); 
				}
				elseif($unit == "N") {
					return ($miles * 0.8684);
				}
				else
				{
					return $miles;
				}
				/*echo distance(32.9697, -96.80322, 29.46786, -98.53506, "m") . " miles<br>";
					echo distance(32.9697, -96.80322, 29.46786, -98.53506, "k") . " kilometers<br>";
						echo distance(32.9697, -96.80322, 29.46786, -98.53506, "n") . " nautical miles<br>";*/
 
			
		}
		public static function plus($number,$number1) {
		$number = $number+$number1;
		return $number;
			
		}
		public static function price($views) {
		$buyers_this_month = 1; //dit is di total buyers - buyers last month
		$views_prev_month = 1000; //einde van elke maand total views vir 1 specifieke ding 
		$views_this_month = $views-$views_prev_month;
		$price = (($buyers_this_month/$views_this_month)*20)/100;
		return $price;
			
		}
		

		
	}
?>