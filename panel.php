<?php
ob_start();
session_start();
require_once 'config/appsConfig.php';
require_once 'middleware/Xss.php';
require_once 'middleware/Csrf.php';
$apps = new appsConfig();
appsConfig::loadLibaryClass();
appsConfig::loadPageTitle();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<title><?php echo appsConfig::$pagetitle;?></title>
	<?php appsConfig::css('apps/css/bootstrap.css')?>
	<?php appsConfig::css('apps/css/admin.css')?>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">

	<?php appsConfig::js('/apps/js/jquery.js')?>
	<script src="http://malsup.github.com/jquery.form.js"></script> 






	<script type="text/javascript" src="http://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>

	<script src="http://cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>

	<script src="https://use.fontawesome.com/6c0b2c8d9a.js"></script>
</head>
<body>

<div class="container-fluid">
<div class="row" style="background-color: #424F5A;min-height: 60px;">
<div class="col-md-6">
<h3 style="color:white">Dashboard</h3>
</div>

<div class="col-md-1 col-md-offset-5">
<p style="padding-top: 20px;"><a href="admin.php?admin=logout" style="color:white"><i class="fa fa-power-off" aria-hidden="true"></i> Logout</a></p>
</div>
</div>

<div class="row">

<div class="col-md-2" style="padding: 0px;">
	<div class="left-admin">
		<?php appsConfig::img('apps/images/Administrator-icon.png',"img-circle admin-img")?>

		<h4><?php echo Session::get("name");?></h4>
		<br/>
		<ul>
			<li><a href="panel.php?url=home"><i class="fa fa-life-ring" aria-hidden="true"></i> Home</a></li>
			<li><a href="panel.php?url=testlist"><i class="fa fa-life-ring" aria-hidden="true"></i> Test</a></li>

			<li><a href="panel.php?url=filelist"><i class="fa fa-life-ring" aria-hidden="true"></i> File</a></li>
			
			
		</ul>










	</div>
</div>



<div class="col-md-10">
	<div class="right-admin">
		<?php
		appsConfig::adminRenderBody();
		?>
	</div>
</div>



</div>
</div>




<?php appsConfig::js('/apps/js/bootstrap.js')?>
<?php appsConfig::js('/apps/js/custom.js')?>
</body>
</html>

<?php ob_end_flush();?>






