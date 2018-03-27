<?php
$db = new DBContext();
$input = new Validation();
$tablename= "country";

if(isset($_POST['btn'])){
	$input->post("name")->isEmpty();
	$name = $input->values['name'];
	if($input->submit()){	
			$data = array('name'=>$name);
			if($db->addData($tablename,$data)){
				
					$mgs = serialize('Well done! Data added Successfully');
				   appsConfig::Redirect('panel.php?url=testlist&&mgs='.$mgs);
			}
			else
			{
				echo '<div class="alert alert-danger" role="alert">Error ! Data added Successfully Fail</div>';

			}

		
	}
	else{
		print_r($input->errors);
	}
}


?>


<?php Csrf::csrf();?>