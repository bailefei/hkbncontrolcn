<?php

namespace html;

use app\controller\AppUserController;

require_once __DIR__ . '/../lib/framework/main.php';

require_once 'isLogin.inc.php';

$controller = new AppUserController();
$controller->getForm();
