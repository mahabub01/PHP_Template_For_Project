<?php
/**
* DBConnection Class
*/
class DBConnection 
{
	protected $db;
	const USERNAME = "root";
	const DBNAME = "phptamplate";
	const PASS = "";
	const HOST = "localhost";
	function __construct(){
		$this->Connection();
	}

	private function Connection(){
		try{
			$this->db = new PDO("mysql:dbname=".Self::DBNAME.";host=".self::HOST,self::USERNAME,self::PASS);
		}
		catch(PDOException $ex){
			echo $ex->getMessage();
		}
	}
}



?>