<?php

namespace html;

use app\controller\AppUserController;
use lib\helper\HttpHelper;

require_once __DIR__ . '/../lib/framework/main.php';

require_once 'isLogin.inc.php';
require_once 'isLevelTwoUser.inc.php';

$action = HttpHelper::getRequest('action', 'get');

if ($action == 'excel')
{
    $startDate = HttpHelper::getRequest('startDate', 'get');
    $endDate = HttpHelper::getRequest('endDate', 'get');
}
else
{
    $startDate = HttpHelper::getRequest('startDate', 'post');
    $endDate = HttpHelper::getRequest('endDate', 'post');
}

$controller = new AppUserController();
$controller->getIcbcActivationGo($startDate, $endDate, $action);
