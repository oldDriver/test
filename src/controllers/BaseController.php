<?php
namespace src\controllers;

use src\models\UserTable;
use lib\Session;

abstract class BaseController
{
    protected $request;

    protected function preExecute()
    {
        
    }

    protected function getUser()
    {
        $user = UserTable::getUser(Session::getInstance()->get('userId', null));
        return $user;
    }

    protected function redirect($url = '/')
    {
        return header("Location: http://".$_SERVER['HTTP_HOST'].'/'.$url);
    }

    protected function reload()
    {
        return header("Location: ".$_SERVER['HTTP_REFERER']);
    }
}