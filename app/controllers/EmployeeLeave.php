<?php

class EmployeeLeave extends Controller {

    public function __construct($controller,$action)
    {
        parent::__construct($controller,$action);
        $this->load_model('LeaveRequest');
        $this->load_model('LeaveDetails');
        $this->load_model('Notification');
    }

    public function indexAction() {
        $this->view->leaves = $this->LeaveRequestModel->getPendingRequests();
        $this->view->render('leave/index');
    }

    public function applicationAction() {
        if ($_POST) {
            $this->LeaveRequestModel->request($_POST);
            Router::redirect('home');
        } else {
            $this->view->render('leave/apply');
        }
    }

    public function approvalAction() {
        if ($_POST) {
            $this->LeaveRequestModel->update($_POST['id'],[
                'status'=>$_POST['status']
            ]);
            $message = 'Leave ' . $_POST['status'] . ': ' . $_POST['reason'];
            $this->NotificationModel->create($_POST['sup_id'], $_POST['emp_id'], $message);
            Router::redirect('EmployeeLeave/approve');
        } else {
            $this->view->requests = $this->LeaveRequestModel->getPendingRequests();
            $this->view->render('leave/requests');
        }
    }

    public function requestAction() {
        $this->view->request = $this->LeaveRequestModel->getLeaveRequest('3');
        $this->view->render('leave/request');
    }

    public function detailsAction() {
        $this->view->details = $this->LeaveDetailsModel->getLeaveDetails('3');
        $this->view->requests = $this->LeaveRequestModel->getRequestsByEmployee('3');
        $this->view->render('leave/index');
    }

   

}