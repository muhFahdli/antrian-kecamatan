<?php 

class Control {
	private $cetak;
	public function view($view,$data =[]) {
		require_once '../app/views/'.$view.'.php';
		
	}

	public function model($model) {
		require_once '../app/models/'.$model.'.php';
// intansiasi
		return new $model;
	}

}

?>