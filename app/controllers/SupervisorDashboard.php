<?php

class SupervisorDashboard extends Controller{

    public function __construct($controller,$action)
    {
        parent::__construct($controller,$action);
        $this->load_model('LeaveRecord');
    }

    public function indexAction() {
        $this->view->requests = $this->LeaveRecordModel->getPendingRequests();
        $this->view->render('dashboard/supervisor');
    }

}