
<?php
		
	class Validation 
	{
		public $values = array();
		public $errors = array();
		public $currentValue;

		function __construct(){
			
		}

		

		public function post($key){
			$this->values[$key] = strip_tags(stripslashes(trim(Xss::xssSecurity($_POST[$key]))));
			$this->currentValue = $key;
			return $this;
		}





		public function isEmpty(){
			if(empty($this->values[$this->currentValue])){
				$this->errors[$this->currentValue]['empty'] = "Field must not be Empty";
			}
			return $this;
		}


		public function length($min=0,$max){
			if (strlen($this->values[$this->currentValue]) < $min or strlen($this->values[$this->currentValue]) > $max) {
				$this->errors[$this->currentValue]['length'] = "Should min".$min." and max ".$max." Characters";
			}

			return $this;
		}


		public function submit(){
			if(empty($this->errors)){
				if(!isset($_POST['_token']) || ($_POST['_token'] !== Session::get('_token'))){
					die('Invalid CSRF token');
					return false;
				}else{
					return true;
				}	
			}
			else{
				return false;	
			}
			
		}


		public function character()
		{
			if(!preg_match('%^[A-Za-z ]+$%', $this->values[$this->currentValue])){
				$this->errors[$this->currentValue]['character'] = " Input must be Characters";
			}
			return $this;	
		}

		public function digit()
		{
			if(!preg_match('%^[0-9]+$%', $this->values[$this->currentValue])){
				$this->errors[$this->currentValue]['digit'] = " Input must be Digit";
			}
			return $this;	
		}


		public function password()
		{
			if(!preg_match('%^[A-Za-z\.\-\$]+$%', $this->values[$this->currentValue])){
				$this->errors[$this->currentValue]['password'] = " input is not valid for password";
			}
			return $this;	
		}


		public function compareRepeatPassword($pass1,$pass2)
		{
			echo $pass1;
			echo $pass2;
			if($pass1 != $pass2){
				echo 'testing';
				$this->errors['password']['password'] = " Password does not match";
				print_r($this->errors);
			}
			return $this;
		}


		public function email()
		{
			if(!filter_var($this->values[$this->currentValue], FILTER_VALIDATE_EMAIL))
			{
				$this->errors[$this->currentValue]['email'] = "Email is not Valid";
			}
			return $this;	
		}


	}
		
	?>		


