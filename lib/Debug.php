<?php
namespace lib;

class Debug
{
    public static function display($data)
    {
        echo '<pre>';
        print_r($data);
        echo '</pre>';
    }
}