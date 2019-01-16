<?php
require_once ('connect.php');
require_once ('functions.php');
require_once ('nav.php');
require_once ('core/init.php');
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
    <title>Search-Results</title>
    
    <link rel="stylesheet" type="text/css" href="css/mainlist.css"/>
</head>

<body>

    <div id="page-wrap"> 
    
        
    	<div id="section">
    	
            <div id="rooms">
            	<h2 id='lt'>Results</h2>
                <ul>
				<?php
				
						//needs to be in a function
						$table = escape($_POST['place']);
						$coloumb = escape($_POST['specify']);
						$requirement = escape($_POST['requirement']);
						
						$result = search_and_oganise($table,$coloumb,$requirement);
						
						if (empty($result)){
							echo "<li class='p'>
									<a href=''>No results found</a>
								  </li>";
						}else{
							foreach($result as $user){
									$u_id = get_id_frm_field_users($user,'username');
									$dsp_name = get_dsp($u_id);
									$post = get_post($u_id);
									$NAME = getUsername($u_id);
								
										echo"<li class='img'>
												<a href='profile.php?u_id=$u_id'>$NAME<br><strong></strong><br><span><img src='".Need_pp($u_id)."'></span></a>
											</li>";
							}
						}
					
					
					?>
					
					 
                </ul>
            </div>
        </div>
        
    </div>
</body>
</html>