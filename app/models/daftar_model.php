<?php  
class daftar_model {
	private $db;
	public function __construct (){
		$this->db=new Database;
	}

	public function getAllData(){
		$this->db->query ("SELECT * FROM antrian");
		// $this->db->eksekusi();
		return $this->db->allData();

	}

	public function jmlData($kategori){
		$this->db->query("SELECT * FROM antrian WHERE layanan=:layanan");
		$this->db->bind('layanan',$kategori);
		$jumlah=count($this->db->allData());

		return $jumlah;
	}
	public function daftar($data){
		// ambil kategori
		$kategori = $data['kategori'];

		// mengetahui jumlah data disit
		//query
		$nourut=$this->jmlData($kategori)+1;		

		// tambah data/daftarkan
		$this->db->query("INSERT INTO antrian VALUES('','$kategori','$nourut')");
		$this->db->eksekusi();
		return $this->db->Row();
	}
}

?>