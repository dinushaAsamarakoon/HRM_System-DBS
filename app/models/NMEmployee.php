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

    public function registerNewEmployee($params)
    {
        $this->assign($params);
        $this->password = 'password';
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        $this->_db->begin_transaction();
        $this->save_model(1);
        $this->save_model(0);
        $this->_db->commit();

    }
}