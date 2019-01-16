<?php
	require_once ('connect.php');
	require_once ('functions.php');
	require_once ('core/init.php');
	$user_ip = getenv('REMOTE_ADDR');
$geo = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$user_ip"));
$city = $geo["geoplugin_city"];
$latitude = $geo["geoplugin_latitude"];
$longitude = $geo["geoplugin_longitude"];
$country = $geo["geoplugin_countryName"];
mysql_query("INSERT INTO `users`( `countryName`, `cityName`, `latitude`, `longitude`) 
						VALUES ('$country','$city','$latitude','$longitude')");

/*
geoplugin_request
geoplugin_status
geoplugin_credit
geoplugin_city
geoplugin_region
geoplugin_areaCode
geoplugin_dmaCode
geoplugin_countryCode
geoplugin_countryName
geoplugin_continentCode
geoplugin_latitude
geoplugin_longitude
geoplugin_regionCode
geoplugin_regionName
geoplugin_currencyCode
geoplugin_currencySymbol
geoplugin_currencySymbol_UTF8
geoplugin_currencyConverter
*/



?>
