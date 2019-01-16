<?php
	require_once 'core/init.php';

	
?>
<!DOCTYPE html>
<html class="no-js">
    <head>
        
        <meta http-equiv="x-ua-compatible" content="IE=edge" />
        <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-touch-fullscreen" content="yes">
		<meta name="description" content="Pushy is an off-canvas navigation menu for your website.">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link href="css/ext - test.css" rel="stylesheet"/>
	
	


		
		  
    </head>
    <body style="background:#4AA0E4;">
	
<!-- Menu Button -->
       <div class="megamenu_wrapper megamenu_light_theme"><!-- BEGIN MENU WRAPPER copy en paste di hele ding-->
    <div class="megamenu_container megamenu_lightblue"><!-- BEGIN MENU CONTAINER -->
        <ul class="megamenu"><!-- BEGIN MENU -->
		<li><a href="Home.php" class="menuitem_drop menu-btn1">Home</a></li>
		<li><a href="austinseshit.php" class="menuitem_drop menu-btn1">CHAT (1 on 1)</a><!--Done-->
            <div class="dropdown_2columns">
                <div class="col_full"><h2>CHAT WITH A STANGER OR ADMIRERER</h2></div>
				<div class="col_full"><h4><p><strong>Our unique system matches you up with someone random But if u log in it matches the opposite sex</strong></p></h4></div>
                 <div class="col_half firstcolumn">
		            <a href="#"><h4>RANDOM-CAM</h4></a>
		         </div>
		         <div class="col_half ">
		            <a href="#"><h4>RANDOM-TEXT</h4></a>
		         </div>
				 <div class="col_half firstcolumn">
		            <a href="#"><h4>OPPOSITE-CAM</h4></a>
		         </div>
		         <div class="col_half ">
		            <a href="#"><h4>OPPOSITE-TEXT</h4></a>
		         </div>
		         
		         
            </div>
        </li><!-- chat 1 on  1 -->
        <li><a href="chatrooms.php" class="menuitem_drop menu-btn1">GROUP CHAT</a><!--Done-->
            <div class="dropdown_2columns">
                <div class="col_full"><h2>CHAT WITH A RANDOM GROUP or YOUR OWN GROUP</h2></div>
				<div class="col_full"><h4><p><strong>You can join a group or create a group</strong></p></h4></div>
                 <div class="col_one_half firstcolumn">
		           
		         </div>
				 <div class="col_one_half">
		            
					<a href="createroom.php"><h4>CREATE A GROUP CHAT</h4></a>
					<a href="chatrooms.php"><h4>JOIN A GROUP</h4></a>
					
					
					
		         </div>
            </div>
        </li><!-- group -->
		<li ><a href="videoHome.php" class="menuitem_drop menu-btn1">VIDEO'S</a><!--Done-->
		<div class="dropdown_2columns dropdown_right"><!-- Begin columns container -->
		 <div class="col_full firstcolumn">
		 <h2><a href="videoHome.php">VIDEOS</a></h2>
		</div>
		<div class="col_half firstcolumn">
		 <a href="videoHome.php?key=new"><h4>NEWEST</h4></a>
		</div>
		<div class="col_half ">
		 <a href="videoHome.php?key=views"><h4>MOST VIEWS</h4></a>
		</div>
		<div class="col_half firstcolumn">
		 <a href="videoHome.php?key=trending"><h4>TRENDING</h4></a>
		</div>
		<!--<div class="col_full firstcolumn">
		 <h2>Catgories</h2>
		</div>
		<div class="col_one_third firstcolumn">
		 <ul>
	     <li><a href="#"><h3>fatty <img class="thumb" src="thumbs/fatty.jpg"/></h3></a></li>
        <li><a href="#"><h3>teen <img class="thumb"  src="thumbs/teen.jpg"/></h3></a></li>
        <li><a href="#"><h3>college <img class="thumb"  src="thumbs/college.jpg"/></h3></a></li>
		<li><a href="#"><h3>blonde <img class="thumb"  src="thumbs/blonde.jpg"/></h3></a></li>
		</ul>
		</div>
		<div class="col_one_third ">
		 <ul>
		 <li><a href="#"><h3>amateur <img class="thumb" src="thumbs/amateur.jpg" /></h3></a></li>
        <li><a href="#"><h3>lingerie <img class="thumb"  src="thumbs/lingerie.jpg"/></h3></a></li>
		<li><a href="#"><h3>babe <img class="thumb" src="thumbs/babe.jpg"/></h3></a></li>
        <li><a href="#"><h3>asian <img class="thumb"  src="thumbs/asian.jpg"/></h3></a></li>
		
		</ul>
		</div>
		<div class="col_one_third ">
		 <ul>
		<li><a href="#"><h3>selfpic <img class="thumb"  src="thumbs/selfpic.jpg"/></h3></a></li>
        <li><a href="#"><h3>ebony <img class="thumb"  src="thumbs/ebony.jpg"/></h3></a></li>
        <li><a href="#"><h3>mature <img class="thumb"  src="thumbs/mature.jpg"/></h3></a></li>
		<li><a href="#"><h3>lesbian <img class="thumb"  src="thumbs/lesbian.jpg"/></h3></a></li>
		</ul>
		</div>-->
	
		<div class="col_half ">
		 <a href="videoList.php"><h4>MY VIDEOS</h4></a>
		</div>
		<div class="col_half firstcolumn">
		 <a href="videoList.php?key=admires"><h4>ADIMIRES</h4></a>
		</div>
		<div class="col_half">
		 <a href="#"><h4>SEARCH</h4></a>
		</div>
		</div>
		</li><!-- videos-->
		
		<!--<li><a href="#_" class="menuitem_drop menu-btn1">ALBUM'S</a>
		<div class="dropdown_3columns dropdown_right"><!-- Begin columns container
		 <div class="col_full firstcolumn">
		 <h2><a href="#">ALBUMS</a></h2>
		</div>
		<div class="col_one_third firstcolumn">
		 <a href="#"><h4>NEWEST</h4></a>
		</div>
		<div class="col_one_third ">
		 <a href="#"><h4>BEST RATED</h4></a>
		</div>
		<div class="col_one_third">
		 <a href="#"><h4>MOST VIEWED</h4></a>
		</div>
		<div class="col_full firstcolumn">
		 <h2>Catgories</h2>
		</div>
		<div class="col_one_third firstcolumn">
		 <ul>
	     <li><a href="#"><h3>fatty <img class="thumb" src="thumbs/fatty.jpg"/></h3></a></li>
        <li><a href="#"><h3>teen <img class="thumb"  src="thumbs/teen.jpg"/></h3></a></li>
        <li><a href="#"><h3>college <img class="thumb"  src="thumbs/college.jpg"/></h3></a></li>
		<li><a href="#"><h3>blonde <img class="thumb"  src="thumbs/blonde.jpg"/></h3></a></li>
		</ul>
		</div>
		<div class="col_one_third ">
		 <ul>
		 <li><a href="#"><h3>amateur <img class="thumb" src="thumbs/amateur.jpg" /></h3></a></li>
        <li><a href="#"><h3>lingerie <img class="thumb"  src="thumbs/lingerie.jpg"/></h3></a></li>
		<li><a href="#"><h3>babe <img class="thumb" src="thumbs/babe.jpg"/></h3></a></li>
        <li><a href="#"><h3>asian <img class="thumb"  src="thumbs/asian.jpg"/></h3></a></li>
		
		</ul>
		</div>
		<div class="col_one_third ">
		 <ul>
		<li><a href="#"><h3>selfpic <img class="thumb"  src="thumbs/selfpic.jpg"/></h3></a></li>
        <li><a href="#"><h3>ebony <img class="thumb"  src="thumbs/ebony.jpg"/></h3></a></li>
        <li><a href="#"><h3>mature <img class="thumb"  src="thumbs/mature.jpg"/></h3></a></li>
		<li><a href="#"><h3>lesbian <img class="thumb"  src="thumbs/lesbian.jpg"/></h3></a></li>
		</ul>
		</div>
		<div class="col_full firstcolumn">
		 <h2><a href="#">ADIMIRES</a></h2>
		</div>
		<div class="col_one_third firstcolumn">
		 <a href="#"><h4>ALBUMS</h4></a>
		</div>
		<div class="col_one_third ">
		 <a href="#"><h4>FAVOURITES</h4></a>
		</div>
		<div class="col_one_third">
		 <a href="#"><h4>SEARCH</h4></a>
		</div>
		</div>
		</li>albums-->
		<li style="margin-top: 0.55%;"><form name="search" action="search_results.php" method="post" enctype="multipart/form-data"><!--Done-->
				<a>Search: <input type="text" name="requirement"></a>
				<input type="hidden" name="place" value="users" readonly>
				<input type="hidden" name="specify" value="username" readonly>
				<a><input type="submit" value="Search"></a>
			</form></li>
		<li class="menuitem_right"><a href="#_" class="menuitem_drop menu-btn1">AUCTION</a><!--Done-->
            <div class="dropdown_2columns dropdown_right">
                <div class="col_full"><h2>Create a auction for your show</h2></div>
				<div class="col_full"><h2>You can Bid on a show</h2></div>
				<div class="col_full"><h2>COMING VERY SOON</h2></div>
                 
            </div>
        </li>
		<li class="menuitem_right"><a href="login.php" class="menuitem_drop menu-btn1">PROFILE</a><!--Done-->
				<div class="dropdown_1column dropdown_right">
			<div class="col_full firstcolumn">
			 <h3><a href="register.php">Register</a>/<a href="login.php">Login</a></h3>
			</div>
				</div>
		 </li> 
		
								
 

</div>
</div>
</body>
</html>
