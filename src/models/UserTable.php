<?php
namespace src\models;

use lib\database\BaseTable;
use lib\Debug;
use src;

class UserTable extends BaseTable
{
    private static $table = 'user';

    public static function getUser($id)
    {
        if ($id) {
            $mysqli = self::getMysqli();
            $stmt = $mysqli->prepare('SELECT * FROM '.self::$table.' WHERE id = ?');
            $stmt->bind_param('i', $id);
            return self::doSelectOne($stmt);
        }
        return null;
    }

    public static function findUserByUsername($username)
    {
        if ($username) {
            $mysqli = self::getMysqli();
            $stmt = $mysqli->prepare('SELECT * FROM '.self::$table.' WHERE username = ?');
            $stmt->bind_param('s', $username);
            return self::doSelectOne($stmt);
        }
        return null;
    }

    public static function update($user)
    {
         
    }

    public static function insert($user)
    {
        $mysqli = self::getMysqli();
        $stmt = $mysqli->prepare(
            'INSERT INTO '.self::$table.' 
                (username, firstname, lastname, email, password, salt, createdAt, updatedAt)
            VALUES
                (?, ?, ?, ?, ?, ?, ?, ?)'
        );
        $stmt->bind_param(
            'ssssssss',
            $username,
            $firstname,
            $lastname,
            $email,
            $password,
            $salt,
            $createdAt,
            $updatedAt
        );
        $username = $user->getUsername();
        $firstname = $user->getFirstname();
        $lastname = $user->getLastname();
        $email = $user->getEmail();
        $password = $user->getPassword();
        $salt = $user->getSalt();
        $createdAt = $user->getCreatedAt();
        $updatedAt = $user->getUpdatedAt();
        $stmt->execute();
        $id = $stmt->insert_id;
        $stmt->close();
        return $id;
    }
}