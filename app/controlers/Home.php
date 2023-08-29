<?php 
class Home extends Control{
	public function index(){
		$data['kategori']=$this->model('home_model')->getData();
		$data['jumlah']=$this->model('daftar_model')->getAllData();
		foreach ($data['kategori'] as $kategori) {
			$data['jumlah'][$kategori['layanan']]=$this->model('daftar_model')->jmlData($kategori['layanan']);
		}
		$data['judul']= 'home';
		
		date_default_timezone_set("Asia/Jakarta");
		$jam = date("H:i");
		$jamReset ="09:30"; 
		$jamDaftar = "14:50";

		if ($jam > $jamReset && $jam < $jamDaftar ) {
			$this->model('reset')->resetData();
			$data['daftar']=true;
		}
		else {
			$data['daftar']=false;	
		}



		// tampilan
		$this->view('template/header',$data);
		$this->view('Home/index',$data);
		$this->view('template/footer');
	}

	public function daftar() {
		if ( $this->model('daftar_model')->daftar($_POST)> 0) {
			header('Location: '.URL.'/Home/cetak');
			exit;
		}
	}

	public function cetak() {
		
		$data['judul']='cetak';
		$alldata = $this->model('daftar_model')->getAllData();
		$data['antrian']=end($alldata);
		
		$file = 'Home/cetak';
		$this->view($file, $data);
		
	}
	
}