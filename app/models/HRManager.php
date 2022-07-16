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
    function getAllEmployees($dept_name='')
    {
        if(empty($dept_name)){
            return $this->_db->find('emp_info', [
                'conditions' => ['job_title!=?'],
                'bind' => ['admin']
            ]);
        }
        return $this->_db->find('emp_info', [
            'conditions' => ['job_title!=?','dept_name=?'],
            'bind' => ['admin',$dept_name]
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

    public function getSupervisorLevel($sup_id){
        return $this->_db->find('supervisor', [
            'conditions' => 'id=?',
            'bind' => [$sup_id]
        ]);
    }

    public function getSupIds(){
        return $this->_db->query("SELECT id FROM supervisor")->results();
    }

    public function getAllEmpIds(){
        return $this->_db->query("SELECT id FROM emp_record")->results();
    }

    public function getTotalLeavesByEmployee($id,$start='',$end=''){
        $leaves = $this->_db->find('leave_request', [
            'conditions' => ['emp_id=?','status=?'],
            'bind' => [$id,'approved']
        ]);
//        dnd($leaves);


        if(empty($start.$end)){
            foreach ($leaves as $leave){
                $date1 = new DateTime($leave->start_date);
                $date2 = new DateTime($leave->end_date);
                $interval = $date1->diff($date2);

                dnd($interval->days);
            }
        }
    }


}