<?php

class Employee extends Model
{

    private $_sessionName;
    public static $currentLoggedInEmployee = null;

    public function __construct()
    {
        $table = 'employee';
        parent::__construct($table);

    }

    public function findByUserName($username)
    {
        $this->findFirst(['conditions' => 'username=? ', 'bind' => [$username]]);
    }
    

    public function login()
    {
        Session::set($this->_sessionName, $this->emp_id);
        Session::set('username', $this->username);
        switch ($this->job_title) {
            case "hr_manager":
                Session::set('job_class', $this->job_title);
                break;
            case "admin":
                Session::set('job_class', $this->job_title);
                break;
            case "supervisor":
                Session::set('job_class', $this->job_title);
                break;
            default:
                Session::set('job_class', 'nm_employee');
                break;
        }

    }


//    public function registerNewEmployee($params)
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
//
//    public function showRemovingEmployee($params)
//    {
//        if ($params['username']) {
//            return $this->_db->find('employee', [
//                'conditions' => 'username=?',
//                'bind' => [$params['username']]]);
//        }
//    }

    public function logout()
    {
        Session::delete();
        self::$currentLoggedInEmployee = null;
        return true;

    }

    public function getWorkerEmployees()
    {
        return $this->_db->find('users', [
            'conditions' => 'role=? and is_closed=?',
            'bind' => ['worker', 0]
        ]);
    }

    public function getPersonalInfo($id) {
        return $this->_db->find('employee',[
            'conditions' => 'id=?',
            'bind' => [$id]
        ]);
    }

}
