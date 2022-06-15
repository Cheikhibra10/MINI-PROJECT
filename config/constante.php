<?php
define('WEB_ROUTE', "http://localhost:8000");
/*define("UPLOADIMAGE", ROUTE_DIR.'img/'.$saved_name);*/

define("ROUTE_DIR" , str_replace('public', '', $_SERVER['DOCUMENT_ROOT']));
define("UPLOAD_DIR" , ROUTE_DIR. 'public/images/uploads/');
?>
