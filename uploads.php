<?php
include_once('nav.php');
$my_id = escape($_SESSION['user_id']);


?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/global.css"/>
<title>Untitled Document</title>
</head>

<body>
    <form action="upload.php" method="post" enctype="multipart/form-data" id="upload" class="upload">
    	<fieldset>
        	<legend>upload files</legend>
            <input type="file" id="file" name="file[]" required="required" multiple="multiple"/>
            <input name="submit" id="submit" type="button" value="upload" />
        </fieldset>
        <div class="bar">
        	<span  class="bar-fill" id="pb"><span class="bar-fill-text"id="pt"></span></span>
        </div>
        <div id="uploads" class="uploads" >
            
        </div>
    </form>
    
    <script src="upload.js"></script>
    <script >
	document.getElementById('submit').addEventListener('click',function(e){
			var f = document.getElementById('file'),
			 pb = document.getElementById('pb'),
			 pt = document.getElementById('pt');

			
			app.uploader({
				files :f,
				progressBar:pb,
				progressText: pt,
				processor:'upload.php',
				
				finished:function(data){
						var uploads = document.getElementById('uploads'),
							images = document.createElement('div'),
							videos = document.createElement('div'),
							failed = document.createElement('div'),
							
							anchor,
							span,
							x;
							if(data == ''){alert ('empty');}
							if(data.images.length){
								anchor = document.createElement('a');
								anchor.href = 'images.php?u_id=<?php echo $my_id;?>';
								anchor.innerText = 'image have been uploaded';
								anchor.target = '_blank';
								images.appendChild(anchor);
							}
							if(data.videos.length){
								anchor = document.createElement('a');
								anchor.href = 'videoList.php?u_id=<?php echo $my_id;?>';
								anchor.innerText = 'videos have been uploaded';
								anchor.target = '_blank';
								videos.appendChild(anchor);
							}
						if(data.failed.length){
							span = document.createElement('span');
							span.innerText = 'These files were not uploaded   ';
							failed.appendChild(span);
							}
							uploads.innerText = '';
							for(x = 0;x < data.images.length; x++){
							
								anchor = document.createElement('a');
								anchor.href = 'uploads/' + data.images[x].file;
								anchor.innerText = data.images[x].name;
								anchor.target = '_blank';
								images.appendChild(anchor);
								}
								
								
								
								
								
								for(x = 0;x < data.videos.length; x++){
								
								anchor = document.createElement('a');
								anchor.href = 'uploads/' + data.videos[x].file;
								anchor.innerText = data.videos[x].name;
								anchor.target = '_blank';
								videos.appendChild(anchor);
								}
								
								
								
								
								
								for(x = 0;x < data.failed.length; x++){
									span = document.createElement('span');
									span.innerText = data.failed[x].name+'  ';
									failed.appendChild(span);
									
								}
								
								
								
								uploads.appendChild(images);
								uploads.appendChild(videos);
								uploads.appendChild(failed);
					},
				error:function(data){
				
				}
				
				});
		});
		
    
    </script>

</body>
</html>