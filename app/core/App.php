<?php 
class App {
	protected $controler = 'Home';
	protected $method = 'index';
	protected $param = [];
	public function __construct() {
		$url = $this->Url();

		// controler
		
			// cek ada conroler tersebut kaga di folder cotroler
		if (isset($url[0])) {
			if(file_exists('../app/controlers/'.$url[0].'.php')){
				$this->controler = $url[0];
				unset($url[0]);
			}
		}

			// panggl file dan eksekusi atau instansiasi
		require_once '../app/controlers/'.$this->controler.'.php';
		$this->controler = new $this->controler;
		
		// method	
		if (isset($url[1])) {
			if (method_exists($this->controler,$url[1])) {
				$this->method = $url[1];
				unset($url[1]);
			}
		}

		// param
		if (!empty($url)) {
			$this->param = $url;
		}
		
		// gabung semuanya
		call_user_func_array([$this->controler,$this->method], $this->param);
		
	}

	public function Url() {
		if (isset($_GET['url'])) {
			$url = $_GET['url'];

			// menghulangkan tanda / dibelakang
			$url = rtrim($url);
			// memfilter url
			$url = filter_var($url, FILTER_SANITIZE_URL);
			// memsihkan uel petbagiannya
			$url = explode('/', $url);

			// mengembalikan url
			return $url;

		}
	}
}