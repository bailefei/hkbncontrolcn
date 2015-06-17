<?php

namespace html;

use app\controller\AppUserController;
use lib\helper\HttpHelper;

require_once __DIR__ . '/../lib/framework/main.php';

require_once 'isLogin.inc.php';

$username = HttpHelper::getRequest('username', 'post');
$appId = HttpHelper::getRequest('appId', 'post');

$controller = new AppUserController();
$controller->get($username, $appId);
