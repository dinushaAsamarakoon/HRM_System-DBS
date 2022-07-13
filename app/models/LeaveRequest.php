<?php

class LeaveRequest extends Model {

    public function __construct()
    {
        $table = 'leave_request';
        parent::__construct($table);
    }

    public function request($params){
        date_default_timezone_set('Asia/Colombo');
        $emp = NMEmployee::currentLoggedInEmployee();
        $params['emp_id'] = $emp->id;
        $sup_id = $emp->sup_id;
        $params['sup_id'] = $sup_id;
        $params['sup_id'] = '3';
        $params['apply_date'] = date('Y-m-d');
        $params['duration'] = 1 + (strtotime($params['end_date']) - strtotime($params['start_date'])) / (60*60*24);
        $params['status'] = 'pending';
        $params['dept_name'] = 'NMI';
        $params['completed'] = '0';
        $this->assign($params);
        $this->save();
    }

    public function getLeaveRequest($id){
        return $this->_db->find('leave_request',[
            'conditions' => 'id=?',
            'bind' => [$id]
        ]);
    }
    
    public function getPendingRequests($sup_id){
        return $this->_db->find('leave_request',[
            'conditions' => 'sup_id=? and status=?',
            'bind' => [$sup_id, 'pending']
        ]);
    }
    
    public function getRequestsByEmployee($id){
        return $this->_db->find('leave_request',[
            'conditions' => 'emp_id=?',
            'bind' => [$id]
        ]);
    }
    
    public function getIncompleteRequests($id){
        return $this->_db->find('leave_request',[
            'conditions' => 'id=? and completed=?',
            'bind' => [$id, false]
        ]);
    }

}