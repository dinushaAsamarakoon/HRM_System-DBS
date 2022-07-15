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
        $params['sup_id'] = $emp->sup_id;
        $params['apply_date'] = date('Y-m-d');
        $params['duration'] = 1 + (strtotime($params['end_date']) - strtotime($params['start_date'])) / (60*60*24);
        $params['status'] = 'pending';
        $params['dept_name'] = $emp->dept_name;
        $params['completed'] = '0';
        $this->assignVal($params);
        $this->save();
    }
    
    public function getPendingRequests($sup_id){
        return $this->_db->find('req_info',[
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
            'conditions' => 'emp_id=? and completed=? and status!=?',
            'bind' => [$id, false, 'pending']
        ]);
    }

}