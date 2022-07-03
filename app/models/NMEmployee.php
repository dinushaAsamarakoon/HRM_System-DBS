<?php

class NMEmployee extends Employee
{
    public function __construct()
    {
        parent::__construct();
    }
    public static function currentLoggedInEmployee()
    {
        $user = new NMEmployee();
        $user->findByUserName(Session::get('username'));
        self::$currentLoggedInEmployee = $user;
        return self::$currentLoggedInEmployee;
    }
}