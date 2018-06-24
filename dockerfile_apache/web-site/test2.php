<?php 

$sapi_type = php_sapi_name();
var_dump ($sapi_type);
// php_sapi_name();
$scanned_files=php_ini_scanned_files();
var_dump ($scanned_files);
phpinfo();
 ?>

