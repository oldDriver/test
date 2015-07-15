<?php
namespace src\services;

use src\models\UserTable;

class UserService
{
    public static function login($username, $password)
    {
        $user = UserTable::findUserByUsername($username);
        if (md5($password.$user['salt']) == $user['password']) {
            return $user['id'];
        }
        return null;
    }
}