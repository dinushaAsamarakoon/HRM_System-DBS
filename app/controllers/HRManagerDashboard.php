<?php

class HRManagerDashboard extends Controller{

    public function __construct($controller,$action)
    {
        parent::__construct($controller,$action);
    }

    public function indexAction() {
        $this->view->id = HRManager::currentLoggedInEmployee()->id;
        $this->view->render('dashboard/hrmanager');
    }

}