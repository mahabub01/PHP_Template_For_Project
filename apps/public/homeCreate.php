<div class="container">

<?php

$input = new Validation();
$db = new DBContext();
if($_SERVER['REQUEST_METHOD'] == "POST"){
	$input->post("name")->isEmpty();
	$name = $input->values['name'];

	$tablename = "country";
	$data = array('name'=>$name);

	if($input->submit()){
		if($db->addData($tablename,$data)){
			echo 'Data Added';
		}

	}else{
		print_r($input->errors);
	}	



}

?>




<form action="" method="post">

<input type="text" name="name">
<input type="submit" name="btn" value="Create">

</form>


<a href="<?php appsConfig::URL('/home')?>">Back to list</a>


</div>