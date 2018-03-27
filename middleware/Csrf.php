<?php 

/**
* Cross site forency Report Class
*/
class Csrf 
{
	
	function __construct(){
		
	}

	public static function csrf(){
		Session::set('_token',bin2hex(random_bytes(16)));	
	}

	public static function _token(){
		echo Session::get('_token');	
	}






}



 ?>