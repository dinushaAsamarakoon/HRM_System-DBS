<?php

class EmployeeLeave extends Controller {

    public function __construct($controller,$action)
    {
        parent::__construct($controller,$action);
        $this->load_model('LeaveRequest');
        $this->load_model('LeaveRecord');
    }

    public function indexAction() {
        $this->view->leaves = $this->LeaveRequestModel->getPendingRequests(Supervisor::currentLoggedInEmployee()->id);
        $this->view->render('leave/index');
    }

    public function applicationAction() {
        if ($_POST) {
            $this->LeaveRequestModel->request($_POST);
            Router::redirect('NMEmployeeDashboard');
        } else {
            $this->view->render('leave/application');
        }
    }

    public function approvalAction() {
        if ($_POST) {
            $this->LeaveRequestModel->update($_POST['id'],[
                'status'=>$_POST['status']
            ]);
            if ($_POST['status'] == 'approved') {
                switch($_POST['type']) {
                    case "annual":
                        $this->LeaveRecordModel->update($_POST['emp_id'],[
                            'rem_annual'=>$_POST['rem_annual'] - $_POST['duration']
                        ]); 
                        break;
                    case "casual":
                        $this->LeaveRecordModel->update($_POST['emp_id'],[
                            'rem_casual'=>$_POST['rem_casual'] - $_POST['duration']
                        ]);
                        break;
                    case "maternity":
                        $this->LeaveRecordModel->update($_POST['emp_id'],[
                            'rem_maternity'=>$_POST['rem_maternity'] - $_POST['duration']
                        ]);
                        break;
                    case "nopay":
                        $this->LeaveRecordModel->update($_POST['emp_id'],[
                            'rem_no_pay'=>$_POST['rem_no_pay'] - $_POST['duration']
                        ]);
                        break;
                    default:
                }
            }
            Router::redirect('EmployeeLeave/approval');
        } else {
            $this->view->requests = $this->LeaveRequestModel->getPendingRequests(Supervisor::currentLoggedInEmployee()->id);
            $this->view->render('leave/requests');
        }
    }

    public function recordAction() {
        $this->view->record = $this->LeaveRecordModel->getLeaveRecord(NMEmployee::currentLoggedInEmployee()->id);
        $this->view->requests = $this->LeaveRequestModel->getRequestsByEmployee(NMEmployee::currentLoggedInEmployee()->id);
        $this->view->render('leave/index');
    }

}