<?php

    require_once ('core/init.php');
	
	require_once ('connect.php');
	require_once ('functions.php');
	@$pre_select = $_SESSION['pre_select'];
	
	
	
?>
<!DOCTYPE HTML>
<html>
<head>


<style>

.H_body {
	border-style: solid;
	position: relative;
    border-width: 5px;
	border-color: RED;
	margin-top: 40px;
	margin-left: auto;
	margin-right: auto;
	padding-bottom: 81%;
	width: 60%;

}

.H_B{
	float: left;
    background-color: <?php printf( "#%06X\n", mt_rand( 0, 0xFFFFFF )); ?>;
	position: absolute;
	width: 50%;
	height: 25%;
}
.H_B_img {
	float: left;
    background-color: <?php printf( "#%06X\n", mt_rand( 0, 0xFFFFFF )); ?>;
	position: absolute;
	width: 50%;
	height: 25%;
}
.H_B_vid {
	float: left;
    background-color: <?php printf( "#%06X\n", mt_rand( 0, 0xFFFFFF )); ?>;
	position: absolute;
	width: 50%;
	height: 25%;
}
.H_B_script {
	float: left;
    background-color: <?php printf( "#%06X\n", mt_rand( 0, 0xFFFFFF )); ?>;
	position: absolute;
	width: 47.91%;
	height: 23.48%;
	-ms-word-wrap: break-word;
     word-wrap: break-word;

     /* Non standard for webkit */
     word-break: break-word;

	-webkit-hyphens: auto;
	-moz-hyphens: auto;
    -ms-hyphens: auto;
    hyphens: auto;
	padding: 1.01%;
}
.H_b_img {
	float: left;
    background-color: <?php  printf( "#%06X\n", mt_rand( 0, 0xFFFFFF )); ?>;
	position: absolute;
	width: 25%;
	height: 12.5%
}
.H_b_vid {
	float: left;
    background-color: <?php printf( "#%06X\n", mt_rand( 0, 0xFFFFFF )); ?>;
	position: absolute;
	width: 25%;
	height: 12.5%
}
.H_b_script {
	float: left;
    background-color: <?php printf( "#%06X\n", mt_rand( 0, 0xFFFFFF )); ?>;
	position: absolute;
	width: 23%;
	height: 11.01%;
	-ms-word-wrap: break-word;
     word-wrap: break-word;

     /* Non standard for webkit */
     word-break: break-word;

	-webkit-hyphens: auto;
	-moz-hyphens: auto;
    -ms-hyphens: auto;
    hyphens: auto;
	padding: 1.01%;
}

