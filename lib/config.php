<?php

$path_root = "/thairoute"; #ถ้า root ไม่ได้อยู่ public
define("_http", "https");

define("_DIR", str_replace("\\", '/', dirname(__FILE__)));
define("_URI", basename($_SERVER["REQUEST_URI"]));
define("_URL", _http . "://" . $_SERVER['HTTP_HOST'] . $path_root . "/");
define("_FullUrl", _http . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
define("_Domain", _http . "://" . $_SERVER['HTTP_HOST']);

## config Sql ##
$coreLanguageSQL = "mysqli";
$core_db_hostname = "localhost";
$core_db_username = "root";
$core_db_password = "";
$core_db_name = "thairoute";
$core_db_charecter_set = array('charset' => "utf8", 'collation' => "utf8_general_ci");

#database table
$config['route']['db'] = 'route';
$config['route']['station'] = 'route_station';
$config['route']['fare'] = 'route_fare';
$config['station']['db'] = 'station';
$config['name']['website'] = 'โปรแกรมจัดเก็บข้อมูลเส้นทางเดินรถ';
?>