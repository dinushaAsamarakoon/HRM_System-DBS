<?php

class LeaveRequest extends Model {

    public function __construct()
    {
        $table = 'leave_request';
        parent::__construct($table);
    }

    public function request($params){
        // $params['emp_id'] = Customer::currentLoggedInCustomer()->id;
        // $params['emp_id'] = '1';
        $params['duration'] = '1';
        date_default_timezone_set('Asia/Colombo');
        $params['apply_date'] = date('Y-m-d H:i:s');
        $params['status'] = 'pending';
        // $params['sup_id'] = '1';
        // $params['dept_name'] = '1';

        $this->assign($params);
        $this->save();
    }

    public function getLeaveRequest($id){
        return $this->_db->find('leave_request',[
            'conditions' => 'id=?',
            'bind' => [$id]
        ]);
    }
    
    public function getPendingRequests(){
        return $this->_db->find('leave_request',[
            'conditions' => 'sup_id=? and status=?',
            'bind' => ['3', 'pending']
        ]);
    }
    
    public function getRequestsByEmployee($id){
        return $this->_db->find('leave_request',[
            'conditions' => 'emp_id=?',
            'bind' => [$id]
        ]);
    }
    
}