.H_wrapper{
	font-size: 1.1vw;
}
</style>
<title>Home</title>
</head>
<body>
<div style="margin-top:-6vh;"><?php require_once ('nav.php'); ?></div>
<div class = "H_wrapper" >
	<div class = "H_body" id = "H_BODY">
		<?php $arr = ShufflePosts_Check_accWeeks(13);
			$post_s = $arr['script'];
			$post_v = $arr['vid'];
			$post_i = $arr['img'];
			for ($i = 0; $i <= 2; $i++) {
				if(count($post_v) > 1){
					$four_s[] = $post_v[0];
					array_splice($post_v, 0,1);
				}else if(count($post_i) > 1){
					$four_s[] = $post_i[0];
					array_splice($post_i, 0,1);
				}else{
					$four_s[] = $post_s[0];
					array_splice($post_s, 0,1);
				}
			}
			if(!($arr == NULL)){
				$five = array(12.5, 50, 75, 50, 50, 0);
				$four = array(62.5, 50, 25, 25, 75, 0);
				$three = array(50, 50, 75, 0, 37.5, 0);
				$two = array(0, 50, 75, 50, 37.5, 25);
				$one = array( 62.5, 25, 12.5, 50, 37.5, 0);
				$Allarrays = array($one,$two, $three, $four, $five);
				$five_o = Array ( 25,0 ,87.5,0 ,62.5,75 ,37.5,25 ,0,75 ,62.5,50 ,87.5,25 ,75,25 ,0,50 ,25,25 ,37.5,75 ,50,50 ,50,75 ,75,0 ,37.5,0 ,37.5,50 )  ; 
				$four_o = Array ( 50,0 ,87.5,75 ,12.5,75 ,62.5,0 ,0,75 ,50,50 ,37.5,75 ,50,75 ,12.5,50 ,87.5,50 ,0,50 ,50,25 ,37.5,0 ,62.5,25 ,25,0 ,25,75  ) ; 
				$three_o = Array ( 0,75 ,0,50 ,75,50 ,75,75 ,25,75 ,25,25 ,12.5,50 ,87.5,50 ,62.5,25 ,37.5,75 ,37.5,50 ,62.5,0 ,87.5,75 ,12.5,75 ,25,0 ,25,50  ) ; 
				$two_o = Array ( 62.5,75 ,25,50 ,75,0 ,75,25 ,50,0 ,62.5,0 ,62.5,50 ,25,0 ,37.5,0 ,87.5,25 ,25,25 ,37.5,75 ,25,75 ,87.5,0 ,62.5,25 ,50,75  ) ; 
				$one_o = Array ( 75,0 ,87.5,0 ,62.5,0 ,87.5,25 ,25,25 ,62.5,75 ,0,50 ,37.5,50 ,87.5,50 ,0,75 ,50,50 ,37.5,75 ,50,75 ,25,0 ,87.5,75 ,75,75  );
				$Allarrays_o = array($one_o,$two_o, $three_o, $four_o, $five_o);
				$rand_chosen = Rand(0,4);
				if(isset($pre_select) < 1){
				$pre_select = 0;}
				While($rand_chosen  == $pre_select){
					$rand_chosen = Rand(0,4);
				}
				$pre_select = $rand_chosen;
				$_SESSION['pre_select'] = $pre_select;
				$chosen = $Allarrays[$rand_chosen];
				echo "<div class = 'H_B' style='top: 0%; left: 0%;  '></div>";
				$z = 0;
				for ($i = 0; $i <= 2; $i++){
					$use_ext = get_file_extension($four_s[$i]);
					$file_owner = get_file_owner_id($four_s[$i]);
					if(test_img($use_ext) == true){
						echo "<div class = 'H_B_img' style='top: $chosen[$z]%;"; $z++; echo " left: $chosen[$z]%;  '><img src='uploads/lib/$file_owner/images/$four_s[$i]' alt='Error' height='100%' width='100%'></img ></div>"; $z++;
					} else if (test_vid($use_ext) == true){
						echo "<div class = 'H_B_vid' style='top: $chosen[$z]%;"; $z++; echo " left: $chosen[$z]%;  '><img src='uploads/lib/$file_owner/videos/thumbs/$four_s[$i]' alt='Error' height='100%' width='100%'></img ></div>"; $z++;
					} else {
						$file_title = get_file_allButOwner($four_s[$i]);
						echo "<div class = 'H_B_script' style='top: $chosen[$z]%;"; $z++; echo " left: $chosen[$z]%;  '>$file_title</div>"; $z++;
					}
				}
				$chosen = $Allarrays_o[$rand_chosen];
				$i = 0;
				for ($z = 0; $z <= count($post_v)-1; $z++){	
					$file_owner = get_file_owner_id($post_v[$z]);
					echo "<div class = 'H_b_vid' style='top: $chosen[$i]%;"; $i++; echo " left: $chosen[$i]%;  '><img src='uploads/lib/$file_owner/videos/thumbs/$post_v[$z]' alt='Error' height='100%' width='100%'></img ></div>"; $i++;
				}
				for ($z = 0; $z <= count($post_i)-1; $z++){	
					$file_owner = get_file_owner_id($post_i[$z]);
					echo "<div class = 'H_b_img' style='top: $chosen[$i]%;"; $i++; echo " left: $chosen[$i]%;  '><img src='uploads/lib/$file_owner/images/$post_i[$z]' alt='Error' height='100%' width='100%'></img ></div>"; $i++;
				}
				for ($z = 0; $z <= count($post_s)-1; $z++){	
					$file_owner = get_file_owner_id($post_s[$z]);
					$file_title = get_file_allButOwner($post_s[$z]);
					echo "<div class = 'H_b_script' style='top: $chosen[$i]%;"; $i++; echo " left: $chosen[$i]%;  '>$file_title</div>"; $i++;
				}
				
			}else{
				Echo 'Error loading posts: Insufficient_Entries';
			}
		?>
		
	</div>
</div>











<!-- make a function to make a post view -->

</body>
</html>