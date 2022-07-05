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

    public function registerNewEmployee($params)
    {
        $params['is_closed'] = 0;
        $params['status'] = "available";
        $this->assign($params);
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        $this->save();
    }
}