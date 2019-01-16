<?php
require_once ('connect.php');
	require_once ('functions.php');
	require_once ('core/init.php');
	 require_once ('nav-test.php');
	 
	
?>
<head>
<link rel="stylesheet" href="css/videoHome.css" >
<link href="css/hover.css" rel="stylesheet" media="all">
<link href="css/global.css" rel="stylesheet" media="all">
</head>

<body style="display: block;" >

<div id="loadIn" style="margin-top: 3%;"> 

	
</div>
  <script src="jquery-1.9.1.js" type="text/javascript"></script>
<script type="text/javascript">

 $(document).ready(function() {

  $.ajax({    
        type: "GET",
        url: "getVideo.php",             
        dataType: "html",                 
        success: function(response){                    
            $("#loadIn").html(response); 
           
        }

    });
	
	 $('#load').click(function(e){
		 e.preventDefault();
		 var loadInfo = $('#load').val();
		 $.ajax({    
        type: "GET",
        url: "getVideo.php?Info="+loadInfo,             
        dataType: "html",                 
        success: function(response){                    
            $("#loadIn").html(response); 
           
        }

    });
	 
	 });
 
 });

</script>
</body>