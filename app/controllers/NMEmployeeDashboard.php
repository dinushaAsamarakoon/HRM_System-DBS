<?php

class NMEmployeeDashboard extends Controller{

    public function __construct($controller,$action)
    {
        parent::__construct($controller,$action);
        $this->load_model('Notification');
    }

    public function indexAction() {
        $this->view->notifications = $this->NotificationModel->getNotifications('3');
        $this->view->render('dashboard/nmemployee');
    }
    
}