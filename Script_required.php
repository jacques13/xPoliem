<?php 
	
	require_once ('core/init.php');
	require_once ('functions.php');
	require_once ('connect.php');
	
	
	

?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">



</head>

<body>

<script type="text/javascript">
  window.onbeforeunload = Update;
  function Update()
  {
    <?php function Delete_chat_user($my_id, $vid_text)?>; //Plaas baie laag in page af, Erens bo in die page mut geset wees of dit n video of text chat is: $vid_text = 'text'/'video';
  }			
</script>

</body>
</html>
