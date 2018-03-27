<?php

/**
* DBContext Class
Useing for Manage data form Database
*/
class DBContext extends DBConnection
{
	protected $Error;
	function __construct(){
		parent::__construct();
	}

	protected function includes($a = array()){
		return $a;
	}

	//$tablename,array('id','name')
	#using for fetchdata from Data base
	public function getData($tablename='',$colName= array()){
		$column = implode(",", $colName);
		$sql = "select $column from $tablename";
		$stmt = $this->db->prepare($sql);
		$stmt->execute();
		if($stmt->rowCount() > 0){
			return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}else{
			$this->Error = $stmt->errorInfo();
			return false;
		}
	}

	#using for insert Data to database
	public function addData($tablename,$data){
		
		$keys = implode(",", array_keys($data));
		$k = ':'.implode(", :",array_keys($data));
		$sql = "insert into $tablename($keys) values($k)";
		$stmt = $this->db->prepare($sql);
		foreach ($data as $key => $value) {
			$stmt->bindValue($key,$value);
		}
		$cond = $stmt->execute();
		$this->lastid = $this->db->lastInsertId();
		if($cond == 1){
			return true;
		}
		else{
			$this->Error = $stmt->errorInfo();
		}
	}
	#using for edit Data from database
	
	public function editData($tablename,$data,$id = array()){
		
		$keys = null;
		foreach ($data as $key=>$value) {
				$keys .= ", $key = :$key";
			}
		$keyss = ltrim($keys, ",");
		$idkeys = array_keys($id);
		$sql = "update $tablename set $keyss where $idkeys[0] :$idkeys[0]";
		$stmt = $this->db->prepare($sql);
		foreach ($data as $key => $value) {
			$stmt->bindValue($key,$value);
		}
		
		foreach ($id as $key => $value) {
			$stmt->bindValue($key,$value);
		}
		
		return $stmt->execute();
	}

	#using for delete Data from database
	#deleteData("country",array("id"=>$id))
	public function deleteData($tablename,$pram){
		
		$key = implode(",",array_keys($pram));
		$sql = "delete from $tablename where $key = :$key";
		$stmt = $this->db->prepare($sql);
		foreach ($pram as $key => $value) {
			$stmt->bindParam($key,$value);
		}
		return $stmt->execute();
	}

	#using for delete Data from database
	public function detailsData($tablename='',$colName= array(),$pram = array()){
		$column = implode(",", $colName);
		$key = implode(",",array_keys($pram));
		$sql = "select $column from $tablename where $key = :$key";
		$stmt = $this->db->prepare($sql);
		foreach ($pram as $key => $value) {
			$stmt->bindParam($key,$value);
		}
		$stmt->execute();
		if($stmt->rowCount() > 0){
			return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}else{
			print_r($stmt->errorInfo());
		}
	}



	public function Authentication($tablename='',$username,$password){
		$sql = "select * from $tablename where email = :email and password = :password";
		$stmt = $this->db->prepare($sql);
		$stmt->bindValue(":email",$username);
		$stmt->bindValue(":password",$password);
		$stmt->execute();
		if($stmt->rowCount() > 0){
			return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}else{
			//print_r($stmt->errorInfo());
		}
	}


}





?>