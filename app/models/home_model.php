<?php 

class home_model {
	private $db;
	public function __construct (){
		$this->db=new Database;
	}


	public function getData(){
		$this->db->query ("SELECT * FROM kategori");
		// $this->db->eksekusi();
		return $this->db->allData();

	}
}
?>