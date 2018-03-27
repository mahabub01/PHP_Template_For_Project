<?php 

if(isset($_POST['btn'])){
$tmplocation = $_FILES['file']['tmp_name'];
$upload = 'apps/upload/'.$_FILES['file']['name'];
move_uploaded_file($tmplocation, $upload);
}

 ?>





<div class="container">
	<div class="row">

		<div class="col-md-4 col-md-offset-4" style="background-color: #E6E6E6;margin-top: 50px;">
		<h2>Upoad file</h2>

		<div class="drop">
			
		</div>



		<form action="" method="post" enctype="multipart/form-data" id="myForm">
			  <div class="form-group">
			    <label for="exampleInputEmail1">Upload File</label>
			    <input type="file" name="file">
			  </div>
			<button type="submit" class="btn btn-primary" name="btn">Upload file</button>
		</form>
		<br/><br/>

		<div class="progress">
		  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
		    <span class="sr-only">0% Complete</span>
		  </div>
		</div>



		</div>
	</div>
</div>