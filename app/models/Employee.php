<?php

class Employee extends Model
{

    private $_sessionName;
    public static $currentLoggedInEmployee = null;

    public function __construct()
    {
        $table = 'employee';
        $table1 = 'emp_record';
        parent::__construct($table);
        parent::setCustomTableColomns($table1);

    }

    public function findByUserName($username)
    {
        $this->findFirst(['conditions' => 'username=? ', 'bind' => [$username]]);
    }


    public function login()
    {
        Session::set($this->_sessionName, $this->id);
        Session::set('username', $this->username);
        switch ($this->job_title) {
            case "admin":
                Session::set('dashboard','AdminDashboard');
            case "supervisor":
                Session::set('dashboard','SupervisorDashboard');
            case "hr_manager":
                Session::set('dashboard','HRManagerDashboard');
                Session::set('job_class', $this->job_title);
                break;
            default:
                Session::set('dashboard','NMEmployeeDashboard');
                Session::set('job_class', 'nm_employee');
                break;
        }
    }

    public
    function logout()
    {
        Session::delete();
        self::$currentLoggedInEmployee = null;
        return true;

    }

    public
    function getPersonalInfo($id)
    {
        return $this->_db->find('emp_info', [
            'conditions' => 'id=?',
            'bind' => [$id]
        ]);
    }

    public function searchEmployee($name){
        $resEmployees = [];
        $results = $this->_db->find( 'emp_info', ['conditions' => 'id>?', 'bind' => [0]]);
        foreach ($results as $row) {
            if (strpos(strtoupper($row->first_name.' '.$row->last_name), strtoupper($name)) !== false) {
                $resEmployees[] = $row;
            }
        }
        return $resEmployees;
    }

}
