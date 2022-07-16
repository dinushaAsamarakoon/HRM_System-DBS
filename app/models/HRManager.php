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


    public function removeEmployee($tables, $field, $value)
    {
        if ($field) {
            $this->_db->begin_transaction();
            foreach ($tables as $table) {
                $this->delete($table, $field, $value);
            }
            $this->_db->commit();
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

    public function reportGeneration($table, $params = [])
    {
        return $this->findWithTable($table, $params);
    }

    public
    function getAllEmployees($dept_name ,$pay_grade,$job_title)
    {
        if (empty($dept_name) and empty($pay_grade) and empty($job_title)) {
            return $this->_db->find('emp_info', [
                'conditions' => ['job_title!=?'],
                'bind' => ['admin']
            ]);
        }else if (empty($dept_name) and empty($pay_grade)) {
            return $this->_db->find('emp_info', [
                'conditions' => ['job_title!=?','job_title=?'],
                'bind' => ['admin',$job_title]
            ]);

        }else if (empty($dept_name) and empty($job_title)) {
            return $this->_db->find('emp_info', [
                'conditions' => ['job_title!=?','pay_grade=?'],
                'bind' => ['admin',$pay_grade]
            ]);

        }else if (empty($job_title) and empty($pay_grade)) {
            return $this->_db->find('emp_info', [
                'conditions' => ['job_title!=?','dept_name=?'],
                'bind' => ['admin',$dept_name]
            ]);

        }else if (empty($dept_name)) {
            return $this->_db->find('emp_info', [
                'conditions' => ['job_title!=?','job_title=?','pay_grade=?'],
                'bind' => ['admin',$job_title,$pay_grade]
            ]);

        }else if (empty($job_title)) {
            return $this->_db->find('emp_info', [
                'conditions' => ['job_title!=?','dept_name=?','pay_grade=?'],
                'bind' => ['admin',$dept_name,$pay_grade]
            ]);

        }else if (empty($pay_grade)) {
            return $this->_db->find('emp_info', [
                'conditions' => ['job_title!=?','job_title=?','dept_name=?'],
                'bind' => ['admin',$job_title,$dept_name]
            ]);

        }
        return $this->_db->find('emp_info', [
            'conditions' => ['job_title!=?', 'dept_name=?', 'pay_grade=?', 'job_title=?'],
            'bind' => ['admin', $dept_name,$pay_grade,$job_title]
        ]);

    }

    public function getEmployeeDetails($id)
    {
        return $this->_db->find('emp_info', [
            'conditions' => 'id=?',
            'bind' => [$id]
        ]);
    }

    public function getDeptNames()
    {
        return $this->_db->query("SELECT dept_name FROM department")->results();
    }

    public function getPayGrades()
    {
        return $this->_db->query("SELECT pay_grade FROM pay_grade")->results();
    }

    public function getJobTitles()
    {
        return $this->_db->query("SELECT title_name FROM job_title")->results();
    }

    public function getEmpStatus()
    {
        return $this->_db->query("SELECT * FROM emp_status")->results();
    }

    public function getSupLevels()
    {
        return $this->_db->query("SELECT sup_level FROM supervisor")->results();
    }


    public function getSupervisorLevel($sup_id)
    {
        return $this->_db->find('supervisor', [
            'conditions' => 'id=?',
            'bind' => [$sup_id]
        ]);
    }

    public function getSupIds()
    {
        return $this->_db->query("SELECT id FROM supervisor")->results();
    }

    public function getAllEmpIds()
    {
        return $this->_db->query("SELECT id FROM emp_record")->results();
    }

    public function getTotalLeavesByEmployee($id, $start = '', $end = '')
    {
//        dnd($id);
        $leaves = $this->_db->find('leave_request', [
            'conditions' => ['emp_id=?', 'status=?'],
            'bind' => [$id, 'approved']
        ]);
        $leaves_count = 0;
        if ($leaves) {
            if (empty($start . $end)) {
                foreach ($leaves as $leave) {
                    $leaves_count += $leave->duration;
                }
            } else {
                $period_start = new DateTime($start);
                $period_end = new DateTime($end);
                foreach ($leaves as $leave) {
                    $leave_start_date = new DateTime($leave->start_date);
                    $leave_end_date = new DateTime($leave->end_date);
                    if ($period_start <= $leave_start_date and $leave_end_date <= $period_end) {
                        $leaves_count += $leave->duration;
                    } else if ($period_start <= $leave_start_date and $leave_end_date >= $period_end) {
                        $leaves_count += $leave_start_date->diff($period_end)->format('%a');
                    } else if ($period_start >= $leave_start_date and $leave_end_date <= $period_end) {
                        $leaves_count += $period_start->diff($leave_end_date)->format('%a');
                    } else if ($period_start >= $leave_start_date and $leave_end_date >= $period_end) {
                        $leaves_count += $period_start->diff($period_end)->format('%a');
                    }
                }
            }
        }
        return $leaves_count;
    }


    public function editEmployee($id, $params)
    {
        $this->update_entry('emp_record', $id, $fields);
        $this->update_entry('employee', $id, $fields);
        if ($fields['job_title'] === 'supervisor')
            $this->update_entry('supervisor', $id, $fields);
    }
}