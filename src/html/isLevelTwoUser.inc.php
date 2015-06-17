<?php

namespace html;

require_once __DIR__ . '/../lib/framework/main.php';

use app\controller\session\PhpSession;

$session = new PhpSession();
$userLevel = $session->getVar('userLevel');
if ($userLevel != 2)
{
	exit;
}