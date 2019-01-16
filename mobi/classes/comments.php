<?php 
public function getPosts() {
		if ($this->objDb == null) {
			$this->connect();
		}
		$sql = "SELECT *,
				DATE_FORMAT(`date`, '%d/%m/%Y') AS `date_formatted`
				FROM `{$this->_table_1}`
				WHERE `active` = 1
				ORDER BY `date` DESC";
		$statement = $this->objDb->query($sql);
		return $statement->fetchAll(PDO::FETCH_ASSOC);			
	}
	
	
	
	
	
	
	public function getPost($id = null) {
		if (!empty($id)) {
			if ($this->objDb == null) {
				$this->connect();
			}
			$sql = "SELECT *
					FROM `{$this->_table_1}`
					WHERE `id` = ?";
			$statement = $this->objDb->prepare($sql);
			$statement->execute(array($id));
			return $statement->fetch(PDO::FETCH_ASSOC);
		}
	}
	public function getByUser($id = null) {
		if (!empty($id) && !empty($this->_user)) {
			if ($this->objDb == null) {
				$this->connect();
			}
			$sql = "SELECT *
					FROM `{$this->_table_2}`
					WHERE `user` = ?
					AND `item` = ?";
			$statement = $this->objDb->prepare($sql);
			$statement->execute(array($this->_user, $id));
			return $statement->fetch(PDO::FETCH_ASSOC);
		}
	}