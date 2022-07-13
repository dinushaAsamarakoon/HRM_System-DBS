<?php

class LeaveDetails extends Model {

    public function __construct()
    {
        $table = 'emp_leave';
        parent::__construct($table);
    }

    public function getLeaveDetails($id){
        return $this->_db->find('emp_leave',[
            'conditions' => 'id=?',
            'bind' => [$id]
        ]);
    }

}