<?php

/**
* Apps Config....
*/ 
class appsConfig 
{
	
	const URL = "http://localhost:8012/phptamplate/";

	public static $pagetitle;

	public static function URL($url){
		echo self::URL.$url;
	}

	public static function Link($url){
		return self::URL.$url;
	}
	
	public static function img($src,$class="",$alt="",$title="",$width="",$height=""){
		echo '<img src="'.self::URL.$src.'" alt="'.$alt.'" title="'.$title.'" width="'.$width.'" height="'.$height.'" class="'.$class.'"/>';
	}

	public static function css($href){
		echo '<link type="text/css" rel="stylesheet" href="'.self::URL.$href.'">';
	}

	public static function js($src){
		echo '<script type="text/javascript" src="'.self::URL.$src.'"></script>';
	}

	public static function Redirect($location){
		header("Location:".self::URL.$location);
		exit;
	}
	
	
	

	public static function loadPageTitle(){
		if(isset($_GET['page'])){
			$url = $_GET['page'];
			$url = rtrim($url,"/");
			$url = explode("/", $url);
			//self::$pagetitle = $url[0];
			if($url[0] = str_replace("_", " ", $url[0])){
				self::$pagetitle = $url[0];
			}
		}
		else{
			self::$pagetitle = "home Page";
		}
	}


	public static function renderBody()
	{
		if(isset($_GET['page'])){
			$url = $_GET['page'];
			$url = rtrim($url,"/");
			$url = explode("/", $url);
			if(file_exists('apps/public/'.$url[0].'.php')){
				require_once 'apps/public/'.$url[0].'.php';
			}
			else{
				require_once 'apps/public/404.php';
			}

		}
		else{
			require_once 'apps/public/home.php';
		}

	}

	public function loadLibaryClass()
	{
		 spl_autoload_register(function($className){
			if(file_exists('systems/libs/'.$className.'.php')){
				include_once 'systems/libs/'.$className.'.php';
			}
			else{
				echo "<pre>Class  not Exit</pre>";
			}
			
		});
	}


	public static function adminRenderBody()
	{
		if(isset($_GET['url'])){
			$url = $_GET['url'];
			$url = rtrim($url,"/");
			if(file_exists('apps/admin/'.$url.'.php')){
				require_once 'apps/admin/'.$url.'.php';
			}
			else{
				require_once 'apps/public/404.php';
			}

		}
		else{
			require_once 'apps/admin/home.php';
		}

	}
	
}


?>