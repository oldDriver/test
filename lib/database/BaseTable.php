<?php
namespace lib\database;

class BaseTable
{
    protected static $_mysqli;

    protected static function getMysqli()
    {
        if (null === self::$_mysqli) {
            self::$_mysqli = new \mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        }
        return self::$_mysqli;
        
    }

    protected static function doSelect($stmt)
    {
        $result = array();
        $stmt->execute();
        $rows = $stmt->get_result();
        while ($row = $rows->fetch_assoc()) {
            $result[] = $row;
        }
        $stmt->close();
        return $result;
    }

    protected static function doSelectOne($stmt)
    {
        $stmt->execute();
        $row = $stmt->get_result();
        return $row->fetch_assoc();
    }

    protected static function run($stmt)
    {
        //echo __METHOD__; exit;
        $stmt->execute();
        printf("%d Row inserted.\n", $stmt->affected_rows);
        $stmt->close();
    }
}