<?php
namespace lib;

class Request
{
    protected static $_instance;

    public function __construct()
    {
        
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