<?php
require_once ('connect.php');
	require_once ('functions.php');
	require_once ('core/init.php');
	
	
	if(isset($_GET['u_id']) && !empty($_GET['u_id'])){
		$u_id = $_GET['u_id'];
	}else{
		$u_id = $_SESSION['user_id'];
	}
	$favourites = find_favourites($u_id); 
	$followers = find_all_followers($u_id);
	$lib_posts_titles = find_posts_titles($u_id, 'lib');
	$post_posts_titles = find_posts_titles($u_id, 'posts');
	$IP = ip($_SESSION['user_id']);
	$totalViews = total_views($u_id);
	$totalUps = total_ups($u_id);
	$ptv = Math::percentageViews($totalViews);
	$ptu = Math::percentageUps($totalUps);
	@$B_id =  $_GET['u_id'];
	$dsp_name = get_dsp($u_id);
	$gender = get_gender($u_id);
	$username = get_uname($u_id);
	$videoChatName =  unique($_SESSION['user_id'],$u_id);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <title>Demo Page</title>
    <link rel="stylesheet" href="../css/font-awesome.min.css"/>
	<link href="../css/profilev2.mobi.css" rel="stylesheet" media="all">
	<link href="../css/hover.css" rel="stylesheet" media="all">
    <style>
        #container{
            max-width: 400px;
            width: 100%;
            margin: 20px auto;
        }
        #demo_box{
            width: 40vh;
margin-top: 67vh;
margin-left: 38vh;
        }
        .fa{
            font-size: 40px;
            line-height: 70px;
        }
        .fa-bars{
            color: #3498db;
        }
        footer{
            margin-top: 150px;
        }
		.DRINKBUTTONS{
		width: 16vh;
height: 16vh;
border: 1px rgb(0, 0, 0) solid;
color: rgb(225, 225, 225);
background-color: rgb(0, 112, 186);
		}
		.DRINKBUTTONS:hover{
		color: rgb(0, 0, 0);
background-color: #6FC4FC;}
    </style>
</head>
<body>

		<div style="float: left;
position: absolute;
z-index: 1000000;">
			<form id="form1" name="form1" method="post" action="drinklist.php">
						<div id="demo_box">
							<div class="pop_ctrl  grow ppbuttons " >buy a drink</div>
							<ul id="demo_ul"style="width:400px">
							<input type="hidden" name="my_id" id="my_id" value="<?php echo $_SESSION['user_id'] ; ?>" />
							<input type="hidden" name="u_id" id="u_id" value="<?php echo $u_id;?>" />
									
								<li class="demo_li"><button type="submit" name="pid" id="drink"  class="list-button DRINKBUTTONS  box-shadow-inset"value="scotch"><div></div><div>Scotch <img style="height:50%; width:50%" src="../images/shot.jpg"/></div></button></li>
								<li class="demo_li"><button type="submit" name="pid" id="drink"  class="list-button  DRINKBUTTONS box-shadow-inset"value="tequila"><div></div><div>Tequila <img style="height:50%; width:50%" src="../images/tequila.jpg"/></div></button></li>
								<li class="demo_li"><button type="submit" name="pid" id="drink"  class="list-button  DRINKBUTTONS box-shadow-inset"value="rum&cola""><div></div><div>Rum & Cola <img style="height:50%; width:50%" src="../images/rum.jpg"/></div></button></li>
								<li class="demo_li"><button type="submit" name="pid" id="drink"  class="list-button  DRINKBUTTONS box-shadow-inset"value="vodka"><div></div><div>Vodka <img style="height:50%; width:50%" src="../images/vodka.jpg"/></div></button></li>
								<li class="demo_li"><button type="submit" name="pid" id="drink"  class="list-button  box-shadow-inset DRINKBUTTONS"value="margarita"><div></div><div>Margarita <img style="height:50%; width:50%" src="../images/margarita.jpg"/></div></button></li>
								<li class="demo_li"><button type="submit" name="pid" id="drink"  class="list-button  box-shadow-inset DRINKBUTTONS"value="sexonthebeach"><div></div><div>Sex On The Beach <img style="height:50%; width:50%" src="../images/sex.jpg"/></div></button></li>
								<li class="demo_li"><button type="submit" name="pid" id="drink"  class="list-button  box-shadow-inset DRINKBUTTONS"value="wine"><div></div><div>Bottle Of Wine <img style="height:50%; width:50%" src="../images/wine.jpg"/></div></button></li>
								<li class="demo_li"><button type="submit" name="pid" id="drink"  class="list-button  box-shadow-inset DRINKBUTTONS"value="shot"><div></div><div>Shot <img style="height:50%; width:50%" src="../images/shot.jpg"/></div></button></li>
								<li class="demo_li"><button type="submit" name="pid" id="drink"  class="list-button  box-shadow-inset DRINKBUTTONS"value="shot"><div></div><div>Beer<img style="height:50%; width:50%" src="../images/beer.jpg"/></div></button></li>
							</ul>
						</div>
						</form>
</div>

        
       
    </div>
    <script src="../js/jquery.min.js"></script>
    <script src="../js/jquery.popmenu.min.js"></script>
    <script>
        $(function(){
            $('#demo_box').popmenu();
            $('#demo_box_2').popmenu({'background':'#e67e22','focusColor':'#c0392b','borderRadius':'0'});
			 $('#box').popmenu({'background':'url("dataimages/background_shit.png")','focusColor':'#09F','borderRadius':'10px'});
			
        })
    </script>
</body>
</html>