<h1>Details Page</h1>

<?php

if(isset($url[1])){
	$id =$url[1];
}
$db = new DBContext();
$tablename = "country";
echo '<table>';
foreach ($db->detailsData($tablename,array("id","name"),array("id"=>$id)) as $key => $value) {
	echo '<tr>';
	echo '<td>'.$value['id'].'</td>';
	echo '<td>'.$value['name'].'</td>';
	echo '<td><a href="">Edit</a></td>';
	echo '<td><a href="">Delete</a></td>';
	echo '</tr>';
}
echo '</table>';


?>




<a href="<?php appsConfig::URL('/home')?>">Back To List</a> | 
<a href="<?php appsConfig::URL('/homeCreate')?>">Create</a>


