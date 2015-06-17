<?php

// For development
error_reporting(E_ALL);
ini_set("display_errors", 1);

// For production
//error_reporting(0);
//ini_set("display_errors", 0);

define('PROJECT_NAME', 'hkbncontrolcn');

define('SERVER_HTML_BASE_PATH', '/Applications/mampstack-5.4.40-0/apache2/htdocs/');
//define('SERVER_HTML_BASE_PATH', '/var/www/html/');

define('SERVER_SMARTY_LIB_PATH', '/Applications/mampstack-5.4.40-0/frameworks/smarty/libs/Smarty.class.php');
//define('SERVER_SMARTY_LIB_PATH', '/usr/local/lib/php/Smarty/Smarty.class.php');

define('SERVER_SMARTY_WORKING_PATH', '/Applications/mampstack-5.4.40-0/apache2/htdocs/hkbncontrolcnTemplates/');

define('SERVER_SMARTY_TEMPLATES_PATH', '/hkbncontrolcn/src/html/templates/');

define('URL_SMARTY_TEMPLATES_PATH', '/hkbncontrolcn/src/html/templates/');

define('PHPEXCEL_LIB_PATH', '/Applications/mampstack-5.4.40-0/frameworks/PHPExcel/PHPExcel.php');

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', 'bailefei');
define('DB_NAME', 'hkbncontrolcn');

date_default_timezone_set('Asia/Hong_Kong');

define('APP_Code', '1');
define('APP_ICBC', '2');
define('APP_ELong', '3');
define('APP_CdVip', '4');

define('PORTAL_HOST_BASE', 'http://localhost:8080/hkbnwifi/src/html');