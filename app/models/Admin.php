<?php

class Admin extends Employee
{
    public function __construct()
    {
        parent::__construct();

    }

    public static function currentLoggedInEmployee()
    {
        $user = new Admin();
        $user->findByUserName(Session::get('username'));
        self::$currentLoggedInEmployee = $user;
        return self::$currentLoggedInEmployee;
    }

    public function createNewHRManager()
    {
        return new HRManager();
    }

//    public function registerNewHRManager($params)
//    {
//        $params['is_closed'] = 0;
//        $params['status'] = "available";
//        $this->assign($params);
//        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
//        $this->save();
//    }

//    public function removeEmployee($params)
//    {
//        if ($params['username']) {
//            $this->_db->query("UPDATE employee SET is_closed = ? WHERE username = ?", [1, $params['username']]);
//        }
//    }
    public function removeEmployee($field, $value)
    {
        if ($field) {
            $this->delete($this->_table, $field, $value);
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

    public function addEmployeeAttribute($attributeName, $fields)
    {
        if ($attributeName) {
            $this->create($attributeName, $fields);
        }
    }

}