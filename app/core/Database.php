<?php 
class Database {
	private $host = HOST;
	private $user = USER;
	private $pw = PW;
	private $name = NAME;

	private $dbh;
	private $stmt;

	public function __construct(){
		$dsn ='mysql:host='.$this->host.';dbname='.$this->name;

		$options = [
			PDO::ATTR_PERSISTENT =>true,
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
		];

		try {
			$this->dbh = new PDO($dsn,$this->user,$this->pw,$options);
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	// query
	public function query($query) {
		// prepare
		$this->stmt=$this->dbh->prepare($query);
	}
	public function bind($param,$value,$type= null){
		if (is_null($type)) {
			switch (true) {
				case is_int($value):
				$type = PDO::PARAM_INT;
				break;
				case is_bool($value):
				$type = PDO::PARAM_BOOL;
				break;
				case is_null($value):
				$type = PDO::PARAM_NULL;
				break;
				default:
				$type = PDO::PARAM_STR;
				break;
			}
		}
		$this->stmt->bindValue($param,$value,$type);
	}

	public function eksekusi() {
		$this->stmt->execute();
	}
	public function allData(){
		$this->eksekusi();
		return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	public function singleData(){
		$this->eksekusi();
		return $this->stmt->fetch(PDO::FETCH_ASSOC);
	}

	public function Row(){
		return $this->stmt->rowCount();
	}

}

?>