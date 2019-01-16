<?php
if(!empty($_GET['user_id'])){
	$u_id = escape($_GET['user_id']);
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <title>Demo Page</title>
    <link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link href="css/profilev2.css" rel="stylesheet" media="all">
    <style>
        #container{
            max-width: 400px;
            width: 100%;
            margin: 20px auto;
        }
        #demo_box{
            width: 40vh;
			float:left;
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
		width:15vh;
		height:15vh;
		}
    </style>
</head>
<body>

		<div style="float:left;">
			<form id="form1" name="form1" method="post" action="drinklist.php">
						<div id="demo_box">
							<div class="pop_ctrl  grow ppbuttons " >buy a drink</div>
							<ul id="demo_ul"style="width:400px">
							
							<input type="hidden" name="u_id" id="u_id" value="<?php echo$u_id?>"/>
									
								<li class="demo_li"><button type="submit" name="pid" id="drink"  class="list-button   box-shadow-inset"value="scotch"><div></div><div>Scotch $5<img style="height:50%; width:50%" src="images/shot.jpg"/></div></button></li>
								<li class="demo_li"><button type="submit" name="pid" id="drink"  class="list-button  box-shadow-inset"value="tequila"><div></div><div>Tequila $4<img style="height:50%; width:50%" src="images/tequila.jpg"/></div></button></li>
								<li class="demo_li"><button type="submit" name="pid" id="drink"  class="list-button  box-shadow-inset"value="rum&cola"><div></div><div>Rum & Cola $7<img style="height:50%; width:50%" src="images/rum.jpg"/></div></button></li>
								<li class="demo_li"><button type="submit" name="pid" id="drink"  class="list-button  box-shadow-inset"value="vodka"><div></div><div>Vodka $2<img style="height:50%; width:50%" src="images/vodka.jpg"/></div></button></li>
								<li class="demo_li"><button type="submit" name="pid" id="drink"  class="list-button  box-shadow-inset"value="margarita"><div></div><div>Margarita $14<img style="height:50%; width:50%" src="images/margarita.jpg"/></div></button></li>
								<li class="demo_li"><button type="submit" name="pid" id="drink"  class="list-button  box-shadow-inset"value="sexonthebeach"><div></div><div>Sex On The Beach $10<img style="height:50%; width:50%" src="images/sex.jpg"/></div></button></li>
								<li class="demo_li"><button type="submit" name="pid" id="drink"  class="list-button  box-shadow-inset"value="wine"><div></div><div>Bottle Of Wine $11<img style="height:50%; width:50%" src="images/wine.jpg"/></div></button></li>
								<li class="demo_li"><button type="submit" name="pid" id="drink"  class="list-button  box-shadow-inset"value="shot"><div></div><div>Shot $6<img style="height:50%; width:50%" src="images/shot.jpg"/></div></button></li>
								<li class="demo_li"><button type="submit" name="pid" id="drink"  class="list-button  box-shadow-inset"value="beer"><div></div><div>Beer $3<img style="height:50%; width:50%" src="images/beer.jpg"/></div></button></li>
							</ul>
						</div>
						</form>
</div>

        
       
    </div>
    
    <script src="js/jquery.popmenu.min.js"></script>
    <script>
        $(function(){
            $('#demo_box').popmenu();
            $('#demo_box_2').popmenu({'background':'#e67e22','focusColor':'#c0392b','borderRadius':'0'});
			 $('#box').popmenu({'background':'url("dataimages/background_shit.png")','focusColor':'#09F','borderRadius':'10px'});
			
        })
    </script>
</body>
</html>