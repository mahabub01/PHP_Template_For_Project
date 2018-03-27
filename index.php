<?php
ob_start();
session_start();
header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
 
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
	<title><?php echo appsConfig::$pagetitle;?></title>
	<?php appsConfig::css('apps/css/bootstrap.css')?>
	<?php appsConfig::css('apps/css/style.css')?>
	<script src="https://use.fontawesome.com/6c0b2c8d9a.js"></script>
</head>
<body>




<?php
include_once 'apps/public/header.php';
appsConfig::renderBody();
include_once 'apps/public/footer.php';
?>






<?php appsConfig::js('/apps/js/jquery.js')?>
<?php appsConfig::js('/apps/js/bootstrap.js')?>
</body>
</html>

<?php ob_end_flush();?>






