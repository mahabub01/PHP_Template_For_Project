

<?php

$db = new DBContext();
$tablename = "country";

//start delete method

if(isset($url[1])){
	$id = $url[1];
	$db->deleteData($tablename,array("id"=>$id));
}

//end delete method



echo '
<div class="container">
<a href="'.appsConfig::Link('homeCreate').'">Create</a>
<hr/>
<table class="table">';
foreach ($db->getData($tablename,array("id","name")) as $key => $value) {
	echo '<tr>';
	echo '<td>'.$value['id'].'</td>';
	echo '<td>'.$value['name'].'</td>';
	echo '<td><a href="'.appsConfig::Link('/edit_country/'.$value['id']).'">Edit</a></td>';
	echo '<td><a href="'.appsConfig::Link('/home/'.$value['id']).'" onclick="return confirm(\'Are you Sure Delete it ???\')">Delete</a></td>';

	echo '<td><a href="'.appsConfig::Link('/home_details/'.$value['id']).'" >Details</a></td>';
	echo '</tr>';
}
echo '</table>
</div>
';


?>







