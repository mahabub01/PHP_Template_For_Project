
<?php
if(isset($_GET['success'])){
	echo '<div class="alert alert-success" role="alert">'.$_GET['success'].'</div>';

}else if(isset($_GET['error'])){
	echo '<div class="alert alert-error" role="alert">'.$_GET['error'].'</div>';

}







?>



