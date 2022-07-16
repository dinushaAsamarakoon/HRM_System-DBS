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
    public function registerNewHRManager($params)
    {
        $this->assign($params);
        $this->password = 'password';
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        $this->_db->begin_transaction();
        $this->save_model(1);
        $this->save_model(0);
        $this->_db->commit();
    }



    public function removeEmployee($table, $field, $value)
    {
        if ($field) {
            $this->delete($table, $field, $value);
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

    public function addNewAttributeType($table, $params)
    {
        $columns = $this->assignInd($table, $params);
        $this->insertAttributeType($table, $columns);
    }

    public function showRemovingAttributeType($table, $params)
    {
        if ($params['field']) {
            return $this->_db->find($table, [
                'conditions' => 'field=?',
                'bind' => [$params['field']]]);
        }
    }

    public function removeAttributeType($table, $field, $value)
    {
        if ($field) {
            $this->delete($table, $field, $value);
        }
    }

    public function reportGeneration($table, $params=[]){
        return $this->findWithTable($table,$params);
    }

    public
    function getAllEmployees()
    {
        return $this->_db->find('emp_info', [
            'conditions' => 'job_title!=?',
            'bind' => ['admin']
        ]);
    }

    public function getEmployeeDetails($id){
        return $this->_db->find('emp_info', [
            'conditions' => 'id=?',
            'bind' => [$id]
        ]);
    }

    public function getDeptNames(){
        return $this->_db->query("SELECT dept_name FROM department")->results();
    }

    public function getEmpStatus(){
        return $this->_db->query("SELECT * FROM emp_status")->results();
    }

    public function getSupLevels(){
        return $this->_db->query("SELECT sup_level FROM supervisor")->results();
    }
}