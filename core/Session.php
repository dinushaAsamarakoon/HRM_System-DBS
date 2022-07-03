<?php

class Session
{

    public static function exists($name)
    {
        return isset($_SESSION[$name]);
    }

    public static function get($name)
    {
        return $_SESSION[$name];
    }

    public static function set($name, $value)
    {
        return $_SESSION[$name] = $value;
    }

    public static function delete()
    {
        session_unset();
    }

}