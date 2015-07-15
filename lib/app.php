<?php
session_start();

use lib\Page;
use lib\Request;
use lib\Session;
use lib\Debug;

/**
 * get config file
 */
include_once dirname(__DIR__).'/config/config.php';

include_once dirname(__DIR__).'/config/routing.php';

$url = isset($_REQUEST['_url']) ? $_REQUEST['_url'] : '/';

function __autoload($className)
{
    $className = str_replace('\\', '/', $className);
    include dirname(__DIR__).'/'.$className.'.php';
}
// translations
function __($text)
{
    if (!isset($GLOBALS['messages'])) {
        $culture = Session::getInstance()->get('culture', 'en');
        include_once dirname(__DIR__).'/i18n/'.$culture.'/messages.php';
        $GLOBALS['messages'] = $messages;
    } else {
        $messages = $GLOBALS['messages'];
    }
    if (isset($messages[$text])) {
        return $messages[$text];
    }
    return $text;
}

include_once 'Page.php';
$view = isset($route[$url]) ? $route[$url] : $route['/'];
$Controller = new $view['controller'];
$page = new Page($Controller, $view['action'], $view['view']);
