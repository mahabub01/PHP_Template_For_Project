<?php

class Xss 
{

	public static function xssSecurity($pram){
		return htmlspecialchars($pram,ENT_QUOTES, 'UTF-8');
	}
		
}




?>

