<?php

class HRManager extends Employee
{
    public function __construct()
    {
        parent::__construct();
    }

    public static function currentLoggedInEmployee()
    {
        $user = new HRManager();
        $user->findByUserName(Session::get('username'));
        self::$currentLoggedInEmployee = $user;
        return self::$currentLoggedInEmployee;
    }

    public function createNewSupervisor()
    {
        return new Supervisor();
    }

    public function createNewNMEmployee()
    {
        return new NMEmployee();
    }

    public function registerNewEmployee($params)
    {
        $params['is_closed'] = 0;
        $params['status'] = "available";
        $this->assign($params);
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        $this->save();
    }

    public function removeEmployee($params)
    {
        if ($params['username']) {
            $this->_db->query("UPDATE employee SET is_closed = ? WHERE username = ?", [1, $params['username']]);
        }
    }

    public function showRemovingEmployee($params)
    {
        if ($params['username']) {
            return $this->_db->find('employee', [
                'conditions' => 'username=?',
                'bind' => [$params['username']]]);
        }
    }
}