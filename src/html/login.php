<?php

namespace html;

require_once __DIR__ . '/../lib/framework/main.php';

use app\controller\AuthController;

$controller = new AuthController();
$controller->loginForm();

if(@$_GET['msg']) {
	echo $_GET['msg'];
}