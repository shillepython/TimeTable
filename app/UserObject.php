<?php
namespace app;
use mysqli;

class UserObject
{
    function query($sql)
    {
        return Connection::getInstance()->query($sql);
    }
    public function hello($text) {
        return $text;
    }
}