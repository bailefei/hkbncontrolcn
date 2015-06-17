<?php

namespace app\controller;

use app\view\SmartyTemplateView;
use lib\helper\ExcelHelper;

class AppUserController
{
    const CONTROL_SECRET = '3f9cf1e38e2a8e3865019d9f9e2d8cd81c262d3b';

    public function getForm() {
        $view = new SmartyTemplateView();
        $data['AppOption'] = $this->getAppOption();
        echo $view->renderWithData($data, 'account_query_get_result');
    }

    private function getAppOption()
    {
        return array(
                0 => 'All',
                APP_ICBC => 'ICBC',
                APP_ELong => 'Elong',
                APP_CdVip => 'VIP',
            );
    }

    public function get($username, $appId, $startDate = 0, $endDate = 0)
    {
        $startTimestamp =  strtotime($startDate);
        $endTimestamp =  strtotime($endDate);
        $parameter = sprintf('?s=%s&a=%s&u=%s&sd=%s&ed=%s', self::CONTROL_SECRET, $appId, $username,
            $startTimestamp, $endTimestamp);
        $url = PORTAL_HOST_BASE . '/control/account_query_get_go.php' . $parameter;
        $jsonResult = file_get_contents($url);
        $result = json_decode($jsonResult, true);

        $data = array();
        $data['username'] = $username;
        $data['AppOption'] = $this->getAppOption();
        $data['user'] = $result[0];
        $data['log'] = $result[1];
        $data['hasData'] = (count($result[0]) != 0);

        $view = new SmartyTemplateView();
        echo $view->renderWithData($data, 'account_query_get_result');
    }

    public function getLogForm() {
        $view = new SmartyTemplateView();
        echo $view->render('log_appuser_get_result');
    }

    public function getLog($appId, $groupId, $action, $actionUsername)
    {
        $parameter = sprintf('?s=%s&a=%s&g=%s&act=%s&au=%s', self::CONTROL_SECRET,
            $appId, $groupId, $action, $actionUsername);
        $url = PORTAL_HOST_BASE . '/control/log_appuser_get_go.php' . $parameter;
        $jsonResult = file_get_contents($url);
        $result = json_decode($jsonResult, true);
        $view = new SmartyTemplateView();
        echo $view->renderWithData($result, 'log_appuser_get_result');
    }

    public function getIcbcActivationForm() {
        $view = new SmartyTemplateView();
        $data = array();
        echo $view->renderWithData($data, 'icbc_activation_get_result');
    }

    public function getIcbcActivationGo($startDate, $endDate, $action)
    {
        $startTimestamp = (empty($startDate)) ? '' : strtotime($startDate);
        $endTimestamp = (empty($endDate)) ? '' : strtotime($endDate) + 60 * 60 * 24;
        $parameter = sprintf('?s=%s&appId=%s&createDateFrom=%s&createDateTo=%s&action=%s', self::CONTROL_SECRET,
            APP_ICBC, $startTimestamp, $endTimestamp, 'Activation');
        $url = PORTAL_HOST_BASE . '/control/log_user_get_go.php' . $parameter;
        $jsonResult = file_get_contents($url);
        $result = json_decode($jsonResult, true);
        if (! $result)
        {
            $result = array();
        }
        $data = array(
            'startDate' => $startDate,
            'endDate' => $endDate,
            'rows' => $result['data'],
            'total' => count($result['data']));
        if ($action == 'excel')
        {
            $col = array(
                '激活帐号' => 'LogUser_Username',
                '內容' => 'LogUser_Message',
                '日期' => 'LogUser_CreateDate',
            );
            $excel = new ExcelHelper();
            $excel->export('ICBC Activation Records', $col, $result);
        }
        else
        {
            $view = new SmartyTemplateView();
            echo $view->renderWithData($data, 'icbc_activation_get_result');
        }
    }
}