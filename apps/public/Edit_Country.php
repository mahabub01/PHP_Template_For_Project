
<?php
if(isset($url[1])){
	$id = $url[1];
}

$input = new Validation();
$db = new DBContext();
$tablename = "country";
$name = "";
foreach ($db->detailsData($tablename,array("id","name"),array("id"=>$id)) as  $value){
	$name = $value['name'];
}

if($_SERVER['REQUEST_METHOD'] == "POST"){
	$input->post("name")->isEmpty();
	$name = $input->values['name'];
	$data = array('name'=>$name);

	if($input->submit()){
		if($db->editData($tablename,$data,$id)){
			echo 'Data Added';
		}

	}else{
		print_r($input->errors);
	}	



}

?>


<form action="" method="post">
<input type="text" name="name" value="<?php echo $name;?>">
<input type="submit" name="btn" value="Create">

</form>


<a href="<?php appsConfig::URL('/home')?>">Back to list</a>