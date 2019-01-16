<?php
require_once ('connect.php');
	class Find {
	
	public static function username($u_id){
					$query = "SELECT  `username` 
								FROM  `users` 
								WHERE id =$u_id";
					$query_run = mysql_query($query);
					$post_titles=array();
					while ($columns = mysql_fetch_assoc($query_run)){
						$post_titles[] = $columns['username'];	
					}
					return $post_titles;
		
				}
	
	public static function id($u_id = null){
				if($u_id === null){
					$query = "SELECT  `id` FROM  `voice`.`lib`  ";
					$query_run = mysql_query($query);
					
					if (!$query_run) {
							echo "Could not successfully run query () from DB: " . mysql_error();
							exit;
						}

						if (mysql_num_rows($query_run) == 0) {
							echo "No rows found, nothing to print so am exiting";
							exit;
						}
					$post_titles=array();
					while ($columns = mysql_fetch_assoc($query_run)){
						$post_titles[] = $columns['id'];	
					}
					return $post_titles;
				}else{
					$query = "SELECT `id` FROM `voice`.`lib` WHERE `u_id` = $u_id ";
					$query_run = mysql_query($query);
					$post_titles=array();
					while ($columns = mysql_fetch_assoc($query_run)){
						$post_titles[] = $columns['id'];	
					}
					return $post_titles;
				}
			}
			
			public static function u_idss($u_id = null){
				if($u_id === null){
					$query = "SELECT  `u_id` FROM  `voice`.`lib`  ";
					$query_run = mysql_query($query);
					
					if (!$query_run) {
							echo "Could not successfully run query () from DB: " . mysql_error();
							exit;
						}

						if (mysql_num_rows($query_run) == 0) {
							echo "No rows found, nothing to print so am exiting";
							exit;
						}
					$post_titles=array();
					while ($columns = mysql_fetch_assoc($query_run)){
						$post_titles[] = $columns['u_id'];	
					}
					return $post_titles;
				}else{
					$query = "SELECT `u_id` FROM `voice`.`lib` WHERE `u_id` = $u_id ";
					$query_run = mysql_query($query);
					$post_titles=array();
					while ($columns = mysql_fetch_assoc($query_run)){
						$post_titles[] = $columns['u_id'];	
					}
					return $post_titles;
				}
			}
			
			
	
	
			public static function name($u_id = null){
				if($u_id === null){
					$query = "SELECT  `name` FROM  `voice`.`lib`  ";
					$query_run = mysql_query($query);
					
					if (!$query_run) {
							echo "Could not successfully run query () from DB: " . mysql_error();
							exit;
						}

						if (mysql_num_rows($query_run) == 0) {
							echo "No rows found, nothing to print so am exiting";
							exit;
						}
					$post_titles=array();
					while ($columns = mysql_fetch_assoc($query_run)){
						$post_titles[] = $columns['name'];	
					}
					return $post_titles;
				}else{
					$query = "SELECT `name` FROM `voice`.`lib` WHERE `u_id` = $u_id ";
					$query_run = mysql_query($query);
					$post_titles=array();
					while ($columns = mysql_fetch_assoc($query_run)){
						$post_titles[] = $columns['name'];	
					}
					return $post_titles;
				}
			}
			public static function file($u_id = null){
				if($u_id == null){
					$query = "SELECT `file` FROM `voice`.`lib` ";
					$query_run = mysql_query($query);
					$post_titles=array();
					while ($columns = mysql_fetch_assoc($query_run)){
						$post_titles[] = $columns['file'];	
					}
					return $post_titles;
				}else{
					$query = "SELECT `file` FROM `voice`.`lib` WHERE `u_id` = $u_id ";
					$query_run = mysql_query($query);
					$post_titles=array();
					while ($columns = mysql_fetch_assoc($query_run)){
						$post_titles[] = $columns['file'];	
					}
					return $post_titles;
				}
			}
			public static function img($u_id = null){
				if($u_id == null){
					$query = "SELECT `img` FROM `voice`.`lib` ";
					$query_run = mysql_query($query);
					$post_titles=array();
					while ($columns = mysql_fetch_assoc($query_run)){
						$post_titles[] = $columns['img'];	
					}
					return $post_titles;
				}else{
					$query = "SELECT `img` FROM `voice`.`lib` WHERE `u_id` = $u_id ";
					$query_run = mysql_query($query);
					$post_titles=array();
					while ($columns = mysql_fetch_assoc($query_run)){
						$post_titles[] = $columns['img'];	
					}
					return $post_titles;
				}
				

	
	}
	}
