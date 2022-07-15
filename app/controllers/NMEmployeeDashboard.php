<?php

class NMEmployeeDashboard extends Controller{

    public function __construct($controller,$action)
    {
        parent::__construct($controller,$action);
        $this->load_model('LeaveRequest');
    }

    public function indexAction() {
        $this->view->id = NMEmployee::currentLoggedInEmployee()->id;
        $this->view->notifications = $this->LeaveRequestModel->getIncompleteRequests(NMEmployee::currentLoggedInEmployee()->id);
        $this->view->render('dashboard/nmemployee');
    }
    
}