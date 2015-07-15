<?php
namespace lib;

class Session
{
    protected static $_instance;

    public function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public function get($key, $default)
    {
        return (isset($_SESSION[$key])) ? $_SESSION[$key] : $default;
    }

    public function destroy($key)
    {
        unset($_SESSION[$key]);
    }

    public static function getInstance()
    {
        // проверяем актуальность экземпляра
        if (null === self::$_instance) {
            // создаем новый экземпляр
            self::$_instance = new self();
        }
        // возвращаем созданный или существующий экземпляр
        return self::$_instance;
    }
}