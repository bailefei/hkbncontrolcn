<?php

namespace app\controller;

use app\controller\session\PhpSession;
use app\view\SmartyTemplateView;

class IndexController
{
    public function view() {
        $session = new PhpSession();
        $data['userLevel'] = $session->getVar('userLevel');

        $view = new SmartyTemplateView();
        echo $view->renderWithData($data, 'index');
    }
}