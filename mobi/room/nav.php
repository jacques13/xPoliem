<?php
	require_once 'core/init.php';
	if (Input::exists()) {
		if (Token::check(Input::get('token'))) {
			$validate = new Validate();
			$validation = $validate->check($_POST, array(
				'username'	=> array(
					'fieldName'	=> 'Username',
					'required' 	=> true
				),
				'password'	=> array(
					'fieldName'	=> 'Password',
					'required' 	=> true
				)
			));

			if ($validation->passed()) {
				$user 		= new User();
				$remember 	= (Input::get('remember') == 'on') ? true : false;
				$login 		= $user->login(Input::get('username'),Input::get('password'), $remember);

				if ($login) {
					header('location: profile.php');
				} else {
					echo "Sorry we could not log you in";
				}
			} else {
				foreach ($validation->errors() as $error) {
					echo $error, '<br>';
				}
			}
		}
	}
?>

<!DOCTYPE HTML>
<html lang="en-US">
    <head>
        <title>Header</title><!--ontou om na video ajax load fade effect te kk by jquery en laat alles in load -->
        <meta http-equiv="x-ua-compatible" content="IE=edge" />
        <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-touch-fullscreen" content="yes">
        <link rel="stylesheet" type="text/css" href="css/snap.css" />
        <link rel="stylesheet" type="text/css" href="css/demo 2.css" />
		 <link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel="stylesheet" href="../../themes/base/jquery.ui.all.css">
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<link rel="stylesheet" type="text/css" href="css/elastislide.css" />
		<link href="css/ext.css" rel="stylesheet"/>
		<link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow&v1' rel='stylesheet' type='text/css' />
		<link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css' />
		<link rel="stylesheet" href="css/font-awesome.min.css"/>
		
		<noscript>
			<style>
			  #pop_box{
			  float:right;
            width: 100%;
        }
		.R{
		
		float:right;
		/*border:  1px solid #f0c2e8;*/
		}
					.es-carousel ul{
							display:block;
					}
					.slide-out-div {
					position:absolute;
							padding: 0px;
							width: 250px;
							background: -webkit-linear-gradient(top,rgba(240,194,228,0.6), #f0c2e4);
							background: -moz-linear-gradient(top,rgba(240,194,228,0.6)),#f0c2e4;
							background: -o-linear-gradient(top,rgba(240,194,228,0.6), #f0c2e4));
							background: -ms-linear-gradient(top, rgba(240,194,228,0.6), #f0c2e4));
							background: linear-gradient(top, rgba(240,194,228,0.6), #f0c2e4)));
							border: #f0c2e4 2px solid;
							
			
							
					}
					.img{
							height:60px;
							width:60px;
							
					}
				
					#dropList:hover{
							border: #f0c2e8 5px solid;	
					}
					/*na dit geupdate het laat dit uit fade*/
					.dropList{
					overflow:hidden;
					}
	                .ab{position:absolute;}
					.centerA{text-align:center}
			</style>
            
		</noscript>
		
    </head>
    <body >
	
        <div class="snap-drawers"><!--update en post shit kom hier -->
            <div class="snap-drawer snap-drawer-left">
                <div>
				
                    <h3>updates</h3>
                   </div>
                </div>
				 
            </div>
            
        <!-- <a href="#" id="open-left"></a> open button-->
        
        <div id="content"  class="snap-content"><a href="#" id="open-left"><img height="10px" width="10px" src="thumbs/lesbian.jpg"/></a>
		<nav><div class="megamenu_wrapper megamenu_light_theme"><!-- BEGIN MENU WRAPPER copy en paste di hele ding-->
    <div class="megamenu_container megamenu_lightblue"><!-- BEGIN MENU CONTAINER -->
        <ul class="megamenu"><!-- BEGIN MENU -->
		<li><a href="#_" class="menuitem_drop"><img class="logo" src="Logo.png"/></a></li>
		<li><a href="#_" class="menuitem_drop">CHAT (1 on 1)</a>
            <div class="dropdown_3columns">
                <div class="col_full"><h2>CHAT WITH A STANGER OR ADMIRERER</h2></div>
				<div class="col_full"><h4><p><strong>Our unique system matches you up with the opposite sex</strong></p></h4></div>
                 <div class="col_one_third firstcolumn">
		            <a href="#"><h4>RANDOM-CAM</h4></a>
		         </div>
		         <div class="col_one_third ">
		            <a href="#"><h4>x-CAM</h4></a>
		         </div>
		         <div class="col_one_third">
		            <a href="#"><h4>ADMIRE-CAM</h4></a>
		         </div>
				 <div class="col_one_third firstcolumn">
		            <a href="#"><h4>RANDOM-TEXT</h4></a>
		         </div>
		         <div class="col_one_third ">
		            <a href="#"><h4>x-TEXT</h4></a>
		         </div>
		         <div class="col_one_third">
		            <a href="#"><h4>ADMIRE-TEXT</h4></a>
		         </div>
            </div>
        </li><!-- chat 1 on  1 -->
        <li><a href="#_" class="menuitem_drop">GROUP CHAT</a>
            <div class="dropdown_2columns">
                <div class="col_full"><h2>CHAT WITH A RANDOM GROUP or YOUR OWN GROUP</h2></div>
				<div class="col_full"><h4><p><strong>Our system puts you in a random or a group created or hosted by you</strong></p></h4></div>
                 <div class="col_one_half firstcolumn">
		            <a href="#"><h4>RANDOM-GROUP</h4></a>
		         </div>
				 <div class="col_one_half">
		            
					<a href="#"><h4>CREATE A GROUP CHAT</h4></a>
					<a href="#"><h4>JOIN A GROUP</h4></a>
					
		         </div>
            </div>
        </li><!-- group -->
		<li><a href="#_" class="menuitem_drop">ALBUM'S</a>
		<div class="dropdown_3columns"><!-- Begin columns container -->
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
		</li><!--albums-->
		<li><a href="#_" class="menuitem_drop">VIDEO'S</a>
		<div class="dropdown_3columns"><!-- Begin columns container -->
		 <div class="col_full firstcolumn">
		 <h2>BEST VIDEOS</h2>
		</div>
		<div class="col_one_third firstcolumn">
		 <a href="#"><h4>NEWEST</h4></a>
		</div>
		<div class="col_one_third ">
		 <a href="#"><h4>BEST RATED</h4></a>
		</div>
		<div class="col_one_third">
		 <a href="#"><h4>IETS</h4></a>
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
		 <a href="#"><h4>VIDEOS</h4></a>
		</div>
		<div class="col_one_third ">
		 <a href="#"><h4>FAVOURITES</h4></a>
		</div>
		<div class="col_one_third">
		 <a href="#"><h4>SEARCH</h4></a>
		</div>
		</div>
		</li><!-- videos-->
		<li><a href="#_" class="menuitem_drop">PROFILE</a>
		
		<div class="dropdown_3columns"><!-- Begin columns container -->
		 <div class="col_one_third firstcolumn">
		<a href="#"> <h3>HOME</h3></a>
		</div>
		<div class="col_one_third ">
		<a href="#"><img class="pp" src="french.jpg"/></a>
		</div>
		<div class="col_one_third ">
		<a href="#"> <h3>ADMIRES</h3></a>
		</div>
		 <div class="col_one_third firstcolumn">
		<a href="#"><h3>MY ALBUMS <img class="thumb" src=""/></h3></a>
		</div>
		<div class="col_one_third ">
		 <a href="#"><h3>MY VIDEOS <img class="thumb" src=""/></h3></a>
		</div>
		<div class="col_one_third ">
		 <a href="#"><h3>ADMIRES<img class="thumb" src=""/></h3></a>
		</div>
		 <div class="col_full"><h2>TOP 6 ADMIRES</h2></div>
		 <div class="col_one_third firstcolumn">
		 <ul>
	     <li><a href="#"><h3>GREG<img class="thumb" src=""/></h3></a></li>
         <li><a href="#"><h3>TOM<img class="thumb" src=""/></h3></a></li>
		</ul>
		</div>
		 <div class="col_one_third ">
		 <ul>
	     <li><a href="#"><h3>MILL<img class="thumb" src=""/></h3></a></li>
         <li><a href="#"><h3>JILL<img class="thumb" src=""/></h3></a></li>
		</ul>
		</div>
		 <div class="col_one_third ">
		 <ul>
	     <li><a href="#"><h3>ROBERT<img class="thumb" src=""/></h3></a></li>
         <li><a href="#"><h3>FANCY<img class="thumb" src=""/></h3></a></li>
		</ul>
		</div>
		 </div>
		 </li><!-- profile -->
		
		<li class="menuitem_right"><a href="#_" class="menuitem_drop">ACCOUNT</a>
		<div class="dropdown_3columns dropdown_right"><!-- Begin columns container -->
		 <div class="col_full firstcolumn">
		<h2><a href="#">LOGIN/REGISTER</a></h2>
        <h3></h3>
        <form action="" method="post">
	<div class="field">
		<label for="username">Username</label>
		<input type="text" name="username" id="username" value="<?php echo escape(Input::get('username')); ?>" autocomplete="off"/>
	</div>
	<div class="field">
		<label for="password">Password</label>
		<input type="password" name="password" id="password"/>
	</div>
	<div class="field">
		<label for="remember">
			<input type="checkbox" name="remember" id="remember"/> Remember Me
		</label>
	</div>
	<input type="hidden" name="token" value="<?php echo Token::generate(); ?>"/>
	<input type="submit" value="Login"/>
</form>
		</div>
		 </div>
		 </li> 
</div>
</div></nav>

            
		
			
			
			
			
            
		<div id="no-drag" data-snap-ignore="true">
		<div class="content"><!--hier in load-->
		
		
        
       
		
		
	     
		
		
				<!-- content -->
				
        </div>
		 </div>
		
        	
        <script type="text/javascript" src="js/demo 2.js"></script>
        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>       
    
		<script type="text/javascript" src="jquery-1.9.1.js"></script>
		<script type="text/javascript" src="js/jquery.tmpl.min.js"></script>
		<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
		<script type="text/javascript" src="js/jquery.elastislide.js"></script>
		<script type="text/javascript" src="js/gallery.js"></script>
		
        <script src="ui/jquery.ui.core.js"></script>
		<script src="ui/jquery.ui.widget.js"></script>
		<script src="ui/jquery.ui.mouse.js"></script>
		<script src="ui/jquery.ui.draggable.js"></script>
		<script src="ui/jquery.ui.droppable.js"></script>
		<script src="ui/jquery.ui.sortable.js"></script>
	    <script src="js/jquery.tabSlideOut.v1.3.js"></script>
		<script src="js/jquery.popmenu.min.js"></script>
		 
		<script><!--slide div-->
         $(function(){
             $('.slide-out-div').tabSlideOut({
                 tabHandle: '.handle',                              //class of the element that will be your tab
                 pathToTabImage: 'thumbs/contact_tab.gif',          //path to the image for the tab (optionaly can be set using css)
                 imageHeight: '122px',                               //height of tab image
                 imageWidth: '40px',                               //width of tab image    
                 tabLocation: 'right',                               //side of screen where tab lives, top, right, bottom, or left
                 speed: 500,                                        //speed of animation
                 action: 'click',                                   //options: 'click' or 'hover', action to trigger animation
                 topPos: '200px',                                   //position from the top
                 fixedPosition: true                              //options: true makes it stick(fixed position) on scroll
             });
         });
		
		

         </script>
		 <script><!--drag and drop-->
		  $(function() {
      
		$( "li#drag" ).draggable({cursor:'pointer',
		                      revert:true,
							  helper: 'clone',
							  cursor:"pointer",
                              connectToSortable: '#dropList',
                              appendTo: '#dropList'							  });
							 
							 
		$( "#dropList,#drag" ).sortable({containment:"#dropList",
					   tolerance:"pointer",
				   cursor:"pointer",
					   revert:true,
					   connectWith:"#dropList,#drag",
								   
});
$('#droplist').droppable();
		function clear (){
			//doen di
			
			
			
			}
	});//change more
		 </script>
		<script id="img-wrapper-tmpl" type="text/x-jquery-tmpl">	<!--galary-->
		<script id="img-wrapper-tmpl" type="text/x-jquery-tmpl">	
			<div class="rg-image-wrapper">
				{{if itemsCount > 1}}
					<div class="rg-image-nav">
						<a href="#" class="rg-image-nav-prev">Previous Image</a>
						<a href="#" class="rg-image-nav-next">Next Image</a>
					</div>
				{{/if}}
				<div class="rg-image"></div>
				<div class="rg-loading"></div>
				<div class="rg-caption-wrapper">
					<div class="rg-caption" style="display:none;">
						<p></p>
					</div>
				</div>
			</div>
		</script> 
		<script type="text/javascript" src="js/snap.js"></script>
        <script type="text/javascript"><!--snap div-->
            var snapper = new Snap({
                element: document.getElementById('content'),
                disable: 'right',
				hyperextensible: false
			
            });
        </script>
        <script>
        $(function(){
            $('#pop_box').popmenu();
           
        })
    </script>
	   </body>
</html>
