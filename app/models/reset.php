<?php 
class reset{
	private $db;
	public function __construct() {
		$this->db = new Database;
	}

	public function resetData(){
		$this->db->query("DELETE FROM antrian");
		$this->db->eksekusi();
		$this->db->allData();
	}

}



?>