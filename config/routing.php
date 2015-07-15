<?php 
$route = array(
    '/' => array(
         'controller' => 'src\controllers\IndexController',
         'action' => 'indexAction',
         'view' => 'index',
    ),
    '/register' => array(
         'controller' => 'src\controllers\IndexController',
         'action' => 'registerAction',
         'view' => 'register'
    ),
    '/profile' => array(
         'controller' => 'src\controllers\UserController',
         'action' => 'profileAction',
         'view' => 'profile',
         'secure' => 'user'
    ),
    '/login' => array(
        'controller' => 'src\controllers\UserController',
        'action' => 'loginAction',
        'view' => 'login'
    ),
    '/logout' => array(
        'controller' => 'src\controllers\UserController',
        'action' => 'logoutAction',
        'view' => 'index',
    ),
    '/culture' => array(
        'controller' => 'src\controllers\IndexController',
        'action' => 'cultureAction',
        'view' => 'index'
    ),
);