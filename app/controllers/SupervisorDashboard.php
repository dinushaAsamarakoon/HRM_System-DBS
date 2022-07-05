<?php

class SupervisorDashboard extends Controller{

    public function __construct($controller,$action)
    {
        parent::__construct($controller,$action);
        $this->load_model('LeaveRequest');
    }

    public function indexAction() {
        $this->view->requests = $this->LeaveRequestModel->getPendingRequests();
        $this->view->render('dashboard/supervisor');
    }

}