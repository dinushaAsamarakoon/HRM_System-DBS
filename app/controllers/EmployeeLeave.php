<?php

class EmployeeLeave extends Controller {

    public function __construct($controller,$action)
    {
        parent::__construct($controller,$action);
        $this->load_model('LeaveRecord');
        $this->load_model('LeaveDetails');
        $this->load_model('Notification');
    }

    public function indexAction() {
        $this->view->leaves = $this->LeaveRecordModel->getPendingRequests();
        $this->view->render('leave/index');
    }

    public function applicationAction() {
        if ($_POST) {
            $this->LeaveRecordModel->request($_POST);
            Router::redirect('home');
        } else {
            $this->view->render('leave/apply');
        }
    }

    public function approvalAction() {
        if ($_POST) {
            $this->LeaveRecordModel->update($_POST['id'],[
                'status'=>$_POST['status']
            ]);
            $message = 'Leave ' . $_POST['status'] . ': ' . $_POST['reason'];
            $this->NotificationModel->create($_POST['sup_id'], $_POST['emp_id'], $message);
            Router::redirect('EmployeeLeave/approve');
        } else {
            $this->view->requests = $this->LeaveRecordModel->getPendingRequests();
            $this->view->render('leave/requests');
        }
    }

    public function requestAction() {
        $this->view->request = $this->LeaveRecordModel->getLeaveRecord('3');
        $this->view->render('leave/request');
    }

    public function detailsAction() {
        $this->view->details = $this->LeaveDetailsModel->getLeaveDetails('3');
        $this->view->requests = $this->LeaveRecordModel->getRequestsByEmployee('3');
        $this->view->render('leave/index');
    }

}