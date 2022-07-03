<?php

class Supervisor extends Employee
{
    public function __construct()
    {
        parent::__construct();
    }
    public static function currentLoggedInEmployee()
    {
        $user = new Supervisor();
        $user->findByUserName(Session::get('username'));
        self::$currentLoggedInEmployee = $user;
        return self::$currentLoggedInEmployee;
    }
}